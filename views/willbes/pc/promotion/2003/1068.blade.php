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

        .wb_top {background:#ae9889 url(http://file3.willbes.net/new_gosi/2018/10/EV181030_c1_bg.jpg) no-repeat center top; position:relative;  }


        .wb_cts01 {background:#fff url(http://file3.willbes.net/new_gosi/2018/10/EV181030_c2_bg.jpg) center bottom no-repeat;   }
        .bannerImg3 {position:relative; width:920px; margin:0 auto; padding:10px 0px 124px 0px; }
        .bannerImg3 p {position:absolute; top:35%; width:30px; z-index:1000;}
        .bannerImg3 img {width:100%}
        .bannerImg3 p a {cursor:pointer}
        .bannerImg3 p.leftBtn3 {left:2%}
        .bannerImg3 p.rightBtn3 {right:2%}
        .wb_cts01 ul:after {content:""; display:block; clear:both}

        .wb_cts02 {background:#4c52b4;}
        .wb_cts03 {background:#fff}
        .wb_cts04 {background:#f4f4f4;}
        .wb_cts04 ul {width:100%; margin:0 auto;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c1.png" alt=" 윌비스 농업직 절대지존 장사원교수 " usemap="#Map20181030_c1" border="0"  />
            <map name="Map20181030_c1" >
                <area shape="rect" coords="677,909,838,1016" href="#event" onfocus="this.blur();"/>
            </map>
        </div>
        <!--WB_top//-->

        <div class="evtCtnsBox wb_cts01" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c2.png" alt=""/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c2_Roll1.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c2_Roll2.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c2_Roll3.jpg" alt=""/></li>
                    <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c2_Roll4.jpg" alt=""/></li>
                </ul>
                <p class="leftBtn3"><a id="imgBannerLeft3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow03_1.png"></a></p>
                <p class="rightBtn3"><a id="imgBannerRight3"><img src="http://file3.willbes.net/new_gosi/com_img/arrow03_2.png"></a></p>
            </div>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c3.jpg" alt="윌비스 농업직 4관왕! 농업 전공자가 직접 출제한다 " />
        </div>
        <!--wb_cts02//-->


        <div class="evtCtnsBox wb_cts03" >
            <ul>
                <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c4.jpg" alt="윌비스 농업직렬 4관왕의 노하우가 집약된 2019 대비 윌비스 학원 강좌"  /></li>
                <li><iframe width="886" height="497" src="https://www.youtube.com/embed/eWPUNzh9zu8?rel=0" frameborder="0" allowfullscreen></iframe></li>
                <li><img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c5.jpg" alt=" "  /></li>
            </ul>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" id="event">
            <img src="http://file3.willbes.net/new_gosi/2018/10/EV181030_c6.jpg" alt="윌비스 2019 농업직/농촌지도사 이론패키지" usemap="#Map20181030_c2" border="0"  />
            <map name="Map20181030_c2" >
                <area shape="rect" coords="97,943,305,1010" href="{{ site_url('/Package/show/cate/3028/pack/648001/prod-code/150615') }}"  onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="361,947,574,1009" href="{{ site_url('/Package/show/cate/3028/pack/648001/prod-code/150634') }}" onfocus="this.blur();" target="_blank"/>
                <area shape="rect" coords="629,947,849,1018" href="{{ site_url('/Package/show/cate/3028/pack/648001/prod-code/150633') }}" onfocus="this.blur();" target="_blank" />
                <area shape="rect" coords="892,942,1114,1011" href="{{ site_url('/package/show/cate/3028/pack/648001/prod-code/150635) }}" onfocus="this.blur();" target="_blank"/>
            </map>
        </div>
        <!--wb_cts04//-->

    </div>
    <!-- End Container -->

    <script>
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
                slideWidth:920,
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

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });
    </script>
@stop