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
    <table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <tbody>
            <tr>
                <th>Kính gởi</th>
                <td><?php echo nl2br($data['noi_dung']); ?></td>
            </tr>
            <tr>
                <th>Số hiệu</th>
                <td><?php echo e($van_ban['so_hieu']); ?></td>
            </tr>
            <tr>
                <th>Trích yếu</th>
                <td><?php echo e($van_ban['trich_yeu']); ?></td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td><?php echo e($van_ban['mo_ta']); ?></td>
            </tr>
            <tr>
                <th>Đính kèm</th>
                <td>
                    <?php if($van_ban['attachments']): ?>
                    <ul>
                        <?php $__currentLoopData = $van_ban['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(env('APP_URL')); ?>storage/files/<?php echo e($dk['aliasname']); ?>" target="_blank"><?php echo e($dk['title']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>

<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/vendor.min.js"></script>
<!-- App js -->
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/app.min.js"></script>
</body>
</html><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/VanBan/email.blade.php ENDPATH**/ ?>