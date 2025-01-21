
<?php $__env->startSection('title', 'Phân tích Dữ liệu khảo sát theo Ngành nghề'); ?>

<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát theo Ngành nghề: <?php echo e($so_luong); ?> </h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/khao-sat-muc-do-cds/theo-nganh-nghe" method="GET" id="ThongKeForm">
                        <div class="row form-group">
                            <div class="col-12 col-md-6">
                                <select name="nganh_nghe" id="nganh_nghe" class="form-control" required>
                                    <option value="">Ngành nghề</option>
                                    <?php $__currentLoopData = $nganh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nnn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($nnn['_id'][4]); ?>" <?php if($nn == $nnn['_id'][4]): ?> selected <?php endif; ?> ><?php echo e($nnn['_id'][4]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        
        <?php if($nn): ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i></h3>
                    <h4>Biểu đồ Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của <?php echo e($nn); ?></h4>
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
                                foreach($nganh as $nnn){ 
                                   $sum[$nnn['_id'][4]] = 0;
                                }
                            ?>
                            <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $count_nn= App\Models\CDSKhaoSat::where(4,'=', $nnn['_id'][4])->count();
                                $danhsach_nn = App\Models\CDSKhaoSat::where(4,'=',$nnn['_id'][4])->get();
                                $sum[$b3[3]] = 0;
                                foreach($danhsach_nn as $dsh) {
                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                }
                                if($count_nn > 0) $tl = $sum[$b3[3]]/$count_nn;
                                else $tl = 0;
                                $sum[$nnn['_id'][4]] += $tl;
                                $rada_data[] = round($tl,1);
                                $rada_label[]  = $b3[1];                            
                            ?>
                            <tr>
                                <td><?php echo e($b3[0]); ?></td>
                                <td><?php echo e($b3[1]); ?></td>
                                <td class="text-center"><?php echo e(number_format($tl ,1,".",",")); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Biểu đồ Radar</h4>
                    <h4 class="text-center">Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của <?php echo e($nn); ?></h4>
                    <div id="rada_Chart"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i></h3>
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
                                $dn_b1 = App\Models\CDSKhaoSat::where(4,'=',$nn)->first();
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
                    <h4 class="text-center">Rào cản chuyển đổi số của </h4>
                    <div id="bar_chart" class="flot-chart"></div>
                </div>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chart.min.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/chartjs-plugin-datalabels@2.0.0.js" type="text/javascript"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/apexcharts.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){        
        <?php if($nn): ?>
            //rada_option
            var rada_options = {
                series: [{
                name: 'Mức độ sẵn sàng bình quân',
                data: <?php echo json_encode($rada_data); ?>,
                }],
                chart: {
                height: 350,
                type: 'radar',
                },
                dataLabels: {
                enabled: true
                },
                plotOptions: {
                radar: {
                    size: 140,
                    polygons: {
                    strokeColors: '#e9e9e9',
                    fill: {
                        colors: ['#f8f8f8', '#fff']
                    }
                    }
                }
                },
                title: {
                text: ''
                },
                colors: ['#FF4560'],
                markers: {
                size: 4,
                colors: ['#fff'],
                strokeColor: '#FF4560',
                strokeWidth: 2,
                },
                tooltip: {
                y: {
                    formatter: function(val) {
                    return val
                    }
                }
                },
                xaxis: {
                    categories: <?php echo json_encode($rada_label, JSON_UNESCAPED_UNICODE ); ?>

                },
                yaxis: {
                labels: {
                    formatter: function(val, i) {
                    if (i % 2 === 0) {
                        return val
                    } else {
                        return ''
                    }
                    }
                }
                }
            };
            
            //Chart bar
            var bar_options = {
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
        
            var bar_chart = new ApexCharts(document.querySelector("#bar_chart"), bar_options);
            bar_chart.render();

            var rada_chart = new ApexCharts(document.querySelector("#rada_Chart"), rada_options);
            rada_chart.render();
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/nganh-nghe.blade.php ENDPATH**/ ?>