@extends('Admin.layout')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/magnific-popup.css"/>
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="box-header">
                        <h3><a href="{{ env('APP_URL') }}admin/danh-muc/tai-lieu" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Chỉnh Danh mục Tài liệu </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/tai-lieu/update" method="POST" class="form-horizontal"  id="dinhkemform" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $ds['_id'] }}">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Họ tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ $ds['ten'] }}" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">SLUG</label>
                                <div class="col-10">
                                    <input type="slug" name="slug" class="form-control" id="slug" value="{{ $ds['slug'] }}" placeholder="SLUG" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Thuộc cấp trên</label>
                                <div class="col-10">
                                    <select name="id_parent" id="id_parent" class="form-control select2"  data-placeholder="Chọn Thuộc cấp">
                                    <option value="">Chọn phân loại</option>
                                    @foreach($danhmuc as $dm)
                                        <option value="{{ $dm['_id'] }}" @if($ds['id_parent']==$dm['_id']) selected @endif>{{ $dm['ten'] }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                 <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-2">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="{{ $ds['ghi_chu'] }}" class="form-control" placeholder="Ghi chú">
                                </div>
                                <label class="col-2 col-form-label">Thứ tự</label>
                                <div class="col-4">
                                    <input type="number" name="thu_tu" id="thu_tu" value="{{ $ds['thu_tu'] }}" class="form-control" placeholder="Thứ tự">
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
                            <div class="form-group row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container -->
</div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        delete_file();$(".select2").select2();
        upload_hinhanh("{{ env('APP_URL') }}image/uploads");
        $("#progressbar").hide();
        $("#ten").keyup(function(){
            $.get("{{ env('APP_URL') }}slug/" + $(this).val(), function(s){
                $("#slug").val(s);
            });
        });
    });
</script>
@endsection