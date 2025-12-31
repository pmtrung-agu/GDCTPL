@extends('Frontend.layout')
@section('title', $ds['ten'])
@section('css')
<link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/photobox/photobox.css" />
<link rel="stylesheet" href="{{ env('APP_URL') }}assets/frontend/vendors/photobox/photobox.ie.css" />
<style>
  .pbCaptionText .title {
    font-size: 20px !important;
    color: #ff0400 !important;
  }
  iframe { max-width:100% !important;}
 @media screen and (max-width: 768px) {
    iframe {
      height: 300px !important;
    }
}
.
</style>
@endsection
@section('body')
  <div data-bottom-top="background-position: 50% 50px;" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -50px;" class="page-title page-blog">
    <div class="container">
      <div class="title-wrapper">
        <div data-top="transform: translateY(0px);opacity:1;" data--120-top="transform: translateY(-30px);opacity:0;" data-anchor-target=".page-title" class="title">{{ $ds['ten'] }}</div>
        <div data-top="opacity:1;" data--120-top="opacity:0;" data-anchor-target=".page-title" class="divider"><span class="line-before"></span><span class="dot"></span><span class="line-after"></span></div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="padding-bottom-100" style="padding-top:30px;">
      <div class="row">
        <div class="page-main col-md-8">
          <div class="blog-wrapper swin-blog-single" style="border: 4px solid #dfdfdf; padding: 20px;font-size:18px;">
            <p>{{ $ds['mo_ta'] }}</p>
            {!! $ds['noi_dung']  !!}

            @if(isset($ds['attachments'][0]['aliasname']) && strtolower($ds['attachments'][0]['type']) == 'pdf')
              <div>
                <div id="pdf-container" style="width:100% !important;"></div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>               
                <script>
                  const url = '{{ env('APP_URL') }}storage/files/{{ $ds['attachments'][0]['aliasname'] }}'; // đường dẫn đến file PDF
                  const container = document.getElementById('pdf-container');
                  pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';
                  pdfjsLib.getDocument(url).promise.then(pdf => {
                      const totalPages = pdf.numPages;

                      for (let pageNumber = 1; pageNumber <= totalPages; pageNumber++) {
                      pdf.getPage(pageNumber).then(page => {
                          const scale = 1.2;
                          const viewport = page.getViewport({ scale });

                          const canvas = document.createElement('canvas');
                          const context = canvas.getContext('2d');
                          canvas.height = viewport.height;
                          canvas.width = viewport.width;

                          container.appendChild(canvas);

                          const renderContext = {
                          canvasContext: context,
                          viewport: viewport
                          };
                          page.render(renderContext);
                      });
                      }
                  });
                </script>
            </div>
            @endif
            <!-- gallery-->
            @if($ds['photos'])
            <div class="swin-widget widget-gallery carousel">
              <div class="title-widget">Hình ảnh</div>
              <div class="widget-body widget-content clearfix">
                <div class="main-slider" id="gallery">
                  @foreach($ds['photos'] as $photo)
                    <div class="item-slide">
                      <a href="{{ env('APP_URL')}}storage/images/origin/{{ $photo['aliasname'] }}" title="{{ $photo['title'] }}">
                        <img src="{{ env('APP_URL')}}storage/images/thumb_360x200/{{ $photo['aliasname'] }}" alt="{{ $photo['title'] }}" title="{{ $photo['title'] }}" class="img-responsive showcase">
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
            <div class="title-widget">Bài liên quan</div>
            <div class="widget-body widget-content clearfix">
              @foreach($danhsach as $d)
              <div class="swin-media">
                <div class="content-right">
                    <a href="{{ env('APP_URL') }}chi-tiet-tai-lieu/{{ $d['slug'] }}"  alt="{{ $d['ten'] }}" title="{{ $d['ten'] }}" class="swin-btn center form-submit btn-transparent" style="background:#ffff00;width:100%;">{{ Str::limit($d['ten'],80) }}</a>
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
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/frontend/vendors/photobox/jquery.photobox.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function(){
      $("#gallery").photobox('a',{ time:0 });
    });
  </script>
@endsection