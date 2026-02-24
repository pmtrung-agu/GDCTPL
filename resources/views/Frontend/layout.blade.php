<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Giáo dục Chính trị - Pháp Luật')</title>
    <link rel="shortcut icon" href="{{ env('APP_URL') }}assets/frontend/images/favicon.ico">
    <!-- Bootstrap CSS-->
    <link href="{{ env('APP_URL') }}assets/frontend/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!-- IE 9-->
    <!-- Vendors-->
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/flexslider/flexslider.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/swipebox/css/swipebox.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/slick/slick.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/slick/slick-theme.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/animate.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/css/component.min.css">
    <!-- Font-icon-->
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/fonts/font-icon/style.css">
    <!-- Style-->
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/layout.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/elements.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/extra.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/widget.css">
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/responsive.css">
    <!-- <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/css/color.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Script Loading Page-->
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/html5shiv.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/respond.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/js/snap.svg-min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/sidebartransition/js/modernizr.custom.js"></script>
    @section('css') @show
  </head>
  <body>
    <div id="pagewrap" class="pagewrap">
      <div id="html-content" class="wrapper-content">
        <header class="header-transparent">
          <div class="header-top top-layout-02">
            <div class="container">
              <div class="topbar-left">
                <div class="topbar-content">
                  <div class="item"> 
                    <div class="wg-contact"><i class="fa fa-map-marker"></i><span> Ban Chỉ huy Phòng thủ khu vực 1 - Long Phú</span></div>
                  </div>
                  <div class="item"> 
                    <div class="wg-contact"><i class="fa fa-phone"></i><span> 02963822521</span></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-main">
            <div class="container">
              <div class="open-offcanvas">&#9776;</div>
              {{-- <div class="utility-nav">
                <div class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="search-bar dropdown-toggle"><i class="fa fa-search"></i></a>
                  <div class="dropdown-menu">
                    <div class="search-form">
                      <form action="{{ env('APP_URL') }}tim-kiem" method="GET" id="SearchForm">
                        <div class="input-group">
                          <input type="text" name="q" value="{{ Request::input('q') }}" placeholder="Tìm kiếm" class="form-control">
                          <div class="input-group-addon"><i class="fa fa-search"></i></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>--}}
              <div class="header-logo"><a href="{{ env('APP_URL') }}" class="logo logo-static"><img src="{{ env('APP_URL') }}assets/frontend/images/@yield('logo','logo-yellow.png')" alt="fooday" class="logo-img" style="max-width:400px;"></a><a href="{{ env('APP_URL') }}" class="logo logo-fixed"><img src="{{ env('APP_URL') }}assets/frontend/images/logo-red.png" alt="fooday" class="logo-img"  style="max-width:280px;"></a></div>
              <nav id="main-nav-offcanvas" class="main-nav-wrapper">
                <div class="close-offcanvas-wrapper"><span class="close-offcanvas">x</span></div>
                <div class="main-nav">
                  <ul id="main-nav" class="nav nav-pills">
                    <li class="dropdown"><a href="{{ env('APP_URL') }}thong-tin/tin-tuc-su-kien">Tin hoạt động </a>
                      {{-- <ul class="dropdown-menu">
                        <li><a href="{{ env('APP_URL') }}thong-tin/tin-tuc-su-kien">Bài viết về Bác</a></li>
                        <li><a href="{{ env('APP_URL') }}thong-tin/hinh-anh">Hình ảnh</a></li>
                      </ul> --}}
                    </li>
                    @php
                      $dmtailieu = App\Models\DMTaiLieu::where('id_parent','=','')->get();
                    @endphp
                    <li class="dropdown"><a href="{{ env('APP_URL') }}tai-lieu">Tài liệu GDCT-PL  <i class="fa fa-arrow-down"></i></a>
                      @if($dmtailieu)
                      <ul class="dropdown-menu">
                        @foreach($dmtailieu as $dmtl)
                          <li><a href="{{ env('APP_URL') }}tai-lieu/{{ $dmtl['slug'] }}">{{ $dmtl['ten'] }}</a></li>
                        @endforeach
                        {{-- -<li><a href="{{ env('APP_URL') }}tai-lieu/tac-pham-ve-ho-chi-minh">Giáo dục nâng cao</a></li> --}}
                      </ul>
                      @endif
                    </li>
                    {{-- -<li><a href="{{ env('APP_URL') }}thong-tin/videos">Videos</a></li> --}}
                    {{-- <li><a href="">Liên hệ</a></li> --}}
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </header>
        <div class="page-container">
          @section('body') @show
        </div>
        <footer>
          <div class="footer-main">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="ft-widget-area">
                    <div class="ft-area1">
                      <div class="swin-wget swin-wget-about">
                        <div class="wget-about-content">
                            <h3 class="title" style="color:#fff;">Giáo dục Chính trị - Pháp Luật</h3>
                        </div>
                        <div class="about-contact-info clearfix">
                          <div class="address-info">
                            <div class="info-content">
                              <p><i class="fa fa-map-marker"></i> Ban Chỉ huy Phòng thủ khu vực 1 - Long Phú</p>
                            </div>
                          </div>
                          <div class="phone-info">
                            <div class="info-content">
                              <p> <i class="fa fa-mobile-phone"></i> 02963822521</p>
                            </div>
                          </div>
                          <div class="email-info">
                            <div class="info-content">
                              <p><i class="fa fa-envelope"></i> trantien1371997@gmail.com</p>
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
        </footer><a id="totop" href="#" class="animated"><i class="fa fa-angle-double-up"></i></a>
      </div>
      <div id="loader" data-opening="m -5,-5 0,70 90,0 0,-70 z m 5,35 c 0,0 15,20 40,0 25,-20 40,0 40,0 l 0,0 C 80,30 65,10 40,30 15,50 0,30 0,30 z" class="pageload-overlay">
        <div class="loader-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 80 60" preserveaspectratio="none">
            <path d="m -5,-5 0,70 90,0 0,-70 z m 5,5 c 0,0 7.9843788,0 40,0 35,0 40,0 40,0 l 0,60 c 0,0 -3.944487,0 -40,0 -30,0 -40,0 -40,0 z"></path>
          </svg>
          <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
          <div class="sk-circle sk-circle-out">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery-->
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/jquery-1.10.2.min.js"></script>
    <!-- Bootstrap JavaScript-->
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Vendors-->
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/swipebox/js/jquery.swipebox.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/slick/slick.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/jquery-countTo/jquery.countTo.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/parallax/parallax.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/gmaps/gmaps.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/audiojs/audio.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/vide/jquery.vide.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/js/svgLoader.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/js/classie.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/pageloading/sidebartransition/js/sidebarEffects.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/wowjs/wow.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/skrollr.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Own script-->
    <script src="{{ env('APP_URL') }}assets/frontend/js/layout.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/js/elements.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/js/widget.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/js/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
    @section('js') @show
  </body>
</html>