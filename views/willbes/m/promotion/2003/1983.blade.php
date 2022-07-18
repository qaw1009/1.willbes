@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .gifimg img {width:33%}

    .dday {font-size:2.5vh; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:1.5vh;}

    .event05 {padding:10vh 0}

    .lecWrap {display:flex; flex-wrap: wrap; line-height:1.5; font-size:1.5vh; width:100%}
    .lecWrap .pass {margin:0 10px 10px; flex: 1 1 100%; position: relative;}
    .lecWrap .pass div {font-size:2vh}
    .lecWrap .pass div:nth-child(1) {font-size:2.2vh; font-weight:600; color:#b47607}
    .lecWrap .pass div:nth-child(2) {font-size:2.2vh; font-weight:600;}
    .lecWrap .pass div:nth-child(3) {font-size:1.4vh; font-weight:600;}
    .lecWrap .pass div:nth-child(4) {font-size:2.2vh; color:#b47607}
    .lecWrap .pass div:nth-child(4) strong {font-size:3vh;}
    .lecWrap .pass div span {box-shadow:inset 0 -10px 0 #fbeacb; color:#b47607}
    .lecWrap .pass ul {margin-top:30px; display:none}
    .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:10px; font-weight:bold}
    .lecWrap .pass li span {color:#b47607; vertical-align:top}

    .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
    .lecWrap .pass label{display:block; border:1px solid #d7d7d7; padding:20px; text-align:left; box-sizing: border-box; height: 100%; }
    .lecWrap .pass label:hover {cursor: pointer;}
    .lecWrap .pass input:checked + label {border:1px solid #b47607; background:#b47607; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
    .lecWrap .pass input:checked + label div,
    .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}
    .lecWrap .pass input:checked + label ul {margin-top:30px; display:block}

    .check {margin:50px auto;}
    .check label {cursor:pointer; font-size:1.5vh;color:#000;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.2vh;} 

    .event05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:2.4vh; border-radius:40px; padding:10px 0; font-weight:bold}  
    .event05 .passbuy a:hover {background:#b47607; color:#fff;}

    .evtInfo {padding:50px 20px; background:#535353; color:#fff; font-size:14px}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:22px; margin-bottom:20px}
    .evtInfoBox .infoTit {font-size:16px; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px;}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}  
    .evtInfoBox span {color:#fff100;}

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {  
        .passWrap {display:block;}
        .passLec {width:95%; margin:10px auto}

        .dday a {padding:5px 10px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .passWrap {display:block;}
        .passLec {width:95%; margin:10px auto}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .lecWrap .pass {margin:0 5px 10px; flex: 1 1 40%;}
        .lecWrap .pass div:nth-child(2) { margin-bottom:20px}
        .lecWrap .pass:nth-child(even) {margin-right:0}
        .lecWrap .pass ul {display:block}
        .check br {display:none}
    }

    </style>

    <div id="Container" class="Container NSK">
        <div class="evtCtnsBox dday NSK-Thin">
            <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>
            <a href="#evt01">신청하기 ></a>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_00.jpg" alt="독점공개">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_top.jpg" alt="세무직 패스">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_01.jpg" alt="심도있는 전략">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_02_01.jpg" alt="무편집 라이브">
            <div class="gifimg">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_01.gif" alt="국어 오대혁">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_02.gif" alt="영어 한덕현">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/1982_02_03.gif" alt="한국사 김상범">
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_02_02.jpg" alt="실시간 강의">
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_03.jpg" alt="교수진">              
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_04.jpg" alt="커리큘럼">              
        </div>

        <div class="evtCtnsBox event05" data-aos="fade-up" id="evt01">

            <div>
                <div class="lecWrap">
                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass01" value="189939">
                        <label for="pass01">
                            <div>2023 세무직</div>
                            <div>PASS</div>
                            <div><span>국어 오대혁, 영어 한덕현, 한국사 김상범, 회계학 이윤호, 세법 박창한</span></div>
                            <div><strong class="NSK-Black">49</strong>만원</div>
                            <ul>
                                <li><span>교재 구매 시 사용가능한 수강지원 포인트 3만점 증정!</span></li>
                                <li><span>2023년 4월</span>까지 배수 제한 없는 <span>무제한 수강</span></li>
                                <li>PC+모바일 총 2대 지원</li>
                                <li>무편집 <span>LIVE</span> 제공</li>
                                <li><span>2023 국가직 대비</span> 신규 진행 전 과정</li>
                                <li>온라인 모의고사 진행 시 무료 응시</li>
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass02" value="176415">
                        <label for="pass02">
                            <div>윌비스 세무직</div>
                            <div>전공과목 T-PASS</div>
                            <div><span>회계학 이윤호, 세법 박창한</span></div>
                            <div><strong class="NSK-Black">29</strong>만원</div>
                            <ul>
                                <li><span>7월 한정 이벤트 5만원 추가할인 적용가</span></li>
                                <li><span>2023. 6월</span>까지 배수 제한 없는 <span>무제한 수강</span></li>
                                <li><span>PC+모바일 총 2대 지원</span></li>
                                <li><span>2023 국가직/지방직 대비</span> 신규 진행 전 과정</li>
                            </ul>
                        </label>
                    </div>
                </div>

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 T-PASS 이용안내를 모두 확인하였고, <br>이에 동의합니다.
                    </label>
                    <a href="#careful">이용안내확인 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="careful">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">세무직 PASS반 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>2022~2023 대비로 진행된 전 강좌 제공 (진행 예정 신규강좌 포함)</li>
                    <li>수강 가능 교수진<br>
                    · 세무직 : 국어 오대혁, 영어 한덕현, 한국사 김상범, 회계학 이윤호, 세법 박창한<br>
                    (*영어 한덕현 교수의 경우, [기본문법>제니스문법>기출리뷰>스나이퍼32>실전동형모의고사] 과정만 제공.)<br>
                    (*교수진별 커리큘럼 진행은 상이할 수 있으며 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있습니다. 신규 과정이 진행되지 않는 경우에는 이전 연도 과정을 대체 제공 해드립니다.)<br>
                    <li>수강기간 : 전과목PASS 2023년 4월까지 / 전공과목T-PASS 2023년 6월까지</li>
				</ul>
				<div class="infoTit"><strong>강의안내</strong></div>
				<ul>
                    <li>공무원학원 실강 중 LIVE로 진행되는 강좌만 제공 (*일부 특강 제외)<br>
                    · 국어 오대혁, 영어 한덕현, 한국사 김상범</li>
				</ul>

                <div class="infoTit"><strong>환불정책</strong></div>
				<ul>
                    <li>결제 후 7일 이내 전액 환불 가능</li>
                    <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능</li>
                    <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주</li>
                    <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                    · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br>
                    (* 수강지원 포인트 포함 상품 환불 시 포인트를 미사용한 경우는 회수 후 환불 처리하오나, 포인트를 사용하였다면 사용분만큼 결제금액에서 차감 후 환불됩니다.)</li>
				</ul>
              
                <div class="infoTit"><span>※ 그 외 수강방법 및 인증 이벤트 참여 관련 사항에 대해서는 PC 버전으로 확인 부탁드립니다.</span></div>
			</div>
		</div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}', '{{$arr_promotion_params['etime'] or "00:00"}}', 'txt');
        });

        /*수강신청 동의*/ 
        function go_PassLecture(){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }

            code = $('input[name="y_pkg"]:checked').val();
            if (typeof code == 'undefined' || code == '') {
                alert('강좌를 선택해 주세요.');
                return;
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3022/pack/648001/prod-code/') }}" + code;
        } 

        /*수강신청 동의 
        function go_PassLecture(code){
            if($("input[name='ischk']:checked").size() < 1){
                alert("이용안내에 동의하셔야 합니다.");
                return;
            }
            if(code == 1){
                code = $('input[name="y_pkg"]:checked').val();
                if (typeof code == 'undefined' || code == '') {
                    alert('강좌를 선택해 주세요.');
                    return;
                }
            }
            location.href = "{{ front_url('/periodPackage/show/cate/3022/pack/648001/prod-code/') }}" + code;
        }*/
    </script>

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop