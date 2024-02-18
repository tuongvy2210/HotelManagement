<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <div class="bg-primary rounded p-4">
                    <a href="{{ route('index') }}">
                        <h1 class="text-white text-uppercase mb-3">H&V Hotel</h1>
                    </a>
                    <p class="text-white mb-0">
                        H&V Hotel với phương châm luôn mang đến cho Khách hàng những trải nghiệm dịch vụ tốt nhất
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Liên hệ</h6>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>33 Vĩnh Viễn, Phường 2, Quận 10</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(+84)9 1234 5678</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>tuongvy@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://twitter.com/"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://facebook.com/"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://youtube.com/"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://linkedin.com/"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Liên kết nhanh</h6>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Các loại phòng nổi bật
                        </h6>
                        @foreach ($roomTypes as $roomType)
                            <a class="btn btn-link"
                                href="{{ route('detail', $roomType->id) }}">{{ $roomType->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
