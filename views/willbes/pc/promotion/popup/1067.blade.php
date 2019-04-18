@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .willbes-Layer-PassBox {height:700px; overflow-y:scroll;}
    .eventPop {width:100%; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;}
    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul li {border-bottom:1px solid #e4e4e4; padding:10px; display:inline; float:left; width:50%}
    .eventPopS1 strong {display:block; margin-bottom:10px}
    .eventPopS1 ul:after {content:""; display:block; clear:both}
    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
    .btnsSt3 a:hover {background:#fff; color:#333 !important}
    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}
    select,
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
    input[type=number]:focus,
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
</style>

<div class="willbes-Layer-PassBox NGR">
    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        {!! method_field($arr_base['method']) !!}
        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $arr_base['data']['ElIdx'] }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>

        <div class="eventPop">
            <h3>
                온라인 <span class="tx-bright-blue">독해첨삭반</span> 예약접수
            </h3>
            <div class="eventPopS1">
                <ul>
                    <li>
                        <strong>* 성명</strong>
                        <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" title="성명" readonly="readonly"/>
                    </li>
                    <li>
                        <strong>* 전화번호</strong>
                        <input type="number" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처"/>
                    </li>
                </ul>
            </div>

            <div class="btnsSt3">
                <a href="javascript:fn_submit()">예약 접수하기</a>
                <a href="javascript:close();">취소</a>
            </div>
        </div>
    </form>
</div>
<!--willbes-Layer-PassBox//-->

<script>
    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        if (!confirm('저장하시겠습니까?')) { return true; }
        ajaxSubmit($regi_form_register, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                window.close();
            }
        }, showValidateError, null, false, 'alert');
    }
</script>
@stop