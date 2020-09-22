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
        .sky a{margin-bottom:10px;}

        .wb_top {background:#4EE0D6 url(https://static.willbes.net/public/images/promotion/2020/08/1783_top_bg.jpg) no-repeat center}
        
        .wb_evt01 {background:#fff}
        .wb_evt02 {background:#fff}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1774" target="_blnak"> 
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1783_sky.jpg" alt="8월 학원 추천강좌" >
            </a>               
        </div>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1783_top.jpg" title="추천강좌" />
        </div>

        {{--
        <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1783_01.jpg" usemap="#Map1744a" title="파이널패스" border="0" />
            <map name="Map1744a" id="Map1744a">
                <area shape="rect" coords="98,1173,1022,1278" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
                <area shape="rect" coords="727,1073,927,1118" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
            </map>
        </div>

        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @else
        @endif 
        --}} 
        
        
        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1783_02.jpg" title="초시생을 위한 합격 플랜" />
        </div>

        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
        @else
        @endif  

        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1783_03.jpg" usemap="#Map1783_02" title="기본이론 종합반" border="0" />
            <map name="Map1783_02">
                <area shape="rect" coords="90,621,358,697" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank" />
                <area shape="rect" coords="423,620,690,702" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank" />
                <area shape="rect" coords="755,620,1022,698" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank" />
                <area shape="rect" coords="840,782,1009,876" href="https://police.willbes.net/promotion/index/cate/3001/code/1556" target="_blank" />
            </map>
        </div> 

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop