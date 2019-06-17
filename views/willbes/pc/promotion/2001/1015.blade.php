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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2019/06/1015_top_bg.jpg) no-repeat center}
        .wb_cts01 {background:#fff}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/06/1015_02_bg.jpg) no-repeat center}
        .wb_cts03 {background:#e0e0e0}
        .wb_cts04 {background:#fff}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1015_top.jpg" title="기본이론"  />
        </div><!--//Wb_top-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1015_01.jpg"  title="수많은 언론들이 주목하는 윌비스 신광은 경찰학원" usemap="#link1" />
            <map name="link1" >
                <area shape="rect" coords="82,524,286,577" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" onfocus='this.blur()' title="언론보도 자세히보기" target="_blank"/>
            </map>
        </div><!--//wb_cts01-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1015_02.jpg"  title="신광은경찰팀과 함께 하는 것" />
        </div><!--//wb_cts02-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1015_03.jpg"  title="기본이론안내" /></li>
            </ul>
        </div><!--//wb_cts03-->

        <div class="evtCtnsBox wb_cts04" id="table">
        <img src="https://static.willbes.net/public/images/promotion/2019/06/1015_04.jpg"  title="기본이론강좌소개" usemap="#link2" />
        <map name="link2" >
            <area shape="rect" coords="820,373,915,406" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153645" target="_blank" alt="신광은 형소법" title="신광은 형소법" onfocus='this.blur()'/>
            <area shape="rect" coords="819,413,913,446" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/153345" target="_blank" alt="신광은 수사" title="신광은 수사" onfocus='this.blur()'/>
            <area shape="rect" coords="817,544,915,577" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153644" target="_blank" alt="장정훈 경찰학개론" title="장정훈 경찰학개론" onfocus='this.blur()'/>
            <area shape="rect" coords="817,583,916,618" href="https://police.willbes.net/lecture/show/cate/3002/pattern/only/prod-code/151726" target="_blank" alt="장정훈 행정법" title="장정훈 행정" onfocus='this.blur()'/>
            <area shape="rect" coords="818,731,916,768" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153531" target="_blank" alt="김원욱 형법" title="김원욱 형법" onfocus='this.blur()'/>
            <area shape="rect" coords="814,902,915,938" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153546" target="_blank" alt="하승민영어" title="하승민영어" onfocus='this.blur()'/>
            <area shape="rect" coords="819,1072,919,1106" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153627" target="_blank" alt="원유철 한국사" title="원유철 한국사" onfocus='this.blur()'/>
            <area shape="rect" coords="817,1241,918,1277" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/153626" target="_blank" alt="오태진 한국사" title="오태진 한국사" onfocus='this.blur()'/>
        </map>
        </div><!--//wb_cts04-->

    </div>
    <!-- End Container -->

@stop