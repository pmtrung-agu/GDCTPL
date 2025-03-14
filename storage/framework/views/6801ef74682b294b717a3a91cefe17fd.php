<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG</title>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(env('APP_URL')); ?>assets/backend/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>Chúc mừng quý Doanh nghiệp đã đăng ký thàng công thành viên Cổng thông tin Chuyển đổi số Doanh nghiệp:</h3>
<p style="font-size: 20px;">Tài khoản đăng nhập cổng thông tin như sau:</p>
<ul>
    <li>Tài khoản (username): <?php echo e($data['dien_thoai']); ?></li>
    <li>Mật khẩu (password): <?php echo e($data['dien_thoai']); ?></li>
    <li>Địa chỉ đăng nhập: <a href="<?php echo e(env('APP_URL')); ?>admin">Tại đây</a></li>
</ul>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/vendor.min.js"></script>
<!-- App js -->
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/app.min.js"></script>
</body>
</html><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/dang-ky-thanh-vien-email.blade.php ENDPATH**/ ?>