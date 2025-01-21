
<?php $__env->startSection('title', __('Danh sách tài khoản')); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0">
              <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager')): ?>
                <a href="<?php echo e(env('APP_URL')); ?>admin/user/add?url=<?php echo e(Request::fullUrl()); ?>" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a>
              <?php else: ?>
                <i class="fas fa-users text-primary"></i>
              <?php endif; ?>
               <?php echo e(__('Danh sách Chuyên gia Tư vấn')); ?></h3>
            <?php if($users): ?>
            <div class="row">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class="thumb-lg member-thumb mx-auto">
                                <?php if(isset($user['photos'][0]['aliasname']) && $user['photos'][0]['aliasname']): ?>
                                <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_360x200/<?php echo e($user['photos'][0]['aliasname']); ?>" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                <?php else: ?>
                                    <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/users/avatar-2.jpg" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                <?php endif; ?>
                            </div>
                            <div class="">
                                <h4><?php echo e(isset($user['fullname']) ? $user['fullname'] : ''); ?></h4>
                                <p>Email: <?php echo e(isset($user['username']) ? $user['username'] : ''); ?></p>
                                <p>Điện thoại: <?php echo e(isset($user['phone']) ? $user['phone'] : ''); ?></p>
                                <p style="font-weight:bold;"><?php echo e($user['ghi_chu']); ?></p>
                            </div>
                            <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager')): ?>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/user/delete/<?php echo e($user['_id']); ?>?url=<?php echo e(Request::fullUrl()); ?>" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
                                </li>
                                
                                <li class="list-inline-item">
                                    <a href="<?php echo e(env('APP_URL')); ?>admin/user/edit/<?php echo e($user['_id']); ?>?url=<?php echo e(Request::fullUrl()); ?>"><i class="fa fa-pencil-alt" title="Chỉnh sửa tài khoản người dùng"></i></a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div> <!-- end col -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
           <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/User/chuyen-gia.blade.php ENDPATH**/ ?>