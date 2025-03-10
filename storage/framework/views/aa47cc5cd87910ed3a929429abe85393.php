
<?php $__env->startSection('title', $ds['tieu_de']); ?>
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
                    <h2><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao" class="btn btn-primary btn-sm"><i class="fa fa-reply-all"></i> Trở về</a> <?php echo e($ds['tieu_de']); ?></h2>
                    <div class="lead">
                    <?php echo $ds['noi_dung']; ?>

                    </div>
                    <?php if($ds['photos']): ?>
                    <div class="row">
                        <div class="col-12">
                            <h2>Hình ảnh</h2>
                        </div>
                    </div>
                    <div class="row" id="gallery">
                        <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-3">
                                <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($p['aliasname']); ?>">
                                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($p['aliasname']); ?>" alt="" title="<?php echo e($p['title']); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    <?php if($ds['attachments']): ?>
                    <div class="row">
                        <div class="col-12">
                            <h2>Đính kèm</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-12">
                                <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/thong-bao/download/<?php echo e($ds['_id']); ?>/<?php echo e($k); ?>"><i class="fas fa-download"></i> <?php echo e($dk['title']); ?></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#gallery').photobox('a',{ time:0 });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/ThongBao/chi-tiet.blade.php ENDPATH**/ ?>