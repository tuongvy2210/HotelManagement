<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.pages.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.pages.orders.show', compact('order'));
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('admin.rooms.show', $order->room->id);
    }

    public function checkout(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.index');
    }
}
