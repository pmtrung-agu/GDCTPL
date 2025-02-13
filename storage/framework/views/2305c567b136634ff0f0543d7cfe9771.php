
<?php $__env->startSection('title', $tax['ten']); ?>
<?php $__env->startSection('body'); ?>
<?php if($danhsach): ?>
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Tài liệu chuyển đổi số</span>
            <h2 class="sec-title sec-title2"><span><?php echo e($tax['ten']); ?></span> </h2>
        </div>
      <div class="row">
        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $date_post = App\Http\Controllers\ObjectController::getDate($tt['date_post'], "d/m/Y");
        ?>
        <div class="col-xxl-4 col-lg-4 col-md-4">
          <div class="th-blog blog-single has-post-thumbnail">
            <div class="blog-img">
              <a href="<?php echo e(env('APP_URL')); ?>tai-lieu-chi-tiet/<?php echo e($tt['slug']); ?>">
                <?php if(isset($tt['photos'][0]['aliasname']) && $tt['photos'][0]['aliasname']): ?>
                  <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($tt['photos'][0]['aliasname']); ?>" alt="<?php echo e($tt['ten']); ?>">
                <?php else: ?>
                  <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
                <?php endif; ?>
              </a>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <a href="<?php echo e(env('APP_URL')); ?>tai-lieu-chi-tiet/<?php echo e($tt['slug']); ?>">
                  <i class="fa-regular fa-calendar"></i> <?php echo e($date_post); ?> </a>
              </div>
              <h2 class="blog-title">
                <a href="<?php echo e(env('APP_URL')); ?>tai-lieu-chi-tiet/<?php echo e($tt['slug']); ?>"><?php echo e($tt['ten']); ?></a>
              </h2>
              <p class="blog-text"><?php echo e($tt['mo_ta']); ?></p>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/tai-lieu.blade.php ENDPATH**/ ?>