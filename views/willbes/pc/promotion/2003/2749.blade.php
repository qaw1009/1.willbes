@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evt_top {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2022/08/2749_top_bg.jpg) no-repeat center top;}        
        .evt_01 {background:#353439 url(https://static.willbes.net/public/images/promotion/2022/08/2749_01_bg.jpg) no-repeat center top; position:relative}
        .ev_winner {position:absolute; width:823px; height:380px; top:1110px; left:50%; margin-left:-412px; z-index:10; overflow:hidden;}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        .evt_02 {background:#dbdbdb;padding-bottom:150px}
        .evt_02 > div {width:1120px; margin:0 auto;}
        .evt_02 > div a {display:inline-block; text-align:center; font-size:30px; background:#fd0001; color:#fff; margin:0 20px; height:85px; line-height:85px; padding:0 40px}
        .evt_02 > div a:last-child {background:#4949cd;}
        .evt_02 > div a:hover{background:#000}
     

    </style>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2749_top.jpg" alt="법원팀 139명 최종합격"/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2749_01.jpg" alt="법원팀 139명 최종합격"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li class="mb10"><img src="https://static.willbes.net/public/images/promotion/2022/08/2749_01_txt.png"/></li>					
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/08/2749_02.jpg" />
            <div class="NSK-Black">
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2701" target="_blank">학원 종합반 바로가기 ></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2696" target="_blank">온라인 패스 바로가기 ></a>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">   
        $(function() {
            //Count the number of li elements
            var bx_num01 = $("#slider1 li").length;
            var ticker01 = $('#slider1').bxSlider({
                minSlides: 0,
                maxSlides: 100,
                slideWidth: 980,
                slideMargin: 0,
                ticker: true,
                mode: 'vertical',
                tickerHover: true,
                speed:50000*bx_num01
            });
        });
    </script>

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>
@stop