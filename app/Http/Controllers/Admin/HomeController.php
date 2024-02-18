<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Room;
use App\Models\RoomStatus;
use App\Models\RoomType;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::display()->get();
        $roomTypes = RoomType::display()->get();
        $roomStatuses = RoomStatus::display()->get();

        return view('admin.pages.index', compact('rooms', 'roomTypes', 'roomStatuses'));
    }

    public function detail(Room $room)
    {
        $roomStatuses = RoomStatus::whereNotIn('id', [2, 3])->get()->except($room->room_status_id);
        $services = Service::display()->get();

        return view('admin.pages.detail', compact('room', 'roomStatuses', 'services'));
    }

    public function checkin(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->order->update(['checkin_at' => now()]);
            $room->update(['room_status_id' => 3]);
            DB::commit();

            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    public function checkout(Room $room)
    {
        return view('admin.pages.checkout', compact('room'));
    }

    public function confirmCheckout(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->order->update(['checkout_at' => now()]);
            $room->update(['room_status_id' => 1, 'order_id' => null]);
            DB::commit();

            return redirect()->route('admin.orders.show', $room->order->id);
        } catch (Exception $e) {
            DB::rollBack();

            return back();
        }
    }

    public function cancelBooking(Room $room)
    {
        DB::beginTransaction();
        try {
            $room->order->booking->update(['is_cancelled' => 1]);
            $room->order->delete();
            $room->update(['room_status_id' => 1, 'order_id' => null]);
            DB::commit();

            return back();
        } catch (Exception $e) {
            return back();
        }
    }

    public function updateRoomStatus(Request $request, Room $room)
    {
        $room->update(['room_status_id' => $request->room_status_id]);

        return back();
    }

    public function addService(Request $request, Room $room)
    {
        $orderDetail = $room->order->orderDetails?->where('service_id', $request->service_id)->first();
        if ($orderDetail) {
            $orderDetail->update(['quantity' => $orderDetail->quantity + $request->quantity]);
        } else {
            $service = Service::find($request->service_id);
            OrderDetail::create([
                'order_id' => $room->order->id,
                'service_id' => $request->service_id,
                'price' => $service->price,
                'discount' => $service->discount,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('admin.detail', $room->id);
    }

    public function roomBooking(Room $room)
    {
        $customers = Customer::all();

        return view('admin.pages.booking', compact('room', 'customers'));
    }

    public function roomConfirmBooking(Request $request, Room $room)
    {
        if (!$request->customer_id && (!$request->fullname && !$request->phone)) {
            return redirect()->back();
        }

        DB::beginTransaction();
        try {
            if ($request->customer_id) {
                $customer = Customer::find($request->customer_id);
                $order = Order::create([
                    'customer_id' => $customer->id,
                    'fullname' => $customer->fullname,
                    'phone' => $customer->phone,
                    'email' => $customer->email,
                    'room_id' => $room->id,
                    'checkin_at' => now(),
                    'price' => $room->roomType->price,
                    'discount' => $room->roomType->discount,
                ]);
            } else {
                $order = Order::create([
                    'fullname' => $request->fullname,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'room_id' => $room->id,
                    'checkin_at' => now(),
                    'price' => $room->roomType->price,
                    'discount' => $room->roomType->discount,
                ]);
            }
            $room->update(['order_id' => $order->id, 'room_status_id' => 3]);
            DB::commit();

            return redirect()->route('admin.detail', $room->id);
        } catch (Exception $e) {
            DB::rollBack();

            return back();
        }
    }
}
