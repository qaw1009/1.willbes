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

        .wb_top {background:#8c1713 url(https://static.willbes.net/public/images/promotion/2020/10/1080_top_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#F7F5F6}        
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#363636}
        .wb_cts05 {background:#fff}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_top.png" usemap="#Map1080a" border="0" />
            <map name="Map1080a" id="Map1080a">
                <area shape="rect" coords="810,1095,1045,1169" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/167769') }}" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_01.jpg"/>
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_02.jpg"/>
        </div>  

        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_03.jpg"/>
        </div> 

        <div class="evtCtnsBox wb_cts04">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_04.jpg" usemap="#Map1080b" border="0"/>
            <map name="Map1080b" id="Map1080b">
                <area shape="rect" coords="740,806,960,891" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/167769') }}" target="_blank" />
            </map>
        </div>   

        <div class="evtCtnsBox wb_cts05">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1080_05.jpg"/>
        </div>    
       
    </div>
    <!-- End Container -->

@stop