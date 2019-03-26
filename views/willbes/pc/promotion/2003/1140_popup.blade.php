@extends('willbes.pc.layouts.master_no_sitdbar')
<link href="/public/css/willbes/basic.css" rel="stylesheet">
<link href="/public/css/willbes/style.css" rel="stylesheet">
<style type="text/css">
    /* 팝업*/
    .popcontent {padding:20px}
    .popcontent h3 { font-size:18px; border:2px solid #353348; color:#d39004}	
	.Layerpop {background:#FFF; border:#4582cd solid 3px; padding:30px;}
	.Layerpop h1 {text-align:left; font-weight:bold; letter-spacing:-1px; font-size:20px; color:#000; margin-bottom:20px}
	.Layerpop .tit {font-size:16px; color:#4582cd; font-weight:bold; letter-spacing:1px; text-align:left; padding:0; margin-bottom:10px}
	.Layerpop .ck {padding-left:5px}
	.Layerpop p {margin:10px 0 0 0}
	.Layerpop .btn{text-align:center}
	.Layerpop .btn img {padding:15px 5px 20px 0px}		
		
	.preTb {width:100%; margin-bottom:15px; border-top:#636363 solid 2px; border-bottom:2px solid #636363}
	.preTb th,
	.preTb td {padding:10px 5px; border-bottom:#EEE solid 1px; line-height:20px}
	.preTb th{font-weight:bold !important; background:#F5F5F5}
	.preTb input[type=text] {border:#CCC 1px solid; height:20px; line-height:20px} 	
	.preTb label {margin-right:10px}	
	
	.Layerpop .termsBx01{padding:0px 20px ; height:80px;overflow:hidden;overflow-y:scroll;border:1px solid #cecece;line-height:1.5}
	.Layerpop .termsBx01 h2{margin:10px 0;font-weight:bold;font-size:14px}
	.Layerpop .termsBx01 .st  {margin-top:15px}
	.Layerpop .termsBx01 ul li p {padding-left:6px}
	.Layerpop .termsBx01 .span { height:60px; text-align:right}	

	.popupCts {padding:0 30px}
	.popupCts span {display:inline-block; color:#000; font-weight:bold; vertical-align:middle}	
	.popupCts span.red {color:#F00; text-decoration:underline}
	.popupCts input,
	.popupCts select {vertical-align:middle; height:26px; line-height:26px}
	.popupCts input[type=text] {padding:0 2px; height:24px; line-height:24px}	
</style>

@section('content')
<!-- Container -->

    <div class="popcontent NGR">
        <h3>시험 난이도 설문조사</h3>                 
        <div class="question">
            <p>Q1. 전체적인 시험 체감 난이도 </p>
            <div class="qBox">
                <ul>
                    <li><label><input type="radio" name="POLL_30" id="POLL_30" value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name="POLL_30" id="POLL_30" value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name="POLL_30" id="POLL_30" value="3" /> 보통</label></li>
                    <li><label><input type="radio" name="POLL_30" id="POLL_30" value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name="POLL_30" id="POLL_30" value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
        </div> 
                            
        <div class="question">
            <p>Q2. 공통 과목 시험 체감 난이도 </p>
            <div class="qBox">
                <strong>국어</strong>
                <ul>
                    <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                    <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
            <div class="qBox">
                <strong>영어</strong>
                <ul>
                    <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                    <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
            <div class="qBox">
                <strong>한국사</strong>
                <ul>
                    <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                    <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
        </div>

        <div class="question">
            <p>Q3. 선택 과목 시험 체감 난이도 </p>
            <div class="qBox">
                <div>1) 응시한 과목을 선택해 주세요.</div>
                <ul>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " />과목1</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " />과목2</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " />과목3</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " />과목4</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " />과목5</label></li>               
                </ul>                                     
                <div id="vItem" > 
                    <strong>과목1</strong>   
                    <ul>
                        <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                        <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                    </ul>
                    <strong>과목2</strong>   
                    <ul>
                        <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                        <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                    </ul>              
                </div>
            </div>
        </div>

                            
        <div class="btnsSt3">
            <a href="javascript:fn_submit();">설문 완료</a>
        </div>    

    </div> 

@stop