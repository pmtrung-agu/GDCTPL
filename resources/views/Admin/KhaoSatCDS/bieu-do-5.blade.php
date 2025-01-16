@php
$chart5_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart5_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($linhvuc as $lv){
    $chart5_label[] = $lv['_id'][3];
    $sl = App\Models\CDSKhaoSat::where(3,'=',$lv['_id'][3])->count();
    $chart5_data[] = round($sl/$so_luong*100,1);
}

@endphp
<div class="card-box">
    <h4 class="text-center">Biểu đồ 5: Phân bổ doanh nghiệp theo lĩnh vực</h4>
    <div id="Chart_5" class="flot-chart"></div>
</div>
<script type="text/javascript">
        //Chart bar
        var chart5_options = {
            series: {!! json_encode($chart5_data) !!},
            chart: {
                width: 530,
                type: 'pie',
            },
            labels: {!! json_encode($chart5_label, JSON_UNESCAPED_UNICODE ) !!},
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