@extends('Admin.layout')
@section('title', __('Quản lý Văn bản'))
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
                <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Thêm mới') }}</a> {{ __('Danh sách Văn bản') }}</h3>
                <hr />
                <form method="GET" action="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban">
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
                            <th>{{ __('STT') }}</th>
                            <th>{{ __('Số hiệu') }}</th>
                            <th>{{ __('Trích yếu') }}</th>
                            <th  style="width:100px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($danhsach as $key => $ds)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="text-center">{{ $ds['so_hieu'] }}</td>
                            <td>
                                <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban-chi-tiet/{{ $ds['_id'] }}"><strong>{{ $ds['trich_yeu'] }}</strong></a>
                                    <span class="badge badge-info">{{ App\Http\Controllers\ObjectController::getDate($ds['date_post'],"d/m/Y H:i") }}</span>
                                @if(isset($ds['tin_moi']) && $ds['tin_moi'])
                                    <span class="badge badge-danger">NEW</span>
                                @endif
                                @if(isset($ds['tags']) && $ds['tags'])
                                    @foreach($ds['tags'] as $t)
                                        @foreach($tags as $tag)
                                            @if($t == $tag['path'])
                                                <span class="badge badge-success">{{ $tag['title'] }}</span>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắc xóa?')"><i class="fas fa-trash text-danger"></i></a>&nbsp;
                                <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    @if($keywords)
                        {{ $danhsach->withPath(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/van-ban?' . $_SERVER['QUERY_STRING']) }}
                    @else
                        {{ $danhsach->withPath(env('APP_URL') . 'admin/hiep-hoi-doanh-nghiep/van-ban') }}
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
