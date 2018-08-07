@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center">
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass_index') }}">내강의실 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_pass1') }}">무한PASS존</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_online1') }}">온라인강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">온라인강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_online1') }}">수강대기강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online2') }}">수강중강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online3') }}">일시정지강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_online4') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_acad1') }}">학원강좌</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학원강좌</li>
                            <li><a href="{{ site_url('/home/html/mypage_acad1') }}">수강신청강좌</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_acad2') }}">수강종료강좌</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/mypage_event') }}">특강&이벤트 신청현황</a>
                </li>
                <li>
                    <a href="#none">모의고사관리</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_payment1') }}">결제관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">결제관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_payment1') }}">주문/배송조회</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment3') }}">포인트관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_payment4') }}">쿠폰/수강권관리</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_support1') }}">학습지원관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">학습지원관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_support1') }}">쪽지관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support2') }}">알림관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_support3') }}">상담내역</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#none">회원정보</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>학습지원관리</strong>
            <span class="depth-Arrow">></span><strong>상담내역</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 상담내역
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="pointDetailWrap mt40 p_re">
            <ul class="tabWrap tabDepth1 NG">
                <li><a href="#point1">1:1상담 (1)</a></li>
                <li><a href="#point2">학습Q&A(2)</a></li>
            </ul>
            <div class="tabBox mt40">
                <div id="point1">
                    <span class="subTit tx-gray">답변대기 수가 표시됩니다.</span>
                    <div class="willbes-Mypage-PointBox NG">
                        <ul>
                            <li class="Tit">1:1 상담현황</li>
                            <li>답변대기 <span class="tx-light-blue">1</span>건</li>
                            <li>답변완료 <span class="tx-light-blue">5</span>건</li>
                        </ul>
                    </div>
                    <div class="willbes-Mypage-SUPPORT-list mt80 c_both">
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
                                        <td class="w-list tx-left pl20 strong"><a href="#none" onclick="openWin('MEMOPASS')">3법 해피엔딩 이벤트☆수험표 인증시 무료!</a></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox waitBox_block NSK">답변대기</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">7</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-acad">온라인</td>
                                        <td class="w-type">수강</td>
                                        <td class="w-list tx-left pl20 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">6</td>
                                        <td class="w-process">임용</td>
                                        <td class="w-acad">학원</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 2018년 제1차 경찰 공무원 채용필기시험 가답안 공지
                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">5</td>
                                        <td class="w-process">경찰</td>
                                        <td class="w-acad">온라인</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> [신규강의안내] 2018 대비 3~4월안내
                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">4</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-acad">온라인</td>
                                        <td class="w-type">교재</td>
                                        <td class="w-list tx-left pl20">설연휴 학원 고객센터 운영안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">3</td>
                                        <td class="w-process">임용</td>
                                        <td class="w-acad">온라인</td>
                                        <td class="w-type">결제/환불</td>
                                        <td class="w-list tx-left pl20">추석 교재 배송 및 고객센터 휴무안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">2</td>
                                        <td class="w-process">경찰</td>
                                        <td class="w-acad">학원</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">4월 무이지카드 안내 <img src="{{ img_url('prof/icon_file.gif') }}"></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">1</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-acad">온라인</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">3월 무이자카드 안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="point2">
                    <span class="subTit tx-gray">2답변대기 수가 표시됩니다.</span>
                    <div class="willbes-Mypage-PointBox NG">
                        <ul>
                            <li class="Tit">1:1 상담현황</li>
                            <li>답변대기 <span class="tx-light-blue">5</span>건</li>
                            <li>답변완료 <span class="tx-light-blue">10</span>건</li>
                        </ul>
                    </div>
                    <div class="willbes-Mypage-SUPPORT-list mt80 c_both">
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
                                        <td class="w-list tx-left pl20 strong"><a href="#none" onclick="openWin('MEMOPASS')">3법 해피엔딩 이벤트☆수험표 인증시 무료!</a></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox waitBox_block NSK">답변대기</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">7</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">공통</td>
                                        <td class="w-type">수강</td>
                                        <td class="w-list tx-left pl20 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">6</td>
                                        <td class="w-process">임용</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">행정법</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 2018년 제1차 경찰 공무원 채용필기시험 가답안 공지
                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">5</td>
                                        <td class="w-process">경찰</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">행정법</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> [신규강의안내] 2018 대비 3~4월안내
                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">4</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">공직선거법</td>
                                        <td class="w-type">교재</td>
                                        <td class="w-list tx-left pl20">설연휴 학원 고객센터 운영안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">3</td>
                                        <td class="w-process">임용</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">스파르타반</td>
                                        <td class="w-type">결제/환불</td>
                                        <td class="w-list tx-left pl20">추석 교재 배송 및 고객센터 휴무안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">2</td>
                                        <td class="w-process">경찰</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">기타</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">4월 무이지카드 안내 <img src="{{ img_url('prof/icon_file.gif') }}"></td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">1</td>
                                        <td class="w-process">공무원</td>
                                        <td class="w-prof">장정훈</td>
                                        <td class="w-acad">기타</td>
                                        <td class="w-type">기기</td>
                                        <td class="w-list tx-left pl20">3월 무이자카드 안내</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pointDetailWrap -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop