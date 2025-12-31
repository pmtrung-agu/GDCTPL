@extends('Frontend.layout')
@section('body')
@include('Frontend.widget-slider')
{{-- -
@if($thong_tin)
<section class="blog-section padding-top-100 padding-bottom-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="swin-sc swin-sc-title">
          <p class="top-title"><span>Giáo dục Chính trị - Pháp luật</span></p>
          <h3 class="title">Tin tức mới nhất</h3>
        </div>
        <div class="swin-sc swin-sc-blog-grid"></div>
      </div>
      <div class="col-md-12">
        <div class="swin-sc swin-sc-blog-grid">
          <div class="row">
            @foreach ($thong_tin as $ds)
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
    {{ $thong_tin->withPath(env('APP_URL')) }}
  </div>
</section>
@endif
 --}}
@if($danhsach)
<section class="product-sesction-02 padding-bottom-100" style="margin-top:50px;">
    <div class="container">
        <div class="swin-sc swin-sc-product products-02 carousel-02">
            <div class="row">
              <div class="col-12">
                <div class="swin-sc swin-sc-title">
                  <p class="top-title"><span>Giáo dục Chính trị - Pháp luật</span></p>
                  <h3 class="title">Tài liệu</h3>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="products nav-slider">
                    <div class="row slick-padding">
                        @foreach($danhsach as $ds)
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="blog-item item swin-transition">
                                <div class="block-img">
                                    @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                                        <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}" class="img img-responsive" style="height:200px;">
                                    @else 
                                        <img src="{{ env('APP_URL') }}assets/frontend/images/default_thumb.jpg" alt="{{ $ds['ten'] }}" title="{{ $ds['ten'] }}" class="img img-responsive" style="height:200px;">
                                    @endif
                                </div>
                                <div class="block-content">
                                    <h5 class="title text-center"><a href="{{ env('APP_URL') }}tai-lieu/{{ $ds['slug'] }}">{{ $ds['ten'] }}</a></h5>
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