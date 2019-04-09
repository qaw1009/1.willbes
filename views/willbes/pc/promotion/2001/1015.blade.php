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
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_top.png" alt="1"  />
        </div><!--//Wb_top-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_01.jpg"  alt="언론" usemap="#link1" />
            <map name="link1" >
                <area shape="rect" coords="82,524,286,577" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" onfocus='this.blur()' alt="언론보도" target="_blank"/>
            </map>
        </div><!--//wb_cts01-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_02.png"  alt="신광은경찰팀" />
        </div><!--//wb_cts02-->

        <div class="evtCtnsBox wb_cts03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_03.png"  alt="이론안내" /></li>
            </ul>
        </div><!--//wb_cts03-->

        <div class="evtCtnsBox wb_cts04" id="table">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1015_04.png"  alt="강좌소개" usemap="#link2" />
            <map name="link2" >
                <!--단과-->
                <area shape="rect" coords="389,410,451,435" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/151727') }}" onfocus='this.blur()' alt="형사소송법 기본이론(19년 3월)" target="_blank"/>
                <area shape="rect" coords="389,460,451,485" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/152354') }}" onfocus='this.blur()' alt="경찰학개론 기본이론(19년 4월)" target="_blank"/>
                <area shape="rect" coords="389,510,451,535" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132285') }}" onfocus='this.blur()' alt="김원욱 형법 기본이론(19년 3월)" target="_blank"/>
                <area shape="rect" coords="389,560,451,585" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132290') }}" onfocus='this.blur()' alt="하승민 영어 기본이론(19년 3월)" target="_blank"/>

                <area shape="rect" coords="814,410,872,435" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132261') }}" onfocus='this.blur()' alt="오태진 한국사 기본이론(19년 2월)" target="_blank"/>
                <area shape="rect" coords="814,460,872,485" href="{{ site_url('/lecture/show/cate/3001/pattern/only/prod-code/132259') }}" onfocus='this.blur()' alt="원유철 한국사 기본이론(19년 2월)" target="_blank"/>
                <area shape="rect" coords="814,510,872,535" href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/152609') }}" onfocus='this.blur()' alt="신광은 수사 이론" target="_blank"/>
                <area shape="rect" coords="814,560,872,585" href="{{ site_url('/lecture/show/cate/3002/pattern/only/prod-code/151726') }}" onfocus='this.blur()' alt="장정훈 행정법 이론 (3월)" target="_blank"/>

                <!--패키지-->
                <area shape="rect" coords="753,839,872,876" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152607') }}" onfocus='this.blur()' alt="2019대비 일반경찰 기본이론 동영상 종합반(원유철史)" target="_blank"/>
                <area shape="rect" coords="753,1059,872,1096" href="{{ site_url('/package/show/cate/3001/pack/648001/prod-code/152606') }}" onfocus='this.blur()' alt="2019대비 일반경찰 기본이론 동영상 종합반(오태진史)" target="_blank"/>
                <area shape="rect" coords="753,1279,872,1316" href="{{ site_url('/package/show/cate/3002/pack/648001/prod-code/152610') }}" onfocus='this.blur()' alt="2019대비 경행경채 기본이론 동영상 종합반" target="_blank"/>
            </map>
        </div><!--//wb_cts04-->

    </div>
    <!-- End Container -->

@stop