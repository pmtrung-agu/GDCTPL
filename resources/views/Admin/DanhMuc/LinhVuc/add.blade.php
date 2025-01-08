@extends('Admin.layout')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="box-header">
                <h3><a href="{{ env('APP_URL') }}admin/danh-muc/linh-vuc" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Thông tin Lĩnh vực</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/linh-vuc/create" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ old('ten') }}" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-10">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="{{ old('ghi_chu') }}" class="form-control" placeholder="Ghi chú">
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
