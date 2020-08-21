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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skyBanner {position:fixed; top:250px; right:10px;z-index:10;}
        .skyBanner li{margin-top:15px;}

        .evt_counter {height:100px; background:#000; font-size:18px; color:#fff}
        .evt_counter .counter {position:relative; width:1120px; margin:0 auto}
        .evt_counter .counter .left_area {text-align:center; padding-top:15px; font-size:24px}
        .evt_counter .counter .left_area img {margin-right:20px}
        .evt_counter .counter span {font-family: Tahoma, Verdana, Geneva, sans-serif; font-size:42px; letter-spacing:-1px; font-weight:600; padding:0 10px; color:#f1d58b}
        .evt_counter .counter p {font-size:11px; margin-top:10px; color:#ccc}


        .evtTop {background:#9E9893 url(https://static.willbes.net/public/images/promotion/2020/08/1747_top_bg.jpg) no-repeat center top;}
        .evtTopInmg {position:relative; width:1120px; margin:0 auto}
        .evt01 {background:#fff; border-bottom:7px solid #fff}
        .evt01 .d-day {
            position:absolute;
            width:500px;
            left:50%;
            top:115px;
            margin-left:-250px;
            font-size:24px;
            color:#000;
            line-height:1.5;
            z-index:5;
        }
        .evt01 .d-day p {font-size:45px}
        .evt01 .d-day span {color:#8e5e32}
        .evt01 .btnJoin {
            position:absolute;
            width:440px;
            left:50%;
            top:890px;
            margin-left:-220px;
            line-height:1.5;
            z-index:5;
        }
        .evt01 .btnJoin a {
            display:block;
            border-radius:24px;
            padding:20px 0;
            font-size:24px;
            text-align:center;
            color:#fff;
            background:#bf5149;
        }
        .evt01 .btnJoin a:hover {
            background:#000;
        }
        .evt01 .btnJoin a span {
            font-size:30px;
        }
        .evt01 ul {width:1042px; margin:230px auto 0;}
        .evt01 li {display:inline; float:left; width:16.66666%; position:relative;}
        .evt01 li span {position:absolute; width:100%; text-align:center; left:0; top:-40px}
        .evt01 li a img.on {display:none}
        .evt01 li a img.off {display:block}
        .evt01 li a.active img.on,
        .evt01 li a:hover img.on {display:block}
        .evt01 li a.active img.off,
        .evt01 li a:hover img.off {display:none}
        .evt01 ul:after {content:""; display:block; clear:both}

        .evt02 {background:#93857C;}
        .evt03 {background:#F2E0D6;}
        .evt03 div {
            display:none;
            position:absolute;
            width:408px;
            left:50%;
            top:1436px;
            margin-left:-203px;
            font-size:24px;
            color:#000;
            line-height:1.5;
            z-index:5;
        }
        .evt03 div span {
            float:left; margin-right:13px;
        }
        .evt03 div span:last-child {
            margin:0;
        }
        .evt03 .btnlec {
            display:none;
            position:absolute;
            width:324px;
            left:50%;
            top:1620px;
            margin-left:-164px;
            line-height:1.5;
            z-index:5;
        }
        .evt03 .btnlec a {
            display:block;
            border-radius:24px;
            padding:10px 0;
            font-size:20px;
            text-align:center;
            color:#fff;
            background:#2784d2;
        }
        .evt03 .btnlec a:hover {
            background:#000;
        }
        .evt04 {background:#f6f6f6;}
        .evt05 {background:#fff;}
        .comingsoon {background:url(https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon_bg.jpg) no-repeat center top; text-align:center}
        .evt06 {background:url(https://static.willbes.net/public/images/promotion/2019/10/1424_top_bg.jpg) no-repeat center top;}	
        .evt06 .wb_popWrap {width:1120px; margin:0 auto; position:relative}
        .evt06 .illust {position:absolute; width:1120px; margin:0 auto; animation:only 2s ease-in 0s infinite; z-index:11}
        @@keyframes only{
            0%{top:360px}
            50%{top:380px; opacity:1}
            100%{top:360px}
        }
        .evt06 a {position:absolute; width:600px; top:770px; left:50%; margin-left:-300px; padding:20px 0;
            color:#fff; font-size:20px; font-weight:600; border:2px solid #fff; border-radius:40px;
        }
        .evt06 a:hover {background:#fff; color:#102b3e}
    </style>
    @php
        $now = date('YmdHi');
        $text_on2 = 'off';
        $onoff_1 = $onoff_2 = $onoff_3 = $onoff_4 = $onoff_5 = $onoff_6 = 'null';
        if (empty($arr_promotion_params['start_active_tab1']) === false && empty($arr_promotion_params['end_active_tab1']) === false) {
            if ($now < $arr_promotion_params['start_active_tab1']) { $onoff_1 = 'null'; } elseif ($now >= $arr_promotion_params['start_active_tab1'] && $now < $arr_promotion_params['end_active_tab1']) { $onoff_1 = 'on'; }
            elseif ($now >= $arr_promotion_params['end_active_tab1']) { $onoff_1 = 'off'; }
        } else { $onoff_1 = 'null'; }

        if (empty($arr_promotion_params['start_active_tab2']) === false && empty($arr_promotion_params['end_active_tab2']) === false) {
            if ($now < $arr_promotion_params['start_active_tab2']) {
                $onoff_2 = 'null';
            } elseif ($now >= $arr_promotion_params['start_active_tab2'] && $now < $arr_promotion_params['end_active_tab2']) {
                if ($now < '202005300000') {
                    $text_on2 = 'on';
                }
                $onoff_2 = 'on';
            } elseif ($now >= $arr_promotion_params['end_active_tab2']) {
                $onoff_2 = 'off';
            }
        } else { $onoff_2 = 'null'; }

        if (empty($arr_promotion_params['start_active_tab3']) === false && empty($arr_promotion_params['end_active_tab3']) === false) {
            if ($now < $arr_promotion_params['start_active_tab3']) { $onoff_3 = 'null'; } elseif ($now >= $arr_promotion_params['start_active_tab3'] && $now < $arr_promotion_params['end_active_tab3']) { $onoff_3 = 'on'; }
            elseif ($now >= $arr_promotion_params['end_active_tab3']) { $onoff_3 = 'off'; }
        } else { $onoff_3 = 'null'; }

        if (empty($arr_promotion_params['start_active_tab4']) === false && empty($arr_promotion_params['end_active_tab4']) === false) {
            if ($now < $arr_promotion_params['start_active_tab4']) { $onoff_4 = 'null'; } elseif ($now >= $arr_promotion_params['start_active_tab4'] && $now < $arr_promotion_params['end_active_tab4']) { $onoff_4 = 'on'; }
            elseif ($now >= $arr_promotion_params['end_active_tab4']) { $onoff_4 = 'off'; }
        } else { $onoff_4 = 'null'; }

        if (empty($arr_promotion_params['start_active_tab5']) === false && empty($arr_promotion_params['end_active_tab5']) === false) {
            if ($now < $arr_promotion_params['start_active_tab5']) { $onoff_5 = 'null'; } elseif ($now >= $arr_promotion_params['start_active_tab5'] && $now < $arr_promotion_params['end_active_tab5']) { $onoff_5 = 'on'; }
            elseif ($now >= $arr_promotion_params['end_active_tab5']) { $onoff_5 = 'off'; }
        } else { $onoff_5 = 'null'; }

        if (empty($arr_promotion_params['start_active_tab6']) === false && empty($arr_promotion_params['end_active_tab6']) === false) {
            if ($now < $arr_promotion_params['start_active_tab6']) { $onoff_6 = 'null'; } elseif ($now >= $arr_promotion_params['start_active_tab6'] && $now < $arr_promotion_params['end_active_tab6']) { $onoff_6 = 'on'; }
            elseif ($now >= $arr_promotion_params['end_active_tab6']) { $onoff_6 = 'off'; }
        } else { $onoff_6 = 'null'; }
    @endphp
    <div class="evtContent NGR" id="evtContainer">        
        <ul class="skyBanner"> 
            {{--
            <li>
                <a href="#none" onclick="javascript:alert('라이브 토크쇼가 종료되었습니다');">
                <a href="https://police.willbes.net/support/notice/show/cate/3001?board_idx=276073&" target="_blank">
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_sky02.png" title="라이브">
                </a>
            </li>          
            @if ($onoff_3 != 'null') @else
                <li><a href="https://police.willbes.net/promotion/index/cate/3001/code/1628" target="_blank"><img src="https://static.willbes.net/public/images/promotion/2020/03/1555_sky01.png" title="적중이벤트"></a></li>
            @endif
            --}}
            <li><a href="javascript:alert('Comimg Soon :)')"><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_sky01.png" title="적중 이벤트"></a></li>
            <li><a href="javascript:alert('9.19(토) 공개됩니다.')"><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_sky02.png" title="라이브"></a></li>
            {{--<li><a href="javascript:alert('Comimg Soon :)')"><img src="https://static.willbes.net/public/images/promotion/2020/07/1555_sky02.png" title="면접캠프"></a></li>--}}
        </ul>   

        <div class="evtCtnsBox evt_counter">
            <div class="counter">
                <div class="left_area NGEB">
                    <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_live_camera.png" alt="">
                    서비스 참여 건수
                    <span>
                    @if(empty($arr_base['predict_count'])){{0}}@else{{number_format($arr_base['predict_count']['view_count'],0)}}@endif
                </span>건
                </div>
                <p class="NSK">(풀케어 서비스 인증, 채점, 설문, 적중이벤트, 라이브토크쇼, 해설강의 각 참여 및 수강 건수 합산 기준)</p>
            </div>
        </div>

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_top.jpg" title="합격 풀케어 서비스">
            </div>
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <div class="d-day NSK">
                2020년 경찰2차 러닝메이트 최종합격 프로젝트
                @if(empty($arr_base['dday_data'][0]['DDay']) === false)
                    @if($onoff_1 == 'on')
                        <p class="NSK-Black">필기시험까지 <span>D{{$arr_base['dday_data'][0]['DDay']}}</span></p>
                    @endif
                @endif
                <!--
                <p>체력시험까지 <span>D-00</span></p>
                <p>면접시험까지 <span>D-00</span></p>
                <p>최종합격발표까지 <span>D-00</span></p>
                -->
            </div>
            @if ($onoff_3 != 'null')
                <div class="btnJoin NGEB">
                    <a href="#none" onclick="doEvent(); return false;" target="_blank">
                        필기합격생<br> <span>인증하기  ></span>
                    </a>
                </div>
            @else
                <div class="btnJoin NGEB">
                    <a href="#none" onclick="doEvent(); return false;" target="_blank">
                        경찰 2차 시험 인증 이벤트<br> <span>참여하기  ></span>
                    </a>
                </div>
            @endif
            <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01.jpg" alt="이 모든 혜택을 드립니다.">
            <ul>
                <li>
                    @if($onoff_1 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                    @elseif($onoff_1 == 'off')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                    @else @endif
                    <a href="#tab01" class="{{ (($onoff_1 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab01_on.png" alt="사전예약" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab01.jpg" alt="사전예약" class="off">
                    </a>
                </li>
                <li>
                    @if($text_on2 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/03/1555_01_ing02.jpg" alt="가압안발표후진행"></span>
                    @else
                        @if($onoff_2 == 'on')
                            <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                        @elseif($onoff_2 == 'off')
                            <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                        @else @endif
                    @endif                    
                    <a href="#tab02" class="{{ (($onoff_2 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab02_on.png" alt="합격예측" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab02.jpg" alt="합격예측" class="off">
                    </a>
                </li>
                <li>
                    @if($onoff_3 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                    @elseif($onoff_3 == 'off')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                    @else @endif
                    <a href="#tab03" class="{{ (($onoff_3 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab03_on.png" alt="체력시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab03.jpg" alt="체력시험" class="off">
                    </a>
                </li>
                <li>
                    @if($onoff_4 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                    @elseif($onoff_4 == 'off')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                    @else @endif
                    <a href="#tab04" class="{{ (($onoff_4 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab04_on.png" alt="면접시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab04.jpg" alt="면접시험" class="off">
                    </a>
                </li>
                <li>
                    @if($onoff_5 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                    @elseif($onoff_5 == 'off')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                    @else @endif
                    <a href="#tab05" class="{{ (($onoff_5 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab05_on.png" alt="최종합격" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab05.jpg" alt="최종합격" class="off">
                    </a>
                </li>
                <li>
                    @if($onoff_6 == 'on')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_ing.gif" alt="진행중"></span>
                    @elseif($onoff_6 == 'off')
                        <span><img src="https://static.willbes.net/public/images/promotion/2020/08/1747_01_end.gif" alt="종료"></span>
                    @else @endif
                    <a href="#tab06" class="{{ (($onoff_6 == 'on') ? 'active' : '') }}">
                        <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tab06_on.png" alt="최종합격서비스" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab06.jpg" alt="최종합격서비스" class="off">
                    </a>
                </li>                
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tc01_01.jpg" title="사전예약 특전">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tc01_02.jpg" title="봉투모의고사">
            </div>

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tc01_03.jpg" title="합격풀케어 서비스">
            </div>           

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1747_tc01_04.jpg" usemap="#Map1747a" title="사전예약 이벤트" border="0">
                <map name="Map1747a" id="Map1747a">
                    <area shape="rect" coords="271,1783,597,1835"  href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="합격풀케어서비스 이미지 다운받기">
                </map>
            </div>

            {{--홍보url댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>

        @if($onoff_2 == 'null')
            <div id="tab02" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
            </div>
        @else
            <div id="tab02">
                @include('willbes.pc.promotion.2001.1747_cts02')
            </div>
        @endif

        @if($onoff_3 == 'null')
            <div id="tab03" class="comingsoon">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
            </div>
        @else
            <div id="tab03">
                @include('willbes.pc.promotion.2001.1747_cts03')
            </div>
        @endif

        @if($onoff_4 == 'null')
            <div id="tab04" class="comingsoon">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
            </div>
        @else
            <div id="tab04">
                @include('willbes.pc.promotion.2001.1747_cts04')
            </div>
        @endif

        @if($onoff_5 == 'null')
            <div id="tab05" class="comingsoon">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
            </div>
        @else
            <div id="tab05">
                @include('willbes.pc.promotion.2001.1747_cts05')
            </div>
        @endif

        @if($onoff_6 == 'null')
            <div id="tab06" class="comingsoon">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
            </div>
        @else
            <div id="tab06">
            </div>
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
            @if($onoff_3 != 'null')
                @if (empty($arr_promotion_params['page']) === true || empty($arr_promotion_params['cert']) === true)
                    alert("필수데이터 누락입니다. 관리자에게 문의해 주세요.");
                    return;
                @else
                    {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
                    @if(empty($cert_apply) === false)
                        alert("이미 인증이 완료된 상태입니다.");return;
                    @endif
                    @if(empty($arr_promotion_params) === false)
                        var url = '{{ site_url('/certApply/index/page/'.$arr_promotion_params['page'].'/cert/'.$arr_promotion_params['cert']) }}';
                        window.open(url,'cert_popup', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=800,height=700');
                    @endif
                @endif
            @else
                //사전예약 마감
                @if($onoff_1 != 'on')
                    var openNewWindow = window.open("about:blank");
                    openNewWindow.location.href = '{{ front_url('/promotion/index/cate/3001/code/1629') }}';
                @else
                    var url = "{{ front_url('/predict/index/' . $arr_promotion_params['PredictIdx']) }}";
                    window.open(url,'event', 'scrollbars=yes,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
                @endif
            @endif
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=yes,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }

        /*tab*/
        $(document).ready(function(){
            $('.evt01 ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                @php
                    $arr_tab = empty($arr_base['get_data']['tab']) === false ? $arr_base['get_data']['tab'] : null;
                @endphp
                @if(empty($arr_tab) === false && ($arr_tab >= 1 && $arr_tab <=5))
                    //GET으로 Tab 번호 받았을 경우
                    $active = $($links.filter('[href="'+location.hash+'"]')[{{$arr_tab-1}}] || $links[{{$arr_tab-1}}]);
                @else
                    @if($onoff_1 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    @elseif ($onoff_2 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[1] || $links[1]);
                    @elseif ($onoff_3 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[2] || $links[2]);
                    @elseif ($onoff_4 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[3] || $links[3]);
                    @elseif ($onoff_5 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[4] || $links[4]);
                    @elseif ($onoff_6 == 'on')
                        $active = $($links.filter('[href="'+location.hash+'"]')[5] || $links[5]);
                    @else
                        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                    @endif
                @endif

                $active.addClass('active');
                $content = $($active[0].hash);
                $links.not($active).each(function () {
                    $(this.hash).hide()
                });

                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                    $active.removeClass('active');
                    $content.hide();
                    $active = $(this);
                    $content = $(this.hash);
                    $active.addClass('active');
                    $content.show();
                    e.preventDefault()
                });
            });
        });
    </script>
@stop