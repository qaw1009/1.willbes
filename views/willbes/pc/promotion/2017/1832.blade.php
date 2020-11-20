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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_ssamjss_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09//200130_ssamjss_01_bg.jpg) no-repeat center top; height:1068px}
        .evt01 iframe {margin-top:300px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09//200130_ssamjss_top.jpg" alt="정컴교육론 정순선" usemap="#Maplij01" border="0" />
                <map name="Maplij01" id="Maplij01">
                    @if(empty($arr_base['promotion_otherinfo_professor']) === false)
                        @foreach($arr_base['promotion_otherinfo_professor'] as $key => $row)
                            @if($loop->index == 1)
                                <area shape="rect" onclick="{{ $row['player_sample'] }}" coords="365,812,771,911" href="#none" alt="설명회보기" />
                                <area shape="rect" href="{{ $row['download_url'] }}" coords="804,812,991,913" alt="설명회자료다운" />
                            @else
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <iframe width="853" height="480" src="https://www.youtube.com/embed/AgjNMhrOZrw?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <!-- End Container -->
@stop