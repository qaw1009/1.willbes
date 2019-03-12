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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .skybanner {
            position:absolute;
            top:20px;
            right:0;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .layer {width:100%;height:1070px; -ms-overflow:hidden;}
        .video {width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.3; box-shadow:0px rgba(0,0,0,0.3); background:#000}
        .pngimg {width:1000px; margin:0 auto; position:relative; top:-1070px;}
        .pngimg-real {width:1000px; height:1070px; position:absolute;top:0;}

        .wb_mp4 {background:#000;}
        .wb_top {background:#2b5a01 url(http://file3.willbes.net/new_cop/2018/04/EV180430_p1_bg.jpg) no-repeat center;}
        .wb_01 {background:#2b3541}
        .wb_02 {background:#3c3e3f url(http://file3.willbes.net/new_cop/2018/01/EV180130_p3_bg.jpg) no-repeat center;}
        .wb_03 {background:#303132}
        .wb_04 {background:#2b2c2d url(http://file3.willbes.net/new_cop/2018/01/EV180130_p5_bg.jpg) no-repeat center;}
        .wb_05 {background:#ebebeb}
        .wb_06 {background:#f5f5f5 url(http://file3.willbes.net/new_cop/2018/01/EV180130_p7_1_bg.jpg) no-repeat center;}



    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_cop/EV190225.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_cop/2019/02/EV190225_p1.png"  alt="메인" usemap="#welcomepack1"  />
                        <map name="welcomepack1" id="welcomepack1">
                            <area shape="rect" coords="282,949,696,1005" href="{{ app_url('/member/join/?ismobile=0&sitecode=' . $__cfg['SiteCode'], 'www') }}" onfocus='this.blur()'  alt="웰컴팩받기" target="_blink">
                        </map>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_cop/2018/03/EV180302_p2.png"  alt="아주특별한혜택" />
        </div>

        <div class="evtCtnsBox wb_03" >
            <img src="http://file3.willbes.net/new_cop/2018/03/EV180302_p4.png"  alt="02" usemap="#pass">
            <map name="pass" id="pass">
                <area shape="rect" coords="465,644,688,670" href="{{ site_url('/home/index/cate/3001') }}" onfocus='this.blur()'  alt="신광은경찰PASS" target="_blink">
            </map>
        </div>

        <div class="evtCtnsBox wb_04" >
            <img src="http://file3.willbes.net/new_cop/2018/03/EV180302_p5.png"  alt="03"  usemap="#welcomepack2">
            <map name="welcomepack2" id="welcomepack2">
                <area shape="rect" coords="86,1062,894,1168" href="{{ app_url('/member/join/?ismobile=0&sitecode=' . $__cfg['SiteCode'], 'www') }}" onfocus='this.blur()'  alt="웰컴팩받기" target="_blink">
            </map>
        </div>

        <div class="evtCtnsBox wb_05" >
            <img src="http://file3.willbes.net/new_cop/2018/03/EV180302_p6.png"  alt="여기서끝이아닙니다" >
        </div>

        <div class="evtCtnsBox wb_06" >
            <img src="http://file3.willbes.net/new_cop/2018/04/EV180430_p7_1.png"  alt="링크들"  usemap="#link">
            <map name="link" id="link">
                <area shape="rect" coords="31,379,149,433" href="{{ site_url('/home/index/cate/3001') }}" onfocus='this.blur()'  alt="신광은경찰PASS" target="_blink">
                <area shape="rect" coords="232,379,352,433" href="{{ site_url('/home/index/cate/3002') }}" onfocus='this.blur()'  alt="경행경채" target="_blink">
                <area shape="rect" coords="430,379,550,433" href="{{ site_url('/home/index/cate/3006') }}" onfocus='this.blur()'  alt="경찰승진PASS" target="_blink">
                <area shape="rect" coords="632,379,749,433" href="#none" onfocus='this.blur()'  alt="법학경채PASS" target="_blink">
                <area shape="rect" coords="830,379,951,433" href="{{ site_url('/home/index/cate/3007') }}" onfocus='this.blur()'  alt="해양경찰" target="_blink">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
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