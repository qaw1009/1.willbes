@extends('willbes.pc.layouts.master')

@section('content')
<style type="text/css">
    .gosi-gate-v3 .tx-color {
        color: #ba560e;
    }

    .bx-wrapper .bx-pager.bx-default-pager a {
            background: #d1d0ce;
            width: 12px;
            height: 12px;
            margin: 0 4px;
            border-radius:6px;
        }
    .bx-wrapper .bx-pager.bx-default-pager a:hover,
    .bx-wrapper .bx-pager.bx-default-pager a.active,
    .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #2b2b2b;
        }

    .gosi-gate-v3 .will-nTit {border:0; font-size:28px; color:#5c5c5c}
    .gosi-gate-v3 .will-nTit span {color:#000}

    .gosi-gate-secTop {position:relative; padding-top:56px;  }
    .gosi-gate-secTop .gosi-gate-search {position:absolute; top:35px;}

    .topMenu {position: absolute; width:1120px; left:50%; margin-left:-560px; top:40px;  z-index: 0;}
    .topMenu .banner {margin-top:10px}
    .gosiLogo {position: absolute; top:20px; left:50%; margin-left:-105px;}
    .menuList {display:flex; font-size:16px; width:1080px; margin:20px auto 0; justify-content: center; align-items: center; font-weight:bold}
    .menuList div {width:11.1111%}
    .menuList a {display:block; text-align:center}

    .gosi-gate-Sec {margin-top:100px; padding:0; text-align:center; background:none}
    .gosi-gate-Sec .gosi-gate-bntop-img {position:relative;}


    .gate-bntop-Slider .swiper-slide span {position:absolute; top:40px; left:50%; margin-left:65px; width:350px; height:350px; overflow: hidden;}
    .gate-bntop-Slider .swiper-slide.swiper-slide-active span img {animation: zoom-out 1s linear backwards;}
    @@keyframes zoom-out {
    0% {
        transform: scale(1.125);
    }
    100% {
        transform: scale(1);
    }
    }

    .gosi-gate-Sec .MaintabControl {display:flex; justify-content: space-around; align-items: center; position: absolute; left:50%; margin-left:-420px; bottom:50px; z-index: 100; border-radius:30px; background-color:rgba(0,0,0,.4)}
    .gosi-gate-Sec .MaintabControl div {height:34px !important; width:38px !important; font-size: 14px; display: flex; justify-content: center; align-items: center; margin:0; padding:0; color:#fff; letter-spacing:1px }
    .gosi-gate-Sec .MaintabControl .swiper-pagination-current {font-weight: 600; color:#fff}
    .gosi-gate-Sec .MaintabControl div.swiper-btn-next {background: url("https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAR.png") no-repeat center center}
    .gosi-gate-Sec .MaintabControl div.swiper-btn-prev {background: url("https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAL.png") no-repeat center center}

    .gosi-gate-Sec .MaintabList {background:#fff; padding-top:30px}
    .gosi-gate-Sec .MaintabWrap {max-width:1080px; margin:0 auto; position: relative;}
    .gosi-gate-Sec .Maintab {display:flex;}
    .gosi-gate-Sec .Maintab li {
        font-size: 16px; 
        width:11.11111%
    }
    .gosi-gate-Sec .Maintab li a {
        display: block;
        color:#b4b4b4;
        text-align:center
    }
    .gosi-gate-Sec .Maintab li a.active {color:#000; font-weight:bold;}
    .gosi-gate-Sec .Maintab li a img {display:block; margin:auto auto 18px; border-radius:18px; }
    .gosi-gate-Sec .Maintab li a.active img {box-shadow:3px 3px 5px rgba(0,0,0,.2); }


    .gosi-gate-Sec .tabCts a {display:inline-block; border:2px solid #ccc; padding:5px 15px; border-radius: 20px; font-size:14px; margin-right:10px; margin-bottom:10px}
    .gosi-gate-Sec .tabCts a.active {color:#000; border-color:#000}

    .gosi-gate-Sec p {position:absolute; top:70%; left:50%; margin-top:-28px; width:32px; height:50px; cursor:pointer; z-index:99;}
    .gosi-gate-Sec p a {display:none;}
    .gosi-gate-Sec p.leftBtn {background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAL.png) no-repeat left center; }
    .gosi-gate-Sec p.rightBtn {background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAR.png) no-repeat left center; }	
    .gosi-gate-Sec p:hover {opacity:100; filter:alpha(opacity=100);}



    .gosi-gate-v3 .newsWrap {width:1120px; margin:80px auto 0; display:flex}
    .gosi-gate-v3 .newsBox {position:relative; width:320px; margin-left:28px;}   
    .gosi-gate-v3 .newsBox .bx-viewport {border-radius:10px;}
    .gosi-gate-v3 .newsSlider {width:320px; margin:0 auto; height:400px; overflow:hidden;border-radius:10px;}
    .gosi-gate-v3 .newsSlider li a {display:block; width:320px; margin:0 auto; } 
    .gosi-gate-v3 .newsSlider li div.newsTitle {height:40px; line-height:40px; font-size:14px; text-align:center; width:80%; overflow:hidden;white-space:nowrap; text-overflow:ellipsis; margin:0 auto}
    .gosi-gate-v3 .newsBox p {position:absolute; top:50%; margin-top:-30px; width:60px; z-index:10}
    .gosi-gate-v3 .newsBox p.leftBtn {left:-60px; background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAL2.png) no-repeat center center; }
    .gosi-gate-v3 .newsBox p.rightBtn {right:-60px; background: url(https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/iconAR2.png) no-repeat center center; }
    .gosi-gate-v3 .newsBox p a {display:block; height:60px;}
    .gosi-gate-v3 .rightWrap {width:700px; margin-left:70px; overflow: hidden;}
    .gosi-gate-v3 .rightWrap .banner {display:flex; margin-top:45px}
    .gosi-gate-v3 .rightWrap .banner a {display:block; margin-right:10px;}
    .gosi-gate-v3 .rightWrap  img {border-radius:10px}

    .gosi-bnfull02 {position:relative; width:100%; margin-top:100px; height:220px;}
    .gosi-bnfull02 a {display:block; position:absolute; width:2000px !important; height:220px; top:0; left:50%; margin-left:-1000px; z-index: 2;}


    .gosi-gate-v3 .tpassWrap {margin-top:100px; background:#f4f7fe; padding:100px 0;}
    .gosi-gate-v3 .tpassWrap .slider {width:100%; height:245px; overflow:hidden; display:flex; flex-wrap: wrap;}    
    .gosi-gate-v3 .tpassWrap .slider a {width:550px !important; margin-right:20px;}
    .gosi-gate-v3 .tpassWrap .slider img {width:550px; height: 245px; border-radius:18px; }
    .gosi-gate-v3 .tpassWrap .bx-wrapper .bx-pager {
        width: auto;
        position: absolute;
        bottom: -20px;
        left:0;
        right: 0;
    }
    .tpassWrap .prfoWrap {margin-top:50px; display:flex; flex-wrap: wrap; justify-content: space-between;}
    .tpassWrap .prfoWrap div {font-size:16px; font-weight:bold; text-align:center}
    .tpassWrap .prfoWrap div img {border:1px solid #e6e6e6; border-radius:30px; overflow: hidden; display:block; margin-bottom:20px}

    /*교수진*/
    .gosi-gate-profWrap {padding:100px 0;}
    .gosi-tabs-prof{width:1120px; margin:65px auto 45px; display:flex; flex-wrap: wrap; justify-content: space-between;}
    .gosi-tabs-prof li{width:16.66666%}
    .gosi-tabs-prof li a {display:block; height:45px; line-height:45px; text-align:center; color:#2b2b2b; font-size:20px; border:1px solid #e2e2e3; border-right:0}
    .gosi-tabs-prof li a.active {color: #fff; box-shadow:5px 5px 10px rgba(0,0,0,.2); background:#282828; border-color:#282828}
    .gosi-tabs-prof li:last-child a {border-right:1px solid #e2e2e3}


    .gosi-tabs-contents-wrap {width:1120px; height:350px; overflow:hidden}
    .gosi-gate-prof {width:1120px; display:flex !important; /*flex-wrap: wrap !important; justify-content: space-between !important;*/}
    .gosi-gate-prof li {        
        width: 210px;
        height:350px;  
        margin-right:14px;      
    }   
    .gosi-gate-prof li:last-child {margin:0}

    .gosi-gate-prof .nSlider .sliderProf div {width: 210px !important; height:350px; position:relative;}
    .gosi-gate-prof .nSlider .bx-wrapper .bx-controls-direction {
        position: absolute;
        top: 320px;
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
        left:180px !important;
    }
    .gosi-gate-prof .nSlider .bx-wrapper a.bx-next {
        background:url("/public/img/willbes/prof/btn_arrow.png") no-repeat left top;   
        left:158px !important;     
    }



    .gosi-gate-v3 .castWrap {background:#21262c; padding:100px 0; color:#fff}
    .gosi-gate-v3 .castWrap .will-nTit {color:#fff}
    .gosi-gate-v3 .castWrap .will-nTit span {color:#d44a45}
    .gosi-gate-v3 .castBox {position:relative; margin-top:30px}   
    .gosi-gate-v3 .castslider {width:1120px; margin: 0 auto; display:flex; flex-wrap: wrap; justify-content: space-between;}
    .gosi-gate-v3 .castslider li {width:calc(225px - 10px); margin-bottom:10px; background:#434343; padding-bottom:10px}
    .gosi-gate-v3 .castslider li div {display:block;} 
    .gosi-gate-v3 .castslider li img {width:215px;}
    .gosi-gate-v3 .castslider li div.castTitle {font-size:15px; text-align:left; overflow:hidden; padding:10px 10px 0;  
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* 라인수 */
    -webkit-box-orient: vertical;
    word-wrap:break-word; 
    line-height: 1.2em;
    height: calc(3.2em); /* line-height 가 1.2em 이고 3라인을 자르기 때문에 height는 1.2em * 3 = 3.6em */
    }



    .gosi-gate-v3 .noticeList .List-Table li a {
        display: inline-block;
        width: 75%;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
        letter-spacing: 0;
    }
    .gosi-gate-v3 .noticeList .List-Table li img {display: inline-block; vertical-align: top; margin-top: 8px;}
    .gosi-gate-v3 .noticeList .List-Table li a span {
        background: #ba560e;
        color:#fff;
        padding: 0 10px;
        border-radius: 10px;
        margin-top:3px;
        margin-right: 5px;
        height: 19px; line-height: 19px;    
    }

    //모달베너 추가
    #Popup200916 {position:fixed; top:100px; left:50%; width:850px; height:482px; margin-left:-425px; display: block;}
</style>

<!-- Container -->

<div id="Container" class="Container gosi-gate-v3 NSK c_both">

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
    </div>
    
    <div class="topMenu">
        <div class="p_re">
            <div class="banner">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_250.jpg" alt="배너"></a>
            </div>
            <div class="gosiLogo">
                <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/2003_logo_2021.png" alt="윌비스공무원">
            </div>
        </div>
        <ul class="menuList">
            <div>
                <a href="#none">9급</a>
            </div>
            <div>
                <a href="#none">7급</a>
            </div>
            <div>
                <a href="#none">7급PSAT</a>
            </div>                    
            <div>
                <a href="#none">세무직</a>
            </div>
            <div>
                <a href="#none">소방직</a>
            </div>
            <div>
                <a href="#none">법원직</a>
            </div>
            <div>
                <a href="#none">기술직</a>
            </div>
            <div>
                <a href="#none">검찰직</a>
            </div>
            <div>
                <a href="#none">군무원</a>
            </div>
        </ul>
    </div>

    <div class="Section gosi-gate-Sec">                
        <div class="gosi-gate-bntop-img">
            <div class="gate-bntop-Slider mainSlider01">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_02.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                    <li class="swiper-slide">
                        <a href="#none">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_03.jpg" alt="배너명">
                            {{--<span><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000x430_01_s.jpg" alt="배너명"></span>--}}
                        </a>
                    </li>
                </ul> 
            </div>                  
        </div>   

        <div class="MaintabList">
            <div class="widthAuto p_re">
                <div class="MaintabWrap">
                    <ul class="Maintab">
                        <li><a data-swiper-slide-index="0" href="javascript:void(0);" class="active">
                            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">
                            9급<br>pass</a></li>
                        <li><a data-swiper-slide-index="1" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">
                            7급<br>pass</a></li>
                        <li><a data-swiper-slide-index="2" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        세무직<br>pass</a></li>
                        <li><a data-swiper-slide-index="3" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        법원직<br>pass</a></li>
                        <li><a data-swiper-slide-index="4" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        농업직<br>pass</a></li>
                        <li><a data-swiper-slide-index="5" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        통신/전기<br>pass</a></li>
                        <li><a data-swiper-slide-index="6" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        전산직<br>pass</a></li>
                        <li><a data-swiper-slide-index="7" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        환경직<br>pass</a></li>
                        <li><a data-swiper-slide-index="8" href="javascript:void(0);">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80.jpg" alt="배너명">    
                        산림자원직<br>pass</a></li>
                    </ul>
                </div>                
            </div>
        </div> 
    </div>
    

    <div class="Section newsWrap">           
        <div class="newsBox">
            <ul class="newsSlider">
                <li>
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_01.jpg" alt="배너명"></a>
                </li>
                <li>
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_02.jpg" alt="배너명"></a>
                </li>
                <li>
                    <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_320x400_03.jpg" alt="배너명"></a>
                </li>
            </ul> 
            <p class="leftBtn"><a id="newsSliderLeft"></a></p>                   
            <p class="rightBtn"><a id="newsSliderRight"></a></p>                              
        </div>
        <div class="rightWrap">
            <div class="will-nTit NSK-Black">지금 윌비스에서<span>주목해야 할 강의!</span></div> 
            <div class="banner">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_01.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_02.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_220x280_03.jpg" alt="배너명"></a>
            </div>
        </div>
    </div>


    <div class="Section gosi-bnfull02">
        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_2000.jpg" alt="배너명"></a>
    </div>


    <div class="Section mt80">        
        <div class="widthAuto">
            <div class="will-nTit NSK-Black tx-left">합격을 향한 <span>빈틈없는 커리큘럼</span></div>
            <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_1120_02.gif" alt="">
        </div>
    </div>

    <div class="Section tpassWrap">        
        <div class="widthAuto">
            <div class="will-nTit NSK-Black tx-left mb40"><span>원하는 교수님</span>의 과정을 무제한 수강</div>
            <div class="slider">
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_550_01.jpg" alt="배너명"></a>               
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_550_02.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_550_01.jpg" alt="배너명"></a>
                <a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_550_02.jpg" alt="배너명"></a>
            </div>
            <div class="prfoWrap">
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
                <div>
                    <a href="#none">
                        <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_100.jpg" alt="배너명">                        
                    </a>
                    <div class="castTitle">국어 오대혁</div>
                </div>
            </div>
        </div>
    </div>

    <div class="Section castWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">보기만 해도 열공이 되는 <span>YOUTUBE</span></div>  
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
                </ul>                        
            </div>
        </div>
    </div>

    <div class="Section gosi-gate-profWrap">
        <div class="widthAuto">
            <div class="will-nTit NSK-Black">언제나 <span>합격</span>만을 고민하는 <span>교수진</span></div>        
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명"></a></div>
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>    
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명"></a></div>
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>    
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명"></a></div>
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명"></a></div>
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
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_03.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_02.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="nSlider">
                                <div class="sliderProf">
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_05.jpg" alt="배너명 핵심이론"></a></div>
                                    <div><a href="#none"><img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_210_04.jpg" alt="배너명"></a></div>
                                </div>
                            </div>
                        </li>
                    </ul>                
                </div>
            </div>
        </div>
    </div>  


    <div class="Section">
        <div class="widthAuto">
            <div class="nNoticeBox three">
                <div class="noticeList widthAuto530 f_left">
                    <div class="will-nlistTit p_re">공지사항 <a href="https://cop.dev.willbes.net/support/notice/index" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>경찰3과 과목별 만점자를 소개합니다.</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">하승민 영어 2018년 3차 시험 적중!</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원(순경)채용 공고 입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[신규강의 안내] 해양경찰특채 11~12월 동영상 업데이트 안내</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
                <div class="noticeList widthAuto530 f_right">
                    <div class="will-nlistTit p_re">시험공고 <a href="https://cop.dev.willbes.net/support/examAnnouncement/index/cate/3001" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                    <ul class="List-Table">
                        <li><a href="#none"><span>HOT</span>2018년 제3차 경찰공무원(순경)채용 필기시험 문제 및 가답안</a><img src="{{ img_url('cop/icon_new.png') }}"><span class="date">2018-09-06</span></li>
                        <li><a href="#none">[공지] 2018년 제3차 경찰공무원 채용 필기시험 문제 및 가답안</a><span class="date">2018-09-01</span></li>
                        <li><a href="#none">2018년 제3차 경찰공무원 채용시험 원서접수일정 안내입니다.</a><span class="date">2018-08-24</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                        <li><a href="#none">[공지] 2018년 제2차 경찰공무원 채용시험 일정 안내입니다.</a><span class="date">2018-08-13</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="Section NSK mt80 mb90">
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
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/1112/banner_20210201181048.png" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0625/banner_20200625154631.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
            <li>   
                <div class="QuickSlider">      
                    <div class="sliderNum">
                        <div><a href="#none" target="_blank"><img src="https://police.stage.willbes.net/public/uploads/willbes/banner/2019/0324/banner_20190324165210.jpg" title="배너명"></a></div>
                        <div><a href="#none" target="_blank"><img src="https://pass.willbes.net/public/uploads/willbes/banner/2020/0224/banner_20200624133355.jpg" title="배너명"></a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- End Container -->


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<script type="text/javascript">
        //swiper 메인 슬라이드
        $(document).ready(function(){
            var mainslider = new Swiper('.mainSlider01', {
                spaceBetween: 30,
                effect: "fade",
                pagination: {
                    el: ".swiper-pagination-gate",
                    type: "fraction",
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                }, //3초에 한번씩 자동 넘김
                on: {
                    slideChange: function () {
                        $('.Maintab li > a').removeClass('active');
                        $('.Maintab li > a').eq(this.realIndex).addClass('active').trigger('click');
                        if($('.Maintab li:eq(0) > a').hasClass('active')){
                            // mainslider.update();
                            // location.reload();
                        }
                        $('.tabCts a').removeClass('active');
                        $('.tabCts a').eq(this.realIndex).addClass('active');
                    }
                }
            });

            //메인 슬라이드 메뉴1
            $('.Maintab li > a').on('click', function(){
                $('.Maintab li > a').removeClass('active');
                $(this).addClass('active');
                var num = $(this).attr('data-swiper-slide-index');
                mainslider.slideTo(num);
                var target = $(this);
                muCenter(target);
            });

            //슬라이드 메뉴1 클릭시 위치조정
            function muCenter(target){
                var snbwrap = $('.Maintab');
                var targetPos = target.position();
                var pos;
                var listWidth=0;

                snbwrap.find('li').each(function(){ listWidth += $(this).outerWidth(); })

                setTimeout(function(){snbwrap.css({
                    "transform": "translateX("+ (pos*-1) +"px)",
                    "transition-duration": "500ms"
                })}, 200);
            }

            //메인 슬라이드 메뉴2(진행중인 모든 이벤트)
            $('.tabCts > a').on('click', function(){
                $('.tabCts > a').removeClass('active');
                $(this).addClass('active');
                var num = $(this).attr('data-swiper-slide-index');
                mainslider.slideTo(num);
            });
        });


        //무제한 수강
        $(function() {
            $('.tpassWrap .slider').bxSlider({
                mode: 'horizontal', 
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                slideMargin:0,
                autoHover:true,
                pager:true,
            });
        });

        //새로운소식
        $(function() {
            var newsImg = $(".newsSlider").bxSlider({
                mode:'fade', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideMargin:0,
                autoHover:true,
                moveSlides:1,
            });
            $("#newsSliderLeft").click(function (){
                newsImg.goToPrevSlide();
            });

            $("#newsSliderRight").click(function (){
                newsImg.goToNextSlide();
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
                pager: false,
                pagerType: 'short',
                slideWidth: 210,
                minSlides:1,
                maxSlides:1,
                moveSlides:1,
                adaptiveHeight: true,
                infiniteLoop: true,
                slideMargin:0,
                touchEnabled: false,
                autoHover: true,
                onSliderLoad: function(){
                    $(".gosi-gate-prof").css("visibility", "visible").animate({opacity:1});
                }
            });
        });
    </script>

@stop