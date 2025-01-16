
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
                                    <?php if($doanh_nghiep && count($doanh_nghiep) > 0): ?>
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
        
        <?php if($lv && $dn): ?>
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
                            <?php
                                $rada_label=[]; $rada_data=[];
                            ?>
                            <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dn_b3 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                                $rada_label[] = $b3[1];
                                $rada_data[] = round($dn_b3[$b3[3]],1);
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
                    <h4 class="header-title">Biểu đồ Radar</h4>
                    <h4 class="text-center">Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của <?php echo e($dn); ?></h4>
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
                            <?php $bar_label=[]; $bar_data=[]; ?>
                            <?php $__currentLoopData = $bang_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $dn_b1 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                                $bar_label[] = $b1[0] .'. ' . $b1[1];
                                $bar_data[] = doubleval($dn_b1[$b1[2]]);
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
                    <h4 class="header-title">Biểu đồ Horizontal Bar</h4>
                    <h4 class="text-center">Rào cản chuyển đổi số  của <?php echo e($dn); ?></h4>
                    <div id="ChartBar" class="flot-chart"></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>


<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chartjs-plugin-datalabels@2.0.0.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/apexcharts.js" type="text/javascript"></script>

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
        <?php if($lv && $dn): ?>
            const radarChart = document.getElementById('radarChart');
            Chart.register(ChartDataLabels);
            new Chart(radarChart, { type: 'radar',
                plugins: [ChartDataLabels],
                data: {
                    labels: <?php echo json_encode($rada_label, JSON_UNESCAPED_UNICODE ); ?>,
                    datasets: [{
                        label: 'Mức độ sẵn sàng',
                        data: <?php echo json_encode($rada_data); ?>,
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                    }]
                }, options: { 
                    scales: {
                        r: {
                            angleLines: { display: true },
                            pointLabels: {
                                fontSize: 14,
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                min: 0,
                                max: 5,
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 5
                        }
                    },
                    plugins: {
                        // Change options for ALL labels of THIS CHART
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.dataset.borderColor;
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold'
                            },
                            padding: 3,
                        }
                    }
                }
            });

            //Chart bar
            var optionsBar = {
                series: [{
                    data: <?php echo json_encode($bar_data); ?>

                }],
                chart: {
                    type: 'bar',
                    height: 600
                },
                plotOptions: {
                    bar: {
                        barHeight: '100%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'bottom'
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#000']
                    },
                    formatter: function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    },
                    offsetX: 0,
                    dropShadow: {
                        enabled: false
                    }
                },
                stroke: {
                    width: 5,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: <?php echo json_encode($bar_label, JSON_UNESCAPED_UNICODE ); ?>,
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: true
                    },
                    y: {
                        title: {
                            formatter: function () {return '' },

                        }
                    }
                }
            };
        var chart = new ApexCharts(document.querySelector("#ChartBar"), optionsBar);
        chart.render();
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/doanh-nghiep.blade.php ENDPATH**/ ?>