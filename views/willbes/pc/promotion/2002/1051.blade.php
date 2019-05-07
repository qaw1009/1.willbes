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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            bottom:20px;
            right:0;
            z-index:1;
        }


        .wb_top {background:#1a1e25 url(http://file3.willbes.net/new_cop/sparta/SP190116_p1_bg.jpg) no-repeat center top}
        .wb_01 {background:#3e4552}
        .wb_02 {background:#ededed; padding-bottom:80px;}
        .wb_03 {background:#2d77be url(http://file3.willbes.net/new_cop/sparta/SP170912_03_bg.jpg) no-repeat center top}
        .wb_04 {background:#e5e5e6 url(http://file3.willbes.net/new_cop/sparta/SP170912_04_bg.jpg) repeat}
        .wb_05 {background:#d4d4d4 url(http://file3.willbes.net/new_cop/sparta/SP170912_05_bg.jpg) repeat; padding-bottom:80px}
        .wb_06 {background:#f7f7f7}
        .wb_07 {background:#d7d7d7}
        .wb_spot {background:#fff}


        /* 슬라이드배너 */
        .slide_con1 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con1 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con1 img {width:100%;}
        .slide_con1 p a {cursor:pointer}
        .slide_con1 p.leftBtn1 {left:10px; top:50%; width:62px; height:62px; margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}
        .slide_con1 p.rightBtn1 {right:10px;top:50%; width:62px; height:62px;  margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}

        .slide_con2 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con2 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con2 img {width:100%;}
        .slide_con2 p a {cursor:pointer}
        .slide_con2 p.leftBtn2 {left:10px; top:60%; width:62px; height:62px; margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}
        .slide_con2 p.rightBtn2 {right:10px;top:60%; width:62px; height:62px;  margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}

        .slide_con3 {position:relative; width:900px; margin:0 auto; padding-top:10px;}
        .slide_con3 p {position:absolute; top:35%; width:30px; z-index:90}
        .slide_con3 img {width:100%;}
        .slide_con3 p a {cursor:pointer}
        .slide_con3 p.leftBtn3 {left:10px; top:60%; width:62px; height:62px; margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}
        .slide_con3 p.rightBtn3 {right:10px;top:60%; width:62px; height:62px;  margin-top:-64px;opacity:0.9; filter:alpha(opacity=90);}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <a href="#memo"><img src="http://file3.willbes.net/new_cop/sparta/SP190116_sky_right.png" alt="수강신청"></a>
        </div>

        <div class="evtCtnsBox wb_top" id="sparta">
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p1.png" alt="스파르타" />
        </div>

        <div class="evtCtnsBox wb_spot" id="february">
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p2.jpg" alt="이벤트" />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p3.jpg" alt="교수님들" />
        </div>

        <div class="evtCtnsBox wb_07" id="memo" >
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p3_memo2.png" alt="2018 합격수기" />
            <div class="slide_con1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll21.jpg" alt="21"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll22.jpg" alt="22"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll23.jpg" alt="23"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll24.jpg" alt="24"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll25.jpg" alt="25"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll26.jpg" alt="26"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll27.jpg" alt="27"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll28.jpg" alt="28"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll29.jpg" alt="29"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll30.jpg" alt="30"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll31.jpg" alt="31"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll32.jpg" alt="32"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll33.jpg" alt="33"/></li>
                </ul>
                <p class="leftBtn1"><a id="imgBannerLeft1"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_l.png"></a></p>
                <p class="rightBtn1"><a id="imgBannerRight1"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_r.png"></a></p>
            </div>
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p3_memo_yield.png" alt="양해" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p3_memo1.png" alt="2017 합격수기" />
            <div class="slide_con2">
                <ul id="slidesImg2">
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll01.jpg" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll02.jpg" alt="2"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll03.jpg" alt="3"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll04.jpg" alt="4"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll05.jpg" alt="5"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll06.jpg" alt="6"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll07.jpg" alt="7"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll08.jpg" alt="8"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll09.jpg" alt="9"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll10.jpg" alt="10"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/sparta/SP190116_roll11.jpg" alt="11"/></li>
                </ul>
                <p class="leftBtn2"><a id="imgBannerLeft2"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_l.png"></a></p>
                <p class="rightBtn2"><a id="imgBannerRight2"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_r.png"></a></p>
            </div>
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p3_memo_yield.png" alt="양해" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p4.png" alt="채용현황"/>
        </div>

        <div class="evtCtnsBox wb_04" >
            <ul>
                <li><img src="http://file3.willbes.net/new_cop/sparta/SP170912_04_1.png"  alt="특별" /></li>
                <li style="padding-bottom:50px;"><iframe width="854" height="480" src="https://www.youtube.com/embed/OKoWzXkV7jA?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="http://file3.willbes.net/new_cop/sparta/SP170912_04_2.png"  alt="특별" /></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="http://file3.willbes.net/new_cop/sparta/SP170912_05.png" alt="준비" border="0" />
            <div class="slide_con3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll1.jpg" alt="개방형1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll2.jpg" alt="독서실형1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll3.jpg" alt="독서실형3"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll4.jpg" alt="사물함2"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll5.jpg" alt="스핀사이클"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll6.jpg" alt="싯업벤치"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll7.jpg" alt="전형"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2016/11/EV161110_roll8.jpg" alt="해머벤치"/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_l.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_cop/2017/01/EV170126_roll_arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_06" >
            <img src="http://file3.willbes.net/new_cop/sparta/SP190116_p6.png" alt="기대" usemap="#go"/>
            <map name="go" id="go">
                <area shape="rect" coords="320,2519,399,2546" href="{{ site_url('/pass/offVisitLecture?cate_code=3010&subject_idx=1074&campus_ccd=605001') }}" target="_blank"/>
                <area shape="rect" coords="320,2555,399,2580" href="{{ site_url('/pass/promotion/index/code/1057') }}" onfocus='this.blur()'  target="_blank"/>
                <area shape="rect" coords="320,2591,399,2616" href="{{ site_url('/pass/promotion/index/code/1055') }}" onfocus='this.blur()' target="_blank" />
                <area shape="rect" coords="320,2624,399,2654" href="{{ site_url('/pass/promotion/index/code/1051') }}" onfocus='this.blur()' target="_blank" />
				<area shape="rect" coords="317,2656,401,2690" href="{{ site_url('/pass/campus/show/code/605002') }}" onfocus='this.blur()' target="_blank" />
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


    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        })
    </script>
@stop