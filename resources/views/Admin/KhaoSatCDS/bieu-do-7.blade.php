@php
$chart7_data = [];
$chart7_label = [];
foreach($bang_3 as $b3){
    $chart7_label[] = $b3[1];
    $sum_b7 = 0;
    foreach($danhsach as $ds) {
        $sum_b7 += intval($ds[$b3[3]]);
    }
    $mdss = $sum_b7/$so_luong;
    $chart7_data[] = number_format($mdss,1,".",",");
}
@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 7: Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của doanh nghiệp tỉnh An Giang</h4>
    <div id="Chart_7" class="flot-chart"></div>
</div>
<script type="text/javascript">
    var chart7_options = {
          series: [{
          name: 'Mức độ sẵn sàng bình quân',
          data: {!! json_encode($chart7_data) !!},
        }],
          chart: {
          height: 350,
          type: 'radar',
        },
        dataLabels: {
          enabled: true
        },
        plotOptions: {
          radar: {
            size: 140,
            polygons: {
              strokeColors: '#e9e9e9',
              fill: {
                colors: ['#f8f8f8', '#fff']
              }
            }
          }
        },
        title: {
          text: ''
        },
        colors: ['#FF4560'],
        markers: {
          size: 4,
          colors: ['#fff'],
          strokeColor: '#FF4560',
          strokeWidth: 2,
        },
        tooltip: {
          y: {
            formatter: function(val) {
              return val
            }
          }
        },
        xaxis: {
          categories: {!! json_encode($chart7_label, JSON_UNESCAPED_UNICODE ) !!}
        },
        yaxis: {
          labels: {
            formatter: function(val, i) {
              if (i % 2 === 0) {
                return val
              } else {
                return ''
              }
            }
          }
        }
    };
</script>