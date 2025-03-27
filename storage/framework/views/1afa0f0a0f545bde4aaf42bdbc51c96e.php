
<?php $__env->startSection('title', 'Tư vấn chuyển đổi số'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách câu hỏi</h3>
                    <?php if($danhsach): ?>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Câu hỏi</th>
                                <th>Tình trạng</th>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                    <th>#</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so/chi-tiet/<?php echo e($ds['_id']); ?>"><?php echo $ds['noi_dung'][0]['noi_dung']; ?></a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so/tinh-trang/<?php echo e($ds['_id']); ?>" class="tinh-trang">
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Đang diễn ra</span>
                                        <?php else: ?> <span class="badge badge-success">Hoàn thành</span>
                                        <?php endif; ?>
                                    </a>
                                    <?php else: ?> 
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Đang diễn ra</span>
                                        <?php else: ?> <span class="badge badge-success">Hoàn thành</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/tu-van-chuyen-doi-so/delete/<?php echo e($ds['_id']); ?>" onclick="return confirm('Chắc chăn xóa?')"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
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
        $(".tinh-trang").click(function(e){
            var _link = $(this).attr("href");
            var _this = $(this);
            $.get(_link, function(html){
                _this.html(html)
            });
            e.preventDefault();
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/tu-van.blade.php ENDPATH**/ ?>