@extends('Admin.layout')
@section('title', 'Quản lý Hội phí')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/jquery-toast/jquery.toast.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Thu hội phí') }}</a> {{ __('Quản lý Hội phí - Danh sách Doanh nghiệp đóng gần nhất') }} <span class="badge badge-danger">Năm {{ $years }}</span></h3>
                    <hr />
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <span class="badge badge-blue" style="font-size: 15px;"><i class="fas fa-users-cog"></i> Số doanh nghiệp: {{ $sl_doanh_nghiep }}</span>
                                <span class="badge badge-success" style="font-size: 15px;"><i class="fas fa-money-bill-alt"></i> Đã đóng HP: {{ $da_dong }}</span>
                                <span class="badge badge-warning" style="font-size: 15px;"><i class="fas fa-money-bill-wave"></i> Chưa đóng HP: {{ $sl_doanh_nghiep - $da_dong }}</span>
                            </div>
                            <div class="col-12 col-md-6 text-right">
                                <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi/thong-ke-theo-nam" class="btn btn-success waves-effect waves-light btn-sm"><i class="fas fa-calendar-alt"></i> Thống kê theo năm</a>
                            </div>
                        </div>
                    
                    <hr />
                    <table class="table table-border table-bordered table-striped table-hovered">
                        <thead>
                            <tr>
                                <th>Doanh nghiệp</th>
                                <th>Số tiền</th>
                                <th>Năm</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                            <tr>
                                <td>{{ $ds['ten_doanh_nghiep'] }}</td>
                                <td class="text-right">{{ number_format($ds['so_tien'],0,",",".") }}</td>
                                <td class="text-center">{{ $ds['nam'] }}</td>
                                <td class="text-center">
                                    <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi/delete/{{ $ds['_id'] }}" onclick="return confirm('Chắc chắc xóa?')"><i class="fas fa-trash text-danger"></i></a>&nbsp;
                                    <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi/edit/{{ $ds['_id'] }}"><i class="fas fa-pencil-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
