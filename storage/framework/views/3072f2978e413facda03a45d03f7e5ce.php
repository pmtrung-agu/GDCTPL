
<?php $__env->startSection('title', 'Danh mục Lĩnh vực'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/linh-vuc/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Lĩnh vực</h3>
                    <?php if($namhoc): ?>
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Số ngành nghề</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $namhoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            //$id_dm_linh_vuc = App\Http\Controllers\ObjectController::ObjectId($ct['_id']);
                            $so_nn = App\Models\DMNganhNghe::where('id_dm_linh_vuc', '=', $ct['_id'])->count();
                        ?>
                            <tr>
                                <td class="text-center"><?php echo e($k+1); ?></td>
                                <td><?php echo e($ct['ten']); ?></td>
                                <td class="text-center"><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe?id_linh_vuc=<?php echo e($ct['_id']); ?>" target="_blank"><?php echo e($so_nn); ?></a></td>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/linh-vuc/delete/<?php echo e($ct['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/linh-vuc/edit/<?php echo e($ct['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
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
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/LinhVuc/list.blade.php ENDPATH**/ ?>