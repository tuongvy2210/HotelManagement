@extends('clients.layouts.master')

@section('content')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-2.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Chi tiết phòng</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Chi tiết phòng</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    @include('clients.partials.booking')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div id="room-carousel" class="carousel slide mb-5 wow fadeIn" data-bs-ride="carousel"
                        data-wow-delay="0.1s">
                        <div class="carousel-inner">
                            @foreach ($roomType->images as $index => $image)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <img class="w-100" src="{{ asset('storage/' . $image) }}" alt="Image">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#room-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#room-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="d-flex flex-wrap pb-4 m-n1">
                        <small class="bg-light rounded py-1 px-3 m-1"><i
                                class="fa fa-bed text-primary me-2"></i>{{ $roomType->number_of_bed }}
                            giường ngủ</small>
                        <small class="bg-light rounded py-1 px-3 m-1"><i
                                class="fa fa-bath text-primary me-2"></i>{{ $roomType->number_of_bathroom }}
                            phòng tắm</small>
                        @foreach (json_decode($roomType->utilities, true) as $item)
                            @php $utility = \App\Models\Utility::find($item) @endphp
                            <small class="bg-light rounded py-1 px-3 m-1"><span
                                    class="{{ $utility->icon }} text-primary me-2"></span>{{ $utility->name }}</small>
                        @endforeach
                    </div>
                    {!! $roomType->description !!}
                </div>


                <div class="col-lg-4">
                    <div class="bg-light mb-5 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="border-bottom text-center text-dark p-3 pt-4 mb-3">
                            <span class="align-top fs-4 lh-base">đ</span>
                            <span
                                class="align-middle fs-1 lh-sm fw-bold">{{ number_format($roomType->discountPrice) }}</span>
                            <span class="align-bottom fs-6 lh-lg">/ Giờ</span>
                        </div>

                        <form action="{{ route('booking') }}">
                            <div class="row g-3 p-4 pt-2">
                                <div class="col-12">
                                    <select class="form-select" name="room_type_id" required disabled>
                                        <option value="{{ $roomType->id }}">
                                            {{ $roomType->name }}</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="date" id="date2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" name="checkin_at"
                                            placeholder="Thời gian vào" data-target="#date2" data-toggle="datetimepicker"
                                            required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" name="number_of_adults">
                                        <option value="">Số người lớn</option>
                                        @for ($i = 1; $i <= 3; $i++)
                                            <option value="{{ $i }}"
                                                {{ request()->number_of_adults == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12">
                                    <select class="form-select" name="number_of_children">
                                        <option value="">Số trẻ em</option>
                                        @for ($i = 1; $i <= 3; $i++)
                                            <option value="{{ $i }}"
                                                {{ request()->number_of_children == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary py-3 w-100">Đặt phòng ngay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
