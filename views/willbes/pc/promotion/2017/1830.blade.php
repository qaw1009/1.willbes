@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1278px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1278px; position:relative;}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamkbc_top_bg.jpg) no-repeat center top;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamcwy_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09//191212_wsamcwy_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamcwy_02_bg.jpg) no-repeat center top; height:1069px}
        .evt02 iframe {margin-top:300px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//200130_wsamcwy_top.jpg" alt="전기전자통신 최우영" usemap="#Mapmjs01" border="0" />
                <map name="Mapmjs01" id="Mapmjs01">
                    <area shape="rect" coords="140,820,527,916" href="#none" alt="설명회보기" />
                    <area shape="rect" coords="769,817,1151,919" href="#none" alt="발표회보기" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//191212_wsamcwy_01.jpg" usemap="#Mapmjs02" border="0">
                <map name="Mapmjs02" class="review_btn" id="wsamcwy">
                    <area shape="rect" coords="384,1234,900,1323" href="#none" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt02">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/bY0XEGZM6Dw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       	    </div>
        </div>
    </div>
    <!-- End Container -->
@stop