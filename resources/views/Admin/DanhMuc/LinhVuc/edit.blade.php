@extends('Admin.layout')
@section('css')
<link rel="stylesheet" href="{{ env('APP_URL') }}assets/libs/switchery/switchery.min.css">
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="box-header">
                        <h3><a href="{{ env('APP_URL') }}admin/danh-muc/linh-vuc" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Chỉnh sửa Lĩnh vực </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/linh-vuc/update" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $ct['_id'] }}">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Họ tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ $ct['ten'] }}" placeholder="Tên" required>
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
<script src="{{ env('APP_URL') }}assets/libs/switchery/switchery.min.js"></script>
     <script type="text/javascript">
         $(document).ready(function(){
            $('[data-plugin="switchery"]').each(function (idx, obj) {
                new Switchery($(this)[0], $(this).data());
            });
         });
     </script>
@endsection