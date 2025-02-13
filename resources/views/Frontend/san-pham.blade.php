@extends('Frontend.layout')
@section('title', 'Sản phẩm')
@section('body')
@if($danhsach)
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Sản phẩm Doanh nghiệp tham gia</span>
            <h2 class="sec-title sec-title2"><span>{{ $tax['ten'] }}</span> </h2>
        </div>
        <div class="row">
            @foreach ($danhsach as $ds)
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="th-blog blog-single has-post-thumbnail">
                  <div class="blog-img" style="height:200px; overflow: hidden;">
                    <a href="{{ env('APP_URL') }}san-pham-chi-tiet/{{ $ds['slug'] }}">
                      @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                        <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $ds['photos'][0]['aliasname'] }}" alt="{{ $ds['ten'] }}">
                      @else
                        <img src="{{ env('APP_URL') }}assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
                      @endif
                    </a>
                  </div>
                  <div class="blog-content">
                    {{-- <div class="blog-meta">
                      <a href="{{ env('APP_URL') }}san-pham-chi-tiet/{{ $ds['slug'] }}">
                        <i class="fa-regular fa-calendar"></i> {{ $date_post }} </a>
                    </div>--}}
                    <h2 class="blog-title" style="font-size: 18px;height:45px;overflow: hidden;">
                      <a href="{{ env('APP_URL') }}san-pham-chi-tiet/{{ $ds['slug'] }}">{{ $ds['title'] }}</a>
                    </h2>
                    {{-- <p class="blog-text">{{ $ds['mo_ta'] }}</p> --}}
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        {{ $danhsach->withPath(env('APP_URL').'san-pham/' . $tax['slug']) }}
    </div>
</section>
@endif
@endsection