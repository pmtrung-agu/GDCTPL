@extends('Admin.layout')
@section('title', 'Biểu đồ - Dữ liệu khảo sát')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                @include('Admin.KhaoSatCDS.bieu-do-1')
                @include('Admin.KhaoSatCDS.bieu-do-3')
                @include('Admin.KhaoSatCDS.bieu-do-5')
                @include('Admin.KhaoSatCDS.bieu-do-7')
                @include('Admin.KhaoSatCDS.bieu-do-9')
                @include('Admin.KhaoSatCDS.bieu-do-11')
            </div>
            <div class="col-12 col-md-6">
                @include('Admin.KhaoSatCDS.bieu-do-2')
                @include('Admin.KhaoSatCDS.bieu-do-4')
                @include('Admin.KhaoSatCDS.bieu-do-6')
                @include('Admin.KhaoSatCDS.bieu-do-8')
                @include('Admin.KhaoSatCDS.bieu-do-10')
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ env('APP_URL') }}assets/backend/js/chart.min.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/chartjs-plugin-datalabels@2.0.0.js" type="text/javascript"></script>
    <script src="{{ env('APP_URL') }}assets/backend/js/apexcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            //Chart bar
            var chart1 = new ApexCharts(document.querySelector("#Chart_1"), chart1_options);
            var chart2 = new ApexCharts(document.querySelector("#Chart_2"), chart2_options);
            var chart3 = new ApexCharts(document.querySelector("#Chart_3"), chart3_options);
            var chart4 = new ApexCharts(document.querySelector("#Chart_4"), chart4_options);
            var chart5 = new ApexCharts(document.querySelector("#Chart_5"), chart5_options);
            var chart6 = new ApexCharts(document.querySelector("#Chart_6"), chart6_options);
            var chart7 = new ApexCharts(document.querySelector("#Chart_7"), chart7_options);
            var chart8 = new ApexCharts(document.querySelector("#Chart_8"), chart8_options);
            var chart9 = new ApexCharts(document.querySelector("#Chart_9"), chart9_options);
            var chart10 = new ApexCharts(document.querySelector("#Chart_10"), chart10_options);
            var chart11 = new ApexCharts(document.querySelector("#Chart_11"), chart11_options);
            chart1.render(); chart2.render();chart3.render();chart4.render();chart5.render();
            chart6.render();chart7.render();chart8.render();chart9.render();chart10.render();
            chart11.render();
            
        });
    </script>
@endsection
