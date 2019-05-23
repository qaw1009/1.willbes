@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:#305f8b url(https://static.willbes.net/public/images/promotion/2019/05/1026_bg01.png) no-repeat center;}
        .wb_cts01 {background:#0c2641}
        .wb_cts02 {background:#fff url(http://file3.willbes.net/new_cop/2018/04/EV180412_p3_bg.png) no-repeat center}
        .wb_cts03 {background:#2d5177 url(http://file3.willbes.net/new_cop/2018/04/EV180412_p4_bg.png) no-repeat center; padding-bottom: 100px}
        .wb_cts04 {background:#bda97d;}
        .wb_cts05 {background:#fff; padding-bottom:100px}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  id="main">
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180412_p1.png"  alt="적중 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/04/EV190110_p2.png"  alt="한국사정복 " />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180412_p3.png"  alt="고득점 전략가" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1026_01.png"  alt="동영상" /><br>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/Oz2eKCfPWU4" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_cop/2018/04/EV190110_p5.png" usemap="#Map" alt="적중사례" />
            <map name="Map" id="Map">
                <area shape="rect" coords="249,587,765,674" href="{{ site_url('/pass/support/notice/show?board_idx=226914&') }}" target="_blank" />
            </map>
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1026_s01.jpg" alt="5번,6번" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1026_s02.jpg" alt="9번" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/05/1026_s03.jpg" alt="12번" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/05/1026_s04.jpg" alt="15번" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/05/1026_s05.jpg" alt="20번" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170922_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170922_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180911_p6.png"  alt="커리큘럼 & 강의신청" usemap="#p1"  />
            <map name="p1" id="p1">
                <area shape="rect" coords="173,1033,432,1087" href="{{ site_url('/professor/show/cate/3001/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" onfocus='this.blur()'  alt="온라인강의 신청" target="_blank">
                <area shape="rect" coords="516,1032,779,1087" href="{{ site_url('/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" onfocus='this.blur()'  alt="학원강의 신청" target="_blank">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>


@stop