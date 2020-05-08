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
            <span class="depth-Arrow">></span><strong>온라인강좌</strong>
            <span class="depth-Arrow">></span><strong>수강중강좌</strong>
        </span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div id="info1" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">일시정지신청</div>
                                <div class="Txt">
                                    - '일시정지(잔여횟수)' 버튼을 클릭하면 강좌별로 <span class="tx-red">최대 3회까지 가능</span>합니다.<br/>
                                    - 1회 일시정지 기간은 수강잔여일을 초과할 수 없으며, <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span><br/>
                                    - 일시정지된 강좌는 '일시정지강좌'에서 확인할 수 있습니다.<br/>
                                </div>

                                <div class="Tit pt20">수강연장</div>
                                <div class="Txt">
                                    - 수강연장된 강의는 일시정지를 신청할 수 없습니다.<br/>
                                    - '수강연장(잔여횟수)' 버튼을 클릭하면 강좌별로 최대 3회까지 연장이 가능합니다.<br/>
                                    - <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span><br/>
                                    - 수강연장은 수강 종료일 전까지만 신청이 가능하며 5일 단위(5일, 10일 15일 등)로 신청할 수 있습니다.<br/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div id="info2" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">패키지강좌</div>
                                <div class="Txt">
                                    - 패키지 강좌는 강의시작일 설정, 일시중지, 강의연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div id="info3" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">무료강좌</div>
                                <div class="Txt">
                                    - 무료강좌는 수강일변경, 일시정지, 수강연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div id="info4" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re" style="display: none;">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">관리자부여강좌</div>
                                <div class="Txt">
                                    - 관리자부여강좌는 무상 혜택으로 지급된 강좌이므로 수강일변경, 일시정지, 수강연장 기능이 제공되지 않습니다.<br/>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>
        <!-- willbes-Mypage-ONLINEZONE -->

        <div class="willbes-Mypage-Tabs mt40">
            <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                <select id="process" name="process" title="process" class="seleProcess">
                    <option selected="selected">과정</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="lec" name="lec" title="lec" class="seleLec">
                    <option selected="selected">과목</option>
                    <option value="헌법">헌법</option>
                    <option value="스파르타반">스파르타반</option>
                    <option value="공직선거법">공직선거법</option>
                </select>
                <select id="Prof" name="Prof" title="Prof" class="seleProf">
                    <option selected="selected">교수님</option>
                    <option value="정채영">정채영</option>
                    <option value="기미진">기미진</option>
                    <option value="김세령">김세령</option>
                </select>
                <select id="Laststudy" name="Laststudy" title="Laststudy" class="seleStudy">
                    <option selected="selected">최종학습일순</option>
                    <option value="최근추가순">최근추가순</option>
                    <option value="종료임박순">종료임박순</option>
                </select>
                <div class="willbes-Lec-Search GM f_right">
                    <div class="inputBox p_re">
                        <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                        <button type="submit" onclick="" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="DetailWrap c_both">
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" onclick="openTxt('info1')" class="on">단강좌 (3)</a></li>
                    <li><a href="#Mypagetab2" onclick="openTxt('info2')">패키지강좌 (2)</a></li>
                    <li><a href="#Mypagetab3" onclick="openTxt('info3')">무료강좌 (3)</a></li>
                    <li><a href="#Mypagetab4" onclick="openTxt('info4')">관리자부여강좌 (복습동영상) (4)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 700px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none" onclick="openWin('EXTRAPASS')"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none" onclick="openWin('STOPPASS')"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
                    <div id="Mypagetab2" class="tabLink">
                        <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 820px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr class="bg-light-blue">
                                        <td class="w-data tx-left pl30">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt class="MoreBtn"><a href="#none">강좌 열기 ▼</a></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 700px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr class="replyTxt">
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt">
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">25%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 (교육행정대비) 한덕현 제니스 영어 실전 동형모의고사 (4-5월)</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강연장(3)</span></a>
                                            <a href="#none"><span class="bBox whiteBox NSK">일시정지(<span class="tx-light-blue">3</span>)</span></a>
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
                    <div id="Mypagetab3" class="tabLink">
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 820px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
                    <div id="Mypagetab4" class="tabLink">
                        <div class="PassCurriBox CurrLineiBox">
                            <dl class="w-info tx-gray">
                                <dt><a href="#none">단강좌</a></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt><a href="#none">패키지</a></dt>
                            </dl>
                        </div>
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 820px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}"><span class="tx-red">[0원결제]</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">55%</span>
                                        </td>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none"><span class="tx-red">[제휴사결제]</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
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
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="STOPPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('STOPPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">일시정지</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 일시정지 신청</li>
                        <li class="txt">- 일시정지는 강좌별로 <span class="tx-red">최대 3회</span>까지 가능합니다.</li>
                        <li class="txt">- 1회 일시정지 기간은 수강잔여일을 초과할 수 없습니다.</li>
                        <li class="txt">- <span class="tx-red">일시정지기간의 총합은 수강기간을 초과할 수 없습니다.</span></li>
                        <li class="txt">- '일시정지된 강좌는 일시정지강좌' 에서 확인할 수 있습니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt40 mb15 tx-gray">· 일시정지 신청</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 135px;">
                                    <col style="width: 565px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">강의정보</th>
                                        <td class="w-data tx-left pl15">
                                            <dl class="w-info strong">
                                                <dt>
                                                    영어<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                                                    한덕현교수님
                                                </dt>
                                            </dl><br>
                                            <div class="w-tit strong">2018 (교육행정대비) 9급 단원별 실전 동형모의고사 PACK</div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">일시정지기간</th>
                                        <td class="w-data tx-left pl15">
                                            <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">&nbsp; ~&nbsp; 
                                            <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">&nbsp;
                                            [변경수강기간] 2018.00.00~2018.00.00
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a></div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 일시정지 이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 270px;">
                                    <col style="width: 170px;">
                                    <col style="width: 160px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>회차<span class="row-line">|</span></th>
                                        <th>일시정지기간<span class="row-line">|</span></th>
                                        <th>신청일자<span class="row-line">|</span></th>
                                        <th>신청자</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-num">1차</td>
                                        <td class="w-day">2018.00.00 ~ 2018.00.00</td>
                                        <td class="w-modify-day">2018.00.00</td>
                                        <td class="w-user">회원명</td>
                                    </tr>
                                    <tr>
                                        <td class="w-num">2차</td>
                                        <td class="w-day">2018.00.00 ~ 2018.00.00</td>
                                        <td class="w-modify-day">2018.00.00</td>
                                        <td class="w-user">회원명</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">일시정지 이력이 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 일시정지 -->

        <div id="EXTRAPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('EXTRAPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">수강연장</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 수강연장</li>
                        <li class="txt">- 수강연장된 강의는 일시정지를 신청할 수 없습니다.</li>
                        <li class="txt">- 강좌별로 <span class="tx-red">최대3회까지</span>만 가능하며, <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span></li>
                        <li class="txt">- 수강연장은 종료일까지만 신청이 가능하며 5일단위(5일, 10일, 15일)로 신청할 수 있습니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt40 mb15 tx-gray">· 수강연장 신청</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 135px;">
                                    <col style="width: 565px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">강의정보</th>
                                        <td class="w-data tx-left pl15">
                                            <dl class="w-info strong">
                                                <dt>
                                                    영어<span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span>
                                                    한덕현교수님
                                                </dt>
                                            </dl><br>
                                            <div class="w-tit strong">2018 (교육행정대비) 9급 단원별 실전 동형모의고사 PACK</div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">연장일수</th>
                                        <td class="w-data tx-left pl15">
                                            <select id="day" name="day" title="day" class="seleDay" style="width: 60px; height: 20px;">
                                                <option selected="selected">5일</option>
                                                <option value="10일">10일</option>
                                                <option value="15일">15일</option>
                                                <option value="20일">20일</option>
                                                <option value="25일">25일</option>
                                                <option value="30일">30일</option>
                                                <option value="35일">35일</option>
                                                <option value="40일">40일</option>
                                            </select>&nbsp; 일 &nbsp;
                                            [연장수강종료일] 2018-00-00
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">결제금액</th>
                                        <td class="w-data tx-left pl15">10,000원</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">신청</a></div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 수강연장 이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 270px;">
                                    <col style="width: 170px;">
                                    <col style="width: 160px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>회차<span class="row-line">|</span></th>
                                        <th>연장수강 종료일(연장일수)<span class="row-line">|</span></th>
                                        <th>신청일자<span class="row-line">|</span></th>
                                        <th>신청자</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-num">1차</td>
                                        <td class="w-day">2018.00.00(5일)</td>
                                        <td class="w-modify-day">2018.00.00</td>
                                        <td class="w-user">회원명</td>
                                    </tr>
                                    <tr>
                                        <td class="w-num">2차</td>
                                        <td class="w-day">2018.00.00(5일)</td>
                                        <td class="w-modify-day">2018.00.00</td>
                                        <td class="w-user">회원명</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">수강연장 이력이 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 수강연장 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop