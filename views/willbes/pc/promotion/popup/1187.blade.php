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
            2019년 경찰 1차 <span class="tx-bright-blue">합격예측 풀서비스 사전예약</span> 신청하기
        </h3>
        <div class="eventPopS1">
            <ul>
                <li>
                    <strong>* 직렬(직류구분)</strong>
                    <select name="test_subject" id="test_subject"style="width:120px">
                        <option value="AA">일반공채:남</option>
                        <option value="BA">일반공채:여</option>
                        <option value="CA">전의경경채</option> 
                        <option value="DA">101단-서울</option>
                    </select>
                    <select id="listview" name="listview" >
                        <option value="">지역구분</option>
                        <option value="">지역1</option>
                        <option value="">지역2</option>
                        <option value="">지역3</option>
                    </select>
                    ※ 응시직렬은 최초 선택/저장 후 수정 불가
                </li>
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