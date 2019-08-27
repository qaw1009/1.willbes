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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_top {background:#222 url(https://static.willbes.net/public/images/promotion/2019/08/1053_top_bg.png) no-repeat center top}
        .wb_cts01 {background:#191919;}
        .wb_cts02 {background:#eee;}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; background:#eee; width:810px; margin:0 auto; z-index:50;}
        .bannerImg1 p {position:absolute; top:200px; width:50px; z-index:1000}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:-10%;  width:50px; height:50px;}
        .bannerImg1 p.right_arr {right:-10%; width:50px; height:50px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_top.png"alt="경찰통합생활관리반">
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_01_1.png"alt="최적의학습환경"/>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_01_2.png"alt="막강한할인혜택3가지" usemap="#Map_lec_go" border="0"/>
            <map name="Map_lec_go">
                <area shape="rect" coords="172,583,951,678" href="https://police.willbes.net/pass/promotion/index/code/1051" target="_blank" alt="관리반보러가기">
                <area shape="rect" coords="177,1105,956,1200" href="https://police.willbes.net/pass/promotion/index/code/1128" target="_blank" alt="체력학원보러가기">
            </map>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_1.png" alt="기숙사시설확인" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s1.png" alt="3"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s2.png" alt="4"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s3.png" alt="5"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s4.png" alt="6"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s5.png" alt="7"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_s6.png" alt="8"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/08/1053_arr_r.png"></a></p>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_02_bottom.png" alt="" />
        </div>

        <div class="evtCtnsBox wb_cts01 pt100">
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1053_03_2.png" alt="" />
        </div>
    </div>
    <!-- End Container -->

    <script language="javascript">
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
@stop