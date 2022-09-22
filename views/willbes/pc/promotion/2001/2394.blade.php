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
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:225px; width:199px; right:0; z-index:1;} 
        .sky a {display:block; margin-bottom:10px}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2349_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#3b3d41;}

        .evt03 {background:#e7e4dd}
        .evt03 .slide_con {width:600px; margin:0 auto; position:relative;}
        .evt03 .slide_con p {position:absolute; top:45%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt03 .slide_con p.leftBtn {left:-60px}
        .evt03 .slide_con p.rightBtn {right:-60px}
        .evt03 .slide_con li img {width:100%}   
}
    </style>
    
    <div class="evtContent NSK" id="evtContainer"> 
        <div class="sky" id="QuickMenu">               
            <a href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2349_sky.png" title="타학원 환승 인증">
            </a>
        </div>      

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2349_top.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2349_01.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2349_02.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">  
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_03_01.png" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_03_02.png" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_03_03.png" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_03_04.png" alt="4" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_arrL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/10/2349_arrR.png"></a></p>
            </div>
            <div class="wrap mt50">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2349_03.jpg" alt="혜택" />
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="회원가입" style="position:absolute; left:28.75%; top:19.73%; width:42.68%; height:5.47%; z-index: 2;"></a>   
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