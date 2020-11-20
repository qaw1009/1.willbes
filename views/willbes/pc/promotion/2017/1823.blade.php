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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkdh_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkdh_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkdh_02_bg.jpg) no-repeat center top; height:1069px}
        .evt02 iframe {margin-top:300px}

        .willbes-Layer-ReplyBox { top: 2000px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkdh_top.jpg" alt="전공영어 공훈" usemap="#Mapkcw01" border="0" />
                <map name="Mapkcw01" id="Mapkcw01">
                    @if(empty($arr_base['promotion_otherinfo_professor']) === false)
                        @foreach($arr_base['promotion_otherinfo_professor'] as $key => $row)
                            @if($loop->index == 1)
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="3,819,387,916" href="#none" alt="출제경향분석" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="417,815,609,912" alt="특강자료다운받기" />
                            @else
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="674,820,1060,917" href="#none" alt="설명회보기" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="1096,814,1280,917" alt="설명회자료다운" />
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsamkdh_01.jpg" usemap="#Mapkcw02" border="0">
                <map name="Mapkcw02" class="review_btn" id="wsamkdh">
                  <area shape="rect" coords="384,926,895,1006" href="#none" onclick="go_study_comment_popup();" alt="합격수기확인" />
                </map>
            </div>

            <div class="evt02">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/_P_B1-YfNiA?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
       	    </div>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop