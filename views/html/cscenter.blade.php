@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">일반경찰</li>
            </ul>
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li>
                    <a href="#none">패키지</a>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>고객센터</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <ul class="tabWrap tabCsDepth1 NSK">
                <li class="Act1"><a href="#cs1" onclick="goTop()">자주하는 질문</a></li>
                <li class="Act2"><a href="#cs2" onclick="goTop()">공지사항</a></li>
                <li class="Act3"><a href="#cs3" onclick="goTop()">1:1 상담</a></li>
                <li class="Act4"><a href="#cs4" onclick="goTop()">사이트 이용가이드</a></li>
                <li class="Act5"><a href="#cs5" onclick="goTop()">모바일 서비스안내</a></li>
                <li class="Act6"><a href="#cs6" onclick="goTop()">수강지원</a></li>
                <li class="Act7"><a href="#cs7" onclick="goTop()">부정사용자 규제</a></li>
            </ul>
            <div class="tabBox">
                <div id="cs1" class="CScenter1">
                    <div class="willbes-Lec-Tit NG bd-none tx-black c_both">
                        · 자주하는 질문
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="Act1 mt50">
                        <div class="LeclistTable c_both">
                            <div class="questionBoxWrap">
                                <ul class="tabWrap tabcsDepth2 tab_Question p_re NG">
                                    <li>
                                        <a class="qBox" href="#question1">
                                            <img src="{{ img_url('cs/icon_question1.gif') }}">
                                            <div>회원정보</div>
                                        </a>
                                        <div class="subBox on">
                                            <dl>
                                                <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">회원가입</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">회원탈퇴</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">회원정보</button></dt>
                                            </dl>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="qBox" href="#question2">
                                            <img src="{{ img_url('cs/icon_question2.gif') }}">
                                            <div>결제/환불</div>
                                        </a>
                                        <div class="subBox">
                                            <dl>
                                                <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">결제</buttona><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">환불</button></dt>
                                            </dl>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="qBox" href="#question3">
                                            <img src="{{ img_url('cs/icon_question3.gif') }}">
                                            <div>교재</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="qBox" href="#question4">
                                            <img src="{{ img_url('cs/icon_question4.gif') }}">
                                            <div>온라인수강</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="qBox" href="#question5">
                                            <img src="{{ img_url('cs/icon_question5.gif') }}">
                                            <div>모바일</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="qBox" href="#question6">
                                            <img src="{{ img_url('cs/icon_question6.gif') }}">
                                            <div>학원수강</div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tabBox mt100">
                                    <div id="question1" class="tabContent">
                                        <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdt-gray bdb-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 70px;">
                                                <col style="width: 100px;">
                                                <col style="width: 120px;">
                                                <col style="width: 560px;">
                                                <col style="width: 90px;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>No<span class="row-line">|</span></th>
                                                    <th>캠퍼스<span class="row-line">|</span></th>
                                                    <th>분류<span class="row-line">|</span></th>
                                                    <th>제목<span class="row-line">|</span></th>
                                                    <th>조회수</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="replyList">
                                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                                    <td class="w-select">회원정보</td>
                                                    <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                                    <td class="w-click">123</td>
                                                </tr>
                                                <tr class="replyTxt bg-light-gray tx-gray">
                                                    <td colspan="5">
                                                        로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                                    </td>
                                                </tr>

                                                <tr class="replyList">
                                                    <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">공통</span></td>
                                                    <td class="w-select">회원탈퇴</td>
                                                    <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                                    <td class="w-click">244</td>
                                                </tr>
                                                <tr class="replyTxt bg-light-gray tx-gray">
                                                    <td colspan="5">
                                                        로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                                    </td>
                                                </tr>

                                                <tr class="replyList">
                                                    <td class="w-no">2</td>
                                                    <td class="w-acad"><span class="oBox nyBox NSK">노량진</span></td>
                                                    <td class="w-select">회원정보</td>
                                                    <td class="w-list tx-left pl20">회원탈퇴는어떻게하나요?</td>
                                                    <td class="w-click">355</td>
                                                </tr>
                                                <tr class="replyTxt bg-light-gray tx-gray">
                                                    <td colspan="5">
                                                        로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                                    </td>
                                                </tr>

                                                <tr class="replyList">
                                                    <td class="w-no">1</td>
                                                    <td class="w-acad"><span class="oBox smBox NSK">신림</span></td>
                                                    <td class="w-select">회원탈퇴</td>
                                                    <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                                    <td class="w-click">466</td>
                                                </tr>
                                                <tr class="replyTxt bg-light-gray tx-gray">
                                                    <td colspan="5">
                                                        로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                        소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="question2" class="tabContent">
                                        결제/환불
                                    </div>
                                    <div id="question3" class="tabContent">
                                        교재
                                    </div>
                                    <div id="question4" class="tabContent">
                                        온라인수강
                                    </div>
                                    <div id="question5" class="tabContent">
                                        모바일
                                    </div>
                                    <div id="question6" class="tabContent">
                                        학원수강
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--LeclistTable -->
                    </div>  
                </div>
                <div id="cs2" class="CScenter2">
                    <div class="willbes-Lec-Tit NG bd-none tx-black c_both">
                        · 공지사항
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="Act2 mt50">
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray">
                                <select id="acad" name="acad" title="구분" class="seleAcad">
                                    <option selected="selected">구분</option>
                                    <option value="학원">학원</option>
                                    <option value="온라인">온라인</option>
                                </select>
                                <select id="campus" name="campus" title="campus" class="seleCampus">
                                    <option selected="selected">캠퍼스</option>
                                    <option value="헌법">헌법</option>
                                    <option value="스파르타반">스파르타반</option>
                                    <option value="공직선거법">공직선거법</option>
                                </select>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 65px;">
                                        <col style="width: 110px;">
                                        <col style="width: 445px;">
                                        <col style="width: 65px;">
                                        <col style="width: 100px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>구분<span class="row-line">|</span></th>
                                            <th>캠퍼스<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>첨부<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>조회수</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-campus">공통</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">123</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">
                                                <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                            </td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">244</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">8</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">7</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">466</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-campus">스파르타반</td>
                                            <td class="w-list tx-left pl20">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</td>
                                            <td class="w-file">&nbsp;</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-click">355</td>
                                        </tr>
                                        <tr>
                                            <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/><br/><br/>

                        <!-- View -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 575px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                        <tr><th colspan="4" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                        <tr>
                                            <td class="w-acad pl20"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-lec tx-left pl20">헌법<span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                            <td class="w-click"><strong>조회수</strong> 123</td>
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
                                            <td class="w-txt tx-left" colspan="7">
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.<br/>
                                                이달의 개강 강좌 공지입니다.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="search-Btn btnAuto90 h36 mt20 mb50 f_right">
                                    <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                        <span>전체목록</span>
                                    </button>
                                </div>
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 150px;">
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr>
                                        <tr>
                                            <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                            <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                            <td class="w-date">2018-00-00</td>
                                        </tr> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cs3" class="CScenter3">
                    <div class="willbes-Lec-Tit NG bd-none tx-black c_both">
                        · 1:1 상담
                        <div class="willbes-Lec-Search GM f_right">
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="Act3 mt50">
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="willbes-Lec-Selected tx-gray">
                                <select id="process" name="process" title="process" class="seleProcess">
                                    <option selected="selected">과정</option>
                                    <option value="헌법">헌법</option>
                                    <option value="스파르타반">스파르타반</option>
                                    <option value="공직선거법">공직선거법</option>
                                </select>
                                <select id="div" name="div" title="div" class="seleDiv">
                                    <option selected="selected">구분</option>
                                    <option value="기타">기타</option>
                                    <option value="강좌내용">강좌내용</option>
                                    <option value="학습상담">학습상담</option>
                                </select>
                                <select id="A" name="A" title="A" class="seleLecA">
                                    <option selected="selected">상담유형</option>
                                    <option value="기타">기타</option>
                                    <option value="강좌내용">강좌내용</option>
                                    <option value="학습상담">학습상담</option>
                                </select>
                                <div class="subBtn NSK f_right"><a href="#none">문의하기 ></a></div>
                            </div>
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 65px;">
                                        <col style="width: 90px;">
                                        <col style="width: 80px;">
                                        <col style="width: 100px;">
                                        <col style="width: 315px;">
                                        <col style="width: 90px;">
                                        <col style="width: 110px;">
                                        <col style="width: 90px;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>No<span class="row-line">|</span></th>
                                            <th>과정<span class="row-line">|</span></th>
                                            <th>구분<span class="row-line">|</span></th>
                                            <th>상담유형<span class="row-line">|</span></th>
                                            <th>제목<span class="row-line">|</span></th>
                                            <th>작성자<span class="row-line">|</span></th>
                                            <th>작성일<span class="row-line">|</span></th>
                                            <th>답변상태</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-process"><div class="pBox p5">임용</div></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-A">기기</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox answerBox_block NSK">답변완료</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                            <td class="w-process"><div class="pBox p6">공무원</div></td>
                                            <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                            <td class="w-A">수강</td>
                                            <td class="w-list tx-left pl20">만14세미만회원은어떻게가입하나요?</td>
                                            <td class="w-write">장동*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer"><span class="aBox waitBox_block NSK">답변대기</span></td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">6</td>
                                            <td class="w-process"><div class="pBox p7">경찰</div></td>
                                            <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                            <td class="w-A">기기</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-write">관리자명</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">5</td>
                                            <td class="w-process">&nbsp;</td>
                                            <td class="w-acad">&nbsp;</td>
                                            <td class="w-A">교재</td>
                                            <td class="w-list tx-left pl20">
                                                <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                                <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                <img src="{{ img_url('prof/icon_file.gif') }}">
                                            </td>
                                            <td class="w-write">박형*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">4</td>
                                            <td class="w-process">&nbsp;</td>
                                            <td class="w-acad">&nbsp;</td>
                                            <td class="w-A">결제/환불</td>
                                            <td class="w-list tx-left pl20">
                                                <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                            </td>
                                            <td class="w-write">장동*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">3</td>
                                            <td class="w-process">&nbsp;</td>
                                            <td class="w-acad">&nbsp;</td>
                                            <td class="w-A">수강</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-write">박형*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">2</td>
                                            <td class="w-process">&nbsp;</td>
                                            <td class="w-acad">&nbsp;</td>
                                            <td class="w-A">교재</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-write">장동*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="w-no">1</td>
                                            <td class="w-process">&nbsp;</td>
                                            <td class="w-acad">&nbsp;</td>
                                            <td class="w-A">교재</td>
                                            <td class="w-list tx-left pl20">로그인이되지않는데어떻게하나요?</td>
                                            <td class="w-write">박형*</td>
                                            <td class="w-date">2018-00-00</td>
                                            <td class="w-answer">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/><br/><br/>
                        
                        <!-- Write -->
                        <div class="willbes-Leclist mt40 c_both">
                            <div class="LecWriteTable">
                                
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 120px;">
                                        <col style="width: 820px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">과정선택<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-selected tx-left pl30">
                                                <select id="process" name="process" title="process" class="seleProcess">
                                                    <option selected="selected">과정선택</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                                <select id="div" name="div" title="div" class="seleDiv">
                                                    <option selected="selected">구분</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                                <select id="campus" name="campus" title="campus" class="seleCampus">
                                                    <option selected="selected">캠퍼스 선택</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">상담유형<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-selected full tx-left pl30" colspan="3">
                                                <select id="A" name="A" title="A" class="seleLecA">
                                                    <option selected="selected">상담 유형 선택</option>
                                                    <option value="헌법">헌법</option>
                                                    <option value="스파르타반">스파르타반</option>
                                                    <option value="공직선거법">공직선거법</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">공개여부</td>
                                            <td class="w-radio tx-left pl30" colspan="3">
                                                <ul>
                                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>공개</label></li>
                                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>비공개</label></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">제목<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-text tx-left pl30" colspan="3">
                                                <input type="text" id="TITLE" name="TITLE" class="iptTitle" maxlength="30">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">내용<span class="tx-light-blue">(*)</span></td>
                                            <td class="w-textarea write tx-left pl30" colspan="3">
                                                <textarea></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit bg-light-white tx-left strong pl30">첨부</td>
                                            <td class="w-file answer tx-left" colspan="4">
                                                <ul class="attach">
                                                    <li>
                                                        <div class="filetype">
                                                            <input type="text" class="file-text" />
                                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                            <span class="file-select"><input type="file" class="input-file" size="3"></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="filetype">
                                                            <input type="text" class="file-text" />
                                                            <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                            <span class="file-select"><input type="file" class="input-file" size="3"></span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="search-Btn mt20 mb50 f_right">
                                    <ul>
                                        <li class="btnAuto90 h36">
                                            <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                                <span>저장</span>
                                            </button>
                                        </li>
                                        <li class="btnAuto90 h36">
                                            <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                                <span class="tx-purple-gray">취소</span>
                                            </button>
                                        </li>
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
                                        <tr><th colspan="4" class="w-list tx-left pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
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
                                        <span>전체목록</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div id="cs4" class="CScenter4">
                    <div class="willbes-Lec-Tit NG bd-none tx-black c_both">· 사이트 이용가이드</div>
                    <div class="Act4 mt50">
                        <img src="{{ img_url('cs/willbes_guide.jpg') }}"> 
                        <div class="w-Guide mt40">
                            <div class="willbes-guide NGEB">
                                <ul class="tabWrap tabcsDepth2 tab_Guide p_re NGEB">
                                    <li class="w-guide1">
                                        <a class="qBox" href="#guide1"><span>주요메뉴 안내</span></a>
                                        <div class="subBox on">
                                            <dl>
                                                <dt><button type="submit" onclick="">네비게이션</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">강좌검색</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">HOT 클릭</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">수험정보</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">이벤트</button></dt>
                                            </dl>
                                        </div>
                                    </li>
                                    <li class="w-guide2">
                                        <a class="qBox" href="#guide2"><span>회원가입</span></a>
                                        <div class="subBox">
                                            <dl>
                                                <dt><button type="submit" onclick="">전체</button><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">결제</buttona><span class="row-line">|</span></dt>
                                                <dt><button type="submit" onclick="">환불</button></dt>
                                            </dl>
                                        </div>
                                    </li>
                                    <li class="w-guide3">
                                        <a class="qBox" href="#guide3"><span>수강신청</span></a>
                                    </li>
                                    <li class="w-guide4">
                                        <a class="qBox" href="#guide4"><span>주문/결제</span></a>
                                    </li>
                                    <li class="w-guide5">
                                        <a class="qBox" href="#guide5"><span>강의수강</span></a>
                                    </li>
                                </ul>
                                <div class="tabBox mt80">
                                    <div id="guide1" class="tabContent">가이드 이미지1</div>
                                    <div id="guide2" class="tabContent">가이드 이미지2</div>
                                    <div id="guide3" class="tabContent">가이드 이미지3</div>
                                    <div id="guide4" class="tabContent">가이드 이미지4</div>
                                    <div id="guide5" class="tabContent">가이드 이미지5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cs5" class="CScenter5">
                    <div class="willbes-Lec-Tit NG bd-none tx-black c_both">· 모바일 서비스안내</div>
                    <div class="Act5 mt50">
                        <img src="{{ img_url('cs/willbes_m_guide.jpg') }}"> 
                        <div class="w-Guide mt40">
                            <div class="willbes-m-guide NGEB">
                                <ul class="tabWrap tabcsDepth2 tab_m_Guide p_re NG">
                                    <li class="w-m-guide1"><a class="qBox" href="#m_guide1"><span>모바일앱1</span></a></li>
                                    <li class="w-m-guide2"><a class="qBox" href="#m_guide2"><span>모바일앱2</span></a></li>
                                </ul>
                                <div class="tabBox mt60">
                                    <div id="m_guide1" class="tabContent">모바일앱 가이드 이미지1</div>
                                    <div id="m_guide2" class="tabContent">모바일앱 가이드 이미지2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cs6" class="CScenter6">
                    <div class="willbes-Lec-Tit NG bd-none tx-black">· PC 원격지원</div>
                    <div class="Act6 mt50">
                        <div class="support_infoBox tx-black p_re NGR">
                            <img src="{{ img_url('cs/willbes_pc_support.jpg') }}"> 
                            <div class="support-Btn NSK">
                                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue"><span>PC 원격지원 시작</span></button>
                            </div>
                        </div>
                        <div class="willbes-Leclist mt50 c_both">
                            <div class="SupportTable NG">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 150px;">
                                        <col style="width: 790px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-tit tx-black tx-left pl40">운영시간</td>
                                            <td class="w-txt tx-left pl30">평일 <span class="strong tx-light-blue">09:00 ~ 18:00</span> (주말/공휴일휴무)</td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit tx-black tx-left pl40">이럴때<br/>요청하세요.</td>
                                            <td class="w-txt tx-left pl30">
                                                · FAQ 또는 1:1 상담으로 문제가 해결되지 않을때<br/>
                                                · PC 사용이 익숙하지 않아 문제해결이 어려울때<br/>
                                                · 1:1 상담게시판, 전화로 설명하기 어려울때
                                            </td>
                                        </tr>
                                        <tr>
                                        <td class="w-tit tx-black tx-left pl40">PC 원격지원<br/>이용순서</td>
                                            <td class="w-txt tx-left pl30">
                                                <ul>
                                                    <li>
                                                        <div class="w-tit tx-black">PC 사양확인</div>
                                                        <div class="w-txt">
                                                            원격진단을 받으실<br/>
                                                            PC 사양을<br/>
                                                            확인해주세요
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="w-tit tx-black">원격지원 전화상담</div>
                                                        <div class="w-txt">
                                                            고객센터<br/>
                                                            (1544-6219)로<br/>
                                                            전화주세요.
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="w-tit tx-black">프로그램 실행</div>
                                                        <div class="w-txt">
                                                            원격지원 프로그램을<br/>
                                                            설치 및<br/>
                                                            실행해 주세요.
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="w-tit tx-black">문제진단 및 해결</div>
                                                        <div class="w-txt">
                                                            원격 진단을 받으실<br/>
                                                            PC 사양을<br/> 
                                                            확인해주세요.
                                                        </div>
                                                    </li>
                                                </ul>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br/><br/><br/>

                    <div class="willbes-Lec-Tit NG bd-none tx-black">· 학습 프로그램 설치</div>
                    <div class="Act6 mt50">
                        <div class="willbes-Leclist mt50 c_both">
                            <div class="DownloadTable NG">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 130px;">
                                        <col style="width: 700px;">
                                        <col style="width: 110px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-img"><img src="{{ img_url('cs/icon_program_ZIP.gif') }}"></td>
                                            <td class="w-txt tx-left pl20">
                                                <div class="tx-black">알집</div>
                                                데이터 압축/압축해제에 이용되는 프로그램입니다.<br/>
                                                윌비스에서 제공되는 압축 자료를 보기 위해서는 압축용 프로그램이 필요합니다.
                                            </td>
                                            <td class="w-download">
                                                <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-img"><img src="{{ img_url('cs/icon_program_Word.gif') }}"></td>
                                            <td class="w-txt tx-left pl20">
                                                <div class="tx-black">한글과 컴퓨터 뷰어 v2007</div>
                                                한글97 등의 한글 프로그램이 설치되어 있지 않는 경우에 HWP 한글문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                            </td>
                                            <td class="w-download">
                                                <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-img"><img src="{{ img_url('cs/icon_program_MS.gif') }}"></td>
                                            <td class="w-txt tx-left pl20">
                                                <div class="tx-black">MS Word 뷰어</div>
                                                MicroSoft의 Word 프로그램이 설치되어있지 않는 경우에 doc문서를 열어볼 수 있도록 해주는 프로그램입니다.
                                            </td>
                                            <td class="w-download">
                                                <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-img"><img src="{{ img_url('cs/icon_program_PDF.gif') }}"></td>
                                            <td class="w-txt tx-left pl20">
                                                <div class="tx-black">한글 Adobe Reader</div>
                                                Adobe Acrobat eBook Reader로 제작된 온라인 문서(PDF)를 열어볼 수 있도록 해주는 프로그램입니다
                                            </td>
                                            <td class="w-download">
                                                <a href="#none"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cs7" class="CScenter7">
                    <div class="willbes-Lec-Tit NG bd-none tx-black">· 부정사용자 규제</div>
                    <div class="Act7 mt50">
                        <div class="announce_infoBox tx-black NGR">
                            윌비스는 <span class="strong tx-light-blue">공정한 사이트 이용</span>환경을 조성하고, 회원님들의 <span class="strong tx-light-blue">개인정보와 컨텐츠의 저작권을 보호</span>하기 위해<br/>
                            ID 공유 등 불법 사용자에 대한 규제를 시행하고 있습니다.<br/>
                            보다 많은 회원님들께 질높은 콘텐츠와 서비스를 돌려드릴 수 있도록 콘텐츠 부정 사용 근절에 동참 부탁드립니다.<br/>
                            <div class="announce-Btn NSK mt20 mr70 f_right">
                                <ul>
                                    <li>
                                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-gray">
                                            <span class="tx-purple-gray">윌비스 이용약관 확인</span>
                                        </button>
                                    </li>
                                    <li>
                                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                            <span>신고하기</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="willbes-Leclist mt50 c_both">
                            <div class="AnnounceTable NG">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                    <colgroup>
                                        <col style="width: 200px;">
                                        <col style="width: 140px;">
                                        <col style="width: 600px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce1.gif') }}"><div>ID 공유</div></td>
                                            <td class="w-tit">적발기준</td>
                                            <td class="w-txt tx-left pl20">
                                                · 하나의 ID를 여러명이 공유하여 수강하는 경우<br/>
                                                · 동시에 동일한 ID로 2대 이상의 PC/IP에서 접속하는 경우<br/>
                                                · PC 접속장소나 교재 배송지가 수시로 변경되는 경우
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit">조치사항</td>
                                            <td class="w-txt tx-left pl20">
                                                · 경고문자/메일발송 및 유선연락<br/>
                                                · 7일간 소명 기회부여 (소명자료미제출/재적발시, ID 수강차단)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce2.gif') }}"><div>무단복제</div></td>
                                            <td class="w-tit">적발기준</td>
                                            <td class="w-txt tx-left pl20">
                                                · 윌비스 강좌를 불법으로 녹화하는 경우<br/>
                                                · 강의 수강중 복제 프로그램을 실행/불법 녹화를 시도하는 경우
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit">조치사항</td>
                                            <td class="w-txt tx-left pl20">
                                                · 적발 즉시 수강차단 및 법적 제재진행<br/>
                                                · 내강의실 경고 팝업 및 쪽지발송
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-img" rowspan="2"><img src="{{ img_url('cs/icon_announce3.gif') }}"><div>불법판매/유통</div></td>
                                            <td class="w-tit">적발기준</td>
                                            <td class="w-txt tx-left pl20">
                                                · 윌비스 강좌 및 교재를 상업적인 목적으로 복제해 무단 유통/판매한 경우<br/>
                                                · 자신의 ID/강좌 등의 서비스를 타인에게 양도/판매/대여하는 경우<br/>
                                                · 커뮤니티, 게시판 등을 통해 강좌, 교재 불법 공유내용을 게시/판매하는 경우
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="w-tit">조치사항</td>
                                            <td class="w-txt tx-left pl20">
                                                · 적발 즉시 수강차단 및 법적 제재진행<br/>
                                                · 사전 경고없이 ID 영구정지
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-CScenter -->
        
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop