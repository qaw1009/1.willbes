@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

@php
    if (date('YmdH') < '2019071917') { show_alert('잘못된 접근 입니다.','close'); }
@endphp

<!-- Container -->
<style type="text/css">
    h3 {color:#115087; text-align:center; padding:20px 0; font-size:20px; font-weight:600; border-bottom:2px solid #c14842}}
    span {vertical-align:auto}
	select {height:28px;line-height:28px}
	input[type=text],
	input[type=password],
	input[type=number]{height:26px;line-height:26px;border:1px solid #979797; padding:0 5px}
	input[type=text]:focus,
	input[type=password]:focus,
	input[type=number]:focus{border:1px solid #00a2e2;background:#edf6fb;color:#464d61; padding:0 5px}
	input[type=text].readonly,
	input[type=password].readonly,
    input[type=number].readonly{border:1px solid #d8dee3;background:#f1f3f4; padding:0 5px}
    input[type=file] {width:70%}		
	
	.Layerpop {background:#FFF; border:#4582cd solid 3px; padding:30px}
	.Layerpop h1 {text-align:left; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#000; margin-bottom:20px}
	.Layerpop .tit {font-size:16px; color:#4582cd; font-weight:bold; letter-spacing:1px; text-align:left; padding:0; margin-bottom:10px}
	.Layerpop .ck {padding-left:5px}
	.Layerpop p {margin:10px 0 0 0}
	
	.Layerpop .termsBx01{padding:0px 20px ; height:80px;overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5}
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  {margin-top:15px}
	.Layerpop .termsBx01 ul li p {padding-left:6px}
	.Layerpop .termsBx01 .span { height:60px; text-align:right}	
    
    .termsBx p {font-size:16px; margin-bottom:10px; font-weight:bold}
    .termsBx li {margin-bottom:10px} 
    .termsBx {margin-bottom:20px}
    .termsBx a {display:block; width:250px; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:50px; line-height:50px;
        font-size:18px; border-bottom:5px solid #6b1612; margin-bottom:20px;
    }
    .termsBx a:hover {background:#a8312b;}
    .termsBx li {display:inline; float:left; margin-right:10px}
    .termsBx:after {content:''; display:block; clear:both} 

    .Layerpop .btn a {width:100px; display:block; text-align:center; background:#c14842; color:#fff; margin:30px auto 0; height:40px; line-height:40px}
    .Layerpop .btn a:hover {background:#000;}
</style>

<div class="willbes-Layer-PassBox NGR">
    <div id="popup" class="Layerpop" >
        <form name="regi_form_register" id="regi_form_register" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field($arr_base['method']) !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $arr_base['data']['ElIdx'] }}"/>
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="file_chk" value="Y"/>
            <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="수강생정보"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="수강생정보"/> {{-- 체크 항목 전송 --}}
            
            <div id="request">
                <h3>윌비스 신광은경찰 합격자의 밤 신청 </h3>
                <div class="termsBx">
                    <p  class="tit">수강생 정보</p>
                    <ul>
                        <li>
                            <input type="text" id="register_name" name="register_name" value="{{sess_data('mem_name')}}" readonly="readonly">
                        </li>
                        <li>
                            <input type="text" id="userId" name="userId" value="{{sess_data('mem_id')}}" title="아이디" placeholder="아이디" readonly="readonly"/>
                        </li>
                        <li>
                            <input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" placeholder="전화번호 숫자만 입력." maxlength="11">
                        </li>
                        <li>
                            <input type="text" id="register_data1" name="register_data1" value="" placeholder="합격청">
                        </li>
                        <li>
                            <input type="text" id="register_data2" name="register_data2" value="" placeholder="응시번호">
                        </li>
                    </ul>
                </div>

                <div class="termsBx">
                    <a href="{{ (empty($arr_base['arr_file']) === true) ? '' : front_url('/promotion/download?file_idx='.$arr_base['arr_file']['EfIdx'].'&event_idx='.$arr_base['data']['ElIdx']) }}" class="file">참여신청 양식 파일 받기 ↓</a>

                    <p class="tit">참여신청 양식 등록</p>
                    <input type="file" name="attach_file" id="attach_file" style="width:300px"><br>
                    <div class="mt10">• 참여신청 양식 파일 2MB까지 업로드 가능하며, 이미지파일 (jpg, png, gif 등) 또는 PDF파일 형태로 첨부</div>
                </div>

                <div class="termsBx01">
                    <h2>개인정보 수집/이용 동의 안내</h2>
                    <ul>
                        <li>
                        1. 개인정보 수집 이용 목적<br>
                        - 신청자 본인 확인 및 신청 접수 및 문의사항 응대<br>
                        - 통계분석 및 마케팅<br>
                        - 윌비스 신광은경찰학원의 신상품이나 새로운 서비스, 이벤트 등 최신 정보 및 광고성 정보 제공
                        </li>
                        <li>
                        2. 개인정보 수집 항목<br>
                        - 필수항목 : 성명, 연락처, 이메일
                        </li>
                        <li>
                        3. 개인정보 이용기간 및 보유기간<br>
                        - 이용 목적 달성 또는 신청자의 신청 해지 및 삭제 요청 시 파기
                        </li>
                        <li>
                        4. 신청자의 개인정보 수집 및 활용 동의 거부 시<br>
                        - 개인정보 수집에 동의하지 않으시는 경우 설명회 접수 및 서비스 이용에 제한이 있을 수 있습니다.
                        </li>
                        <li>
                        5. 입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3 자에게 제공되지 않으며 개인정보 처리방침에 따라 보호되고 있습니다.
                        </li>
                        <li>
                        6. 이벤트 진행에 따른 단체사진 및 영상 촬영에 대한 귀하의 초상권 사용을 동의하며, 해당 저작물에 대한 저작권은 윌비스에 귀속됩니다.
                        </li>
                    </ul>                    
                </div>
                <div class="mt10">
                    <input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> <label for="is_chk">윌비스에 개인정보 제공 동의하기(필수)</label>
                </div>

                <div class="btn">
                    <a href="#none" onclick="javascript:fn_submit();">신청하기</a>
                </div>
            </div>
        </form>  
	</div>
</div>
<!--willbes-Layer-PassBox//-->

<script>
    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        var is_login = '{{sess_data('is_login')}}';
        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return;
        }

        var files = $('#attach_file')[0].files[0];
        if (files === undefined || files == null || files == '') {
            alert('참여신청 양식을 등록해 주세요.');
            return false;
        }

        if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }

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