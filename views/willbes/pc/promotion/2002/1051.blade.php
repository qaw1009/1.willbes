@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
        .skybanner li {margin-bottom:5px}

        .wb_top {background:#1a1e25 url(https://static.willbes.net/public/images/promotion/sparta/1051_top_bg.jpg) no-repeat center top}
        .wb_01 {background:#3e4552}
        .wb_02 {background:#ededed; padding-bottom:80px;}
        .wb_03 {background:#2d77be url(https://static.willbes.net/public/images/promotion/sparta/SP170912_03_bg.jpg) no-repeat center top}
        .wb_04 {background:#e5e5e6 url(https://static.willbes.net/public/images/promotion/sparta/1051_06_bg.jpg) repeat}
        .wb_05 {background:#d4d4d4 url(https://static.willbes.net/public/images/promotion/sparta/SP170912_05_bg.jpg) repeat; padding-bottom:80px}
        .wb_06 {background:#f7f7f7}
        .wb_07 {background:#d7d7d7}
        .wb_spot {background:#fff}


        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .evtCtnsBox p a {cursor:pointer}
        .evtCtnsBox p.leftBtn1 {left:-31px; top:50%; width:62px; height:62px; margin-top:-31px;opacity:0.9; filter:alpha(opacity=90);}
        .evtCtnsBox p.rightBtn1 {right:-31px;top:50%; width:62px; height:62px;  margin-top:-31Dpx;opacity:0.9; filter:alpha(opacity=90);}

        .slide_con2 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con2 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con2 img {width:100%;}
        .slide_con2 p a {cursor:pointer}


        .slide_con3 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con3 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con3 img {width:100%;}
        .slide_con3 p a {cursor:pointer}



    </style>

    <div class="evtContent NSK" id="evtContainer">
        <ul class="skybanner" >
            <li><a href="#february"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_skybanner01.png" alt="수강신청"></a></li>
            <li><a href="#memo"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_skybanner02.png" alt="수강신청"></a></li>
        </ul>

        <div class="evtCtnsBox wb_top" id="sparta">
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_top.jpg" alt="스파르타" />
        </div>

        <div class="evtCtnsBox wb_spot" id="february">
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_01.jpg" alt="개강반" />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_02.jpg" alt="교수님들" />
        </div>

        <div class="evtCtnsBox wb_07" id="memo" >
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t1.png" alt="2018 합격수기" />
            <div class="slide_con1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s03.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s04.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s05.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s06.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s07.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s08.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s09.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s10.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s11.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s12.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_s13.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft1"><img src="https://static.willbes.net/public/images/promotion/sparta/1501_roll_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight1"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_roll_arr_r.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t2.png" alt="양해" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_t1.png" alt="2017 합격수기" />
            <div class="slide_con2">
                <ul id="slidesImg2">
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s01.jpg" alt="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s02.jpg" alt="2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s03.jpg" alt="3"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s04.jpg" alt="4"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s05.jpg" alt="5"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s06.jpg" alt="6"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s07.jpg" alt="7"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s08.jpg" alt="8"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s09.jpg" alt="9"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s10.jpg" alt="10"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_04_s11.jpg" alt="11"/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft2"><img src="https://static.willbes.net/public/images/promotion/sparta/1501_roll_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight2"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_roll_arr_r.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_03_t2.png" alt="양해" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_05.jpg" alt="채용현황"/>
        </div>

        <div class="evtCtnsBox wb_04" >
            <ul>
                <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_06_t1.png"  alt="특별" /></li>
                <li style="padding-bottom:50px;"><iframe width="854" height="480" src="https://www.youtube.com/embed/OKoWzXkV7jA?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_06_01.png"  alt="특별" /></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_t1.png" alt="준비" border="0" />
            <div class="slide_con3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s01.jpg" alt="개방형1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s02.jpg" alt="독서실형1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s03.jpg" alt="독서실형3"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s04.jpg" alt="사물함2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s05.jpg" alt="스핀사이클"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s06.jpg" alt="싯업벤치"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s07.jpg" alt="전형"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/sparta/1051_07_s08.jpg" alt="해머벤치"/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/sparta/1501_roll_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/sparta/1051_roll_arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_06" >
            <img src="https://static.willbes.net/public/images/promotion/sparta/1051_08.jpg" alt="기대" usemap="#go"/>
            <map name="go" id="go">
                <area shape="rect" coords="389,2520,468,2547" href="{{ site_url('/pass/home/index') }}" target="_blank"/>
                <area shape="rect" coords="389,2555,468,2580" href="{{ site_url('/pass/campus/show/code/605003') }}" onfocus='this.blur()'  target="_blank"/>
                <area shape="rect" coords="389,2591,468,2616" href="{{ site_url('/pass/campus/show/code/605004') }}" onfocus='this.blur()' target="_blank" />
                <area shape="rect" coords="389,2624,468,2654" href="{{ site_url('/pass/campus/show/code/605006') }}" onfocus='this.blur()' target="_blank" />
				<area shape="rect" coords="389,2656,468,2690" href="{{ site_url('/pass/campus/show/code/605002') }}" onfocus='this.blur()' target="_blank" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft1").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight1").click(function (){
                slidesImg2.goToNextSlide();
            });
        });

        $(document).ready(function() {
            var slidesImg2 = $("#slidesImg2").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:8000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft2").click(function (){
                slidesImg2.goToPrevSlide();
            });

            $("#imgBannerRight2").click(function (){
                slidesImg2.goToNextSlide();
            });
        });
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:900,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>
@stop