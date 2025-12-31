@extends('Admin.layout')
@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection

@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 style="color:#d10700;">GIÁO DỤC CHÍNH TRỊ - PHÁP LUẬT</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ env('APP_URL') }}assets/backend/images/bg.jpg" style="width:90%;"/>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="{{ env('APP_URL') }}assets/frontend/libs/photobox/jquery.photobox.js"></script>
@endsection