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
<h3 style="font-size:20px;">Chúc mừng quý Doanh nghiệp đã đăng ký thàng công thành viên Cổng thông tin Chuyển đổi số Doanh nghiệp:</h3>
<p style="font-size: 15px;">Tài khoản đăng nhập cổng thông tin như sau:</p>
<ul style="font-size: 15px;">
    <li>Tài khoản (username): {{ $data['dien_thoai'] }}</li>
    <li>Mật khẩu (password): {{ $data['dien_thoai'] }}</li>
    <li>Địa chỉ đăng nhập: <a href="{{ env('APP_URL') }}auth/login">Tại đây</a></li>
</ul>
<p style="font-size: 15px;">Những lợi ích khi tham gia thành viên cổng thông tin Chuyển đổi số Doanh nghiệp:</p>
<ul style="font-size: 15px;">
    <li>Được cung cấp thông tin về Chuyển đổi số Doanh nghiệp.</li>
    <li>Được Tư vấn Chuyển đổi số Doanh nghiệp miễn phí.</li>
    <li>Nhận thông tin về Hiệp hội Doanh nghiệp nhanh chóng</li>
    <li>Gởi đề xuất Kiến nghị đến Hiệp hội Doanh nghiệp tỉnh An Giang</li>
    <li>Đăng giới thiệu sản phẩm của Doanh nghiệp miễn phí.</li>
    <li>Kết nối giao thương với các doanh nghiệp khác.</li>
</ul>
<h3 style="font-size:20px;">Cổng thông tin Chuyển đổi số Doanh nghiệp</h3>
<p style="font-size: 15px;">
    Mọi chi tiết vui lòng Liên hệ: <b>Trung tâm Tin học Trường Đại học An Giang</b> <br />
    Địa chỉ: 18 Ung Văn Khiêm, P. Mỹ Xuyên, Tp. Long Xuyên, An Giang <br />
    Điện thoại: (02966) 253.599<br />
    Email: cict@agu.edu.vn
</p>
<script src="{{ env('APP_URL') }}assets/backend/js/vendor.min.js"></script>
<!-- App js -->
<script src="{{ env('APP_URL') }}assets/backend/js/app.min.js"></script>
</body>
</html>