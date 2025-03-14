
<?php $__env->startSection('body'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Ngành nghề</h3>
                    <?php if($danhsach): ?>
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Ngành nghề</th>
                                <th>Lĩnh Vực</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $lv = App\Models\DMLinhVuc::find($ct['id_dm_linh_vuc']);
                            if($lv) $ten_lv = $lv['ten'];
                            else $ten_lv = '';
                        ?>
                            <tr>
                                <td class="text-center"><?php echo e($k+1); ?></td>
                                <td><?php echo e($ct['ten']); ?></td>
                                <td><?php echo e($ten_lv); ?></td>
                                <td class="text-center" style="width:80px;">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe/delete/<?php echo e($ct['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe/edit/<?php echo e($ct['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/NganhNghe/list.blade.php ENDPATH**/ ?>