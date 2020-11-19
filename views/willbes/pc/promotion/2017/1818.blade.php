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
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam32_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2020/09/191128_wsam32_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2020/09/200130_wsam32_01_bg.jpg) no-repeat center top; position:relative; height:783px}
        .evt02 div {position:absolute; width:600px; top:251px; left:50%; z-index:10}
        .evt02 div.youtube01 {margin-left:-638px;}
        .evt02 div.youtube02 {margin-left:40px;}
        .evt02 div iframe {width:600px; height:336px}

        .willbes-Layer-ReplyBox { top: 2500px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox ev01">
            @include('willbes.pc.promotion.2017.ssam_200130_skybanner')
            <div class="evtTop">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/200130_wsam32_top.jpg" alt="국어 송원영" usemap="#Mapswy01" border="0" />
                <map name="Mapswy01" id="Mapswy01">
                    @if(empty($arr_base['promotion_otherinfo_data']) === false)
                        @foreach($arr_base['promotion_otherinfo_data'] as $key => $row)
                            @if($key == 0)
                                @if(empty($row['wHD']) === false)
                                    <area shape="rect" onclick="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" coords="5,815,381,918" href="#none" alt="기출해설특강영상" />
                                @endif

                                @if(empty($row['FileFullPath']) === false)
                                    <area shape="rect" href="{{ site_url('/promotion/downloadOtherFile?file_idx='.$row['EpoIdx'].'&event_idx='.$row['PromotionCode']) }}" coords="417,811,613,921" alt="기출특강 자료" />
                                @endif
                            @else
                                @if(empty($row['wHD']) === false)
                                    <area shape="rect" onclick="javascript:fnPlayerSample('{{$row['OtherData1']}}','{{$row['wUnitIdx']}}','WD');" coords="676,816,1057,918" href="#none" alt="설명회영상" />
                                @endif

                                @if(empty($row['FileFullPath']) === false)
                                    <area shape="rect" href="{{ site_url('/promotion/downloadOtherFile?file_idx='.$row['EpoIdx'].'&event_idx='.$row['PromotionCode']) }}" coords="1094,811,1282,917" alt="설명회자료" />
                                @endif
                            @endif
                        @endforeach
                    @endif
                </map>
            </div>

            <div class="evt01">
                <img src="https://static.willbes.net/public/images/promotion/2020/09/191128_wsam32_01.jpg" usemap="#Mapswy02" border="0" />
                <map name="Mapswy02" class="review_btn" id="wsam32">
                    <area shape="rect" coords="385,1422,894,1511" href="#none" onclick="go_study_comment_popup();" alt="수강후기확인하기" />
                </map>
            </div>

            <div class="evt02" id="youtube">
                <div class="youtube01">
                    <iframe src="https://www.youtube.com/embed/SUWZsk2C6eU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="youtube02">
                    <iframe src="https://www.youtube.com/embed/lIdD_ZA63-M?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    @include('willbes.pc.promotion.ssam.study_comment')
@stop