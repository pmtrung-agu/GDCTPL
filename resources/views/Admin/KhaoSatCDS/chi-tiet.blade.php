@extends('Admin.layout')
@section('title', 'Chi tiết - Dữ liệu khảo sát')
@section('body')
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">                    
                    <h3><i class="far fa-address-card text-primary"></i> Thông tin Doanh nghiệp: {{ $ds[1] }} </h3>
                    <table class="table table-border table-striped table-bodered">
                        <tbody>
                            <tr>
                                <th>Tên Doanh nghiệp</th>
                                <td>{{ $ds[1] }}</td>
                            </tr>                           
                            <tr>
                                <th>Người đại diện</th>
                                <td>{{ $ds[2] }}</td>
                            </tr>
                            <tr>
                                <th>Lĩnh vực hoạt động</th>
                                <td>{{ $ds[3] }}</td>
                            </tr>           
                            <tr>
                                <th>Ngành nghề kinh doanh</th>
                                <td>{{ $ds[4] }}</td>
                            </tr>           
                            <tr>
                                <th>Ngày thành lập</th>
                                <td>{{ $ds[5] }}</td>
                            </tr>
                            <tr>
                                <th>Địa chỉ</th>
                                <td>{{ $ds[7] }}</td>
                            </tr>
                            <tr>
                                <th>Điện thoại</th>
                                <td>{{ $ds[8] }}</td>
                            </tr>
                            <tr>
                                <th>Fax</th>
                                <td>{{ $ds[9] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $ds[10] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box bg-danger widget-flat border-danger text-white">
                                <i class="fas fa-calendar-check"></i>
                                <h3 class="text-white">{{ $ds[83] }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Tổng điểm</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box widget-flat border-success bg-success text-white">
                                <i class="fe-life-buoy"></i>
                                <h3 class="text-white">{{ $ds[84] }}</h3>
                                <p class="text-uppercase font-13 font-weight-bold">Mức độ chuyển đổi số DN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <h2 class="text-center">PHẦN A</h2> 
                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 1: Trải nghiệm số cho khách hàng </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                @php $j=1; @endphp
                                @for($i=11; $i<=19; $i++)                                     
                                    <th>1.1.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                @php $j=1; @endphp
                                @for($i=20; $i<=23; $i++)                                     
                                    <th>1.2.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=11;$i<=25;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 2: Chiến lược </h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                <th>2.1.1</th>
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=26;$i<=28;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 3: Hạ tầng và Công nghệ số</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                @php $j=1; @endphp
                                @for($i=29; $i<=30; $i++)                                     
                                    <th>3.1.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                @php $j=1; @endphp
                                @for($i=31; $i<=44; $i++)                                     
                                    <th>3.2.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=29;$i<=46;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 4: Vận hành</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                @php $j=1; @endphp
                                @for($i=47; $i<=52; $i++)                                     
                                    <th>4.1.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                @php $j=1; @endphp
                                @for($i=53; $i<=59; $i++)                                     
                                    <th>4.2.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=47;$i<=61;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 5: Chuyển đổi số văn hóa doanh nghiệp</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                @php $j=1; @endphp
                                @for($i=62; $i<=66; $i++)                                     
                                    <th>5.1.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                @php $j=1; @endphp
                                @for($i=67; $i<=71; $i++)                                     
                                    <th>4.2.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=62;$i<=73;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>

                    <h3><i class="far fa-address-card text-primary"></i> Trụ cột 6: Dữ liệu và tài sản thông tin</h3>
                    <table class="table table-border table-striped table-bodered">
                        <thead>
                            <tr>
                                @php $j=1; @endphp
                                @for($i=74; $i<=80; $i++)                                     
                                    <th>6.1.{{ $j }}</th> 
                                    @php $j++; @endphp
                                @endfor                                
                                <th>Tổng</th>
                                <th>Mức</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @for($i=74;$i<=82;$i++)
                                    <td class="text-center">{{ $ds[$i] }}</td>
                                @endfor
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-box">
                    <h2 class="text-center">PHẦN B</h2> 
                    <div class="row">
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.1. Quản trị</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=85; $i<=89; $i++)                                     
                                            <th>7.1.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=85;$i<=89;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.2. Chiến lược</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=90; $i<=94; $i++)                                     
                                            <th>7.2.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=90;$i<=94;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.3. Văn hóa</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=95; $i<=99; $i++)                                     
                                            <th>7.3.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=95;$i<=99;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.4. Công nghệ và kết nối: tiến trình</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=100; $i<=104; $i++)                                     
                                            <th>7.4.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=100;$i<=104;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.5. Công nghệ và kết nối: Mức độ</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=105; $i<=108; $i++)                                     
                                            <th>7.5.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=105;$i<=108;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6 col-md-4 card-box">
                            <h3><i class="far fa-address-card text-primary"></i> 7.6. Nhân lực</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=109; $i<=113; $i++)                                     
                                            <th>7.6.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=109;$i<=113;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <h2 class="text-center">PHẦN C</h2>
                            <h3><i class="far fa-address-card text-primary"></i> 8. Rào cản</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        @php $j=1; @endphp
                                        @for($i=114; $i<=122; $i++)                                     
                                            <th>8.{{ $j }}</th> 
                                            @php $j++; @endphp
                                        @endfor                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=114;$i<=122;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-4">
                            <h2 class="text-center">PHẦN D</h2> 
                            <h3><i class="far fa-address-card text-primary"></i> 8. Rào cản</h3>
                            <table class="table table-border table-striped table-bodered">
                                <thead>
                                    <tr>
                                        <th>Nhu cầu</th> 
                                        <th>Hỏi/đáp</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @for($i=123;$i<=124;$i++)
                                            <td class="text-center">{{ $ds[$i] }}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection