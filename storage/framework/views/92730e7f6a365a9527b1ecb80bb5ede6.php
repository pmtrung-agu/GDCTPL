
<?php $__env->startSection('title', 'Thu Hội phí'); ?>
<?php $__env->startSection('css'); ?>
  <link href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/css/magnific-popup.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi" class="btn btn-info"><i class="mdi mdi-reply-all"></i></a> Thu Hội Phí Doanh Nghiệp</h3>
    		<form action="<?php echo e(env('APP_URL')); ?>admin/hiep-hoi-doanh-nghiep/hoi-phi/create" method="post" id="dinhkemform" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <div class="form-body">
            <hr />
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
                      <label class="control-label col-md-2 text-right p-t-10">Năm</label>
                      <div class="col-md-4 input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <select name="nam" id="nam" class="form-control" required>
                            <?php for($i=$year-5; $i<=$year+5; $i++): ?>
                                <option value="<?php echo e($i); ?>" <?php if($year == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                            <?php endfor; ?>
                        </select>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Doanh nghiệp</label>
                      <div class="col-md-10">
                          <select name="id_doanh_nghiep[]" id="id_doanh_nghiep" class="form-control select2" required data-placeholder="Chọn Doanh nghiệp" multiple>
                            <option value="">Chọn Doanh nghiệp</option>
                            <?php if($doanhnghiep): ?>
                              <?php $__currentLoopData = $doanhnghiep; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($dn['_id']); ?>" <?php if($dn['_id'] == old('id_doanh_nghiep')): ?> selected <?php endif; ?> ><?php echo e($dn['ten']); ?></option>
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
                        <label class="control-label col-md-2 text-right p-t-10">Số tiền</label>
                        <div class="col-md-4">
                            <input type="text" id="so_tien" name="so_tien" class="form-control number" placeholder="Số tiền" value="<?php echo e(old('so_tien') !== null ? old('so_tien') : 2000000); ?>" required />
                        </div>
                        <label class="control-label col-md-1 text-right p-t-10"><?php echo e(__('Ngay thu')); ?></label>
                        <div class="col-md-2">
                            <input type="text" id="ngay_thu" name="ngay_thu" class="form-control" placeholder="Ngày thu" value="<?php echo e(old('ngay_thu') ? old('ngay_thu') : date("Y-m-d H:i:s")); ?>" required />
                        </div>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Nội dung</label>
                      <div class="col-md-10">
                        <textarea name="noi_dung" id="noi_dung" required placeholder="Nội dung thu" class="form-control"><?php echo e(old('noi_dung') ? old('noi_dung') : 'Hội phí thường niên'); ?></textarea>
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
                          <input type="file" name="hinhanh_files[]" class="hinhanh_files btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                          <i class="fa fa-file-photo-o"></i> Chọn hình ảnh minh chứng
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
                  <div class="col-sm-6 col-md-4 items draggable-element text-center">
                    <input type="hidden" name="hinhanh_aliasname[]" value="<?php echo e($hinhanh); ?>" readonly/>
                    <input type="hidden" name="hinhanh_filename[]" value="<?php echo e(old('hinhanh_filename.'.$key)); ?>" class="form-control"/>
                    <a href="<?php echo e(env('APP_URL')); ?>storage/images/origin/<?php echo e($hinhanh); ?>" class="image-popup">
                      <div class="portfolio-masonry-box">
                        <div class="portfolio-masonry-img">
                          <img src="/storage/images/thumb_300x200/<?php echo e($hinhanh); ?>" class="thumb-img img-fluid" alt="work-thumbnail">
                        </div>
                        <div class="portfolio-masonry-detail">
                          <p><?php echo e($hinhanh); ?></p>
                        </div>
                      </div>
                    </a>
                    <a href="<?php echo e(env('APP_URL')); ?>image/delete/<?php echo e($hinhanh); ?>" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                      <i class="fa fa-trash"></i>
                    </a>
                    <input type="text" name="hinhanh_title[]" value="<?php echo e(old('hinhanh_title.'.$key)); ?>" class="form-control"/>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="form-actions">
              <a href="<?php echo e(env('APP_URL')); ?>admin/product" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
              <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
          </div>
        </form>
    	</div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/drag-arrange.min.js" type="text/javascript"></script> 
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/libs/number/jquery.number.min.js"></script>
  <script src="<?php echo e(env('APP_URL')); ?>assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      upload_hinhanh("<?php echo e(env('APP_URL')); ?>image/uploads"); delete_hinhanh();
      popup_images();$(".select2").select2();
      $("#progressbar").hide();
      $('.number').number(true, 0, ',', '.');
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/HoiPhi/add.blade.php ENDPATH**/ ?>