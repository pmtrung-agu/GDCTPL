@extends('Frontend.layout')
@section('title', 'Trang chủ')
@section('body')
<div class="th-hero-wrapper hero-3" id="hero">
    <div class="th-hero-bg bg-top-center" data-bg-src="{{ env('APP_URL') }}assets/frontend/img/bg/hero_bg_3.jpg"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="hero-style3 text-center">
          <h3 class="hero-title">DOANH NGHIỆP CÓ NHU CẦU VỀ CHUYỂN ĐỔI SỐ VUI LÒNG:</h3>
            <div class="btn-group justify-content-center">
              <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="th-btn">Gởi nhu cầu Chuyển đổi số</a>
              <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so" class="th-btn style5">Tư vấn Chuyển đổi số</a>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-img tilt-active">
        <img src="{{ env('APP_URL') }}assets/frontend/img/hero/hero_3_1.png" alt="Hero Image">
      </div>
    </div>
    <div class="th-circle">
      <span class="circle style1"></span>
      <span class="circle style2"></span>
    </div>
    <div class="shape-mockup z-index-3 spin d-none d-xl-block" data-top="13%" data-left="18%">
      <img src="{{ env('APP_URL') }}assets/frontend/img/shape/star-1.png" alt="">
    </div>
    <div class="shape-mockup spin d-none d-xl-block" data-top="15%" data-right="15%">
      <img src="{{ env('APP_URL') }}assets/frontend/img/shape/star-15.png" alt="">
    </div>
  </div>
  <div class="brand-sec4 overflow-hidden space">
    <div class="container">
      <div class="slider-area text-center">
        <div class="swiper th-slider brand-slider1" id="brandSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}'>
          <div class="swiper-wrapper">
            @for($i=1;$i<3;$i++)
            <div class="swiper-slide">
              <a href="https://cict.agu.edu.vn" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/cict-logo.png" alt="Trung tâm Tin học" style="height:50px;">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="https://dx.gov.vn/" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/brand/link1.png" alt="" style="height:50px;">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="https://mic.gov.vn" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/brand/link2.png" alt="" style="height:50px;">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="https://langso.dx.gov.vn" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/brand/link3.png" alt="" style="height:50px;">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="https://sotttt.angiang.gov.vn/" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/brand/link4.png" alt="" style="height:50px;">
              </a>
            </div>
            <div class="swiper-slide">
              <a href="https://dx.gov.vn/" class="brand-box" target="_blank">
                <img src="{{ env('APP_URL') }}assets/frontend/img/brand/link5.jpg" alt="" style="height:50px;">
              </a>
            </div>
            @endfor
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
              <img src="{{ env('APP_URL') }}assets/frontend/img/normal/about_4_1.png" alt="About">
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
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt="">Hợp tác quốc tế, nghiên cứu, phát triển và đổi mới sáng tạo trong môi trường số</li>
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt="">Chuyển đổi số trong các lĩnh vực ưu tiên</li>
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt="">Phát triển nền tảng cho chuyển đổi số</li>
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt=""> Phát triển chính quyền số</li>
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt="">Phát triển kinh tế số</li>
                <li><img src="{{ env('APP_URL') }}assets/frontend/img/icon/2.svg" alt=""> Phát triển xã hội số</li>
              </ul>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="shape-mockup d-none d-xl-block" data-bottom="0%" data-right="0%">
      <img src="{{ env('APP_URL') }}assets/frontend/img/shape/circle_1.png" alt="">
    </div>
</div>
@if($thong_tin)
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Thông tin & Sự kiện</span>
            <h2 class="sec-title sec-title2">Tin tức <span>Chuyển đổi số</span> </h2>
        </div>
      <div class="row">
        @foreach ($thong_tin as $tt)
        @php
          $date_post = App\Http\Controllers\ObjectController::getDate($tt['date_post'], "d/m/Y");
        @endphp
        <div class="col-xxl-4 col-lg-4 col-md-4">
          <div class="th-blog blog-single has-post-thumbnail">
            <div class="blog-img" style="height:150px; overflow: hidden;">
              <a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $tt['slug'] }}">
                @if(isset($tt['photos'][0]['aliasname']) && $tt['photos'][0]['aliasname'])
                  <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $tt['photos'][0]['aliasname'] }}" alt="{{ $tt['ten'] }}">
                @else
                  <img src="{{ env('APP_URL') }}assets/frontend/img/blog/blog-s-1-1.jpg" alt="{{ $tt['ten'] }}" style="height:250px;">
                @endif
              </a>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $tt['slug'] }}">
                  <i class="fa-regular fa-calendar"></i> {{ $date_post }} </a>
              </div>
              <h2 class="blog-title" style="height: 90px; overflow:hidden;">
                <a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $tt['slug'] }}" alt="{{ $tt['ten'] }}" title="{{ $tt['ten'] }}">{{ Str::limit($tt['ten'],70) }}</a>
              </h2>
              <p class="blog-text" title="{{ $tt['mo_ta'] }}" alt="{{ $tt['mo_ta'] }}" style="height: 100px;overflow:hidden;">{{ Str::limit($tt['mo_ta'], 140) }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endif
@if($chuyen_gia)
<section class="team-sec space-top bg-smoke4">
    <div class="container z-index-common">
      <div class="title-area text-center">
        <span class="sub-title sub-title2">Nhóm chuyên gia</span>
        <h2 class="sec-title sec-title2">Chuyên gia Tư vấn <span>Chuyển đổi số</span> tỉnh An Giang </h2>
      </div>
      <div class="slider-area">
        <div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
          <div class="swiper-wrapper">
            @foreach($chuyen_gia as $cg)
            <div class="swiper-slide">
              <div class="th-team team-card">
                <div class="box-img">
                  @if(isset($cg['photos'][0]['aliasname']) && $cg['photos'][0]['aliasname'])
                    <img src="{{ env('APP_URL') }}storage/images/origin/{{ $cg['photos'][0]['aliasname'] }}" alt="{{ $cg['title'] }}">
                  @else
                    <img src="{{ env('APP_URL') }}assets/frontend/img/team/dtnghi.png" alt="{{ $cg['fullname'] }}">
                  @endif
                </div>
                <div class="box-content">
                  <div>
                    <h3 class="box-title">
                      <a href="#" onclick="return false;">{{ $cg['fullname'] }}</a>
                    </h3>
                    <span class="team-desig">{{ $cg['ghi_chu'] }}</span>
                  </div>
                  <div class="team-social">
                    <div class="icon-btn">
                      <i class="fa-light fa-plus"></i>
                    </div>
                    <div class="th-social">
                      <a target="_blank" href="tel:{{ $cg['phone'] }}">
                        <i class="fas fa-mobile-alt"></i>
                      </a>
                      <a target="_blank" href="mailto:{{ $cg['username'] }}">
                        <i class="fas fa-envelope"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
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
@endif
@if($tai_lieu)
  <section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Thông tin & Sự kiện</span>
            <h2 class="sec-title sec-title2">Tài liệu <span>Chuyển đổi số</span> </h2>
        </div>
      <div class="row">
        @foreach ($tai_lieu as $tl)
        @php
          $date_post = App\Http\Controllers\ObjectController::getDate($tl['date_post'], "d/m/Y");
        @endphp
        <div class="col-xxl-4 col-lg-4 col-md-4">
          <div class="th-blog blog-single has-post-thumbnail">
            <div class="blog-img" style="height:150px; overflow: hidden;">
              <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tl['slug'] }}">
                @if(isset($tl['photos'][0]['aliasname']) && $tl['photos'][0]['aliasname'])
                  <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $tl['photos'][0]['aliasname'] }}" alt="{{ $tt['ten'] }}">
                @else
                  <img src="{{ env('APP_URL') }}assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
                @endif
              </a>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tl['slug'] }}">
                  <i class="fa-regular fa-calendar"></i>{{ $date_post }} </a>
              </div>
              <h2 class="blog-title" style="height: 90px; overflow:hidden;">
                <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tl['slug'] }}" title="{{ $tt['ten'] }}" alt="{{ $tt['ten'] }}">{{ Str::limit($tt['ten'],85) }}</a>
              </h2>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endif
  <section class="space-top space-bottom cta-sec2">
    <div class="container th-container">
      <div class="cta-area space bg-theme text-center" data-bg-src="{{ env('APP_URL') }}assets/frontend/img/bg/cta_shape_2.png">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="title-area mb-20 text-center">
              <h2 class="sec-title cta-title mb-20 text-white">Chuyển đổi số doanh nghiệp An Giang</h2>
              <p class="cta-text2">Các doanh nghiệp có nhu cầu xây dựng phần mềm quản lý, Website doanh nghiệp,... vui lòng chọn Gởi yêu cầu chuyển đổi số hoặc cần tư vấn về chuyển đổi số doanh nghiệp vui lòng chọ Tư vấn chuyển đổi số.</p>
            </div>
            <div class="btn-group justify-content-center">
              <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/add" class="th-btn style3">Gởi nhu cầu chuyển đổi số</a>
              <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so/add" class="th-btn style6">Tư vấn chuyển đổi số</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection