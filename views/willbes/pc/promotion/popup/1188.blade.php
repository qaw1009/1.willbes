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
    <form id="" name="" method="post"  action="">

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
                        <td ><input type="text" id="USER_NAME" name="USER_NAME" value="" style="width:100px"/></td>
                        <th>연락처</th>
                        <td ><input type="text" id="PHONE_NO" name="PHONE_NO" value="" style="width:100px" onKeyUp="fn_OnlyNumber1(this);"/></td>
                    </tr>	
                    <tr >
                        <th>성별</th>
                        <td>
                            <select id="ARM_NM" name="ARM_NM">
                                <option value="">선택</option>
                                <option value="남자">남자</option>
                                <option value="여자">여자</option>
                            </select>
                        </td>
                        <th>응시번호</th>
                        <td ><input type="text" id="ARM_NO" name="ARM_NO" value="" maxlength="5" style="width:100px" onKeyUp="fn_OnlyNumber1(this);"/></td>
                    </tr>
                    <tr>
                        <th>직렬</th>
                        <td colspan="3">
                            <input type="radio" name="CATEGORY_INFO" id="aa1" value="일반남자" /> <label for="aa1">일반남자</label>
                            <input type="radio" name="CATEGORY_INFO" id="aa2" value="일반여자" /> <label for="aa2">일반여자</label>
                            <input type="radio" name="CATEGORY_INFO" id="aa3" value="경행경채" /> <label for="aa3">경행경채</label>
                        </td>
                    </tr>
                    <tr>
                        <th>버스탑승지역</th>
                        <td colspan="3">
                            <input type="radio" name="ARM_RANK" value="서울" id="bb1"/> <label for="bb1">서울</label>
                            <input type="radio" name="ARM_RANK" value="인천" id="bb2"/> <label for="bb2">인천</label>
                            <input type="radio" name="ARM_RANK" value="대구" id="bb3"/> <label for="bb3">대구</label>
                            <input type="radio" name="ARM_RANK" value="광주" id="bb4"/> <label for="bb4">광주</label>
                            <input type="radio" name="ARM_RANK" value="부산" id="bb5"/> <label for="bb5">부산</label>
                            <input type="radio" name="ARM_RANK" value="전북" id="bb6"/> <label for="bb6">전북</label>
                        </td>
                    </tr>
                    <tr>
                        <th>동반인</th>
                        <td colspan="3">
                            <input type="radio" name="ARM_DIV1" value="가족1인" id="cc1"/> <label for="cc1">가족1인</label>
                            <input type="radio" name="ARM_DIV1" value="가족2인" id="cc2"/> <label for="cc2">가족2인</label>
                            <input type="radio" name="ARM_DIV1" value="친구1인" id="cc3"/> <label for="cc3">친구1인</label>
                            <input type="radio" name="ARM_DIV1" value="없음" id="cc4"/> <label for="cc4">없음</label>
                        </td>
                    </tr>
                    <tr>
                        <th>동반인연락처</th>
                        <td colspan="3"><input type="number" id="ARM_DIV2" name="ARM_DIV2" value="" style="width:150px"/>* 숫자만 기입</td>
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
            <a href="#">신청하기</a>
            <a href="javascript:close();">취소</a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop