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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#272A2F url(https://static.willbes.net/public/images/promotion/2020/09/1013_top_bg.jpg) no-repeat center;}

        .wb_01 {background:#3B5A21;}

        .wb_02 {background:#1E373B;}

        .wb_03 {background:#F5FA55;} 

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1013_top.gif" usemap="#Map1013a" title="윌비스 웰컴팩" border="0" />
            <map name="Map1013a" id="Map1013a">
                <area shape="rect" coords="321,993,802,1098" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" />
            </map>
        </div>  

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1013_01.jpg" title="아주 특별한 혜택" />
        </div>  

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1013_02.jpg" usemap="#Map1013b" title="아낌없이 드리는 할인 혜택" border="0" />
            <map name="Map1013b" id="Map1013b">
                <area shape="rect" coords="324,1830,797,1934" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" />
            </map>
        </div>  

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1013_03.jpg" usemap="#Map1013c" title="자세히 보기" border="0" />
            <map name="Map1013c" id="Map1013c">
                <area shape="rect" coords="116,388,222,432" href="https://police.willbes.net/promotion/index/cate/3001/code/1976" target="_blank" />
                <area shape="rect" coords="376,388,481,432" href="https://police.willbes.net/home/index/cate/3002" target="_blank" />
                <area shape="rect" coords="634,390,742,432" href="https://police.willbes.net/home/index/cate/3006" target="_blank" />
                <area shape="rect" coords="891,389,1003,433" href="https://police.willbes.net/home/index/cate/3007" target="_blank" />
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