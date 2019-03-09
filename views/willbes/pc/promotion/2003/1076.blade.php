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

        .wb_top {background:#3d3f3d url(http://file3.willbes.net/new_gosi/2018/07/EV180718_c1_bg.jpg) no-repeat center top; position:relative}

        .wb_cts00 {background:#fff; padding-bottom:100px}
        .wb_cts00 iframe {width:870px; height:480px;}
        .wb_cts00 li:last-child {
            margin-top:10px;
        }

        .wb_cts01 {background:#2a2a2a}


        /* 탭 */
        .tabContaier01{padding-top:20px; padding-bottom:170px}
        .tabContaier01 ul {width:100%; text-align:center; margin:0 auto}
        .tabContaier01 li {display:inline; float:left; margin-bottom:20px}
        .tabContaier01 a img.off {display:block}
        .tabContaier01 a img.on {display:none}
        .tabContaier01 a.active img.off {display:none}
        .tabContaier01 a.active img.on {display:block}

        .wb_cts02 {background:#fff}
        .tabContaier{width:100%; text-align:center}
        .tabContaier ul {margin:0 auto; background:#404e5b; width:1210px}
        .tabContaier li {display:inline; float:left}
        .tabContaier a img.off {display:block}
        .tabContaier a img.on {display:none}
        .tabContaier a.active img.off {display:none}
        .tabContaier a.active img.on {display:block}
        .tabContaier ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#34372e url(http://file3.willbes.net/new_gosi/2018/07/EV180718_c7_bg.jpg) repeat;}

        .wb_cts04 {background:#ebeb36 url(http://file3.willbes.net/new_gosi/2018/07/EV180718_c2_bg.jpg) repeat-x center top}
        .bannerImg3 {position:relative; width:980px; margin:0 auto; background:#ebeb36; padding-bottom:100px}
        .bannerImg3 p {position:absolute; top:45%; width:30px; z-index:90;}
        .bannerImg3 img {width:100%}
        .bannerImg3 p a {cursor:pointer}
        .bannerImg3 p.leftBtn3 {left:5%}
        .bannerImg3 p.rightBtn3 {right:5%}
        .wb_cts04 ul:after {content:""; display:block; clear:both}

        .wb_cts05 {background:#fff}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:261px;
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
                <!-- a href="javascript:alert('마감되었습니다.');" /-->
                <a href="#event">
                    <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c12.png" alt="윌비스 문병일 사회" >
                </a>
            </div>
        </div>

        <div class="evtCtnsBox wb_top" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11.png" alt="사회, 만점으로 가는 매직로드 문병일 사회 " usemap="#Map20180719_c1" border="0"  />
            <map name="Map20180719_c1" >
                <area shape="rect" coords="819,1068,1043,1171" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800122" target="_blank" onfocus="this.blur();" />
            </map>
        </div><!--WB_top//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c2.jpg" alt="윌비스 문병일 사회 더 강하고 새로워진 압축 커리큘럼으로 진화했습니다."/><br>
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c9.jpg" alt="윌비스 문병일 사회 더 강하고 새로워진 압축 커리큘럼으로 진화했습니다."/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11_1.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11_2.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11_3.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11_4.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c11_5.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow01_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow01_2.png"></a></p>
            </div>
        </div><!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts00" >
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c4.jpg" alt="윌비스 문병일 효율적 경제 학습, 고득점 사회 완성!"  ></li>
                <li>
                    <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c5_1.gif" alt="" style="padding-right:10px;">
                    <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c5_2.gif" alt=""></li>
                <li>
                    <iframe src="https://www.youtube.com/embed/iku-4RrvuDE?rel=0" frameborder="0" allowfullscreen></iframe>
                </li>
            </ul>
        </div><!--WB_cts00//-->

        <div class="evtCtnsBox wb_cts03" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c7.jpg" alt="윌비스 문병일 사회, 만점으로 가는 매직로드" usemap="#Map180719_c2" border="0" />
            <map name="Map180719_c2" >
                <area shape="rect" coords="723,773,971,913" href="http://www.willbesgosi.net/packagelecture/packagelectureDetail.html?currentPage=1&pageRow=9999&topMenu=001&topMenuName=&topMenuType=O&searchCategoryCode=001&leftMenuLType=M0001&lecKType=P&searchLeccode=P201800122" onfocus="this.blur();" target="_blank" />
            </map>
        </div><!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts05">
            <img src="http://file3.willbes.net/new_gosi/2018/07/EV180718_c8.jpg" alt="영어 김영교수 선행반 수강신청 바로가기 " />
        </div><!--wb_cts05//-->

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:5000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
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