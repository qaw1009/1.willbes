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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .WB_con01 {background:#ebecee url('http://file3.willbes.net/new_cop/2018/11/EV181112_1_bg.png') no-repeat center;  background-size:auto; margin-top:20px}
        .WB_con02 {background:#c21c1c;}
        .WB_con03 {background:#fff;}
        .WB_con04 {background:#f4f2f5 url(http://file3.willbes.net/new_cop/2018/11/EV181112_4_bg.png) no-repeat center;}
        .WB_con05 {background:#c21c1c;}
        .WB_con06 {background:#e7e5e8;}
        .WB_con07 {background:#f4f2f5;}


        /* 슬라이드배너 */
        .bannerImg1 {position:relative; width:850PX; margin:0 auto; z-index:1000;}
        .bannerImg1 p {position:absolute; top:200px; width:50px; z-index:1000}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-10%;width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:-10%;width:65px; height:65px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_1.png" alt="#" usemap="#Map_1112_event" border="0" />
            <map name="Map_1112_event">
                <area shape="circle" coords="1089,207,86" href="#event_go" alt="이벤트 하단">
            </map>
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2.png" alt="" />
            <div class="bannerImg1" style="margin-bottom:10px;">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c1.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c2.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c3.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c4.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c5.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_c6.png" alt="1"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_cop/2018/11/EV_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_cop/2018/11/EV_arr_r.png"></a></p>
            </div>
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_2_txt_b.png"/>
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_3.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con04">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_4.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con05">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_5.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con06">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_6.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con07"  id="event_go">
            <img src="http://file3.willbes.net/new_cop/2018/11/EV181112_7.png" alt="#" />
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:500,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:850,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop