<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Utility;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomTypeController extends Controller
{
    public function index()
    {
        $roomTypes = RoomType::all();

        return view('admin.pages.room_types.index', compact('roomTypes'));
    }

    public function create()
    {
        $utilities = Utility::display()->get();

        return view('admin.pages.room_types.create', compact('utilities'));
    }

    public function store(Request $request)
    {
        $files = $request->images;
        foreach ($files as $file) {
            $file = json_decode($file);
            $fileContent = base64_decode($file->data);
            $tempFile = tempnam(sys_get_temp_dir(), 'decoded_file_');
            file_put_contents($tempFile, $fileContent);
            $path = Storage::putFile('upload', new File($tempFile));
            unlink($tempFile);
            $images[] = $path;
        }
        $request['image_url'] = json_encode($images);
        $request['utilities'] = json_encode($request->utilities);
        $request['is_shown'] = $request->is_shown === 'on';

        RoomType::create($request->all());

        return to_route('admin.room_types.index');
    }

    public function edit(RoomType $roomType)
    {
        $utilities = Utility::display()->get();
        $images = json_decode($roomType->image_url, true);
        foreach ($images as $index => $image) {
            $images[$index] = url('/') . '/storage/' . $image;
        }
        $roomType->image_url = json_encode($images);

        return view('admin.pages.room_types.edit', compact('roomType', 'utilities'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $files = $request->images;
        foreach ($files as $file) {
            $file = json_decode($file);
            $fileContent = base64_decode($file->data);
            $tempFile = tempnam(sys_get_temp_dir(), 'decoded_file_');
            file_put_contents($tempFile, $fileContent);
            $path = Storage::putFile('upload', new File($tempFile));
            unlink($tempFile);
            $images[] = $path;
        }
        $request['image_url'] = json_encode($images);
        $request['utilities'] = json_encode($request->utilities);
        $request['is_shown'] = $request->is_shown === 'on';

        foreach (json_decode($roomType->image_url, true) as $image_url) {
            if (Storage::exists($image_url)) {
                Storage::delete($image_url);
            }
        }

        $roomType->update($request->all());

        return to_route('admin.room_types.index');
    }
}
