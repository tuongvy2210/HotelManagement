@extends('clients.layouts.master')

@section('content')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Đăng nhập</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Đăng nhập</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-xxl">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-6 mx-auto">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="" method="post">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_username" name="username"
                                            placeholder="Nhập họ tên" required autofocus>
                                        <label for="input_username">Tên đăng nhập</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="input_password" name="password"
                                            placeholder="Nhập mật khẩu" required>
                                        <label for="input_password">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Đăng nhập</button>
                                </div>
                                <p>Bạn chưa có tài khoản? <a href="{{ route('signup') }}">Đăng ký ngay</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
