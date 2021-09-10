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
        .evtCtnsBox .wrap a:hover {background-color:rgba(0,0,0,0.2)}

        /************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2356_top_bg.jpg) no-repeat center top; height:1004px; position:relative}     
        .evt_top span {position:absolute; top:250px; margin-left:-420px}

        .evt_01 {}
        .ev_winner {position:absolute; width:596px; height:210px; top:1250px; left:50%; margin-left:-298px; z-index:10; overflow:hidden;}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        
        .evt_02 {background:#f4f4f4;}
        .evt_04 {background:#222 url(https://static.willbes.net/public/images/promotion/2021/09/2356_04_bg.jpg) no-repeat center top; position:relative;}


        .evt_02 > div {width:1120px; margin:0 auto;}
        .evt_02 > div a {display:inline-block; text-align:center; font-size:30px; background:#720017; color:#fff; margin:0 20px; height:85px; line-height:85px; padding:0 30px}
        .evt_02 > div a:last-child {background:#251e54;}

        /* 슬라이드배너*/
        .slide_con {position:relative; width:980px; margin:0 auto;  overflow:hidden}

        .slide_con .bx-wrapper .bx-controls {
            position: absolute;
            top:0;
            width:100%;
            z-index: 1;            
        }
       
        .slide_cons {position:relative;width:1210px; margin:0 auto}	
        .slide_cons p {position:absolute; top:50%; width:56px; height:56px; z-index:100}
        .slide_cons p a {cursor:pointer}
        .slide_cons p.leftBtn {left:-40px; top:37%; width:80px; height:80px;}
        .slide_cons p.rightBtn {right:-40px;top:37%; width:80px; height:80px;}       

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
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_05.jpg" alt="커리큐럼" data-aos="fade-left"/>
                <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_06.jpg" alt="절대 만족 후기" data-aos="fade-right"/>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2356_02.jpg" alt="법원팀 139명 최종합격"/>
            <div class="NSK-Black">
                <a href="https://pass.willbes.net/pass/promotion/index/cate/3043/code/2096" target="_blank">학원 종합반 바로가기 ></a>
                <a href="https://pass.willbes.net/promotion/index/cate/3035/code/2087" target="_blank">온라인 패스 바로가기 ></a>
            </div>
        </div>

        {{--기본댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_normal_partial')
        @endif 
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