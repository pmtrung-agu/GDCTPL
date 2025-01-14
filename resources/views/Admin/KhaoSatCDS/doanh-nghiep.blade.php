@extends('Admin.layout')
@section('title', 'Phân tích Dữ liệu khảo sát theo Doanh nghiệp')
@section('css')
    <link href="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> Phân tích dữ liệu khảo sát theo doanh nghiệp: {{ $so_luong }} </h3>
                    <form action="{{ env('APP_URL') }}admin/khao-sat-muc-do-cds/theo-doanh-nghiep" method="GET" id="ThongKeForm">
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <select name="linh_vuc" id="linh_vuc" class="form-control" required>
                                    <option value="">Chọn Lĩnh vực</option>
                                    @foreach ($linhvuc as $lvv )
                                        <option value="{{ $lvv['_id'][3] }}" @if($lv == $lvv['_id'][3]) selected @endif >{{ $lvv['_id'][3] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <select name="doanh_nghiep" id="doanh_nghiep" class="form-control" required>
                                    <option value="">Chọn Doanh nghiệp</option>
                                    @if($doanh_nghiep)
                                        @foreach($doanh_nghiep as $dnn) 
                                            <option value="{{ $dnn[1] }}" @if($dnn[1] == $dn) selected @endif> {{ $dnn[1] }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-12 col-md-2">
                                <button name="submit" id="submit" value="OK" class="btn btn-primary">Đồng ý</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> {{ $dn }} </h3>
                    <h4>Biểu đồ Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Trụ cột</th>
                                <th>Mức độ sẵn sàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bang_3 as $b3)
                            @php
                                $dn_b3 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                            @endphp
                            <tr>
                                <td>{{ $b3[0] }}</td>
                                <td>{{ $b3[1] }}</td>
                                <td class="text-center">{{ number_format($dn_b3[$b3[3]],1,".",",") }}</td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">
                    <h4 class="header-title">Radar Chart</h4>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    <h3><i class="far fa-address-card text-primary"></i> {{ $dn }} </h3>
                    <h4>Biểu đồ rào cản chuyển đổi số</h4>
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Rào cản, khó khăn</th>
                                <th>Mức độ khó khăn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bang_1 as $b1)
                            @php
                                $dn_b1 = App\Models\CDSKhaoSat::where(1,'=',$dn)->first();
                            @endphp
                            <tr>
                                <td>{{ $b1[0] }}</td>
                                <td>{{ $b1[1] }}</td>
                                <td class="text-center">{{ number_format($dn_b1[$b1[2]],1,".",",") }}</td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card-box">   
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ env('APP_URL') }}assets/backend/libs/select2/select2.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#linh_vuc").change(function() {
            var _link = "{{ env('APP_URL') }}admin/khao-sat-muc-do-cds/doanh-nghiep/" + $(this).val();
            $.get(_link, function(html){
                $("#doanh_nghiep").html(html);
                $("#doanh_nghiep").select2();
            });
        })
        $("#doanh_nghiep").select2();
        const radarChart = document.getElementById('radarChart');
        new Chart(radarChart, { type: 'radar',
            data: {
                labels: [
                    'Trải nghiệm số cho khách hàng',
                    'Chiến lược số',
                    'Hạ tầng và Công nghệ số',
                    'Vận hành',
                    'Chuyển đổi số văn hóa doanh nghiệp',
                    'Dữ liệu và tài sản thông tin'
                ],
                datasets: [{
                    label: 'Mức độ sẵn sàng chuyển đổi số trên 6 khía cạnh của ' + "{{ $dn }}",
                    data: [4, 3, 2, 3, 5, 2],
                    fill: true,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)' 
                }]
            }, options: { 
                scales: {
                    r: {
                        angleLines: { display: true },
                        suggestedMin: 0,
                        suggestedMax: 5
                    }
                }
            }
        });

    });
</script>
@endsection