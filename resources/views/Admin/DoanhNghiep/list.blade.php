@extends('Admin.layout')
@section('title', 'Danh sách Doanh nghiệp tham gia')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{ env('APP_URL') }}admin/doanh-nghiep/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới </a> Danh sách Doanh nghiệp tham gia: {{ $so_luong }} </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Mã số thuế</th>
                                <th>Điện thoại</th>
                                <th>TVHH</th>
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
                                   <td>
                                    @if($ds['hoivienhiephoi']) <i class="fas fa-user-check text-success"></i>
                                    @else <i class="fas fa-user-times"></i> @endif
                                   </td>
                                   <td class="text-center" style="width:60px;">
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                        <a href="{{ env('APP_URL') }}admin/doanh-nghiep/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
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