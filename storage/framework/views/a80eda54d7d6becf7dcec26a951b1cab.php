
<?php $__env->startSection('title', 'Biểu đồ - Dữ liệu khảo sát'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-5', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-7', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-9', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-12 col-md-6">
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-4', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Admin.KhaoSatCDS.bieu-do-8', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chart.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chartjs-plugin-datalabels@2.0.0.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/apexcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Chart bar
            var chart1 = new ApexCharts(document.querySelector("#Chart_1"), chart1_options);
            var chart2 = new ApexCharts(document.querySelector("#Chart_2"), chart2_options);
            var chart3 = new ApexCharts(document.querySelector("#Chart_3"), chart3_options);
            var chart4 = new ApexCharts(document.querySelector("#Chart_4"), chart4_options);
            var chart5 = new ApexCharts(document.querySelector("#Chart_5"), chart5_options);
            var chart6 = new ApexCharts(document.querySelector("#Chart_6"), chart6_options);
            var chart7 = new ApexCharts(document.querySelector("#Chart_7"), chart7_options);
            var chart8 = new ApexCharts(document.querySelector("#Chart_8"), chart8_options);
            var chart9 = new ApexCharts(document.querySelector("#Chart_9"), chart9_options);
            chart1.render(); chart2.render();chart3.render();chart4.render();chart5.render();
            chart6.render();chart7.render();chart8.render();chart9.render();
            
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/bieu-do.blade.php ENDPATH**/ ?>