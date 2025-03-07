@extends('Admin.layout')
@section('title', 'Thêm mới danh mục Đơn vị')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="box-header">
                <h3><a href="{{ env('APP_URL') }}admin/danh-muc/don-vi" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Danh mục Đơn vị</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/don-vi/create" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-2 col-form-label text-right">Tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ old('ten') }}" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 text-right p-t-10">Điện thoại</label>
                                        <div class="col-md-4">
                                            <input type="text" id="dien_thoai" name="dien_thoai" class="form-control" placeholder="Điện thoại" value="{{ old('dien_thoai') }}">
                                        </div>
                                    </div>
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
                                            <input type="text" id="address_4" name="address[]" class="form-control" placeholder="Số nhà, tên đường, khóm, ấp,..." value="{{ old('address.3')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cập nhật</button>
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
    <script src="{{ env('APP_URL') }}assets/backend/js/script.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".select2").select2();
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
        });
    </script>
@endsection