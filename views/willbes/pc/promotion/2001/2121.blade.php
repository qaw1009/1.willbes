@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
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
        .skybanner a {margin-bottom:10px; display:block}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2121_top_bg.jpg) no-repeat center top}
        .wb_top div { position:absolute; top:1000px; left:50%; margin-left:-528px; width:1056px; z-index:10}

        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2019/09/1399_01_bg.jpg) no-repeat center top}
        .bannerImg3 {position:absolute; bottom:150px; width:966px; left:50%; margin-left:-483px; z-index:10}
        .wb_cts01 ul {width:100%; margin:0 auto}        
        .wb_cts01 ul:after {content:""; display:block; clear:both}

        .wb_cts03 {background:#fff; width:1200px; margin:0 auto;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        {{--
        <div class="skybanner">
            <a href="https://police.willbes.net/pass/support/notice/show?board_idx=280201" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/10/1854_skybanner.png" /></a>
        </div>
        --}}
        
        <div class="evtCtnsBox wb_top" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2121_top.jpg" title="적중은 역시 신광은입니다."  />
            <div><iframe width="1056" height="572" src="https://www.youtube.com/embed/eJ_3eHdCCh0?rel=0" frameborder="0" allowfullscreen></iframe></div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2121_01.jpg" title="기적이 아닌, 당연한 결과입니다."/>
            <div class="bannerImg3">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1854_01_01.jpg" title="지난 시험대비 45점 상승!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1854_01_02.jpg" title="교수님 말씀이 다 맞아요!"/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2020/10/1854_01_03.jpg" title="기출, 그것이 신의 한수!"/></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2121_02.jpg" usemap="#Map2121a" title="99% 적중" />
            <map name="Map2121a" id="Map2121a">
                <area shape="rect" coords="339,402,748,480" href="https://police.willbes.net/pass/support/notice/show?board_idx=325459&" target="_blank" title="더 많은 적중사례 보러가기" />
            </map>
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2121_03.jpg" title="완벽적중 문제" />
        </div>

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