@php
$chart11_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart11_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($bang_11 as $b11){
    $chart11_label[] = $b11[0];
    $chart11_data[] = $b11[1];
}

@endphp
<div class="card-box">
    <h4 class="text-center">Biểu đồ 11: Quy mô doanh nghiệp tham gia khảo sát</h4>
    <div id="Chart_11" class="flot-chart"></div>
</div>
<script type="text/javascript">
        //Chart bar
        var chart11_options = {
            series: {!! json_encode($chart11_data) !!},
            chart: {
                width: 500,
                type: 'pie',
            },
            labels: {!! json_encode($chart11_label, JSON_UNESCAPED_UNICODE ) !!},
            dataLabels: {
                formatter: function (val) {
                  const percent = (val/1);
                  return percent.toFixed(0) + '%'
                },
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 400
                    },
                    legend: {
                        position: 'bottom'
                    },
                    dataLabels: {
                        position: 'bottom'
                    },
                }
            }]
        };
</script>