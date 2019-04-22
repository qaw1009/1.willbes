@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
<link href="/public/css/willbes/promotion/cop_2018_1ch.css?ver={{time()}}" rel="stylesheet">
<!-- Container -->
<style type="text/css">
    .willbes-Layer-PassBox {height:auto; overflow-y:scroll;}    
</style>

<div class="willbes-Layer-PassBox NGR">
    <form id="" name="" method="post"  action="">

    <div class="eventPop">
		<h3>
            2019년 경찰 1차 <span class="tx-bright-blue">시험 난이도</span> 설문조사
        </h3>
        <div class="question">
            <p>Q1. 응시직렬 </p>
            <div class="qBox">
                <ul>
                    <li><input type="radio" name=""  id="CT1"  value=""/><label for="CT1">일반공채</label></li>
                    <li><input type="radio" name=""  id="CT2"  value=""/><label for="CT2">경행경채</label></li>
                    <li><input type="radio" name=""  id="CT3"  value=""/><label for="CT3">101단</label></li>
                </ul>
            </div>
        </div>
			
        <div class="question">
            <p>Q2. 전체적인 시험 체감 난이도 </p>
            <div class="qBox">
                <ul>
                    <li><label><input type="radio" name="" id="B1" value="" /><label for="B1">매우 쉬움</label></li>
                    <li><label><input type="radio" name="" id="B2" value="" /><label for="B2">쉬움</label></li>
                    <li><label><input type="radio" name="" id="B3" value="" /><label for="B3">보통</label></li>
                    <li><label><input type="radio" name="" id="B4" value="" /><label for="B4">어려움</label></li>
                    <li><label><input type="radio" name="" id="B5" value="" /><label for="B5">매우 어려움</label></li>
                </ul>
            </div>
        </div> 
			
        <div id="target_aa">
            <div class="question">
                <p>Q3. 공통 과목 시험 체감 난이도 </p>
                <div class="qBox">
                    <strong>한국사</strong>
                    <ul>
                        <li><label><input type="radio" name="" id="C1" value="" /><label for="C1">매우 쉬움</label></li>
                        <li><label><input type="radio" name="" id="C2" value="" /><label for="C2">쉬움</label></li>
                        <li><label><input type="radio" name="" id="C3" value="" /><label for="C3">보통</label></li>
                        <li><label><input type="radio" name="" id="C4" value="" /><label for="C4">어려움</label></li>
                        <li><label><input type="radio" name="" id="C5" value="" /><label for="C5">매우 어려움</label></li>
                    </ul>
                    <strong>영어</strong>
                    <ul>
                        <li><label><input type="radio" name="" id="D1" value="" /><label for="D1">매우 쉬움</label></li>
                        <li><label><input type="radio" name="" id="D2" value="" /><label for="D2">쉬움</label></li>
                        <li><label><input type="radio" name="" id="D3" value="" /><label for="D3">보통</label></li>
                        <li><label><input type="radio" name="" id="D4" value="" /><label for="D4">어려움</label></li>
                        <li><label><input type="radio" name="" id="D5" value="" /><label for="D5">매우 어려움</label></li>
                    </ul>
                </div>
            </div>        

            <div class="question">
                <p>Q4. 선택 과목 시험 체감 난이도 </p>
                <div class="qBox">
                    <div>1) 응시한 과목을 선택해 주세요.</div>
                    <ul>
                        <li><input type="checkbox" name=""  id="E1" value=""/><label for="E1">형법</label></li>
                        <li><input type="checkbox" name=""  id="E2" value=""/><label for="E2">형사소송법</label></li>
                        <li><input type="checkbox" name=""  id="E3" value=""/><label for="E3">경찰학개론</label></li>
                        <li><input type="checkbox" name=""  id="E4" value=""/><label for="E4">국어</label></li>
                        <li><input type="checkbox" name=""  id="E5" value=""/><label for="E5">수학</label></li>
                        <li><input type="checkbox" name=""  id="E6" value=""/><label for="E6">사회</label></li>
                        <li><input type="checkbox" name=""  id="E7" value=""/><label for="E7">과학</label></li>
                    </ul>
                    <div>2) 응시한 과목의 체감난이도는 어떠셨나요?</div>
                    <div class="qBox">
                        <strong>형법</strong>
                        <ul>
                            <li><label><input type="radio" name="" id="FA1" value="" /><label for="FA1">매우 쉬움</label></li>
                            <li><label><input type="radio" name="" id="FA2" value="" /><label for="FA2">쉬움</label></li>
                            <li><label><input type="radio" name="" id="FA3" value="" /><label for="FA3">보통</label></li>
                            <li><label><input type="radio" name="" id="FA4" value="" /><label for="FA4">어려움</label></li>
                            <li><label><input type="radio" name="" id="FA5" value="" /><label for="FA5">매우 어려움</label></li>
                        </ul>
                        <strong>형사소송법</strong>
                        <ul>
                            <li><label><input type="radio" name="" id="FB1" value="" /><label for="FB1">매우 쉬움</label></li>
                            <li><label><input type="radio" name="" id="FB2" value="" /><label for="FB2">쉬움</label></li>
                            <li><label><input type="radio" name="" id="FB3" value="" /><label for="FB3">보통</label></li>
                            <li><label><input type="radio" name="" id="FB4" value="" /><label for="FB4">어려움</label></li>
                            <li><label><input type="radio" name="" id="FB5" value="" /><label for="FB5">매우 어려움</label></li>
                        </ul>
                        <strong>경찰학개론</strong>
                        <ul>
                            <li><label><input type="radio" name="" id="FC1" value="" /><label for="FC1">매우 쉬움</label></li>
                            <li><label><input type="radio" name="" id="FC2" value="" /><label for="FC2">쉬움</label></li>
                            <li><label><input type="radio" name="" id="FC3" value="" /><label for="FC3">보통</label></li>
                            <li><label><input type="radio" name="" id="FC4" value="" /><label for="FC4">어려움</label></li>
                            <li><label><input type="radio" name="" id="FC5" value="" /><label for="FC5">매우 어려움</label></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="btnsSt3">
            <a href="#">설문완료</a>
            <a href="javascript:close();">설문취소</a>
        </div>
    </div>

    </form>
</div>
<!--willbes-Layer-PassBox//-->



@stop