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

        .wb_cts00 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1050_01L_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/05/1050_02L_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#abb1b9}
        .wb_cts04 {background:#696d73}
		.wb_cts05 {background:#ebecef}
		.wb_cts06 {background:#f8f9fa}


    </style>

		<div class="evtCtnsBox wb_cts00">
                        <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_01L.png" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_02L.png" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_03L.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_04L.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_05L.jpg" alt="슈퍼pass"  />
        </div>

        <div class="evtCtnsBox wb_cts05" id="lect">
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_06L.jpg" alt="슈퍼pass"  usemap="#pass"/>
            <map name="pass">
                <area shape="rect" coords="380,1202,741,1285"  href="{{ site_url('/pass/OffVisitPackage?cate_code=3010&campus_ccd=605001&course_idx=1085') }}" alt="일반10개월" target="_blank">       
            </map>
        </div>
		
		<div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1050_07L.jpg" alt="슈퍼pass"  />
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