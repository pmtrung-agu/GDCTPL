
<?php $__env->startSection('title', 'Đăng ký thành viên'); ?>

<?php $__env->startSection('body'); ?>
<div class="space">
    <div class="container">
      <div class="row gy-4 flex-row-reverse">
        <div class="col-lg-6 col-xl-7">
            <div class="cta-area space bg-theme text-center background-image" style="background-image: url(&quot;http://172.19.49.68:8000/assets/frontend/img/bg/cta_shape_2.png&quot;);">
                <div class="row justify-content-center">
                  <div class="col-lg-10">
                    <div class="title-area mb-20 text-center">
                      <?php if($blnRegis): ?>
                        <h2 class="sec-title cta-title mb-20 text-white" style="font-size: 30px;">Đăng ký thành công</h2>
                        <p class="cta-text2">Chúc mừng quý Doanh nghiệp đã tham gia thành công. Chúng tôi gởi thông tin tài khoản đăng nhập vào Email của quý Doanh nghiệp đăng ký.</p>
                      <?php else: ?>
                      <h2 class="sec-title cta-title mb-20 text-white" style="font-size: 30px;">Không thể đăng ký Thành viên</h2>
                      <p class="cta-text2">Dữ liệu đăng ký đã tồn tại trong hệ thống. Quý Doanh nghiệp vui lòng liên hệ Trung tâm Tin học Trường Đại học An Giang để được hỗ trợ.</p>
                      <?php endif; ?>
                      <p class="cta-text2">Mọi thắc mắc có thể liên hệ trực tiếp Trung tâm Tin học Trường Đại học An Giang</p>
                    </div>
                  </div>
                </div>
              </div>    
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
                <span class="contact-item_text">18 Ung Văn Khiêm, P. Mỹ Xuyên, Tp. Long Xuyên, An Giang</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/dang-ky-thanh-vien-submit.blade.php ENDPATH**/ ?>