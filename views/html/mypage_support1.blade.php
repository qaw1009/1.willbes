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
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth">
            <span class="depth-Arrow">></span><strong>내강의실</strong>
            <span class="depth-Arrow">></span><strong>학습지원관리</strong>
            <span class="depth-Arrow">></span><strong>쪽지관리</strong>
        </span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Leclist c_both">
            <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <select id="all" name="all" title="all" class="seleAll mr10 h30 f_left">
                        <option selected="selected">전체쪽지</option>
                        <option value="미확인쪽지">미확인쪽지</option>
                        <option value="확인쪽지">확인쪽지</option>
                    </select>
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
                </span>
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </span>
            </div>
            <div class="LeclistTable pointTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 60px;">
                        <col style="width: 70px;">
                        <col style="width: 80px;">
                        <col style="width: 370px;">
                        <col style="width: 70px;">
                        <col style="width: 100px;">
                        <col style="width: 110px;">
                        <col style="width: 80px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>구분<span class="row-line">|</span></li></th>
                            <th>제목<span class="row-line">|</span></li></th>
                            <th>첨부<span class="row-line">|</span></li></th>
                            <th>발송자<span class="row-line">|</span></li></th>
                            <th>발송일<span class="row-line">|</span></li></th>
                            <th>상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25 strong"><a href="#none" onclick="openWin('MEMOPASS')">3법 해피엔딩 이벤트☆수험표 인증시 무료!</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state tx-red strong">미확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25 strong"><a href="#none">김원욱 형법 최신 1개년 기출 판례이벤트</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state tx-red strong">미확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">임용</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25"><a href="#none">2018년 제1차 경찰 공무원 채용필기시험 가답안 공지</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">[신규강의안내] 2018 대비 3~4월안내</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">설연휴 학원 고객센터 운영안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">임용</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">추석 교재 배송 및 고객센터 휴무안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-acad">학원</td>
                            <td class="w-list tx-left pl25"><a href="#none">4월 무이자카드 안내</a></td>
                            <td class="w-file">&nbsp;</td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">공무원</td>
                            <td class="w-acad">온라인</td>
                            <td class="w-list tx-left pl25"><a href="#none">3월 무이자카드 안내</a></td>
                            <td class="w-file">
                                <a href="#none">
                                    <img src="{{ img_url('prof/icon_file.gif') }}">
                                </a>
                            </td>
                            <td class="w-admin">관리자명</td>
                            <td class="w-date">2018-00-00</td>
                            <td class="w-state">확인</td>
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
        <!-- willbes-Leclist -->

        <div id="MEMOPASS" class="willbes-Layer-Black">
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h590 fix of-hidden">
                <a class="closeBtn" href="#none" onclick="closeWin('MEMOPASS')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">쪽지</div> 

                <div class="lecMoreWrap pb30">

                    <div class="PASSZONE-List widthAutoFull LeclistTable Memolist">
                        <table cellspacing="0" cellpadding="0" class="listTable userMemoTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th class="w-tit">과정</th>
                                    <td class="w-list">경찰</td>
                                    <th class="w-tit">구분</th>
                                    <td class="w-list">온라인</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">발송자</th>
                                    <td class="w-list" colspan="3">윌비스</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">발송일</th>
                                    <td class="w-list" colspan="3">2018-00-00 00:00</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">확인일</th>
                                    <td class="w-list" colspan="3">2018-00-00 00:00</td>
                                </tr>
                                <tr>
                                    <th class="w-tit" rowspan="2">내용</th>
                                    <td class="w-list w-file" colspan="3">                
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list w-content" colspan="3">  
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>  
                                        내용이 출력됩니다.<br/>  
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                        내용이 출력됩니다.<br/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="w-btn">
                            <a class="answerBox_block NSK" href="#none" onclick="">삭제</a>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 쪽지 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop