
<?php $__env->startSection('title', 'Danh sách Doanh nghiệp tham gia'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3>
                        <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                            <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> 
                        <?php else: ?>
                            <i class="fas fa-users text-primary"></i>
                        <?php endif; ?>
                        Danh sách Doanh nghiệp tham gia: <?php echo e($so_luong); ?> </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Mã số thuế</th>
                                <th>Điện thoại</th>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                <th>TVHH</th>
                                <?php endif; ?>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; $count = count($danhsach); $page=Request::input('page') ? Request::input('page') : 1;  ?>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                   <td><?php echo e($stt + $count * ($page-1)); ?></td> 
                                   <td><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/chi-tiet/<?php echo e($ds['_id']); ?>"><?php echo e($ds['ten']); ?></a></td>
                                   <td><?php echo e($ds['nguoidaidien']); ?></td>
                                   <td><?php echo e($ds['masothue']); ?></td>
                                   <td><?php echo e($ds['dienthoai']); ?></td>
                                   <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                   <td>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/hoi-vien/<?php echo e($ds['_id']); ?>" class="set-hoi-vien">
                                        <?php if($ds['hoivienhiephoi']): ?> <i class="fas fa-user-check text-success"></i>
                                        <?php else: ?> <i class="fas fa-user-times text-muted"></i> <?php endif; ?>
                                    </a>
                                   </td>
                                   <?php endif; ?>

                                   <td class="text-center" style="width:80px;">
                                    <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                        <?php if(App\Http\Controllers\UserController::is_roles('Admin') &&
                                            App\Http\Controllers\UserController::checkDoanhNghiep($ds['_id']) == false): ?>
                                                <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tao-tai-khoan/<?php echo e($ds['_id']); ?>" class="tao-tai-khoan"><i class="fas fa-user text-muted"></i></a>
                                        <?php else: ?> 
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tao-tai-khoan/<?php echo e($ds['_id']); ?>" class="tao-tai-khoan"><i class="fas fa-users text-danger"></i></a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/delete/<?php echo e($ds['_id']); ?>" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <?php endif; ?>
                                    <?php if((App\Http\Controllers\UserController::is_roles('Business') && $ds['_id'] == Session::get('user.id_doanh_nghiep')) || App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                        <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/edit/<?php echo e($ds['_id']); ?>"><i class="fas fa-pencil-alt"></i></a>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $stt++ ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($danhsach->withPath(env('APP_URL').'admin/doanh-nghiep/danh-sach')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".set-hoi-vien").click(function(e){
            var _link = $(this).attr("href");
            var _this = $(this);
            $.get(_link, function(html){
                _this.html(html)
            });
            e.preventDefault();
        });
        $(".tao-tai-khoan").click(function(e){
            var _link = $(this).attr("href");
            var _this = $(this);
            $.get(_link, function(html){
                _this.html(html)
            });
            e.preventDefault();
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/list.blade.php ENDPATH**/ ?>