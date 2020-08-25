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
                    <a href="#none" class="moreMenu">도서<br>구매</a>
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
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>    
                베스트셀러
            </div>
        </div>
    </div>

    <div class="willbes-Lec-Selected NG c_both tx-gray pb20">
        <select id="process" name="process" title="process" class="seleProcess width30p">
            <option selected="selected">최근등록순</option>
            <option value="">상품명순</option>
        </select>
    </div>  

    <div class="bookListWrap">
        <div class="bookList">
            <div class="bookImg"><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2019/304149/book_304149_og.jpg"></a></div>
            <ul class="bookInfo">
                <li class="bookTitle">2019 기태국어 기본이론(어법, 독해)(세트전2권) </li>
                <li><span class="writer">신광은경찰팀 저</span><br><span class="row-line">|</span> 윌비스</li>                
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
                <li>
                    <select id="" name="" class="seleLec width30p ml1p">
                        <option selected="selected">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </li>
                <li>
                    <div class="w-buy">       
                        <ul class="two">
                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                        </ul> 
                    </div>
                </li>
            </ul>
        </div>
        <div class="bookList">
            <div class="bookImg"><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2019/304121/book_304121_og.jpg"></a></div>
            <ul class="bookInfo">
                <li class="bookTitle">2018 9급 오대혁 국어 백발백중 전범위 동형모의고사 665제 </li>
                <li><span class="writer">서울대학교정치외교학부 교수진 저</span><br><span class="row-line">|</span> 윌비스</li>                
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
                <li>
                    <select id="" name="" class="seleLec width30p ml1p">
                        <option selected="selected">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </li>
                <li>
                    <div class="w-buy">       
                        <ul class="two">
                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                        </ul> 
                    </div>
                </li>
            </ul>
        </div>
        <div class="bookList">
            <div class="bookImg"><a href="#none"><img src="https://gosi.willbes.net/public/uploads/wbs/book/2020/307874/book_307874_og.jpg"></a></div>
            <ul class="bookInfo">
                <li class="bookTitle">2017 정채영 국어 마무리시리즈(적중문제편) 100문제만 찍어주마! </li>
                <li><span class="writer">강인엽 저<span><br><span class="row-line">|</span> 윌비스</li>                
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
                <li>
                    <select id="" name="" class="seleLec width30p ml1p">
                        <option selected="selected">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </li>
                <li>
                    <div class="w-buy">       
                        <ul class="two">
                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                        </ul> 
                    </div>
                </li>
            </ul>
        </div>
        <div class="bookList">
            <div class="bookImg"><a href="#none"><img src="https://police.willbes.net/public/uploads/wbs/book/2020/305041/book_305041_og.jpg"></a></div>
            <ul class="bookInfo">
                <li class="bookTitle">2020 강인엽 경찰 면접의 정석2.0</li>
                <li>강인엽 저<br><span class="row-line">|</span> 윌비스</li>                
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
                <li>
                    <select id="" name="" class="seleLec width30p ml1p">
                        <option selected="selected">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </li>
                <li>
                    <div class="w-buy">       
                        <ul class="two">
                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                        </ul> 
                    </div>
                </li>
            </ul>
        </div>
        <div class="bookList">
            <div class="bookImg"><a href="#none"><img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303318/book_303318_og.jpg"></a></div>
            <ul class="bookInfo">
                <li class="bookTitle">2020 강인엽 경찰 면접의 정석2.0</li>
                <li>강인엽 저<br><span class="row-line">|</span> 윌비스</li>                
                <li>[판매중] <span class="tx-blue">31,500원</span> (↓10%)</li>
                <li>
                    <select id="" name="" class="seleLec width30p ml1p">
                        <option selected="selected">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </li>
                <li>
                    <div class="w-buy">       
                        <ul class="two">
                            <li><a href="#none" class="btn_gray">장바구니</a></li>
                            <li><a href="#none" class="btn_blue">바로결제</a></li>
                        </ul> 
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--bookListWrap//-->

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

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