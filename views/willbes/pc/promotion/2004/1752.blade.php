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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {position:fixed; top:250px; right:10px; z-index:1;}
        .skybanner a { display:block; padding-bottom:10px;}

        .evtTop {background:#0A0702 url(https://static.willbes.net/public/images/promotion/2020/08/1752_top_bg.jpg) center top no-repeat}        

        .evt01 {background:#f5f5f5}

        .evt02 {background:#413dab}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox evtTop" >            
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1752_top.jpg" alt="소방학원" usemap="#Map1752a" border="0" />
            <map name="Map1752a" id="Map1752a">
                <area shape="rect" coords="21,1266,280,1368" href="https://willbesedu.willbes.net/pass/home/index" target="_blank" />
                <area shape="rect" coords="290,1265,554,1366" href="https://pass.willbes.net/pass/campus/show/code/605004" target="_blank" />
                <area shape="rect" coords="566,1264,826,1368" href="http://busan.willbes.net" target="_blank" />
                <area shape="rect" coords="838,1264,1102,1370" href="https://pass.willbes.net/pass/campus/show/code/605006" target="_blank" />
            </map>            
        </div>    

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1752_01.jpg" alt="소방 단독반" />
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1752_02.jpg" alt="소방의 새로은 혁명" />
        </div>
    </div>
    <!-- End Container -->

@stop