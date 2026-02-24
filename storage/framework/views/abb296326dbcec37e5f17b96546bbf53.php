
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
          <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/user/add" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a> <?php echo e(__('Danh sách tài khoản người dùng')); ?></h3>
          <table id="responsive-datatable" class="table table-bordered table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th data-sort-initial="true" data-toggle="true"><?php echo e(__('STT')); ?></th>
                <th><?php echo e(__('Username')); ?></th>
                <th><?php echo e(__('Họ tên')); ?></th>
                <th><?php echo e(__('Quyền')); ?></th>
                <th class="text-center"><?php echo e(__('Tình trạng')); ?></th>
                <th data-sort-ignore="true" class="text-center"><?php echo e(__('Hiệu chỉnh')); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if($users): ?>
                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td><?php echo e($key+1); ?></td>
                      <td><?php echo e(isset($user['username']) ? $user['username'] : ''); ?></td>
                      <td><?php echo e(isset($user['fullname']) ? $user['fullname'] : ''); ?></td>
                      <td>
                        <?php if(isset($user['roles']) && $user['roles']): ?>
                          <?php $__currentLoopData = $user['roles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="badge badge-pill badge-primary"><?php echo e($roles[$role]); ?></span>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?php if($user['active'] == 1): ?>
                          <i class="mdi mdi-check-circle text-info"></i>
                        <?php else: ?>
                          <i class="mdi mdi-close-circle text-danger"></i>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                          <a href="<?php echo e(env('APP_URL')); ?>admin/user/delete/<?php echo e($user['_id']); ?>" onclick="return confirm('Chắc chắn xóa?')" title="Xóa tài khoản người dùng"><i class="mdi mdi-delete text-danger"></i></a>
                          <a href="<?php echo e(env('APP_URL')); ?>admin/user/edit/<?php echo e($user['_id']); ?>" ><i class="mdi mdi-account-edit" title="Chỉnh sửa tài khoản người dùng"></i></a>
                      </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </tbody>
          </table>
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

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/GDCTPL/resources/views/Admin/User/list.blade.php ENDPATH**/ ?>