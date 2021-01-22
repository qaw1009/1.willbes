@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#fff url('https://static.willbes.net/public/images/promotion/2021/01/1137_top_bg.jpg') no-repeat center top;}

        .wb_01 {background:#303132}
		.wb_02 {background:#f5f5f5}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1137_top.gif" alt="웰컴팩" usemap="#Map1137" border="0"/>
            <map name="Map1137" id="Map1137">
                <area shape="rect" coords="341,946,775,1013" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank" alt="웰컴팩 받기" />
            </map>
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/01/1137_01.jpg"  alt="아주특별한혜택" usemap="#Map1137a" border="0" />
            <map name="Map1137a" id="Map1137a">
                <area shape="rect" coords="296,924,508,960" href="https://pass.willbes.net/promotion/index/cate/3092/code/1312" target="_blank"/>
                <area shape="rect" coords="162,2426,977,2554" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2000" target="_blank"/>
            </map>
        </div> 

		<div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1137_02_L.png"  alt="자세히보기" usemap="#Map1137b" border="0" />
            <map name="Map1137b" id="Map1137b">
                <area shape="rect" coords="160,497,278,546" href="https://pass.willbes.net/home/index/cate/3019" target="_blank"/>
                <area shape="rect" coords="502,497,617,546" href="https://pass.willbes.net/home/index/cate/3020" target="_blank"/>
                <area shape="rect" coords="840,496,959,545" href="https://pass.willbes.net/home/index/cate/3035" target="_blank"/>
                <area shape="rect" coords="159,888,279,939" href="https://pass.willbes.net/home/index/cate/3023" target="_blank"/>
                <area shape="rect" coords="499,889,619,938" href="https://pass.willbes.net/home/index/cate/3028" target="_blank"/>
                <area shape="rect" coords="841,887,958,938" href="https://pass.willbes.net/home/index/cate/3024" target="_blank"/>
            </map>
        </div>
        
    </div>
    <!-- End Container -->
@stop