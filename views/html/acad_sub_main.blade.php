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
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>

    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="depth"><span class="depth-Arrow">></span><strong>학원안내</strong><span class="depth-Arrow">></span><strong>신림</strong></span>
    </div>
    <!-- Depth//-->

    <div class="Content p_re PA">        
        <div class="subSection01 bSlider acad">
            <div class="slider">
                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_190211_01.jpg') }}" alt="배너명"></a></div>
                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_190211_02.jpg') }}" alt="배너명"></a></div>
            </div>
        </div>
        <!-- subSection01// -->

        <div class="subSection02 mt20">
                <ul>
                    <li>
                        <div class="bSlider acad blue">
                            <div class="sliderTM">
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="bSlider acad blue">
                            <div class="slider">
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_01.jpg') }}" alt="배너명"></a></div>
                                <div><a href="#none"><img src="{{ img_url('cop_acad/visual/sub_visual_bnr_02.jpg') }}" alt="배너명"></a></div>
                            </div>
                        </div>
                    </li>
                </ul>
        </div>
        <!-- subSection02// -->

        <div class="noticeTabs acad">
                <ul class="tabWrap noticeWrap_acad three NSK">
                    <li><a href="#notice1" class="on">공지사항</a></li>
                    <li><a href="#notice2" class="">1:1상담</a></li>
                    <li><a href="#notice3" class="">오시는 길</a></li>
                </ul>
                <div class="tabBox noticeBox_acad">
                    <div id="notice1" class="tabContent p_re">
                    <div class="willbes-CScenter c_both mt40">
                        <div class="Act2">
                            <!-- List -->
                            <div class="willbes-Leclist c_both">
                                <div class="willbes-Lec-Selected tx-gray mt0">
                                    <div class="f_left">
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
                                    <div class="willbes-Lec-Search GM f_left mg0">
                                        <div class="inputBox p_re">
                                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                            <button type="submit" onclick="" class="search-Btn">
                                                <span>검색</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="LeclistTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 65px;">
                                            <col style="width: 65px;">
                                            <col style="width: 110px;">
                                            <col style="width: auto;">
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
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
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
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">
                                                    <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                                </td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">244</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">10</td>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">355</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">9</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">466</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">8</td>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">355</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">7</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">466</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">6</td>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">355</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">5</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">466</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">4</td>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">355</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">3</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                                <td class="w-file">&nbsp;</td>
                                                <td class="w-date">2018-00-00</td>
                                                <td class="w-click">466</td>
                                            </tr>
                                            <tr>
                                                <td class="w-no">2</td>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-campus">스파르타반</td>
                                                <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
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


                            <!-- View -->
                            <div class="willbes-Leclist c_both mt40">
                                <div class="LecViewTable">
                                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 65px;">
                                            <col style="width: auto;">
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
                                    <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                        <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                            <span>목록</span>
                                        </button>
                                    </div>
                                    <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
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
                    <!-- willbes-CScenter -->
                    </div>
                    <!-- notice1// --> 

                    <div id="notice2" class="tabContent p_re">
                        <div class="willbes-CScenter c_both mt40">
                            <div class="Act3">
                                <!-- List -->
                                <div class="willbes-Leclist c_both">
                                    <div class="willbes-Lec-Selected tx-gray">
                                        <div class="f_left">
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
                                        </div>
                                        <div class="willbes-Lec-Search GM f_left mg0">
                                            <div class="inputBox p_re">
                                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                                <button type="submit" onclick="" class="search-Btn">
                                                    <span>검색</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="f_right">
                                            <div class="subBtn blue NSK f_right"><a href="#none">문의하기 ></a></div>
                                        </div>
                                    </div>
                                    <div class="LeclistTable">
                                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 65px;">
                                                <col style="width: 90px;">
                                                <col style="width: 100px;">
                                                <col style="width: auto;">
                                                <col style="width: 90px;">
                                                <col style="width: 110px;">
                                                <col style="width: 90px;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>No<span class="row-line">|</span></th>
                                                    <th>과정<span class="row-line">|</span></th>
                                                    <th>상담유형<span class="row-line">|</span></th>
                                                    <th>제목<span class="row-line">|</span></th>
                                                    <th>작성자<span class="row-line">|</span></th>
                                                    <th>작성일<span class="row-line">|</span></th>
                                                    <th>답변상태</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                                    <td class="w-process"><div class="pBox p5">임용</div></td>
                                                    <td class="w-A">기기</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">관리자명</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                                    <td class="w-process"><div class="pBox p6">공무원</div></td>
                                                    <td class="w-A">수강</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">만14세미만회원은어떻게가입하나요?</a></td>
                                                    <td class="w-write">장동*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">10</td>
                                                    <td class="w-process"><div class="pBox p7">경찰</div></td>
                                                    <td class="w-A">기기</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">관리자명</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">9</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">교재</td>
                                                    <td class="w-list tx-left pl20">
                                                        <a href="#none">
                                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                                        </a>
                                                    </td>
                                                    <td class="w-write">박형*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">8</td>
                                                    <td class="w-process"><div class="pBox p7">경찰</div></td>
                                                    <td class="w-A">기기</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">관리자명</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">7</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">교재</td>
                                                    <td class="w-list tx-left pl20">
                                                        <a href="#none">
                                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                                        </a>
                                                    </td>
                                                    <td class="w-write">박형*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">6</td>
                                                    <td class="w-process"><div class="pBox p7">경찰</div></td>
                                                    <td class="w-A">기기</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">관리자명</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">5</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">교재</td>
                                                    <td class="w-list tx-left pl20">
                                                        <a href="#none">
                                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                                        </a>
                                                    </td>
                                                    <td class="w-write">박형*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">4</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">결제/환불</td>
                                                    <td class="w-list tx-left pl20">
                                                        <a href="#none">
                                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요?
                                                        </a>
                                                    </td>
                                                    <td class="w-write">장동*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">3</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">수강</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">박형*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">2</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">교재</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">장동*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="w-no">1</td>
                                                    <td class="w-process">&nbsp;</td>
                                                    <td class="w-A">교재</td>
                                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                                    <td class="w-write">박형*</td>
                                                    <td class="w-date">2018-00-00</td>
                                                    <td class="w-answer">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                
                                <!-- Write -->
                                <div class="willbes-Leclist mt40 c_both">
                                    <div class="LecWriteTable">
                                        
                                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                                            <colgroup>
                                                <col style="width: 120px;">
                                                <col style="width: auto;">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <td class="w-tit bg-light-white tx-left strong pl30">과정선택<span class="tx-light-blue">(*)</span></td>
                                                    <td class="w-selected tx-left pl30">
                                                        <select id="process" name="process" title="process" class="seleProcess" style="width: 250px;">
                                                            <option selected="selected">과정선택</option>
                                                            <option value="헌법">헌법</option>
                                                            <option value="스파르타반">스파르타반</option>
                                                            <option value="공직선거법">공직선거법</option>
                                                        </select>
                                                        <select id="div" name="div" title="div" class="seleDiv" style="width: 250px;">
                                                            <option selected="selected">구분</option>
                                                            <option value="헌법">헌법</option>
                                                            <option value="스파르타반">스파르타반</option>
                                                            <option value="공직선거법">공직선거법</option>
                                                        </select>
                                                        <select id="campus" name="campus" title="campus" class="seleCampus" style="width: 250px;">
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
                                                                    <input class="file-reset NSK" type="button" value="X" />
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="filetype">
                                                                    <input type="text" class="file-text" />
                                                                    <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                                    <span class="file-select"><input type="file" class="input-file" size="3"></span>
                                                                    <input class="file-reset NSK" type="button" value="X" />
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

                                        <div class="search-Btn mt20 h36 p_re">
                                            <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                                <span class="tx-purple-gray">취소</span>
                                            </button>
                                            <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray center">
                                                <span>저장</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>


                                <!-- View -->
                                <div class="willbes-Leclist c_both mt40">
                                    <div class="LecViewTable">
                                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                                            <colgroup>
                                                <col style="width: auto;">
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
                                                <col style="width: auto;">
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

                                        <div class="search-Btn mt20 h36 p_re">
                                            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                                <a href="#none" class="tx-purple-gray">삭제</a>
                                            </div>
                                            <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center">
                                                <a href="#none" class="tx-purple-gray">수정</a>
                                            </div>
                                            <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                                <a href="#none">목록</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- willbes-CScenter -->
                    </div>
                    <!-- notice2//-->

                    <div id="notice3" class="tabContent p_re">
                        <!-- 지도 534x250 -->
                        <!-- 신림 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=37137823b61f7eed35964c6307d5817855f785353e6ee4129a77e5fe47eaebee&query=7Iug66a864%2BZIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&tab=1&lng=8ffb927ed67b0f3219d0d61d27ee1a59&mapMode=0&mpx=681039aecaf7f40c63cb6d0d3f3939492bfef483638eac8c5245c17f6e05851775fe3c76c78fc68e3a1a10e9d06d016aae6091272fe5223b59ea7cb6f93a916f&lat=41f3386316de60023a2987bec7e6eda7&dlevel=12&enc=b64&menu=location" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549871165699_755736770" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=37137823b61f7eed35964c6307d5817855f785353e6ee4129a77e5fe47eaebee&query=7Iug66a864%2BZIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&tab=1&lng=8ffb927ed67b0f3219d0d61d27ee1a59&mapMode=0&mpx=681039aecaf7f40c63cb6d0d3f3939492bfef483638eac8c5245c17f6e05851775fe3c76c78fc68e3a1a10e9d06d016aae6091272fe5223b59ea7cb6f93a916f&lat=41f3386316de60023a2987bec7e6eda7&dlevel=12&enc=b64&menu=location" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>서울 관악구 신림로 23길 16 4층</li>
                                    <li><span>연락처</span>1544-4006</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 인천 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=548870a990ecf318c7ca984cf21b8e77d8b86c823d74cdb4579b6b36b6385347&query=7J247LKc6rSR7Jet7IucIOu2gO2Pieq1rCDrtoDtj4nrj5kgNTM0LTI4IOykkeuztOu5jOuUqQ%3D%3D&tab=1&lng=256fb22eeee2344678885954ed42a3bf&mapMode=0&mpx=55c4c2141071798f2d20805fcee6ecb9b5968e0bfb89170dd26109f7a9524c2def9b1198b4df5e220daab6a53f96c8795b482be9d1fb8d6e1fc559be9fbe1d87&lat=a81cbafdad9f8ba56dc1fd0b47c5a2b0&dlevel=12&enc=b64&menu=location" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549871564023_1931329295" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=548870a990ecf318c7ca984cf21b8e77d8b86c823d74cdb4579b6b36b6385347&query=7J247LKc6rSR7Jet7IucIOu2gO2Pieq1rCDrtoDtj4nrj5kgNTM0LTI4IOykkeuztOu5jOuUqQ%3D%3D&tab=1&lng=256fb22eeee2344678885954ed42a3bf&mapMode=0&mpx=55c4c2141071798f2d20805fcee6ecb9b5968e0bfb89170dd26109f7a9524c2def9b1198b4df5e220daab6a53f96c8795b482be9d1fb8d6e1fc559be9fbe1d87&lat=a81cbafdad9f8ba56dc1fd0b47c5a2b0&dlevel=12&enc=b64&menu=location" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>인천 부평구 부평동 534-28 중보빌딩 10층</li>
                                    <li><span>연락처</span>1544-1661</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 대구 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=2966d6fd510e2815eeb05d14c7761f0459d09ff648de82e7e6fa4fdb565e2504&query=64yA6rWsIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&menu=location&tab=1&lng=a75075027346f16ab192a150a47954d0&mapMode=0&mpx=55c4c2141071798f2d20805fcee6ecb96c58b8634e9ea9c62c93bc96f9f4d635e4754ba8a412e14ab22cbc787c45e8e970d7009752968db691dd58f6aea6d7ca&lat=34a6b99f5cfe34e7c836e944c4ab1299&dlevel=12&enc=b64" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549871903923_-1198915242" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=2966d6fd510e2815eeb05d14c7761f0459d09ff648de82e7e6fa4fdb565e2504&query=64yA6rWsIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&menu=location&tab=1&lng=a75075027346f16ab192a150a47954d0&mapMode=0&mpx=55c4c2141071798f2d20805fcee6ecb96c58b8634e9ea9c62c93bc96f9f4d635e4754ba8a412e14ab22cbc787c45e8e970d7009752968db691dd58f6aea6d7ca&lat=34a6b99f5cfe34e7c836e944c4ab1299&dlevel=12&enc=b64" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>대구 중구 중앙대로 412(남일동) CGV 2층</li>
                                    <li><span>연락처</span>1522-6112</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 부산 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=434c194eff4846098d98c231cedbd183691835a7eb699691f49cd030b1ef02ee&query=67aA7IKwIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&tab=1&lng=2c7b29c8495563f33b1888c743b1cf6d&mapMode=0&mpx=574b59b99ab9b8f10dd3d56152a98d94b1434e308f49e849f7f3a2959b2bdb0b171337b12433a983315d4959aeacf955363bc336bce5c21857d69874aa0cc83d&lat=8a946a423a722e11b3ee617ab6b05511&dlevel=12&enc=b64&menu=location" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549872064284_1319919800" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=434c194eff4846098d98c231cedbd183691835a7eb699691f49cd030b1ef02ee&query=67aA7IKwIOycjOu5hOyKpOqyveywsO2VmeybkA%3D%3D&tab=1&lng=2c7b29c8495563f33b1888c743b1cf6d&mapMode=0&mpx=574b59b99ab9b8f10dd3d56152a98d94b1434e308f49e849f7f3a2959b2bdb0b171337b12433a983315d4959aeacf955363bc336bce5c21857d69874aa0cc83d&lat=8a946a423a722e11b3ee617ab6b05511&dlevel=12&enc=b64&menu=location" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>부산 진구 부정동 223-8</li>
                                    <li><span>연락처</span>1522-8112</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 광주 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=63dd3aca87f6b903abf7c794d3db6f8f6ff0f42efdd09b18fd7390c44a53864e&query=6rSR7KO8IOu2geq1rCDtmLjrj5nroZwgNi0xMQ%3D%3D&tab=1&lng=ac3f41916f4ce7826c1d17754b745b75&mapMode=0&mpx=1dbc5449bedcd7258544dfebb50269c7c08edfc61d5ba4bb481d2791afb7b1c53a6baca5a98d0e82496cbbb3aecbac00fe57b1ce88f8e09ff50a7f5a9fe56dcc&lat=c78f939baca7d2824c32e9ec86614aeb&dlevel=12&enc=b64&menu=location" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549872306015_1310470280" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=63dd3aca87f6b903abf7c794d3db6f8f6ff0f42efdd09b18fd7390c44a53864e&query=6rSR7KO8IOu2geq1rCDtmLjrj5nroZwgNi0xMQ%3D%3D&tab=1&lng=ac3f41916f4ce7826c1d17754b745b75&mapMode=0&mpx=1dbc5449bedcd7258544dfebb50269c7c08edfc61d5ba4bb481d2791afb7b1c53a6baca5a98d0e82496cbbb3aecbac00fe57b1ce88f8e09ff50a7f5a9fe56dcc&lat=c78f939baca7d2824c32e9ec86614aeb&dlevel=12&enc=b64&menu=location" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>광주 북구 호동로 6-11</li>
                                    <li><span>연락처</span>062-722-8140</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 제주 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=63dd3aca87f6b903abf7c794d3db6f8f6ff0f42efdd09b18fd7390c44a53864e&query=7KCc7KO864%2BEIOyLoOq0keydgOqyveywsO2VmeybkA%3D%3D&tab=1&lng=4862e0dcec7108409c3b4fd8ae61f256&mapMode=0&mpx=1dbc5449bedcd7258544dfebb50269c7c08edfc61d5ba4bb481d2791afb7b1c53a6baca5a98d0e82496cbbb3aecbac00fe57b1ce88f8e09ff50a7f5a9fe56dcc&lat=4cb9a0719d8f73f51f340b67d12e91a0&dlevel=12&enc=b64&menu=location" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549872556210_-64065344" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=63dd3aca87f6b903abf7c794d3db6f8f6ff0f42efdd09b18fd7390c44a53864e&query=7KCc7KO864%2BEIOyLoOq0keydgOqyveywsO2VmeybkA%3D%3D&tab=1&lng=4862e0dcec7108409c3b4fd8ae61f256&mapMode=0&mpx=1dbc5449bedcd7258544dfebb50269c7c08edfc61d5ba4bb481d2791afb7b1c53a6baca5a98d0e82496cbbb3aecbac00fe57b1ce88f8e09ff50a7f5a9fe56dcc&lat=4cb9a0719d8f73f51f340b67d12e91a0&dlevel=12&enc=b64&menu=location" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>제주도 제주시 동광로 56 3층</li>
                                    <li><span>연락처</span>064-722-8140</li>
                                </ul>
                            </div>
                        </div>

                        <!-- 진주 -->
                        <div class="mt40">
                            <div class="f_left">
                                <table cellpadding="0" cellspacing="0" width="536"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?searchCoord=a6d06bfb6855937bd7f4eb8cf1742f7b630ba9b1e3a90c1280ab523f1cbf00ce&query=7KeE7KO8IOycjOu5hOyKpOyLoOq0keydgOqyveywsO2VmeybkA%3D%3D&menu=location&tab=1&lng=63480df7bb5b6c344bd81f1943587b00&mapMode=0&mpx=f31bb06e57d7c02d39e001f61fd153554d93ee289f5015ec58d19b06303d75a49e2956161bf202391645f69b9234ddfc454d6808ca0544cc16254a9c6fd7941a&lat=a93919e466f89bb4da62fb08a6de53f9&dlevel=12&enc=b64" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1549872734360_-1886588831" width="534" height="250" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2019.2.11</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?searchCoord=a6d06bfb6855937bd7f4eb8cf1742f7b630ba9b1e3a90c1280ab523f1cbf00ce&query=7KeE7KO8IOycjOu5hOyKpOyLoOq0keydgOqyveywsO2VmeybkA%3D%3D&menu=location&tab=1&lng=63480df7bb5b6c344bd81f1943587b00&mapMode=0&mpx=f31bb06e57d7c02d39e001f61fd153554d93ee289f5015ec58d19b06303d75a49e2956161bf202391645f69b9234ddfc454d6808ca0544cc16254a9c6fd7941a&lat=a93919e466f89bb4da62fb08a6de53f9&dlevel=12&enc=b64" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>
                            </div>
                            <div class="add">
                                <ul>
                                    <li><span>주소</span>경남 진주시 칠암동 490-8 엠코아빌딩 4층</li>
                                    <li><span>연락처</span>055-755-7771</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <!-- notice3// -->
                </div>
            </div>
        
    </div>
    <!-- Content// -->

    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
    <!-- Quick-Bnr// -->
</div>
<!-- End Container -->

@stop