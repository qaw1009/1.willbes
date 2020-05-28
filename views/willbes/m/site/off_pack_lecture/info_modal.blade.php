<div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <h4>{{$data['ProdName']}}</h4>
    <div class="LecDetailBox">
        <h5>강좌상세정보</h5>
        <dl class="w-info tx-gray">
            <dt>
                개강월 : <span class="tx-blue">{{$data['SchoolStartYear']}}.{{$data['SchoolStartMonth']}} </span> <span class="row-line">|</span>
                수강형태 : <span class="tx-blue">{{$data['StudyPatternCcdName']}}</span>
            </dt>
        </dl>
        <h5>강좌정보</h5>
        <div class="tx-dark-gray">
            {!! $data['Content'] !!}<br/>
        </div>
    </div>
</div>
<div class="dim" onclick="closeWin('InfoForm')"></div>
