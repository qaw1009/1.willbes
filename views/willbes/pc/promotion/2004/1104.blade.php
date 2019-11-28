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
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
        .WB_con01 {background:#fae100; padding:100px 0}


    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1104_sky.png" alt="카카오톡실시간 스카이배너" usemap="#Map_180724_sky" border="0"  />
            <map name="Map_180724_sky">
                <area shape="rect" coords="5,92,92,116" href="http://pf.kakao.com/_kcZIu" target="_blank" alt="친추">
                <area shape="rect" coords="7,120,94,144" href="http://pf.kakao.com/_kcZIu/chat " target="_blank" alt="상담">
            </map>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="https://static.willbes.net/public/images/promotion/2019/11/1104.png" alt="카카오톡실시간상담" usemap="#Map_2018_kakao" border="0" />
            <map name="Map_2018_kakao">
                <area shape="rect" coords="258,671,603,754" href="http://pf.kakao.com/_kcZIu" target="_blank" alt="친추">
                <area shape="rect" coords="614,673,945,752" href="http://pf.kakao.com/_kcZIu/chat" target="_blank" alt="상담">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop