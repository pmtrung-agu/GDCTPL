
<?php $__env->startSection('title', 'Chi tiết Văn bản'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row card-box">
            <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="fas fa-reply-all"></i> </a> <?php echo e(__('Chi tiết Văn bản')); ?></h3>
            <table class="table table-border table-bordered table-striped table-hovered">
                <tbody>
                    <tr>
                        <th>Số hiệu</th>
                        <td><?php echo e($ds['so_hieu']); ?></td>
                    </tr>
                    <tr>
                        <th>Trích yếu</th>
                        <td><?php echo e($ds['trich_yeu']); ?></td>
                    </tr>
                    <tr>
                        <th>Cơ quan ban hành</th>
                        <td><?php echo e($ds['trich_yeu']); ?></td>
                    </tr>
                    <tr>
                        <th>Ngày ký</th>
                        <td><?php echo e(\Carbon\Carbon::parse($ds['ngay_ky'])->format("d/m/Y")); ?></td>
                    </tr>
                    <tr>
                        <th>Người ký</th>
                        <td><?php echo e($ds['nguoi_ky']); ?></td>
                    <tr>
                        <th>Mô tả</th>
                        <td><?php echo e($ds['mo_ta']); ?></td>
                    </tr>
                    <tr>
                        <th>Đính kèm</th>
                        <td>
                            <?php if($ds['attachments']): ?>
                            <ul>
                                <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>storage/files/<?php echo e($dk['aliasname']); ?>" target="_blank"><?php echo e($dk['title']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        $id_van_ban = App\Http\Controllers\ObjectController::ObjectId($ds['_id']);
                        $send_list = App\Models\SendEmail::where('id_van_ban','=', $id_van_ban)->get();
                    ?>
                    <tr>
                        <th>Danh sách Email đã gởi:</th>
                        <td>
                            <?php if($send_list): ?>
                            <?php $__currentLoopData = $send_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $createdAt = \Carbon\Carbon::parse($sl['created_at']);
                                    $createdAt= $createdAt->format("d/m/Y H:i");
                                ?>
                                <span class="badge badge-success"><?php echo e($sl['email']); ?>: <?php echo e($createdAt); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-box row bg-warning">
            <div class="col-12">
                <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="fas fa-reply-all"></i> </a> <?php echo e(__('Gởi email')); ?></h3>
            </div>
            <div class="col-12">
            <form action="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban/send-email" method="POST" id="SendEmail">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="id_van_ban" id="id_van_ban" value="<?php echo e($ds['_id']); ?>">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Email')); ?></label>
                        <div class="col-12 col-md-10">
                            <select name="email_list[]" id="email_list" multiple class="form-control select2">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10"><?php echo e(__('Nội dung')); ?></label>
                        <div class="col-12 col-md-10">
                            <textarea name="noi_dung" id="noi_dung" class="form-control" required placeholder="<?php echo e(__('Nội dung')); ?>" style="height:100px;" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-light"><i class="fa fa-reply-all"></i> <?php echo e(__('Trở về')); ?></a>
                    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> <?php echo e(__('Gởi Mail')); ?></button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#email_list").select2({
                placeholder: 'Chọn địa chỉ Email',
                allowClear: true,
                tags: true
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/VanBan/chi-tiet.blade.php ENDPATH**/ ?>