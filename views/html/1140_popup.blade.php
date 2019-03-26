@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<!-- Container -->

<style type="text/css">
	/* 팝업*/	
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
	#gridContainer * {font-family:'Noto Sans KR', Arial, Sans-serif, "나눔고딕", "돋움"; font-weight:normal}

	.popupCts {padding:0 30px}
	.popupCts span {display:inline-block; color:#000; font-weight:bold; vertical-align:middle}	
	.popupCts span.red {color:#F00; text-decoration:underline}
	.popupCts input,
	.popupCts select {vertical-align:middle; height:26px; line-height:26px}
	.popupCts input[type=text] {padding:0 2px; height:24px; line-height:24px}
	
</style>

<div id="popup" class="Layerpop" >
    <div class="popcontent">
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
            <p>Q2. 과목 시험 체감 난이도 </p>
            <div class="qBox">
                <div>1) 응시한 과목을 선택해 주세요.</div>
                <ul>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="31" onclick="vwItem();"/>국어</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="33" onclick="vwItem();"/>한국사</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="108" onclick="vwItem();"/>헌법</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="77" onclick="vwItem();"/>행정법</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="116" onclick="vwItem();"/>행정학</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="109" onclick="vwItem();"/>경제학</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="41" onclick="vwItem();"/>회계학</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="90" onclick="vwItem();"/>세법</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="117" onclick="vwItem();"/>국제법</label></li>
                    <li><label><input type="checkbox" name="chk_sbj"  id="chk_sbj" value="115" onclick="vwItem();"/>국제정치학</label></li>               
                </ul>                                     
                <div>2) 응시한 과목의 체감난이도는 어떠셨나요?</div>
                <div id="vItem" >  
                    <ul>
                        <li>국어 <label><input type="radio" name="POLL_30" id="POLL_30" value="1" /> 매우 쉬움</label></li>
                        <li>한국사 <label><input type="radio" name="POLL_30" id="POLL_30" value="1" /> 매우 쉬움</label></li>
                    </ul>                   
                </div>
            </div>
        </div>
                            
        <div class="btnsSt3">
            <a href="javascript:fn_submit();">설문 완료</a>
        </div>    

    </div> <!--popcontent//-->

</div>
<!--willbes-Layer-PassBox//-->
@stop