@extends('Admin.layout')
@section('title', 'Kết nối giao thương')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Thông báo của HHDN</h3>
                    @if($danhsach)
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
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
                                    <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/chi-tiet/{{ $ds['_id'] }}" class="chi-tiet">{{ $ds['tieu_de'] }} </a>
                                    <small>{{ \Carbon\Carbon::parse($ds['updated_at'])->format("d/m/Y H:i") }}</small>
                                </td>
                                @if(App\Http\Controllers\UserController::is_roles('Admin,Manager,ABA'))
                                    <td class="text-center">
                                        <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/delete/{{ $ds['_id'] }}" class="text-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
                                        <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/edit/{{ $ds['_id'] }}" class="text-primary"><i class="fas fa-pencil-alt"></i></a>
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


@endsection
