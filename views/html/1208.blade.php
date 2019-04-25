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
        
        .evtLive {background:#f6f6f6; position:relative}
        .notice {
            position:relative; width:980px; margin:0 auto; padding:10px; text-align:left; height:98px;
            background:#000 url(https://static.willbes.net/public/images/promotion/2019/04/1208_notice_title.jpg) no-repeat 10px 10px;
        }        
        .notice ul {margin-left:248px; background:#fff; padding:10px 40px 10px 20px}
        .notice li {height:29px; line-height:29px;}
        .notice li a {display:block}
        .notice li a span {float:right; color:#999}
        .notice li a strong {background:#ee1c24; color:#fff; margin-right:10px; font-size:11px; padding:2px 4px}        
        .notice .morebtn {position:absolute; top:10px; right:10px; width:23px; z-index:1}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: 600px;
            border: 1px solid #000;            
            background: #fff;
            font-size:13px;
            line-height:1.5;
            box-shadow:0 10px 10px rgba(0,0,0,0.2);
        }
        .b-close {
            position: absolute;
            right: 5px;
            top: 5px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
            color:#fff;
            font-size:14px;
        }
        .Pstyle h3 {height:60px; line-height:60px; padding-left:20px; color:#fff; background:#225fba; font-size:20px}
        .Pstyle .content {height:600px; overflow-y:scroll; width:auto; padding:20px}
        .Pstyle .content table {border-top:2px solid #333}
        .Pstyle .content th,
        .Pstyle .content td {padding:10px; text-align:center; border-bottom:1px solid #e4e4e4}
        .Pstyle .content th {background:#f2f2f2}
        .Pstyle .content th span {float:right}
        .Pstyle .content td:nth-child(2) {text-align:left;}
        .Pstyle .content tr:hover {background:#e9f1fe}
        .Pstyle .content td a {display:block}
        .Pstyle .content td .boradImg {margin:10px 0}
        .Pstyle .content td .boradImg img {max-width:538px}
        .Pstyle .content table strong {background:#ee1c24; color:#fff; margin-right:10px; font-size:11px; padding:2px 4px}
        .Pstyle .btnsSt3 {text-align:center; margin-top:20px}
        .Pstyle .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff; font-weight:bold; border:1px solid #333}
        .btnsSt3 a:hover {background:#fff; color:#333}

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
        <div class="notice">
            <ul>
                <li><a href="javascript:go_popup();"><strong>공지</strong>라이브 토크쇼 14:00시부터 시작합니다.<span>2019-04-23</span></a></li>
                <li><a href="javascript:go_popup();">해설강의 진행시간 안내 <span>2019-04-23</span></a></li>
            </ul>
            <a href="javascript:go_popup();" class="morebtn"><img src="https://static.willbes.net/public/images/promotion/common/btn_close01.jpg" title="더보기"></a>
        </div>

        {{--공지사항 레이어팝업--}}
        <div id="popup" class="Pstyle NGR">
            <span class="b-close">X</span>
            <h3 class="NSK-Black">live 토크쇼 공지사항</h3> 
            <div class="content">                               
                {{--리스트--}}    
                <table>
                    <col widht="10%"/>
                    <col widht=""/>
                    <col widht="20%"/>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>제목</th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>9</td>
                            <td><a href="#none"><strong>공지</strong> 조정점수 5차 업데이트</a></td>
                            <td>2018-12-27</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><a href="#none"><strong>공지</strong> 조정점수및 예상 합격선 4차 업데이트</a></td>
                            <td>2018-12-26</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><a href="#none">조정점수및 예상 합격선 3차 업데이트</a></td>
                            <td>2018-12-24</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><a href="#none">조정점수및 예상 합격선 업데이트 안내</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#none">조정점수 및 예상 합격선 1차 업데이트</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#none">채점시 오류 발생할 경우.</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#none">018년 3차 합격예측 풀서비스 오픈!</a></td>
                            <td>2018-12-22</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="#none">2018년 3차 합격예측 풀서비스 coming soon!</a></td>
                            <td>2018-12-21</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><a href="#none">2018 경찰 3차 합격을 기원합니다!</a></td>
                            <td>2018-12-21</td>
                        </tr>
                    </tbody>
                </table>
                {{--공통 페이지 넘버링--}}

                {{--글보기--}}
                <table>
                    <col widht="10%"/>
                    <col widht=""/>
                    <col widht="20%"/>
                    <thead>
                        <tr>
                            <th class="tx-left"><strong>공지</strong> 조정점수 5차 업데이트 <span>2018-12-27</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="tx-left">                            
                                복수정답 처리, 재채점 및 추가 채점자 합산 반영된 조정점수가 5차 업데이트 되었습니다.
                                합격예측 풀서비스는 12/28(금) 오후 2시까지 채점 입력, 수정이 가능합니다.
                                합격예측 풀서비스는 필기합격 발표에 따라 최종합격 예측 서비스로 이어질 예정입니다.
                                <div class="boradImg"><img src="https://static.willbes.net/public/images/promotion/2019/04/1208_liveimg01.jpg" title="방송전"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btnsSt3"><a href="#none">목록</a></div>
            </div>
        </div>

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
                            file: "rtmp://willbes.flive.skcdn.com/willbeslive/livestreamcop3011"
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
<script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
<script src="/public/js/willbes/jquery.counterup.min.js"></script>
<script src="/public/js/willbes/waypoints.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function( $ ) {
        $('.counter span').counterUp({
            delay: 11, // the delay time in ms
            time: 1000 // the speed time in ms
        });
    });

    /*레이어팝업*/
    function go_popup() {
        $('#popup').bPopup();
    }
</script>

@stop