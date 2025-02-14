@extends('Frontend.layout')
@section('title', 'Danh sách chuyên gia tư vấn chuyển đổi số doanh nghiệp')

@section('body')
<section class="space" id="service-sec">
    <div class="container">
      <div class="row justify-content-center justify-content-lg-between">
        <div class="col-lg-7">
          <div class="title-area text-center text-lg-start">
            
            <h2 class="sec-title sec-title2">Danh sách Chuyên gia Tư vấn Chuyển đổi số.</h2>
          </div>
        </div>
        <div class="col-auto">
          <div class="sec-btn">
            <a href="{{env('APP_URL')}}admin/doanh-nghiep/tu-van-chuyen-doi-so" class="th-btn">Gởi câu hỏi</a>
          </div>
        </div>
      </div>
      @if($danhsach)
      <div class="row gy-4 justify-content-center">
        @foreach($danhsach as $ds)
        <div class="col-xl-4 col-md-6">
          <div class="service-featured style3">
            <div class="box-img">
            @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
            <img src="{{ env('APP_URL') }}storage/images/origin/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['fullname'] }}" title="{{ $ds['fullname'] }}" style="max-width:100%;">
            @else
              <img src="{{ env('APP_URL') }}assets/frontend/img/shape/service_1_1.png" alt="{{ $ds['fullname'] }}" title="{{ $ds['fullname'] }}">
            @endif
            </div>
            <h3 class="box-title">
              <a href="{{env('APP_URL')}}admin/doanh-nghiep/tu-van-chuyen-doi-so">{{ $ds['fullname'] }}</a>
            </h3>
            <p class="box-text">{{ $ds['ghi_chu'] }}</p>
            <a href="{{env('APP_URL')}}admin/doanh-nghiep/tu-van-chuyen-doi-so" class="th-btn">Gởi câu hỏi tư vấn <i class="fa-regular fa-arrow-right"></i>
            </a>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </section>
@endsection