@extends('Admin.layout')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="box-header">
                        <h3><a href="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Chỉnh sửa Ngành nghề</h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/nganh-nghe/update" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $ct['_id'] }}">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Họ tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ $ct['ten'] }}" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Lĩnh  vực</label>
                                <div class="col-10">
                                    <select name="id_dm_linh_vuc" id="id_dm_linh_vuc" class="form-control select2" data-placeholder="Chọn Lĩnh vực">
                                        <option value="">Lĩnh vực</option>
                                        @foreach($dm_linh_vuc as $lv)
                                            <option value="{{ $lv['_id'] }}" @if($lv['_id'] == $ct['id_dm_linh_vuc']) selected @endif>{{ $lv['ten'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-10">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="{{ $ct['ghi_chu'] }}" class="form-control" placeholder="Ghi chú">
                                </div>
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
<script src="{{ env('APP_URL') }}assets/backend/libs/select2/js/select2.min.js" type="text/javascript"></script>
     <script type="text/javascript">
         $(document).ready(function(){
            $(".select2").select2();
         });
     </script>
@endsection