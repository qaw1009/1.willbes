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

        .wb_cts01 {background:#26347d url(https://static.willbes.net/public/images/promotion/2019/04/1066_top_bg.png) center top  no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#333b95 url(https://static.willbes.net/public/images/promotion/2019/04/1066_02_bg.png) center top  repeat-y}
        .wb_cts04 {background:#f8f8f8}
        .wb_cts05 {background:#f8f8f8}
        .wb_cts06 {background:#242424}

        /* 슬라이드배너 */
        .bannerImg1 {position:relative; width:1210px; margin:0 auto;}
        .bannerImg1 p {position:absolute; top:150px; width:65px; z-index:100}
        .bannerImg1 img {width:100%;}
        .bannerImg1 p a {cursor:pointer}
        .bannerImg1 p.left_arr {left:2%; width:65px; height:65px;}
        .bannerImg1 p.right_arr {right:48%; width:65px; height:65px;}

        .skybanner {
            position:fixed;
            top:200px;
            right:0;
            width:290px;
        }
    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="skybanner">
            <a href="{{ site_url('/promotion/index/cate/3019/code/1067') }}" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_skybanner.png" alt="첨삭지도반" alt="환승이벤트" >
            </a>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01.png" alt="" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt1.png" alt="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt2.png" alt="2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt3.png" alt="3"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01_arr_r.png"></a></p>
            </div>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02"  id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_02.png" alt="갓덕현 2019대비신규강좌" usemap="#Map_lec_han" border="0">
            <map name="Map_lec_han">
			  <area shape="rect" coords="797,357,1053,412" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/152605" target="_blank" alt="서울시 문풀 패키지">
			  <area shape="rect" coords="798,508,1049,569" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/146969" target="_blank" alt="실전보카371">
			  <area shape="rect" coords="799,687,1044,751" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152651" target="_blank" alt="서울시아작내기">
			  <area shape="rect" coords="799,603,1045,660" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152649" target="_blank" alt="지방직아작내기">
			  <area shape="rect" coords="797,777,1046,839" href="https://pass.willbes.net/lecture/show/cate/3019/prod-code/146973" target="_blank" alt="지방직실전파이널모고">
			  <area shape="rect" coords="797,866,1042,929" href="https://pass.willbes.net/lecture/show/cate/3019/prod-code/146977" target="_blank" alt="서울시실전파이널모고">
			  <area shape="rect" coords="799,958,1046,1019" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152604" target="_blank" alt="새벽실전모고">
            </map>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_03.png" alt="" usemap="#Map_180412_lecplay"  border="0" />
            <map name="Map_180412_lecplay">
                <area shape="rect" coords="896,690,1141,802" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" alt="한덕현유튜브">
                <area shape="rect" coords="628,689,875,802" href="http://play.afreecatv.com/DHLAWRENCE31" target="_blank">
            </map>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="http://file3.willbes.net/new_gosi/2019/01/1066_04.png" alt="" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01.png" alt="학습비법패키지수강신청" usemap="#Map180412_lec2" border="0" />
            <map name="Map180412_lec2">
			  <area shape="rect" coords="925,666,1011,707" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152649" target="_blank" alt="05.지방직" />
			  <area shape="rect" coords="1016,667,1100,706" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152651" target="_blank"alt="05.서울시">
			  <area shape="rect" coords="715,665,892,712" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152604" target="_blank" alt="04.실전실력다지기" />
			  <area shape="rect" coords="507,664,676,711" href="https://pass.stage.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" alt="03.문제해결스킬업" />
			  <area shape="rect" coords="291,661,467,712" href="https://pass.stage.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" alt="02.심화,실전예비" />
			  <area shape="rect" coords="87,661,258,711" href="https://pass.stage.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" alt="01.기본이론" />
			</map>   
        </div>
        <!--wb_cts06//-->

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
                slideWidth:1210,
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