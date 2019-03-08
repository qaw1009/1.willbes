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

        .wb_top {background:#fef053 url(http://file3.willbes.net/new_gosi/2018/10/EV181005_c1_bg.jpg) no-repeat center top; position:relative;  }

        .wb_cts01{background:#fff;}
        /* 탭 */
        .tabContaier{padding-top:20px; padding-bottom:120px;}
        .tabContaier ul {width:980px; text-align:center; margin:0 auto}
        .tabContaier li {display:inline; float:left; margin-bottom:20px;}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContentsEvt iframe {width:876px; height:480px;}

        .wb_cts02 {background:#ffd84f;}

        .wb_cts03 {background:#ffd84f;}

        .PeMenu {width:1210px; margin:0 auto 0; padding-top:100px}
        .PeMenu li { display:inline; float:left}
        .PeMenu li a img.off {display:block}
        .PeMenu li a img.on {display:none}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:185px;
            animation:upDown 1s infinite;
            -webkit-animation:upDown 1s infinite;
            z-index:10;
        }

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
            <div>
                <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c9.png" alt="2019대비 통신직/전기직 이론/문제풀이 패키지" usemap="#Map181130_c1" border="0">
                <map name="Map181130_c1" >
                    <area shape="rect" coords="17,148,157,269" href="#event01"  onfocus="this.blur();"  />
                    <area shape="rect" coords="23,289,146,398" href="#event02" onfocus="this.blur();" />
                </map>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_c1.png" alt=" 윌비스 차원이 다른 전기/통신 기술직의 대가 최우영교수 " usemap="#Map20181005_c1" border="0"  />
            <map name="Map20181005_c1" >
                <area shape="rect" coords="259,626,388,743" href="#event" onfocus="this.blur();"/>
            </map>
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts01">
            <p id="evt01" class="PlatF"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_c2.jpg" alt="기술직 수험생의 이유있는 선택 최우영교수"  >
            <p id="evt02" class="PlatF"><img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_c3.jpg" alt="난해한 부분의 핵심포인트를 짚어주는 고득점 합격 필수 강의 최우영교수" ></p>
            <div class="tabContaier"  >
                <ul class="cf">
                    <li>
                        <a class="active" href="#tab1">
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap01off_c.jpg"  class="off" alt="전자공학"/>
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap01on_c.jpg" class="on"  />
                        </a>
                    </li>
                    <li>
                        <a  href="#tab2">
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap02off_c.jpg"  class="off"  />
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap02on_c.jpg"  class="on"  alt="무선공학"/>
                        </a>
                    </li>
                    <li>
                        <a  href="#tab3">
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap03off_c.jpg"  class="off" />
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap03on_c.jpg"  class="on" alt="전기이론학"/>
                        </a>
                    </li>
                    <li>
                        <a  href="#tab4">
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap04off_c.jpg"  class="off" alt="전기기기"/>
                            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181005_tap04on_c.jpg" class="on" />
                        </a>
                    </li>
                </ul>

                <div class="tabContentsEvt" id="tab1">
                    <iframe width="876px" height="480px" src="https://www.youtube.com/embed/ZJG2UIJmQxc?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class=" tabContentsEvt" id="tab2"></div>
                <div class=" tabContentsEvt" id="tab3"></div>
                <div class=" tabContentsEvt" id="tab4"></div>
            </div><!--tabContaier//-->
        </div>
        <!--WB_top01//-->

        <div class="evtCtnsBox wb_cts02" id="event01">
            <div class="PeMenu" >
                <ul>
                    <li>
                        <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_1on.jpg" alt=""  />
                    </li>
                    <li>
                        <a href="#event02"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_2.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_2on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_2.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_2.jpg'" alt=""  />
                        </a>
                    </li>
                </ul>
            </div>

            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c7.jpg" alt="윌비스 최우영교수의 전기/통신직 대비 이론패키지"  usemap="#Map20181005_c2" border="0"  />
            <map name="Map20181005_c2">
                <area shape="rect" coords="746,1174,974,1280" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=011&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800110"  onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="747,942,970,1067" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=011&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800111" onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="790,624,1043,718" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=011&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800089" onfocus="this.blur();" target="_blank" />
                <area shape="rect" coords="473,626,732,719" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=011&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800093" onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="167,621,433,726" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=011&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800094" onfocus="this.blur();" target="_blank"/>
            </map>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="event02">
            <div class="PeMenu">
                <ul>
                    <li>
                        <a href="#event01"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_1.jpg" onmouseover="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_1on.jpg'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_1.jpg'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_1.jpg'" alt=""  />
                        </a>
                    </li>
                    <li>
                        <a href="#event02"  onFocus="this.blur();" >
                            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c7_2on.jpg" alt=""/>
                        </a>
                    </li>
                </ul>
            </div>

            <img src="http://file3.willbes.net/new_gosi/2019/01/EV190117_c8.jpg" alt="윌비스 최우영 교수의 학원실강"  usemap="#Map20181005_c4" border="0" />
            <map name="Map20181005_c4" >
                <area shape="rect" coords="330,1128,874,1223" href="http://www.willbesgosi.net/teacher/passTeacherDetail.html?topMenu=011&topMenuName=기술직&topMenuType=F&topMenuGnb=FM_002&searchCategoryCode=011&searchSubjectCode=1087&searchSubjectNm=전자공학&searchUserId=wgt103&searchUserNm=최우영&LeftSel=&SEARCHSTJCODE=&SEARCHSERIESCODE_CHECK=01121&SEARCHSUBJECTCODE_CHECK=&SEARCHPRFCODE_CHECK=" onfocus="this.blur();" target="_blank"/>
            </map>
        </div><!--wb_cts03//-->
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        var tab1_url = "https://www.youtube.com/embed/ZJG2UIJmQxc?rel=0";
        var tab2_url = "https://www.youtube.com/embed/gTLrfJBKmGI?rel=0";
        var tab3_url = "https://www.youtube.com/embed/8y8JNZapAB0?rel=0";
        var tab4_url = "https://www.youtube.com/embed/6-W1MgmE8dc?rel=0";

        $(document).ready(function(){
            $(".tabContentsEvt").hide();
            $(".tabContentsEvt:first").show();
            $(".tabContaier ul li a").click(function(){
                var activeTab = $(this).attr("href");
                var html_str = "";
                if(activeTab == "#tab1"){
                    html_str = "<iframe src='"+tab1_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab2"){
                    html_str = "<iframe src='"+tab2_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab3"){
                    html_str = "<iframe src='"+tab3_url+"' allowfullscreen></iframe>";
                }else if(activeTab == "#tab4"){
                    html_str = "<iframe src='"+tab4_url+"' allowfullscreen></iframe>";
                }
                $(".tabContaier ul li a").removeClass("active");
                $(this).addClass("active");
                $(".tabContentsEvt").hide();
                $(".tabContentsEvt").html('');
                $(activeTab).html(html_str);
                $(activeTab).fadeIn();
                return false;
            });
        });
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop