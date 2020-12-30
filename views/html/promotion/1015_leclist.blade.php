@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            height:100% !important;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/04/1015_top_bg.jpg) no-repeat center}
        .wb_evt01 {background:#fff}
        .wb_evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/04/1015_02_bg.jpg) no-repeat center}
        .wb_evt03 {background:#fff}
        .wb_evt04 {background:#f4f4f4; padding-bottom:150px}     
        
        h1 {width: 1120px; font-size:30px; font-weight:600; margin:50px auto 20px; text-align:left}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_top.jpg" title="기본이론" />
        </div>

        <div class="evtCtnsBox wb_evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/04/1015_01.jpg" usemap="#Map1015a" title="자세히 보기" border="0" />
            <map name="Map1015a" id="Map1015a">
                <area shape="rect" coords="151,524,358,577" href="{{ site_url('/promotion/index/cate/3001/code/1021') }}" title="언론보도 자세히보기" target="_blank"/>
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
            <h1>단과 강좌</h1>
            @include('html.promotion.1015_promotionLecList')

            <h1>운영자 패키지 강좌</h1>
            @include('html.promotion.1015_promotionLecPkgA')

            <h1>기간제 패키지 강좌</h1>
            @include('html.promotion.1015_promotionLecPkgB')
        </div>        

    </div>
    <!-- End Container -->

@stop