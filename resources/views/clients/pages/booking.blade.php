@extends('clients.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Đặt phòng</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Đặt phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @include('clients.partials.booking')

    <!-- Booking Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Đặt phòng</h6>
                <h1 class="mb-5">Hãy chọn một không gian <span class="text-primary text-uppercase">PHÙ HỢP NHẤT</span>
                </h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                                src="{{ asset('assets/clients/img/about-1.jpg') }}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s"
                                src="{{ asset('assets/clients/img/about-2.jpg') }}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s"
                                src="{{ asset('assets/clients/img/about-3.jpg') }}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                                src="{{ asset('assets/clients/img/about-4.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_fullname" name="fullname"
                                            placeholder="Nhập họ tên"
                                            value="{{ auth()->guard('user')->user()->customer->fullname }}" required
                                            autofocus>
                                        <label for="input_fullname">Họ tên</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_phone" name="phone"
                                            placeholder="Nhập số điện thoại"
                                            value="{{ auth()->guard('user')->user()->customer->phone }}" required>
                                        <label for="input_phone">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="input_email" name="email"
                                            placeholder="Nhập email"
                                            value="{{ auth()->guard('user')->user()->customer->email }}">
                                        <label for="input_email">Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            id="input_checkin_at" name="checkin_at" value="{{ request()->checkin_at }}"
                                            placeholder="Check In" data-target="#date3" data-toggle="datetimepicker"
                                            required />
                                        <label for="input_checkin_at">Giờ vào</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select3" name="room_type_id">
                                            @foreach ($roomTypes as $roomType)
                                                <option value="{{ $roomType->id }}"
                                                    {{ request()->room_type_id == $roomType->id ? 'selected' : '' }}>
                                                    {{ $roomType->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="select3">Chọn loại phòng</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select1" required>
                                            <option value="">Vui lòng chọn</option>
                                            @for ($i = 1; $i <= 3; $i++)
                                                <option value="{{ $i }}"
                                                    {{ request()->number_of_adults == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label for="select1">Số người lớn</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select" id="select2" required>
                                            <option value="">Vui lòng chọn</option>
                                            @for ($i = 1; $i <= 3; $i++)
                                                <option value="{{ $i }}"
                                                    {{ request()->number_of_children == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label for="select2">Số trẻ em</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="" id="input_note" name="note" style="height: 100px"></textarea>
                                        <label for="input_note">Ghi chú</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Đặt ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection
