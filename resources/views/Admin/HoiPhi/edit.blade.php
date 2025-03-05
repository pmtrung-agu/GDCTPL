@extends('Admin.layout')
@section('title', 'Thu Hội phí')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/css/magnific-popup.css"/>
@endsection
@section('body')
<div class="wrapper">
<div class="container-fluid">
<div class="row">
	<div class="col-12">
    	<div class="card-box table-responsive">
    		<h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi" class="btn btn-info"><i class="mdi mdi-reply-all"></i></a> Chỉnh sửa Thông tin Hội phí Doanh nghiệp</h3>
    		<form action="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/hoi-phi/update" method="post" id="dinhkemform" enctype="multipart/form-data">
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
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Năm</label>
                      <div class="col-md-4 input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <select name="nam" id="nam" class="form-control" required>
                            @for($i=$year-5; $i<=$year+5; $i++)
                                <option value="{{ $i }}" @if($ds['nam'] == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Doanh nghiệp</label>
                      <div class="col-md-10">
                          <select name="id_doanh_nghiep" id="id_doanh_nghiep" class="form-control select2" required data-placeholder="Chọn Doanh nghiệp">
                            <option value="">Chọn Doanh nghiệp</option>
                            @if($doanhnghiep)
                              @foreach($doanhnghiep as $dn)
                                <option value="{{ $dn['_id'] }}" @if($dn['_id'] == $ds['id_doanh_nghiep']) selected @endif >{{ $dn['ten'] }}</option>
                              @endforeach
                            @endif
                          </select>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                        <label class="control-label col-md-2 text-right p-t-10">Số tiền</label>
                        <div class="col-md-4">
                            <input type="text" id="so_tien" name="so_tien" class="form-control number" placeholder="Số tiền" value="{{ $ds['so_tien'] }}" required />
                        </div>
                        <label class="control-label col-md-1 text-right p-t-10">{{ __('Ngay thu') }}</label>
                        <div class="col-md-2">
                            <input type="text" id="ngay_thu" name="ngay_thu" class="form-control" placeholder="Ngày thu" value="{{ $ds['ngay_thu'] }}" required />
                        </div>
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group row">
                      <label class="control-label col-md-2 text-right p-t-10">Nội dung</label>
                      <div class="col-md-10">
                        <textarea name="noi_dung" id="noi_dung" required placeholder="Nội dung thu" class="form-control">{{ $ds['noi_dung'] }}</textarea>
                      </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                    <label class="control-label col-md-2 text-right p-t-10">Hình ảnh</label>
                    <div class="col-md-4">
                      <label class="btn btn-info">
                          <input type="file" name="hinhanh_files[]" class="hinhanh_files btn btn-info" multiple accept="image/*" placeholder="Pictures" style="display:none;" />
                          <i class="fa fa-file-photo-o"></i> Chọn hình ảnh minh chứng
                      </label>
                    </div>
                </div>
              </div>
            </div>
            <div class="progress m-b-20" id="progressbar">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div id="list_hinhanh" class="form-group row portfolioContainer">
              @if($ds['photos'])
                @foreach($ds['photos'] as $key => $p)
                  <div class="col-sm-6 col-md-4 items draggable-element text-center">
                    <input type="hidden" name="hinhanh_aliasname[]" value="{{ $p['aliasname']}}" readonly/>
                    <input type="hidden" name="hinhanh_filename[]" value="{{ $p['title'] }}" class="form-control"/>
                    <a href="{{ env('APP_URL') }}storage/images/origin/{{$p['aliasname']}}" class="image-popup">
                      <div class="portfolio-masonry-box">
                        <div class="portfolio-masonry-img">
                          <img src="/storage/images/thumb_360x200/{{$p['aliasname']}}" class="thumb-img img-fluid" alt="work-thumbnail">
                        </div>
                        <div class="portfolio-masonry-detail">
                          <p>{{ $p['title'] }}</p>
                        </div>
                      </div>
                    </a>
                    <a href="{{ env('APP_URL') }}image/delete/{{ $p['aliasname'] }}" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:40px;right:30px;">
                      <i class="fa fa-trash"></i>
                    </a>
                    <input type="text" name="hinhanh_title[]" value="{{ $p['title'] }}" class="form-control"/>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
          <div class="form-actions">
              <a href="{{ env('APP_URL') }}admin/product" class="btn btn-light"><i class="fa fa-reply-all"></i> Trở về</a>
              <button type="submit" class="btn btn-info"> <i class="fa fa-check"></i> Cập nhật</button>
          </div>
        </form>
    	</div>
    </div>
</div>
</div>
</div>
@endsection
@section('js')
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/libs/isotope/js/isotope.pkgd.min.js"></script>
  <script type="text/javascript" src="{{ env('APP_URL') }}assets/backend/libs/magnific-popup/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/libs/select2/js/select2.min.js" type="text/javascript"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/drag-arrange.min.js" type="text/javascript"></script> 
  <script src="{{ env('APP_URL') }}assets/backend/libs/number/jquery.number.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      upload_hinhanh("{{ env('APP_URL') }}image/uploads"); delete_hinhanh();
      popup_images();$(".select2").select2();
      $("#progressbar").hide();
      $('.number').number(true, 0, ',', '.');
    });
  </script>
@endsection
