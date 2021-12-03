@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /************************************************************/

        .evt00 {background:#f4f1f3}
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/10/2389_top_bg.jpg) no-repeat center 100px; padding-top:100px}
        .evt02 {background:#e9e9e9}
        
        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {line-height:61px; font-size:24px; margin-right:10px; position: relative;}
        .time li:first-child,
        .time li:last-child {line-height:1.3; color:#363635}
        .time li:first-child {margin-right:20px}
        .time li:last-child {margin-left:20px}
        .time li:first-child span {color:#be25da}        
        .time li:last-child span {font-size:14px; background:#be25da; color:#fff; border-radius:20px; padding:3px 8px; position:absolute; width:100%; left:0; top:0; z-index: 2; border:2px solid #f4f1f3} 
        .time li:last-child a {display:block; color:#fff; background:#242424; padding:10px 20px; margin-top:20px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time .d_day {color:#fff;font-size:30px;} 

        .jbMenu {display:none}
        .jbMenu {position:absolute; top:0px; width:100%; background:#f4f1f3; display:block; z-index:100}
        .jbFixed {position:fixed; top: 0px}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evt00 jbMenu cf" data-aos="fade-down">
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>오직 이 곳에서만!</span><br>
                        SECRET 선물 마감까지
                    </li>
                    <li><img id="dd1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="dd2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">일</li>
                    <li><img id="hh1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="hh2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="mm1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="mm2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li class="time_txt">:</li>
                    <li><img id="ss1" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li><img id="ss2" src="https://static.willbes.net/public/images/promotion/common/0.png" /></li>
                    <li>
                        <span class="NSK">스타터팩 + 웰컴팩 100% 제공!</span>
                        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" target="_blank">지금 가입하기 ></a>
                    </li>          
                </ul>
            </div> 
        </div> 

        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/10/2389_top.jpg" alt="윌비스 공무원 스타터팩"/>    
                <a href="https://pass.willbes.net/promotion/index/cate/3019/code/2225" title="웰컴팩 혜택 보기" target="_blank" style="position: absolute; left: 65.75%; top: 62.4321%; width: 15.1785%; height: 3.6512%; z-index: 2;"></a>
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" title="회원가입" target="_blank" style="position: absolute; left:29.8%; top: 77.52%; width: 40.357%; height:9.9%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/10/2389_01.jpg" alt="준비된 직렬별 라인업" />
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img  src="https://static.willbes.net/public/images/promotion/2021/10/2389_02.jpg" alt="할인 쿠폰"/>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[0]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[0] : ''}}'); return false;"; title="2만원 할인" style="position: absolute; left: 56.607%; top: 40.481%; width: 18.393%; height: 3.574%; z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[1]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[1] : ''}}'); return false;"; title="15만원 할인" style="position: absolute;left: 17.52%;width: 10.804%;top: 76.35%;height: 2.845%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[2]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[2] : ''}}'); return false;"; title="20만원 할인" style="position: absolute;left: 44.52%;width: 10.804%;top: 76.35%;height: 2.845%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[3]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[3] : ''}}'); return false;"; title="5만원 할인" style="position: absolute;left: 71.52%;width: 10.804%;top: 76.35%;height: 2.845%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[4]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[4] : ''}}'); return false;"; title="10만원 할인" style="position: absolute;left: 17.52%;width: 10.804%;top: 94.25%;height: 2.845%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[5]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[5] : ''}}'); return false;"; title="5만원 할인(최우영 교수)" style="position: absolute;left: 44.552%;width: 10.804%;top: 94.25%;height: 2.845%;z-index: 2;"></a>
                <a href="javascript:void(0);" onclick="javascript:giveCheck('{{empty($arr_promotion_params['arr_give_idx']) === false && empty(explode(',',$arr_promotion_params['arr_give_idx'])[6]) === false ? explode(',',$arr_promotion_params['arr_give_idx'])[6] : ''}}'); return false;"; title="3만원 할인(장사원 교수)" style="position: absolute;left: 71.52%;width: 10.804%;top: 94.25%;height: 2.845%;z-index: 2;"></a>                
            </div>
            <div class="wrap">
                <img  src="https://static.willbes.net/public/images/promotion/2021/10/2389_03.jpg" alt="기본 혜택"/>
                <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2003" title="회원가입" target="_blank" style="position: absolute; left: 8.304%; width: 83.571%; top: 75.313%; height: 8.521%; z-index: 2;"></a>
            </div>
        </div>                   
    </div>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>
    <!-- End Container -->
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );
    </script>

    <script type="text/javascript"> 
        /* 스크롤배너*/
        $( document ).ready( function() {
            var jbOffset = $( '.jbMenu' ).offset();
                $( window ).scroll( function() {
                    if ( $( document ).scrollTop() > jbOffset.top ) {
                $( '.jbMenu' ).addClass( 'jbFixed' );
            }
            else {
                    $( '.jbMenu' ).removeClass( 'jbFixed' );
                }
            });
        });

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });

        {{--쿠폰발급--}}
        var $regi_form = $('#regi_form');
        function giveCheck(give_idx) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params["give_type"]}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params["comment_chk_yn"]}}'+'&give_idx='+give_idx;
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {alert('쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');}
            }, showValidateError, null, false, 'alert');
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
@stop