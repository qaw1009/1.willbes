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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:#34b696 url(https://static.willbes.net/public/images/promotion/2019/07/1031_top_bg.jpg) no-repeat center}
        .wb_cts01 {background:#292b2e url(https://static.willbes.net/public/images/promotion/2019/07/1031_01_bg.jpg) no-repeat center}
        .wb_cts02 {background:#f5f5f5}
        .wb_cts03 {background:#ececec}
        .wb_cts04 {background:#fff}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1031_top.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1031_01.png"  alt="교수소개" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1031_02.png"  alt="1" />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1031_03.png"  alt="2" />
        </div>

        <div class="evtCtnsBox wb_cts04" id="table">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1031_04.png"  alt="구매하기" usemap="#link2" />
            <map name="link2" >
                <area shape="rect" coords="118,675,264,711" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/131276') }}" onfocus='this.blur()' alt="김현정" target="_blink"/>
                <area shape="rect" coords="417,675,562,711" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/131733') }}" onfocus='this.blur()' alt="김준기" target="_blink"/>
                <area shape="rect" coords="716,675,862,711" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/149405') }}" onfocus='this.blur()' alt="패키지 " target="_blink"/>
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop