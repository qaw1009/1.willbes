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
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>수험정보</strong>
            <span class="depth-Arrow">></span><strong>모의고사</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mocktest INFOZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 모의고사
            </div>
        </div>
        <!-- "willbes-Mocktest INFOZONE -->

        <div class="willbes-Mypage-Tabs mt10">
            <ul class="tabMock three">
                <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사안내</a></li>
                <li><a href="{{ site_url('/home/html/mocktest6_2') }}">모의고사접수</a></li>
                <li><a class="on" href="#none">이의제기/정오표</a></li>
            </ul>
            <div class="LeclistTable">
                <div class="willbes-Mock-Subject NG">
                    · 이의제기
                    <div class="subBtn mock black f_right"><a href="{{ site_url('/home/html/mocktest6_3') }}">전체 모의고사 목록</a></div>
                </div>
                <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 150px;">
                        <col style="width: 610px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>응시분야<span class="row-line">|</span></th>
                            <th>모의고사명<span class="row-line">|</span></th>
                            <th>정오표</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-type">일반경찰</td>
                            <td class="w-list tx-left pl20">7/5 전국모의고사-일방경찰</td>
                            <td class="w-graph">8개</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- List -->
            <div class="willbes-Leclist mt60 c_both">
                <div class="willbes-Lec-Selected tx-gray">
                    <select id="process" name="process" title="process" class="seleProcess">
                        <option selected="selected">직렬</option>
                        <option value="남자">남자</option>
                        <option value="여자">여자</option>
                        <option value="101단">101단</option>
                    </select>
                    <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                        <colgroup>
                            <col style="width: 50px;">
                            <col style="width: 100px;">
                            <col style="width: 500px;">
                            <col style="width: 90px;">
                            <col style="width: 110px;">
                            <col style="width: 90px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>No<span class="row-line">|</span></th>
                                <th>직렬<span class="row-line">|</span></th>
                                <th>제목<span class="row-line">|</span></th>
                                <th>작성자<span class="row-line">|</span></th>
                                <th>작성일<span class="row-line">|</span></th>
                                <th>답변상태</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                <td class="w-process">&nbsp;</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰 공무원(순경) 체용시험문제- 국어</a></td>
                                <td class="w-write">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                <td class="w-process">&nbsp;</td>
                                <td class="w-list tx-left pl20"><a href="#none">[2014년 1차] 경찰 공무원(순경) 채용시험 - 형사소송법</a></td>
                                <td class="w-write">&nbsp;</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="w-no">10</td>
                                <td class="w-process">남자</td>
                                <td class="w-list tx-left pl20"><a href="#none">2017년 2월 26일 시행 모의고사 이의제기 행정학, 사회</a></td>
                                <td class="w-write">관리자명</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">9</td>
                                <td class="w-process">여자</td>
                                <td class="w-list tx-left pl20">
                                    <a href="#none">
                                        <img src="{{ img_url('prof/icon_locked.gif') }}"> 2017년 2월 26일 시행 모의고사 이의제기 행정학, 사회
                                        <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                        <img src="{{ img_url('prof/icon_file.gif') }}">
                                    </a>
                                </td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">8</td>
                                <td class="w-process">101단</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰 공무원(순경) 체용시험문제- 국어</a></td>
                                <td class="w-write">관리자명</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">7</td>
                                <td class="w-process">&nbsp;</td>
                                <td class="w-list tx-left pl20">
                                    <a href="#none">
                                        <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                        <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                        <img src="{{ img_url('prof/icon_file.gif') }}">
                                    </a>
                                </td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">6</td>
                                <td class="w-process">남자</td>
                                <td class="w-list tx-left pl20"><a href="#none">[2014년 1차] 경찰 공무원(순경) 채용시험 - 형사소송법</a></td>
                                <td class="w-write">관리자명</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">5</td>
                                <td class="w-process">&nbsp;</td>
                                <td class="w-list tx-left pl20">
                                    <a href="#none">
                                        <img src="{{ img_url('prof/icon_locked.gif') }}"> 18년 제1차 경찰 공무원(순경) 체용시험문제- 국어
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
                                <td class="w-process">남자</td>
                                <td class="w-list tx-left pl20">
                                    <a href="#none">
                                        <img src="{{ img_url('prof/icon_locked.gif') }}"> 18년 제1차 경찰 공무원(순경) 체용시험문제- 국어
                                    </a>
                                </td>
                                <td class="w-write">장동*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                            </tr>
                            <tr>
                                <td class="w-no">3</td>
                                <td class="w-process">남자</td>
                                <td class="w-list tx-left pl20"><a href="#none">[2014년 1차] 경찰 공무원(순경) 채용시험 - 형사소송법</a></td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="w-no">2</td>
                                <td class="w-process">남자</td>
                                <td class="w-list tx-left pl20"><a href="#none">[2014년 1차] 경찰 공무원(순경) 채용시험 - 형사소송법</a></td>
                                <td class="w-write">장동*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="w-no">1</td>
                                <td class="w-process">101단</td>
                                <td class="w-list tx-left pl20"><a href="#none">18년 제1차 경찰 공무원(순경) 체용시험문제- 국어</a></td>
                                <td class="w-write">박형*</td>
                                <td class="w-date">2018-00-00</td>
                                <td class="w-answer">&nbsp;</td>
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
            
            <!-- Write -->
            <div class="willbes-Leclist mt40 c_both">
                <div class="LecWriteTable">
                    
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdt-gray bdb-gray tx-gray fc-bd-none">
                        <colgroup>
                            <col style="width: 120px;">
                            <col style="width: 350px;">
                            <col style="width: 120px;">
                            <col style="width: 350px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-tit bg-light-white tx-left strong pl30">직렬선택<span class="tx-light-blue">(*)</span></td>
                                <td class="tx-left pl30">남자</td>
                                <td class="w-tit bg-light-white tx-left strong pl30">공개여부<span class="tx-light-blue">(*)</span></td>
                                <td class="w-radio tx-left pl30">
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

            <br/><br/><br/>

            <!-- View -->
            <div class="willbes-Leclist c_both">
                <div class="LecViewTable">
                    <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black tx-gray">
                        <colgroup>
                            <col style="width: 780px;">
                            <col style="width: 160px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="w-list tx-left pl20"><strong>[2014년 1차] 경찰공무원(순경) 채용시험 - 형법</strong><span class="row-line">|</span></th>
                                <th class="w-date">2018-00-00 00:00</th>
                            </tr>
                            <tr>
                                <td class="w-process tx-left pl20">남자<span class="row-line">|</span></td>
                                <td class="w-write">작성자명<span class="row-line">|</span></td>
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
                                <td>&nbsp;<span class="row-line">|</span></td>
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
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop