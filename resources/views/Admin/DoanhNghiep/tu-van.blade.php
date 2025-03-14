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
                    <h3><a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách câu hỏi</h3>
                    @if($danhsach)
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Câu hỏi</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                            <tr>
                                <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so/chi-tiet/{{ $ds['_id'] }}">{!! $ds['noi_dung'][0]['noi_dung'] !!}</a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so/tinh-trang/{{ $ds['_id'] }}" class="tinh-trang">
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
