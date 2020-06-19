<div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <h4>{{ $data['ProdName'] }}</h4>
    <div class="LecDetailBox">
        <h5>교재상세정보</h5>
        <div class="tx-dark-gray">
            분야 : {{ $data['CateName'] }}<br>
            저자 : {{ $data['wAuthorNames'] }}<br>
            출판사 : {{ $data['wPublName'] }}<br>
            판형/쪽수 : {{ $data['wEditionSize'] }} / {{ $data['wPageCnt'] }}<br>
            출판일 : {{ $data['wPublDate'] }}<br>
            교재비 : {{ number_format($data['RealSalePrice'], 0) }}원 (↓{{ number_format($data['SaleRate'], 0) . $data['SaleRateUnit'] }}) [{{ $data['wSaleCcdName'] }}]<br>
        </div>
        <h5>교재소개</h5>
        <div class="tx-dark-gray">
            {!! $data['wBookDesc'] !!}
        </div>
    </div>
</div>
<div class="dim" onclick="closeWin('InfoForm')"></div>
