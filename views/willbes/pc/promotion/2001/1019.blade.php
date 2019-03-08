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

        .wb_top {background:#16191d url(http://file3.willbes.net/new_cop/2019/01/EV190107_p1_bg.jpg) no-repeat center;}


        .wb_cts01 {background:#1b3752 url(http://file3.willbes.net/new_cop/2019/01/EV190107_p2_bg.jpg) no-repeat center;}


        .wb_cts02 {background:#dedede url(http://file3.willbes.net/new_cop/2019/01/EV190107_p3_bg.jpg) no-repeat center;}


        .wb_cts03 {background:#0d1625 url(http://file3.willbes.net/new_cop/2019/01/EV190107_p4_bg.jpg) no-repeat center;}


        .layer				{width:100%;height:1070px; -ms-overflow:hidden;}
        .video			{width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.5; box-shadow:0px rgba(0,0,0,0.5); background:#000000}
        .pngimg			{width:1210px; margin:0 auto; position:relative; top:-1070px;}
        .pngimg-real	{width:1210px; height:1070px; position:absolute;top:0;}

        .wb_mp4 {margin:0 auto; background:#000; }


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://sample.hd.willbes.gscdn.com/police/homepage_image/190118_junhkyeong_bus_1366x698.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <li><img src="http://file3.willbes.net/new_cop/2019/01/EV190107_p1_new.png"  alt="1" /></li>
                        <li style="padding-bottom:100px;"><iframe width="854" height="480" src="https://www.youtube.com/embed/lrZxQV21DE8?rel=0" frameborder="0" allowfullscreen></iframe></li>
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190107_p2.png"  alt="2" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190107_p3.png"  alt="3" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190107_p4.png"  alt="4" />
        </div>

    </div>
    <!-- End Container -->


    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>

@stop