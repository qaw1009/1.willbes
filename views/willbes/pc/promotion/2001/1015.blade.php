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

        .wb_top {background:#ffb9b5 url(https://static.willbes.net/public/images/promotion/2020/04/1015_top_bg.jpg) no-repeat center}
        .wb_evt01 {background:#fff}
        .wb_evt02 {background:#62282b url(https://static.willbes.net/public/images/promotion/2020/04/1015_02_bg.jpg) no-repeat center}
        .wb_evt03 {background:#fff}
        .wb_evt04 {background:#f4f4f4; padding-bottom:150px}
        
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_top.jpg" title="기본이론" />
        </div>

        <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_01.jpg" usemap="#Map1015a" title="자세히 보기" border="0" />
            <map name="Map1015a" id="Map1015a">
                <area shape="rect" coords="151,524,358,577" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" onfocus='this.blur()' title="언론보도 자세히보기" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_02.jpg" title="합격하는 방법" />
        </div>

        <div class="evtCtnsBox wb_evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_03.jpg" title="기본이론 안내" />
        </div>

        <div class="evtCtnsBox wb_evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_04_title.jpg" title="기본이론 강좌"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial')
            @else
                <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_04.jpg" usemap="#Map1015b" title="기본이론 강좌" border="0" />
                <map name="Map1015b" id="Map1015b">
                    <area shape="rect" coords="820,370,914,401" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161922" target="_blank" alt="신광은 형소법" title="신광은 형소법" onfocus='this.blur()'/>
                    <area shape="rect" coords="820,409,914,441" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/153345" target="_blank" alt="신광은 수사" title="신광은 수사" onfocus='this.blur()'/>
                    <area shape="rect" coords="817,539,915,570" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/161927" target="_blank" alt="장정훈 경찰학개론" title="장정훈 경찰학개론" onfocus='this.blur()'/>
                    <area shape="rect" coords="815,578,917,611" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/151726" target="_blank" alt="장정훈 행정법" title="장정훈 행정" onfocus='this.blur()'/>
                    <area shape="rect" coords="817,729,916,761" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161928" target="_blank" alt="김원욱 형법" title="김원욱 형법" onfocus='this.blur()'/>
                    <area shape="rect" coords="817,899,917,932" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161920" target="_blank" alt="하승민영어" title="하승민영어" onfocus='this.blur()'/>
                    <area shape="rect" coords="818,1069,916,1102" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163723" target="_blank" alt="원유철 한국사" title="원유철 한국사" onfocus='this.blur()'/>
                    <area shape="rect" coords="819,1238,917,1273" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163721" target="_blank" alt="오태진 한국사" title="오태진 한국사" onfocus='this.blur()'/>
                </map>
            @endif
            {{--
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_04.jpg" usemap="#Map1015b" title="기본이론 강좌" border="0" />
            <map name="Map1015b" id="Map1015b">
                <area shape="rect" coords="820,370,914,401" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161922" target="_blank" alt="신광은 형소법" title="신광은 형소법" onfocus='this.blur()'/>
                <area shape="rect" coords="820,409,914,441" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/153345" target="_blank" alt="신광은 수사" title="신광은 수사" onfocus='this.blur()'/>
                <area shape="rect" coords="817,539,915,570" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/161927" target="_blank" alt="장정훈 경찰학개론" title="장정훈 경찰학개론" onfocus='this.blur()'/>
                <area shape="rect" coords="815,578,917,611" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/151726" target="_blank" alt="장정훈 행정법" title="장정훈 행정" onfocus='this.blur()'/>
                <area shape="rect" coords="817,729,916,761" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161928" target="_blank" alt="김원욱 형법" title="김원욱 형법" onfocus='this.blur()'/>
                <area shape="rect" coords="817,899,917,932" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/161920" target="_blank" alt="하승민영어" title="하승민영어" onfocus='this.blur()'/>
                <area shape="rect" coords="818,1069,916,1102" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163723" target="_blank" alt="원유철 한국사" title="원유철 한국사" onfocus='this.blur()'/>
                <area shape="rect" coords="819,1238,917,1273" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/163721" target="_blank" alt="오태진 한국사" title="오태진 한국사" onfocus='this.blur()'/>
            </map>
            --}}
        </div>       

    </div>
    <!-- End Container -->

@stop