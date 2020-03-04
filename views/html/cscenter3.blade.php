@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-List menu-List-Center cscenter">
                <li>
                    <a href="{{ site_url('/home/html/cscenter_index') }}">고객센터 HOME</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter1') }}">자주하는 질문</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter2') }}">공지사항</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter3') }}">1:1 상담</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter4') }}">사이트 이용가이드</a>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter5') }}">모바일 이용가이드</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/cscenter6_1') }}">수강지원</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수강지원</li>
                            <li><a href="{{ site_url('/home/html/cscenter6_1') }}">PC 원격지원</a></li>
                            <li><a href="{{ site_url('/home/html/cscenter6_2') }}">학습 프로그램 설치</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/cscenter7') }}">부정사용자 규제</a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>고객센터</strong>
            <span class="depth-Arrow">></span><strong>1:1 상담</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
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
                                <col style="width: 130px;">
                                <col style="width: 100px;">
                                <col>
                                <col style="width: 70px;">
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
                                    <td class="w-process"><div class="pBox p5">고등고시(학원)</div></td>
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