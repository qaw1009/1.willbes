<div class="CScenterBox">
    <dl>
        <dt class="willbesCenter">
            <div class="centerTit">신광은 경찰 사이트에 물어보세요!</div>
            <ul>
                <li>
                    <a href="{{ front_url('/support/faq/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                        <div class="nTxt">자주하는<br/>질문</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/mobile/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                        <div class="nTxt">모바일<br/>서비스</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/qna/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                        <div class="nTxt">동영상<br/>상담실</div>
                    </a>
                </li>
                <li>
                    <a href="{{ front_url('/support/remote/index') }}">
                        <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                        <div class="nTxt">1:1<br/>고객지원</div>
                    </a>
                </li>
            </ul>
        </dt>
        <dt class="willbesNumber">
            <ul>
                @if($__cfg['CateCode'] == '3008')
                    {{--해양경찰특채--}}
                    <li>
                        <div class="nTit">학원 수강문의</div>
                        <div class="nNumber tx-color">1522-8112</div>
                        <div class="nTxt">
                            [운영시간]<br/>
                            평일: 09시~ 18시 (점심시간12시~13시)<br/>
                            공휴일/일요일휴무<br/>
                        </div>
                    </li>
                @else
                    <li>
                        <div class="nTit">온라인 수강문의</div>
                        <div class="nNumber tx-color">1544-5006 <span>▶</span> 1</div>
                        <div class="nTxt">
                            [운영시간]<br/>
                            평일: 09시~ 18시 (점심시간12시~13시)<br/>
                            공휴일/일요일휴무<br/>
                        </div>
                    </li>
                @endif
                <li>
                    <div class="nTit">교재문의</div>
                    <div class="nNumber tx-color">1544-4944</div>
                    <div class="nTxt">
                        [운영시간]<br/>
                        평일: 09시~ 17시 (점심시간12시~13시)<br/>
                        공휴일/일요일휴무<br/>
                    </div>
                </li>
                {{--
                <li>
                    <div class="nTit">학원 고객센터</div>
                    <div class="nNumber tx-color">1544-0330</div>
                    <div class="nTxt">
                        [전화/방문상담 운영시간]<br/>
                        월-토: 09시~ 22시<br/>
                        일요일: 09시~ 20시<br/>
                    </div>
                </li>
                --}}
            </ul>
        </dt>
    </dl>
</div>