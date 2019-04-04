@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        span {vertical-align:auto}
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/
        .skyBanner {position:fixed;top:250px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1187_top_bg.jpg) no-repeat center top;}
            .evtTopInmg {position:relative; width:1120px; margin:0 auto}
            .counter {position:absolute; text-align:center; width:100%; z-index:1; color:#fff; font-size:18px; top:30px}
            .counter span {color:#fff200; font-size:30px;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1187_01_bg.jpg) no-repeat center top}
        .evt01 div {position:relative; width:1120px; margin:0 auto}
        .evt01 div span {position:absolute; left:463px; display:block; width:433px; height:67px; line-height:67px; z-index:10}
        .evt01 div span a {display:block; text-align:center; color:#333; background:#fff; font-size:18px; font-weight:600; border:1px solid #ff5d7a !important;}
        .evt01 div span a:hover {color:#fff; background:#ff5d7a}
        .evt02 {background:#f6f6f6;}
        .evt03 {background:#fff;}

    </style>

    <div class="p_re evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <li><a href="javascript:alert('준비중입니다');"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr01.png" title="토크쇼"></a></li>
            <li><a href="javascript:alert('준비중입니다');"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr02.png" title="적중이벤트"></a></li>
        </ul>  

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">
                <div class="counter NSK-Black">적중&합격예측 서비스 이용 : <span>986,129</span>건</div>    
                <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_top.jpg" title="2019년 경찰 1차 적중&합격예측 사전예약 이벤트">
            </div>        
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_01.jpg" title="합격예측 사전예약 특전">
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_02.jpg" title="합격예측 풀서비스">
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1187_03.jpg" usemap="#Map1187A" title="사전예약 이벤트" border="0">
            <map name="Map1187A" id="Map1187A">
                <area shape="rect" coords="413,900,708,971" href="#none" onclick="doEvent(); return false;" alt="합격예측 사전접수하기" />
            </map>
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
            $('.counter span').counterUp({
                delay: 11, // the delay time in ms
                time: 1000 // the speed time in ms
            });
        });

        function pullOpen(){
            var url = "1187_popup";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700');
        }
    </script>

@stop