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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam45_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsam45_01_bg.jpg) repeat center top;}
        .evt02 {background:#fff}
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam45_04_bg.jpg) no-repeat center top; position:relative; height:1069px}
        .evt03 iframe {position:absolute; width:853px; left:50%; top:300px; margin-left:-426px; z-index:10;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsam45_top.jpg" alt="수학 박태영" usemap="#Mappty01" border="0" />
                <map name="Mappty01" id="Mappty01">
                    @if(empty($arr_base['promotion_otherinfo_professor']) === false)
                        @foreach($arr_base['promotion_otherinfo_professor'] as $key => $row)
                            @if($loop->index == 1)
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="36,819,388,918" href="#none" alt="기출해설특강" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="431,819,614,918" alt="기출적중자료" />
                            @else
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="670,819,1017,917" href="#none" alt="설명회보기" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="1055,819,1242,919" alt="설명회자료" />
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam45_01.jpg" width="1297" height="1087" />
            </div>

            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam45_02.jpg">
   	  	    </div>

             <div class="evt03">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/uiCD50TeuAU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop