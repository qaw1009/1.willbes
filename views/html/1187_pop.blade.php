@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .eventPop {width:600px; margin:0 auto; font-size:12px; color:#333; line-height:1.5}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 

    .eventPopS1 {margin-top:1em}
    .eventPopS1 > li {border-bottom:1px solid #e4e4e4; padding:15px}	
    .eventPopS1 strong {display:block; margin-bottom:10px}
    .eventPopS1 p {margin:10px 0}
    .eventPopS1 li ul {margin-bottom:10px}
    .eventPopS1 li li {display:inline-block; border:0; margin-right:10px}

    .eventPopS2 {margin-top:1em}
    .eventPopS2 span {margin-right:10px}
    .eventPopS2 strong {color:red}
    .eventPopS2 p {border-bottom:1px solid #adadad; padding:1em 0;}

    .eventPopS3 {margin-top:2em}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul,
    .eventPopS3 li {padding:0; margin:0}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px; overflow-y:scroll; height:100px}
    .eventPopS3 li {margin-left:15px; margin-bottom:5px}
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}

    .eventPopS4 {text-align:center;padding:20px 0; margin-top:20px}
    .eventPopS4 a {margin:0 5px}

    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=file],
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
                        <p>공통과목 : 공통과목1, 공통과목2</p>
                        <p>선택과목 : </p>
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
                        <li><input type="radio" name="lec1" id="lec1" value="A" /> <label for="lec1">6개월 이하</label></li>
                        <li><input type="radio" name="lec2" id="lec2" value="B" /> <label for="lec2">1년 이하</label></li>
                        <li><input type="radio" name="lec3" id="lec3" value="C" /> <label for="lec3">2년 이하</label></li>
                        <li><input type="radio" name="lec4" id="lec4" value="D" /> <label for="lec4">2년 이상</label></li>
                    </ul>
                </li>
            </ul>
			<div>	
				
				<span>지역</span>
				
				<div>※ 응시직렬은 최초 선택/저장 후 수정 불가</div>
			</div>
			<div class="mt10">				
				<span>추천인아이디</span>
				<input type="text" name="RE_USER_ID" id="RE_USER_ID" style="width:120px">
				<span>추천인이름</span>
				<input type="text" name="RE_USER_NM" id="RE_USER_NM" style="width:120px">
			</div>
        </div>
        <div class="eventPopS2">
            <p>
                * 확인이 어려운 증빙서류를 첨부하거나, 부정한 방법으로 참여했을 경우, 별도 통보 없이 제공된 혜택은 즉시 회수됩니다.<br>
                * 3차 필기합격생만 적용 및 인증됩니다. 
            </p>
        </div>
        <div class="eventPopS3">
            <p>* 개인정보 수집 및 이용에 대한 안내</p>
            <ul>
                <li>개인정보 수집 이용 목적 <br>
                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 무료특강수강</li>
                <li>개인정보 수집 항목<br>
                    - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 응시표)
                </li>
                <li>개인정보 이용기간 및 보유기간<br>
                    - 본 수집, 활용목적 달성 후 바로 파기
                </li>
                <li>개인정보 제공 동의 거부 권리 및 동의 거부에 따른 불이익<br>
                    - 귀하는 개인 정보 제공 동의를 거부할 권리가 있으며 동의 거부에 따른 불이익은 없으나,<br>
                    - 위 제공사항은 이벤트 참여를 위해 반드시 필요한 사항으로 거부하실 경우 이벤트 신청이 불가능함을 알려드립니다.
                </li>
            </ul>
            <div>
                위의 내용을 이해하였으며 위와 같은 개인정보 수집 이용에 <br>
                <input name="is_chk" id="is_chk" type="radio" value="Y"><label for="AA1">동의합니다.</label> <input name="is_chk" id="is_chk" type="radio" value="N"><label for="BB1">동의하지 않습니다.</label>
            </div>
        </div>
        
        <div class="eventPopS4">
            <a href="javascript:fn_submit();"><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn1.gif"  alt="확인" /></a>
            <a href="javascript:close();"><img src="http://file3.willbes.net/new_cop/2017/03/EV170310_p_pop_btn2.gif"  alt="취소" /></a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop