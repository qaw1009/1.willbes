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

        .wb_top {background:#349b53 url(https://static.willbes.net/public/images/promotion/2020/06/1682_top_bg.jpg) no-repeat center}

        .wb_evt02 {padding-bottom:50px}        
        
    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/1701" target="_blnak"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/06/1677_sky_01.jpg" alt="재시생 플랜" >
                </a>
            </li>                
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1682_top.jpg" usemap="#Map1682apply" title="추천강좌" border="0" />
            <map name="Map1682apply" id="Map1682apply">
                <area shape="rect" coords="858,714,1032,833" href="https://police.willbes.net/promotion/index/cate/3001/code/1009" target="_blank" />
            </map>
        </div>
        
        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1682_01.jpg" title="초시생을 위한 합격 플랜" />
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1682_01_college.jpg" title="기본이론 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif        
            <img src="https://static.willbes.net/public/images/promotion/2020/06/1682_01_university.jpg" usemap="#Map1677c" title="기본이론 종합반" border="0" />
            <map name="Map1677c" id="Map1677c">
                <area shape="rect" coords="67,543,270,594" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161154" target="_blank" />
                <area shape="rect" coords="452,542,654,596" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/161155" target="_blank" />
                <area shape="rect" coords="839,543,1038,594" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/161160" target="_blank" />
            </map>
        </div> 

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop