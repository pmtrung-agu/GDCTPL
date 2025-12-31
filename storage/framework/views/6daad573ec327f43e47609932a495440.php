
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.ie.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:#d10700;">GIÁO DỤC CHÍNH TRỊ - PHÁP LUẬT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/bg.jpg" style="width:90%;"/>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Admin/dashboard.blade.php ENDPATH**/ ?>