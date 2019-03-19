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

        .wb_top {background:#c7bfab url(http://file3.willbes.net/new_gosi/2018/12/EV181211_1_bg.png) no-repeat center top; position:relative; }
        .wb_cts01 {background:#eee}
        .wb_cts01_1 {background:#eee}
        .wb_cts02 {background:#3c3559}
        .wb_cts03 {background:#ebeff0}
        .wb_cts05 {background:#cdc8ba}
        .wb_cts06 {background:#fff}


        .skybanner {
            position:fixed;
            top:250px;
            right:10px;
            z-index:1;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <div><a href="#lec_go"><img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_sky_end.png" alt="수강신청" ></a></div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_1_1219end.png"alt="국어 강의의 NEW 패러다임 기미진 국어" usemap="#Map_180730_lec" border="0" />
            <map name="Map_180730_lec">
                <area shape="rect" coords="98,1114,510,1199" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800115" target="_blank" alt="아침특강제외">
                <area shape="rect" coords="686,1119,1093,1202" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800114" target="_blank" alt="아침특강포함">
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01_1">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_1_open.png" alt="기미진Tpass서울시/지방직대비드디어오픈"/>
        </div>
        <!--wb_cts01_1//-->

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_2.png" alt="국어 교재소개"/>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_3.png" alt="학습tip및 커리큘럼" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_4.png"alt="기미진 국어를 수식하는 말 그리고 수강평"/>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05" id="lec_go">
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_5.png" alt="수강신청" usemap="#Map_180730_lec2" border="0"/>
            <map name="Map_180730_lec2">
                <area shape="rect" coords="532,803,752,873" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150648') }}" target="_blank" alt="아침특강제외">
                <area shape="rect" coords="826,803,1043,869" href="{{ site_url('/package/show/cate/3019/pack/648001/prod-code/150647') }}" target="_blank" alt="2아침특강포함">
            </map>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="http://file3.willbes.net/new_gosi/2018/12/EV181211_6.png" alt="이용안내 및 유의사항 " />
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