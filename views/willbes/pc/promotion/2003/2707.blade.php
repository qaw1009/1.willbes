@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; width:140px; top:130px; right:10px; z-index:1;}
        .sky a {display:block;}
        
        .wb_00 {background:url(https://static.willbes.net/public/images/promotion/2022/07/2707_00_bg.png) repeat-x center bottom;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/07/2707_top_bg.jpg) no-repeat center top;}
        
        .wb_cts01 {padding-top:100px}   
        .youtubetab {width:1120px; margin:0 auto; display:flex}
        .youtubetab a img.on {display:none}
        .youtubetab a img.off {display:block}
        .youtubetab a.active img.on {display:block}
        .youtubetab a.active img.off {display:none}

        .youtubeBox {position:relative; height:1767px}
        #tab1 {background:url(https://static.willbes.net/public/images/promotion/2022/07/2707_tab01_bg.jpg) no-repeat center top; background-size:2000px}
        #tab2 {background:url(https://static.willbes.net/public/images/promotion/2022/07/2707_tab02_bg.jpg) no-repeat center top; background-size:2000px}
        .youtubeBox iframe {position:absolute; top:1196px; left:50%; width:768px; margin-left:-283px; height:432px; z-index: 2;}      

        .wb_cts02 {background:#323943}

        .wb_cts03 {padding:100px 0}
        .wb_cts03 .title {font-size:30px; color:#898989; line-height:1.2; margin-bottom:50px}
        .wb_cts03 .title p {font-size:56px}
        .wb_cts03 .title span {color:#b47607}
        .wb_cts03 .passbuy a {display:block; width:400px; margin:0 auto; background:#1c2127; color:#fff; font-size:30px; border-radius:50px; padding:20px 0; font-weight:bold}  
        .wb_cts03 .passbuy a:hover {background:#b47607; color:#fff;}

        .lecWrap {display:flex; width:990px; margin:auto; line-height:1.5; font-size:14px}
        .lecWrap .pass {width:calc(33.33333% - 10px); margin-bottom:10px; margin-right:10px}
        .lecWrap .pass:last-child {margin-right:0}
        .lecWrap .pass div {font-size:22px}
        .lecWrap .pass div:nth-child(1) {font-size:22px; font-weight:300; color:#b47607}
        .lecWrap .pass div:nth-child(2) {font-size:22px; font-weight:bold; margin-bottom:20px}
        .lecWrap .pass div:nth-child(3) {font-size:14px; font-weight:600;}
        .lecWrap .pass div:nth-child(4) {font-size:28px; color:#b47607}
        .lecWrap .pass div:nth-child(4) strong {font-size:40px;}
        .lecWrap .pass div span {box-shadow:inset 0 -10px 0 #fbeacb; color:#b47607}
        .lecWrap .pass ul {margin-top:30px}
        .lecWrap .pass li {list-style:disc; margin-left:20px; margin-bottom:10px; font-weight:bold}
        .lecWrap .pass li span {color:#b47607; vertical-align:top}

        .lecWrap .pass input[type="radio"] {height:26px; width:26px; position:absolute; top:20px; left:20px; visibility: hidden;}
        .lecWrap .pass label{display:block; border:1px solid #d7d7d7; padding:20px; text-align:left;  box-sizing: border-box; height: 100%; }
        .lecWrap .pass label:hover {cursor: pointer;}
        .lecWrap .pass input:checked + label {border:1px solid #b47607; background:#b47607; color:#fff; box-shadow:5px 5px 10px rgba(0,0,0,.3)}
        .lecWrap .pass input:checked + label div,
        .lecWrap .pass input:checked + label span{color:#fff; box-shadow:none}

        .lecWrap .pass:last-child label {border:2px solid #b47607}
        
        /*수강신청 체크*/
        .check {width:980px; margin:50px auto;}
        .check label {cursor:pointer; font-size:15px;color:#000;font-weight:bold;}
        .check input {border:2px solid #000; margin-right:10px; height:24px; width:24px; }
        .check a {display:inline-block; padding:5px 10px; color:#fff; background:#2d2d2d; margin-left:50px; border-radius:4px;font-size:12px;}  

        /* 이용안내 */
        .wb_info {padding:100px 0; background:#f4f4f4}
        .guide_box{width:1000px; margin:0 auto; text-align:left; word-break:keep-all; line-height:1.5; font-size:14px;}
        .guide_box h2 {font-size:30px; margin-bottom:30px}
        .guide_box dt{margin-bottom:10px; color:#fff; background:#333; display:inline-block; padding:4px 20px; font-size:16px; border-radius:30px}        
        .guide_box dd{color:#777; margin:0 0 40px 5px;}
        .guide_box dd strong {color:#555}
        .guide_box dd li {margin-bottom:3px; list-style:decimal; margin-left:20px;}
        .guide_box dd li a {display:inline-block; margin-left:20px; background:#032E5B; color:#fff; padding:3px 10px; border-radius:15px; font-size:12px}
        .guide_box .inquire{padding-top:25px;font-size:20px;font-weight:bold;color:#000;} 

        /*타이머*/
        .newTopDday * {font-size:24px}
        .newTopDday {background:#e4e4e4; width:100%; padding:20px 0 30px}
        .newTopDday ul {width:1120px; margin:0 auto; display:flex; justify-content: center;}
        .newTopDday ul li {margin-right:5px; text-align:center; font-size:28px; height:70px; line-height:70px; font-weight:bold; color:#000}
        .newTopDday ul li strong {line-height:60px}
        .newTopDday ul li img {width:50px}
        .newTopDday ul li:first-child {padding-right:20px; }
        .newTopDday ul li:last-child {text-align:left; padding-left:20px;} 

    </style>


    <div class="evtContent NSK" id="evtContainer NSK">

        <div class="sky" id="QuickMenu">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_sky01.jpg" title="" />
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/07/2707_sky02.jpg" title="회계학" /></a>
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/07/2707_sky03.jpg" title="세법" /></a>
            <a href="#apply"><img src="https://static.willbes.net/public/images/promotion/2022/07/2707_sky04.jpg" title="전문과목" /></a>
        </div>      

        <div class="evtCtnsBox wb_00" data-aos="fade-up">
            <a href="#apply">
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_00.png" alt="" />
            </a>
        </div>

        <div class="evtCtnsBox wb_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_top.jpg" alt="세무직 티패스"  />
        </div>

        <div class="evtCtnsBox wb_cts01" data-aos="fade-up">
            <div class="youtubetab">
                <a href="#tab1" class="active">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_tab01.jpg" alt="이윤호"  class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_tab01_on.jpg" alt="이윤호"  class="on"/>
                </a>
                <a href="#tab2">
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_tab02.jpg" alt="박창한"  class="off"/>
                    <img src="https://static.willbes.net/public/images/promotion/2022/07/2707_tab02_on.jpg" alt="박창한"  class="on"/>
                </a>
            </div>
            <div class="youtubeBox" id="tab1">
                <iframe src="https://www.youtube.com/embed/NaSxbG7yHso?rel=0" frameborder="0" allow="accelerometer;wb_cts03 autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="youtubeBox" id="tab2">
                <iframe src="https://www.youtube.com/embed/PHsCoF9Uey4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/01/1983_04.jpg" alt="커리큘럼" />
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday"> 
            <ul>
                <li>이벤트 마감까지</li>
                <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><strong>일</strong></li>
                <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><strong>:</strong></li>
                <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><strong>:</strong></li>
                <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                <li>남았습니다</li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_cts03" id="apply" data-aos="fade-up">
            <div class="title">
            낯선 회계학/세법도 이제  <span>윌비스 세무Team</span>과 함께면 걱정 끝!
                <p class="NSK-Black">윌비스 <span>계학/세법 T-PASS</span> 수강신청</p>
            </div>

            <div>
                <div class="lecWrap">
                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass01" value="199217">
                        <label for="pass01">
                            <div>T-PASS</div>
                            <div>회계학</div>
                            <div><span>회계학 이윤호</span></div>
                            <div><strong class="NSK-Black">19</strong>만원</div>
                            <ul>
                                <li><span>* 7월 한정 5만원 추가할인 적용</span></li>
                                <li><span>2023년 6월</span>까지 배수 제한 없는 <span>무제한 수강</span></li>
                                <li>PC or 모바일 총 2대 지원</li>
                                <li>2023 대비 회계학 전 과정</li>
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass02" value="199216">
                        <label for="pass02">
                            <div>T-PASS</div>
                            <div>세법</div>
                            <div><span>세법 박창한</span></div>
                            <div><strong class="NSK-Black">19</strong>만원</div>
                            <ul>
                                <li><span>* 7월 한정 5만원 추가할인 적용</span></li>
                                <li><span>2023년 6월</span>까지 배수 제한 없는 <span>무제한 수강</span></li>
                                <li>PC or 모바일 총 2대 지원</li>
                                <li>2023 대비 세법 전 과정</li>
                            </ul>
                        </label>
                    </div>

                    <div class="pass">
                        <input type="radio" name="y_pkg" id="pass03" value="176415">
                        <label for="pass03">
                            <div>T-PASS</div>
                            <div>회계학 + 세법</div>
                            <div><span>회계학 이윤호, 세법 박창한</span></div>
                            <div><strong class="NSK-Black">29</strong>만원</div>
                            <ul>
                                <li><span>* 7월 한정 이벤트 5만원 추가할인 적용</span></li>
                                <li><span>2023년 6월</span>까지 배수 제한 없는 <span>무제한 수강</span></li>
                                <li>PC or 모바일 총 2대 지원</li>
                                <li>2023 대비 회계학/세법 전 과정</li>
                            </ul>
                        </label>
                    </div>
                </div>

                <div class="check">
                    <label>
                        <input name="ischk"  type="checkbox" value="Y" />
                        페이지 하단 이용안내를 모두 확인하였고, 이에 동의합니다.
                    </label>
                    <a href="#careful">이용안내확인하기 ↓</a>
                </div>

                <div class="passbuy">
                    <a href="javascript:void(0);" onclick="javascript:go_PassLecture(); return false;">지금 바로 신청하기 ></a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_info" id="careful" data-aos="fade-up">
            <div class="guide_box">
                <h2 class="NSK-Black">이용안내 및 유의사항</h2>
                <dl>
                    <dt>상품구성</dt>
                    <dd>
                        <ul>
                            <li>제공과정<br>
                            - 2023 회계학 이윤호 T-PASS : 2022 대비 전 과정 및 2023년 6월까지 신규 진행되는 이윤호 회계학 전 과정<br>
                            - 2023 세법 박창한 T-PASS : 2022 대비 전 과정 및 2023년 6월까지 신규 진행되는 박창한 세법 전 과정</li>
                            <li>본 상품의 수강기간은 상품 수강신청 상세안내 화면에 표기된 기간만큼 제공됩니다.</li>
                            <li>개강일정 및 교수님 사정에 따라 커리큘럼 및 강의 일정의 변동이 있을 수 있습니다.</li>
                            <li>본 상품은 결제가 완료되는 즉시 수강이 시작됩니다.</li>
                        </ul>
                    </dd>

                    <dt>기기제한</dt>
                    <dd>
                        <ul>
                            <li>본 상품 수강 시 이용 가능한 기기는 다음과 같이 제한됩니다.<br>
                            - PC 2대 or 모바일 2대 of PC 1대 + 모바일 1대(총 2대)</li>
                            <li>PC/모바일 기기변경 등 단말기 초기화가 필요한 경우, 최조 1회에 한해 [내강의실] > [등록기기정보]에서 직접 초기화 가능하며,
                            그 외 특별한 사유에 의한 단말기 초기화의 경우, 고객센터 1544-5006 or 1:1 상단게시판으로 문의바랍니다.</li>
                        </ul>
                    </dd>

                    <dt>수강안내</dt>
                    <dd>
                        <ul>
                            <li>먼저 [내강의실] 메뉴에 무한 PASS존으로 접속합니다.</li> 
                            <li>구매하신 상품명 옆의 [강좌추가] 버튼을 클릭, 원하는 강좌를 선택 등록 후 수강할 수 있습니다.</li> 
                            <li>본 상품은 일시정지/수강연장/재수강이 불가한 상품입니다.</li> 
                            <li>본 T-PASS는 교재를 별도로 구매하셔야 하며, 각 강좌별 교재는 강좌소개 및 [교재구매] 메뉴에서 구입 가능합니다.</li> 
                            <li>윌비스 LIVE모드는 학원실강에서 진행되는 콘텐츠로, 본 상품에는 LIVE모드 별도 제공되지 않습니다.</li>                       
                        </ul>
                    </dd>  

                    <dt>결제/환불</dt>
                    <dd>
                        <ul>
                            <li>결제 후 7일 이내 전액 환불 가능합니다. 단, 맛보기 강의를 제외하고 2강 이하 수강 시에만 전액 환불이 가능합니다.</li>
                            <li>강의자료 및 모바일 강의 다운로드 서비스를 이용 시 수강한 것으로 간주 됩니다.</li>
                            <li>본 상품은 특별 기획 강좌로 환불 시에는 할인 되기 전 정가를 기준으로 사용일 수 만큼 차감되고 환불 됩니다.<br>
                            - 결제금액 : (강좌 정상가의 1일 이용대금 X 이용일수)</li>
                            <li>아이디 공유 적발 시 회원 자격 박탈 및 환불이 불가하오니 유의 바랍니다.</li>
                        </ul>
                    </dd>          
                </dl>
               
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    $(document).ready(function(){
        AOS.init();
    });
    </script>

    <script>  


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


        var tab1_url = "https://www.youtube.com/embed/NaSxbG7yHso?rel=0&modestbranding=1&showinfo=0";
        var tab2_url = "https://www.youtube.com/embed/Njd5xI-_PNI?rel=0&modestbranding=1&showinfo=0";

        $(function() {
            $(".youtubeBox").hide(); 
            $(".youtubeBox:first").show();
            $(".youtubetab a").click(function(){ 
                var activeTab = $(this).attr("href"); 
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' frameborder='0' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' frameborder='0' allowfullscreen></iframe>";
                }
                $(".youtubetab a").removeClass("active"); 
                $(this).addClass("active"); 
                $(".youtubeBox").hide(); 
                $(".youtubeBox").html(''); 
                $(activeTab).html(html_str);
                $(activeTab).fadeIn(); 
                return false; 
            });
        });	

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop