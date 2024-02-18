@extends('clients.layouts.master')

@section('content')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Đăng ký</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Đăng ký</li>
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
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_fullname" name="fullname"
                                            placeholder="Nhập họ tên" required>
                                        <label for="input_fullname">Họ tên</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_phone" name="phone"
                                            placeholder="Nhập số điện thoại" required>
                                        <label for="input_phone">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="input_email" name="email"
                                            placeholder="Nhập email">
                                        <label for="input_email">Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Đăng ký</button>
                                </div>
                                <p>Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập tại đây</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
