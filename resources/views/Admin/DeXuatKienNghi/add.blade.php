@extends('Admin.layout')
@section('title', __('Thêm mới Đề xuất - Kiến nghị'))
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="{{ env('APP_URl') }}admin/doanh-nghiep/de-xuat-kien-nghi/create" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> {{ __('Trở về') }}</a> {{ __('Thêm mới Đề xuất - Kiến nghị') }}</h3>
                    <form action="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi/create" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                                $noi_dung = old('noi_dung');
                            @endphp
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Nội dung') }}</label>
                                <div class="col-md-10">
                                    <textarea name="noi_dung" id="noi_dung" class="form-control" >{{ $noi_dung }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-box bg-light">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="btn btn-danger">
                                                <input type="file" name="hinhanh_files[]" class="hinhanh_files btn btn-primary" multiple accept="image/png, image/jpeg, image/jpg, image/gif" placeholder="Chọn hình ảnh" style="display:none;" />
                                                <i class="fa fa-images"></i> {{ __('Chọn Hình ảnh') }} : (jpg, png, bmp)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="list_hinhanh">
                                @if(old('hinhanh_aliasname'))
                                    @foreach(old('hinhanh_aliasname') as $k => $h)
                                        <div class="col-sm-6 col-md-4 items draggable-element text-center">
                                            <input type="hidden" name="hinhanh_aliasname[]" value="{{ old('hinhanh_aliasname')[$k] }}" readonly/>
                                            <input type="hidden" name="hinhanh_filename[]" class="form-control" value="{{ old('hinhanh_filename')[$k] }}" />
                                            <a href="{{  env('APP_URL') }}storage/images/origin/{{ old('hinhanh_aliasname')[$k] }}" class="image-popup">
                                            <div class="portfolio-masonry-box">
                                            <div class="portfolio-masonry-img">
                                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ old('hinhanh_aliasname')[$k] }}" class="thumb-img img-fluid" alt="work-thumbnail">
                                            </div>
                                            <div class="portfolio-masonry-detail">
                                                <p>{{ old('hinhanh_filename')[$k] }}</p>
                                            </div>
                                            </div>
                                            </a>
                                            <a href="{{ env('APP_URL')}}image/delete/{{ old('hinhanh_aliasname')[$k] }}" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <input type="text" name="hinhanh_title[]" class="form-control" value="{{ old('hinhanh_title')[$k] }}" />
                                        </div>
                                    @endforeach
                                @elseif(isset($ds['photos']) && $ds['photos'])
                                    @foreach($ds['photos'] as $photo)
                                        <div class="col-sm-6 col-md-4 items draggable-element text-center">
                                            <input type="hidden" name="hinhanh_aliasname[]" value="{{ $photo['aliasname'] }}" readonly/>
                                            <input type="hidden" name="hinhanh_filename[]" class="form-control" value="{{ $photo['filename'] }}" />
                                            <a href="{{  env('APP_URL') }}storage/images/origin/{{ $photo['aliasname'] }}" class="image-popup">
                                            <div class="portfolio-masonry-box">
                                            <div class="portfolio-masonry-img">
                                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $photo['aliasname'] }}" class="thumb-img img-fluid" alt="work-thumbnail">
                                            </div>
                                            <div class="portfolio-masonry-detail">
                                                <p>{{ $photo['filename'] }}</p>
                                            </div>
                                            </div>
                                            </a>
                                            <a href="{{ env('APP_URL')}}image/delete/{{ $photo['aliasname'] }}" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <input type="text" name="hinhanh_title[]" class="form-control" value="{{ $photo['title'] }}" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="progress m-b-20" id="progressbar">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-box" style="background-color:#eee;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label class="btn btn-info">
                                                <input type="file" name="dinhkem_files[]" class="dinhkem_files btn btn-primary" multiple accept="*" placeholder="Chọn tập tin đính kèm" style="display:none;" />
                                                <i class="mdi mdi mdi-attachment"></i> {{ __('Chọn Đính kèm') }} : (pdf, xlsx, docx, pptx, zip, ....)
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="list_files">
                            @if(old('file_aliasname'))
                                @foreach(old('file_aliasname') as $key => $dk)
                                    <div class="form-group row items draggable-element">
                                    <input type="hidden" name="file_aliasname[]" value="{{ $dk }}" readonly/>
                                    <input type="hidden" name="file_filename[]" value="{{ old('file_filename')[$key] }}" class="form-control"/>
                                    <div class="col-12">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                        <input type="hidden" name="file_size[]" value="{{ old('file_size')[$key] }}" class="form-control">
                                        <input type="hidden" name="file_type[]" value="{{ old('file_type')[$key] }}" class="form-control">
                                        <input type="text" name="file_title[]" placeholder="{{ __('Chú thích tập tinh đính kèm') }}" value="{{ old('file_title')[$key] }}" class="form-control">
                                        <div class="input-group-append">
                                            <a href="{{ env('APP_URL') }}file/delete/{{ $dk }}" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                            @elseif(isset($ds['attachments']) && $ds['attachments'])
                                    @foreach($ds['attachments'] as $dk)
                                    <div class="form-group row items draggable-element">
                                        <input type="hidden" name="file_aliasname[]" value="{{ $dk['aliasname'] }}" readonly/>
                                        <input type="hidden" name="file_filename[]" value="{{ $dk['filename'] }}" class="form-control"/>
                                        <div class="col-12">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                            <input type="hidden" name="file_size[]" value="{{ $dk['size'] }}" class="form-control">
                                            <input type="hidden" name="file_type[]" value="{{ $dk['type'] }}" class="form-control">
                                            <input type="text" name="file_title[]" placeholder="{{ __('Chú thích tập tinh đính kèm') }}" value="{{ $dk['title'] }}" class="form-control">
                                            <div class="input-group-append">
                                                <a href="{{ env('APP_URL') }}file/delete/{{ $dk['aliasname'] }}" class="btn btn-info btn-circle delete_file" onclick="return false;" style="margin-left:2px;"><i class="mdi mdi-delete"></i></a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ env('APP_URL') }}admin/doanh-nghiep/de-xuat-kien-nghi" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
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
    <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            upload_hinhanh("{{ env('APP_URL') }}image/uploads");
            upload_files("{{ env('APP_URL') }}file/uploads");
            $("#progressbar").hide();delete_file();
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