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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/   

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/09/2368_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#3b3d41}

        .evtCtnsBox .slide_con {width:554px; margin:0 auto; text-align:center; position:relative;}
        .evtCtnsBox .slide_con p {position:absolute; top:45%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evtCtnsBox .slide_con p.leftBtn {left:-60px}
        .evtCtnsBox .slide_con p.rightBtn {right:-60px}

        .evt03 {background:#e7e4dd; padding-top:100px}
        
    </style>
    
    <div class="evtContent NSK" id="evtContainer">    

        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2368_top.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt01">  
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2368_01.jpg" alt="2022년 경찰시험 개편" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2368_02.jpg" alt="혜택" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt03">            
            <div class="slide_con">
                <div id="slidesImg3">
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_03_01.png" alt="1" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_03_02.png" alt="2" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_03_03.png" alt="3" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_03_04.png" alt="4" /></div>
                </div>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_arrowL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/09/2368_arrowR.png"></a></p>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2368_03.jpg" alt="회원가입" />
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="회원가입" style="position: absolute; left: 29.2%; top: 20.83%; width: 41.61%; height: 5.64%; z-index: 2;"></a>
            </div>
        </div>

    </div>
    <!-- End evtContainer -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );


        /* 슬라이드 */
        $(document).ready(function() {
            var slidesImg3 = $("#slidesImg3").bxSlider({
                mode:'horizontal', //option : 'horizontal', 'vertical', 'fade'
                auto:true,
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

            $("#imgBannerLeft3").click(function (){
                slidesImg3.goToPrevSlide();
            });

            $("#imgBannerRight3").click(function (){
                slidesImg3.goToNextSlide();
            });
        });       
      
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop