@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; font-size:14px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:#ffe5de}
        .evt01 {width:1120px; margin:50px auto 0; padding:20px; text-align:left; font-size:16px; line-height:1.4}
        .evt01 p {font-weight:bold; font-size:18px}

        .evt02 {width:1120px; margin:0 auto 100px; text-align:left; font-size:16px; line-height:1.4; padding:20px}
        .evt02 .before {position:absolute;top:0; left:0; height:100%; background:rgba(0,0,0,.3); width:100%; z-index: 10; display: flex; flex-direction: column; justify-content: center; align-items: center; color:#fff; font-size:30px; text-align:center; box-shadow: 10px 10px 10px 0 rgba(0,0,0,0.2);}
        .evt02 .before .popupbtn a {display:block; width:400px; border-radius:10px; color:#fff; padding:15px 10px; background:#0c5dc0;margin-top:30px;}
        .evt02 .before .popupbtn a:hover {background:#000;} 

        .evt02 .info {font-size:14px;}
        .evt02 .info ul {border:1px solid #ccc; background:#f4f4f4; padding:20px; margin:20px 0 10px;}
        .evt02 .info li {margin-left:20px; list-style:disc; margin-bottom:5px}
        .evt02 .info ul:after {content:""; display:block; clear:both}
        .evt02 input,
        .evt02 label {vertical-align:middle}
        .evt02 label {margin-left:5px; font-size:14px}
        .evt02 input[type=checkbox] {width:20px; height:20px}
        .table_wrap {margin-top:50px}
        .table_wrap table {width:100%; border:3px solid #464646; background:#fff; margin-top:10px !important}
        .table_wrap td,
        .table_wrap th{padding:10px; border:1px solid #cdcdcd; border-left:0; border-top:0; font-size:15px; text-align:center}
        .table_wrap th{color:#000; font-weight:500; background:#f4f4f4}
        .table_wrap td{color:#444;padding:10px; line-height:1.5; text-align:left}
        .table_wrap tr th{border-top:1px solid #cdcdcd}
        .btnSet {width:80%; margin:50px auto 0}
        .btnSet a {display:block; padding:20px 0; text-align:center; font-size:25px; font-weight:bold; background:#0c5dc0; color:#fff; border-radius:50px}
        .btnSet a:hover {background:#333;}    

        .evtInfoBox {margin-top:30px}
        .evtInfoBox li {list-style:disc;  margin-left:20px; margin-bottom:10px; font-size:17px;font-weight:bold;}

        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            padding:0;
            
        }
        .b-close {
            position: absolute;
            right: -25px;
            top: -25px;
            display: inline-block;
            cursor: pointer;
            width:50px;
            height:50px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close img {width:100%}
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:auto; width:auto;}
        .Pstyle .table_wrap {background:#fff; padding:50px; margin:0; border-radius:30px;}
        .Pstyle .p_title {font-size:20px; margin-bottom:20px}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2875_top.jpg" alt="연간 Package 선 접수(문화상품권 증정) 이벤트 "/>
        </div>
        <!--
        <form name="regi_form_register" id="regi_form_register">
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $data['ElIdx'] }}"/>
            <input type="hidden" name="recipient_type" value="{{$arr_promotion_params['recipient_type']}}"> {{-- 상품지급대상(문화상품권) 기능 사용 --}}
            <input type="hidden" name="ssn_type" value="Y"> {{-- 주민번호 전송 --}}
            <input type="hidden" id="register_name" name="register_name" value="{{sess_data('mem_name')}}">
            <input type="hidden" id="userId" name="userId" value="{{sess_data('mem_id')}}">
            <input type="hidden" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}">
            <input type="hidden" name="register_type" value="promotion"/>
            <input type="hidden" name="register_chk[]" value="{{ $arr_base['register_list'][0]['ErIdx'] }}"/>
            <input type="hidden" name="target_params[]" value="register_data1"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_params[]" value="register_data2"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" name="target_param_names[]" value="수강생정보"/> {{-- 체크 항목 전송 --}}
            <input type="hidden" id="register_data1" name="register_data1" value="{{ $arr_base['member_recipient']['SubjectName'] or ''}}">
            <input type="hidden" id="register_data2" name="register_data2" value="{{ $arr_base['member_recipient']['GiftCertificate'] or ''}}">
        -->
            <div class="evtCtnsBox evt01">
                <div>
                    안녕하세요.<br>
                    윌비스 임용 입니다.<br>
                    <br>
                    윌비스 임용은 2024학년도 대비 연간패키지의 접수를 시작하면서,<br>
                    선 접수자(22.12.30.(금) 17시 까지 결제)에게 모바일 문화상품권을 지급하는 이벤트를 실시하였습니다.<br>
                    - 1과목을 수강하신 경우,  10만원권 문화상품권<br>
                    - 2과목(교육학+전공)을 수강하신 경우, 15만원권 문화상품권<br>
                    <br>                    
                    <br>
                    연간패키지 선 접수 이벤트 당첨을 축하 드리며, 선생님들의 합격을 위해 최선을 다하도록 하겠습니다 !!<br>            
                    <br>
                    문화상품권을 지급 받기 위해서는 (소득신고용) 주민번호를 입력해 주셔야 합니다.<br>
                    본 페이지에 로그인 후, 개인정보 제공 동의 여부 체크 및 개인 정보 기재를 요청 드립니다.<br>
                    <br>
                    <p> * 기한내 주민번호 미 입력 및 비 동의 시, 모바일 문화상품권 발송이 지연될 수 있습니다.</p>
                </div>
            </div>

            <div class="evtCtnsBox evt02">
                <div class="before">
                    <div class="popupbtn NSK-Black"><a href="javascript:go_popup1()">신청정보 확인하기</a></div>
                </div>
                <div class="info">
                    <ul>
                        <li>
                            개인정보 및 고유식별정보 수집/이용 동의<br>
                            1) 개인정보의 수집ㆍ이용 목적 : 경품(문화상품권) 지급 및 기타소득 신고 처리를 위한 수집<br>
                            2) 수집하려는 개인정보의 항목 : 학원ID, 이름, 연락처, 주민등록번호, 수강과목<br>
                            3) 개인정보의 보유 및 이용 기간 : 소득세법에 따라 5년간 보관<br>
                            4) 동의를 거부할 권리가 있다는 사실 및 동의 거부에 따른 불이익이 있는 경우에는 그 불이익의 내용 : 고객님은 동의를 거부하실 수 있으며, 거부 시 경품 지급이 불가합니다. 
                        </li>
                        <li>입력하신 개인정보는 수집목적 외 신청자의 동의 없이 절대 제3자에게 제공되지 않으며 개인정보 처리 방침에 따라 보호되고 있습니다.</li>
                        <li>개인정보 수집/이용에 동의하셨으면, 아래 사항을 기재해 주시기 바랍니다.</li>
                    </ul>
                    <label><input type="checkbox" id="is_chk" name="is_chk" value="Y" onchange="loginCheck();" title="개인정보 수집/이용 동의"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                </div>
                <div class="table_wrap">
                    <table>
                        <col width="15%">
                        <col width="35%">
                        <col width="15%">
                        <col>
                        <tbody>
                            <tr>
                              <th>성명</th>
                                <td>{{sess_data('mem_name')}}</td>
                                <th>윌비스 ID</th>
                                <td>{{sess_data('mem_id')}}</td>
                            </tr>
                            <tr>
                              <th>연락처</th>
                                <td>{{sess_data('mem_phone')}}</td>
                                <th>* 패키지 수강과목</th>
                                <td>
                                    {{ $arr_base['member_recipient']['SubjectName'] or ''}}
                                </td>
                            </tr>
                            <tr>
                              <th>* 주민번호</th>
                                <td>
                                    <input type="text" id="ssn_1" name="ssn_1" maxlength="6" onclick="loginCheck();" style="width:100px"/> -
                                    <input type="text" id="ssn_2" name="ssn_2" maxlength="7" onclick="loginCheck();" style="width:100px"/>
                                </td>
                                <th>* 상품권 종류</th>
                                <td>
                                    {{ $arr_base['member_recipient']['GiftCertificate'] or ''}}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <ul class="evtInfoBox">
                        <li>*은 필수 입력, 이외의 정보는 선택적으로 입력하시면 됩니다.</li>
                        <li>모바일 문화상품권은 홈페이지 회원가입시, 작성해 주신 휴대폰번호로 발송됩니다. (오기로 인한 불이익은 책임지지 않습니다)</li>
                        <li>연락처 수정은 홈페이지 상단 “내강의실” > “회원정보” > “개인정보관리”에서 변경할 수 있습니다.</li>
                        <li>모바일 문화상품권은 5만원권 으로 발송 됩니다. (10만원-2매, 15만원-3매)</li>
                        <li>상품권을 수령하신 후, 강의 환불 시 (제세공과금을 포함한) 상품권 금액이 차감됩니다. <br> 
                            <span class="tx-red">(10만원권 수령자 - 128,205원 차감 / 15만원권 수령자 - 192,308원 차감)</span</li>
                        <li>문화상품권 신청 시, 상기 내용을 숙지하고, 동의한 것으로 간주합니다. </li>
                    </ul>
                    <div class="btnSet">
                        @if($arr_promotion_params['recipient_type'] == 'Y' && empty($arr_base['member_recipient']) === false)
                            <a href="{!! front_url('/event/registerStore') !!}" onclick="javascript:fn_submit(); return false;">문화상품권 신청하기 ></a>
                        @else
                            <a href="javascript:alert('상품권 수령 대상자가 아닙니다.');">문화상품권 신청하기 ></a>
                        @endif
                    </div>
                </div>

            </div>

            <div id="popup1" class="Pstyle NSK">
                <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
                <div class="content">
                    <div class="table_wrap">
                        <div class="p_title">신청정보</div>
                        <table>
                            <col width="15%">
                            <col width="35%">
                            <col width="15%">
                            <col>
                            <tbody>
                                <tr>
                                    <th>성명</th>
                                    <td>{{sess_data('mem_name')}}</td>
                                    <th>윌비스 ID</th>
                                    <td>{{sess_data('mem_id')}}</td>
                                </tr>
                                <tr>
                                <th>연락처</th>
                                    <td>{{sess_data('mem_phone')}}</td>
                                    <th>* 패키지 수강과목</th>
                                    <td>
                                        {{ $arr_base['member_recipient']['SubjectName'] or ''}}
                                    </td>
                                </tr>
                                <tr>
                                <th>* 주민번호</th>
                                    <td>
                                        <input type="text" id="ssn_1" name="ssn_1" maxlength="6" onclick="loginCheck();" style="width:100px"/> -
                                        <input type="text" id="ssn_2" name="ssn_2" maxlength="7" onclick="loginCheck();" style="width:100px"/>
                                    </td>
                                    <th>* 상품권 종류</th>
                                    <td>
                                        {{ $arr_base['member_recipient']['GiftCertificate'] or ''}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!--</form>-->
    </div>
    <!-- End Container -->

    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script type="text/javascript">
        var $regi_form_register = $('#regi_form_register');
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
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
                alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
                return;
            }

            if ($("#ssn_1").val() == '') {
                alert('주민번호를 입력해주세요.');
                $("#ssn_1").focus();
                return false;
            }

            if ($("#ssn_2").val() == '') {
                alert('주민번호를 입력해주세요.');
                $("#ssn_2").focus();
                return false;
            }

            var _url = '{!! front_url('/event/registerStore') !!}';
            if (confirm('저장하시겠습니까?')) {
                ajaxSubmit($regi_form_register, _url, function (ret) {
                    if (ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, addValidate, false, 'alert');
            }
        }

        function addValidate() {
            var ssn_chk = ssnCheck($('#ssn_1').val(), $('#ssn_2').val());
            if (ssn_chk !== true) {
                alert(ssn_chk);
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

        function loginCheck(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
        }

        //팝업
        function go_popup1(){$('#popup1').bPopup();}
    </script>
@stop