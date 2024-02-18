@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách phòng</h5>
                        <a href="{{ route('admin.rooms.create') }}" class="btn btn-primary ms-auto flex-shrink-0">Thêm</a>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Trạng thái</th>
                                        <th>Tên</th>
                                        <th>Loại phòng</th>
                                        <th>Giá (1 giờ)</th>
                                        <th>Giảm giá</th>
                                        <th>Giá đã giảm</th>
                                        <th>Hiển thị</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $index => $room)
                                        <tr>
                                            <td>{{ $room->id }}</td>
                                            <td><span class="badge"
                                                    style="background: {{ $room->roomStatus->color }}">{{ $room->roomStatus->name }}</span>
                                            </td>
                                            <td>{{ $room->name }}</td>
                                            <td>{{ $room->roomType->name }}</td>
                                            <td>{{ number_format($room->roomType->price) }}</td>
                                            <td>{{ $room->roomType->discount }}%</td>
                                            <td>{{ number_format($room->roomType->discountPrice) }}</td>
                                            <td><input type="checkbox" class="form-check-input"
                                                    {{ $room->is_shown ? 'checked' : '' }} disabled>
                                            </td>
                                            <td class="col-1">
                                                <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                                    class="btn btn-warning">Sửa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
