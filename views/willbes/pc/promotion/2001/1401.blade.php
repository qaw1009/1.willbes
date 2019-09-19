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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/09/1401_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1401_01_bg.jpg) no-repeat center;}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1401_02_bg.jpg) no-repeat center;}
        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1401_04_bg.png) no-repeat center;padding-bottom:140px;}
        .wb_cts05 {background:#ecebeb;}
        .wb_cts06 {background:#fff;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
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
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_top.jpg"  alt="적중" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_01.jpg"  alt="대각국사 오태진" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_02.jpg"  alt="한국사 전문가 오태진" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03.jpg"  alt="한국사 전문가 오태진" />
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03_03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03_04.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_03_05.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_04.png"  alt="동영상" /><br>
            <iframe width="854" height="480" src="https://www.youtube.com/embed/o3dfkujwIvg" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_05.jpg"  alt="적중사례" usemap="#Map1401a" border="0" />
            <map name="Map1401a" id="Map1401a">
                <area shape="rect" coords="355,611,766,674" href="https://police.willbes.net/pass/support/notice/show?board_idx=238460&" target="_blank" />
            </map>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_05_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_05_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_05_03.jpg" alt="" /></li>	
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_left.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2019/09/1401_right.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1401_06.jpg"  alt="전문가 오태진" usemap="#Map1401b" border="0" />
            <map name="Map1401b" id="Map1401b">
                <area shape="rect" coords="251,1017,533,1079" href="{{ site_url('/professor/show/cate/3001/prof-idx/50131/?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" onfocus='this.blur()'  alt="온라인강의 신청" target="_blank">
                <area shape="rect" coords="588,1013,877,1082" href="{{ site_url('/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC&tab=open_lecture') }}" onfocus='this.blur()'  alt="학원강의 신청" target="_blank">
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

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg4").bxSlider({
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
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
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