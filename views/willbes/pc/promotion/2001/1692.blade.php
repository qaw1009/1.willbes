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

        .wb_top {background:#E9E9E9 url(https://static.willbes.net/public/images/promotion/2020/06/1692_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#00581C url(https://static.willbes.net/public/images/promotion/2020/06/1692_01_bg.jpg) no-repeat center;}
        .wb_cts02 {background:#2c2c2c;padding-bottom:100px;}
        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#bea97e;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:1200px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-50px}
        .slide_con p.rightBtn {right:-50px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1692_top.jpg" alt="한국사 적중" />
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1692_01.jpg" alt="고득점 전략가" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1692_02.jpg" alt="한국사 해설강의" />
            <iframe width="854" height="480" src="https://www.youtube.com/embed/-YgSoODw00U?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts03" >   
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1692_03.jpg" usemap="#Map1692a" border="0" />
            <map name="Map1692a" id="Map1692a">
                <area shape="rect" coords="357,615,763,678" href="https://police.willbes.net/pass/support/notice/show?board_idx=277616&" target="_blank" />
            </map>         
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1692_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1692_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1692_03_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1692_03_04.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170913_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/09/EV170913_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >  
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1692_04.jpg" alt="실력완성 솔루션" usemap="#Map1692b" border="0" />
            <map name="Map1692b" id="Map1692b">
                <area shape="rect" coords="242,962,512,1015" href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50641/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture#none" target="_blank" />
                <area shape="rect" coords="584,963,853,1016" href="https://police.willbes.net/pass/professor/show/prof-idx/50642/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture" target="_blank" />
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