@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách tài khoản</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên tài khoản</th>
                                        <th>Màu</th>
                                        <th>Hiển thị</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td><span class="badge"
                                                    style="background: {{ $user->color }}">{{ $user->color }}</span>
                                            </td>
                                            <td><input type="checkbox" class="form-check-input"
                                                    {{ $user->is_shown ? 'checked' : '' }} disabled>
                                            </td>
                                            <td class="col-1">
                                                @if ()
                                                <a href="{{ route('admin.room_statuses.edit', $user->id) }}"
                                                    class="btn btn-warning">Khóa</a>
                                                <a href="{{ route('admin.room_statuses.edit', $user->id) }}"
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
