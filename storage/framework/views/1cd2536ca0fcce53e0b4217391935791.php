<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo e(__("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG")); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="<?php echo e(__("CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG")); ?>" name="description" />
        <meta content="Phan Minh Trung - trungminhphan@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png">
        <!-- App css -->
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('<?php echo e(env('APP_URL')); ?>assets/backend/images/bg.jpg');background-size: cover;background-position: left center;"></div>
        <div class="wrapper-page account-page-full">
            <div class="card shadow-none">
                <div class="card-block">
                    <div class="account-box">
                        <div class="card-box shadow-none p-4 mt-2">
                            <h2 class="text-uppercase text-center pb-3">
                                <a href="<?php echo e(env('APP_URL')); ?>" class="text-success">
                                    <span><img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo.png" alt="" height="100"></span>
                                </a>
                            </h2>

                            <form action="<?php echo e(env('APP_URL')); ?>auth/login" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="url" value="<?php echo e(isset($destination) ? $destination : ''); ?>" />
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="emailaddress"><?php echo e(__("Username")); ?></label>
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="<?php echo e(__("Username")); ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password"><?php echo e(__("Password")); ?></label>
                                        <input class="form-control" type="password" required name="password" id="password" placeholder="<?php echo e(__("Password")); ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="checkbox checkbox-primary">
                                            <input id="remember" type="checkbox" checked="">
                                            <label for="remember"><?php echo e(__("Remember login")); ?></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row text-center">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-primary waves-effect waves-light" type="submit"><i class="fas fa-lock"></i> <?php echo e(__("Login")); ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p class="account-copyright">© 2025 <?php echo __("CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG"); ?></p>
            </div>
        </div>
        <!-- Vendor js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/app.min.js"></script>
    </body>
</html>
<?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/login.blade.php ENDPATH**/ ?>