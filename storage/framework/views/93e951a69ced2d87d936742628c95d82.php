<!doctype html>
<html class="no-js" lang="vi_VN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?> - Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang</title>
    <meta name="author" content="Phan Minh Trung">
    <meta name="description" content="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang">
    <meta name="keywords" content="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang">
    <meta name="robots" content="INDEX,FOLLOW">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" href="<?php echo e(env('APP_URL')); ?>assets/frontend/img/favicons/favicon.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(env('APP_URL')); ?>assets/frontend/img/favicons/favicon.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/frontend/css/style.css">
    <?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
  </head>
  <body class="theme-blue2">
    <div class="color-scheme-wrap active">
      <button class="switchIcon">
        <i class="fab fa-staylinked"></i>
      </button>
      <h4 class="color-scheme-wrap-title">
        <i class="fab fa-staylinked me-2"></i>Liên kết
      </h4>
      <a href="https://ai.cdsdnag.com" class="th-btn text-center w-100">
        <i class="fas fa-robot me-2"></i> Chatbot AI </a>
    </div>
    <div id="preloader" class="preloader">
      <button class="th-btn th-radius preloaderCls">Cancel Preloader</button>
      <div class="preloader">
        <div class="loading-container">
          <div class="loading"></div>
          <div class="preloader-logo">
            <a class="icon-masking" href="<?php echo e(env('APP_URL')); ?>">
              <span data-mask-src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/preloader.svg" class="mask-icon"></span>
              <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/preloader.svg" alt="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang">
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php 
        $menu = Config::get('menu.menu-home');
    ?>
    <div class="th-menu-wrapper">
      <div class="th-menu-area text-center">
        <button class="th-menu-toggle">
          <i class="fal fa-times"></i>
        </button>
        <div class="mobile-logo">
          <a href="<?php echo e(env('APP_URL')); ?>">
            <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/logo.png" alt="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang" style="width:250px;">
          </a>
        </div>
        <?php if($menu): ?>
        <div class="th-mobile-menu">
            <ul>
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="menu-item-has -children">
                    <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e($m['title']); ?></a>
                    <?php if($k1 == 0 || $k1 == 1 || $k1 ==2): ?>
                            <?php if($k1 == 0): ?> <?php $childs = App\Models\DMThongTin::All(); ?>
                            <?php elseif($k1 == 1): ?> <?php $childs = App\Models\DMSanPham::All(); ?> 
                            <?php elseif($k1 == 2): ?> <?php $childs = App\Models\DMTaiLieu::All(); ?> 
                            <?php else: ?> <?php $childs = ""; ?> <?php endif; ?>
                            <?php if(isset($childs) && $childs): ?>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(env('APP_URL')); ?><?php echo e($m['path']); ?>/<?php echo e($c['slug']); ?>"><?php echo e($c['ten']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php if(isset($m['childs'])): ?>
                    <ul class="sub-menu">
                        <?php $__currentLoopData = $m['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(env('APP_URL')); ?><?php echo e($m['path']); ?>"><?php echo e($c['title']); ?></a></li>        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>    
                    <?php endif; ?>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <header class="th-header header-layout3">
      <div class="sticky-wrapper">
        <div class="menu-area">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-auto" style="width:21%;">
                <div class="header-logo">
                  <a href="<?php echo e(env('APP_URL')); ?>">
                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/logo.png" alt="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang" style="width:250px;">
                  </a>
                </div>
              </div>
              <div class="col-auto">
                <?php if($menu): ?>
                <nav class="main-menu style2 d-none d-lg-inline-block">
                  <ul>
                    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k1 => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="menu-item-has-children">
                        <a href="<?php echo e(env('APP_URL')); ?>"><?php echo e($m['title']); ?></a>
                        <?php if($k1 == 0 || $k1 == 1 || $k1 ==2): ?>
                            <?php if($k1 == 0): ?> <?php $childs = App\Models\DMThongTin::All(); ?>
                            <?php elseif($k1 == 1): ?> <?php $childs = App\Models\DMSanPham::All(); ?> 
                            <?php elseif($k1 == 2): ?> <?php $childs = App\Models\DMTaiLieu::All(); ?> 
                            <?php else: ?> <?php $childs = ""; ?> <?php endif; ?>
                            <?php if(isset($childs) && $childs): ?>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(env('APP_URL')); ?><?php echo e($m['path']); ?>/<?php echo e($c['slug']); ?>"><?php echo e($c['ten']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(isset($m['childs'])): ?>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $m['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(env('APP_URL')); ?><?php echo e($m['path']); ?>/<?php echo e($c['path']); ?>"><?php echo e($c['title']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </nav>
                <?php endif; ?>
                <div class="header-button">
                  <button type="button" class="th-menu-toggle d-inline-block d-lg-none">
                    <i class="far fa-bars"></i>
                  </button>
                </div>
              </div>
              <div class="col-auto d-none d-lg-block">
                <div class="header-button">
                  <a href="<?php echo e(env('APP_URL')); ?>auth/login" class="th-btn d-none d-xl-block" title="Đăng nhập hệ thống"><i class="fas fa-sign-in"></i> Đăng nhập</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
    
    <footer class="footer-wrapper footer-layout3">
      <div class="container">
        <div class="widget-area">
          <div class="row justify-content-between">
            <div class="col-md-6 col-xxl-3 col-xl-4">
              <div class="widget footer-widget">
                <div class="th-widget-about">
                  <div class="about-logo">
                    <a class="icon-masking" href="<?php echo e(env('APP_URL')); ?>">
                      <span data-mask-src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/logo.png" class="mask-icon"></span>
                      <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/logo.png" alt="Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang" style="width:250px;">
                    </a>
                  </div>
                  <p class="about-text">Cung cấp thông tin và tư vấn chuyển đổi số cho các doanh nghiệp nhỏ và vừa tỉnh An Giang.</p>
                  <div class="th-social">
                    <a href="https://www.facebook.com/AGUCICT">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/@agucict">
                      <i class="fab fa-youtube"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">Doanh nghiệp tham gia</h3>
                <div class="menu-all-pages-container">
                  <ul class="menu">
                    <li><a href="https://thaiminhnguyen.vn">Công ty TNHH MTV TMDV Thái Minh Nguyên</a></li>
                    <li><a href="https://ytetaigia247.com/">Y Tế Tại Gia 247</a></li>
                    <li><a href="https://xnta.afiex.com.vn">Xí nghiệp chế biến Thức ăn Chăn nuôi và Thủy sản AFIEX</a></li>
                    <li><a href="https://myphammyhanh.com">Công ty TNHH Mỹ Phẩm Mỹ Hạnh</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-auto">
              <div class="widget widget_nav_menu footer-widget">
                <h3 class="widget_title">Thông tin Chuyển đổi số</h3>
                <div class="menu-all-pages-container">
                  <ul class="menu">
                    <li><a href="<?php echo e(env('APP_URL')); ?>">Hướng dẫn sử dụng</a></li>
                    <li><a href="<?php echo e(env('APP_URL')); ?>">Hướng dẫn đăng ký thành viên</a></li>
                    <li><a href="<?php echo e(env('APP_URL')); ?>">Quy định hoạt động</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright-wrap text-center">
        <div class="container">
          <p class="copyright-text"><i class="fal fa-copyright"></i> 2025. Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang. </p>
        </div>
      </div>
    </footer>
    <div class="scroll-top">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
      </svg>
    </div>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/swiper-bundle.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery.counterup.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/circle-progress.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/jquery-ui.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/tilt.jquery.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/nice-select.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/wow.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/js/main.js"></script>
    <?php $__env->startSection('is'); ?> <?php echo $__env->yieldSection(); ?>
  </body>
</html><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/layout.blade.php ENDPATH**/ ?>