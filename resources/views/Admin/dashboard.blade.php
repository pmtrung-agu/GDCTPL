@extends('Admin.layout')
@section('title', 'Dashboard')
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
                <div class="col-12">
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

@endsection