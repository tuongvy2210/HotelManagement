@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách dịch vụ</h5>
                        <a href="{{ route('admin.services.create') }}"
                            class="btn btn-primary ms-auto flex-shrink-0">Thêm</a>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Đơn giá</th>
                                        <th>Giảm giá (%)</th>
                                        <th>Giá đã giảm</th>
                                        <th>Hiển thị</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $index => $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ number_format($service->price) }}</td>
                                            <td>{{ $service->discount }}</td>
                                            <td>{{ number_format($service->discountPrice) }}</td>
                                            <td><input type="checkbox" class="form-check-input"
                                                    {{ $service->is_shown ? 'checked' : '' }} disabled>
                                            </td>
                                            <td class="col-1">
                                                <a href="{{ route('admin.services.edit', $service->id) }}"
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
