<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.pages.services.create');
    }

    public function store(Request $request)
    {
        $request['is_shown'] = $request->is_shown === 'on';

        Service::create($request->all());

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        return view('admin.pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request['is_shown'] = $request->is_shown === 'on';

        $service->update($request->all());

        return redirect()->route('admin.services.index');
    }
}
