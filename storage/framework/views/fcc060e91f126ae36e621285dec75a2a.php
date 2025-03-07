
<?php $__env->startSection('title', 'Chỉnh sửa mới danh mục Đơn vị'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="box-header">
                <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/don-vi" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Danh mục Đơn vị</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo e(env('APP_URL')); ?>admin/danh-muc/don-vi/update" method="POST" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="id" id="id" value="<?php echo e($ds['_id']); ?>">
                            <div class="form-group row">
                                <label class="col-2 col-form-label text-right">Tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="<?php echo e($ds['ten']); ?>" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Điện thoại</label>
                                        <div class="col-md-4">
                                            <input type="text" id="dien_thoai" name="dien_thoai" class="form-control" placeholder="Điện thoại" value="<?php echo e($ds['dien_thoai']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-4">
                                            <select class="select2 m-b-10" id="address_1" name="address[]" style="width: 100%" data-placeholder="Chọn Tỉnh">
                                                <option value="">Tỉnh</option>}
                                                <?php if($address): ?>
                                                  <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($a['ma']); ?>" <?php if($a['ma'] == $ds['dia_chi'][0]): ?> selected <?php endif; ?> ><?php echo e($a['ten']); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_2" name="address[]" style="width: 100%" data-placeholder="Chọn Huyện, Tp">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_3" name="address[]" style="width: 100%" data-placeholder="Chọn Xã, phường, TT">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="<?php echo e($ds['dia_chi'][3]); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
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

    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
            <?php if($ds['dia_chi'][0]): ?>
                $.get("<?php echo e(env('APP_URL')); ?>admin/dia-chi/get/<?php echo e($ds['dia_chi'][0]); ?>/<?php echo e($ds['dia_chi'][1]); ?>", function(huyen){
                    $("#address_2").html(huyen);
                });
            <?php endif; ?>
            <?php if($ds['dia_chi'][1]): ?>
                $.get("<?php echo e(env('APP_URL')); ?>admin/dia-chi/get/<?php echo e($ds['dia_chi'][1]); ?>/<?php echo e($ds['dia_chi'][2]); ?>", function(xa){
                    $("#address_3").html(xa);
                });
            <?php endif; ?>
            chontinh("<?php echo e(env('APP_URL')); ?>");
            chonhuyen("<?php echo e(env('APP_URL')); ?>");
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/DonVi/edit.blade.php ENDPATH**/ ?>