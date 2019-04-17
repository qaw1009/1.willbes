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

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#222 url(http://file3.willbes.net/new_gosi/2018/09/EV180921_1_bg.png) no-repeat center top; position:relative; }

        .wb_cts01 {background:#f0f2f4}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#dddfe1}
        .wb_cts04 {background:#e89f15}
        .wb_cts05 {background:#eee}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
            z-index:10;
        }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_1.png"alt="이상구국제법/국제정치학 T-PASS" usemap="#Map_0921_lec" border="0"  />
            <map name="Map_0921_lec">
                <area shape="rect" coords="158,1064,436,1140" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152873') }}" target="_blank">
                <area shape="rect" coords="462,1065,742,1141" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152874') }}" target="_blank">
                <area shape="rect" coords="763,1062,1038,1138" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152872') }}" target="_blank">
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_2.png" alt="합격결정짓는 국제법/국제정치학"/>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_3.png" alt="저자직강 교재소개"/>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_4.png" alt="이상구 교수님의 전략 수강생평" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_5.png"alt="이상구 국제법/국제정치학 T-PASS " usemap="#Map_0921_lec2" border="0"  />
            <map name="Map_0921_lec2">
                <area shape="rect" coords="652,646,1062,714" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152873') }}" target="_blank">
                <area shape="rect" coords="650,740,1064,807" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152874') }}" target="_blank">
                <area shape="rect" coords="650,831,1067,898" href="{{ site_url('/periodPackage/show/cate/3020/pack/648001/prod-code/152872') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/09/EV180921_6.png" alt="이용안내 및 유의사항 " />
        </div>
        <!--wb_cts05//-->

    </div>
    <!-- End Container -->

@stop