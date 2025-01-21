@extends('Admin.layout')
@section('title', 'Danh sách Doanh nghiệp tham gia')
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
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Mã số thuế</th>
                                <th>Điện thoại</th>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                <th>TVHH</th>
                                @endif
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $stt = 1; $count = count($danhsach); $page=Request::input('page') ? Request::input('page') : 1;  @endphp
                            @foreach($danhsach as $ds)
                                <tr>
                                   <td>{{ $stt + $count * ($page-1) }}</td> 
                                   <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/chi-tiet/{{ $ds['_id'] }}">{{ $ds['ten'] }}</a></td>
                                   <td>{{ $ds['nguoidaidien'] }}</td>
                                   <td>{{ $ds['masothue'] }}</td>
                                   <td>{{ $ds['dienthoai'] }}</td>
                                   @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                   <td>
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
                                                <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tao-tai-khoan/{{ $ds['_id'] }}" class="tao-tai-khoan"><i class="fas fa-user text-muted"></i></a>
                                        @else 
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tao-tai-khoan/{{ $ds['_id'] }}" class="tao-tai-khoan"><i class="fas fa-users text-danger"></i></a>
                                        @endif
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    @endif
                                    @if((App\Http\Controllers\UserController::is_roles('Business') && $ds['_id'] == Session::get('user.id_doanh_nghiep')) || App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                                    @endif
                                    </td>
                                </tr>
                                @php $stt++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $danhsach->withPath(env('APP_URL').'admin/doanh-nghiep/danh-sach') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
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
    });
</script>

@endsection