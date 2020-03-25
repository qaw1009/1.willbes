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
            <span class="depth-Arrow">></span><strong>수강대기강좌</strong>
        </span>
    </div>
    <div class="Content p_re">   

        <div class="willbes-Mypage-ONLINEZONE c_both">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                    <tbody>
                        <tr>
                            <td>
                                <div class="Tit">수강시작일 설정</div>
                                <div class="Txt">
                                    - 수강시작일은 개강일전까지만 변경 가능합니다.(수강연장강좌는 시작일 변경이 불가능합니다.)<br/>
                                    - '시작일 변경(잔여횟수)'버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.</span><br/>
                                    - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
                                    - '수강시작'이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
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
                    <li><a href="#Mypagetab1" class="on">단강좌 (3)</a></li>
                    <li><a href="#Mypagetab2">패키지강좌 (2)</a></li>
                    <li><a href="#Mypagetab3">PASS강좌</a></li>
                    <li><a href="#Mypagetab4">관리자부여강좌 (2)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 820px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr>
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
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강시작 ></span></a>
                                            <a href="#none" onclick="openWin('STARTPASS')"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
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
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">강좌 정보가 없습니다.</td>
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
                        <div class="willbes-Lec-Table pt20 NG d_block">
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 820px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지222</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강시작 ></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-data tx-left pl10">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지333</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">강좌 정보가 없습니다.</td>
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
                                    <col style="width: 820px;">
                                    <col style="width: 120px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-data tx-left pl10">
                                            <div class="w-tit">
                                                <a href="{{ site_url('/home/html/mypage_pass2') }}">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox blueBox NSK">수강시작 ></span></a>
                                            <a href="#none" onclick="openWin('STARTPASS')"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-data tx-left pl10">
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">24강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>수강시작일 : <span class="tx-black">2018.10.20</span></dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="bBox whiteBox NSK">시작일변경(<span class="tx-light-blue">3</span>)</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tx-center">강좌 정보가 없습니다.</td>
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

        <div id="STARTPASS" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('STARTPASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">수강시작일 변경</div> 
            <div class="lecMoreWrap">
                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 수강시작일 설정</li>
                        <li class="txt">- 수강시작일은 개강일 전까지만 변경 가능합니다.</li>
                        <li class="txt">- '시작일변경' 버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지</span>만 변경이 가능합니다.</li>
                        <li class="txt">- 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.</li>
                        <li class="txt">- 수강시작이 이루어진 강좌는 시작일 변경이 불가능 합니다.</li>
                    </ul>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt40 mb15 tx-gray">· 수강시작일 변경</div>
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
                                            <div class="w-tit strong">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="w-tit bg-light-white strong">수강 시작일 변경</th>
                                        <td class="w-data tx-left pl15">
                                            <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">&nbsp; ~&nbsp; 
                                            <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">&nbsp;
                                            시작일 입력시, 종료일이 자동 변경됩니다
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="w-btn"><a class="answerBox_block NSK" href="#none" onclick="">변경</a></div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mb15 tx-gray">· 수강시작일 변경이력 <span class="w-info normal">( 잔여횟수 : <span class="strong tx-light-blue">1</span>회 <span class="row-line" style="height: 10px; margin: 0 6px -1px;">|</span> 잔여기간 : <span class="strong tx-light-blue">15</span>일 )</span></div>
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
                                        <th>수강시작일<span class="row-line">|</span></th>
                                        <th>변경일자<span class="row-line">|</span></th>
                                        <th>변경자</th>
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
                                        <td colspan="4">수강시작일 변경 이력이 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 수강시작일 변경 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop