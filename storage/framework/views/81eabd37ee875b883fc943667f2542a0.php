
<?php $__env->startSection('title', __('Thêm mới Câu hỏi Tư vấn Chuyển đổi số')); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URl')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Thêm mới Nhu cầu Chuyển đổi số')); ?></h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so/create" method="post" id="dinhkemform" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

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
                            
                                $nganhnghe_id = old('nganhnghe_id');
                                $noi_dung = old('noi_dung');
                                $nc = old('nhu_cau');
                            ?>
                            <div class="row form-group">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Ngành nghề')); ?></label>
                                <div class="col-md-4">
                                    <select name="nganhnghe_id" id="nganhnghe_id" class="form-control select2" required data-placeholder="Ngành nghể">
                                        <option value="">Ngành nghề</option>
                                        <?php $__currentLoopData = $nganhnghe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($nn['_id']); ?>" <?php if(strval($nn['_id'] == $nganhnghe_id)): ?> selected <?php endif; ?>><?php echo e($nn['ten']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>   
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Nhu cầu')); ?></label>
                                <div class="col-md-4">
                                    <select name="nhu_cau" id="nhu_cau" class="form-control select2" required data-placeholder="Nhu cầu">
                                        <option value="">Nhu cầu</option>
                                        <?php $__currentLoopData = $nhu_cau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ncc); ?>" <?php if(strval($nc == $ncc)): ?> selected <?php endif; ?>><?php echo e($ncc); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>   
                            </div>
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
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
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
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/nhu-cau-add.blade.php ENDPATH**/ ?>