@extends('Admin.layout')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="box-header">
                <h3><a href="{{ env('APP_URL') }}admin/danh-muc/san-pham" class="btn btn-primary"><i class="fa fa-reply-all"></i></a> Danh mục Sản phẩm</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ env('APP_URL') }}admin/danh-muc/san-pham/create" method="POST" class="form-horizontal" role="form">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tên Loại hàng hóa</label>
                                <div class="col-10">
                                    <input type="text" name="ten" class="form-control" id="ten" value="{{ old('ten') }}" placeholder="Tên" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">SLUG</label>
                                <div class="col-10">
                                    <input type="slug" name="slug" class="form-control" id="slug" value="{{ old('ten') }}" placeholder="SLUG" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ghi chú</label>
                                <div class="col-10">
                                    <input type="text" name="ghi_chu" id="ghi_chu" value="{{ old('ghi_chu') }}" class="form-control" placeholder="Ghi chú">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Thứ tự</label>
                                <div class="col-4">
                                    <input type="number" name="thu_tu" id="thu_tu" value="{{ old('thu_tu') }}" class="form-control" placeholder="Thứ tự">
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#ten").keyup(function(){
            $.get("{{ env('APP_URL') }}slug/" + $(this).val(), function(s){
                $("#slug").val(s);
            });
        });
    });
</script>
@endsection