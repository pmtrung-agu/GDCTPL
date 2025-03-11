
<?php $__env->startSection('title', 'Kết nối giao thương'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Thông báo của HHDN</h3>
                    <?php if($danhsach): ?>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                <th>#</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $dn = App\Models\User::find($ds['id_user']);
                            $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao/chi-tiet/<?php echo e($ds['_id']); ?>" class="chi-tiet"><?php echo e($ds['tieu_de']); ?> </a>
                                    <small><?php echo e(\Carbon\Carbon::parse($ds['updated_at'])->format("d/m/Y H:i")); ?></small>
                                </td>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                    <td class="text-center">
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao/delete/<?php echo e($ds['_id']); ?>" class="text-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao/edit/<?php echo e($ds['_id']); ?>" class="text-primary"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/ThongBao/list.blade.php ENDPATH**/ ?>