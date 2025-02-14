
<?php $__env->startSection('title', 'Danh sách chuyên gia tư vấn chuyển đổi số doanh nghiệp'); ?>

<?php $__env->startSection('body'); ?>
<section class="space" id="service-sec">
    <div class="container">
      <div class="row justify-content-center justify-content-lg-between">
        <div class="col-lg-7">
          <div class="title-area text-center text-lg-start">
            
            <h2 class="sec-title sec-title2">Danh sách Chuyên gia Tư vấn Chuyển đổi số.</h2>
          </div>
        </div>
        <div class="col-auto">
          <div class="sec-btn">
            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so" class="th-btn">Gởi câu hỏi</a>
          </div>
        </div>
      </div>
      <?php if($danhsach): ?>
      <div class="row gy-4 justify-content-center">
        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-4 col-md-6">
          <div class="service-featured style3">
            <div class="box-img">
            <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
            <img src="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['fullname']); ?>" title="<?php echo e($ds['fullname']); ?>" style="max-width:100%;">
            <?php else: ?>
              <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/service_1_1.png" alt="<?php echo e($ds['fullname']); ?>" title="<?php echo e($ds['fullname']); ?>">
            <?php endif; ?>
            </div>
            <h3 class="box-title">
              <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so"><?php echo e($ds['fullname']); ?></a>
            </h3>
            <p class="box-text"><?php echo e($ds['ghi_chu']); ?></p>
            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so" class="th-btn">Gởi câu hỏi tư vấn <i class="fa-regular fa-arrow-right"></i>
            </a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/chuyen-gia.blade.php ENDPATH**/ ?>