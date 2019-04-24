@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:150px;
            z-index:1;
        }
        .skybanner li a {display:block; padding:20px 0; text-align:center; background:#000; color:#fff; font-size:14px; line-height:1.5; margin-bottom:1px}
        .skybanner li a:hover {background:#e11c57}

        .evtTop {background:#79edff url(https://static.willbes.net/public/images/promotion/2019/04/1206_top_bg.jpg)  repeat-x center top;}
        .evt01 {background:#0956bd; padding:50px 0}
        .evt02 {background:#79edff; padding:100px 0}
        .evt02 iframe {width:854px; height:480px; margin-bottom:80px}
        .evt03 {background:#eee}
        .evt04 {background:#79edff}
        .evt05 {background:#022ef3}
        .evt06 {background:#79edff}
        .evt07 {background:#f5f5f5}
        .evt08 {background:#101010}
    </style>

    <div class="evtContent NGR" id="evtContainer">
        <ul class="skybanner NGEB">
            <li><a href="#none">사전특강&<br>설명회</a></li>
            <li><a href="#none">인적성<br>검사일정</a></li>
            <li><a href="#none">사전조사서<br> 특강</a></li>
            <li><a href="#none">면접캠프<br>프로그램 안내</a></li>
        </ul>
        <div class="evtCtnsBox evtTop" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_top.jpg"alt="2019 대비 해양경찰특채 기본이론" >
        </div>

        <div  class="evtCtnsBox evt01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_01.jpg" alt="">
        </div>

        <div class="evtCtnsBox evt02" >
            <iframe width="854" height="480" src="https://www.youtube.com/embed/-19yIQTjdQs?rel=0" frameborder="0" allowfullscreen></iframe>
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_02.jpg" alt="" usemap="#Map1206B" border="0" id="go01">
            <map name="Map1206B" id="Map1206B">
                <area shape="rect" coords="605,402,1021,515" href="#" alt="사전특강&amp;설명회 신청하기" />
            </map>
        </div>

        <div class="evtCtnsBox evt03" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_03.jpg"alt="" />

        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_04.jpg" alt=""  />
        </div>

        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_05.jpg" alt=""  />
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_06.jpg" alt=""  />
        </div>

        <div class="evtCtnsBox evt07">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_07.jpg" alt=""  />
        </div>

        <div class="evtCtnsBox evt08">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1206_08.jpg" alt=""  />
        </div>

    </div>
    <!-- End Container -->

@stop