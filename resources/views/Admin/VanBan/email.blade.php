<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG</title>
    <link href="{{ env('APP_URL') }}assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <table border="1" cellpadding="10" width="100%" style="border-collapse: collapse;">
        <tbody>
            <tr>
                <th>Kính gởi</th>
                <td>{!! nl2br($data['noi_dung']) !!}</td>
            </tr>
            <tr>
                <th>Số hiệu</th>
                <td>{{ $van_ban['so_hieu'] }}</td>
            </tr>
            @php
                $dv = App\Models\DMDonVi::find($van_ban['id_don_vi']);
            @endphp
            <tr>
                <th>Đơn vị ban hành</th>
                <td>{{ $dv['ten'] }}</td>
            </tr>
            <tr>
                <th>Trích yếu</th>
                <td>{{ $van_ban['trich_yeu'] }}</td>
            </tr>
            <tr>
                <th>Mô tả</th>
                <td>{{ $van_ban['mo_ta'] }}</td>
            </tr>
            <tr>
                <th>Đính kèm</th>
                <td>
                    @if($van_ban['attachments'])
                    <ul>
                        @foreach($van_ban['attachments'] as $dk)
                            <li><a href="{{ env('APP_URL') }}storage/files/{{ $dk['aliasname'] }}" target="_blank">{{ $dk['title'] }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
<script src="{{ env('APP_URL') }}assets/backend/js/vendor.min.js"></script>
<!-- App js -->
<script src="{{ env('APP_URL') }}assets/backend/js/app.min.js"></script>
</body>
</html>