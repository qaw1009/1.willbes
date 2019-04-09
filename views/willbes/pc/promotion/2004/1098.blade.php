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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .wb_skybn {position:fixed; bottom:80px; right:10px; width:100px; z-index:10}
        .wb_cts01 {position:relative;overflow:hidden; min-width:1210px; text-align:center; background:#5f4b99 url("http://file3.willbes.net/new_gosi/2019/01/EV190118_1_bg.gif") center top  no-repeat; margin-top:5px;}
        .wb_cts02 {background:#fff;}
        .wb_cts03 {background:#f8f9fb;}
        .wb_cts04 {background:#fff;}
        .wb_cts05 {background:#f8f9fb;}
        .wb_cts06 {position:relative; overflow:hidden; background:#21375e;}

        /*업다운 애니메이션(퀵배너)*/
        #event_sky .quick {position:fixed; right:10px; top:200px; z-index:10; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite}
        #event_sky .quick li{padding-bottom:5px;}
        @@keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }
        @@-webkit-keyframes upDown{
             from{margin-top:0}
             60%{margin-top:-30px}
             to{margin-top:0}
         }

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div id="event_sky">
            <div class="quick">
                <ul>
                    <li><img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_sky1.png" alt="학원문의" ></li>
                    <!--li><a href="{{ site_url('#none') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_sky2.png" alt="국어" ></a></li>
                    <li><a href="{{ site_url('#none') }}" target="_blank" ><img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_sky3.png" alt="영어" ></a></li-->
                </ul>
            </div>
        </div>
        <!--//Quick-->

        <div class="evtCtnsBox wb_cts01"><img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_1.png" alt="아침실전모고" /></div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_2.png" alt="기미진국어" usemap="#Map_1123_lec1" border="0" />
            <map name="Map_1123_lec1">
                <area shape="rect" coords="318,642,894,715" href="{{ site_url('/pass/professor/show/prof-idx/50242/?cate_code=3043&subject_idx=1253&subject_name=%EA%B5%AD%EC%96%B4&tab=open_lecture') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_3.png" alt="한덕현영어" usemap="#Map_1123_lec2" border="0" />
            <map name="Map_1123_lec2">
                <area shape="rect" coords="314,676,895,754" href="{{ site_url('/pass/professor/show/prof-idx/50500/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_4.png" alt="김영영어" usemap="#Map_1123_lec3" border="0" />
            <map name="Map_1123_lec3">
                <area shape="rect" coords="288,695,928,759" href="{{ site_url('/pass/professor/show/prof-idx/50384/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_5.png" alt="성기건영어" usemap="#Map_1123_lec4" border="0" />
            <map name="Map_1123_lec4">
                <area shape="rect" coords="282,694,909,761" href="{{ site_url('/pass/professor/show/prof-idx/50346/?cate_code=3043&subject_idx=1254&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank">
            </map>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190118_6.gif" alt="#" />
        </div>
        <!--wb_cts06//-->

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop