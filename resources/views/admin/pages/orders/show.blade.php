@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex align-items-center px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Chi tiết hóa đơn</h5>
                    <div class="ms-auto flex-shrink-0">
                        <button class="btn btn-primary btn-default print-page" type="button">
                            <span><i class="ti ti-printer fs-5"></i>
                                In hóa đơn</span>
                        </button>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="w-100 w-xs-100 chat-container">
                        <div class="invoice-inner-part h-100">
                            <div class="invoiceing-box">
                                <div class="invoice-header d-flex align-items-center border-bottom p-3">
                                    <h4 class="font-medium text-uppercase mb-0">Hóa đơn</h4>
                                    <div class="ms-auto">
                                        <h4 class="invoice-number">{{ $order->id }}</h4>
                                    </div>
                                </div>
                                <div class="p-3" id="custom-invoice">
                                    <div class="invoice-123" id="printableArea">
                                        <div class="row pt-3">
                                            <div class="col-md-12">
                                                <div class="">
                                                    <h6>Mã hóa đơn #{{ $order->id }}</h6>
                                                    <h6>Tên khách hàng: {{ $order->fullname }}</h6>
                                                    <p class="mt-4 mb-1">
                                                        <span>Giờ vào: </span>
                                                        <i class="ti ti-calendar"></i>
                                                        {{ $order->checkin_at->format('d/m/y H:i') }}
                                                    </p>
                                                    <p>
                                                        <span>Giờ ra :</span>
                                                        <i class="ti ti-calendar"></i>
                                                        {{ now()->format('d/m/y H:i') }}
                                                    </p>
                                                    <h6>Số giờ sử dụng: {{ $order->checkoutRentHours }} giờ</h6>
                                                    <h6>Số tiền phòng: {{ number_format($order->checkoutTotalPrice) }}
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="table-responsive mt-5" style="clear: both">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">#</th>
                                                                <th>Tên dịch vụ</th>
                                                                <th class="text-end">Đơn giá</th>
                                                                <th class="text-end">Giảm giá</th>
                                                                <th class="text-end">Giá đã giảm</th>
                                                                <th class="text-end">Số lượng</th>
                                                                <th class="text-end">Tổng tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->orderDetails as $index => $orderDetail)
                                                                <tr>
                                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                                    <td>{{ $orderDetail->service->name }}</td>
                                                                    <td class="text-end">
                                                                        {{ number_format($orderDetail->price) }}</td>
                                                                    <td class="text-end">{{ $orderDetail->discount }}%</td>
                                                                    <td class="text-end">
                                                                        {{ number_format($orderDetail->discountPrice) }}
                                                                    </td>
                                                                    <td class="text-end">{{ $orderDetail->quantity }}</td>
                                                                    <td class="text-end">
                                                                        {{ number_format($orderDetail->total) }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="pull-right mt-4 text-end">
                                                    <p>Tổng tiền thuê phòng:
                                                        {{ number_format($order->checkoutTotalPrice) }}</p>
                                                    <p>Tổng tiền dịch vụ: {{ number_format($order->servicePrice) }}
                                                    </p>
                                                    <hr />
                                                    <h3><b>Tổng tiền thanh toán :</b>
                                                        {{ number_format($order->checkoutMustPayPrice) }}</h3>
                                                </div>
                                                <div class="clearfix"></div>
                                                <hr />
                                                <div class="text-end">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/apps/invoice.js') }}"></script>
    <script src="{{ asset('assets/admin/js/apps/jquery.printArea.js') }}"></script>
@endpush
