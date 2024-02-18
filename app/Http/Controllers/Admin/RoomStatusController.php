<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomStatus;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{
    public function index()
    {
        $roomStatuses = RoomStatus::all();

        return view('admin.pages.room_statuses.index', compact('roomStatuses'));
    }

    public function create()
    {
        return view('admin.pages.room_statuses.create');
    }

    public function store(Request $request)
    {
        $request['is_shown'] = $request->is_shown === 'on';
        RoomStatus::create($request->all());

        return to_route('admin.room_statuses.index');
    }

    public function edit(RoomStatus $roomStatus)
    {
        return view('admin.pages.room_statuses.edit', compact('roomStatus'));
    }

    public function update(Request $request, RoomStatus $roomStatus)
    {
        $request['is_shown'] = $request->is_shown === 'on';
        $roomStatus->update($request->all());

        return to_route('admin.room_statuses.index');
    }

}
