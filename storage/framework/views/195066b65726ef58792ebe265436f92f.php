
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
                                <div class="row" id="gallery">
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('#gallery').photobox('a',{ time:0 });
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