
<?php $__env->startSection('title', 'Dữ liệu khảo sát'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Dữ liệu khảo sát Mức độ chuyển đổi số của Doanh nghiệp: <?php echo e($so_luong); ?> </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Lĩnh vực hoạt động</th>
                                <th>Ngành nghề</th>
                                <th>Ngày thành lập</th>
                                <th>Địa chỉ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td><?php echo e($ds['stt']); ?></td> 
                                   <td><a href="<?php echo e(env('APP_URL')); ?>admin/khao-sat-muc-do-cds/chi-tiet/<?php echo e($ds['_id']); ?>"><?php echo e($ds[1]); ?></a></td>
                                   <td><?php echo e($ds[2]); ?></td>
                                   <td><?php echo e($ds[3]); ?></td>
                                   <td><?php echo e($ds[4]); ?></td>
                                   <td><?php echo e(date("d/m/Y", strtotime($ds[5]))); ?></td>
                                   <td><?php echo e($ds[7]); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($danhsach->withPath(env('APP_URL').'admin/khao-sat-muc-do-cds')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/du-lieu.blade.php ENDPATH**/ ?>