@extends('Frontend.layout')
@section('title', $tax['ten'])
@section('body')
@if($danhsach)
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Tài liệu chuyển đổi số</span>
            <h2 class="sec-title sec-title2"><span>{{ $tax['ten'] }}</span> </h2>
        </div>
      <div class="row">
        @foreach ($danhsach as $tt)
        @php
          $date_post = App\Http\Controllers\ObjectController::getDate($tt['date_post'], "d/m/Y");
        @endphp
        <div class="col-xxl-4 col-lg-4 col-md-4">
          <div class="th-blog blog-single has-post-thumbnail">
            <div class="blog-img">
              <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tt['slug'] }}">
                @if(isset($tt['photos'][0]['aliasname']) && $tt['photos'][0]['aliasname'])
                  <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $tt['photos'][0]['aliasname'] }}" alt="{{ $tt['ten'] }}">
                @else
                  <img src="{{ env('APP_URL') }}assets/frontend/img/blog/blog-s-1-1.jpg" alt="Blog Image" style="height:250px;">
                @endif
              </a>
            </div>
            <div class="blog-content">
              <div class="blog-meta">
                <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tt['slug'] }}">
                  <i class="fa-regular fa-calendar"></i> {{ $date_post }} </a>
              </div>
              <h2 class="blog-title">
                <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tt['slug'] }}">{{ $tt['ten'] }}</a>
              </h2>
              <p class="blog-text">{{ $tt['mo_ta'] }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endif

@endsection