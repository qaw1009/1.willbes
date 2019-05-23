@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->
<style type="text/css">   
    .willbes-Layer-PassBox span {vertical-align:auto}
    .eventPop {width:640px; margin:0 auto; font-size:12px; color:#333; line-height:1.5; padding-bottom:50px}
    .eventPop h3 {font-size:18px; font-weight:bold; border-bottom:2px solid #000; text-align:center; padding-bottom:15px; color:#000;} 

    .eventPopS1 {margin-top:1em}
    .eventPopS1 ul > li {border-bottom:1px solid #e4e4e4; padding:15px 0}
    .eventPopS1 ul > li.w50 {display:inline; float:left; width:50%}
    .eventPopS1 strong {display:block; margin-bottom:10px; font-size:14px}
    .eventPopS1 p {margin-bottom:10px}
    .eventPopS1 p a {float:right; text-decoration:underline}
    .eventPopS1 ul > li div {padding:20px; border:1px solid #e4e4e4; margin-bottom:10px}
    .eventPopS1 ul > li div strong {font-size:12px}
    .eventPopS1 li ul {margin-bottom:10px}
    .eventPopS1 li li {display:inline-block; border:0; margin-right:10px; padding:0}

    .viewTb {width:100%;}
	.viewTb th,
	.viewTb td{padding:8px; border-bottom:1px solid #cdcdcd; border-right:1px solid #cdcdcd}
	.viewTb thead th,
	.viewTb tbody th {text-align:center; font-weight:bold; border-right:1px solid #cdcdcd; background:#f0f0f0}
    .viewTb thead th {border-top:1px solid #cdcdcd}
    .viewTb th:last-child,
    .viewTb td:last-child {border-right:0}
	.viewTb tr.txtC td {text-align:center}
	.viewTb input[type=text],
	.viewTb input[type=password],
	.viewTb input[type=number] {width:70px}
	.viewTb td .route li {display:inline; float:left; width:50%}
    .viewTb td .route:after {content:""; display:block; clear:both}

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
}

</style>
<div class="willbes-Layer-PassBox NGR">
    <form id="" name="" method="post" action="">
    <div class="eventPop">
        <h3>
            <span class="tx-bright-blue">나의 성적 입력</span>
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
                    <strong>* 필기점수 입력</strong>
                    <p class="tx-blue">
                        반드시 성적표에 기재된 조정점수를 입력해 주세요. 
                        <a href="http://gosi.police.go.kr"  target="_blank">필기시험 성적 확인하기 ▶</a>
                    </p>
                    <div>
                        <strong>공통과목</strong>
                        <span>영어</span> <input type="text" maxlength="3" name="" id="" onkeyup=""> 점   /  
                        <span>한국사</span> <input type="text" maxlength="3" name="" id="" onkeyup="">점
                    </div>
                    <div>
                        <strong>선택과목</strong>
                        <table class="viewTb">
                            <col span="2" />
                            <thead>
                                <tr class="bdRno">
                                    <th>
                                        <select name="" id="" onchange="" style="width:120px;">
                                            <option value="">선택과목1</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select name="" id="" onchange="" style="width:120px;">
                                            <option value="">선택과목2</option>
                                        </select>
                                    </th>
                                    <th>
                                        <select name="" id="" onchange=""  style="width:120px;">
                                            <option value="">선택과목3</option>
                                        </select>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="txtC">
                                    <td><input type="text" maxlength="5" name="" id=""  > 점</td>
                                    <td><input type="text" maxlength="5" name="" id=""  > 점</td>
                                    <td><input type="text" maxlength="5" name="" id=""  > 점</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <strong>체력점수 / 가산점 입력</strong>
                        <span>체력점수</span> <input type="text" maxlength="3" name="" id="" onkeyup=""> 점   /  
                        <span>가산점</span> <input type="text" maxlength="3" name="" id="" onkeyup="">점
                    </div>
                </li>
                <li>
                    * 본 서비스는 필기시험 점수, 체력 점수, 가산점을 합산한 성적으로 면접점수는 제외되어 실제 결과와 차이가 있을 수 있습니다.<br>
                    * 본 서비스의 점수 입력 마감 기한은 <span class="tx-red">2019년 7월 16일 (화)</span> 까지 입니다.
                </li>
            </ul>
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