@extends('Frontend.layout')
@section('title', 'Tài liệu')

@section('body')
<div class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">Tài liệu</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
</div>
@if($danhsach)
<section class="product-sesction-02 padding-bottom-100">
    <div class="container">
        <div class="swin-sc swin-sc-product products-02 carousel-02">
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