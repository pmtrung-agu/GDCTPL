@php
$chart1_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart1_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($bang_1 as $b1){
    $chart1_label[] = $b1[0] . '. ' .$b1[1];
    $sum_md = 0;
    foreach($danhsach as $ds) {
        $sum_md += doubleval($ds[$b1[2]]);
    }
    $md = round(($sum_md / $so_luong)/5*100, 2);
    $chart1_data[] = number_format($md, 2,".",",");
}
@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 1: Những rào cản, khó khăn của doanh nghiệp khi chuyển đổi số
    </h4>
    <div id="Chart_1" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
    var chart1_options = {
        series: [{
            data: {!! json_encode($chart1_data) !!}
        }],
        chart: {
            type: 'bar',
            height: 600,
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
                return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val + "%"
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
            categories: {!! json_encode($chart1_label, JSON_UNESCAPED_UNICODE ) !!},
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