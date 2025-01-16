@php
$chart2_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart2_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($huyen as $h){
    $chart2_label[] = $h['_id'][6];
    $count_h = App\Models\CDSKhaoSat::where(6,'=',$h['_id'][6])->count();
    $chart2_data[] = round($count_h/$so_luong*100,2);
}

@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 2: Phân bổ doanh nghiệp theo Huyện/Thị</h4>
    <div id="Chart_2" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
        var chart2_options = {
            series: {!! json_encode($chart2_data) !!},
            chart: {
                width: 530,
                type: 'pie',
            },
            labels: {!! json_encode($chart2_label, JSON_UNESCAPED_UNICODE ) !!},
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