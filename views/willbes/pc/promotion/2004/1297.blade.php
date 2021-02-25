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
        .wb_cts02 {width:1120px; margin:0 auto; position:relative}
        .wb_cts03 {padding-bottom:150px}
        .wb_last {background:#233758;}

        .quick {position:fixed; right:10px; top:200px; z-index:10;}
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        {{--
        <div class="quick">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1297_q01.jpg" alt="학원문의" >
        </div>
        --}}

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1297_top.jpg" alt="아침실전모고" />
        </div>


        <div class="evtCtnsBox wb_cts02">            
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1297_02.jpg" alt="한덕현영어"/>
            <a href="https://pass.willbes.net/pass/offLecture/show/cate/3043/prod-code/178467" target="_blank" title="신청하기" style="position: absolute; left: 25.27%; top: 86.08%; width: 49.11%; height: 9.56%; z-index: 2;"></a>
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