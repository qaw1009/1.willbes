@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
            line-height:1.3;
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000} */

        /************************************************************/


        .sky {position:fixed;top:200px;right:10px;z-index:100;}
        .sky a {display:block; margin-bottom:10px}
        
        .evt00 {background:#0a0a0a}

        .evtTop {background:url("https://static.willbes.net/public/images/promotion/2022/04/2634_top_bg.jpg") no-repeat center top;} 

        .event {background:#fe8c05}

        .evtPass {background:#f5f5f7; padding:140px 0}
        .evtPass .title01 {font-size:30px; color:#000; margin-bottom:100px}
        .evtPass .wrap {width:1120px; margin:0 auto}
        .evtPass .passLecBuy {display:flex; justify-content:space-around; position:absolute; bottom:90px; width:100%; color:#252525}
        .evtPass .passLecBuy div {width:50%; line-height:30px; font-size:22px; font-weight:bold; text-align:left; padding-left:30px} 
        .evtPass .passLecBuy p {font-size:18px; margin-bottom:20px; text-align:center; margin-left:-30px}
        .evtPass .passLecBuy p span,
        .evtPass .title02 span {color:#ffda39; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
        @@keyframes upDown{
            from{color:#d53a44}
            50%{color:#f44631}
            to{color:#d53a44}
        }
        @@-webkit-keyframes upDown{
            from{color:#d53a44}
            50%{color:#f44631}
            to{color:#d53a44}
        }
        .evtPass input[type="radio"] {height:22px; width:22px; vertical-align:middle}
        .evtPass input[type="checkbox"] {height:20px; width:20px; vertical-align:middle}
        .evtPass input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}

        .evtPass .totalPrice {width:860px; margin:90px auto 0;}
        .evtPass .totalPrice a {display:block; background:#000; font-size:44px; color:#fff; padding:20px; background:#000; border-radius:5px; box-shadow:10px rgba(0,0,0,.5);}
        .evtPass .totalPrice a:hover {background:#533fd1}

        .evtPass .check {width:800px; margin:0 auto; padding:20px; font-size:16px; color:#000; letter-spacing:-1px;}
        .evtPass .check a {display:inline-block; padding:10px; color:#fff; background:#000; margin-left:40px; border-radius:20px; font-size:12px}
        .evtPass .check p {font-size:14px; padding:10px 0 0 20px; line-height:1.4}
        .evtPass .check input:checked + label {border-bottom:1px dashed #533fd1; color:#533fd1}

        .evtPass .title02 {font-size:28px; color:#000; margin:90px auto 30px}
        .evtPass .title02 div {font-size:46px}

        .evtReview {background:#f2f2f2; padding:180px 0 0;}
        .evtReview .title01 {font-size:51px; color:#b6b6b6; margin-bottom:100px}
        .evtReview .title01 strong {color:#000}
        .reviewWrap .reviewList {position: relative; height:550px }
        .reviewWrap .reviewList div {width:510px; height:360px; background:#fff; padding:50px 0; border-radius:8px; font-size:20px; line-height:1.4; color:#585858; letter-spacing:-1px; box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.1);/* position: absolute; z-index:10;*/}
        .reviewList p {color:#000; margin-top:40px; font-weight:bold; position:absolute; top:250px; width:100%;}

        .evt02 {background:#f6f6f6; padding-bottom:170px}

        /*탭(텍스트)*/
        .tabContaier {width:990px; margin:0 auto; height:520px; background:#fff; border-radius:10px; box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.1); 
            display:flex; flex-direction: row-reverse; justify-content: space-between; text-align:left; letter-spacing:-1px; padding:36px 60px; position: relative;}
        .tabContaier ul{width:196px;} 
        .tabContaier li {margin-bottom:4px}      
        .tabContaier li a img.off{display:block;}
        .tabContaier li a img.on{display:none;}
        .tabContaier li a:hover img.off,
        .tabContaier li a.active img.off {display:none;}
        .tabContaier li a:hover img.on,
        .tabContaier li a.active img.on {display:block;}

        .tabContaier .tabContents div {font-size:28px; color:#000; font-weight:bold; margin-top:20px; position: relative;}
        .tabContaier .tabContents div > a {color:#cf9c5d; font-size:16px; background:url("https://static.willbes.net/public/images/promotion/2022/04/2634_icon01.png") no-repeat right center; padding-right:25px}
        .tabContaier .tabContents div span {position: absolute; bottom:0px; right:0}
        .tabContaier .tabContents div span a {font-size:16px; font-weight:bold; color:#fff; background:#000; border-radius:30px; padding: 5px 15px}
        .tabContaier .tabContents div span a:hover {background:#cf9c5d}

        /*유튜브*/
        .youtube {width:640px; height:360px; background:#000; margin-top:0 !important}
        .youtube iframe {width:640px; height:360px}

        .evt04 {background:#f6f9fe}
        .evt05 {background:#162d3b; position: relative;}

        .passgo {position:absolute; width:500px; height:80px; line-height:80px; bottom:-35px; left:50%; margin-left:-250px; z-index: 10;}
        .passgo a {display:block; border-radius:50px; color:#fff; background:#000; font-size:40px}
        .passgo a:hover {box-shadow: 10px 10px 20px 1px rgba(0,0,0,0.2); color:#fff455}

        /* 이용안내 */
        .content_guide_wrap{background:#f3f3f3; padding:100px 0; font-size:14px}
        .content_guide_wrap .wrap {width:1120px; margin:0 auto; position:relative}
        .content_guide_wrap .guide_tit{margin-bottom:50px; text-align:left; font-size:30px;}

        .content_guide_wrap .tabs {width:1120px; margin:0 auto; display:flex; justify-content: space-around;} 
        .content_guide_wrap .tabs li {width:33.33333%;}
        .content_guide_wrap .tabs li a {display:block; text-align:center; height:60px; line-height:60px; font-size:140% !important; border:2px solid #f3f3f3; border-bottom:2px solid #202020;}
        .content_guide_wrap .tabs li a:hover,
        .content_guide_wrap .tabs li a.active {border:2px solid #202020; border-bottom:2px solid #fff; color:#202020; background:#fff; font-weight:600}
        .content_guide_box {width:1120px; margin:0 auto; border:2px solid #202020; border-top:0; padding-top:30px; background:#fff;}
        .content_guide_box dl{margin:0 20px; word-break:keep-all; padding:30px}
        .content_guide_box dt{margin-bottom:10px}
        .content_guide_box dt h3{color:#fff; background:#333; display:inline-block; padding:3px 7px; margin-right:10px; font-size:120%}
        .content_guide_box dt img.btn{padding:2px 0 0 0}
        .content_guide_box dd{color:#777; margin:0 0 20px 5px; line-height:17px}
        .content_guide_box dd strong {color:#555}
        .content_guide_box dd li{margin-bottom:5px; list-style:decimal; margin-left:20px; line-height:1.5}
        .content_guide_box dd:after {content:""; display:block; clear:both}

        /*타이머*/
        .newTopDday {background:#181818; width:100%; padding:20px 0 25px; color:#fff; font-size:16px;}
        .newTopDday ul {width:1120px; margin:0 auto; display:flex; justify-content: center; align-items:center;}
        .newTopDday ul li {margin-right:5px; text-align:center; height:60px;}
        .newTopDday ul li strong {line-height:60px; font-weight:normal !important}
        .newTopDday ul li img {width:44px}
        .newTopDday ul li:first-child {text-align:right; padding-right:20px; font-size:23px;}
        .newTopDday ul li:first-child span {font-size:16px;}
        .newTopDday ul li.endday {text-align:left; padding-left:20px;}
        .newTopDday ul li.endday a {display:block; font-size:23px; margin-top:5px}
        .newTopDday ul li.endday a:hover {color:#ffaf00}
        .newTopDday ul li.endday span {display:block; font-size:16px;}
        .newTopDday ul:after {content:""; display:block; clear:both}
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#pass">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_sky01.png" alt="0원 패스">
            </a>  
            <a href="#transfer">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_sky02.png" alt="최대 30%">
            </a>  
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2602" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_sky03.png" alt="23년 패스">
            </a>  
        </div>

        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/wb_police.jpg" alt="경찰학원부분 1위"/>
        </div>

        <!-- 타이머 -->
        <div id="newTopDday" class="newTopDday">
            <div id="ddaytime" data-aos="fade-left">
                <ul>
                    <li>
                        <span>윌비스 신광은 경찰 2022~23대비</span>
                        <div class="NSK-Black">0원 PASS {{$arr_promotion_params['turn']}}기</div>
                    </li>
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
                    <li class="endday">                        
                        <span>{{ kw_date('n.j(%)', $arr_promotion_params['edate']) }} {{ $arr_promotion_params['etime'] or '' }} 마감!</span>
                        <a href="#pass" target="_self" class="NSK-Black">수강하기 ></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evtTop" id="main" data-aos="fade-up">           
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_top.jpg" alt="경찰 pass"/>                        
        </div> 
        
        <div class="evtCtnsBox event" data-aos="fade-up">     
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_event01.jpg" alt="32만원 혜택"/>             
        </div> 

        <div class="evtCtnsBox evtPass" id="pass" data-aos="fade-up">     
            <div class="title01 NSK-Black">
                경찰공무원 합격을 위한 최선의 방법!<br>
                신광은 경찰 PASS로 합격률을 높이는 전략을 선택하세요!
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_pass.png" alt="신광은경찰 PASS">
                <div class="passLecBuy NSK-Black"> 
                    <div>         
                        <p>학습지원금 10만 + <span>신규가입 시 7만 더!</span></p>           
                        <input type="radio" id="y_pkg0" name="y_pkg" value="194615"/>                
                        <label for="y_pkg0">23년 합격 PASS 신청하기</label>
                    </div> 
                    <div>   
                        <p>학습지원금 5만 + <span>신규가입 시 7만 더!</span></p>                 
                        <input type="radio" id="y_pkg1" name="y_pkg" value="194614"/>                
                        <label for="y_pkg1">23년 1차 경찰 PASS 신청</label>
                    </div>
                    <div>  
                        <p><span>&nbsp;</span></p>     
                        <input type="radio" id="y_pkg2" name="y_pkg" value="194613"/>                
                        <label for="y_pkg2">22년 2차 경찰 PASS 신청</label>
                    </div> 
                </div>
            </div>

            <div class="check" data-aos="fade-up">
                <input type="checkbox" id="is_chk1" name="is_chk" value="Y"/>
                <label for="is_chk1">페이지 하단 신광은 경찰 PASS 이용안내를 모두 확인하였고, 이에 동의합니다. </label>
                <a href="javascript:goDesc('tab01')">이용안내확인하기 ↓</a>
                <p>
                    ※ 강의공유, 콘텐츠 부정사용 적발 시, 패스의 수강기간 갱신이 불가합니다.<br>
                    ※ 강좌 및 교수진은 학원 사정에 따라 변경될 수 있습니다.<br>
                    ※ 쿠폰은 PASS 결제 후 [내 강의실>결제관리>쿠폰/수강권 관리] 에서 확인 가능합니다.<br>
                    ※ 재수강&환승쿠폰은 기간 갱신 가능 패스에는 적용되지 않습니다.
                </p>
            </div>

            <div class="title02" id="transfer">
                재수강과 환승 하실 수강생은 모두 주목
                <div class="NSK-Black">최대 <span>25만원 할인</span> 받고 구매하세요.</div>
            </div>

            <div class="wrap">
                <a href="https://www.willbes.net/classroom/qna/index" target="_blank" title="재수강 쿠폰받기"><img src="https://static.willbes.net/public/images/promotion/2022/04/2634_coupon01.png"></a>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" title="환승 쿠폰받기"><img src="https://static.willbes.net/public/images/promotion/2022/04/2634_coupon02.png"></a>
            </div>

            <div class="totalPrice NSK-Black" data-aos="fade-up">
                <a href="javascript:void(0);" onclick="termsCheck('is_chk1', 'pass');">패스상품 신청하기 ></a>
            </div>  
        </div>
        
        <div class="evtCtnsBox evtReview">
            <div class="title01 NSK-Black">
                윌비스 신광은 경찰팀<br>
                합격생들이 <strong>증명하는 생생한 후기</strong>
            </div>
            <div class="reviewWrap">
                <div class="reviewSlide">
                    <div class="reviewList">
                        <div>
                            수험생들이 자꾸 틀리는 부분을<br>
                            정확하게 짚고 넘어가지 않아 실수하고 하는데<br>
                            이 부분을 확실하게 깨닫게 해주고 정리하는<br>
                            문제풀이 2,3단계를 추천합니다.<br>
                            가장 좋은 프로그램이라고 생각합니다.
                            <p>서울청 김영*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            대부분 추천하실거라고 생각하지만<br>
                            역시 2단계 동형이 가장 좋지 않을까 생각합니다.<br>
                            동일한 구성과 주어진 시간 안에 문제를 푼다는 것은<br>
                            생각보다 어렵습니다.<br>
                            하지만 이 훈련을 통해 실제 시험 감각을 기를 수 있고,<br>
                            그 덕에 긴장감도 많이 줄었습니다.<br>
                            <p>101 박진*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            시험 직전 마지막 개념정리가 가능한<br>
                            문제풀이 2,3단계를 추천합니다.<br>
                            공부가 집중이 안되고 불안할 때,<br>
                            교수님들이 직접 출제하시는 문제를 통해<br>
                            개념과 이론을 다시 한번 제것으로 만들 수 있는<br>
                            기회였습니다.
                            <p>서울청 이철*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            신광은경찰팀의 커리큘럼은 단연 최고라고 생각합니다.<br>
                            기본부터 시작되어 3단계까지 이어진 커리큘럼은<br>
                            체계적으로 잘 이루어져 있으며,<br>
                            잘 짜여진 이 커리큘럼만 따라가도<br>
                            다음 시험을 대비하는 데에 전혀 문제가 없을 것입니다.
                            <p>경기북부 김슬*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            꼭 추천하고 싶은 단계는<br>
                            문제풀이 2단계를 추천합니다.<br>
                            시간을 정확하게 재주고, 끝나고 이어지는 해설 강의까지<br>
                            시간 관리가 완벽하게 됩니다.<br>
                            또한 윌비스처럼 엄청난 문제와<br>
                            정말 좋은 질의 문제는 또 없다고 생각합니다.
                            <p>광주청 한규*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            문제풀이 1,2,3단계가<br>
                            가장 좋은 프로그램 이라고 생각합니다.<br>
                            문풀 후 첫 시험에서 형법 40점에서<br>
                            95점이라는 점수를 받았습니다.<br>
                            그 이후 문풀 학습 덕분에 4번이나<br>
                            필합의 기회를 얻을 수 있었다고 생각합니다.<br>
                            <p>서울청 김소*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            실제 시험지처럼 프린트 된 문제와,<br>
                            준비된 OMR카드까지 접하는 2단계를 추천합니다.<br>
                            기출문제집으로 기출을 다시 보기엔<br>
                            시간이 많이 걸리기 때문에,<br>
                            2단계에서는 많은 기출을 겹치지 않고<br>
                            접할 수 있어서 좋았습니다.
                            <p>인천청 전보*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            신광은 경찰팀의 대표적인 프로그램인<br>
                            문제풀이 1,2,3단계는 너무 완벽한 커리큘럼입니다.<br>
                            1단계 요약정리부터 경찰 기출문제 풀이까지,<br>
                            그리고 2단계는 그냥 완벽한 프로그램이여서<br>
                            너무 좋았습니다.
                            <p>경기남부 이상*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            빈틈 없이 짜져 있는 스케줄 같은 커리큘럼은<br>
                            정말 장점이라고 생각합니다.<br>
                            기본, 심화 등으로 기초를 쌓고, 1단계를 시작하며<br>
                            공부하는 환경이 만들어져 좋았습니다.<br>
                            1단계, 2단계, 그리고 3단계까지 꾸준히 하다 보면<br>
                            합격은 반드시 가까워온다고 생각합니다.
                            <p>경기남부 전현*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            문제풀이 2단계가 가장 유명하고, <br>
                            저 또한 추천하고 싶은 강의입니다.<br>
                            문제를 풀이하고, 해석을 시험지에 적으면<br>
                            나중에 이것만 봐도 정리가 됩니다.<br>
                            2단계를 시간 날때마다 회독한다면<br>
                            고득점이 충분히 가능 할 것 같습니다.
                            <p>제주청 김종*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            문제풀이 1,2단계를 추천합니다. <br>
                            특히 핵심요약강의로 유용하게 시험 준비를 할 수 있었습니다.<br>
                            공부하기 싫을때나 밥먹을때, 자투리시간을 사용해<br>
                            요약강의를 반복하여 들으면<br>
                            시험에 나올 중요한 내용 위주 강의라<br>
                            합격하는데 충분한 점수를 받을 수 있었습니다.
                            <p>부산청 정재*</p>
                        </div>
                    </div>
                    <div class="reviewList">
                        <div>
                            기본적인 커리큘럼 자체가 모두 중요하고<br>
                            추천할 만 하다고 생각을 합니다.<br>
                            모두 다 중요하지만 가장 추천하고 싶은 건<br>
                            문제풀이 2단계입니다.<br>
                            실전 같이 문제를 풀며 시간 배분도 가능하고,<br>
                            전 범위인만큼 본인의 취약한 부분을 알 수 있습니다.
                            <p>서울청 박종*</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
        <div class="evtCtnsBox evt01" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_01.jpg" alt="합격할수 없는 이유"/>            
        </div>        

        <div class="evtCtnsBox evt02" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02.jpg" alt="전문교수진" />     
            <div class="tabContaier" id="apply">    
                <ul>    
                    <li>
                        <a href="#tab1" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t01.jpg" alt="형사법 신광은" class="off" >
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t01_on.jpg" alt="" class="on" >
                        </a>
                    </li>                            
                    <li>
                        <a href="#tab2">
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t02.jpg" alt="경찰학 장정훈" class="off" >
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t02_on.jpg" alt="" class="on" >
                        </a>
                    </li>
                    <li>
                        <a href="#tab3">
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t03.jpg" alt="헌법 김원욱" class="off" >
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t03_on.jpg" alt="" class="on" >
                        </a>
                    </li>                            
                    <li>
                        <a href="#tab4">
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t04.jpg" alt="헌법 이국령" class="off" >
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t04_on.jpg" alt="" class="on" >
                        </a>
                    </li>    
                    <li>
                        <a href="#tab5">
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t05.jpg" alt="범죄학 박상민" class="off" >
                            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_02_t05_on.jpg" alt="" class="on" >
                        </a>
                    </li>             
                </ul>
                <div id="tab1" class="tabContents">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <p class="NSK-Black">형사법 공부방법 & 커리큘럼</p>
                        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51160?subject_idx=2127&subject_name=%ED%98%95%EC%82%AC%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">형사법 신광은</a>
                        <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2593" target="_blank">22년 1차 시험 완벽 적중 보기 ></a></span>
                    </div>                        
                </div>
                <div id="tab2" class="tabContents">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <p class="NSK-Black">경찰학 공부방법 & 커리큘럼</p>
                        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51161?subject_idx=2128&subject_name=%EA%B2%BD%EC%B0%B0%ED%95%99%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">경찰학 장정훈</a>
                        <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2592" target="_blank">22년 1차 시험 완벽 적중 보기 ></a></span>
                    </div>                        
                </div> 
                <div id="tab3" class="tabContents">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/UB91DCctYgU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <p class="NSK-Black">헌법 김원욱 기본이론 오리엔테이션</p>
                        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51146?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">헌법 김원욱</a>
                        <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2594" target="_blank">22년 1차 시험 완벽 적중 보기 ></a></span>
                    </div>                               
                </div> 
                <div id="tab4" class="tabContents">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/_-XbBFVxK2Y?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <p class="NSK-Black">NEW 헌법 전문가 경찰 헌법 이국령 교수</p>
                        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51259?subject_idx=1049&subject_name=%ED%97%8C%EB%B2%95%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">헌법 이국령</a>
                        <span><a href="https://police.willbes.net/promotion/index/cate/3001/code/2583" target="_blank">22년 1차 시험 완벽 적중 보기 ></a></span>
                    </div>                                
                </div> 
                <div id="tab5" class="tabContents">
                    <div class="youtube">
                        <iframe src="https://www.youtube.com/embed/8T1HxQ5PPhQ?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div>
                        <p class="NSK-Black">[범죄학OT] 범죄학의 혁명! 박상민으로 끝!</p>
                        <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/51278?subject_idx=2178&subject_name=%EB%B2%94%EC%A3%84%ED%95%99%2822%EB%85%84%EB%8C%80%EB%B9%84%29" target="_blank">범죄학 박상민</a>
                    </div>                          
                </div>                                
            </div>    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_03.jpg"  alt="커리큘럼" />              
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">        
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_04.jpg" alt="지텔프, 한능검 특강" />  
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up">
            <form id="add_apply_form" name="add_apply_form">
                {!! csrf_field() !!}
                {!! method_field('POST') !!}
                <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
                <input type="hidden" name="register_type" value="promotion"/>
                <div class="wrap">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2634_05.jpg"  alt="스폐셜혜택" />
                    <a href="javascript:void(0);" title="교재 신청하기" onclick="fn_promotion_etc_submit();" style="position: absolute; left: 18.39%; top: 41.89%; width: 16.07%; height: 3.11%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180566" target="_blank" title="장정훈 경찰학" style="position: absolute;left: 50.98%; top: 39.68%; width: 14.29%; height: 2.58%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180748" target="_blank" title="신광은 형법" style="position: absolute;left: 65.45%; top: 39.68%; width: 14.29%; height: 2.58%; z-index: 2;"></a>
                    <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/180567" target="_blank" title="김원욱 헌법" style="position: absolute;left: 44.02%; top: 42.32%; width: 14.29%; height: 2.58%; z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="이국령 헌법" style="position: absolute; left: 58.21%; top: 42.32%; width: 14.29%; height: 2.58%; z-index: 2;"></a>
                    <a href="javascript:alert('Coming Soon!')" title="박상민 범죄학" style="position: absolute; left: 72.59%; top: 42.32%; width: 14.29%; height: 2.58%; z-index: 2;"></a>
                </div>
            </form>   
            <div class="passgo NSK-Black"><a href="#pass">0원 PASS 신청 ↑</a></div> 
        </div>


        <div class="content_guide_wrap" id="tab">
            <div class="wrap">
                <p class="guide_tit">윌비스 <span class="NSK-Black tx-blue">신광은 경찰 PASS </span> 이용안내 </p>
                <ul class="tabs">
                    <li><a href="#tab01" class="active">23년 합격 PASS</a></li>
                    <li><a href="#tab02">23년 1차 경찰 PASS</a></li>
                    <li><a href="#tab03">22년 2차 경찰 PASS</a></li>
                </ul>

                <div class="content_guide_box" id="tab01">
                    <dl>
                        <dt>
                            <h3>2023 합격 PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 23년 1차 필기시험일까지 수강 가능하며, 불합격 시 23년 2차 시험일까지 수강기간 연장되는 상품입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                    - 2022년 대비 형사법, 경찰학, 헌법, 범죄학 전 강좌<br>
                                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>                                
                                    <div class="tx-blue">
                                        *형사소송법/형사법 : 신광은 교수님<br>
                                        *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                        *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                        *헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                        *범죄학 : 박상민 교수님<br>
                                        *G-TELP : 김준기 교수님<br>
                                        *한능검 : 오태진 교수님<br>
                                        *실용글쓰기 : 박우찬 교수님<br>
                                    </div>
                                </li>
                                <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                                <li>최종합격 인증 후 환급 시 보유한 PASS 수강기간은 종료됩니다. (수강기간 갱신 불가)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                                <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전 일괄지급)</li>
                                <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>최종합격시 환급안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                    ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                                <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                    ※ 환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                                <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.(22년 2차 또는 23년 1차 최종합격)</li>
                                <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                                (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야 합니다.)</li>
                                <li>패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                                (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                                <li>환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                                ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑦ 윌비스 신광은 경찰 합격예측서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                                * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                                (* 학원 모의고사에 따라 진행)</li>
                                <li>최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.</li>
                                <li>자세한 환급신청 방법은 공지사항에서 확인 바랍니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>수강기간 연장 안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>2023 합격 PASS는 갱신형 상품입니다. 시험 응시 후 불합격 인증하여야 수강기간이 갱신되며, 23년 2차 필기시험일까지 무료 연장됩니다.</li>
                                <li>수강기간 갱신이 필요한 경우 갱신 신청 기간 내에 직전 시험 불합격 증빙(응시표, 성적표)자료를 제출하셔야 합니다.</li>
                                <li>불합격 인증 시에 전과목 0점일 경우 수강기간 갱신은 불가능합니다.</li>
                                <li>시험 접수 후 시험에 응시하지 못한 경우 수강기간 갱신 불가합니다.</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                                <li>상품에 등록된 과목 이외의 다른 강의는 추가 제공되지 않습니다.</li>
                                <li>구매일로부터 23년 1차 필기시험일까지 유료 수강 가능하며, 갱신 신청한 수강생에 한하여 23년 2차 필기시험일까지 무료 연장됩니다.</li>
                                <li>갱신되어 제공되는 기간의 강의는 무료 서비스이며, 환불 대상이 아닙니다.</li>
                                <li>자세한 수강기간 갱신 방법은 공지사항에서 확인 바랍니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>

                <div class="content_guide_box" id="tab02">
                    <dl>
                        <dt>
                            <h3>23년 1차 경찰 PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 23년 1차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                    - 2022년 대비 형사법, 경찰학, 헌법, 범죄학 전 강좌<br>
                                    - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>                                
                                    <div class="tx-blue">
                                        *형사소송법/형사법 : 신광은 교수님<br>
                                        *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                        *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                        *헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                        *범죄학 : 박상민 교수님<br>
                                        *G-TELP : 김준기 교수님<br>
                                        *한능검 : 오태진 교수님<br>
                                        *실용글쓰기 : 박우찬 교수님
                                    </div>
                                </li>
                                <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                                <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전 일괄지급)</li>
                                <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>최종합격시 환급안내</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>환급 시 상품 결제 금액에서 지급된 혜택만큼 차감 후 환급됩니다. (제세공과금 22% 제외)<br>
                                    ※ 지급된 혜택(포인트 등)을 사용하지 않았어도 지급된 만큼 차감 후 환급금 책정</li>
                                <li>수강기간 내에 진행된 순경 공채 시험 최종합격 및 인증자료를 제출하여야 환급금 지급 대상이 됩니다.<br>
                                    ※ 환급 가능 직렬 : 일반공채, 101경비단, 전의경 경채, 경찰행정 경채</li>
                                <li>환급 신청은 합격한 시험의 최종합격자 발표일로부터 1개월 이내에만 가능합니다.(22년 2차 또는 23년 1차 최종합격)</li>
                                <li>패스 수강 기간 내에 합격예측 서비스 1회 이상 참여 해주셔야합니다.<br>
                                (해당 서비스는 시즌성 이벤트로 일정 기간이 지나면 확인 불가하니, 참여 후 캡쳐해서 추후 증빙자료로 제출하셔야 합니다.)</li>
                                <li>패스 수강기간 내에 모든 전국 모의고사 및 빅매치 모의고사를 모두 응시하여야 합니다.<br>
                                (온/오프 무관하며, 추후 응시내역 파일첨부 제출해 주셔야 합니다.)</li>
                                <li>환급 신청 기간 내에 최종 합격 인증 자료 및 신청 서류 제출이 완료된 회원에게 환급 가능합니다.<br>
                                - 제출 서류 (모든 제출 서류는 반드시 윌비스 신광은 경찰 아이디 수강생 본인 명의이여야 합니다.)<br>
                                ① 응시표 사본 : 응시번호 기재 필수, 응시원서/응시접수증/응시표출력 전체화면 등 대체 가능<br>
                                ② 최종 합격증명서 : 최종 합격 확인 증명 가능한 관련 사이트 전체 화면 캡쳐본 등 대체 가능<br>
                                ③ 신분증 사본 : 제세공과금 세무 증빙을 위해 주민등록번호 앞/뒷자리 전체가 보여야 함<br>
                                ④ 통장사본 : 수강료 환급 받을 수강생 본인 명의 통장<br>
                                ⑤ 합격수기 : 공지 글 내 첨부된 파일을 다운 후 양식에 맞추어 작성 후 첨부 (한글 또는 워드 파일)<br>
                                ⑥ 개인정보 수집 및 활용 동의서 : 공지 글 내 첨부된 파일을 프린트하여 자필 서명 후 사진 또는 스캔하여 이미지 첨부<br>
                                ⑦ 윌비스 신광은 경찰 합격예측서비스 & 모의고사 내역 : 시험 후 오픈되는 합격예측서비스 참여 인증 캡쳐 및 윌비스신광은경찰 모의고사 전체 응시 내역<br>
                                * 전국모의고사 및 빅매치 모의고사 중 온라인 경행경채 직렬이 없다면 온라인 일반경찰로 응시를 꼭 하시기 바랍니다.<br>
                                (* 학원 모의고사에 따라 진행)<br></li>
                                <li>최종합격자 발표일로부터 1개월경과 후 요청 시에는 환급이 불가합니다.</li>
                                <li>자세한 환급신청 방법은 공지사항에서 확인 바랍니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>

                <div class="content_guide_box" id="tab03">
                    <dl>
                        <dt>
                            <h3>22년 2차 경찰 PASS</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 구매일로부터 22년 2차 필기시험일까지 수강 가능한 기간제 PASS입니다.</li>
                                <li>본 상품 강좌 구성은 다음과 같습니다.<br>
                                - 2022년 대비 형사법, 경찰학, 헌법, 범죄학 전 강좌<br>
                                - 2021년 대비 형사소송법, 경찰학개론, 형법 전 강좌<br>                            
                                    <div class="tx-blue">
                                        *형사소송법/형사법 : 신광은 교수님<br>
                                        *경찰학개론/경찰학(개편) : 장정훈 교수님<br>
                                        *형법 : 김원욱 교수님 / 신광은 교수님<br>
                                        *헌법 : 김원욱 교수님 / 이국령 교수님<br>
                                        *범죄학 : 박상민 교수님<br>
                                        *G-TELP : 김준기 교수님<br>
                                        *한능검 : 오태진 교수님<br>
                                        *실용글쓰기 : 박우찬 교수님
                                    </div>
                                </li>
                                <li>선택한 신광은 경찰 PASS 상품의 표기된 기간 동안 동영상 강좌를 무제한 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS 강좌는 결제 완료되는 즉시 수강이 시작됩니다. (결제완료자에 한함)</li>
                                <li>강좌 및 교수는 학원 사정에 따라 변동될 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>교재 및 포인트</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>신광은 경찰 PASS 수강에 필요한 교재는 별도로 구매하셔야 하며, 각 강좌 별 교재는 강좌 소개 및 교재 구매 메뉴에서 별도 구매 가능합니다.</li>
                                <li>중도 환불 시 제공받은 입문서는 판매가 기준으로 차감 후 환불됩니다.</li>
                                <li>포인트가 포함된 상품을 구매할 경우 익일 오전 일괄 지급됩니다. (금요일~일요일 구매 시 월요일 오전 일괄지급)</li>
                                <li>포인트는 구매일로부터 1년 동안 사용 가능하며, 1년이 지날 경우 자동 소멸됩니다.</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>환불</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>결제 후 7일 이내 3강 이하 수강시에만 전액 환불 가능합니다.</li>
                                <li>결제 후 7일 이내 환불 요청 시 수강한 각 강의 정가 기준으로 수강 부분만큼 차감 후 나머지 부분에 대해 환불이 진행됩니다.</li>
                                <li>강좌 내 학습 자료 및 모바일 다운로드 이용 시에는 수강한 것으로 간주됩니다.</li>
                                <li>고객 변심으로 인한 환불은 수강 시작일 (당일 포함)로부터 7일이 경과되면, 신광은 경찰PASS 결제가 기준으로 계산하여 
                                사용일 수 만큼 차감 후 환불됩니다. (단, 가산점 특강, 온라인 모의고사 등 이용 시에도 차감)</li>
                                <li>포인트를 사용하였을 경우 사용한 포인트 만큼 차감 후 환불 진행되며, 남은 포인트는 회수됩니다.<br>
                                (포인트 미사용일 경우 추가 차감 없이 포인트 회수 후 환불 진행)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>PASS 수강</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>로그인 후 [내 강의실]에서 [무한PASS존]으로 접속합니다.</li>
                                <li>구매한 PASS 상품 선택 후 [강좌추가하기]를 클릭, 원하시는 강좌를 등록한 후 수강할 수 있습니다.</li>
                                <li>신광은 경찰 PASS는 일시 정지, 수강 연장, 재수강 불가합니다.</li>
                                <li>신광은 경찰 PASS 수강 시 이용 가능한 기기 대수는 다음과 같이 제한됩니다.<br>
                                총 수강 기기 대수 2대 : PC 2대 또는 PC 1대 모바일 1대 또는 모바일 2대 (신광은 경찰PASS PMP강의는 제공하지 않습니다.)</li>
                                <li>PC, 모바일 기기에 대한 초기화가 필요할 경우 최초 초기화에 한해서는 수강생 본인이 초기화가 가능합니다. 다만 추후 초기화가
                                    필요할 시 내용 확인 후 가능하오니 고객센터로 문의하시기 바랍니다. ([내 강의실] 내 [무한PASS존]에서 등록기기정보 확인)</li>
                                <li>일부 강좌의 경우 자료 출력 횟수 제한이 적용됩니다. (2단계 동형 모의고사, 3단계 파이널 모의고사 등)</li>
                            </ol>
                        </dd>

                        <dt>
                            <h3>유의사항</h3>
                        </dt>
                        <dd>
                            <ol>
                                <li>본 상품은 특별할인기획 상품으로 쿠폰 할인, 다다익선 할인, 포인트 사용 등 혜택이 적용되지 않으니 양해 및 참고 부탁드립니다.<br>
                                    (단,이벤트시 쿠폰사용가능)</li>
                                <li>신광은 경찰PASS 강좌 (부가 서비스 등) 중 불가피한 사정에 의해 부득이 진행되지 않을 경우 대체 강좌로 제공 예정이며, 이로 인한 환불은 불가합니다.</li>
                                <li>아이디 공유, 타인에게 양도 및 판매 등 부정 사용 적발 시 수강 중인 PASS 강좌는 즉시 정지, 회원 자격이 박탈됩니다. <br>
                                이로 인한 강의 환불은 절대 불가하며, 불법 공유 행위 사안에 따라 민형사상 조치가 발생할 수 있습니다.</li>
                                <li>온,오프라인 동시 시행되는 이벤트, 무료특강 등의 경우 해당 강좌는 PASS에 미지급 되거나, 이벤트 종료 후 제공될 수 있습니다.</li>
                                <li>PASS 관련 발급된 쿠폰은 이벤트가 변경되거나 종료될 경우 자동 회수될 수 있으며, 동일 혜택이 적용되지 않을 수 있습니다.</li>
                            </ol>
                        </dd>

                        <dd>
                            <p>※ 이용문의 : 고객센터 1544-5006 / 사이트 내 1:1 상담 게시판</p>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>

        <!-- content_guide_wrap //-->
    </div>
    <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

    <script type="text/javascript">
        var $regi_form = $('#regi_form'); 


         /* 팝업창 */
         function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params["page"]) === false && empty($arr_promotion_params["cert"]) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

       /*쿠폰발급 */
        function giveCheck() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params['give_type']) === false && empty($arr_promotion_params['give_idx']) === false)
                var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&give_idx={{$arr_promotion_params["give_idx"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}';
                ajaxSubmit($regi_form, _check_url, function (ret) {
                    if (ret.ret_cd) {
                        alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                    }
                }, showValidateError, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /*약관동의*/
        function termsCheck(terms_id,ele_id){
            if($("#" + terms_id).is(":checked") === false){
                $("#" + terms_id).focus();
                alert('이용안내에 동의하셔야 합니다.');
                return;
            }
            goCartNDirectPay(ele_id, 'y_pkg', 'on_lecture', 'periodpack_lecture', 'Y');
        }


         /*탭(텍스터버전)*/
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();
            $(".tabContaier ul li a").click(function(){
            var activeTab = $(this).attr("href");
            $(".tabContaier ul li a").removeClass("active");
            $(this).addClass("active");
            $(".tabContents").hide();
            $(activeTab).fadeIn();
            return false;
            });
        });

        /*롤링*/
        $(document).ready(function() {
            var BxBook = $('.reviewSlide').bxSlider({
                slideWidth: 510,
                slideMargin: 40,
                maxSlides:12,
                minSlides:1,
                moveSlides: 1,
                ticker:true,
                speed:100000,
                onSlideAfter: function() {
                    BxBook.stopAuto();
                    BxBook.startAuto();
                }
            });
        });

        /*무료 교재지급*/
        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){
                alert('구매자가 아닙니다.');
                return;
            }

            @if(empty($arr_promotion_params['arr_prod_code']) === false && empty($arr_promotion_params['cart_prod_code']) === false)
                var $add_apply_form = $('#add_apply_form');
                var _url = '{!! front_url('/event/promotionEtcStore') !!}';

                if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
                ajaxSubmit($add_apply_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert( getApplyMsg(ret.ret_msg) );
                        location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    }
                }, function(ret, status, error_view) {
                    alert( getApplyMsg(ret.ret_msg) );
                }, null, false, 'alert');
            @else
                alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
            @endif
        }

        /* 이벤트 추가 신청 메세지*/
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ];

            for (var i = 0; i < arr_apply_msg.length; i++) {
                if(arr_apply_msg[i][0] == ret_msg) {
                    apply_msg = arr_apply_msg[i][1];
                }
            }
            if(apply_msg == '') apply_msg = ret_msg;
            return apply_msg;
        }

        /*tab*/
        $(document).ready(function(){
            $(".tabs li a").click(function(){
                var activeTab = $(this).attr("href");
                $(".tabs li a").removeClass("active");
                $(this).addClass("active");
                $(".content_guide_box").hide();
                $(activeTab).fadeIn();
                return false;
            });

            var url = window.location.href;
            if(url.indexOf("tab3") > -1){
                var activeTab = "#tab3";
                $(".tabsl li a").removeClass("active");
                $(".tabs li a[href='#tab03']").addClass("active");
                $(".tabContents").hide();
                $(activeTab).show();
                return false;
            }else{
                $(".tabs li a").removeClass("active");
                $(".tabs li a[href='#tab01']").addClass("active");
                $(".content_guide_box").hide();
                $(".content_guide_box:first").show();
            }
        });

        function goDesc(tab){
            location.href = '#tab';
            var activeTab = "#"+tab;
            $(".tabs li a").removeClass("active");
            $(".tabs li a[href='#"+tab+"']").addClass("active");
            $(".content_guide_box").hide();
            $(activeTab).show();
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });   
    </script>

    
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop