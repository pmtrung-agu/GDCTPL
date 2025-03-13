
<?php $__env->startSection('title', 'Chi tiết Câu hỏi'); ?>
<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.ie.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4"><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-sm btn-primary"><i class="fa fa-reply-all"></i></a> Nội dung Đề xuất - Kiến nghị</h4>
                    <div>
                        <?php $__currentLoopData = $ds['noi_dung']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $u = App\Models\User::find($nd['id_user']);
                        ?>
                        <div class="media mb-3 card-box bg-warning">
                            <div class="d-flex mr-3">
                                <?php if(isset($u['photos'][0]['aliasname']) && $u['photos'][0]['aliasname']): ?>
                                <a href="#"><img class="media-object rounded-circle avatar-sm" alt="64x64" src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_50/<?php echo e($u['photos'][0]['aliasname']); ?>"> </a>
                                <?php else: ?>
                                    <a href="#"><img class="media-object rounded-circle avatar-sm" alt="64x64" src="<?php echo e(env('APP_URL')); ?>assets/backend/images/users/avatar.png"> </a>
                                <?php endif; ?>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 bold"><?php echo e(isset($u['fullname']) ? $u['fullname'] : ''); ?></h5>
                                <p class="font-18 mb-0">
                                    <?php echo $nd['noi_dung']; ?>

                                </p>
                                <?php if($nd['photos']): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Hình ảnh</h2>
                                    </div>
                                </div>
                                <div class="row gallery">
                                    <?php $__currentLoopData = $nd['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-1">
                                            <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($p['aliasname']); ?>">
                                                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($p['aliasname']); ?>" alt="" title="<?php echo e($p['title']); ?>" style="width:100%;">
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                                <?php if($nd['attachments']): ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Đính kèm</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php $__currentLoopData = $nd['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-12">
                                            <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/de-xuat-kien-nghi/download/<?php echo e($ds['_id']); ?>/<?php echo e($k); ?>" class="text-danger"><i class="fas fa-download"></i> <?php echo e($dk['title']); ?></a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if($ds['tinh_trang'] == 0): ?>
                <div class="card-box">
                    <h3 class="m-t-0">Thêm trả lời</h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/de-xuat-kien-nghi/chi-tiet/update" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                                $noi_dung = old('noi_dung');
                            ?>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Nội dung')); ?></label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" ><?php echo e($noi_dung); ?></textarea>
                                </div>
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
                        <div class="form-actions">
                            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> <?php echo e(__('Cập nhật')); ?></button>
                        </div>
                    </form>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.gallery').photobox('a',{ time:0 });
            upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads");
            upload_files("<?php echo e(env('APP_URL')); ?>file/uploads");
            $("#progressbar").hide();delete_file();
            var options = {
                filebrowserImageBrowseUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager?type=Files',
                filebrowserUploadUrl: '<?php echo e(env('APP_URL')); ?>laravel-filemanager/upload?type=Files&_token=',
                toolbarGroups: [
                    { "name": "basicstyles", "groups": ["basicstyles"] },
                    { "name": "links", "groups": ["links"] },
                    { "name": "paragraph","groups": ["list", "blocks"] },
                    { "name": "document", "groups": ["mode"] },
                    { "name": "insert", "groups": ["insert"] },
                    { "name": "styles", "groups": ["styles"] },
                    { "name": "about", "groups": ["about"] }
                ],
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
            };
            CKEDITOR.replace('noi_dung', options);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DeXuatKienNghi/chi-tiet.blade.php ENDPATH**/ ?>