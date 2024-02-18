<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utility;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function index()
    {
        $utilities = Utility::all();

        return view('admin.pages.utilities.index', compact('utilities'));
    }

    public function create()
    {
        return view('admin.pages.utilities.create');
    }

    public function store(Request $request)
    {
        $request['is_shown'] = $request->is_shown === 'on';

        Utility::create($request->all());

        return to_route('admin.utilities.index');
    }

    public function edit(Utility $utility)
    {
        return view('admin.pages.utilities.edit', compact('utility'));
    }

    public function update(Request $request, Utility $utility)
    {
        $request['is_shown'] = $request->is_shown === 'on';

        $utility->update($request->all());

        return to_route('admin.utilities.index');
    }
}
