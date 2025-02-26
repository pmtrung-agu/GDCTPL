@extends('Frontend.layout')
@section('title', 'Mô hình chuyển đồi số tại các doanh nghiệp')

@section('body')
<section class="th-blog-wrapper space-top">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title sub-title2">Mô hình chuyển đổi số đã triển khai</span>
            <h2 class="sec-title sec-title2"><span>tại các Doanh nghiệp</span> </h2>
        </div>
        <div class="row">
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="th-blog blog-single has-post-thumbnail">
                  <div class="blog-img" style="height:150px; overflow: hidden;">
                        <img src="{{ env('APP_URL') }}assets/frontend/img/blog/ThaiMinhNguyen.jpg" alt="Thái Minh Nguyên" style="height:250px;">
                    </a>
                  </div>
                  <div class="blog-content">
                    <h2 class="blog-title" style="height: 90px; overflow:hidden;">
                      <a href="{{ env('APP_URL') }}doanh-nghiep/mo-hinh-chuyen-doi-so/thai-minh-nguyen" title="Thái Minh Nguyên" alt="Thái Minh Nguyên">Thái Minh Nguyên</a>
                    </h2>
                    <p class="blog-text" style="height: 100px;overflow:hidden;">Thái Minh Nguyên</p>
                  </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="th-blog blog-single has-post-thumbnail">
                  <div class="blog-img" style="height:150px; overflow: hidden;">
                        <img src="{{ env('APP_URL') }}assets/frontend/img/blog/Yte-247.jpg" alt="Thái Minh Nguyên" style="height:250px;">
                    </a>
                  </div>
                  <div class="blog-content">
                    <h2 class="blog-title" style="height: 90px; overflow:hidden;">
                      <a href="{{ env('APP_URL') }}doanh-nghiep/mo-hinh-chuyen-doi-so/y-te-tai-gia-247" title="Y tế tại gia 247" alt="Y tế tại gia 247">Y tế tại gia 247</a>
                    </h2>
                    <p class="blog-text" style="height: 100px;overflow:hidden;">Y tế tại gia 247</p>
                  </div>
                </div>
            </div>
            <div class="col-xxl-4 col-lg-4 col-md-4">
                <div class="th-blog blog-single has-post-thumbnail">
                  <div class="blog-img" style="height:150px; overflow: hidden;">
                        <img src="{{ env('APP_URL') }}assets/frontend/img/blog/afiex.jpg" alt="Thái Minh Nguyên" style="height:250px;">
                    </a>
                  </div>
                  <div class="blog-content">
                    <h2 class="blog-title" style="height: 90px; overflow:hidden;">
                      <a href="{{ env('APP_URL') }}doanh-nghiep/mo-hinh-chuyen-doi-so/xi-nghiep-thuc-an-chan-nuoi-thuy-san-afiex" title="Xí nghiệp thức ăng Chăn nuôi Thủy sản Afiex" alt="Xí nghiệp thức ăng Chăn nuôi Thủy sản Afiex">Xí nghiệp thức ăng Chăn nuôi Thủy sản Afiex</a>
                    </h2>
                    <p class="blog-text" style="height: 100px;overflow:hidden;">Xí nghiệp thức ăng Chăn nuôi Thủy sản Afiex</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection