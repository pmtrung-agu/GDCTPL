@extends('Admin.layout')
@section('title','Danh mục văn bản')
@section('css')
<link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{ env('APP_URL') }}admin/danh-muc/van-ban/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Thêm mới</a> Danh mục Văn bản</h3>
                    @if($namhoc)
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
                        @foreach($namhoc as $k => $ct)
                            <tr>
                                <td class="text-center">{{ $k+1 }}</td>
                                <td>
                                    {{ $ct['ten'] }} <br />
                                    <small>{{ $ct['slug'] }}</small>
                                </td>
                                <td class="text-center">{{ $ct['thu_tu'] }}</td>
                                <td class="text-center">
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/van-ban/delete/{{ $ct['_id'] }}" onclick="return confirm('Chắc chắn xóa?');" ><i class="fa fa-trash text-danger"></i></a>
                                    <a href="{{ env('APP_URL') }}admin/danh-muc/van-ban/edit/{{ $ct['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
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