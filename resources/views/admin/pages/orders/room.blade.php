@extends('admin.layouts.master')

@section('content')
    <div class="row">
        @foreach ($rooms as $room)
            <div class="col-sm-12 col-md-4">
                <form action="" method="post">
                    @csrf
                    <div class="d-flex align-items-stretch">
                        <div class="card card-hover overflow-hidden w-100 room-container">
                            <div class="d-flex align-items-stretch h-100">
                                <div class="box-container" style="background-color: {{ $room->roomStatus->color }}">
                                    <h3 class="text-white box mb-0">{{ $room->name }}</h3>
                                </div>
                                <div class="p-3 align-self-center">
                                    <h3 class="mb-0 fs-6" style="color: {{ $room->roomStatus->color }}">
                                        {{ $room->roomStatus->name }}</h3>
                                </div>
                                <div class="align-self-center me-3 ms-auto">
                                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                                    <button type="submit" class="btn btn-primary">Chọn</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection
