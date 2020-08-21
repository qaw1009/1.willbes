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

        .wb_top {background:#4EE0D6 url(https://static.willbes.net/public/images/promotion/2020/07/1744_top_bg.jpg) no-repeat center}
        
        .wb_evt01 {background:#212A33 url(https://static.willbes.net/public/images/promotion/2020/07/1744_01_bg.jpg) no-repeat center}

    </style>

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <div class="evtContent NSK" id="evtContainer">

        <ul class="sky">
            <li>
                <a href="https://police.willbes.net/pass/promotion/index/cate/3010/code/1693" target="_blnak"> 
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_sky.jpg" alt="8월 학원 추천강좌" >
                </a>
            </li>                
        </ul>       

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_top.jpg" title="추천강좌" />
        </div>
        
        {{--
        <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_01.jpg" usemap="#Map1744a" title="파이널패스" border="0" />
            <map name="Map1744a" id="Map1744a">
                <area shape="rect" coords="98,1173,1022,1278" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
                <area shape="rect" coords="727,1073,927,1118" href="https://police.willbes.net/promotion/index/cate/3001/code/1741" target="_blank" />
            </map>
        </div>
        --}}
        
        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_02.jpg" title="초시생을 위한 합격 플랜" />
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_03.jpg" title="기본이론 단과" />
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @else
            @endif        
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1744_04.jpg" usemap="#Map1744b" title="기본이론 종합반" border="0" />
            <map name="Map1744b" id="Map1744b">
                <area shape="rect" coords="111,624,281,670" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169703" target="_blank" />
                <area shape="rect" coords="476,624,646,670" href="https://police.willbes.net/package/show/cate/3001/pack/648001/prod-code/169704" target="_blank" />
                <area shape="rect" coords="839,624,1009,670" href="https://police.willbes.net/package/show/cate/3002/pack/648001/prod-code/169705" target="_blank" />
                <area shape="rect" coords="873,766,1042,860" href="https://police.willbes.net/promotion/index/cate/3001/code/1556" target="_blank" />
            </map>
        </div> 

    </div>
    <!-- End Container -->

    <script type="text/javascript">
       
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop