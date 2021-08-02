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
    <link href="/public/css/willbes/m/style_v2.css" rel="stylesheet">
    
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
        .swiper-main-Banner {position:relative;}
        .swiper-main-Banner .swiper-slide {display:block; width:100%; padding-bottom:35%; height:auto}
        .swiper-main-Banner .swiper-slide .small-banner-wrap {position: absolute; width:100%; z-index: 2;}
        .swiper-main-Banner .swiper-slide .small-banner {
            width:calc(100% - 40px); margin:-20px 20px 0; padding:20px 0;
            display: flex; justify-content:space-around; border:1px solid #535353;
            background:#fff; box-shadow:0 0 10px rgba(0,0,0,.5); border-radius:20px; 
        }
        .swiper-main-Banner .small-banner div {flex-basis: auto; flex-grow: 1; border-right:1px solid #e1e1e1;}
        .swiper-main-Banner .small-banner div:last-child {border:0}

        .swiper-main-Banner .MaintabControl {position: absolute; right:2.5%; top: 48%; width: 25%; height: 8.59%; z-index: 99;}
        .swiper-main-Banner .MaintabControl div {float:left;  display: flex; justify-content: center; align-items: center; height:100%; width:30%; font-size: 16px; color:#666; background:rgba(255,255,255,.8); margin-right:1px}
        .swiper-main-Banner .MaintabControl .swiper-pagination-current {font-weight: 600; color:#000}
        .swiper-main-Banner .MaintabControl div.MaintabAll {margin-left:2%; border-radius:50%}
        .swiper-main-Banner .MaintabControl div.MaintabAll a {font-size:30px; color:#000; font-weight: 600;}

        .Container .MaintabAllView {position:absolute; top:0; left:0; width:100%; height:100%; z-index: 999; background:rgba(0,0,0,.5); display:none}
        .Container .MaintabAllView .title {background:#fff; text-align:center; padding:10px; font-size:16px}
        .Container .MaintabAllView .title span {float:right}
        .Container .MaintabAllView .title:after {content:''; display:block; clear:block}
        .Container .MaintabAllView img {max-width:100%;}

        .fixed {position:fixed; top:0; left:0; width:100%; border-bottom:1px solid #ccc; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10}


        .intro .gosiTitle {text-align:left; margin-left:24px}

        .intro .swiper-sec02 {
            position: relative;
            overflow: hidden;    
            height: 250px;    
            margin-left:20px;
        }
        .intro .swiper-sec02 .swiper-wrapper { display: flex; justify-content:flex-start;}
        .intro .swiper-sec02 .swiper-container-sec02 .swiper-slide {
            width:220px; margin-right:20px; align-items: flex-start;
        }
        .intro .swiper-sec02 .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec02 .swiper-slide .bnTit {
            display: block;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            margin: 10px auto 0;
            font-size: 12px;
        }
        .intro .swiper-sec02 .swiper-slide img {
            max-width: 220px;
        }


        .intro .swiper-sec03 {padding-bottom:35px;}
        .intro .swiper-sec03 .swiper-pagination {
            top:90%;
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


        .intro .swiper-sec04 {
            position: relative;
            overflow: hidden;  
            max-height:620px;
            background:#c0bcb0;  
            margin-top:30px;
        }
        .intro .swiper-sec04 .gosiTitle {color:#fff}
        .intro .swiper-sec04 .swiper-wrapper {display: flex; justify-content: space-between; padding-left:20px }
        .intro .swiper-sec04 .swiper-container-sec04 .swiper-slide {
            width: 208px; max-height:407px; margin-right:20px; align-items: flex-start; background:none;
        }
        .intro .swiper-sec04 .swiper-slide a {
            display: block;
        }
        .intro .swiper-sec04 .swiper-slide img {
            max-width: 100%;
        }


        .intro .swiper-sec05 {
            padding-bottom: 20px;
            overflow: hidden;
            position: relative;
        }
        .intro .swiper-sec05 .swiper-container-prof {
            height: 420px;
        }
        .intro .swiper-sec05 .swiper-slide {
            width: 350px;
            height: calc((100% - 10px) / 2);
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

        

        /* iPhone 5/SE */
        @@media only screen and (max-width: 374px) {
            .swiper-main-Banner .swiper-slide .small-banner {
            width:calc(100% - 20px); margin:-10px 10px 0; padding:10px 0; border-radius:10px; 
            }

            .intro .swiper-sec02 {  
            height: 170px; 
            }
            .intro .swiper-sec02 .swiper-container-sec02 .swiper-slide {
                width:140px; margin-right:10px
            }

            .intro .gosiTitle,
            .intro .swiper-sec02 {margin-left:10px}
            .intro .gosiTitle {font-size:18px}


            .intro .swiper-sec04 {max-height:400px;}
            .intro .swiper-sec04 .gosiTitle {padding-top:30px}
            .intro .swiper-sec04 .swiper-wrapper {padding-left:10px}
            .intro .swiper-sec04 .swiper-container-sec04 .swiper-slide {
                width: 130px; max-height:auto; margin-right:10px;
            }

            .intro .swiper-sec05 .swiper-container-prof {height:180px;}
            .intro .swiper-sec05 .swiper-slide {width: 140px;}
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

    <div class="MainSlider swiper-container swiper-container-page mt20">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x130.jpg" alt="배너명"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x130.jpg" alt="배너명"></a></div>
            <div class="swiper-slide"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x130.jpg" alt="배너명"></a></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="MainSlider swiper-container swiper-main-Banner">
        <div class="MaintabControl">
            <div class="swiper-pagination-gate"></div>
            <div class="start" style="display:none;"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconPlay.png" alt="재생"></div>
            <div class="stop"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/iconStop.png" alt="정지"></div>  
            <div class="MaintabAll"><a href="#none">+</a></div>                
        </div>

        <div class="swiper-wrapper">          
            <div class="swiper-slide">
                <div class="big-banner"><a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a></div>
                <div class="small-banner-wrap">
                    <div class="small-banner">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div><a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a></div>
                <div class="small-banner-wrap">
                    <div class="small-banner">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div><a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a></div>
                <div class="small-banner-wrap">
                    <div class="small-banner">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_220x180_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>
        </div>        
    </div> 

    <div class="MaintabAllView" style="display:none">
        <div class="title">
            전체보기 <span><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/btnClose.png" alt="닫기"></a></span>
        </div>
        <a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a>
        <a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a>
        <a href="#"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x400.jpg"></a>
    </div>

      
    

    <div class="gosiTitle NSK">
        지금 바로 주목해야 할 <strong class="NSK-Black">새로운 소식!</strong>
    </div>
    <div class="swiper-sec02">
        <div class="swiper-container-sec02">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_01.png" alt="배너명">
                        <div class="bnTit">행정법 신기훈 전격 입성</div>
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_02.png" alt="배너명"> 
                        <div class="bnTit">행정법 신기훈 전격 입성</div> 
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_03.png" alt="배너명">
                        <div class="bnTit">행정법 신기훈 전격 입성</div>
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_04.png" alt="배너명">
                        <div class="bnTit">행정법 신기훈 전격 입성</div>
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_05.png" alt="배너명">
                        <div class="bnTit">행정법 신기훈 전격 입성</div>
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_01.png" alt="배너명">
                        <div class="bnTit">행정법 신기훈 전격 입성</div>
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_208x208_02.png" alt="배너명"> 
                        <div class="bnTit">행정법 신기훈 전격 입성</div> 
                    </a>                    
                </div>
            </div>
        </div>
    </div> 


    <div class="gosiTitle NSK">
        <strong class="NSK-Black">초보 수험생</strong>이라면, 꼭 확인!
    </div>
    <div class="MainSlider swiper-container swiper-sec03 swiper-container-page">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x190.jpg" alt="배너명"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x190.jpg" alt="배너명"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2003/2003_720x190.jpg" alt="배너명"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    
    <div class="swiper-sec04">
        <div class="gosiTitle NSK">
            합격을 책임지는 <strong class="NSK-Black">윌비스 교수진</strong>
        </div>

        <div class="swiper-container-sec04">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2003/2003_208x470_01.jpg" alt="배너명">
                    </a>                    
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2003/2003_208x470_02.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2003/2003_208x470_03.jpg" alt="배너명">
                    </a>                   
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2003/2003_208x470_04.jpg" alt="배너명">
                    </a>                    
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2003/2003_208x470_05.jpg" alt="배너명">
                    </a>                    
                </div>
            </div>
        </div>
    </div> 


    <div class="gosiTitle NSK">
        쉬면서도 열공되는 <strong class="NSK-Black">YOUTUBE 영상</strong> 시청하기!
    </div>

    <div class="swiper-sec05">
        <div class="swiper-container-prof">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg" alt="배너명">
                    </a>  
                </div> 
                <div class="swiper-slide">             
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg" alt="배너명">
                    </a>
                </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg" alt="배너명">
                    </a>
                    </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg" alt="배너명">
                    </a>
                </div> 
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide"> 
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg" alt="배너명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg" alt="배너명">
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
<!-- End Container -->
<script>   
    //swiper 메인 슬라이드
    $(document).ready(function(){
        var mainslider = new Swiper('.swiper-main-Banner', {
            direction: 'horizontal',
            loop: true,
            observer: true,
            observeParents: true,
            slidesPerView : 'auto',
            pagination: {
            el: ".swiper-pagination-gate",
            type: "fraction",
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }, //3초에 한번씩 자동 넘김
        });

        //슬라이드 재생, 스탑 버튼
        $('.start').on('click', function() {
            mainslider.autoplay.start();
            $(this).hide();
            $('.stop').show();
            return false;
        });
        $('.stop').on('click', function() {
            mainslider.autoplay.stop();
            $(this).hide();
            $('.start').show();
            return false;
        });

        //진행중인 모든 이벤트 닫기, 열기
        $('.MaintabControl .MaintabAll a').on('click', function() {
            $('.MaintabAllView').css("display","block");
        });

        $('.MaintabAllView span a').on('click', function() {
            $('.MaintabAllView').css("display","none");
        });        
    });



    //입성
    var swiper = new Swiper('.swiper-container-sec02', {
      slidesPerView: 'auto',
      slidesPerColumn: 1,
      spaceBetween: 0,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
    });

    //교수진
    var swiper = new Swiper('.swiper-container-sec04', {
      slidesPerView: 'auto',
      slidesPerColumn: 1,
      spaceBetween: 0,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
    });

    //YOUTUBE 영상
    var swiper = new Swiper('.swiper-container-prof', {
      slidesPerView: 'auto',
      slidesPerColumn: 2,
      spaceBetween: 10,
      autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        }, //3초에 한번씩 자동 넘김
      // init: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          spaceBetween: 10,
        },
      }
    });

    //배너 전체보기
    $(function() {
        var nav = $('.title');
        var navTop = nav.offset().top+50;
        var navHeight = nav.height()+10;
        var showFlag = false;
        nav.css('top', -navHeight+'px');
        $(window).scroll(function () {
            var winTop = $(this).scrollTop();
            if (winTop >= navTop) {
                if (showFlag == false) {
                    showFlag = true;
                    nav
                        .addClass('fixed')
                        .stop().animate({'top' : '0px'}, 50);
                }
            } else if (winTop <= navTop) {
                if (showFlag) {
                    showFlag = false;
                    nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                        nav.removeClass('fixed');
                    });
                }
            }
        });
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