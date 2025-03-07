<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | {{ __("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG") }} - {{ __("AGU") }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ __("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG") }} - {{ __("AGU") }}" name="description" />
        <meta content="Phan Minh Trung - trungminhphan@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ env('APP_URL') }}assets/backend/images/logo_sm.png">
        @section('css') @show
        <!-- App css -->
        <link href="{{ env('APP_URL') }}assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Navigation Bar-->
        <header id="topnav" style="background-color:#0072c6;">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ env('APP_URL') }}assets/backend/images/logo-sm.png" alt="{{ Session::get('user.name') }}" alt="{{ Session::get('user.username') }}" class="rounded-circle">
                                <span class="pro-user-name ml-1">{{ Session::get('user.username') }}<i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" style="width:250px;">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                @if(App\Http\Controllers\UserController::is_roles('Admin'))
                                <a href="{{ env('APP_URL') }}admin/user" class="dropdown-item notify-item">
                                    <i class="fas fa-users"></i> <span>{{ __("Tài khoản người dùng") }}</span>
                                </a>
                                @endif
                                <a href="{{ env('APP_URL') }}admin/user/change-password" class="dropdown-item notify-item">
                                    <i class="fas fa-sync"></i> <span>{{ __("Đổi mật khẩu") }}</span>
                                </a>
                                <a href="{{ env('APP_URL') }}auth/logout" class="dropdown-item notify-item">
                                    <i class="fas fa-sign-out-alt"></i> <span>{{ __("Đăng xuất") }}</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{ env('APP_URL') }}admin" class="logo text-center">
                            <span class="logo-lg">
                                <img src="{{ env('APP_URL') }}assets/backend/images/logo.png" title="{{ __("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG") }}" height="60">
                            </span>
                            <span class="logo-sm">
                                <img src="{{ env('APP_URL') }}assets/backend/images/logo-sm.png" alt="" height="26">
                            </span>
                        </a>
                    </div>
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->
            @php
                $menu = Config::get('menu.menu');
            @endphp
            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        @if($menu)
                        <ul class="navigation-menu">
                            <li><a href="{{ env('APP_URL') }}admin/dashboard" class="has-submenu"><i class="fa fa-home"></i> Dashboard</a></li>
                            @if(App\Http\Controllers\UserController::is_roles('Admin, Manager'))
                            <li class="has-submenu"><a href="#" ><i class="fa fa-tags"></i> Danh mục <div class="arrow-down"></div></a>
                                <ul class="submenu in">
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/linh-vuc">Lĩnh vực</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe">Ngành nghề</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/thong-tin">Thông tin</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/san-pham">Sản phẩm</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu">Tài liệu</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/van-ban">Văn bản</a></li>
                                    <li><a href="{{ env('APP_URL') }}admin/danh-muc/don-vi">Đơn vị</a></li>
                                </ul>
                            </li>
                            @endif
                            @foreach($menu as $k => $m)
                                @if(App\Http\Controllers\UserController::is_roles($m['role']))
                                <li class="has-submenu">
                                    <a href="{{ env('APP_URL') }}admin/{{ $m['path'] }}" class="has-submenu"><i class="{{ $m['icon'] }}"></i> {{ $m['title']}} @if(isset($m['childs']) && $m['childs']) <div class="arrow-down"></div> @endif</a>
                                    @if(isset($m['childs']) && $m['childs'])
                                        <ul class="submenu">
                                            @foreach($m['childs'] as $c)
                                                <li><a href="{{ env('APP_URL') }}admin/{{ $m['path'] }}/{{ $c['path'] }}">{{ $c['title'] }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>  
                                @endif
                            @endforeach
                            
                        </ul>
                        @endif
                        {{-- <ul class="navigation-menu">
                            <li>
                                <a href="{{ env('APP_URL') }}admin/tin-tuc-su-kien"><i class="far fa-newspaper"></i> {{ __('Tin tức - Sự kiện') }}</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL') }}admin/product-category"><i class="fas fa-chess-queen"></i> {{ __('Danh mục Sản phẩm') }}</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL') }}admin/product"><i class="fas fa-chess-queen"></i> {{ __('Sản phẩm') }}</a>
                            </li>
                        </ul> --}}
                        <!-- End navigation menu -->
                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container-fluid">
                <!-- start page title -->
                @section('body') @show
            </div>
        </div>
        <!-- end wrapper -->
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
          <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 text-center">
                        &copy; 2025 {{ __('CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG') }}
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
        <!-- Vendor js -->
        <script src="{{ env('APP_URL') }}assets/backend/js/vendor.min.js"></script>
        @section('js') @show
        <!-- App js -->
        <script src="{{ env('APP_URL') }}assets/backend/js/app.min.js"></script>
    </body>
</html>
