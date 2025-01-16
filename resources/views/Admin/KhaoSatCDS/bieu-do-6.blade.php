@php
$chart6_data = [];// [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380];
$chart6_label = []; // ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan','United States', 'China', 'Germany'];
$arr_md = [0, 1, 2, 3, 4, 5];
foreach($arr_md as $md){
    $sl = App\Models\CDSKhaoSat::where(84,'=',strval($md))->count();
    $chart6_data[] = $sl; // round($sl/$so_luong*100,1);
}
$chart6_label = $arr_md;
@endphp

<div class="card-box">
    <h4 class="text-center">Biểu đồ 6: Mức độ sẵn sàng chuyển đổi số của doanh nghiệp</h4>
    <div id="Chart_6" class="flot-chart"></div>
</div>

<script type="text/javascript">
        //Chart bar
        var chart6_options = {
            series: [{
                name: 'Mức độc CĐS',
                data: {!! json_encode($chart6_data) !!},
            }],
                chart: {
                type: 'bar',
                height: 350
            },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 1,
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
            categories: {!! json_encode($chart6_label, JSON_UNESCAPED_UNICODE ) !!},         
            title: {
                text: 'Mức độ sẵn sàng chuyển đổi số'
            }  
        },
        yaxis: {
          title: {
            text: 'Số Doanh nghiệp'
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
