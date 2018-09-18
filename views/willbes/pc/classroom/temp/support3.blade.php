@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-SUPPORTZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 상담내역
                </div>
            </div>
            <!-- willbes-Mypage-SUPPORTZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <div class="pointDetailWrap p_re">
                    <ul class="tabWrap tabDepth4 NG">
                        <li><a href="#point1">1:1상담 (1)</a></li>
                        <li><a href="#point2">학습Q&A(2)</a></li>
                    </ul>
                    <div class="tabBox mt40">
                        <div id="point1">
                            <span class="subTit tx-gray">답변대기 수가 표시됩니다.</span>
                            <div class="willbes-Mypage-PointBox h55 NG">
                                <ul>
                                    <li class="Tit">1:1 상담현황</li>
                                    <li>답변대기 <a href="#none" class="tx-light-blue">1</a>건</li>
                                    <li>답변완료 <a href="#none" class="tx-light-blue">5</a>건</li>
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
                                    <select id="academy" name="academy" title="academy" class="seleAcad mr10 h30 f_left">
                                        <option selected="selected">구분</option>
                                        <option value="온라인">온라인</option>
                                        <option value="학원">학원</option>
                                    </select>
                                    <select id="type" name="type" title="type" class="seleType mr10 h30 f_left">
                                        <option selected="selected">상담유형</option>
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
                                            <col style="width: 90px;">
                                            <col style="width: 450px;">
                                            <col style="width: 100px;">
                                            <col style="width: 90px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></li></th>
                                            <th>과정<span class="row-line">|</span></li></th>
                                            <th>구분<span class="row-line">|</span></li></th>
                                            <th>상담유형<span class="row-line">|</span></li></th>
                                            <th>제목<span class="row-line">|</span></li></th>
                                            <th>등록일<span class="row-line">|</span></li></th>
                                            <th>답변상태</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-process">경찰</td>
                                            <td class="w-acad">학원</td>
                                            <td class="w-type">기기</td>
                                            <td class="w-list tx-left pl20 strong"><a href="#none">3법 해피엔딩 이벤트☆수험표 인증시 무료!</a></td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-process">공무원</td>
                                            <td class="w-acad">온라인</td>
                                            <td class="w-type">수강</td>
                                            <td class="w-list tx-left pl20 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-process">임용</td>
                                            <td class="w-acad">학원</td>
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
                                            <td class="w-acad">온라인</td>
                                            <td class="w-type">기기</td>
                                            <td class="w-list tx-left pl20">
                                                <a href="#none">
                                                    <img src="{{ img_url('prof/icon_locked.gif') }}"> [신규강의안내] 2018 대비 3~4월안내
                                                    <img src="{{ img_url('prof/icon_N.gif') }}">
                                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                                </a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-process">공무원</td>
                                            <td class="w-acad">온라인</td>
                                            <td class="w-type">교재</td>
                                            <td class="w-list tx-left pl20"><a href="#none">설연휴 학원 고객센터 운영안내</a></td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-process">임용</td>
                                            <td class="w-acad">온라인</td>
                                            <td class="w-type">결제/환불</td>
                                            <td class="w-list tx-left pl20"><a href="#none">추석 교재 배송 및 고객센터 휴무안내</a></td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-process">경찰</td>
                                            <td class="w-acad">학원</td>
                                            <td class="w-type">기기</td>
                                            <td class="w-list tx-left pl20"><a href="#none">4월 무이지카드 안내 <img src="{{ img_url('prof/icon_file.gif') }}"></a></td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">1</td>
                                            <td class="w-process">공무원</td>
                                            <td class="w-acad">온라인</td>
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

                            <br/><br/><br/>

                            <!-- View -->
                            <div class="willbes-Leclist c_both">
                                <div class="LecViewTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                                        <colgroup>
                                            <col style="width: 70px;">
                                            <col style="width: 575px;">
                                            <col style="width: 135px;">
                                            <col style="width: 160px;">
                                        </colgroup>
                                        <thead>
                                        <tr><th colspan="4" class="w-list tx-left pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
                                        <tr>
                                            <td class="w-acad">헌법<span class="row-line">|</span></td>
                                            <td class="w-tit tx-left pl20"><strong>2018 [지방직/서울시]137작품을 알려주마!(4-6월)</strong></td>
                                            <td class="w-write">작성자명<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="4">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="4">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 90px;">
                                            <col style="width: 690px;">
                                            <col style="width: 160px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <td class="w-answer"><img src="{{ img_url('prof/icon_answer.gif') }}"></td>
                                            <td class="w-write tx-left">홍길*<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="3">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="3">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="search-Btn mt20 mb30 h36 p_re">
                                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                            <span class="tx-purple-gray">삭제</span>
                                        </button>
                                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                                            <span class="tx-purple-gray">수정</span>
                                        </button>
                                        <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                            <span>목록</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="point2">
                            <span class="subTit tx-gray">2답변대기 수가 표시됩니다.</span>
                            <div class="willbes-Mypage-PointBox h55 NG">
                                <ul>
                                    <li class="Tit">1:1 상담현황</li>
                                    <li>답변대기 <a href="#none" class="tx-light-blue">5</a>건</li>
                                    <li>답변완료 <a href="#none" class="tx-light-blue">10</a>건</li>
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
                                            <th>No<span class="row-line">|</span></li></th>
                                            <th>과정<span class="row-line">|</span></li></th>
                                            <th>교수님<span class="row-line">|</span></li></th>
                                            <th>과목<span class="row-line">|</span></li></th>
                                            <th>질문유형<span class="row-line">|</span></li></th>
                                            <th>제목<span class="row-line">|</span></li></th>
                                            <th>등록일<span class="row-line">|</span></li></th>
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

                            <br/><br/><br/>

                            <!-- View -->
                            <div class="willbes-Leclist c_both">
                                <div class="LecViewTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                                        <colgroup>
                                            <col style="width: 645px;">
                                            <col style="width: 135px;">
                                            <col style="width: 160px;">
                                        </colgroup>
                                        <thead>
                                        <tr><th colspan="3" class="w-list tx-left pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
                                        <tr>
                                            <td class="w-acad tx-left pl20">
                                                <span class="pBox p6">공무원</span>
                                                <span class="oBox onlineBox NSK">온라인</span>
                                                <span class="oBox nyBox NSK">노량진</span>
                                                <span class="row-line">|</span>
                                            </td>
                                            <td class="w-write">작성자명<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="w-file tx-left pl20" colspan="3">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="3">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 90px;">
                                            <col style="width: 690px;">
                                            <col style="width: 160px;">
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <td class="w-answer"><img src="{{ img_url('prof/icon_answer.gif') }}"></td>
                                            <td class="w-write tx-left">홍길*<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00 00:00</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="w-txt answer tx-left" colspan="3">
                                                기승전결문제에서가부분이인믈과배경제시나,<br/>
                                                다부분이주인공이동라,마부분이문제발샹및해결바부분이<br/>
                                                후일담여기까지는이해가되는데선택지4번이왜정답인지모르겠어요.....<br/>
                                                4번답이가ㅡ나, 다ㅡ라,마ㅡ바입니다ㅠㅠ
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="search-Btn mt20 mb50 f_left">
                                        <ul>
                                            <li class="btnAuto90 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                                    <span class="tx-purple-gray">수정</span>
                                                </button>
                                            </li>
                                            <li class="btnAuto90 h36">
                                                <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                                    <span class="tx-purple-gray">삭제</span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="search-Btn btnAuto90 h36 mt20 mb50 f_right">
                                        <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                            <span>목록</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pointDetailWrap -->
            </div>
            <!-- willbes-Mypage-Tabs -->

        </div>
        <div class="Quick-Bnr ml20">
            <img src="{{ img_url('sample/banner_180605.jpg') }}">
        </div>
    </div>
    <!-- End Container -->
@stop