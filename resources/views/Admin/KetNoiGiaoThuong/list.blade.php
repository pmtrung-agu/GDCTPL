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
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                <th>#</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                            @php
                            $dn = App\Models\User::find($ds['id_user']);
                            $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                            @endphp
                            <tr>
                                <td>
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/chi-tiet/{{ $ds['_id'] }}" data-toggle="modal" data-target="#ChiTietModal" class="chi-tiet">[{{ $nn['ten'] }}] - {{ $dn['fullname'] }} - {{ $ds['nhu_cau'] }} </a>
                                </td>
                                <td class="text-center" style="vertical-align: middle;">
                                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/tinh-trang/{{ $ds['_id'] }}" class="tinh-trang">
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Chờ duyệt</span>
                                        @else <span class="badge badge-success">Đã duyệt</span>
                                        @endif
                                    </a>
                                    @else 
                                        @if($ds['tinh_trang'] == 0) <span class="badge badge-danger">Chờ duyệt</span>
                                        @else <span class="badge badge-success">Đã duyệt</span>
                                        @endif
                                    @endif
                                </td>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <td class="text-center">
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/delete/{{ $ds['_id'] }}" class="text-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
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
<div id="ChiTietModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nội dung chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ChiTietHTML">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
        $(".chi-tiet").click(function(){
            var _href = $(this).attr("href");
            $.get(_href, function(html){
                $("#ChiTietHTML").html(html);
            });
        });
    });
</script>

@endsection
