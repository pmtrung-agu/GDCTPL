@extends('Admin.layout')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{ env('APP_URL') }}admin/danh-muc/thong-tin/add" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Thông tin</h3>
                    @if($danhsach)
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Thứ tự</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($danhsach as $k => $ds)
                            <tr>
                                <td class="text-center">{{ $k+1 }}</td>
                                <td>
                                    {{ $ds['ten'] }} <br />
                                    <small>{{ $ds['slug'] }}</small>
                                </td>
                                <td class="text-center">{{ $ds['thu_tu'] }}</td>
                                <td class="text-center">
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/thong-tin/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/thong-tin/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
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