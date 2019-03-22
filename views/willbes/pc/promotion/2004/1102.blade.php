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


        /*2018-07-31 상단변경*/
        .layer {width:100%; height:800px; -ms-overflow:hidden;}
        .video {width:100%; height:800px; overflow:hidden; position:relative; opacity:0.4; box-shadow:0px rgba(0,0,0,0.4); background:#000}
        .pngimg	 {width:1210px; margin:0 auto; position:relative; top:-800px;}
        .pngimg-real {width:1210px; height:0px; position:absolute;top:0;}
        .wb_mp4 {width:100%; text-align:center; margin:0 auto; background:#000; min-width:1210px;}
        .wb_mp4 ul {width:100%; margin:0 auto; min-width:1210px;}

        /* 상단탭 */
        .wb_top {background:#ddd;}
        .tab_box {position:relative; width:1210px; height:110px; display:block; margin:0 auto; }
        .tab_menu {position:absolute; width:1210px; height:110px; top:0px; text-align:center;}
        .tab_menu li {display:inline; float:left;}
        .tab_menu li a img.off {display:block}
        .tab_menu li a img.on {display:none}

        .wb_cts02 {background:#2b2a28 url(http://file.willbes.net/new_image/2016/08/EV160812_p1_bg.jpg) center 0 no-repeat;}
        .wb_cts03 {background:#b2a089 url(http://file.willbes.net/new_image/2016/08/EV160812_p2_bg.jpg) center 0 no-repeat;}
        .wb_cts04 {background:url(http://file.willbes.net/new_image/2016/08/EV160812_p3_bg.jpg) repeat;}
        .wb_cts05 {background:url(http://file.willbes.net/new_image/2016/08/EV160812_p3_bg.jpg) repeat;}
        .bannerImg3 {position:relative; width:100%; max-width:980px; margin:0 auto; background:url(http://file.willbes.net/new_image/2016/08/EV160812_p4_bg.jpg) no-repeat}
        .bannerImg3 p {position:absolute; top:50%; width:51px; z-index:50}
        .bannerImg3 img {width:100%}
        .bannerImg3 p a {cursor:pointer}
        .bannerImg3 p.leftBtn3 {left:1%}
        .bannerImg3 p.rightBtn3 {right:1%}
        .wb_cts06 {width:100%;min-width:1210px;  text-align:center; background:#464646;}
        .wb_cts07 {width:100%;min-width:1210px;  text-align:center; background:#fafafa; padding-bottom:50px;}

        .skybanner {
            position:absolute;
            top:20px;
            right:10px;
            z-index:1;
        }
        .skybanner_sectionFixed {position:fixed; top:20px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner" >
            <img src="http://file3.willbes.net/new_gosi/2018/08/EV180807_sky.png" alt="#" usemap="#Map_sky_go" border="0" />
            <map name="Map_sky_go">
                <area shape="rect" coords="10,18,90,65" href="{{ site_url('/pass/promotion/index/cate/3043/code/1100') }}" alt="자습형">
                <area shape="rect" coords="9,93,91,144" href="{{ site_url('/pass/promotion/index/cate/3043/code/1101') }}" target="_blank" alt="기숙형">
                <area shape="rect" coords="7,165,92,222" href="{{ site_url('/pass/promotion/index/cate/3043/code/1102') }}" target="_blank" alt="영어집중형">
            </map>
        </div>

        <div class="evtCtnsBox wb_mp4" id="main">
            <div class="layer">
                <div class="video">
                    <video style="width:100%;" autoplay loop muted="">
                        <source src="http://file3.willbes.net/new_gosi/2018/07/180629.mp4" type="video/mp4"></source>
                    </video>
                </div>
                <div class="pngimg">
                    <div class="pngimg-real">
                        <img src="http://file3.willbes.net/new_gosi/2018/07/EV180731_t.png" alt="윌비스 관리반" />
                    </div>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_top">
            <div class="tab_box">
                <div class="tab_menu">
                    <ul>
                        <li><a href="{{ site_url('/pass/promotion/index/cate/3043/code/1100') }}"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab1.png'" border="0"/></a></li>
                        <li><a href="{{ site_url('/pass/promotion/index/cate/3043/code/1101') }}"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab2.png'" border="0"/></a></li>
                        <li><a href="{{ site_url('/pass/promotion/index/cate/3043/code/1102') }}"><img src="http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3_on.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/08/EV180806_t_tab3.png'" border="0"/></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts02" id="ksj_top">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p1.png" alt="2017 김신주 영어집중관리반" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p2.png" alt="학원 및 동영상 강의 일정안내" />
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p3.png" alt="1,2,3" />
        </div>

        <div class="evtCtnsBox wb_cts05" style="padding-bottom:100px;">
            <div>
                <div class="bannerImg3">
                    <ul id="slidesImg3">
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_1.png" alt="1"/></li>
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_2.png" alt="2"/></li>
                        <li><img src="http://file.willbes.net/new_image/2016/08/EV160812_p4_3.png" alt="3"/></li>
                    </ul>
                    <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file.willbes.net/new_image/2016/08/EV160812_btn01_1.png"></a></p>
                    <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file.willbes.net/new_image/2016/08/EV160812_btn01_2.png"></a></p>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts06">
            <img src="http://file.willbes.net/new_image/2016/08/EV160812_p5.png" alt="리얼적중스토리" />
        </div>

        <div class="evtCtnsBox wb_cts07">
            <p><img src="http://file.willbes.net/new_image/2016/08/EV160812_p6_1.png" alt="혜택" /></p>
            <p id="lec_send"><img src="http://file.willbes.net/new_image/2016/08/EV160812_p6_3_1.png" alt="수강신청" usemap="#map2" />
                <map name="map2" id="lecture">
                    <area shape="rect" coords="273,61,710,142" href="{{ site_url('#none') }}" onfocus="this.blur();"/>
                </map>
            </p>
        </div>

    </div>
    <!-- End Container -->


    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:4000,
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

    <script src="/public/js/willbes/jquery.nav.js"></script>
    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
            /*e.preventDefault(); */
        });



    </script>
@stop