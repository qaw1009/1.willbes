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
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .tabMenu {background:#211515; border-bottom:2px solid #ddb265; padding-top:20px}
        .tabMenu ul {width:1120px; margin:0 auto}
        .tabMenu li {display:inline; float:left; width:50%}
        .tabMenu li a {display:block; padding:20px 0; text-align:center; color:#625656; font-size:24px}
        .tabMenu li a:hover,
        .tabMenu li a.active {background:#ddb265; color:#211515; border-radius:20px 20px 0 0}
        .tabMenu li span {display:block; font-size:16px; margin-bottom:10px}
        .tabMenu ul:after {content:""; display:block; clear:both}

        .wb_top {background:#2a2a2d url(https://static.willbes.net/public/images/promotion/2019/06/1275_top_bg.png) no-repeat center top; position:relative; height:1468px;}
        .ev_winner {width:980px; margin:0 auto; height:430px; padding:80px 0; margin:0 auto; overflow:hidden}
        .ev_winner .bx-wrapper .bx-viewport {height:400px;}
        .wb_cts01 {background:#202020; height:1779px;}
        .wb_cts02 {background:#353439 url(https://static.willbes.net/public/images/promotion/2019/06/1274_02_bg.png) no-repeat center top}

    </style>


    <div class="p_re evtContent NGR" id="evtContainer">
        <div class="tabMenu NGEB">
            <ul>
                <li><a href="/promotion/index/cate/3035/code/1274" ><span>2018.04.14.SAT</span>2018’ 법원직 동행의 밤</a></li>
                <li><a href="#none" class="active"><span>2019.05.25.SAT</span>2019’ 법원직 동행의 밤</a></li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_top" id="main">
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1275_top.png" alt="윌비스 신규입성 이동민 관리형 면접반 " usemap="#Map180501_c1" border="0"/>
            <div class="ev_winner">
                <ul id="slider1" class="bxslider">
                    <li><img src="https://static.willbes.net/public/images/promotion/2019/06/1275_txt.png"/></li>					
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts01" >
			<img src="https://static.willbes.net/public/images/promotion/2019/06/1275_01.png"/><br>
			 <span><iframe src="https://www.youtube.com/embed/cBCMjHraOFM" frameborder="0" width="854px" height="480px" allowfullscreen></iframe></span><br>
			 <img src="https://static.willbes.net/public/images/promotion/2019/06/1275_01-1.png"/><br>
			 
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2019/06/1275_02.png" alt="면접, 혼자서는 실력을 완성할 수 없습니다. " />
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
                speed:10000*bx_num01
            });
        });
    </script>
@stop