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

        .wb_top {background:#bbe202 url(http://file3.willbes.net/new_gosi/2018/10/EV181023_c1_bg.jpg) no-repeat center top; position:relative}
        .wb_cts00 {background:#fff}
        .wb_cts01 {background:#eef0e7}
        .wb_cts03 {background:#fff}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c1.png" alt="윌베스 2019 김윤수 탐구한국사 기본이론 " usemap="#Map20181023_c2" border="0"  />
            <map name="Map20181023_c2" >
                <area shape="rect" coords="158,744,651,845" href="#event"  onfocus="this.blur();"/>
            </map>
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts00" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c3.jpg" alt=" 윌비스 탐구한국사가 합격의 기준이 됩니다."  />
        </div>
        <!--WB_cts00//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c4.jpg" alt=" 윌비스 요즘 공시 한국사, 지엽적으로 공부해야 합격한다! "  />
        </div>
        <!--WB_cts01//-->

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181023_c5.jpg" alt="윌비스 2019 탐구한국사 수강신청" usemap="#Map20181023_c3" border="0" />
            <map name="Map20181023_c3" >
                <area shape="rect" coords="808,327,1004,360" href="{{ site_url('/lecture/show/cate/3019/pattern/only/prod-code/146601') }}"  alt="전근대사" onfocus="this.blur();" />
                <area shape="rect" coords="809,370,1007,396" href="{{ site_url('/lecture/show/cate/3019/pattern/only/prod-code/146603') }}"  alt="근현대사"  onfocus="this.blur();" />
                <area shape="rect" coords="882,435,1027,512" href="{{ site_url('/package/show/cate/3024/pack/648001/prod-code/150630') }}" alt="전근대사+근현대사 PACKAGE" onfocus="this.blur();"/>
            </map>
        </div>
        <!--wb_cts03//-->

    </div>
    <!-- End Container -->

@stop