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
                    <a href="{{ site_url('/home/html/counsel1') }}">상담실</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">상담실</li>
                            <li><a href="{{ site_url('/home/html/counsel1') }}">일반상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel2') }}">인적성/면접상담</a></li>
                            <li><a href="{{ site_url('/home/html/counsel3_1') }}">심층상담예약</a></li>
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
            <span class="depth-Arrow">></span><strong>상담실</strong>
            <span class="depth-Arrow">></span><strong>인적성/면접상담</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 인적성/면접상담
                <div class="willbes-Lec-Search GM f_right" style="margin: 0;">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="Act3 mt30">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray">
                        <select id="category" name="category" title="category" class="seleCate">
                            <option selected="selected">카테고리</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="campus" name="campus" title="campus" class="seleCampus">
                            <option selected="selected">캠퍼스</option>
                            <option value="기타">기타</option>
                            <option value="강좌내용">강좌내용</option>
                            <option value="학습상담">학습상담</option>
                        </select>
                        <select id="counsel" name="counsel" title="counsel" class="seleCounsel">
                            <option selected="selected">상담유형</option>
                            <option value="기타">기타</option>
                            <option value="강좌내용">강좌내용</option>
                            <option value="학습상담">학습상담</option>
                        </select>
                        <div class="subBtn blue NSK f_right"><a href="#none">문의하기 ></a></div>
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 60px;">
                                <col style="width: 80px;">
                                <col style="width: 85px;">
                                <col style="width: 80px;">
                                <col style="width: 80px;">
                                <col style="width: 315px;">
                                <col style="width: 60px;">
                                <col style="width: 100px;">
                                <col style="width: 80px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>과정<span class="row-line">|</span></th>
                                    <th>카테고리<span class="row-line">|</span></th>
                                    <th>캠퍼스<span class="row-line">|</span></th>
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
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">&nbsp;</td>
                                    <td class="w-campus">전체</td>
                                    <td class="w-counsel">&nbsp;</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="#none">
                                            2018년 하반기 경찰 공무원 경력 경쟁
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        </a>
                                    </td>
                                    <td class="w-write">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">&nbsp;</td>
                                    <td class="w-campus">전체</td>
                                    <td class="w-counsel">&nbsp;</td>
                                    <td class="w-list tx-left pl20"><a href="#none">2018년 제2차 경찰 공무원(순경)</a></td>
                                    <td class="w-write">&nbsp;</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no">6</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">일반경찰</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-counsel">수강</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="#none">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 회원탈퇴는어떻게하나요? 
                                            <img src="{{ img_url('prof/icon_N.gif') }}"> 
                                        </a>
                                    </td>
                                    <td class="w-write">장동*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                </tr>
                                <tr>
                                    <td class="w-no">5</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">경행경채</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-counsel">교재</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="#none">
                                            회원탈퇴는어떻게하나요? 
                                            <img src="{{ img_url('prof/icon_file.gif') }}">
                                        </a>
                                    </td>
                                    <td class="w-write">장동*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                </tr>
                                <tr>
                                    <td class="w-no">4</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">경행경채</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-counsel">이용</td>
                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                    <td class="w-write">박형*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no">3</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">경행경채</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-counsel">스파르타</td>
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
                                    <td class="w-no">2</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">경행경채</td>
                                    <td class="w-campus">신림</td>
                                    <td class="w-counsel">수강</td>
                                    <td class="w-list tx-left pl20"><a href="#none">로그인이되지않는데어떻게하나요?</a></td>
                                    <td class="w-write">박형*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no">1</td>
                                    <td class="w-process">경찰학원</td>
                                    <td class="w-cate">경행경채</td>
                                    <td class="w-campus">노량진</td>
                                    <td class="w-counsel">교재</td>
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
                                <col style="width: 820px;">
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
                                            <option selected="selected">카테고리</option>
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
                                                <!--div class="filetype">
                                                    <input type="text" class="file-text" />
                                                    <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                    <span class="file-select"-->
                                                        <input type="file" class="input-file" size="3">
                                                    <!--/span>
                                                    <input class="file-reset NSK" type="button" value="X" />
                                                </div-->
                                            </li>
                                            <li>
                                                <!--div class="filetype">
                                                    <input type="text" class="file-text" />
                                                    <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                    <span class="file-select"-->
                                                        <input type="file" class="input-file" size="3">
                                                    <!--/span>
                                                    <input class="file-reset NSK" type="button" value="X" />
                                                </div-->
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
                                <col style="width: 645px;">
                                <col style="width: 135px;">
                                <col style="width: 160px;">
                            </colgroup>
                            <thead>
                                <tr><th colspan="3" class="w-list tx-left pl20"><strong>안녕하세요. 커리질문입니다~</strong></th></tr>
                                <tr>
                                    <td class="w-acad tx-left pl20">
                                        <dl>
                                            <dt>일반경찰<span class="row-line">|</span></dt>
                                            <dt>노량진<span class="row-line">|</span></dt>
                                            <dt>스파르타</dt>
                                        </dl>
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
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop