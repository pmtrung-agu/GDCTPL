<div class="row">
    <div class="col-12">
        <strong>Người đăng: {{ $dn['fullname'] }}</strong>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <strong>Nhu cầu: {{ $ds['nhu_cau'] }}</strong>
    </div>
</div>
<div class="row">
    <div class="col-12">{!! $ds['noi_dung'][0]['noi_dung'] !!}</div>
</div>
<div class="row">
    <div class="col-12" id="gallery">
        @if(isset($ds['photos']) && $ds['photos'])
            @foreach($ds['photos'] as $p)
            <a href="{{ env('APP_URL') }}storage/images/origin/{{ $p['aliasname'] }}">
                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" alt="{{ $p['title'] }}" title="{{ $p['title'] }}" style="width:150px;">
            </a>
            @endforeach
        @endif
    </div>
</div>
