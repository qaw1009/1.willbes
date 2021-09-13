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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative;}
        /*.evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}*/

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2356_top_bg.jpg) no-repeat center top; height:1004px; position:relative}     
        .evt_top span {position:absolute; top:250px; margin-left:-420px}

        .evt_01 {position:relative}
        .ev_winner {position:absolute; width:596px; height:210px; top:1250px; left:50%; margin-left:-298px; z-index:10; overflow:hidden;}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        
        .evt_02 {background:#f4f4f4;}
        .evt_04 {background:#222 url(https://static.willbes.net/public/images/promotion/2021/09/2356_04_bg.jpg) no-repeat center top; position:relative;}
        .evt_07 {background:url(https://static.willbes.net/public/images/promotion/2021/09/2356_07_bg.jpg) no-repeat center top; position:relative;}    

    </style>
    
    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt_top">
            <span data-aos="fade-down">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_top_txt.png" alt="법원팀 팩트 체크"/>
            </span>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_01.jpg" alt="합격생 배출 1위"  data-aos="fade-right"/>
            <div class="ev_winner">
                <div id="slider1" class="bxslider">
                    <li class="mb10"><img src="https://static.willbes.net/public/images/promotion/2021/09/2356_01_txt.png"/></li>					
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_02.jpg" alt="면접 합격률 1위" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_03.jpg" alt="온라인 패스 성장률 1위" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt_04">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_04.jpg" alt="법원팀 최강 라인업"/>
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_05.jpg" alt="커리큐럼" data-aos="fade-left"/>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_06.jpg" alt="절대 만족 후기" data-aos="fade-right"/>
                <a href="https://cafe.daum.net/LAW-KDJTEAM/I7Bo" target="_blank" title="합격수기 더보기" style="position: absolute; left: 35.18%; top: 57.77%; width: 29.11%; height: 4.44%; z-index: 2;"></a>    
                <a href="https://open.kakao.com/o/s3fKkLrc" target="_blank" title="오픈채팅" style="position: absolute; left: 35.18%; top: 84.57%; width: 11.43%; height: 2.11%; z-index: 2;"></a>     
                <a href="https://pass.willbes.net/support/qna/index?s_cate_code=3035&s_consult_type=622007" target="_blank" title="게시판" style="position: absolute; left: 53.21%; top: 84.57%; width: 11.43%; height: 2.11%; z-index: 2;"></a> 
                <a href="https://cafe.daum.net/LAW-KDJTEAM" target="_blank" title="다음카페" style="position: absolute; left: 69.38%; top: 84.57%; width: 13.04%; height: 2.11%; z-index: 2;"></a>        
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
    </script>

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
@stop