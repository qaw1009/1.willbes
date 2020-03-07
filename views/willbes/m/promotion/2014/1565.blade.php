@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
        .evtCtnsBox {width:100%; text-align:center; position:relative; font-size:0.867rem}    
        .evtCtnsBox > img {width:100%; max-width:1120px;}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2020/03/1565_top_bg.jpg) repeat-x left top} 

        .evtMenu {background:#fff; width:100%; border-bottom:1px solid #edeff0}        
        .tabs {width:100%; max-width:1120px; margin:0 auto;}
        .tabs li {display:inline; float:left; width:25%}
        .tabs li a {display:block; text-align:center; font-size:14px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
        .tabs li a:hover,
        .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
        .tabs:after {content:""; display:block; clear:both}             

        .evt01 {background:#fff; padding:100px 0}         
        .evt01 .dday {font-size:1rem; position:absolute; top:40%; left:50%; width:100%; margin-left:-50%; text-align:center;}
        .evt01 .dday strong {font-size:1.25rem;}
        .evt01 .dday img {display:inline-block; margin:0 20px; width:30px;
            -webkit-animation: vibrate-1 1s linear infinite both;
	        animation: vibrate-1 1s linear infinite both;
        }
        @@-webkit-keyframes vibrate-1 {
            0% {
                -webkit-transform: translate(0);
                        transform: translate(0);
            }
            20% {
                -webkit-transform: translate(-2px, 2px);
                        transform: translate(-2px, 2px);
            }
            40% {
                -webkit-transform: translate(-2px, -2px);
                        transform: translate(-2px, -2px);
            }
            60% {
                -webkit-transform: translate(2px, 2px);
                        transform: translate(2px, 2px);
            }
            80% {
                -webkit-transform: translate(2px, -2px);
                        transform: translate(2px, -2px);
            }
            100% {
                -webkit-transform: translate(0);
                        transform: translate(0);
            }
        }
        @@keyframes vibrate-1 {
            0% {
                -webkit-transform: translate(0);
                        transform: translate(0);
            }
            20% {
                -webkit-transform: translate(-2px, 2px);
                        transform: translate(-2px, 2px);
            }
            40% {
                -webkit-transform: translate(-2px, -2px);
                        transform: translate(-2px, -2px);
            }
            60% {
                -webkit-transform: translate(2px, 2px);
                        transform: translate(2px, 2px);
            }
            80% {
                -webkit-transform: translate(2px, -2px);
                        transform: translate(2px, -2px);
            }
            100% {
                -webkit-transform: translate(0);
                        transform: translate(0);
            }
        }

        .evt01 .dday span {color:#ff0066; box-shadow:inset 0 -10px 0 rgba(0,0,0,0.1);}
        
        
        .evt02 {background:#f6f6f6; padding-top:100px}       
        .evt02 .evt02Txt01 {font-size:1.25rem; line-height:1.1; margin-top:40px; letter-spacing:-1px; color:#ff0066}
        .evt02 .evt02Txt01 span {font-size:1.5rem; box-shadow:inset 0 -20px 0 rgba(0,0,0,.1);}

        .evt03 {background:#fff; padding-top:100px}

        .evt04 {background:#ececec; padding:100px 0 50px}
        .evt04 img {border-bottom:1px solid #e4e4e4; max-width:940px;}
        .evt04 h4 {color:#383368; font-size:18px}
        .evt04 .columns {padding:20px;
            column-count: 1;
            column-gap:20px;
        }
        .evt04 .columns div {            
            text-align:justify; font-size:14px; line-height:1.4;
            display:inline-block; 
            padding:20px; border:1px solid #eee; border-radius:10px;
            margin-bottom:20px; color:#666; background:#fff;
        }
        .evt04 .columns div p {border-bottom:1px solid #eee; margin-bottom:10px; padding-bottom:10px}
        .evt04 .columns div:hover {box-shadow:0 10px 10px rgba(102,102,102,0.2); color:#000}

        .evt05 {background:#ff0066; padding-bottom:50px}
        .evt05 li a {display:block; font-size:0.8rem; color:#fff; padding:20px 0; text-align:center; background:#000; line-height:1.5; border-radius:10px; margin:0 1.5%;}
        .evt05 li a:hover {background:#fff; color:#000; 
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        .evt05 li span {display:block; font-size:1.25rem}
        .evt05 ul:after {content:""; display:block; clear:both}   

        .video-container-box {padding:20px}
        .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;} 
        .video-container iframe,
        .video-container object,
        .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

        .fixed {position:fixed; width:100%; background:rgba(255,255,255,0.5);
            background:#fff; box-shadow:0 10px 10px rgba(102,102,102,0.2); z-index:10
        }   

        .btnbuy {width:100%; position:fixed; bottom:5px;}
        .btnbuy a {display:block; width:95%; max-width:940px; margin:0 auto; font-size:1.5rem; background:#000; color:#fff; padding:15px 0; text-align:center; border-radius:50px; line-height:1.4}
        .btnbuy a span {font-size:1.2rem;} 
        .btnbuy a:hover {background:#ff0066; 
            -webkit-animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
	        animation: shadow-drop-2-center 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }
        @@-webkit-keyframes shadow-drop-2-center {
            0% {
                -webkit-transform: translateZ(0);
                        transform: translateZ(0);
                -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
            100% {
                -webkit-transform: translateZ(50px);
                        transform: translateZ(50px);
                -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
            }
        }
        @@keyframes shadow-drop-2-center {
            0% {
                -webkit-transform: translateZ(0);
                        transform: translateZ(0);
                -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
                        box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
            }
            100% {
                -webkit-transform: translateZ(50px);
                        transform: translateZ(50px);
                -webkit-box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
                        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.35);
            }
        }
        /* 폰 가로, 태블릿 세로*/
        @@media only all and (min-width: 408px)  {   

        }

        /* 태블릿 세로 */
        @@media only all and (min-width: 768px) {
            .tabs li a {font-size:16px; padding:25px 0;}
            .evt01 .dday {font-size:1.2rem;}
            .evt01 .dday strong {font-size:1.75rem;}
            .evt01 .dday img {width:40px;}
            .evt01 .dday span {box-shadow:inset 0 -20px 0 rgba(0,0,0,0.1);}           
            .evt02 .evt02Txt01 {font-size:1.5rem;}
            .evt02 .evt02Txt01 span {font-size:1.75rem; box-shadow:inset 0 -25px 0 rgba(0,0,0,.1);}
            .video-container-box {width:768px; margin:0 auto; padding:0}
            .evt04 .columns {column-count: 2;}
            .evt05 {padding-bottom:70px}
            .btnbuy br {display:none}
        }

        /* 태블릿 가로, PC */
        @@media only all and (min-width: 1024px) {
            .evt01 .dday {font-size:2.0rem;}
            .evt01 .dday strong {font-size:2.5rem;}
            .evt01 .dday img {width:68px;}
            .evt01 .dday span {box-shadow:inset 0 -25px 0 rgba(0,0,0,0.1);}            
            .evt02 .evt02Txt01 {font-size:1.75rem;}
            .evt02 .evt02Txt01 span {font-size:2rem; box-shadow:inset 0 -30px 0 rgba(0,0,0,.1);}
            .video-container-box {width:980px; margin:0 auto; padding:0}
            .evt04 .columns {width:980px; margin:0 auto}
            .evt05 ul {width:940px; margin:0 auto;}
            .evt05 li a {font-size:24px;}
            .evt05 {padding-bottom:100px}
        }       
    </style>
<div id="pass" style="display: none">
    <input type="checkbox" name="y_pkg" value="162747" checked/>
    <input type="checkbox" id="is_chk" name="is_chk" value="Y" checked/>
</div>

<div id="Container" class="Container NG c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_top.jpg" alt="창업 다마고치" >    
        <div class="evtMenu">
            <ul class="tabs">
                <li><a href="#tab01" data-tab="tab01" class="top-tab active">사전예약 이벤트</a></li>
                <li><a href="#tab02" data-tab="tab02" class="top-tab">인플루언서</a></li>
                <li><a href="#tab03" data-tab="tab03" class="top-tab">e커머스 강좌소개</a></li>
                <li><a href="#tab04" data-tab="tab04" class="top-tab">BEST 수강후기</a></li>
            </ul>
        </div>  
    </div>       

    <div id="tab01">
        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_01.jpg" alt="사전예약 이벤트" >
            <div class="dday NSK-Thin">신청마감 <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_img01.png" alt="시계" ><strong class="NSK-Black"><span id="ddayCountText"></span> 남았습니다.</strong></div>
        </div>
    </div>

    <div id="tab02">
        <div class="evtCtnsBox evt02">
            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/v8vHoj2Cpt8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="evt02Txt01">
                안녕하세요. 올해 대학을 졸업했고,<br>
                대학 졸업 전 취업보다는 창업을 선택해,<br>
                무재고로 쇼핑몰 사업을 하고 있는 <span class="NSK-Black">황채영</span>입니다. 
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_02.jpg" alt="인플루언서" >
        </div>   
    </div>  

    <div id="tab03">
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_01.jpg" alt="e커머스 강좌소개" >

            <div class="video-container-box">
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/pRQcUkiDs30" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_02.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_03.jpg" alt="e커머스 강좌소개" ><br>
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_03_04.jpg" alt="e커머스 강좌소개" ><br>
        </div>
    </div>

    <div id="tab04">
        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_04_01.png" alt="BEST 수강후기" >
            <div class="columns">
                <div>
                    <h4>신*화 대표님</h4>
                    <p></p>
                    스터디끝나고 고민하시는 분들에게 완전 강추합니다. 정문진 강사님과는 다르게 또 다른 스타일로 알차게 커리큘럼이 짜여있어서 좋았습니다. 
                </div>  
                <div>
                    <h4>김*훈 대표님</h4>
                    <p></p>
                    쇼핑몰을 처음 시작하면서 여러 실수도 많고 어려움도 많았습니다. 황채영 선생님을 만나 제가 몰랐던 부분들을
                    많이 채워갔습니다. 쇼핑몰 기본부터 판매전략, 상품관리, 운영관리, 그리고 문제해결까지.<br>
                    소핑몰 운영에 관련하 새로운 관점과 노하우를 많이 얻어가는 기회였습니다. 선생님께 다시한번 감사의 말씀을 전합니다.
                </div> 
                <div>
                    <h4>박*현 대표님</h4>
                    <p></p>
                    수업시간에 알기쉽게 설명해 주시고 질의에 대해서도 잘 답변해주셔서 감사했습니다. 그리고 수업시간 외에 개인적으로
                    질문했을 때에도 친절하게 답변해주셔서 감동이었답니다! 2020년 첫 수업 같이해서 좋았어요^^ <br>
                    서로 번창해서 다시 만나요 ^^!
                </div>  
                <div>
                    <h4>이*원 대표님</h4>
                    <p></p>
                    강사님의 친절한 강의에 모르는 부분을 많이 알 수 있는 교육이였습니다. 초보셀러인 저에게는 많은 도움이 되었습니다.<br>
                    감사합니다.
                </div> 
                <div>
                    <h4>조*희 대표님</h4>
                    <p></p>
                    샵플링을 처음 활용해봐서 시작할 때는 많이 힘들었는데 강사님께서 귀에 쏙쏙 들어오게 알려주셔서 잘 배웠습니다. 
                    강사님의 도움으로 많이 성장했습니다. 프로그램 활용하기에는 아직 미흡한 점이 많지만 알려주신 내용을 토대로
                    열심히 해보겠습니다 :)
                </div>
                <div>
                    <h4>김*아 대표님</h4>
                    <p></p>
                    정적으로 가르쳐 주셔서 한 달간 감사했습니다. 많이 배운 것 같은데 여전히 많이 어렵습니다 선생님^^ <br>
                    어린 나이에 그 자리에 왜 계신지 알 것 같은 시간이였습니다.
                </div>        
            </div>                
        </div>
        <div class="evtCtnsBox evt05">
            <img src="https://static.willbes.net/public/images/promotion/2020/03/1565_04_02.jpg" alt="BEST 수강후기" >
            <ul>
                <li>
                    <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">
                    <span class="NSK-Black">지금, 사전예약 </span>
                    신청하고 1억 만들기 도전! → 
                    </a>
                </li>
            </ul>
        </div>	
    </div>

    <div class="btnbuy NSK-Black">        
        <a href="javascript:goCartNDirectPay('pass', 'y_pkg', 'on_lecture', 'on_lecture', 'Y');">
            <span class="NSK">미리 신청하면 24%할인!</span><br>
            사전예약 신청하기 >
        </a>
    </div>
</div>
<!-- End Container -->

    <script type="text/javascript">
        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDownText('{{$arr_promotion_params['edate']}}');
        });

        /*스크롤고정*/
        $(function() {
            var nav = $('.evtMenu');
            var navTop = nav.offset().top+100;
            var navHeight = nav.height()+10;
            var showFlag = false;
            nav.css('top', -navHeight+'px');
            $(window).scroll(function () {
                var winTop = $(this).scrollTop();
                if (winTop >= navTop) {
                    if (showFlag == false) {
                        showFlag = true;
                        nav
                            .addClass('fixed')
                            .stop().animate({'top' : '0px'}, 100);
                    }
                } else if (winTop <= navTop) {
                    if (showFlag) {
                        showFlag = false;
                        nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                            nav.removeClass('fixed');
                        });
                    }
                }
            });
        });

        $(window).on('scroll', function() {
            $('.top-tab').each(function() {
                if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                    $('.top-tab').removeClass('active')
                    $(this).addClass('active');
                }
            });
        });

        function goCartNDirectPay(ele_id, field_name, cart_type, learn_pattern, is_direct_pay)
        {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form = $('#' + ele_id);
            var $prod_code = $regi_form.find('input[name="' + field_name + '"]:checked');   // 상품코드
            var $is_chk = $regi_form.find('input[name="is_chk"]');  // 동의여부
            var params;

            if ($is_chk.length > 0) {
                if ($is_chk.is(':checked') === false) {
                    alert('이용안내에 동의하셔야 합니다.');
                    return;
                }
            }

            if ($prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            {{-- 장바구니 저장 기본 파라미터 --}}
                params = [
                { 'name' : '{{ csrf_token_name() }}', 'value' : '{{ csrf_token() }}' },
                { 'name' : '_method', 'value' : 'POST' },
                { 'name' : 'cart_type', 'value' : cart_type },
                { 'name' : 'learn_pattern', 'value' : learn_pattern },
                { 'name' : 'is_direct_pay', 'value' : is_direct_pay }
            ];

            {{-- 선택된 상품코드 파라미터 --}}
            $prod_code.each(function() {
                params.push({ 'name' : 'prod_code[]', 'value' : $(this).val() + ':613001:' + $(this).val() });
            });

            {{-- 장바구니 저장 URL로 전송 --}}
            formCreateSubmit('{{ front_url('/cart/store') }}', params, 'POST');
        }

        // 날짜차이 계산
        var dDayDateDiff = {
            inDays: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
            },
            inWeeks: function(dd1, dd2) {
                var tt2 = dd2.getTime();
                var tt1 = dd1.getTime();

                return parseInt((tt2-tt1)/(24*3600*1000*7));
            },
            inMonths: function(dd1, dd2) {
                var dd1Y = dd1.getFullYear();
                var dd2Y = dd2.getFullYear();
                var dd1M = dd1.getMonth();
                var dd2M = dd2.getMonth();

                return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
            },
            inYears: function(dd1, dd2) {
                return dd2.getFullYear()-dd1.getFullYear();
            }
        };

        {{--
         * 프로모션용 디데이카운터 텍스트
         * @@param end_date [마감일 (YYYY-MM-DD)]
        --}}
        function dDayCountDownText(end_date, ele_id) {
            if(!ele_id) ele_id = 'ddayCountText';
            var arr_end_date = end_date.split('-');
            var event_day = new Date(arr_end_date[0], parseInt(arr_end_date[1]) - 1, arr_end_date[2], 23, 59, 59);
            var now = new Date();
            var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now));
            var date_left = String( dDayDateDiff.inDays(now, event_day) );
            var hour_left = String( timeGap.getHours() );
            var minute_left = String( timeGap.getMinutes() );
            var second_left = String(  timeGap.getSeconds() );

            if(date_left.length == 1) date_left = '0' + date_left;
            if(hour_left.length == 1) hour_left = '0' + hour_left;
            if(minute_left.length == 1) minute_left = '0' + minute_left;
            if(second_left.length == 1) second_left = '0' + second_left;

            if ((event_day.getTime() - now.getTime()) > 0) {
                $('#'+ele_id).html(date_left + '일 ' + hour_left + ':' + minute_left + ':' + second_left);

                setTimeout(function() {
                    dDayCountDownText(end_date, ele_id);
                }, 1000);
            } else {
                $('#'+ele_id).hide();
            }
        }

    </script>
@stop