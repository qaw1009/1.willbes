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
            position:absolute;
            top:400px;
            right:10px;
            z-index:1;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .WB_con01	  {width:100%; min-width:1210px; text-align:center; background:#ebe4d2 url('http://file3.willbes.net/new_cop/2019/02/EV190225_1_bg.png') no-repeat center; background-size:auto; margin-top:20px;}
        .WB_con01 ul {width:100%; text-align:center; margin:0 auto}
        .WB_con01 ul li{margin:0 auto}

        .WB_con02{width:100%; min-width:1210px; background:#002994 url('http://file3.willbes.net/new_cop/2019/02/EV190225_2_bg.png') no-repeat center;}
        .WB_con02 ul {width:100%; text-align:center; margin:0 auto}
        .WB_con02 ul li{margin:0 auto}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="#Map_0225_cop_event"><img src="http://file3.willbes.net/new_cop/2019/02/EV190225_sky.png" alt="#" /></a>
        </div>

        <div class="evtCtnsBox WB_con01">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190225_1.png" alt="#" />
        </div>

        <div class="evtCtnsBox WB_con02" id="Map_0225_cop_event">
            <img src="http://file3.willbes.net/new_cop/2019/02/EV190225_2.png" alt="#" usemap="#Map_0225_lec" border="0" />
            <map name="Map_0225_lec">
                <area shape="rect" coords="775,295,1069,358" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1001&searchLeccode=D201800489&leftMenuLType=M0001&lecKType=D" target="_blank" alt="하승민">
                <area shape="rect" coords="773,376,1071,440" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900058&leftMenuLType=M0001&lecKType=D" target="_blank" alt="오태진">
                <area shape="rect" coords="777,458,1072,523" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1002&searchLeccode=D201900056&leftMenuLType=M0001&lecKType=D" target="_blank" alt="원유철">
                <area shape="rect" coords="771,607,1069,670" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1004&searchLeccode=D201800592&leftMenuLType=M0001&lecKType=D" target="_blank" alt="신광은">
                <area shape="rect" coords="773,689,1073,751" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1003&searchLeccode=D201800586&leftMenuLType=M0001&lecKType=D" target="_blank" alt="김원욱">
                <area shape="rect" coords="765,766,1070,832" href="/lecture/movieLectureDetail.html?topMenu=083&topMenuType=O&searchSubjectCode=1030&searchLeccode=D201900039&leftMenuLType=M0001&lecKType=D" target="_blank" alt="공득인">
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