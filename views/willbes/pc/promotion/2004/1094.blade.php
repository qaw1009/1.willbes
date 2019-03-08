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

        .wb_top {
            width:100%; min-width:1210px; text-align:center;
            background:#000 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_1_bg.png) no-repeat center top; position:relative;
        }
        .Wb_box  {display:block; width:1210px; margin:auto;}

        .wb_cts02 {background:#ebebe1;}

        .wb_cts03 {background:#ebebe1;}

        .wb_cts04 {background:#ebebe1;}

        .wb_cts05 {background:#b99b81 url(http://file3.willbes.net/new_gosi/2019/01/EV190130_5_bg.png) no-repeat center top;}

        .wb_cts06 {background:#ebebe1;}

        .wb_cts07 {background:#ebebe1;}

        .skybanner {
            position:fixed;
            top:200px;
            right:10px;
            width:100px;
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }
        .skybanner div {margin-bottom:5px}
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
        <div class="skybanner">
            <div><img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky1.gif" alt="군무원상담전화번호"></div>
            <div>
                <a href="http://www.willbesgosi.net/boardExamGuide/guide_list.html?topMenuGnb=FM_005&BOARDTYPE=4&INCTYPE=list&BOARD_MNG_SEQ=&topMenuType=F&topMenuGnb=FM_005&topMenu=001&topMenuName=9%EA%B8%89%20%EA%B3%B5%EB%AC%B4%EC%9B%90&menuID=FM_005_004" target="_blank" >
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky2.png" alt="시험정보" >
                </a>
            </div>
            <div>
                <a href="http://www.willbesgosi.net/event/movie/event.html?event_cd=off_180426_02&topMenuType=F" target="_blank" >
                    <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_sky3.png" alt="통생반" >
                </a>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_1.png" alt="윌비스군무원 이론요약&단원별문풀"/>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_2.png" alt="#" />
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_3.png" alt="#" />
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_4.png" alt="#" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_5.png" alt="#" usemap="#Map_2019_aca_go" border="0" />
            <map name="Map_2019_aca_go">
                <area shape="rect" coords="304,640,928,727" href="/notice/view.html?topMenuType=F&topMenuGnb=FM_008&topMenu=001&menuID=FM_008_004&BOARD_MNG_SEQ=&NOTICETYPE=event&INCTYPE=view&currentPage=1&BOARD_SEQ=&PARENT_BOARD_SEQ=&searchEventNo=1010&SEARCHKIND=&SEARCHTEXT=" target="_blank" alt="설명회 바로가기">
            </map>
        </div>
        <!--wb_cts05//-->

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_6.png" alt="#" />
        </div>
        <!--wb_cts06//-->

        <div class="evtCtnsBox wb_cts07">
            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190130_7.png" alt="#"  usemap="#EV190130_7" border="0" />
            <map name="EV190130_7" id="EV190130_7">
                <area shape="rect" coords="986,197,1088,250" href="http://www.willbesgosi.net/lecture/passLectureDetail.html?topMenu=001&topMenuName=9급공무원&leftMenuLType=M0103&lecKType=D&searchCategoryCode=001&searchSubjectCode=1127&searchSubjectNm=&searchLeccode=D201900173&LEC_TYPE_CHOICE=D&hSELYEAR=2016&hSELMONTH=&hUSER_ID=&searchUserNm=&CMD=view&LECCODE_ARR=&topMenuType=F&topMenuGnb=FM_009&LEARNING_CD=M0103" />
                <area shape="rect" coords="988,476,1086,537" href="http://www.willbesgosi.net/lecture/passLectureDetail.html?topMenu=001&topMenuName=9급공무원&leftMenuLType=M0103&lecKType=D&searchCategoryCode=001&searchSubjectCode=1127&searchSubjectNm=&searchLeccode=D201900174&LEC_TYPE_CHOICE=D&hSELYEAR=2016&hSELMONTH=&hUSER_ID=&searchUserNm=&CMD=view&LECCODE_ARR=&topMenuType=F&topMenuGnb=FM_009&LEARNING_CD=M0103" />
            </map>
        </div>
        <!--wb_cts07//-->

    </div>
    <!-- End Container -->

    <script>
        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>

@stop