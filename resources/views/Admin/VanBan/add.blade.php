@extends('Admin.layout')
@section('title', __('Thêm mới Văn bản'))
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="{{ env('APP_URl') }}admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> {{ __('Trở về') }}</a> {{ __('Thêm mới Văn bản') }}</h3>
                    <form action="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/create" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                                if(old('so_hieu') != null){
                                    $so_hieu = old('so_hieu');$date_post = old('date_post');
                                    $trich_yeu = old('trich_yeu');$mo_ta = old('mo_ta');
                                } else if(isset($ds['so_hieu']) && $ds['so_hieu']){
                                    $so_hieu = $ds['so_hieu'];$date_post = $ds['date_post'];
                                    $trich_yeu = $ds['trich_yeu'];$mo_ta = $ds['mo_ta'];
                                } else {
                                    $so_hieu = '';$date_post = App\Http\Controllers\ObjectController::setDate();$tin_moi=0;
                                    $trich_yeu = '';$mo_ta = '';
                                }
                            @endphp
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Số hiệu') }}</label>
                                <div class="col-md-6">
                                    <input type="text" id="so_hieu" name="so_hieu" class="form-control" placeholder="{{ __('Số hệu') }}" value="{{ $so_hieu }}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Trích yếu') }}</label>
                                <div class="col-12 col-md-10">
                                    <textarea name="trich_yeu" id="trich_yeu" class="form-control" required placeholder="{{ __('Trích yếu') }}" style="height:100px;" required>{{ $trich_yeu }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Mô tả chi tiết') }}</label>
                                <div class="col-12 col-md-10">
                                    <textarea name="mo_ta" id="mo_ta" class="form-control" required placeholder="Mô tả chi tiết: Ngày ký, Người ký, Cơ quan ban hành,..." style="height:100px;">{{ $mo_ta }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Phân loại') }}</label>
                                <div class="col-md-7">
                                    <select name="tags[]" id="tags" class="form-control select2" multiple required data-placeholder="Chọn phân loại">
                                        <option value="">Chọn phân loại</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag['slug'] }}">{{ $tag['ten'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="control-label col-md-1 text-right p-t-10">{{ __('Ngày tạo') }}</label>
                                <div class="col-md-2">
                                    <input type="text" id="date_post" name="date_post" class="form-control" placeholder="{{ __('Ngày tạo') }}" value="{{ $date_post }}" required />
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
                        </div>
                        <div class="form-actions">
                            <a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
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
    <script src="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/libs/ckeditor/ckeditor.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            delete_file();$(".select2").select2();
            var options = {
                filebrowserImageBrowseUrl: '{{ env('APP_URL') }}laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '{{ env('APP_URL') }}laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '{{ env('APP_URL') }}laravel-filemanager?type=Files',
                filebrowserUploadUrl: '{{ env('APP_URL') }}laravel-filemanager/upload?type=Files&_token='
            };
            upload_files("{{ env('APP_URL') }}file/uploads");
            upload_hinhanh("{{ env('APP_URL') }}image/uploads");
            $("#ten").change(function(){
                var title = $(this).val();
                $.get("{{ env('APP_URL') }}slug/" + title, function(slug){
                    $("#slug").val(slug);
                });
            });
            
            $("#progressbar").hide();
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            CKEDITOR.replace('noi_dung', options);
        });
    </script>
@endsection
