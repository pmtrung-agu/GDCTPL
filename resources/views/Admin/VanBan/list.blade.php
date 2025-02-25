@extends('Admin.layout')
@section('title', 'Quản lý văn bản')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/van-ban/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {{ __('Thêm mới') }}</a> {{ __('Danh sách Văn bản') }}</h3>
                    <hr />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection