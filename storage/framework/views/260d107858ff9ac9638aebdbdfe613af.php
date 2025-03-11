
<?php $__env->startSection('title', 'Thông báo của Hiệp hội Doanh nghiệp tỉnh An Giang'); ?>
<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.ie.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="overflow-hidden space" id="faq-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title-area">
                    <h2 class="sec-title">Thông báo của HHDN</h2>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="widget widget_search" style="padding:0px !important;">
                    <form class="search-form" action="<?php echo e(env('APP_URL')); ?>doanh-nghiep/thong-bao-cua-hhdn" method="GET" id="SearchForm">
                      <input type="text" placeholder="Tìm kiếm" name="q" id="q" value="<?php echo e($q); ?>">
                      <button type="submit">
                        <i class="far fa-search"></i>
                      </button>
                    </form>
                  </div>
            </div>
        </div>
        <?php if($danhsach): ?>
        <div class="row justify-content-center">
            <div class="col-lg-12">
            <div class="accordion-area accordion" id="faqAccordion">
                <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-card style3 style1">
                    <div class="accordion-header" id="collapse-item-<?php echo e($ds['_id']); ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($ds['_id']); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($ds['_id']); ?>"><?php echo e($ds['tieu_de']); ?></button>
                    </div>
                    <div id="collapse-<?php echo e($ds['_id']); ?>" class="accordion-collapse collapse" aria-labelledby="collapse-item-<?php echo e($ds['_id']); ?>" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Ngày: <?php echo e(\Carbon\Carbon::parse($ds['updated_at'])->format("d/m/Y H:i")); ?></p>
                            <?php echo $ds['noi_dung']; ?>

                            <?php if($ds['photos']): ?>
                                <h5>Hình ảnh: </h5>
                                <div class="row" id="gallery">
                                    <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-3">
                                            <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($p['aliasname']); ?>">
                                                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($p['aliasname']); ?>" alt="<?php echo e($p['title']); ?>" title="<?php echo e($p['title']); ?>" style="width:100%;">
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <br />
                            <?php if($ds['attachments']): ?>
                                <h5>Đính kèm: </h5>
                                <table class="table table-border table-bordered table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Nội dung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kdk => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(env ('APP_URL')); ?>doanh-nghiep/thong-bao-cua-hhdn/tai-ve/<?php echo e($ds['_id']); ?>/<?php echo e($kdk); ?>">
                                                    <?php echo e($dk['title']); ?>

                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php echo e($danhsach->withPath(env('APP_URL').'doanh-nghiep/thong-bao-cua-hhdn?q='.$q)); ?>

            </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#gallery').photobox('a',{ time:0 });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/thong-bao-hhdn.blade.php ENDPATH**/ ?>