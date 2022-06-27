@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/02/2093_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#eedad6;padding-bottom:100px;}

        .evt02 {background:#d4edff;}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:930px; margin:0 auto}	
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-5%; top:50%; width:67px; height:67px;}
        .slide_con p.rightBtn {right:-7%;top:50%; width:67px; height:67px;}

        .evt03 {background:#fff;}

    </style>

    <div class="evtContent NSK mb100">      
        <div class="evtCtnsBox evtTop">
            <div class="wrap">            
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2093_top.jpg" title="W 플래너">
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2701" target="_blank" alt="오프라인 종합반" style="position: absolute;left: 17.61%;top: 82.01%;width: 31.01%;height: 5.25%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2696" target="_blank" alt="온라인 패스" style="position: absolute;left: 51.51%;top: 82.01%;width: 31.01%;height: 5.25%;z-index: 2;"></a>
            </div>            
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01.jpg" title="속지 미리보기">
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_1.png" alt="w플래너 작성 및 활용법" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_2.png" alt="순환별 학습계획" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_3.png" alt="월간일정" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_4.png" alt="주간일과표 및 수강확인" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_5.png" alt="모의고사 점수표" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_6.png" alt="회독계획" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_7.png" alt="실전모의고사 점수표" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/02/2093_01_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/02/2093_02.jpg" title="W 플래너 연계 학습관리">
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2701" target="_blank" alt="오프라인 종합반" style="position: absolute;left: 13.21%;top: 81.01%;width: 31.01%;height: 4.25%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2696" target="_blank" alt="온라인 패스" style="position: absolute;left: 56.01%;top: 81.01%;width: 31.01%;height: 4.25%;z-index: 2;"></a>
            </div>           
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/2093_03.jpg" title="프로모션 안내 및 유의사항">       
        </div>

	</div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
                speed:350,
                pause:4000,
                pager:false,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:1120,
                slideMargin:0,
                autoHover: true,
                moveSlides:1
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