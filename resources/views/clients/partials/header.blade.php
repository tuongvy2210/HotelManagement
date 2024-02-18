<!-- Header Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('index') }}"
                class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">H&V Hotel</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2"></i>
                        <p class="mb-0"><a href="mailto:tuongvy@gmail.com">tuongvy@gmail.com</a></p>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2"></i>
                        <p class="mb-0"><a href="tel:0912345678">(+84)9 1234 5678</a></p>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="me-3" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a class="me-3" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                        <a class="me-3" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        <a class="" href="https://youtube.com/"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="{{ route('index') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">KS Tường Vy</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{ route('index') }}" class="nav-item nav-link">Trang chủ</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">Giới thiệu</a>
                        <a href="{{ route('service') }}" class="nav-item nav-link">Dịch vụ</a>
                        <a href="{{ route('room') }}" class="nav-item nav-link">Các loại phòng</a>
                        <a href="{{ route('booking') }}" class="nav-item nav-link">Đặt phòng</a>
                        <a href="{{ route('contact') }}" class="nav-item nav-link">Liên hệ</a>
                        @if (auth()->guard('user')->check())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Tài
                                    khoản</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('booking_list') }}" class="dropdown-item">Danh sách đặt phòng</a>
                                    <a href="{{ route('change_info') }}" class="dropdown-item">Thay đổi thông tin</a>
                                    <a href="{{ route('change_password') }}" class="dropdown-item">Đổi mật khẩu</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">Đăng xuất</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (!auth()->guard('user')->check())
                        <a href="{{ route('login') }}"
                            class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">Đăng
                            nhập<i class="fa fa-arrow-right ms-3"></i></a>
                    @endif
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->
