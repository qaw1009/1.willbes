@extends('willbes.pc.layouts.master')

@section('content')
<link href="/public/css/willbes/style_hanlim.css?ver={{time()}}" rel="stylesheet">
<style>
.hanlim3094 .Depth .depth:last-child strong {
    color: #b85712;
}

/* Main Container : MainVisual */
.hanlim3094 .MainVisual {
    position: relative;
    width: 1120px;
    margin:40px auto 0;
}

.hanlim3094 .VisualBox {
    width:1120px;  
    height: 360px;
    overflow: hidden;
  }
  
.hanlim3094 .VisualBox .bx-wrapper .bx-controls-auto {
    left:20px;
    bottom: 20px;
    width: 50px;
    z-index: 90;
}
.hanlim3094 .VisualBox .bx-wrapper .bx-pager {
    width: auto;
    left:60px;
    bottom: 22px;
    text-align: left;
    z-index: 90;
}
.hanlim3094 .VisualBox .bx-wrapper .bx-pager.bx-default-pager a {
    background: #cecece;
  }


.hanlim3094 .bnSt02 {
   margin-top:20px; display:flex; justify-content: space-between;
}

.hanlim3094 .bnSt02 .bx-wrapper .bx-pager {
    width: auto;
    left:60px;
    bottom: 20px;
    text-align: right;
    z-index: 90;
}
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager.bx-default-pager a {
    background: #cecece;
    height: 8px;
    margin: 0 2px;
}

.hanlim3094 .bnLeft {width:720px; height:90px; overflow: hidden; border-radius:12px; margin-right:20px}
.hanlim3094 .bnRight {width:380px; height:90px; overflow: hidden; border-radius:12px;}
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager {
    width: auto;
    left: 20px;
    bottom: 10px;
    text-align: left;
}
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager.bx-default-pager a {
    background: #cecece;
}
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager.bx-default-pager a.active,
.hanlim3094 .bnSt02 .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #b85712 !important;
}
.hanlim3094 .Section.barBnr {
    background: none;
    margin-top: 50px;
}

/* Main Container : Prof */
.hanlim3094 .PBcts li {
    display: inline;
    float: left;
    width: 274px;
    height: 234px;
    overflow: hidden;
    margin-left: 8px;
}

.hanlim3094 .PBcts li:first-child {
    margin-left: 0;
}

.hanlim3094 .PBcts:after {
    content: "";
    display: block;
    clear: both;
}

.hanlim3094 .PBcts .bSlider .bx-wrapper .bx-pager {
    float: left;
    width: auto;
    left: 0;
    bottom: 10px;
    text-align: center;
}

.hanlim3094 .PBcts .bSlider .bx-wrapper .bx-pager.bx-default-pager a {
    background: #cecece;
}

.hanlim3094 .PBcts .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
.hanlim3094 .PBcts .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.hanlim3094 .PBcts .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #b85712 !important;
}




.Section1 .preview {
    margin-top: 30px
}

.Section1 .preview .previewBox {
    position: relative;
    height: 250px;
    width: 1120px;
    margin: 0 auto;
}

.Section1 .preview .pvslider {
    width: 1120px;
    margin: 0 auto;
    height: 250px;
    overflow: hidden;
}

.Section1 .preview .pvslider li {
    display: inline;
    float: left;
    overflow: hidden;
    position: relative;
}

.Section1 .preview .pvslider li a {
    display: block;
    width: 357px;
    height: 250px;
    overflow: hidden;
    background:url("https://static.willbes.net/public/images/promotion/main/2005/btn_play.jpg") no-repeat;
    color: #fff
}

.Section1 .preview .pvslider li a img {
    position: absolute;
    bottom: 0;
    right: 0;
    -webkit-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, .5));
    -moz-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, .5));
    -ms-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, .5));
    -o-filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, .5));
    filter: drop-shadow(5px 5px 10px rgba(0, 0, 0, .5));
    -ms-transform: scale(1);
    -webkit-transform: scale(1);
    transform: scale(1);
    transition: 0.2s all ease;
    -webkit-transition: 0.2s all ease;
    -moz-transition: 0.2s all ease;
    -ms-transition: 0.2s all ease;
    -o-transition: 0.2s all ease;
}

.Section1 .preview .pvslider li a:hover img {
    -ms-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    transition: 0.2s all ease;
    -webkit-transition: 0.2s all ease;
    -moz-transition: 0.2s all ease;
    -ms-transition: 0.2s all ease;
    -o-transition: 0.2s all ease;
}

.Section1 .preview .pvslider li a div {
    position: absolute;
    top: 40px;
    left: 25px;
    width: 60%;
    font-size: 14px;
    text-align: left;
    z-index: 5;
    line-height: 1.5;
}

.Section1 .preview .pvslider li a div strong {
    display: block;
    font-size: 18px;
    font-weight: 600;
    margin-top: 10px
}

.Section1 .preview .pvslider:after {
    content: "";
    display: block;
    clear: both
}

.Section1 .preview .previewBox p {
    position: absolute;
    top: 50%;
    margin-top: -22px;
    width: 44px;
    height: 45px;
    z-index: 10
}

.Section1 .preview .previewBox p.leftBtn {
    left: -30px
}

.Section1 .preview .previewBox p.rightBtn {
    right: -50px
}


/**/
.hanlim3094 .Section .willbesLec {
    width: 614px;
    float: left;
}

.hanlim3094 .smallTit {
    border-top: 1px solid #000;
    font-size: 22px;
    color: #363636;
    position: relative;
}

.hanlim3094 .smallTit p {
    position: absolute;
    top: -15px;
    text-align: left;
    width: 100%;
}

.hanlim3094 .smallTit p a {
    vertical-align: top;
    margin-left: 10px
}

.hanlim3094 .smallTit span {
    font-weight: 600;
    background: #fff;
    padding: 0 20px 0 0;
}

.hanlim3094 .smallTit strong {
    color: #b85712;
}

.hanlim3094 .will-listTit {
    margin-bottom: 15px;
    color: #181818;
    border-bottom:2px solid #111;
    padding-bottom:15px
}


/* Main Container : Notice : noticeTabs */
.hanlim3094 .noticeTabs {
    width: 345px !important;
    float: left;
    margin-right: 40px;
}

.hanlim3094 .tabBox.noticeBox {
    margin-top: -30px;
}

.hanlim3094 .tabBox.noticeBox a.btn-add {
    position: absolute;
    top: -16px;
    right: 0;
}

.hanlim3094 .tabBox.noticeBox .List-Table {
    width: 100%;
}

.hanlim3094 .tabBox.noticeBox .List-Table li {
    position: relative;
    font-size: 13px;
    color: #3a3a3a;
    height: 37px;
    line-height: 37px;
    border-bottom: 1px solid #e3e3e3;
}

.hanlim3094 .tabBox.noticeBox .List-Table li a {
    display: inline-block;
    width: 80%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    letter-spacing: 0;
}

.hanlim3094 .tabBox.noticeBox .List-Table li a span {
    background: #b85712;
    color: #fff;
    padding: 0 10px;
    border-radius: 10px;
    margin-right: 5px;
}

.hanlim3094 .willbesNumber ul li {
    margin-left: 40px;
    vertical-align: top;
}

/* Main Container */
.hanlim3094 .tx-color {
    color: #b85712;
}

.hanlim3094 .Section1 {
    background: #f8f8f8;
    padding: 90px 0 120px;
}

.hanlim3094 .copyTit {
    font-size: 33px;
    color: #363636;
    line-height: 1.2;
    text-align: left;
}

.hanlim3094 .copyTit strong {
    vertical-align: baseline;
    color: #000;
}

.hanlim3094 .copyTit span {
    color: #b85712;
    vertical-align: baseline;
}

.hanlim3094 .List-Table li a img,
.hanlim3094 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
.hanlim3094 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.hanlim3094 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus,
.hanlim3094 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a:hover,
.hanlim3094 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.hanlim3094 .bSlider.blueSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #b85712;
}

.hanlim3094 .Section .SpecialBox li {
    display: inline;
    float: left;
    width: 216px;
    height: 143px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.hanlim3094 .Section .SpecialBox li:nth-child(5),
.hanlim3094 .Section .SpecialBox li:last-child {
    margin-right: 0;
}

.hanlim3094 .Section .SpecialBox ul:after {
    content: '';
    display: block;
    clear: both;
    List-Table
}

/* Main Container : QuickMenu*/
.hanlim3094 .MainQuickMenu {
    position: fixed;
    top: 180px;
    right: 10px;
    width: 160px;
    height: auto;
    z-index: 100;
}

.hanlim3094 .MainQuickMenu ul {
    padding: 0 8px !important;
    background: #ececec;
    width: 100%;
}

.hanlim3094 .MainQuickMenu li {
    border-top: 1px solid #f6f6f6;
    border-bottom: 1px solid #d4d4d4;
    height: 40px;
    line-height: 40px;
    background: url("../../img/willbes/cop_acad/icon_arrow02.png") no-repeat 95% center;
    margin: 0;
}

.hanlim3094 .MainQuickMenu li:first-child {
    border-top: 0;
}

.hanlim3094 .MainQuickMenu li:last-child {
    border-bottom: 0;
}

.hanlim3094 .MainQuickMenu li a {
    display: block;
    padding-left: 30px;
}

.hanlim3094 .MainQuickMenu li a:hover {
    color: #00acec;
}

.hanlim3094 .MainQuickMenu li:nth-child(1) a {
    background: url("../../img/willbes/cop_acad/icon_rq07.png") no-repeat 3px center;
}

.hanlim3094 .MainQuickMenu li:nth-child(2) a {
    background: url("../../img/willbes/cop_acad/icon_rq02.png") no-repeat 3px center;
}

.hanlim3094 .MainQuickMenu li:nth-child(3) a {
    background: url("../../img/willbes/cop_acad/icon_rq03.png") no-repeat 3px center;
}

.hanlim3094 .MainQuickMenu li:nth-child(4) a {
    background: url("../../img/willbes/cop_acad/icon_rq09.png") no-repeat 3px center;
}


.lecBanner {
	background:#f4f4f4;
	padding: 90px 0;
}

.lecBanner .copyTit {
	text-shadow: 5px 5px 5px 1px rgba(0, 0, 0, 0.3);
    text-align:left
}

.lecBanner li {
	display: inline;
	float: left;
	width: 25%;
	text-align: center;
	margin-bottom: 20px;
}

.lecBanner li a {
	display: block;
	width: 260px;
	margin: 0 auto;
	height: 325px;
	transition: opacity 0.4s ease-in-out;
}

.lecBanner li a img {
	width: 100%;
}

.lecBanner li a:hover {
	-webkit-box-shadow: 10px 10px 20px 1px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 10px 10px 20px 1px rgba(0, 0, 0, 0.5);
	box-shadow: 10px 10px 20px 1px rgba(0, 0, 0, 0.5);
}

.lecBanner ul:hover a:not(:hover) {
	opacity: 0.4;
}

</style>
<!-- Container -->

<div id="Container" class="Container hanlim hanlim3094 NSK c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">고등고시<span class="row-line">|</span></li>
                <li class="subTit">5급행정(입법고시)</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">교수진소개 메인</li>
                            <li><a href="#none">신규강좌게시판</li>
                            <li><a href="#none">경제학</a></li>
                            <li><a href="#none">행정법</a></li>
                            <li><a href="#none">행정학</a></li>
                            <li><a href="#none">정치학</a></li>
                            <li><a href="#none">국제법</a></li>
                            <li><a href="#none">재정학</a></li>
                            <li><a href="#none">정책학</a></li>
                            <li><a href="#none">정보체계론</a></li>
                            <li><a href="#none">국제경제학</a></li>
                            <li><a href="#none">교육학</a></li>
                            <li><a href="#none">PSAT</a></li>
                            <li><a href="#none">영어</a></li>
                            <li><a href="#none">한국사능력검정시험</a></li>
                            <li class="Tit">교수님 홈</li>
                            <li><a href="#none">개설강좌</a></li>
                            <li><a href="#none">무료강좌</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">학습자료실</a></li>
                            <li><a href="#none">수강후기</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">학원강의신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">학원강의신청</a></li>
                            <li><a href="#none">방문결제접수</a></li>
                            <li><a href="#none">학원공지사항</a></li>
                            <li><a href="#none">강의실배정표</a></li>
                            <li><a href="#none">강의시간표</a></li>
                            <li><a href="#none">강의자료실</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">전국모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#none">온라인수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">단강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">수험정보</a></li>
                            <li><a href="#none">학습가이드</a></li>
                            <li><a href="#none">시험통계</a></li>
                            <li><a href="#none">수험 FAQ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
                <li class="dropdown">
                    <a href="#none">고객센터</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li><a href="#none">고객센터 HOME</a></li>
                            <li><a href="#none">자주하는 질문</a></li>
                            <li><a href="#none">공지사항</a></li>
                            <li><a href="#none">1:1 상담</a></li>
                            <li class="Tit">수강지원</li>
                            <li><a href="#none">PC원격지원</a></li>
                            <li><a href="#none">학습프로그램설치</a></li>
                        </ul>
                    </div>
                </li>
                <li class="gosi">
                    <a href="#none" target="_self">
                        학원 방문 결제 
                        <span class="arrow-Btn">></span>
                    </a>
                </li>
            </ul>
        </h3>
    </div>


    <div class="Section">        
        <div class="MainVisual NSK">            
            <div class="VisualBox">
                <div class="bSlider">
                    <div class="sliderStopAutoPager">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_1120x360_03.jpg" alt="배너명"></a></div>
                    </div>
                </div>
            </div>   
        </div>
    </div>

    
    <div class="Section">
        <div class="widthAuto bnSt02">
            <div class="bSlider bnLeft">                    
                <div class="slider">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_02.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_720x90_03.jpg" alt="배너명"></a></div>
                </div>
            </div>   
            <div class="bSlider bnRight">
                <div class="slider">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_02.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_380x90_03.jpg" alt="배너명"></a></div>
                </div>
            </div>   
        </div>
    </div> 

    <div class="Section mt50">
        <div class="widthAuto"> 
            <div class="noticeTabs">
                <div class="will-listTit">학원 공지사항</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="noticeTabs">
                <div class="will-listTit">동영상 공지사항</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none"><span>EVENT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none"><span>EVENT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="noticeTabs mr-zero">
                <div class="will-listTit">강의계획서</div>
                <div class="tabBox noticeBox">
                    <div class="tabContent p_re">
                        <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                        <ul class="List-Table">
                            <li><a href="#none">2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="Section mt50">
        <div class="goMenuBtns">
            <ul id="goMenuBtns">
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon01.png" alt=""><span>학원공지사항</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon02.png" alt=""><span>학원수강신청</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon03.png" alt=""><span>학원보강</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon04.png" alt=""><span>강의실배정표</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon05.png" alt=""><span>신규동영상안내</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon06.png" alt=""><span>무료특강</span></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/2005_icon07.png" alt=""><span>강의자료실</span></a></li>
            </ul>
        </div>
    </div>

    <div class="Section lecBanner mt50">
        <div class="widthAuto">
            <div class="copyTit NSK-Thin mb50">
                꿈을 향한 소중한 첫 걸음부터 합격의 순간까지!<br />
                <strong class="NSK-Black">32년을 이어온 대표전문학원, 윌비스 한림법학원이 함께 합니다!!</strong>
            </div>
            <ul>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_01.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_02.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_01.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_02.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_02.jpg" alt="배너명"></a></li>
                <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2005/3094/bn_260x325_01.jpg" alt="배너명"></a></li>                
            </ul>
        </div>
    </div>

    {{--이달의 강의 / 강의맛보기 --}}
    <div class="Section Section1">
        <div class="widthAuto">
            <div class="copyTit">
                WILLBES 한림법학원 <strong class="NSK-Black">이달의 강의</strong>
            </div>
            <div class="thisMonth NSK">
                <div class="thisMonthBox">
                    <ul class="tmslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div>
                                    미시경제학 3대 難題 복습 특강
                                    <span class="NSK-Black">황종휴<span>
                                </div>
                                <div>경제학을 위한 기초수학 동영상 무료업로드!</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div>
                                    행정법 예비순환
                                    <span class="NSK-Black">김정일</span>
                                </div>
                                <div>기본서(행정법강의)를 중심으로 행정법의 전체흐름과 주요내용을 학습, 법학의 기초개념을 마스터하고</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div>
                                    2020 행정법 GS3순환
                                    <span class="NSK-Black">박도원</span>
                                </div>
                                <div>행정법 GS3순환(미시+거시) + 매일모의고사추가</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div>
                                    경제학 예비순환
                                    <span class="NSK-Black">김기홍</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div>
                                    경제학 예비순환
                                    <span class="NSK-Black">이동호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div>
                                    경제학 예비순환
                                    <span class="NSK-Black">최승호</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50852/prof_index_50852_1586137263.png">
                                <div>
                                    경제학 예비순환
                                    <span class="NSK-Black">안진우</span>
                                </div>
                                <div>경제학 10개년 기출문제 연도별 해설특강(2019년기출..</div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                 
                </div>
            </div>

            <div class="copyTit mt100">
                윌비스 <strong class="NSK-Black">대표 강의 맛보기</strong>
            </div>
            <div class="preview NSK">
                <div class="previewBox">
                    <ul class="pvslider">
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50769/prof_index_50769.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50837/prof_index_50837.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50838/prof_index_50838.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50839/prof_index_50839_1578624621.png">
                                <div>
                                    오리엔테이션, 무역모형기초 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50841/prof_index_50841.png">
                                <div>
                                    09월 04일 : 2019 학제통합논술Ⅰ~ 학논Ⅱ2-1문 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#none">
                                <img src="https://gosi.willbes.net/public/uploads/willbes/professor/50848/prof_index_50848.png">
                                <div>
                                    03월 27일 : 제 10회 모의고사 1회 1강
                                    <strong>국제경제학 황종휴</strong>
                                </div>
                            </a>
                        </li>
                    </ul>  
                    <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowL.png"></a></p>
                    <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/btn_arrowR.png"></a></p>                
                </div>
            </div>
        </div>
    </div>       
    
    <div class="Section Section4_hl mt50">
        <div class="widthAuto">
            <div class="will-acadTit">윌비스 <span class="tx-color">고등고시</span> 학원</div>
            <div class="noticeTabs campus c_both">
                <ul class="tabWrap noticeWrap_campus">
                    <li><a href="#campus1" class="on">신림(본원)</a><span class="row-line">|</span></li>
                    <li><a href="#campus2" class="">강남(분원)</a></li>
                </ul>
                <div class="tabBox noticeBox_campus">
                    <div id="campus1" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map01.jpg" alt="신림(본원)">
                            <span class="origin">신림(본원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">신림(본원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 관악구 신림로 23길 16 일성트루엘 4층<br/>
                                                (신림동 1523-1)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1881</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 신림동 //-->

                    <div id="campus2" class="tabContent">
                        <div class="map_img">
                            <img src="https://static.willbes.net/public/images/promotion/main/2010_map02.jpg" alt="강남(분원)">
                            <span>강남(분원)</span>
                        </div>
                        <div class="campus_info">
                            <dl>
                                <dt>
                                    <div class="c-tit"><span class="tx-color">강남(분원)</span> 학원 오시는 길</div>
                                    <div class="c-info">
                                        <div class="address">
                                            <span class="a-tit">주소</span>
                                            <span>
                                                서울 강남구 테헤란로19길 18<br>
                                                (역삼동 645-12)
                                            </span>
                                        </div>
                                        <div class="tel">
                                            <span class="a-tit">연락처</span>
                                            <span class="tx-color">1544-1661</span>
                                        </div>
                                    </div>
                                </dt>
                            </dl>
                            <div class="btn NSK-Black">
                                <a href="{{ site_url('/pass/support/qna/index?on_off_link_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}x">1:1 상담신청</a>
                            </div>
                        </div>
                    </div>
                    <!-- 강남 //-->
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt90 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1566-4770 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    주말/공휴일 휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    주말/공휴일 휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-1881 <span>▶</span> 1</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    월 ~ 토요일 : 8시 ~ 19시<br/>
                                    일요일 : 8시 ~ 18시
                                </div>
                            </li>
                        </ul>
                    </dt>
                    <dt class="willbesCenter">
                        <div class="centerTit">윌비스 고등고시 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="{{ site_url('/support/faq/index') }}">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">학원<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_url('/support/qna/index?s_cate_code=' . $__cfg['CateCode'] . '&s_cate_code_disabled=Y') }}">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ site_url('/support/remote/index') }}">
                                    <img src="{{ img_url('cop/icon_cecenter4.png') }}">
                                    <div class="nTxt">1:1<br/>고객지원</div>
                                </a>
                            </li>
                        </ul>
                    </dt>
                </dl>
            </div>          
        </div>
    </div>
    <!-- CS센터 //-->

    <div id="QuickMenu" class="MainQuickMenu">
        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2000_sky01.jpg" alt="학원보강"></a></div> 
        <div class="mt5"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2000_sky02.jpg" alt="학원 1:1상담"></a></div>  
        <ul>
            <li><a href="#none">강의 계획서</a></li>
            <li><a href="#none">강의 시간표</a></li>
            <li><a href="#none">강의실 배정표</a></li>
            <li><a href="#none">학원 할인정책</a></li>
        </ul>
    </div>

</div>

<!-- End Container -->
<script type="text/javascript">
    //바로가기 스크롤 배너
    $('*[id*=goMenuBtns]:visible').ready(function () {
        var stickyOffset = $('.goMenuBtns').offset();

        if (typeof stickyOffset !== 'undefined') {
            $(window).scroll(function () {
                if ($(document).scrollTop() > stickyOffset.top) {
                    $('.goMenuBtns').addClass('fixed');
                } else {
                    $('.goMenuBtns').removeClass('fixed');
                }
            });
        }
    });  

    $(function() {
        var slidesImg = $(".tmslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:4,
            maxSlides:4,
            slideWidth: 274,
            slideMargin:8,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft").click(function (){
            slidesImg.goToPrevSlide();
        });

        $("#imgBannerRight").click(function (){
            slidesImg.goToNextSlide();
        });
    });

    $(function() {
        var slidesImg1 = $(".pvslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 357,
            slideMargin:20,
            autoHover: true,
            moveSlides:1,
            pager:true,
        });
        $("#imgBannerLeft1").click(function (){
            slidesImg1.goToPrevSlide();
        });

        $("#imgBannerRight1").click(function (){
            slidesImg1.goToNextSlide();
        });
    });
</script>
@stop