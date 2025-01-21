
<?php $__env->startSection('title'); ?> Chỉnh sửa tài khoản người dùng <?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.css">
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/magnific-popup.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<?php
  $link_back = Request::input('url') ? Request::input('url') : env('APP_URL') .'admin/user';
?>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-box">
              <h3 class="m-t-0"><a href="<?php echo e($link_back); ?>" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> <?php echo e(__('Trở về')); ?></a> <?php echo e(__('Chỉnh sửa tài khoản người dùng')); ?></h3>
                    <form action="<?php echo e(env('APP_URL')); ?>admin/user/update" method="post" id="dinhkemform" enctype="multipart/form-data">
                      <input type="hidden" name="url" id="url" value="<?php echo e(Request::input('url')); ?>">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="id" id="id" value="<?php echo e($user['_id']); ?>" />
                        <div class="form-body">
                            <hr>
                            <?php if($errors->any()): ?>
                              <div class="alert alert-success">
                                <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                              </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Tài khoản</label>
                                        <div class="col-md-4">
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Tài khoản người dùng" value="<?php echo e(old('email') !== null ? old('username') : $user['username']); ?>" required readonly/>
                                        </div>
                                        <label class="control-label col-md-2 text-right p-t-10">Mật khẩu</label>
                                        <div class="col-md-4">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu" value="<?php echo e(old('password')); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Họ tên</label>
                                        <div class="col-md-4">
                                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Họ tên" value="<?php echo e(old('fullname') !== null ? old('fullname') : $user['fullname']); ?>">
                                        </div>
                                        <label class="control-label col-md-2 text-right p-t-10">Điện thoại</label>
                                        <div class="col-md-4">
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Điện thoại" value="<?php echo e(old('phone') !== null ? old('phone') : $user['phone']); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-4">
                                            <select class="select2 m-b-10" id="address_1" name="address[]" style="width: 100%" data-placeholder="Chọn Tỉnh">
                                                <option value="">Tỉnh</option>}
                                                <?php if($address): ?>
                                                  <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(old('address.0') !== null): ?>
                                                      <option value="<?php echo e($a['ma']); ?>" <?php if($a['ma'] == old('address.0')): ?>) selected <?php endif; ?> ><?php echo e($a['ten']); ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo e($a['ma']); ?>" <?php if($a['ma'] == $user['address'][0]): ?>) selected <?php endif; ?> ><?php echo e($a['ten']); ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_2" name="address[]" style="width: 100%" data-placeholder="Chọn Huyện, Tp">
                                                <option value=""></option>
                                                <?php if($address_1): ?>
                                                  <?php $__currentLoopData = $address_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(old('address.1') !== null): ?>
                                                      <option value="<?php echo e($a1['ma']); ?>" <?php if($a1['ma'] == old('address.1')): ?>) selected <?php endif; ?> ><?php echo e($a1['ten']); ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo e($a1['ma']); ?>" <?php if($a1['ma'] == $user['address'][1]): ?>) selected <?php endif; ?> ><?php echo e($a1['ten']); ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_3" name="address[]" style="width: 100%" data-placeholder="Chọn Xã, phường, TT">
                                                <option value=""></option>.
                                                <?php if($address_2): ?>
                                                  <?php $__currentLoopData = $address_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(old('address.2') !== null): ?>
                                                      <option value="<?php echo e($a2['ma']); ?>" <?php if($a2['ma'] == old('address.2')): ?>) selected <?php endif; ?> ><?php echo e($a2['ten']); ?></option>
                                                    <?php else: ?>
                                                      <option value="<?php echo e($a2['ma']); ?>" <?php if($a2['ma'] == $user['address'][2]): ?>) selected <?php endif; ?> ><?php echo e($a2['ten']); ?></option>
                                                    <?php endif; ?>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="<?php echo e($user['address'][3]); ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Quyền</label>
                                        <?php
                                          $roleses = old('roles') != null ? old('roles') : $user['roles'];
                                        ?>
                                        <div class="col-md-8">
                                            <select class="select2 m-b-10 select2-multiple" name="roles[]" style="width: 100%" multiple="multiple" data-placeholder="Chọn quyền">
                                                <option value="">Chọn quyền</option>}
                                                <?php if($roles): ?>
                                                  <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role => $role_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($role); ?>" <?php if(in_array($role, $roleses)): ?> selected <?php endif; ?> ><?php echo e($role_name); ?></option>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 switchery-demo">
                                            Hoạt động:&nbsp;&nbsp;&nbsp;
                                            <input type="checkbox" name="active" id="active" class="js-switch" data-color="#009efb" value="1" <?php if($user['active'] == 1 || old('active') !== null): ?> checked <?php endif; ?> />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group row">
                                      <label class="control-label col-md-2 text-right p-t-10">Ghi chú</label>
                                      <div class="col-md-10">
                                          <input type="text" id="ghi_chu" name="ghi_chu" class="form-control" placeholder="Ghi chú mô tả chuyên gia" value="<?php echo e($user['ghi_chu']); ?>">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Hình ảnh</label>
                                        <div class="col-md-4">
                                          <label class="btn btn-info">
                                            <input type="file" name="hinhanh_files[]" class="dinhkem hinhanh_files btn btn-info" multiple accept="image/*" placeholder="Chọn hình ảnh" style="display:none;" />
                                            <i class="fa fa-file-photo-o"></i> Chọn hình ảnh 900x600
                                          </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress m-b-20" id="progressbar">
                              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          <div id="list_hinhanh" class="form-group row portfolioContainer">
                            <?php if(old('hinhanh_aliasname') !== null): ?>
                              <?php $__currentLoopData = old('hinhanh_aliasname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $hinhanh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-4 items draggable-element">
                                  <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($hinhanh); ?>" readonly/>
                                  <input type="hidden" name="hinhanh_filename[]" value="<?php echo e(old('hinhanh_filename.'.$key)); ?>" class="form-control"/>
                                  <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($hinhanh); ?>" class="image-popup">
                                    <div class="portfolio-masonry-box">
                                      <div class="portfolio-masonry-img">
                                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($hinhanh); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                                      </div>
                                      <div class="portfolio-masonry-detail">
                                        <p><?php echo e(old('hinhanh_title.'.$key)); ?></p>
                                      </div>
                                    </div>
                                  </a>
                                  <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($hinhanh['aliasname']); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                  <input type="text" name="hinhanh_title[]" value="<?php echo e(old('hinhanh_title.'.$key)); ?>" class="form-control"/>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php if($user['photos']): ?>
                              <?php $__currentLoopData = $user['photos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hinhanh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-4 items draggable-element">
                                  <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($hinhanh['aliasname']); ?>" readonly/>
                                  <input type="hidden" name="hinhanh_filename[]" value="<?php echo e($hinhanh['filename']); ?>" class="form-control"/>
                                  <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($hinhanh['aliasname']); ?>" class="image-popup">
                                    <div class="portfolio-masonry-box">
                                      <div class="portfolio-masonry-img">
                                        <img src="<?php echo e(env('APP_URL')); ?>storage/images/thumb_300x200/<?php echo e($hinhanh['aliasname']); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                                      </div>
                                      <div class="portfolio-masonry-detail">
                                        <p><?php echo e(isset($hinhanh['title']) ? $hinhanh['title'] : ''); ?></p>
                                      </div>
                                    </div>
                                  </a>
                                  <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($hinhanh['aliasname']); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                  <input type="text" name="hinhanh_title[]" value="<?php echo e(isset($hinhanh['title']) ? $hinhanh['title'] : ''); ?>" class="form-control"/>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                          <?php endif; ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
                            <a href="<?php echo e(env('APP_URL')); ?>admin/user" class="btn btn-light"><i class="mdi mdi-reply-all"></i> Trở về</a>
                          </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/switchery/switchery.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/isotope/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
  <script type="text/javascript">
       $(document).ready(function() {
          $(".select2").select2();upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads");delete_hinhanh();
          <?php if(old('address.0') !== null): ?>
          $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/dia-chi/get/<?php echo e(old('address.0')); ?>/<?php echo e(old('address.1')); ?>", function(huyen){
            $("#address_2").html(huyen);
          });
          <?php endif; ?>
          <?php if(old('address.1') !== null): ?>
          $.get("<?php echo e(env('APP_URL')); ?>admin/danh-muc/dia-chi/get/<?php echo e(old('address.1')); ?>/<?php echo e(old('address.2')); ?>", function(xa){
            $("#address_3").html(xa);
          });
          <?php endif; ?>
          chontinh("<?php echo e(env('APP_URL')); ?>");
          chonhuyen("<?php echo e(env('APP_URL')); ?>");
          $('.js-switch').each(function() {
              new Switchery($(this)[0], $(this).data());
          });
          popup_images();
          $("#progressbar").hide();
      });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/User/edit.blade.php ENDPATH**/ ?>