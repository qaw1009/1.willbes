@extends('willbes.pc.layouts.master')

@section('content')
<link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.5/dist/web/static/pretendard-dynamic-subset.css" />

<style type="text/css">
    @@import url("https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.5/dist/web/static/pretendard-dynamic-subset.css");

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

    .gosi-gate-secTop {position:relative; padding-top:56px;}
    .gosi-gate-secTop .gosi-gate-search {position:absolute; top:35px;}
    .topMenu {position: absolute; width:1120px; left:50%; margin-left:-560px; top:40px;}
    .topMenu .banner {position: absolute; top:10px; z-index: 10;}
    .gosiLogo {position: absolute; top:20px; left:50%; margin-left:-105px; border:1px solid #fff}
    .menuList {display:flex; font-size:16px; width:1080px; margin:120px auto 0; justify-content: center; align-items: center; font-weight:bold}
    .menuList div {width:11.1111%}
    .menuList a {display:block; text-align:center}

    .gosi-gate-Sec {margin-top:100px; padding:0; text-align:center; background:none;
        font-family: -apple-system, BlinkMacSystemFont, "Apple SD Gothic Neo", Pretendard, Roboto, "Noto Sans KR", "Segoe UI", "Malgun Gothic", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", sans-serif;}
    .gosi-gate-Sec .gosi-gate-bntop-img {position:relative;}

    .gate-bntop-Slider .swiper-slide {height:430px;}
    .gate-bntop-Slider .swiper-slide a {display:block; height:100%;}
    .gate-bntop-Slider .swiper-slide .txtBox {width:450px; position:absolute; top:50px; left:50%; margin-left:-450px; font-size:16px; text-align:left; color:#fff; line-height:1.2; letter-spacing:0}
    .gate-bntop-Slider .swiper-slide .txtBox .title01 {color:#fefd0d; margin-bottom:16px}
    .gate-bntop-Slider .swiper-slide .txtBox .title02 {font-size:44px; margin-bottom:38px; font-weight:900}
    .gate-bntop-Slider .swiper-slide .txtBox .title03 {margin-bottom:56px; font-weight:500}
    .gate-bntop-Slider .swiper-slide .txtBox .title04 strong {color:#fefd0d; background:rgba(0,0,0,.5); border-radius:30px; padding:8px 25px;}
    .gate-bntop-Slider .swiper-slide span {position:absolute; top:40px; left:50%; margin-left:120px; width:350px; height:350px; overflow: hidden;}
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
    .gosi-gate-Sec .MaintabControl .swiper-pagination-current {font-weight: 600; color:#fff;}
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


    <div id="Container" class="Container gosi-gate-v3 NSK c_both">

        <div class="widthAuto gosi-gate-secTop">
            <div class="gosi-gate-search">
                {{-- 온라인강의 검색 --}}
                @include('willbes.pc.layouts.partial.site_search')
            </div>
        </div>

        <div class="topMenu">
            <div class="p_re">
                <div class="banner">
                    {!! banner_html(element('게이트_우측상단배너', $data['banner'])) !!}
                </div>
                <div class="gosiLogo">
                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2021/2003_logo_2021.png" alt="윌비스공무원">
                </div>
            </div>
            <ul class="menuList">
                <div><a href="{{ front_url('/home/index/cate/3019') }}">9급</a></div>
                <div><a href="{{ front_url('/home/index/cate/3020') }}">7급</a></div>
                <div><a href="{{ front_url('/home/index/cate/3103') }}">7급PSAT</a></div>
                <div><a href="{{ front_url('/home/index/cate/3022') }}">세무직</a></div>
                <div><a href="{{ front_url('/home/index/cate/3023') }}">소방직</a></div>
                <div><a href="{{ front_url('/home/index/cate/3035') }}">법원직</a></div>
                <div><a href="{{ front_url('/home/index/cate/3028') }}">기술직</a></div>
                <div><a href="{{ front_url('/home/index/cate/3148') }}">검찰직</a></div>
                <div><a href="{{ front_url('/home/index/cate/3024') }}">군무원</a></div>
            </ul>
        </div>

        <div class="Section gosi-gate-Sec">
            <div class="gosi-gate-bntop-img">
                <div class="gate-bntop-Slider mainSlider01">
                    <ul class="swiper-wrapper">
                        @if(isset($data['banner']['게이트_메인배너']) === true)
                            @for($i=0; $i<count($data['banner']['게이트_메인배너']); $i++)
                                <li class="swiper-slide" style="@if($data['banner']['게이트_메인배너'][$i]['IsUseViewHtml'] == 'Y')background-color: {{$data['banner']['게이트_메인배너'][$i]['BgColor']}}@endif">
                                    {!! banner_html(array($data['banner']['게이트_메인배너'][$i])) !!}
                                </li>
                            @endfor
                        @endif
                    </ul>
                </div>
            </div>

            <div class="MaintabList">
                <div class="widthAuto p_re">
                    <div class="MaintabWrap">
                        <ul class="Maintab">
                            <li><a data-swiper-slide-index="0" href="javascript:void(0);" class="active">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_01.jpg" alt="배너명">
                                    9급PASS<br>할인</a></li>
                            <li><a data-swiper-slide-index="1" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_02.jpg" alt="배너명">
                                    윌비스<br>세무팀</a></li>
                            <li><a data-swiper-slide-index="2" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_03.jpg" alt="배너명">
                                    불꽃소방<br>신규개강</a></li>
                            <li><a data-swiper-slide-index="3" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_04.jpg" alt="배너명">
                                    농업직<br>통신직</a></li>
                            <li><a data-swiper-slide-index="4" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_05.jpg" alt="배너명">
                                    축산직<br>조경직</a></li>
                            <li><a data-swiper-slide-index="5" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_06.jpg" alt="배너명">
                                    군무원<br>행정직</a></li>
                            <li><a data-swiper-slide-index="6" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_07.jpg" alt="배너명">
                                    검찰직<br>신규런칭</a></li>
                            <li><a data-swiper-slide-index="7" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_08.jpg" alt="배너명">
                                    7급<br>PSAT</a></li>
                            <li><a data-swiper-slide-index="8" href="javascript:void(0);">
                                    <img src="https://static.willbes.net/public/images/promotion/main/gosi_gate/2022/intro_sum_80x80_09.jpg" alt="배너명">
                                    김동진<br>법원팀</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="Section newsWrap">
            <div class="newsBox">
                <ul class="newsSlider">
                    @if(isset($data['banner']['게이트_주목1']) === true)
                        @for($i=0; $i<count($data['banner']['게이트_주목1']); $i++)
                            <li class="swiper-slide">
                                {!! banner_html(array($data['banner']['게이트_주목1'][$i])) !!}
                            </li>
                        @endfor
                    @endif
                </ul>
                <p class="leftBtn @if(!( isset($data['banner']['게이트_주목1']) === true && count($data['banner']['게이트_주목1']) > 1)) d_none @endif"><a id="newsSliderLeft"></a></p>
                <p class="rightBtn @if(!( isset($data['banner']['게이트_주목1']) === true && count($data['banner']['게이트_주목1']) > 1)) d_none @endif"><a id="newsSliderRight"></a></p>
            </div>
            <div class="rightWrap">
                <div class="will-nTit NSK-Black">지금 윌비스에서 <span>주목해야 할 강의!</span></div>
                <div class="banner">
                    {!! banner_html(element('게이트_주목2', $data['banner'])) !!}
                    {!! banner_html(element('게이트_주목3', $data['banner'])) !!}
                    {!! banner_html(element('게이트_주목4', $data['banner'])) !!}
                </div>
            </div>
        </div>

        <div class="Section gosi-bnfull02">
            {!! banner_html(element('게이트_초보가이드', $data['banner'])) !!}
        </div>

        <div class="Section mt80">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black tx-left">합격을 향한 <span>빈틈없는 커리큘럼</span></div>
                {!! banner_html(element('게이트_단기합격자', $data['banner'])) !!}
            </div>
        </div>

        <div class="Section tpassWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black tx-left mb40"><span>원하는 교수님</span>의 과정을 무제한 수강</div>
                {!! banner_html(element('게이트_무제한수강', $data['banner']), '','' , false, 'none') !!}

                <div class="prfoWrap">
                @if(isset($data['banner']['게이트_과목별교수']))
                    @foreach(element('게이트_과목별교수', $data['banner']) as $row)
                        <div>
                        {!! banner_html(array($row), '', '', false, 'none', '', 'castTitle') !!}
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>

        <div class="Section castWrap">
            <div class="widthAuto">
                <div class="will-nTit NSK-Black">보기만 해도 열공이 되는 <span>YOUTUBE</span></div>
                <div class="castBox">
                    <ul class="castslider">
                        @for($i=1;$i<=10;$i++)
                            <li>
                                {!! banner_html(element('게이트_유튜브'.$i, $data['banner']), '', '', false, '', '', 'castTitle') !!}
                            </li>
                        @endfor
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
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_9_7급'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_9_7급'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor

                        </ul>
                    </div>
                    <div id="item02" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_세무직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_세무직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item03" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_법원직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_법원직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item04" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_소방직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_소방직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item05" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_기술직'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_기술직'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                    <div id="item06" class="gosi-tabs-content">
                        <ul class="gosi-gate-prof" >
                            @for($i=1; $i<=5; $i++)
                                @if(isset($data['banner']['게이트_군무원'.$i]) === true)
                                    <li>
                                        <div class="nSlider">
                                            {!! banner_html(element('게이트_군무원'.$i, $data['banner']), 'sliderProf') !!}
                                        </div>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="Section">
            <div class="widthAuto">
                <div class="nNoticeBox three">
                    <div class="noticeList widthAuto530 f_left">
                        <div class="will-nlistTit p_re">공지사항 <a href="{{front_url('/support/notice/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['notice']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['notice'] as $row)
                                    <li>
                                        <a href="{{front_url('/support/notice/show?board_idx=' . $row['BoardIdx'])}}">
                                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                                            {{$row['Title']}}
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}"/>@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="noticeList widthAuto530 f_right">
                        <div class="will-nlistTit p_re">시험공고 <a href="{{front_url('/support/examAnnouncement/index')}}" target="_blank" class="btn-add"><img src="{{ img_url('cop/icon_add_big.png') }}"></a></div>
                        <ul class="List-Table">
                            @if(empty($data['exam_announcement']) === true)
                                <li><span>등록된 내용이 없습니다.</span></li>
                            @else
                                @foreach($data['exam_announcement'] as $row)
                                    <li>
                                        <a href="{{front_url($row['PassRoute'] . '/support/examAnnouncement/show?board_idx='.$row['BoardIdx'], false, true)}}">
                                            @if($row['IsBest'] == '1')<span>HOT</span>@endif
                                            {{$row['Title']}}
                                        </a>
                                        @if(date('Y-m-d') == $row['RegDatm'])<img src="{{ img_url('cop/icon_new.png') }}">@endif
                                        <span class="date">{{$row['RegDatm']}}</span>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="Section NSK mt80 mb90">
            <div class="widthAuto">
                @include('willbes.pc.site.main_partial.cscenter_' . $__cfg['SiteCode'])
            </div>
        </div>

        <div id="QuickMenu" class="MainQuickMenu">
            <ul>
                @if(empty($data['dday']) === false)
                    <li class="dday">
                        <div class="QuickSlider">
                            <div class="sliderNum">
                                @foreach($data['dday'] as $val)
                                    @php $arr_dday = explode('::', $val); @endphp
                                    <div class="QuickDdayBox">
                                        <div class="q_tit">{{ $arr_dday[0] }}</div>
                                        <div class="q_day">{{ $arr_dday[1] }}</div>
                                        <div class="q_dday NSK-Black">{{ $arr_dday[2] == 0 ? 'D-' . $arr_dday[2] : 'D' . $arr_dday[2] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                @endif
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵_01', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵_02', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
                <li>
                    <div class="QuickSlider">
                        {!! banner_html(element('게이트_우측퀵_03', $data['banner']), 'sliderNum') !!}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Container -->
    {!! popup('657005', $__cfg['SiteCode'], '0', '') !!}

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