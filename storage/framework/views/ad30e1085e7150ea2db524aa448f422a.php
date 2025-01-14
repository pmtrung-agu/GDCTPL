
<?php $__env->startSection('title', 'Dữ liệu khảo sát'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát: <?php echo e($so_luong); ?> </h3>
                    <div class="row">
                        <div class="col-12 col-md-7 card-box">
                            <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 1: Phân tích rào cản, khó khăn về chuyển đổi số:</strong></h4>
                            <table class="table table-border table-striped table-bodered">
                                <thead>                                   
                                    <tr>
                                        <?php for($i=0;$i<=3;$i++): ?>
                                            <th><?php echo e($bang_1[0][$i]); ?></th>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($row=1;$row<=9;$row++): ?>
                                    <tr>
                                        <?php for($col=0;$col<=3;$col++): ?>
                                            <?php if($col==3): ?>
                                                <td class="bold"><?php echo e($bang_1[$row][$col]*100); ?>%</td>
                                            <?php else: ?> 
                                            <td><?php echo e($bang_1[$row][$col]); ?></td>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-5 card-box">
                            <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 2: Phân bổ doanh nghiệp theo huyện/thị:</strong></h4>
                            <table class="table table-border table-striped table-bodered">
                                <thead>                                   
                                    <tr>
                                        <th>Huyện/Thị</th>
                                        <th>Số lượng doanh nghiệp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongcong = 0; ?>
                                    <?php $__currentLoopData = $huyen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $sl = App\Models\CDSKhaoSat::where(6,'=',$h['_id'][6])->count();
                                        $tongcong += $sl;
                                    ?>
                                    <tr>
                                        <td><?php echo e($h['_id'][6]); ?></td>
                                        <td class="text-right"><?php echo e($sl); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bold">
                                        <th>Tổng cộng</th>
                                        <th class="bold text-right"><?php echo e($tongcong); ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-12">
                                <h4 style="font-size:20px;" class="text-danger"><strong>**Bảng 3: Mức độ chuyển đổi số theo huyện/thị: [Thang điểm tối đa: 320]</strong></h4>
                                <table class="table table-border table-striped table-bodered">
                                    <thead>                                   
                                        <tr>
                                            <th rowspan="2">STT</th>
                                            <th rowspan="2">Trụ cột</th>
                                            <th rowspan="2">Trọng số trụ cột</th>
                                            <th colspan="<?php echo e(count($huyen)); ?>">Huyện/thị: <?php echo e(count($huyen)); ?></th>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $huyen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e($h['_id'][6]); ?></th>
                                                <?php $sum[ $h['_id'][6]] = 0 ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($b3[0]); ?></td>
                                            <td><?php echo e($b3[1]); ?></td>
                                            <td class="text-right"><?php echo e($b3[2]*100); ?>%</td>
                                            <?php $__currentLoopData = $huyen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $count_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->count();
                                                $danhsach_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->get();
                                                $sum[$b3[3]] = 0;
                                                foreach($danhsach_h as $dsh) {
                                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                                }
                                                if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
                                                else $tl = 0;
                                                $sum[ $h['_id'][6]] += ($tl * $b3[2]) ;
                                            ?>
                                                <th><?php echo e(round($tl, 1)); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bold bg-warning">
                                            <th colspan="3">Mức độ chuyển đổi số</th>
                                            <?php $__currentLoopData = $huyen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $h): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e(round($sum[ $h['_id'][6]],1)); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-6">
                                <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 4: Phân bổ doanh nghiệp tham gia khảo sát theo ngành (%)</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>
                                            <tr>
                                                <th>Ngành</th>
                                                <th>Số lượng doanh nghiệp</th>
                                                <th>Đơn vị (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tt = App\Models\CDSKhaoSat::count(); ?>
                                            <?php $__currentLoopData = $nganh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $sl = App\Models\CDSKhaoSat::where(4,'=',$nn['_id'][4])->count(); ?>
                                            <tr>
                                                <td><?php echo e($nn['_id'][4]); ?></td>
                                                <td class="text-right"><?php echo e($sl); ?></td>
                                                <td class="text-right"><?php echo e(round($sl/$tt * 100,1)); ?>%</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bold bg-warning">
                                                <th>Tổng Cộng</th>
                                                <th class="text-right"><?php echo e($tt); ?></th>
                                                <th class="text-right">100%</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 7: Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của doanh nghiệp tỉnh An Giang</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>                                   
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Trụ cột</th>
                                                <th rowspan="2">Mức độ sẵn sàng bình quân</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $sum_b7 = 0;
                                                foreach($danhsach as $ds) {
                                                    $sum_b7 += intval($ds[$b3[3]]);
                                                }
                                                $mdss = $sum_b7/$tt;
                                                    
                                            ?>
                                            <tr>
                                                <td><?php echo e($b3[0]); ?></td>
                                                <td><?php echo e($b3[1]); ?></td>
                                                <td class="text-right"><?php echo e(round($mdss,1)); ?></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                 <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 5: Phân bổ doanh nghiệp theo lĩnh vực</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>
                                            <tr>
                                                <th>Lĩnh vực</th>
                                                <th>Số lượng doanh nghiệp</th>
                                                <th>Đơn vị (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $tt = App\Models\CDSKhaoSat::count(); ?>
                                            <?php $__currentLoopData = $linhvuc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $sl = App\Models\CDSKhaoSat::where(3,'=',$lv['_id'][3])->count(); ?>
                                            <tr>
                                                <td><?php echo e($lv['_id'][3]); ?></td>
                                                <td class="text-right"><?php echo e($sl); ?></td>
                                                <td class="text-right"><?php echo e(round($sl/$tt * 100,1)); ?>%</td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="bold bg-warning">
                                                <th>Tổng Cộng</th>
                                                <th class="text-right"><?php echo e($tt); ?></th>
                                                <th class="text-right">100%</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-box">
                                <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 6: Mức độ chuyển đổi số của doanh nghiệp</strong></h4>
                                <?php $arr_mucdo = array(0,1,2,3,4,5)  ?>
                                <table class="table table-border table-striped table-bodered">
                                    <thead>
                                        <tr>
                                            <th>Mức độ</th>
                                            <th>Số lượng Doanh nghiệp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $arr_mucdo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $md): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $sl = App\Models\CDSKhaoSat::where(84, '=', strval($md))->count(); ?>
                                        <tr>
                                            <td><?php echo e($md); ?></td>
                                            <td class="text-right"><?php echo e($sl); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>

                        <div class="row card-box">
                            <div class="col-12 col-md-12">
                                <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 8: Mức độ sẵn sàng chuyển đổi số theo ngành</strong></h4>
                                <table class="table table-border table-striped table-bordered">
                                    <thead>                                   
                                        <tr>
                                            <th rowspan="2">STT</th>
                                            <th rowspan="2">Trụ cột</th>
                                            <th rowspan="2">Trọng số trụ cột</th>
                                            <th colspan="<?php echo e(count($nganh)); ?>">Ngành nghề kinh doanh: <?php echo e(count($nganh)); ?></th>
                                        </tr>
                                        <tr>
                                            <?php $__currentLoopData = $nganh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e($nn['_id'][4]); ?></th>
                                                <?php $sum[$nn['_id'][4]] = 0; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $bang_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($b3[0]); ?></td>
                                            <td><?php echo e($b3[1]); ?></td>
                                            <td class="text-right"><?php echo e($b3[2]*100); ?>%</td>
                                           <?php $__currentLoopData = $nganh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $count_h = App\Models\CDSKhaoSat::where(4,'=', strval($n1['_id'][4]))->count();
                                                $danhsach_h = App\Models\CDSKhaoSat::where(4,'=', $n1['_id'][4])->get();
                                                $sum[$b3[3]] = 0;
                                                foreach($danhsach_h as $dsh) {
                                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                                }
                                                if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
                                                else $tl = 0;
                                                $sum[$n1['_id'][4]] += ($tl * $b3[2]) ;
                                                 ?>
                                                <th class="text-right"><?php echo e(round($tl, 1)); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bold bg-warning">
                                            <th colspan="3">Mức độ chuyển đổi số</th>
                                            <?php $__currentLoopData = $nganh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <th class="text-right"><?php echo e(round($sum[$nn['_id'][4]],1)); ?></th>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/phan-tich.blade.php ENDPATH**/ ?>