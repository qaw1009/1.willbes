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
            <span class="depth-Arrow">></span><strong>무한PASS존</strong>
        </span>
    </div>

    <div class="Content p_re">       

        <div class="willbes-Mypage-PASSZONE">
            <div class="d_block">
                <div class="willbes-listTable widthAuto550 f_left">
                    <div class="will-Tit NSK">무한 PASS <span class="tx-light-blue">공지사항</span> <a class="f_right" href="#none" onclick="openWin('MyPass')"><img src="{{ img_url('prof/icon_add.png') }}"></a></div>
                    <ul class="List-Table GM tx-gray">
                        <li><a href="#none">3월 무이자카드안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">3월 31일(금) 새벽시스템점검안내</a><span class="date">2018-04-01</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                        <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>   
                        <li>등록된 공지 내용이 없습니다.</li>
                    </ul>
                </div>
                <div class="willbes-listTable widthAuto365 f_right">
                    <div class="will-Tit NSK bd-none">Hot <span class="tx-light-blue">Issue</span></div>
                    <div class="hotissueBn"></div>
                </div>
            </div>
            
            <div class="c_both willbes-Lec-Table NG d_block pt25">
                <div class="willbes-PASS-Line bg-blue">
                    이용중인 PASS (2)
                    <div class="f_right NG mt10 mr10">
                        <ul>
                            <li class="InfoBtn ml10"><a href="#none" onclick="openWin('MorePASS')">PASS 이용안내 <span>▶</span></a></li>
                            <li class="InfoBtn ml10"><a href="#none" onclick="openWin('MyTablets')">등록기기정보 <span>▶</span></a></li>                            
                        </ul>
                    </div>
                </div>
                <div class="will-Tit-Zone c_both">
                    <div class="will-Tit NG f_left">· 무한PASS선택</div>
                    <span class="willbes-Lec-Selected GM tx-gray" style="float: inherit">
                        <select id="process" name="process" title="process" class="seleProcess">
                            <option selected="selected">과정</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <select id="name" name="name" title="name" class="seleName">
                            <option selected="selected">무한 PASS명</option>
                            <option value="PASS1">PASS1</option>
                            <option value="PASS2">PASS2</option>
                            <option value="PASS3">PASS3</option>
                        </select>
                    </span>
                </div>
                <table cellspacing="0" cellpadding="0" class="lecTable PassZoneTable">
                    <colgroup>
                        <col style="width: 770px;">
                        <col style="width: 170px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="#none">윌비스 페트라 PASS 7기 (1년)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>[수강기간] <span class="tx-blue">2018.10.20 ~ 2018.11.20</span> <span class="tx-black">(잔여기간<span class="tx-pink">100일</span>)</span></dt>
                                </dl>
                            </td>
                            <td class="w-lec">
                                <div class="tx-gray">수강중인 강좌수</div>
                                <div class="w-sj"><span class="tx-blue">10강좌</span> / 100강좌</div>
                                <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="openWin('MoreLec')">강좌추가</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="#none">윌비스 페트라 PASS 7기 (1년)</a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>[수강기간] <span class="tx-blue">2018.10.20 ~ 2018.11.20</span> <span class="tx-black">(잔여기간<span class="tx-pink">100일</span>)</span></dt>
                                </dl>
                            </td>
                            <td class="w-lec">
                                <div class="tx-gray">수강중인 강좍 없습니다.</div>
                                <div class="w-sj">강좌를 추가해 주세요.</div>
                                <div class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none">강좌추가</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Mypage-PASSZONE -->

        <div class="willbes-Mypage-Tabs mt70">
            <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
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
                <select id="study" name="study" title="study" class="seleStudy">
                    <option selected="selected">학습유형</option>
                    <option value="유형1">유형1</option>
                    <option value="유형2">유형2</option>
                    <option value="유형3">유형3</option>
                </select>
                <select id="date" name="date" title="date" class="seleDate">
                    <option selected="selected">최종학습일순</option>
                    <option value="1일">1일</option>
                    <option value="2일">2일</option>
                    <option value="3일">3일</option>
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
                <div class="aBox passBox answerBox_block NSK f_right"><a href="#none" onclick="openWin('MoreBook')">교재구매</a></div>
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" class="on">즐겨찾기강좌 (2)</a></li>
                    <li><a href="#Mypagetab2">수강중강좌 (10)</a></li>
                    <li><a href="#Mypagetab3">수강완료강좌 (3)</a></li>
                    <li><a href="#Mypagetab4">숨긴강좌 (5)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="Mypagetab1" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▲</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
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
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">82%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                        <td class="w-answer"><a href="#none"><span class="aBox passBox waitBox NSK">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">즐겨찾기 강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab2" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                </div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_on.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <span class="w-chk-st"><a href="#none"><img src="{{ img_url('mypage/icon_star_off.png') }}"></a></span>
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨기기</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강중강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div id="Mypagetab3" class="tabLink">
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[사회] 정채영</a></li>
                                                <li><a href="#none">[형사법] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[영어] 이현나</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer" style="display: none;"><a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a></div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 120px;">
                                    <col style="width: 735px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">80%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
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
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">95%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox answerBox_block NSK">후기등록</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">수강종료강좌 정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="Mypagetab4" class="tabLink">   
                        <div class="PassCurriBox CurriBox">
                            <span class="MoreBtn NG"><a href="#none">즐찾과목/교수전체보기 ▼</a></span>
                            <table cellspacing="0" cellpadding="0" class="curriTable" style="display: none;">
                                <colgroup>
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th class="tx-gray">전체보기</th>
                                        <td colspan="9">
                                            <ul class="curriSelect">
                                                <li><a href="#none">[국어] 정채영</a></li>
                                                <li><a href="#none">[영어] 기미진</a></li>
                                                <li><a href="#none">[사회] 김세령</a></li>
                                                <li><a href="#none">[형사법] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 정채영</a></li>
                                                <li><a href="#none">[사회] 기미진</a></li>
                                                <li><a href="#none">[영어] 김세령</a></li>
                                                <li><a href="#none">[사회] 오대혁</a></li>
                                                <li><a href="#none">[형사법] 이현나</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="willbes-Lec-Table NG d_block">
                            <div class="PASSZONE-Btn">
                                <div class="w-answer">
                                    <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                </div>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                <colgroup>
                                    <col style="width: 55px;">
                                    <col style="width: 120px;">
                                    <col style="width: 680px;">
                                    <col style="width: 85px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    국어<span class="row-line">|</span>
                                                    정채영교수님
                                                    <span class="NSK ml15 nBox n2">진행중</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>강의수 : <span class="tx-black">10강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-percent">진도율<br/>
                                            <span class="tx-blue">77%</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            <dl class="w-info">
                                                <dt>
                                                    영어<span class="row-line">|</span>
                                                    한덕현교수님
                                                    <span class="NSK ml15 nBox n4">완강</span>
                                                </dt>
                                            </dl><br/>
                                            <div class="w-tit">
                                                <a href="#none">2018 (교육행정대비) 한덕현 제니스 영어 실전 동형모의고사 (4-5월)</a>
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>최종학습일 : <span class="tx-black">2018.10.20</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>강의수 : <span class="tx-black">12강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>잔여기간 : <span class="tx-blue">50일</span>(2018.04.02~2018.11.20)</dt>
                                            </dl>
                                        </td>
                                        <td class="w-answer">
                                            <a href="#none"><span class="aBox passBox waitBox NSK">숨김해제</span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="tx-center">숨긴강좌정보가 없습니다.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->

        <div id="MoreLec" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h1100 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MoreLec')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">강좌추가</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAuto770">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li>· '무한PASS존'에서 수강하기 위한 강좌를 추가하는 메뉴입니다.</li>
                        <li>· '수강할 강좌 검색' 후 체크박스를 클릭하시면, 우측 '강좌 선택내역'에 선택한 강좌가 추가됩니다.</li>
                        <li>· '강좌선택내역'에서 강좌 확인 후 '강좌추가' 버튼을 클릭하면 수강이 가능합니다.</li>
                        <li>·  강좌명 클릭시 '강좌상세정보' 영역에서 정보를 확인할 수 있습니다.</li>
                    </ul>
                    <div class="willbes-Lec-Selected tx-gray">
                        <div class="willbes-Lec-Selected-Grid">
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
                            <select id="study" name="study" title="study" class="seleStudy">
                                <option selected="selected">학습유형</option>
                                <option value="유형1">유형1</option>
                                <option value="유형2">유형2</option>
                                <option value="유형3">유형3</option>
                            </select>
                            <div class="willbes-Lec-Search GM f_right">
                                <div class="inputBox p_re">
                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명" maxlength="30">
                                    <button type="submit" onclick="" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                                <div class="subBtn f_right"><a href="#none">초기화</a></div>
                            </div>
                        </div>
                        <div class="Search-Result">
                            <div class="Total">총 100건</div>
                            <div class="chkBox">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"> 수강중강좌 제외
                            </div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Wrap">
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 5%;">
                                    <col style="width: 15%;">
                                    <col style="width: 10%;">
                                    <col style="width: 15%;">
                                    <col >
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><span class="row-line">|</span></th>
                                        <th>과목명<span class="row-line">|</span></th>
                                        <th>교수명<span class="row-line">|</span></th>
                                        <th>학습유형<span class="row-line">|</span></th>
                                        <th>강좌명</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어 국어 국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월) 국어[현대] 문학종결자 문학 집중강의 (5월-6월) 국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo">
                                        <td colspan="5">
                                            <div class="lecDetailWrap p_re mt30 mb60">
                                                <ul class="tabWrap tabDepth2">
                                                    <li><a href="#ch1" class="on">강좌상세정보</a></li>
                                                    <li><a href="#ch2">강좌목차</a></li>
                                                </ul>
                                                <div class="w-btn">
                                                    <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">현재 강좌추가</a>
                                                </div>
                                                <div class="tabBox mt30">
                                                    <div id="ch1" class="tabLink">
                                                        <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 105px;">
                                                                <col width="*">
                                                            </colgroup>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">
                                                                        강좌유의사항<br>
                                                                        <span class="tx-red">(필독)</span>
                                                                    </td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌소개</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌특징</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ch2" class="tabLink">
                                                        <div class="LeclistTable">
                                                            <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                                                                <colgroup>
                                                                    <col style="width: 50px;">
                                                                    <col style="width: 365px;">
                                                                    <col style="width: 120px;">
                                                                </colgroup>
                                                                <thead>
                                                                    <tr>
                                                                        <th>No<span class="row-line">|</span></th>
                                                                        <th>강의명<span class="row-line">|</span></th>
                                                                        <th>강의시간</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w-no">1강</td>
                                                                        <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                                                                        <td class="w-time">50분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">2강</td>
                                                                        <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                                                                        <td class="w-time">40분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">3강</td>
                                                                        <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                                                                        <td class="w-time">30분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">4강</td>
                                                                        <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                                                                        <td class="w-time">20분</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo">
                                        <td colspan="5">
                                            <div class="lecDetailWrap p_re mt30 mb60">
                                                <ul class="tabWrap tabDepth2">
                                                    <li><a href="#ch3" class="on">강좌상세정보</a></li>
                                                    <li><a href="#ch4">강좌목차</a></li>
                                                </ul>
                                                <div class="w-btn">
                                                    <a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">현재 강좌추가</a>
                                                </div>
                                                <div class="tabBox mt30">
                                                    <div id="ch3" class="tabLink">
                                                        <table cellspacing="0" cellpadding="0" class="classTable under-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 105px;">
                                                                <col width="*">
                                                            </colgroup>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">
                                                                        강좌유의사항<br>
                                                                        <span class="tx-red">(필독)</span>
                                                                    </td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌소개</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="w-list bg-light-white">강좌특징</td>
                                                                    <td class="w-data tx-left pl25">
                                                                        LMS &gt; 상품관리&gt; [온라인]상품관리&gt; 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br>
                                                                        자동출력됩니다. (온라인상품기준)
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div id="ch4" class="tabLink">
                                                        <div class="LeclistTable">
                                                            <table cellspacing="0" cellpadding="0" class="listTable upper-black under-gray tx-gray">
                                                                <colgroup>
                                                                    <col style="width: 50px;">
                                                                    <col style="width: 365px;">
                                                                    <col style="width: 120px;">
                                                                </colgroup>
                                                                <thead>
                                                                    <tr>
                                                                        <th>No<span class="row-line">|</span></th>
                                                                        <th>강의명<span class="row-line">|</span></th>
                                                                        <th>강의시간</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w-no">1강</td>
                                                                        <td class="w-list tx-left pl20">1강 03월 05일 : 모의고사 1회</td>
                                                                        <td class="w-time">50분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">2강</td>
                                                                        <td class="w-list tx-left pl20">2강 03월 05일 : 모의고사 2회</td>
                                                                        <td class="w-time">40분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">3강</td>
                                                                        <td class="w-list tx-left pl20">3강 03월 05일 : 모의고사 3회</td>
                                                                        <td class="w-time">30분</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="w-no">4강</td>
                                                                        <td class="w-list tx-left pl20">4강 03월 12일 : 모의고사 4회</td>
                                                                        <td class="w-time">20분</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>aa</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>bb</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>cc</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>dd</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>ee</td></tr>
                                    <tr class="replyList passzone-Leclist">
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-sbj">국어</td>
                                        <td class="w-prof">정채영</td>
                                        <td class="w-type">문제풀이</td>
                                        <td class="w-info passzone">
                                            <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                            <dl class="w-info">
                                                <dt>강의수 : 70강</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-black"><a href="#none"><img src="{{ img_url('sub/icon_detail.gif') }}" style="margin: -4px 5px 0 0;">강좌상세정보</a></dt>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr class="replyTxt passzone-Lecinfo"><td>ff</td></tr>
                                </tbody>
                            </table>
                        </div>
                    
                    </div>
                </div>
                <!-- PASSZONE-List -->

                <div class="PASSZONE-Add widthAuto260">
                    <div class="Tit tx-light-black NG">강좌선택내역</div>
                    <div class="PASSZONE-Add-Grid">
                        <ul class="passzoneInfo tx-gray NGR none">
                            <li>· 선택된 강좌 확인 후 '강좌추가' 버튼을 클릭하면 '무한PASS존 > 수강중강좌탭'에 강좌가 추가됩니다.</li>
                            <li>· 강좌추가후 '교재구매' 버튼 클릭시 추가한 강좌(수강중강좌)에 대한 교재를 구매할 수 있습니다.</li>
                        </ul>
                        <div class="Search-Result">
                            <div class="Total">총 4건</div>
                            <ul class="chkBox">
                                <li class="w-btn"><a class="answerBox_block NSK" href="#none" onclick="">교재구매</a></li>
                                <li class="w-btn"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="">강좌추가</a></li>
                            </ul>
                        </div>
                        <div class="PASSZONE-Lec-Grid">
                            <div class="LeclistTable">
                                <table cellspacing="0" cellpadding="0" class="listTable under-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 25px;">
                                        <col style="width: 175px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-light-blue">완강</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="btnClose"><a href="#none"><img src="{{ img_url('sub/icon_delete.gif') }}"></a></td>
                                            <td class="w-info passzone">
                                                <dl class="w-info">
                                                    <dt>국어</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정채영</dt>
                                                </dl><br/>
                                                <div class="w-tit tx-left">국어[현대] 문학종결자 문학 집중강의 (5월-6월)</div>
                                                <dl class="w-info">
                                                    <dt>강의수 : 40강</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>진행여부 : <span class="tx-red">진행중</span></dt>
                                                </dl>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-Add -->

            </div>

        </div>
        <!-- willbes-Layer-PassBox : 강좌추가 -->

        <div id="MoreBook" class="willbes-Layer-PassBox willbes-Layer-PassBox800 h1100 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MoreBook')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">무한PASS 교재구매</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li>· 무한PASS로 수강중인 강좌에 제공되는 교재를 구매하실 수 있습니다. (<span class="tx-red">‘수강중강좌’ 교재만 구매가능</span>)</li>
                    </ul>
                    <div class="willbes-Lec-Selected willbes-Pass-Selected tx-gray">
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
                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="교재명 또는 강좌명을 입력해 주세요." maxlength="30">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="LeclistTable LeclistPASSTable">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 70px;">
                                    <col style="width: 410px;">
                                    <col style="width: 70px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="tx-left" colspan="5">
                                            국어<span class="row-line">|</span>정채영<br/>
                                            <div class="w-tit tx-left strong">2018 정채영 국어 [현대문학] 137작품을 알려주마! (5월-6월)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">주교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-light-blue">[판매중]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">부교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-red">[품절]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable passTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 70px;">
                                    <col style="width: 410px;">
                                    <col style="width: 70px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th class="tx-left" colspan="5">
                                            국어<span class="row-line">|</span>정채영<br/>
                                            <div class="w-tit tx-left strong">2018 정채영 국어 [현대문학] 137작품을 알려주마! (5월-6월)</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">주교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-light-blue">[판매중]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-type"><span class="tx-light-blue">부교재</span></td>
                                        <td class="w-tit tx-left pl20">2018 정채영 국어 마무리 시리즈 [문학편]_ 137작품을 알려주마</td>
                                        <td class="w-buy"><span class="tx-red">[품절]</span></td>
                                        <td class="w-price">30,000원 (<span class="tx-red">↓10%</span>)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="Search-Result strong mt40 mb20 tx-gray">· 선택교재</div>
                        <div class="LeclistTable LeclistPASSTableRow">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 550px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>삭제<span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가</th>
                                    </tr>
                                </thead>
                            </table>
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select overflow under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 550px;">
                                    <col style="width: 140px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                    <tr>
                                        <td class="btnClose"><a href="#none"><img src="/public/img/willbes/sub/icon_delete.gif"></a></td>
                                        <td class="w-tit tx-left pl60">2018 정채영 국어 마무리 시리즈[문학편]_137 작품을 알려주마 (제2판)</td>
                                        <td class="w-price">70,000원</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="cart-PriceBox NG">
                            <li class="price-list p_re">
                                <dl class="priceBox">
                                    <dt>
                                        <div>상품주문금액</div>
                                        <div class="price tx-light-blue">140,000원</div>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="/public/img/willbes/sub/icon_plus.gif">
                                    </dt>
                                    <dt>
                                        <div>배송료</div>
                                        <span class="price tx-light-blue">2,500원</span>
                                    </dt>
                                </dl>
                            </li>
                            <li class="price-total">
                                <div>최종결제금액</div>
                                <span class="price tx-light-blue">188,600원</span>
                            </li>
                        </ul>
                        <div class="willbes-Lec-buyBtn">
                            <ul>
                                <li class="btnAuto95 h30">
                                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">장바구니</span>
                                    </button>
                                </li>
                                <li class="btnAuto95 h30">
                                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                                        <span>바로결제</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 무한PASS 교재구매 -->

        <div id="MorePASS" class="willbes-Layer-PassBox willbes-Layer-PassBox990 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MorePASS')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">PASS 이용안내</div> 

            <div class="passinfoWrap">
                <div class="widthAutoFull">
                    <ul class="passinfoTab">
                        <li><a href="#tab01" class="on">수강권 확인</a></li>
                        <li><a href="#tab02">강좌선택</a></li>
                        <li><a href="#tab03">강의수강</a></li>
                        <li><a href="#tab04">교재구매</a></li>
                        <li><a href="#tab05">등록기기 정보 확인</a></li>
                    </ul>
                    <div id="tab01" class="passinfoCts">
                        <img src="{{ img_url('mypage/passinfo01.jpg') }}" alt="수강권 확인">
                    </div>
                    <div id="tab02" class="passinfoCts">
                        <img src="{{ img_url('mypage/passinfo02.jpg') }}" alt="강좌선택">
                    </div>
                    <div id="tab03" class="passinfoCts">
                        <img src="{{ img_url('mypage/passinfo03.jpg') }}" alt="강의수강">
                    </div>
                    <div id="tab04" class="passinfoCts">
                        <img src="{{ img_url('mypage/passinfo04.jpg') }}" alt="교재구매">
                    </div>
                    <div id="tab05" class="passinfoCts">
                        <img src="{{ img_url('mypage/passinfo05.jpg') }}" alt="등록기기 정보 확인">
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 패스 이용안내 -->

        <div id="MyTablets" class="willbes-Layer-PassBox willbes-Layer-PassBox800 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MyTablets')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">등록기기정보</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">
                    <ul class="passzoneInfo tx-gray NGR">
                        <li class="tit strong">· 기기등록 유의사항</li>
                        <li class="txt">- MAC Address란 컴퓨터 내부에 장착된 LAN 카드 고유의 일련번호를 말합니다.</li>
                        <li class="txt tx-red">- MAC Address는 PC/모바일 제한없이 최대 2대까지 등록이 가능합니다.</li>
                        <li class="txt">- 기기정보는 수강신청후 강의시청 시 자동으로 저장됩니다.</li>
                        <li class="tit strong mt30">· 등록기기 초기화(삭제)유의사항</li>
                        <li class="txt">- 초기화(삭제)는 기기불량 등으로 인한 제품변경이나 A/S를 받은 경우,기기를 새로 구매한 경우 이용해 주시기 바랍니다. </li>
                        <li class="txt">- 부득이하게 등록된 컴퓨터나 스마트기기의 변경을 원하실 경우, 고객센터(1544-5006)로 전화주시기 바랍니다. (3회제한)</li>
                        <li class="txt">- 회원님께서 직접 등록기기 초기화(삭제)(MAC Address 초기화)를 하실 수 있으며, <span class="tx-red">직접 초기화(삭제) 횟수는 1회로 제한됩니다.<br>
                        * 직접 초기화(1회)를 이용하지 않고 회원이 고객센터에 초기화 요청하여 진행하였을 경우 직접초기화 1회는 소멸됩니다.</span></li>
                        <li class="txt">- 수강중인 강좌가 없거나 현재 수강중인 강좌가 있어도 등록기기 초기화가 가능합니다.</li>
                    </ul>
                    <div class="PASSZONE-User-Tablets NG">
                        <ul>
                            <li>
                                <dl>
                                    <dt class="w-tit">기기등록현황</dt>
                                    <dt>PC 1대 + 모바일 1대</dt>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="w-tit">초기화가능횟수 : <span class="tx-red">1</span>회</dt>
                                    <dt style="margin: 0;"><span class="row-line">|</span></dt>
                                    <dt>총초기화(삭제)횟수 : 10회</dt>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="PASSZONE-Lec-Section">
                        <div class="Search-Result strong mt25 mb10 tx-gray">· 기기등록 / 초기화(삭제) 내역</div>
                        <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray h42 mb10">
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
                        </div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 70px;">
                                    <col style="width: 270px;">
                                    <col style="width: 120px;">
                                    <col style="width: 90px;">
                                    <col style="width: 110px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>구분<span class="row-line">|</span></th>
                                        <th>기기정보(MAC Address)<span class="row-line">|</span></th>
                                        <th>등록일시<span class="row-line">|</span></th>
                                        <th>삭제자<span class="row-line">|</span></th>
                                        <th>삭제일<span class="row-line">|</span></th>
                                        <th>직접초기화</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-eq">PC</td>
                                        <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                                        <td class="w-update-day">2018.00.00 00:00</td>
                                        <td class="w-user">관리자명</td>
                                        <td class="w-delete-day">2018.00.00 00:00</td>
                                        <td class="w-reset tx-light-blue"><a href="#none">초기화</a></td>
                                    </tr>
                                    <tr>
                                        <td class="w-eq">모바일</td>
                                        <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                                        <td class="w-update-day">2018.00.00 00:00</td>
                                        <td class="w-user">관리자명</td>
                                        <td class="w-delete-day">2018.00.00 00:00</td>
                                        <td class="w-reset">불가</td>
                                    </tr>
                                    <tr>
                                        <td class="w-eq">PC</td>
                                        <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                                        <td class="w-update-day">2018.00.00 00:00</td>
                                        <td class="w-user">관리자명</td>
                                        <td class="w-delete-day">2018.00.00 00:00</td>
                                        <td class="w-reset">불가</td>
                                    </tr>
                                    <tr>
                                        <td class="w-eq">모바일</td>
                                        <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                                        <td class="w-update-day">2018.00.00 00:00</td>
                                        <td class="w-user">관리자명</td>
                                        <td class="w-delete-day">2018.00.00 00:00</td>
                                        <td class="w-reset">불가</td>
                                    </tr>
                                    <tr>
                                        <td class="w-eq">PC</td>
                                        <td class="w-tit">33C07FA1-7E23-4613-8F69-8C0D445985AA</td>
                                        <td class="w-update-day">2018.00.00 00:00</td>
                                        <td class="w-user">관리자명</td>
                                        <td class="w-delete-day">2018.00.00 00:00</td>
                                        <td class="w-reset">불가</td>
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
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 등록기기정보 -->

        <div id="MyPass" class="willbes-Layer-PassBox willbes-Layer-PassBox800 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MyPass')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">무한 PASS 공지사항</div> 

            <div class="lecMoreWrap">

                <div class="PASSZONE-List widthAutoFull">        
                    <div class="PASSZONE-Lec-Section">                        
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 110px;">
                                    <col>
                                    <col style="width: 65px;">
                                    <col style="width: 100px;">
                                    <col style="width: 90px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No<span class="row-line">|</span></th>
                                        <th>캠퍼스<span class="row-line">|</span></th>
                                        <th>제목<span class="row-line">|</span></th>
                                        <th>첨부<span class="row-line">|</span></th>
                                        <th>작성일<span class="row-line">|</span></th>
                                        <th>조회수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                        <td class="w-campus">공통</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">123</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no"><img src="{{ img_url('prof/icon_HOT.gif') }}"></td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"></a>
                                        </td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">244</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">10</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">355</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">9</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">466</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">8</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">355</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">7</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">466</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">6</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">355</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">5</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">466</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">4</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">355</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">3</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">466</td>
                                    </tr>
                                    <tr>
                                        <td class="w-no">2</td>
                                        <td class="w-campus">스파르타반</td>
                                        <td class="w-list tx-left pl20"><a href="#none">[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</a></td>
                                        <td class="w-file">&nbsp;</td>
                                        <td class="w-date">2018-00-00</td>
                                        <td class="w-click">355</td>
                                    </tr>
                                    <tr>
                                        <td class="w-list tx-center" colspan="7">검색 결과가 없습니다.</td>
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

                    <!-- View -->
                    <div class="willbes-Leclist c_both">
                        <div class="LecViewTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 65px;">
                                    <col style="width: 575px;">
                                    <col style="width: 150px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr><th colspan="4" class="w-list tx-left  pl20"><img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;"> <strong>[개강] 1.4(월) 개강!! 황남기 헌법 진도별 모의고사</strong></th></tr>
                                    <tr>
                                        <td class="w-acad pl20"><span class="oBox onlineBox NSK">온라인</span></td>
                                        <td class="w-lec tx-left pl20">헌법<span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> 123</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-file tx-left pl20" colspan="4">
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-txt tx-left" colspan="7">
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.<br/>
                                            이달의 개강 강좌 공지입니다.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="search-Btn btnAuto90 h36 mt20 mb30 f_right">
                                <button type="submit" onclick="" class="mem-Btn bg-purple-gray bd-dark-gray">
                                    <span>목록</span>
                                </button>
                            </div>
                            <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 150px;">
                                    <col style="width: 640px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[개강] 황남기 헌법, 행정법 리마인드 핵심 이론 + 기출문풀</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr>
                                    <tr>
                                        <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                        <td class="tx-left pl20"><a href="#none">[헌법] 5~6월 강의안내</a><span class="row-line">|</span></td>
                                        <td class="w-date">2018-00-00</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PASSZONE-List -->
            </div>

        </div>
        <!-- willbes-Layer-PassBox : 무한 PASS 공지 -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop