@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">   
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed; top:200px; width:190px; text-align:center; right:10px;z-index:101;}
        .sky a {display:block; margin-bottom:20px}        

        .evttop {background:url(https://static.willbes.net/public/images/promotion/2022/05/2674_top_bg.jpg) no-repeat center top;}

        .evt01 {background:#ececec;}

        .evt02 {background:#f1f1f1;}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2674_03_bg.jpg) no-repeat center top;position:relative;}
        .reserve {position:absolute;left:50%;bottom:5%;margin-left:-490px;}     

        /*타이머*/
        .time {width:1120px; margin:0 auto; text-align:center; padding:20px 0}
        .time ul {width:100%; display:flex; justify-content: center;}
        .time li {line-height:61px; font-size:24px; margin-right:10px; position: relative;}
        .time li:first-child,
        .time li:last-child {line-height:1.3; color:#363635}
        .time li:first-child {margin-right:20px}
        .time li:last-child {margin-left:20px}
        .time li:first-child span {line-height:2.5;color:#0FC360;}        
        .time li:last-child span {line-height:2.5; color:#363635;font-weight:bold;} 
        .time li:last-child a {display:block; color:#fff; background:#242424; padding:10px 20px; margin-top:20px}
        .time li img {width:44px}
        .time .time_txt {color:#000; letter-spacing:-1px}
        .time .time_txt span {color:#d63e4d; animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        .time .d_day {color:#fff;font-size:30px;}

        .jbMenu {display:none}
        .jbMenu { width:100%; background:#f4f1f3; display:block; z-index:100}
        .jbFixed {position:fixed; top:0px}

    </style>

    <div class="evtContent NSK" id="evtContainer">  
        <div class="sky" id="QuickMenu">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_sky.png" alt="적중 50선" usemap="#Map2674" border="0" >
            <map name="Map2674" id="Map2674">
                <area shape="rect" coords="6,135,182,205" href="#evt03" />
                <area shape="rect" coords="7,215,182,288" href="#evt04" />
                <area shape="rect" coords="7,294,183,368" href="#evt05" />
            </map>                
        </div>

        <div class="evtCtnsBox evt00 jbMenu cf" data-aos="fade-down">
            <div class="time NSK-Black" id="newTopDday">
                <ul>
                    <li>
                        <span>2022.6.18. 지방직 9급 시험까지</span>                
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
                        <span class="NSK">남았습니다.</span>                        
                    </li>          
                </ul>
            </div> 
        </div>

        <div class="evtCtnsBox evttop" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_top.jpg" title="지방직 적중 50선">                       
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_01.jpg" title="여러분을 위해">                       
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">                 
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_02.jpg" title="적중 문항">                       
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="evt03">           
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_03.jpg" title="적중 라이브 편성표">
            <div class="reserve">
                <a href="javascript:void(0)" onclick="javascript:fn_submit();" title="예약하기">
                    <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_reserve.gif" title="문자 알림 받기">
                </a>
            </div>               
        </div>

        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="register_chk[]"  id ="register_chk" value="{{ (empty($arr_base['register_list']) === false) ? $arr_base['register_list'][0]['ErIdx'] : '' }}"/>
            <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명"/>
            <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
            <input type="hidden" name="register_type" value="promotion" readonly="readonly"/>
        </form>

        <div class="evtCtnsBox evt04" data-aos="fade-up" id="evt04">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_04.jpg" title="자료 다운로드"> 
                @if(sess_data('is_login') === true)
                    <a href="@if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif" @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') target="_blank" @endif title="다운로드" style="position: absolute; left: 66.88%; top: 49.24%; width: 24.73%; height: 41.62%; z-index: 2;"></a>
                @else
                    <a href="javascript:loginCheck();" title="다운로드" style="position: absolute; left: 66.88%; top: 49.24%; width: 24.73%; height: 41.62%; z-index: 2;"></a>
                @endif
            </div>
            <div class="liveWrap">
                @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
                    @include('willbes.pc.promotion.live_video_youtube_partial')
                @else
                    @include('willbes.pc.promotion.live_video_partial')
                @endif
            </div>  
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif                
        </div>

        <div class="evtCtnsBox evt05" data-aos="fade-up" id="evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2674_05.jpg" title="소문내기 이벤트"> 
                <a href="https://gall.dcinside.com/board/lists/?id=government" target="_blank" title="공무원 갤러리" style="position: absolute; left: 15.09%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://cafe.daum.net/9glade" target="_blank" title="구꿈사" style="position: absolute; left: 29.91%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://cafe.naver.com/gugrade" target="_blank" title="공드림" style="position: absolute; left: 44.11%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://www.instagram.com" target="_blank" title="인스타그램" style="position: absolute; left: 58.39%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
                <a href="https://www.willbes.net/classroom/home/index" target="_blank" title="게시판" style="position: absolute; left: 73.13%; top: 91.6%; width: 14.38%; height: 6.33%; z-index: 2;"></a>
            </div>

            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif

        </div> 
	</div>

    <!-- End Container -->

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
    </form>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });       

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

        function fn_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $regi_form_register = $('#regi_form_register');
            var _url = '{!! front_url('/event/registerStore') !!}';
            if (!confirm('신청하시겠습니까?')) { return true; }
            ajaxSubmit($regi_form_register, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                    location.reload();
                }
            }, showValidateError, null, false, 'alert');
        }

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }

        /*디데이카운트다운*/
        $(document).ready(function() {
            dDayCountDown('{{$arr_promotion_params['edate']}}','{{$arr_promotion_params['etime'] or "00:00"}}');
        });
        
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')
    
@stop