@extends('Frontend.layout')
@section('title', 'Doanh nghiệp tham gia')
@section('body')
<br />
<section class="cta-sec" style="margin: 100px 0x 0x -30px;" >
    <div class="container">
      <div class="cta-area space-extra2 bg-theme text-center" data-bg-src="{{ env('APP_URL') }}assets/frontend/img/bg/cta_shape_1.png">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="title-area mb-25 mt-n2 text-center">
              <span class="sub-title sub-title6">Doanh nghiệp tham gia Chuyển đổi số</span>
            </div>
            <form class="newsletter-form" method="GET" action="{{ env('APP_URL') }}doanh-nghiep/doanh-nghiep-tham-gia">
              <input class="form-control" name="q" id="q" value="{{ $q }}" type="text" placeholder="Tìm kiếm Doanh nghiệp" />
              <button type="submit" class="th-btn style4">Tìm kiếm</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
<section class="space" id="service-sec">
    <div class="container">
      @if($danhsach)
      <div class="row gy-4 justify-content-center">
        @foreach($danhsach as $ds)
        <div class="col-xl-4 col-md-6">
          <div class="service-featured style3">
            <div class="box-img">
            @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
            <img src="{{ env('APP_URL') }}storage/images/origin/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}" style="max-width:100%;">
            @else
              <img src="{{ env('APP_URL') }}assets/frontend/img/shape/service_1_1.png" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}">
            @endif
            </div>
            <h3 class="box-title">
              <a href="{{env('APP_URL')}}doanh-nghiep/chi-tiet/{{ $ds['slug'] }}">{{ $ds['ten'] }}</a>
            </h3>
            <p class="box-text">{{ $ds['ghi_chu'] }}</p>
            <a href="{{env('APP_URL')}}doanh-nghiep/chi-tiet/{{ $ds['slug'] }}" class="th-btn">Xem chi tiết <i class="fa-regular fa-arrow-right"></i>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-12">
            @if($q)
                {{ $danhsach->withPath(env('APP_URL').'doanh-nghiep/doanh-nghiep-tham-gia?' . $_SERVER['QUERY_STRING']) }}    
            @else
            {{ $danhsach->withPath(env('APP_URL').'doanh-nghiep/doanh-nghiep-tham-gia') }}    
            @endif
        </div>
      </div>
      @endif
    </div>
  </section>
@endsection