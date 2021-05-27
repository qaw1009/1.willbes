@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {position:relative; background:#222 url(https://static.willbes.net/public/images/promotion/2020/10/1077_top_bg.png) no-repeat center top}
        .wb_cts01 {background:#eee}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#d17f5a}
        .wb_cts04 {position:relative; background:#222}
        .wb_cts05 {background:#eee}

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 10px 10px rgba(0,0,0,.5); border-radius:6px}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1077_top.png" >
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank" title="헌법" style="position: absolute; left: 3.93%; top: 84.76%; width: 22.5%; height: 5.63%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank" title="행정법" style="position: absolute; left: 28.48%; top: 84.76%; width: 21.88%; height: 5.63%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank" title="헌법,행정법" style="position: absolute; left: 53.04%; top: 84.76%; width: 21.88%; height: 5.63%; z-index: 2;"></a>
            </div>
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
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/05/1077_04.jpg">
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168368') }}" target="_blank" title="헌법"  style="position: absolute; left: 70.45%; top: 68.8%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168367') }}" target="_blank" title="행정법"style="position: absolute; left: 70.45%; top: 75.86%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
                <a href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/168366') }}" target="_blank" title="헌법,행정법" style="position: absolute; left: 70.45%; top: 83.02%; width: 19.02%; height: 6.39%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1077_05.png" >
        </div>

    </div>
    <!-- End Container -->
@stop