@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách trạng thái phòng</h5>
                        <a href="{{ route('admin.room_statuses.create') }}"
                            class="btn btn-primary ms-auto flex-shrink-0">Thêm</a>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên trạng thái</th>
                                        <th>Màu</th>
                                        <th>Hiển thị</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roomStatuses as $index => $roomStatus)
                                        <tr>
                                            <td>{{ $roomStatus->id }}</td>
                                            <td>{{ $roomStatus->name }}</td>
                                            <td><span class="badge"
                                                    style="background: {{ $roomStatus->color }}">{{ $roomStatus->color }}</span>
                                            </td>
                                            <td><input type="checkbox" class="form-check-input"
                                                    {{ $roomStatus->is_shown ? 'checked' : '' }} disabled>
                                            </td>
                                            <td class="col-1">
                                                <a href="{{ route('admin.room_statuses.edit', $roomStatus->id) }}"
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
