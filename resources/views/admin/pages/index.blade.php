@extends('admin.layouts.master')

@section('content')
    <div class="row mb-3">
        <div class="col-12 filter__controls">
            <button type="button" class="btn text-bg-dark me-2 active" data-filter="*">Tất cả ({{ $rooms->count() }})</button>
            @foreach ($roomStatuses as $roomStatus)
                <button type="button" class="btn text-white me-2" style="background: {{ $roomStatus->color }}"
                    data-filter=".room-status-{{ $roomStatus->id }}">{{ $roomStatus->name }}
                    ({{ $roomStatus->rooms()->display()->count() }})
                </button>
            @endforeach
        </div>
    </div>
    <div class="row product__filter">
        <div class="col-12">
            @foreach ($roomTypes as $roomType)
                <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                    <div>
                        <h4 class="mb-0 fs-5">{{ $roomType->name }}</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($roomType->rooms()->display()->get() as $room)
                        <div class="col-sm-12 col-md-4 mix room-status-{{ $room->roomStatus->id }}">
                            <div class="d-flex align-items-stretch">
                                <div class="card card-hover overflow-hidden w-100 room-container">
                                    <a href="{{ route('admin.detail', $room->id) }}"
                                        class="d-flex align-items-stretch h-100">
                                        <div class="box-container" style="background-color: {{ $room->roomStatus->color }}">
                                            <h3 class="text-white box mb-0">{{ $room->name }}</h3>
                                        </div>
                                        <div class="p-3 align-self-center">
                                            <h3 class="mb-0 fs-6" style="color: {{ $room->roomStatus->color }}">
                                                {{ $room->roomStatus->name }}</h3>
                                            @if ($room->room_status_id === 2)
                                                <div class="text-muted">{{ $room->order?->booking->fullname }}</div>
                                                <div class="text-muted">Đặt phòng:
                                                    {{ date('d/m/y H:i', strtotime($room->order?->booking->booking_at)) }}
                                                </div>
                                                <div class="text-muted">Nhận phòng dự kiến:
                                                    {{ date('d/m/y H:i', strtotime($room->order?->booking->checkin_at)) }}
                                                </div>
                                            @elseif ($room->room_status_id === 3)
                                                <div class="text-muted">{{ $room->order?->fullname }} -
                                                    {{ $room->order?->phone }}</div>
                                                @if ($room->order?->booking)
                                                    <div class="text-muted">Đặt phòng:
                                                        {{ date('d/m/y H:i', strtotime($room->order?->booking->checkin_at)) }}</div>
                                                @endif
                                                <div class="text-muted">Nhận phòng:
                                                    {{ date('d/m/y H:i', strtotime($room->order?->checkin_at)) }}</div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
