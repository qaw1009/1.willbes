@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer">
    <div class="widthAuto c_both">
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
    </div>

    <div class="ActIndex MainVisual widthAutoFull">
        <div class="widthAuto p_re">
            <div class="Content p_re">
                <div class="will-main-Tit NSK">
                    든든한 학습 파트너, <div class="tx-light-blue">윌비스 통합 고객센터</div>
                    <div class="NSK-Thin">학습에 궁금한 점이 있으신가요?<br/>이렇게 순서대로 진행해서 해결하세요.</div>
                </div>
                <div class="centerList NG">
                    <ul>
                        <li>
                            <a href="#none">
                                <div class="nStep">STEP1</div>
                                <img src="{{ img_url('cs/icon_center1_n.png') }}">
                                <div class="nTxt">고객센터<br/>공지사항</div>
                            </a>
                        </li>
                        <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                        <li>
                            <a href="#none">
                                <div class="nStep">STEP2</div>
                                <img src="{{ img_url('cs/icon_center2_n.png') }}">
                                <div class="nTxt">자주하는<br/>질문검색</div>
                            </a>
                        </li>
                        <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                        <li>
                            <a href="#none">
                                <div class="nStep">STEP3</div>
                                <img src="{{ img_url('cs/icon_center3_n.png') }}">
                                <div class="nTxt">1:1 문의하기<br/>서비스</div>
                            </a>
                        </li>
                        <li class="arrow"><img src="{{ img_url('cs/icon_cs_arrow_n.png') }}"></li>
                        <li>
                            <div class="nStep">STEP4</div>
                            <img src="{{ img_url('cs/icon_center4_n.png') }}">
                            <div class="nTxt">상담원과<br/>전화상담</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="Quick-Top">
                <div class="Quick-Bnr ml20">
                    <img src="{{ img_url('sample/banner_180605.jpg') }}"> 
                </div>
            </div>
        </div>
    </div>
    <div class="widthAuto">
        <div class="Content p_re">
            <div class="willbes-CScenter c_both">
                <div class="ActIndex ActIndex1 mt50">
                    <div class="p_re">
                        <div class="will-Tit NSK">즐겨찾는 <span class="tx-light-blue">고객센터</span>
                            <div class="center-Btn"><a class="tx-light-blue" href="#none" onclick="openWin('CScenter')">서비스별 고객센터 전체보기 ▼</a></div>
                        </div>
                        <div class="callBox NG">
                            <ul>
                                <li>
                                    <span class="tit">온라인 문의</span>
                                    <span class="num tx-light-blue">1544-5006</span>
                                    <!--a class="bnr_go" href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a-->
                                    <span class="row-line">|</span>
                                </li>
                                <li>
                                    <span class="tit">교재 문의</span>
                                    <span class="num tx-light-blue">1544-4944</span>
                                    <!--a class="bnr_go" href="#none"><img src="{{ img_url('cs/icon_go.png') }}"></a-->
                                    <span class="row-line">|</span>
                                </li>
                                <li>
                                    <span class="tit">운영시간</span>
                                    <span class="time tx-light-blue">
                                        평일 9:00 ~ 18:00
                                        주말/공휴일 휴무 <br>
                                        (점심시간 12시~13시)
                                    </span>                                    
                                </li>
                            </ul>
                        </div>
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
                                                <td class="w-acad"><span class="oBox allBox NSK">공통</span></td>
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
                                                    평일 9:00~18:00  (점심시간 12시~13시)<br/>
                                                    주말/공휴일 휴무
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
                                                    평일 9:00~18:00 (점심시간 12시~13시)<br/>
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
                                            <!--tr>
                                                <td class="w-site">임용</td>
                                                <td class="w-acad"><span class="oBox onlineBox NSK">온라인</span></td>
                                                <td class="w-call">1544-3169</td>
                                                <td class="w-time tx-left pl25">
                                                    월~토 9:00~22:00<br/>
                                                    일요일/공휴일 휴무
                                                </td>
                                            </tr-->
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="ActIndex ActIndex2 mt50">
                    <div class="LeclistTable c_both">
                        <div class="csCenterSearch">
                            <div class="will-Tit NSK">윌비스에 <span class="tx-light-blue">자주하는</span> 질문 검색하기</div>
                            <div class="SearchBox NG">
                                <span class="sTitsub">
                                    궁금한 점이 있으신가요?<br/>
                                    검색을 통해 찾고 싶은 내용 / 단어를 입력해 주세요.
                                </span>
                                <div class="searchBoxForm">
                                    <select id="question" name="question" title="question" class="seleQuestion">
                                        <option selected="selected">회원정보</option>
                                        <option value="결제/환불">결제/환불</option>
                                        <option value="교재">교재</option>
                                        <option value="온라인수강">온라인수강</option>
                                        <option value="학원수강">학원수강</option>
                                        <option value="모바일">모바일</option>
                                    </select>
                                    <span class="willbes-Lec-Search">
                                        <div class="inputBox p_re">
                                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="찾고 싶은 내용 / 단어를 입력해 주세요." maxlength="30">
                                            <button type="submit" onclick="" class="search-Btn">
                                                <span>검색</span>
                                            </button>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <ul class="tabWrap tabcsDepth2 bg-light-gray NSK p_re">
                                <li><a class="qBox on" href="#question1">회원정보</a></li>
                                <li><a class="qBox" href="#question2">결제/환불</a></li>
                                <li><a class="qBox" href="#question3">교재</a></li>
                                <li><a class="qBox" href="#question4">온라인수강</a></li>
                                <li><a class="qBox" href="#question5">학원수강</a></li>
                                <li><a class="qBox" href="#question6">모바일</a></li>
                            </ul>
                            <div class="tabBox">
                                <div id="question1" class="tabContent">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
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

                                            <tr class="replyList w-replyList">
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

                                            <tr class="replyList w-replyList">
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

                                            <tr class="replyList w-replyList">
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

                                            <tr class="replyList w-replyList">
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
                                <div id="question2" class="tabContent" style="display: none">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
                                        <tbody>
                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[결제/환불]</td>
                                                <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[결제/환불]</td>
                                                <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[결제/환불]</td>
                                                <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[결제/환불]</td>
                                                <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[결제/환불]</td>
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
                                <div id="question3" class="tabContent" style="display: none">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
                                        <tbody>
                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[교재]</td>
                                                <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[교재]</td>
                                                <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[교재]</td>
                                                <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[교재]</td>
                                                <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[교재]</td>
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
                                <div id="question4" class="tabContent" style="display: none">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
                                        <tbody>
                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[온라인수강]</td>
                                                <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[온라인수강]</td>
                                                <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[온라인수강]</td>
                                                <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[온라인수강]</td>
                                                <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[온라인수강]</td>
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
                                <div id="question5" class="tabContent" style="display: none">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
                                        <tbody>
                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[학원수강]</td>
                                                <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[학원수강]</td>
                                                <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[학원수강]</td>
                                                <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[학원수강]</td>
                                                <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[학원수강]</td>
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
                                <div id="question6" class="tabContent" style="display: none">
                                    <table cellspacing="0" cellpadding="0" class="listTable csCenterTable upper-gray bdb-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 100px;">
                                            <col style="width: 100px;">
                                            <col style="width: 740px;">
                                        </colgroup>
                                        <tbody>
                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[모바일]</td>
                                                <td class="w-list tx-left pl20">로그인이 되지 않아요. <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[모바일]</td>
                                                <td class="w-list tx-left pl20">회원탈퇴는 어떻게 하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[모바일]</td>
                                                <td class="w-list tx-left pl20">회원정보는 어떻게 수정하나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[모바일]</td>
                                                <td class="w-list tx-left pl20">가입시 받게 되는 혜택은 무엇이 있나요? <span class="arrow-Btn">></span></td>
                                            </tr>
                                            <tr class="replyTxt w-replyTxt bg-light-gray tx-gray">
                                                <td colspan="3">
                                                    로그인이 되지 않는 경우는 대부분 아이디(ID)와 비밀번호(PW)가 일치하지 않는 경우입니다.<br/>
                                                    소문자/대문자 여부(키보드Caps Lock 체크)와, 숫자 입력시 키보드의 Num Lock이 커져 있는지 확인해 보시고 다시 한번 로그인 하시기 바랍니다.<br/> 
                                                    만약 그래도 로그인에 문제가 생길시에는 불편 하시더라도 동영상 고객센터 (☎1544-6219) 문의해 주시기 바랍니다.
                                                </td>
                                            </tr>

                                            <tr class="replyList w-replyList">
                                                <td class="w-no"><img src="{{ img_url('prof/icon_best_reply.gif') }}"></td>
                                                <td class="w-select tx-blue">[모바일]</td>
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ActIndex ActIndex3 mt50">
                    <div class="willbes-firstinfo">
                        <div class="will-Tit NSK">윌비스에 <span class="tx-light-blue">처음</span> 오셨나요?</div>
                        <ul class="NG">
                            <li class="f-info1">
                                <a href="#none"><img src="{{ img_url('cs/icon_question.gif') }}"><span>주요메뉴 안내</span></a>
                                <span class="row-line">|</span>
                            </li>
                            <li class="f-info2">
                                <a href="#none"><img src="{{ img_url('cs/icon_question623.gif') }}"><span>회원정보</span></a>
                                <span class="row-line">|</span>
                            </li>
                            <li class="f-info3">
                                <a href="#none"><img src="{{ img_url('cs/icon_question624.gif') }}"><span>결제/환불</span></a>
                                <span class="row-line">|</span>
                            </li>
                            <li class="f-info4">
                                <a href="#none"><img src="{{ img_url('cs/icon_question625.gif') }}"><span>교재</span></a>
                                <span class="row-line">|</span>
                            </li>
                            <li class="f-info5">
                                <a href="#none"><img src="{{ img_url('cs/icon_question626.gif') }}"><span>온라인수강</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="ActIndex ActIndex4 mt50">
                    <div class="willbes-listTable willbes-info willbes-notice widthAuto360 f_left mr30 mt0">
                        <div class="will-Tit NSK"><span class="tx-light-blue">공지</span>사항 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                        <ul class="List-Table GM tx-gray mt10">
                            <li><a href="#none">3월 무이자카드안내</a><span class="date">2018-04-01</span></li>
                            <li><a href="#none">3월 31일(금) 새벽시스템점검안내</a><span class="date">2018-04-01</span></li>
                            <li><a href="#none">설연휴학원고객센터운영안내</a><span class="date">2018-03-06</span></li>
                            <li><a href="#none">추석교재배송및고객센터휴무안내</a><span class="date">2018-03-06</span></li>
                        </ul>
                    </div>
                    <div class="widthAuto550 f_left">
                        <div class="willbes-listTable willbes-program mr30 widthAuto360 mt0">
                            <div class="will-Tit NSK mt0"><span class="tx-light-blue">학습</span> 프로그램 <a class="f_right" href="#none"><img src="/public/img/willbes/prof/icon_add.png"></a></div>
                            <dl class="List-Table NG tx-gray">
                                <dt>
                                    <a href="#none">
                                        <img src="{{ img_url('cs/icon_program_671003.gif') }}">
                                        <div>Word 뷰어</div>
                                    </a>
                                </dt>
                                <dt>
                                    <a href="#none">
                                        <img src="{{ img_url('cs/icon_program_671004.gif') }}">
                                        <div>PDF 뷰어</div>
                                    </a>
                                </dt>
                                <dt>
                                    <a href="#none"> 
                                        <img src="{{ img_url('cs/icon_program_671002.gif') }}">
                                        <div>한글 뷰어</div>
                                    </a>
                                </dt>
                                <dt>
                                    <a href="#none">
                                        <img src="{{ img_url('cs/icon_program_671001.gif') }}">
                                        <div>알집</div>
                                    </a>
                                </dt>
                            </dl>
                        </div>
                        <a class="bnr_mobile" href="#none"><img src="{{ img_url('cs/bnr_mobile_n.jpg') }}"></a>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
    </div>

</div>
<!-- End Container -->
@stop