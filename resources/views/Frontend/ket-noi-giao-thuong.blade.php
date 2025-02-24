@extends('Frontend.layout')
@section('title', 'Kết nối giao thương')
@section('body')
<section class="th-blog-wrapper space-top" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="title-area text-center">
                    <span class="sub-title sub-title2">Thông tin Doanh nghiệp</span>
                    <h2 class="sec-title sec-title2"><span>Kết nối giao thương</span> </h2>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/add" class="th-btn d-none d-xl-block bg-success" title="Kết nối giao thương" style="padding:10px 0px 10px 0px;"><i class="fab fa-connectdevelop"></i> Gởi nhu cầu kết nối</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="accordion-area accordion" id="faqAccordion">
                    <div class="accordion-card style3">
                      <div class="accordion-header" id="collapse-item-1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">What is SEO, and why is it important for my business?</button>
                      </div>
                      <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="collapse-item-1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                          <p class="faq-text">SEO (Search Engine Optimization) is the process of optimizing your website to improve its visibility in search engine results pages (SERPs) and attract more organic (non-paid) traffic. It's important for businesses because higher visibility in search results can lead to increased website traffic, more qualified leads, and improved brand awareness and credibility.</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection