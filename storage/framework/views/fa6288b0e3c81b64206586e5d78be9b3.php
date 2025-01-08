
<?php $__env->startSection('title', 'Trang chủ'); ?>
<?php $__env->startSection('body'); ?>
<div class="th-hero-wrapper hero-3" id="hero">
    <div class="th-hero-bg bg-top-center" data-bg-src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/bg/hero_bg_3.jpg"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="hero-style3 text-center">
          <h3 class="hero-title">DANH NGHIỆP CÓ NHU CẦU VỀ CHUYỂN ĐỔI SỐ VUI LÒNG:</h3>
            <div class="btn-group justify-content-center">
              <a href="<?php echo e(env('APP_URL')); ?>goi-yeu-cau" class="th-btn">Gởi yêu cầu Chuyển đổi số</a>
              <a href="<?php echo e(env('APP_URL')); ?>tu-van-chuyen-doi-so" class="th-btn style5">Tư vấn Chuyển đổi số</a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-img tilt-active">
        <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/hero/hero_3_1.png" alt="Hero Image">
      </div>
    </div>
    <div class="th-circle">
      <span class="circle style1"></span>
      <span class="circle style2"></span>
    </div>
    <div class="shape-mockup z-index-3 spin d-none d-xl-block" data-top="13%" data-left="18%">
      <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/star-1.png" alt="">
    </div>
    <div class="shape-mockup spin d-none d-xl-block" data-top="15%" data-right="15%">
      <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/star-15.png" alt="">
    </div>
  </div>
  <div class="brand-sec4 overflow-hidden space">
    <div class="container">
      <div class="slider-area text-center">
        <div class="swiper th-slider brand-slider1" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
          <div class="swiper-wrapper">
            <?php for($i=1;$i<10;$i++): ?>
            <div class="swiper-slide">
              <a href="https://cict.agu.edu.vn" class="brand-box">
                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/cict-logo.png" alt="Trung tâm Tin học" style="height:50px;">
              </a>
            </div>
            <?php endfor; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="ms-80 me-80 th-radius5 bg-smoke2 overflow-hidden space" id="about-sec">
    <div class="container">
      <div class="row gy-4 align-items-center">
        <div class="col-xl-6 mb-30 mb-xl-0">
          <div class="img-box6 me-xl-5 pe-xl-2">
            <div class="img1 tilt-active">
              <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/normal/about_4_1.png" alt="About">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="title-area mb-35">
            <span class="sub-title">Cổng thông tin Chuyển đổi số Doanh nghiệp nhỏ và vừa tỉnh An Giang</span>
            <h2 class="sec-title sec-title2">Chương trình <span>Chuyển đổi số</span> tỉnh An Giang </h2>
          </div>
          <div class="one-column mb-50 list-center ms-0">
            <div class="checklist style7">
              <ul>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt="">Hợp tác quốc tế, nghiên cứu, phát triển và đổi mới sáng tạo trong môi trường số</li>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt="">Chuyển đổi số trong các lĩnh vực ưu tiên</li>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt="">Phát triển nền tảng cho chuyển đổi số</li>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt=""> Phát triển chính quyền số</li>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt="">Phát triển kinh tế số</li>
                <li><img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/icon/2.svg" alt=""> Phát triển xã hội số</li>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shape-mockup d-none d-xl-block" data-bottom="0%" data-right="0%">
      <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/shape/circle_1.png" alt="">
    </div>
  </div>
  
  <section class="th-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Thông tin & Sự kiện</span>
            <h2 class="sec-title sec-title2">Tin tức <span>Chuyển đổi số</span> </h2>
        </div>
      <div class="row">
        <?php for($i=0; $i<6; $i++): ?>
        <div class="col-xxl-4 col-lg-4 col-md-4">
          <div class="th-blog blog-single has-post-thumbnail">
            <div class="blog-img">
              <a href="blog-details.html">
                <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
              </a>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <a href="blog.html">
                  <i class="fa-regular fa-calendar"></i>10 July, 2024 </a>
                <a href="blog.html">
                  <i class="fa-regular fa-clock"></i>08 min read </a>
              </div>
              <h2 class="blog-title">
                <a href="blog-details.html">How a Digital Marketing Agency Can Boost Your Business</a>
              </h2>
              <p class="blog-text">Digital agencies work with a diverse range of clients across industries, including small businesses, startups, midsize companies, and large enterprises. Clients may span various sectors such as e-commerce, technology, healthcare, finance, retail, hospitality, and more.</p>
              <a href="blog-details.html" class="line-btn">Read Details <i class="fa-solid fa-angles-right"></i>
              </a>
            </div>
          </div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
</section>

  <section class="team-sec space">
    <div class="container z-index-common">
      <div class="title-area text-center">
        <span class="sub-title sub-title2">Nhóm chuyên gia</span>
        <h2 class="sec-title sec-title2">Chuyên gia Tư vấn <span>Chuyển đổi số</span> tỉnh An Giang </h2>
      </div>
      <div class="slider-area">
        <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="th-team team-card">
                <div class="box-img">
                  <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/team/dtnghi.png" alt="Team">
                </div>
                <div class="box-content">
                  <div>
                    <h3 class="box-title">
                      <a href="team-details.html">Đoàn Thanh Nghị</a>
                    </h3>
                    <span class="team-desig">Chuyên gia tư vấn TƯ VẤN KINH DOANH - CHUYỂN ĐỔI SỐ DOANH NGHIỆP</span>
                  </div>
                  <div class="team-social">
                    <div class="icon-btn">
                      <i class="fa-light fa-plus"></i>
                    </div>
                    <div class="th-social">
                      <a target="_blank" href="https://facebook.com/">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a target="_blank" href="https://twitter.com/">
                        <i class="fab fa-twitter"></i>
                      </a>
                      <a target="_blank" href="https://instagram.com/">
                        <i class="fab fa-instagram"></i>
                      </a>
                      <a target="_blank" href="https://linkedin.com/">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
                <div class="th-team team-card">
                  <div class="box-img">
                    <img src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/team/pmtrung.jpg" alt="Team">
                  </div>
                  <div class="box-content">
                    <div>
                      <h3 class="box-title">
                        <a href="team-details.html">Phan Minh Trung</a>
                      </h3>
                      <span class="team-desig">Chuyên gia tư vấn TƯ VẤN KINH DOANH - CHUYỂN ĐỔI SỐ DOANH NGHIỆP</span>
                    </div>
                    <div class="team-social">
                      <div class="icon-btn">
                        <i class="fa-light fa-plus"></i>
                      </div>
                      <div class="th-social">
                        <a target="_blank" href="https://facebook.com/">
                          <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank" href="https://twitter.com/">
                          <i class="fab fa-twitter"></i>
                        </a>
                        <a target="_blank" href="https://instagram.com/">
                          <i class="fab fa-instagram"></i>
                        </a>
                        <a target="_blank" href="https://linkedin.com/">
                          <i class="fab fa-linkedin-in"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
          </div>
        </div>
        <button data-slider-prev="#teamSlider1" class="slider-arrow style3 slider-prev">
          <i class="far fa-arrow-left"></i>
        </button>
        <button data-slider-next="#teamSlider1" class="slider-arrow style3 slider-next">
          <i class="far fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </section>

  <section class="cta-sec2" data-pos-for=".footer-wrapper" data-sec-pos="bottom-half">
    <div class="container th-container">
      <div class="cta-area space bg-theme text-center" data-bg-src="<?php echo e(env('APP_URL')); ?>assets/frontend/img/bg/cta_shape_2.png">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="title-area mb-20 text-center">
              <h2 class="sec-title cta-title mb-20 text-white">Chuyển đổi số doanh nghiệp An Giang</h2>
              <p class="cta-text2">Các doanh nghiệp có nhu cầu xây dựng phần mềm quản lý, Website doanh nghiệp,... vui lòng chọn Gởi yêu cầu chuyển đổi số hoặc cần tư vấn về chuyển đổi số doanh nghiệp vui lòng chọ Tư vấn chuyển đổi số.</p>
            </div>
            <div class="btn-group justify-content-center">
              <a href="<?php echo e(env('APP_URL')); ?>" class="th-btn style3">Gởi yêu cầu chuyển đổi số</a>
              <a href="<?php echo e(env('APP_URL')); ?>" class="th-btn style6">Tư vấn chuyển đổi số</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Frontend/index.blade.php ENDPATH**/ ?>