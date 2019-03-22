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
        .evtCtnsBox {width:100%; text-align:center; min-width:1210px;}

        /************************************************************/

        .menuTab {width:100%; text-align:center; background:#252525; margin-top:20px; min-width:1210px}
        .menuTab ul {width:980px; margin:0 auto}
        .menuTab li {display:inline; float:left}
        .menuTab ul:after {content:""; display:block; clear:both}

        .wb_top {background:#272324 url(http://file3.willbes.net/new_cop/2019/01/191008-dg01_bg.png)}
        .wb_01 {background:#e5edf0}
        .wb_02 {background:#6591fe}
        .wb_03 {background:#272324 url(http://file3.willbes.net/new_cop/2019/01/191008-dg04_bg.png)}
        .wb_04 {background:#1d2232;padding:0 0 90px 0}
        .wb_05 {background:#272324 url(http://file3.willbes.net/new_cop/2019/01/191008-dg06_bg.png)}
        .wb_06 {background:#333;padding:0 0 90px 0}
        .wb_07 {background:#7fa4ff;padding:0 0 90px 0}
        .wb_08 {background:#40495c;padding:0 0 90px 0}
        .wb_09 {background:#e5edf0;padding:0 0 90px 0}
        .wb_10 {background:#272324 url(http://file3.willbes.net/new_cop/2019/01/191008-dg11_bg.png)}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg01.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg02.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg03.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg04.png"  alt="메인"  usemap="#191008-dg04"/>
            <map name="191008-dg04">
                <area shape="rect" coords="25,778,224,892" href="https://www.youtube.com/watch?v=4O2PgCv-j_o&t=387s" target="_blank"/>
                <area shape="rect" coords="246,779,443,889" href="https://www.youtube.com/watch?v=SO_po85g7n0&t=27s" target="_blank"/>
                <area shape="rect" coords="535,778,732,890" href="https://www.youtube.com/watch?v=f6E7GBNRSow&t=594s" target="_blank"/>
                <area shape="rect" coords="756,778,953,890" href="https://www.youtube.com/watch?v=Djp_N3dnsBw&t=192s" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg05.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg06.png"  alt="메인" usemap="#191008-dg06"/>
            <map name="191008-dg06">
                <area shape="rect" coords="0,612,470,663" href="{{ site_url('/pass/support/examAnnouncement/index') }}" target="_blank"/>
                <area shape="rect" coords="510,611,978,665" href="{{ site_url('/pass/campus/show/code/605004?tab=qna') }}" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_06">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg07.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg08.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_08">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg09.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_09">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg10.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_10">
            <img src="http://file3.willbes.net/new_cop/2019/01/191008-dg11.png"  alt="메인" />
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop