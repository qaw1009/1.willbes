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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .wb_ctsTop {background:url(https://static.willbes.net/public/images/promotion/2019/09/1395_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1395_01_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#fff;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_ctsTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1395_top.png" alt="형법의 절대지존 김원욱 경찰 2차도 절대 적중!"  />
            <iframe width="979" height="615" src="https://www.youtube.com/embed/25ZvEtGsccc" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1395_01.jpg" alt="적중사례 보러가기" usemap="#Map1395a" border="0"  />
            <map name="Map1395a" id="Map1395a">
                <area shape="rect" coords="423,442,711,525" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=238300&" alt="더 많은 적중사례 보러가기" target="_blank"/>
            </map>           
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1395_02.jpg" alt="완벽적중 예제"  />            
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop