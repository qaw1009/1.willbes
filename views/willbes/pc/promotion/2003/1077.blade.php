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

        .wb_top {position:relative; background:#222 url(http://file3.willbes.net/new_gosi/2018/08/180817_1_bg.png) no-repeat center top}
        .wb_cts01 {background:#eee}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#d17f5a}
        .wb_cts04 {position:relative; background:#222 url(http://file3.willbes.net/new_gosi/2018/08/180817_5_bg.png) no-repeat center top}
        .wb_cts05 {background:#eee}
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/180830_1.png"alt="고득점 합격의 솔루션 황남기헌법/행정법" usemap="#Map_180820_lec" border="0"  />
            <map name="Map_180820_lec">
                <area shape="rect" coords="78,1071,329,1131" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152868') }}" target="_blank" alt="헌법">
                <area shape="rect" coords="354,1070,591,1134" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152871') }}" target="_blank" alt="행정법">
                <area shape="rect" coords="619,1071,863,1136" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152867') }}" target="_blank" alt="헌법,행정법">
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180817_2.png" alt="황남기 인가 아닌가로 결정되는 헌법/행정법"/>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180817_3.png" alt="황남기 헌법/행정법 커리큘럼"/>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180817_4.png" alt="황님기 수강평" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2018/08/180817_5.png"alt="압도하는 황남기 T-pass" usemap="#Map_180820_lec2" border="0" />
            <map name="Map_180820_lec2">
                <area shape="rect" coords="837,724,1046,786" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152868') }}" target="_blank">
                <area shape="rect" coords="839,799,1043,863" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152871') }}" target="_blank">
                <area shape="rect" coords="840,871,1042,936" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152867') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/180817_6.png" alt="이용안내 및 유의사항 " />
        </div>
        <!--wb_cts05//-->

    </div>
    <!-- End Container -->
@stop