@extends('Frontend.layout')
@section('body')
<div class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Tin hoạt động</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
</div>
@if($danhsach)
<section class="blog-section padding-top-100 padding-bottom-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="swin-sc swin-sc-title">
          <p class="top-title"><span>Giáo dục Chính trị - Pháp luật</span></p>
          <h3 class="title"></h3>
        </div>
        <div class="swin-sc swin-sc-blog-grid"></div>
      </div>
      <div class="col-md-12">
        <div class="swin-sc swin-sc-blog-grid">
          <div class="row">
            @foreach ($danhsach as $ds)
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div data-wow-delay="0s" class="blog-item swin-transition item wow fadeInUpShort">
                  <div class="blog-featured-img">
                    @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                    <img src="{{ env('APP_URL') }}storage/images/thumb_370x280/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['title'] }}" title="{{ $ds['title'] }}" class="img img-responsive">
                    @else
                    <img src="{{ env('APP_URL') }}assets/images/default_thumb.jpg" alt="{{ $ds['title'] }}" title="{{ $ds['title'] }}" class="img img-responsive">
                    @endif
                  </div>
                  <div class="blog-content">
                    <h3 class="blog-title"><a href="{{ env('APP_URL') }}chi-tiet/{{ $ds['slug'] }}" class="swin-transition" title="{{ $ds['title'] }}" alt="{{ $ds['title'] }}">{{ Str::limit($ds['title'],60) }}</a></h3>
                    <p class="blog-description">{{ Str::limit($ds['description'],400) }}</p>
                    <div class="blog-readmore"><a href="{{ env('APP_URL') }}chi-tiet/{{ $ds['slug'] }}" class="swin-transition">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
                  </div>
                </div>
              </div>
            @endforeach        
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
@endsection