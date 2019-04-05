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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .layer			{width:100%;height:1070px; -ms-overflow:hidden;}
        .video			{width:100%; height:1070px; margin:0 auto; overflow:hidden;position:relative; opacity:0.5; box-shadow:0px rgba(0,0,0,0.5); background:#000}
        .pngimg			{width:1120px; margin:0 auto; position:relative; top:-1070px;}
        .pngimg-real	{width:1120px; height:1070px; position:absolute;top:0;}

        .wb_mp4 {background:#000;}

        .wb_cts00 {background:#04060f}
        .wb_cts01 {background:#c8c7c4}
        .wb_cts02 {background:#ebecef}
        .wb_cts03 {background:#f8f9fa}
        .wb_cts04 {background:#fff}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="margin:0px auto; width:100%;" autoplay="" loop="" muted="">
                        <source src="http://file3.willbes.net/new_cop/EV180628.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p1_1.png" alt="슈퍼pass"  />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts00" >
            <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p1_2.jpg"  alt="가격" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p2.jpg"  alt="솔루션" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p3.jpg"  alt="교수진" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p4.jpg"  alt="특별혜택" />
        </div>

        <div class="evtCtnsBox wb_cts04" id="lect">
            <img src="https://static.willbes.net/public/images/promotion/superpass/1050_p5.jpg" alt="수강신청" usemap="#pass" />
            <map name="pass">
                <area shape="rect" coords="518,1584,646,1731" href="{{ site_url('/pass/OffVisitPackage?cate_code=3010&campus_ccd=605001') }}" alt="일반10개월" target="_blank">
                <area shape="rect" coords="833,1670,985,1729" href="{{ site_url('/pass/OffVisitPackage?cate_code=3011&campus_ccd=605001') }}" alt="경행10개월" target="_blank">               
            </map>
        </div>


    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop