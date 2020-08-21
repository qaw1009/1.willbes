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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed; top:225px; right:0;z-index:10;}
        .sky a{display:block; margin-bottom:5px}
        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/08/1774_top_bg.jpg) no-repeat center}
        .wb_evt01 {background:#141414;}  
        .wb_evt02 {background:#fff;}  
        .wb_evt03 {background:#191c23;}  
        .wb_evt04 {background:#fff;}  

    </style>
    

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#none" onclick="javascript:alert('준비중입니다.');"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_sky01.jpg" alt="추천강좌 신청하기" >
            </a>
        </div>           

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_top.jpg" title="9월 추천강좌" />
        </div>

        <div class="evtCtnsBox wb_evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_01.jpg" usemap="#Map1774A" title="끝장패스" border="0" />
            <map name="Map1774A">
                <area shape="rect" coords="184,1441,937,1556" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1489" target="_blank" alt="끝장패스">
            </map>
        </div>
        
        <div class="evtCtnsBox wb_evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_02.jpg" usemap="#Map1774B" title="12개월 끝장패스" border="0" />
            <map name="Map1774B">
                <area shape="rect" coords="97,590,298,641" href="https://police.willbes.net/pass/offPackage/show/prod-code/170541" target="_blank" alt="오태진" />
                <area shape="rect" coords="463,588,663,641" href="https://police.willbes.net/pass/offPackage/show/prod-code/170540" target="_blank" alt="원유철" />
                <area shape="rect" coords="826,588,1026,640" href="https://police.willbes.net/pass/offPackage/show/prod-code/170542" target="_blank" alt="경행경채" />
            </map>
        </div>       

        <div class="evtCtnsBox wb_evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_03.jpg" usemap="#Map1774C" title="5개월 슈퍼패스" border="0" />
            <map name="Map1774C">
                <area shape="rect" coords="192,1260,930,1366" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1770" target="_blank" alt="5개월 슈퍼패스" />
            </map>
        </div>       

        <div class="evtCtnsBox wb_evt04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1774_04.jpg" usemap="#Map1774D" title="5개월 슈퍼패스 신청하기" border="0" />
            <map name="Map1774D" id="Map1693d">
                <area shape="rect" coords="96,593,297,645" href="https://police.willbes.net/pass/offPackage/show/prod-code/166166" target="_blank" alt="오태진" />
                <area shape="rect" coords="465,594,666,645" href="https://police.willbes.net/pass/offPackage/show/prod-code/171110" target="_blank" alt="원유철" />
                <area shape="rect" coords="824,594,1025,646" href="https://police.willbes.net/pass/offPackage/show/prod-code/171112" target="_blank" alt="경행경채" />
            </map>
        </div>       

    </div>
    <!-- End Container -->
@stop