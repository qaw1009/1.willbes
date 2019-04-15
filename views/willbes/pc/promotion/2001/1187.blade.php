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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:absolute; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1187_top_bg.jpg) no-repeat center top;}
            .evtTopInmg {position:relative; width:1120px; margin:0 auto}
            .counter {position:absolute; text-align:center; width:100%; z-index:1; color:#fff; font-size:18px; top:30px}
            .counter span {color:#fff200; font-size:30px;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1187_01_bg.jpg) no-repeat center top}
        .evt01 div {position:relative; width:1120px; margin:0 auto}
        .evt01 div a {position:absolute; display:block; width:281px; left:50%; margin-left:-140px; top:1218px; z-index:10} 
        .evt02 {background:#f6f6f6;}
        .evt03 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <li><a href="javascript:alert('coming soon');"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr01.png" title="토크쇼"></a></li>
            <li><a href="javascript:alert('coming soon');"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr02.png" title="적중이벤트"></a></li>
            <li class="mt10"><a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr03.png" title="최신판례특강"></a></li>
        </ul>  

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">
                <div class="counter NSK-Black" style="display:none;">적중&합격예측 서비스 이용 : <span id="autonumber">@include('willbes.pc.predict.show_count_partial')</span>건</div>
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_top.jpg" title="2019년 경찰 1차 적중&합격예측 사전예약 이벤트">
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_01.jpg" title="합격예측 사전예약 특전">
                <a href="#none" onclick="doEvent(); return false;" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_btn01.png" title="합격예측 사전예약 신청하기"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_02.jpg" title="합격예측 풀서비스">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_03.jpg" title="사전예약 이벤트">
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
            var url = "{{front_url('/predict/index/100001')}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }
    </script>

@stop