@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:250px;right:25px;z-index:10;}
        .sky a { display:block; padding-bottom:15px;}

        .wb_top {background:#f5efe1;}

        .wb_01 {background:#f5efe1;}

        .wb_02 {position:relative;background:#414141}
        .wb_02 .circle01{position:absolute;left:39%;top:35%;margin-left:-100px;}
        .wb_02 .circle02{position:absolute;left:61%;top:37%;margin-left:-100px;}
        .wb_02 .circle03{position:absolute;left:38%;top:64%;margin-left:-100px;}
        .wb_02 .circle04{position:absolute;left:59%;top:64%;margin-left:-100px;}

        .wb_02 div a img.on {display:none;position:absolute;z-index:1;text-align:center;}
        .wb_02 div a img.off {display:block}
        .wb_02 div a.active img.on,
        .wb_02 div a:hover img.on {display:block;text-align:center;}
        .wb_02 div a.active img.off,
        .wb_02 div a:hover img.off {display:none}
        .wb_02 div:after {content:""; display:block; clear:both}

        .wb_03 {background:#439900;} 

        .wb_04 {background:#439900;} 

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
             <a href="#evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky.jpg" title="웰컴 키드 받기">
            </a>       
            <a href="#evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky2.jpg" title="추가 이벤트">
            </a>        
            <a href="#evt_03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky3.jpg" title="보너스 선물">
            </a>              
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_top.jpg" usemap="#Map2102a" title="3월 첼린지" border="0" />
            <map name="Map2102a" id="Map2102a">
                <area shape="rect" coords="2,509,252,898" href="{{ sess_data('is_login') === true ? 'javascript:alert("이미 로그인 상태입니다.");' : 'https://www.willbes.net/member/join/?ismobile=0&sitecode=2001' }}" @if(sess_data('is_login') !== true) target="_blank" @endif/>
                <area shape="rect" coords="867,508,1120,906" href="javascript:certOpen();" alt="응시반허 인증하기">
            </map>
        </div>  

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_01.jpg" usemap="#Map2102b" title="3월 월컴키트" border="0" />
            <map name="Map2102b" id="Map2102b">
                <area shape="rect" coords="317,817,803,906" href="{{ sess_data('is_login') === true ? 'javascript:alert("이미 로그인 상태입니다.");' : 'https://www.willbes.net/member/join/?ismobile=0&sitecode=2001' }}" @if(sess_data('is_login') !== true) target="_blank" @endif/>
            </map>
        </div>  

        <div class="evtCtnsBox wb_02" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02.jpg" title="월컴키트" />
            <div class="circle01">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_01.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_01h.png" alt="" class="on">
                </a>    
            </div> 
            <div class="circle02">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_02.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_02h.png" alt="" class="on">
                </a>    
            </div>  
            <div class="circle03">
                <a href="#none;">                                 
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_03.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_03h.png" alt="" class="on">
                </a>    
            </div>  
            <div class="circle04">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_04.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_04h.png" alt="" class="on">
                </a>
            </div>  
        </div>

        <form id="add_apply_form" name="add_apply_form">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>

            <div class="evtCtnsBox wb_03" id="evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_03.jpg" usemap="#Map2102c" title="추가 이벤트" border="0" />
                <map name="Map2102c" id="Map2102c">
                    <area shape="rect" coords="210,852,512,903" href="javascript:void(0)" onclick="fn_promotion_etc_submit();"/>
                    <area shape="rect" coords="617,862,750,904" href="https://www.willbes.net/classroom/qna/index" target="_blank" />
                    <area shape="rect" coords="764,861,897,904" href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" />
                </map>
            </div>
        </form>

        <div class="evtCtnsBox wb_04" id="evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_04.jpg" usemap="#Map2102d" title="스마트폰 배경화면 다운받기" border="0" />
            <map name="Map2102d" id="Map2102d">
                <area shape="rect" coords="269,1017,369,1047" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
                <area shape="rect" coords="509,1017,609,1048" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" />
                <area shape="rect" coords="749,1016,849,1047" href="@if(empty($file_yn) === false && $file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" />
                <area shape="rect" coords="388,1500,489,1530" href="@if(empty($file_yn) === false && $file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" />
                <area shape="rect" coords="629,1500,728,1530" href="@if(empty($file_yn) === false && $file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(empty($arr_promotion_params) === false)
                var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
                window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

        function fn_promotion_etc_submit() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            @if(ENVIRONMENT == 'production' && sess_data('is_login') === true)
                @if($arr_base['member_info']['JoinDate'] < '202103160000' || $arr_base['member_info']['interest'] != '718001') {{-- 관심직렬 => 경찰 --}}
                    alert('신규회원만 참여 가능합니다.');
                    return;
                @endif
            @endif

            var $add_apply_form = $('#add_apply_form');
            var _url = '{!! front_url('/event/promotionEtcStore') !!}';

            if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.href = '{!! front_url('/cart/index?tab=book') !!}';
                    // location.reload();
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg) );
            }, null, false, 'alert');
        }

        // 이벤트 추가 신청 메세지
        function getApplyMsg(ret_msg) {
            {{-- 해당 프로모션 종속 결과 메세지 --}}
            var apply_msg = '';
            var arr_apply_msg = [
                ['처리 되었습니다.','장바구니에 담겼습니다.'],
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