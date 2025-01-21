<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>CỔNG THÔNG TIN CHUYỂN ĐỔI SỐ DOANH NGHIỆP VỪA VÀ NHỎ TỈNH AN GIANG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hệ thống quản lý Văn bản Trường Đại học An Giang University - Files Mamnagement System" name="description" />
        <meta content="Phan Minh Trung - trungminhphan@gmail.com" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ env('APP_URL') }}assets/backend/images/favicon.ico">
        <!-- App css -->
        <link href="{{ env('APP_URL') }}assets/backend/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ env('APP_URL') }}assets/backend/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="account-pages">
        <!-- Begin page -->
        <div class="accountbg" style="background: url('{{ env('APP_URL') }}/assets/backend/images/bg.jpg');background-size: cover;"></div>
        <div class="wrapper-page account-page-full">
            <div class="card">
                <div class="card-block">
                    <div class="account-box">
                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                                <a href="{{ env('APP_URL') }}" class="text-success">
                                    <span><img src="{{ env('APP_URL') }}/assets/backend/images/logo.png" alt="" height="26"></span>
                                </a>
                            </h2>
                            <div class="text-center">
                                <h1 class="text-error">500</h1>
                                <h4 class="text-uppercase text-danger mt-3">Không có quyền truy cập</h4>
                                <a class="btn btn-primary" href="{{ env('APP_URL') }}admin"> Trở về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-t-40 text-center">
                <p class="account-copyright">2025 © Trung tâm Tin học Trường Đại học An Giang</p>
            </div>
        </div>
        <!-- Vendor js -->
        <script src="{{ env('APP_URL') }}assets/backend/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="{{ env('APP_URL') }}assets/backend/js/app.min.js"></script>
    </body>
</html>
