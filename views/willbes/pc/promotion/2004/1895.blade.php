@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtContent .intro {background:url("https://static.willbes.net/public/images/promotion/2020/11/1895_intro_bg.jpg") center top no-repeat; height:870px; position:relative}
        .evtContent .intro .number {width:1120px; margin:0 auto; position:relative}
        .evtContent .intro .number span {font-size:80px; color:#fafafa; font-family: 'Anton', sans-serif; position:absolute; letter-spacing:44px}
        .evtContent .intro .number span.n01 {top:132px; left:262px;}
        .evtContent .intro .number span.n02 {top:264px; left:130px;}
        .evtContent .intro .number span.n03 {top:402px; left:450px;}
        .evtContent .intro ul {position:absolute; top:590px; width:100%}
        .evtContent .intro ul li {text-align:center; color:#fff; font-size:18px}
        .evtContent .intro ul li span {padding-bottom:3px; border-bottom:2px solid #ccc}
        .evtContent .intro ul li:last-child {margin-top:40px; font-size:24px; line-height:1.5; letter-spacing:-1px}
        .evtContent .intro ul li strong {color:#ffc39e}
        
        .wb_top {background:#EBEFF2;}
        .wb_01  {background:#fff;}
        .wb_02  {background:#ADBBC8;}
        .wb_03  {background:#E1D3CA;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer"> 
        <div class="evtCtnsBox intro">
            <div class="number">
                <span id="counter1" class="n01">30</span>
                <span id="counter2" class="n02">6800</span>
                <span id="counter3" class="n03">370</span>
            </div>
            <ul>
                <li><span>그 열정은 합격을 향한 ‘프로로서의 집념’에서 시작되었습니다.</span></li>
                <li class="NSK-Black">
                    한 교실에 다 담기에 벅찰 정도로<br>
                    많은 실강생들과 나누었던 현장의 뜨거운 열기를<br>
                    <strong>이제, 윌비스에서 전하고자 합니다.</strong><br>
                </li>
            </ul>
        </div>  

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_top.jpg" alt="" />  
        </div>       

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_01.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1895_02.jpg" alt="" />  
        </div>     

        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/02/1895_03.jpg" alt="" usemap="#Map1895a" border="0" />
            <map name="Map1895a" id="Map1895a">
                <area shape="rect" coords="228,1669,887,1775" href="https://pass.willbes.net/pass/offLecture/index?cate_code=3043&campus_ccd=605006" target="_blank" />
            </map>   
        </div>     

    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $('#counter1').counterUp({
            delay: 10, // the delay time in ms
            time: 500 // the speed time in ms
        });
        $('#counter2').counterUp({
            delay: 10, // the delay time in ms
            time: 1500 // the speed time in ms
        });
        $('#counter3').counterUp({
            delay: 10, // the delay time in ms
            time: 1000 // the speed time in ms
        });
    });
    </script>

@stop