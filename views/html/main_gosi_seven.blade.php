@extends('willbes.pc.layouts.master')

@section('content')
<style>
.gosi .tx-color {
    color: #ba5610;
}
.gosi .will-nTit {border:0; font-size:46px}
.gosi .will-nTit span {color:#ba5610}

.gosi .Menu h3 {border:0}

/**/
.gosi-bnfull-Sec {position:relative; margin:0; height: 90px !important;}
.gosi-bnfull {position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 90px; 
    overflow: hidden;}    
.gosi-bnfull .bx-wrapper .sliderBar img {width:2000px !important; height:90px}

/*상단 메인 배너*//
.gosi .gosi-Sec {
    width: 100%;
    max-width: 2000px;        
}
.gosi .gosi-bntop {position:relative; margin:0; height: 460px !important;}
.gosi .gosi-bntop .GositabBox {
    position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 460px; 
    overflow: hidden;
}

.gosi .gosi-bntop .GositabBox p {position:absolute; top:50%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.2; filter:alpha(opacity=20);}
.gosi .gosi-bntop .GositabBox p a {display:none;}
.gosi .gosi-bntop .GositabBox p.leftBtn {margin-left:-620px;}
.gosi .gosi-bntop .GositabBox p.rightBtn {margin-left:588px; background-position: right center;}	
.gosi .gosi-bntop .GositabBox p:hover {opacity:100; filter:alpha(opacity=100);}

.gosi .gosi-bntop .GositabList {
    position: absolute;
    top:404px;
    width:100%;
    z-index: 50;
    background-color: rgba(0,0,0,0.5);
    padding:10px 0;
}

.gosi .gosi-bntop .Gositab {width:1120px; margin:0 auto; text-align:center}
.gosi .gosi-bntop .Gositab:after {content:""; display:block; clear:both}
.gosi .gosi-bntop .Gositab li {display:inline-block;  width: calc(11.11111% - 2px);}   
.gosi .gosi-bntop .Gositab li a {display:block; text-align:center; line-height:1.2; font-size: 15px; color:#b4b4b4;}
.gosi .gosi-bntop .Gositab li a:hover,
.gosi .gosi-bntop .Gositab li a.active {color:#fff; font-weight: bold;}

/**/
.gosi .gosi-bn02 {margin-top:100px}
.gosi .gosi-bn02 ul {margin-right:-20px}
.gosi .gosi-bn02 li {
    display: inline;
    float: left;    
    width: 265px;       
    margin-right:20px;
}
.gosi .gosi-bn02 ul:after {
    content: "";
    display: block;
    clear: both;
}
.gosi .gosi-bn02 .slider {width: 265px; height:123px; overflow:hidden;}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager {
    width: auto;
    left: 0;
    bottom: -20px;
    text-align: center;
}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a {
    background: #e1e1e1;
}
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:hover, 
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a.active,
.gosi .gosi-bn02 .bSlider .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #898989 !important;
}

/**/
.gosi-bn03 {margin-top:120px; padding-bottom:100px}    
.gosi-bn03 ul {margin-top:60px; margin-right:-20px}
.gosi-bn03 li {display:inline; float:left; width:265px; margin-right:20px}
.gosi-bn03 li:first-child {width:550px;}
.gosi-bn03 ul:after {content: ""; display: block; clear:both}
.gosi-bn03 .sliderNum {height:303px; overflow:hidden;}
.gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction {
    position: absolute;
    top: 310px;
    left:0;
    right: 0;
    width: 100%;
    height: 20px;
    text-align:center;
}
.gosi-bn03 .nSlider .bx-wrapper .bx-controls-direction a {
    width: 20px;
    height: 20px;
}
.gosi-bn03 .nSlider .bx-wrapper a.bx-prev {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
    left:145px !important;
}
.gosi-bn03 .nSlider .bx-wrapper a.bx-next {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
    left:100px !important;     
}
.gosi-bn03 li:first-child .bx-wrapper a.bx-prev {
    left:290px !important;
} 
.gosi-bn03 li:first-child .bx-wrapper a.bx-next {
    left:240px !important;
} 
.gosi-bn03 .nSlider .bx-wrapper .bx-pager {
    width: auto;
    position: absolute;
    top: 315px;
    left:0;
    right: 0;
    bottom: 0;
    font-size: 11px;
    font-weight: 300;
    color: #000;
    margin: 0;
    padding: 0;
    letter-spacing: 0;
}

/* */
.gosi-bnfull-Sec02 {position:relative; height: 190px; background: url(https://static.willbes.net/public/images/promotion/main/2003/3019_1120x190_bg.jpg) repeat-x left bottom; }
.gosi-bnfull-Sec02 .gosi-bnfull02 {width: 1120px; height: 190px; margin:0 auto; overflow: hidden;}    
.gosi-bnfull-Sec02 p {position:absolute; top:70%; left:50%; margin-top:-19px; width:22px; height:38px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/arrow_w22.png) no-repeat left center;  opacity:0.4; filter:alpha(opacity=40);}
.gosi-bnfull-Sec02 p a {display:none;}
.gosi-bnfull-Sec02 p.leftBtn {margin-left:-620px;}
.gosi-bnfull-Sec02 p.rightBtn {margin-left:588px; background-position: right center;}
.gosi-bnfull-Sec02 p:hover {opacity:100; filter:alpha(opacity=100);}

/*교수진*/
.gosi-profWrap {background:#c0bcb0; padding:130px 0}
.gosi-profWrap .will-nTit {color:#fff; margin-bottom:60px}
.gosi-profWrap .will-nTit span {color:#535046}

.gosi-tabs-contents-wrap {width:1120px; height:470px; overflow:hidden}
.gosi-gate-prof li {        
    display: inline;
    float: left;  
    margin-right:15px;  
    width: 208px;
    height:470px;
    background:#fff;                      
}   

.gosi-gate-prof li:last-child {margin:0}
.gosi-gate-prof:after {
    content: "";
    display: block;
    clear: both;
}
.gosi-gate-prof .nSlider {}  
.gosi-gate-prof .nSlider .sliderProf div {width: 208px !important; height:470px; position:relative;}
.gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction {
    position: absolute;
    top: 425px;
    left:0;
    right: 0;
    width: 100%;
    height: 20px;
    text-align:center;
}
.gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction a {
    width: 20px;
    height: 20px;
}
.gosi-gate-prof .nSlider .bx-wrapper a.bx-prev {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
    left:120px !important;
}
.gosi-gate-prof .nSlider .bx-wrapper a.bx-next {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
    left:70px !important;     
}
.gosi-gate-prof .nSlider .bx-wrapper .bx-pager {
    width: auto;
    position: absolute;
    top: 430px;
    left:0;
    right: 0;
    bottom: 0;
    font-size: 11px;
    font-weight: 300;
    color: #000;
    margin: 0;
    padding: 0;
    letter-spacing: 0;
}

    .tabWrapCustom.noticeWrap_campus {
        height: 60px;
        border-bottom: none;
        border-top: 2px solid #000;
        clear: both;
    }
    .tabWrapCustom.noticeWrap_campus li {
        float: left;
        width: auto;
        height: 60px;
        margin: 0 10px;
    }
    .tabWrapCustom.noticeWrap_campus li a {
        display: block;
        width: 100%;
        height: 60px;
        line-height: 60px;
        background: none;
        font-size: 13px;
        color: #3a3a3a;
        text-align: center;
        letter-spacing: 0;
        border: none;
        padding-right: 20px;
    }
    .tabWrapCustom.noticeWrap_campus li:first-child a {
        border-left: none;
    }
    .tabWrapCustom.noticeWrap_campus li a.on {
        position: relative;
        z-index: 2;
        background: none;
        height: 60px;
        line-height: 60px;
        font-weight: 600;
        color: #3a3a3a;
        border: none;
    }
    .tabWrapCustom.noticeWrap_campus .row-line {
        float: right;
        background: #b7b7b7;
        width: 1px;
        height: 12px;
        margin: -36px 0 0;
    }
</style>
<!-- Container -->

<div id="Container" class="Container gosi NGR c_both">
    <div class="Menu widthAuto NGR c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">온라인공무원<span class="row-line">|</span></li>
                <li class="subTit">7급 전문과목</li>
            </ul>
            <ul class="menu-List">
                <li class="dropdown">
                    <a href="#none">교수진소개</a>
                </li>
                <li class="dropdown">
                    <a href="#none">학원수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원수강신청</li>
                            <li><a href="#none">단과반</a></li>
                            <li><a href="#none">종합반</a></li>
                        </ul>
                    <div>
                </li>
                <li class="dropdown">
                    <a href="#none">동영상수강신청</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">동영상수강신청</li>
                            <li><a href="#none">단강좌</a></li>
                            <li><a href="#none">추천패키지</a></li>
                            <li><a href="#none">선택패키지</a></li>
                        </ul>
                    <div>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="#none">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="#none">시험공고</a></li>
                            <li><a href="#none">강의계획서</a></li>
                            <li><a href="#none">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">교재구매</a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="gosi-bnfull-Sec">
        <div class="gosi-bnfull">
            <div class="sliderBar">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_fullx90_01.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_fullx90_02.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>   

    <div class="Section gosi-Sec NSK">
        <div class="gosi-bntop">                        
            <div id="TechRollingSlider" class="GositabBox">
                <ul class="GositabSlider">
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_01.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_04.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_03.jpg" alt="배너명"></a></li>
                    <li><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3028_2000x460_02.jpg" alt="배너명"></a></li>
                </ul>                  
                <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
                <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
            </div> 
            
            <div id="TechRollingDiv" class="GositabList">
                <div class="Gositab">
                    <li><a data-slide-index="0" href="javascript:void(0);" class="active">농업전공X영어<br>PACKAGE</a></li>
                    <li><a data-slide-index="1" href="javascript:void(0);">전기/통신 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="2" href="javascript:void(0);">농업직 5과목<br>PACKAGE</a></li>
                    <li><a data-slide-index="3" href="javascript:void(0);">축산/기계/조경<br>NEW 라인업</a></li>
                    <li><a data-slide-index="4" href="javascript:void(0);">환경직<br>PACKAGE</a></li>
                    <li><a data-slide-index="5" href="javascript:void(0);">전산직<br>PACKAGE</a></li>
                    <li><a data-slide-index="6" href="javascript:void(0);">임업직<br>PACKAGE</a></li>
                    <li><a data-slide-index="7" href="javascript:void(0);">전기/통신<br>최우영</a></li>
                    <li><a data-slide-index="8" href="javascript:void(0);">농업직렬<br>장사원</a></li>
                </div>
            </div>           
        </div>        
    </div>

    <div class="Section gosi-bn02">
        <div class="widthAuto">
            <ul>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_01.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_02.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_02.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_03.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_04.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_03.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_04.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="bSlider">
                        <div class="slider">
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_04.jpg" alt="배너명"></a></div>
                            <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x123_01.jpg" alt="배너명"></a></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section gosi-bn03">
        <div class="widthAuto">   
            <div class="tx16 mb20">교수님 추천강좌 / 이벤트 / 최신소식</div>
            <div class="will-nTit NSK-Black">지금 바로 주목해야 할 <span>HOT PICK</span></div>  
            <ul>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_550x303_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_550x303_01.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x303_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x303_02.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x303_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/2003/3019_265x303_01.jpg" alt="배너명"></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section gosi-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">합격을 책임질 <span>7급 대표 교수진</span></div>       
            <div class="gosi-tabs-contents-wrap">
                <div class="gosi-tabs-content">
                    <ul class="gosi-gate-prof">
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>  

    <div class="Section NSK mt90">
        <div class="widthAuto">
            <div class="willbesLec">
                <div class="smallTit mb30">          
                    <p><span>합격 콘텐츠를 한 눈에! <strong>윌비스 강좌</strong></span></p>            
                </div> 
                <div class="will-listTit">BEST 강좌</div>                
                <div class="bestLectBx">                                                  
                    <ul class="prof-subject">                        
                        <li><a href='#none'><span>|</span>국어</a></li>                        
                        <li><a href='#none'><span>|</span>영어</a></li>                        
                        <li><a href='#none'><span>|</span>한국사</a></li>                        
                        <li><a href='#none'><span>|</span>헌법</a></li>                        
                        <li><a href='#none'><span>|</span>행정법</a></li>                        
                        <li><a href='#none'><span>|</span>행정학</a></li>                        
                        <li><a href='#none'><span>|</span>사회</a></li>                        
                        <li><a href='#none'><span>|</span>세법</a></li>                        
                        <li><a href='#none'><span>|</span>회계학</a></li>                        
                        <li><a href='#none'><span>|</span>경제학</a></li>                        
                        <li><a href='#none'><span>|</span>국제법</a></li>                        
                        <li><a href='#none'><span>|</span>전자공학</a></li>                        
                        <li><a href='#none'><span>|</span>무선공학</a></li>                        
                        <li><a href='#none'><span>|</span>통신이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기이론</a></li>                        
                        <li><a href='#none'><span>|</span>전기기기</a></li>                        
                        <li><a href='#none'><span>|</span>소방학개론</a></li>                        
                        <li><a href='#none'><span>|</span>소방관계법규</a></li>                        
                        <li><a href='#none'><span>|</span>한국사검정능력시험</a></li>                        
                    </ul>

                    <div id="prof-professors" class="prof-professors">
                        <ul class="prof-slider">                        
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>  
                            <li>
                                <div><img src="{{ img_url('gosi/prof/tea_myroom_1_kmj_145x152.png') }}" alt="" class="강사명"/></div>
                                <span class="txt1">영어2</span>
                                <span class="txt2">한덕현</span>
                                <span class="txt3">2019 한덕현 영어 새벽실전모의고사 </span>
                                <a href="#none">맛보기강좌 ></a>
                            </li>                          
                        </ul>
                    </div> 
                </div>
                
                <div class="will-listTit mt45">무료특강</div>
                <ul class="freeLectBx">
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free01.jpg') }}" alt="" class="배너명"/>
                        <p>기초입문특강</p>
                        국어,영어,한국사 기초입문 풀패키지
                    </li>
                    <li>
                        <img src="{{ img_url('gosi/banner/bnr_free02.jpg') }}" alt="" class="배너명"/>
                        <p>기초문제 해설특강</p>
                        출제경향 완벽대비
                    </li>
                </ul>
            </div>
            <!-- willbesLec//-->

            <div class="willbesNews">
                <div class="smallTit mb30">          
                    <p><span>윌비스 <strong>소식</strong></span></p>                                
                </div>
                <div class="noticeTabs">
                    <div class="will-listTit mt45">공지사항</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
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

                <div class="noticeTabs mt30">
                    <div class="will-listTit">강의계획서/자료</div>
                    <div class="tabBox noticeBox" style="margin-top:-30px">
                        <div class="tabContent p_re">
                            <a href="#none" class="f_right btn-add"><img src="{{ img_url('gosi_acad/icon_add_big.png') }}" alt="더보기"></a>
                            <ul class="List-Table">
                                <li><a href="#none"><span>HOT</span>2019년도 국가공무원 공개경쟁채용시험 등 계획 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none"><span>HOT</span>2019 제1회 서울시 지방공무원(7,9급 등) 임용시험 시행계획 변경 공고</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지] 2019년도 제주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">[공지]2019년도 광주교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                                <li><a href="#none">2019년도 부산교육청 지방공무원 임용시험 일정안내</a><span class="date">2019-01-25 </span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--willbesNews //-->
        </div>
    </div>

    {{--학원 오시는 길--}}
    @include('willbes.pc.site.main_partial.map_2010')

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
                        <div class="centerTit">윌비스 공무원 사이트에 물어보세요!</div>
                        <ul>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter1.png') }}">
                                    <div class="nTxt">자주하는<br/>질문</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter2.png') }}">
                                    <div class="nTxt">모바일<br/>서비스</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
                                    <img src="{{ img_url('cop/icon_cecenter3.png') }}">
                                    <div class="nTxt">동영상<br/>상담실</div>
                                </a>
                            </li>
                            <li>
                                <a href="#none">
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
        <ul>
            <li class="dday">
                <div class="QuickSlider">
                    <div class="sliderNum">
                        <div class="QuickDdayBox">
                            <div class="q_tit">3차 필기시험</div>
                            <div class="q_day">2018.12.12</div>
                            <div class="q_dday NSK-Blac">D-5</div>
                        </div>
                        <div class="QuickDdayBox">
                            <div class="q_tit">1차 공무원</div>
                            <div class="q_day">2019.04.05</div>
                            <div class="q_dday NSK-Blac">D-10</div>
                        </div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="http://www.willbescop.net/event/movie/event.html?event_cd=On_170911_popup" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="http://www.willbescop.net/event/arm_event.html?event_cd=On_leaveArmy02_2018&topMenuType=O&EVENT_NO=53" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_190110.jpg') }}" title="배너명"></a>
            </li>
            <li>
                <a href="http://www.willbescop.net/movie/event.html?event_cd=Off_181129_p&topMenuType=F" target="_blank"><img src="{{ img_url('cop/quick/quick_talk.jpg') }}" title="배너명"></a>
            </li>
        </ul>
    </div>

</div>

<!-- End Container -->

<script type="text/javascript">
    $(function() {
        $('.sliderBar').bxSlider({
            mode:'fade',
            auto: true,
            touchEnabled: false,
            controls: false,
            sliderWidth:2000,
            pause: 3000,
            autoHover: true,
            pager: false,
        });
    });

    //상단 메인 배너
    $(function(){ 
        var slidesImg = $(".GositabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            sliderWidth:2000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#TechRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#TechRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    }); 

    /*bar 배너 롤링 */
    $(function() {
        var slidesImg02 = $(".sliderBar02").bxSlider({
            mode:'fade',
            auto: true,
            touchEnabled: false,
            controls: false,
            sliderWidth:2000,
            pause: 3000,
            autoHover: true,
            pager: false,
        });
        $("#imgBannerRight02").click(function (){
            slidesImg02.goToPrevSlide();
        });
    
        $("#imgBannerLeft02").click(function (){
            slidesImg02.goToNextSlide();
        });	
    });

    /*교수진*/
    $(function() {
        $('.sliderProf').bxSlider({        
            auto: true,
            controls: true,
            pause: 4000,
            pager: true,
            pagerType: 'short',
            slideWidth: 208,
            minSlides:1,
            maxSlides:1,
            moveSlides:1,
            adaptiveHeight: true,
            infiniteLoop: true,
            touchEnabled: false,
            autoHover: true,
            onSliderLoad: function(){
                $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1}); 
            }  
        });
    });

    /*윌비스 강좌*/
    $(function(){ 
        $('.prof-subject').bxSlider({ 
            speed:800,  
            responsive:true,
            infiniteLoop:true,
            pager:false,
            slideWidth:78,
            minSlides:1,
            maxSlides:8
        });
    });

    /*수강후기*/
    $(function() {
        $('.sliderNumV').bxSlider({
            mode: 'vertical', 
            auto: true,
            controls: true,
            infiniteLoop: true,
            slideWidth: 1120,
            pagerType: 'short',
            minSlides: 3,
            pause: 3000,
            pager: true,
            onSliderLoad: function(){
                $(".vSlider").css("visibility", "visible").animate({opacity:1}); 
            } 
        });
    });
</script>
@stop