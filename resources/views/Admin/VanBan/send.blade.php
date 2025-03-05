@extends('Admin.layout')
@section('title', content: __('Gởi Email'))
@section('body')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 card-box">
                <h1 class="text-center">ĐÃ GỞI EMAIL</h1>
                @foreach ($email_list as $email)
                    <h3><i class="fas fa-envelope text-success"></i> {{ $email }}</h3>
                    <hr />
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection