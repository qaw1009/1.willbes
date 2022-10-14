@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}

    .evtTop {position:relative}

    .evtMenu {background:#f3f3f3; width:100%; border-bottom:1px solid #edeff0; border-top:1px solid #edeff0}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:25%}
    .tabs li a {display:block; text-align:center; font-size:16px; line-height:1.5; padding:15px 0; color:#999; font-weight:bold; letter-spacing:-1px;}
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}


    .evt03 {padding-bottom:50px}
    .evt03 p {margin:0 10px 30px; background:#363636; color:#ffcc00; padding:10px; font-size:2vh; font-weight:bold;
        animation:upDown 2s infinite;-webkit-animation:upDown 2s infinite;}
        @@keyframes upDown{
        from{color:#fff}
        50%{color:#ffcc00}
        to{color:#fff}
        }
        @@-webkit-keyframes upDown{
        from{color:#fff}
        50%{color:#ffcc00}
        to{color:#fff}
        }

    .evt03 ul {margin:0 10px}
    .evt03 li {display:flex; justify-content: center; padding-bottom: 5%;}
    .evt03 li a {display:block; padding:20px 0; margin-left:5px; border-radius:10px; border:3px solid #000; font-size:1.6vh; width:90%;}
    .evt03 li span {display:block; color:#BA2933}
    .evt03 li span:nth-child(2) {font-size:3vh; font-weight:bold; color:#BA2933;}
    .evt03 li span:nth-child(3) { color:#777777; font-size: 30px; font-weight:bold;}
    .evt03 li:last-child span:nth-child(2) { color:#777777;}
    .evt03 li:last-child span:nth-child(3) { color:#BA2933;}
    .evt03 li span:last-child {background:#BA2933; color:#fff; padding:10px 0; margin:10px 10px 0; border-radius:5px;font-size:2vh;}
    .evt03 li span:last-child a {margin:0; font-size: 22px; }
    .evt03 li strong {font-size:1.6vh;font-weight:bold;display: block; color: #DBCB99;}

    .evt04 {padding:30px 0; background:#2a2a2a}    
    .evt04 li {display:inline; float:left; width:50%; font-size:16px; font-weight:bold}
    .evt04 li span {display:block; font-size:14px; font-weight:normal}
    .evt04 li a {display:block; padding:20px 0; margin:0 5px 0 10px; background:#4a35f3; color:#fff; border-radius:5px; }
    .evt04 li:last-child a {background:#fff; color:#2a2a2a; margin:0 10px 0 5px;} 
    .evt05 {background:#2a2a2a}
    
    .evt06 {background:#2a2a2a; padding:30px 0}
    .evt06 div {color:#cfcfcf; font-size:20px; margin-bottom:20px}
    .evt06 div span {color:#f0aa31; }
    .evt06 li {display:inline; float:left; text-align:center}
    .evt06 li:nth-child(1) {width:45%}
    .evt06 li:nth-child(1) img {width:100%; max-width:196px}
    .evt06 li:nth-child(2) {width:30%; color:#fff; font-size:40px;  position:relative;}
    .evt06 li:nth-child(2) span {color:#e81123; font-size:50px; }
    .evt06 li:nth-child(2) span:after {
        content: '';
        width: 80%;
        height: 1px;
        display: block;
        position: absolute;
        margin-top: 0;
        left:50%;
        margin-left:-40%;
        border-bottom: 1px solid #fff;
    }
    .evt06 li:nth-child(3) {width:25%}
    .evt06 li:nth-child(3) img {width:100%; max-width:94px}
    .evt06 p {color:#cfcfcf; font-size:14px; margin-top:20px}

    .video-container-box {}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}    

    .evtFooter {margin:0 auto; padding:30px 0; text-align:left; color:#666; line-height:1.4;background:#2a2a2a }
    .evtFooter h3 {font-size:2vh; margin:0 20px 20px; color:#f3f3f3; background:#161616; text-align:center; padding:10px 0}
    .evtFooter .infoBox {padding:0 20px}
    .evtFooter p {margin-bottom:10px; color:#ccc; font-size:1.6vh;}
    .evtFooter p span {display:inline-block; font-size:1.1vh; padding-bottom:5px; vertical-align:middle}
    .evtFooter div,
    .evtFooter ul {margin-bottom:20px; padding:0 10px; font-size:1.6vh}
    .evtFooter li {margin-left:20px; list-style-type: decimal; color:#ccc; margin-bottom:10px}
    .evtFooter li span {color:#777}

    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}
    

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
        .evt04 br {display:block}
        .evt06 li img {width:80%}
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
        .evt04 br {display:none}
        .evt05 .curriculum {column-count: 2; column-gap:40px; column-rule:1px solid #e4e4e4}
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {

    }
</style>

<div id="Container" class="Container NSK c_both">       
    <div class="evtCtnsBox evtTop" data-aos="fade-down">
        <img src="https://static.willbes.net/public/images/promotion/2022/10/1676m_top.jpg" alt="" > 
    </div>  

    <div class="evtMenu" data-aos="fade-up">
        <ul class="tabs">
            <li><a href="#tab01" data-tab="tab01" class="top-tab">반반&똑똑이란?</a></li>
            <li><a href="#tab02" data-tab="tab02" class="top-tab">다시보기</a></li>
            <li><a href="#tab03" data-tab="tab03" class="top-tab">방송보기</a></li>
            <li><a href="#tab04" data-tab="tab04" class="top-tab">유의사항</a></li>
        </ul>
    </div> 
    
    <div class="evtCtnsBox evt01" id="tab01" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1676m_01.jpg" alt="" >
    </div>

    <div class="evtCtnsBox evt03" id="tab02" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1676m_02.jpg" alt="" >
        <ul>
            <li>
                <a href="https://pass.willbes.net/m/lecture/show/cate/3019/pattern/only/prod-code/201886" target="_blank">
                    <span>반반모고&똑똑영어</span>
                    <span>10월 방송</span>
                    <span>다시보기</span>
                    <span><strong>6만원으로</strong>방송 다시보기 ></span>
                </a>
            </li>
            <li>
                <a href="https://pass.willbes.net/m/periodPackage/show/cate/3019/pack/648001/prod-code/199952" target="_blank">
                    <span>2023 대비</span>
                    <span>반반똑똑</span>
                    <span>다시보기 PASS</span>
                    <span><strong>2023 지방직까지 </strong>방송 다시 보기 ></span>
                </a>
            </li>
            <li>
                <a href="https://pass.willbes.net/m/promotion/index/cate/3019/code/2180" target="_blank">
                    <span>2023 대비</span>
                    <span>한덕현 영어<br></span>
                    <span>T-PASS</span>
                    <span><strong>더켠쌤과 함께</strong>열공하고 합격하기 ></span>
                </a>
            </li>
        </ul>
    </div>

    <div class="evtCtnsBox evt04" id="tab03" data-aos="fade-up">
        <ul>
            <li>
                <a href="@if(!sess_data('is_login')) {{'javascript:alert(\'로그인 후 서비스 이용이 가능합니다\')'}} @else @if(empty($arr_base['promotion_live_file_yn']) === false && $arr_base['promotion_live_file_yn'] == 'Y') {{ front_url($arr_base['promotion_live_file_link']) }} @else {{ $arr_base['promotion_live_file_link'] }} @endif @endif">
                    <span>반반&똑똑영어</span>
                    자료<br> 다운받기 >
                </a>
            </li>
            <li>
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank">
                    <span>1주차/3주차 무료</span>
                    온라인 모의고사<br> 접수하기 >
                </a>
            </li>
        </ul>
    </div>

    {{-- 라이브 방송 --}}
    <div class="evtCtnsBox evt05" data-aos="fade-up">
        @if(empty($data['PromotionLivePlayer']) === false && $data['PromotionLivePlayer'] == 'youtube')
            @include('willbes.m.promotion.live_video_youtube_partial')
        @else
            {{-- TODO --}}
            {{-- @include('willbes.m.promotion.live_video_partial') --}}
        @endif
    </div>

    {{-- 출석체크 추가신청 form --}}
    <form id="add_apply_form" name="add_apply_form">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        {{-- <input type="hidden" name="apply_chk_el_idx" value="{{ $data['ElIdx'] }}"/> --}}
        <input type="hidden" name="event_register_chk" value="N"/>
        @foreach($arr_base['add_apply_data'] as $row)
            @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                <input type="hidden" name="add_apply_chk[]" value="{{$row['EaaIdx']}}" />
                @break;
            @endif
        @endforeach
    </form>

    {{-- 출석체크 --}}
    <div class="evtCtnsBox evt06" data-aos="fade-up">
        <div>개근 시 출석 <span>선물 증정!</span></div>
        <ul>
            <li><img src="https://static.willbes.net/public/images/promotion/2020/06/1676m_05_txt.png" alt="" ></li>
            <li><span class="NSK-Black">{{$arr_base['add_apply_member_login_count']}}</span>회</li>
            <li>
                @php $apply_check = false; @endphp
                @foreach($arr_base['add_apply_data'] as $row)
                    @if(time() >= strtotime($row['ApplyStartDatm']) && time() < strtotime($row['ApplyEndDatm']))
                        @if($row['MemberLoginCnt'] == '0')
                            <a href="javascript:fn_add_apply_submit();">
                                <img src="https://static.willbes.net/public/images/promotion/2020/06/1676m_check.png" alt="출석전">
                            </a>
                        @else
                            <a href="javascript:alert('이미 출석체크 하셨습니다.');">
                                <img src="https://static.willbes.net/public/images/promotion/2020/03/1588_stamp_check.png" alt="출석후">
                            </a>
                        @endif
                        @php $apply_check = true; @endphp
                        @break;
                    @endif
                @endforeach
                @if($apply_check === false)
                    <a href="javascript:alert('출석체크 기간이 아닙니다.');">
                        <img src="https://static.willbes.net/public/images/promotion/2020/06/1676m_check.png" alt="출석전">
                    </a>
                @endif
            <li>
        </ul>
        <p>* 출석체크 경품에 대한 자세한 사항은<br> PC버전을 통해 확인해주시기 바랍니다.</p>
    </div>

    <div class="evtCtnsBox evtFooter" id="tab04" data-aos="fade-up">
        <h3 class="NSK-Black">반반&똑똑 유의사항 꼭! 확인하기</h3>
        <div class="infoBox">
            <ul>
                <li>더켠의 반반&똑똑영어는 사전에 촬영, 촬영분을 실시간으로 송출해드리는 방송이오니 방송 시간에 맞추어 본 페이지에 접속 후 수강하시면 됩니다.
                (*2주에 1회 진행하는 온라인 모의고사에 대한 해설 방송은 실시간 LIVE로 진행됩니다.)</li>
                <li>윌비스 통합사이트에 로그인한 회원이라면 누구나 온라인 무료수강 가능합니다.</li>

                <li>더켠의 반반&똑똑영어 과정 진행 안내 (총 20회)<br>
                - 매주 월/수/금 21:00~22:00 반반한 모의고사 (모의고사 10문항), 10회분<br>
                - 매주 화/목 21:00~21:40 똑똑영어 (어휘), 8회분<br>
                - 1주차/3주차 월~금 : 무료 온라인 모의고사 접수 진행<br>
                - 1주차/3주차 토~일 : 무료 온라인 모의고사 응시 기간<br>
                - 10/24(월), 11/7(월) 오후 7~8시 : 모의고사 해설 방송 진행 (실시간 LIVE), 2회분
                </li>

                <li>본 방송은 방송 종료 후 유료 동영상 강의로 전환됩니다.<br>
                단, 정규방송과의 형평성을 고려하여 방송 후 1주일 뒤 동영상 서비스가 제공됩니다.</li>

                <li>강의 자료 제공 일정 안내<br>
                - 방송 당일 오후 12시~오후 21시40분 : 문제 자료 (사전에 인쇄하여 풀어보신 후 수업에 참여바랍니다.)<br>
                - 방송 당일 오후 21시40분~자정 : 문제+해설+스터디 자료</li>
                <li>본 방송은 PC 및 모바일로 시청 가능합니다.<br>
                - PC의 경우 익스플로러와 크롬 브라우저에서만 시청 가능합니다.<br>
                - 모바일 기기 접속 시 3G/LTE 데이터 요금이 부과되오니 데이터 사용량을 사전에 확인해주시기 바랍니다.</li>
                <li>열공 출첵 이벤트 관련<br>
                - 본 이벤트는 로그인 후 참여 가능하며, 10/17(월)~11.11(금)까지 총 20회 진행됩니다. (*토~일 제외)<br>
                - 출석체크 가능 시간 반반 21:00~22:00, 똑똑 21:00~21:40, 모의고사 해설 LIVE (10/24(월), 11/7(월) 19:00~20:00 내에 페이지 새로고침 (F5) 후 출석체크 버튼 클릭 시 정상 인정되며, 방송이 종료되지 않더라도 해당 시간 이외에는 출석으로 인정되지 않습니다.<br>
                - 당첨자 안내 공지는 11/16(수) 윌비스 공무원 공지사항을 통해 확인하실 수 있습니다.</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Container -->

<link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
<script src="/public/js/willbes/dist/aos.js"></script>
<script>
    $(document).ready( function() {
    AOS.init();
    });
</script>

<script type="text/javascript">
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

    {{-- 출석 체크 --}}
    function fn_add_apply_submit() {
        {{--
        @if(date('YmdHi') < '202004132100' && ENVIRONMENT == 'production')
        alert('4월13일 21:00 부터 이벤트 참여 가능합니다.');
        return;
        @endif
        --}}

        var $add_apply_form = $('#add_apply_form');
        var _url = '{!! front_url('/event/addApplyStore') !!}';

        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}

        if (typeof $add_apply_form.find('input[name="add_apply_chk[]"]').val() === 'undefined') {
            alert('이벤트 기간이 아닙니다.'); return;
        }

        if (!confirm('출첵하시겠습니까?')) { return true; }
        ajaxSubmit($add_apply_form, _url, function(ret) {
            if(ret.ret_cd) {
                alert( getApplyMsg(ret.ret_msg) );
                location.reload();
            }
        }, function(ret, status, error_view) {
            alert( getApplyMsg(ret.ret_msg || '') );
        }, null, false, 'alert');
    }

    {{-- 이벤트 추가 신청 메세지 --}}
    function getApplyMsg(ret_msg) {
        {{-- 해당 프로모션 종속 결과 메세지 --}}
        var apply_msg = '';
        var arr_apply_msg = [
            ['이미 신청하셨습니다.', '이미 출첵하셨습니다.'],
            ['신청 되었습니다.', '출첵 완료!']
            {{--
            ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ['마감되었습니다.','이벤트 기간에 응모해주세요. 당일 20:00부터 시작됩니다.']
            --}}
        ];

        for (var i = 0; i < arr_apply_msg.length; i++) {
            if(arr_apply_msg[i][0] == ret_msg) {
                apply_msg = arr_apply_msg[i][1];
            }
        }
        if(apply_msg == '') apply_msg = ret_msg;
        return apply_msg;
    }

</script>

@stop