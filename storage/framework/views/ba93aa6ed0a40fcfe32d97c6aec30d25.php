
<?php $__env->startSection('title', 'Tài liệu'); ?>

<?php $__env->startSection('body'); ?>
<div class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Tài liệu</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
</div>

<section class="product-sesction-02 padding-bottom-100">
    <div class="container">
        <div class="swin-sc swin-sc-product products-02 carousel-02">
            <div class="row">
                <div class="products nav-slider">
                    <div class="row slick-padding">
                        <?php for($i=1;$i<=9;$i++): ?>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-item item swin-transition">
                                <div class="block-img"><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/images/default_thumb.jpg" alt="" class="img img-responsive"></div>
                                <div class="block-content">
                                <h5 class="title"><a href="javascript:void(0)">GDCT - PL Cơ bản</a></h5>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\GDCTPL\resources\views/Frontend/tai-lieu.blade.php ENDPATH**/ ?>