<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/admin/images/logos/favicon.png') }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/summernote/dist/summernote-lite.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}" />

    @stack('styles')

    <title>Modernize Bootstrap Admin</title>
</head>

<body>
    <div class="preloader">
        <img src="{{ asset('assets/admin/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <aside class="left-sidebar with-vertical">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="../main/index.html" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/admin/images/logos/dark-logo.svg') }}" class="dark-logo"
                            alt="Logo-Dark" />
                        <img src="{{ asset('assets/admin/images/logos/light-logo.svg') }}" class="light-logo"
                            alt="Logo-light" />
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Quản trị</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-map"></i>
                                </span>
                                <span class="hide-menu">Sơ đồ phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="{{ route('admin.bookings.index') }}"
                                aria-expanded="false">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="d-flex">
                                        <i class="ti ti-award"></i>
                                    </span>
                                    <span class="hide-menu">Đơn đặt phòng</span>
                                </div>
                                <div class="hide-menu">
                                    <span
                                        class="badge rounded-circle bg-primary d-flex align-items-center justify-content-center rounded-pill fs-2">{{ $unorderedBookingCount }}</span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.orders.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-receipt"></i>
                                </span>
                                <span class="hide-menu">Quản lý hóa đơn</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.rooms.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-server"></i>
                                </span>
                                <span class="hide-menu">Quản lý phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.room_types.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-menu"></i>
                                </span>
                                <span class="hide-menu">Quản lý loại phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.services.index') }}"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-star"></i>
                                </span>
                                <span class="hide-menu">Quản lý dịch vụ phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.utilities.index') }}"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-rss"></i>
                                </span>
                                <span class="hide-menu">Quản lý tiện ích phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.room_statuses.index') }}"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-check"></i>
                                </span>
                                <span class="hide-menu">Quản lý tình trạng phòng</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.customers.index') }}"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Quản lý khách hàng</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
                        <div class="hstack gap-3">
                            <div class="john-img">
                                <img src="{{ asset('assets/admin/images/profile/user-1.jpg') }}"
                                    class="rounded-circle" width="40" height="40" alt="" />
                            </div>
                            <div class="john-title">
                                <h6 class="mb-0 fs-4 fw-semibold">admin</h6>
                                <span class="fs-2">Quản trị viên</span>
                            </div>
                            <button type="submit" class="border-0 bg-transparent text-primary ms-auto" tabindex="0"
                                type="button" aria-label="Đăng xuất" data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-title="Đăng xuất">
                                <i class="ti ti-power fs-6"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </aside>
        <div class="page-wrapper">
            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="d-block d-lg-none">
                            <img src="{{ asset('assets/admin/images/logos/dark-logo.svg') }}" width="180"
                                alt="" />
                        </div>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                    class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="{{ asset('assets/admin/images/profile/user-1.jpg') }}"
                                                        class="rounded-circle" width="35" height="35"
                                                        alt="" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">Thông tin người dùng</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ asset('assets/admin/images/profile/user-1.jpg') }}"
                                                        class="rounded-circle" width="80" height="80"
                                                        alt="" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">admin</h5>
                                                        <span class="mb-1 d-block">Quản trị viên</span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i> admin@gmail.com
                                                        </p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.logout') }}" method="post">
                                                    <div class="d-grid py-4 px-7 pt-8">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-primary">Đăng
                                                            xuất</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                        <ul class="list mb-0 py-2">
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="#">
                                    <span class="fs-3 text-dark fw-normal d-block">Modern</span>
                                    <span class="fs-3 text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>

    <script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/simplebar/dist/simplebar.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/theme.js') }}"></script>

    <script src="{{ asset('assets/admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/mixitup/dist/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/summernote/dist/summernote-lite.min.js') }}"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
        $(() => {
            $("#zero_config").dataTable({
                responsive: true,
                dom: 'lfBrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                aaSorting: [
                    [0, 'desc']
                ],
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass(
                "btn btn-primary mr-1");
            $(".select2").select2();
            $(".summernote").summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: false,
            });

            $('.filter__controls button').on('click', function() {
                console.log('clicked');
                $('.filter__controls button').removeClass('active');
                $(this).addClass('active');
            });
            if ($('.product__filter').length > 0) {
                var containerEl = document.querySelector('.product__filter');
                var mixer = mixitup(containerEl);
            }
        })
    </script>

    @stack('scripts')
</body>

</html>
