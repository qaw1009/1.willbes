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
        .skybanner {
            position:fixed;
            top:280px;
            right:10px;
            z-index:1;
        }
        .skybanner li {margin-bottom:10px}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1399_top_bg.jpg) no-repeat center top}
        .wb_cts01 div { position:absolute; top:1000px; left:50%; margin-left:-528px; width:1056px; z-index:10}
        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1399_01_bg.jpg) no-repeat center top}
        .bannerImg3 {position:absolute; bottom:150px; width:966px; left:50%; margin-left:-483px; z-index:10}
        .wb_cts02 ul {width:100%; margin:0 auto}        
        .wb_cts02 ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff; width:1200px; margin:0 auto; padding-bottom:100px}
        .wb_cts03 ul {margin-bottom:30px}
        .wb_cts03 li {display:inline; float:left; width:50%}
        .wb_cts03 li a {display:block; text-align:center; font-size:24px; padding:24px 0; font-weight:bold; color:#888787; background:#f4f4f4; border:1px solid #e5e5e5; border-bottom:1px solid #fff; margin-right:10px}
        .wb_cts03 li a:hover,
        .wb_cts03 li a.active {color:#005eab; background:#fff; padding:20px 0; border:5px solid #005eab; border-bottom:5px solid #fff}
        .wb_cts03 ul:after {content:""; display:block; clear:both}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <ul class="skybanner">
            <li><a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=238305" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1399_sky01.png" /></a></li>
            <li><a href="https://police.willbes.net/support/notice/show?board_idx=239119" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/09/1399_sky02.png" /></a></li>
        </ul>

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
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_02_top_01.jpg" usemap="#Map1399A" title="빈틈없는 적중을 직접 확인하세요!" border="0" /><br>
            <map name="Map1399A" id="Map1399A">
                <area shape="rect" coords="146,410,545,473" href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=238305&amp;" target="_blank" alt="형사소송법 더보기" title="더 많은 적중사례 보러가기" />
                <area shape="rect" coords="573,411,975,476" href="https://police.willbes.net/support/notice/show?board_idx=239119&amp;" target="_blank" alt="수사 더보기" />
            </map>
            <ul class="tabs">   
                <li><a href="#tab01">형사소송법</a></li>
                <li><a href="#tab02">수사</a></li>
            </ul>
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_02_01.jpg" title="형소법 완벽적중" id="tab01"/>
            <img src="https://static.willbes.net/public/images/promotion/2019/09/1399_02_02.jpg" title="수사" id="tab02"/>
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

        /*tab*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');

                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide()});

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();

                    $active = $(this);
                    $content = $(this.hash);

                    $active.addClass('active');
                    $content.show();

                    e.preventDefault()})})}
        ) 
    </script>


@stop