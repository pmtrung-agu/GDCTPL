@extends('Frontend.layout')
@section('title', 'Kết nối giao thương')
@section('body')
<section class="th-blog-wrapper space-top" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="title-area text-center">
                    <span class="sub-title sub-title2">Thông tin Doanh nghiệp</span>
                    <h2 class="sec-title sec-title2"><span>Kết nối giao thương</span> </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-9 justify-content-between">
                <span class="share-links-title" style="float:left;margin-top:8px;">Nhu cầu:</span>
                <div class="tagcloud">
                    <a href="{{ env('APP_URL') }}doanh-nghiep/ket-noi-giao-thuong">Tất cả</a>
                    @foreach ($nhu_cau as $ncc)
                        <a href="{{ env('APP_URL') }}doanh-nghiep/ket-noi-giao-thuong?nc={{ $ncc }}">{{ $ncc }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{ env('APP_URL') }}admin/doanh-nghiep/ket-noi-giao-thuong/add" class="th-btn d-none d-xl-block bg-success" title="Kết nối giao thương" style="padding:10px 0px 10px 0px;"><i class="fab fa-connectdevelop"></i> Gởi nhu cầu kết nối</a>
            </div>
        </div>
    </div>
</section>
@if($danhsach)
<div class="overflow-hidden" id="faq-sec" style="margin-bottom:20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-12">
                <div class="accordion-area accordion" id="faqAccordion">
                    @foreach($danhsach as $k => $ds)
                    @php
                        $dn = App\Models\User::find($ds['id_user']);
                        $nn = App\Models\DMNganhNghe::find($ds['nganhnghe_id']);
                    @endphp
                    <div class="accordion-card style3 @if($k == 0) active @endif">
                        <div class="accordion-header" id="collapse-item-{{ $ds['_id'] }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $ds['_id'] }}" aria-expanded="false" aria-controls="collapse-{{ $ds['_id'] }}">[{{ $nn['ten'] }}] {{ $dn['fullname'] }} : {{ $ds['nhu_cau'] }} </button>
                        </div>
                        <div id="collapse-{{ $ds['_id'] }}" class="accordion-collapse collapse @if($k==0) show @endif" aria-labelledby="collapse-item-{{ $ds['_id'] }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            <p class="faq-text">{!! $ds['noi_dung'][0]['noi_dung'] !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $danhsach->withPath(env('APP_URL').'doanh-nghiep/ket-noi-giao-thuong?nc=' . $nc) }}
                </div>
            </div>
            
        </div>
    </div>
</div>

@endif
@endsection