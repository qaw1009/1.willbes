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
            <span class="depth-Arrow">></span><strong>특강&이벤트 신청현황</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-EVTZONE c_both">
            <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                · 특강&이벤트 신청현황
            </div>
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">특강&이벤트 신청현황</div>
                                - 특강/이벤트/설명회 페이지에서 '신청하기'버튼으로 직접 신청한 현황을 확인할 수 있습니다.(댓글등록제외)<br/>
                                - 특강&이벤트정보 클릭시 상세내용을 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-EVTZONE -->

        <div class="willbes-Leclist c_both mt60">
            <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                <span class="w-data">
                    기간검색 &nbsp;
                    <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30"> ~&nbsp; 
                    <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                </span>
                <span class="w-month">
                    <ul>
                        <li><a href="#none">전체</a></li>
                        <li><a class="on" href="#none">1개월</a></li>
                        <li><a href="#none">3개월</a></li>
                        <li><a href="#none">6개월</a></li>
                    </ul>
                </span>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30" style="width: 270px;">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="willbes-LecreplyList tx-gray c_both">
                → 총 <a class="num tx-light-blue strong" href="#none">2</a>건
                <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_right">
                    <select id="process" name="process" title="process" class="seleProcess f_left">
                        <option selected="selected">과정</option>
                        <option value="헌법">헌법</option>
                        <option value="스파르타반">스파르타반</option>
                        <option value="공직선거법">공직선거법</option>
                    </select>
                    <select id="academy" name="academy" title="academy" class="seleAcad ml10 f_left">
                        <option selected="selected">구분</option>
                        <option value="온라인">온라인</option>
                        <option value="학원">학원</option>
                    </select>
                    <select id="campus" name="campus" title="campus" class="seleCampus ml10 f_left">
                        <option selected="selected">캠퍼스</option>
                        <option value="캠퍼스1">캠퍼스1</option>
                        <option value="캠퍼스2">캠퍼스2</option>
                    </select>
                </span>
            </div>
            <div class="LeclistTable orderTable">
                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                    <colgroup>
                        <col style="width: 70px;">
                        <col style="width: 140px;">
                        <col style="width: 340px;">
                        <col style="width: 130px;">
                        <col style="width: 130px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>NO<span class="row-line">|</span></li></th>
                            <th colspan="2">특강&이벤트 정보<span class="row-line">|</span></li></th>
                            <th>진행일<span class="row-line">|</span></li></th>
                            <th>진행시간<span class="row-line">|</span></li></th>
                            <th>신청일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-no">3</td>
                            <td class="w-img">
                                <img src="{{ img_url('sample/evt1.jpg') }}">
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <dl class="w-info">
                                    <dt>
                                        경찰<span class="row-line">|</span>
                                        온라인
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">
                                    <a href="#none"><strong><span class="tx-light-blue">[이벤트]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                            </td>
                            <td class="w-day">2018.00.00</td>
                            <td class="w-time">
                                14:00~18:00<br/>
                                (1회차)
                            </td>
                            <td class="w-date">2018-00-00</td>
                        </tr>
                        <tr>
                            <td class="w-no">2</td>
                            <td class="w-img">
                                <img src="{{ img_url('sample/evt1.jpg') }}">
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <dl class="w-info">
                                    <dt>
                                        경찰<span class="row-line">|</span>
                                        온라인
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">
                                    <a href="#none"><strong><span class="tx-light-blue">[이벤트]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                            </td>
                            <td class="w-day">2018.00.00</td>
                            <td class="w-time">
                                14:00~18:00<br/>
                                (1회차)
                            </td>
                            <td class="w-date">2018-00-00</td>
                        </tr>
                        <tr>
                            <td class="w-no">1</td>
                            <td class="w-img">
                                <img src="{{ img_url('sample/evt1.jpg') }}">
                            </td>
                            <td class="w-data tx-left pl10"> 
                                <dl class="w-info">
                                    <dt>
                                        경찰<span class="row-line">|</span>
                                        온라인
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">
                                    <a href="#none"><strong><span class="tx-light-blue">[이벤트]</span> 이벤트/설명회/특강명이 노출됩니다.</strong></a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>접수기간 : 2018.04.02~2018.11.20</dt>
                                </dl>
                            </td>
                            <td class="w-day">2018.00.00</td>
                            <td class="w-time">
                                14:00~18:00<br/>
                                (1회차)
                            </td>
                            <td class="w-date">2018-00-00</td>
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

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop