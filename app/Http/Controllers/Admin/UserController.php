<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());

        return to_route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('roomStatus'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return to_route('admin.users.index');
    }

}
