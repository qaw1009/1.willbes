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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
        .skyBanner {position:fixed; bottom:250px;right:10px;z-index:10;}
        .skyBanner li{margin-top:15px;} 

        .evt_counter {height:100px; background:#000; font-size:18px; color:#fff}
        .evt_counter .counter {position:relative; width:1120px; margin:0 auto}
        .evt_counter .counter .left_area {text-align:center; padding-top:25px; font-size:24px}   
        .evt_counter .counter .left_area img {margin-right:20px}
        .evt_counter .counter span {font-family: Tahoma, Verdana, Geneva, sans-serif; font-size:42px; letter-spacing:-1px; font-weight:600; padding:0 10px}   

  
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2019/08/1361_top_bg.jpg) no-repeat center top;}
        .evtTopInmg {position:relative; width:1120px; margin:0 auto}
        .evt01 {background:#d7d7d7; border-bottom:7px solid #fff}
        .evt01 .d-day {
            position:absolute;
            width:500px;
            left:50%; 
            top:115px;
            margin-left:-250px;
            font-size:24px;
            font-family: "NotoSansCJKkr-Black", "Noto Sans KR", "sans-serif" !important;
            color:#000;
            line-height:1.5;
            z-index:5;
        }
        .evt01 .d-day p {font-size:45px}
        .evt01 .d-day span {color:#2784d2}
        .evt01 .btnJoin {
            position:absolute;
            width:324px;
            left:50%; 
            top:890px;            
            margin-left:-164px;    
            line-height:1.5;
            z-index:5;
        }
        .evt01 .btnJoin a {
            display:block;
            border-radius:24px;
            padding:20px 0;
            font-size:24px;
            font-family: "NotoSansCJKkr-Black", "Noto Sans KR", "sans-serif" !important;
            text-align:center;
            color:#fff;
            background:#2784d2;
        }        
        .evt01 .btnJoin a:hover {
            background:#000;
        }
        .evt01 .btnJoin a span {
            font-size:30px;
        }
        .evt01 ul {width:1120px; margin:0 auto;}
        .evt01 li {display:inline; float:left; width:20%}
        .evt01 li a img.on {display:none}
        .evt01 li a img.off {display:block}
        .evt01 li a.active img.on,
        .evt01 li a:hover img.on {display:block}
        .evt01 li a.active img.off,
        .evt01 li a:hover img.off {display:none}
        .evt01 ul:after {content:""; display:block; clear:both}

        .evt02 {background:#18294d;}        
        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2019/08/1361_03_bg.jpg) no-repeat center top;}
        .evt03 div {
            position:absolute;
            width:408px;
            left:50%; 
            top:1436px;
            margin-left:-203px;
            font-size:24px;
            font-family: "NotoSansCJKkr-Black", "Noto Sans KR", "sans-serif" !important;
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
            font-family: "NotoSansCJKkr-Black", "Noto Sans KR", "sans-serif" !important;
            text-align:center;
            color:#fff;
            background:#2784d2;
        } 
        .evt03 .btnlec a:hover {
            background:#000;
        }
        .evt04 {background:#f6f6f6;} 
        .evt05 {background:#fff;} 

    </style>

    <div class="evtContent NGR" id="evtContainer">
        <ul class="skyBanner">
            <li><a href="javascript:alert('Coming Soon!');"><img src="https://static.willbes.net/public/images/promotion/2019/08/1361_sky_banner1.png" title="토크쇼"></a></li>
            <li><a href="javascript:alert('Coming Soon!');"><img src="https://static.willbes.net/public/images/promotion/2019/08/1361_sky_banner2.png" title="적중이벤트"></a></li>
        </ul>

        <!--
        <div class="evtCtnsBox evt_counter">
            <div class="counter">
                <div class="left_area NGEB">
                    <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_live_camera.png" alt="">
                    경찰합격 풀케어 서비스 이용현황<span>1,770,232</span>건
                </div>
            </div>
        </div>
        -->

        <div class="evtCtnsBox evtTop">
            <div class="evtTopInmg">              
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_top.jpg" title="2019년 경찰 2차 합격 풀케어 서비스">
            </div>        
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <div class="d-day">
                2019년 경찰 2차 러닝메이트 최종합격 프로젝트
                @if(empty($arr_base['dday_data'][0]['DDay']) === false)
                    <p>필기시험일까지 <span>D{{$arr_base['dday_data'][0]['DDay']}}</span></p>
                @endif
            </div>
            <div class="btnJoin">
                <a href="#none" onclick="javascript:doEvent();">
                    경찰 2차 시험 응시생 <br>
                    <span>인증하기  ></span>
                </a>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_01.jpg" alt="이 모든 혜택을 드립니다.">
            <ul>
                <li>
                    <a href="#tab01" class="active">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab01_on.jpg" alt="사전예약" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab01.jpg" alt="사전예약" class="off">
                    </a>
                </li>
                <li>
                    <a href="#none" onClick='alert("COMING SOON!! ")'>
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab02_on.jpg" alt="합격예측" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab02.jpg" alt="합격예측" class="off">
                    </a>
                </li>
                <li>
                    <a href="#none" onClick='alert("COMING SOON!! ")'>
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab03_on.jpg" alt="체력시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab03.jpg" alt="체력시험" class="off">
                    </a>
                </li>
                <li>
                    <a href="#none" onClick='alert("COMING SOON!! ")'>
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab04_on.jpg" alt="면접시험" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab04.jpg" alt="면접시험" class="off">
                    </a>
                </li>
                <li>
                    <a href="#none" onClick='alert("COMING SOON!! ")'>
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab05_on.jpg" alt="최종합격" class="on">
                        <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_tab05.jpg" alt="최종합격" class="off">
                    </a>
                </li>
            </ul>
        </div>

        <div id="tab01">
            <div class="evtCtnsBox evt02">
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_02.jpg" title="사전예약 특전">
            </div>

            <div class="evtCtnsBox evt03">
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_03.jpg" title="봉투모의고사">
                <div>
                    <span><img class="remainCnt" src="https://static.willbes.net/public/images/promotion/2019/08/1361_number0.png"></span>
                    <span><img class="remainCnt" src="https://static.willbes.net/public/images/promotion/2019/08/1361_number0.png"></span>
                    <span><img class="remainCnt" src="https://static.willbes.net/public/images/promotion/2019/08/1361_number0.png"></span>
                </div>
                <div class="btnlec">
                    {{--<a href="https://police.willbes.net/pass/event/show/ongoing?event_idx=381" target="_blank">실물 봉투 모의고사 신청하기 ></a>--}}                    
                </div>
            </div>            

            <div class="evtCtnsBox evt04">
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_04.jpg" title="합격풀케어 서비스">
            </div>

            <div class="evtCtnsBox evt05">
                <img src="https://static.willbes.net/public/images/promotion/2019/08/1361_05.jpg" title="사전예약 이벤트">
            </div>

            {{--홍보url댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial')
            @endif
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
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{front_url('/predict/index/' . (empty($arr_promotion_params['PredictIdx']) === true ? '' : $arr_promotion_params['PredictIdx']))}}";
            window.open(url,'event', 'scrollbars=no,toolbar=no,resizable=yes,width=660,height=700,top=50,left=100');
        }

        function doEvent2() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.', '') !!}
            var url = "{{ site_url('/promotion/popup/' . $arr_base['promotion_code']) }}" ;
            window.open(url,'event2', 'scrollbars=no,toolbar=no,resizable=yes,width=665,height=629,top=50,left=100');
        }

        /*tab*/
        $(document).ready(function(){
            $('.evt02 ul').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
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

                    e.preventDefault();
                });
            });

            setPredictRegisterCnt(); //선착순 남은수량 세팅
        });

        //선착순 남은수량 세팅
        function setPredictRegisterCnt(){
            var predict_register_cnt = {{$arr_base['predict_register_cnt']}};
            var product_limit_cnt = 815; //상품 제한갯수
            var remain_cnt = product_limit_cnt - predict_register_cnt;
            var remain_str = '';

            //문자열 앞에 0붙이기
            if(remain_cnt > 0){
                for(i=String(remain_cnt).length; i<3; i++){
                    remain_str += '0';
                }
                remain_str = remain_str + String(remain_cnt);

                $('.remainCnt').each(function(i){
                    $(this).attr('src','https://static.willbes.net/public/images/promotion/2019/08/1361_number'+remain_str.substr(i,1)+'.png');
                });
            }
        }

    </script>

@stop