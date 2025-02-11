<?php
$chart10_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart10_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($bang_10 as $b10){
    $chart10_label[] = $b10[0] . '. ' . $b10[2];
    $chart10_data[] = $b10[1];
}

?>
<div class="card-box">
    <h4 class="text-center">Biểu đồ 10: Mức độ đầu tư cho chuyển đổi số</h4>
    <div id="Chart_10" class="flot-chart"></div>
</div>
<script type="text/javascript">
        //Chart bar
        var chart10_options = {
            series: <?php echo json_encode($chart10_data); ?>,
            dataLabels: {
                formatter: function (val) {
                  const percent = (val/1);
                  return percent.toFixed(0) + '%'
                },
            },
            chart: {
                width: 650,
                type: 'pie',
            },
            labels: <?php echo json_encode($chart10_label, JSON_UNESCAPED_UNICODE ); ?>,
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
</script><?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/bieu-do-10.blade.php ENDPATH**/ ?>