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

        /************************************************************/
        
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/05/2222_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#1c57b3}
        .evt01 .slide_con {width:784px; margin:0 auto; position:relative;}
        .evt01 .slide_con p {position:absolute; top:45%; margin-top:-22px; width:44px !important; height:45px !important; z-index:10}
        .evt01 .slide_con p.leftBtn {left:-60px}
        .evt01 .slide_con p.rightBtn {right:-60px}
        .evt01 .slide_con li {display:inline; float:left}
        .evt01 .slide_con li img {width:100%}
        .evt01 .slide_con ul:after {content::""; display:block; clear:both}

        .evt02 {background:#1c57b3;height:400px;}
        .evtCtnsBox .btnRequest {width:600px; margin:0 auto;padding-top:100px;}
        .evtCtnsBox .btnRequest a {display:block;padding:20px; text-align:center; color:#fff; background:#000; font-size:30px}
        .evtCtnsBox .btnRequest a:hover {background:#ffff00; color:#11153a}


        .evt03 {background:#1c57b3}

    </style>
    
    <div class="evtContent NSK" id="evtContainer">  

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2222_top.jpg" alt="여름 신규가입 이벤트" />
        </div>

        <div class="evtCtnsBox evt01">  
            <div class="slide_con">
                <ul id="slidesImg3">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_01.jpg" alt="1" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_02.jpg" alt="2" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_03.jpg" alt="3" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_04.jpg" alt="4" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_05.jpg" alt="5" /></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_01_06.jpg" alt="6" /></li>
                </ul>
                <p class="leftBtn"><a id="imgBannerLeft3"><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_left.png"></a></p>
                <p class="rightBtn"><a id="imgBannerRight3"><img src="https://static.willbes.net/public/images/promotion/2021/05/2222_right.png"></a></p>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2222_02.jpg" alt="혜택" />
            <div class="btnRequest NSK-Black"><a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" alt="회원가입go">회원가입 GO ></a></div>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/05/2222_03.jpg" alt="특별한 다짐" />
        </div>

    </div>
    <!-- End evtContainer -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">   

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