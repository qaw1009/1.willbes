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
        .skyBanner {position:fixed; top:200px;right:10px;z-index:10;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/04/1208_top_bg.jpg) no-repeat center top;} 
            .evtTopInmg {position:relative; width:1120px; margin:0 auto}
            .counter {position:absolute; text-align:center; width:100%; z-index:1; color:#fff; font-size:18px; top:30px; line-height:30px}
            .counter span {color:#fff200; font-size:30px; vertical-align: text-bottom}           
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1208_01_bg.jpg) no-repeat center top;}
        .evt02 {background:#25353c}
        .evt03 {background:#ececec}        
        .evt04 {background:#fff}
        
        .evtLive {background:#f6f6f6}
        .evtLive #movieFrame {position:relative; width:980px; height:420px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center center;}
        .movieplayer .embedWrap {position:relative; width:980px; height:420px; margin:0 auto}
        .movieplayer .embed-container {padding-bottom:46.25%; overflow:hidden; width:100%; min-height:420px; margin:0 auto}        
        .movieplayer .mobileCh {position:absolute; bottom:0; width:980px;}
        .movieplayer .mobileCh li {display:inline; float:left; width:50%;}
        .movieplayer .mobileCh li a {display:block; /*text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0; margin-right:1px*/}
        .movieplayer .mobileCh li:last-child a {margin:0}
        .movieplayer .mobileCh li a.ch2 {color:#6CF}
        .movieplayer .mobileCh li a:hover {color:#FC0}
        .movieplayer .mobileCh:after {content:""; display:block; clear:both}
        
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        .evtLive #movieFrame {position:relative; width:980px; height:420px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center center;}
        .movieplayer .embedWrap {position:relative; width:980px; height:420px; margin-left:0; padding:0}
        .movieplayer .embed-container {padding-bottom:46.25%; overflow:hidden; width:980px; height:auto; margin:0 auto}
        .movieplayer .mobileCh {position:absolute; bottom:0; width:980px;}
        .movieplayer .mobileCh li {display:inline; float:left; width:490px;}
        .movieplayer .mobileCh li a {display:block;/*text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0*/}
        .movieplayer .mobileCh li a.ch2 {color:#6CF}
        .movieplayer .mobileCh li a:hover {color:#FC0}
        .movieplayer .mobileCh:after {content:""; display:block; clear:both}
        } 
        
    </style>

<div class="p_re evtContent NGR" id="evtContainer">
    <div class="skyBanner">
        <a href="#none"><img src="https://static.willbes.net/public/images/promotion/2019/04/1187_skyBnr02.png" title="적중이벤트 소문내기"></a>
    </div>
    
    <div class="evtCtnsBox evtTop">
        <div class="evtTopInmg">
            <div class="counter NSK-Black">적중&합격예측 서비스 이용 : <span>986,129</span>건</div>    
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_top.jpg" title="2019년 경찰 1차 적중&합격예측 사전예약 이벤트">
        </div> 
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1208_01.jpg" title="리얼 시험분석">
    </div>
    
    <div class="evtCtnsBox evt02">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1208_02.jpg" title="토크쇼 교수진">
	</div>

	<div class="evtCtnsBox evtLive">
        <div><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live_01.jpg" title="수강생 여러분의 합격을 기원합니다."></div>
        
        <div id="movieFrame">
            {{--방송 전 27일 00:00 까지 노출
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg01.jpg" title="방송전">
            --}}

            {{--방송 중--}}
            <script src="/public/vendor/jwplayer/jwplayer.js"></script>
            <div class="movieplayer">
                <div class="embedWrap">
                    <div class="embed-container" id="myElement">
                        <script type="text/javascript">jwplayer.key="kl6lOhGqjWCTpx6EmOgcEVnVykhoGWmf4CXllubWP5JwYq6K34m5XnpF0KGiCbQN";</script>
                        <script type="text/javascript">
                            jwplayer("myElement").setup({
                            width: '100%',
                            logo: {file: 'https://static.willbes.net/public/images/promotion/common/live_pass_bi.png'},
                            image: "https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg02.jpg",
                            aspectratio: "21:9",
                            autostart: "true",
                            file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestream11011"
                        });
                        </script>
                    </div>

                    {{--모바일용 --}}
                    <ul class="mobileCh">
                        <li><a href="javascript:fn_live('hd')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnH.png" title="고화질 보기"></a></li>
                        <li><a href="javascript:fn_live('low')"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_playbtnN.png" title="일반화질 보기"></a></li>
                    </ul>
                    
                </div>
            </div>
            
            {{--방송종료 00:00 부터 노출
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg03.jpg" title="방송종료" />
            --}}
        </div>

        <div><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live_02.jpg" title="생방송 강의 진행 안내"></div>
	</div>

	<div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_03.jpg" title="토크쇼 소통 이벤트"> 
    </div>

    {{--기본댓글--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.pc.promotion.show_comment_list_normal_partial')
    @endif

    <div class="evtCtnsBox evt04">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_04.jpg" title="최종점검"> 
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

    function popOpen(){
        var url = "1187_popup02";
        window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=660,height=550');
    }
</script>

@stop