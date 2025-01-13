
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="box-header">
                        <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Chỉnh sửa Ngành nghề</h3>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo e(env('APP_URL')); ?>admin/danh-muc/nganh-nghe/update" method="POST" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" value="<?php echo e($ct['_id']); ?>">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Họ tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="<?php echo e($ct['ten']); ?>" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Lĩnh  vực</label>
                                <div class="col-10">
                                    <select name="id_dm_linh_vuc" id="id_dm_linh_vuc" class="form-control select2" data-placeholder="Chọn Lĩnh vực">
                                        <option value="">Lĩnh vực</option>
                                        <?php $__currentLoopData = $dm_linh_vuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lv['_id']); ?>" <?php if($lv['_id'] == $ct['id_dm_linh_vuc']): ?> selected <?php endif; ?>><?php echo e($lv['ten']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-10">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="<?php echo e($ct['ghi_chu']); ?>" class="form-control" placeholder="Ghi chú">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/js/select2.min.js" type="text/javascript"></script>
     <script type="text/javascript">
         $(document).ready(function(){
            $(".select2").select2();
         });
     </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/NganhNghe/edit.blade.php ENDPATH**/ ?>