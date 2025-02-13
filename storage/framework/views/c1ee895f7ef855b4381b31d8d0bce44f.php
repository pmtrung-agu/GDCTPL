
<?php $__env->startSection('title', $ds['ten']); ?>
<?php $__env->startSection('body'); ?>
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xxl-8 col-lg-7">
            <div class="th-blog blog-single">
                <div class="blog-content">
                <div class="blog-meta">
                    <h2 class="blog-title"><?php echo e($ds['ten']); ?></h2>
                    <?php
                        $date_post = App\Http\Controllers\ObjectController::getDate($ds['date_post'], "d/m/Y");
                    ?>
                    <a href="#"> <i class="fa-regular fa-calendar"></i> <?php echo e($date_post); ?></a>
                    <?php echo $ds['noi_dung']; ?>

                </div>
                </div>
                <div class="share-links clearfix">
                    <div class="row justify-content-between">
                        <?php if($ds['tags']): ?>
                        <div class="col-sm-auto">
                        <span class="share-links-title">Tags:</span>
                        <div class="tagcloud">
                            <?php $__currentLoopData = $ds['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $t = App\Models\DMTaiLieu::where('slug', '=', $tag)->first();
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
            $dm_thong_tin = App\Models\DMTaiLieu::All();
            ?>
          <aside class="sidebar-area">
            <div class="widget widget_categories">
              <h3 class="widget_title">Thông tin</h3>
              <?php if($dm_thong_tin): ?>
              <ul>
                <?php $__currentLoopData = $dm_thong_tin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dmtt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(env('APP_URL')); ?>tai-lieu/<?php echo e($dmtt['slug']); ?>"><?php echo e($dmtt['ten']); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <?php endif; ?>
            </div>
            <?php if($bai_viet_moi): ?>
            <div class="widget">
              <h3 class="widget_title">Bài viết gần nhất</h3>
                <div class="recent-post-wrap">
                    <?php $__currentLoopData = $bai_viet_moi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bvm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="<?php echo e(env('APP_URL')); ?>thong-tin-chi-tiet/<?php echo e($bvm['slug']); ?>">
                                <?php if(isset($bvm['photos'][0]['aliasname']) && $bvm['photos'][0]['aliasname']): ?>
                                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($bvm['photos'][0]['aliasname']); ?>" alt="<?php echo e($bvm['ten']); ?>">
                                <?php else: ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/blog/recent-post-1-1.jpg" alt="<?php echo e($bvm['ten']); ?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title">
                            <a class="text-inherit" href="<?php echo e(env('APP_URL')); ?>thong-tin-chi-tiet/<?php echo e($bvm['slug']); ?>" title="<?php echo e($bvm['ten']); ?>" alt="<?php echo e($bvm['ten']); ?>"><?php echo e(Str::limit($bvm['ten'], 50)); ?></a>
                            </h4>
                            <?php
                                $date_post = App\Http\Controllers\ObjectController::getDate($bvm['date_post'], "d/m/Y");
                            ?>
                            <div class="recent-post-meta">
                            <a href="<?php echo e(env('APP_URL')); ?>thong-tin-chi-tiet/<?php echo e($bvm['slug']); ?>"><?php echo e($date_post); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>
          </aside>
        </div>
      </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/tai-lieu-chi-tiet.blade.php ENDPATH**/ ?>