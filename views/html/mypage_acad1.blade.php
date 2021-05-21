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
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>내강의실</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>학원강좌</strong></span>
        <span class="depth"><span class="depth-Arrow">&gt;</span><strong>수강신청강좌</strong></span>
    </div>
    <div class="Content p_re">
        <div class="willbes-Leclist c_both">
            <div class="c_both mb30">
                <ul class="tabWrap tabDepthPass">
                    <li><a href="#Mypagetab1" class="on">종합반 (3)</a></li>
                    <li><a href="#Mypagetab2">단과반 (2)</a></li>                    
                </ul>
            </div>

            <div id="Mypagetab1">
                <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div> 
            
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col>
                            <col style="width: 140px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">[영어강화형_분납] 8개월 슈퍼PASS(원) [1/13~8/31]</div>
                                </td>
                                <td class="w-period">2018.10.20<br>
                                    ~ 2018.11.20</td>
                                <td class="w-answer p_re">
                                    <a href="#none" onclick="openWin('profChoice')"><span class="bBox blueBox">강사선택하기</span></a>
                                    <a href="#none"><span class="bBox blackBox">좌석선택하기</span></a>
                                    <a href="#none"><span class="bBox red-line-Box">온라인첨삭</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="w-data tx-left pl10 bg-light-gray">
                                    <dl class="w-info">
                                        <dt>
                                            기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                            한덕현 교수님 <span class="row-line">|</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                        </dt>
                                    </dl>     
                                    <ul class="seatsection">
                                        <li><button href="#" onclick="openWin('seatChoice')">좌석선택 ></button></li>
                                        <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                        <li>[좌석번호] <span>086</span></li>
                                        <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                    </ul> 
                                    <div class="lookover profLook"><a href="#none" onclick="openWin('profLook')">강사선택현황보기 ></a></div>                              
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">★기본서제공★기본종합(원)[1/6~3/6]</div>
                                </td>
                                <td class="w-period">2018.10.20<br>
                                    ~ 2018.11.20</td>
                                <td class="w-answer p_re">
                                    <a href="#none"><span class="bBox blueBox">강사선택하기</span></a>
                                    <a href="#none"><span class="bBox blackBox">좌석선택하기</span></a>
                                    <a href="#none"><span class="bBox red-line-Box">온라인첨삭</span></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="w-data tx-left pl10 bg-light-gray">
                                    <div class="mb10">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님 <span class="row-line">|</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                            </dt>
                                        </dl>     
                                        <ul class="seatsection">
                                            <li><button href="#" onclick="openWin('seatChoice')">좌석선택 ></button></li>
                                            <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                            <li>[좌석번호] <span class="tx-red">미선택</span></li>
                                            <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                        </ul>  
                                        <div class="lookover"><a href="#none" onclick="openWin('lookOver')">온라인첨삭 ></a></div>                                      
                                    </div>
                                    <div class="mb10">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님 <span class="row-line">|</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                            </dt>
                                        </dl>     
                                        <ul class="seatsection">
                                            <li><button href="#" onclick="openWin('seatChoice')">좌석선택 ></button></li>
                                            <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                            <li>[좌석번호] <span>066</span></li>
                                            <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                        </ul>
                                        <div class="lookover"><a href="#none" onclick="openWin('lookOver')">온라인첨삭 ></a></div>
                                    </div>
                                    <div class="mb10">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님 <span class="row-line">|</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지
                                            </dt>
                                        </dl>     
                                        <ul class="seatsection">
                                            <li><button href="#" onclick="openWin('seatChoice')">좌석선택 ></button></li>
                                            <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                            <li>[좌석번호] <span class="tx-red">미선택</span></li>
                                            <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                        </ul> 
                                        <div class="lookover"><a href="#none" onclick="openWin('lookOver')">온라인첨삭 ></a></div>                                       
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">[9급 일행] 2개월 진도별 문제풀이반 4과목 (20.1-2)</div>
                                </td>
                                <td class="w-period"></td>
                                <td class="w-answer">                                    
                                    <div class="MoreBtn mt0"><a href="#none" class="bBox grayBox">강좌구성 보기</a></div>
                                    {{--
                                    <div id="lecList" class="willbes-Layer-lecList">
                                        <a class="closeBtn" href="#none" onclick="closeWin('lecList')">
                                            <img src="{{ img_url('prof/close.png') }}">
                                        </a>
                                        <div class="Layer-Cont">
                                            <div class="Layer-SubTit tx-gray">
                                                <ul>
                                                    <li>
                                                        [노량진경찰] 2020년 대비 11개월 형소법 기본(단과) [2020.01.06~2022.02.28]
                                                        <div>
                                                            <a href="#none">교재구매</a>
                                                            <span class="oBox changeBox NG">인강전환</span>
                                                            <a href="#none" onclick="openWin('supplementLec')" class="blue">보강/복습동영상 신청</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        경찰학 기본(단과)[1/6~2/18]
                                                        <div>
                                                            <a href="#none">교재구매</a>
                                                            <span class="oBox changeBox NG">인강전환</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        형법 기본(단과)[1/28~2/14]
                                                        <div>
                                                            <a href="#none">교재구매</a>
                                                            <a href="#none" onclick="openWin('supplementLec')" class="blue">보강/복습동영상 신청</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        영어 기본(단과) [1/8~2/21]
                                                        <div>
                                                            <span class="oBox changeBox NG">인강전환</span>
                                                            <a href="#none" onclick="openWin('supplementLec')" class="blue">보강/복습동영상 신청</a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        원유철한국사 기본(단과)[2/17~3/6]
                                                        <div>
                                                            <a href="#none">교재구매</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    --}}                                    
                                </td>                                
                            </tr>                                 
                            <tr>
                                <td colspan="3">
                                    <div class="all-list-box">
                                        <div class="all-list">
                                            <dl class="w-info">
                                                <dt>
                                                    기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                    한덕현 교수님
                                                </dt>                                        
                                            </dl>
                                            <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <div class="lookover">
                                                <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                                <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                            </div>
                                            <div class="all-schedule">
                                                2018.10.20 ~ 2018.11.20<br/>
                                                월 ~ 금 10회차
                                            </div>
                                        </div>
                                        <div class="all-list">
                                            <dl class="w-info">
                                                <dt>
                                                    기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                    한덕현 교수님
                                                </dt>                                        
                                            </dl>
                                            <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <div class="lookover">
                                                <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                                <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                            </div>
                                            <div class="all-schedule">
                                                2018.10.20 ~ 2018.11.20<br/>
                                                월 ~ 금 10회차
                                            </div>
                                        </div>
                                        <div class="all-list">
                                            <dl class="w-info">
                                                <dt>
                                                    기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                    한덕현 교수님
                                                </dt>                                        
                                            </dl>
                                            <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                            <div class="lookover">
                                                <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                                <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                            </div>
                                            <div class="all-schedule">
                                                2018.10.20 ~ 2018.11.20<br/>
                                                월 ~ 금 10회차
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{--
                    <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                        <tbody>
                             <tr>
                                <td class="all-list-box">
                                    <div class="all-list">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님
                                            </dt>                                        
                                        </dl>
                                        <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                        <div class="lookover">
                                            <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                            <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                        </div>
                                        <div class="all-schedule">
                                            2018.10.20 ~ 2018.11.20<br/>
                                            월 ~ 금 10회차
                                        </div>
                                    </div>
                                    <div class="all-list">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님
                                            </dt>                                        
                                        </dl>
                                        <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                        <div class="lookover">
                                            <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                            <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                        </div>
                                        <div class="all-schedule">
                                            2018.10.20 ~ 2018.11.20<br/>
                                            월 ~ 금 10회차
                                        </div>
                                    </div>
                                    <div class="all-list">
                                        <dl class="w-info">
                                            <dt>
                                                기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                                한덕현 교수님
                                            </dt>                                        
                                        </dl>
                                        <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                        <div class="lookover">
                                            <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                            <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                        </div>
                                        <div class="all-schedule">
                                            2018.10.20 ~ 2018.11.20<br/>
                                            월 ~ 금 10회차
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    --}}
                        
                    {{--
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
                    --}}
                </div>
            </div>

            <div id="Mypagetab2">
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
                    <select id="date" name="date" title="date" class="seledate">
                        <option selected="selected">신청일수1</option>
                        <option value="">신청일수2</option>
                        <option value="">신청일수3</option>
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
            
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col>
                            <col style="width: 140px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <dl class="w-info">
                                        <dt>
                                            기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                            한덕현 교수님 <span class="oBox bfBox ml10 NSK">선접수</span>
                                            <span class="oBox changeBox ml10 NSK">인강전환</span>
                                        </dt>                                        
                                    </dl>
                                    <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                    <ul class="seatsection">
                                        <li><button href="#" onclick="openWin('seatChoice')">좌석선택 ></button></li>
                                        <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                        <li>[좌석번호] <span class="tx-red">미선택</span></li>
                                        <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                    </ul>
                                    <div class="lookover">
                                        <a href="#none" onclick="openWin('lookOver')">온라인첨삭 ></a>
                                        <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                        <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강/복습동영상 신청 ></a>
                                    </div>
                                </td>
                                <td class="w-period">2018.10.20 <br>
                                    ~ 2018.11.20</td>
                                <td class="w-schedule">
                                    월 ~ 금<br/>
                                    10회차
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <dl class="w-info">
                                        <dt>
                                            기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                            한덕현 교수님
                                        </dt>
                                    </dl>
                                    <div class="w-tit"><span class="tx-blue">라이브+인강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                    <ul class="seatsection">
                                        <li><button href="#">좌석선택 ></button></li>
                                        <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                        <li>[좌석번호] <span>086</span></li>
                                        <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00</li>
                                    </ul>
                                </td>
                                <td class="w-period">2018.10.20 <br>
                                    ~ 2018.11.20</td>
                                <td class="w-schedule">
                                    월,화,금<br/>
                                    8회차
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <dl class="w-info">
                                        <dt>
                                            기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                            한덕현 교수님
                                            {{--<span class="NSK ml15 nBox n4">마감</span>--}}
                                        </dt>
                                    </dl>
                                    <div class="w-tit">2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                </td>
                                <td class="w-period">2018.10.20 <br>
                                    ~ 2018.11.20</td>
                                <td class="w-schedule">
                                    화,금<br/>
                                    8회차
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
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

            <!--좌석선택 팝업-->
            <div id="seatChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
                <a class="closeBtn" href="#none" onclick="closeWin('seatChoice')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">좌석선택하기</div> 
                <div class="lecMoreWrap of-hidden h590">                    
                    <div class="PASSZONE-List widthAutoFull">
                        <div class="strong mt25 mb10 tx-gray">· 결제정보 및 좌석정보</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable listTableLeft passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width:10%;">
                                    <col style="width:55%;">
                                    <col style="width:10%;">
                                    <col>
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <th>주문번호 </th>
                                        <td>20200000</td>
                                        <th>회원정보</th>
                                        <td>회원명(아이디) | 010-0000-0000 </td>
                                    </tr>
                                    <tr>
                                        <th>결제금액 </th>
                                        <td>100,000원</td>
                                        <th>결제일</th>
                                        <td>2020-00-00 00:00</td>
                                    </tr>
                                    <tr>
                                        <th>상품명</th>
                                        <td>2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</td>
                                        <th>결제상태</th>
                                        <td>결제완료</td>
                                    </tr>

                                    {{--//종합반일 경우만 노출--}}
                                    <tr>
                                        <th>단과반정보</th>
                                        <td colspan="3">
                                            단과반명이 출력됩니다. 
                                        </td>
                                    </tr>
                                    {{--종합반일 경우만 노출//--}}

                                    <tr>
                                        <th>좌석정보</th>
                                        <td colspan="3">
                                            <ul class="seatsection bg-none">
                                                <li>[강의실명] <span>드림타워 3층 305호</span></li>
                                                <li>[좌석번호] <span>086</span> <span class="tx-red">미선택</span></li>
                                                <li>[좌석선택기간] <span>2020-00-00 ~ 2020-00-00</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="PASSZONE-Lec-Section mt25">
                            <div class="btnAuto164 mt20 tx-white tx14 strong"><a href="#" class="bBox blackBox widthAutoFull">좌석배치도 보기 ></a></div>
                            <div class="strong mt25 tx-gray h22">
                                · 좌석선택 주의사항: <br>
                                하단 좌석 선택란의 좌석 위치는 실제 좌석 배치와 다르니, 첨부된 [좌석배치도]의 실제 좌석 위치 확인 후 해당하는 좌석 번호를 선택해 주시기 바랍니다. 
                            </div>
                            <div class="seatNumber">
                                <div class="seatNumberInfo">
                                    <div class="sNumberA"><span>선택가능</span></div>   
                                    <div class="sNumberB"><span>선택완료</span></div>
                                </div>    

                                <ul>
                                    <li style="width:calc(100%/10);">
                                        <button type="button" class="sNumberA">001<span>선택가능</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">002<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberC">003<span>회원명</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="active">004<span>선택가능</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberA">005<span>선택가능</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">006<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">007<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">008<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">009<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/10);">
                                        <button type="button" class="sNumberB">010<span>선택완료</span></button>
                                    </li>

                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberA">011<span>선택가능</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">012<span>선택완료</span></button>
                                    </li>
                                    <li style="width:calc(100%/5);">
                                        <button type="button" class="sNumberB">013<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberA">014<span>선택가능</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">015<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">016<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">017<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">018<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">019<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/5);">
                                        <button type="button" class="sNumberB">020<span>선택완료</span></button>
                                    </li>

                                    <li style="width: calc(100%/2);">
                                        <button type="button" class="sNumberB">019<span>선택완료</span></button>
                                    </li>
                                    <li style="width: calc(100%/2);">
                                        <button type="button" class="sNumberB">020<span>선택완료</span></button>
                                    </li>
                                </ul>                      
 
                                <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox widthAutoFull">적용</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>

            <!--강사선택 팝업-->
            <div id="profChoice" class="willbes-Layer-PassBox willbes-Layer-PassBox1100 abs">
                <a class="closeBtn" href="#none" onclick="closeWin('profChoice')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">강사선택하기</div> 
                <div class="lecMoreWrap of-hidden h590">                    
                    <div class="PASSZONE-List widthAutoFull">
                        <div class="lecTitle NG">
                            [영어강화형_분납] 8개월 슈퍼PASS(원) [1/13~8/31] 
                        </div>

                        <div class="strong mt25 mb10 tx-gray">· 주문정보</div>
                        <div class="LeclistTable bdt-gray">
                            <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                <colgroup>
                                    <col style="width: 8%;">
                                    <col style="width: 15%;">
                                    <col style="width: 10%;">
                                    <col style="width: 10%;">
                                    <col style="width: 10%;">
                                    <col style="width: 15%;">
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>걀제일</th>
                                        <th>결제금액</th>
                                        <th>환불금액</th>
                                        <th>미납금액</th>
                                        <th>주문번호</th>
                                        <th>비고</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th colspan="7">[총 기결제금액] <strong class="tx-blue">150,000원</strong> [총 기환불금액] 0원 |  [총 미납금액] <strong class="tx-red">250,000원</strong> </th>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2019-03-04 0:00</td>
                                        <td>100,000</td>
                                        <td>0</td>
                                        <td>250,000</td>
                                        <td><a href="#none" class="tx-blue">20190000000000000000</a></td>
                                        <td> 2차 납부 </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2019-01-04 0:00</td>
                                        <td>50,000</td>
                                        <td>0</td>
                                        <td>350,000</td>
                                        <td><a href="#none" class="tx-blue">20190000000000000000</a></td>
                                        <td> 1차 납부(3회 분납 예정) </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="PASSZONE-Lec-Section">
                            <div class="strong mt25 tx-gray h22 mb30">
                                · 수강할 강사를 선택해주세요. <br>
                                · 강사 선택 및 변경은 강사선택기간에만 가능하며, 기간이 지난 이후에는 변경이 불가능합니다.
                            </div>

                            <div class="c_both mb20">
                                <ul class="tabWrap tabDepthPass">
                                    <li><a href="#subjecttab1" class="on">필수과목</a></li>
                                    <li><a href="#subjecttab2">선택과목</a></li>
                                </ul>                                
                            </div>

                            <div class="LeclistTable bdt-gray mt25 mb30 c_both" id="subjecttab1">                                
                                <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 5%;">
                                        <col style="width: 8%;">
                                        <col style="width: 8%;">
                                        <col>
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>과정</th>
                                            <th>과목</th>
                                            <th>선택</th>
                                            <th>교수</th>
                                            <th>수강형태</th>
                                            <th>단과반명</th>
                                            <th>개강일~종강일 </th>
                                            <th>요일(회차)</th>
                                            <th>강사선택기간</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                        <tr>
                                            <td rowspan="5">예비순환 </td>
                                            <td rowspan="2">형법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명1 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>월수금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명2 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>
                                                2020-00-00 </td>
                                            <td>화목(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">민법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명3 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>수목금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명4 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>월수금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td>행정법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명5 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>화목(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox">적용</a></div>
                            </div>

                            <div class="LeclistTable bdt-gray mt25 mb30 c_both" id="subjecttab2">
                                <table cellspacing="0" cellpadding="0" class="listTable passTable-Select under-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 5%;">
                                        <col style="width: 8%;">
                                        <col style="width: 8%;">
                                        <col>
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                        <col style="width: 10%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>과정</th>
                                            <th>과목</th>
                                            <th>선택</th>
                                            <th>교수</th>
                                            <th>수강형태</th>
                                            <th>단과반명</th>
                                            <th>개강일~종강일 </th>
                                            <th>요일(회차)</th>
                                            <th>강사선택기간</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                        <tr>
                                            <td rowspan="5">기본이론</td>
                                            <td rowspan="2">형법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명1 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>월수금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명2 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>화목(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td rowspan="2">민법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명3 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>수목금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td>○</td>
                                            <td>교수명4 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>월수금(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                        <tr>
                                            <td>행정법 </td>
                                            <td><input type="radio" name="radio" id="radio" value="radio" /></td>
                                            <td>교수명5 </td>
                                            <td>형태</td>
                                            <td class="tx-left">단과반명이 출력됩니다. </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                            <td>화목(13회차) </td>
                                            <td>2020-00-00~<br>2020-00-00 </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox">적용</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- PASSZONE-List -->
                </div>
            </div>

            <!--첨삭 팝업-->
            <div id="lookOver" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h800 fix abs">
                    <a class="closeBtn" href="#none" onclick="closeWin('lookOver')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div class="Layer-Tit NG tx-dark-black">온라인 첨삭</div>

                    {{--리스트--}}
                    <div class=" lookover-cont">
                        <div class="mt20 tx14 NG">· 답안제출 및 채점결과 보기</div>
                        <div class="Layer-Cont">
                            <ul class="lookoverInfo tx-gray NGR mt20 mb20">
                                <li class="sTit">- 제출상태</li>
                                <li><span class="stbox stbox-red mr10">답안제출</span> ‘답안제출’을 클릭하여 첨삭과제를 확인하고 답안을 제출하세요.</li>
                                <li><span class="stbox stbox-blue mr10">답안수정</span> 첨삭 체출을 완료했으나 답안수정이 필요한 경우 제출기간 내에 답안 수정이 가능합니다.</li>
                                <li class="sTit mt20">- 채점상태</li>
                                <li><span class="stbox stbox-blue-line mr10">채점중</span> 제출기간이 지나면 채점이 진행됩니다. 채점은 2-3일 소요됩니다.＇채점중'을 클릭하여 제출한 답안을 확인할 수 있습니다.</li>
                                <li><span class="stbox stbox-333-line mr10">채점완료</span> 채점이 완료되었습니다. '채점완료'를 클릭하여 채점 결과를 확인하세요.</li>
                            </ul>
                            <div class="mt20 tx14 NG">2018 [지방직/서울시] 정채영 국어 필살모고</div>
                            <div class="lookoverList mt20">
                                <table class="lookoverTable">
                                    <colgroup>
                                        <col width="50px"/>
                                        <col/>
                                        <col width="100px"/>
                                        <col width="200px"/>
                                        <col width="100px"/>
                                        <col width="100px"/>
                                        <col width="100px"/>
                                        <col width="100px"/>
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>회차명</th>
                                            <th>첨부파일</th>
                                            <th>제출기간</th>
                                            <th>제출상태</th>
                                            <th>제출일</th>
                                            <th>채점상태</th>
                                            <th>채점일</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>6</td>
                                            <td>6회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><a href="#none"><span class="stbox stbox-red">답안제출</span></a></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>5회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><a href="#none"><span class="stbox stbox-blue">답안수정</span></a></td>
                                            <td>2020-01-15</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>4회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><span class="stbox stbox-blue-txt">제출완료</span></td>
                                            <td>2020-01-15</td>
                                            <td><a href="#none"><span class="stbox stbox-blue-line">채점중</span></a></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>3회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><span class="stbox stbox-red-txt">미제출</span></td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>2회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><span class="stbox stbox-blue-txt">제출완료</span></td>
                                            <td>2020-01-15</td>
                                            <td><a href="#none"><span class="stbox stbox-333-line">채점완료</span></a></td>
                                            <td>2020-01-20</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>1회차</td>
                                            <td><img src="https://www.local.willbes.net/public/img/willbes/prof/icon_file.gif"/></td>
                                            <td>2020-01-10 ~ 2020-02-01</td>
                                            <td><span class="stbox stbox-blue-txt">제출완료</span></td>
                                            <td>2020-01-15</td>
                                            <td><a href="#none"><span class="stbox stbox-333-line">채점완료</span></a></td>
                                            <td>2020-01-20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                    {{--딥안제출--}}
                    <div class=" lookover-cont">
                        <div class="mt20 tx14 NG">· 답안제출</div>
                        <div class="mt10 NG"> - 첨삭과제 확인</div>
                        <div class="Layer-Cont lookover-cont">
                            <div class="lookoverList mt20">
                                <table class="lookoverTable">
                                    <colgroup>
                                        <col width="150px"/>
                                        <col/>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>회차명</th>
                                            <td class="tx-left"> 6회차</td>
                                        </tr>
                                        <tr>
                                            <th>첨부파일</th>
                                            <td class="tx-left"> 
                                                <ul class="up-file">
                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 2순환 실영상 김유미 인사노무관리론 1회차.pdfx</a></li>
                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 6회차 답안지.hwp</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>내용</th>
                                            <td class="tx-left"> 6회차 첨삭과제 제출 부탁 드립니다.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt40 NG"> - 답안작성</div>
                        <div class="Layer-Cont">
                            <div class="lookoverList mt20">
                                <table class="lookoverTable">
                                    <colgroup>
                                        <col width="150px"/>
                                        <col/>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th>답안내용<span class="tx-red">(*)</span></th>
                                            <td class="tx-left"><textarea></textarea></td>
                                        </tr>
                                        <tr>
                                            <th>답안첨부<span class="tx-red">(*)</span></th>
                                            <td class="tx-left"> 
                                                <ul class="up-file">
                                                    <li><input type="file" class="input-file" size="3"></li>
                                                    <li><input type="file" class="input-file" size="3">
                                                    </li>
                                                    <li>
                                                        • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br/>
                                                        • hwp, doc, pdf, jpg, gif, png, zip 만 등록 가능합니다.
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="search-Btn mt20 h36 p_re mb20">
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left">
                                    <span class="tx-purple-gray">취소</span>
                                </button>
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-blue bd-dark-blue center">
                                    <span>제출하기</span>
                                </button>
                                <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right">
                                    <span class="tx-purple-gray">목록</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{--채점결과--}}
                    <div class=" lookover-cont">
                        <div class="mt20 tx14 NG">· 채점결과</div>
                        <div class="Layer-Cont">
                            <div class="PASSZONE-Lec-Section">
                                <div class="LeclistTable editTableList mt20">
                                    <table cellspacing="0" cellpadding="0" class="listTable editTable bdt-gray bdb-gray upper-gray fc-bd-none tx-gray">
                                        <colgroup>
                                            <col style="width: 115px;">
                                            <col style="width: 235px;">
                                            <col style="width: 115px;">
                                            <col style="width: 235px;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <th class="w-tit bg-light-white strong">과제제목</th>
                                                <td class="w-data tx-left tx-gray pl15" colspan="3">온라인 독해 첨삭지도1</td>
                                            </tr>
                                            <tr>
                                                <th class="w-tit bg-light-white strong">첨삭교수</th>
                                                <td class="w-data tx-left pl15">한덕현</td>
                                                <th class="w-tit bg-light-white strong">채점완료일</th>
                                                <td class="w-data tx-left pl15">2018-00-00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="editDetailWrap p_re mt30 mb60">
                                        <ul class="tabWrap tabDepth2">
                                            <li><a id="edit1" href="#ch1" class="on">과제보기</a></li>
                                            <li><a id="edit2" href="#ch2">작성답안</a></li>
                                            <li><a id="edit3" href="#ch3">채점결과</a></li>
                                        </ul>
                                        <div class="tabBox mt30">
                                            <div id="ch1" class="tabLink">
                                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                                    <colgroup>
                                                        <col style="width: 100%;">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-file tx-left pt-zero pb-zero">
                                                                <ul class="up-file">
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일4가 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일5가 노출됩니다.docx</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-file tx-left pt20 pl30 pr30">
                                                                A. 다음 각 문장을 끊어진 대로 해석하시오.<br/><br/>
                                                                1. Everyone's nose is a different shape.// <br/><br/>
                                                                2. Researchers may know why.// <br/><br/>
                                                                3. Researchers say / it could be because of the climate.//<br/><br/>
                                                                4. People with wider noses / live / in warm, humid areas.// <br/><br/>
                                                                5. People with narrower noses / live / in colder, drier places.// <br/><br/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="search-Btn mt20 h36 p_re mb20">
                                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right">
                                                        <span class="tx-purple-gray">목록</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div id="ch2" class="tabLink">
                                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                                    <colgroup>
                                                        <col style="width: 550px;">
                                                        <col style="width: 150px;">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                                            <th class="w-date normal">2018-00-00 00:00</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                                                <ul class="up-file">
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                                                A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                                                1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                                                Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                                                2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                                                사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                                                3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                                                석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="search-Btn mt20 h36 p_re mb20">
                                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right">
                                                        <span class="tx-purple-gray">목록</span>
                                                    </button>
                                                </div>
                                            </div>

                                            <div id="ch3" class="tabLink">
                                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdt-gray bdb-gray tx-gray">
                                                    <colgroup>
                                                        <col style="width: 550px;">
                                                        <col style="width: 150px;">
                                                    </colgroup>
                                                    <thead>
                                                        <tr>
                                                            <th class="w-list tx-left pl30"><strong>답안 제목이 노출됩니다.</strong><span class="row-line">|</span></th>
                                                            <th class="w-date normal">2018-00-00 00:00</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-file tx-left pt-zero pb-zero" colspan="2">
                                                                <ul class="up-file">
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일3가 노출됩니다.docx</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-file tx-left pt20 pl30 pr30" colspan="2">
                                                                A. 다음 각 문장을 끊어진 대로 해석하시오.<br/>
                                                                1. Riyadh, / the Saudi capital, / offers cheap cost of living / in a more stable environment, / with price controls on staples in Saudi Arabia continuing to guarantee low prices for many goods.//<br/>
                                                                Riyadh는 / 사우디의 수도인 / 낮은 생계비를 요구한다 / 보다 안정적인 환경에서, / 사우디 아라비아에서 주 요품목 가격 통제를 통해 / 많은 상폼의 낮은 가격 보장을 지속하면서.<br/><br/>

                                                                2. Saudi Arabia has / enough recoverable oil / to maintain current levels of production for 90 years.<br/>
                                                                사우디 아라비아는 가지고 있다 / 충분한 원유를 / 90년 간 현재 생산 수준을 유지할.<br/><br/>

                                                                3. Trends / in oil output and the global oil market / will remain a key determinant of the country's long-term prospects.<br/>
                                                                석유 생산과 국제 석유 시작의 경향은 / 유지될 것이다 / 국가의 장기적 전망의 핵심 결정 요인으로서.<br/><br/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table cellspacing="0" cellpadding="0" class="listTable editTable upper-gray bdb-gray tx-gray fc-bd-none">
                                                    <colgroup>
                                                        <col style="width: 115px;">
                                                        <col style="width: 585px;">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr>
                                                            <th class="w-tit bg-light-white strong">첨삭첨부</th>
                                                            <td class="w-file tx-left pt-zero pb-zero">
                                                                <ul class="up-file">
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a></li>
                                                                    <li><a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>    
                                                <div class="search-Btn mt20 h36 p_re mb20">
                                                    <button type="submit" onclick="" class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_right">
                                                        <span class="tx-purple-gray">목록</span>
                                                    </button>
                                                </div>                                            
                                            </div>                                            
                                        </div>
                                    </div> 
                                </div>                                
                            </div>                            
                        </div>                        
                    </div>
                </div>
            </div><!--첨삭 팝업//-->

            <!--강사선택현황보기 팝업-->
            <div id="profLook" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h800 fix abs">
                    <a class="closeBtn" href="#none" onclick="closeWin('profLook')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    {{--강사선택현황--}}
                    <div>
                        <div class="Layer-Tit tx-dark-black NG">강사선택현황</div> 
                        <div class="lecMoreWrap of-hidden h700">                    
                            <div class="PASSZONE-List widthAutoFull">
                                <div class="lecTitle NG">
                                    21_노무_2차유예[20/09~21/08]_10%할인
                                </div>
                                
                                <div class="PASSZONE-Lec-Section">
                                    <div class="strong mt25 tx-gray h22 mb10">
                                        · 최종 선택한 과목 및 강사에 대한 현황을 확인하실 수 있습니다.
                                    </div>

                                    <div class="c_both mb20">
                                        <ul class="tabWrap tabDepthPass">
                                            <li><a href="#subjecttab3" class="on">필수과목</a></li>
                                            <li><a href="#subjecttab4">선택과목</a></li>
                                        </ul>                                
                                    </div>

                                    <div class="LeclistTable bdt-gray mt25 mb30 c_both" id="subjecttab3">                                
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 8%;">
                                                <col style="width: 8%;">
                                                <col>
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>과정</th>
                                                    <th>과목</th>
                                                    <th>교수</th>
                                                    <th>수강형태</th>
                                                    <th>단과반명</th>
                                                    <th>개강일~종강일 </th>
                                                    <th>요일(회차)</th>
                                                    <th>교재구매</th>
                                                </tr>
                                            </thead>
                                            </tbody>
                                                <tr>
                                                    <td>GS1순환</td>
                                                    <td>형법 </td>
                                                    <td>교수명1 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>월수금(13회차)</td>
                                                    <td><a href="#" class="buyBook">교재구매</a></td>
                                                </tr>
                                                <tr>
                                                  <td>GS1순환</td>
                                                  <td>민법 </td>
                                                    <td>교수명3 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>수목금(13회차) </td>
                                                    <td><a href="#">교재구매</a></td>
                                                </tr>
                                                <tr>
                                                  <td>GS1순환</td>
                                                  <td>행정법 </td>
                                                    <td>교수명7 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>화목(13회차) </td>
                                                    <td><a href="#">교재구매</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox">적용</a></div>
                                    </div>

                                    <div class="LeclistTable bdt-gray mt25 mb30 c_both" id="subjecttab4">
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 8%;">
                                                <col style="width: 8%;">
                                                <col>
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                                <col style="width: 10%;">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>과정</th>
                                                    <th>과목</th>
                                                    <th>교수</th>
                                                    <th>수강형태</th>
                                                    <th>단과반명</th>
                                                    <th>개강일~종강일 </th>
                                                    <th>요일(회차)</th>
                                                    <th>교재구매</th>
                                                </tr>
                                            </thead>
                                            </tbody>
                                                <tr>
                                                    <td>GS1순환</td>
                                                    <td>형법 </td>
                                                    <td>교수명1 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>월수금(13회차)</td>
                                                    <td><a href="#">교재구매</a></td>
                                                </tr>
                                                <tr>
                                                  <td>GS1순환</td>
                                                  <td>민법 </td>
                                                    <td>교수명3 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>수목금(13회차) </td>
                                                    <td><a href="#">교재구매</a></td>
                                                </tr>
                                                <tr>
                                                  <td>GS1순환</td>
                                                  <td>행정법 </td>
                                                    <td>교수명7 </td>
                                                    <td>형태</td>
                                                    <td class="tx-left">단과반명이 출력됩니다. </td>
                                                    <td>2020-00-00~<br>2020-00-00 </td>
                                                    <td>화목(13회차) </td>
                                                    <td><a href="#">교재구매</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="btnAuto130 mt20 tx-white tx14 strong"><a href="#" class="bBox blueBox">적용</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- PASSZONE-List -->
                        </div>
                    </div>

                    {{--교재구매--}}
                    <div>
                        <div class="Layer-Tit tx-dark-black NG">교재구매</div> 
                        <div class="lecMoreWrap of-hidden h700">                    
                            <div class="PASSZONE-List widthAutoFull">
                                <div class="strong mt25 tx-gray h22 mb10">
                                    · 수강중인 강좌에 관련된 교재를 주문하실수 있습니다.
                                </div>
                                
                                <div class="PASSZONE-Book-Section">
                                    <div class="LeclistTable bdt-gray mt25 mb30 c_both">                                
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 5%;">
                                                <col style="width: 10%;">
                                                <col>
                                                <col style="width: 12%;">
                                                <col style="width: 12%;">
                                            </colgroup>
											<tbody>
                                                <tr>
                                                    <td><input name="" type="checkbox" value="" /></td>
                                                    <td class="tx-blue">주교재</td>
                                                    <td class="tx-left">2020 김원욱 형법 3.0(2쇄)</td>
                                                    <td><span class="tx-red">품절</span></td>
                                                    <td>47,700원<span class="tx-blue">(↓10%)</span></td>
                                                </tr>
                                                <tr>
                                                    <td><input name="" type="checkbox" value="" /></td>
                                                    <td class="tx-blue">부교재</td>
                                                    <td class="tx-left">2020 김원욱 형법 3.0(2쇄)</td>
                                                    <td><span class="tx-blue">판매중</span></td>
                                                    <td>30,000원<span class="tx-blue">(↓10%)</span></td>
                                                </tr>
                                                <tr>
                                                  	<td><input name="" type="checkbox" value="" /></td>
                                                  	<td class="tx-blue">수험생교재</td>
                                                    <td class="tx-left">2020 김원욱 형법 3.0(2쇄)</td>
                                                    <td><span class="tx-blue">판매중</span></td>
                                                    <td>0원</td>
                                                </tr>
                                                <tr>
                                                  <td colspan="3">
                                                    상품주문금액
                                                    <div class="tx14 tx-blue strong">0원</div>
                                                  </td>
                                                  <td colspan="2" class="bg-light-white">
                                                    최종결제금액
                                                    <div class="tx18 tx-blue strong">0원</div>
                                                  </td>
                                                </tr>
                                        	</tbody>
                                        </table>
                                        <div class="mt10 tx-red">* 30,000원 이상 교재 구매 시 배송료는 무료입니다.</div>
                                        <div class="mt10 tx-right">
                                            <span class="btnAuto130 tx-white tx14 strong">
                                                <a href="#" class="bBox bg-heavy-gray">장바구니</a>
                                            </span>
                                            <span class="btnAuto130 tx-white tx14 strong">
                                                <a href="#" class="bBox blueBox">바로결제</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- PASSZONE-List -->
                        </div>
                    </div>
                </div>
            </div>

            <!--보강/복습동영상  신청 팝업-->
            <div id="supplementLec" class="willbes-Layer-Black">
                <div class="willbes-Layer-PassBox willbes-Layer-PassBox1100 h800 fix abs">
                    <a class="closeBtn" href="#none" onclick="closeWin('supplementLec')">
                        <img src="{{ img_url('sub/close.png') }}">
                    </a>
                    <div>
                        <div class="Layer-Tit tx-dark-black NG">보강/복습동영상 신청</div> 
                        <div class="lecMoreWrap of-hidden h700">                    
                            <div class="PASSZONE-List widthAutoFull">                               
                                <div class="PASSZONE-Lec-Section">
                                    <div class="strong mt25 h22">
                                        · 회원정보
                                    </div>

                                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">                                
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 20%;">
                                                <col style="width: 30%;">
                                                <col style="width: 20%;">
                                                <col style="width: 30%;">
                                            </colgroup>
                                            </tbody>
                                                <tr>
                                                    <th>회원명</th>
                                                    <td>홍길동</td>
                                                    <th>아이디</th>
                                                    <td>ABC***</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="strong h22">
                                        · 강좌정보
                                    </div>

                                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 20%;">
                                                <col style="width: 30%;">
                                                <col style="width: 20%;">
                                                <col style="width: 30%;">
                                            </colgroup>
                                            </tbody>
                                                <tr>
                                                    <th>종합반명</th>
                                                    <td colspan="3"> [2020학년도]민쌤의 유아임용 합격생 간담회</td>
                                                </tr>
                                                <tr>
                                                    <th>과목</th>
                                                    <td>유아</td>
                                                    <th>강사명</th>
                                                    <td>민정선</td>
                                                </tr>
                                                <tr>
                                                    <th>강좌명</th>
                                                    <td colspan="3" class="tx-blue">2020 (9~10월) 실전 모의고사반 (7주)</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="strong h22 tx-blue">
                                        · 보강/복습동영상 신청하기
                                    </div>

                                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 20%;">
                                                <col>
                                            </colgroup>
                                            </tbody>
                                                <tr>
                                                    <th>신청현황</th>
                                                    <td class="w-info tx-left pl10">[총 신청 가능 개수] 2개  <span class="row-line">|</span>  [사용개수] 2개   <span class="row-line">|</span>  [남은개수] 1개</td>
                                                </tr>
                                                <tr>
                                                    <th>수업불참강의</th>
                                                    <td class="w-info tx-left pl10">
                                                        <select id="" name="" title="" class="seleProcess">
                                                            <option>강의선택</option>
                                                            <option>강의1</option>
                                                            <option>강의2</option>
                                                            <option>강의3</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>불참사유</th>
                                                    <td class="w-info tx-left pl10"><textarea class="h55"></textarea></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="mt10 mb10 lh1_5">
                                        ⓘ 주의사항<br>
                                            - 보강/복습동영상 1회 신청 시 1회차 신청만 가능합니다.<br>
                                            - 보강/복습동영상은 2일 기간으로 제공되며, 수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.<br>
                                            - 신청한 보강/복습동영상은 내강의실 > 학원강좌 > 보강/복습동영상 메뉴에서 확인 가능합니다.<br>
                                            - 보강/복습동영상 신청은 종강 후 14일 이내까지 신청 가능합니다.
                                        </div>
                                        <div class="bBox d_block btnAuto250 mt20 tx-white tx14 strong blueBox"><a href="#">보강/복습동영상 신청 ></a></div>
                                    </div>

                                    <div class="strong h22">
                                        [보강/복습동영상 신청이력]
                                    </div>

                                    <div class="LeclistTable bdt-gray mt10 mb30 c_both">
                                        <table class="listTable passTable-Select under-gray tx-gray">
                                            <colgroup>
                                                <col style="width: 10%;">
                                                <col style="width: 20%;">
                                                <col style="width: 15%;">
                                                <col>
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>신청일</th>
                                                    <th>신청자</th>
                                                    <th>불참사유</th>
                                                </tr>
                                            </thead>
                                            </tbody>
                                                <tr>
                                                    <td>2</td>
                                                    <td>2021-00-00 15:35</td>
                                                    <td>홍길동</td>
                                                    <td>병가로 결석</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2021-00-00 15:35</td>
                                                    <td>홍길동</td>
                                                    <td>병가로 결석</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- PASSZONE-List -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- willbes-Leclist -->
    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop