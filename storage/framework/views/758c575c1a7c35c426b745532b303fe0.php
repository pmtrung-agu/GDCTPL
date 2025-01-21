
<?php $__env->startSection('title', 'Danh sách Doanh nghiệp tham gia'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Doanh nghiệp tham gia: <?php echo e($so_luong); ?> </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Mã số thuế</th>
                                <th>Điện thoại</th>
                                <th>TVHH</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; $count = count($danhsach); $page=Request::input('page') ? Request::input('page') : 1;  ?>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td><?php echo e($stt + $count * ($page-1)); ?></td> 
                                   <td><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/chi-tiet/<?php echo e($ds['_id']); ?>"><?php echo e($ds['ten']); ?></a></td>
                                   <td><?php echo e($ds['nguoidaidien']); ?></td>
                                   <td><?php echo e($ds['masothue']); ?></td>
                                   <td><?php echo e($ds['dienthoai']); ?></td>
                                   <td>
                                    <?php if($ds['hoivienhiephoi']): ?> <i class="fas fa-user-check text-success"></i>
                                    <?php else: ?> <i class="fas fa-user-times"></i> <?php endif; ?>
                                   </td>
                                   <td class="text-center" style="width:60px;">
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/delete/<?php echo e($ds['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/edit/<?php echo e($ds['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                                <?php $stt++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($danhsach->withPath(env('APP_URL').'admin/doanh-nghiep/danh-sach')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/list.blade.php ENDPATH**/ ?>