@extends('admin.layouts.master')

@section('content')
    <div class="datatables">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="d-flex align-items-center px-4 py-3 border-bottom">
                        <h5 class="card-title fw-semibold mb-0">Danh sách hóa đơn</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Loại phòng <br> Số phòng</th>
                                        <th>Họ tên <br> SĐT</th>
                                        <th>Nhận phòng <br> Trả phòng</th>
                                        <th>Số giờ thuê</th>
                                        <th>Tổng tiền</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->room->roomType->name }} <br> {{ $order->room->name }}</td>
                                            <td>{{ $order->fullname }} <br> {{ $order->phone }}</td>
                                            <td>{{ $order->checkin_at?->format('d/m/y H:i') }} <br> 
                                                {{ $order->checkout_at?->format('d/m/y H:i') }}</td>
                                            <td>{{ $order->rentHours }}</td>
                                            <td>{{ number_format($order->totalPrice) }}</td>
                                            <td>
                                                @if ($order->checkout_at)
                                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                                        class="btn btn-warning">Xem chi tiết</a>
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
