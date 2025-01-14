@extends('Admin.layout')
@section('title', 'Dữ liệu khảo sát')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Dữ liệu khảo sát Mức độ chuyển đổi số của Doanh nghiệp: {{ $so_luong }} </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Doanh nghiệp</th>
                                <th>Người đại diện</th>
                                <th>Lĩnh vực hoạt động</th>
                                <th>Ngành nghề</th>
                                <th>Ngày thành lập</th>
                                <th>Tổng điểm</th>
                                <th>Mức độ CĐS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($danhsach as $ds)
                                <tr>
                                   <td>{{ $ds['stt'] }}</td> 
                                   <td><a href="{{ env('APP_URL') }}admin/khao-sat-muc-do-cds/chi-tiet/{{ $ds['_id'] }}">{{ $ds[1] }}</a></td>
                                   <td>{{ $ds[2] }}</td>
                                   <td>{{ $ds[3] }}</td>
                                   <td>{{ $ds[4] }}</td>
                                   <td>{{ date("d/m/Y", strtotime($ds[5])) }}</td>
                                   <td class="text-center bold text-danger">{{ $ds[83] }}</td>
                                   <td class="text-center bold text-danger">{{ $ds[84] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $danhsach->withPath(env('APP_URL').'admin/khao-sat-muc-do-cds') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection