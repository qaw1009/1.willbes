@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px}

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/03/2155_top_bg.jpg) no-repeat center top;}
        .wb_cts01 {background:url(https://static.willbes.net/public/images/promotion/2021/03/2155_01_bg.jpg) no-repeat center top;}
        .wb_cts02 {background:#fff url(https://static.willbes.net/public/images/promotion/2021/03/2155_02_bg.jpg) no-repeat center top; padding-bottom:100px}
        .wb_cts03 {background:#86AF77 url(https://static.willbes.net/public/images/promotion/2021/03/2155_03_bg.jpg) no-repeat center top; padding:317px 0 100px}
        .wb_cts04 {background:#ecebeb;padding-bottom:100px}
        .wb_cts04 .wb_cts04_box, 
        .wb_cts05 > div {position:relative; width:1120px; margin:0 auto}

        /* 슬라이드배너 */
        .slide_con {position:relative; width:980px; margin:0 auto}
        .slide_con p {position:absolute; top:50%; width:56px; height:56px; margin-top:-28px; z-index:100}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:-24px}
        .slide_con p.rightBtn {right:-24px}
        #slidesImg3 li {display:inline; float:left}
        #slidesImg3 li img {width:100%}
        #slidesImg3:after {content::""; display:block; clear:both}
        #slidesImg4 li {display:inline; float:left}
        #slidesImg4 li img {width:100%}
        #slidesImg4:after {content::""; display:block; clear:both} 
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox wb_top"  id="main">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2155_top.jpg"  alt="적중 " />
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2155_01.jpg"  alt="한국사정복 " />
        </div>

        <div class="evtCtnsBox wb_cts02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2155_02.jpg"  alt="고득점 전략가" />
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_03.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_04.jpg" alt="" /></li>
					<li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_03_09.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_prev.png" alt="left" /></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_next.png" alt="right" /></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03" >
            <iframe width="854" height="480" src="https://www.youtube.com/embed/g9oTdL283l4?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="evtCtnsBox wb_cts04" >
            <div class="wb_cts04_box">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04.jpg" alt="적중사례" />
                <a href="javascript:alert('준비중입니다. 먼저 밑에 슬라이드를 참고해 주세요.')" title="" style="position: absolute; left: 31.34%; top: 80%; width: 37.23%; height: 8.37%; z-index: 2;"></a>
            </div>
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_01.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_02.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_03.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_04.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_05.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_06.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_07.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_08.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_09.jpg" alt="" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_04_10.jpg" alt="" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_prev.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/03/2155_p_next.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts05" >
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2155_05.jpg"  alt="커리큘럼 & 강의신청" />
                <a href="https://police.willbes.net/professor/show/cate/3001/prof-idx/50131?subject_idx=1002&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" title="" style="position: absolute; left: 22.5%; top: 83.35%; width: 24.73%; height: 4.14%; z-index: 2;"></a>
                <a href="https://police.willbes.net/pass/professor/show/prof-idx/50132/?cate_code=3010&subject_idx=1055&subject_name=%ED%95%9C%EA%B5%AD%EC%82%AC" target="_blank" title="" style="position: absolute; left: 53.04%; top: 83.35%; width: 24.73%; height: 4.14%; z-index: 2;"></a>
            </div> 
        </div>

    </div>
    <!-- End Container -->

    <script language="javascript">
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
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

        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal',
                auto:true,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
                slideWidth:2000,
                slideMargin:0,
                autoHover: true,
                moveSlides:1,
                pager:false,
            });

            $("#imgBannerLeft4").click(function (){
                slidesImg4.goToPrevSlide();
            });

            $("#imgBannerRight4").click(function (){
                slidesImg4.goToNextSlide();
            });
            
        });
    </script>

@stop