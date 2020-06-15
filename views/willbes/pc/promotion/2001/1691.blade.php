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
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/06/1691_top_bg.jpg) no-repeat center;}
        .wb_cts01 {background:#898989}
        .wb_cts02 {background:#fff}
        .wb_cts03 {background:#f3f3f3}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1691_top.jpg"  alt="김현정 영어 아침특강 또 적중!" />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1691_01.jpg"  alt="김현정 영어 아침의 기적" />
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1691_02.jpg"  alt="적중" usemap="#p1" />
            <map name="p1" id="p1">
                <area shape="rect" coords="394,517,725,580" href="https://police.willbes.net/pass/support/notice/show?board_idx=276720&" onfocus='this.blur()'  target="_blank" alt="더많은적중사례보러가기">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1691_03.jpg"  alt="전문가에게 제대로"  usemap="#p2" />
            <map name="p2" id="p2">
                <area shape="rect" coords="245,878,530,946" href="{{ site_url('/professor/show/cate/3001/prof-idx/50748/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()'  target="_blank" alt="온라인강의 신청">
                <area shape="rect" coords="587,876,879,946" href="{{ site_url('/pass/professor/show/prof-idx/50130/?cate_code=3010&subject_idx=1082&subject_name=%EA%B8%B0%EC%B4%88%EC%98%81%EC%96%B4&tab=open_lecture') }}" onfocus='this.blur()' target="_blank" alt="학원강의 신청">
            </map>
        </div>

    </div>
    <!-- End Container -->
@stop