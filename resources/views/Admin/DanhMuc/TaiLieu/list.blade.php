@extends('Admin.layout')
@section('body')
@section('css')
<link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
@endsection
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu/add?id_parent={{ $id_parent }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Tài liệu</h3>
                    @if($id_parent)
                    @php
                        $ds = App\Models\DMTaiLieu::find($id_parent);
                    @endphp
                        <a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu"><i class="fa fa-home"></i> Trở về Home</a> 
                        <i class="fas fa-angle-double-right"></i> {{ $ds['ten'] }}
                    @endif
                    @if($danhsach)
                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="30">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình</th>
                                <th>Tên</th>
                                <th>Thứ tự</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($danhsach as $k => $ct)
                            <tr>
                                <td class="text-center">{{ $k+1 }}</td>
                                <td>
                                    @if(isset($ct['photos'][0]['aliasname']) && $ct['photos'][0]['aliasname'])
                                        <img src="{{ env('APP_URL') }}storage/images/thumb_50/{{ $ct['photos'][0]['aliasname'] }}" alt="{{ $ct['ten'] }}">                                        
                                    @else
                                        <img src="{{ env('APP_URL') }}assets/backend/images/logo-sm.png" alt="{{ $ct['ten'] }}">
                                    @endif
                                </td>
                                <td>
                                    @if($ct['id_parent'] == '')
                                        @php
                                            $id_parent = App\Http\Controllers\ObjectController::ObjectId($ct['_id']);
                                            $childs = App\Models\DMTaiLieu::where('id_parent','=',$id_parent)->count()
                                        @endphp
                                        <a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu?id_parent={{ $ct['_id'] }}">{{ $ct['ten'] }}</a>
                                        <span class="badge badge-danger">{{ $childs }}</span>
                                    @else  
                                        {{ $ct['ten'] }}
                                    @endif
                                    <span class="badge badge-warning"><small>{{ $ct['slug'] }}</small></span>
                                </td>
                                <td class="text-center">{{ $ct['thu_tu'] }}</td>
                                <td class="text-center">
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu/delete/{{ $ct['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu/edit/{{ $ct['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
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
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
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
