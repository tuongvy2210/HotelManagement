@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Khách đặt phòng {{ $room->name }}</h5>
                </div>
                <div class="card-body p-4">
                    <h3 class="mb-4">Chọn khách hàng hoặc nhập thông tin của khách</h3>
                    <form action="{{ route('admin.rooms.confirm_booking', $room->id) }}" method="post">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label for="select_customer" class="form-label fw-semibold col-sm-2 col-form-label">Chọn khách
                                hàng</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" style="width: 100%; height: 36px" id="select_customer"
                                    name="customer_id">
                                    <option value="" selected>Vui lòng chọn</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->fullname }} - {{ $customer->phone }} -
                                            {{ $customer->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_fullname" class="form-label fw-semibold col-sm-2 col-form-label">Tên khách hàng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_fullname" name="fullname"
                                    placeholder="Nhập tên phòng" autofocus>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_phone" class="form-label fw-semibold col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_phone" name="phone"
                                    placeholder="Nhập số điện thoại">
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
                                <a href="{{ route('admin.rooms.index') }}" class="btn btn-dark ms-2">Quay về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
