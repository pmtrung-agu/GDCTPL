@extends('Frontent.layout')
@section('title', $ds['title'])
@section('css')
<link rel="stylesheet" href="{{ env('APP_URL') }}assets/vendors/photobox/photobox.css" />
<link rel="stylesheet" href="{{ env('APP_URL') }}assets/vendors/photobox/photobox.ie.css" />
<style>
  .pbCaptionText .title {
    font-size: 20px !important;
    color: #ff0400 !important;
  }
</style>
@endsection
@section('body')
  <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">{{ $ds['title'] }}</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="padding-bottom-100" style="padding-top:30px;">
      <div class="row">
        <div class="page-main col-md-8">
          <div class="blog-wrapper swin-blog-single" style="border: 4px solid #dfdfdf; padding: 20px;font-size:18px;">
            <p>{{ $ds['description'] }}</p>
            {!! $ds['contents']  !!}
            <!-- gallery-->
            @if($ds['photos'])
            <div class="swin-widget widget-gallery carousel">
              <div class="title-widget">Hình ảnh</div>
              <div class="widget-body widget-content clearfix">
                <div class="main-slider" id="gallery">
                  @foreach($ds['photos'] as $photo)
                    <div class="item-slide">
                      <a href="{{ env('APP_URL')}}storage/images/origin/{{ $photo['aliasname'] }}" title="{{ $photo['title'] }}">
                        <img src="{{ env('APP_URL')}}storage/images/thumb_370x280/{{ $photo['aliasname'] }}" alt="{{ $photo['title'] }}" title="{{ $photo['title'] }}" class="img-responsive showcase">
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="page-sidebar col-md-4">
          <!-- recent post-->
          @if($danhsach)
          <div class="swin-widget widget-recent-post">
            <div class="title-widget">Bài viết liên quan</div>
            <div class="widget-body widget-content clearfix">
              @foreach($danhsach as $d)
              <div class="swin-media">
                <div class="content-left">
                    <a href="{{ env('APP_URL') }}chi-tiet/{{ $d['slug'] }}">
                      @if(isset($d['photos'][0]['aliasname']) && $d['photos'][0]['aliasname'])
                        <img src="{{ env('APP_URL')}}storage/images/thumb_370x280/{{ $d['photos'][0]['aliasname'] }}" alt="{{ $d['title'] }}" title="{{ $d['title'] }}" class="media-object" style="width:150px;">
                      @else
                        <img src="{{ env('APP_URL')}}assets/images/default_thumb.jpg" alt="{{ $d['title'] }}" title="{{ $d['title'] }}" class="media-object"  style="width:150px;">
                      @endif
                    </a>
                  </div>
                <div class="content-right"><a href="{{ env('APP_URL') }}chi-tiet/{{ $d['slug'] }}" class="heading" alt="{{ $d['title'] }}" title="{{ $d['title'] }}">{{ Str::limit($d['title'],80) }}</a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/vendors/photobox/jquery.photobox.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      $("#gallery").photobox('a',{ time:0 });
    });
  </script>
@endsection