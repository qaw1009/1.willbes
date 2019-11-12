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
            <span class="depth-Arrow">></span><strong>모의고사관리</strong>
            <span class="depth-Arrow">></span><strong>성적결과</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-TESTZONE c_both">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                - 내강의실 > 모의고사관리 > 온라인모의고사 응시메뉴에서 정답제출을 처리한 모의고사의 성적 결과만 확인 가능합니다.<br/>
                                - 성적결과는 오프라인 시험응시일이 마감된 이후 3~5일 안에 제공됩니다.<br/>
                                - 시험지 형태가 PDF 파일인 경우 오답 노트가 제공되지 않습니다.
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-TESTZONE -->

        <div class="willbes-Leclist c_both mt60">
            <div class="willbes-LecreplyList tx-gray c_both">
                <ul class="widthAutoFull">
                    <li class="f_left">
                        지난 모의고사 성적결과 보기
                        <a href="#none" class="btnAuto95 bg-black tx-white tx-center h30 d_inblock">경찰 ▶</a>
                        <a href="#none" class="btnAuto95 bg-black tx-white tx-center h30 d_inblock">공무원 ▶</a>
                    </li>
                    <li class="f_right">
                        <span class="willbes-Lec-Search">    
                            <div class="inputBox p_re">
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </span>
                    </li>
                </ul>                
            </div>
            <div class="LeclistTable pointTable">
                <table cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 50px;">
                        <col style="width: 70px;">
                        <col style="width: 90px;">
                        <col style="width: 90px;">
                        <col>
                        <col style="width: 60px;">
                        <col style="width: 60px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                        <col style="width: 85px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>나의응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>총점<span class="row-line">|</span></li></th>
                            <th>평균<span class="row-line">|</span></li></th>
                            <th>성적표<span class="row-line">|</span></li></th>
                            <th>부록</th>
                            <th>문제해설</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report">집계중</td>
                            <td class="w-file on tx-blue">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">공무원</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report tx-red">
                                <a href="{{ site_url('/home/html/statsTotalList') }}" onclick="window.open(this.href, '_blank', 'width=980, height=845, scrollbars=yes, resizable=yes' ); return false">[성적확인]</a>
                            </td>
                            <td class="w-file on tx-blue">
                                <a href="{{ site_url('/home/html/answerNote') }}" onclick="window.open(this.href, '_blank', 'width=980, height=845, scrollbars=yes, resizable=yes' ); return false">[오답노트]</a>                               
                            </td>
                            <td>
                                <a href="#none" onclick="openWin('EXAMPASS')">[문제/해설]</a> 
                            </td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">50</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">
                                <span class="tx-black">미제공</span>
                            </td>
                            <td>[문제/해설]</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">40</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">90</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">경행경채</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">60</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">50</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-t-grade">100</td>
                            <td class="w-average">40</td>
                            <td class="w-report tx-red">[성적확인]</td>
                            <td class="w-file on tx-blue">
                            <a href="{{ site_url('/home/html/answerNote') }}" onclick="window.open(this.href, '_blank', 'width=980, height=845, scrollbars=yes, resizable=yes' ); return false">[오답노트]</a>
                            </td>
                            <td>
                                <a href="#none" onclick="openWin('EXAMPASS')">[문제/해설]</a> 
                            </td>
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

        <div id="EXAMPASS" class="willbes-Layer-PassBox abs willbes-Layer-PassBox450 h460 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('EXAMPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">문제/해설</div> 
            <div class="lecMoreWrap pt20">
                <div class="LeclistTable">
                    <table cellspacing="0" cellpadding="0" class="listTable usertestTable examTable under-gray bdt-gray tx-gray GM">
                        <colgroup>
                            <col style="width: 33.33333333%;"/>
                            <col style="width: 33.33333333%;"/>
                            <col style="width: 33.33333333%;"/>
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="Top">과목</th>
                                <th>문제</th>
                                <th>해설</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="Top">국어</td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                            </tr>
                            <tr>
                                <td class="Top">영어</td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                            </tr>
                            <tr>
                                <td class="Top">한국사</td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                            </tr>
                            <tr>
                                <td class="Top">행정학</td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                            </tr>
                            <tr>
                                <td class="Top">사회</td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                                <td><a class="downBtn" href="#none">다운로드</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 문제/해설 -->
   
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop