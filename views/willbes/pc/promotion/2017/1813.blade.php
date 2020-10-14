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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcw_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcw_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcw_02_bg.jpg) no-repeat center top; height:1069px}
        .evt02 iframe {margin-top:300px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcw_top.jpg" alt="교육학 김차웅" usemap="#Mapkcw01" border="0" />
                <map name="Mapkcw01" id="Mapkcw01">
                  <area shape="rect" coords="3,819,387,916" href="#none" alt="적중증거자료영상보기" />
                  <area shape="rect" coords="417,820,609,917" href="#none" alt="증거자료다운받기" />
                  <area shape="rect" coords="674,820,1060,917" href="#none" alt="설명회보기" />
                  <area shape="rect" coords="1096,815,1280,918" href="#none" alt="설명회자료다운" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcw_01.jpg" usemap="#Mapkcw02" border="0">
                <map name="Mapkcw02" class="review_btn" id="wsamkcw">
                  <area shape="rect" coords="412,926,869,1006" href="#none" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt02">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/2-5Rp5_-6wo?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       	    </div>
        </div>
    </div>
    <!-- End Container -->
@stop