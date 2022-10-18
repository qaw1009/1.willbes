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

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2798_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2798_01_bg.jpg) no-repeat center top;}

        .evt_02 {background:#FBFBFB}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2798_03_bg.jpg) no-repeat center top; position:relative}
        .ev_winner {position:absolute; width:742px; height:124px; top:1350px; left:50%; margin-left:-371px; z-index:10; overflow:hidden;}

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2798_top.jpg" alt="3~4순환 개강"/>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2798_01.jpg" alt="윌비스 검찰팀"/>
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2798_02.jpg" alt="집중풀이 과정"/>
        </div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2798_03.jpg" alt="최종합격률"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li class="mb10"><img src="https://static.willbes.net/public/images/promotion/2022/10/2798_name.png"/></li>					
                </ul>
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
                speed:5000*bx_num01
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