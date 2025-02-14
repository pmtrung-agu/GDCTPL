@extends('Frontend.layout')
@section('title', $ds['title'])
@section('body')
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xxl-8 col-lg-7">
            <div class="th-blog blog-single">
                <div class="blog-content">
                <div class="blog-meta">
                    <h2 class="blog-title">{{ $ds['title'] }}</h2>
                    @php
                        $date_post = App\Http\Controllers\ObjectController::getDate($ds['updated_at'], "d/m/Y");
                    @endphp
                    <img src="{{ env('APP_URL') }}storage/images/origin/{{ $ds['photos'][0]['aliasname'] }}" style="width:100%"/>
                    <a href="#"> <i class="fa-regular fa-calendar"></i> {{ $date_post }}</a>
                    <p>{{ $ds['description'] }}</p>
                    {!! $ds['content'] !!}
                </div>
                </div>
                <div class="share-links clearfix">
                    <div class="row justify-content-between">
                        @if($ds['id_product_category'])
                        <div class="col-sm-auto">
                        <span class="share-links-title">Tags:</span>
                        <div class="tagcloud">
                            @foreach ($ds['id_product_category'] as $tag )
                            @php
                                $t = App\Models\DMSanPham::where('_id', '=', $tag)->first();
                            @endphp
                                <a href="{{ env('APP_URL') }}thong-tin/{{ $tag }}">{{ $t['ten'] }}</a>    
                            @endforeach
                        </div>
                        </div> 
                        @endif
                        <div class="col-sm-auto text-xl-end">
                        <span class="share-links-title">Chia sẽ:</span>
                        <ul class="social-links">
                            <li>
                            <a href="https://facebook.com/" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            </li>
                        </ul>
                        </div>
                        @if(isset($ds['attachments']) && $ds['attachments'])
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Đính kèm</h3>
                            <div class="tagcloud">
                                @foreach($ds['attachments'] as $kk => $dk)
                                <a href="{{ env('APP_URL') }}thong-tin/tai-ve/{{ $ds['_id'] }}/{{ $kk }}"><i class="fa fa-file"></i> {{ $dk['title'] }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 col-lg-5">
            @php
            $dm_thong_tin = App\Models\DMSanPham::All();
            @endphp
          <aside class="sidebar-area">
            <div class="widget widget_categories">
              <h3 class="widget_title">Thông tin</h3>
              @if($dm_thong_tin)
              <ul>
                @foreach ($dm_thong_tin as $dmtt )
                <li><a href="{{ env('APP_URL') }}san-pham/{{ $dmtt['slug'] }}">{{ $dmtt['ten'] }}</a></li>
                @endforeach
              </ul>
              @endif
            </div>
            {{-- @if($bai_viet_moi)
            <div class="widget">
              <h3 class="widget_title">Bài viết gần nhất</h3>
                <div class="recent-post-wrap">
                    @foreach($bai_viet_moi as $bvm)
                    <div class="recent-post">
                        <div class="media-img">
                            <a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $bvm['slug'] }}">
                                @if(isset($bvm['photos'][0]['aliasname']) && $bvm['photos'][0]['aliasname'])
                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $bvm['photos'][0]['aliasname'] }}" alt="{{ $bvm['ten'] }}">
                                @else
                                    <img src="{{ env('APP_URL') }}assets/frontend/img/blog/recent-post-1-1.jpg" alt="{{ $bvm['ten'] }}">
                                @endif
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="post-title">
                            <a class="text-inherit" href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $bvm['slug'] }}" title="{{ $bvm['ten'] }}" alt="{{ $bvm['ten'] }}">{{ Str::limit($bvm['ten'], 50) }}</a>
                            </h4>
                            @php
                                $date_post = App\Http\Controllers\ObjectController::getDate($bvm['date_post'], "d/m/Y");
                            @endphp
                            <div class="recent-post-meta">
                            <a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $bvm['slug'] }}">{{ $date_post }}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
 --}}
          </aside>
        </div>
      </div>
    </div>
</section>
@endsection