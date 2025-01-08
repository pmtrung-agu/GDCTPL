<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(__("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG")); ?> - <?php echo e(__("AGU")); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?php echo e(__("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG")); ?> - <?php echo e(__("AGU")); ?>" name="description" />
        <meta content="Phan Minh Trung - trungminhphan@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png">
        <?php $__env->startSection('css'); ?> <?php echo $__env->yieldSection(); ?>
        <!-- App css -->
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
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
                                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo-sm.png" alt="<?php echo e(Session::get('user.name')); ?>" alt="<?php echo e(Session::get('user.username')); ?>" class="rounded-circle">
                                <span class="pro-user-name ml-1"><?php echo e(Session::get('user.username')); ?><i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                <?php if(Session::get('user.roles') && in_array('Admin', Session::get('user.roles'))): ?>
                                <a href="<?php echo e(env('APP_URL')); ?>admin/user" class="dropdown-item notify-item">
                                    <i class="fe-user"></i> <span><?php echo e(__("Tài khoản người dùng")); ?></span>
                                </a>
                                <?php endif; ?>
                                <a href="<?php echo e(env('APP_URL')); ?>auth/logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i> <span><?php echo e(__("Đăng xuất")); ?></span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?php echo e(env('APP_URL')); ?>admin" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo.png" title="<?php echo e(__("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG")); ?>" height="60">
                            </span>
                            <span class="logo-sm">
                                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo-sm.png" alt="" height="26">
                            </span>
                        </a>
                    </div>
                </div> <!-- end container-fluid-->
            </div>
            <!-- end Topbar -->
            <?php
                $menu = Config::get('menu.menu');
            ?>
            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php if($menu): ?>
                        <ul class="navigation-menu">
                            <li><a href="<?php echo e(env('APP_URL')); ?>admin/dashboard" class="has-submenu"><i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="has-submenu"><a href="#" ><i class="fa fa-tags"></i> Danh mục <div class="arrow-down"></div></a>
                                <ul class="submenu in">
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/linh-vuc">Lĩnh vực</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe">Ngành nghề</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/thong-tin">Thông tin</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/san-pham">Sản phẩm</a></li>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu">Tài liệu</a></li>
                                </ul>
                            </li>
                            <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="has-submenu">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/<?php echo e($m['path']); ?>" class="has-submenu"><i class="<?php echo e($m['icon']); ?>"></i> <?php echo e($m['title']); ?> </a>
                                    
                                </li>                           
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                        
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
                <?php $__env->startSection('body'); ?> <?php echo $__env->yieldSection(); ?>
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
                        &copy; 2025 <?php echo e(__('CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG')); ?>

                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
        <!-- Vendor js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/vendor.min.js"></script>
        <?php $__env->startSection('js'); ?> <?php echo $__env->yieldSection(); ?>
        <!-- App js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/app.min.js"></script>
    </body>
</html>
<?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/layout.blade.php ENDPATH**/ ?>