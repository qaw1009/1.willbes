<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

    <title>모바일 윌비스 통합 사이트</title>

    <!-- CSS -->    
    <!-- bootstrap-datepicker -->
    <link rel="stylesheet" href="/public/vendor/bootstrap/datepicker/css/bootstrap-datepicker.standalone.min.css">
    <!-- Custom Theme Style -->
    <link href="/public/css/willbes/basic.css" rel="stylesheet">
    <link href="/public/css/willbes/m/style_v3.css" rel="stylesheet">
    
    <!-- Slider jQuery -->
    <link rel="stylesheet" href="/public/vendor/jquery/swiper/swiper.css">
    <link rel="stylesheet" href="/public/vendor/jquery/swiper/swiper.min.css">
    <script src="/public/vendor/jquery/swiper/swiper.js"></script>
    <script src="/public/vendor/jquery/swiper/swiper.min.js"></script>
    <!-- JAVASCRIPT -->
    <!--// CSS -->
    <!-- jQuery -->
    <script src="/public/vendor/jquery/v.2.2.3/jquery.min.js"></script>
    <script src="/public/vendor/jquery/form/jquery.form.js"></script>
    <!--// JAVASCRIPT -->
    <!-- Custom Script -->
    <script src="/public/js/willbes/mobile.js?ver=1594952526"></script>  
    <style>


        .cop img {max-width:100%}
        
        .fixed {position:fixed; top:0; left:0; width:100%; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}

        .subMenuWrap {background-color: #f6f6f6; padding:15px 10px; font-size: 14px; max-width:720px; margin:0 auto}
        .subMenuWrap a {display: inline-block; margin-right:20px}
        .subMenuWrap a:last-child {margin:0}

        .groupLink {background:#3f84c2; padding:12px 0; display:flex; justify-content: space-between;}
        .groupLink a {display:block; width:25%; text-align:center; color:#fff; font-size:2vh; border-right:1px solid #3678b9; border-left:1px solid #66a4d4}
        .groupLink a img {width:10%; max-width:13px; display:inline-block; vertical-align:top; margin-left:3px}
        .groupLink a:nth-child(1) {border-left:0}
        .groupLink a:last-child {border-right::0}


        .conTitle {text-align:left; font-size:2.5vh; margin:10% 20px 2%}
        .conTitle img.moreBtn {width:28px; vertical-align:top; display:inline-block; margin-left:10px}

        .cop .mainColor {color:#3f84c2}

        .cop .swiper-sec {
            position: relative;
            overflow: hidden;     
            height: auto; 
            margin:0 20px;
            padding:0 0 20px;
        }
        .cop .swiper-sec .swiper-wrapper {display: flex; justify-content:flex-start;height: auto; }
        .cop .swiper-sec .swiper-slide {align-items: flex-start;}
        .cop .swiper-sec .swiper-slide a {display:block}
        .cop .swiper-horizontal>.swiper-scrollbar {
            position: relative;
            z-index: 50;
            height: 5px;
            width: 100%;
        }        
        .cop .swiper-scrollbar {background: rgba(0,0,0,.1);}
        .cop .swiper-scrollbar-drag {
            height: 100%;
            width: 100%;
            position: relative;
            background: rgba(63,132,194,1);
            border-radius: 10px;
            left: 0;
            top: 0;
        }

        .cop .swiper-sec01 .swiper-slide {
            width:calc((100% - 10px) / 2); max-width:332px; margin-right:8px;
        }
        .cop .swiper-sec02 .swiper-slide {
            width:calc((100% - 10px) / 3); max-width:216px; margin-right:5px;
        }
        .cop .swiper-sec02 .swiper-slide a img {border-radius:5px}
        .cop .swiper-sec .swiper-slide:last-child {margin:0}

        .cop .sec-cast {margin:0 20px;} 
        .cop .castList a {display:flex; justify-content: space-between; margin-bottom:5px; background:#f2f2f2; }
        .cop .castImg {width:calc(42%); max-width:284px}
        .cop .castImg img {width:100%}
        .cop .castInfo {width:calc(58%); padding:12px; line-height:1.4; }
        .cop .castInfo h5 {font-size:1.6vh; font-weight:bold; margin-bottom:8px;
            width:100%;
            overflow:hidden; 
            text-overflow:ellipsis; /*말줄임*/
            display:-webkit-box;/*블록속성*/ 
            -webkit-line-clamp: 2; /* 라인수 */ 
            -webkit-box-orient:vertical;/*박스의 흐름 방향을 지정*/ 
            word-wrap:break-word; /*언어간 줄바꿈*/
        }
        .cop .castInfo p {font-size:1.5vh; width:100%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis;}
        
        .cop .swiper-sec .swiper-slide .bnTitle {margin-top:10px; font-size:1.8vh}

        .cop .sec-tip {width:calc(100% - 40px); margin:0 auto; display:flex; justify-content: space-between;} 
        .cop .sec-tip .tipBox {width:calc(25% - 8px); min-width:78px; max-width:157px; margin-right:8px; padding-bottom:20px} 
        .cop .sec-tip .tipBox img {min-height:70px;} 
        .cop .sec-tip .tipBox:nth-child(1) {width:50%; min-width:166px; max-width:332px;}
        .cop .sec-tip .swiper-sec03 {position:relative; overflow: hidden; margin:0}
        .cop .sec-tip .swiper-sec03 .swiper-pagination {
            top:90%;
            float:none;
            text-align:center;
            z-index: 100;
        }
        .cop .swiper-pagination .swiper-pagination-bullet {
            background:#e1e1e1 !important;
            opacity: 1;
        }
        .cop .swiper-pagination .swiper-pagination-bullet-active {
            background:#3f84c2 !important;
        }


        .noticeBoard {background:#f8f8f8; padding:10px 20px; line-height:1.4; font-size:14px}
        .noticeBoard a {display:block; width:100%; overflow:hidden; white-space:nowrap; text-overflow:ellipsis; border-bottom:1px solid #dadada; padding:14px 0}
        .noticeBoard a span {font-size:12px; background:#4d79f6; color:#fff; padding:0 5px; margin-right:5px}
        .noticeBoard li:last-child a {border:0}

        .cop .sec-cast {margin:0 20px;} 

        .cop .swiper-best{display:flex; position: relative; overflow: hidden; padding-bottom:30px; width:calc(100% - 40px); margin:0 auto;}
        .cop .swiper-best .swiper-slide{display: flex; flex-direction: column;}
        .cop .swiper-best .swiper-pagination {
            top:98%;
            float:none;
            text-align:center;
            z-index: 100;
        }
        
        .swiper-container-Book {
            width: calc(100% - 40px);
            margin:0 auto;
            height: 340px;
            overflow: hidden;
            position: relative; 
        }
        .swiper-container-Book .swiper-slide {
            text-align: center;
            font-size: 18px;
            width:160px;
            align-items: stretch;
        }
        .swiper-container-Book .swiper-slide a {
            display: block;
            font-size: 14px;
            margin-right: 5px;
        }
        .swiper-container-Book .swiper-slide .bookimg {
            width: 158px;
            height: 216px;
            margin: 0 auto; /*border:1px solid #d9d9d9;*/
            position: relative;
        }
        .swiper-container-Book .swiper-slide img {
            width: 100%;
            max-width: 158px;
            margin: 0 auto;
        }
        .swiper-container-Book ul {
            margin-top: 10px;
            line-height: 1.4;
        }
        .swiper-container-Book li:nth-child(1) {
            width: 98%;
            overflow: hidden;
            text-overflow:ellipsis; /*말줄임*/
            display:-webkit-box;/*블록속성*/ 
            -webkit-line-clamp: 2; /* 라인수 */ 
            -webkit-box-orient:vertical;/*박스의 흐름 방향을 지정*/ 
            word-wrap:break-word; /*언어간 줄바꿈*/
        }
        .swiper-container-Book li:nth-child(2) {
            color: #737373;
        }

        .swiper-container-Book li:last-child strong {
            font-size: 14px;
            color: #3f84c2;
        }
        .swiper-container-Book li:last-child span {
            color: #000;
            font-weight: normal;
        }
        .swiper-container-Book .swiper-pagination {
            bottom: 0 !important;
        }


        .noticeTabs {margin-top:10%;}
        .noticeTabs .tabContent {padding:20px 20px 0;}

        .sec-bottomBn {margin-top:10%;}
        .appPlayer {margin-top:8%;}

        .btnCounsel {position:fixed; right:10px; bottom:10px; z-index: 90;}        
        .btnCounsel a {display:flex; flex-direction: column; justify-content: center; align-items: center; width:90px; height:90px; background:#fbe901; color:#363636; border-radius:50%; text-align:center; font-weight:bold; padding:5px; font-size:1.7vh}
        .btnCounsel a img {display:block; margin-bottom:5px; width:50%; max-width:45px}

        .castBoxpopup {display:none}
        .castBoxpopup .close {position:absolute; top:0; right:0}
	    .castBoxpopup .close button {background:#fff url("https://static.willbes.net/public/images/promotion/m/icon_close.png") no-repeat center center;
            background-size:60%; font-size:0; text-indent: -9999px; width:24px; height:24px; border-radius:50%}	

       
        @@media only screen and (max-width: 374px) {
            .groupLink a {font-size:1.6vh;}
            .conTitle img.moreBtn {width:20px;}
            .cop .castInfo {padding:8px; font-size:1.6vh;} 
            .cop .castInfo h5 {font-size:1.7vh; font-weight:bold; margin-bottom:4px}
            .cop .castInfo h5 br {display:none}
            .cop .sec-tip .swiper-sec03 .swiper-pagination {top:85%;}

            .conTitle {margin:10% 10px 2%}

            .cop .swiper-sec,
            .cop .sec-cast {margin:0 10px;}
            .cop .sec-tip,
            .cop .swiper-best,
            .swiper-container-Book {width:calc(100% - 20px);}

            .noticeBoard {padding:10px}
            .noticeBoard a {padding:8px 0}

            .noticeTabs .tabContent {padding:10px 10px 0;}
     
            .btnCounsel a {width:60px; height: 60px; font-size:1.5vh}
            .btnCounsel a img {margin-bottom:3px; width:50%;}
        }
        @@media (min-width: 721px) {
            .cop .castInfo h5 {font-size:2.4vh;}
            .cop .castInfo p {font-size:2.2vh;}
            .cop .swiper-best{width:calc(100% - 20px); padding-bottom:40px;}

            .btnCounsel a {width:100px; height: 100px;}
        }
    </style>
</head>
<body id="goTop">
    <!-- Gnb -->
    <!-- aside -->
    <div id="aside">
        <div class="asideBox">
            <div id="naviA">
                <h2 class="NGEB"><img src="/public/img/willbes/m/main/icon_willbes2.png" class="clogo">신광은경찰</h2>
                <ul class="NGEB">
                    <li class="ListBox">
                        <div class="List">5급행정</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">국립외교원</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">PSAT</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">5급헌법</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">법원행시</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">변호사시험</div>
                    </li>
                </ul>
            </div>

            <div id="naviB">
                <ul class="NGEB">
                    <li class="ListTit"><h1 class="NGEB">내강의실</h1></li>
                    <li class="ListBox">
                        <div class="List NGEB">무한 PASS존</div>
                    </li>
                    <li class="ListBox">
                        <div class="List NGEB">온라인강좌</div>
                        <div class="List-Depth">
                            <ul>
                                <li><a href="#none">· 수강대기 강좌</a></li>
                                <li><a href="#none">· 수강중인 강좌</a></li>
                                <li><a href="#none">· 일시정지 강좌</a></li>
                                <li><a href="#none">· 수강종료 강좌</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="ListBox">
                        <div class="List NGEB">학원강좌</div>
                        <div class="List-Depth">
                            <ul>
                                <li><a href="#none">· 수강신청 강좌</a></li>
                                <li><a href="#none">· 수강종료 강좌</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="ListBox">
                        <div class="List NGEB">주문/배송조회</div>
                    </li>
                    <li class="ListBox">
                        <div class="List NGEB">포인트 관리</div>
                    </li>
                    <li class="ListBox">
                        <div class="List NGEB">쿠폰/수강권 관리</div>
                    </li>
                    <li class="ListBox">
                        <div class="Depth">
                            <ul>
                                <li><a href="#none">· 공지사항</a></li>
                                <li><a href="#none">· FAQ</a></li>
                                <li><a href="#none">· 동영상 상담실</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="rMenu">
                <ul>
                    <li><a href="#none" onclick="openWin('LoginForm')" class="Menu_close"><span class="hidden">닫기</span></a></li>
                    <li><a href="#none">윌비스홈</a></li>               
                    <li><a href="#none">로그아웃</a></li>
                    <li><a href="#none" class="tx-red">로그인</a></li>
                    <li><a href="#none">회원가입</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- topnav -->

    <!-- Header -->
    <div id="Header" class="NG c_both">
        <div class="widthAutoFull">     
            <div class="Menu-List p_re">             
                <div class="main">
                    <button type="button" class="menubar Menu_open">
                        <span class="hidden">사이트 메뉴</span>
                    </button>
                    <button type="button" class="mypage Menu_open">
                        <span class="hidden">내강의실</span>
                    </button>

                    <div class="logo">
                        <a href="#none" class="siteTitle NSK"><span>신광은</span>경찰</a>
                    </div>

                    <button type="button" class="classroom">
                        <span>강의실배정표</span>
                    </button> {{--임용전용--}}

                    <button type="button" class="searchView">
                        <span class="hidden">검색</span>
                    </button>
                    
                    <button type="button" class="basket">
                        <span class="hidden">장바구니</span>
                    </button>           
                </div> 
                <div class="searchWrap">             
                    <input type="search" id="search" name="" value="" placeholder="온라인/학원강의 검색" />
                    <label for="search"><button title="검색" class="searchBtn">검색</button></label>  
                    <button title="닫기" class="searchClose">닫기</button>
                </div>                    
            </div>        
        </div>    
    </div>

    <!-- Container -->
    <div id="Container" class="Container NSK cop mb40 p_re"> 
        <div class="widthAutoFull">
            <div class="subMenuWrap">
                <a href="#none">내강의실</a>
                <a href="#none">무료특강</a>
                <a href="#none">전체강좌</a>
                <a href="#none">교제구매</a>              
            </div> 
        </div>

        <div class="widthAutoFull">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x92.jpg" alt="배너명"></a>
        </div>

        <div class="MainBnrSlider swiper-container swiper-container-arrow">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x400_01.jpg" alt="배너명"></a></div>
                <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x400_02.jpg" alt="배너명"></a></div>
                <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x400_03.jpg" alt="배너명"></a></div>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <div class="groupLink">
            <a href="#none">경찰승진<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="https://police.willbes.net/m/promotion/index/cate/3007/code/2414" target="_blank">해양경찰<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="#none">해경경채<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
            <a href="#none">경찰간부<img src="https://static.willbes.net/public/images/promotion/m/icon_link.png" ></a>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">진행중인 <strong class="mainColor">이벤트</strong></div>
        </div>
        <div class="swiper-sec swiper-sec01">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_332x160_01.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_332x160_02.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_332x160_03.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_332x160_04.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">경찰 개편시험대비 <strong class="mainColor">전문교수진</strong></div>
        </div>
        <div class="swiper-sec swiper-sec02">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_01.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_02.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_03.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_04.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_05.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_06.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_07.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x445_08.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은 <strong class="mainColor">경찰 캐스트</strong><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        <div class="sec-cast">
            <div class="castList">
                <a href="#none" onclick="openWin('castPopup')">
                    <div class="castImg"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_284x160_01.jpg" alt="배너명"></div>
                    <div class="castInfo">
                        <h5>[신광은경찰학원] 추천못해!! 5급<br> 행시 합격생이 교수님을 찾아온 SSUL</h5>
                        <p>5급 행시 합격생이 신광은 교수님을 찾아온 썰!</p>
                    </div>
                </a>
            </div>
            <div class="castList">
                <a href="#none" onclick="openWin('castPopup')">
                    <div class="castImg"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_284x160_02.jpg" alt="배너명"></div>
                    <div class="castInfo">
                        <h5>[짱쌤X아이언짐 경찰체력] <br>3편_악력 점수 For Real?? (⓿_⓿)</h5>
                        <p>악력점수는 어떻게 하면 높일 수 있을까요?</p>
                    </div>
                </a>
            </div>
            <div class="castList">
                <a href="#none" onclick="openWin('castPopup')">
                    <div class="castImg"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_284x160_03.jpg" alt="배너명"></div>
                    <div class="castInfo">
                        <h5>경찰 헌법 심화기출 강의 커리큘럼, <br>공부방법_김원욱교수</h5>
                        <p>경찰 헌법 심화기출 강의 커리큘럼, 공부방법</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은 <strong class="mainColor">경찰팀 TV</strong><a href="https://www.youtube.com/channel/UCQ-jvqaobw6E9EvnFO88vwQ" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        <div class="swiper-sec swiper-sec02">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_01.jpg" alt="배너명">
                        <div class="bnTitle">신광은경찰팀 TV</div>  
                    </a>                                      
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_02.jpg" alt="배너명">
                        <div class="bnTitle">신광은 형사법</div>
                    </a>                                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_03.jpg" alt="배너명">
                        <div class="bnTitle">장정훈 경찰학</div>
                    </a>                                      
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_04.jpg" alt="배너명">
                        <div class="bnTitle">신광은경찰팀 TV</div>
                    </a>                                        
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_05.jpg" alt="배너명">
                        <div class="bnTitle">이국령 헌법</div>  
                    </a>                                      
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_216x216_06.jpg" alt="배너명">
                        <div class="bnTitle">박상민 범죄학</div> 
                    </a>                                    
                </div>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">수험생활 <strong class="mainColor">꿀 TIP!</strong></div>
        </div>

        <div class="sec-tip">
            <div class="tipBox"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_332x140.jpg" alt="배너명"></a></div>
            <div class="tipBox"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_157x140_01.jpg" alt="배너명"></a></div>
            <div class="swiper-sec03 swiper-container-page tipBox">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_157x140_02.jpg" alt="배너명"></a></div>
                    <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2001/bn_157x140_01.jpg" alt="배너명"></a></div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>   

        <div class="conTitle">
            <div class="NSK-Black">신광은 경찰학원 <strong class="mainColor">개강 소식</strong><a href="https://police.willbes.net/m/pass/offinfo/boardInfo/index/78" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>
        <div class="noticeBoard">
            <ul>
                <li><a href="#none"><span>HOT</span>3월 19일(토) 실용글쓰기 시험 대행접수중! (접수기간 2.14~3.7)</a></li>
                <li><a href="#none"><span>HOT</span>장정훈 교수님 경찰학 유튜브로 미리보는 숫자특강!! 1/31(월)</a></li>
                <li><a href="#none"><span>HOT</span>경찰공무원시험 가산점 (2022년 상반기 일반공채 공고 기준)</a></li>
                <li><a href="#none">검정제시험 성적표제출(원서접수시)</a></li>
            </ul>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">신광은경찰 <strong class="mainColor">베스트 강좌</strong></div>
        </div>
        <div class="swiper-best mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_01.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_02.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_03.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_04.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_01.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_02.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_03.jpg" alt="배너명">
                    </a>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_680x300_04.jpg" alt="배너명">
                    </a>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="conTitle">
            <div class="NSK-Black">경찰 베스트 <strong class="mainColor">교재</strong><a href="https://police.willbes.net/m/m/book/index" target="_blank"><img src="https://static.willbes.net/public/images/promotion/m/icon_more.png" alt="더보기" class="moreBtn"></a></div>
        </div>      
        <div class="swiper-container-Book">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://static.willbes.net/public/images/promotion/m/2001/book_01.jpg" alt="교재명"></div> 
                        <ul>                            
                            <li>2020 기특한 국어 전 범위 모의고사 4</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>                            
                        </ul> 
                    </a>                
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://static.willbes.net/public/images/promotion/m/2001/book_02.jpg" alt="교재명"></div> 
                        <ul>
                            <li>장정훈 경찰학 적중예상문제풀이[2022 경찰채용 1차대비]</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>  
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://static.willbes.net/public/images/promotion/m/2001/book_03.jpg" alt="교재명"></div> 
                        <ul>
                            <li>근대 세계의 창조</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>  
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://static.willbes.net/public/images/promotion/m/2001/book_04.jpg" alt="교재명"></div> 
                        <ul>
                            <li>근대 세계의 창조</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>  
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>장정훈 경찰학 적중예상문제풀이[2022 경찰채용 1차대비]</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>장정훈 경찰학 적중예상문제풀이[2022 경찰채용 1차대비]</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://static.willbes.net/public/images/promotion/m/2001/book_04.jpg" alt="교재명"></div> 
                        <ul>
                            <li>장정훈 경찰학 적중예상문제풀이[2022 경찰채용 1차대비]</li>
                            <li>[판매중]</li>
                            <li><span>54,000원</span> <strong>(↓ 10%)</strong></li>
                        </ul> 
                    </a>                
                </div> 
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
 


        <div class="noticeTabs">
            <ul class="tabWrap mainTab">
                <li><a href="#notice1" class="on">공지사항</a></li>
                <li><a href="#notice2">시험공고</a></li>
                <li><a href="#notice3">수험뉴스</a></li>
            </ul>
            <div class="tabBox buttonBox noticeBox">
                <div id="notice1" class="tabContent">
                    <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none"><span>HOT</span>3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none"><span>HOT</span>설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none"><span>HOT</span>추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
                <div id="notice2" class="tabContent">
                    <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내22</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
                <div id="notice3" class="tabContent">
                    <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                    <ul class="List-Table">
                        <li><a href="#none">공지사항 제목이 출력됩니다.333</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none"><span>HOT</span>3월 31일(금) 새벽시스템점검안내33</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내33</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                    </ul>
                </div>
            </div>
        </div>
    
        <div class="sec-bottomBn">
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x190.jpg" alt="배너명">
            </a>
        </div>

        <div class="appPlayer">
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/m/2001/bn_720x96.jpg"  alt="샘플">
            </a>
        </div>

        <div class="btnCounsel">
            <a href="https://police.willbes.net/pass/consult/visitConsult/index">
                <img src="https://static.willbes.net/public/images/promotion/m/icon_counsel.png" alt="">
                방문상담<br>예약
            </a>
        </div>

    </div>
    <!-- End Container -->

    <!-- footer -->
    <div id="Footer" class="widthAutoFull NGR c_both pb30">
        <div class="ft-Link">
            <ul>
                <li><a href="#none">고객센터</a></li>
                <li><a href="#none">이용약관</a></li>
                <li><a href="#none">개인정보처리방침</a></li>
                <li class="tx-light-blue"><a href="#none"><img src="/public/img/willbes/m/main/icon_pc.png" style="width: 16px;"> PC버전</a></li>
            </ul>
        </div>
        <address>
            ㈜윌비스 | 대표 : 송주호<br/>
            사업자등록번호 : 119-85-23089<br/>
            통신판매업신고 : 제2008-서울관악-0180호 [정보확인]<br/>
            신고기관명 : 서울특별시 관악구 ㅣ 원격평생교육시설 신고 제56호<br/>
            Copyright © (주)윌비스. All Right Reserved. 
        </address>
    </div>
    <div class="dim Menu_close" style="display: none;"></div>

    {{--모달팝업
    <div class="popupBox NSK" id="modalPopup">
        <div class="popupContent">
            <div class="popbanner"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/popup_sp01.jpg"></a></div>
            <div class="embed-container"><iframe src="https://www.youtube.com/embed/d6TpPnR5crM" frameborder="0" allowfullscreen></iframe></div>
        </div>
        <div class="btnClose">
            <div><button onclick="closeWin('modalPopup')">오늘 그만 보기</button></div>
            <div><button onclick="closeWin('modalPopup')">닫기</button></div>
        </div>
    </div>--}}

    {{--경찰캐스트 팝업--}}
    <div id="castPopup" class="castBoxpopup">
        <div class="popupBox NSK" >
            <div class="popupContent">
                <div class="close"><button onclick="closeWin('castPopup')">닫기</button></div>
                <div class="embed-container">                
                    <iframe src="https://www.youtube.com/embed/d6TpPnR5crM" frameborder="0" allowfullscreen></iframe>                    
                </div>                      
            </div>        
        </div>
    </div>


    <script>   
        // 검색    
        $(function () {
            $('.Menu-List .searchView').click(function () {
                $('.searchWrap').show().css('display', 'block');
            });
        });
        $(function () {
            $('.Menu-List .searchClose').click(function () {
                $('.searchWrap').hide().css('display', 'none');
            });
        });

        //입성
        var swiper = new Swiper('.swiper-sec', {
            slidesPerView: 'auto',
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });

        //베스트강의
        var mySwiper = new Swiper(".mySwiper", {
            slidesPerView: 'auto',
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });

        //도서
        var swiper = new Swiper ('.swiper-container-Book', { 
            slidesPerView: 'auto',
            spaceBetween: 11,
            loop: true,
            loopFillGroupWithBlank: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
            pagination: { 
                el: '.swiper-pagination', 
                clickable: true,
            }, 
        }); 
    </script> 

    <!-- scripts -->
    <!-- JAVASCRIPT -->
    <!-- PNotify -->
    <script src="/public/vendor/pnotify/pnotify.js"></script>
    <script src="/public/vendor/pnotify/pnotify.buttons.js"></script>
    <script src="/public/vendor/pnotify/pnotify.nonblock.js"></script>
    <!-- Moment -->
    <script src="/public/vendor/moment/moment.min.js"></script>
    <script src="/public/vendor/moment/moment-with-locales.js"></script>
    <!-- bootstrap-datepicker -->
    <script src="/public/vendor/bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- jquery.chained -->
    <script src="/public/vendor/jquery/chained/jquery.chained.min.js"></script>
    <!-- base64 -->
    <script src="/public/vendor/base64/webtoolkit.base64.js"></script>
    <!-- validator -->
    <script src="/public/vendor/validator/validator.js"></script>
    <!-- Custom Script -->
    <script src="/public/js/util.js?ver=1594952526"></script>
    <script src="/public/js/validation_util.js?ver=1594952526"></script>
    <script src="/public/js/willbes/tabs.js?ver=1594952526"></script>
    <script src="/public/js/willbes/sub.js?ver=1594952526"></script>
    <script src="/public/js/willbes/app.js?ver=1594952526"></script>
    <!--// JAVASCRIPT -->
</body>
</html>