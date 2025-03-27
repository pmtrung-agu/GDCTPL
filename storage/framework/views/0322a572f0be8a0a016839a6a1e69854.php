
<?php $__env->startSection('title', 'Chi tiết - Doanh nghiệp'); ?>
<?php $__env->startSection('css'); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/photobox.ie.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/danh-sach"><i class="fas fa-reply-all text-primary"></i></a> Thông tin Doanh nghiệp: <?php echo e($ds[1]); ?> </h3>
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="fe-monitor"></i><span class="d-none d-sm-inline-block ml-2">Thông tin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-user"></i> <span class="d-none d-sm-inline-block ml-2">Mô tả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-mail"></i> <span class="d-none d-sm-inline-block ml-2">Hình ảnh</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-settings"></i> <span class="d-none d-sm-inline-block ml-2">Đính kèm</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="home1">
                            <div class="card-box">
                                <table class="table table-border table-striped table-bodered">
                                <tbody>
                                    <tr>
                                        <th>Tên Doanh nghiệp</th>
                                        <td><?php echo e($ds['ten']); ?></td>
                                    </tr>                           
                                    <tr>
                                        <th>Người đại diện</th>
                                        <td><?php echo e($ds['nguoidaidien']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mã số thuế</th>
                                        <td><?php echo e($ds['masothue']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <td><?php echo e(App\Http\Controllers\DMDiaChiController::getDiaChi($ds['diachi'])); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Điện thoại</th>
                                        <td><?php echo e($ds['dienthoai']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo e($ds['email']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td><?php echo e($ds['website']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Lĩnh vực hoạt động</th>
                                        <td></td>
                                    </tr>           
                                    <tr>
                                        <th>Ngành nghề kinh doanh</th>
                                        <td></td>
                                    </tr>           
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td><?php if($ds['trangthai'] == 1 ): ?> Đang hoạt động <?php else: ?> Tạm dừng hoạt động <?php endif; ?></td>
                                    </tr>  
                                    <tr>
                                        <th>Hội viên Hiệp hội Doanh nghiệp tỉnh</th>
                                        <td><?php if($ds['hoivienhiephoi']): ?> <span class="badge badge-danger" style="font-size:15px;">Đang là hội viên<span> <?php else: ?> <span class="badge badge-default" style="font-size:15px;">Không phải hội viên</span> <?php endif; ?></td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile1">
                            <div class="card-box">
                                <?php echo $ds['mota']; ?>

                            </div>
                        </div>
                        <div class="tab-pane" id="messages1">
                            <div class="card-box">
                                <h3><i class="fas fa-file-image text-primary"></i> Hỉnh ảnh:</h3>
                                <?php if($ds['photos']): ?>
                                    <div class="row" id="gallery">
                                        <?php $__currentLoopData = $ds['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-md-3">
                                            <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($p['aliasname']); ?>"><img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($p['aliasname']); ?>" style="width:100%;" /></a>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings1">
                            <div class="card-box">
                                <h3><i class="fas fa-book-reader text-primary"></i> Đính kèm: </h3>
                                <?php if($ds['attachments']): ?>
                                <ul>
                                    <?php $__currentLoopData = $ds['attachments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(env('APP_URL')); ?>admin/doanh-nghiep/download/<?php echo e($ds['_id']); ?>/<?php echo e($key); ?>"><?php echo e($dk['title']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(env('APP_URL')); ?>assets/frontend/libs/photobox/jquery.photobox.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#gallery').photobox('a',{ time:0 });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/DoanhNghiep/chi-tiet.blade.php ENDPATH**/ ?>