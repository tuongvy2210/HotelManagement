@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách đơn đặt phòng</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ tên</th>
                                        <th>SĐT</th>
                                        <th>Loại phòng</th>
                                        <th>Ngày vào</th>
                                        <th>Phòng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $index => $booking)
                                        <tr>
                                            <td>{{ $booking->id }}</td>
                                            <td>{{ $booking->fullname }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->roomType->name }}</td>
                                            <td>{{ $booking->checkin_at->format('d/m/y H:i') }}</td>
                                            <td>
                                                @if ($booking->is_cancelled)
                                                    <span class="badge text-bg-danger">Đã hủy</span>
                                                @else
                                                    <span
                                                        class="badge text-bg-success">{{ $booking->order?->room->name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$booking->order && !$booking->is_cancelled)
                                                    <a href="{{ route('admin.bookings.room', $booking->id) }}"
                                                        class="btn btn-primary">Chọn phòng</a>
                                                    
                                                    <div class="modal fade" id="cancelBooking" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-md">
                                                            <div class="modal-content">
                                                                <form
                                                                    action="{{ route('admin.bookings.cancel', $booking->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="modal-header d-flex align-items-center">
                                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                                            Xác nhận khách hủy đặt phòng
                                                                        </h4>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Thao tác này sẽ không thể khôi phục</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn bg-danger-subtle text-danger font-medium waves-effect text-start"
                                                                            data-bs-dismiss="modal">Đóng</button>
                                                                        <button type="submit" class="btn btn-danger">Xác
                                                                            nhận hủy</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
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
