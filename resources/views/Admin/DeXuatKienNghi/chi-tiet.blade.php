@extends('Admin.layout')
@section('title', 'Chi tiết Câu hỏi')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4"><a href="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-sm btn-primary"><i class="fa fa-reply-all"></i></a> Nội dung Đề xuất - Kiến nghị</h4>
                    <div>
                        @foreach($ds['noi_dung'] as $nd)
                        @php
                            $u = App\Models\User::find($nd['id_user']);
                        @endphp
                        <div class="media mb-3 card-box bg-warning">
                            <div class="d-flex mr-3">
                                @if(isset($u['photos'][0]['aliasname']) && $u['photos'][0]['aliasname'])
                                <a href="#"><img class="media-object rounded-circle avatar-sm" alt="64x64" src="{{ env('APP_URL') }}storage/images/thumb_50/{{ $u['photos'][0]['aliasname'] }}"> </a>
                                @else
                                    <a href="#"><img class="media-object rounded-circle avatar-sm" alt="64x64" src="{{ env('APP_URL') }}assets/backend/images/users/avatar.png"> </a>
                                @endif
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 bold">{{ isset($u['fullname']) ? $u['fullname'] : '' }}</h5>
                                <p class="font-18 mb-0">
                                    {!! $nd['noi_dung'] !!}
                                </p>
                                @if($nd['photos'])
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Hình ảnh</h2>
                                    </div>
                                </div>
                                <div class="row" id="gallery">
                                    @foreach($nd['photos'] as $p)
                                        <div class="col-12 col-md-1">
                                            <a href="{{ env('APP_URL') }}storage/images/origin/{{ $p['aliasname'] }}">
                                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" alt="" title="{{ $p['title'] }}" style="width:100%;">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                                @if($nd['attachments'])
                                <div class="row">
                                    <div class="col-12">
                                        <h2>Đính kèm</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach($nd['attachments'] as $k => $dk)
                                        <div class="col-12 col-md-12">
                                            <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/de-xuat-kien-nghi/download/{{ $ds['_id'] }}/{{ $k }}" class="text-danger"><i class="fas fa-download"></i> {{ $dk['title'] }}</a>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @if($ds['tinh_trang'] == 0)
                <div class="card-box">
                    <h3 class="m-t-0">Thêm trả lời</h3>
                    <form action="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi/chi-tiet/update" method="post" id="dinhkemform" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{ $ds['_id'] }}">
                        <div class="form-body">
                            <hr />
                            @if($errors->any())
                                <div class="alert alert-success">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @php
                                $noi_dung = old('noi_dung');
                            @endphp
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Nội dung') }}</label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" >{{ $noi_dung }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> {{ __('Cập nhật') }}</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script src="{{ env('APP_URL') }}assets/frontend/libs/photobox/jquery.photobox.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#gallery').photobox('a',{ time:0 });
            var options = {
                filebrowserImageBrowseUrl: '{{ env('APP_URL') }}laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '{{ env('APP_URL') }}laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '{{ env('APP_URL') }}laravel-filemanager?type=Files',
                filebrowserUploadUrl: '{{ env('APP_URL') }}laravel-filemanager/upload?type=Files&_token=',
                toolbarGroups: [
                    { "name": "basicstyles", "groups": ["basicstyles"] },
                    { "name": "links", "groups": ["links"] },
                    { "name": "paragraph","groups": ["list", "blocks"] },
                    { "name": "document", "groups": ["mode"] },
                    { "name": "insert", "groups": ["insert"] },
                    { "name": "styles", "groups": ["styles"] },
                    { "name": "about", "groups": ["about"] }
                ],
                removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar,PasteFromWord'
            };
            CKEDITOR.replace('noi_dung', options);
        });
    </script>
@endsection