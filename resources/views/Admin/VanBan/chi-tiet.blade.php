@extends('Admin.layout')
@section('title', 'Chi tiết Văn bản')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row card-box">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="fas fa-reply-all"></i> </a> {{ __('Chi tiết Văn bản') }}</h3>
            <table class="table table-border table-bordered table-striped table-hovered">
                <tbody>
                    <tr>
                        <th>Số hiệu</th>
                        <td>{{ $ds['so_hieu'] }}</td>
                    </tr>
                    <tr>
                        <th>Trích yếu</th>
                        <td>{{ $ds['trich_yeu'] }}</td>
                    </tr>
                    <tr>
                        <th>Mô tả</th>
                        <td>{{ $ds['mo_ta'] }}</td>
                    </tr>
                    <tr>
                        <th>Đính kèm</th>
                        <td>
                            @if($ds['attachments'])
                            <ul>
                                @foreach($ds['attachments'] as $dk)
                                    <li><a href="{{ env('APP_URL') }}storage/files/{{ $dk['aliasname'] }}" target="_blank">{{ $dk['title'] }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Danh sách Email đã gởi:</th>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-box row bg-info">
            <div class="col-12">
                <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="fas fa-reply-all"></i> </a> {{ __('Gởi email') }}</h3>
            </div>
            <div class="col-12">
            <form action="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/send-email" method="POST" id="SendEmail">
                {{ csrf_field() }}
                <input type="hidden" name="id_van_ban" id="id_van_ban" value="{{ $ds['_id'] }}">
                <div class="form-body">
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">{{ __('Email') }}</label>
                        <div class="col-12 col-md-10">
                            <select name="email_list[]" id="email_list" multiple class="form-control select2">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">{{ __('Nội dung') }}</label>
                        <div class="col-12 col-md-10">
                            <textarea name="noi_dung" id="noi_dung" class="form-control" required placeholder="{{ __('Nội dung') }}" style="height:100px;" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
                    <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> {{ __('Gởi Mail') }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#email_list").select2({
                placeholder: 'Chọn địa chỉ Email',
                allowClear: true,
                tags: true
            });
        });
    </script>
@endsection