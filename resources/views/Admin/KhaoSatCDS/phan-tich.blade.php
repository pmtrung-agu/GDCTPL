@extends('Admin.layout')
@section('title', 'Dữ liệu khảo sát')
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
                                        @for($i=0;$i<=3;$i++)
                                            <th>{{ $bang_1[0][$i] }}</th>
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($row=1;$row<=9;$row++)
                                    <tr>
                                        @for($col=0;$col<=3;$col++)
                                            @if($col==3)
                                                <td class="bold">{{ $bang_1[$row][$col]*100 }}%</td>
                                            @else 
                                            <td>{{ $bang_1[$row][$col] }}</td>
                                            @endif
                                        @endfor
                                    </tr>
                                    @endfor
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
                        <div class="row">
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
                                                <th>1</th>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection