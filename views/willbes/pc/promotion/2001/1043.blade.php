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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:400px;
            right:10px;
            z-index:1;
        }

        .WB_con01	  {background:#ebe4d2 url('https://static.willbes.net/public/images/promotion/2019/08/1043_top_bg.png') no-repeat center; background-size:auto; margin-top:20px;}
        .WB_con01 ul {width:100%; text-align:center; margin:0 auto}
        .WB_con01 ul li{margin:0 auto}

        .WB_con02{background:#002994}
        .WB_con02 ul {width:100%; text-align:center; margin:0 auto}
        .WB_con02 ul li{margin:0 auto}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#Map_0225_cop_event"><img src="https://static.willbes.net/public/images/promotion/2019/08/1043_sky.png" alt="#" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1043_top.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con02" id="Map_0225_cop_event">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1043_01.png" alt="#" usemap="#Map_0225_lec" border="0" />
            <map name="Map_0225_lec">
                <area shape="rect" coords="775,295,1069,358" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/155260" target="_blank" alt="하승민">
                <area shape="rect" coords="773,376,1071,440" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/156113" target="_blank" alt="오태진">
                <area shape="rect" coords="777,458,1072,523" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/156109" target="_blank" alt="원유철">
                <area shape="rect" coords="771,607,1069,670" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/155255" target="_blank" alt="신광은">
                <area shape="rect" coords="773,689,1073,751" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/155486" target="_blank" alt="김원욱">
                <area shape="rect" coords="774,766,1072,831" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/153480" target="_blank" alt="공득인 해사법규">
              <area shape="rect" coords="786,846,1069,913" href="https://police.willbes.net/lecture/show/cate/3007/pattern/only/prod-code/153483" target="_blank" alt="공득인 해양경찰학개론" />
            </map>
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