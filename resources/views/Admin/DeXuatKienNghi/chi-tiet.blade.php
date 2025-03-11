@extends('Admin.layout')
@section('title', 'Chi tiết Câu hỏi')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title mb-4"><a href="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-sm btn-primary"><i class="fa fa-reply-all"></i></a> Nội dung Tư vấn Chuyển đổi số Doanh nghiệp</h4>
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
    <script type="text/javascript">
        $(document).ready(function(){
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