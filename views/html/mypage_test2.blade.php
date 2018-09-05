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
            <span class="depth-Arrow">></span><strong>온라인모의고사 응시</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-TESTZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 온라인모의고사 응시
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                - 온라인 응시기간 및 지정된 시간에만 응시가 가능하오니 시험기간을 엄수해 주세요.<br/>
                                - 임의로 시험을 중단하거나 임시저장만 한 상태에서 시험 종료 시, 시험결과를 확인할 수 없습니다.<br/>
                                - 모의고사 응시 창에서 응시 후, 답안지는 모두 체크하셔야 답안 제출이 가능합니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-TESTZONE -->

        <div class="willbes-Leclist c_both mt60">
            <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                → 총 <a class="num tx-light-blue strong" href="#none">4</a>건
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <div class="willbes-Lec-Search GM f_right">
                        <select id="all" name="all" title="all" class="seleAll mr10 h30 f_left">
                            <option selected="selected">응시상태</option>
                            <option value="미확인쪽지">미응시</option>
                            <option value="확인쪽지">응시완료</option>
                        </select>
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </span>
            </div>
            <div class="LeclistTable pointTable">
                <table cellspacing="0" cellpadding="0" class="listTable testTable under-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 60px;">
                        <col style="width: 70px;">
                        <col style="width: 90px;">
                        <col style="width: 120px;">
                        <col style="width: 280px;">
                        <col style="width: 90px;">
                        <col style="width: 130px;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>No<span class="row-line">|</span></li></th>
                            <th>과정<span class="row-line">|</span></li></th>
                            <th>응시분야<span class="row-line">|</span></li></th>
                            <th>시험응시일<span class="row-line">|</span></li></th>
                            <th>모의고사명<span class="row-line">|</span></li></th>
                            <th>응시상태<span class="row-line">|</span></li></th>
                            <th>나의응시일<span class="row-line">|</span></li></th>
                            <th>응시하기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">8</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list"><a href="#none" onclick="openWin('MEMOPASS')">7/2 전국모의고사-일방경찰</a></td>
                            <td class="w-state">미응시</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">응시하기</a></td>
                        </tr>
                        <tr>
                            <td class="w-no">7</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10~</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">응시하기</a></td>
                        </tr>
                        <tr>
                            <td class="w-no">6</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">상시</td>
                            <td class="w-list">8/13 빅매지2-경행경채 모의고사</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">5</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">4</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-process">경찰</td>
                            <td class="w-type">일반경찰</td>
                            <td class="w-date">2018-10-10</td>
                            <td class="w-list">7/2 전국모의고사-일방경찰</td>
                            <td class="w-state">응시완료</td>
                            <td class="w-dday">2018-10-10</td>
                            <td class="w-btn tx-red">응시마감</td>
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
            <div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h590">
                <a class="closeBtn" href="#none" onclick="closeWin('MEMOPASS')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">쪽지</div> 

                <div class="lecMoreWrap">

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