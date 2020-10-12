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

        .wb_top {position:relative; background:#222 url(https://static.willbes.net/public/images/promotion/2020/10/1077_top_bg.png) no-repeat center top}
        .wb_cts01 {background:#eee}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#d17f5a}
        .wb_cts04 {position:relative; background:#222 url(http://file3.willbes.net/new_gosi/2018/08/180817_5_bg.png) no-repeat center top}
        .wb_cts05 {background:#eee}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_top.png" usemap="#Map1077a" border="0" >
            <map name="Map1077a" id="Map1077a">
                <area shape="rect" coords="96,1073,336,1135" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank" alt="헌법"  />
                <area shape="rect" coords="369,1075,602,1137" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank" alt="행정법"  />
                <area shape="rect" coords="645,1073,878,1134" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank" alt="헌법,행정법" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_01.png" >
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_02.png" >
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_03.png" >
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_04.png" usemap="#Map1077b" border="0">
            <map name="Map1077b" id="Map1077b">
                <area shape="rect" coords="843,725,1042,785" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank">
                <area shape="rect" coords="842,800,1043,859" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank">
                <area shape="rect" coords="843,872,1042,933" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_05.png" >
        </div>

    </div>
    <!-- End Container -->
@stop