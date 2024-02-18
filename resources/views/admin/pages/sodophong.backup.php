@extends('admin.layouts.master')

@section('content')
    <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
        <div>
            <h4 class="mb-0 fs-5">Sơ đồ phòng</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="box-container" style="background-color: #666">
                        <h3 class="text-white box mb-0">101</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="mb-0 fs-6" style="color: #666">Đã đặt</h3>
                        <div class="text-muted">Nguyễn Hoàng Sơn</div>
                        <div class="text-muted">Nhận phòng: 17/12/2023 15:00</div>
                        <div class="text-muted">Nhận phòng: 17/12/2023 15:00</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="box-container" style="background-color: #f00">
                        <h3 class="text-white box mb-0">201</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="mb-0 fs-6" style="color: #f00">Đang có khách</h3>
                        <div class="text-muted">Nguyễn Hoàng Sơn</div>
                        <div class="text-muted">Giờ vào: 17/12/2023 15:00</div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-danger box-container">
                        <h3 class="text-white box mb-0">202</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-danger mb-0 fs-6">Trống</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-success box-container">
                        <h3 class="text-white box mb-0">303</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-success mb-0 fs-6">Đang dọn dẹp</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-success box-container">
                        <h3 class="text-white box mb-0">303</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-success mb-0 fs-6">Đang bảo trì</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-success box-container">
                        <h3 class="text-white box mb-0">303</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-success mb-0 fs-6">Chưa dọn</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-success box-container">
                        <h3 class="text-white box mb-0">303</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-success mb-0 fs-6">Quá hạn đặt</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 d-flex align-items-stretch">
            <div class="card card-hover overflow-hidden w-100 room-container">
                <a href="" class="d-flex align-items-stretch h-100">
                    <div class="text-bg-success box-container">
                        <h3 class="text-white box mb-0">303</h3>
                    </div>
                    <div class="p-3 align-self-center">
                        <h3 class="text-success mb-0 fs-6">Quá hạn thuê</h3>
                        <div class="text-muted"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
