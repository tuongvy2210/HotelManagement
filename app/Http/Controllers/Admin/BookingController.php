<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Order;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('admin.pages.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.pages.bookings.create');
    }

    public function store(Request $request)
    {
        Booking::create($request->all());

        return redirect()->route('admin.bookings.index');
    }

    public function edit(Booking $booking)
    {
        return view('admin.pages.bookings.edit', compact('customer'));
    }

    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());

        return redirect()->route('admin.bookings.index');
    }

    public function room(Booking $booking)
    {
        $rooms = Room::where(['room_status_id' => 1, 'room_type_id' => $booking->room_type_id])->get();

        return view('admin.pages.bookings.room', compact('rooms'));
    }

    public function selectRoom(Request $request, Booking $booking)
    {
        DB::beginTransaction();
        try {
            $room = Room::find($request->room_id);
            $order = Order::create([
                'booking_id' => $booking->id,
                'room_id' => $room->id,
                'customer_id' => $booking->customer->id,
                'fullname' => $booking->fullname,
                'phone' => $booking->phone,
                'email' => $booking->email,
                'price' => $room->roomType->price,
                'discount' => $room->roomType->discount,
            ]);
            $room->update(['order_id' => $order->id, 'room_status_id' => 2]);
            DB::commit();

            return redirect()->route('admin.index');
        } catch (Exception $e) {
            DB::rollBack();

            return back();
        }
    }

    public function cancelBooking(Booking $booking)
    {
        $booking->update(['is_cancelled' => 1]);

        return back();
    }
}
