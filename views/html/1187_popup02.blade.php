@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">
    span {vertical-align:auto}
    .willbes-Layer-PassBox {height:auto; overflow-y:scroll;}
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
            <span class="tx-bright-blue">4/23(화) 형법&형소법</span> 학원실강 참여
        </h3>
        <div class="eventPopS1">
            <ul>
                <li>
                    <strong>* 이름</strong>
                    <input type="text" name="textfield" id="textfield"> 
                </li>
                <li>
                    <strong class="mt10">* 참여캠퍼스</strong>
                    <ul>
                        <li><input type="radio" name="" id="campus1" value="" /> <label for="campus1">노량진</label></li>
                        <li><input type="radio" name="" id="campus2" value="" /> <label for="campus2">신림</label></li>
                        <li><input type="radio" name="" id="campus3" value="" /> <label for="campus3">부산</label></li>
                        <li><input type="radio" name="" id="campus4" value="" /> <label for="campus4">대구</label></li>
                        <li><input type="radio" name="" id="campus5" value="" /> <label for="campus5">인천</label></li>
                        <li><input type="radio" name="" id="campus6" value="" /> <label for="campus6">광주</label></li>
                        <li><input type="radio" name="" id="campus7" value="" /> <label for="campus7">전북</label></li>
                        <li><input type="radio" name="" id="campus8" value="" /> <label for="campus8">진주</label></li>
                        <li><input type="radio" name="" id="campus9" value="" /> <label for="campus9">제주</label></li>
                    </ul>
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