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
            <span class="depth-Arrow">></span><strong>학원강좌</strong>
            <span class="depth-Arrow">></span><strong>수강종료강좌</strong>
        </span>
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
                            <col style="width: 160px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">[영어강화형_분납] 8개월 슈퍼PASS(원) [1/13~8/31]</div>
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                                <td class="w-answer p_re">
                                    <a href="#none" onclick="openWin('lecList')"><span class="bBox grayBox">강좌구성보기</span></a>
                                    <div id="lecList" class="willbes-Layer-lecList">
                                        <a class="closeBtn" href="#none" onclick="closeWin('lecList')">
                                            <img src="{{ img_url('prof/close.png') }}">
                                        </a>
                                        <div class="Layer-Cont">
                                            <div class="Layer-SubTit tx-gray">
                                                <ul>
                                                    <li>
                                                        형소법 기본(단과)[1/6-1/24]
                                                        <div>
                                                            <a href="#none" onclick="openWin('supplementLec')" class="blue">보강동영상신청</a>
                                                        </div>
                                                    </li>
                                                    <li>경찰학 기본(단과)[1/6~2/18]</li>
                                                    <li>형법 기본(단과)[1/28~2/14]</li>
                                                    <li>영어 기본(단과) [1/8~2/21]</li>
                                                    <li>원유철한국사 기본(단과)[2/17~3/6]</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">★기본서제공★기본종합(원)[1/6~3/6]</div>
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                                <td class="w-answer p_re">
                                    <a href="#none"><span class="bBox grayBox">강좌구성보기</span></a>                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <div class="w-tit">[9급 일행] 2개월 진도별 문제풀이반 4과목 (20.1-2)</div>
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                                <td class="w-answer p_re">
                                    <a href="#none"><span class="bBox grayBox">강좌구성보기</span></a>  
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

            <div id="Mypagetab2">
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
                        <select id="process" name="process" title="process" class="seleProcess f_left">
                            <option selected="selected">과정</option>
                            <option value="헌법">헌법</option>
                            <option value="스파르타반">스파르타반</option>
                            <option value="공직선거법">공직선거법</option>
                        </select>
                        <div class="inputBox p_re">
                            <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강좌명을 검색해 주세요" maxlength="30" style="width: 220px;">
                            <button type="submit" onclick="" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col style="width: 550px;">
                            <col style="width: 220px;">
                            <col style="width: 170px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-data tx-left pl10">
                                    <dl class="w-info">
                                        <dt>
                                            기본이론<span class="row-line">|</span>영어<span class="row-line">|</span>
                                            한덕현 교수님
                                        </dt>
                                    </dl>
                                    <div class="w-tit"><span class="tx-blue">실강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                    <div class="lookover">
                                        {{--
                                        <a href="#none" onclick="openWin('lookOver')">온라인첨삭 ></a>
                                        <a href="#none" onclick="openWin('profLook')" class="buyBook">교재구매 ></a>
                                        --}}
                                        <a href="#none" onclick="openWin('supplementLec')" class="supplement">보강동영상신청 ></a>
                                    </div>
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
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
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
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
                                            한덕현교수님
                                        </dt>
                                    </dl>
                                    <div class="w-tit"><span class="tx-blue">라이브+인강</span> 2018 [지방직/서울시] 정채영 국어 필살모고 Ⅲ-Ⅳ 및 국문학 종결자 패키지</div>
                                </td>
                                <td class="w-period">2018.10.20 ~ 2018.11.20</td>
                                <td class="w-schedule">
                                    화,금<br/>
                                    8회차
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="tx-center">수강종료 강좌 정보가 없습니다.</td>
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
        <!-- willbes-Leclist -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop