@extends('Admin.layout')
@section('title', 'Biểu đồ - Dữ liệu khảo sát')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    @include('Admin.KhaoSatCDS.bieu-do-1')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
