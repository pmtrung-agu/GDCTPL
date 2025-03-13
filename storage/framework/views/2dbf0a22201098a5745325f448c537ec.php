<div class="row">
    <div class="col-12">
        <strong>Người đăng: <?php echo e($dn['fullname']); ?></strong>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <strong>Nhu cầu: <?php echo e($ds['nhu_cau']); ?></strong>
    </div>
</div>
<div class="row">
    <div class="col-12"><?php echo $ds['noi_dung'][0]['noi_dung']; ?></div>
</div>
<div class="row">
    <div class="col-12" id="gallery">
        <?php if(isset($ds['photos']) && $ds['photos']): ?>
            <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($p['aliasname']); ?>">
                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($p['aliasname']); ?>" alt="<?php echo e($p['title']); ?>" title="<?php echo e($p['title']); ?>" style="width:150px;">
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KetNoiGiaoThuong/chi-tiet.blade.php ENDPATH**/ ?>