
<?php $__env->startSection('title', 'Biểu đồ - Dữ liệu khảo sát'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/bieu-do.blade.php ENDPATH**/ ?>