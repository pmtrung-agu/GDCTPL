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
<h3 style="font-size:30px;">Chúc mừng quý Doanh nghiệp đã đăng ký thàng công thành viên Cổng thông tin Chuyển đổi số Doanh nghiệp:</h3>
<p style="font-size: 20px;">Tài khoản đăng nhập cổng thông tin như sau:</p>
<ul style="font-size: 20px;">
    <li>Tài khoản (username): {{ $data['dien_thoai'] }}</li>
    <li>Mật khẩu (password): {{ $data['dien_thoai'] }}</li>
    <li>Địa chỉ đăng nhập: <a href="{{ env('APP_URL') }}admin">Tại đây</a></li>
</ul>
<p style="font-size: 20px;">Những lợi ích khi tham gia thành viên cổng thông tin Chuyển đổi số Doanh nghiệp:</p>
<script src="{{ env('APP_URL') }}assets/backend/js/vendor.min.js"></script>
<!-- App js -->
<script src="{{ env('APP_URL') }}assets/backend/js/app.min.js"></script>
</body>
</html>