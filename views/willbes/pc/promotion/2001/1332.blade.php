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
            min-width:1210px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position:relative;}

        /************************************************************/
        .skyBanner {position:fixed; bottom:250px;right:10px;z-index:10;}
        .skyBanner li{margin-top:15px;} 

        .evt_counter {height:100px; background:#000; font-size:18px; color:#fff}
        .evt_counter .counter {position:relative; width:1120px; margin:0 auto}
        .evt_counter .counter .left_area {text-align:left; padding-top:25px; margin-left:100px; float:left}
        .evt_counter .counter .left_area p {margin-top:8px}
        .evt_counter .counter .right_area {float:left; margin-left:80px; margin-top:37px;}        
        .evt_counter .counter span {font-family: Tahoma, Verdana, Geneva, sans-serif; font-size:42px; letter-spacing:-1px; font-weight:600; padding:0 10px}   
        .evt_counter .counter strong {font-size:40px; font-weight:normal !important; color:#3b3b3b; padding:0 20px}
        .evt_counter .counter:after {content:""; display:block; clear:both}  
  
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/07/1332_top_bg.jpg) no-repeat center top;}
        .evtTopInmg {position:relative; width:1120px; margin:0 auto}
        .evt01 {background:#2e3c52;}
        .evt01 div {position:relative; width:1120px; margin:0 auto}
        .evt01 div a {position:absolute; display:block; width:281px; left:50%; margin-left:-140px; top:1218px; z-index:10} 
        .evt02 {background:#f6f6f6;}
        .evt03 {background:#fff;} 

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <li><a href="javascript:alert('Coming Soon!');"><img src="https://static.willbes.net/public/images/promotion/2019/07/1332_sky_banner1.png" title="토크쇼"></a></li>
            <li><a href="javascript:alert('Coming Soon!');" ><img src="https://static.willbes.net/public/images/promotion/2019/07/1332_sky_banner2.png" title="적중이벤트"></a></li>
        </ul>     

        <div class="evtCtnsBox evt_counter">
            <div class="counter">
                <div class="left_area">
                    <img src="https://static.willbes.net/public/images/promotion/2019/07/1332_live_camera.png" alt="">
                    <p>적중&합격예측 이용현황</p>
                </div>
                <div class="right_area">
                    이용건수<span>1,770,232</span>건<strong>|</strong>채점건수<span>50,232</span>건
                </div>
            </div>
        </div>  

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">              
                <img src="https://static.willbes.net/public/images/promotion/2019/07/1332_top.jpg" title="2019년 경찰 2차 적중&합격예측 사전예약 이벤트">
            </div>        
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1332_01.jpg" alt="사전 접수하기" usemap="#Map1332a" border="0">
                <map name="Map1332a" id="Map1332a">
                    <area shape="rect" coords="331,610,789,709" href="#none" onclick="javascript:doEvent();" alt="사전접수하기"/>
                </map>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1332_02.jpg" title="합격예측 풀서비스">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1332_03.jpg" title="사전예약 이벤트">
        </div>

        {{--홍보url댓글--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif
	</div>
    <!-- End Container -->

    <script src="/public/js/willbes/jquery.counterup.min.js"></script>
    <script src="/public/js/willbes/waypoints.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ) {
            setTimeout(function() {
                $('.counter').show();
                $('.counter span').counterUp({
                    delay: 11, // the delay time in ms
                    time: 1000 // the speed time in ms
                });
            }, 1000);
        });

        function doEvent() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{front_url('/predict/index/' . (empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx']))}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=no,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }
    </script>

@stop