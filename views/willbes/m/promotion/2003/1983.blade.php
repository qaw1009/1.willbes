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

    .passWrap {display:flex; margin:5vh 0; font-size:1.7vh; text-align:left}
    .passLec {margin:0 5px; padding:20px; border:3px solid #a47002; width:50%}
    .passLec h5 {font-size:2.4vh; text-align:center; margin-bottom:20px; font-weight:bold; color:#a47002}
    .passLec li { list-style-type: disc; margin-left:20px; margin-bottom:10px}
    .passLec li:first-child {list-style:none; font-size:2vh; margin-top:20px; text-align:center}

    .passLec input {height:24px; width:24px; vertical-align:middle}
    .passLec label {font-size:2.2vh; color:#a47002; font-weight:bold; margin-left:10px}
    .passLec p {font-size:1.4vh;color:red;}

    .check {padding:0 10px}
    .check p {margin-bottom:50px;padding:40px 10px 0;}
    .check p a {display:block; width:80%; margin:0 auto; font-size:2.6vh; color:#fff; background:#111; text-align:center; border-radius:50px; padding:10px 0}
    .check p a:hover {background:#a47002;}
    .check label {cursor:pointer;color:#000;font-weight:bold;font-size:15px;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a.infotxt {display:inline-block; padding:5px 10px;color:#fff; background:#000; margin-left:10px; border-radius:20px}
    .check a.infotxt:hover {background:#a47002}   

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

        <div class="evtCtnsBox" data-aos="fade-up" id="evt01">
            <div class="passWrap">
                <div class="passLec">
                    <h5>2023 세무직 PASS</h5>
                    <ul>
                        <li>
                            <div><input type="radio" id="y_pkg3" name="y_pkg" value="189939" onClick=""/><label for="y_pkg3">490,000원</label></div>
                            <p>* 지금 구매 시 3만포인트 추가 제공!</p>
                        </li>
                        <li>과목/교수진<br>
                            - 국어 오대혁, 영어 한덕현, 한국사 김상범, 회계학 이윤호, 세법 박창한</li>
                        <li>수강기간<br>
                            - 2023년 4월까지 배수 제한 없는 <strong>무제한 수강</strong></li>
                        <li>기기대수<br>
                            - PC or 모바일 총 2대지원</li>
                        <li>혜택<br>
                            ① 무편집 LIVE 제공<br>
                            ② 2023 대비 신규 진행 전 과정<br>
                            ③ 온라인 모의고사 진행 시 무료 응시</li>
                    </ul>
                </div>
                <div class="passLec">
                    <h5>세무직 전공과목 T-PASS</h5>
                    <ul>
                        <li>
                            <div><input type="radio" id="y_pkg2" name="y_pkg" value="176415" onClick=""/><label for="y_pkg2">340,000원</label></div>
                        </li>
                        <li>과목/교수진<br>
                            - 회계학 이윤호, 세법 박창한</li>
                        <li>기기대수<br>
                            - PC or 모바일 총 2대지원</li>
                        <li>혜택<br>
                            ① 2023 대비 신규 진행 전 과정</li>
                    </ul>
                </div>
            </div>
            
            {{--
            <a href="javascript:go_PassLecture('194323');" >
                <img src="https://static.willbes.net/public/images/promotion/2022/06/1983m_05.jpg" alt="세무직 패스">
            </a>
            --}}

            <div class="check" id="chkInfo">               
                <label>
                    <input name="ischk" type="checkbox" value="Y" />
                    페이지 하단 PASS 이용안내를 모두 확인하였고, 이에 동의합니다.
                </label>
                <a href="#tip" class="infotxt" > 유의사항 자세히보기 ↓</a>
                <p class="NGEB"><a onclick="go_PassLecture(1);" target="_blank">지금 바로 신청하기 ></a></p>     
            </div>   
        </div>

        <div class="evtCtnsBox evtInfo" id="tip">
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
        }
    </script>

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop