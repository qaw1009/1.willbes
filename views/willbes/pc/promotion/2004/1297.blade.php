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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .wb_cts01 {background:url("https://static.willbes.net/public/images/promotion/2019/07/1297_top_bg.jpg") center top  no-repeat}
        .wb_cts02 {background:#fff;}
        .wb_cts03 {background:#fff; padding-bottom:150px}
        .wb_last {background:#233758;}

        .quick {position:fixed; right:10px; top:200px; z-index:10;}
        .quick li{padding-bottom:5px;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        {{--
        <ul class="quick">
            <li><img src="https://static.willbes.net/public/images/promotion/2019/07/1297_q01.jpg" alt="학원문의" ></li>
        </ul>
        --}}

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1297_top.jpg" alt="아침실전모고" />
        </div>


        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1297_02.jpg" alt="한덕현영어" usemap="#Map1297B" border="0" />
            <map name="Map1297B" id="Map1297B">
                <area shape="rect" coords="288,620,830,674" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178151" target="_blank" />
            </map>
        </div>


        <div class="evtCtnsBox wb_cts03">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1297_01.jpg" alt="기미진국어" usemap="#Map1297A" border="0" />
            {{--
            <map name="Map1297A" id="Map1297A">
                <area shape="rect" coords="275,607,851,680" href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/165336" target="_blank" alt="수강신청">
            </map>
            --}}
        </div>


        <div class="evtCtnsBox wb_last">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1297_last.gif" alt="#" />
        </div>


    </div>
    <!-- End Container -->
@stop