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
    <form id="" name="" method="post" action="">

    <div class="eventPop">
		<h3>
            2019년 1차 <span class="tx-bright-blue">최종합격기원 감사제</span> 이벤트
        </h3>
        <div class="eventPopS1">
            <ul>
                <li>
                    <strong>* 직렬(직류구분)</strong>
                    <select name="test_subject" id="test_subject"style="width:120px">
                        <option value="AA">일반공채:남</option>
                        <option value="BA">일반공채:여</option>
                        <option value="CA">전의경경채</option> 
                        <option value="DA">101단</option>
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
                    <strong>* 2019년 1차 필기합격 응시번호</strong>
                    <input type="text" name="textfield" id="textfield"> 
                </li>
                <li>
                    <strong>* 추천해준 친구 윌비스 ID</strong>
                    <input type="text" name="textfield" id="textfield"> 
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
                    - 이벤트 신청 접수에 따른 본인 확인 절차 진행 및 무료특강수강
                </li>
                <li>개인정보 수집 항목<br>
                    - 신청인의 이름, 휴대폰 번호, 이메일 주소, 응시정보 (직렬 및 지역, 응시번호, 필기합격인증이미지) 
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