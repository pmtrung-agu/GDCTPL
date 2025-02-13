
<?php $__env->startSection('title', $ds['title']); ?>
<?php $__env->startSection('body'); ?>
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xxl-8 col-lg-7">
            <div class="th-blog blog-single">
                <div class="blog-content">
                <div class="blog-meta">
                    <h2 class="blog-title"><?php echo e($ds['title']); ?></h2>
                    <?php
                        $date_post = App\Http\Controllers\ObjectController::getDate($ds['updated_at'], "d/m/Y");
                    ?>
                    <a href="#"> <i class="fa-regular fa-calendar"></i> <?php echo e($date_post); ?></a>
                    <?php echo $ds['content']; ?>

                </div>
                </div>
                <div class="share-links clearfix">
                    <div class="row justify-content-between">
                        <?php if($ds['id_product_category']): ?>
                        <div class="col-sm-auto">
                        <span class="share-links-title">Tags:</span>
                        <div class="tagcloud">
                            <?php $__currentLoopData = $ds['id_product_category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $t = App\Models\DMSanPham::where('_id', '=', $tag)->first();
                            ?>
                                <a href="<?php echo e(env('APP_URL')); ?>thong-tin/<?php echo e($tag); ?>"><?php echo e($t['ten']); ?></a>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        </div> 
                        <?php endif; ?>
                        <div class="col-sm-auto text-xl-end">
                        <span class="share-links-title">Chia sẽ:</span>
                        <ul class="social-links">
                            <li>
                            <a href="https://facebook.com/" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            </li>
                        </ul>
                        </div>
                        <?php if(isset($ds['attachments']) && $ds['attachments']): ?>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Đính kèm</h3>
                            <div class="tagcloud">
                                <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(env('APP_URL')); ?>thong-tin/tai-ve/<?php echo e($ds['_id']); ?>/<?php echo e($kk); ?>"><i class="fa fa-file"></i> <?php echo e($dk['title']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-5">
            <?php
            $dm_thong_tin = App\Models\DMSanPham::All();
            ?>
          <aside class="sidebar-area">
            <div class="widget widget_categories">
              <h3 class="widget_title">Thông tin</h3>
              <?php if($dm_thong_tin): ?>
              <ul>
                <?php $__currentLoopData = $dm_thong_tin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dmtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(env('APP_URL')); ?>san-pham/<?php echo e($dmtt['slug']); ?>"><?php echo e($dmtt['ten']); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </div>
            
          </aside>
        </div>
      </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/san-pham-chi-tiet.blade.php ENDPATH**/ ?>