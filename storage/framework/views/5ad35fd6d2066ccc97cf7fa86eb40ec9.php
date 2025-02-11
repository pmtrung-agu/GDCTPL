
<?php $__env->startSection('title', 'Chi tiết Câu hỏi'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4"><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="btn btn-sm btn-primary"><i class="fa fa-reply-all"></i></a> Nội dung Nhu cầu Chuyển đổi số Doanh nghiệp [<?php echo e($ds['nhu_cau']); ?>]</h4>
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
                                <h5 class="mt-0 bold"><?php echo e($u['fullname']); ?></h5>
                                <p class="font-18 mb-0">
                                    <?php echo $nd['noi_dung']; ?>

                                </p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if($ds['tinh_trang'] == 0): ?>
                <div class="card-box">
                    <h3 class="m-t-0">Thêm trả lời</h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/update" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Mô tả')); ?></label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" ><?php echo e($noi_dung); ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
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
    <script type="text/javascript">
        $(document).ready(function(){
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
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/nhu-cau-chi-tiet.blade.php ENDPATH**/ ?>