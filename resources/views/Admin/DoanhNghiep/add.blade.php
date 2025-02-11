@extends('Admin.layout')
@section('title', __('Thêm mới Thông tin Tuyển Sinh'))
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/magnific-popup.css"/>
    <link href="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
@php
$arr_quy_mo = array('Nhỏ', 'Vừa', 'Siêu Nhỏ', ' Khác')
@endphp
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3 class="m-t-0"><a href="{{ env('APP_URl') }}admin/doanh-nghiep" class="btn btn-primary btn-sm"><i class="mdi mdi-reply-all"></i> {{ __('Trở về') }}</a> {{ __('Thêm mới Thông tin') }}</h3>
                    <form action="{{ env('APP_URL') }}admin/doanh-nghiep/create" method="post" id="dinhkemform" enctype="multipart/form-data">
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
                                if(old('ten') != null){
                                    $ten = old('ten'); $slug = old('slug');
                                    $nguoidaidien = old('nguoidaidien');$masothue = old('masothue');
                                    $dienthoai = old('dienthoai'); $email = old('email'); $website = old('website');
                                    $mota = old('mota');$ngaygianhaphiephoi = old('ngaygianhaphiephoi'); $trangthai = old('trangthai');
                                    $diachi = old('address'); $hoivienhiephoi = old('hoivienhiephoi');$nganhnghe_id = old('nganhnghe_id');
                                    $ngay_thanh_lap = old('ngay_thanh_lap'); $quy_mo = old('quy_mo');
                                } else if(isset($ds['ten']) && $ds['ten']){
                                    $ten = $ds['ten']; $slug = $ds['slug'];$masothue = $ds['masothue'];
                                    $dienthoai = $ds['dienthoai']; $website = $ds['website'];$email = $ds['email'];
                                    $mota = $ds['mota'];$nganhnghe_id = $ds['nganhnghe_id'];
                                    $ngaygianhaphiephoi = Carbon\Carbon::parse($ds['ngaygianhaphiephoi'])->format("d/m/Y");
                                    $trangthai = $ds['trangthai']; $hoivienhiephoi = $ds['hoivienhiephoi'];
                                    $ngay_thanh_lap = $ds['ngay_thanh_lap'];$quy_mo = $ds['quy_mo'];
                                } else {
                                    $ten = '';$mota = '';$slug='';$dienthoai = ''; $email='';$website = '';
                                    $trangthai=0;$diachi = '';$nganhnghe_id = '';$masothue = '';$nguoidaidien='';
                                    $ngaygianhaphiephoi = App\Http\Controllers\ObjectController::setDate_dmY();
                                    $ngay_thanh_lap = '';$quy_mo='';
                                }
                            @endphp
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Tên') }}</label>
                                <div class="col-md-4">
                                    <input type="text" id="ten" name="ten" class="form-control" placeholder="{{ __('Tên') }}" value="{{ $ten }}" required />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Slug') }}</label>
                                <div class="col-md-4">
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="{{ __('slug') }}" value="{{ $slug }}" required />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00">{{ __('Người đại diện') }}</label>
                                <div class="col-md-4">
                                    <input type="text" id="nguoidaidien" name="nguoidaidien" class="form-control" placeholder="{{ __('Người đại diện') }}" value="{{ $ten }}" required />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Mã số thuế') }}</label>
                                <div class="col-md-4">
                                    <input type="text" id="masothue" name="masothue" class="form-control" placeholder="{{ __('Mã số thuế') }}" value="{{ $masothue }}" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00">{{ __('Ngày thành lập') }}</label>
                                <div class="col-md-4">
                                    <input type="text" id="ngay_thanh_lap" name="ngay_thanh_lap" class="form-control" value="{{ $ngay_thanh_lap }}" data-toggle="input-mask" data-mask-format="00/00/0000" placeholder="__/__/____" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Quy mô') }}</label>
                                <div class="col-md-4">
                                    <select name="quy_mo" id="quy_mo" class="form-control" required>
                                        <option value="">Quy mô</option>
                                        @foreach($arr_quy_mo as $qm)
                                        <option value="{{ $qm }}" @if($qm == $quy_mo) selected @endif>{{ $qm }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-00">{{ __('Điện thoại') }}</label>
                                <div class="col-md-2">
                                    <input type="text" id="dienthoai" name="dienthoai" class="form-control" placeholder="{{ __('Điện thoại') }}" value="{{ $dienthoai }}" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Email') }}</label>
                                <div class="col-md-2">
                                    <input type="text" id="email" name="email" class="form-control" placeholder="{{ __('Email') }}" value="{{ $email }}" />
                                </div>
                                <label class="control-label col-md-2 text-right p-t-00">{{ __('Website') }}</label>
                                <div class="col-md-2">
                                    <input type="text" id="website" name="website" class="form-control" placeholder="{{ __('Website') }}" value="{{ $website }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-4">
                                            <select class="select2 m-b-10" id="address_1" name="address[]" style="width: 100%" data-placeholder="Chọn Tỉnh">
                                                <option value="">Tỉnh</option>}
                                                @if($address)
                                                  @foreach($address as $a)
                                                    <option value="{{ $a['ma'] }}" @if($a['ma'] == old('address.0')) selected @endif >{{ $a['ten'] }}</option>
                                                  @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_2" name="address[]" style="width: 100%" data-placeholder="Chọn Huyện, Tp">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="select2 m-b-10" id="address_3" name="address[]" style="width: 100%" data-placeholder="Chọn Xã, phường, TT">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Địa chỉ</label>
                                        <div class="col-md-10">
                                            <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="{{ old('address.3')}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Mô tả') }}</label>
                                <div class="col-md-10">
                                    <textarea name="mota" id="mota" class="form-control" >{{ $mota }}</textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Ngành nghề') }}</label>
                                <div class="col-md-3">
                                    <select name="nganhnghe_id" id="nganhnghe_id" class="form-control select2" required data-placeholder="Ngành nghể">
                                        <option value="">Ngành nghề</option>
                                        @foreach($nganhnghe as $nn)
                                            <option value="{{ $nn['_id'] }}" @if(strval($nn['_id'] == $nganhnghe_id)) selected @endif>{{ $nn['ten'] }}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <div class="col-md-3 switchery-demo">
                                    <b>{{ __('Trạng thái') }}: </b>
                                    <input type="checkbox" name="trangthai" id="trangthai" checked="checked" class="js-switch" data-plugin="switchery" data-color="#009efb" value="1" @if($trangthai) checked @endif/>
                                    Hội viên HHDN:&nbsp;&nbsp;&nbsp;
                                    <input type="checkbox" name="hoivienhiephoi" id="hoivienhiephoi" class="js-switch" data-plugin="switchery" data-color="#009efb" value="1"/>
                                </div>
                                
                                <label class="control-label col-md-2 text-right p-t-10">{{ __('Ngày gia nhập HHDN') }}</label>
                                <div class="col-md-2">
                                    <input type="text" id="ngaygianhaphiephoi" name="ngaygianhaphiephoi" class="form-control" placeholder="__/__/_____" value="{{ $ngaygianhaphiephoi }}" />
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
                            <a href="{{ env('APP_URL') }}admin/doanh-nghiep" class="btn btn-light"><i class="fa fa-reply-all"></i> {{ __('Trở về') }}</a>
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
    <script src="{{ env('APP_URL') }}assets/backend/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            delete_file();$(".select2").select2();
            $('#ngay_thanh_lap').mask('00/00/0000');$("#ngaygianhaphiephoi").mask('00/00/0000');
            @if (old('address.0') !== null)
                $.get("{{ env('APP_URL') }}admin/dia-chi/get/{{ old('address.0') }}/{{ old('address.1') }}", function(huyen){
                    $("#address_2").html(huyen);
                });
            @endif
            @if(old('address.1') !== null)
                $.get("{{ env('APP_URL') }}admin/dia-chi/get/{{ old('address.1') }}/{{ old('address.2') }}", function(xa){
                    $("#address_3").html(xa);
                });
            @endif
            chontinh("{{env('APP_URL')}}");
            chonhuyen("{{env('APP_URL')}}");
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
            CKEDITOR.replace('mota', options);
        });
    </script>
@endsection
