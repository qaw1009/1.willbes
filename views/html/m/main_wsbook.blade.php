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

        </style>
</head>
<body id="goTop">
    <!-- Gnb -->
    <!-- aside -->
<div id="aside">
    <div class="asideBox">
        <div id="naviA">
            <h2 class="NGEB"><img src="/public/img/willbes/m/main/icon_book.png" class="clogo">온라인서점</h2>
            <ul class="NGEB">
                <li class="ListTit"><h1 class="NGEB">도서구매</h1></li>
                <li class="ListBox">
                    <div class="List">도서구매</div>
                </li>
                <li class="ListBox">
                    <div class="List">베스트셀러</div>
                </li>
                <li class="ListBox">
                    <div class="List">신간안내</div>
                </li>
            </ul>
        </div>

        <div id="naviB">
            <ul class="NGEB">
                <li class="ListTit"><h1 class="NGEB">윌비스 출판도서</h1></li>
                <li class="ListBox">
                    <div class="List NGEB">출판사 공지사항</div>
                </li>
                <li class="ListBox">
                    <div class="List NGEB">출판사 출판도서</div>
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
                    <a href="#none" class="siteTitle NSK-Black">온라인 <span class="book">서점</span></a>
                </div>        
                <button type="button" class="basket">
                    <span class="hidden">장바구니</span>
                </button>                
            </div>                     
        </div>

        <div class="subMenuBox c_both">
            <ul class="subMenu">
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">교재<br>구매</a>
                    <div class="dropBox">
                        <ul>
                            <li>
                                <a href="#none">공무원</a>
                            </li>
                            <li>
                                <a href="#none">고시/로스쿨</a>
                            </li>
                            <li>
                                <a href="#none">경찰</a>
                            </li>
                            <li>
                                <a href="#none">임용</a>
                            </li>
                            <li>
                                <a href="#none">전문자격</a>
                            </li>
                            <li>
                                <a href="#none">취업/자격증</a>
                            </li>
                            <li>
                                <a href="#none">어학</a>
                            </li>
                            <li>                                
                                <a href="#none">학점/편입/독학사</a>
                            </li>
                            <li>
                                <a href="#none">일반서적</a>
                            </li>
                            <li>
                                <a href="#none">유아/어린이</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">베스트<br>셀러</a>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">신간<br>안내</a>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">윌비스<br>출판도서</a>
                    <div class="dropBox">
                        <ul>
                            <li><a href="#none">출판사공지</a></li>
                            <li><a href="#none">윌비스 출판도서</a></li>
                        </ul>
                    </div>                      
                </li>
            </ul>                
        </div> 

        <div class="searchBox book">   
            <div>
                {{--
                <select name="search_type">
                    <option value="0">통합검색</option>
                    <option value="1">도서명</option>
                    <option value="2">저자명</option>                            
                    <option value="3">출판사</option>
                </select>  
                --}}           
                <input type="search" id="search" name="" value="" placeholder="도서 검색" />
                <label for="search"><button title="검색">검색</button></label>  
            </div>              
        </div>        
    </div>    
</div>


<!-- Container -->
<div id="Container" class="Container NSK wsbook mb40">  
    <div class="MainSlider swiper-container swiper-container-page mt20">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_02.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_03.jpg"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>   

    <div class="MainSlider swiper-container swiper-container-page mt20">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x130_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x130_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x130_01.jpg"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

        
    <div class="mainTit mt30 NSK-Black">신간안내 <a href="#none" class="NSK">+ 더보기</a></div>
    <div class="wsbookList mt20">       
        <div class="swiper-container-nBook">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>2020 기특한 국어 전 범위 모의고사 4</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310943/book_310943_sm_1597971043.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310854/book_310854_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div> 

    <div class="mainTit mt30 NSK-Black">베스트셀러 <a href="#none" class="NSK">+ 더보기</a></div>
    <div class="wsbookList mt20">       
        <div class="swiper-container-nBook">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>2020 기특한 국어 전 범위 모의고사 4</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div>            
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310943/book_310943_sm_1597971043.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310854/book_310854_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                        <ul>
                            <li>[역사/문화]</li>
                            <li>근대 세계의 창조</li>
                            <li><span>54,000원</span> → <strong>48,600원</strong></li>
                        </ul> 
                    </a>                
                </div> 
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div> 

    <div class="mainTit mt30 NSK-Black">오늘의 책</div>
    <div class="todayBook">
        <div class="wsbookInfo" id="wsbookInfo">		
            <div class="todaybookList">
                <div class="bookimgB">
                    <img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"/>
                </div>
                <ul class="summary">
                    <li>2020 기특한 국어 전 범위 모의고사 4</li>
                    <li>저자명 : 홍길동</li>
                    <li>출판사명 : 윌비스</li>
                    <li><span>15,000원</span> → <strong>12,150원 (10%할인)</strong> </li>
                </ul>
            </div>
                        
            <div class="todaybookList">
                <div class="bookimgB">
                    <img src="https://book.willbes.net/public/uploads/wbs/book/2020/310920/book_310920_sm.jpg" alt="교재명"/>
                </div>
                <ul class="summary">
                    <li>2020 기특한 국어 전 범위 모의고사 4</li>
                    <li>저자명 : 홍길동</li>
                    <li>출판사명 : 윌비스</li>
                    <li><span>15,000원</span> → <strong>12,150원 (10%할인)</strong> </li>
                </ul>
            </div>
                        
            <div class="todaybookList">
                <div class="bookimgB">
                    <img src="https://book.willbes.net/public/uploads/wbs/book/2020/310919/book_310919_sm.jpg" alt="교재명"/>
                </div>
                <ul class="summary">
                    <li>2020 기특한 국어 전 범위 모의고사 4</li>
                    <li>저자명 : 홍길동</li>
                    <li>출판사명 : 윌비스</li>
                    <li><span>15,000원</span> → <strong>12,150원 (10%할인)</strong> </li>
                </ul>
            </div>
                        
            <div class="todaybookList">
                <div class="bookimgB">
                    <img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"/>
                </div>
                <ul class="summary">
                    <li>2020 기특한 국어 전 범위 모의고사 4</li>
                    <li>저자명 : 홍길동</li>
                    <li>출판사명 : 윌비스</li>
                    <li><span>15,000원</span> → <strong>12,150원 (10%할인)</strong> </li>
                </ul>
            </div>

            <div class="todaybookList">
                <div class="bookimgB">
                    <img src="https://book.willbes.net/public/uploads/wbs/book/2020/310854/book_310854_sm.jpg" alt="교재명"/>
                </div>
                <ul class="summary">
                    <li>2020 기특한 국어 전 범위 모의고사 4</li>
                    <li>저자명 : 홍길동</li>
                    <li>출판사명 : 윌비스</li>
                    <li><span>15,000원</span> → <strong>12,150원 (10%할인)</strong> </li>
                </ul>
            </div>
        </div><!--bookInfo//-->
        
        <ul id="bx-pager-today">														
            <li><a data-slide-index="0" href="#none"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="쉬운 일은 아니지만"/></a></li>
            <li><a data-slide-index="1" href="#none"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310920/book_310920_sm.jpg" alt="90년생이 온다"/></a></li>
            <li><a data-slide-index="2" href="#none"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310919/book_310919_sm.jpg" alt="개와 고양이에 관한 작은 세계사"/></a></li>
            <li><a data-slide-index="3" href="#none"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="알사탕"/></a></li>
            <li><a data-slide-index="4" href="#none"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310854/book_310854_sm.jpg" alt="90년생이 온다"/></a></li>
        </ul><!--bookimgS//-->

        <p class="leftBtn" id="bookInfoLeft"><a href="#none">이전</a></p>
        <p class="rightBtn" id="bookInfogRight"><a href="none">다음</a></p> 

    </div><!--todayBook//-->  

    <div class="mainTit mt30 NSK-Black">MD 추천</div>
    <div class="wsbookList mt20">       
        <div class="mdBook">
            <div class="swiper-slide">
                <a href="#none">
                    <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/311110/book_311110_sm.jpg" alt="교재명"></div> 
                    <ul>
                        <li>[역사/문화]</li>
                        <li>2020 기특한 국어 전 범위 모의고사 4</li>
                        <li><span>54,000원</span> → <strong>48,600원</strong></li>
                    </ul> 
                </a>                
            </div>            
            <div class="swiper-slide">
                <a href="#none">
                    <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310943/book_310943_sm_1597971043.jpg" alt="교재명"></div> 
                    <ul>
                        <li>[역사/문화]</li>
                        <li>근대 세계의 창조</li>
                        <li><span>54,000원</span> → <strong>48,600원</strong></li>
                    </ul> 
                </a>                
            </div> 
            <div class="swiper-slide">
                <a href="#none">
                    <div class="bookimg"><img src="https://book.willbes.net/public/uploads/wbs/book/2020/310854/book_310854_sm.jpg" alt="교재명"></div> 
                    <ul>
                        <li>[역사/문화]</li>
                        <li>근대 세계의 창조</li>
                        <li><span>54,000원</span> → <strong>48,600원</strong></li>
                    </ul> 
                </a>                
            </div> 
        </div>
    </div> 

    <div class="noticeTabs c_both mt30">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">공지사항</a></li>
            <li><a href="#notice2">수험정보센터</a></li>
            <li><a href="#notice3">정오표/추록</a></li>
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
            <div id="notice3" class="tabContent pd20">
                <div class="moreBtn"><a href="#none">+ 더보기</a></div>
                <ul class="List-Table">
                    <li><a href="#none"><span>HOT</span>공지사항 제목이 출력됩니다.333</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>3월 31일(금) 새벽시스템점검안내33</a><span class="date">2018-04-01</span></li>
                    <li><a href="#none"><span>HOT</span>설연휴학원고객센터운영안내33</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none"><span>HOT</span>추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                    <li><a href="#none">추석교재배송및고객센터휴무안내33</a><span class="date">2018-03-06</span></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="csCenterBook">
        <ul class="tel">
            <li>
                <div class="nTit">도서 문의 : <span class="tx-main">1544-4944</span></div>
                <div class="nTxt">
                    [운영시간] 평일: 09시~ 18시 (점심시간 12시~13시)<Br>
                    주말/공휴일휴무
                </div>
            </li>
            <li>
                <a href="#none">
                    <img src="https://static.willbes.net/public/images/promotion/m/2012/icon_book_vs.png">
                    <div>
                        1:1 상담
                    </div>
                </a>
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
    $(function() {         
        //도서롤링
        var swiper = new Swiper ('.swiper-container-nBook', { 
            slidesPerView: 'auto',
            spaceBetween: 0, 
            slidesPerGroup: 1,
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
    });
    
    //오늘의책  
    $(document).ready(function() {
        var bookInfo = $("#wsbookInfo").bxSlider({
            mode:'fade',
            auto:true,
            speed:350,
            pause:4000,            
            controls:false,
            minSlides:1,
            maxSlides:1,
            slideMargin:0,
            autoHover:true,
            moveSlides:1,
            touchEnabled : (navigator.maxTouchPoints > 0),
            pagerCustom:'#bx-pager-today',
            pager:true,
        });       

        $("#bookInfoLeft").click(function (){
            bookInfo.goToPrevSlide();
        });
        
        $("#bookInfogRight").click(function (){
            bookInfo.goToNextSlide();
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
<script src="/public/vendor/jquery/bxslider/jquery.bxslider.min.js"></script>
<!--// JAVASCRIPT --></body>
</html>