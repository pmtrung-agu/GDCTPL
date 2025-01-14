
<?php $__env->startSection('title', 'Phân tích Dữ liệu khảo sát theo Doanh nghiệp'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát theo doanh nghiệp: <?php echo e($so_luong); ?> </h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/khao-sat-muc-do-cds/theo-doanh-nghiep" method="GET" id="ThongKeForm">
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <select name="linh_vuc" id="linh_vuc" class="form-control" required>
                                    <option value="">Chọn Lĩnh vực</option>
                                    <?php $__currentLoopData = $linhvuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lvv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lvv['_id'][3]); ?>" <?php if($lv == $lvv['_id'][3]): ?> selected <?php endif; ?> ><?php echo e($lvv['_id'][3]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="doanh_nghiep" id="doanh_nghiep" class="form-control" required>
                                    <option value="">Chọn Doanh nghiệp</option>
                                    <?php if($doanh_nghiep): ?>
                                        <?php $__currentLoopData = $doanh_nghiep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dnn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <option value="<?php echo e($dnn[1]); ?>" <?php if($dnn[1] == $dn): ?> selected <?php endif; ?>> <?php echo e($dnn[1]); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button name="submit" id="submit" value="OK" class="btn btn-primary">Đồng ý</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> <?php echo e($dn); ?> </h3>
                    <h4>Biểu đồ Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Trụ cột</th>
                                <th>Mức độ sẵn sàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dn_b3 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                            ?>
                            <tr>
                                <td><?php echo e($b3[0]); ?></td>
                                <td><?php echo e($b3[1]); ?></td>
                                <td class="text-center"><?php echo e(number_format($dn_b3[$b3[3]],1,".",",")); ?></td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Radar Chart</h4>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> <?php echo e($dn); ?> </h3>
                    <h4>Biểu đồ rào cản chuyển đổi số</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Rào cản, khó khăn</th>
                                <th>Mức độ khó khăn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $bang_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dn_b1 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                            ?>
                            <tr>
                                <td><?php echo e($b1[0]); ?></td>
                                <td><?php echo e($b1[1]); ?></td>
                                <td class="text-center"><?php echo e(number_format($dn_b1[$b1[2]],1,".",",")); ?></td>
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#linh_vuc").change(function() {
            var _link = "<?php echo e(env('APP_URL')); ?>admin/khao-sat-muc-do-cds/doanh-nghiep/" + $(this).val();
            $.get(_link, function(html){
                $("#doanh_nghiep").html(html);
                $("#doanh_nghiep").select2();
            });
        })
        $("#doanh_nghiep").select2();
        const radarChart = document.getElementById('radarChart');
        new Chart(radarChart, { type: 'radar',
            data: {
                labels: [
                    'Trải nghiệm số cho khách hàng',
                    'Chiến lược số',
                    'Hạ tầng và Công nghệ số',
                    'Vận hành',
                    'Chuyển đổi số văn hóa doanh nghiệp',
                    'Dữ liệu và tài sản thông tin'
                ],
                datasets: [{
                    label: 'Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của ' + "<?php echo e($dn); ?>",
                    data: [4, 3, 2, 3, 5, 2],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)' 
                }]
            }, options: { 
                scales: {
                    r: {
                        angleLines: { display: true },
                        suggestedMin: 0,
                        suggestedMax: 5
                    }
                }
            }
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/doanh-nghiep.blade.php ENDPATH**/ ?>