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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam22_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsam22_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#fff}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam22_01_bg.jpg) no-repeat center top; position:relative; height:1068px}
        .evt03 iframe {position:absolute; width:853px; left:50%; top:300px; margin-left:-426px; z-index:10;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('html.promotion.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsam22_top.jpg" alt="국어 이원근" usemap="#Maplwg01" border="0" />
                <map name="Maplwg01" id="Maplwg01">
                  <area shape="rect" coords="766,814,952,917" href="#none" alt="설명회자료" />
                  <area shape="rect" coords="328,817,728,918" href="#none" alt="설명회영상" />
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam22_01.jpg" />
            </div>

            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam22_02.jpg">
       	    </div>

            <div class="evt03">
              <iframe width="853" height="480" src="https://www.youtube.com/embed/HYpNkxyS-vA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop