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

        .wb_top {background:#D4F300 url(https://static.willbes.net/public/images/promotion/2020/06/1701_top_bg.jpg) no-repeat center}

        .wb_evt02 {padding-bottom:100px;}

        .wb_evt03 {background:#e9e9e9;}

    </style>


    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1682" target="_blank"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_sky_02.jpg" alt="초시생 플랜" >
                </a>
            </li>            
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1701_top.jpg" usemap="#Map1701apply" title="추천강좌" border="0" />
            <map name="Map1701apply" id="Map1701apply">
                <area shape="rect" coords="858,714,1032,833" href="https://police.willbes.net/promotion/index/cate/3001/code/1556" target="_blank" />
            </map>
        </div>       
   
        <div class="evtCtnsBox wb_evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1701_01.jpg" title="재시생을 위한 합격 플랜" />
        </div> 

        <div class="evtCtnsBox wb_evt02" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1701_02.jpg" title="문제풀이 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
            @endif 
        </div> 

        <div class="evtCtnsBox wb_evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1701_03.jpg" usemap="#Map" title="문제풀이 패키지" border="0" />
            <map name="Map" id="Map">
                <area shape="rect" coords="162,630,334,671" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/167104" target="_blank" />
                <area shape="rect" coords="473,629,643,670" href="https://police.willbes.net/periodPackage/show/cate/3001/pack/648001/prod-code/167105" target="_blank" />
                <area shape="rect" coords="782,629,953,671" href="https://police.willbes.net/periodPackage/show/cate/3002/pack/648001/prod-code/167106" target="_blank" />
                <area shape="rect" coords="162,1103,333,1144" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/167100" target="_blank" />
                <area shape="rect" coords="472,1104,644,1145" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/167101" target="_blank" />
                <area shape="rect" coords="782,1104,952,1144" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/167102" target="_blank" />
            </map>
        </div>       

    </div>
    <!-- End Container -->

    <script type="text/javascript">

    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop