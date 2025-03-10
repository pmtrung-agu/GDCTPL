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
    <div class="col-12">
        @if(isset($ds['photos']) && $ds['photos'])
            @foreach($ds['photos'] as $p)
                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $p['aliasname'] }}" alt="" style="width:150px;">
            @endforeach
        @endif
    </div>
</div>
