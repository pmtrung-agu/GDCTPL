
<?php $__env->startSection('title', content: __('Gởi Email')); ?>
<?php $__env->startSection('body'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 card-box">
                <h1 class="text-center">ĐÃ GỞI EMAIL</h1>
                <?php $__currentLoopData = $email_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h3><i class="fas fa-envelope text-success"></i> <?php echo e($email); ?></h3>
                    <hr />
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/VanBan/send.blade.php ENDPATH**/ ?>