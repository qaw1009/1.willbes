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

        .wb_cts01 {background:#26347d url(https://static.willbes.net/public/images/promotion/2019/04/1066_top_bg.png) center top no-repeat}
        .wb_cts02 {background:#f8f8f8}
        .wb_cts03 {background:#333b95 url(https://static.willbes.net/public/images/promotion/2019/04/1066_02_bg.png) center top repeat-y}
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
                <img src="https://static.willbes.net/public/images/promotion/2019/05/1067_skybanner.png" title="첨삭지도반" title="환승이벤트" >
            </a>
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01.png" title="" />
            <div class="bannerImg1">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt1.png" title="1"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt2.png" title="2"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_top_txt3.png" title="3"/></li>
                </ul>
                <p class="left_arr"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01_arr_l.png"></a></p>
                <p class="right_arr"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2019/04/1066_01_arr_r.png"></a></p>
            </div>
        </div>
        <!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02"  id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_02.png" title="갓덕현 2019대비신규강좌" usemap="#Map1066A" border="0">
            <map name="Map1066A" id="Map1066A">
                <area shape="rect" coords="798,508,1049,569" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154891" target="_blank" alt="심화문법 홀수편">
                <area shape="rect" coords="799,687,1044,751" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154897" target="_blank" alt="실전문법464">
                <area shape="rect" coords="799,603,1045,660" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154894" target="_blank" alt="제니스독해">
                <area shape="rect" coords="797,777,1046,839" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154900" target="_blank" alt="첨삭독해">
                <area shape="rect" coords="797,866,1042,929" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154901" target="_blank" alt="첨삭독해">
                <area shape="rect" coords="799,958,1046,1019" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/154902" target="_blank" alt="생활영어">
            </map>
        </div>
        <!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" id="live">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_03.png" title="" usemap="#Map_180412_lecplay"  border="0" />
            <map name="Map_180412_lecplay">
                <area shape="rect" coords="896,690,1141,802" href="https://www.youtube.com/channel/UCPmdjTx3UUKCFt40KtRRdUQ" target="_blank" title="한덕현 유튜브">
                <area shape="rect" coords="628,689,875,802" href="http://play.afreecatv.com/DHLAWRENCE31" target="_blank" title="한덕현 아프리카TV">
            </map>
        </div>
        <!--wb_cts03//-->

        <div class="evtCtnsBox wb_cts04" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_04.png" title="제니스영어 커리큘럼" />
        </div>
        <!--wb_cts04//-->

        <div class="evtCtnsBox wb_cts06" >
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1066_05.png" title="학습비법패키지수강신청" usemap="#Map1066B" border="0" />
            <map name="Map1066B" id="Map1066B">
			  <area shape="rect" coords="925,666,1100,706" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/147104" target="_blank" alt="파이널" title="05.지방직" />
			  <area shape="rect" coords="715,665,892,712" href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/152604" target="_blank" alt="실전실력다지기" title="04.실전실력다지기" />
			  <area shape="rect" coords="507,664,676,711" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150362" target="_blank" alt="문제해결스킬업" title="03.문제해결스킬업" />
			  <area shape="rect" coords="291,661,467,712" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150363" target="_blank" alt="심화실전예비" title="02.심화,실전예비" />
			  <area shape="rect" coords="87,661,258,711" href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/150364" target="_blank" alt="기본이론" title="01.기본이론" />
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