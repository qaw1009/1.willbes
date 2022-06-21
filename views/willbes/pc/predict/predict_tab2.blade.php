<div class="step">
    시험 보시느라 수고 많으셨습니다.<br>
    나의 합격 여부를 함께 알아볼까요?<br>
    성적채점은 <span class="bold">총 3 단계로 진행</span>됩니다
</div>
<div class="stage"><span class="phase">1단계</span> <span class="bold">기본정보 입력</span><br>
    기본 정보를 입력하시면 합격예측 서비스 이용이 가능합니다.
</div>
<form name="frm" id="frm" action="" method="post">
    <table cellspacing="0" cellpadding="0" class="table_type">
        <col width="30%" />
        <col width="*" />
        <tr>
            <th>이름</th>
            <td>
                <label>
                    한주연
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
<form name="frm2" id="frm2" action="" method="post">
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
<form name="frm3" id="frm3" action="" method="post">
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

    <div id="tab1">
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
        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="15%" />
            <col width="15%" />
            <col width="15%" />
            <col width="15%" />
            <col width="20%" />
            <col width="20%" />
            <tr class="total">
                <td dir="ltr" width="88">내점수</td>
                <td dir="ltr" width="88">40점</td>
                <td dir="ltr" width="88">정답수/총문항</td>
                <td dir="ltr" width="88"></td>
                <td dir="ltr" width="88">정답률</td>
                <td dir="ltr" width="88"></td>
            </tr>
        </table>

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
        <table cellspacing="0" cellpadding="0" class="table_type">
            <col width="15%" />
            <col width="15%" />
            <col width="15%" />
            <col width="15%" />
            <col width="20%" />
            <col width="20%" />
            <tr class="total">
                <td dir="ltr" width="88">내점수</td>
                <td dir="ltr" width="88">50점</td>
                <td dir="ltr" width="88">정답수/총문항</td>
                <td dir="ltr" width="88"></td>
                <td dir="ltr" width="88">정답률</td>
                <td dir="ltr" width="88"></td>
            </tr>
        </table>

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