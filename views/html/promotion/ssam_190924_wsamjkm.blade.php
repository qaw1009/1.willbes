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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamjkm_top_bg.jpg) no-repeat center top;}
        .evt01 {background:#fff}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamjkm_02_bg.jpg) no-repeat center top; position:relative; height:1069px;}
        .evt02 iframe {position:absolute; width:853px; left:50%; top:300px; margin-left:-426px; z-index:10;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('html.promotion.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//200130_wsamjkm_top.jpg" alt="국어 이원근" usemap="#Mappty01" border="0" />
                <map name="Mappty01" id="Mappty01">
                    <area shape="rect" coords="4,819,358,918" href="#none" alt="기출해설특강" />
                    <area shape="rect" coords="399,819,580,917" href="#none" alt="기출해설자료" />
                    <area shape="rect" coords="660,819,1058,916" href="#none" alt="설명회보기" />
                    <area shape="rect" coords="1097,819,1275,920" href="#none" alt="설명회자료" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//190924_wsamjkm_01.jpg" />
            </div>

             <div class="evt02">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/5Pqiku4X8pA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop