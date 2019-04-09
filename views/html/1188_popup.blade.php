@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .willbes-Layer-PassBox {height:700px; overflow-y:scroll;}
    .eventPop {width:600px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 

    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul > li {border-bottom:1px solid #e4e4e4; padding:10px}	
    .eventPopS1 strong {display:block; margin-bottom:10px}
    .eventPopS1 p {margin-bottom:10px}
    .eventPopS1 li ul {margin-bottom:10px}
    .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}

    .eventPopS3 {margin-top:1em}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
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
            <div>신청접수</div>
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
						<input type="radio" name="ARM_RANK" value="서울" /> 서울&nbsp;&nbsp;
						<input type="radio" name="ARM_RANK" value="인천" /> 인천&nbsp;&nbsp;
						<input type="radio" name="ARM_RANK" value="대구" /> 대구&nbsp;&nbsp;
						<input type="radio" name="ARM_RANK" value="광주" /> 광주&nbsp;&nbsp;
						<input type="radio" name="ARM_RANK" value="부산" /> 부산&nbsp;&nbsp;
						<input type="radio" name="ARM_RANK" value="전북" /> 전북
					</td>
				</tr>
            	<tr>
                	<th>동반인</th>
					<td colspan="3">
						<input type="radio" name="ARM_DIV1" value="가족1인" /> 가족1인&nbsp;&nbsp;
						<input type="radio" name="ARM_DIV1" value="가족2인" /> 가족2인&nbsp;&nbsp;
						<input type="radio" name="ARM_DIV1" value="친구1인" /> 친구1인&nbsp;&nbsp;
						<input type="radio" name="ARM_DIV1" value="없음" /> 없음
					</td>
				</tr>
            	<tr>
                	<th>동반인연락처</th>
					<td colspan="3"><input type="text" id="ARM_DIV2" name="ARM_DIV2" value="" style="width:200px"/></td>
				</tr>
            </tbody>
        </table>
    
        <ul>
                <li>
                    <strong class="mt10">* 응시과목</strong>
                    <p>직렬(지역)구분을 선택해주세요.</p>
                    <div>
                        <p>- 공통과목 : 공통과목1, 공통과목2</p>
                        <p>- 선택과목 : </p>
                        <ul>
                            <li><input type="checkbox" name="aa1" id="aa1" value="" > <label for="aa1">선택과목A</label></li>
                            <li><input type="checkbox" name="aa2" id="aa2" value="" > <label for="aa2">선택과목B</label></li>
                            <li><input type="checkbox" name="aa3" id="aa3" value="" > <label for="aa3">선택과목C</label></li>
                            <li><input type="checkbox" name="aa4" id="aa4" value="" > <label for="aa4">선택과목D</label></li>
                            <li><input type="checkbox" name="aa5" id="aa5" value="" > <label for="aa5">선택과목E</label></li>
                            <li><input type="checkbox" name="aa6" id="aa6" value="" > <label for="aa6">선택과목F</label></li>
                        </ul>
                    </div>
                    <strong class="mt10">* 가산점여부</strong>
                    <ul>
                        <li><input type="radio" name="gasan1" id="gasan1" value="A" /> <label for="gasan1">5점</label></li>
                        <li><input type="radio" name="gasan2" id="gasan2" value="B" /> <label for="gasan2">4점</label></li>
                        <li><input type="radio" name="gasan3" id="gasan3" value="C" /> <label for="gasan3">3점</label></li>
                        <li><input type="radio" name="gasan4" id="gasan4" value="D" /> <label for="gasan4">2점</label></li>
                        <li><input type="radio" name="gasan5" id="gasan5" value="E" /> <label for="gasan5">1점</label></li>
                        <li><input type="radio" name="gasan6" id="gasan6" value="F" /> <label for="gasan6">없음</label></li>
                    </ul>
                </li>
                <li>
                    <strong>* 응시번호</strong>
                    <input type="text" name="textfield" id="textfield"> 
                </li>
                <li>
                    <strong>* 신광은경찰팀 수강여부</strong>
                    <ul>
                        <li><input type="radio" name="lec1" id="lec1" value="A" /> <label for="lec1">온라인강의</label></li>
                        <li><input type="radio" name="lec2" id="lec2" value="B" /> <label for="lec2">학원강의</label></li>
                        <li><input type="radio" name="lec3" id="lec3" value="C" /> <label for="lec3">온라인+학원강의</label></li>
                        <li><input type="radio" name="lec4" id="lec4" value="D" /> <label for="lec4">미수강</label></li>
                    </ul>
                </li>
                <li>
                    <strong>* 시험준비기간</strong>
                    <ul>
                        <li><input type="radio" name="term1" id="term1" value="A" /> <label for="term1">6개월 이하</label></li>
                        <li><input type="radio" name="term2" id="term2" value="B" /> <label for="term2">1년 이하</label></li>
                        <li><input type="radio" name="term3" id="term3" value="C" /> <label for="term3">2년 이하</label></li>
                        <li><input type="radio" name="term4" id="term4" value="D" /> <label for="term4">2년 이상</label></li>
                    </ul>
                </li>
                <li>
                    <strong>* 응시표 인증파일 - (jpg, gif, png 파일만 등록 가능)</strong>
                    <input type="file" name="ATTACH_FILE" id="ATTACH_FILE" style="width:300px">
                </li>
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
                <li>개인정보 수집 항목<br>
                    - 신청인의 이름,아이디, 응시정보, 과목별 점수, 휴대폰 번호, 이메일 주소
                </li>
                <li>개인정보 이용기간 및 보유기간<br>
                    - 본 수집, 활용목적 달성 후 바로 파기
                </li>
                <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,
                    위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                </li>
            </ul>
            <div>
                <input name="is_chk" id="is_chk" type="checkbox" value="Y"><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label> 
            </div>
        </div>
        
        <div class="btnsSt3">
            <a href="#">확인</a>
            <a href="javascript:close();">취소</a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop