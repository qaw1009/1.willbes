@extends('willbes.pc.layouts.master')
@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam45_top_bg.jpg) no-repeat center top;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcy_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcy_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcy_02_bg.jpg) no-repeat center top; height:1069px}
        .evt02 iframe {margin-top:300px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('html.promotion.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcy_top.jpg" alt="전공수학 김철홍" usemap="#Mapmjs01" border="0" />
                <map name="Mapmjs01" id="Mapmjs01">
                  <area shape="rect" coords="3,809,383,926" href="#none" alt="기출해설특강">
                  <area shape="rect" coords="417,809,610,917" href="#none" alt="강의자료다운받기" />
                  <area shape="rect" coords="674,810,1055,928" href="#none" alt="간담회보기" >
                  <area shape="rect" coords="1096,812,1280,915" href="#none" alt="강의자료" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkcy_01.jpg" usemap="#Mapmjs02" border="0">
                <map name="Mapmjs02" class="review_btn" id="wsamkcy">
                    <area shape="rect" coords="383,1347,899,1436" href="#none" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt02">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/CuKtpuwQClE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       	    </div>
        </div>
    </div>
    <!-- End Container -->
@stop