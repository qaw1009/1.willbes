@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .willbes-Layer-PassBox {height:700px; overflow-y:scroll;}
    .eventPop {width:600px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 
    .eventPop p {margin-bottom:10px; font-weight:bold; font-size:14px}
    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul li {padding:3px 10px;}	
    .eventPopS1 strong {display:block; margin-bottom:10px}    

    .eventPopS3 {margin-top:1em}
    .eventPopS3 ul,
    .eventPopS3 li {padding:0; margin:0}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
    .eventPopS3 li {margin-left:15px; margin-bottom:5px}
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}

    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#333; color:#fff !important; font-weight:bold; border:1px solid #333}
    .btnsSt3 a:hover {background:#fff; color:#333 !important}

    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; border:1px solid #e4e4e4}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}
</style>

<div class="willbes-Layer-PassBox NGR">
    <form name="regi_form_register" id="regi_form_register">
        {!! csrf_field() !!}
        {!! method_field($arr_base['method']) !!}
        <input type="hidden" name="event_idx"  id ="event_idx" value="{{ $arr_base['data']['ElIdx'] }}"/>
        <input type="hidden" name="register_name"  id ="register_name" value="{{ sess_data('mem_name') }}"/>
        <input type="hidden" name="register_type" value="promotion"/>
        <input type="hidden" name="target_params[]" value="etcValue1"/>
        <input type="hidden" name="target_params[]" value="etcValue2"/>
        <input type="hidden" name="target_params[]" value="etcValue3"/>
        <input type="hidden" name="target_params[]" value="etcValue4"/>
        <input type="hidden" name="target_params[]" value="etcValue5"/>
        <input type="hidden" name="target_params[]" value="etcValue6"/>
        <input type="hidden" name="target_param_names[]" value="성별"/> {{--체크 항목--}}
        <input type="hidden" name="target_param_names[]" value="응시번호"/> {{--체크 항목--}}
        <input type="hidden" name="target_param_names[]" value="직렬"/> {{--체크 항목--}}
        <input type="hidden" name="target_param_names[]" value="버스탑승지역"/> {{--체크 항목--}}
        <input type="hidden" name="target_param_names[]" value="동반인"/> {{--체크 항목--}}
        <input type="hidden" name="target_params_item[]" value="true"/>
        <input type="hidden" name="target_params_item[]" value="true"/>
        <input type="hidden" name="target_params_item[]" value="true"/>
        <input type="hidden" name="target_params_item[]" value="true"/>
        <input type="hidden" name="target_params_item[]" value="true"/>
        <input type="hidden" name="target_params_item[]" value="false"/>

    <div class="eventPop">
		<h3>
           <span class="tx-bright-blue">5월 4일</span> 경찰공무원 합격생 중경 무료 입교버스
        </h3>
        <div class="eventPopS1">
            <p>신청접수</p>
            <table class="table_type">
                <colgroup>
                    <col width="20%" />
                    <col width="30%" />
                    <col width="20%" />
                    <col width="30%" />
                </colgroup>            
                <tbody>
                    <tr>
                        <th>성명</th>
                        <td><input type="text" name="name" value="{{sess_data('mem_name')}}" title="성명" readonly="readonly" style="width:100px"/></td>
                        <th>연락처</th>
                        <td><input type="text" id="register_tel" name="register_tel" value="{{sess_data('mem_phone')}}" title="연락처" style="width:100px"/></td>
                    </tr>
                    <tr>
                        <th>캠퍼스</th>
                        <td colspan="3">
                            <select id="register_chk" name="register_chk[]" title="캠퍼스" required="required">
                                <option value="">선택</option>
                                @foreach($arr_base['register_list'] as $row)
                                    <option value="{{$row['ErIdx']}}" {{ (empty($arr_base['selected']) === false && $arr_base['selected'] == $row['ErIdx']) ? 'selected=selected' : '' }}>{{ $row['Name'] }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>성별</th>
                        <td>
                            <select id="etcValue1" name="etcValue1">
                                <option value="">선택</option>
                                <option value="남자">남자</option>
                                <option value="여자">여자</option>
                            </select>
                        </td>
                        <th>응시번호</th>
                        <td ><input type="number" id="etcValue2" name="etcValue2" value="" maxlength="5" style="width:100px"/></td>
                    </tr>
                    <tr>
                        <th>직렬</th>
                        <td colspan="3">
                            <input type="radio" name="etcValue3" value="일반남자" id="etcValue3_1"/> <label for="etcValue3_1">일반남자</label>
                            <input type="radio" name="etcValue3" value="일반여자" id="etcValue3_2"/> <label for="etcValue3_2">일반여자</label>
                            <input type="radio" name="etcValue3" value="경행경채" id="etcValue3_3"/> <label for="etcValue3_3">경행경채</label>
                        </td>
                    </tr>
                    <tr>
                        <th>버스탑승지역</th>
                        <td colspan="3">
                            <input type="radio" name="etcValue4" value="서울" id="etcValue4_1"/> <label for="etcValue4_1">서울</label>   
                                                        
                            {{--
                            <input type="radio" name="etcValue4" value="인천" id="etcValue4_2"/> <label for="etcValue4_2">인천</label> 
                            <input type="radio" name="etcValue4" value="대구" id="etcValue4_3"/> <label for="etcValue4_3">대구</label>                           
                            <input type="radio" name="etcValue4" value="광주" id="etcValue4_4"/> <label for="etcValue4_4">광주</label>
                            <input type="radio" name="etcValue4" value="부산" id="etcValue4_5"/> <label for="etcValue4_5">부산</label>
                            <input type="radio" name="etcValue4" value="전북" id="etcValue4_6"/> <label for="etcValue4_6">전북</label>
                            --}}
                        </td>
                    </tr>
                    <tr>
                        <th>동반인</th>
                        <td colspan="3">
                            <input type="radio" name="etcValue5" value="가족1인" id="etcValue5_1"/> <label for="etcValue5_1">가족1인</label>
                            <input type="radio" name="etcValue5" value="가족2인" id="etcValue5_2"/> <label for="etcValue5_2">가족2인</label>
                            <input type="radio" name="etcValue5" value="친구1인" id="etcValue5_3"/> <label for="etcValue5_3">친구1인</label>
                            <input type="radio" name="etcValue5" value="없음" id="etcValue5_4"/> <label for="etcValue5_4">없음</label>
                        </td>
                    </tr>
                    <tr>
                        <th>동반인연락처</th>
                        <td colspan="3"><input type="number" id="etcValue6" name="etcValue6" value="" style="width:150px"/>* 숫자만 기입</td>
                    </tr>
                </tbody>
            </table>
            <p>참고사항</p>
            <ul>
                <li>- 지역별 탑승지역 추후 별도 안내 예정입니다.</li>
                <li>- 예치금 1만원 납부하셔야 예약 확정됩니다. (탑승 시 환불)</li>
                <li>- 신청자에게 예치금 납부 관련하여, 개별 문자 공지 드립니다.</li>
            </ul>
        </div>

        <div class="eventPopS3">
            <p>* 개인정보 수집 및 이용에 대한 안내</p>
            <ul>
                <li>
                    1. 개인정보 수집 이용 목적 <br>
                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 문의사항 응대<br>
                    - 이벤트 참여에 따른 경품 지급<br>
                    - 응시 직렬에 따른 성적 분포 통계 자료 제공<br>
                    - 성적 처리 및 분석 후 통계자료 마케팅 등에 활용
                </li>
                <li>2. 개인정보 수집 항목<br>
                    - 신청인의 이름, 아이디, 응시정보, 과목별 점수, 휴대폰 번호, 이메일 주소
                </li>
                <li>3. 개인정보 이용기간 및 보유기간<br>
                    - 본 수집, 활용목적 달성 후 바로 파기
                </li>
                <li>4. 개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,
                    위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                </li>
            </ul>
            <div>
                <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label> 
            </div>
        </div>
        
        <div class="btnsSt3">
            <a href="#none" onclick="javascript:fn_submit();">신청하기</a>
            <a href="javascript:close();">취소</a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->

<script>
    var $regi_form_register = $('#regi_form_register');
    var _url = '{!! front_url('/event/registerStore') !!}';

    function fn_submit() {
        if ($regi_form_register.find('input[name="is_chk"]').is(':checked') === false) {
            alert('개인정보 수집/이용 동의 안내에 동의하셔야 합니다.');
            return;
        }

        if (numberChk($(':radio[name="etcValue3"]:checked').val()) === false) {
            alert('응시번호를 확인해 주세요.');
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

    //응시번호 직렬별 범위 체크
    function numberChk(type) {
        var etc_value2 = $regi_form_register.find('input[name="etcValue2"]').val();
        switch (type) {
            case '일반남자' :
                if (etc_value2 > 10000 && etc_value2 < 20000) {
                    return true;
                }
                break;
            case '일반여자' :
                if (etc_value2 > 20000 && etc_value2 < 30000) {
                    return true;
                }
                break;
            case '경행경채' :
                if (etc_value2 >= 50001 && etc_value2 <= 51000) {
                    return true;
                }
                break;
            default :
                return false;
        }
        return false;
    }
</script>
@stop