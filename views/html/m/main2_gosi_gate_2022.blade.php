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
        .intro .swiper-wrapper {height:auto;}
        .intro .gosiTitle {text-align:left; margin-left:4%; font-size:2.4vh; padding:0 0 20px}

        .gosi-gate-Sec {overflow: hidden;}
        .gosi-gate-Sec .gosi-gate-bntop-img {position:relative;}
        .gosi-gate-Sec .mainTopBnControl {display:flex; justify-content: space-around; align-items: center; position: absolute; left:50%; margin-left:-42%; bottom:10%; z-index: 100; border-radius:30px; background-color:rgba(0,0,0,.4)}
        .gosi-gate-Sec .mainTopBnControl div {height:3.2vh; width:38px !important; font-size: 1.6vh; display: flex; justify-content: center; align-items: center; margin:0; padding:0; color:#fff; letter-spacing:1px }
        .gosi-gate-Sec .mainTopBnControl .swiper-pagination-current {font-weight: 600; color:#fff}
        .gosi-gate-Sec .mainTopBnControl div.swiper-btn-next {background: url("https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAR.png") no-repeat center center}
        .gosi-gate-Sec .mainTopBnControl div.swiper-btn-prev {background: url("https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAL.png") no-repeat center center}

        .gosi-gate-Sec .mainTopBnList {position:relative; margin-top:4%}
        .gosi-gate-Sec .mainTopBn {display:flex;}
        .gosi-gate-Sec .mainTopBn li a {
            display: block;
            color:#b4b4b4;
            text-align:center;
            line-height: 1.2;
            width:calc(100px);
            font-size: 1.6vh;
            margin-right:1.5%;
        }
        .gosi-gate-Sec .mainTopBn li a.active {color:#000; font-weight:bold;}
        .gosi-gate-Sec .mainTopBn li a img {display:block; margin:auto auto 18px; border-radius:18px; }
        .gosi-gate-Sec .mainTopBn li a.active img {box-shadow:3px 3px 5px rgba(0,0,0,.2); }

        .gosi-gate-Sec p {position:absolute; top:80%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; z-index:99;}
        .gosi-gate-Sec p a {display:none;}
        .gosi-gate-Sec p.leftBtn {background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAL.png) no-repeat left center; }
        .gosi-gate-Sec p.rightBtn {background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAR.png) no-repeat left center; }	
        .gosi-gate-Sec p:hover {opacity:100; filter:alpha(opacity=100);}


        .intro .newsWrap {margin-top:6%; position: relative; display:flex; justify-content: space-between; align-items: top}
        .intro .newsWrap .swiper-sec01 {width:320px; padding-bottom:30px;}
        .intro .newsWrap .swiper-wrapper img {border-radius:10px;}
        .intro .newsWrap .swiper-sec01 .swiper-pagination01 {
            bottom:8px;
            float:none;
            text-align:center
        }
 
        .intro .newsWrap .swiper-sec02-wrap {
            overflow: hidden;
            width:calc(100% - 300px);
            margin-left:20px
        }
        .intro .swiper-sec02-wrap .gosiTitle {margin-left:0}
        .intro .swiper-sec02-wrap .swiper-wrapper {display: flex; justify-content:flex-start; height: auto;}
        .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
            width:220px; margin-right:1.3%; align-items: flex-start; 
        }
        .intro .swiper-sec02-wrap .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec02-wrap .swiper-slide .bnTit {
            display: block;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            margin: 10px auto 0;
            font-size: 12px;
        }
        .intro .swiper-sec02-wrap .swiper-slide img {
            width:100%; max-width: 220px;
        }

        .intro .swiper-sec03 {margin-top:10%; padding-bottom:30px;}
        .intro .swiper-sec03 .swiper-pagination03 {
            bottom:10px;
            float:none;
            text-align:center
        }


        .intro .swiper-pagination .swiper-pagination-bullet {
            background:#d1d0ce !important;
            opacity: 1;
        }
        .intro .swiper-pagination .swiper-pagination-bullet-active {
            background:#2b2b2b !important;
        }

        .tpassWrap {margin-top:10%; background:#f4f7fe; padding:10% 4% 2%; }
        .tpassWrap .gosiTitle {margin-left:0}
        .tpassWrap .swiper-sec04 {padding-bottom:30px;}
        .tpassWrap .swiper-sec04 .swiper-wrapper {border-radius:20px;}
        .tpassWrap .swiper-sec04 .swiper-slide {background:#f4f7fe;}
        .tpassWrap .swiper-sec04 .swiper-slide img {border-radius:20px; width:100%;}
        .tpassWrap .swiper-sec04 .swiper-pagination04 {
            bottom:8px;
            float:none;
            text-align:center
        }
        .tpassWrap .bx-wrapper .bx-pager {
            width: auto;
            position: absolute;
            bottom: 0;
            left:0;
            right: 0;
        }
        .tpassWrap .prfoWrap {margin:6% auto; display:flex; flex-wrap: wrap; justify-content: center;}
        .tpassWrap .prfoWrap a {font-size:1.6vh; font-weight:bold; text-align:center; display:block; width:120px; margin:0 auto 20px;}
        .tpassWrap .prfoWrap a img {border:1px solid #e6e6e6; border-radius:30px; overflow: hidden; display:block; margin:0 auto 10px; max-width:100%}
        .tpassWrap .prfoWrap a.mobile {display:none;}


        .intro .swiper-sec05 {
            padding: 10% 0;
            overflow: hidden;
            position: relative;
            background:#21262c;
            color:#fff
        }
        .intro .swiper-sec05 .gosiTitle strong {color:#ff554d}
        .intro .swiper-sec05 .swiper-wrapper {height: auto;}
        .intro .swiper-sec05 .swiper-slide {
            width: 216px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: flex-start;
            -ms-flex-align: flex-start;
            -webkit-align-items: flex-start;
            align-items: flex-start;
        }
        .intro .swiper-sec05 .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec05 .swiper-slide img {
            width: 100%;
        }        


        .intro .swiper-sec06-Wrap {
            position: relative;
            overflow: hidden;
            padding:10% 0;
        }
        .intro .swiper-sec06-Wrap .swiper-wrapper {display: flex; justify-content: space-between; height: auto; margin-left:4%}
        .intro .swiper-sec06-Wrap .swiper-slide {
            width: 210px; align-items: flex-start; margin-right:10px;
        }
        .intro .swiper-sec06-Wrap .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec06-Wrap .swiper-slide img {
            max-width: 100%;
        }

        /* iPhone 5/SE */
        @@media only screen and (max-width: 374px) {
            .gosi-gate-Sec .mainTopBn li a {
                font-size: 1.8vh;
                width:calc(85px);
                margin-right:5px;
            }

            .intro .newsWrap {display:block; width:320px; margin:10% auto 0}
            .intro .newsWrap .swiper-sec02-wrap {
                overflow: hidden;
                width:100%;
                margin-left:0;
                margin-top:10%
            }
            .intro .swiper-sec02-wrap .gosiTitle {margin-left:4%}
            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
                width:150px; margin-right:1%; 
            }

            .tpassWrap .prfoWrap {justify-content: center;}
            .tpassWrap .prfoWrap a {width:88px;}
            .tpassWrap .prfoWrap a.mobile {display:block;}
            
            .intro .swiper-sec05 .swiper-slide {width: 155px;}
            .intro .swiper-sec06-Wrap .swiper-slide {
                width: 130px; 
            }            
        }

        @@media only screen and (min-width: 375px) and (max-width: 640px) {
            .gosi-gate-Sec .mainTopBn li a {
                font-size: 1.8vh;
                width:calc(90px);
                margin-right:5px;
            }

            .intro .newsWrap {display:block; width:92%; margin:10% auto 0}
            .intro .newsWrap .swiper-sec02-wrap {
                overflow: hidden;
                width:100%;
                margin-left:0;
                margin-top:10%
            }
            .intro .swiper-sec02-wrap .gosiTitle {margin-left:4%}
            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide {
                width:32.5%; margin-right:1%; 
            }
            .intro .swiper-sec02-wrap .swiper-sec02 .swiper-slide:last-child {margin-right:0}

            .tpassWrap .prfoWrap {justify-content:center;}
            .tpassWrap .prfoWrap a {width:100px;}
            .tpassWrap .prfoWrap a.mobile {display:block;}
            .intro .swiper-sec05 .swiper-slide {width: 180px;}
            .intro .swiper-sec06-Wrap .swiper-slide {
                width: 150px; 
            }
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
                    <a href="#none" class="siteTitle NSK-Black">윌비스 공무원학원</a>
                </div>        
                <button type="button" class="basket">
                    <span class="hidden">장바구니</span>
                </button>                
            </div>                     
        </div>

        <div class="tab-onoff">
            <ul>
                <li><a href="#none" class="on">온라인</a></li>
                <li><a href="#none">학원실강</a></li>
            </ul>
        </div>

        <div class="subMenuBox c_both">
            <ul class="subMenu">
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">교수진<br>소개</a>
                    <div class="dropBox dropBox2">
                        <ul>
                            <li>
                                <span>경제학</span>
                                <a href="#none">황종휴</a>
                            </li>
                            <li>
                                <span>행정법</span>
                                <a href="#none">김정일</a>
                                <a href="#none">박도원</a>
                                <a href="#none">김기홍</a>
                            </li>
                            <li>
                                <span>행정학</span>
                                <a href="#none">박경효</a>
                                <a href="#none">이동호</a>
                                <a href="#none">최승호</a>
                                <a href="#none">백승준</a>
                            </li>
                            <li>
                                <span>국제법</span>
                                <a href="#none">안진우</a>
                                <a href="#none">백승호</a>
                            </li>
                            <li>
                                <span>정치학</span>
                                <a href="#none">김희철</a>
                                <a href="#none">정원준</a>
                                <a href="#none">최승호</a>
                                <a href="#none">백승준</a>
                            </li>
                            <li>
                                <span>교육학</span>
                                <a href="#none">이인재</a>
                            </li>
                            <li>
                                <span>재정학</span>
                                <a href="#none">황종휴</a>
                            </li>
                            <li>
                                <span>정책학</span>
                                <a href="#none">이동호</a>
                                <a href="#none">최승호</a>
                            </li>
                            <li>
                                <span>정보체계론</span>
                                <a href="#none">백승준</a>
                                <a href="#none">최승호</a>
                            </li>
                            <li>
                                <span>교육심리학</span>
                                <a href="#none">이인재</a>
                            </li>
                            <li>
                                <span>선택>국제거래법</span>
                                <a href="#none">황종휴</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">학원<br>실강</a>
                    <div class="dropBox">
                        <ul>
                            <li><a href="#none">단과반수강신청</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                        </ul>
                    </div>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">동영상<br>강의</a>
                    <div class="dropBox dropBox2">
                        <ul>
                            <li>
                                <span>순환별</span>
                                <a href="#none">원론강의</a>
                                <a href="#none">예비순환</a>
                                <a href="#none">GS1순환</a>
                                <a href="#none">GS2순환</a>
                                <a href="#none">GS3순환</a>
                                <a href="#none">GS4순환</a>
                                <a href="#none">특강</a>
                                <a href="#none">황종휴경제학특강</a>
                            </li>
                            <li>
                                <span>과목별</span>
                                <a href="#none">경제학</a>
                                <a href="#none">행정법</a>
                                <a href="#none">행정학</a>
                                <a href="#none">국제법</a>
                                <a href="#none">정치학</a>
                                <a href="#none">교육학</a>
                                <a href="#none">재정학</a>
                                <a href="#none">정책학</a>
                                <a href="#none">정보체계론</a>
                                <a href="#none">교육심리학</a>
                                <a href="#none">국제경제학</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">교재<br>/보강</a>
                    <div class="dropBox">
                        <ul>
                            <li><a href="#none">공개특강</a></li>
                            <li><a href="#none">학원보강</a></li>
                        </ul>
                    </div>                      
                </li>
            </ul>                
        </div> 

        <div class="searchBox">   
            <div>             
                <input type="search" id="search" name="" value="" placeholder="온라인강의 검색" />
                <label for="search"><button title="검색">검색</button></label>  
            </div>              
        </div>        
    </div>    
</div>


<!-- Container -->
<div id="Container" class="Container NSK gosi intro mb40 p_re">  

    <div class="gosi-gate-Sec">                
        <div class="gosi-gate-bntop-img">
            <div class="gate-bntop-Slider mainSlider01">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_02.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_03.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_02.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_03.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_01.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_02.jpg" alt="배너명">
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720_03.jpg" alt="배너명">
                        </a>
                    </li>
                </ul> 
            </div> 
            <div class="mainTopBnControl">
                <div class="swiper-btn-prev"></div>
                <div class="swiper-pagination-gate"></div>                
                <div class="swiper-btn-next"></div>                    
            </div>                    
        </div>   

        <div class="mainTopBnList">
            <ul class="mainTopBn">
                <li><a data-swiper-slide-index="0" href="javascript:void(0);" class="active">
                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">
                    9급<br>pass</a></li>
                <li><a data-swiper-slide-index="1" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">
                    7급<br>pass</a></li>
                <li><a data-swiper-slide-index="2" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                세무직<br>pass</a></li>
                <li><a data-swiper-slide-index="3" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                법원직<br>pass</a></li>
                <li><a data-swiper-slide-index="4" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                농업직<br>pass</a></li>
                <li><a data-swiper-slide-index="5" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                통신/전기<br>pass</a></li>
                <li><a data-swiper-slide-index="6" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                전산직<br>pass</a></li>
                <li><a data-swiper-slide-index="7" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                환경직<br>pass</a></li>
                <li><a data-swiper-slide-index="8" href="javascript:void(0);">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum.jpg" alt="배너명">    
                산림자원직<br>pass</a></li>
            </ul>         
        </div> 
    </div>

    <div class="newsWrap">
        <div class="swiper-container swiper-sec01">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_01.jpg" alt="배너명"></div>
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_02.jpg" alt="배너명"></div>
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_03.jpg" alt="배너명"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination01 swiper-pagination"></div>
        </div>

        <div class="swiper-sec02-wrap">
            <div class="gosiTitle NSK">
            지금 윌비스에서<strong class="NSK-Black">주목해야 할 강의!</strong>
            </div>
            <div class="swiper-sec02">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_01.jpg" alt="배너명">
                        </a>                    
                    </div>            
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_02.jpg" alt="배너명">
                        </a>                    
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_03.jpg" alt="배너명">
                        </a>                   
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <div class="swiper-container swiper-sec03">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720.jpg" alt="배너명"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720.jpg" alt="배너명"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_720.jpg" alt="배너명"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination03 swiper-pagination"></div>
    </div>

    <div class="tpassWrap">
        <div class="gosiTitle NSK">
            <strong class="NSK-Black">원하는 교수님</strong>의 과정을 무제한 수강
        </div>
        <div class="swiper-container swiper-sec04">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_660_01.jpg" alt="배너명"></div>
                <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_m_660_02.jpg" alt="배너명"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination04 swiper-pagination"></div>
        </div>

        <div class="prfoWrap">
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                국어 오대혁
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                영어 한덕현
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                한국사 김상범
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                행정법 황남기
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                행정학 김철
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                소방직 이종오
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                행정법 이석준
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                조경직 이윤주
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                축산직 윤용범
            </a>
            <a href="#none">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">
                축산직 윤용범
            </a>
            <a href="#none" class="mobile"></a>
            <a href="#none" class="mobile"></a>
        </div>
    </div>

    <div class="swiper-sec05">
        <div class="gosiTitle NSK">
            보기만 해도 열공 되는 <strong class="NSK-Black">YOUTUBE</strong>
        </div>
        
        <div class="swiper-container-prof">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>  
                </div> 
                <div class="swiper-slide">             
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                    </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_216.jpg" alt="배너명">
                    </a>
                </div> 
            </div>
        </div>
    </div> 

    <div class="swiper-sec06-Wrap">
        <div class="gosiTitle NSK">
            합격을 책임지는 <strong class="NSK-Black">윌비스 교수진</strong>
        </div>

        <div class="swiper-sec06">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
        </div>
    </div>   

    <div class="noticeTabs c_both mt30">
        <ul class="tabWrap mainTab two">
            <li><a href="#notice1" class="on">공지사항</a></li>
            <li><a href="#notice2">시험공고</a></li>
        </ul>
        <div class="tabBox buttonBox noticeBox">
            <div id="notice1" class="tabContent pd20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>3월 31일(금) 새벽시스템점검안내 안내안내안내</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none"><span>HOT</span>추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
            <div id="notice2" class="tabContent pd20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>3월 31일(금) 새벽시스템점검안내222</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>설연휴학원고객센터운영안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none"><span>HOT</span>추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내22</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="csCenter">
        <ul class="link">
            <li><a href="https://pass.willbes.net/m/support/qna/index?s_cate_code=3035">동영상 1:1상담</a></li>
            <li><a href="https://pass.willbes.net/m/pass/support/qna/index?s_cate_code=3059">학원 1:1상담</a></li>
            <li><a href="#none">학원 오시는 길</a></li>
        </ul>
        <ul class="tel">
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>온라인문의</strong>
                        <span>1544-5006</span>
                        평일 09시~18시<Br>
                        주말/공휴일 제외
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>학원문의</strong>
                        <span>1544-0330</span>
                        평일 08시~18시<Br>
                        주말/공휴일 가능
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>교재문의</strong>
                        <span>1544-4944</span>
                        평일 09시~18시<Br>
                        주말/공휴일 제외
                    </div>
                </div>
            </li>
        </ul>
    </div> 

    <div class="appPlayer c_both">
        <a href="#none">
            <img src="{{ img_url('m/main/icon_app_player.gif') }}">
        </a>
    </div>

</div>

{{--모달팝업
<div class="popupBox NSK" id="modalPopup">
    <div class="popupContent">
        <div class="popbanner"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/popup_sp01.jpg"></a></div>
        <div class="popbanner"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/popup_sp02.jpg"></a></div>
    </div>
    <div class="btnClose">
        <div><button onclick="closeWin('modalPopup')">오늘 그만 보기</button></div>
        <div><button onclick="closeWin('modalPopup')">닫기</button></div>
    </div>
</div>
모달팝업//--}}
<!-- End Container -->


<script>   
    //swiper 메인 슬라이드
    $(document).ready(function(){
        var mainslider = new Swiper('.mainSlider01', {
            /*direction: 'horizontal',
            loop: true,
            observer: true,
            observeParents: true,
            slidesPerView : 'auto',*/
            spaceBetween: 0,
            effect: "fade",
            pagination: {
                el: ".swiper-pagination-gate",
                type: "fraction",
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            }, //5초에 한번씩 자동 넘김
            navigation: {
                nextEl: ".swiper-btn-next",
                prevEl: ".swiper-btn-prev",
            },
            on: {
                slideChange: function () {
                    $('.mainTopBn li > a').removeClass('active');
                    $('.mainTopBn li > a').eq(this.realIndex).addClass('active').trigger('click');
                    if($('.mainTopBn li:eq(0) > a').hasClass('active')){
                        // mainslider.update();
                        // location.reload();
                    }
                }
            }
        });

        //메인 슬라이드 메뉴1
        $('.mainTopBn li > a').on('click', function(){
            $('.mainTopBn li > a').removeClass('active');
            $(this).addClass('active');
            var num = $(this).attr('data-swiper-slide-index');
            mainslider.slideTo(num);
            var target = $(this);
            muCenter(target);
        });

        //슬라이드 메뉴1 클릭시 위치조정
        function muCenter(target){
            var snbwrap = $('.mainTopBn');
            var targetPos = target.position();
            var box = $('.mainTopBnList');
            var boxHarf = box.width()/2;
            var pos;
            var listWidth=0;

            snbwrap.find('li').each(function(){ listWidth += $(this).outerWidth(); })

            var selectTargetPos = targetPos.left + target.outerWidth()/2;
            if (selectTargetPos <= boxHarf) { // left
                pos = 0;
            }else if ((listWidth - selectTargetPos) <= boxHarf) { //right
                pos = listWidth-box.width();
            }else {
                pos = selectTargetPos - boxHarf;
            }

            setTimeout(function(){snbwrap.css({
                "transform": "translateX("+ (pos*-1) +"px)",
                "transition-duration": "500ms"
            })}, 200);
        }
    });

    var swiper1 = new Swiper(".swiper-sec01", {
        slidesPerView: '1',
        effect : "fade",
        fadeEffect: {
            crossFade: true
        },
        allowTouchMove: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, 
        loop: true,
        spaceBetween:0,//각 좌우 공간
        pagination: {
            el: ".swiper-pagination01",
            clickable:true
        },
    });

    //입성
    var swiper2 = new Swiper('.swiper-sec02', {
      slidesPerView: 'auto',
      slidesPerColumn: 1,
      spaceBetween: 0,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
    });


    // bar 배너
    var swiper3 = new Swiper('.swiper-sec03', {
        slidesPerView: '1',
        effect : "fade",
        fadeEffect: {
            crossFade: true
        },
        allowTouchMove: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, 
        loop: true,
        spaceBetween:0,//각 좌우 공간
        pagination: {
            el: ".swiper-pagination03",
            clickable:true
        },
    });

    //무제한 수강 교수진
    var swiper4 = new Swiper('.swiper-sec04', {
        slidesPerView: '1',
        effect : "fade",
        fadeEffect: {
            crossFade: true
        },
        allowTouchMove: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, 
        loop: true,
        spaceBetween:0,//각 좌우 공간
        pagination: {
            el: ".swiper-pagination04",
            clickable:true
        },
    });

    //YOUTUBE 영상
    var swiper5 = new Swiper('.swiper-container-prof', {
      slidesPerView: 'auto',
      slidesPerColumn: 2,
      spaceBetween: 5,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
      // init: false,
      pagination: {
        el: '.swiper-container-prof .swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          spaceBetween: 10,
        },
      }
    });

    //교수진
    var swiper6 = new Swiper('.swiper-sec06', {
      slidesPerView: 'auto',
      slidesPerColumn: 1,
      spaceBetween: 10,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
    });

</script> 

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