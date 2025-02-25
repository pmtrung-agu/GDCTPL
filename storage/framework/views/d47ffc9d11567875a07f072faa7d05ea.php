
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('body'); ?>
<?php
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\DoanhNghiep;
use App\Models\CDSKhaoSat;
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <?php if(UserController::is_roles('Business')): ?>
                <?php
                    $id_user = Session::get('user._id');
                    $u = User::find($id_user);
                    $dn = DoanhNghiep::find($u['id_doanh_nghiep']);
                    $ds = CDSKhaoSat::where(1, '=', $dn['ten'])->first();
                ?>
                <?php if($ds): ?>
                <?php
                    $muc_do = $ds[84]; if($muc_do == 0) $muc_do = 1;   
                    $nganh_nghe = $ds[4];
                    $md = Config::get('data_phan_tich.muc_do');
                ?>
                <div class="col-12">
                    <div class="card-box">                    
                        <h3><i class="fas fa-reply-all text-primary"></i></a> Thông tin Doanh nghiệp: <?php echo e($dn['ten']); ?></h3>
                        <table class="table table-border table-striped table-bodered">
                            <tbody>
                                <tr>
                                    <th>Tên Doanh nghiệp</th>
                                    <td><?php echo e($ds[1]); ?></td>
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
                                    <th>Địa chỉ</th>
                                    <td><?php echo e($ds[7]); ?></td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td><?php echo e($ds[8]); ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo e($ds[10]); ?></td>
                                </tr>
                                <tr>
                                    <th>Tổng điểm</th>
                                    <td><span class="badge badge-danger" style="font-size:15px;width:40px;"><?php echo e($ds[83]); ?></span></td>
                                </tr>
                                <tr>
                                    <th>Mức độ chuyển số Doanh nghiệp</th>
                                    <td><span class="badge badge-success" style="font-size:15px;width:40px;"><strong><?php echo e($ds[84]); ?></strong></span> <strong><?php echo e($md[$muc_do]['title']); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="card-box widget-flat border-blue bg-blue text-white" style="font-size:15px;">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so/add" class="btn btn-danger" style="float:right;"><i class="fas fa-users"></i> Gởi câu hỏi đến Chuyên gia Chuyển đổi số</a>
                                    <p><strong>Đặc điểm của doanh nghiệp có múc độ chuyển đổi số: <?php echo e($ds[84]); ?></strong></p>
                                    <ul>
                                        <?php $__currentLoopData = $md[$muc_do]['dac_diem']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($dd); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <p><strong>Lời khuyên doanh nghiệp có múc độ chuyển đổi số: <?php echo e($ds[84]); ?></strong></p>
                                    <ul>
                                        <?php $__currentLoopData = $md[$muc_do]['loi_khuyen']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($lk); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php
                                        $tom_lai = Config::get('data_phan_tich.muc_do_tom_lai');
                                    ?>
                                    <p><strong>Tóm lại:</strong></p>
                                    <ul>
                                        <?php $__currentLoopData = $tom_lai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($tl); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            $muc_do_nganh_nghe = Config::get('data_phan_tich.muc_do_nganh_nghe');
                            $muc_do_nganh_nghe_tom_lai = Config::get('data_phan_tich.muc_do_nganh_nghe_tom_lai');
                            ?>
                            <div class="col-12 col-md-12">
                                <div class="card-box bg-danger widget-flat border-danger text-white" style="font-size:15px;">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/nhu-cau-chuyen-doi-so/add" class="btn btn-blue" style="float:right;"> Gởi <i class="far fa-address-card"></i> câu nhu cầu Chuyển đổi số</a>
                                    <p><strong>Doanh nghiệp của Anh/Chị đang kinh doanh ở nhóm Ngành nghề: <?php echo e($ds[4]); ?>, và mức độ chuyển đổi số ở mức <?php echo e($ds[84]); ?>.<br />Nên cần thực hiện các công việc sau:</strong></p>
                                    <ul>
                                        <?php $__currentLoopData = $muc_do_nganh_nghe[$ds[4]][$muc_do]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mdnn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($mdnn); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <p><strong>Tóm lại: </strong></p>
                                    <ul>
                                        <?php $__currentLoopData = $muc_do_nganh_nghe_tom_lai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mdnntl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($mdnntl); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="page-title-box">
                        <h3>Kết quả Khảo sát mức độ chuyển đổi số Doanh Nghiệp</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-blue bg-blue text-white">
                                <i class="fe-tag"></i>
                                <h3 class="text-white"><?php echo e($cds_soluong); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Doanh nghiệp tham gia khảo sát</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-primary widget-flat border-primary text-white">
                                <i class="fas fa-code-branch"></i>
                                <h3 class="text-white"><?php echo e($sl_linhvuc->count()); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Lĩnh vực</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fas fa-cogs"></i>
                                <h3 class="text-white"><?php echo e($sl_nganhnghe->count()); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Ngành nghề</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-users"></i>
                                <h3 class="text-white"><?php echo e($sl_chuyengia); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Chuyên gia Tư vấn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3>Thống kê Doanh nghiệp tham gia</h3>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-blue bg-blue text-white">
                                <i class="fe-tag"></i>
                                <h3 class="text-white"><?php echo e($dn_soluong); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Doanh nghiệp tham gia</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-primary widget-flat border-primary text-white">
                                <i class="fas fa-code-branch"></i>
                                <h3 class="text-white"><?php echo e($sl_linhvuc->count()); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Lĩnh vực</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fas fa-cogs"></i>
                                <h3 class="text-white"><?php echo e($sl_nganhnghe->count()); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Ngành nghề</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-users"></i>
                                <h3 class="text-white"><?php echo e($dn_hoivien); ?></h3>
                                <p class="text-uppercase font-13 font-weight-bold">Hội viên HHDN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/dashboard.blade.php ENDPATH**/ ?>