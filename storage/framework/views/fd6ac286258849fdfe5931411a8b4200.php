<?php $__env->startSection('title', __('Sửa Thông tin Tài liệu Chuyển đổ số')); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/tai-lieu" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Sửa Tài liệu Giáo dục Chính trị - Pháp luật')); ?></h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/tai-lieu/update" method="post" id="dinhkemform" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" id="id" value="<?php echo e($ds['_id']); ?>" placeholder="">
                        <div class="form-body">
                            <hr />
                            <?php if($errors->any()): ?>
                                <div class="alert alert-success">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php
                                if(old('ten') != null){
                                    $ten = old('ten'); $noi_dung = old('noi_dung');$slug = old('slug');
                                    $thu_tu = old('thu_tu'); $mo_ta = old('mo_ta');
                                    $date_post = old('date_post');$tin_moi = old('tin_moi');
                                } else if(isset($ds['ten']) && $ds['ten']){
                                    $ten = $ds['ten']; $noi_dung = $ds['noi_dung'];$slug = $ds['slug'];
                                    $thu_tu = $ds['thu_tu']; $mo_ta = $ds['mo_ta'];$date_post = $ds['date_post'];$tin_moi = $ds['tin_moi'];
                                } else {
                                    $ten = '';$noi_dung = '';$slug='';$thu_tu=0;$mo_ta = ''; $date_post = App\Http\Controllers\ObjectController::setDate();$tin_moi=0;
                                }
                            ?>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Tên')); ?></label>
                                <div class="col-md-10">
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="<?php echo e(__('Tên')); ?>" value="<?php echo e($ten); ?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Slug')); ?></label>
                                <div class="col-md-10">
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="<?php echo e(__('slug')); ?>" value="<?php echo e($slug); ?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Mô tả')); ?></label>
                                <div class="col-12 col-md-10">
                                    <textarea name="mo_ta" id="mo_ta" class="form-control" required placeholder="<?php echo e(__('Mô tả nội dung')); ?>" style="height:100px;"><?php echo e($mo_ta); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Nội dung')); ?></label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" required><?php echo e($noi_dung); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__(key: 'Phân loại')); ?></label>
                                <?php
                                    $t = old('tags') != null ? old('tags') : $ds['tags'];
                                ?>
                                <div class="col-md-10">
                                    <select name="tags[]" id="tags" class="form-control select2" multiple required>
                                        <option value="">Chọn phân loại</option>
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ktag => $vtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($vtag['slug']); ?>" <?php if(in_array($vtag['slug'], $t)): ?> selected <?php endif; ?>><?php echo e($vtag['ten']); ?></option>
                                            <?php
                                                $p = App\Http\Controllers\ObjectController::ObjectId($vtag['_id']);
                                                $childs = App\Models\DMTaiLieu::where('id_parent','=', $p)->orderBy('thu_tu', 'asc')->get();
                                            ?>
                                            <?php if($childs): ?>
                                                <?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($c['slug']); ?>" <?php if(in_array($c['slug'], $t)): ?> selected <?php endif; ?>>   |--- <?php echo e($c['ten']); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__(key: 'Ngày tạo')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="date_post" name="date_post" class="form-control" placeholder="<?php echo e(__('Ngày tạo')); ?>" value="<?php echo e($date_post); ?>" required />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Thứ tự')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="thu_tu" name="thu_tu" class="form-control" placeholder="<?php echo e(__('Thứ tự')); ?>" value="<?php echo e($thu_tu); ?>" required />
                                </div>
                                <div class="col-md-2 switchery-demo">
                                    <b><?php echo e(__('Tin mới')); ?>: </b>
                                    <input type="checkbox" name="tin_moi" id="tin_moi" class="js-switch" data-plugin="switchery" data-color="#009efb" value="1" <?php if($tin_moi): ?> checked <?php endif; ?>/>
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
                            <div class="card-box" style="background-color:#eee;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label class="btn btn-info">
                                                    <input type="file" name="dinhkem_files[]" class="dinhkem_files btn btn-primary" multiple accept="*" placeholder="Chọn tập tin đính kèm" style="display:none;" />
                                                    <i class="mdi mdi mdi-attachment"></i> <?php echo e(__('Chọn Đính kèm')); ?> : (pdf, xlsx, docx, pptx, zip, ....)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="list_files">
                                <?php if(old('file_aliasname')): ?>
                                    <?php $__currentLoopData = old('file_aliasname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-group row items draggable-element">
                                        <input type="hidden" name="file_aliasname[]" value="<?php echo e($dk); ?>" readonly/>
                                        <input type="hidden" name="file_filename[]" value="<?php echo e(old('file_filename')[$key]); ?>" class="form-control"/>
                                        <div class="col-12">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="hidden" name="file_size[]" value="<?php echo e(old('file_size')[$key]); ?>" class="form-control">
                                            <input type="hidden" name="file_type[]" value="<?php echo e(old('file_type')[$key]); ?>" class="form-control">
                                            <input type="text" name="file_title[]" placeholder="<?php echo e(__('Chú thích tập tinh đính kèm')); ?>" value="<?php echo e(old('file_title')[$key]); ?>" class="form-control">
                                            <div class="input-group-append">
                                                <a href="<?php echo e(env('APP_URL')); ?>file/delete/<?php echo e($dk); ?>" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif(isset($ds['attachments']) && $ds['attachments']): ?>
                                        <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group row items draggable-element">
                                            <input type="hidden" name="file_aliasname[]" value="<?php echo e($dk['aliasname']); ?>" readonly/>
                                            <input type="hidden" name="file_filename[]" value="<?php echo e($dk['filename']); ?>" class="form-control"/>
                                            <div class="col-12">
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input type="hidden" name="file_size[]" value="<?php echo e($dk['size']); ?>" class="form-control">
                                                <input type="hidden" name="file_type[]" value="<?php echo e($dk['type']); ?>" class="form-control">
                                                <input type="text" name="file_title[]" placeholder="<?php echo e(__('Chú thích tập tinh đính kèm')); ?>" value="<?php echo e($dk['title']); ?>" class="form-control">
                                                <div class="input-group-append">
                                                    <a href="<?php echo e(env('APP_URL')); ?>file/delete/<?php echo e($dk['aliasname']); ?>" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="<?php echo e(env('APP_URL')); ?>admin/tai-lieu" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> <?php echo e(__('Cập nhật')); ?></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            delete_file();$(".select2").select2();
            var options = {
                filebrowserImageBrowseUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager?type=Files',
                filebrowserUploadUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager/upload?type=Files&_token='
            };
            upload_files("<?php echo e(env('APP_URL')); ?>file/uploads");
            upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads");
            $("#ten").change(function(){
                var title = $(this).val();
                $.get("<?php echo e(env('APP_URL')); ?>slug/" + title, function(slug){
                    $("#slug").val(slug);
                });
            });
            $("#progressbar").hide();
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            CKEDITOR.replace('noi_dung', options);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/GDCTPL/resources/views/Admin/TaiLieu/edit.blade.php ENDPATH**/ ?>