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

        .wb_top {width:100%; min-width:1210px; text-align:center; background:#a12932 url(http://file3.willbes.net/new_gosi/2018/11/EV181113_c1_bg.jpg) no-repeat center top; position:relative;  }
        .wb_cts01 {background:#fff}
        .wb_cts02 {background:#f3e0e2 url(http://file3.willbes.net/new_gosi/2018/11/EV181113_c2_bg.jpg) no-repeat center top;}
        .wb_cts05 {background:#fff}

        /*레이어팝업*/
        .Pstyle {
            opacity:0;
            display:none;
            position:relative;
            width:auto;
            padding: 20px;
            background:#fff;
        }
        .b-close {
            position:absolute;
            right:-35px;
            top:0;
            display:inline-block;
            padding:5px;
            cursor:pointer;
            background:#333;
        }
        .popcontent {height:auto; width:auto}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c1.png" alt="윌비스 행정학의 대세 김덕관 행정학 T-PASS " usemap="#Map18113_c1" border="0"  />
            <map name="Map18113_c1" >
                <area shape="rect" coords="449,963,652,1063" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800104 " target="_blank" onfocus="this.blur();" />
                <area shape="rect" coords="678,978,882,1070" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800106" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="926,968,1141,1069" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800108" target="_blank" onfocus="this.blur();"/>
            </map>
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c2.jpg" alt="소방공무원을 선택했다면, 소방학/관계법규는 필수입니다." /><br>
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c3.jpg" alt="김종상 소방 연간커리큘럼과 함께라면합격에 한걸음 더 가까워질 수 있습니다. " /><br>
            <a onclick="go_popup()">
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c4.jpg" alt=" 커리큘럼 자세히 보기" />
            </a><br>
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c5.jpg" alt="윌비스 소방 수험생들이 직접 인증한 듣고 싶은, 들을 수밖에 없는 名강의!. " />
        </div><!--wb_cts01//-->

        <!--레이어팝업-->
        <div id="popup" class="Pstyle">
            <a class="b-close"><img src="http://file.willbes.net/new_image/2016/popClose.png"></a>
            <div class="content">
                <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c8.jpg" alt="2019년 소방 커리큘럼"/>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c6.jpg" alt="윌비스 소방직의 새로운 합격 공식, 김종상!" usemap="#Map18113_c2" border="0" />
            <map name="Map18113_c2" >
                <area shape="rect" coords="502,752,685,892" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800104" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="705,760,876,887" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800106" target="_blank" onfocus="this.blur();"/>
                <area shape="rect" coords="902,753,1082,893" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=006&topMenuName=&topMenuType=O&searchCategoryCode=006&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800108" target="_blank" onfocus="this.blur();"/>
            </map>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts05" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/11/EV181113_c7.jpg" alt="윌비스 김종상 소방학/관계법규 이용안내 및 유의사항 " />
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        function go_popup() {
            $('#popup').bPopup();
        };

        /**/
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
        });
    </script>
@stop