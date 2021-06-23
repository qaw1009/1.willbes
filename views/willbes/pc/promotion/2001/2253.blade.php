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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtContent span {vertical-align:auto}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        .evtCtnsBox .wrap a:hover {box-shadow:0 0 10px rgba(0,0,0,.5);}

        /************************************************************/

        .evt00 {background:#0a0a0a}

        .sky {position:fixed; top:225px;right:10px; width:120px; z-index:2;}
        .sky a{display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/06/2253_top_bg.jpg) no-repeat center top;position:relative;}

        .evt01 {}

        .evt02 {background:#00c0c7;}
        .evt03 {background:#f1f1f1;}

        .slide_con {width:1120px; margin:0 auto; position:relative}
        .slide_con p {position:absolute; top:50%; margin-top:-45px; width:39px; height:97px; z-index:90}
        .slide_con p a {cursor:pointer}
        .slide_con p.leftBtn {left:0px;}
        .slide_con p.rightBtn {right:0px;}         
   
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>   

        <div class="sky">
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/2236" target="_blank"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_sky01.jpg" alt="이국령 헌법" >
            </a>  
            <a href="#evt04"> 
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_sky02.jpg" alt="신규강좌" >                
            </a> 
        </div>   

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_top.jpg"  alt="이국령 헌법 기본서 무료증정"/>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_top.jpg"  alt="이국령 헌법 미리보기"/>
            <div class="slide_con">
                <ul id="slidesImg4">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_01.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_01.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_01.jpg" /></li>     
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_04.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_05.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_06.jpg" /></li>     
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_07.jpg" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_08.jpg" /></li>  
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_09.jpg" /></li>     
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft4"><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_aL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight4"><img src="https://static.willbes.net/public/images/promotion/2021/06/2253_aR.png"></a></p>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_01_bottom.jpg"  alt="경찰헌법 이국령"/>
                <a href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/183130" target="_blank" style="position: absolute; left: 24.82%; top: 66.43%; width: 49.91%; height: 15.86%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02">  
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_02.jpg"  alt="박수친 이유"/>
                <a href="https://www.willbes.net/classroom/on/list/ongoing" target="_blank" title="수강후기 작성" style="position: absolute; left: 32.95%; top: 39.56%; width: 33.66%; height: 5.36%; z-index: 2;"></a>
            </div>    
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_03.jpg"  alt="학습가이드"/>
        </div>

        <div class="evtCtnsBox evt04" id="evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2253_04.jpg"  alt="학습가이드"/>
        </div>
    </div>
    <!-- End Container -->


    <script>
        /*슬라이드*/
        $(document).ready(function() {
            var slidesImg4 = $("#slidesImg4").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:false,
                speed:350,
                pause:4000,
                pager:true,
                controls:false,
                minSlides:1,
                maxSlides:1,
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
      
{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop   