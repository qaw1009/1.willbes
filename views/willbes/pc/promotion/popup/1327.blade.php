@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')

@php
    if (date('YmdH') < '2019071917') { show_alert('잘못된 접근 입니다.','close'); }
@endphp

<!-- Container -->
<style type="text/css">
    h3 {color:#115087; text-align:center; padding:20px 0; font-size:20px; font-weight:600; border-bottom:2px solid #c14842}
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
                <h3>2019년 경찰시험 1차 합격수기 등록하기</h3>
                <div class="termsBx">
                    <p  class="tit">[합격생 인증 정보]</p>
                    <ul>
                        <li>
                            회원명(아이디) 홍길동(abc***)
                        </li>
                        <li>
                            응시 시험정보 <input type="text" id="register_data2" name="register_data2" value="" placeholder="응시번호">
                        </li>
                        <li>
                            합격 인증 파일
                            <input type="file" name="attach_file" id="attach_file" style="width:300px">
                            <div>
                                - 합격생을 증빙할 수 있는 합격생 지원청별 합격자 발표 공고를 응시표와 함께 캡쳐하거나,
                                핸드폰으로 응시표와 함께 사진을 찍어서 등록해 주세요.
                                - 이미지 파일(jpg, png) 또는 PDF 파일 첨부
                            </div>
                        </li>
                    </ul>

                    <p  class="tit">[합격생 인증 정보]</p>
                    <a href="{{ (empty($arr_base['arr_file']) === true) ? '' : front_url('/promotion/download?file_idx='.$arr_base['arr_file']['EfIdx'].'&event_idx='.$arr_base['data']['ElIdx']) }}" class="file">합격수기 양식 파일 다운로드 ↓</a>
                    <input type="file" name="attach_file2" id="attach_file2" style="width:300px">
                    <div>
                        - 반드시 위의 합격수기 양식 파일을 다운로드 받아서 작성해 주세요.
                        - 합격수기 양식은 개별 상황에 맞게 워드, 한글 파일 양식 중 하나를 첨부해 주시면 됩니다.
                        - 합격수기 장석 시 문서 내 항목을 모두 작성하셔야 하며, 무성의한 내용 및 허위 내용은 당첨에서 제외될 수 있습니다. 
                    </div>
                </div>

                <div class="termsBx01">
                    <h2>개인정보 수집/이용 동의 안내</h2>
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
                    <input type="radio" id="is_chk1" name="is_chk1" value="Y"> <label for="is_chk1">동의합니다.</label>
                    <input type="radio" id="is_chk2" name="is_chk2" value="N"> <label for="is_chk2">동의하지 않습니다.</label>
                </div>

                <div class="btn">
                    <a href="#none" onclick="javascript:fn_submit();">등록</a>
                    <a href="#none">취소</a>
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