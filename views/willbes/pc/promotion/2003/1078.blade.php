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

        .wb_top {background:#555653 url(http://file3.willbes.net/new_gosi/2018/07/EV180723_c1_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts01 {background:#9cffbc url(http://file3.willbes.net/new_gosi/2018/07/EV180723_c2_bg.jpg) repeat-x}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#34372e url(http://file3.willbes.net/new_gosi/2018/07/EV180718_c7_bg.jpg) repeat;}
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
        <div class="skybanner">
            <div>
                <!-- a href="javascript:alert('마감되었습니다.');" /-->
                <a href="#event">
                    <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c12.png" alt="성기건 영어 T-PASS" >
                </a>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c1.png" alt="윌비스 빛처럼 빠른 공무원 영어 정복 성기건 영어 " usemap="#Map20180719_c1" border="0"  />
            <map name="Map20180719_c1" >
                <area shape="rect" coords="823,1078,1047,1181" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150651') }}" target="_blank" onfocus="this.blur();" />
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c2.jpg" alt="쉬워도 문제, 어려우면 더 문제! 영어, 확실하게 준비하고 계신가요?" />
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c3.jpg" alt="윌비스 성기건 교수님과 함께면 독해도 문법도 문제 없습니다." />
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c4.jpg" alt="윌비스 성기건 교수님을 선택한다는 것,그것 하나만으로도 영어는 충분합니다." />
        </div>
        <!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c5.jpg" alt="영어, 어떤 문제에도 당황하지 않는 자신감을 길러라!" usemap="#Map180724_c2" border="0" />
            <map name="Map180724_c2" >
                <area shape="rect" coords="779,738,1027,878" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150651') }}" onfocus="this.blur();" target="_blank" />
            </map>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180723_c6.jpg" alt="성기건영어 이용안내 및 유의사항 " />
        </div>
        <!--wb_cts05//-->

    </div>
    <!-- End Container -->

@stop