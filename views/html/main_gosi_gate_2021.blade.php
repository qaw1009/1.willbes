@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
.gosi-gate .tx-color {
    color: #ba560e;
}
.gosi-gate .will-nTit {border:0; font-size:46px}
.gosi-gate .will-nTit span {color:#205591}

.gosi-gate-secTop {position:relative; padding-top:56px }
.gosi-gate-secTop .gosi-gate-search {position:absolute; top:0;}
.Menu h3 {border:0; margin:0}
.Menu h3 .menu-Tit {float:left; width:230px; }
.Menu h3 .menu-List {float:left; display:flex; margin:10px 0 0; width:calc(100% - 560px)}
.Menu h3 .menu-List > div {font-size:15px; color:#808080; position:relative; width: 11.11111%;}
.Menu h3 .menu-List > div a {display:block; width:100%; text-align:center }
.Menu h3 .menu-List > div.dropdown > a span {display:inline-block; background:url("/public/img/willbes/cs/icon_arrow.gif") no-repeat; width:11px; height:11px; margin-right:5px}
.Menu h3 .menu-List > div.dropdown:hover {background:url("/public/img/willbes/common/top_menu_list_arrow.png") no-repeat center 32px;}
.Menu h3 .menu-List > div.dropdown div a {text-align:left}
.Menu h3 .menu-banner {float:right}
.Menu h3:after {content:''; display:block; clear:both}


.gosi-gate-secTop .secTop-Banner {float:right; width:330px; }
.gosi-gate-secTop .secTop-Menu:after  {content:''; display:block; clear:both}


.gosi-bnfull-Sec {position:relative; margin:0; height: 65px !important;}
.gosi-bnfull {position: absolute;
    top:0;
    left:50%;
    margin-left:-1000px;
    width: 2000px;
    min-width: 1120px;
    max-width: 2000px;
    height: 65px; 
    overflow: hidden;}    
.gosi-bnfull .bx-wrapper .sliderBar img {width:2000px !important; height:65px}

.gosi-gate-Sec {background:url(https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_h610_bg.jpg) repeat-x left top; margin:0; height:745px; position: relative;}
.gosi-gate-bntop {
    width: 1120px;
    height: 460px;
    background:#fff;
    overflow: hidden;   
    box-shadow:0 10px 20px rgba(0,0,0,.2); 
    position: absolute;
    z-index:10;
}

.gosi-gate-bntop .MaintabList {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 99;
    text-align: center;   
    width:100%;     
}
.gosi-gate-bntop .Maintab {width:100%; background: rgba(0,0,0,.5);}
.gosi-gate-bntop .Maintab:after {content:''; display:block; clear:both}
.gosi-gate-bntop .Maintab li {
    display: inline-block; 
    /*float:left;*/    
    font-size: 14px;
    color: #fff;    
    width: calc(10% - 2px);
}
.gosi-gate-bntop .MaintabList a {
    display: block;
    color:#b4b4b4;
    padding:10px 0;
    line-height: 1.2;
}
.gosi-gate-bntop .MaintabList a:hover,
.gosi-gate-bntop .MaintabList a.active {color:#fff; font-weight:bold}

.gosi-gate-bntop .MaintabSlider li img {
    width: 100%;
    height: 100%;
}

.gosi-gate-Sec p {position:absolute; top:70%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; 
    background: url(https://static.willbes.net/public/images/promotion/main/2012_arrow_01.png) no-repeat left center;  opacity:0.5; filter:alpha(opacity=50); z-index:99;}
.gosi-gate-Sec p a {display:none;}
.gosi-gate-Sec p.leftBtn {margin-left:-632px;}
.gosi-gate-Sec p.rightBtn {margin-left:600px; background-position: right center;}	
.gosi-gate-Sec p:hover {opacity:100; filter:alpha(opacity=100);}

.gosi-bnfull02 {background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x227_bg.jpg) repeat-x}

.gosi-gate-bn01 {margin-top:130px}
.gosi-gate-bn01 > div {width:550px;}
.gosi-gate-bn01 .sliderNum {width:550px; height:162px; overflow:hidden}
.gosi-gate-bn01:after {content:''; display:block; clear:both}
.gosi-gate-bn01 .will-nTit {font-size:26px; color:#363636}

.tpassWrap {background:#fbfbfd; padding:130px 0; margin-top:130px}
.tpassWrap .f_left {float:left}
.tpassWrap .f_right {width:570px; float:right;}    
.tpassWrap .f_right div {display:inline; float:left; width:33.33333%;}
.tpassWrap .f_right div a {display:block; margin-left:20px; margin-bottom:20px}
.tpassWrap ul:after,
.tpassWrap .widthAuto:after {content:''; display:block; clear:both}

/*교수진*/
.gosi-gate-profWrap {background:#c0bcb0; padding:130px 0}
.gosi-gate-profWrap .will-nTit {color:#fff}
.gosi-tabs-prof{border-radius:20px; background:#535046; width:1116px; margin:65px auto 45px; box-shadow: inset 5px 5px 10px rgba(0,0,0,.2);}
.gosi-tabs-prof:after {content:''; display:block; clear:both}
.gosi-tabs-prof li{display: inlinek;float:left;width:186px}
.gosi-tabs-prof li a {display:block; height:40px; line-height:40px; text-align:center; color:#b6b5b2; font-size:20px}
.gosi-tabs-prof li a.active {border-radius:20px; background: #fff;color: #535046; box-shadow:5px 5px 10px rgba(0,0,0,.2);}

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
.gosi-gate .castWrap {margin-top:130px}
.gosi-gate .castBox {position:relative; margin-top:60px}   
.gosi-gate .castslider {width:1120px; margin: 0 auto; height:250px; overflow: hidden;}
.gosi-gate .castslider li {display: inline; float: left; width:33.33333%;}
.gosi-gate .castslider li a {display:block; width:370px; height:220px;} 
.gosi-gate .castslider li div.castTitle {height:40px; line-height:40px; font-size:14px; text-align:center; width:80%; overflow:hidden;white-space:nowrap; text-overflow:ellipsis; margin:0 auto}
.gosi-gate .castslider:after {content: ""; display: block; clear:both}
.gosi-gate .castBox p {position:absolute; top:45%; margin-top:-22px; width:22px; height:38px; z-index:10}
.gosi-gate .castBox p.leftBtn {left:-40px}
.gosi-gate .castBox p.rightBtn {right:-30px}
.gosi-gate .castBox .bx-wrapper .bx-pager.bx-default-pager a {
    background: #e1e1e1;
    width: 12px;
    height: 12px;
    margin: 0 2px;
    border-radius:6px;
}
.gosi-gate .castBox .bx-wrapper .bx-pager.bx-default-pager a:hover,
.gosi-gate .castBox .bx-wrapper .bx-pager.bx-default-pager a.active,
.gosi-gate .castBox .bx-wrapper .bx-pager.bx-default-pager a:focus {
    background: #898989;
}
.gosi-gate .castBox .bx-wrapper .bx-pager.bx-default-pager a.active {
    width: 48px;
}

.gosi-gate-bn02 {margin-top:130px; padding:100px 0; background:#fbfbfd}    
.gosi-gate-bn02 ul {margin-top:60px; height:290px;}
.gosi-gate-bn02 li {display:inline; float:left; width:360px; margin-right:20px}
.gosi-gate-bn02 li:last-child {margin:0}
.gosi-gate-bn02 ul:after {content: ""; display: block; clear:both}
.gosi-gate-bn02 .nSlider .bx-wrapper .bx-controls-direction {
    position: absolute;
    top: 310px;
    left:0;
    right: 0;
    width: 100%;
    height: 20px;
    text-align:center;
}
.gosi-gate-bn02 .nSlider .bx-wrapper .bx-controls-direction a {
    width: 20px;
    height: 20px;
}
.gosi-gate-bn02 .nSlider .bx-wrapper a.bx-prev {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat right top;
    left:200px !important;
}
.gosi-gate-bn02 .nSlider .bx-wrapper a.bx-next {
    background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
    left:140px !important;     
}
.gosi-gate-bn02 .nSlider .bx-wrapper .bx-pager {
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

.gosi-gate .noticeList .List-Table li a {
    display: inline-block;
    width: 75%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    letter-spacing: 0;
}
.gosi-gate .noticeList .List-Table li img {display: inline-block; vertical-align: top; margin-top: 8px;}
.gosi-gate .noticeList .List-Table li a span {
    background: #ba560e;
    color:#fff;
    padding: 0 10px;
    border-radius: 10px;
    margin-top:3px;
    margin-right: 5px;
    height: 19px; line-height: 19px;    
}

/*모달베너 추가*/
#Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
</style>

<!-- Container -->

<div id="Container" class="Container gosi-gate NSK c_both">

    <div class="widthAuto gosi-gate-secTop">
        <div class="gosi-gate-search">
            <form id="unifiedSearch_form" name="unifiedSearch_form" method="GET">
                <div class="Section widthAuto">
                    <div class="onSearch NGR">
                        <div>
                            <input type="hidden" name="cate" id="unifiedSearch_cate" value="">
                            <input type="hidden" name="search_class" id="unifiedSearch_class" value="">
                            <input type="hidden" name="search_target" id="unifiedSearch_target" value="">
                            <input type="hidden" name="etc_info" id="unifiedEtc_info" value="">
                            <input type="text" class='unifiedSearch' data-form="unifiedSearch_form" id="unifiedSearch_text" name="searchfull_text" value="" placeholder="온라인강의 검색" title="온라인강의 검색" maxlength="100"/>
                            <label for="onsearch"><button title="검색" type="button" id="btn_unifiedSearch" class='btn_unifiedSearch' data-form="unifiedSearch_form">검색</button></label>
                        </div>
                        <div class="searchPop">
                            <div class="popTit">인기검색어</div>
                            <ul>
                                <li><a href="#nnon">신광은</a></li>
                                <li><a href="#nnon">무료특강</a></li>
                                <li><a href="#nnon">형소법</a></li>
                                <li><a href="#nnon">기미진</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                                <li><a href="#nnon">모의고사</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>       

        <div class="Menu widthAuto NSK c_both">
            <h3>
                <div class="menu-Tit">
                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/2003_logo_2021.png" alt="윌비스공무원">
                </div>
                <ul class="menu-List">
                    <div>
                        <a href="#none">9급</a>
                    </div>
                    <div>
                        <a href="#none">7급PSAT</a>
                    </div>
                    <div>
                        <a href="#none">7급</a>
                    </div>
                    <div>
                        <a href="#none">세무직</a>
                    </div>
                    <div>
                        <a href="#none">법원직</a>
                    </div>
                    <div>
                        <a href="#none">소방직</a>
                    </div>
                    <div>
                        <a href="#none">기술직</a>
                    </div>
                    <div>
                        <a href="#none">군무원</a>
                    </div>
                    <div class="dropdown">
                        <a href="#none"><span></span>학원</a>
                        <div class="drop-Box list-drop-Box">
                            <ul>
                                <li><a href="#none">노량진(본원)</a></li>
                                <li><a href="#none">부산</a></li>
                                <li><a href="#none">대구</a></li>
                                <li><a href="#none">인천</a></li>
                                <li><a href="#none">광주</a></li>
                            </ul>
                        </div>
                    </div>
                </ul>
                <div class="menu-banner">
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/bn_330x100.jpg" alt="배너"></a>
                </div>
            </h3>
    </div>
    </div>       



    <div class="gosi-bnfull-Sec">
        <div class="gosi-bnfull">
            <div class="sliderBar">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_fullx65.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_fullx65_01.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>


    <div class="Section gosi-gate-Sec">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x285.gif" alt="배너명"></a>
            <div class="gosi-gate-bntop p_re">
                <div id="MainRollingDiv" class="MaintabList">
                    <ul class="Maintab">
                        <li><a data-slide-index="0" href="javascript:void(0);" class="active">9급<br>pass</a></li>
                        <li><a data-slide-index="1" href="javascript:void(0);">7급<br>pass</a></li>
                        <li><a data-slide-index="2" href="javascript:void(0);">세무직<br>pass</a></li>
                        <li><a data-slide-index="3" href="javascript:void(0);">법원직<br>pass</a></li>
                        <li><a data-slide-index="4" href="javascript:void(0);">농업직<br>pass</a></li>
                        <li><a data-slide-index="5" href="javascript:void(0);">통신/전기<br>pass</a></li>
                        <li><a data-slide-index="6" href="javascript:void(0);">전산직<br>pass</a></li>
                        <li><a data-slide-index="7" href="javascript:void(0);">환경직<br>pass</a></li>
                        <li><a data-slide-index="8" href="javascript:void(0);">산림자원직</a></li>
                        <li><a data-slide-index="9" href="javascript:void(0);">조경계획 및 설계</a></li>
                    </ul>
                </div>
                <div id="MainRollingSlider" class="MaintabBox">
                    <ul class="MaintabSlider">
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_01.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_02.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_03.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_04.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_05.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_06.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_07.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_08.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_09.jpg" alt="배너명">
                            </a>
                        </li>
                        <li>
                            <a href="#none" target="_blank">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x460_10.jpg" alt="배너명">
                            </a>
                        </li>
                    </ul>                    
                </div>                
            </div>
            <p class="leftBtn" id="imgBannerLeft"><a href="#none">이전</a></p>
            <p class="rightBtn" id="imgBannerRight"><a href="none">다음</a></p> 
        </div>
    </div>
    
    <div class="Section gosi-bnfull02">
        <div class="widthAuto">
            <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_1120x227.jpg" alt="배너명"></a>
        </div>
    </div>

    <div class="Section">
        <div class="widthAuto gosi-gate-bn01 nSlider pick">   
            <div class="f_left">  
                <div class="will-nTit NSK-Black">공무원, 어떻게 준비하나요? </div>              
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_01.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_02.jpg" alt="배너명"></a></div>
                </div>
            </div>
            <div class="f_right">  
                <div class="will-nTit NSK-Black">윌비스 신규회원가입 혜택</div>                  
                <div class="sliderNum">
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_02.jpg" alt="배너명"></a></div>
                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_550x162_01.jpg" alt="배너명"></a></div>
                </div>
            </div>
            </ul>         
        </div>
    </div>

    <div class="Section tpassWrap">
        <div class="widthAuto">
            <div class="f_left"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_tpass_bg.jpg" alt="T-PASS"></div>
            <div class="f_right">
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_01.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_02.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_03.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_04.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_05.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_06.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_07.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_08.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_09.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_10.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_11.jpg" alt="배너명"></a></div>
                <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_170x106_12.jpg" alt="배너명"></a></div>
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">합격을 책임질 윌비스 직렬별 대표 교수진</div>        
            <ul class="gosi-tabs-prof">
                <li><a href="#item01" class="on">9/7급</a></li>
                <li><a href="#item02">세무직</a></li>
                <li><a href="#item03">법원직</a></li>
                <li><a href="#item04">소방직</a></li>
                <li><a href="#item05">기술직</a></li>
                <li><a href="#item06">군무원</a></li>
            </ul>
            <div class="gosi-tabs-contents-wrap">
                <div id="item01" class="gosi-tabs-content">
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
                <div id="item02" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
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
                        
                    </ul>                
                </div>
                <div id="item03" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
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
                <div id="item04" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
                <div id="item05" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
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
                <div id="item06" class="gosi-tabs-content">
                    <ul class="gosi-gate-prof" >
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_01.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_208x470_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>   

    <div class="Section castWrap">
        <div class="widthAuto">
            <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
            <div class="will-nTit NSK-Black">합격을 앞당기는 <span>수험생활 팁</span></div>  
            <div class="castBox">
                <ul class="castslider">
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은교수님이 칠판을 사고 외워야 했던 이유는?</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰팀이 19년2차 합격생들과 함께한 ★대환장파티★ 기대하셔도 좋습니다 </div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>
                        </div>
                        <div class="castTitle">190504 중앙경찰학교 입교 현장스케치</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_02.jpg">
                            </a>
                        </div>
                        <div class="castTitle">신광은 경찰학원 행사이벤트 및 커리큘럼안내</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_01.jpg">
                            </a>
                        </div>
                        <div class="castTitle">합격생이 말해주는 1단계 문제풀이 ☜ 12월30일 大개강이라닛☆</div>
                    </li>
                    <li>
                        <div>
                            <a href="#none">
                                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x202_03.jpg">
                            </a>
                        </div>
                        <div class="castTitle">압도적 1위 장정훈 교수 6만돌파 이벤트!</div>
                    </li>
                </ul> 
                <p class="leftBtn"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowL.png"></a></p>                   
                <p class="rightBtn"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/btn_arrowR.png"></a></p>                              
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-bn02">
        <div class="widthAuto pick">   
            <div class="tx16 mb20">수험을 가장 잘 아는, 그리고 많은 합격생을 배출한 교수님들이 전합니다.</div>
            <div class="will-nTit NSK-Black">윌비스 공무원 학원 <span>실강 안내</span></div>  
            <ul>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_01.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_02.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_02.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_03.jpg" alt="배너명"></a></div>
                    </div>
                </li>
                <li class="nSlider">
                    <div class="sliderNum">
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_03.jpg" alt="배너명"></a></div>
                        <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/intro_360x290_01.jpg" alt="배너명"></a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="Section mt80">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto350 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰3과 과목별 만점자를 소개합니다.</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto350 f_left ml35">
                    <div class="will-nlistTit p_re">수험뉴스 <a href="https://cop.dev.willbes.net/support/examNews/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰청, 경찰간부후보생 68기 최종합격자 명단 입니다. 확인 바랍니다.</span></a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none"><span>HOT</span>12월 22일, 경찰공무원 합격의 기회가 다가옵니다.</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">제주자치경찰 확대 시험운영 추진</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">순경 3차 '필기시험 대비, 기출 분석으로 철저하게'</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt50 mb90">
        <div class="widthAuto">
            <div class="CScenterBox">
                <dl>
                    <dt class="willbesNumber">
                        <ul>
                            <li>
                                <div class="nTit">온라인 수강문의</div>
                                <div class="nNumber tx-color">1544-5006 <span>▶</span> 2</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 18시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">교재문의</div>
                                <div class="nNumber tx-color">1544-4944</div>
                                <div class="nTxt">
                                    [운영시간]<br/>
                                    평일: 09시~ 17시 (점심시간12시~13시)<br/>
                                    공휴일/일요일휴무<br/>
                                </div>
                            </li>
                            <li>
                                <div class="nTit">학원 고객센터</div>
                                <div class="nNumber tx-color">1544-0330</div>
                                <div class="nTxt">
                                    [전화/방문상담 운영시간]<br/>
                                    평일/주말: 09시~ 22시<br/>
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
                    <div class="sliderProf">
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
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/1112/banner_20210201181048.png" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0625/banner_20200625154631.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderProf">
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0224/banner_20200624133355.jpg" title="배너명"></a></div>
                    </div>
                </div>
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
        var slidesImg = $(".MaintabSlider").bxSlider({
            mode:'horizontal',
            touchEnabled: false,
            speed:400,
            pause:5000,
            auto : true,	
            autoHover: true,						
            pagerCustom: '#MainRollingDiv',
            controls:false, 				
            onSliderLoad: function(){
                $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
            }
        });	
        $("#imgBannerRight").click(function (){
            slidesImg.goToPrevSlide();
        });
    
        $("#imgBannerLeft").click(function (){
            slidesImg.goToNextSlide();
        });			
    });

    //교수진 배너    
     $(document).ready(function(){
        $('.gosi-tabs-prof').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})}
        )}
    );

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

    //캐스트
    $(function() {
        var slidesImg1 = $(".castslider").bxSlider({
            mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
            auto:true,
            speed:350,
            pause:4000,
            pager:true,
            controls:false,
            minSlides:3,
            maxSlides:3,
            slideWidth: 370,
            slideMargin:5,
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