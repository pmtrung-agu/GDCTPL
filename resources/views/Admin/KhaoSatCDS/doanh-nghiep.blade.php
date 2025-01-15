@extends('Admin.layout')
@section('title', 'Phân tích Dữ liệu khảo sát theo Doanh nghiệp')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát theo doanh nghiệp: {{ $so_luong }} </h3>
                    <form action="{{ env('APP_URL') }}admin/khao-sat-muc-do-cds/theo-doanh-nghiep" method="GET" id="ThongKeForm">
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <select name="linh_vuc" id="linh_vuc" class="form-control" required>
                                    <option value="">Chọn Lĩnh vực</option>
                                    @foreach ($linhvuc as $lvv )
                                        <option value="{{ $lvv['_id'][3] }}" @if($lv == $lvv['_id'][3]) selected @endif >{{ $lvv['_id'][3] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="doanh_nghiep" id="doanh_nghiep" class="form-control" required>
                                    <option value="">Chọn Doanh nghiệp</option>
                                    @if($doanh_nghiep && count($doanh_nghiep) > 0)
                                        @foreach($doanh_nghiep as $dnn) 
                                            <option value="{{ $dnn[1] }}" @if($dnn[1] == $dn) selected @endif> {{ $dnn[1] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button name="submit" id="submit" value="OK" class="btn btn-primary">Đồng ý</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @if($lv && $dn)
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> {{ $dn }} </h3>
                    <h4>Biểu đồ Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Trụ cột</th>
                                <th>Mức độ sẵn sàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $rada_label=[]; $rada_data=[];
                            @endphp
                            @foreach($bang_3 as $b3)
                            @php
                                $dn_b3 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                                $rada_label[] = $b3[1];
                                $rada_data[] = round($dn_b3[$b3[3]],1);
                            @endphp
                            <tr>
                                <td>{{ $b3[0] }}</td>
                                <td>{{ $b3[1] }}</td>
                                <td class="text-center">{{ number_format($dn_b3[$b3[3]],1,".",",") }}</td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Biểu đồ Radar</h4>
                    <h4 class="text-center">Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của {{ $dn }}</h4>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> {{ $dn }} </h3>
                    <h4>Biểu đồ rào cản chuyển đổi số</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Rào cản, khó khăn</th>
                                <th>Mức độ khó khăn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $bar_label=[]; $bar_data=[]; @endphp
                            @foreach($bang_1 as $b1)
                            @php
                                $dn_b1 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                                $bar_label[] = $b1[0] .'. ' . $b1[1];
                                $bar_data[] = doubleval($dn_b1[$b1[2]]);
                            @endphp
                            <tr>
                                <td>{{ $b1[0] }}</td>
                                <td>{{ $b1[1] }}</td>
                                <td class="text-center">{{ number_format($dn_b1[$b1[2]],1,".",",") }}</td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h4 class="header-title">Biểu đồ Horizontal Bar</h4>
                    <h4 class="text-center">Rào cản chuyển đổi số  của {{ $dn }}</h4>
                    <div id="ChartBar" class="flot-chart"></div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}
<script src="{{ env('APP_URL') }}assets/backend/js/chart.min.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}assets/backend/js/chartjs-plugin-datalabels@2.0.0.js" type="text/javascript"></script>
<script src="{{ env('APP_URL') }}assets/backend/js/apexcharts.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#linh_vuc").change(function() {
            var _link = "{{ env('APP_URL') }}admin/khao-sat-muc-do-cds/doanh-nghiep/" + $(this).val();
            $.get(_link, function(html){
                $("#doanh_nghiep").html(html);
                $("#doanh_nghiep").select2();
            });
        })
        $("#doanh_nghiep").select2();
        @if($lv && $dn)
            const radarChart = document.getElementById('radarChart');
            Chart.register(ChartDataLabels);
            new Chart(radarChart, { type: 'radar',
                plugins: [ChartDataLabels],
                data: {
                    labels: {!! json_encode($rada_label, JSON_UNESCAPED_UNICODE ) !!},
                    datasets: [{
                        label: 'Mức độ sẵn sàng',
                        data: {!! json_encode($rada_data) !!},
                        fill: true,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgb(255, 99, 132)',
                        pointBackgroundColor: 'rgb(255, 99, 132)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgb(255, 99, 132)',
                        pointStyle: 'circle',
                        pointRadius: 5,
                    }]
                }, options: { 
                    scales: {
                        r: {
                            angleLines: { display: true },
                            pointLabels: {
                                fontSize: 14,
                                display: true
                            },
                            ticks: {
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                min: 0,
                                max: 5,
                                display: true
                            },
                            suggestedMin: 0,
                            suggestedMax: 5
                        }
                    },
                    plugins: {
                        // Change options for ALL labels of THIS CHART
                        datalabels: {
                            backgroundColor: function(context) {
                                return context.dataset.borderColor;
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold'
                            },
                            padding: 3,
                        }
                    }
                }
            });

            //Chart bar

            var optionsBar = {
                series: [{
                    data: {!! json_encode($bar_data) !!}
                }],
                chart: {
                    type: 'bar',
                    height: 600
                },
                plotOptions: {
                    bar: {
                        barHeight: '100%',
                        distributed: true,
                        horizontal: true,
                        dataLabels: {
                            position: 'bottom'
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    textAnchor: 'start',
                    style: {
                        colors: ['#000']
                    },
                    formatter: function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    },
                    offsetX: 0,
                    dropShadow: {
                        enabled: false
                    }
                },
                stroke: {
                    width: 5,
                    colors: ['#fff']
                },
                xaxis: {
                    categories: {!! json_encode($bar_label, JSON_UNESCAPED_UNICODE ) !!},
                },
                yaxis: {
                    labels: {
                        show: false
                    }
                },
                tooltip: {
                    theme: 'dark',
                    x: {
                        show: true
                    },
                    y: {
                        title: {
                            formatter: function () {return '' },

                        }
                    }
                }
            };
        var chart = new ApexCharts(document.querySelector("#ChartBar"), optionsBar);
        chart.render();
        @endif
    });
</script>
@endsection