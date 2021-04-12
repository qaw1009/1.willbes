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
        
        .wb_top,
        .wb_01 {background:#f5efe1;}

        .wb_top > div,
        .wb_01 > div,
        .wb_04 > div {width:1120px; margin:0 auto; position:relative}

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

        .wb_04 {background:#439900; padding-top:100px} 

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
            <a href="#evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky.jpg" title="웰컴 키드 받기">
            </a>     
            <a href="#evt_03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky3.jpg" title="보너스 선물">
            </a>              
        </div>

        <div class="evtCtnsBox wb_top">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2102_top.jpg" title="4월 신규가입" />
                <a title="4월 신규가입" style="position: absolute; left: 38.48%; top: 57%; width: 22.5%; height: 42.89%; z-index: 2;" href="{{ sess_data('is_login') === true ? 'javascript:alert("이미 로그인 상태입니다.");' : 'https://www.willbes.net/member/join/?ismobile=0&sitecode=2001' }}" @if(sess_data('is_login') !== true) target="_blank" @endif></a>
            </div>
        </div>  

        <div class="evtCtnsBox wb_01">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/04/2102_01.jpg" title="4월 월컴키트" />
                <a title="4월 월컴키트" style="position: absolute; left: 27.86%; top: 70.35%; width: 44.11%; height: 8.04%; z-index: 2;" href="{{ sess_data('is_login') === true ? 'javascript:alert("이미 로그인 상태입니다.");' : 'https://www.willbes.net/member/join/?ismobile=0&sitecode=2001' }}" @if(sess_data('is_login') !== true) target="_blank" @endif></a>
            </div>
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

        <div class="evtCtnsBox wb_04" id="evt_03">
            <div>
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_04.jpg" usemap="#Map2102d" title="스마트폰 배경화면 다운받기" border="0" />
                <a title="그레이" style="position: absolute; left: 23.66%; top: 56.33%; width: 9.82%; height: 2.06%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif"></a>
                <a title="네이비" style="position: absolute; left: 44.82%; top: 56.33%; width: 9.82%; height: 2.06%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[1] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif"></a>
                <a title="그린" style="position: absolute; left: 66.52%; top: 56.33%; width: 9.82%; height: 2.06%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[2] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif"></a>
                <a title="퍼플" style="position: absolute; left: 34.2%; top: 83.11%; width: 9.82%; height: 2.06%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[3] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif"></a>
                <a title="핑크" style="position: absolute; left: 55.63%; top: 83.17%; width: 9.82%; height: 2.06%; z-index: 2;" href="@if(empty($file_yn) === false && $file_yn[4] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif"></a>
            </div>
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

            @if(sess_data('is_login') === true)
                @if(strtotime($arr_base['member_info']['JoinDate']) < strtotime('202103160000') || $arr_base['member_info']['interest'] != '718001') {{-- 관심직렬 => 경찰 --}}
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