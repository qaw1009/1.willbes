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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/06/1696_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1696_01_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1696_02_bg.jpg) no-repeat center top; padding-bottom:100px}
        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2020/06/1696_03_bg.jpg) no-repeat center top; padding:317px 0 100px}
        .wb_cts04 {background:#ecebeb;padding-bottom:100px}
        .wb_cts05 {}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; margin-top:-28px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both} 


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1696_top.jpg"  alt="적중 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1696_01.jpg"  alt="한국사정복 " />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1696_02.jpg"  alt="고득점 전략가" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_04.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/04/1552_03_09.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_p_prev.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_p_next.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <iframe width="854" height="480" src="https://www.youtube.com/embed/b9JcjmZNmsQ?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04.jpg" usemap="#Map1696B" alt="적중사례" />
            <map name="Map1696B" id="Map">
                <area shape="rect" coords="350,612,768,677" href="https://police.willbes.net/pass/support/notice/show?board_idx=280603" alt="자료다운"  target="_blank" />
            </map>
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_04.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_09.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_10.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_11.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_04_12.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2020/06/1696_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1696_05.jpg"  alt="커리큘럼 & 강의신청" usemap="#map1696"  />
            <map name="map1696">
                <area shape="rect" coords="250,1037,527,1092" href="/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" alt="온라인강의 신청" target="_blank">
                <area shape="rect" coords="593,1033,868,1092" href="https://police.willbes.net/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" alt="학원강의 신청" target="_blank">
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

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
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

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
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