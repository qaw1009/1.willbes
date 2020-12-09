@php
    switch ($__cfg['CateCode']){
        case "3098":
        case "3099":
            $call_number = '5';
            break;

        default: $call_number = '2'; break;
    }
@endphp

<div class="CScenterBox">
    <dl>
        <dt class="willbesNumber">
            <ul>
                <li>
                    <div class="nTit">온라인 수강문의</div>
                    <div class="nNumber tx-color">1566-4770 <span>▶</span> {{ $call_number }}</div>
                    <div class="nTxt">
                        [운영시간]<br/>
                        평일: 09시~ 18시 (점심시간12시~13시)<br/>
                        주말/공휴일 휴무<br/>
                    </div>
                </li>
                <li>
                    <div class="nTit">교재문의</div>
                    <div class="nNumber tx-color">1544-4944</div>
                    <div class="nTxt">
                        [운영시간]<br/>
                        평일: 09시~ 17시 (점심시간12시~13시)<br/>
                        주말/공휴일 휴무<br/>
                    </div>
                </li>
                <li>
                    <div class="nTit">학원 고객센터</div>
                    <div class="nNumber tx-color">1544-1881 <span>▶</span> 1</div>
                    <div class="nTxt">
                        [전화/방문상담 운영시간]<br/>
                        월~토요일 : 08시 ~ 19시<br/>
						일요일 : 09시 ~ 19시
                    </div>
                </li>
            </ul>
        </dt>
        <dt class="willbesCenter">
            <div class="centerTit">윌비스 고등고시 사이트에 물어보세요!</div>
            <ul>
                <li>
                    <a href="{{ site_url('/support/faq/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                        <div class="nTxt">자주하는<br/>질문</div>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                        <div class="nTxt">학원<br/>상담실</div>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                        <div class="nTxt">동영상<br/>상담실</div>
                    </a>
                </li>
                <li>
                    <a href="{{ site_url('/support/remote/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                        <div class="nTxt">1:1<br/>고객지원</div>
                    </a>
                </li>
            </ul>
        </dt>
    </dl>
</div>