
<?php $__env->startSection('title', 'Gởi thông tin nhu cầu chuyển đổ số của Doanh nghiệp'); ?>
<?php $__env->startSection('body'); ?>
<div class="space">
    <div class="container">
      <div class="row gy-4 flex-row-reverse">
        <div class="col-lg-6 col-xl-7">
            
        <form action="<?php echo e(env('APP_URL')); ?>goi-yeu-cau-submit" method="POST" class="contact-form2 input-smoke ajax-contact">
            <?php echo e(csrf_field()); ?>

            <div class="title-area mt-n2 mb-40">
                <h3 class="sec-title">Nhu cầu Chuyển đổi số</h3>
                <p class="">Vui lòng điền đầy đủ thông tin và nhu cầu mong muốn chuyển đổi số:</p>
                
              </div>
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" name="ho_ten" id="ho_ten" placeholder="Họ tên" required>
                <i class="fal fa-user"></i>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ Email"  required>
                <i class="fal fa-envelope"></i>
              </div>
              <div class="form-group col-md-6">
                <input type="tel" class="form-control" name="dien_thoai" id="dien_thoai" placeholder="Điện thoại liên hệ"  required>
                <i class="fal fa-phone"></i>
              </div>
              <div class="form-group col-md-6">
                <select name="nhu_cau" id="nhu_cau" class="form-select nice-select" required>
                  <option value="" disabled="disabled" selected="selected" hidden>Chọn nhu cầu</option>
                  <option value="Xây dựng phần mềm Quản lý">Xây dựng phần mềm Quản lý</option>
                  <option value="Xây dựng Website">Xây dựng Website</option>
                  <option value="Khảo sát tư vấn Chuyển đổi số">Khảo sát tư vấn Chuyển đổi số</option>
                  <option value="Tập huấn về chuyển đổi số">Tập huấn về chuyển đổi số</option>
                  <option value="Nhu cầu khác">Nhu cầu khác</option>
                </select>
              </div>
              <div class="form-group col-12">
                <textarea name="noi_dung" id="noi_dung" cols="30" rows="3" class="form-control" placeholder="Nội dung chi tiết"></textarea>
                <i class="fal fa-pencil"></i>
              </div>
              <div class="form-btn col-12">
                <button type="submit" name="submit" value="Ok" class="th-btn">Gởi nhu cầu</button>
              </div>
            </div>
            
          </form>
        </div>
        <div class="col-lg-6 col-xl-5">
          <div class="contact-item-wrap">
            <div class="title-area mt-n2 mb-40">
              <h3 class="sec-title">Thông tin liên hệ</h3>
              <p class="">Doanh nghiệp có nhu cầu về chuyển đổi số Doanh nghiệp có thê liên hệ trực tiếp:</p>
              <span class="contact-item_text">
                <a href="https://cict.agu.edu.vn">Trung tâm Tin học Trường Đại học An Giang</a>
              </span>
            </div>
            <div class="contact-item">
              <div class="contact-item_icon">
                <i class="">
                  <img src="<?php echo e(env('APP_URL')); ?>assets/frontend//img/icon/phone.svg" alt="">
                </i>
              </div>
              <div class="media-body">
                <span class="contact-item_title">Điện thoại</span>
                <span class="contact-item_text">
                  <a href="tel:+58125253158">(02966) 253.599</a>
                </span>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-item_icon">
                <i class="">
                  <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/message.svg" alt="">
                </i>
              </div>
              <div class="media-body">
                <span class="contact-item_title">Email</span>
                <span class="contact-item_text">
                  <a href="mailto:cict@agu.edu.vn">cict@agu.edu.vn</a>
                </span>
              </div>
            </div>
            <div class="contact-item">
              <div class="contact-item_icon">
                <i class="">
                  <img src="<?php echo e(env('APP_URL')); ?>assets/frontend//img/icon/location.svg" alt="">
                </i>
              </div>
              <div class="media-body">
                <span class="contact-item_title">Địa chỉ</span>
                <span class="contact-item_text">18 Ung Văn Khiêm, P. Đông Xuyên, Tp. Long Xuyên, An Giang</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/goi-yeu-cau.blade.php ENDPATH**/ ?>