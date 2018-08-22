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
        <span class="1depth"><span class="depth-Arrow">></span><strong>고객센터</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-CScenter c_both">
            <!--
            <ul class="tabWrapIndex NSK">
                <li class="Act1"><a href="{{ site_url('/home/html/cscenter#cs1') }}">자주하는 질문</a></li>
                <li class="Act2"><a href="{{ site_url('/home/html/cscenter#cs2') }}">공지사항</a></li>
                <li class="Act3"><a href="{{ site_url('/home/html/cscenter#cs3') }}">1:1 상담</a></li>
                <li class="Act4"><a href="{{ site_url('/home/html/cscenter#cs4') }}">사이트 이용가이드</a></li>
                <li class="Act5"><a href="{{ site_url('/home/html/cscenter#cs5') }}">모바일 서비스안내</a></li>
                <li class="Act6"><a href="{{ site_url('/home/html/cscenter#cs6') }}">수강지원</a></li>
                <li class="Act7"><a href="{{ site_url('/home/html/cscenter#cs7') }}">부정사용자 규제</a></li>
            </ul>
            -->
            <div class="CScenterIndex willbes-listTable">
                <!-- ActIndex1 -->
                <div class="ActIndex1">
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
                                        <td class="tx-light-blue">1544-5006</td>
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
                                                <td class="w-acad"><span class="oBox onlineBox NSK">공통</span></td>
                                                <td class="w-call">1544-4944</td>
                                                <td class="w-time tx-left pl25">
                                                    평일 9:00~18:00<br/>
                                                    주말/공휴일 휴무
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-site" rowspan="2">윌비스 공무원</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-call">1544-5006</td>
                                                <td class="w-time tx-left pl25">
                                                    평일 9:00~18:00 | 토요일 9:00~13:00<br/>
                                                    일요일/공휴일 휴무
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-call">1544-0330</td>
                                                <td class="w-time tx-left pl25">
                                                    평일/주말 9:00~22:00
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="w-site" rowspan="2">신광은 경찰</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-call">1544-5006</td>
                                                <td class="w-time tx-left pl25">
                                                    평일 9:00~18:00<br/>
                                                    주말/공휴일 휴무
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-acad"><span class="oBox offlineBox NSK">학원</span></td>
                                                <td class="w-call">1544-0336</td>
                                                <td class="w-time tx-left pl25">
                                                    월~토 9:00~22:00<br/>
                                                    일요일 9:00~20:00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-site">임용</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-call">1544-3169</td>
                                                <td class="w-time tx-left pl25">
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
                <!-- ActIndex2 -->
                <div class="ActIndex2 mt45">
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
                                                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="찾고 싶은 내용 / 단어를 입력해 주세요." maxlength="30">
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
                                            <li><a href="#none">결제/환불</a></li>
                                            <li><a href="#none">교재</a></li>
                                            <li><a href="#none">온라인수강</a></li>
                                            <li><a href="#none">학원수강</a></li>
                                            <li><a href="#none">모바일</a></li>
                                        </ul>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="replyList w-replyList">
                                    <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                    <td class="w-select tx-blue">[회원정보]</td>
                                    <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                </tr>
                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
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
                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
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
                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
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
                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
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
                                <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
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
                <!-- ActIndex3 -->
                <div class="ActIndex3 mt45">
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
                <!-- ActIndex4 -->
                <div class="ActIndex4 mt45">
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
        </div>
        <!-- willbes-CScenter -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop