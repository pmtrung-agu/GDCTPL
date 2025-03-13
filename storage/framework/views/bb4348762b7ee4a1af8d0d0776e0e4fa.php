
<?php $__env->startSection('title', 'Kết nối giao thương'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.ie.css" />
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
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
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                <th>Tình trạng</th>
                                <th>#</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $dn = App\Models\User::find($ds['id_user']);
                            $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/chi-tiet/<?php echo e($ds['_id']); ?>" data-toggle="modal" data-target="#ChiTietModal" class="chi-tiet">[<?php echo e($nn['ten']); ?>] - <?php echo e($dn['fullname']); ?> - <?php echo e($ds['nhu_cau']); ?> </a>
                                </td>
                                <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                <td class="text-center" style="vertical-align: middle;">
                                    <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA')): ?>
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/tinh-trang/<?php echo e($ds['_id']); ?>" class="tinh-trang">
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Chờ duyệt</span>
                                        <?php else: ?> <span class="badge badge-success">Đã duyệt</span>
                                        <?php endif; ?>
                                    </a>
                                    <?php else: ?> 
                                        <?php if($ds['tinh_trang'] == 0): ?> <span class="badge badge-danger">Chờ duyệt</span>
                                        <?php else: ?> <span class="badge badge-success">Đã duyệt</span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/ket-noi-giao-thuong/delete/<?php echo e($ds['_id']); ?>" class="text-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
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
<div id="ChiTietModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nội dung chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ChiTietHTML">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
<script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
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
        $(".chi-tiet").click(function(){
            var _href = $(this).attr("href");
            $.get(_href, function(html){
                $("#ChiTietHTML").html(html);$('#gallery').photobox('a',{ time:0 });
            });
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KetNoiGiaoThuong/list.blade.php ENDPATH**/ ?>