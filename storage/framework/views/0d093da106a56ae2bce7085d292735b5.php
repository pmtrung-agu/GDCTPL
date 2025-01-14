
<?php $__env->startSection('title', 'Chi tiết - Dữ liệu khảo sát'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Thông tin Doanh nghiệp: <?php echo e($ds[1]); ?> </h3>
                    <table class="table table-border table-striped table-bodered">
                        <tbody>
                            <tr>
                                <th>Tên Doanh nghiệp</th>
                                <td><?php echo e($ds[1]); ?></td>
                            </tr>                           
                            <tr>
                                <th>Người đại diện</th>
                                <td><?php echo e($ds[2]); ?></td>
                            </tr>
                            <tr>
                                <th>Lĩnh vực hoạt động</th>
                                <td><?php echo e($ds[3]); ?></td>
                            </tr>           
                            <tr>
                                <th>Ngành nghề kinh doanh</th>
                                <td><?php echo e($ds[4]); ?></td>
                            </tr>           
                            <tr>
                                <th>Ngày thành lập</th>
                                <td><?php echo e($ds[5]); ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td><?php echo e($ds[7]); ?></td>
                            </tr>
                            <tr>
                                <th>Điện thoại</th>
                                <td><?php echo e($ds[8]); ?></td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td><?php echo e($ds[9]); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo e($ds[10]); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-calendar-check"></i>
                                <h3 class="text-white"><?php echo e($ds[83]); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Tổng điểm</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fe-life-buoy"></i>
                                <h3 class="text-white"><?php echo e($ds[84]); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Mức độ chuyển đổi số DN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h2 class="text-center">PHẦN A</h2> 
                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 1: Trải nghiệm số cho khách hàng </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <?php $j=1; ?>
                                <?php for($i=11; $i<=19; $i++): ?>                                     
                                    <th>1.1.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <?php $j=1; ?>
                                <?php for($i=20; $i<=23; $i++): ?>                                     
                                    <th>1.2.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=11;$i<=25;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>
                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 2: Chiến lược </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>2.1.1</th>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=26;$i<=28;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 3: Hạ tầng và Công nghệ số</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <?php $j=1; ?>
                                <?php for($i=29; $i<=30; $i++): ?>                                     
                                    <th>3.1.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <?php $j=1; ?>
                                <?php for($i=31; $i<=44; $i++): ?>                                     
                                    <th>3.2.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=29;$i<=46;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 4: Vận hành</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <?php $j=1; ?>
                                <?php for($i=47; $i<=52; $i++): ?>                                     
                                    <th>4.1.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <?php $j=1; ?>
                                <?php for($i=53; $i<=59; $i++): ?>                                     
                                    <th>4.2.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=47;$i<=61;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 5: Chuyển đổi số văn hóa doanh nghiệp</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <?php $j=1; ?>
                                <?php for($i=62; $i<=66; $i++): ?>                                     
                                    <th>5.1.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <?php $j=1; ?>
                                <?php for($i=67; $i<=71; $i++): ?>                                     
                                    <th>4.2.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=62;$i<=73;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="fas fa-clinic-medical text-primary"></i> Trụ cột 6: Dữ liệu và tài sản thông tin</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <?php $j=1; ?>
                                <?php for($i=74; $i<=80; $i++): ?>                                     
                                    <th>6.1.<?php echo e($j); ?></th> 
                                    <?php $j++; ?>
                                <?php endfor; ?>                                
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php for($i=74;$i<=82;$i++): ?>
                                    <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                <?php endfor; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-box">
                    <h2 class="text-center">PHẦN B</h2> 
                    <div class="row">
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="fas fa-users-cog text-primary"></i> 7.1. Quản trị</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=85; $i<=89; $i++): ?>                                     
                                            <th>7.1.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=85;$i<=89;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class=" fas fa-user-check text-primary"></i> 7.2. Chiến lược</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=90; $i<=94; $i++): ?>                                     
                                            <th>7.2.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=90;$i<=94;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="fas fa-users text-primary"></i> 7.3. Văn hóa</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=95; $i<=99; $i++): ?>                                     
                                            <th>7.3.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=95;$i<=99;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="fab fa-connectdevelop text-primary"></i> 7.4. Công nghệ và kết nối: tiến trình</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=100; $i<=104; $i++): ?>                                     
                                            <th>7.4.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=100;$i<=104;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="fab fa-xbox text-primary"></i> 7.5. Công nghệ và kết nối: Mức độ</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=105; $i<=108; $i++): ?>                                     
                                            <th>7.5.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=105;$i<=108;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class=" fas fa-user-graduate text-primary"></i> 7.6. Nhân lực</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=109; $i<=113; $i++): ?>                                     
                                            <th>7.6.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=109;$i<=113;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2 class="text-center">PHẦN C</h2>
                            <h3><i class="fas fa-not-equal text-primary"></i> 8. Rào cản</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <?php $j=1; ?>
                                        <?php for($i=114; $i<=122; $i++): ?>                                     
                                            <th>8.<?php echo e($j); ?></th> 
                                            <?php $j++; ?>
                                        <?php endfor; ?>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=114;$i<=122;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-4">
                            <h2 class="text-center">PHẦN D</h2> 
                            <h3><i class="fas fa-user-tie text-primary"></i> 9. Ý kiến của doanh nghiệp</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <th>Nhu cầu</th> 
                                        <th>Hỏi/đáp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php for($i=123;$i<=124;$i++): ?>
                                            <td class="text-center"><?php echo e($ds[$i]); ?></td>
                                        <?php endfor; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/chi-tiet.blade.php ENDPATH**/ ?>