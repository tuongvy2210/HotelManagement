@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Thêm khách hàng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.customers.store') }}" method="post">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label for="input_fullname" class="form-label fw-semibold col-sm-2 col-form-label">Họ tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_fullname" name="fullname"
                                    placeholder="Nhập tên khách hàng" autofocus required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_phone" class="form-label fw-semibold col-sm-2 col-form-label">Số điện
                                thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_phone" name="fullname"
                                    placeholder="Nhập số điện thoại" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_email" class="form-label fw-semibold col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_email" name="email"
                                    placeholder="Nhập email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                                <a href="{{ route('admin.customers.index') }}" class="btn btn-dark ms-2">Quay về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
