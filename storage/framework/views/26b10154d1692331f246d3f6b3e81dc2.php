
<?php $__env->startSection('title', 'Doanh nghiệp tham gia'); ?>
<?php $__env->startSection('body'); ?>
<br />
<section class="cta-sec" style="margin: 100px 0x 0x -30px;" >
    <div class="container">
      <div class="cta-area space-extra2 bg-theme text-center" data-bg-src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/bg/cta_shape_1.png">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="title-area mb-25 mt-n2 text-center">
              <span class="sub-title sub-title6">Doanh nghiệp tham gia Chuyển đổi số</span>
            </div>
            <form class="newsletter-form" method="GET" action="<?php echo e(env('APP_URL')); ?>doanh-nghiep/doanh-nghiep-tham-gia">
              <input class="form-control" name="q" id="q" value="<?php echo e($q); ?>" type="text" placeholder="Tìm kiếm Doanh nghiệp" />
              <button type="submit" class="th-btn style4">Tìm kiếm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="space" id="service-sec">
    <div class="container">
      <?php if($danhsach): ?>
      <div class="row gy-4 justify-content-center">
        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-4 col-md-6">
          <div class="service-featured style3">
            <div class="box-img">
            <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
            <img src="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>" style="max-width:100%;">
            <?php else: ?>
              <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/service_1_1.png" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>">
            <?php endif; ?>
            </div>
            <h3 class="box-title">
              <a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/chi-tiet/<?php echo e($ds['slug']); ?>"><?php echo e($ds['ten']); ?></a>
            </h3>
            <p class="box-text"><?php echo e($ds['ghi_chu']); ?></p>
            <a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/chi-tiet/<?php echo e($ds['slug']); ?>" class="th-btn">Xem chi tiết <i class="fa-regular fa-arrow-right"></i>
            </a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div class="row">
        <div class="col-12">
            <?php if($q): ?>
                <?php echo e($danhsach->withPath(env('APP_URL').'doanh-nghiep/doanh-nghiep-tham-gia?' . $_SERVER['QUERY_STRING'])); ?>    
            <?php else: ?>
            <?php echo e($danhsach->withPath(env('APP_URL').'doanh-nghiep/doanh-nghiep-tham-gia')); ?>    
            <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/doanh-nghiep-tham-gia.blade.php ENDPATH**/ ?>