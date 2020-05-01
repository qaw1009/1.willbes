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
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#067ae8;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:250px;
            right:0;
            display:none;
            z-index:1;
        }

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/05/1625_top_bg.gif) repeat-x left top}
        .evt01 {}
        .evt02 {}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">            
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1625_top.png" alt="슬기로운 리뷰생활" >  
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1625_01.png" alt="슬기로운 리뷰생활" usemap="#Map1625" border="0" >
            <map name="Map1625">
                <area shape="rect" coords="63,891,269,951" href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" alt="김정환 대표">
                <area shape="rect" coords="328,890,528,951" href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" alt="김경은대표">
                <area shape="rect" coords="591,890,793,951" href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" alt="황채영대표">
                <area shape="rect" coords="851,889,1055,955" href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" alt="정문진대표">
            </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/05/1625_02.png" alt="슬기로운 리뷰생활" >
        </div>
    </div>
    <!-- End Container -->

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop