
<?php $__env->startSection('title', 'Quản lý văn bản'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('Thêm mới')); ?></a> <?php echo e(__('Danh sách Văn bản')); ?></h3>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/VanBan/list.blade.php ENDPATH**/ ?>