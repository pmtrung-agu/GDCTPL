
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('Frontend.widget-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($thong_tin): ?>
<section class="blog-section padding-top-100 padding-bottom-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="swin-sc swin-sc-title">
          <p class="top-title"><span>Giáo dục Chính trị - Pháp luật</span></p>
          <h3 class="title">Tin tức mới nhất</h3>
        </div>
        <div class="swin-sc swin-sc-blog-grid"></div>
      </div>
      <div class="col-md-12">
        <div class="swin-sc swin-sc-blog-grid">
          <div class="row">
            <?php $__currentLoopData = $thong_tin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div data-wow-delay="0s" class="blog-item swin-transition item wow fadeInUpShort">
                  <div class="blog-featured-img">
                    <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                    <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_370x280/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['title']); ?>" title="<?php echo e($ds['title']); ?>" class="img img-responsive">
                    <?php else: ?>
                    <img src="<?php echo e(env('APP_URL')); ?>assets/images/default_thumb.jpg" alt="<?php echo e($ds['title']); ?>" title="<?php echo e($ds['title']); ?>" class="img img-responsive">
                    <?php endif; ?>
                  </div>
                  <div class="blog-content">
                    <h3 class="blog-title"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet/<?php echo e($ds['slug']); ?>" class="swin-transition" title="<?php echo e($ds['title']); ?>" alt="<?php echo e($ds['title']); ?>"><?php echo e(Str::limit($ds['title'],60)); ?></a></h3>
                    <p class="blog-description"><?php echo e(Str::limit($ds['description'],400)); ?></p>
                    <div class="blog-readmore"><a href="<?php echo e(env('APP_URL')); ?>chi-tiet/<?php echo e($ds['slug']); ?>" class="swin-transition">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
          </div>
        </div>
      </div>
    </div>
    <?php echo e($thong_tin->withPath(env('APP_URL'))); ?>

  </div>
</section>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Frontend/index.blade.php ENDPATH**/ ?>