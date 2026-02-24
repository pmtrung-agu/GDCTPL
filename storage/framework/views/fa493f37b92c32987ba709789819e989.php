
<?php $__env->startSection('body'); ?>
<?php echo $__env->make('Frontend.widget-slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($danhsach): ?>
<section class="product-sesction-02 padding-bottom-100" style="margin-top:50px;">
    <div class="container">
        <div class="swin-sc swin-sc-product products-02 carousel-02">
            <div class="row">
              <div class="col-12">
                <div class="swin-sc swin-sc-title">
                  <p class="top-title"><span>Giáo dục Chính trị - Pháp luật</span></p>
                  <h3 class="title">Tài liệu</h3>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="products nav-slider">
                    <div class="row slick-padding">
                        <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    <h5 class="title text-center"><a href="<?php echo e(env('APP_URL')); ?>tai-lieu/<?php echo e($ds['slug']); ?>"><?php echo e($ds['ten']); ?></a></h5>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/GDCTPL/resources/views/Frontend/index.blade.php ENDPATH**/ ?>