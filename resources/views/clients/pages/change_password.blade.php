@extends('clients.layouts.master')

@section('content')
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Đổi mật khẩu</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Đổi mật khẩu</li>
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
                                        <input type="password" class="form-control" id="input_old_password" name="old_password"
                                            placeholder="Nhập mật khẩu cũ" required autofocus>
                                        <label for="input_old_password">Mật khẩu cũ</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="input_password" name="password"
                                            placeholder="Nhập mật khẩu mới" required>
                                        <label for="input_password">Mật khẩu mới</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Đổi mật khẩu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
