<div id="Profile{{ $ele_id }}" class="willbes-Layer-ProfileBox">
    <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile{{ $ele_id }}'); closeWin('Profile{{ $ele_id }}')">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['ProfNickName'] }}</span> {{$data['AppellationCcdName']}} 프로필</div>
    <div class="Layer-Cont">
        <div class="Layer-SubTit NG">· 약력</div>
        <div class="Layer-Txt tx-gray">
            {!! $data['wProfProfile'] !!}
        </div>
        <div class="Layer-SubTit NG">· 저서</div>
        <div class="Layer-Txt tx-gray">
            {!! $data['wBookContent'] !!}
        </div>
    </div>
</div>
<div id="LayerProfile{{ $ele_id }}" class="willbes-Layer-Black"></div>