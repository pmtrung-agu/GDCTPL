@extends('Frontend.layout')
@section('title', 'Thông báo của Hiệp hội Doanh nghiệp tỉnh An Giang')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection
@section('body')
<div class="overflow-hidden space" id="faq-sec">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title-area">
                    <h2 class="sec-title">Thông báo của HHDN</h2>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="widget widget_search" style="padding:0px !important;">
                    <form class="search-form" action="{{ env('APP_URL') }}doanh-nghiep/thong-bao-cua-hhdn" method="GET" id="SearchForm">
                      <input type="text" placeholder="Tìm kiếm" name="q" id="q" value="{{ $q }}">
                      <button type="submit">
                        <i class="far fa-search"></i>
                      </button>
                    </form>
                  </div>
            </div>
        </div>
        @if($danhsach)
        <div class="row justify-content-center">
            <div class="col-lg-12">
            <div class="accordion-area accordion" id="faqAccordion">
                @foreach($danhsach as $ds)
                <div class="accordion-card style3 style1">
                    <div class="accordion-header" id="collapse-item-{{ $ds['_id'] }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $ds['_id'] }}" aria-expanded="false" aria-controls="collapse-{{ $ds['_id'] }}">{{ $ds['tieu_de'] }}</button>
                    </div>
                    <div id="collapse-{{ $ds['_id'] }}" class="accordion-collapse collapse" aria-labelledby="collapse-item-{{ $ds['_id'] }}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            <p>Ngày: {{ \Carbon\Carbon::parse($ds['updated_at'])->format("d/m/Y H:i") }}</p>
                            {!! $ds['noi_dung'] !!}
                            @if($ds['photos'])
                                <h5>Hình ảnh: </h5>
                                <div class="row" id="gallery">
                                    @foreach($ds['photos'] as $p)
                                        <div class="col-12 col-md-3">
                                            <a href="{{ env('APP_URL') }}storage/images/origin/{{ $p['aliasname'] }}">
                                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" alt="{{ $p['title'] }}" title="{{ $p['title'] }}" style="width:100%;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <br />
                            @if($ds['attachments'])
                                <h5>Đính kèm: </h5>
                                <table class="table table-border table-bordered table-striped table-hovered">
                                    <thead>
                                        <tr>
                                            <th>Nội dung</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ds['attachments'] as $kdk => $dk)
                                        <tr>
                                            <td>
                                                <a href="{{ env ('APP_URL')}}doanh-nghiep/thong-bao-cua-hhdn/tai-ve/{{ $ds['_id'] }}/{{ $kdk }}">
                                                    {{ $dk['title'] }}
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach

                {{ $danhsach->withPath(env('APP_URL').'doanh-nghiep/thong-bao-cua-hhdn?q='.$q) }}
            </div>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/frontend/libs/photobox/jquery.photobox.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('#gallery').photobox('a',{ time:0 });
  });
</script>
@endsection