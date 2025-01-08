
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="box-header">
                <h3><a href="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Danh mục Tài liệu</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu/create" method="POST" class="form-horizontal" role="form">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="<?php echo e(old('ten')); ?>" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">SLUG</label>
                                <div class="col-10">
                                    <input type="slug" name="slug" class="form-control" id="slug" value="<?php echo e(old('ten')); ?>" placeholder="SLUG" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-10">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="<?php echo e(old('ghi_chu')); ?>" class="form-control" placeholder="Ghi chú">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Thứ tự</label>
                                <div class="col-4">
                                    <input type="number" name="thu_tu" id="thu_tu" value="<?php echo e(old('thu_tu')); ?>" class="form-control" placeholder="Thứ tự">
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#ten").keyup(function(){
            $.get("<?php echo e(env('APP_URL')); ?>slug/" + $(this).val(), function(s){
                $("#slug").val(s);
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DanhMuc/TaiLieu/add.blade.php ENDPATH**/ ?>