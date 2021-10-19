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
       
        .evt00 {background:#0a0a0a}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2393_top_bg.jpg) no-repeat center top;}

        .evt01 {}


        .evt02 {background:#3b3d41}

        .evtCtnsBox .slide_con {width:554px; margin:0 auto; text-align:center; position:relative;}
        .evtCtnsBox .slide_con p {position:absolute; top:45%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evtCtnsBox .slide_con p.leftBtn {left:-60px}
        .evtCtnsBox .slide_con p.rightBtn {right:-60px}


        .evt03 {background:#e7e4dd; padding-top:100px}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">      

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1864_first.jpg"  alt="경찰학원부분 1위" />
        </div>

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_top.jpg" alt="신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_01.jpg" alt="2022년 경찰시험 개편"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02.jpg" alt="혜택" />
            <div class="slide_con">
                <div id="slidesImg">
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_01.png" alt="1" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_02.png" alt="2" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_03.png" alt="3" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_04.png" alt="4" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_05.png" alt="5" /></div>
                    <div><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_02_06.png" alt="6" /></div>
                </div>
                <p class="leftBtn"><a id="imgBannerLeft"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_arrL.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight"><img src="https://static.willbes.net/public/images/promotion/2021/10/2393_arrR.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div>
                <a href="#tab01">10개월<br>슈퍼PASS</a>
                <a href="#tab02">4개월<br>슈퍼PASS</a>
                <a href="#tab03">심화기술<br>패키지</a>
                <a href="#tab04">기본이론<br>종합반</a>
            </div>      
            <div class="wrap">
                <div id="tab01">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_01.jpg" alt="10개월 슈퍼패스" />
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="" style="position: absolute; left: 29.2%; top: 20.83%; width: 41.61%; height: 5.64%; z-index: 2;"></a>
                </div>
                <div id="tab02">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_02.jpg" alt="4개월 슈퍼패스" />
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="" style="position: absolute; left: 29.2%; top: 20.83%; width: 41.61%; height: 5.64%; z-index: 2;"></a>
                </div>
                <div id="tab03">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_03.jpg" alt="심화기술 패키지" />
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="" style="position: absolute; left: 29.2%; top: 20.83%; width: 41.61%; height: 5.64%; z-index: 2;"></a>
                </div>
                <div id="tab04">
                    <img src="https://static.willbes.net/public/images/promotion/2021/10/2393_03_04.jpg" alt="기본이론 종합반" />
                    <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="" style="position: absolute; left: 29.2%; top: 20.83%; width: 41.61%; height: 5.64%; z-index: 2;"></a>
                </div>
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
            var slidesImg = $("#slidesImg").bxSlider({
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

            $("#imgBannerLeft").click(function (){
                slidesImg.goToPrevSlide();
            });

            $("#imgBannerRight").click(function (){
                slidesImg.goToNextSlide();
            });
        });       
      
    </script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')

@stop