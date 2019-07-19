@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

@php
    if (date('YmdH') < '2019071517') { show_alert('잘못된 접근 입니다.','close'); }
@endphp

<!-- Container -->
<style type="text/css">
    
    span {vertical-align:auto}
    select {height:28px;line-height:28px}
    input[type=radio],
    input[type=checkbox] {width:16px; height:16px; margin-right:5px}
	input[type=text],
	input[type=number]{height:26px;line-height:26px;border:1px solid #979797; padding:0 5px}
	input[type=text]:focus,
	input[type=number]:focus{border:1px solid #00a2e2;background:#edf6fb;color:#464d61; padding:0 5px}
	input[type=text].readonly,
    input[type=number].readonly{border:1px solid #d8dee3;background:#f1f3f4; padding:0 5px}
    input[type=file] {height:26px;line-height:26px;width:70%}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}		
    
    .willbes-Layer-PassBox {padding:0; margin:0}
    h1 {color:#fff; text-align:center; padding:20px 0; font-size:20px; font-weight:600; background:#000;}
	.Layerpop {background:#FFF; padding:30px 30px 50px; line-height:1.5}
    .Layerpop h3 {font-size:16px; color:#4582cd; font-weight:bold; letter-spacing:1px; text-align:left; padding:0; margin:20px 0 10px}
    .Layerpop h3:first-child {margin-top:0}
    
    .termsBx {margin-bottom:20px}
    .termsBx li {margin-bottom:10px; list-style:disc; margin-left:15px} 
    .termsBx li strong {display:inline-block; width:100px;}
    .termsBx li span {color:#1087ef}
    .termsBx p {font-size:16px; margin-bottom:10px; font-weight:bold}
    .termsBx a {display:inline-block; width:280px; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:26px; line-height:26px;
        font-size:12px; border-bottom:2px solid #6b1612; border-right:1px solid #6b1612; vertical-align:auto}
    .termsBx a:hover {background:#a8312b;}
    .termsBx input[type=button] {display:inline-block; color:#fff; background:#4582cd; text-align:center; padding:0 15px; height:26px; line-height:26px; border:0}
	
	.termsBx01{padding:0px 20px; height:100px; overflow:hidden; overflow-y:scroll; border:1px solid #cecece}
	.termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.termsBx01 .st  {margin-top:15px}
	.termsBx01 ul li {margin-bottom:10px}
	.termsBx01 .span { height:60px; text-align:right}   

    .Layerpop .btn {text-align:center; border-top:1px solid #ccc; padding-top:20px; margin-top:20px}
    .Layerpop .btn a {width:100px; display:inline-block; font-size:16px; text-align:center; background:#c14842; color:#fff; height:40px; line-height:40px}
    .Layerpop .btn a:hover {background:#000;}
    .Layerpop .btn a:last-child {background:#333;}
</style>

<div class="willbes-Layer-PassBox NGR">
    <h1>2019년 경찰시험 1차 합격수기 등록하기</h1>
    <div id="popup" class="Layerpop" >
        <form name="regi_form_register" id="regi_form_register" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field($arr_base['method']) !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $arr_base['data']['ElIdx'] }}"/>
            <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}">
            <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
            <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="file_chk" value="Y"/>
            <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>

            <input type="hidden" name="CertIdx" id="CertIdx" value="{{$arr_cert['cert_idx']}}">
            <input type="hidden" name="CertTypeCcd" id="CertTypeCcd" value="{{$arr_cert['cert_data']['CertTypeCcd']}}">

            <div id="request">                
                <div class="termsBx">
                    <h3 class="tit">[합격생 인증 정보]</h3>
                    <ul>
                        @php
                            $takekind = '';
                            $takearea = '';
                            $addcontent1 = '';

                            if(empty($arr_cert['apply_result']['TakeKind']) != true) {
                                $takekind = $arr_cert['apply_result']['TakeKind'];
                            }
                            if(empty($arr_cert['apply_result']['TakeArea']) != true) {
                                $takearea = $arr_cert['apply_result']['TakeArea'];
                            }
                            if(empty($arr_cert['apply_result']['AddContent1']) != true) {
                                $addcontent1 = $arr_cert['apply_result']['AddContent1'];
                            }
                        @endphp

                        <li><strong>회원명(아이디)</strong> <span>{{sess_data('mem_name')}}({{ substr(sess_data('mem_id'),0, (strlen(sess_data('mem_id'))-3)) }}***)</span></li>
                        <li><strong>응시 시험정보</strong>
                            <select  name="TakeKind" id="TakeKind" {{empty($arr_cert['apply_result']) != true ? 'disabled="disabled"' : ''}}>
                                <option value="">직렬선택</option>
                                @foreach($arr_cert['kind_ccd'] as $key => $val)
                                    <option value="{{$key}}" {{($key == $takekind ? 'selected="selected"' : '')}} >{{$val}}</option>
                                @endforeach
                            </select>
                            <select id="TakeArea" name="TakeArea" {{empty($arr_cert['apply_result']) != true ? 'disabled="disabled"' : ''}}>
                                <option value="">지역구분</option>
                                @foreach($arr_cert['area_ccd'] as $key => $val)
                                    <option value="{{$key}}" {{($key == $takearea ? 'selected="selected"' : '')}}>{{$val}}</option>
                                @endforeach
                            </select>
                            <input type="text" name="TakeNo" id="TakeNo"  numberOnly value="{{empty($arr_cert['apply_result']) != true ? $arr_cert['apply_result']['TakeNo'] : ''}}" placeholder="응시번호"  {{empty($arr_cert['apply_result']) != true ? 'disabled="disabled"' : ''}}>
                        </li>
                        <li>
                            <strong>합격 인증 파일</strong>
                            <input type="radio" id="AddContent11" name="AddContent1" value="필기합격" {{($addcontent1 == '필기합격' ? 'checked' : '')}} {{empty($arr_cert['apply_result']) != true ? 'disabled="disabled"' : ''}}> <label for="pass1"  class="mr10">필기합격</label>
                            <input type="radio" id="AddContent12" name="AddContent1" value="최종합격" {{($addcontent1 == '최종합격' ? 'checked' : '')}} {{empty($arr_cert['apply_result']) != true ? 'disabled="disabled"' : ''}}> <label for="pass2"  class="mr10">최종합격</label>
                            <input type="file" name="attachfile" id="attachfile" style="width:300px">
                            <div class="mt10">
                                - 합격생을 증빙할 수 있는 합격생 지원청별 합격자 발표 공고를 응시표와 함께 캡쳐하거나,
                                핸드폰으로 응시표와 함께 사진을 찍어서 등록해 주세요.<br>
                                - 이미지 파일(jpg, png) 또는 PDF 파일 첨부
                            </div>
                        </li>
                    </ul>

                    <h3  class="tit">[합격수기 공모]</h3>
                    <a href="{{ (empty($arr_base['arr_file']) === true) ? '' : front_url('/promotion/download?file_idx='.$arr_base['arr_file']['EfIdx'].'&event_idx='.$arr_base['data']['ElIdx']) }}" class="file">합격수기 양식 파일 다운로드 ↓</a>
                    <input type="file" name="attach_file" id="attach_file" style="width:180px">
                    <input type="button" onclick="javascript:modifyFile();" value="파일수정">
                    <div class="mt10">
                        - 반드시 위의 합격수기 양식 파일을 다운로드 받아서 작성해 주세요.<Br>
                        - 합격수기 양식은 개별 상황에 맞게 워드, 한글 파일 양식 중 하나를 첨부해 주시면 됩니다.<Br>
                        - 합격수기 장석 시 문서 내 항목을 모두 작성하셔야 하며, 무성의한 내용 및 허위 내용은 당첨에서 제외될 수 있습니다. 
                    </div>
                </div>

                <h3>[개인정보 수집/이용 동의 안내]</h3>
                <div class="termsBx01">
                    <ul>
                        <li>
                        1. 개인정보 수집 이용 목적<br>
                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 합격수기 이벤트 참여개인정보 수집 항목<br>
                        - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 응시표) 
                        </li>
                        <li>
                        2. 개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기 
                        </li>
                        <li>
                        3. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부 시 이벤트 신청이 불가능함을 알려드립니다.
                        </li>
                        <li>
                        4. 저작재산권 이용 허락<br>
                        - 제공해주신 합격수기 및 설문은 당사의 마케팅에 활용되며, 귀하의 승인으로 회사는 합격수기 등과 관련된 저작재산권 등 일체의 권리를 영구적으로 이용할 수 있습니다.
                        </li>
                    </ul>                    
                </div>
                
                <div class="mt10">
                    위의 내용을 이해하였으며, 위와 같은 개인정보 수집/이용 내용에
                    <input type="radio" id="is_chk1" name="is_chk" value="Y" class="ml10"> <label for="is_chk1">동의합니다.</label>
                    <input type="radio" id="is_chk2" name="is_chk" value="N" class="ml10"> <label for="is_chk2">동의하지 않습니다.</label>
                </div>

                <div class="btn">
                    <a href="#none" onclick="javascript:fn_submit();">등록</a>
                    <a href="#none" onclick="javascript:self.close();">취소</a>
                </div>
            </div>
        </form>  
	</div>
</div>
<!--willbes-Layer-PassBox//-->

<script type="text/javascript">
    $('#TakeKind').attr('readonly', 'true');

    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        @if(empty($arr_cert) === false && $arr_cert['cert_data']['ApprovalStatus'] != 'Y' )
            @if(empty($arr_cert) === false && $arr_cert['cert_data']["IsCertAble"] !== 'Y')
                alert("인증 신청을 할 수 없습니다.");return;
            @endif

            if ($('#TakeKind').val() == '') {
                alert('직렬을 선택해 주세요.');$('#TakeKind').focus();return;
            }
            if ($('#TakeArea').val() == '') {
                alert('지역을 선택해 주세요.');$('#TakeArea').focus();return;
            }
            if ($('#TakeNo').val() == '') {
                $('#TakeNo').focus();alert('응시번호를 등록해 주세요.');return;
            }
            if ($("input:radio[name='AddContent1']").is(':checked') == false) {
                $('#AddContent11').focus();alert('합격구분을 선택해 주세요.');return;
            }
            if ($('#attachfile').val() == '') {
                alert('인증파일을 등록해 주세요.');return;
            }
        @endif

        if ($("input:radio[name='is_chk']:checked").val() != 'Y') {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }

        if (!confirm('저장하시겠습니까?')) { return true; }

        @if($arr_cert['cert_data']['ApprovalStatus'] != 'Y' )
            @if($arr_cert['cert_data']["IsCertAble"] == 'Y')
                {{--인증 프로세스--}}
                var _check_url = '{!! front_url('/CertApply/checkTakeNumber/') !!}';
                    ajaxSubmit($regi_form_register, _check_url, function(ret) {
                    if(ret.ret_cd) {
                        //alert('정상적으로 등록되었습니다.');
                        submitEnd();
                    } else {
                        alert("인증 확인이 불가합니다. 운영자에게 문의하여 주십시오.");return;
                    }
                }, showValidateError, null, false, 'alert');
                {{--인증 프로세스--}}
            @else
                submitEnd();
            @endif
        @else
                submitEnd();
        @endif
    }

    function submitEnd() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        ajaxSubmit($regi_form_register, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                window.close();
            }
        }, showValidateError, null, false, 'alert');
    }

    function modifyFile()
    {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStoreForModifyFile') !!}';

        ajaxSubmit($regi_form_register, _url, function(ret) {
            if(ret.ret_cd) {
                alert(ret.ret_msg);
                window.close();
            }
        }, showValidateError, null, false, 'alert');
    }

    $("input:text[numberOnly]").on("keyup", function() {
        $(this).val($(this).val().replace(/[^0-9]/g,""));
    });
</script>
@stop