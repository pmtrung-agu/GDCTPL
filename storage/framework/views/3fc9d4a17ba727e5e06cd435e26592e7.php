<?php $__env->startSection('title', __('Chỉnh sửa Văn bản')); ?>
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
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URl')); ?>admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Chỉnh sửa Văn bản')); ?></h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban/update" method="post" id="dinhkemform" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" id="id" value="<?php echo e($ds['_id']); ?>">
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
                                if(old('so_hieu') != null){
                                    $so_hieu = old('so_hieu');$date_post = old('date_post');
                                    $trich_yeu = old('trich_yeu');$mo_ta = old('mo_ta');
                                    $tagg = old('tags');$id_don_vi = old('id_don_vi'); $ngay_ky = old('ngay_ky');
                                    $nguoi_ky = old('nguoi_ky');
                                } else if(isset($ds['so_hieu']) && $ds['so_hieu']){
                                    $so_hieu = $ds['so_hieu'];$date_post = $ds['date_post'];
                                    $trich_yeu = $ds['trich_yeu'];$mo_ta = $ds['mo_ta'];
                                    $tagg = $ds['tags'];$id_don_vi = $ds['id_don_vi']; $ngay_ky = $ds['ngay_ky'];
                                    $nguoi_ky = $ds['nguoi_ky'];
                                } else {
                                    $so_hieu = '';$date_post = App\Http\Controllers\ObjectController::setDate();$tin_moi=0;
                                    $trich_yeu = '';$mo_ta = ''; $tagg = '';$id_don_vi =''; $ngay_ky = App\Http\Controllers\ObjectController::setDate();
                                    $nguoi_ky = '';
                                }
                            ?>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Số hiệu')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" id="so_hieu" name="so_hieu" class="form-control" placeholder="<?php echo e(__('Số hệu')); ?>" value="<?php echo e($so_hieu); ?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Trích yếu')); ?></label>
                                <div class="col-12 col-md-10">
                                    <input type="text" name="trich_yeu" id="trich_yeu" class="form-control" required placeholder="<?php echo e(__('Trích yếu')); ?>" required value="<?php echo e($trich_yeu); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Đơn vị ban hành')); ?></label>
                                <div class="col-md-3">
                                    <select name="id_don_vi" id="id_don_vi" class="form-control select2" data-placeholder="Chọn đơn vị phát hành">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $don_vi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($dv['_id']); ?>" <?php if($dv['_id'] == $id_don_vi): ?> selected <?php endif; ?>><?php echo e($dv['ten']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label class="control-label col-md-1 text-right p-t-10"><?php echo e(__('Ngày ký')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="ngay_ky" name="ngay_ky" class="form-control" placeholder="<?php echo e(__(key: 'Ngày ký')); ?>" value="<?php echo e($ngay_ky); ?>"  />
                                </div>
                                <label class="control-label col-md-1 text-right p-t-10"><?php echo e(__('Ngày ký')); ?></label>
                                <div class="col-md-3">
                                    <input type="text" id="nguoi_ky" name="nguoi_ky" class="form-control" placeholder="<?php echo e(__(key: 'Người ký')); ?>" value="<?php echo e($nguoi_ky); ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Mô tả chi tiết')); ?></label>
                                <div class="col-12 col-md-10">
                                    <textarea name="mo_ta" id="mo_ta" class="form-control" required placeholder="Mô tả chi tiết: Ngày ký, Người ký, Cơ quan ban hành,..." style="height:100px;"><?php echo e($mo_ta); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Phân loại')); ?></label>
                                <div class="col-md-7">
                                    <select name="tags[]" id="tags" class="form-control select2" multiple required data-placeholder="Chọn phân loại">
                                        <option value="">Chọn phân loại</option>
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tag['slug']); ?>" <?php if(in_array($tag['slug'], $tagg)): ?> selected <?php endif; ?>><?php echo e($tag['ten']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <label class="control-label col-md-1 text-right p-t-10"><?php echo e(__('Ngày tạo')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="date_post" name="date_post" class="form-control" placeholder="<?php echo e(__('Ngày tạo')); ?>" value="<?php echo e($date_post); ?>" required />
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
                            <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
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
            delete_file();$(".select2").select2({allowClear: true});
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/VanBan/edit.blade.php ENDPATH**/ ?>