
<?php $__env->startSection('title', 'Quản lý Hội phí'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi" class="btn btn-primary btn-sm"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Thống kê theo năm')); ?> <span class="badge badge-danger">Năm <?php echo e($years); ?></span></h3>
                    <hr />
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <form action="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/thong-ke-theo-nam" method="GET" id="ThongKeForm">
                                    <div class="row form-group">
                                        <label class="control-label col-md-2 text-right p-t-10">Năm</label>
                                        <div class="col-md-10 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <select name="nam" id="nam" class="form-control" required>
                                                <?php for($i=$years-5; $i<=$years+5; $i++): ?>
                                                    <option value="<?php echo e($i); ?>" <?php if($years == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-md-8 text-right">
                                <span class="badge badge-blue" style="font-size: 15px;"><i class="fas fa-users-cog"></i> Số doanh nghiệp: <?php echo e($sl_doanh_nghiep); ?></span>
                                <span class="badge badge-danger" style="font-size: 15px;"><i class="fas fa-users-cog"></i> Tổng thu: <b><?php echo e(number_format($tong_thu,0,",",".")); ?></b></span>
                                <span class="badge badge-success" style="font-size: 15px;"><i class="fas fa-money-bill-alt"></i> Đã đóng HP: <?php echo e($da_dong); ?></span>
                                <span class="badge badge-warning" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> Chưa đóng HP: <?php echo e($sl_doanh_nghiep - $da_dong); ?></span>
                            </div>
                        </div>                    
                    <hr />
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active bg-blue text-white">
                               <i class="fas fa-money-bill-alt"></i><span class="d-none d-sm-inline-block ml-2">Đã đóng HP</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link bg-danger text-white">
                                <i class="fas fa-money-bill-wave-alt"></i> <span class="d-none d-sm-inline-block ml-2">Chưa đóng HP</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <?php if($danhsach && $danhsach->count() > 0): ?>
                            <table class="table table-border table-bordered table-striped table-hovered">
                                <thead>
                                    <tr>
                                        <th>Doanh nghiệp</th>
                                        <th>Số tiền</th>
                                        <th>Năm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($ds['ten_doanh_nghiep']); ?></td>
                                        <td class="text-right"><?php echo e(number_format($ds['so_tien'],0,",",".")); ?></td>
                                        <td class="text-center"><?php echo e($ds['nam']); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <div class="alert alert-danger">
                                <h3><i class="fas fa-money-bill"></i> Chưa có doanh nghiệp đóng hội phí năm <?php echo e($years); ?></h3>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="tab-pane show" id="profile">
                            <table class="table table-border table-bordered table-striped table-hovered">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Doanh nghiệp</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; ?>
                                    <?php $__currentLoopData = $doanh_nghiep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $check = App\Http\Controllers\HoiPhiController::check_hoi_phi($dn['id'], $years);
                                    ?>
                                    <?php if($check == false): ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($stt); ?></td>
                                        <td><?php echo e($dn['ten']); ?></td>
                                        <td><?php echo e($dn['diachi'][3]); ?></td>
                                        <td class="text-center"><?php echo e($dn['dienthoai']); ?></td>
                                    </tr>
                                    <?php $stt++; ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#nam").change(function(){
            $("#ThongKeForm").submit();
        });
        <?php if(Session::get('msg') != null && Session::get('msg')): ?>
        $.toast({
            heading:"Thông báo",
            text:"<?php echo e(Session::get('msg')); ?>",
            loaderBg:"#3b98b5",icon:"info", hideAfter:3e3,stack:1,position:"top-right"
        });
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/HoiPhi/thong-ke-theo-nam.blade.php ENDPATH**/ ?>