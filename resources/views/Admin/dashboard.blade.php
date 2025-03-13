@extends('Admin.layout')
@section('title', 'Dashboard')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.css" />
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}assets/frontend/libs/photobox/photobox.ie.css" />
@endsection
@section('body')
@php
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\DoanhNghiep;
use App\Models\CDSKhaoSat;
@endphp
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            @if(UserController::is_roles('Business'))
                @php
                    $id_user = Session::get('user._id');
                    $u = User::find($id_user);
                    $dn = DoanhNghiep::find($u['id_doanh_nghiep']);
                    $ds = CDSKhaoSat::where(1, '=', $dn['ten'])->first();
                @endphp
                @if($ds)
                @php
                    $muc_do = $ds[84]; if($muc_do == 0) $muc_do = 1;   
                    $nganh_nghe = $ds[4];
                    $md = Config::get('data_phan_tich.muc_do');
                @endphp
                <div class="col-12 col-md-6">
                    <div class="card-box">                    
                        <h3><i class="fas fa-reply-all text-primary"></i></a> Thông tin Doanh nghiệp: {{ $dn['ten'] }}</h3>
                        <table class="table table-border table-striped table-bodered">
                            <tbody>
                                <tr>
                                    <th>Tên Doanh nghiệp</th>
                                    <td>{{ $ds[1] }}</td>
                                </tr>
                                <tr>
                                    <th>Lĩnh vực hoạt động</th>
                                    <td>{{ $ds[3] }}</td>
                                </tr>           
                                <tr>
                                    <th>Ngành nghề kinh doanh</th>
                                    <td>{{ $ds[4] }}</td>
                                </tr> 
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td>{{ $ds[7] }}</td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td>{{ $ds[8] }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $ds[10] }}</td>
                                </tr>
                                <tr>
                                    <th>Tổng điểm</th>
                                    <td><span class="badge badge-danger" style="font-size:15px;width:40px;">{{ $ds[83] }}</span></td>
                                </tr>
                                <tr>
                                    <th>Mức độ chuyển số Doanh nghiệp</th>
                                    <td><span class="badge badge-success" style="font-size:15px;width:40px;"><strong>{{ $ds[84] }}</strong></span> <strong>{{$md[$muc_do]['title']}}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-box">
                        @php
                            $muc_do_nganh_nghe = Config::get('data_phan_tich.muc_do_nganh_nghe');
                            $muc_do_nganh_nghe_tom_lai = Config::get('data_phan_tich.muc_do_nganh_nghe_tom_lai');
                        @endphp
                        <div class="col-12 col-md-12">
                            <div class="card-box bg-danger widget-flat border-danger text-white" style="font-size:15px;">
                                <a href="{{ env('APP_URL') }}admin/doanh-nghiep/nhu-cau-chuyen-doi-so/add" class="btn btn-blue" style="float:right;"> Gởi <i class="far fa-address-card"></i> câu nhu cầu Chuyển đổi số</a>
                                <p><strong>Doanh nghiệp của Anh/Chị đang kinh doanh ở nhóm Ngành nghề: {{ $ds[4] }}, và mức độ chuyển đổi số ở mức {{ $ds[84] }}.<br />Nên cần thực hiện các công việc sau:</strong></p>
                                <ul>
                                    @foreach($muc_do_nganh_nghe[$ds[4]][$muc_do] as $mdnn)
                                        <li>{{ $mdnn }}</li>
                                    @endforeach
                                </ul>
                                <p><strong>Tóm lại: </strong></p>
                                <ul>
                                    @foreach($muc_do_nganh_nghe_tom_lai as $mdnntl)
                                        <li>{{ $mdnntl }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card-box" style="border: 3px solid #f9221f;">                    
                        <h3><i class="fas fa-reply-all text-primary"></i></a> Thông tin mới nhất</h3>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                   <i class="fe-monitor"></i><span class="d-none d-sm-inline-block ml-2">Thông báo</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                    <i class="fe-user"></i> <span class="d-none d-sm-inline-block ml-2">Tin tức</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="fe-mail"></i> <span class="d-none d-sm-inline-block ml-2">Kết nối giao thương</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="fe-settings"></i> <span class="d-none d-sm-inline-block ml-2">Tài liệu</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                                @php
                                    $thong_bao = App\Models\ThongBao::orderBy('updated_at', 'desc')->take(9)->get();
                                @endphp
                                @if($thong_bao)
                                    <ul>
                                        @foreach($thong_bao as $tb)
                                            <li><a href="{{ env('APP_URL') }}admin/hiep-hoi-doanh-nghiep/thong-bao/chi-tiet/{{ $tb['_id'] }}">{{ $tb['tieu_de'] }} </a> <small style="font-size:10px;">{{ \Carbon\Carbon::parse($tb['updated_at'])->format("d/m/Y H:i") }}</small></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="tab-pane show" id="profile">
                                @php
                                $tin_tuc = App\Models\ThongTin::orderBy('updated_at', 'desc')->take(9)->get();
                                @endphp
                                 @if($tin_tuc)
                                    <ul>
                                        @foreach($tin_tuc as $tt)
                                            <li><a href="{{ env('APP_URL') }}thong-tin-chi-tiet/{{ $tt['slug'] }}" target="_blank">{{ $tt['ten'] }} </a> <small style="font-size:10px;">{{ \Carbon\Carbon::parse($tt['updated_at'])->format("d/m/Y H:i") }}</small></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="tab-pane" id="messages">
                                @php
                                    $ket_noi_giao_thuong = App\Models\KetNoiGiaoThuong::where('tinh_trang','=', 1)->orderBy('updated_at', 'desc')->take(9)->get();
                                @endphp
                                 @if($ket_noi_giao_thuong)
                                    <ul>
                                        @foreach($ket_noi_giao_thuong as $kn)
                                        @php
                                        $dn = App\Models\User::find($kn['id_user']);
                                        $nn = App\Models\DMNganhNghe::find($kn['nganhnghe_id']);
                                        @endphp
                                            <li><a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/chi-tiet/{{ $kn['_id'] }}" data-toggle="modal" data-target="#ChiTietModal" class="chi-tiet-ket-noi">[{{ $nn['ten'] }}] - {{ $dn['fullname'] }} - {{ $kn['nhu_cau'] }} </a> <small style="font-size:10px;">{{ \Carbon\Carbon::parse($kn['updated_at'])->format("d/m/Y H:i") }}</small></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="tab-pane" id="settings">
                                @php
                                $tai_lieu = App\Models\TaiLieu::orderBy('updated_at', 'desc')->take(9)->get();
                                @endphp
                                 @if($tai_lieu)
                                    <ul>
                                        @foreach($tai_lieu as $tl)
                                            <li><a href="{{ env('APP_URL') }}tai-lieu-chi-tiet/{{ $tl['slug'] }}" target="_blank">{{ $tt['ten'] }} </a> <small style="font-size:10px;">{{ \Carbon\Carbon::parse($tl['updated_at'])->format("d/m/Y H:i") }}</small></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="card-box widget-flat border-blue bg-blue text-white" style="font-size:15px;">
                                    <a href="{{ env('APP_URL') }}admin/doanh-nghiep/tu-van-chuyen-doi-so/add" class="btn btn-danger" style="float:right;"><i class="fas fa-users"></i> Gởi câu hỏi đến Chuyên gia Chuyển đổi số</a>
                                    <p><strong>Đặc điểm của doanh nghiệp có múc độ chuyển đổi số: {{ $ds[84] }}</strong></p>
                                    <ul>
                                        @foreach($md[$muc_do]['dac_diem'] as $dd)
                                            <li>{{ $dd }}</li>
                                        @endforeach
                                    </ul>
                                    <p><strong>Lời khuyên doanh nghiệp có múc độ chuyển đổi số: {{ $ds[84] }}</strong></p>
                                    <ul>
                                        @foreach($md[$muc_do]['loi_khuyen'] as $lk)
                                            <li>{{ $lk }}</li>
                                        @endforeach
                                    </ul>
                                    @php
                                        $tom_lai = Config::get('data_phan_tich.muc_do_tom_lai');
                                    @endphp
                                    <p><strong>Tóm lại:</strong></p>
                                    <ul>
                                        @foreach($tom_lai as $tl)
                                            <li>{{ $tl }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endif
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="page-title-box">
                        <h3>Kết quả Khảo sát mức độ chuyển đổi số Doanh Nghiệp</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-blue bg-blue text-white">
                                <i class="fe-tag"></i>
                                <h3 class="text-white">{{ $cds_soluong }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Doanh nghiệp tham gia khảo sát</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-primary widget-flat border-primary text-white">
                                <i class="fas fa-code-branch"></i>
                                <h3 class="text-white">{{ $sl_linhvuc->count() }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Lĩnh vực</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fas fa-cogs"></i>
                                <h3 class="text-white">{{ $sl_nganhnghe->count() }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Ngành nghề</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-users"></i>
                                <h3 class="text-white">{{ $sl_chuyengia }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Chuyên gia Tư vấn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h3>Thống kê Doanh nghiệp tham gia</h3>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-blue bg-blue text-white">
                                <i class="fe-tag"></i>
                                <h3 class="text-white">{{ $dn_soluong }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Doanh nghiệp tham gia</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-primary widget-flat border-primary text-white">
                                <i class="fas fa-code-branch"></i>
                                <h3 class="text-white">{{ $sl_linhvuc->count() }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Lĩnh vực</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fas fa-cogs"></i>
                                <h3 class="text-white">{{ $sl_nganhnghe->count() }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Ngành nghề</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-users"></i>
                                <h3 class="text-white">{{ $dn_hoivien }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Hội viên HHDN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ChiTietModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Nội dung chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ChiTietKetNoiHTML">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection

@section('js')
<script src="{{ env('APP_URL') }}assets/frontend/libs/photobox/jquery.photobox.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".chi-tiet-ket-noi").click(function(){
            var _href = $(this).attr("href");
            $.get(_href, function(html){
                $("#ChiTietKetNoiHTML").html(html);
                $('#gallery').photobox('a',{ time:0 });
            });
        });
    });
</script>

@endsection