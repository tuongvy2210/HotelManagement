@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Phòng {{ $room->name }} <span class="badge"
                                style="background: {{ $room->roomStatus->color }}">{{ $room->roomStatus->name }}</span></h5>
                        <div class="ms-auto flex-shrink-0 d-flex gap-2">
                            @if ($room->room_status_id === 1)
                                <a href="{{ route('admin.rooms.booking', $room->id) }}" class="btn btn-primary">Khách đặt
                                    phòng</a>
                            @elseif ($room->room_status_id === 2)
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelBooking">Khách hủy đặt phòng</button>
                                <div class="modal fade" id="cancelBooking" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable modal-md">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.bookings.cancel', $room->order->booking->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                        Xác nhận khách hủy đặt phòng
                                                    </h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Thao tác này sẽ không thể khôi phục</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn bg-danger-subtle text-danger font-medium waves-effect text-start"
                                                        data-bs-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('admin.rooms.checkin', $room->id) }}" method="post" class="">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Khách nhận phòng</button>
                                </form>
                            @elseif ($room->room_status_id === 3)
                                <a href="{{ route('admin.rooms.checkout', $room->id) }}" class="btn btn-primary">Khách trả
                                    phòng</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @if ($room->room_status_id === 1)
                            <form action="{{ route('admin.rooms.update_status', $room->id) }}" method="post">
                                @csrf
                                <div class="mb-4 row align-items-center">
                                    <label for="select_room_status"
                                        class="form-label fw-semibold col-sm-2 col-form-label">Chọn
                                        trạng thái phòng</label>
                                    <div class="col-sm-10 d-flex gap-3">
                                        <select class="select2 form-control" style="width: 100%; height: 36px"
                                            id="select_room_status" name="room_status_id" required>
                                            <option value="" selected>Vui lòng chọn</option>
                                            @foreach ($roomStatuses as $roomStatus)
                                                <option value="{{ $roomStatus->id }}">{{ $roomStatus->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary ms-auto flex-shrink-0">Cập
                                            nhật</button>
                                    </div>
                                </div>
                            </form>
                        @elseif (in_array($room->room_status_id, [2, 3]))
                            <div class="mb-4 row align-items-center">
                                <label class="form-label fw-semibold col-sm-2 col-form-label">Họ tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $room->order->fullname }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label fw-semibold col-sm-2 col-form-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $room->order->phone }}" disabled>
                                </div>
                            </div>
                            <div class="mb-4 row align-items-center">
                                <label class="form-label fw-semibold col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $room->order->email }}" disabled>
                                </div>
                            </div>
                            @if ($room->order->booking)
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label fw-semibold col-sm-2 col-form-label">Đặt phòng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            value="{{ $room->order->booking->booking_at->format('d/m/y H:i') }}" disabled>
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label fw-semibold col-sm-2 col-form-label">Nhận phòng dự
                                        kiến</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            value="{{ $room->order->booking->checkin_at->format('d/m/y H:i') }}" disabled>
                                    </div>
                                </div>
                            @endif
                            @if ($room->room_status_id === 3)
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label fw-semibold col-sm-2 col-form-label">Nhận phòng</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"
                                            value="{{ $room->order->checkin_at->format('d/m/y H:i') }}" disabled>
                                    </div>
                                </div>
                            @endif
                        @else
                            <form action="{{ route('admin.rooms.update_status', $room->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="room_status_id" value="1">
                                <button type="submit" class="btn btn-primary">Phòng trống</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

    @if ($room->room_status_id === 3)
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Dịch vụ phòng</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('admin.rooms.add_service', $room->id) }}" method="post">
                            @csrf
                            <div class="mb-4 row align-items-center">
                                <label for="select_service" class="form-label fw-semibold col-sm-2 col-form-label">Thêm
                                    dịch vụ</label>
                                <div class="col-sm-6">
                                    <select class="select2 form-control" style="width: 100%; height: 36px"
                                        id="select_service" name="service_id" required>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <input type="number" class="form-control" id="input_quantity" name="quantity"
                                        placeholder="Nhập số lượng" min="1" value="1" required>
                                </div>
                                <div class="col-sm-1">
                                    <button type="submit" class="btn btn-danger">Thêm</button>
                                </div>
                            </div>
                        </form>
                        <div class="datatables">
                            <div class="table-responsive">
                                <table class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên dịch vụ</th>
                                            <th>Đơn giá</th>
                                            <th>Giảm giá</th>
                                            <th>Giá đã giảm</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($room->order->orderDetails ?? [] as $index => $orderDetail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $orderDetail->service->name }}</td>
                                                <td>{{ number_format($orderDetail->price) }}</td>
                                                <td>{{ $orderDetail->discount }}%</td>
                                                <td>{{ number_format($orderDetail->discountPrice) }}</td>
                                                <td>{{ $orderDetail->quantity }}</td>
                                                <td>{{ number_format($orderDetail->total) }}</td>
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
    @endif
@endsection
