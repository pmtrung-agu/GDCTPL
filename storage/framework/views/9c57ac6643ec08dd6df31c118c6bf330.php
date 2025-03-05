
<?php $__env->startSection('title', 'Quản lý Hội phí'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('Thu hội phí')); ?></a> <?php echo e(__('Quản lý Hội phí - Danh sách Doanh nghiệp đóng gần nhất')); ?> <span class="badge badge-danger">Năm <?php echo e($years); ?></span></h3>
                    <hr />
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <span class="badge badge-blue" style="font-size: 15px;"><i class="fas fa-users-cog"></i> Số doanh nghiệp: <?php echo e($sl_doanh_nghiep); ?></span>
                                <span class="badge badge-success" style="font-size: 15px;"><i class="fas fa-money-bill-alt"></i> Đã đóng HP: <?php echo e($da_dong); ?></span>
                                <span class="badge badge-warning" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> Chưa đóng HP: <?php echo e($sl_doanh_nghiep - $da_dong); ?></span>
                            </div>
                            <div class="col-12 col-md-6 text-right">
                                <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/thong-ke-theo-nam" class="btn btn-success waves-effect waves-light btn-sm"><i class="fas fa-calendar-alt"></i> Thống kê theo năm</a>
                            </div>
                        </div>
                    
                    <hr />
                    <table class="table table-border table-bordered table-striped table-hovered">
                        <thead>
                            <tr>
                                <th>Doanh nghiệp</th>
                                <th>Số tiền</th>
                                <th>Năm</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($ds['ten_doanh_nghiep']); ?></td>
                                <td class="text-right"><?php echo e(number_format($ds['so_tien'],0,",",".")); ?></td>
                                <td class="text-center"><?php echo e($ds['nam']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/delete/<?php echo e($ds['_id']); ?>" onclick="return confirm('Chắc chắc xóa?')"><i class="fas fa-trash text-danger"></i></a>&nbsp;
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/edit/<?php echo e($ds['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        <?php if(Session::get('msg') != null && Session::get('msg')): ?>
        $.toast({
            heading:"Thông báo",
            text:"<?php echo e(Session::get('msg')); ?>",
            loaderBg:"#3b98b5",icon:"info", hideAfter:3e3,stack:1,position:"top-right"
        });
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/HoiPhi/list.blade.php ENDPATH**/ ?>