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
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li>
                    <a href="#none">패키지</a>
                </li>
                <li>
                    <a href="#none">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">이벤트</a>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>고객센터</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <ul class="tabWrap tabCsDepth1 NSK">
                <li class="Act1"><a href="#cs1">자주하는 질문</a></li>
                <li class="Act2"><a href="#cs2">공지사항</a></li>
                <li class="Act3"><a href="#cs3">1:1 상담</a></li>
                <li class="Act4"><a href="#cs4">사이트 이용가이드</a></li>
                <li class="Act5"><a href="#cs5">모바일 서비스안내</a></li>
                <li class="Act6"><a href="#cs6">수강지원</a></li>
                <li class="Act7"><a href="#cs7">부정사용자 규제</a></li>
            </ul>
            <div class="tabBox">
                <div id="cs1" class="CScenter1 willbes-listTable">
                    <!-- Act1-1 -->
                    <div class="Act1-1 mt65">
                        <div class="CSpartner widthAuto530 f_left">
                            <div class="will-Tit NG">든든한 학습 파트너, <span class="tx-blue">윌비스 통합 고객센터</span></div>
                            <div class="centerList NG">
                                <ul>
                                    <li>
                                        <a href="#none">
                                            <img src="{{ img_url('cs/icon_center1.png') }}">
                                            <div class="nTxt">고객센터<br/>공지사항</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <a href="#none">
                                            <img src="{{ img_url('cs/icon_center2.png') }}">
                                            <div class="nTxt">자주하는<br/>질문</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <a href="#none">
                                            <img src="{{ img_url('cs/icon_center3.png') }}">
                                            <div class="nTxt">1:1 상담</div>
                                        </a>
                                    </li>
                                    <li><img src="{{ img_url('cs/icon_cs_arrow.png') }}"></li>
                                    <li>
                                        <img src="{{ img_url('cs/icon_center4.png') }}">
                                        <div class="nTxt">전화상담</div>
                                    </li>
                                </ul>
                                <div class="Txt">학습에 궁금한 점이 있으신가요? 이렇게 해결하세요.</div>
                            </div>
                        </div>
                        <div class="widthAuto365 f_left p_re ml45">
                            <div class="will-Tit NG">즐겨찾는 고객센터</div>
                            <div class="callBox">
                                <table cellspacing="0" cellpadding="0" class="listTable callTable NG upper-gray fc-bd-none tx-gray">
                                    <colgroup>
                                        <col style="width: 145px;"/> 
                                        <col style="width: 110px;"/>
                                        <col style="width: 110px;"/>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>윌비스 공무원</td>
                                            <td class="tx-light-blue">1544-5006</td>
                                            <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                        </tr>
                                        <tr>
                                            <td>신광은 경찰</td>
                                            <td class="tx-light-blue">1544-6219</td>
                                            <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                        </tr>
                                        <tr>
                                            <td>윌비스 임용</td>
                                            <td class="tx-light-blue">1544-3169</td>
                                            <td><a href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="center-Btn h36"><a class="bg-blue bd-dark-blue NSK" href="#none" onclick="openWin('CScenter')">서비스별 고객센터 전체</a></div>
                            </div>
                            <!-- willbes-Layer-CScenterBox -->
                            <div id="CScenter" class="willbes-Layer-CScenterBox">
                                <a class="closeBtn" href="#none" onclick="closeWin('CScenter')">
                                    <img src="{{ img_url('prof/close.png') }}">
                                </a>
                                <div class="Layer-Tit NG tx-dark-black">윌비스 <span class="tx-blue">고객센터 안내</span></div>
                                <div class="Layer-Cont">
                                    <div class="Layer-SubTit tx-gray">특정 서비스에 대한 문의는 해당 사이트로 바로 문의주셔야 빠르게 답변을 받을 수 있습니다.</div>
                                    <div class="LeclistTable">
                                        <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                                            <colgroup>
                                                <col style="width: 130px;">
                                                <col style="width: 115px;">
                                                <col style="width: 155px;">
                                                <col style="width: 260px;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>사이트<span class="row-line">|</span></th>
                                                    <th>분류<span class="row-line">|</span></th>
                                                    <th>연락처<span class="row-line">|</span></th>
                                                    <th>운영시간</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="w-site">교재문의</td>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-4944</td>
                                                    <td class="w-time">
                                                        평일 9:00~18:00<br/>
                                                        주말/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-site" rowspan="2">윌비스 공무원</td>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                    <td class="w-call">1544-5006</td>
                                                    <td class="w-time">
                                                        평일 9:00~18:00 | 토요일 9:00~13:00<br/>
                                                        일요일/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-0330</td>
                                                    <td class="w-time">
                                                        평일/주말 9:00~22:00
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="w-site" rowspan="2">신광은 경찰</td>
                                                    <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                    <td class="w-call">1544-5006</td>
                                                    <td class="w-time">
                                                        평일 9:00~18:00 | 토요일 9:00~13:00<br/>
                                                        일요일/공휴일 휴무
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-0330</td>
                                                    <td class="w-time">
                                                        평일/주말 9:00~22:00
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-site">임용</td>
                                                    <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                    <td class="w-call">1544-3169</td>
                                                    <td class="w-time">
                                                        월~토 9:00~22:00<br/>
                                                        일요일/공휴일 휴무
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <!-- // willbes-Layer-CScenterBox -->
                        </div>
                    </div>
                    <!-- Act1-2 -->
                    <div class="Act1-2 mt70">
                        <div class="LeclistTable c_both">
                            <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 100px;">
                                    <col style="width: 100px;">
                                    <col style="width: 740px;">
                                </colgroup>
                                <thead>
                                    <tr class="SearchBox NG">
                                        <td colspan="3">
                                            <span class="sTit tx-black">자주하는 질문</span>
                                            <span class="willbes-Lec-Search">
                                                <div class="inputBox p_re">
                                                    <label for="SEARCH" class="labelSearch" style="display: block;">찾고 싶은 내용 / 단어를 입력해 주세요.</label>
                                                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" maxlength="30">
                                                    <button type="submit" onclick="" class="search-Btn">
                                                        <span>검색</span>
                                                    </button>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light-gray" colspan="3">
                                            <ul>
                                                <li><a href="#none">회원정보</a></li>
                                                <li><a href="#none">주문/결제</a></li>
                                                <li><a href="#none">배송</a></li>
                                                <li><a href="#none">취소/환불/반품</a></li>
                                                <li><a href="#none">온라인수강</a></li>
                                                <li><a href="#none">학원수강</a></li>
                                                <li><a href="#none">모바일</a></li>
                                            </ul>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-select tx-blue">[회원정보]</td>
                                        <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                    </tr>
                                    <tr class="replyTxt bg-light-gray tx-gray">
                                        <td colspan="3">
                                            로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                            소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                            만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-select tx-blue">[회원정보]</td>
                                        <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                    </tr>
                                    <tr class="replyTxt bg-light-gray tx-gray">
                                        <td colspan="3">
                                            로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                            소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                            만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-select tx-blue">[회원정보]</td>
                                        <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                    </tr>
                                    <tr class="replyTxt bg-light-gray tx-gray">
                                        <td colspan="3">
                                            로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                            소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                            만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-select tx-blue">[회원정보]</td>
                                        <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                    </tr>
                                    <tr class="replyTxt bg-light-gray tx-gray">
                                        <td colspan="3">
                                            로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                            소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                            만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                        </td>
                                    </tr>

                                    <tr class="replyList">
                                        <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                        <td class="w-select tx-blue">[회원정보]</td>
                                        <td class="w-list tx-left pl20">탈퇴 후 재가입이 가능한가요? <span class="arrow-Btn">></span></td>
                                    </tr>
                                    <tr class="replyTxt bg-light-gray tx-gray">
                                        <td colspan="3">
                                            로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                            소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                            만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--LeclistTable -->
                    </div>
                    <!-- Act1-3 -->
                    <div class="Act1-3 mt65">
                        <div class="willbes-firstinfo NGEB">
                            <ul>
                                <li class="Tit">
                                    윌비스<span class="NGR">에</span><br/>
                                    <span class="tx-light-blue">처음</span><br/>
                                    <span class="NGR">오셨나요?</span>
                                </li>
                                <li class="f-info1"><a href="#none"><span>주요메뉴 안내</span></a><span class="row-line">|</span></li>
                                <li class="f-info2"><a href="#none"><span>회원가입</span></a><span class="row-line">|</span></li>
                                <li class="f-info3"><a href="#none"><span>수강신청</span></a><span class="row-line">|</span></li>
                                <li class="f-info4"><a href="#none"><span>주문/결제</span></a><span class="row-line">|</span></li>
                                <li class="f-info5"><a href="#none"><span>강의수강</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Act1-4 -->
                    <div class="Act1-4 mt60">
                        <div class="widthAuto530 f_left">
                            <div class="willbes-listTable willbes-program mr30 widthAuto330">
                                <div class="will-Tit NG">학습 프로그램 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                                <dl class="List-Table NG tx-gray">
                                    <dt>
                                        <a href="#none">
                                            <div>MS Word<br/>뷰어</div>
                                            <img src="{{ img_url('cs/icon_program_MS.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>한글 어도비<br/>리더</div>
                                            <img src="{{ img_url('cs/icon_program_PDF.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>한글과 컴퓨터<br/>뷰어</div>
                                            <img src="{{ img_url('cs/icon_program_Word.gif') }}">
                                        </a>
                                    </dt>
                                    <dt>
                                        <a href="#none">
                                            <div>ALZIP</div>
                                            <img src="{{ img_url('cs/icon_program_ZIP.gif') }}">
                                        </a>
                                    </dt>
                                </dl>
                            </div>
                            <a href="#none"><img src="{{ img_url('cs/bnr_mobile.jpg') }}"></a>
                        </div>
                        <div class="willbes-listTable willbes-info widthAuto365 f_left ml45">
                            <div class="will-Tit NG">공지사항 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                            <ul class="List-Table GM tx-gray">
                                <li><a href="#none">3월 무이자카드안내</a><span class="date">2018-04-01</span></li>
                                <li><a href="#none">3월 31일(금) 새벽시스템점검안내</a><span class="date">2018-04-01</span></li>
                                <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                                <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="cs2" class="CScenter2">
                공지사항
                </div>
                <div id="cs3" class="CScenter3">
                1:1 상담  
                </div>
                <div id="cs4" class="CScenter4">
                사이트 이용가이드
                </div>
                <div id="cs5" class="CScenter5">
                모바일 서비스안내
                </div>
                <div id="cs6" class="CScenter6">
                수강지원
                </div>
                <div id="cs7" class="CScenter7">
                부정사용자 규제   
                </div>

                <div id="ch2" class="tabLink">
                    <div class="bookInfo">
                        <div class="bookImg">
                            <img src="{{ img_url('sample/book.jpg') }}">
                        </div>
                        <div class="bookDetail">
                            <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                            <div class="book-Author tx-gray">
                                <ul>
                                    <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                    <li>저자 : 저자명 <span class="row-line">|</span></li>
                                    <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                    <li>판형/쪽수 : 190*260 / 769</li>
                                </ul>
                                <ul>
                                    <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                    <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong></li>
                                </ul>
                            </div>
                            <div class="bookBoxWrap">
                                <ul class="tabWrap tabDepth2">
                                    <li><a href="#info1">교재소개</a></li>
                                    <li><a href="#info2">교재목차</a></li>
                                </ul>
                                <div class="tabBox">
                                    <div id="info1" class="tabContent">
                                        <div class="book-TxtBox tx-gray">
                                            2018년재신정판을내면서..<br/>
                                            첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                            둘째, 매지문마다해설을충실히달았습니다..<br/>
                                            셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                            기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                        </div>
                                        <div class="caution-txt tx-red">수강생교재는해당온라인강좌수강생에한해구매가능합니다. (교재만별도구매불가능)</div>
                                    </div>
                                    <div id="info2" class="tabContent">
                                        <div class="book-TxtBox tx-gray">
                                            제1편 현대 문법<br/>
                                            제2편 고전 문법<br/>
                                            제3편 국어 생활<br/>
                                            제4편 현대 문학<br/>
                                            제5편 고전 문학<br/>
                                            제1편 현대 문법<br/>
                                            제2편 고전 문법<br/>
                                            제3편 국어 생활<br/>
                                            제4편 현대 문학<br/>
                                            제5편 고전 문학
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-CScenter -->

        <!--
        <div class="willbes-Lec-buyBtn">
            <ul>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                        <span>장바구니</span>
                    </button>
                </li>
                <li class="btnAuto180 h36">
                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                        <span class="tx-light-blue">바로결제</span>
                    </button>
                </li>
            </ul>
        </div>
        -->
        <!-- willbes-Lec-buyBtn -->

        <div id="InfoForm" class="willbes-Layer-Box">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
            </div>
            <div class="lecDetailWrap">
                <ul class="tabWrap tabDepth1 NG">
                    <li><a id="hover1" href="#ch1">강좌상세정보</a></li>
                    <li><a id="hover2" href="#ch2">교재상세정보 (총 2권)</a></li>
                </ul>
                <div class="tabBox">
                    <div id="ch1" class="tabLink">
                        <div class="classInfo">
                            <dl class="w-info NG">
                                <dt>강의수 : <span class="tx-blue">70강</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강기간 : <span class="tx-blue">50일</span></dt>
                                <dt class="NSK ml15">
                                    <span class="nBox n1">2배수</span>
                                    <span class="nBox n2">진행중</span>
                                    <span class="nBox n3">예정</span>
                                    <span class="nBox n4">완강</span>
                                </dt>
                            </dl>
                        </div>
                        <div class="classInfoTable">
                            <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 140px;">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td class="w-list bg-light-white">
                                            강좌유의사항<br/>
                                            <span class="tx-red">(필독)</span>
                                        </td>
                                        <td class="w-data tx-left pl25">
                                            LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                            자동출력됩니다. (온라인상품기준)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">강좌소개</td>
                                        <td class="w-data tx-left pl25">
                                            LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                            자동출력됩니다. (온라인상품기준)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-list bg-light-white">강좌특징</td>
                                        <td class="w-data tx-left pl25">
                                            LMS > 상품관리> [온라인]상품관리> 단강좌메뉴의‘단강좌유의사항(필독)’ 항목에입력된정보가<br/>
                                            자동출력됩니다. (온라인상품기준)
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="ch2" class="tabLink">
                        <div class="bookInfo">
                            <div class="bookImg">
                                <img src="{{ img_url('sample/book.jpg') }}">
                            </div>
                            <div class="bookDetail">
                                <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집 (전2권)</div>
                                <div class="book-Author tx-gray">
                                    <ul>
                                        <li>분야 : 9급공무원 <span class="row-line">|</span></li>
                                        <li>저자 : 저자명 <span class="row-line">|</span></li>
                                        <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                        <li>판형/쪽수 : 190*260 / 769</li>
                                    </ul>
                                    <ul>
                                        <li>출판일 : 2018-00-00 <span class="row-line">|</span></li>
                                        <li>교재비 : <strong class="tx-light-blue">20,000원</strong> (↓20%) <strong class="tx-red">[품절]</strong></li>
                                    </ul>
                                </div>
                                <div class="bookBoxWrap">
                                    <ul class="tabWrap tabDepth2">
                                        <li><a href="#info1">교재소개</a></li>
                                        <li><a href="#info2">교재목차</a></li>
                                    </ul>
                                    <div class="tabBox">
                                        <div id="info1" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                2018년재신정판을내면서..<br/>
                                                첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                            </div>
                                            <div class="caution-txt tx-red">수강생교재는해당온라인강좌수강생에한해구매가능합니다. (교재만별도구매불가능)</div>
                                        </div>
                                        <div id="info2" class="tabContent">
                                            <div class="book-TxtBox tx-gray">
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학<br/>
                                                제1편 현대 문법<br/>
                                                제2편 고전 문법<br/>
                                                제3편 국어 생활<br/>
                                                제4편 현대 문학<br/>
                                                제5편 고전 문학
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Layer-Box -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop