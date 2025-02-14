
<?php $__env->startSection('title', content: 'Doanh nghiệp:' . $ds['ten']); ?>
<?php $__env->startSection('body'); ?>
<section class="space">
    <div class="container">
      <div class="team-details">
        <div class="row">
          <div class="col-xl-5">
            <div class="mb-40 mb-xl-0">
                <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                    <img class="w-100"  src="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>" style="max-width:100%;">
                <?php else: ?>
                    <img class="w-100"  src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/service_1_1.png" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>">
                <?php endif; ?>
            </div>
          </div>
          <div class="col-xl-7 ps-3 ps-xl-5 align-self-center">
            <div class="team-about">
              <div class="team-wrapp">
                <div>
                  <h3 class="team-about_title"><?php echo e($ds['ten']); ?></h3>
                  <p class="team-about_desig"><?php echo e($ds['diachi'][3]); ?></p>
                  
                </div>
                
              </div>
              <div class="about-info-wrap">
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fa-solid fa-user"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Người đại diện</p>
                    <h6 class="about-info_title"><?php echo e($ds['nguoidaidien']); ?></h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Email</p>
                    <h6 class="about-info_title">
                      <a href="mailto:<?php echo e($ds['email']); ?>"><?php echo e($ds['email']); ?></a>
                    </h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Điện thoại</p>
                    <h6 class="about-info_title">
                      <a href="tel:<?php echo e($ds['dienthoai']); ?>"><?php echo e($ds['dienthoai']); ?></a>
                    </h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-fax"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Mã số thuế</p>
                    <h6 class="about-info_title">
                      <a href="#"><?php echo e($ds['masothue']); ?></a>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/doanh-nghiep-chi-tiet.blade.php ENDPATH**/ ?>