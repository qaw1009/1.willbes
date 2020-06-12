@extends('willbes.pc.layouts.master_no_sitdbar')
<link href="/public/css/willbes/basic.css" rel="stylesheet">
<link href="/public/css/willbes/style.css" rel="stylesheet">
<style type="text/css">
    /* 팝업*/
    .popcontent {padding:20px}
    .popcontent h3 {font-size:18px; border-bottom:2px solid #353348; color:#d39004; padding-bottom:10px}	
	.question {margin-top:1em}
	.question p {padding:10px; background:#898989; border-bottom:1px solid #666; color:#fff; margin-bottom:1em}
	.question div.qBox {padding:5px 10px}
    .question span {color:#000; width:50px; display:block; font-weight:bold}
    .question div.qBox div {margin-bottom:10px}
	.question div.qBox ul {margin:0; padding:0; margin-bottom:10px}
	.question li {display:inline; float:left; margin-right:10px}
	.question ul:after {content:""; display:block; clear:both}
	.question .tab li {display:inline; float:left; margin-right:1px}
	.question .tab:after {content:""; display:block; clear:both}
	.question .tab a {display:block; padding:5px 10px}
	.question .tab a:hover,
    .question .tab a.active {background:#464646; color:#fff}
    
    .btnsSt3 {text-align:center; margin-top:20px}
    .btnsSt3 a {display:inline-block; padding:8px 16px; background:#d39004; color:#fff !important; font-weight:400; border:1px solid #d39004}
    .btnsSt3 a:hover {background:#fff; color:#d39004 !important}

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
                <ul>
                    <li><span>국어</span></li>
                    <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                    <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
            <div class="qBox">
                <ul>
                    <li><span>영어</span></li>    
                    <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                    <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                    <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                </ul>
            </div>
            <div class="qBox">
                <ul>
                    <li><span>한국사</span></li>
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
                    <li><label><input type="checkbox" name=" "  id=" " value=" " /> 과목1</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " /> 과목2</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " /> 과목3</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " /> 과목4</label></li>
                    <li><label><input type="checkbox" name=" "  id=" " value=" " /> 과목5</label></li>               
                </ul>                                     
                <div id="vItem" class="mt20"> 
                    <ul>
                        <li><span>과목1</span></li> 
                        <li><label><input type="radio" name=" " id=" " value="1" /> 매우 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="2" /> 쉬움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="3" /> 보통</label></li>
                        <li><label><input type="radio" name=" " id=" " value="4" /> 어려움</label></li>
                        <li><label><input type="radio" name=" " id=" " value="5" /> 매우 어려움</label></li>
                    </ul> 
                    <ul>
                        <li><span>과목2</span></li>     
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