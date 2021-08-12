@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtCtnsBox .wrap {margin:0 auto; position:relative}
    .evtCtnsBox .wrap a:hover {box-shadow:0 5px 20px rgba(0,0,0,.5); border-radius:20px}

    .evtInfo {padding:50px 20px; font-size:14px}
    .evtInfoBox {text-align:left; line-height:1.4}
    .evtInfoBox h4 {font-size:30px; margin-bottom:40px}
    .evtInfoBox .infoTit {font-size:18px;margin-bottom:15px}
    .evtInfoBox ul {margin-bottom:30px}
    .evtInfoBox li {list-style-type:disc; margin-left:20px; margin-bottom:5px}
</style>


<div id="Container" class="Container NSK c_both"> 
    <div class="evtCtnsBox evt00" data-aos="fade-left">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1556m_00.jpg" alt="경찰학원부분 1위" >        
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_01.jpg" alt="기초 입문서 무료 배포 이벤트"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_02.jpg" alt="살펴보기"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_03.jpg" alt="진짜는 다르다"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_04.jpg"  alt="1+5 추가혜택"/>
    </div>

    <div class="evtCtnsBox" data-aos="fade-right">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2301m_05.jpg"  alt="무료 혜택"/>
            <a href="javascript:void(0);" onclick="fn_promotion_etc_submit();" title="2020 기초입문서" style="position: absolute; left: 20.83%; top: 30.23%; width: 57.92%; height: 8.23%; z-index: 2;"></a>
            <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][0]['EaaIdx'] or '' }});" title="3법 기초입문강의" style="position: absolute; left: 20.83%; top: 40.07%; width: 57.92%; height: 8.23%; z-index: 2;"></a>
            <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][1]['EaaIdx'] or '' }});" title="G-TELP 문법강의" style="position: absolute; left: 20.83%; top: 49.55%; width: 57.92%; height: 8.23%; z-index: 2;"></a>
            <a href="javascript:void(0);" onclick="fn_add_apply_submit({{ $arr_base['add_apply_data'][2]['EaaIdx'] or '' }});" title="한능검 기본개념편" style="position: absolute; left: 20.83%; top: 59.12%; width: 57.92%; height: 8.23%; z-index: 2;"></a>
            <a href="javascript:void(0);" onclick="giveCheck();" title="PASS 10%할인쿠폰" style="position: absolute; left: 20.83%; top: 68.6%; width: 57.92%; height: 8.23%; z-index: 2;"></a>
        </div>
    </div>

    <div class="evtCtnsBox evtInfo" id="careful">
        <div class="evtInfoBox">
            <h4 class="NSK-Black">이벤트 유의사항</h4>
            <ul>
                <li>본 이벤트는 준비된 수량이 조기 소진될 경우 이벤트 조기 종료 및 당첨이 취소 될 수 있습니다.</li> 
                <li>윌비스 회원대상으로 1개의 ID당 1번만 참여 가능하며, 비회원의 경우 신규가입 후 참여 가능합니다.</li> 
                <li>기초입문서 교재는 비매품으로 배송비는 본인 부담입니다. (배송비 2,500원)</li> 
                <li>입문서 무료로 받기 신청한 회원께서는 장바구니에 지급된 교재 배송비를 결제해 주셔야 출고가 진행됩니다.</li> 
                <li>기초입문서 이벤트 교재는 로그인>장바구니(교재) 확인가능합니다.</li> 
                <li>3법기초입문강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다. (기간 20일)</li> 
                <li>G-TELP 문법강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다. (기간 7일)</li> 
                <li>한능검 기본개념편 강의는 내강의실 >수강중인강의> 관리자 부여강좌(단과) 확인가능합니다(기간 7일)</li> 
                <li>PASS 10%쿠폰 및 단과 20%쿠폰은 온라인 전용이며 쿠폰현황에서 확인가능합니다.(유효기간 7일)</li>                
            </ul>		
        </div>
    </div> 
</div>

<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
</form>

<form id="add_apply_form" name="add_apply_form">
    {!! csrf_field() !!}
    {!! method_field('POST') !!}

    <input type="hidden" name="event_idx" value="{{ $data['ElIdx'] }}"/>
    <input type="hidden" name="register_type" value="promotion"/>
    <input type="hidden" name="event_register_chk" value="N"/>
    <input type="hidden" name="add_apply_chk[]" value="" />
</form>

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    $( document ).ready( function() {
        AOS.init();
    } );

    var $regi_form = $('#regi_form');
    var $add_apply_form = $('#add_apply_form');

    {{-- 무료 강좌지급 --}}
    function fn_add_apply_submit(eaa_idx) {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        var _url = '{!! front_url('/event/addApplyStore') !!}';

        if (!eaa_idx) {
            alert('이벤트 기간이 아닙니다.');
            return;
        }

        $add_apply_form.find('input[name="add_apply_chk[]"]').val(eaa_idx);

        if (!confirm('신청하시겠습니까?')) { return true; }
        ajaxSubmit($add_apply_form, _url, function(ret) {
            if(ret.ret_cd) {
                alert( getApplyMsg(ret.ret_msg) );
                location.reload();
            }
        }, function(ret, status, error_view) {
            alert( getApplyMsg(ret.ret_msg || '') );
        }, null, false, 'alert');
    }

    {{-- 무료 교재지급 --}}
    function fn_promotion_etc_submit() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        @if(empty($arr_promotion_params['cart_prod_code']) === false)
            var _url = '{!! front_url('/event/promotionEtcStore') !!}';

            if (!confirm('장바구니에 담으시겠습니까?')) { return true; }
            ajaxSubmit($add_apply_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert( getApplyMsg(ret.ret_msg) );
                    location.href = '{!! front_url('/cart/index?tab=book') !!}';
                }
            }, function(ret, status, error_view) {
                alert( getApplyMsg(ret.ret_msg) );
            }, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }

    // 이벤트 추가 신청 메세지
    function getApplyMsg(ret_msg) {
        {{-- 해당 프로모션 종속 결과 메세지 --}}
        var apply_msg = '';
        var arr_apply_msg = [
            ['처리 되었습니다.','장바구니에 담겼습니다.'],
            ['신청 되었습니다.','신청 되었습니다. 내강의실에서 확인해 주세요.'],
        ];

        for (var i = 0; i < arr_apply_msg.length; i++) {
            if(arr_apply_msg[i][0] == ret_msg) {
                apply_msg = arr_apply_msg[i][1];
            }
        }
        if(apply_msg == '') apply_msg = ret_msg;
        return apply_msg;
    }

    {{--쿠폰발급--}}
    function giveCheck() {
        {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

        @if(empty($arr_promotion_params['give_type']) === false || empty($arr_promotion_params['arr_give_idx_chk']) === false)
            var _check_url = '{!! front_url('/promotion/promotionEventCheck/') !!}?give_type={{$arr_promotion_params['give_type']}}&event_code={{$data['ElIdx']}}&comment_chk_yn={{$arr_promotion_params['comment_chk_yn']}}&arr_give_idx_chk={{$arr_promotion_params['arr_give_idx_chk']}}';
            ajaxSubmit($regi_form, _check_url, function (ret) {
                if (ret.ret_cd) {
                    alert('할인쿠폰이 발급되었습니다. \n\n내강의실에서 확인해 주세요.');
                }
            }, showValidateError, null, false, 'alert');
        @else
            alert('프로모션 추가 파라미터가 지정되지 않았습니다.');
        @endif
    }
</script>


@stop