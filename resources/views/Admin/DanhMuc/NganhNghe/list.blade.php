@extends('Admin.layout')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Ngành nghề</h3>
                    @if($danhsach)
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Ngành nghề</th>
                                <th>Lĩnh Vực</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($danhsach as $k => $ct)
                        @php
                            $lv = App\Models\DMLinhVuc::find($ct['id_dm_linh_vuc']);
                        @endphp
                            <tr>
                                <td class="text-center">{{ $k+1 }}</td>
                                <td>{{ $ct['ten'] }}</td>
                                <td>{{ $lv['ten'] }}</td>
                                <td class="text-center" style="width:80px;">
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe/delete/{{ $ct['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe/edit/{{ $ct['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                    
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
@endsection