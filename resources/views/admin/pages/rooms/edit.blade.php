@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Chỉnh sửa phòng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.rooms.update', $room->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-4 row align-items-center">
                            <label for="input_name" class="form-label fw-semibold col-sm-2 col-form-label">Tên phòng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_name" name="name"
                                    value="{{ $room->name }}" placeholder="Nhập tên phòng" autofocus required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="select_room_type" class="form-label fw-semibold col-sm-2 col-form-label">Chọn loại
                                phòng</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" style="width: 100%; height: 36px" id="select_room_type"
                                    name="room_type_id" required>
                                    <option value="">Vui lòng chọn</option>
                                    @foreach ($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}"
                                            {{ $room->roomType->id === $roomType->id ? 'selected' : '' }}>
                                            {{ $roomType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="cbx_is_shown" class="form-label fw-semibold col-sm-2 col-form-label">Hiển
                                thị</label>
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" id="cbx_is_shown" name="is_shown"
                                    {{ $room->is_shown ? 'checked' : '' }}>
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
