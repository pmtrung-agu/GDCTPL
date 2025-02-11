
<?php $__env->startSection('title', 'Quản lý danh sách sản phẩm'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card-box">
            <h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/san-pham/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách sản phẩm</h3>
            <?php echo e($danhsach->withPath(env('APP_URL').'admin/san-pham')); ?>

            <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-sm" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Tình trạng</th>
                    <?php if(App\Http\Controllers\UserController::is_roles('Admin,Manager')): ?>
                      <th>Người bán</th>
                    <?php endif; ?>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                <?php if($danhsach): ?>
                  <?php $__currentLoopData = $danhsach; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($k+1); ?></td>
                    <td class="text-center">
                      <?php if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname']): ?>
                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_50/<?php echo e($ds['photos'][0]['aliasname']); ?>" style="height:30px;"/>
                      <?php else: ?>
                        <img src="<?php echo e(env('APP_URL')); ?>assets/backend/images/logo_sm.png" style="height:30px;"/>
                      <?php endif; ?>
                    </td>
                    <td><a href="<?php echo e(env('APP_URL')); ?>chi-tiet-san-pham/<?php echo e($ds['slug']); ?>" target="_blank"><?php echo e($ds['code']); ?></a></td>
                    <td><?php echo e($ds['title']); ?></td>
                    <td class="text-right"><?php echo e(number_format($ds['prices'],0, ",", ".")); ?></td>
                    <td class="text-center">
                      <input type="checkbox" name="<?php echo e($ds['_id']); ?>" class="js-switch status" data-plugin="switchery" <?php if($ds['status'] == 1): ?> checked="checked" <?php endif; ?> data-size="small" data-color="#009efb" value="1"/>
                    </td>
                    <?php if(App\Http\Controllers\UserController::is_roles('Admin, Manager')): ?>
                      <td>
                        
                      </td>
                    <?php endif; ?>
                    <td class="text-center">
                      <a href="<?php echo e(env('APP_URL')); ?>admin/san-pham/delete/<?php echo e($ds['_id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                      <a href="<?php echo e(env('APP_URL')); ?>admin/san-pham/edit/<?php echo e($ds['_id']); ?>" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
              </tbody>
            </table>
            <?php echo e($danhsach->withPath(env('APP_URL').'admin/san-pham')); ?>

          </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
      /*$('#responsive-datatable').DataTable();*/
      $(".status").change(function(){
        var id = $(this).attr("name");
        $.get("<?php echo e(env('APP_URL')); ?>admin/san-pham/update-status/"+id);
      });
      
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/SanPham/list.blade.php ENDPATH**/ ?>