
<?php $__env->startSection('title', 'Danh mục Đơn vị'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/don-vi/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Đơn vị</h3>
                    <?php if($namhoc): ?>
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $namhoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($k+1); ?></td>
                                <td><?php echo e($ct['ten']); ?> <br /></td>
                                <td class="text-center"><?php echo e(App\Http\Controllers\DMDiaChiController::getDiaChi($ct['dia_chi'])); ?></td>
                                <td class="text-center"><?php echo e($ct['dien_thoai']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/don-vi/delete/<?php echo e($ct['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/don-vi/edit/<?php echo e($ct['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/DonVi/list.blade.php ENDPATH**/ ?>