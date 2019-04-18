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
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1208_01_bg.jpg) no-repeat center top;}
        .evt02 {background:url(https://static.willbes.net/public/images/promotion/2019/04/1208_02_bg.jpg) no-repeat center top;}
        .evt03 {background:#fff}        
        .evt04 {background:#231f20}
        .evt05 {background:#fff; position:relative;}
        .evt05 a {position:absolute; display:block; top:685px; left:50%; width:200px; margin-left:-100px; height:50px; line-height:50px; background:#000; color:#fff; border-radius:26px; font-size:20px; z-index:1} 
        .evt05 a:hover {background:#20bdb2;}
        .evt06 {background:#ececec;}
        
        .evtLive {padding-bottom:120px}
        .evtLive #movieFrame {position:relative; width:980px; height:420px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center center;}
        .movieplayer .embedWrap {width:980px; margin:0 auto}
        .movieplayer .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:100%; height:auto; margin:0 auto}        
        .movieplayer .mobileCh {position:absolute; bottom:0; width:980px;}
        .movieplayer .mobileCh li {display:inline; float:left; width:50%;}
        .movieplayer .mobileCh li a {display:block; text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0; margin-right:1px}
        .movieplayer .mobileCh li:last-child a {margin:0}
        .movieplayer .mobileCh li a.ch2 {color:#6CF}
        .movieplayer .mobileCh li a:hover {color:#FC0}
        .movieplayer .mobileCh:after {content:""; display:block; clear:both}
        
        /*크롬*/
        @@media screen and (-webkit-min-device-pixel-ratio:0) {
        .evtLive #movieFrame {position:relative; width:980px; height:420px; margin:0 auto; background:url(http://file3.willbes.net/new_gosi/2019/03/EV190319_live_vod_off.png) no-repeat center center;}
        .movieplayer .embedWrap {width:980px; margin-left:0; padding:0}
        .movieplayer .embed-container {position:absolute; padding-bottom:46.25%; height:0; overflow:hidden; width:980px; height:auto; margin:0 auto}
        .movieplayer .mobileCh {position:absolute; bottom:0; width:980px;}
        .movieplayer .mobileCh li {display:inline; float:left; width:490px;}
        .movieplayer .mobileCh li a {display:block; text-align:center; font-size:150%; font-weight:bold; color:#FFF; background:#1e162b; padding:30px 0}
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
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_top.png" title="적중&합격예측 라이브 토크쇼">
	</div>

	<div class="evtCtnsBox evt01">
		<img src="https://static.willbes.net/public/images/promotion/2019/04/1208_01.png" title="토크쇼 교수진">
	</div>

	<div class="evtCtnsBox evtLive">
        <div><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live_01.png" title="수강생 여러분의 합격을 기원합니다."></div>
        
        <div id="movieFrame">
            {{--토크쇼 전
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg01.jpg" title="토크쇼 교수진">
            --}}

            {{--토크쇼 중--}}
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

                    {{--모바일용 
                    <ul class="mobileCh">
                        <li><a href="javascript:fn_live('hd')">▶ 고화질 보기 클릭!</a></li>
                        <li><a href="javascript:fn_live('low')" class="ch2">▶ 일반화질 보기 클릭!</a></li>
                    </ul>
                    --}}
                </div>
            </div>
            
            {{--토크쇼 종료 후
            <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg03.jpg" alt="라이브강의_지금은 진행시간이아닙니다" />
            --}}
        </div>

        <div><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_live_02.png" title="생방송 강의 진행 안내"></div>
	</div>

	<div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_02.png" title="토크쇼 인증샷 이벤트"> 
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2019/04/1208_03.jpg" title="최종점검"> 
    </div> 

    {{--홍보url댓글--}}
    @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.pc.promotion.show_comment_list_url_partial')
    @endif

</div>
<!-- End Container -->

@stop