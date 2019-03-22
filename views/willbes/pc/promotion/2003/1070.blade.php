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
        .wb_top {background:#0b1b0d url(http://file3.willbes.net/new_gosi/2018/06/EV180625_c1_bg.jpg) no-repeat center top; position:relative;}
        .wb_cts01 {background:#d6d6d6 url(http://file3.willbes.net/new_gosi/2018/06/EV180625_c4_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#fff;}
        .wb_cts03 {background:#1f2330 ;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c1.jpg" alt="윌비스 매직아이 김신주 영어"  usemap="#Map180625_c2" border="0"  />
            <map name="Map180625_c2" >
                <area shape="rect" coords="813,206,993,410" href="#event" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c2.png" alt="윌비스 빠른 합격을 위한 매직아이 영어"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c3.png" alt=""  />
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c4.jpg" alt="윌비스 실전에 강한 매직아이 영어"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c5.jpg" alt=""  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c6.jpg" alt="영어는 변수가 많아 언제나 배신할 수 있는 과목입니다. "  />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c7.jpg" alt="2018 김신주 매잊ㄱ아이 영어 문법/어휘/독해 패키지"  /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180625_c8.jpg" alt="윌비스 행정법 변원갑 수강신청하기" usemap="#Map180625_c1" border="0"  />
            <map name="Map180625_c1" >
                <area shape="rect" coords="626,300,945,372" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150378') }}" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="646,535,950,612" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150375') }}" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="653,781,959,863" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150376') }}" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="643,1021,954,1115" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150377') }}" target="_blank" onfocus="this.blur();"/>
            </map>
        </div><!--wb_cts03//-->

    </div>
    <!-- End Container -->

@stop