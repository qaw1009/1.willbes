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
            position:relative;
            width:100% !important;
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative; margin:0 auto}

        /************************************************************/

        .wb_cts01 {background:#e8d7cc url(http://file3.willbes.net/new_cop/2019/02/EV190226_c1_bg.jpg) no-repeat center top; position:relative;}

        .wb_cts02 {background:#e8d7cc url(http://file3.willbes.net/new_cop/2019/02/EV190226_c1_bg.jpg) no-repeat center bottom;}
        .wb_cts02 .video {position:absolute; width:469px; left:50%; margin-left:-415px; top:573px; z-index:1}

        .wb_cts03 {background:#fff; width:1120px;}
        .wb_cts03 .video {position:absolute; width:483px; left:50%; margin-left:18px; top:90px; z-index:1}

        .wb_cts04 {background:#fff; width:1120px;}
        .wb_cts04 .video  {position:absolute; width:483px; left:50%; top:120px; margin-left:18px; z-index:1}

        .wb_cts05 {background:#fff; width:1120px;}
        .wb_cts05 .video {position:absolute; width:483px; left:50%; top:120px; margin-left:18px; z-index:1}

        .wb_cts06 {background:#fff; width:1120px;}
        .wb_cts06 .video {position:absolute; width:483px; left:50%; top:120px; margin-left:18px; z-index:1}

        .wb_cts07 {background:#fff; width:1120px;}
        .wb_cts07 .video {position:absolute; width:483px; left:50%; top:120px; margin-left:18px; z-index:1}

        .wb_cts08 {background:#fff; width:1120px;}
        .wb_cts08 .video {position:absolute; width:483px; left:50%; top:120px; margin-left:18px; z-index:1}

        .wb_cts09 {background:#4c6a7c;}


    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c1.png" alt="형법의 절대지존 김원욱 경찰 3차도 절대 적중!"  />
            <iframe width="979" height="615" src="https://www.youtube.com/embed/7sFEipCgXu8?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c2_1.gif" alt="형법, 김원욱이 명확한 기준을 제시해드립니다. "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c2.png" alt=" "  />
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c3.jpg" alt=" 형법 문제, 빈틈없는 적중을 직접 확인하세요!" usemap="#Map190226_c" border="0" />
            <map name="Map190226_c" >
                <area shape="rect" coords="436,439,683,479" href="http://file3.willbes.net/board/201902/20190227102115134.pdf" alt="더 많은 적중사례 보러가기" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c4_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c4.jpg" alt=" " />
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c5_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c5.jpg" alt=" " />
        </div>

        <div class="evtCtnsBox wb_cts06" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c6_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c6.jpg" alt=" " />
        </div>

        <div class="evtCtnsBox wb_cts07" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c7_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c7.jpg" alt=" " />
        </div>

        <div class="evtCtnsBox wb_cts08" >
            <div class="video">
                <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c8_1.gif" alt=" "/>
            </div>
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c8.jpg" alt=" " />
        </div>

        <div class="evtCtnsBox wb_cts09" >
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190226_c9.jpg" alt="김원욱 형법 必合 커리큘럼" usemap="#Map190226_c1" border="0" />
            <map name="Map190226_c1" >
                <area shape="rect" coords="234,869,546,924" href="{{ site_url('/professor/show/cate/3001/prof-idx/50297/?subject_idx=1003&subject_name=%ED%98%95%EB%B2%95&tab=open_lecture') }}" target="_blank" />
                <area shape="rect" coords="574,868,883,923" href="{{ site_url('/pass/professor/show/prof-idx/50298/?cate_code=3010&subject_idx=1056&subject_name=%ED%98%95%EB%B2%95&tab=open_lecture') }}" target="_blank"/>
            </map>
        </div>
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop