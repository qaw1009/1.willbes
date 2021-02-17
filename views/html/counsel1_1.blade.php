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
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mypage_test1') }}">모의고사관리</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">모의고사관리</li>
                            <li><a href="{{ site_url('/home/html/mypage_test1') }}">접수현황</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test2') }}">온라인모의고사 응시</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_test3') }}">성적결과</a></li>
                        </ul>
                    </div>
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
                <li class="dropdown">
                    <a href="#none">회원정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">회원정보</li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo1') }}">개인정보관리</a></li>
                            <li><a href="{{ site_url('/home/html/mypage_userinfo2') }}">비밀번호변경</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <a href="#none"><img src="{{ img_url('sub/icon_home.gif') }}"></a>
        <span class="depth">
            <span class="depth-Arrow">></span>
            <strong>고객센터</strong>
        </span>
        <span class="depth">
            <span class="depth-Arrow">></span>
            <strong>1:1상담</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <div class="willbes-Lec-Tit NG bd-none tx-black c_both pt-zero">
                · 1:1상담                
            </div>
            <div class="Act3 mt30">
                <!-- List -->
                <div class="willbes-Leclist c_both">
                    <div class="willbes-Lec-Selected tx-gray">                        
                        <div class="willbes-Lec-Search GM">
                            <select id="process" name="process" title="process" class="seleProcess">
                                <option selected="selected">과정선택</option>
                                <option value="임용[온라인]">임용[온라인]</option>
                                <option value="임용[학원]">임용[학원]</option>
                            </select>
                            <select id="div" name="div" title="div" class="seleDiv">
                                <option selected="selected">구분</option>
                                <option value="교육학">교육학</option>
                                <option value="유아">유아</option>
                                <option value="초등">초등</option>
                                <option value="중등">중등</option>
                            </select>
                            <select id="A" name="A" title="A" class="seleLecA">
                                <option selected="selected">상담 유형 선택</option>
                                <option value="수강">수강</option>
                                <option value="결제">결제</option>
                                <option value="환불">환불</option>
                                <option value="교재">교재</option>
                                <option value="이벤트">이벤트</option>
                                <option value="불법신고">불법신고</option>
                                <option value="학원상담">학원상담</option>
                                <option value="기타">기타</option>
                            </select>
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="제목 또는 내용을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                            <div class="subBtn blue NSK f_right"><a href="#none">문의하기 ></a></div>
                        </div>                        
                    </div>
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable qnaTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col style="width: 65px;">
                                <col style="width: 90px;">
                                <col style="width: 100px;">
                                <col style="width: 395px;">
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
                                    <td class="w-process"><div class="pBox p5">임용[온라인]</div></td>
                                    <td class="w-A">수강</td>
                                    <td class="w-list tx-left pl20">
                                        <a href="#none">
                                            <img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?
                                            <img src="{{ img_url('prof/icon_N.gif') }}">
                                        </a>
                                    </td>
                                    <td class="w-write">관리자명</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer"><span class="aBox answerBox NSK">답변완료</span></td>
                                </tr>
                                <tr>
                                    <td class="w-no"><img src="{{ img_url('prof/icon_notice.gif') }}"></td>
                                    <td class="w-process"><div class="pBox p6">임용[학원]</div></td>
                                    <td class="w-A">수강</td>
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 만14세미만회원은어떻게가입하나요?</a></td>
                                    <td class="w-write">장동*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer"><span class="aBox waitBox NSK">답변대기</span></td>
                                </tr>
                                <tr>
                                    <td class="w-no">10</td>
                                    <td class="w-process"><div class="pBox p7">경찰</div></td>
                                    <td class="w-A">결제</td>
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?</a></td>
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
                                    <td class="w-A">환불</td>
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?</a></td>
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
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?</a></td>
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
                                    <td class="w-A">결제</td>
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
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?</a></td>
                                    <td class="w-write">박형*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no">2</td>
                                    <td class="w-process">&nbsp;</td>
                                    <td class="w-A">교재</td>
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}"> 로그인이되지않는데어떻게하나요?</a></td>
                                    <td class="w-write">장동*</td>
                                    <td class="w-date">2018-00-00</td>
                                    <td class="w-answer">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="w-no">1</td>
                                    <td class="w-process">&nbsp;</td>
                                    <td class="w-A">교재</td>
                                    <td class="w-list tx-left pl20"><a href="#none"><img src="{{ img_url('prof/icon_locked.gif') }}">로그인이되지않는데어떻게하나요?</a></td>
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
                                            <option value="임용[온라인]">임용[온라인]</option>
                                            <option value="임용[학원]">임용[학원]</option>
                                        </select>
                                        <select id="div" name="div" title="div" class="seleDiv" style="width: 250px;">
                                            <option selected="selected">구분</option>
                                            <option value="교육학">교육학</option>
                                            <option value="유아">유아</option>
                                            <option value="초등">초등</option>
                                            <option value="중등">중등</option>
                                        </select>
                                        <select id="campus" name="campus" title="campus" class="seleCampus" style="width: 250px;">
                                            <option selected="selected">과목</option>
                                            <option value="국어">국어</option>
                                            <option value="영어">영어</option>
                                            <option value="수학">수학</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left strong pl30">상담유형<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-selected full tx-left pl30" colspan="3">
                                        <select id="A" name="A" title="A" class="seleLecA">
                                            <option selected="selected">상담 유형 선택</option>
                                            <option value="수강">수강</option>
                                            <option value="결제">결제</option>
                                            <option value="환불">환불</option>
                                            <option value="교재">교재</option>
                                            <option value="이벤트">이벤트</option>
                                            <option value="불법신고">불법신고</option>
                                            <option value="학원상담">학원상담</option>
                                            <option value="기타">기타</option>
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
                                                <div class="filetypeB">
                                                    <input type="file" class="input-file" size="3">
                                                    <input class="file-reset NSK" type="button" value="+" /> 
                                                </div>                                               
                                            </li>
                                            <li>
                                                <div class="filetypeB">
                                                    <input type="file" class="input-file" size="3">
                                                    <input class="file-reset NSK" type="button" value="-" /> 
                                                </div>                                               
                                            </li>
                                            <li>
                                                <div class="filetypeB">
                                                    <input type="file" class="input-file" size="3">
                                                    <input class="file-reset NSK" type="button" value="-" /> 
                                                </div>                                               
                                            </li>
                                            {{--
                                            <li>
                                                <div class="filetype">
                                                    <input type="text" class="file-text" />
                                                    <span class="file-btn bg-heavy-gray NSK">찾아보기</span>
                                                    <span class="file-select">
                                                        <input type="file" class="input-file" size="3">
                                                    </span>
                                                    <input class="file-reset NSK" type="button" value="X" />
                                                </div>
                                            </li>
                                            --}}
                                            
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
                                        <img src="https://ssam.willbes.net/public/uploads/willbes/board/63/2020/1218/board_309736_01_20201218114139.jpg" class="boardImg">
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