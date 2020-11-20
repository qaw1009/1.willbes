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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam33_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#daefe8}
        .evt04 {background:#fff}
        .evt05 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam33_05_bg.jpg) no-repeat center top; position:relative; height:783px}
        .evt05 div {position:absolute; width:600px; top:251px; left:50%; z-index:10}
        .evt05 div.youtube01 {margin-left:-638px;}
        .evt05 div.youtube02 {margin-left:40px;}
        .evt05 div iframe {width:600px; height:336px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsam33_top.jpg" alt="국어 이원근" usemap="#Mapkys01" border="0" />
                <map name="Mapkys01" id="Mapkys01">
                    @if(empty($arr_base['promotion_otherinfo_professor']) === false)
                        @foreach($arr_base['promotion_otherinfo_professor'] as $key => $row)
                            @if($key == 0)
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="89,819,461,919" href="#none" alt="합격사례발표회" />
                            @else
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="592,820,967,918" href="#none" alt="설명회" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="1010,814,1192,916" alt="설명회자료" />
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_01.jpg" />
            </div>

            <div class="evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_02.jpg">
       	    </div>

            <div class="evt03">
            	<img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_03.jpg">
            </div>

            <div class="evt04">
           	   <img src="https://static.willbes.net/public/images/promotion/2020/09/190924_wsam33_04.jpg">
            </div>

            <div class="evt05" id="youtube">
                <div class="youtube01">
                    <iframe src="https://www.youtube.com/embed/RmjQfvMqNK8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube02">
                    <iframe src="https://www.youtube.com/embed/VYSY-BCzTzE?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop