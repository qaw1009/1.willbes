@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .subContainer {
        min-height: auto !important;
        margin-bottom:0 !important;
    }        

    .evtCtnsBox {width:100%; background:#fff; line-height: 1.5; font-size:14px}

    /************************************************************/


    input[type=radio],
    input[type=checkbox] {width:16px; height:16px;}    
    select,
    input[type=email],
    input[type=tel],
    input[type=number],
    input[type=text] {padding:2px; margin-right:10px; height:26px; vertical-align: middle}
    input[type=file]:focus,
    input[type=text]:focus {border:1px solid #1087ef}
    label {margin:0 10px 0 5px}
    input:checked + label {color:#1087ef; border-bottom:1px dashed #1087ef !important}

    .boardTypeB {width:100%; margin:0 auto; border-top:#464646 1px solid; border-bottom:#464646 1px solid; border-left:#cdcdcd 1px solid; background:#fff; line-height: 1.5}
    .boardTypeB caption {display:none}	
    .boardTypeB thead th, 
    .boardTypeB tbody th {color:#464646; font-weight:bold; border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; text-align:center; padding:15px 8px}
    .boardTypeB tbody td {letter-spacing:normal; padding:10px 8px}
    .boardTypeB thead th {background:#e9e8e8;}
    .boardTypeB tbody th {background:#f3f3f3;}
    .boardTypeB tbody td {border-bottom:#cdcdcd 1px solid; border-right:#cdcdcd 1px solid; vertical-align:middle; color:#464646; text-align:center}
    .boardTypeB tbody tr.bg01 th {background:#e5f2fe}
    .boardTypeB tbody td input {vertical-align:middle}
    .boardTypeB tbody td label {margin-right:10px}
    .boardTypeB tbody td li {display: inline;}
    .boardTypeB tbody td span {vertical-align: top}

    .btns {text-align:center; margin:30px 0}
    .btns span,
    .btns a {display:inline-block; padding:8px 16px; background:#1087ef; color:#fff !important; font-weight:bold; border:1px solid #1087ef}
    .btns a.btn2 {background:#464646; color:#fff !important; border:1px solid #464646}
    .btns a:hover {background:#fff; color:#1087ef !important}
    .btns a.btn2:hover {background:#fff; color:#464646 !important}


    .sectin1_box {
        padding:180px 0 100px; width:100%; text-align:center;
        -webkit-animation: color-change-5x 8s linear infinite alternate both;
	        animation: color-change-5x 8s linear infinite alternate both;
    }
    @@-webkit-keyframes color-change-5x {
            0% {
            background: #0c74ae;
            }
            50% {
            background: #83cff9;
            }
            100% {
            background: #0c74ae;
            }
        }
        @@keyframes color-change-5x {
            0% {
            background: #0c74ae;
            }
            50% {
            background: #83cff9;
            }
            100% {
            background: #0c74ae;
            }
        }
    .sectin1_box div {font-size:100px; font-weight:bold; color:#fff; 
            -webkit-animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
            animation: text-pop-up-top 0.5s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;}
    .sectin1_box div span {font-size:50px; display:block; margin-bottom:10px}
    @@-webkit-keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }
    @@keyframes text-pop-up-top {
        0% {
            -webkit-transform: translateY(0);
                    transform: translateY(0);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: none;
        }
        100% {
            -webkit-transform: translateY(-50px);
                    transform: translateY(-50px);
            -webkit-transform-origin: 50% 50%;
                    transform-origin: 50% 50%;
            text-shadow: 0 1px 0 #cccccc, 0 2px 0 #cccccc, 0 3px 0 #cccccc, 0 4px 0 #cccccc, 0 5px 0 #cccccc, 0 6px 0 #cccccc, 0 7px 0 #cccccc, 0 8px 0 #cccccc, 0 9px 0 #cccccc, 0 50px 30px rgba(0, 0, 0, 0.3);
        }
    }

    .txtinfo {border:1px solid #464646; padding:20px; height:150px; overflow-y:scroll}
    .txtinfo li {margin-left:20px; list-style-type: decimal;}

    .sub_warp {padding:60px 0; }
    .sub_warp h2 {clear:both; font-size:20px; font-weight:bold; padding-left:25px; margin-bottom:10px; color:#464646; background:url(https://static.willbes.net/public/images/promotion/2019/04/1211_passcop_icon1.png) no-repeat left center;
    background-size:20px}
    .sub_warp h2 div {position:absolute; top:5px; right:0; font-size:12px; color:#adadad; letter-spacing:normal}
    .sub_warp h2 span {color:#C03}	
    .sub_warp h2 select {padding:5px}

    .markingBox {padding:30px 0; border-top:2px solid #000; border-bottom:2px solid #000}
    .markingBox h3 {font-size:16px; background:#444; color:#fff; height:40px; line-height:40px; padding:0 20px; margin-bottom:10px; border-radius:15px 15px 0 0}
    .markingBox .number li {display:inline; float:left; margin-right:30px}
    .markingBox .number:after {content:""; display:block; clear:both}

    .omrWarp {padding:1em 0}
    .omrL {float:left; width:77%;}
    .omrL .paper {width:100%; height:690px; overflow-y: scroll; background:#F0F0F0}
    .omrR {float:right; width:22%; padding-left:15px; border-left:1px solid #ccc;}	

    .omrR p {margin-bottom:1em}
    .omrWarp th,
    .omrWarp td {text-align:center; padding:4px !important}
    .omrWarp tr.check {background:#eefafd} 

    .omrWarp input[type=number] {width:80%; letter-spacing:5px; text-align:center}
    .omrWarp h4 {margin-bottom:0.5em; color:#000; font-size: 14px}
    .qMarking {margin-bottom:1em;}
    .qMarking h4 span {color:#666; vertical-align:bottom}    
            
    .selfMarking input[type=text] {width:50%; margin:0 auto; letter-spacing:0}
    .selfMarking p {margin-top:1em}

    .errata {padding:0 10px}
    .errata li {display:inline; float:left; width:20%; padding-right:20px}	
    .errata li:last-child {padding:0}
    .errata p {background:#333; color:#fff; text-align:center; padding:10px 0; margin-bottom:10px}
    .errata .boardTypeB tr td:nth-last-child(3) {color:#09F !important}
    .errata td:first-child {color:#09F !important}
    .mypoint {text-align:left !important}
    .mypoint input[type=number] {width:50px; margin:0 !important; text-align:right}
    .mypoint span {vertical-align: bottom}
    .omrWarp:after {content:""; display:block; clear:both}
</style>

<div id="Container" class="Container c_both">            
    <div class="evtContent NSK">
        <div class="sectin1_box NSK-Black">
            <div><span>2020년 1차 고등고시 시험</span>
            합격예측 인증</div>
        </div>
        <!--sectin1_box//-->


        <div class="evtCtnsBox">          
            <div class="sub_warp">
                <div class="sub3_1">
                    <h2>기본정보 입력 </h2>                   
                    <table class="boardTypeB">
                        <colgroup>
                            <col width="20%">
                            <col width="">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th>직렬/ 응시번호</th>
                                <td class="tx-left">
                                    <select name="">
                                        <option value="">응시직렬</option>
                                        <option value="">일반행정</option>
                                        <option value="">재경</option>
                                        <option value="">국립외교원</option>
                                    </select>                    
                                    <input type="number" name="" id="" style="width:150px"> 
                                </td>
                            </tr>
                            <tr>
                                <th>이름</th>
                                <td class="tx-left">                                
                                    홍길동
                                </td>
                            </tr>
                            <tr>
                                <th>이메일 </th>
                                <td class="tx-left">
                                    <input type="email" name="" id="" style="width:250px"><br>※ 분석 자료 전달에 사용되므로 정확히 기입해 주세요.
                                </td>
                            </tr>
                            <tr>
                                <th>연락처</th>
                                <td class="tx-left">
                                    <input type="tel" name="" id="" style="width:150px"> 
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 class="mt50">개인정보 수집 및 이용에 대한 안내 </h2> 
                    <div class="txtinfo">
                        <ul>
                            <li>개인정보 수집 항목(개인정보 보호법 제15조 제2항)<br>
                            - 성명, 응시번호, 휴대폰 번호, 전자 우편 주소</li>
                            <li>개인정보 수집 및 이용 목적(개인정보 보호법 제15조 제2항 제1호)<br>
                            - 성적 이벤트 등의 본인확인<br>
                            - 고지사항 전달, 본인 의사 확인 등 원활한 의사소통 경로의 확보<br>
                            - 서비스 이용과 관련된 정보 안내 등 편의제공 목적</li>
                            <li>개인정보 보유 및 이용기간(개인정보 보호법 제15조 제2항 제3호)<br>
                            - 수집된 개인정보는 상기 2번의 용도 이외의 목적으로는 사용되지 않습니다.</li>
                            <li>개인정보 수집동의 거부 및 거부에 따른 이용제한(개인정보 보호법 제15조 제2항 제4호)<br>
                            - 고객님은 개인정보의 수집 및 이용에 대하여 동의를 거부할 수 있습니다. <br>
                            - 개인정보 수집에 동의하지 않거나, 부정확한 정보를 입력하는 경우, 본 이벤트 관련 서비스 이용이 제한됨을 알려드립니다.</li>
                        </ul>                        
                    </div>
                    <div class="mt10"><input type="checkbox" id="yes"><label for="yes">윌비스에 개인정보제공 동의하기(필수)</label></div>
                    
                    {{--Research 1 (2020.05.16[토] 18: 00 ~ 2020.05.16[토] 20 : 00까지 ) ※ 2시간만 제공 - 빠른 채점 제공--}}
                    <div class="markingBox mt50">
                        <h3>응시횟수</h3>
                        <ul class="number">
                            <li><input type="radio" id="one"><label for="one">1회</label></li>
                            <li><input type="radio" id="two"><label for="two">2회</label></li>
                            <li><input type="radio" id="three"><label for="three">3회</label></li>
                            <li><input type="radio" id="four"><label for="four">4회 이상</label></li>
                        </ul>

                        <h3 class="mt30">본인 정답 입력</h3>
                        <div class="omrWarp">
                            <div class="qMarking">
                                <h4>헌법<span> | 원점수: 100</span></h4>
                                <table class="boardTypeB">
                                    <col  />
                                    <col width="17%" />
                                    <col width="17%" />
                                    <col width="17%" />
                                    <col width="17%" />
                                    <col width="17%" />
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">1~5번</th>
                                        <th scope="col">6~10번</th>
                                        <th scope="col">11~15번</th>
                                        <th scope="col">16~20번</th>
                                        <th scope="col">21~25번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                </table>
                            </div> 

                            <div class="qMarking">
                                <h4>언어논리<span> | 원점수: 100</span></h4>
                                <table class="boardTypeB">
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">1~5번</th>
                                        <th scope="col">6~10번</th>
                                        <th scope="col">11~15번</th>
                                        <th scope="col">16~20번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">21~25번</th>
                                        <th scope="col">26~30번</th>
                                        <th scope="col">31~35번</th>
                                        <th scope="col">36~40번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="qMarking">
                                <h4>자료해석<span> | 원점수: 100</span></h4>
                                <table class="boardTypeB">
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">1~5번</th>
                                        <th scope="col">6~10번</th>
                                        <th scope="col">11~15번</th>
                                        <th scope="col">16~20번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">21~25번</th>
                                        <th scope="col">26~30번</th>
                                        <th scope="col">31~35번</th>
                                        <th scope="col">36~40번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="qMarking">
                                <h4>상황판단<span> | 원점수: 100</span></h4>
                                <table class="boardTypeB">
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <col width="20%" />
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">1~5번</th>
                                        <th scope="col">6~10번</th>
                                        <th scope="col">11~15번</th>
                                        <th scope="col">16~20번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">번호</th>
                                        <th scope="col">21~25번</th>
                                        <th scope="col">26~30번</th>
                                        <th scope="col">31~35번</th>
                                        <th scope="col">36~40번</th>
                                    </tr>
                                    <tr>
                                        <td>답안입력 </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                        <td>
                                            <input value="" type="number" name="" id="" maxlength="5">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div><!--omrWarp//-->

                        <h3 class="mt30">과목별 체감난이도</h3>
                        <table class="boardTypeB">
                            <col  />
                            <col width="80%" />
                            <tr>
                                <th>과목</th>
                                <th>난이도</th>
                            </tr>
                            <tr>
                                <th>헌법</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topA"><label for="topA">상</label></li>
                                        <li><input type="radio" id="middleA"><label for="middleA">중</label></li>
                                        <li><input type="radio" id="bottomA"><label for="bottomA">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>언어논리</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topB"><label for="topB">상</label></li>
                                        <li><input type="radio" id="middleB"><label for="middleB">중</label></li>
                                        <li><input type="radio" id="bottomB"><label for="bottomB">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>자료해석</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topC"><label for="topC">상</label></li>
                                        <li><input type="radio" id="middleC"><label for="middleC">중</label></li>
                                        <li><input type="radio" id="bottomC"><label for="bottomC">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>상황판단</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topD"><label for="topD">상</label></li>
                                        <li><input type="radio" id="middleD"><label for="middleD">중</label></li>
                                        <li><input type="radio" id="bottomD"><label for="bottomD">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </div>

                    {{--Research 2(2020.05.16[토] 20: 00 이후 ~ 2020.05.22[금] 20 : 00 ) ※ 약 일주일간 제공--}}
                    <div class="markingBox mt50">
                        <h3>응시횟수</h3>
                        <ul class="number">
                            <li><input type="radio" id="one"><label for="one">1회</label></li>
                            <li><input type="radio" id="two"><label for="two">2회</label></li>
                            <li><input type="radio" id="three"><label for="three">3회</label></li>
                            <li><input type="radio" id="four"><label for="four">4회</label></li>
                        </ul>

                        <h3 class="mt30">본인 점수 입력</h3>
                        <table class="boardTypeB">
                            <col  />
                            <col width="80%" />
                            <tr>
                                <th>과목</th>
                                <th>점수입력</th>
                            </tr>
                            <tr>
                                <th>헌법</th>
                                <td class="mypoint">
                                    <input value="" type="number" name="" id=""> 점 (합격/불합격 여부 : <span class="tx-blue">합격</span> <!--<span class="tx-red">불합격</span>-->)
                                </td>
                            </tr>
                            <tr>
                                <th>언어논리</th>
                                <td class="mypoint">
                                    <input value="" type="number" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>자료해석</th>
                                <td class="mypoint">
                                    <input value="" type="number" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>상황판단</th>
                                <td class="mypoint">
                                    <input value="" type="number" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>▶ 내 점수 평균 </th>
                                <td class="mypoint">
                                    <span class="tx-blue">92.5</span>점
                                </td>
                            </tr>
                        </table>

                        <h3 class="mt30">과목별 체감난이도</h3>
                        <table class="boardTypeB">
                            <col  />
                            <col width="80%" />
                            <tr>
                                <th>과목</th>
                                <th>난이도</th>
                            </tr>
                            <tr>
                                <th>헌법</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topA"><label for="topA">상</label></li>
                                        <li><input type="radio" id="middleA"><label for="middleA">중</label></li>
                                        <li><input type="radio" id="bottomA"><label for="bottomA">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>언어논리</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topB"><label for="topB">상</label></li>
                                        <li><input type="radio" id="middleB"><label for="middleB">중</label></li>
                                        <li><input type="radio" id="bottomB"><label for="bottomB">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>자료해석</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topC"><label for="topC">상</label></li>
                                        <li><input type="radio" id="middleC"><label for="middleC">중</label></li>
                                        <li><input type="radio" id="bottomC"><label for="bottomC">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>상황판단</th>
                                <td>
                                    <ul class="number">
                                        <li><input type="radio" id="topD"><label for="topD">상</label></li>
                                        <li><input type="radio" id="middleD"><label for="middleD">중</label></li>
                                        <li><input type="radio" id="bottomD"><label for="bottomD">하</label></li>
                                    </ul>
                                </td>
                            </tr>
                        </table>

                        <h3 class="mt30">본인 예상하는 실제 PSAT 커트라인</h3>
                        <div class="mypoint">평균 <input value="" type="number" name="" id=""> 점 </div>
                    </div>


                    <div class="btns">
                        <a href="#none">저장 </a>
                        <a href="#none">수정 </a>
                    </div>
                </div>              

            </div> 
        </div>
    </div>

</div>
<!-- End Container -->
</div>
@stop