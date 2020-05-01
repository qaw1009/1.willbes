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
        .skyBanner {position:fixed; bottom:100px;right:10px;z-index:10;}
        .skyBanner li{margin-top:15px;}

        .evt_counter {height:100px; background:#000; font-size:18px; color:#fff}
        .evt_counter .counter {position:relative; width:1120px; margin:0 auto}
        .evt_counter .counter .left_area {text-align:center; padding-top:15px; font-size:24px}
        .evt_counter .counter .left_area img {margin-right:20px}
        .evt_counter .counter span {font-family: Tahoma, Verdana, Geneva, sans-serif; font-size:42px; letter-spacing:-1px; font-weight:600; padding:0 10px; color:#f1d58b}
        .evt_counter .counter p {font-size:11px; margin-top:10px; color:#ccc}


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1555_top_bg.jpg) no-repeat center top;}
        .evtTopInmg {position:relative; width:1120px; margin:0 auto}
        .evt01 {background:#d7d7d7; border-bottom:7px solid #fff}
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
            background:#8e5e32;
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

        .evt02 {background:#9d8c7c;}
        .evt03 {background:#8e5e32;}
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
    </style>

    <div class="evtContent NGR" id="evtContainer">        
        <ul class="skyBanner"> 
            <li><a href="#none" onClick='alert("COMING SOON!! ")'><img src="https://static.willbes.net/public/images/promotion/2020/03/1555_sky02.png" title="라이브"></a></li>           
            <li><a href="#none" onClick='alert("COMING SOON!! ")'><img src="https://static.willbes.net/public/images/promotion/2020/03/1555_sky01.png" title="적중이벤트"></a></li>
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
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_top.jpg" title="2019년 경찰 2차 합격 풀케어 서비스">
            </div>
        </div>

        <div class="evtCtnsBox evt01" id="evt01">

            <div class="d-day NSK">
                2020년 경찰1차 러닝메이트 최종합격 프로젝트
                @if(empty($arr_base['dday_data'][0]['DDay']) === false)
                    <p class="NSK-Black">필기시험까지 <span>D{{$arr_base['dday_data'][0]['DDay']}}</span></p>
                @endif
                <!--
                <p>체력시험까지 <span>D-00</span></p>
                <p>면접시험까지 <span>D-00</span></p>
                <p>최종합격발표까지 <span>D-00</span></p>
                -->
            </div>
            <div class="btnJoin NGEB">
                <a href="#none" onclick="doEvent(); return false;" target="_blank">
                경찰 1차시험 인증이벤트<br> <span>참여하기  ></span>
                </a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_01.jpg" alt="이 모든 혜택을 드립니다.">
            <ul>
                <li>
                    <span><img src="https://static.willbes.net/public/images/promotion/2020/03/1555_01_ing.gif" alt="진행중"></span>
                    <a href="#tab01" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab01_on.jpg" alt="사전예약" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab01.jpg" alt="사전예약" class="off">
                    </a>
                </li>
                <li>
                    <a href="#tab02">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab02_on.jpg" alt="합격예측" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab02.jpg" alt="합격예측" class="off">
                    </a>
                </li>
                <li>

                    <a href="#tab03">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab03_on.jpg" alt="체력시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab03.jpg" alt="체력시험" class="off">
                    </a>
                </li>
                <li>
                    <a href="#tab04">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab04_on.jpg" alt="면접시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab04.jpg" alt="면접시험" class="off">
                    </a>
                </li>
                <li>
                    <a href="#tab05">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab05_on.jpg" alt="최종합격" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab05.jpg" alt="최종합격" class="off">
                    </a>
                </li>
                <li>
                    <a href="#tab06">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab06_on.jpg" alt="최종합격서비스" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tab06.jpg" alt="최종합격서비스" class="off">
                    </a>
                </li>                
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tc01_01.jpg" title="사전예약 특전">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tc01_02.jpg" title="봉투모의고사">
            </div>

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tc01_03.jpg" title="합격풀케어 서비스">
            </div>           

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_tc01_04.jpg" usemap="#Map1555A" title="사전예약 이벤트" border="0">
                <map name="Map1555A" id="Map1555A">
                    <area shape="rect" coords="267,1725,605,1785" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" alt="이미지 다운로드" />
                </map>
            </div>

            {{--홍보url댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
        </div>

        <div id="tab02" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
        </div>

        <div id="tab03" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
        </div>

        <div id="tab04" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
        </div>

        <div id="tab05" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">
        </div>

        <div id="tab06" class="comingsoon">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1555_comingsoon.jpg" alt="coming soon">  
        </div> 
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
            var url = "{{front_url('/predict/index/100004')}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=no,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }

        /*tab*/
        $(document).ready(function(){
            $('.evt01 ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                //$active.addClass('active');
                $content = $($active[0].hash);

                $links.not($active).each(function () {
                    $(this.hash).hide();
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