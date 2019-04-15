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
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1199_top_bg.jpg) no-repeat center top;}
            .evtTopInmg {position:relative; width:1120px; margin:0 auto}
            .counter {position:absolute; text-align:center; width:100%; z-index:1; color:#fff; font-size:18px; top:30px; line-height:30px}
            .counter span {color:#fff200; font-size:30px; vertical-align: text-bottom}
        .evt01 {background:#363636}
        .evt02 {background:#5b554e;}
        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-80px; top:46%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-80px;top:46%; width:67px; height:67px;}
        .evt03 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="skyBanner">
            <a href="{{ site_url('/promotion/index/cate/3001/code/1187') }}" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1202_skybanner.png" title="필합 4개월 심화+문풀"></a>            
        </div>  

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">
                <div class="counter NSK-Black">적중&합격예측 서비스 이용 : <span>986,129</span>건</div>    
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1199_top.jpg" title="2019년 경찰 1차 적중&합격예측 사전예약 이벤트">
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1199_01.jpg" title="합격예측 사전예약 특전">
        </div>

        <div class="evtCtnsBox evt02">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide01.jpg" alt="신광은" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide02.jpg" alt="장정훈" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide03.jpg" alt="김원욱" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide04.jpg" alt="하승민" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide06.jpg" alt="원유철" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide05.jpg" alt="오태진" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_02_slide07.jpg" alt="김현정" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2019/04/1199_arrow_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1199_03.jpg" title="사전예약 이벤트">
        </div>

        {{--강사 이미티콘 홍보url댓글--}}
        @include('html.event_replyEmoticonUrl')
    </div>
	</div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            $('.counter span').counterUp({
                delay: 11, // the delay time in ms
                time: 1000 // the speed time in ms
            });
        });

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:980,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,

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