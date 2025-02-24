
<?php $__env->startSection('title', 'Kết nối giao thương'); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Nhu cầu Kết nối giao thương</h3>
                    <?php if($danhsach): ?>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Nhu cầu</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $dn = App\Models\User::find($ds['id_user']);
                            $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                            ?>
                            <tr>
                                <td><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/chi-tiet/<?php echo e($ds['_id']); ?>">[<?php echo e($nn['ten']); ?>] - <?php echo e($dn['fullname']); ?> - <?php echo e($ds['nhu_cau']); ?> </a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/tinh-trang/<?php echo e($ds['_id']); ?>" class="tinh-trang">
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Chờ duyệt</span>
                                        <?php else: ?> <span class="badge badge-success">Hoàn thành</span>
                                        <?php endif; ?>
                                    </a>
                                    <?php else: ?> 
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Chờ duyệt</span>
                                        <?php else: ?> <span class="badge badge-success">Hoàn thành</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
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
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KetNoiGiaoThuong/list.blade.php ENDPATH**/ ?>