@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

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
    .termsBx a {display:inline-block; border-radius:4px; color:#fff; background:#c14842; text-align:center; height:26px; line-height:26px;
        font-size:12px; border-bottom:2px solid #6b1612; border-right:1px solid #6b1612; vertical-align:auto; padding:0 20px}
    .termsBx a:hover {background:#a8312b;}
    .termsBx input[type=button] {display:inline-block; color:#fff; background:#4582cd; text-align:center; padding:0 15px; height:26px; line-height:26px; border:0}
    .youtubeID {border:1px solid #c14842; padding:10px; margin:20px 0; font-size:14px; font-weight:bold; color:#c14842; background:#fdeeed}
    .youtubeID input {margin-left:10px}
	
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
    <h1>윌비스 7급 PSAT 유튜브 채널 구독 인증</h1>
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

            <input type="hidden" name="check_take_no" value="N">    {{-- 응시번호 합격여부 체크 --}}

            <div id="request">                
                <div class="termsBx">
                    <h3 class="tit">[혜택안내]</h3>
                    <ul>
                        <li>윌비스 한림법학원 유튜브 채널 인증 시, 7급 PSAT CORE특강 10% 할인쿠폰 제공</li>
                    </ul>
                    <h3 class="tit">[인증방법]</h3>
                    <ul>
                        <li>
                            윌비스 한림법학원 유튜브 채널에서 구독하기를 클릭합니다. <a href="https://www.youtube.com/channel/UCM69uucXDSE66-8NDcyvIHA" target="_blank">채널구독 ></a>
                        </li>
                        <li>구독 완료 후, 하단에 유튜브 아이디(혹은 닉네임)을 기재해주세요.</li>
                    </ul>

                    <div class="youtubeID">
                        유튜브 아이디(혹은 닉네임)
                        <input type="text" name="TakeNo" id="TakeNo" >
                    </div>

                    <div class="mt10">
                        * 윌비스 한림법학원 유튜브 채널 구독 후 인증한 모든 분께 CORE 특강 동영상 10% 할인쿠폰을 드립니다.<br>
                        * CORE 특강 동영상 할인쿠폰은 이벤트종료 전까지 매주 화 / 목 발행 됩니다.<br>
                        * 쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.(쿠폰 유효기간 2020년 12월 30일까지)<br>
                        * 쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.<br>
                    </div>
                </div>

                <h3>[개인정보 수집/이용 동의 안내]</h3>
                <div class="termsBx01">
                    <ul>
                        <li>
                        1. 개인정보 수집 이용 목적<br>
                        - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 합격수기 이벤트 참여<br>
                        - 개인정보 수집 항목<Br>
                        공모전 신청 : 회원명, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 응시표)<Br>
                        합격수기 양식 : 이름, 아이디, 성별, 나이, 수험기간, 응시과목 및 모의고사, 2차 시험 필기 점수 
                        </li>
                        <li>
                        2. 개인정보 이용기간 및 보유기간<br>
                        - 본 수집, 활용목적 달성 후 바로 파기 
                        </li>
                        <li>
                        3. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                        - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나, 
                        위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부 시 이벤트 신청이 불가능함을 알려드립니다.
                        </li>
                        <li>
                        4. 저작재산권 이용 허락<br>
                        - 제공해주신 합격수기 및 설문은 당사의 마케팅에 활용되며, 
                        귀하의 승인으로 회사는 합격수기 등과 관련된 저작재산권 등 일체의 권리를 영구적으로 이용할 수 있습니다.
                        </li>
                    </ul>                    
                </div>
                
                <div class="mt10">
                    위의 내용을 이해하였으며, 위와 같은 개인정보 수집/이용 내용에
                    <input type="radio" id="is_chk1" name="is_chk" value="Y" class="ml10"> <label for="is_chk1">동의합니다.</label>
                    <input type="radio" id="is_chk2" name="is_chk" value="N" class="ml10"> <label for="is_chk2">동의하지 않습니다.</label>
                </div>

                <div class="btn">
                    <a href="#none" onclick="javascript:fn_submit();" style="{{ (empty($arr_cert['apply_result']) === false) ? 'display: none;' : '' }}">등록</a>
                    <a href="#none" onclick="javascript:self.close();">취소</a>
                </div>
            </div>
        </form>  
	</div>
</div>
<!--willbes-Layer-PassBox//-->

<script type="text/javascript">
    var $regi_form_register = $('#regi_form_register');

    function fn_submit() {
        @if(empty($arr_cert) === false && $arr_cert['cert_data']['ApprovalStatus'] != 'Y' )
            @if(empty($arr_cert) === false && $arr_cert['cert_data']["IsCertAble"] !== 'Y')
                alert("인증 신청을 할 수 없습니다.");return;
            @endif

            if ($('#TakeKind').val() == '') {
                alert('직렬을 선택해 주세요.');
                $('#TakeKind').focus();
                return;
            }
            if ($('#TakeArea').val() == '') {
                alert('지역을 선택해 주세요.');
                $('#TakeArea').focus();
                return;
            }
            if ($('#TakeNo').val() == '') {
                alert('응시번호를 등록해 주세요.');
                $('#TakeNo').focus();
                return;
            }
            if ($("input:radio[name='AddContent1']").is(':checked') == false) {
                alert('합격구분을 선택해 주세요.');
                $('#AddContent11').focus();
                return;
            }
            if ($('#attachfile').val() == '') {
                alert('인증파일을 등록해 주세요.');
                $('#attachfile').focus();
                return;
            }
        @endif

        if ($('#attach_file').val() == '') {
            alert('합격수기 파일을 등록해 주세요.');
            $('#attach_file').focus();
            return;
        } else {
            if(fileExtCheck($('#attach_file').val()) == false) {
                return;
            }
        }

        if ($("input:radio[name='is_chk']:checked").val() != 'Y') {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }

        if (!confirm('저장하시겠습니까?')) { return true; }

        @if($arr_cert['cert_data']['ApprovalStatus'] != 'Y' )
            @if($arr_cert['cert_data']["IsCertAble"] == 'Y')
                {{-- 인증 프로세스 --}}
                var _check_url = '{!! front_url('/CertApply/checkTakeNumber/') !!}';
                    ajaxSubmit($regi_form_register, _check_url, function(ret) {
                    if(ret.ret_cd) {
                        //alert('정상적으로 등록되었습니다.');
                        submitEnd();
                    } else {
                        alert("인증 확인이 불가합니다. 운영자에게 문의하여 주십시오.");
                        return;
                    }
                }, showValidateError, null, false, 'alert');
                {{-- 인증 프로세스 --}}
            @else
                submitEnd();
            @endif
        @else
                submitEnd();
        @endif
    }

    function fileExtCheck(strfile) {
        if( strfile != "" ){
            var ext = strfile.split('.').pop().toLowerCase();
            if($.inArray(ext, ['hwp','doc','docx','pdf']) == -1) {
                alert('hwp,doc,docx,pdf 파일만 업로드 할수 있습니다.');
                return false;
            }
        }
    }

    function submitEnd() {
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
        var _url = '{!! front_url('/event/registerStoreForModifyFile') !!}';

        if (!confirm('합격수기 파일이 이미 등록되어 있습니다. \n재등록하시면 기존 파일은 삭제됩니다. \n재등록하시겠습니까?')) { return true; }

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