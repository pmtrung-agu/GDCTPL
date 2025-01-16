<?php

$chart9_data = [];
$chart9_label = [];
foreach($linhvuc as $lv){ 
    $sum[$lv['_id'][3]] = 0;
}

foreach($bang_3 as $b3){
    foreach($linhvuc as $lv){
        $count_h = App\Models\CDSKhaoSat::where(3,'=', $lv['_id'][3])->count();
        $danhsach_h = App\Models\CDSKhaoSat::where(3,'=', $lv['_id'][3])->get();
        $sum[$b3[3]] = 0;
        foreach($danhsach_h as $dsh) {
            $sum[$b3[3]] += intval($dsh[$b3[3]]);
        }
        if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
        else $tl = 0;
        $sum[$lv['_id'][3]] += ($tl * $b3[2]);
    }   
}
foreach($linhvuc as $lv1){ 
    $chart9_data[] = number_format($sum[$lv1['_id'][3]],1, ".", ",");
    $chart9_label[] = $lv1['_id'][3];
}

?>

<div class="card-box">
    <h4 class="text-center">Biểu đồ 9: Mức độ sẵn sàng chuyển đổi số theo lĩnh vực</h4>
    <div id="Chart_9" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
        var chart9_options = {
            series: [{
                name: 'Mức độ CĐS',
                data: <?php echo json_encode($chart9_data); ?>,
            }],
                chart: {
                type: 'bar',
                height: 350
            },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 5,
            dataLabels: {
              position: 'top', // top, center, bottom
            }, 
          }
        },
        dataLabels: {
          enabled: true,
          offsetY: -20,
          style: {
            fontSize: '12px',
            colors: ["#304758"]
          }
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
            categories: <?php echo json_encode($chart9_label, JSON_UNESCAPED_UNICODE ); ?>,         
        },
        yaxis: {
          title: {
            text: ''
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    //return "$ " + val + " thousands"
                    return val;
                }
            }
        }
    };

</script>
<?php /**PATH E:\Lara_Projects\ABAPortal\resources\views/Admin/KhaoSatCDS/bieu-do-9.blade.php ENDPATH**/ ?>