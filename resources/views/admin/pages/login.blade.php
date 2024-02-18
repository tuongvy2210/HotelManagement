@extends('admin.layouts.auth')

@section('content')
    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
        <div class="col-sm-8 col-md-6 col-xl-9">
            <h2 class="mb-3 fs-7 fw-bolder">Đăng nhập</h2>
            <p class=" mb-9">Trang quản trị</p>
            <form method="post">
                @csrf
                <div class="mb-3">
                    <label for="input_username" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="input_username" name="username" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="input_password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="input_password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Đăng nhập</button>
            </form>
        </div>
    </div>
@endsection
