
<?php $__env->startSection('title', 'Sản phẩm'); ?>
<?php $__env->startSection('body'); ?>
<?php if($danhsach): ?>
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Sản phẩm Doanh nghiệp tham gia</span>
            <h2 class="sec-title sec-title2"><span><?php echo e($tax['ten']); ?></span> </h2>
        </div>
        <div class="row">
            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="th-blog blog-single has-post-thumbnail">
                  <div class="blog-img" style="height:200px; overflow: hidden;">
                    <a href="<?php echo e(env('APP_URL')); ?>san-pham-chi-tiet/<?php echo e($ds['slug']); ?>">
                      <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['ten']); ?>">
                      <?php else: ?>
                        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
                      <?php endif; ?>
                    </a>
                  </div>
                  <div class="blog-content">
                    
                    <h2 class="blog-title" style="font-size: 18px;height:45px;overflow: hidden;">
                      <a href="<?php echo e(env('APP_URL')); ?>san-pham-chi-tiet/<?php echo e($ds['slug']); ?>"><?php echo e($ds['title']); ?></a>
                    </h2>
                    
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php echo e($danhsach->withPath(env('APP_URL').'san-pham/' . $tax['slug'])); ?>

    </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/san-pham.blade.php ENDPATH**/ ?>