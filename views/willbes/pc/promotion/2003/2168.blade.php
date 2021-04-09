@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }        
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evt_top {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2021/04/2168_top_bg.jpg) no-repeat center top;}        
        .evt_01 {background:#353439 url(https://static.willbes.net/public/images/promotion/2021/04/2168_01_bg.jpg) no-repeat center top; position:relative}
        .ev_winner {position:absolute; width:693px; height:380px; top:1040px; left:50%; margin-left:-347px; z-index:10; overflow:hidden;}
        .ev_winner .bx-wrapper .bx-viewport {height:405px;}
        .evt_02 {background:#dbdbdb}

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
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2168_top.jpg" alt="법원팀 139명 최종합격"/>
        </div>

        <div class="evtCtnsBox evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2168_01.jpg" alt="법원팀 139명 최종합격"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li class="mb10"><img src="https://static.willbes.net/public/images/promotion/2021/04/2168_01_txt.png"/></li>					
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/04/2168_02.jpg" />
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
@stop