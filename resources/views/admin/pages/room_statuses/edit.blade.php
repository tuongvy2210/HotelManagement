@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Sửa trạng thái phòng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.room_statuses.update', $roomStatus->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4 row align-items-center">
                            <label for="input_name" class="form-label fw-semibold col-sm-2 col-form-label">Tên trạng thái
                                phòng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_name" name="name"
                                    value="{{ $roomStatus->name }}" placeholder="Nhập tên trạng thái phòng" autofocus
                                    required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_color" class="form-label fw-semibold col-sm-2 col-form-label">Chọn
                                màu</label>
                            <div class="col-sm-10">
                                <input type="color" class="form-control form-control-color" id="input_color"
                                    name="color" value="{{ $roomStatus->color }}">
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="cbx_is_shown" class="form-label fw-semibold col-sm-2 col-form-label">Hiển
                                thị</label>
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" id="cbx_is_shown" name="is_shown"
                                    {{ $roomStatus->is_shown ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                                <a href="{{ route('admin.room_statuses.index') }}" class="btn btn-dark ms-2">Quay về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
