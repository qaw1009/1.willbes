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

        .skybanner {
            position:fixed;
            bottom:20px;
            right:10px;
            z-index:1;
        }

        .WB_con01 {background:#ebe4d2 url('http://file3.willbes.net/new_cop/2019/02/EV190222_01_bg.png') no-repeat center; background-size:auto; margin-top:20px;}
        .WB_con02 {background:#2c2c2c; padding-bottom:110px;}
        .WB_con03 {background:#fff;}
        .WB_con04 {background:#e4e6ea;}
        .WB_con05 {background:#fff;}
        .WB_con06 {background:#db2a35;}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#0222_lecgo"><img src="http://file3.willbes.net/new_cop/2019/02/EV190222_sky.png" alt="좋은데이경찰영어하승민" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_01.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con02">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_02.png" alt="#" /><br>
            <iframe width="900" height="506" src="https://www.youtube.com/embed/qkzxjRDLPM0?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox WB_con03">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_03.png" alt="#" usemap="#Map_ex_go" border="0" />
            <map name="Map_ex_go">
                <area shape="rect" coords="305,624,791,722" href="{{ site_url('/support/notice/index/cate/3001') }}" target="_blank" alt="사례보러가기">
            </map>
        </div>

        <div class="evtCtnsBox WB_con04">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_04.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con05">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_05.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con06"  id="0222_lecgo">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190222_06.png" alt="#" usemap="#Map_190222_lecgo" border="0" />
            <map name="Map_190222_lecgo">
                <area shape="rect" coords="120,860,542,937" href="{{ site_url('/pass/professor/show/prof-idx/50136/?cate_code=3010&subject_idx=1054&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" alt="학원신청">
                <area shape="rect" coords="566,859,1010,937" href="{{ site_url('/professor/show/cate/3001/prof-idx/50135/?subject_idx=1001&subject_name=%EC%98%81%EC%96%B4&tab=open_lecture') }}" target="_blank" alt="온라인동영상신청">
            </map>
        </div>
        <!--//WB_con06-->

    </div>
    <!-- End Container -->


    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop