@extends('clients.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Danh sách đơn đặt phòng</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Danh sách đơn đặt phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-xxl">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 mx-auto">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <table class="table border table-striped table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Loại phòng</th>
                                    <th>Đặt phòng</th>
                                    <th>Nhận phòng</th>
                                    <th>Phòng</th>
                                    <th>Tình trạng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->roomType->name }}</td>
                                        <td>{{ $booking->booking_at->format('d/m/y H:i') }}</td>
                                        <td>{{ $booking->checkin_at->format('d/m/y H:i') }}</td>
                                        <td>{{ $booking->order?->room->name }}</td>
                                        <td>{{ $booking->is_cancelled ? 'Đã hủy' : 'Đặt thành công' }}</td>
                                        <td>
                                            @if (!$booking->is_cancelled && !$booking->order)
                                                <form action="{{ route('cancel_booking', $booking->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Hủy</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
