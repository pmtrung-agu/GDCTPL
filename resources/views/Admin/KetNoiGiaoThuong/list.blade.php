@extends('Admin.layout')
@section('title', 'Kết nối giao thương')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Nhu cầu Kết nối giao thương</h3>
                    @if($danhsach)
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Nhu cầu</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                            @php
                            $dn = App\Models\User::find($ds['id_user']);
                            $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                            @endphp
                            <tr>
                                <td><a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/chi-tiet/{{ $ds['_id'] }}">[{{ $nn['ten'] }}] - {{ $dn['fullname'] }} - {{ $ds['nhu_cau'] }} </a></td>
                                <td class="text-center" style="vertical-align: middle;">
                                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/tinh-trang/{{ $ds['_id'] }}" class="tinh-trang">
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Chờ duyệt</span>
                                        @else <span class="badge badge-success">Hoàn thành</span>
                                        @endif
                                    </a>
                                    @else 
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Chờ duyệt</span>
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
    });
</script>

@endsection
