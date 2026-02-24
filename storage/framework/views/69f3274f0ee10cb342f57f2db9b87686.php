
<?php $__env->startSection('title', 'Tài liệu'); ?>

<?php $__env->startSection('body'); ?>
<div class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title"><?php echo e($tax['ten']); ?></div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
</div>
<?php if($child_tax): ?>
<section class="product-sesction-02 padding-bottom-100">
    <div class="container">
        <div class="swin-sc swin-sc-product products-02 carousel-02">
            <div class="row">
                <div class="products nav-slider">
                    <div class="row slick-padding">
                        <?php $__currentLoopData = $child_tax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-item item swin-transition">
                                <div class="block-img">
                                    <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($ds['photos'][0]['aliasname']); ?>" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>" class="img img-responsive" style="height:200px;">
                                    <?php else: ?> 
                                        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/default_thumb.jpg" alt="<?php echo e($ds['ten']); ?>" title="<?php echo e($ds['ten']); ?>" class="img img-responsive" style="height:200px;">
                                    <?php endif; ?>
                                </div>
                                <div class="block-content">
                                    <h5 class="title"><a href="<?php echo e(env('APP_URL')); ?>tai-lieu/<?php echo e($ds['slug']); ?>"><?php echo e($ds['ten']); ?></a></h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if($danhsach): ?>
<section class="product-sesction-02 padding-bottom-100">
    <div class="container">
        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-12">
                <div class="swin-btn-wrap center">
                    <a href="<?php echo e(env('APP_URL')); ?>chi-tiet-tai-lieu/<?php echo e($tl['slug']); ?>" class="swin-btn center form-submit btn-transparent" style="font-size:30px;width:90%;color:#d10700;background: #ffff00;line-height:35px;"> <span>	<?php echo e($tl['ten']); ?> </span></a>
                </div>
            </div>
        </div>
        <hr />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/GDCTPL/resources/views/Frontend/tai-lieu-taxonomy.blade.php ENDPATH**/ ?>