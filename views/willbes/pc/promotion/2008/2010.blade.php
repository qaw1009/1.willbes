@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/12/2010_top_bg.jpg) no-repeat center top;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
    
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2010_top.jpg" alt="" usemap="#Map2010a" border="0" />
            <map name="Map2010a" id="Map2010a">
                <area shape="rect" coords="30,1058,342,1155" href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176589" target="_blank" />
                <area shape="rect" coords="779,1060,1089,1154" href="https://spo.willbes.net/lecture/show/cate/3100/pattern/only/prod-code/176590" target="_blank" />
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/12/2010_01.jpg" alt="" usemap="#Map2010b" border="0"  />
            <map name="Map2010b" id="Map2010b">
                <area shape="rect" coords="313,960,808,1058" href="https://spo.willbes.net/eventSurvey/index/108" target="_blank" />
            </map>
        </div>
    </div>
    <!-- End Container -->
@stop