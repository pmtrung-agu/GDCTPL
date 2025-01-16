@extends('Admin.layout')
@section('title', 'Phân tích Dữ liệu khảo sát')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát: {{ $so_luong }} </h3>
                    <div class="row">
                        <div class="col-12 col-md-7 card-box">
                            <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 1: Phân tích rào cản, khó khăn về chuyển đổi số:</strong></h4>
                            <table class="table table-border table-striped table-bodered">
                                <thead>                                   
                                    <tr>
                                      <th>STT</th>
                                      <th>Rào cảng</th>
                                      <th>Mức độ khó khắn</th>
                                      <th>Tỷ lệ</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($bang_1 as $b1)
                                    @php
                                        $sum[$b1[2]] = 0;
                                        foreach($danhsach as $ds) {
                                            $sum[$b1[2]] += intval($ds[$b1[2]]);
                                        }
                                        $mucdo = $sum[$b1[2]]/$so_luong;
                                        $tyle = $mucdo/5*100;
                                    @endphp
                                    <tr>
                                        <td>{{ $b1[0] }}</td>
                                        <td>{{ $b1[1] }}</td>
                                        <td class="text-right">{{ number_format($mucdo,1,".",",") }}</td>
                                        <td class="text-right">{{ number_format($tyle,2,".",",") }}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="col-12 col-md-5 card-box">
                            <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 2: Phân bổ doanh nghiệp theo huyện/thị:</strong></h4>
                            <table class="table table-border table-striped table-bodered">
                                <thead>                                   
                                    <tr>
                                        <th>Huyện/Thị</th>
                                        <th>Số lượng doanh nghiệp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $tongcong = 0; @endphp
                                    @foreach($huyen as $h)
                                    @php
                                        $sl = App\Models\CDSKhaoSat::where(6,'=',$h['_id'][6])->count();
                                        $tongcong += $sl;
                                    @endphp
                                    <tr>
                                        <td>{{ $h['_id'][6] }}</td>
                                        <td class="text-right">{{ $sl }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bold">
                                        <th>Tổng cộng</th>
                                        <th class="bold text-right">{{ $tongcong }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-12">
                                <h4 style="font-size:20px;" class="text-danger"><strong>**Bảng 3: Mức độ chuyển đổi số theo huyện/thị: [Thang điểm tối đa: 320]</strong></h4>
                                <table class="table table-border table-striped table-bodered">
                                    <thead>                                   
                                        <tr>
                                            <th rowspan="2">STT</th>
                                            <th rowspan="2">Trụ cột</th>
                                            <th rowspan="2">Trọng số trụ cột</th>
                                            <th colspan="{{ count($huyen) }}">Huyện/thị: {{ count($huyen) }}</th>
                                        </tr>
                                        <tr>
                                            @foreach($huyen as $h)
                                                <th>{{ $h['_id'][6] }}</th>
                                                @php $sum[ $h['_id'][6]] = 0 @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bang_3 as $b3)
                                        <tr>
                                            <td>{{ $b3[0] }}</td>
                                            <td>{{ $b3[1] }}</td>
                                            <td class="text-right">{{ $b3[2]*100 }}%</td>
                                            @foreach($huyen as $h)
                                            @php
                                                $count_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->count();
                                                $danhsach_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->get();
                                                $sum[$b3[3]] = 0;
                                                foreach($danhsach_h as $dsh) {
                                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                                }
                                                if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
                                                else $tl = 0;
                                                $sum[$h['_id'][6]] += ($tl * $b3[2]);
                                            @endphp
                                                <th>{{ round($tl, 1) }}</th>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bold bg-warning">
                                            <th colspan="3">Mức độ chuyển đổi số</th>
                                            @foreach($huyen as $h)
                                                <th>{{ round($sum[$h['_id'][6]],1) }}</th>
                                            @endforeach
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-6">
                                <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 4: Phân bổ doanh nghiệp tham gia khảo sát theo ngành (%)</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>
                                            <tr>
                                                <th>Ngành</th>
                                                <th>Số lượng doanh nghiệp</th>
                                                <th>Đơn vị (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $tt = App\Models\CDSKhaoSat::count(); @endphp
                                            @foreach ($nganh as $nn)
                                            @php $sl = App\Models\CDSKhaoSat::where(4,'=',$nn['_id'][4])->count(); @endphp
                                            <tr>
                                                <td>{{ $nn['_id'][4] }}</td>
                                                <td class="text-right">{{ $sl }}</td>
                                                <td class="text-right">{{ number_format($sl/$tt * 100,1,".",",") }}%</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="bold bg-warning">
                                                <th>Tổng Cộng</th>
                                                <th class="text-right">{{ $tt }}</th>
                                                <th class="text-right">100%</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 7: Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của doanh nghiệp tỉnh An Giang</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>                                   
                                            <tr>
                                                <th rowspan="2">STT</th>
                                                <th rowspan="2">Trụ cột</th>
                                                <th rowspan="2">Mức độ sẵn sàng bình quân</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($bang_3 as $b3)
                                            @php
                                                $sum_b7 = 0;
                                                foreach($danhsach as $ds) {
                                                    $sum_b7 += intval($ds[$b3[3]]);
                                                }
                                                $mdss = $sum_b7/$tt;
                                            @endphp
                                            <tr>
                                                <td>{{ $b3[0] }}</td>
                                                <td>{{ $b3[1] }}</td>
                                                <td class="text-right">{{ number_format($mdss,1,".",",") }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                 <div class="card-box">
                                    <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 5: Phân bổ doanh nghiệp theo lĩnh vực</strong></h4>
                                    <table class="table table-border table-striped table-bodered">
                                        <thead>
                                            <tr>
                                                <th>Lĩnh vực</th>
                                                <th>Số lượng doanh nghiệp</th>
                                                <th>Đơn vị (%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $tt = App\Models\CDSKhaoSat::count(); @endphp
                                            @foreach ($linhvuc as $lv)
                                            @php $sl = App\Models\CDSKhaoSat::where(3,'=',$lv['_id'][3])->count(); @endphp
                                            <tr>
                                                <td>{{ $lv['_id'][3] }}</td>
                                                <td class="text-right">{{ $sl }}</td>
                                                <td class="text-right">{{ number_format($sl/$tt * 100,1,".",",") }}%</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="bold bg-warning">
                                                <th>Tổng Cộng</th>
                                                <th class="text-right">{{ $tt }}</th>
                                                <th class="text-right">100%</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-box">
                                <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 6: Mức độ chuyển đổi số của doanh nghiệp</strong></h4>
                                @php $arr_mucdo = array(0,1,2,3,4,5)  @endphp
                                <table class="table table-border table-striped table-bodered">
                                    <thead>
                                        <tr>
                                            <th>Mức độ</th>
                                            <th>Số lượng Doanh nghiệp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($arr_mucdo as $md)
                                        @php $sl = App\Models\CDSKhaoSat::where(84, '=', strval($md))->count(); @endphp
                                        <tr>
                                            <td>{{ $md }}</td>
                                            <td class="text-right">{{ $sl }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-12">
                                <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 8: Mức độ sẵn sàng chuyển đổi số theo ngành</strong></h4>
                                <table class="table table-border table-striped table-bordered">
                                    <thead>                                   
                                        <tr>
                                            <th rowspan="2">STT</th>
                                            <th rowspan="2">Trụ cột</th>
                                            <th rowspan="2">Trọng số trụ cột</th>
                                            <th colspan="{{ count($nganh) }}">Ngành nghề kinh doanh: {{ count($nganh) }}</th>
                                        </tr>
                                        <tr>
                                            @foreach($nganh as $nn)
                                                <th>{{ $nn['_id'][4] }}</th>
                                                @php $sum[$nn['_id'][4]] = 0; @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bang_3 as $b3)
                                        <tr>
                                            <td>{{ $b3[0] }}</td>
                                            <td>{{ $b3[1] }}</td>
                                            <td class="text-right">{{ $b3[2]*100 }}%</td>
                                           @foreach($nganh as $n1)
                                                @php
                                                $count_h = App\Models\CDSKhaoSat::where(4,'=', strval($n1['_id'][4]))->count();
                                                $danhsach_h = App\Models\CDSKhaoSat::where(4,'=', $n1['_id'][4])->get();
                                                $sum[$b3[3]] = 0;
                                                foreach($danhsach_h as $dsh) {
                                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                                }
                                                if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
                                                else $tl = 0;
                                                $sum[$n1['_id'][4]] += ($tl * $b3[2]) ;
                                                 @endphp
                                                <th class="text-right">{{ number_format($tl, 1,".",",") }}</th>
                                            @endforeach 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bold bg-warning">
                                            <th colspan="3">Mức độ chuyển đổi số</th>
                                            @foreach($nganh as $nn)
                                                <th class="text-right">{{ number_format($sum[$nn['_id'][4]],1,".",".") }}</th>
                                            @endforeach
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="row card-box">
                            <div class="col-12 col-md-12">
                                <h4 style="font-size:20px;" class="text-danger"><strong>*Bảng 9: Mức độ sẵn sàng chuyển đổi số theo 03 lĩnh vực</strong></h4>
                                <table class="table table-border table-striped table-bordered">
                                    <thead>                                   
                                        <tr>
                                            <th rowspan="2">STT</th>
                                            <th rowspan="2">Trụ cột</th>
                                            <th rowspan="2">Trọng số trụ cột</th>
                                            <th colspan="{{ count($linhvuc) }}">Lĩnh vực: {{ count($linhvuc) }}</th>
                                        </tr>
                                        <tr>
                                            @foreach($linhvuc as $lv)
                                                <th>{{ $lv['_id'][3] }}</th>
                                                @php $sum[$lv['_id'][3]] = 0; @endphp
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bang_3 as $b3)
                                        <tr>
                                            <td>{{ $b3[0] }}</td>
                                            <td>{{ $b3[1] }}</td>
                                            <td class="text-right">{{ $b3[2]*100 }}%</td>
                                           @foreach($linhvuc as $lv)
                                                @php
                                                $count_h = App\Models\CDSKhaoSat::where(3,'=', strval($lv['_id'][3]))->count();
                                                $danhsach_h = App\Models\CDSKhaoSat::where(3,'=', $lv['_id'][3])->get();
                                                $sum[$b3[3]] = 0;
                                                foreach($danhsach_h as $dsh) {
                                                    $sum[$b3[3]] += intval($dsh[$b3[3]]);
                                                }
                                                if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
                                                else $tl = 0;
                                                $sum[$lv['_id'][3]] += ($tl * $b3[2]) ;
                                                 @endphp
                                                <th class="text-right">{{ number_format($tl, 1,".",".") }}</th>
                                            @endforeach 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="bold bg-warning">
                                            <th colspan="3">Mức độ chuyển đổi số</th>
                                            @foreach($linhvuc as $lv)
                                                <th class="text-right">{{ number_format($sum[$lv['_id'][3]],1,".",",") }}</th>
                                            @endforeach
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection