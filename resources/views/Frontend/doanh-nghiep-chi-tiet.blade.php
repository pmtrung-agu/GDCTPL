@extends('Frontend.layout')
@section('title', content: 'Doanh nghiệp:' . $ds['ten'])
@section('body')
<section class="space">
    <div class="container">
      <div class="team-details">
        <div class="row">
          <div class="col-xl-5">
            <div class="mb-40 mb-xl-0">
                @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                    <img class="w-100"  src="{{ env('APP_URL') }}storage/images/origin/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}" style="max-width:100%;">
                @else
                    <img class="w-100"  src="{{ env('APP_URL') }}assets/frontend/img/shape/service_1_1.png" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}">
                @endif
            </div>
          </div>
          <div class="col-xl-7 ps-3 ps-xl-5 align-self-center">
            <div class="team-about">
              <div class="team-wrapp">
                <div>
                  <h3 class="team-about_title">{{ $ds['ten'] }}</h3>
                  <p class="team-about_desig">{{ $ds['diachi'][3] }}</p>
                  {{-- <p class="team-about_text">Sem consequat mauris conubia inceptos nostra rutrum morbi sagittis pulvinar, commodo curabitur maecenas fermentum magna tempus nisi ullamcorper, ante auctor magnis pretium eu lectus euismod platea.</p>--}}
                </div>
                {{-- <div class="th-social">
                  <a href="https://www.facebook.com/">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="https://www.twitter.com/">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a href="https://www.linkedin.com/">
                    <i class="fab fa-linkedin-in"></i>
                  </a>
                  <a href="https://www.whatsapp.com/">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                </div>--}}
              </div>
              <div class="about-info-wrap">
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fa-solid fa-user"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Người đại diện</p>
                    <h6 class="about-info_title">{{ $ds['nguoidaidien'] }}</h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Email</p>
                    <h6 class="about-info_title">
                      <a href="mailto:{{ $ds['email'] }}">{{$ds['email']}}</a>
                    </h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-phone"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Điện thoại</p>
                    <h6 class="about-info_title">
                      <a href="tel:{{ $ds['dienthoai'] }}">{{ $ds['dienthoai'] }}</a>
                    </h6>
                  </div>
                </div>
                <div class="about-info">
                  <div class="about-info_icon">
                    <i class="fas fa-fax"></i>
                  </div>
                  <div class="about-info_content">
                    <p class="about-info_subtitle">Mã số thuế</p>
                    <h6 class="about-info_title">
                      <a href="#">{{ $ds['masothue'] }}</a>
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection