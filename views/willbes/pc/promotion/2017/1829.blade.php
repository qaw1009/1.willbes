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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamDiana_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_wsamDiana_01_bg.jpg) no-repeat center top; height:1068px}
        .evt01 iframe {margin-top:300px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//200130_wsamDiana_top.jpg" alt="음악 다이애나" usemap="#Maplij01" border="0" />
                <map name="Maplij01" id="Maplij01">
                    <area shape="rect" coords="312,818,718,917" href="#none" alt="설명회보기" />
                    <area shape="rect" coords="755,813,942,914" href="#none" alt="설명회자료다운" />
                </map>
            </div>

            <div class="evt01">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/_r8KVK5Z6bU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		    </div>
        </div>
    </div>
    <!-- End Container -->
@stop