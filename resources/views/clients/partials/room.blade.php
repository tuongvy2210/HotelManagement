<!-- Room Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title text-center text-primary text-uppercase">Các loại phòng</h6>
            <h1 class="mb-5">Khám phá <span class="text-primary text-uppercase">các loại phòng</span> của chúng tôi
            </h1>
        </div>
        <div class="row g-4">
            @foreach ($roomTypes as $index => $roomType)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="{{ $index / 10 }}s">
                    <div class="room-item shadow rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid"
                                src="{{ asset(count($roomType->images) > 0 ? '/storage/' . $roomType->images[0] : 'assets/clients/img/room-1.jpg') }}"
                                alt="">
                            <small
                                class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">{{ number_format($roomType->discountPrice) }}/1
                                giờ</small>
                        </div>
                        <div class="p-4 mt-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0">{{ $roomType->name }}</h5>
                            </div>
                            <div class="d-flex mb-3">
                                <small class="border-end me-3 pe-3"><i
                                        class="fa fa-bed text-primary me-2"></i>{{ $roomType->number_of_bed }}
                                    giường ngủ</small>
                                <small class="border-end me-3 pe-3"><i
                                        class="fa fa-bath text-primary me-2"></i>{{ $roomType->number_of_bathroom }}
                                    phòng tắm</small>
                                <small><i
                                        class="fa fa-plus text-primary me-2"></i>{{ count(json_decode($roomType->utilities)) }}
                                    tiện ích khác</small>
                            </div>
                            <p class="text-body mb-3">{!! $roomType->description !!}</p>
                            <div class="d-flex justify-content-between">
                                <a class="btn btn-sm btn-primary rounded py-2 px-4"
                                    href="{{ route('detail', $roomType->id) }}">Xem chi tiết</a>
                                <a class="btn btn-sm btn-dark rounded py-2 px-4"
                                    href="{{ route('booking', ['room_type_id' => $roomType->id]) }}">Đặt ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $roomTypes->links() }}
    </div>
</div>
<!-- Room End -->
