@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; line-height:1.5; clear:both}
    .evtCtnsBox img {max-width:100%;}
    .evtCtnsBox .wrap { margin:0 auto; position:relative}
    /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    /*타이머*/
    .dday {font-size:24px !important; padding:10px; background:#ebebeb; color:#000; text-align:left; letter-spacing:-1px}
    .dday span {color:#3a99f0; box-shadow:inset 0 -15px 0 rgba(0,0,0,0.1);}
    .dday a {display:inline-block; float:right; border-radius:30px; padding:5px 20px; color:#fff; background:#3a99f0; font-size:14px !important;}
    
    .evt02 {background:#323943; padding-bottom:5vh}
    .slide_pro {display:flex; flex-wrap: wrap; justify-content: center; padding:0 3vh}
    .slide_pro li {width:calc(50% - 4vh);margin:0 2vh;margin-bottom:2vh;}

    
    .event05 {padding:10vh 0; background:#323943; }
    .event05 .ctTilte {letter-spacing:-1px; font-size:2vh; margin-bottom:5vh; color:#c2c2c2}
    .event05 .ctTilte h5 {font-size:2.8vh;}
    .event05 .ctTilte p {font-size:1.8vh; margin-top:1vh}
    .event05 .ctTilte strong {color:#efc126}

    .lecWrap {display:flex; flex-wrap: wrap; justify-content: center; line-height:1.5; font-size:1.8vh;}
    .lecWrap .pass {position: relative; margin:0 auto; width:80%}
    .lecWrap .pass div {font-size:2.2vh;}
    .lecWrap .pass h5 {font-size:4vh; margin-bottom:2vh}
    .lecWrap .pass h5 span {color:#b47607}
    .lecWrap .pass div:nth-child(1) {font-weight:600;}
    .lecWrap .pass div:nth-child(3) {font-size:2.2vh; font-weight:600;}
    .lecWrap .pass div:nth-child(4) {font-size:2.4vh; color:#b47607}
    .lecWrap .pass div strong {font-size:3vh;}
    .lecWrap .pass div span {box-shadow:inset 0 -10px 0 #fbeacb; color:#b47607}
    .lecWrap .pass ul {margin-top:30px; display:none}
    .lecWrap .pass li {list-style:disc; margin-left:1vh; margin-bottom:1vh; font-weight:bold}
    .lecWrap .pass li span {color:#b47607; vertical-align:top}

    .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
    .lecWrap .pass label{display:block; background:#fff; border-radius:10px; padding:20px 40px; text-align:left; box-sizing: border-box; }
    .lecWrap .pass label:hover {cursor: pointer;}
    .lecWrap .pass input:checked + label {border:1px solid #b47607; background:#b47607; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
    .lecWrap .pass input:checked + label div,
    .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}
    .lecWrap .pass input:checked + label ul {margin-top:30px; display:block}

    .lecWrap .pass p {position: absolute; bottom:-10px; width:80%; left:10%; padding:5px; text-align:center; font-size:1.8vh; background:#43AAF7; color:#fff; border-radius:10px; z-index:10; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;} 
        @@keyframes upDown{
            from{background:#b47607}
            50%{background:#865908}
            to{background:#b47607}
        }
        @@-webkit-keyframes upDown{
            from{background:#b47607}
            50%{background:#865908}
            to{background:#b47607}
        }

    .check {margin:5vh auto;}
    .check label {cursor:pointer; font-size:1.8vh; color:#fff;font-weight:bold;}
    .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
    .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:10px; border-radius:4px;font-size:1.6vh;} 

    .event05 .passbuy a {display:block; width:80%; margin:0 auto; background:#1c2127; color:#fff; font-size:2.4vh; border-radius:40px; padding:10px 0; font-weight:bold}  
    .event05 .passbuy a:hover {background:#b47607; color:#fff;}

    .evtInfo {padding:50px 20px; background:#535353; color:#fff; font-size:1.6vh}
    .evtInfoBox {margin:0 auto; text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:2.4vh; margin-bottom:20px}
    .evtInfoBox .infoTit {font-size:1.8vh; margin-bottom:20px}
    .evtInfoBox .infoTit strong {padding:8px 20px; background:#333; border-radius:20px;}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {margin-bottom:8px; list-style-type: decimal; margin-left:20px}  
    .evtInfoBox span {color:#fff100;}
 

    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {  
        .passWrap {display:block;} 
        .dday a {padding:5px 10px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .passWrap {display:block;}
        .lecWrap .pass ul,
        .lecWrap .pass input:checked + label ul {display:flex; flex-wrap: wrap;}
        .lecWrap .pass li {width:calc(100%);}
        .lecWrap .pass input:checked + label ul li {width:calc(100%);}
    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        .lecWrap .pass div:nth-child(2) { margin-bottom:20px}
        .lecWrap .pass ul {display:block}     
        .check br {display:none}
    }

    </style>

    <div id="Container" class="Container NSK">

        <div class="evtCtnsBox dday NSK-Thin">
            <strong>{{$arr_promotion_params['turn']}}기 마감 <span id="ddayCountText" class="NSK-Black"></span> </strong>      
        </div>       

        <div class="evtCtnsBox" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/06/2503m_top.jpg" alt="소방 패스">
                <a href="#apply" title="소방 PASS 구매하기" style="position: absolute;left: 9.8%;top: 81.53%;width: 80.41%;height: 9.52%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2503m_01.jpg" alt="수많은 혜택들">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2503m_02.jpg" alt="교수진">
            <ul class="slide_pro">
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_04.jpg" alt="권나라"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_01.jpg" alt="이종오"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_05.jpg" alt="오도희"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_03.jpg" alt="이종오"/></li> 
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_06.jpg" alt="신기훈"/></li>
                <li><img src="https://static.willbes.net/public/images/promotion/2023/01/2503_02_02.jpg" alt="이석준"/></li>         
            </ul>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2503m_03.jpg" alt="커리큘럼">
        </div>

        <div class="evtCtnsBox event05" data-aos="fade-up" id="apply">
            <div class="ctTilte">
                <h5>
                    <strong class="NSK-Black">2023~2024년도 시험일까지!<br>
                    윌비스 소방직 전 강좌</strong>를 합리적인 가격에!</h5>
                <p>2023, 2024년 합격도, 치열하게 질주하고 싶다면<br>
                    더 이상 고민하지 말고 윌비스 공무원에서 시작하세요!</p>
            </div>

            <div>
                <div class="lecWrap">
                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass02" value="204388">
                        <label for="pass02">
                            <div class="NSK-Black">2024 공채/경채</div>
                            <h5 class="NSK-Black"><span>소방직</span> PASS</h5>
                            <div><span>재도전/환승/대학생 5만원 할인</span></div>
                            <div><strong class="NSK-Black">199,000</strong>원</div>
                            <ul>
                                <li>
                                    22~23 소방직 [공/경채] 대비 커리큘럼 무제한<br>
                                    <span>(2024년 시험일까지 수강)</span></li>
                                <li>배수 제한 없는 무제한 반복 수강</li>
                                <li>온라인모의고사 무료 응시<br>
                                    <span>(윌비스 전국모의고사 시행 시 제공)</span></li>
                                <li><span>G-TELP</span> Level.2 강좌 제공 </li>
                                <li><span>한국사능력검정시험</span> 강좌 제공</li>
                                <li>수강지원 포인트 5만점</li>
                            </ul>
                        </label>
                    </div>
                </div>

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, <br>이에 동의합니다.
                    </label>
                    <a href="#tip">이용안내확인 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evtInfo" id="tip">
			<div class="evtInfoBox">
				<h4 class="NSK-Black">소방 PASS반 이용안내</h4>
				<div class="infoTit"><strong>상품구성</strong></div>
				<ul>
                    <li>본 PASS 과정은 2023년 대비 및 2024년 대비를 위한 과정입니다.</li>
                    <li>수강 가능 교수진<br>
                    · 소방 [공/경채] : 소방학 권나라/이종오, 소방관계법규 오도희/이종오, 행정법 신기훈 이석준, G-TELP 김혜진, 한능검 오태진
                    (* 교수진별 커리큘럼 진행은 상이할 수 있으며 학원 사정에 따라 부득이하게 커리큘럼 및 교수진이 추가/변경될 수 있습니다. 신규 과정이 진행되지 않는 경우에는 이전 연도 과정을 대체 제공 해드립니다.)</li>
                    <li>수강기간 : 2023년도 대비 과정 시험일까지, 2024년도 대비 과정 24년 4월까지</li>
				</ul>
				<div class="infoTit"><strong>강의안내</strong></div>
				<ul>
                    <li>공무원학원 실강 중 LIVE로 진행되는 강좌만 제공 (*일부 특강 제외)<br>
                        방학개론/소방관계법규 이종오, 행정법 이석준
                    </li>
				</ul>

                <div class="infoTit"><strong>환불정책</strong></div>
				<ul>
                    <li>결제 후 7일 이내 전액 환불 가능</li>
                    <li>맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불 가능</li>
                    <li>자료 및 모바일 강의 다운로드 시 수강한 것으로 간주</li>
                    <li>본 상품은 특별 기획 상품으로, 수강시작일(결제 당일 포함)로부터 7일 경과 후 환불 시에는 할인 되기 전 정가를 기준으로 사용일수만큼 차감하고 환불됩니다.<br>
                    · 결제금액 - (강좌 정상가의 1일 이용대금*이용일수)<br></li>
				</ul>

                <div class="infoTit"><span>※ 그 외 수강방법 및 인증 이벤트 참여 관련 사항에 대해서는 PC 버전으로 확인 부탁드립니다.</span></div>

			</div>
		</div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
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
        location.href = "{{ front_url('/periodPackage/show/cate/3023/pack/648001/prod-code/') }}" + code;
    }

     /*롤링*/
        $(document).ready(function() {
            var BxBook = $('.slide_pro').bxSlider({
                slideWidth: 310,
                slideMargin: 40,
                maxSlides:10,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:40000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop