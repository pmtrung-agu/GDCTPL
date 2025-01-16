@php
$chart8_data = []; $chart8_label = [];
foreach($nganh as $nn){
    $sum[$nn['_id'][4]] = 0;
    $chart8_label[] = $nn['_id'][4];
}
                               
foreach($bang_3 as $b3) {
    foreach($nganh as $n1){
        $count_h = App\Models\CDSKhaoSat::where(4,'=', strval($n1['_id'][4]))->count();
        $danhsach_h = App\Models\CDSKhaoSat::where(4,'=', $n1['_id'][4])->get();
        $sum[$b3[3]] = 0;
        foreach($danhsach_h as $dsh) {
            $sum[$b3[3]] += intval($dsh[$b3[3]]);
        }
        if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
        else $tl = 0;
        $sum[$n1['_id'][4]] += ($tl * $b3[2]) ;
    }
}
foreach($nganh as $nn){
    $chart8_data[] = number_format($sum[$nn['_id'][4]],1,".",".");
}
@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 8: Mức độ sẵn sàng chuyển đổi số theo ngành</h4>
    <div id="Chart_8" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
    var chart8_options = {
        series: [{
            data: {!! json_encode($chart8_data) !!}
        }],
        chart: {
            type: 'bar',
            height: 500,
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
            categories: {!! json_encode($chart8_label, JSON_UNESCAPED_UNICODE ) !!},
        },
        yaxis: [{
            labels: {
                show: false
            },
        }],
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
</script>