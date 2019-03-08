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
        .evtCtnsBox {width:100%; text-align:center; min-width:980px;}

        /************************************************************/

        /* 컨텐츠 */
        .wb_top {height:750px; background:#00b174 url(http://file3.willbes.net/new_gosi/2018/06/EV180607_1_1_bg.png) center top  no-repeat}
        .top_txt {display:none !important position:relative;min-width:980px;}
        .top_txt img {vertical-align:top}
        .top_txt .cont_t {position:relative;  background:#461b1b url(http://file3.willbes.net/new_gosi/2018/06/EV180607_1_1.png) 50% 0 repeat-x;overflow:hidden}
        .top_txt .inner {position:relative;width:980px;margin:0 auto}

        /* 상단탭 */
        .tab_menu {width:980px; margin:0 auto}
        .tab_menu li {display:inline; float:left;}
        .tab_menu li a img.off {display:block}
        .tab_menu li a img.on {display:none}
        .tabContaier a img.on {display:none}
        .wb_cts01 {background:#00b174;}
        .wb_cts02 {background:#00b174;}
        .wb_cts03 {background:#00b174; padding-bottom:80px;}
        .wb_cts04 {background:#272727; padding-bottom:140px;}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; background:#eaeff5; width:980px; margin:0 auto; padding:0 65px; padding-top:10px; padding-bottom:50px; text-align:center}
        .bannerImg1 p {position:absolute; top:180px; width:50px; z-index:90}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:0;  width:50px; height:50px;}
        .bannerImg1 p.right_arr {right:0;width:50px; height:50px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_1_1.png" alt="" />
            <ul class="tab_menu">
                <li><a href="http://daegu.willbes.net/event/movie/event.html?event_cd=off_180611_01_g&EventReply=Y&topMenuType=F&topMenuGnb=FM_001"><img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_t1_on.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t1_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t1.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t1.png'" border="0"/></a></li>
                <li><a href="http://daegu.willbes.net/event/movie/event.html?event_cd=off_180611_02_g&EventReply=Y&topMenuType=F&topMenuGnb=FM_001"><img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_t2.png"  onmouseover="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t2_on.png'" onMouseOut="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t2.png'" onMouseDown="this.src='http://file3.willbes.net/new_gosi/2018/06/EV180607_t2.png'" border="0"/></a></li>
            </ul>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_1_title.png" alt="#" />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_1_2.png" alt="#" />
        </div>

        <div class="evtCtnsBox wb_cts03">
            <img src="http://file3.willbes.net/new_gosi/2018/06/180607_t_txt.png" alt="" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/06/180607_s1.png" alt="1"/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/06/180607_s2.png" alt="2"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="http://file3.willbes.net/new_gosi/2018/06/EV_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="http://file3.willbes.net/new_gosi/2018/06/EV_arr_r.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts04">
            <img src="http://file3.willbes.net/new_gosi/2018/06/EV180607_bot.png"alt="#" />
        </div>

    </div>
    <!-- End Container -->

    <script>
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                mode:'fade',
                auto:true,
                speed:350,
                pause:3000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:850,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false
            });

            $("#imgBannerLeft").click(function (){
                slidesImg1.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg1.goToNextSlide();
            });
        });
    </script>

    <script>
        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 1000);
        });
    </script>
@stop