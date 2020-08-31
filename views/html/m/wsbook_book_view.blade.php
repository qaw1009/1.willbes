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
                도서상세
            </div>
        </div>
    </div>

    <div class="wsBookViewWrap">    
        <div class="wsBookView">
            <h5 class="NSK-Black">2020 기특한 국어 전 범위 모의고사 4</h5>
            <div class="wsBookImg">
                <img src="https://pass.willbes.net/public/uploads/wbs/book/2018/303154/book_303154_og.jpg" alt="교재명" title="교재명" />
            </div>
            <div class="wsBookInfo">                
                <ul class="wsBooktxt">
                    <li><strong class="shead">판매가</strong><span><s>12,000원</s> → <strong class="tx-red tx14">10,800원</strong></span></li>
                    <li><strong class="shead">저자명</strong><span>기미진</span><a href="#none" class="another">&gt;</a></li>
                    <li><strong class="shead">출판사</strong><span>배움</span><a href="#none" class="another">&gt;</a></li>
                    <li><strong class="shead">페이지</strong><span>152p</span></li>
                    <li><strong class="shead">ISBN</strong> <span>9791130335087</span></li>
                    <li><strong class="shead">출판일</strong><span>2020-06-16</span></li>
                    <li><strong class="shead">교재판형</strong><span>225*299</span></li>
                    <li><strong class="shead">배송비</strong><span>2,500원</span> </li>
                    <li><strong class="shead">주문수량</strong>
                        <span>
                            <select id="" name="" title="">
                                <option selected="selected">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                            </select>
                        </span>
                    </li>
                    <li class="total NG">총 상품금액 <strong>10,800원</strong></li>
                </ul>
                <div class="wsBook-buyBtn">
                    <ul>
                        <li class="btnAuto h36">
                            <button type="submit" onclick="" class="mem-Btn bg-white bd-light-gray">
                                <span class="tx-black">장바구니</span>
                            </button>
                        </li>
                        <li class="btnAuto h36">
                            <button type="submit" onclick="" class="mem-Btn bg-green bd-green">
                                <span>바로결제</span>
                            </button>
                        </li>
                    </ul>
                </div>                
            </div>                           
        </div>
        <div class="naver">
            네이버페이 영역
        </div>

        <div class="lec-info-tab">
            <ul class="tabWrap">
                <li><a href="#tab01" class="on">도서소개</a></li>
                <li><a href="#tab02">저자소개</a></li>
                <li><a href="#tab03">목차</a></li>
                <li><a href="#tab04">이용안내</a></li>
            </ul>
            <div class="tabBox tabBox2">
                <div id="tab01">
                    제3판 개정의 가장 큰 특징은 관련 쟁점을 묶어서 이해하기 좋게 정리한 것이다. 이런 작업은 많은 곳에서 있었다. 
                    예를 들어 판결서 송달의 효력과 당사자의 불복방법(상소, 추후보완상소⋅재심)이 상황에 따라 각각 다른 주제들에서
                    논의가 되는데, 바로 비교할 수 있도록 한 곳에 모아서 정리를 하였다. 
                    이는 수험준비를 하는 데 분명 많은 도움이 될 것으로 생각된다.
                </div>

                <div id="tab02"> 
                    김유향 변호사<br>
                    서울대학교 경제학부(국제경제) 졸업<br>
                    고려대학교 법과대학원 졸업<br>
                    사법시험 합격/사법연수원 수료<br>
                    서울중앙지방법원 민사조정위원<br>
                    법률실무전문가 양성과정(주최 여성부) 담당교수<br>
                    헌법재판소 국선대리인<br>
                </div>

                <div id="tab03"> 
                    제1장 헌법과 헌법학 2<br>
                    제1절 헌법의 의의와 특성 2<br>
                    제2절 헌법의 해석 2<br>
                    제3절 헌법의 제정⋅개정 6<br>
                    제4절 헌법의 수호 15<br>
                    제2장 대한민국헌법총설 17<br>
                    제1절 한국헌법의 개정 17<br>
                    제2절 헌법의 적용범위 29<br>
                </div>

                <div id="tab04"> 
                    <h4 class="NSK-Black">이용안내</h4>
                    <ul>
                        <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                        <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                        <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                        <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다.</li>
                        <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                        <li>결제 후 주문취소/주소변경이 필요하신 경우 윌스토리 고객센터로 연락주시기 바랍니다.</li>
                        <li>출고 전 주문취소/주소변경은 출고일 오후 2시 이전까지만 가능합니다.</li>
                        <li>결제완료 후 오후 2시 이전에 온라인상으로 환불신청된 건에 한해서만 당일출고가 되지 않습니다.</li>
                        <li class="tx-red">공급사(출판사)및 온라인서점 재고 사정에 의해 결제완료 이후에도 품절/지연될 수 있으며, 품절 시 관련 사항에 대해서는 전화나 문자로 안내드리겠습니다.</li>
                        <li>윌스토리 고객센터(<span class="tx-red">1544-4944</span>) 전화문의는 평일 오전 9시부터 오후12시, 오후 1시부터 오후5시까지입니다. 주말 공휴일 휴무</li>
                    </ul>
                    <h4 class="NSK-Black">교환 및 환불</h4>
                    <ul>
                        <li>도서불량 및 오배송 등의 이유로 반품하실 경우, 반품배송비는 무료입니다.</li>
                        <li>고객님의 변심에 의한 반품, 환불, 교환시 배송비는 고객님 부담입니다.</li>
                        <li>상담원과의 상담 없이 교환 및 반품으로 반송된 도서에 대하여는 책임지지 않습니다.</li>
                        <li>반품 신청시 반송된 도서의 본사 수령 확인 후 환불이 진행됩니다. (카드결제는 카드사 영업일 기준 시일이 3~5일이 소요됩니다.)</li>
                        <li>주문하신 도서의 반품(환불) 및 교환은 교재 결제일로 부터 7일 이내에 온라인상에서 신청 하 실 수 있습니다.</li>
                        <li>도서 환불신청일로 부터 5일 이내 반송 시 환불처리 가능합니다.</li>
                        <li>도서가 훼손되거나 포장이 훼손된 경우 반품 및 교환, 환불이 불가능합니다.</li>
                        <li>반품 또는 교환시 고객님의 사정으로 수거가 지연될 경우에는 반품이 제한될 수 있습니다.</li>
                    </ul>
                    <h4 class="NSK-Black">배송안내</h4>
                    <ul>
                        <li>평일 오후 2시 이전 결제완료건 : 당일 출고 (도서 공급 및 재고 사정으로 지연될 수 있습니다.)</li>
                        <li>평일 오후 2시 이후 결제완료건 : 익일 출고 (금요일 오후2시 이후 결제완료건은 차주 월요일 출고)</li>
                        <li>출고 후 1일~3일(72시간) 내 수령 가능하며, 발송일 오후 6시부터 배송조회가 가능합니다.</li>
                        <li>배송조회 : “내강의실 >결제관리 >주문/배송조회”에서 확인할 수 있습니다</li>
                        <li class="tx-red">네이버페이로 결제시 도서 주문내역은 네이버쇼핑(네이버페이) 주문조회에서 확인가능합니다.</li>
                        <li>배송 방법 : 택배 (배송업체-CJ대한통운)</li>
                        <li>배송 지역 : 전국지역 (군부대, 해외배송 제한)</li>
                        <li>배송 비용 : 2,500원 (30,000원 이상 구매시 무료배송)<br>
                            ※ 최초 도서결제 후 묶음 배송을 위한 추가 결제 불가
                        <li>도서산간지방은 추가 배송비가 발생할 수 있습니다.</li>
                        <li>군부대 지역의 경우 해당 군부대에 CJ대한통운 택배배송이 되는지 먼저 확인 후 주문을 해주시기 바랍니다. 
                            일부 군부대 지역은 우체국 택배를 제외한 타택배사는 출입이 제한이 될 수 있습니다. (군부대 사서함 주소 사용 시 배송제한)<br>
                            ※ 유의사항 : 군부대 지역 배송 시 우체국 사서함 주소지를 제외하고, 정확한 지번/도로명 주소, 부대명칭 등 을 기재해 주셔야 합니다.<br>
                            예) 경기도 00군 00리 00번지(00도로명) 0000부대(사단, 연대, 대대 등) 00중대 일병 000</li>
                        <li>배송기간 : 발송일로부터 1일~3일(72시간) [도서산간 지방은 2~3일 추가 소요]
                            ※ 익일 배송완료를 원칙으로 하지만 택배사 사정에 따라 배송이 지연 될 수 있습니다.</li>
                    </ul>
                </div>
            </div>
        </div>        
    </div>

    <div class="lec-btns w50p">
        <ul>
            <li><a href="#none" class="btn-purple">장바구니</a></li>
            <li><a href="#none" class="btn-purple-line">바로결제</a></li>
        </ul>
    </div>

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