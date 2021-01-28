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
                <h2 class="NGEB"><img src="/public/img/willbes/m/main/icon_book.png" class="clogo">임용</h2>
                <ul class="NGEB">
                    <li class="ListBox">
                        <div class="List">보강신청</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">무료강의</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">FAQ</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">1:1 상담</div>
                    </li>
                    <li class="ListBox">
                        <div class="List">오시는길</div>
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
                    <a href="#none" class="siteTitle NSK-Black">임용</span></a>
                </div>   
                <button type="button" class="classroom">
                    <span>강의실배정표</span>
                </button>      
                <button type="button" class="basket">
                    <span class="hidden">장바구니</span>
                </button>                
            </div>                     
        </div>

        <div class="dday NSK">
            <strong class="NSK-Black">D-day</strong> 유초등 <span>D-050</span>  · 중등 <span>D-064</span>
        </div>

        <div class="subMenuBox c_both">
            <ul class="subMenu">
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">나의<br>강의실</a>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">강의/<br>교재신청</a>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">학원<br>정보</a>
                </li>
                <li class="sMenuList">
                    <a href="#none" class="moreMenu">고객<br>센터</a>                     
                </li>
            </ul>                
        </div> 
       
    </div>    
</div>

<!-- Container -->
<div id="Container" class="Container NSK ssam mb40">  
    <div class="MainSlider swiper-container swiper-container-page">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_01.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_02.jpg"></div>
            <div class="swiper-slide"><img src="https://static.willbes.net/public/images/promotion/m/2012/wsbook_720x400_03.jpg"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
        
    <div class="mainTit mt30 NSK-Black p_re">윌비스 임용 <span class="tx-main">수강후기</span>
        <div class="goBtns NSK">
            <ul>
                <li><a href="#none">합격수기 ></a></li>
                <li><a href="#none" onclick="openWin('LayerReply'),openWin('Reply')">수강후기 ></a></li>
            </ul>
        </div>
    </div>
    <div class="replyBox mt10">       
        <div class="swiper-container-reply">
            <div class="swiper-wrapper review">
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="reviewInfo">
                            도덕윤리 <span>|</span> 김병찬<br>
                            2019 (9~10월) 모의고사반
                        </div>
                        <div class="title"><img src="/public/img/willbes/sub/star5.gif"/><span>황성*</span></div>
                        <div class="reviewTxt">
                            입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                            그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                            직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                            너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                            1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                            다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                            교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        </div>                                
                    </a>                
                </div>  
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="reviewInfo">
                            전공영어 <span>|</span> 공훈<br>
                            2019 11월 공훈 영교론/영어학 최종모의고사반
                        </div>
                        <div class="title"><img src="/public/img/willbes/sub/star3.gif"/><span>황진*</span></div>
                        <div class="reviewTxt">
                            입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                            그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                            직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                            너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                            1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                            다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                            교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        </div>                                
                    </a>                
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="reviewInfo">
                            도덕윤리 <span>|</span> 김병찬<br>
                            2019 (9~10월) 모의고사반
                        </div>
                        <div class="title"><img src="/public/img/willbes/sub/star5.gif"/><span>황성*</span></div>
                        <div class="reviewTxt">
                            입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                            그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                            직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                            너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                            1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                            다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                            교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        </div>                                
                    </a>                
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="reviewInfo">
                            도덕윤리 <span>|</span> 김병찬<br>
                            2019 (9~10월) 모의고사반
                        </div>
                        <div class="title"><img src="/public/img/willbes/sub/star5.gif"/><span>황성*</span></div>
                        <div class="reviewTxt">
                            입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                            그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                            직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                            너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                            1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                            다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                            교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        </div>                                
                    </a>                
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <div class="reviewInfo">
                            전공국어 <span>|</span> 권보민<br>
                            2019 9~10월 국어문법 실전모의고사반
                        </div>
                        <div class="title"><img src="/public/img/willbes/sub/star2.gif"/><span>홍길*</span></div>
                        <div class="reviewTxt">
                            입학할때 부터 학교 선배들도 항상 김병찬교수님 강의를 듣고 있었고 사물함엔 김병찬 교수님 교재로 빼곡했습니다.
                            그냥 당연히 임용준비하는 사람은 다 듣는가보다 하고 자연스레 4학년때 김병찬 교수님 직강을 신청하여 듣게됐습니다.
                            직접 들어보니 정말 대단하시다는 생각이 들었습니다. 흐름에 맞춰 개념정리를 쭈~욱 해주시는데 들어주시는 예시들도
                            너무 적절했고 어려운 학자들도 이해가 잘됐습니다. 무엇보다도 교수님 강의의 가장 큰 장점은 확실한 반복적 학습인것 같습니다. 
                            1년 패키지를 듣게되면 강의마다 총 4번의 복습을 거치게 돼있습니다. 개념정리, 기출분석, 문제풀이, 모의고사 각각 
                            다른 수업같지만 그 주제에 맞춰 이론을 시간내에 최소 4번 복습할 수 있습니다. 작년 초수에 수업도 들으면서 교생도 나가고 시간이 없어서 원문, 
                            교과서 거의 못봤지만 교수님 강의듣고 복습하고 시키시는대로 (?) 해서 1차 합격했습니다!
                        </div>                                
                    </a>                
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div> 

    <div class="noticeTabs c_both mt30">
        <ul class="tabWrap mainTab">
            <li><a href="#notice1" class="on">공지사항</a></li>
            <li><a href="#notice2">강의업데이트</a></li>
            <li><a href="#notice3">이벤트</a></li>
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

    <div class="mainTit NSK-Black tx-center">          
        윌비스 임용 <span class="tx-main">실시간 인기강의 TOP3</span>           
    </div>
    <div class="reference">* 접속 시간 기준, 24시간 내 홈페이지 강의 결제 순</div>
    <ul class="bestLecBoxV2">
        <li class="bestLec">                    
            <a href="#none">
                <ul class="lecinfo">
                    <li class="NSK-Black"><span class="NSK">유아</span><br>민정선 <span class="prof">교수</span></li>
                    <li><strong>이론반</strong></li>
                </ul>                                 
            </a>  
            <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/m/2018/bestLec01.jpg" title="교수명"></div>
            <div class="best NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/2018/rank01.png" ></div>                         
        </li>
        <li class="bestLec">                       
            <a href="#none">
                <ul class="lecinfo">
                    <li class="NSK-Black"><span class="NSK">중등</span><br>다이애나 <span class="prof">교수</span></li>
                    <li><strong>기출문제풀이</strong></li>
                </ul>                                    
            </a>
            <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/m/2018/bestLec02.jpg" title="교수명"></div>
            <div class="best NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/2018/rank02.png" ></div>
        </li>
        <li class="bestLec">                    
            <a href="#none">
                <ul class="lecinfo">
                    <li class="NSK-Black"><span class="NSK">유아</span><br>민정선 <span class="prof">교수</span></li>
                    <li><strong>이론반</strong></li>
                </ul>                                       
            </a>
            <div class="profImg"><img src="https://static.willbes.net/public/images/promotion/m/2018/bestLec03.jpg" title="교수명"></div>
            <div class="best NSK-Black"><img src="https://static.willbes.net/public/images/promotion/m/2018/rank03.png" ></div>
        </li>
    </ul>

    <div class="mainTit NSK-Black  tx-center mt60" >윌비스 임용 <span class="tx-main">대표 강의 맛보기</span></div>    
    <div class="sampleViewImg">
        <div class="swiper-container-view">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/m/2017/2017_lec_mjs.jpg" title="교수명">
                    </a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    
    {{--
    <div class="sampleView">
        <div class="overhidden">
            <div class="swiper-container-view">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                                유아<span></span><strong>민정선 민정선 민정선</strong>
                                <p>2020년 1~2월 유아교육개론</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/lec_list_50837.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>김정일 2</strong>
                                <p>행정법 원론강의 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/lec_list_50838.png" alt="강사명">
                            <div>
                                행정법<span></span><strong>박도원 3</strong>
                                <p>행정법 GS3순환 </p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50836/lec_list_50836.png" alt="강사명">
                            <div>
                                행정학<span></span><strong>백승준 4</strong>
                                <p>2020 행정학 예비순환 오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 5</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 6</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 7</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 8</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 7</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                    <div class="swiper-slide">
                        <a href="#none">
                            <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/lec_list_50769.png" alt="강사명">
                            <div>
                            경제학<span></span><strong>황종휴 8</strong>
                            <p>오리엔테이션, 무역모형기초 1회 1강</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    --}}    

    <div class="mainTit NSK-Black  tx-center mt50" >윌비스 임용 <span class="tx-main">시험 정보</span></div>
    <div class="w-Guide-Ssam mt20">
        <div class="NG ssamInfoMenu">
            <ul class="tabShow tabinfo">
                <li><a href="#infoTab01" class="on">최근<br>10년동향</a><li>
                <li><a href="#infoTab02">임용<br>시험제도</a><li>                
                <li><a href="#infoTab03">지역별<br>공고문</a><li>
                <li class="one"><a href="#infoTab04">자료실</a><li>
            </ul>
        </div>
        <div id="infoTab01">
            @include('html.m.guide_3134_02_inc')              
        </div>
        <div id="infoTab02">
            @include('html.m.guide_3134_01_inc')              
        </div>        
        <div id="infoTab03">
            @include('html.m.guide_3134_03_inc')              
        </div>
        <div id="infoTab04">
            @include('html.m.guide_3134_04_inc')              
        </div>
    </div>

    <div class="ssamEtc mt50 c_both">
        <a href="#none">대학특강문의</a>
        <a href="#none">교수채용</a>
        <a href="#none">오시는길</a>
    </div>

    <div class="csCenter">
        <ul class="tel">
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>강의 문의</strong>
                        <span><a href="tel:1544-3169">1544-3169</a></span>
                        09시~ 22시
                    </div>
                </div>
            </li>
            <li>
                <div class="goTel">
                    <img src="{{ img_url('m/main/icon_tel.png') }}">
                    <div>
                        <strong>교재배송문의</strong>
                        <span><a href="tel:1544-4944">1544-4944</a></span>
                        평일 09시~ 17시
                    </div>
                </div>
            </li>
        </ul>
    </div> 

</div>
<!-- End Container -->
    <script>
        $(function() {
            //수강후기
            var swiper_review = new Swiper ('.swiper-container-reply', {
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

            //맛보기강의
            var swiper = new Swiper('.swiper-container-view', {
                slidesPerView: 1,
                slidesPerColumn: 5,
                spaceBetween: 5,
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