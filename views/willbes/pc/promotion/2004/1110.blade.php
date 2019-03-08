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

        .skybanner {
            position:absolute;
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner li {
            margin-bottom:5px;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}

        .wb_top {background:#272324 url(http://file3.willbes.net/new_gosi/2019/01/190110_dg_01_bg.png) repeat;}
        .wb_01 {background:#e5edf0;min-width:1210px}
        .wb_02 {background:#6591fe;min-width:1210px}
        .wb_03 {background:#272324 url(http://file3.willbes.net/new_gosi/2019/01/190110_dg_04_bg.png) repeat;}
        .wb_04 {background:#1d2232}
        .wb_05 {background:#fff}
        .wb_06 {background:#333333}
        .wb_07 {background:#40495c}
        .wb_08  {background:#272324 url(http://file3.willbes.net/new_gosi/2019/01/190110_dg_09_bg.png) repeat;}

        .wb_cts_001 {background:#ffffff; }
        .tabContaier{width:100%; text-align:center; padding-bottom:0px;}
        .tabContaier ul {margin:0 auto;  width:980px}
        .tabContaier li {display:inline; float:left}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181120_L7.png" alt="7급 초시생 합격전략설명회" usemap="#EV181120_L7" border="0" >
            <map name="EV181120_L7" >
                <area shape="rect" coords="3,132,94,163" href="http://www.willbesgosi.net/mouigosa/request/list.html?topMenuType=F&topMenuGnb=FM_004&topMenu=MAIN&menuID=FM_004_002_002&topMenuName=%EC%88%98%ED%97%98%EC%97%B0%EA%B5%AC%EC%86%8C&BOARDTYPE=4&INCTYPE=list" target="_blank"/>
                <area shape="rect" coords="5,337,95,367" href="http://willbesgosi.net/notice/view.html?topMenuType=F&topMenuGnb=FM_008&topMenu=001&menuID=FM_008_004&BOARD_MNG_SEQ=&NOTICETYPE=event&INCTYPE=view&currentPage=1&BOARD_SEQ=&PARENT_BOARD_SEQ=&searchEventNo=996&SEARCHKIND=&SEARCHTEXT=" target="_blank"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_01.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_01">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_02.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_02">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_03.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_03">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_04.png"  alt="메인" usemap="#190110-dg04">
            <map name="190110-dg04">
                <area shape="rect" coords="25,778,224,892" href="javascript:alert('준비중입니다');"/>
                <area shape="rect" coords="246,779,443,889" href="javascript:alert('준비중입니다');"/>
                <area shape="rect" coords="535,778,732,890" href="javascript:alert('준비중입니다');"/>
                <area shape="rect" coords="756,778,953,890" href="javascript:alert('준비중입니다');"/>
            </map>
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_05.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_05">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_06.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_cts_001">
            <div class="tabContaier">
                <ul>
                    <li>
                        <a class="active" href="#tab2">
                            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab_btn1-1.png"  class="off"  />
                            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab_btn1.png"  class="on"  />
                        </a>
                    </li>
                    <li>
                        <a href="#tab1">
                            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab_btn2-1.png"  class="off"  />
                            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab_btn2.png"  class="on"  />
                        </a>
                    </li>
                </ul>

                <div class="tabContents" id="tab1">
                    <p><img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab02.png"  /></p>
                </div>
                <div class="tabContents" id="tab2">
                    <p><img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_tab01.png"  /></p>
                </div>
            </div><!--tabContaier//-->
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_06">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_07.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_07">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_08.png"  alt="메인" />
        </div>

        <div class="evtCtnsBox wb_08">
            <img src="http://file3.willbes.net/new_gosi/2019/01/190110_dg_09.png"  alt="메인" />
        </div>

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function(){
            $(".tabContents").hide();
            $(".tabContents:first").show();

            $(".tabContaier ul li a").click(function(){

                var activeTab = $(this).attr("href");
                $(".tabContaier ul li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContents").hide();
                $(activeTab).fadeIn();

                return false;
            });
        });
    </script>

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop