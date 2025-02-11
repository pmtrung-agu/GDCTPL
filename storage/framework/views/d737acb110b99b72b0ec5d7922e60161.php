
<?php $__env->startSection('title', __('Chỉnh sửa thông tin doanh nghiệp')); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<?php
$arr_quy_mo = array('Nhỏ', 'Vừa', 'Siêu Nhỏ', ' Khác')
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URl')); ?>admin/doanh-nghiep" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Chỉnh sửa thông tin doanh nghiệp')); ?></h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/update" method="post" id="dinhkemform" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($ds['_id']); ?>" id="id">
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
                                    $ten = old('ten'); $slug = old('slug');
                                    $nguoidaidien = old('nguoidaidien');$masothue = old('masothue');
                                    $dienthoai = old('dienthoai'); $email = old('email'); $website = old('website');
                                    $mota = old('mota');$ngaygianhaphiephoi = old('ngaygianhaphiephoi'); $trangthai = old('trangthai');
                                    $diachi = old('address'); $nganhnghe_id = old('nganhnghe_id');$hoivienhiephoi = old('hoivienhiephoi');
                                    $ngay_thanh_lap = old('ngay_thanh_lap'); $quy_mo = old('quy_mo');
                                } else if(isset($ds['ten']) && $ds['ten']){
                                    $ten = $ds['ten']; $slug = $ds['slug'];$nguoidaidien = $ds['nguoidaidien'];
                                    $thu_tu = $ds['thu_tu']; $mota = $ds['mota'];$masothue = $ds['masothue'];
                                    $dienthoai = $ds['dienthoai']; $email = $ds['email'];$website = $ds['website'];
                                    $ngaygianhaphiephoi = Carbon\Carbon::parse($ds['ngaygianhaphiephoi'])->format("d/m/Y");
                                    $trangthai = $ds['trangthai']; $diachi = $ds['diachi'];$nganhnghe_id = $ds['nganhnghe_id'];$hoivienhiephoi = $ds['hoivienhiephoi'];
                                    $ngay_thanh_lap = $ds['ngay_thanh_lap'];$quy_mo = $ds['quy_mo'];
                                } else {
                                    $ten = '';$mota = '';$slug='';$thu_tu=0;$mo_ta = '';$trangthai=0;$diachi = '';
                                    $nganhnghe_id = '';$hoivienhiephoi = 0;
                                    $ngaygianhaphiephoi = App\Http\Controllers\ObjectController::setDate_dmY();
                                    $ngay_thanh_lap = '';$quy_mo='';
                                }
                            ?>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Tên')); ?></label>
                                <div class="col-md-4">
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="<?php echo e(__('Tên')); ?>" value="<?php echo e($ten); ?>" required />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Slug')); ?></label>
                                <div class="col-md-4">
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="<?php echo e(__('slug')); ?>" value="<?php echo e($slug); ?>" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00"><?php echo e(__('Người đại diện')); ?></label>
                                <div class="col-md-4">
                                    <input type="text" id="nguoidaidien" name="nguoidaidien" class="form-control" placeholder="<?php echo e(__('Người đại diện')); ?>" value="<?php echo e($nguoidaidien); ?>" required />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Mã số thuế')); ?></label>
                                <div class="col-md-4">
                                    <input type="text" id="masothue" name="masothue" class="form-control" placeholder="<?php echo e(__('Mã số thuế')); ?>" value="<?php echo e($masothue); ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00"><?php echo e(__('Ngày thành lập')); ?></label>
                                <div class="col-md-4">
                                    <input type="text" id="ngay_thanh_lap" name="ngay_thanh_lap" class="form-control" placeholder="<?php echo e(__('Ngày thành lập')); ?>" value="<?php echo e($ngay_thanh_lap); ?>" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Quy mô')); ?></label>
                                <div class="col-md-4">
                                    <select name="quy_mo" id="quy_mo" class="form-control" required>
                                        <option value="">Quy mô</option>
                                        <?php $__currentLoopData = $arr_quy_mo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($qm); ?>" <?php if($qm == $quy_mo): ?> selected <?php endif; ?>><?php echo e($qm); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00"><?php echo e(__('Điện thoại')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="dienthoai" name="dienthoai" class="form-control" placeholder="<?php echo e(__('Điện thoại')); ?>" value="<?php echo e($dienthoai); ?>" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Email')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e($email); ?>" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-00"><?php echo e(__('Website')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="website" name="website" class="form-control" placeholder="<?php echo e(__('Website')); ?>" value="<?php echo e($website); ?>" />
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
                                                    <option value="<?php echo e($a['ma']); ?>" <?php if($a['ma'] == $diachi[0]): ?> selected <?php endif; ?> ><?php echo e($a['ten']); ?></option>
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
                                            <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="<?php echo e($diachi[3]); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Mô tả')); ?></label>
                                <div class="col-md-10">
                                    <textarea name="mota" id="mota" class="form-control" ><?php echo e($mota); ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Ngành nghề')); ?></label>
                                <div class="col-md-3">
                                    <select name="nganhnghe_id" id="nganhnghe_id" class="form-control select2" required data-placeholder="Ngành nghể">
                                        <option value="">Ngành nghề</option>
                                        <?php $__currentLoopData = $nganhnghe; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($nn['_id']); ?>" <?php if($nn['_id'] == $nganhnghe_id): ?> selected <?php endif; ?>><?php echo e($nn['ten']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>                                
                                <div class="col-md-3 switchery-demo">
                                    <b><?php echo e(__('Trạng thái')); ?>: </b>
                                    <input type="checkbox" name="trangthai" id="trangthai" <?php if($trangthai): ?> checked="checked" <?php endif; ?> class="js-switch" data-plugin="switchery" data-color="#009efb" value="1" <?php if($trangthai): ?> checked <?php endif; ?>/>
                                    Hội viên HHDN:&nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name="hoivienhiephoi" id="hoivienhiephoi" <?php if($hoivienhiephoi): ?> checked="checked" <?php endif; ?> class="js-switch" data-plugin="switchery" data-color="#009efb" value="1"/>
                                </div>
                                
                                <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Ngày gia nhập HHDN')); ?></label>
                                <div class="col-md-2">
                                    <input type="text" id="ngaygianhaphiephoi" name="ngaygianhaphiephoi" class="form-control" placeholder="<?php echo e(__('Ngày gia nhập HHDN')); ?>" value="<?php echo e($ngaygianhaphiephoi); ?>" />
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
                            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
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
            <?php if($diachi[0]): ?>
                $.get("<?php echo e(env('APP_URL')); ?>admin/dia-chi/get/<?php echo e($diachi[0]); ?>/<?php echo e($diachi[1]); ?>", function(huyen){
                    $("#address_2").html(huyen);
                });
            <?php endif; ?>
            <?php if($diachi[1]): ?>
                $.get("<?php echo e(env('APP_URL')); ?>admin/dia-chi/get/<?php echo e($diachi[1]); ?>/<?php echo e($diachi[2]); ?>", function(xa){
                    $("#address_3").html(xa);
                });
            <?php endif; ?>
            chontinh("<?php echo e(env('APP_URL')); ?>");
            chonhuyen("<?php echo e(env('APP_URL')); ?>");
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
            CKEDITOR.replace('mota', options);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/edit.blade.php ENDPATH**/ ?>