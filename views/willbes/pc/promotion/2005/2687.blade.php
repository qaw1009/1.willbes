@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /************************************************************/

    .evt_top {background:url("https://static.willbes.net/public/images/promotion/2022/06/2687_top_bg.jpg") no-repeat center top;}

    .evt01 {padding:100px 0;}

    /*전체 탭*/
    .evt_tab {padding-bottom:100px;}
    .tabs {width:1120px; margin:0 auto;padding-bottom:50px;}
    .tabs li {display:inline; float:left; width:25%;} 
    .tabs li a {display:block; color:#fff; background:#000; height:50px; line-height:50px; text-align:center; margin-right:1px; font-size:20px;font-weight:bold;}
    .tabs li a:hover,
    .tabs li a.active {background:#2260ff;}
    .tabs li:last-child a {margin:0}
    .tabs:after {content:""; display:block; clear:both}

     /*2번째 탭*/
    .step {font-size:17px;line-height:2;padding-bottom:50px;}
    .stage {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;}
    .phase {display:inline-block;background:#000;color:#fff;border-radius:10px;width:75px;text-align:center;}
    .bold {font-weight:bold;}
    .gray {background:#F2F2F2}
    .blue {background:#DAE3F3}
    .avg {background:#FBE5D6}
    .current {border:3px solid red;}
    .careful {color:red;text-align:right;width:720px;margin:0 auto;line-height:1.25;}
    .chart a {display:inline-block;margin:10px;}
    .table_type {width:720px; margin:1em auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid}
    .table_type caption {display:none}	
    .table_type th,
    .table_type td {letter-spacing:normal; text-align:center; padding:10px 8px}
    .table_type th {color:#464646; background:#f3f3f3; font-weight:400; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid}
    .table_type th.th2 {background:#fffcd1}
    .table_type td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:left;}
    .table_type td input {vertical-align:middle}
    .table_type td span.blueB {font-weight:bold; color:#33F}
    .table_type td span.redB {font-weight:bold; color:#C00}
    .table_type td label {margin-right:10px}
    .table_type .lineNo {border-right:none}
    ul.sel_info li { display: inline-block; margin-right:10px; margin-bottom:5px;vertical-align:bottom;}

    .eventPopS3 {padding:20px;}
    .eventPopS3 p {font-weight:bold; margin-bottom:10px}
    .eventPopS3 ul {border:1px solid #adadad; padding:10px 4px;text-align:left;line-height:1.5;}
    .eventPopS3 ul {width:720px;margin:0 auto;}
    .eventPopS3 li {padding:0; margin:0;margin-left:15px; margin-bottom:5px} 
    .eventPopS3 div {margin-top:10px;}
    .eventPopS3 input {vertical-align:middle}
    
    .markSbtn1 {width:100%; margin:1.5em auto; text-align:center;}
    .markSbtn1 a {display:inline-block; padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .markSbtn1 a.btn2 {background:#bf1212; border:1px solid #bf1212}
    .markSbtn1 a.btn3 {background:#fff; border:1px solid #333; color:#333}
    .markSbtn2 {display:inline;padding:10px;background:#2260ff; color:#fff;margin:0 5px}
    .graph_area {font-size:17px;line-height:1.5;text-align:left;width:720px;margin:0 auto;padding-bottom:5px;text-align:center;}
    .graph_area::after {content:'';display:block;clear:both;}
    .markSbtn3 {display:inline;float:left;width:50%;}
    .recheck_area {margin:50px;}

    #frm3 {width:720px;margin:0 auto;}

    .marking {margin:10px; padding:10px; border:1px dashed #e4e4e4}
    .marking h5 {font-size:17px; margin-bottom:10px;text-align:left;font-weight:bold;}
    .marking li {display:inline; float:left; width:16.666%;}
    .marking li div {margin-right:4px;  padding:3px; background:#666; text-align:center}
    .marking li div label {color:#fff; padding-bottom:5px; display: block}
    .marking li div input {width:100%; padding:5px 0; margin:0 auto; text-align:center; letter-spacing:4px;background:#fff;}
    .marking li div span {position:absolute; right:20px; top:30px; z-index: 10;}
    .marking ul:after {content:""; display:block; clear:both}

    .markTab {width:720px;margin:0 auto;margin-top:10px; /*border-bottom:1px solid #333*/}
    .markTab li {display:inline; float:left; width:33.3333%}
    .markTab a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab a.active {background:#333}
    .markTab li:last-child a {margin-right:0}
    .markTab:after {content:""; display:block; clear:both}

    .markTab2 {width:720px;margin:0 auto;margin-top:10px; /*border-bottom:1px solid #333*/}
    .markTab2 li {display:inline; float:left; width:25%}
    .markTab2 a {display:block; padding:1em 0; background:#999; color:#fff; margin-right:1px; font-weight:bold; letter-spacing:2px; text-align:center}
    .markTab2 a.active {background:#333}
    .markTab2 li:last-child a {margin-right:0}
    .markTab2:after {content:""; display:block; clear:both}

    .total td:nth-child(odd) {background:#F2F2F2;}
    .first {background:#F2F2F2;font-weight:bold;}
    .wrong {color:red !important;}
    .pass {color:#0070C0 !important;}
                
    </style>

    <!-- Container -->

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_top.jpg" alt="psat 합격을 예측하다">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2687_01.jpg" alt="신뢰할수 있는 합격 예상 커트라인">          
        </div>

        <div class="evtCtnsBox evt_tab" data-aos="fade-up">
            <ul class="tabs">
				<li><a href="#tab01">메인</a></li>
				<li><a href="#tab02">기본정보 및 답안입력</a></li>
				<li><a href="#tab03">성적확인 및 분석</a></li>
				<li><a href="#tab04">합격예측</a></li>			
			</ul>
            
			<div id="tab01">
                추후 디자인             
            </div>

			<div id="tab02">
                <div class="step">
                    시험 보시느라 수고 많으셨습니다.<br>
                    나의 합격 여부를 함께 알아볼까요?<br>
                    성적채점은 <span class="bold">총 3 단계로 진행</span>됩니다
                </div>
                <div class="stage"><span class="phase">1단계</span> <span class="bold">기본정보 입력</span><br>
                    기본 정보를 입력하시면 합격예측 서비스 이용이 가능합니다.
                </div>                    
                <form name="frm"  id="frm" action="" method="post">
                    <table cellspacing="0" cellpadding="0" class="table_type">
                        <col width="30%" />
                        <col width="*" />
                        <tr>
                            <th>이름</th>
                            <td>
                                <label>
                                    <input type="text" name="textfield" id="textfield"> 
                                </label>
                            </td>                                                            
                        </tr>
                        <tr>
                            <th>연락처</th>
                            <td>
                                <label>
                                    <input type="text" name="textfield" id="textfield" onkeyup="fn_OnlyNumber(this);"> 
                                </label>
                            </td>
                        </tr>        
                            <th>직렬</th>
                            <td>
                                <select title="직렬선택" name="test_subject" id="test_subject" >
                                    <option value="">직렬선택</option>
                                    <option  value="">직렬1</option>
                                    <option  value="">직렬2</option>
                                    <option  value="">직렬3</option>
                                </select>                         
                                <select title="지역구분" id="listview" name="listview">
                                    <option value="">지역</option>
                                    <option value="">지역1</option>
                                    <option value="">지역2</option>
                                    <option value="">지역3</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>시험응시번호</th>
                            <td>
                                <label>
                                    <input type="text" name="textfield" id="textfield" onkeyup="fn_OnlyNumber(this);"> 
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <th>책형</th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="lec1" id="lec1" value="A" /> <label for="lec1">가형</label></li>
                                    <li><input type="radio" name="lec2" id="lec2" value="B" />
                                    나형</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>가산점</th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="term1" id="term1" value="A" />
                                    10점
                                        <label for="term1"></label></li>
                                    <li><input type="radio" name="term2" id="term2" value="B" />
                                        5점
                                    </li>
                                    <li><input type="radio" name="term3" id="term3" value="C" />
                                    3점
                                    </li>
                                    <li><input type="radio" name="term4" id="term4" value="D" />
                                    없음
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="eventPopS3">
                    <div class="stage">📣 <span class="bold">이벤트 참여에 따른 사전 동의사항</span></div>
                    <ul>
                        <li>
                            <span class="bold">1. 개인정보 수집 항목(개인정보 보호법 제15조 제2항)</span><br>
                            - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소                            
                        </li>
                        <li>
                            <span class="bold">2. 개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)</span><br>
                            - 성적 이벤트 등의 본인확인<br>
                            - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
                            - 서비스 이용과 관련된 정보 안내 등 편의제공 목적
                        </li>
                        <li>
                            <span class="bold">3. 개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)</span><br>
                            - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.
                        </li>
                        <li>
                            <span class="bold">4.개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)</span><br>
                            - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다.<br>
                            - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.
                        </li>
                    </ul>
                    <div class="stage">
                        <input name="is_chk" id="is_chk" type="checkbox" value="Y" ><label for="is_chk"> 윌비스에 개인정보 제공 동의하기(필수)</label>
                    </div>
                </div>                
                <div class="markSbtn1">
                    <a href="javascript:void(0)">저 장</a>
                </div>
                <div class="stage">
                    <span class="phase">2단계</span> <span class="bold">체감난이도 입력</span>
                </div>
                <form name="frm2"  id="frm2" action="" method="post">
                    <table cellspacing="0" cellpadding="0" class="table_type">
                        <col width="30%" />
                        <col width="*" />                           
                        <tr>
                            <th>언어논리</th>
                            <td>
                                <ul class="sel_info">
                                    <li><input type="radio" name="lev1" id="lev1" value="A" />
                                    매우 어려움
                                    </li>
                                    <li><input type="radio" name="lev2" id="lev2" value="B" />
                                        어려움
                                    </li>
                                    <li>
                                        <input type="radio" name="lev3" id="lev3" value="C" />
                                        보통
                                    </li>
                                    <li>
                                        <input type="radio" name="lev4" id="lev4" value="D" />
                                        쉬움
                                    </li>
                                    <li>
                                        <input type="radio" name="lev5" id="lev5" value="E" />
                                        매우 쉬움
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>상황판단</th>
                            <td>
                                <ul class="sel_info">
                                    <li>
                                        <input type="radio" name="lev1" id="lev1" value="A" />
                                        매우 어려움 </li>
                                    <li>
                                        <input type="radio" name="lev2" id="lev2" value="B" />
                                        어려움 </li>
                                    <li>
                                        <input type="radio" name="lev3" id="lev3" value="C" />
                                        보통 </li>
                                    <li>
                                        <input type="radio" name="lev4" id="lev4" value="D" />
                                        쉬움 </li>
                                    <li>
                                        <input type="radio" name="lev5" id="lev5" value="E" />
                                        매우 쉬움 </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>자료해석</th>
                            <td>
                                <ul class="sel_info">
                                    <li>
                                        <input type="radio" name="lev1" id="lev1" value="A" />
                                        매우 어려움 </li>
                                    <li>
                                        <input type="radio" name="lev2" id="lev2" value="B" />
                                        어려움 </li>
                                    <li>
                                        <input type="radio" name="lev3" id="lev3" value="C" />
                                        보통 </li>
                                    <li>
                                        <input type="radio" name="lev4" id="lev4" value="D" />
                                        쉬움 </li>
                                    <li>
                                        <input type="radio" name="lev5" id="lev5" value="E" />
                                        매우 쉬움 </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>전체</th>
                            <td>
                                <ul class="sel_info">
                                    <li>
                                        <input type="radio" name="lev1" id="lev1" value="A" />
                                        매우 어려움 </li>
                                    <li>
                                        <input type="radio" name="lev2" id="lev2" value="B" />
                                        어려움 </li>
                                    <li>
                                        <input type="radio" name="lev3" id="lev3" value="C" />
                                        보통 </li>
                                    <li>
                                        <input type="radio" name="lev4" id="lev4" value="D" />
                                        쉬움 </li>
                                    <li>
                                        <input type="radio" name="lev5" id="lev5" value="E" />
                                        매우 쉬움 </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th><p>가장 어려웠던 과목</p></th>
                            <td>
                                <ul class="sel_info">
                                    <li>
                                        <input type="radio" name="lec3" id="lec3" value="A" />
                                        언어논리
                                    </li>
                                    <li>
                                        <input type="radio" name="lec4" id="lec4" value="B" />
                                    상황판단</li>
                                    <li>
                                        <input type="radio" name="lec5" id="lec5" value="C" />
                                    자료해석</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </form>
                <div class="markSbtn1">
                    <a href="javascript:void(0)">설 문 완 료</a>
                </div>
                <div class="stage">
                    <span class="phase">3단계</span> <span class="bold">답안 입력 / 채점결과 확인</span>
                </div>
                <form name="frm3"  id="frm3" action="" method="post">                    
                    <div>
                        <div class="marking">
                            <h5>헌법</h5>
                            <ul>
                                <li>
                                    <div>    
                                        <label>번호</label>
                                        <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>1 ~ 5번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>6 ~ 10번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>11 ~ 15번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>16 ~ 20번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>21 ~ 25번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="marking">
                            <h5>형사법</h5>
                            <ul>
                                <li>
                                    <div>    
                                        <label>번호</label>
                                        <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>1 ~ 5번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>6 ~ 10번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>11 ~ 15번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>16 ~ 20번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>21 ~ 25번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="marking">
                            <h5>경찰학</h5>
                            <ul>
                                <li>
                                    <div>    
                                        <label>번호</label>
                                        <input value="" name="답안입력" id="답안입력" placeholder="답안입력" disabled>
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>1 ~ 5번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>6 ~ 10번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>11 ~ 15번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>16 ~ 20번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>
                                <li>
                                    <div>    
                                        <label>21 ~ 25번</label>
                                        <input value="" type="number" maxlength="5" name="" id="">
                                    </div>
                                </li>                                 
                            </ul>
                        </div>                       
                    </div>                        
                </form>
                <div class="markSbtn1">
                    <a href="javascript:void(0)">채 점 하 기</a>
                </div>
                <div class="stage">
                    <span class="phase">3단계</span> <span class="bold">답안 입력 / 채점결과 확인</span>
                </div>
                <form name="frm4"  id="frm4" action="" method="post">
                    <ul class="markTab">
                        <li><a href="#tab1">언어논리</a></li>
                        <li><a href="#tab2">상황판단</a></li>
                        <li><a href="#tab3">자료해석</a></li>
                    </ul>
                    <table cellspacing="0" cellpadding="0" class="table_type">
                        <col width="15%" />
                        <col width="15%" />
                        <col width="15%" />
                        <col width="15%" />
                        <col width="20%" />
                        <col width="20%" />                            
                        <tr class="total">
                            <td dir="ltr" width="88">내점수</td>
                            <td dir="ltr" width="88">30점</td>
                            <td dir="ltr" width="88">정답수/총문항</td>
                            <td dir="ltr" width="88"></td>  
                            <td dir="ltr" width="88">정답률</td>
                            <td dir="ltr" width="88"></td>    
                        </tr>
                    </table>

                    <div id="tab1">
                        <table cellspacing="0" cellpadding="0"class="table_type">
                            <col width="72" span="10" />
                            <tr class="first">
                                <td rowspan="2" dir="ltr" width="72">NO</td>
                                <td rowspan="2" dir="ltr" width="72">정답</td>
                                <td rowspan="2" dir="ltr" width="72">답안</td>
                                <td rowspan="2" dir="ltr" width="72">정오</td>
                                <td rowspan="2" dir="ltr" width="72">정답률</td>
                                <td colspan="5" dir="ltr" width="360">전체 응시자 문항별 선택비율</td>
                            </tr>
                            <tr class="first">
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">5</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">5</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">6</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">7</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">8</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">9</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">10</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">11</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">12</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">13</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">14</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">15</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">16</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">17</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">18</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">19</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">20</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">21</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">22</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">23</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">24</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">25</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                        </table>
                    </div>              

                    <div id="tab2">                
                        <table cellspacing="0" cellpadding="0"class="table_type">
                            <col width="72" span="10" />
                            <tr class="first">
                                <td rowspan="2" dir="ltr" width="72">NO</td>
                                <td rowspan="2" dir="ltr" width="72">정답</td>
                                <td rowspan="2" dir="ltr" width="72">답안</td>
                                <td rowspan="2" dir="ltr" width="72">정오</td>
                                <td rowspan="2" dir="ltr" width="72">정답률</td>
                                <td colspan="5" dir="ltr" width="360">전체 응시자 문항별 선택비율</td>
                            </tr>
                            <tr class="first">
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">5</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">5</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">6</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">7</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">8</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">9</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">10</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">11</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">12</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">13</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">14</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">15</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">16</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">17</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">18</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">19</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">20</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">21</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">22</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">23</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">24</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">25</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                        </table>    
                    </div>

                    <div id="tab3">
                        <table cellspacing="0" cellpadding="0"class="table_type">
                            <col width="72" span="10" />
                            <tr class="first">
                                <td rowspan="2" dir="ltr" width="72">NO</td>
                                <td rowspan="2" dir="ltr" width="72">정답</td>
                                <td rowspan="2" dir="ltr" width="72">답안</td>
                                <td rowspan="2" dir="ltr" width="72">정오</td>
                                <td rowspan="2" dir="ltr" width="72">정답률</td>
                                <td colspan="5" dir="ltr" width="360">전체 응시자 문항별 선택비율</td>
                            </tr>
                            <tr class="first">
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">5</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">5</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">6</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">7</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">8</td>
                                <td dir="ltr" width="72">4</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">9</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">10</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">11</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">12</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">13</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">14</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">15</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">16</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">17</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">18</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">19</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">20</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">21</td>
                                <td dir="ltr" width="72">2</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">22</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">23</td>
                                <td dir="ltr" width="72">1</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72" class="wrong">X</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72" class="bold" >94.20%</td>
                                <td dir="ltr" width="72">0.70%</td>
                                <td dir="ltr" width="72">1.30%</td>
                                <td dir="ltr" width="72">3.50%</td>
                                <td dir="ltr" width="72">0.40%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">24</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">3.40%</td>
                                <td dir="ltr" width="72">6.90%</td>
                                <td dir="ltr" width="72">8.10%</td>
                                <td dir="ltr" width="72" class="bold">74.20%</td>
                                <td dir="ltr" width="72">7.50%</td>
                            </tr>
                            <tr>
                                <td dir="ltr" width="72">25</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">3</td>
                                <td dir="ltr" width="72">O</td>
                                <td dir="ltr" width="72">35.56%</td>
                                <td dir="ltr" width="72">27.40%</td>
                                <td dir="ltr" width="72" class="bold">58.20%</td>
                                <td dir="ltr" width="72">1.90%</td>
                                <td dir="ltr" width="72">3,4%</td>
                                <td dir="ltr" width="72">9.20%</td>
                            </tr>
                        </table>    
                    </div>

                </form>

                <div class="recheck_area">
                    <div class="markSbtn2">
                        <a href="javascript:void(0)">나의 합격예측 바로가기 ></a>
                    </div>
                    <div class="markSbtn2">
                        <a href="javascript:void(0)">재채점하기 ></a>
                    </div>  
                </div>

            </div>            

			<div id="tab03">
                <div class="stage">
                    <span class="bold">OOO님의 응시 정보</span>
                </div>  
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="153" span="4" />
                    <tr>
                        <td dir="ltr" width="153" class="bold gray">응시번호</td>
                        <td dir="ltr" width="153">40000329</td>
                        <td dir="ltr" width="153" class="bold gray">성명</td>
                        <td dir="ltr" width="153">한주연</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="153" class="bold gray">응시직렬</td>
                        <td dir="ltr" width="153">일반행정</td>
                        <td dir="ltr" width="153" class="bold gray">경쟁률</td>
                        <td dir="ltr" width="153">68.9:1</td>
                    </tr>
                    <tr>
                        <td colspan="2" dir="ltr" width="306" class="bold gray">선발인원 / 출원인원</td>
                        <td colspan="2" dir="ltr" width="306">215명 / 14,810명</td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">OOO님의 성적 분석</span>
                </div>
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="88" span="7" />
                    <tr class="bold gray">
                        <td dir="ltr" width="88">과목</td>
                        <td dir="ltr" width="88">내 점수</td>
                        <td dir="ltr" width="88">전체 평균</td>
                        <td dir="ltr" width="88">상위 10% 컷</td>
                        <td dir="ltr" width="88">상위 20% 컷</td>
                        <td dir="ltr" width="88">나의 상위 %</td>
                        <td dir="ltr" width="88">과락 여부</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">언어논리</td>
                        <td dir="ltr" width="88">12점</td>
                        <td dir="ltr" width="88">63.76점</td>
                        <td dir="ltr" width="88">80점</td>
                        <td dir="ltr" width="88">76점</td>
                        <td dir="ltr" width="88">99.70%</td>
                        <td dir="ltr" width="88" class="wrong">과락</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">상황판단</td>
                        <td dir="ltr" width="88">28점</td>
                        <td dir="ltr" width="88">63.53점</td>
                        <td dir="ltr" width="88">80점</td>
                        <td dir="ltr" width="88">76점</td>
                        <td dir="ltr" width="88">96.88%</td>
                        <td dir="ltr" width="88" class="pass">합격</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">자료해석</td>
                        <td dir="ltr" width="88">20점</td>
                        <td dir="ltr" width="88">63.06점</td>
                        <td dir="ltr" width="88">80점</td>
                        <td dir="ltr" width="88">76점</td>
                        <td dir="ltr" width="88">98.13%</td>
                        <td dir="ltr" width="88" class="wrong">과락</td>
                    </tr>
                    <tr class="bold">
                        <td dir="ltr" width="88" class="gray">합계 평균</td>
                        <td dir="ltr" width="88" class="avg">20.00점</td>
                        <td dir="ltr" width="88" class="avg">63.45점</td>
                        <td dir="ltr" width="88" class="avg">77.33점</td>
                        <td dir="ltr" width="88" class="avg">77.33점</td>
                        <td dir="ltr" width="88" class="avg">98.72%</td>
                        <td dir="ltr" width="88" class="avg wrong">과락</td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">전체 직렬별 나의 성적 위치</span>
                </div>
                <div class="careful">
                    ※ 데이터 집계중일 때는 나의 위치가 수시로 변동될 수 있습니다.<br>
                    ※ 직렬 구분 없이 풀서비스 이용자 전체의 과목별 성적 분포입니다.
                </div>
                <ul class="markTab2">
                    <li><a href="#tab4">전체평균</a></li>
                    <li><a href="#tab5">언어논리</a></li>
                    <li><a href="#tab6">상황판단</a></li>
                    <li><a href="#tab7">자료해석</a></li>                    
                </ul>
                <div class="bold chart">
                    <a href="javascript:void(0)">표 영역</a>                 
                </div>
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="88" span="7" />
                    <col width="72" />
                    <tr class="bold gray">
                        <td rowspan="2" dir="ltr" width="88">&nbsp;&nbsp;원점수<br>(이상~미만)</td>
                        <td rowspan="2" dir="ltr" width="88">구간비율</td>
                        <td rowspan="2" dir="ltr" width="88">누적인원</td>
                        <td rowspan="2" dir="ltr" width="88">누적비율</td>
                        <td rowspan="2" dir="ltr" width="88">&nbsp;&nbsp;원점수<br>(이상~미만)</td>
                        <td rowspan="2" dir="ltr" width="88">구간비율</td>
                        <td rowspan="2" dir="ltr" width="88">누적인원</td>
                        <td rowspan="2" dir="ltr" width="72">누적비율</td>
                    </tr>
                    <tr> </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">96점~</td>
                        <td dir="ltr" width="88">0.00%</td>
                        <td dir="ltr" width="88"> - </td>
                        <td dir="ltr" width="88">0.00%</td>
                        <td dir="ltr" width="88" class="bold blue">64점~68점</td>
                        <td dir="ltr" width="88">13.95%</td>
                        <td dir="ltr" width="88">2,270</td>
                        <td dir="ltr" width="72">55.75%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">92점~96점</td>
                        <td dir="ltr" width="88">0.22%</td>
                        <td dir="ltr" width="88">9</td>
                        <td dir="ltr" width="88">0.22%</td>
                        <td dir="ltr" width="88" class="bold blue">60점~64점</td>
                        <td dir="ltr" width="88">12.40%</td>
                        <td dir="ltr" width="88">2,775</td>
                        <td dir="ltr" width="72">68.15%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">88점~92점</td>
                        <td dir="ltr" width="88">0.64%</td>
                        <td dir="ltr" width="88">35</td>
                        <td dir="ltr" width="88">0.86%</td>
                        <td dir="ltr" width="88" class="bold blue">56점~60점</td>
                        <td dir="ltr" width="88">9.92%</td>
                        <td dir="ltr" width="88">3,179</td>
                        <td dir="ltr" width="72">78.07%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">84점~88점</td>
                        <td dir="ltr" width="88">1.65%</td>
                        <td dir="ltr" width="88">102</td>
                        <td dir="ltr" width="88">2.50%</td>
                        <td dir="ltr" width="88" class="bold blue">52점~56점</td>
                        <td dir="ltr" width="88">7.88%</td>
                        <td dir="ltr" width="88">3,500</td>
                        <td dir="ltr" width="72">85.95%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">80점~84점</td>
                        <td dir="ltr" width="88">4.35%</td>
                        <td dir="ltr" width="88">279</td>
                        <td dir="ltr" width="88">6.85%</td>
                        <td dir="ltr" width="88" class="bold blue">48점~52점</td>
                        <td dir="ltr" width="88">5.13%</td>
                        <td dir="ltr" width="88">3,709</td>
                        <td dir="ltr" width="72">91.09%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">76점~80점</td>
                        <td dir="ltr" width="88">8.67%</td>
                        <td dir="ltr" width="88">632</td>
                        <td dir="ltr" width="88">15.52%</td>
                        <td dir="ltr" width="88" class="bold blue">44점~48점</td>
                        <td dir="ltr" width="88">3.27%</td>
                        <td dir="ltr" width="88">3,842</td>
                        <td dir="ltr" width="72">94.35%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">72점~76점</td>
                        <td dir="ltr" width="88">11.37%</td>
                        <td dir="ltr" width="88">1,095</td>
                        <td dir="ltr" width="88">26.89%</td>
                        <td dir="ltr" width="88" class="bold blue">40점~44점</td>
                        <td dir="ltr" width="88">1.47%</td>
                        <td dir="ltr" width="88">3,902</td>
                        <td dir="ltr" width="72">95.83%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">68점~72점</td>
                        <td dir="ltr" width="88">14.91%</td>
                        <td dir="ltr" width="88">1,702</td>
                        <td dir="ltr" width="88">41.80%</td>
                        <td colspan="4" dir="ltr" width="336" class="bold blue"></td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">전체 직렬별 나의 성적 위치</span>
                </div>              
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="88" span="6" />
                    <tr class="bold">
                        <td dir="ltr" width="88">등수</td>
                        <td dir="ltr" width="88">PSAT 평균</td>
                        <td dir="ltr" width="88">언어논리</td>
                        <td dir="ltr" width="88">상황판단</td>
                        <td dir="ltr" width="88">자료해석</td>
                        <td dir="ltr" width="88">상위(%)</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">21.33점</td>
                        <td dir="ltr" width="88">36점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">4점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">20.33점</td>
                        <td dir="ltr" width="88">23점</td>
                        <td dir="ltr" width="88">19점</td>
                        <td dir="ltr" width="88">19점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr class="current">
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">20.00점</td>
                        <td dir="ltr" width="88">12점</td>
                        <td dir="ltr" width="88">28점</td>
                        <td dir="ltr" width="88">20점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">18.66점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">18.66점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">동일 직렬에서의 내 위치</span>
                </div>
                <div class="careful">
                    ※ 데이터 집계중일 때는 나의 위치가 수시로 변동될 수 있습니다.
                </div>
                <ul class="markTab2">
                    <li><a href="#tab4">전체평균</a></li>
                    <li><a href="#tab5">언어논리</a></li>
                    <li><a href="#tab6">상황판단</a></li>
                    <li><a href="#tab7">자료해석</a></li>                    
                </ul>
                <div class="bold chart">
                    <a href="javascript:void(0)">표 영역</a>                 
                </div>
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="88" span="7" />
                    <col width="72" />
                    <tr class="bold gray">
                        <td rowspan="2" dir="ltr" width="88">&nbsp;&nbsp;원점수<br>(이상~미만)</td>
                        <td rowspan="2" dir="ltr" width="88">구간비율</td>
                        <td rowspan="2" dir="ltr" width="88">누적인원</td>
                        <td rowspan="2" dir="ltr" width="88">누적비율</td>
                        <td rowspan="2" dir="ltr" width="88">&nbsp;&nbsp;원점수<br>(이상~미만)</td>
                        <td rowspan="2" dir="ltr" width="88">구간비율</td>
                        <td rowspan="2" dir="ltr" width="88">누적인원</td>
                        <td rowspan="2" dir="ltr" width="72">누적비율</td>
                    </tr>
                    <tr> </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">96점~</td>
                        <td dir="ltr" width="88">0.00%</td>
                        <td dir="ltr" width="88"> - </td>
                        <td dir="ltr" width="88">0.00%</td>
                        <td dir="ltr" width="88" class="bold blue">64점~68점</td>
                        <td dir="ltr" width="88">13.95%</td>
                        <td dir="ltr" width="88">2,270</td>
                        <td dir="ltr" width="72">55.75%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">92점~96점</td>
                        <td dir="ltr" width="88">0.22%</td>
                        <td dir="ltr" width="88">9</td>
                        <td dir="ltr" width="88">0.22%</td>
                        <td dir="ltr" width="88" class="bold blue">60점~64점</td>
                        <td dir="ltr" width="88">12.40%</td>
                        <td dir="ltr" width="88">2,775</td>
                        <td dir="ltr" width="72">68.15%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">88점~92점</td>
                        <td dir="ltr" width="88">0.64%</td>
                        <td dir="ltr" width="88">35</td>
                        <td dir="ltr" width="88">0.86%</td>
                        <td dir="ltr" width="88" class="bold blue">56점~60점</td>
                        <td dir="ltr" width="88">9.92%</td>
                        <td dir="ltr" width="88">3,179</td>
                        <td dir="ltr" width="72">78.07%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">84점~88점</td>
                        <td dir="ltr" width="88">1.65%</td>
                        <td dir="ltr" width="88">102</td>
                        <td dir="ltr" width="88">2.50%</td>
                        <td dir="ltr" width="88" class="bold blue">52점~56점</td>
                        <td dir="ltr" width="88">7.88%</td>
                        <td dir="ltr" width="88">3,500</td>
                        <td dir="ltr" width="72">85.95%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">80점~84점</td>
                        <td dir="ltr" width="88">4.35%</td>
                        <td dir="ltr" width="88">279</td>
                        <td dir="ltr" width="88">6.85%</td>
                        <td dir="ltr" width="88" class="bold blue">48점~52점</td>
                        <td dir="ltr" width="88">5.13%</td>
                        <td dir="ltr" width="88">3,709</td>
                        <td dir="ltr" width="72">91.09%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">76점~80점</td>
                        <td dir="ltr" width="88">8.67%</td>
                        <td dir="ltr" width="88">632</td>
                        <td dir="ltr" width="88">15.52%</td>
                        <td dir="ltr" width="88" class="bold blue">44점~48점</td>
                        <td dir="ltr" width="88">3.27%</td>
                        <td dir="ltr" width="88">3,842</td>
                        <td dir="ltr" width="72">94.35%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">72점~76점</td>
                        <td dir="ltr" width="88">11.37%</td>
                        <td dir="ltr" width="88">1,095</td>
                        <td dir="ltr" width="88">26.89%</td>
                        <td dir="ltr" width="88" class="bold blue">40점~44점</td>
                        <td dir="ltr" width="88">1.47%</td>
                        <td dir="ltr" width="88">3,902</td>
                        <td dir="ltr" width="72">95.83%</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold blue">68점~72점</td>
                        <td dir="ltr" width="88">14.91%</td>
                        <td dir="ltr" width="88">1,702</td>
                        <td dir="ltr" width="88">41.80%</td>
                        <td colspan="4" dir="ltr" width="336" class="bold blue"></td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">동일 직렬에서의 내 위치</span>
                </div>
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="88" span="6" />
                    <tr class="bold">
                        <td dir="ltr" width="88">등수</td>
                        <td dir="ltr" width="88">PSAT 평균</td>
                        <td dir="ltr" width="88">언어논리</td>
                        <td dir="ltr" width="88">상황판단</td>
                        <td dir="ltr" width="88">자료해석</td>
                        <td dir="ltr" width="88">상위(%)</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">21.33점</td>
                        <td dir="ltr" width="88">36점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">4점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">20.33점</td>
                        <td dir="ltr" width="88">23점</td>
                        <td dir="ltr" width="88">19점</td>
                        <td dir="ltr" width="88">19점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr class="current">
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">20.00점</td>
                        <td dir="ltr" width="88">12점</td>
                        <td dir="ltr" width="88">28점</td>
                        <td dir="ltr" width="88">20점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">18.66점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="88" class="bold">1306</td>
                        <td dir="ltr" width="88">18.66점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">24점</td>
                        <td dir="ltr" width="88">16점</td>
                        <td dir="ltr" width="88">94.09</td>
                    </tr>
                </table>
                <div class="graph_area">
                    <div class="markSbtn3 bold">
                        <a href="javascript:void(0)">PSAT 체감 난이도는?</a><br>
                        그래프 영역1
                    </div>
                    <div class="markSbtn3 bold">
                        <a href="javascript:void(0)">가장 어려웠던 과목은?</a><br>
                        그래프 영역2
                    </div>  
                </div>
            </div>

			<div id="tab04">
                <div class="stage">
                    <span class="bold">합격권 예측</span>
                </div>  
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="290" span="2" />
                    <tr>
                        <td dir="ltr" width="290" class="bold">합격 확실권</td>
                        <td dir="ltr" width="290">90.17 이상</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="290" class="bold">합격 유력권</td>
                        <td dir="ltr" width="290">89이상~90.17미만</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="290"class="bold">합격 가능권</td>
                        <td dir="ltr" width="290">89이상~89미만</td>
                    </tr>
                </table>
                <div class="stage">
                    <span class="bold">나의 합격 여부 예측</span>
                </div>  
                <table cellspacing="0" cellpadding="0" class="table_type">
                    <col width="141" span="5" />
                    <tr class="bold">
                        <td dir="ltr" width="141">2022년 합격컷 예상</td>
                        <td dir="ltr" width="141">2021년  합격컷</td>
                        <td dir="ltr" width="141">내 점수</td>
                        <td dir="ltr" width="141">상위 10%컷</td>
                        <td dir="ltr" width="141">합격 여부 예측</td>
                    </tr>
                    <tr>
                        <td dir="ltr" width="141">90.17점</td>
                        <td dir="ltr" width="141">89.33점</td>
                        <td dir="ltr" width="141">20.00점</td>
                        <td dir="ltr" width="141">77.33점</td>
                        <td dir="ltr" width="141" class="wrong">불합격</td>
                    </tr>
                </table>
			</div>
        </div>

    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            AOS.init();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            loginAlert();   {{-- 비로그인시 로그인 메세지 --}}
        });

        {{-- 초기 로그인 얼럿 --}}
        function loginAlert() {
            {!! login_check_inner_script('로그인 후 이벤트에 참여해주세요.','Y') !!}
        }

        /*상단 tab*/
        $(document).ready(function(){
            $('.tabs').each(function(){
                var $active, $content, $links = $(this).find('a');
                $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
                $active.addClass('active');
            
                $content = $($active[0].hash);
            
                $links.not($active).each(function () {
                $(this.hash).hide()});
            
                // Bind the click event handler
                $(this).on('click', 'a', function(e){
                $active.removeClass('active');
                $content.hide();
            
                $active = $(this);
                $content = $(this.hash);
            
                $active.addClass('active');
                $content.show();
            
                e.preventDefault()})})}
        );

    /*하단 tab*/
    $(document).ready(function(){
        $('.markTab').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        ); 

        $(document).ready(function(){
        $('.markTab2').each(function(){
            var $active, $content, $links = $(this).find('a');
            $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
            $active.addClass('active');
        
            $content = $($active[0].hash);
        
            $links.not($active).each(function () {
            $(this.hash).hide()});
        
            // Bind the click event handler
            $(this).on('click', 'a', function(e){
            $active.removeClass('active');
            $content.hide();
        
            $active = $(this);
            $content = $(this.hash);
        
            $active.addClass('active');
            $content.show();
        
            e.preventDefault()})})}
        ); 
    </script>
@stop