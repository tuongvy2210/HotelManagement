@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Chỉnh sửa tiện ích phòng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.utilities.update', $utility->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4 row align-items-center">
                            <label for="input_name" class="form-label fw-semibold col-sm-2 col-form-label">Tên tiện
                                ích</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_name" name="name"
                                    value="{{ $utility->name }}" placeholder="Nhập tên loại phòng" autofocus required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_icon" class="form-label fw-semibold col-sm-2 col-form-label">Fontawesome 5
                                icon</label>
                            <div class="col-sm-10"> 
                                <input type="text" class="form-control" id="input_icon" name="icon"
                                    value="{{ $utility->icon }}" placeholder="Nhập Fontawesome icon" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="cbx_is_shown" class="form-label fw-semibold col-sm-2 col-form-label">Hiển
                                thị</label>
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" id="cbx_is_shown" name="is_shown"
                                    {{ $utility->is_shown ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                                <a href="{{ route('admin.utilities.index') }}" class="btn btn-dark ms-2">Quay về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
