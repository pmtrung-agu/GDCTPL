@extends('Admin.layout')
@section('title', __('Tài liệu Chuyển đổi số'))
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css"/>
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 card-box">
                <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/tai-lieu/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Thêm mới') }}</a> {{ __('Danh sách Tài liệu Giáo dục Chính trị - Pháp luật') }}</h3>
                <hr />
                <form method="GET" action="{{ env('APP_URL') }}admin/tai-lieu">
                    <div class="row form-group">
                        <div class="col-12 col-md-4">
                            <input type="text" name="keywords" id="keywords" value="{{ $keywords }}" placeholder="Tìm Tên" class="form-control">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="submit" name="submit" value="Search" class="btn btn-primary"><i class="fa fa-search"></i> {{ __('Tìm') }}</button>
                        </div>
                    </div>
                </form>
                @if($danhsach)
                <table class="table table-border table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width:55px;">{{ __('STT') }}</th>
                            <th style="width:55px;">{{ __('Hình') }}</th>
                            <th>{{ __('Tên') }}</th>
                            <th>Phân loại</th>
                            <th  style="width:100px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($danhsach as $key => $ds)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="text-center">
                                @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                                <a href="{{ env('APP_URL') }}storage/images/origin/{{ $ds['photos'][0]['aliasname'] }}" class="image-popup">
                                    <img src="{{ env('APP_URL') }}storage/images/thumb_50/{{ $ds['photos'][0]['aliasname'] }}" title="{{ $ds['ho_ten'] }}" alt="{{ $ds['ho_ten'] }}" style="height:30px;">
                                </a>
                                @else
                                    <img src="{{ env('APP_URL') }}assets/backend/images/logo_sm.png" title="{{ $ds['ho_ten'] }}" alt="{{ $ds['ho_ten'] }}" style="height:30px;">
                                @endif
                            </td>
                            <td>
                                <a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $ds['slug'] }}" target="_blank"><strong>{{ $ds['ten'] }}</strong></a>
                                <span class="badge badge-info">{{ App\Http\Controllers\ObjectController::getDate($ds['date_post'],"d/m/Y H:i") }}</span>
                                @if(isset($ds['tin_moi']) && $ds['tin_moi'])
                                    <span class="badge badge-danger">NEW</span>
                                @endif
                            </td>
                            <td>
                                @if(isset($ds['tags']) && $ds['tags'])
                                    @foreach($ds['tags'] as $t)
                                        @php
                                            $tg = App\Models\DMTaiLieu::where('slug','=', $t)->first();
                                        @endphp
                                        @if($tg)
                                            <span class="badge badge-success"><i class="fa fa-tag"></i> {{ $tg['ten'] }}</span>
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ env('APP_URL') }}admin/tai-lieu/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắc xóa?')"><i class="fas fa-trash text-danger"></i></a>&nbsp;
                                <a href="{{ env('APP_URL') }}admin/tai-lieu/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @if($keywords)
                        {{ $danhsach->withPath(env('APP_URL').'admin/tai-lieu?' . $_SERVER['QUERY_STRING']) }}
                    @else
                        {{ $danhsach->withPath(env('APP_URL') . 'admin/tai-lieu') }}
                    @endif
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/libs/isotope/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
            @if(Session::get('msg') != null && Session::get('msg'))
            $.toast({
                heading:"Thông báo",
                text:"{{ Session::get('msg') }}",
                loaderBg:"#3b98b5",icon:"info", hideAfter:3e3,stack:1,position:"top-right"
            });
            @endif
            $('.image-popup').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                }
            });
        });
    </script>
@endsection
