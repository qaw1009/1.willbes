@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .Container {width:100%; max-width:720px; margin:0 auto; position:relative;}    
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}   
    .evt01 {margin:50px auto; padding:10px; text-align:left; font-size:16px; line-height:1.4}   
    .evt01 .info {font-size:14px;}
    .evt01 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; margin:20px 0 10px;}
    .evt01 .info li {margin-left:20px; list-style:disc; margin-bottom:5px}
    .evt01 .info ul:after {content:""; display:block; clear:both}    
    .table_wrap {padding:10px 0}
    .table_wrap table {width:100%; border-top:1px solid #d0d2d9; background:#fff; margin-top:10px !important}
    .table_wrap table:first-of-type{margin-top:0}
    .table_wrap table td,
    .table_wrap table th{padding:10px; border:1px solid #d0d2d9; border-left:0; border-top:0; font-size:15px; text-align:center}
    .table_wrap table th{color:#767987; font-weight:500; background:#dfe1e7}
    .table_wrap table td{color:#444;padding:10px; line-height:1.5; text-align:left}
    .table_wrap table tr:first-of-type th{border-top:1px solid #d0d2d9}
    .table_wrap table tr th:first-of-type,
    .table_wrap table tr td:first-of-type{border-left:1px solid #d0d2d9}
    .table_wrap table input {width:100px}
    .evt01 .btnSet {width:80%; margin:50px auto}
    .evt01 .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#427eec; color:#fff; border-radius:50px}
    .evt01 .btnSet a:hover {background:#333;}
    .evt01 input,
    .evt01 label {vertical-align:middle}
    .evt01 label {margin-left:5px; font-size:14px}
    .evt01 input[type=checkbox] {width:20px; height:20px}
</style>

<div id="Container" class="Container NSK c_both">  

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/01/2039_top.jpg" alt="2022학년도 대비 합격전략 설명회"/>       
    </div>

    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="POST">
        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
        <input type="hidden" name="ssn_type" value="Y"> {{-- 주민번호 전송 --}}
        <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}">
        <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
        <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>
        <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
        <input type="hidden" name="target_param_names[]" value="수강과목"/> {{-- 체크 항목 전송 --}}

        <div class="evtCtnsBox evt01">
            안녕하세요.<br>
            윌비스 임용고시학원입니다.  <br>
            <br>
            2022학년도대비 연간패키지 수강이벤트 당첨을 진심으로 축하드립니다. <br>
            경품인 모바일 문화상품권의 제공을 위해 개인정보보호관계 법령에 따라 고객님의 개인 정보 수집 관련 안내문을 아래와 같이 고지드립니다. <br>
            <br>
            홈페이지 로그인 후, 동의 여부 체크 및 개인 정보 기재를 <span class="tx-red">2021년 01월 27일(수)까지</span> 부탁드립니다.<br>
            * 기일내 정보 미입력 및 비 동의시 모바일 문화상품권 발송이 지연됩니다.<br>
            <div class="info">
                <ul>
                    <li>개인정보 및 고유식별정보 수집/이용 동의<br>   
                    1) 개인정보의 수집ㆍ이용 목적 : 경품(문화상품권) 지급 및 기타소득 신고 처리를 위한 수집<br>
                    2) 수집하려는 개인정보의 항목 : 학원ID, 이름, 연락처, 주민등록번호, 수강과목<br>
                    3) 개인정보의 보유 및 이용 기간 : 소득세법에 따라 5년간 보관<br>
                    4) 동의를 거부할 권리가 있다는 사실 및 동의 거부에 따른 불이익이 있는 경우에는 그 불이익의 내용: 고객님은 동의를 거부하실 수 있으며, 거부 시 경품 지급이 불가합니다. </li>
                    <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                    <li>개인정보 수집/이용에 동의하셨으면, 아래 사항을 기재해 주시기 바랍니다.</li>
                </ul>
                <label><input type="checkbox" id="is_chk" name="is_chk" value="Y" title="개인정보 수집/이용 동의"> 윌비스에 개인정보 제공 동의하기(필수)</label>
            </div>
            <div class="table_wrap">
                <table>
                    <col width="20%">
                    <col>
                    <tbody>
                        <tr>
                            <th>* 성명/ID</th>
                            <td>{{sess_data('mem_name')}} / {{sess_data('mem_id')}}</td>
                        </tr>
                        <tr>
                            <th>* 연락처</th>
                            <td>{{sess_data('mem_phone')}}</td>
                        </tr>
                        <tr>
                            <th>* 주민번호</th>
                            <td>
                                <input name="ssn_1" id="ssn_1" style="width:100px;" type="text" maxlength="6"> -
                                <input name="ssn_2" id="ssn_2" style="width:100px;" type="text" maxlength="7">
                            </td>
                        </tr>
                        <tr>
                            <th>* 수강과목</th>
                            <td>
                                <select name="register_data1" id="register_data1" title="수강과목">
                                    <option value="">선택</option>
                                    <option value="초등 배재민">초등 배재민</option>
                                    <option value="전공국어 송원영">전공국어 송원영</option>
                                    <option value="전공국어 권보민">전공국어 권보민</option>
                                    <option value="전공영어 김유석">전공영어 김유석</option>
                                    <option value="전공수학 김철홍">전공수학 김철홍</option>
                                    <option value="수학교육론 박태영">수학교육론 박태영</option>
                                    <option value="도덕윤리 김병찬">도덕윤리 김병찬</option>
                                    <option value="전공역사 최용림">전공역사 최용림</option>
                                    <option value="전공음악 다이애나">전공음악 다이애나</option>
                                    <option value="전기·전자 최우영">전기·전자 최우영</option>
                                    <option value="정보컴퓨터 송광진">정보컴퓨터 송광진</option>
                                    <option value="전공중국어 정경미">전공중국어 정경미</option>
                                </select>
                                <p class="tx12 mt10">* 상품권은 작성된 문자로 발송됩니다. 연락처 수정은 홈페이지 상단 “내강의실”에서 변경할 수 있습니다. </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btnSet">
                    <a href="{!! front_url('/event/registerStore') !!}" onclick="javascript:fn_submit(); return false;">문화상품권 신청하기 ></a>
                </div>
            </div>
        </div>
    </form> 

</div>
<!-- End Container -->

<script type="text/javascript">
    var _msg = [];
    $(document).ready(function() {
        _msg = [
            '주민번호를 기입해주세요.'
            , '주민번호는 숫자만 입력하셔야 합니다.'
            , '올바른 주민번호를 입력하여 주세요.'
        ];

        $('#ssn_1').keyup (function () {
            var charLimit = $(this).attr("maxlength");
            if (this.value.length >= charLimit) {
                $("#ssn_2").focus();
                return false;
            }
        });
    });

    function fn_submit() {
        var $regi_form_register = $('#regi_form_register');
        var _url = '{!! front_url('/event/registerStore') !!}';

        var is_login = '{{sess_data('is_login')}}';
        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return;
        }

        if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }

        if (!confirm('저장하시겠습니까?')) {
            return true;
        }
        ajaxSubmit($regi_form_register, _url, function (ret) {
            if (ret.ret_cd) {
                alert(ret.ret_msg);
                location.reload();
            }
        }, showValidateError, addValidate, false, 'alert');
    }

    function addValidate() {
        var ssn_chk = ssnCheck($('#ssn_1').val(), $('#ssn_2').val());
        if (ssn_chk !== true) {
            alert(ssn_chk);
            return false;
        }
        if ($("#register_data1").val() == '') {
            alert('수강과목을 선택해주세요.');
            return false;
        }
        return true;
    }

    function ssnCheck(_ssn1, _ssn2) {
        var ssn1 = _ssn1,
            ssn2 = _ssn2,
            ssn = ssn1 + '' + ssn2,
            arr_ssn = [],
            compare = [2, 3, 4, 5, 6, 7, 8, 9, 2, 3, 4, 5],
            sum = 0;

        // 입력여부 체크
        if (ssn1 == '') {return _msg[0];}
        if (ssn2 == '') {return _msg[0];}

        // 입력값 체크
        if (ssn1.match('[^0-9]')) {$("#ssn_1").val(''); return _msg[1];}
        if (ssn2.match('[^0-9]')) {$("#ssn_2").val(''); return _msg[1];}

        // 자리수 체크
        if (ssn.length != 13) {return _msg[2];}

        // 공식: M = (11 - ((2×A + 3×B + 4×C + 5×D + 6×E + 7×F + 8×G + 9×H + 2×I + 3×J + 4×K + 5×L) % 11)) % 11
        for (var i = 0; i < 13; i++) {
            arr_ssn[i] = ssn.substring(i, i + 1);
        }
        for (var i = 0; i < 12; i++) {
            sum = sum + (arr_ssn[i] * compare[i]);
        }

        sum = (11 - (sum % 11)) % 10;
        if (sum != arr_ssn[12]) {return _msg[2];}

        return true;
    }
</script>
@stop