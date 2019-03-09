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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:#2c2c2c url(http://file3.willbes.net/new_cop/2019/01/EV190111_p1_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#545454}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#f3f3f3}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p1.png"  alt="1" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p2.png"  alt="2" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p3.png"  alt="3" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="440,518,771,581" href="{{ front_url('/support/notice/index/cate/3001') }}" onfocus='this.blur()'  target="_blank" alt="더많은적중사례보러가기">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2019/01/EV190111_p4.png"  alt="3"  usemap="#p2" />
            <map name="p2" id="p2">
                <area shape="rect" coords="291,831,577,893" href="{{ front_url('/professor/show/cate/3001/prof-idx/50129/?subject_idx=1010&subject_name=%EC%98%81%EC%96%B4%EC%95%84%EC%B9%A8%ED%8A%B9%EA%B0%95') }}" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="635,831,917,893" href="{{ front_url('/pass/professor/show/prof-idx/50130/?cate_code=3010&subject_idx=1082&subject_name=%EA%B8%B0%EC%B4%88%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>


@stop