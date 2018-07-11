<div id="Profile" class="willbes-Layer-ProfileBox">
    <a class="closeBtn" href="#none" onclick="closeWin('LayerProfile'); closeWin('Profile')">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black"><span class="tx-blue">{{ $data['wProfName'] }}</span> 교수님 프로필</div>
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
<div id="LayerProfile" class="willbes-Layer-Black"></div>