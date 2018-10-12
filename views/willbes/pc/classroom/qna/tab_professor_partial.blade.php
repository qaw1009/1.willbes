<div id="point2">
    <span class="subTit tx-gray">2답변대기 수가 표시됩니다.</span>
    <div class="willbes-Mypage-PointBox h55 NG">
        <ul>
            <li class="Tit">1:1 상담현황</li>
            <li>답변대기 <a href="#none" class="tx-light-blue">{{$count_complete_type[$arr_input['tab']]['not_complete']}}</a>건</li>
            <li>답변완료 <a href="#none" class="tx-light-blue">{{$count_complete_type[$arr_input['tab']]['complete']}}</a>건</li>
        </ul>
    </div>
    <div class="willbes-Mypage-SUPPORT-list mt35 c_both">
        <div class="willbes-LecreplyList tx-gray c_both mt-zero">
            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                <select id="process" name="process" title="process" class="seleProcess mr10 h30 f_left">
                    <option selected="selected">과정</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="prof" name="prof" title="prof" class="seleProf mr10 h30 f_left">
                    <option selected="selected">교수님</option>
                    <option value="교수님1">교수님1</option>
                    <option value="교수님2">교수님2</option>
                </select>
                <select id="subject" name="subject" title="subject" class="seleSbj mr10 h30 f_left">
                    <option selected="selected">과목</option>
                    <option value="행정법">행정법</option>
                    <option value="공통">공통</option>
                </select>
                <select id="type" name="type" title="type" class="seleType mr10 h30 f_left">
                    <option selected="selected">질문유형</option>
                    <option value="기기">기기</option>
                    <option value="수강">수강</option>
                </select>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn mr10">
                            <span>검색</span>
                        </button>
                        <button type="submit" onclick="" class="search-Btn whiteBox">
                            <span>초기화</span>
                        </button>
                    </div>
                </div>
            </span>
        </div>
        <div class="LeclistTable pointTable">
            <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                <colgroup>
                    <col style="width: 60px;">
                    <col style="width: 70px;">
                    <col style="width: 80px;">
                    <col style="width: 80px;">
                    <col style="width: 90px;">
                    <col style="width: 370px;">
                    <col style="width: 100px;">
                    <col style="width: 90px;">
                </colgroup>
                <thead>
                <tr>
                    <th>No<span class="row-line">|</span></th>
                    <th>과정<span class="row-line">|</span></th>
                    <th>교수님<span class="row-line">|</span></th>
                    <th>과목<span class="row-line">|</span></th>
                    <th>질문유형<span class="row-line">|</span></th>
                    <th>제목<span class="row-line">|</span></th>
                    <th>등록일<span class="row-line">|</span></th>
                    <th>답변상태</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="w-no">8</td>
                    <td class="w-process">경찰</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">행정법</td>
                    <td class="w-type">기기</td>
                    <td class="w-list tx-left pl20 strong">
                        <a href="#none">
                            3법 해피엔딩 이벤트☆수험표 인증시 무료!
                            <div class="w-subtit">2018 [국가직대비] 정채영 국어 적중 50선 특강 (4~5월)</div>
                        </a>
                    </td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                </tr>
                <tr>
                    <td class="w-no">7</td>
                    <td class="w-process">공무원</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">공통</td>
                    <td class="w-type">수강</td>
                    <td class="w-list tx-left pl20 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">6</td>
                    <td class="w-process">임용</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">행정법</td>
                    <td class="w-type">기기</td>
                    <td class="w-list tx-left pl20">
                        <a href="#none">
                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 2018년 제1차 경찰 공무원 채용필기시험 가답안 공지
                            <img src="{{ img_url('prof/icon_N.gif') }}">
                        </a>
                    </td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">5</td>
                    <td class="w-process">경찰</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">행정법</td>
                    <td class="w-type">기기</td>
                    <td class="w-list tx-left pl20">
                        <a href="#none">
                            <img src="{{ img_url('prof/icon_locked.gif') }}"> [신규강의안내] 2018 대비 3~4월안내
                            <img src="{{ img_url('prof/icon_N.gif') }}">
                            <img src="{{ img_url('prof/icon_file.gif') }}">
                        </a>
                    </td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">4</td>
                    <td class="w-process">공무원</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">공직선거법</td>
                    <td class="w-type">교재</td>
                    <td class="w-list tx-left pl20"><a href="#none">설연휴 학원 고객센터 운영안내</a></td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">3</td>
                    <td class="w-process">임용</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">스파르타반</td>
                    <td class="w-type">결제/환불</td>
                    <td class="w-list tx-left pl20"><a href="#none">추석 교재 배송 및 고객센터 휴무안내</a></td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">2</td>
                    <td class="w-process">경찰</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">기타</td>
                    <td class="w-type">기기</td>
                    <td class="w-list tx-left pl20"><a href="#none">4월 무이지카드 안내 <img src="{{ img_url('prof/icon_file.gif') }}"></a></td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                <tr>
                    <td class="w-no">1</td>
                    <td class="w-process">공무원</td>
                    <td class="w-prof">장정훈</td>
                    <td class="w-acad">기타</td>
                    <td class="w-type">기기</td>
                    <td class="w-list tx-left pl20"><a href="#none">3월 무이자카드 안내</a></td>
                    <td class="w-date">2018-00-00</td>
                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                </tr>
                </tbody>
            </table>
            <div class="Paging">
                <ul>
                    <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                    <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                    <li><a href="#none">2</a><span class="row-line">|</span></li>
                    <li><a href="#none">3</a><span class="row-line">|</span></li>
                    <li><a href="#none">4</a><span class="row-line">|</span></li>
                    <li><a href="#none">5</a><span class="row-line">|</span></li>
                    <li><a href="#none">6</a><span class="row-line">|</span></li>
                    <li><a href="#none">7</a><span class="row-line">|</span></li>
                    <li><a href="#none">8</a><span class="row-line">|</span></li>
                    <li><a href="#none">9</a><span class="row-line">|</span></li>
                    <li><a href="#none">10</a></li>
                    <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>