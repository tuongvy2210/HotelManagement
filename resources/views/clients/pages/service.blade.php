@extends('clients.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Dịch vụ</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Dịch vụ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @include('clients.partials.booking')

    @include('clients.partials.service')

    @include('clients.partials.testimonial')
@endsection
