@extends('Admin.layout')
@section('title', 'Tư vấn chuyển đổi số')
@section('css')
<link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> Nhu cầu Chuyển đổi số</h3>
                    @if($danhsach)
                    <table class="table table-border table-hovered table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Nhu cầu</th>
                                <th>Nội dung</th>
                                <th>Tình trạng</th>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <th>#</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                            <tr>
                                <td>{{ $ds['nhu_cau'] }}</td>
                                <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/{{ $ds['_id'] }}">{!! $ds['noi_dung'][0]['noi_dung'] !!}</a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/tinh-trang/{{ $ds['_id'] }}" class="tinh-trang">
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Đang diễn ra</span>
                                        @else <span class="badge badge-success">Hoàn thành</span>
                                        @endif
                                    </a>
                                    @else 
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Đang diễn ra</span>
                                        @else <span class="badge badge-success">Hoàn thành</span>
                                        @endif
                                    @endif
                                </td>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                <td class="text-center" style="vertical-align: middle;">
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chăn xóa?')"><i class="fa fa-trash text-danger"></i></a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".tinh-trang").click(function(e){
            var _link = $(this).attr("href");
            var _this = $(this);
            $.get(_link, function(html){
                _this.html(html)
            });
            e.preventDefault();
        });
        @if(Session::get('msg') != null && Session::get('msg'))
            $.toast({
                heading:"Thông báo",
                text:"{{ Session::get('msg') }}",
                loaderBg:"#3b98b5",icon:"info", hideAfter:3e3,stack:1,position:"top-right"
            });
        @endif
    });
</script>
@endsection
