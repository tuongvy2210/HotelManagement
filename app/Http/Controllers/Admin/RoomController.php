<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Service;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('admin.pages.rooms.index', compact('rooms'));
    }

    public function create()
    {
        $roomTypes = RoomType::display()->get();

        return view('admin.pages.rooms.create', compact('roomTypes'));
    }

    public function store(Request $request)
    {
        $request['is_shown'] = $request->is_shown === 'on';
        Room::create($request->all());

        return redirect()->route('admin.rooms.index');
    }

    public function show(Room $room)
    {
        $customers = Customer::all();
        $order = $room->orders()->where(['checkout_at' => null])->first();
        if ($order) {
            $rent_days = now()->diffInDays($order->created_at) + 1;
            $total = $rent_days * $room->price;
            $total_service = 0;
            foreach ($order->order_details as $order_detail) {
                $total_service += $order_detail->service->price * $order_detail->quantity;
            }
            $total_payment = $total + $total_service;
            $services = Service::display()->get();
            return view('admin.pages.rooms.show', compact('room', 'customers', 'total', 'rent_days', 'services', 'total_payment'));
        }
        return view('admin.pages.rooms.show', compact('room', 'customers'));
    }

    public function edit(Room $room)
    {
        $roomTypes = RoomType::display()->get();

        return view('admin.pages.rooms.edit', compact('room', 'roomTypes'));
    }

    public function update(Request $request, Room $room)
    {
        $request['is_shown'] = $request->is_shown === 'on';
        $room->update($request->all());

        return redirect()->route('admin.rooms.index');
    }
}
