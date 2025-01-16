@php
$chart3_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart3_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
foreach($huyen as $h){ 
    $sum[$h['_id'][6]] = 0;
}
foreach($bang_3 as $b3){
    foreach($huyen as $h){
        $count_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->count();
        $danhsach_h = App\Models\CDSKhaoSat::where(6,'=', $h['_id'][6])->get();
        $sum[$b3[3]] = 0;
        foreach($danhsach_h as $dsh) {
            $sum[$b3[3]] += intval($dsh[$b3[3]]);
        }
        if($count_h > 0) $tl = $sum[$b3[3]]/$count_h;
        else $tl = 0;
        $sum[$h['_id'][6]] += ($tl * $b3[2]);
    }   
}
foreach($huyen as $h1){ 
    $chart3_data[] = round($sum[$h1['_id'][6]],1);
    $chart3_label[] = $h1['_id'][6];
}

@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 3: Mức độ chuyển đổi số theo huyện/thị</h4>
    <div id="Chart_3" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
        var chart3_options = {
            series: [{
                name: 'Mức độ CĐS',
                data: {!! json_encode($chart3_data) !!},
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
            categories: {!! json_encode($chart3_label, JSON_UNESCAPED_UNICODE ) !!},         
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
