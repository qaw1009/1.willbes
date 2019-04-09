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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .wb_top {background:#272831 url(https://static.willbes.net/public/images/promotion/2019/04/1015_top_bg.jpg) no-repeat center}
        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#473c38 url(https://static.willbes.net/public/images/promotion/2019/04/1015_02_bg.jpg) no-repeat center}
        .wb_cts03 {background:#ddd8e8}
        .wb_cts04 {background:#fff}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_top.jpg" title="기본이론"  />
        </div><!--//Wb_top-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_01.jpg"  title="수많은 언론들이 주목하는 윌비스 신광은 경찰학원" usemap="#link1" />
            <map name="link1" >
                <area shape="rect" coords="82,524,286,577" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" onfocus='this.blur()' title="언론보도 자세히보기" target="_blank"/>
            </map>
        </div><!--//wb_cts01-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_02.jpg"  title="신광은경찰팀과 함께 하는 것" />
        </div><!--//wb_cts02-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_03.jpg"  title="기본이론안내" /></li>
            </ul>
        </div><!--//wb_cts03-->

        <div class="evtCtnsBox wb_cts04" id="table">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_04.jpg"  title="기본이론강좌소개" usemap="#link2" />
            <map name="link2" >
                <!--단과-->
                <area shape="rect" coords="444,406,516,440" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/151727') }}" onfocus='this.blur()' title="형사소송법 기본이론(19년 3월)" target="_blank"/>
                <area shape="rect" coords="444,457,516,491" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152354') }}" onfocus='this.blur()' title="경찰학개론 기본이론(19년 4월)" target="_blank"/>
                <area shape="rect" coords="444,505,516,543" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132285') }}" onfocus='this.blur()' title="김원욱 형법 기본이론(19년 3월)" target="_blank"/>
                <area shape="rect" coords="444,553,516,593" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132290') }}" onfocus='this.blur()' title="하승민 영어 기본이론(19년 3월)" target="_blank"/>

                <area shape="rect" coords="868,406,944,441" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132261') }}" onfocus='this.blur()' title="오태진 한국사 기본이론(19년 2월)" target="_blank"/>
                <area shape="rect" coords="868,455,944,491" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132259') }}" onfocus='this.blur()' title="원유철 한국사 기본이론(19년 2월)" target="_blank"/>
                <area shape="rect" coords="868,505,944,542" href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/152609') }}" onfocus='this.blur()' title="신광은 수사 이론" target="_blank"/>
                <area shape="rect" coords="868,553,944,593" href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/151726') }}" onfocus='this.blur()' title="장정훈 행정법 이론 (3월)" target="_blank"/>

                <!--패키지-->
                <area shape="rect" coords="808,835,938,879" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152607') }}" onfocus='this.blur()' title="2019대비 일반경찰 기본이론 동영상 종합반(원유철史)" target="_blank"/>
                <area shape="rect" coords="808,1056,938,1102" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152606') }}" onfocus='this.blur()' title="2019대비 일반경찰 기본이론 동영상 종합반(오태진史)" target="_blank"/>
                <area shape="rect" coords="808,1274,938,1324" href="{{ site_url('/package/show/cate/3002/pack/648001/prod-code/152610') }}" onfocus='this.blur()' title="2019대비 경행경채 기본이론 동영상 종합반" target="_blank"/>
            </map>
        </div><!--//wb_cts04-->

    </div>
    <!-- End Container -->

@stop