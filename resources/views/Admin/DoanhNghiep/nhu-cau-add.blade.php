@extends('Admin.layout')
@section('title', __('Thêm mới Câu hỏi Tư vấn Chuyển đổi số'))
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="{{ env('APP_URl') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> {{ __('Trở về') }}</a> {{ __('Thêm mới Nhu cầu Chuyển đổi số') }}</h3>
                    <form action="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/create" method="post" id="dinhkemform" enctype="multipart/form-data">
                        {{ csrf_field() }}
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
                            
                                $nganhnghe_id = old('nganhnghe_id');
                                $noi_dung = old('noi_dung');
                                $nc = old('nhu_cau');
                            @endphp
                            <div class="row form-group">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Ngành nghề') }}</label>
                                <div class="col-md-4">
                                    <select name="nganhnghe_id" id="nganhnghe_id" class="form-control select2" required data-placeholder="Ngành nghể">
                                        <option value="">Ngành nghề</option>
                                        @foreach($nganhnghe as $nn)
                                            <option value="{{ $nn['_id'] }}" @if(strval($nn['_id'] == $nganhnghe_id)) selected @endif>{{ $nn['ten'] }}</option>
                                        @endforeach
                                    </select>
                                </div>   
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Nhu cầu') }}</label>
                                <div class="col-md-4">
                                    <select name="nhu_cau" id="nhu_cau" class="form-control select2" required data-placeholder="Nhu cầu">
                                        <option value="">Nhu cầu</option>
                                        @foreach($nhu_cau as $ncc)
                                            <option value="{{ $ncc }}" @if(strval($nc == $ncc)) selected @endif>{{ $ncc }}</option>
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Mô tả') }}</label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" >{{ $noi_dung }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
                            <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> {{ __('Cập nhật') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
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