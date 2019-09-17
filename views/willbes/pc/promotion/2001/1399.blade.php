@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1399_top_bg.jpg) no-repeat center top}
        .wb_cts01 div { position:absolute; top:1000px; left:50%; margin-left:-528px; width:1056px; z-index:10}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1399_01_bg.jpg) no-repeat center top}
        .bannerImg3 {position:absolute; bottom:150px; width:966px; left:50%; margin-left:-483px; z-index:10}
        .wb_cts02 ul {width:100%; margin:0 auto}        
        .wb_cts02 ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff;}
        .wb_cts04 {background:#e9e8e8;}
        .wb_cts05 {background:url(https://static.willbes.net/public/images/promotion/2019/03/1023_04_bg.jpg) no-repeat center top}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_top.jpg" title="적중은 역시 신광은입니다."  />
            <div><iframe width="1056" height="572" src="https://www.youtube.com/embed/kRuYnE7XYv8" frameborder="0" allowfullscreen></iframe></div>
        </div><!--wb_cts01//-->

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_01.jpg" title="기적이 아닌, 당연한 결과입니다."/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1399_01_01.jpg" title="지난 시험대비 45점 상승!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1399_01_02.jpg" title="교수님 말씀이 다 맞아요!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/09/1399_01_03.jpg" title="기출, 그것이 신의 한수!"/></li>
                </ul>
            </div>
        </div><!--wb_cts02//-->

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_02_top.jpg" usemap="#Map1399A" title="빈틈없는 적중을 직접 확인하세요!" border="0" /><br>
            <map name="Map1399A" id="Map1399A">
                <area shape="rect" coords="424,399,700,461" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=238305&amp;" target="_blank" alt="적중사례 더보기" title="더 많은 적중사례 보러가기" />
            </map>
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_02.jpg" title="완벽적중" />
        </div><!--wb_cts03//-->
    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                auto:true,
                speed:750,
                pause:5000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:966,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
            });

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });
    </script>


@stop