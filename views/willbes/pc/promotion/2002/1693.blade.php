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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .sky {position:fixed; top:225px;right:0;z-index:10;}
        .sky li{padding-bottom:10px;}
        .wb_top {background:#127AFF url(https://static.willbes.net/public/images/promotion/2020/07/1693_top_bg.jpg) no-repeat center}
        .wb_evt01 {background:#414141;}  
        .wb_evt02 {background:#f0f0f0;}  
        .wb_evt03 {background:#fff;}  
        .wb_evt04 {background:#f0f0f0;}  

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1701" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1693_sky.jpg" alt="추천강좌 신청하기" >
                </a>
            </li>            
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1693_top.jpg" title="7월 추천강좌" />
        </div>

        <div class="evtCtnsBox wb_evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1693_01.jpg" title="재시생 문제풀이 풀패키지" />
        </div>
        
        <div class="evtCtnsBox wb_evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1693_02.jpg" usemap="#Map1693b" title="재시생 문제풀이 풀패키지 신청하기" border="0" />
            <map name="Map1693b" id="Map1693b">
                <area shape="rect" coords="83,574,284,625" href="https://police.willbes.net/pass/offPackage/show/prod-code/169240" target="_blank" />
                <area shape="rect" coords="454,573,654,626" href="https://police.willbes.net/pass/offPackage/show/prod-code/169244" target="_blank" />
                <area shape="rect" coords="824,573,1024,625" href="https://police.willbes.net/pass/offPackage/show/prod-code/169245" target="_blank" />
            </map>
        </div>       

        <div class="evtCtnsBox wb_evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1693_03.jpg" usemap="#Map1693c" title="초시생 8개월 슈퍼패스" border="0" />
            <map name="Map1693c" id="Map1693c">
                <area shape="rect" coords="362,1120,757,1201" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1685" target="_blank" />
            </map>
        </div>       

        <div class="evtCtnsBox wb_evt04" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1693_04.jpg" usemap="#Map1693d" title="초시생 8개월 슈퍼패스 신청하기" border="0" />
            <map name="Map1693d" id="Map1693d">
                <area shape="rect" coords="82,576,283,628" href="https://police.willbes.net/pass/offPackage/show/prod-code/166166" target="_blank" />
                <area shape="rect" coords="452,576,653,627" href="https://police.willbes.net/pass/offPackage/show/prod-code/166167" target="_blank" />
                <area shape="rect" coords="824,576,1025,628" href="https://police.willbes.net/pass/offPackage/show/prod-code/166168" target="_blank" />
            <area shape="rect" coords="22,695,1096,775" href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1699" target="_blank" />
            </map>
        </div>       

    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop