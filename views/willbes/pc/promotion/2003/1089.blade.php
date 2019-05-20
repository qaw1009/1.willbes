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

        .WB_con01 {background:#1d1940 url("http://file3.willbes.net/new_gosi/2019/01/EV190108_1_bg.png") center top no-repeat}
        .WB_con02 {background:#fff;}
        .WB_con03 {background:#fd8062;}
        .WB_con04 {background:#fff;}
        .WB_con05 {background:#191514;}
        .WB_con06 {background:#fd8062; padding-bottom:150px;}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            z-index:1;
        }
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="https://static.willbes.net/public/images/promotion/2019/05/1241_skybanner.png" alt="순환별 패키지" usemap="#Map1241C" border="0" >
                <map name="Map1241C" id="Map1241C">
                    <area shape="rect" coords="9,51,118,106" href="#0108lec_go" alt="예비순환" />
                    <area shape="rect" coords="9,117,118,178" href="/promotion/index/cate/3035/code/1241" target="_blank" alt="1순환" />
                    <area shape="rect" coords="9,189,118,243" href="javascript:alert('준비중입니다.');" alt="2순환" />
                    <area shape="rect" coords="9,254,118,319" href="javascript:alert('준비중입니다.');" alt="3순환" />
                    <area shape="rect" coords="9,326,119,386" href="javascript:alert('준비중입니다.');" alt="4순환" />
                    <area shape="rect" coords="9,398,119,470" href="javascript:alert('준비중입니다.');" alt="5순환" />
                </map>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_1.png" alt="2020 김동진 법원팀 예비순환"/>
        </div>
        <!--WB_con01//-->

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_2.png" alt="오직 법원직만을 위한 혁신적인 커리큘럼_ 예비순환">
        </div>
        <!--WB_con02//-->

        <div class="evtCtnsBox WB_con03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_3.png" alt="중점 선행학습"/>
        </div>
        <!--WB_con03//-->

        <div class="evtCtnsBox WB_con04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_4.png" alt="차원이 다른 김동진 법원팀" usemap="#Map_law_go_l" border="0"/>
            <map name="Map_law_go_l">
                <area shape="rect" coords="740,954,834,981" href="http://cafe.daum.net/LAW-KDJTEAM" target="_blank">
            </map>
        </div>
        <!--WB_con04//-->

        <div class="evtCtnsBox WB_con05" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_5_txt.png" alt="2020법원직대비_ 윌비스 김동진 법원팀 예비순환 수강신청"/>
        </div>
        <!--WB_con05//-->

        <div class="evtCtnsBox WB_con06" id="0108lec_go">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190108_5.png" alt="#" usemap="#Map_2019_law_1" border="0"/>
            <map name="Map_2019_law_1">
                <area shape="rect" coords="793,138,1018,214" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146110') }}" target="_blank" alt="김동진">
                <area shape="rect" coords="804,379,1020,454" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146869') }}" target="_blank" alt="박초롱">
                <area shape="rect" coords="809,618,1029,690" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146870') }}" target="_blank" alt="이국령">
                <area shape="rect" coords="804,857,1022,931" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146871') }}" target="_blank" alt="문형석">
                <area shape="rect" coords="813,1092,1022,1171" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146872') }}" target="_blank" alt="이덕훈">
                <area shape="rect" coords="812,1334,1021,1412" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146873') }}" target="_blank" alt="유안석">
                <area shape="rect" coords="811,1577,1016,1650" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146874') }}" target="_blank" alt="임진석">
                <area shape="rect" coords="806,1817,1029,1894" href="{{ site_url('/lecture/show/cate/3035/pattern/only/prod-code/146875') }}" target="_blank" alt="이현나">
            </map>
        </div>
        <!--WB_con06//-->

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