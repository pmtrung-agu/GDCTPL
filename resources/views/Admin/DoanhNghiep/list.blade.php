@extends('Admin.layout')
@section('title', 'Danh sách Doanh nghiệp tham gia')
@section('css')
<link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3>
                        @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                            <a href="{{ env('APP_URL') }}admin/doanh-nghiep/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> 
                        @else
                            <i class="fas fa-users text-primary"></i>
                        @endif
                        Danh sách Doanh nghiệp tham gia: {{ $so_luong }} </h3>
                    <form action="{{ env('APP_URL') }}admin/doanh-nghiep/danh-sach" method="GET" id="DNForm">
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <input type="text"  name="q" id="q" value="{{ $q }}" class="form-control" placeholder="Tên doanh nghiệp">
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" name="submit" value="OK" class="btn btn-primary">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Mã số thuế</th>
                                <th>Điện thoại</th>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                <th>Thành viên HHDN</th>
                                @endif
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(App\Http\Controllers\UserController::is_roles('Business'))
                                @php
                                    $u = App\Models\User::find(Session::get('user._id'));
                                    $dn = App\Models\DoanhNghiep::find($u['id_doanh_nghiep']);
                                @endphp
                                <tr class="bg-warning">
                                    <td>#</td>
                                    <td>{{ $dn['ten'] }}</td>
                                    <td>{{ $dn['nguoidaidien'] }}</td>
                                    <td>{{ $dn['masothue'] }}</td>
                                    <td>{{ $dn['dienthoai'] }}</td>
                                    <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/edit/{{ $dn['_id'] }}"><i class="fas fa-pencil-alt"></i></a></td>
                                </tr>
                            @endif
                            @php $stt = 1; $page=Request::input('page') ? Request::input('page') : 1;$count = 30;// count($danhsach);  @endphp
                            @foreach($danhsach as $ds)
                                <tr>
                                   <td>{{ $stt + $count * (intval($page)-1) }}</td> 
                                   <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/chi-tiet/{{ $ds['_id'] }}">{{ $ds['ten'] }}</a></td>
                                   <td>{{ $ds['nguoidaidien'] }}</td>
                                   <td>{{ $ds['masothue'] }}</td>
                                   <td>{{ $ds['dienthoai'] }}</td>
                                   @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                   <td class="text-center">
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/hoi-vien/{{ $ds['_id'] }}" class="set-hoi-vien">
                                        @if($ds['hoivienhiephoi']) <i class="fas fa-user-check text-success"></i>
                                        @else <i class="fas fa-user-times text-muted"></i> @endif
                                    </a>
                                   </td>
                                   @endif
                                   <td class="text-center" style="width:80px;">
                                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                        @if(App\Http\Controllers\UserController::is_roles('Admin') &&
                                            App\Http\Controllers\UserController::checkDoanhNghiep($ds['_id']) == false)
                                            @if($ds['dienthoai'])
                                                <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tao-tai-khoan/{{ $ds['_id'] }}" class="tao-tai-khoan" title="Tạo tài khoản cho Doanh nghiệp"><i class="fas fa-user text-muted"></i></a>
                                            @endif
                                        @else 
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tao-tai-khoan/{{ $ds['_id'] }}" class="tao-tai-khoan" title="Đã tạo tài khoản cho Doanh nghiệp"><i class="fas fa-users text-danger"></i></a>
                                        @endif
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    @endif
                                    @if((App\Http\Controllers\UserController::is_roles('Business') && $ds['_id'] == Session::get('user.id_doanh_nghiep')) || App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/edit/{{ $ds['_id'] }}?page={{ $page }}"><i class="fas fa-pencil-alt"></i></a>
                                    @endif
                                    </td>
                                </tr>
                                @php $stt++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $danhsach->withPath(env('APP_URL').'admin/doanh-nghiep/danh-sach?q='.$q) }}
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
        $(".set-hoi-vien").click(function(e){
            var _link = $(this).attr("href");
            var _this = $(this);
            $.get(_link, function(html){
                _this.html(html)
            });
            e.preventDefault();
        });
        $(".tao-tai-khoan").click(function(e){
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