
<?php $__env->startSection('title', 'Thêm danh mục tài liệu'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
<?php $__env->stopSection(); ?>
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
                        <form action="<?php echo e(env('APP_URL')); ?>admin/danh-muc/tai-lieu/create" method="POST" class="form-horizontal" id="dinhkemform" enctype="multipart/form-data">
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
                                <label class="col-2 col-form-label">Thuộc cấp trên</label>
                                <div class="col-10">
                                    <select name="id_parent" id="id_parent" class="form-control select2"  data-placeholder="Chọn Thuộc cấp">
                                    <option value="">Chọn phân loại</option>
                                    <?php $__currentLoopData = $danhmuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($dm['_id']); ?>" <?php if($id_parent==$dm['_id']): ?> selected <?php endif; ?>><?php echo e($dm['ten']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-4">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="<?php echo e(old('ghi_chu')); ?>" class="form-control" placeholder="Ghi chú">
                                </div>
                                <label class="col-2 col-form-label">Thứ tự</label>
                                <div class="col-4">
                                    <input type="number" name="thu_tu" id="thu_tu" value="<?php echo e(old('thu_tu')); ?>" class="form-control" placeholder="Thứ tự">
                                </div>
                            </div>
                            <div class="card-box bg-light">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="btn btn-danger">
                                                    <input type="file" name="hinhanh_files[]" class="hinhanh_files btn btn-primary" multiple accept="image/png, image/jpeg, image/jpg, image/gif" placeholder="Chọn hình ảnh" style="display:none;" />
                                                    <i class="fa fa-images"></i> <?php echo e(__('Chọn Hình ảnh')); ?> : (jpg, png, bmp)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="list_hinhanh">
                                    <?php if(old('hinhanh_aliasname')): ?>
                                        <?php $__currentLoopData = old('hinhanh_aliasname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-6 col-md-4 items draggable-element text-center">
                                                <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e(old('hinhanh_aliasname')[$k]); ?>" readonly/>
                                                <input type="hidden" name="hinhanh_filename[]" class="form-control" value="<?php echo e(old('hinhanh_filename')[$k]); ?>" />
                                                <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e(old('hinhanh_aliasname')[$k]); ?>" class="image-popup">
                                                <div class="portfolio-masonry-box">
                                                <div class="portfolio-masonry-img">
                                                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e(old('hinhanh_aliasname')[$k]); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                                                </div>
                                                <div class="portfolio-masonry-detail">
                                                    <p><?php echo e(old('hinhanh_filename')[$k]); ?></p>
                                                </div>
                                                </div>
                                                </a>
                                                <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e(old('hinhanh_aliasname')[$k]); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="text" name="hinhanh_title[]" class="form-control" value="<?php echo e(old('hinhanh_title')[$k]); ?>" />
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php elseif(isset($ds['photos']) && $ds['photos']): ?>
                                        <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-6 col-md-4 items draggable-element text-center">
                                                <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($photo['aliasname']); ?>" readonly/>
                                                <input type="hidden" name="hinhanh_filename[]" class="form-control" value="<?php echo e($photo['filename']); ?>" />
                                                <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($photo['aliasname']); ?>" class="image-popup">
                                                <div class="portfolio-masonry-box">
                                                <div class="portfolio-masonry-img">
                                                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($photo['aliasname']); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                                                </div>
                                                <div class="portfolio-masonry-detail">
                                                    <p><?php echo e($photo['filename']); ?></p>
                                                </div>
                                                </div>
                                                </a>
                                                <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($photo['aliasname']); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <input type="text" name="hinhanh_title[]" class="form-control" value="<?php echo e($photo['title']); ?>" />
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="progress m-b-20" id="progressbar">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
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
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        delete_file();$(".select2").select2();
        upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads");
        $("#progressbar").hide();
        $("#ten").keyup(function(){
            $.get("<?php echo e(env('APP_URL')); ?>slug/" + $(this).val(), function(s){
                $("#slug").val(s);
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Admin/DanhMuc/TaiLieu/add.blade.php ENDPATH**/ ?>