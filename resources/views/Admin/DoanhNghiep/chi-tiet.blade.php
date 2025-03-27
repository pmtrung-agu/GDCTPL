@extends('Admin.layout')
@section('title', 'Chi tiết - Doanh nghiệp')
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
  <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><a href="{{env('APP_URL')}}admin/doanh-nghiep/danh-sach"><i class="fas fa-reply-all text-primary"></i></a> Thông tin Doanh nghiệp: {{ $ds[1] }} </h3>
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="fe-monitor"></i><span class="d-none d-sm-inline-block ml-2">Thông tin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-user"></i> <span class="d-none d-sm-inline-block ml-2">Mô tả</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-mail"></i> <span class="d-none d-sm-inline-block ml-2">Hình ảnh</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="fe-settings"></i> <span class="d-none d-sm-inline-block ml-2">Đính kèm</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="home1">
                            <div class="card-box">
                                <table class="table table-border table-striped table-bodered">
                                <tbody>
                                    <tr>
                                        <th>Tên Doanh nghiệp</th>
                                        <td>{{ $ds['ten'] }}</td>
                                    </tr>                           
                                    <tr>
                                        <th>Người đại diện</th>
                                        <td>{{ $ds['nguoidaidien'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mã số thuế</th>
                                        <td>{{ $ds['masothue'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <td>{{ App\Http\Controllers\DMDiaChiController::getDiaChi($ds['diachi']) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Điện thoại</th>
                                        <td>{{ $ds['dienthoai'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $ds['email'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Website</th>
                                        <td>{{ $ds['website'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lĩnh vực hoạt động</th>
                                        <td></td>
                                    </tr>           
                                    <tr>
                                        <th>Ngành nghề kinh doanh</th>
                                        <td></td>
                                    </tr>           
                                    <tr>
                                        <th>Trạng thái</th>
                                        <td>@if($ds['trangthai'] == 1 ) Đang hoạt động @else Tạm dừng hoạt động @endif</td>
                                    </tr>  
                                    <tr>
                                        <th>Hội viên Hiệp hội Doanh nghiệp tỉnh</th>
                                        <td>@if($ds['hoivienhiephoi']) <span class="badge badge-danger" style="font-size:15px;">Đang là hội viên<span> @else <span class="badge badge-default" style="font-size:15px;">Không phải hội viên</span> @endif</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile1">
                            <div class="card-box">
                                {!! $ds['mota'] !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="messages1">
                            <div class="card-box">
                                <h3><i class="fas fa-file-image text-primary"></i> Hỉnh ảnh:</h3>
                                @if($ds['photos'])
                                    <div class="row" id="gallery">
                                        @foreach($ds['photos'] as $p)
                                        <div class="col-12 col-md-3">
                                            <a href="{{ env('APP_URL') }}storage/images/origin/{{ $p['aliasname'] }}"><img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" style="width:100%;" /></a>
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="settings1">
                            <div class="card-box">
                                <h3><i class="fas fa-book-reader text-primary"></i> Đính kèm: </h3>
                                @if($ds['attachments'])
                                <ul>
                                    @foreach($ds['attachments'] as $key => $dk)
                                    <li><a href="{{ env('APP_URL') }}admin/doanh-nghiep/download/{{ $ds['_id'] }}/{{ $key }}">{{ $dk['title'] }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/frontend/libs/photobox/jquery.photobox.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#gallery').photobox('a',{ time:0 });
        });
    </script>
@endsection