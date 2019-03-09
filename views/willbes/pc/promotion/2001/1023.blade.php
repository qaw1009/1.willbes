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

        .wb_cts01 {background:#201f1f url(http://file3.willbes.net/new_cop/2019/01/EV190111_c1_bg.jpg) no-repeat center top}
        .wb_cts02 {background:#b69c5f url(http://file3.willbes.net/new_cop/2019/01/EV190111_c3_bg.jpg) no-repeat center top}
        .wb_cts02 ul {width:100%; margin:0 auto}
        .bannerImg3 {position:relative; width:966px; margin:0 auto; padding-bottom: 124px}
        .wb_cts02 ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff; position:relative; width:1210px; margin:0 auto}
        .wb_cts03 .video {position:absolute; top:900px; left:95px; width:419px; z-index:1}
        .wb_cts04 .video {top:600px}
        .wb_cts05 .video {top:550px}
        .wb_cts06 .video {top:420px}
        .wb_cts07 .video {top:580px}
        .wb_cts08 {background:#e9e8e8}
        .wb_cts09 {background:#fa1b2a url(http://file3.willbes.net/new_cop/2019/01/EV190111_c10_bg.jpg) no-repeat center top;   }

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <ul>
                <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c1.jpg" alt=""  /></li>
                <li><iframe width="886" height="497" src="https://www.youtube.com/embed/3iEgf4R4oHU?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c2.jpg" alt=" "  /></li>
            </ul>
        </div><!--wb_cts01//-->


        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c3.jpg" alt=""/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c3_1.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c3_2.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c3_3.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c3_4.jpg" alt=""/></li>
                </ul>
            </div>
        </div><!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c4_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c4.jpg" alt=" " />
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts03 wb_cts04" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c5_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c5.jpg" alt=" " />
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts03 wb_cts05" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c6_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c6.jpg" alt=" " />
        </div><!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts03 wb_cts06" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c7_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c7.jpg" alt=" " />
        </div><!--wb_cts06//-->


        <div class="evtCtnsBox wb_cts03 wb_cts07" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c8_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c8.jpg" alt=" " />
        </div><!--wb_cts07//-->


        <div class="evtCtnsBox wb_cts08" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c9.jpg" alt=" " usemap="#Map190111_c1" border="0" />
            <map name="Map190111_c1" >
                <area shape="rect" coords="345,1054,610,1138" href="/lecture/index/cate/3001/pattern/only" target="_blank" />
                <area shape="rect" coords="614,1054,871,1140" href="/pass/offLecture/index"  target="_blank"/>
            </map>
        </div><!--wb_cts08//-->

        <div class="evtCtnsBox wb_cts09" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_c10.jpg" alt=" "  />
        </div><!--wb_cts09//-->

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                auto:true,
                speed:750,
                pause:5000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:966,
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

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>

@stop