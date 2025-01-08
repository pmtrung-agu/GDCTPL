<?php $__env->startSection('title', __('Tin tức Sự kiện')); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 card-box">
                <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/thong-tin/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> <?php echo e(__('Thêm mới')); ?></a> <?php echo e(__('Danh sách Thông tin')); ?></h3>
                <hr />
                <form method="GET" action="<?php echo e(env('APP_URL')); ?>admin/thong-tin">
                    <div class="row form-group">
                        <div class="col-12 col-md-4">
                            <input type="text" name="keywords" id="keywords" value="<?php echo e($keywords); ?>" placeholder="Tìm Tên" class="form-control">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" name="submit" value="Search" class="btn btn-primary"><i class="fa fa-search"></i> <?php echo e(__('Tìm')); ?></button>
                        </div>
                    </div>
                </form>
                <?php if($danhsach): ?>
                <table class="table table-border table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width:55px;"><?php echo e(__('STT')); ?></th>
                            <th style="width:55px;"><?php echo e(__('Hình')); ?></th>
                            <th><?php echo e(__('Tên')); ?></th>
                            <th  style="width:100px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($key+1); ?></td>
                            <td class="text-center">
                                <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                                <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($ds['photos'][0]['aliasname']); ?>" class="image-popup">
                                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_50/<?php echo e($ds['photos'][0]['aliasname']); ?>" title="<?php echo e($ds['ho_ten']); ?>" alt="<?php echo e($ds['ho_ten']); ?>" style="height:30px;">
                                </a>
                                <?php else: ?>
                                    <?php echo e(__('NO PIC')); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(env('APP_URL')); ?>thong-tin-chi-tiet/<?php echo e($ds['slug']); ?>" target="_blank"><strong><?php echo e($ds['ten']); ?></strong></a>
                                    <span class="badge badge-info"><?php echo e(App\Http\Controllers\ObjectController::getDate($ds['date_post'],"d/m/Y H:i")); ?></span>
                                <?php if(isset($ds['tin_moi']) && $ds['tin_moi']): ?>
                                    <span class="badge badge-danger">NEW</span>
                                <?php endif; ?>
                                <?php if(isset($ds['tags']) && $ds['tags']): ?>
                                    <?php $__currentLoopData = $ds['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($t == $tag['path']): ?>
                                                <span class="badge badge-success"><?php echo e($tag['title']); ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="<?php echo e(env('APP_URL')); ?>admin/thong-tin/delete/<?php echo e($ds['_id']); ?>" onclick="return confirm('Chắc chắc xóa?')"><i class="fas fa-trash text-danger"></i></a>&nbsp;
                                <a href="<?php echo e(env('APP_URL')); ?>admin/thong-tin/edit/<?php echo e($ds['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                    <?php if($keywords): ?>
                        <?php echo e($danhsach->withPath(env('APP_URL').'admin/thong-tin?' . $_SERVER['QUERY_STRING'])); ?>

                    <?php else: ?>
                        <?php echo e($danhsach->withPath(env('APP_URL') . 'admin/thong-tin')); ?>

                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/isotope/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
            <?php if(Session::get('msg') != null && Session::get('msg')): ?>
            $.toast({
                heading:"Thông báo",
                text:"<?php echo e(Session::get('msg')); ?>",
                loaderBg:"#3b98b5",icon:"info", hideAfter:3e3,stack:1,position:"top-right"
            });
            <?php endif; ?>
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/ThongTin/list.blade.php ENDPATH**/ ?>