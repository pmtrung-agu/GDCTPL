
<?php $__env->startSection('title', 'Kết nối giao thương'); ?>
<?php $__env->startSection('body'); ?>
<section class="th-blog-wrapper space-top" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="title-area text-center">
                    <span class="sub-title sub-title2">Thông tin Doanh nghiệp</span>
                    <h2 class="sec-title sec-title2"><span>Kết nối giao thương</span> </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-9 justify-content-between">
                <span class="share-links-title" style="float:left;margin-top:8px;">Nhu cầu:</span>
                <div class="tagcloud">
                    <a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/ket-noi-giao-thuong">Tất cả</a>
                    <?php $__currentLoopData = $nhu_cau; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(env('APP_URL')); ?>doanh-nghiep/ket-noi-giao-thuong?nc=<?php echo e($ncc); ?>"><?php echo e($ncc); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/add" class="th-btn d-none d-xl-block bg-success" title="Kết nối giao thương" style="padding:10px 0px 10px 0px;"><i class="fab fa-connectdevelop"></i> Gởi nhu cầu kết nối</a>
            </div>
        </div>
    </div>
</section>
<?php if($danhsach): ?>
<div class="overflow-hidden" id="faq-sec" style="margin-bottom:20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="accordion-area accordion" id="faqAccordion">
                    <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $dn = App\Models\User::find($ds['id_user']);
                        $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                    ?>
                    <div class="accordion-card style3 <?php if($k == 0): ?> active <?php endif; ?>">
                        <div class="accordion-header" id="collapse-item-<?php echo e($ds['_id']); ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo e($ds['_id']); ?>" aria-expanded="false" aria-controls="collapse-<?php echo e($ds['_id']); ?>">[<?php echo e($nn['ten']); ?>] <?php echo e($dn['fullname']); ?> : <?php echo e($ds['nhu_cau']); ?> </button>
                        </div>
                        <div id="collapse-<?php echo e($ds['_id']); ?>" class="accordion-collapse collapse <?php if($k==0): ?> show <?php endif; ?>" aria-labelledby="collapse-item-<?php echo e($ds['_id']); ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            <p class="faq-text"><?php echo $ds['noi_dung'][0]['noi_dung']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($danhsach->withPath(env('APP_URL').'doanh-nghiep/ket-noi-giao-thuong?nc=' . $nc)); ?>

                </div>
            </div>
            
        </div>
    </div>
</div>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/ket-noi-giao-thuong.blade.php ENDPATH**/ ?>