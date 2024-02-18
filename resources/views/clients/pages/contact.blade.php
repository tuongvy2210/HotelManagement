@extends('clients.layouts.master')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0"
        style="background-image: url({{ asset('assets/clients/img/carousel-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Liên hệ</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Liên hệ</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    @include('clients.partials.booking')

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Liên hệ</h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">Liên hệ </span> với chúng tôi nếu có bất kỳ câu
                    hỏi nào</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Đặt phòng</h6>
                            <p class="mb-1"><i class="fa fa-phone text-primary me-2"></i>0987654321</p>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>book@example.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Chung</h6>
                            <p class="mb-1"><i class="fa fa-phone text-primary me-2"></i>0912345678</p>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Hỗ trợ</h6>
                            <p class="mb-1"><i class="fa fa-phone text-primary me-2"></i>0936781264</p>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.605320637424!2d106.67153615745846!3d10.764870094842715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggVOG6vyBUUC5IQ00!5e0!3m2!1svi!2s!4v1702998597447!5m2!1svi!2s"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_name" name="name0"
                                            placeholder="Nhập họ tên" required>
                                        <label for="input_name">Họ tên</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="input_phone" name="phone"
                                            placeholder="Nhập số điện thoại" required>
                                        <label for="input_phone">Số điện thoại</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Nhập vấn đề cần hỗ trợ" required>
                                        <label for="subject">Vấn đề cần hỗ trợ </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Để lại lời nhắn" id="message" name="message" style="height: 150px"></textarea>
                                        <label for="message">Lời nhắn</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Gửi yêu cầu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
