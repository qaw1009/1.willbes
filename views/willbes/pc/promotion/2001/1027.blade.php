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

        .wb_top {background:#e9e9e9 url(http://file3.willbes.net/new_cop/2018/04/EV180409_p1_bg.png) no-repeat center;}
        .wb_cts01 {background:#e9e9e9;}
        .wb_cts02 {background:#392031 url(http://file3.willbes.net/new_cop/2018/04/EV180409_p3_bg.png) no-repeat center;}
        .wb_cts03 {background:#2c2c2c; padding-bottom:100px;}
        .wb_cts04 {background:#bda97d; padding-bottom:100px;}
        .wb_cts05 {background:#fff; padding:100px; 0}


        /* 슬라이드배너 */
        .slide_con {position:relative; width:1200px; margin:0 auto}
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
            <img src="http://file3.willbes.net/new_cop/2018/EV190111_pp1.png" alt="적중" />
        </div><!--wb_cts01//-->

{{--        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2018/EV190111_pp2.png" alt="한국사정복" />
            <a href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132280') }}" target="_blank"><img src="http://file3.willbes.net/new_cop/2018/04/EV180911_pp2_bt.png"  alt="한국사정복 " /></a>
        </div>--}}

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180409_p3.png"  alt="고득점 전략가" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2018/EV190111_pp4.png"  alt="동영상" /><br>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/-gCHGewLkEU?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <!--
            <img src="http://file3.willbes.net/new_cop/2018/EV190111_pp5.png"  alt="적중사례" /></li>
            <a href="{{ site_url('/support/notice/index/cate/3001') }}" target="_blank">
                <img src="http://file3.willbes.net/new_cop/2018/04/EV180409_p5_bt.png"  alt="더 많은 적중사례 보러가기" />
            </a>
            -->
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190121_p5_1.png" alt="1-2" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190121_p5_2.png" alt="3-4" /></li>
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190121_p5_3.png" alt="5-6" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170913_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170913_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180911_pp6.png"  alt="커리큘럼 & 강의신청" usemap="#p1"  />
            <map name="p1" id="p1">
                <area shape="rect" coords="179,970,453,1028" href="{{ site_url('/professor/show/cate/3001/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture#none') }}" onfocus='this.blur()'  alt="온라인강의 신청">
                <area shape="rect" coords="522,971,795,1027" href="{{ site_url('/pass/professor/show/prof-idx/50642/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" onfocus='this.blur()'  alt="학원강의 신청">
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