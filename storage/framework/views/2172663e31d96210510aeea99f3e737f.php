
<?php $__env->startSection('body'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu/add?id_parent=<?php echo e($id_parent); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Tài liệu</h3>
                    <?php if($id_parent): ?>
                    <?php
                        $ds = App\Models\DMTaiLieu::find($id_parent);
                    ?>
                        <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu"><i class="fa fa-home"></i> Trở về Home</a> 
                        <i class="fas fa-angle-double-right"></i> <?php echo e($ds['ten']); ?>

                    <?php endif; ?>
                    <?php if($danhsach): ?>
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình</th>
                                <th>Tên</th>
                                <th>Thứ tự</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center"><?php echo e($k+1); ?></td>
                                <td>
                                    <?php if(isset($ct['photos'][0]['aliasname']) && $ct['photos'][0]['aliasname']): ?>
                                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_50/<?php echo e($ct['photos'][0]['aliasname']); ?>" alt="<?php echo e($ct['ten']); ?>">                                        
                                    <?php else: ?>
                                        <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo-sm.png" alt="<?php echo e($ct['ten']); ?>">
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($ct['id_parent'] == ''): ?>
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu?id_parent=<?php echo e($ct['_id']); ?>"><?php echo e($ct['ten']); ?></a>
                                    <?php else: ?>  
                                        <?php echo e($ct['ten']); ?>

                                    <?php endif; ?>
                                    <span class="badge badge-warning"><small><?php echo e($ct['slug']); ?></small></span>
                                </td>
                                <td class="text-center"><?php echo e($ct['thu_tu']); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu/delete/<?php echo e($ct['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu/edit/<?php echo e($ct['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Admin/DanhMuc/TaiLieu/list.blade.php ENDPATH**/ ?>