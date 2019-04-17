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

        .wb_top {background:#8c1713 url(http://file3.willbes.net/new_gosi/2018/08/EV180806_c1_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts02 {background:#fff}
        .wb_cts01 {background:#f7f6f6 url(http://file3.willbes.net/new_gosi/2018/08/EV180806_c2_bg.jpg) repeat-x}
        .wb_cts03 {background:#363636}
        .wb_cts05 {background:#fff}


        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
            z-index:10;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c1.png" alt="윌비스 행정학의 대세 김덕관 행정학 T-PASS " usemap="#Map180806_c1" border="0"  />
            <map name="Map180806_c1">
                <area shape="rect" coords="830,1068,1054,1171" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152863') }}" target="_blank" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c2.jpg" alt="다른 수험생들이 겪은 시행착오, 똑같이 겪으실 건가요?" />
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c3.jpg" alt="윌비스 모든 편견을 깨버린 쉽고 재미있는 행정학을 소개합니다. " />
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c4.jpg" alt="윌비스 합격을 위한 정채영 국어 커리큘럼" />
        </div>
        <!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c5.jpg" alt="합격을 위한 단 하나의 선택, 정채영!" usemap="#Map180806_c2" border="0" />
            <map name="Map180806_c2" >
                <area shape="rect" coords="725,785,973,925" href="{{ site_url('/periodPackage/show/cate/3019/pack/648001/prod-code/152863') }}" onfocus="this.blur();" target="_blank" />
            </map>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_c6.jpg" alt="정채영 국어 이용안내 및 유의사항 " />
        </div>
        <!--wb_cts05//-->

    </div>
    <!-- End Container -->

@stop