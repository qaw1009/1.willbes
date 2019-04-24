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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }

        .wb_top {background: url(https://static.willbes.net/public/images/promotion/2019/04/1206_top_bg.jpg)  repeat-x center top;}
        .wb_cts02 {background:#eee; padding-top:30px}
        .wb_cts03 {background:#022ef3}
        .wb_cts05 {background:#a6876a}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_cop/2019/02/1206_top.jpg"alt="2019 대비 해양경찰특채 기본이론" >
        </div>

        <div  class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <iframe width="854" height="480" src="https://www.youtube.com/embed/7SVX4e3iGzs?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190212j_02.gif"alt="" usemap="#Map" border="0"/>
            <map name="Map" id="Map">
                <area shape="rect" coords="586,405,828,480" href="#a0211" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" id="a0211">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/EV181220j_05.jpg" alt="" usemap="#Map181220C"  />
            <map name="Map181220C" id="Map181220C">
                <area shape="rect" coords="1128,298,1245,348" href="#none" alt="수강신청하기" target="_blank"/>
                <area shape="rect" coords="1129,469,1247,518" href="#none" alt="수강신청하기" target="_blank"/>
            </map>
        </div>

    </div>
    <!-- End Container -->

@stop