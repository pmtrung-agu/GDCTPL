@extends('Admin.layout')
@section('title', $ds['tieu_de'])
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h2>
                        @if(App\Http\Controllers\UserController::is_roles('Admin,ABA,Manager')) <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao" class="btn btn-primary btn-sm"><i class="fa fa-reply-all"></i> Trở về</a>
                        @else <a href="{{ env('APP_URL') }}admin/doanh-nghiep/thong-bao-hhdn" class="btn btn-primary btn-sm"><i class="fa fa-reply-all"></i> Trở về</a>
                        @endif
                        {{ $ds['tieu_de'] }}
                    </h2>
                    <div class="lead">
                        {!! $ds['noi_dung'] !!}
                    </div>
                    @if($ds['photos'])
                    <div class="row">
                        <div class="col-12">
                            <h2>Hình ảnh</h2>
                        </div>
                    </div>
                    <div class="row" id="gallery">
                        @foreach($ds['photos'] as $p)
                            <div class="col-12 col-md-3">
                                <a href="{{ env('APP_URL') }}storage/images/origin/{{ $p['aliasname'] }}">
                                    <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" alt="" title="{{ $p['title'] }}" style="width:100%;">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @endif
                    @if($ds['attachments'])
                    <div class="row">
                        <div class="col-12">
                            <h2>Đính kèm</h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($ds['attachments'] as $k => $dk)
                            <div class="col-12 col-md-12">
                                <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/download/{{ $ds['_id'] }}/{{ $k }}"><i class="fas fa-download"></i> {{ $dk['title'] }}</a>
                            </div>
                        @endforeach
                    </div>
                    @endif

                </div>
            </div>
        </div>
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