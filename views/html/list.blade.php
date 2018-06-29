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
        <span class="1depth"><span class="depth-Arrow">></span><strong>단강좌</strong></span>
    </div>
    <div class="Content p_re">
        
        <div class="curriWrap c_both">
            <ul class="curriTabs c_both">
                <li><a class="on" href="#none">전체</a></li>
                <li><a href="#none">이론과정</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문풀 1단계 핵심요약/진도별</a></li>
                <li><a href="#none">문풀 2단계 동형 모의고사</a></li>
                <li><a href="#none">문풀 3단계 파이널 모의고사</a></li>
                <li><a href="#none">심화과정</a></li>
                <li><a href="#none">문제풀이</a></li>
                <li><a href="#none">특강</a></li>
            </ul>
            <div class="CurriBox">
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
                            <th class="tx-gray">직렬선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none">전체</a></li>
                                    <li><a href="#none">사회복지학</a></li>
                                    <li><a href="#none">국어</a></li>
                                    <li><a href="#none">영어</a></li>
                                    <li><a href="#none">한국사</a></li>
                                    <li><a href="#none">행정법</a></li>
                                    <li><a href="#none">행정학</a></li>
                                    <li><a href="#none">교육학</a></li>
                                    <li><a href="#none">수학</a></li>
                                    <li><a href="#none">독일어</a></li>
                                    <li><a href="#none">경영학</a></li>
                                    <li><a href="#none">일본어</a></li>
                                    <li><a href="#none">관세법</a></li>
                                    <li><a href="#none">공직선거법</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과목선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none">전체</a></li>
                                    <li><a href="#none">사회복지학</a></li>
                                    <li><a href="#none">국어</a></li>
                                    <li><a href="#none">영어</a></li>
                                    <li><a href="#none">한국사</a></li>
                                    <li><a href="#none">행정법</a></li>
                                    <li><a href="#none">행정학</a></li>
                                    <li><a href="#none">교육학</a></li>
                                    <li><a href="#none">수학</a></li>
                                    <li><a href="#none">독일어</a></li>
                                    <li><a href="#none">경영학</a></li>
                                    <li><a href="#none">일본어</a></li>
                                    <li><a href="#none">관세법</a></li>
                                    <li><a href="#none">공직선거법</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">교수선택</th>
                            <td colspan="9" class="tx-blue tx-left">* 과목 선택시 과목별 교수진을 확인하실 수 있습니다. 과목을 먼저 선택해 주세요!</td>
                            <!-- 과목선택 시 해당 과목 교수 출력
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                    <li><a href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                    <li><a href="#none">정채영</a></li>
                                    <li><a href="#none">기미진</a></li>
                                    <li><a href="#none">김세령</a></li>
                                    <li><a href="#none">오대혁</a></li>
                                    <li><a href="#none">이현나</a></li>
                                </ul>
                            </td>
                            -->
                        </tr>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                                <span>
                                    <input type="radio" id="YEAR_SAVE_ALL" name="YEAR_SAVE_ALL" class="iptSave">
                                    <label for="YEAR_SAVE_ALL" class="yearSave">전체</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2019" name="YEAR_SAVE_2019" class="iptSave">
                                    <label for="YEAR_SAVE_2019" class="yearSave">2019년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2018" name="YEAR_SAVE_2018" class="iptSave">
                                    <label for="YEAR_SAVE_2018" class="yearSave">2018년</label>
                                </span>
                                <span>
                                    <input type="radio" id="YEAR_SAVE_2017" name="YEAR_SAVE_2017" class="iptSave">
                                    <label for="YEAR_SAVE_2017" class="yearSave">2017년</label>
                                </span>
                            </td>
                            <td class="All-Clear">
                                <a href="#none"><img src="{{ img_url('sub/icon_clear.gif') }}" style="margin: -2px 6px 0 0">전체해제</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->

        <div class="willbes-Bnr">
            <img src="{{ img_url('sample/bnr1.jpg') }}">
        </div>
        <!-- willbes-Bnr -->

        <div class="willbes-Lec-Search mb60">
            <div class="inputBox p_re">
                <label for="SEARCH" class="labelSearch" style="display: block;">강의명</label>
                <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" maxlength="30">
                <button type="submit" onclick="" class="search-Btn">
                    <span>검색</span>
                </button>
            </div>
            <div class="InfoBtn"><a href="#none">수강신청안내 <span>▶</span></a></div>
        </div>
        <!-- willbes-Lec-Search -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">· 국어<span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span></div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Profdata tx-dark-black">
                <ul>
                    <li class="ProfImg"><img src="{{ img_url('sample/prof1.png') }}"></li>
                    <li class="ProfDetail">
                        <div class="Obj">
                            공무원 국어종결자<br/>정채영 국어
                        </div>
                        <div class="Name">정채영 교수님</div>
                    </li>
                    <li class="Reply tx-blue">
                        <strong>수강후기</strong>
                        <dl class="roll-Reply tx-dark-black">
                            <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                            <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                            <dt>국어 정말 약했는데 정채영국어를 알게되서 정말 다행이라고 생각합니다.</dt>
                        </dl>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-Profdata -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/home/html/listsub') }}">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#ch1" onclick="openLink('ch1','hover1'),openWin('InfoForm')">
                                            <strong>강좌상세정보</strong>
                                        </a>
                                    </dt>
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
                            </td>
                            <td class="chk buybtn p_re">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                <div class="willbes-Lec-buyBtn-sm">
                                    <div>
                                        <button type="submit" onclick="" class="bg-deep-gray">
                                            <span>장바구니</span>
                                        </button>
                                    </div>
                                    <div>
                                        <button type="submit" onclick="" class="bg-dark-blue">
                                            <span>바로결제</span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="w-notice p_re">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none" onclick="openWin('viewBox')">맛보기</a></li>
                                </ul>
                                <div id="viewBox" class="viewBox">
                                    <dl class="NSK">
                                        <dt class="Tit NG">맛보기1</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                    </dl>
                                    <dl class="NSK">
                                        <dt class="Tit NG">맛보기2</dt>
                                        <dt class="tBox t1 black"><a href="">HIGH</a></dt>
                                        <dt class="tBox t2 gray"><a href="">LOW</a></dt>
                                    </dl>
                                </div>
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                    <span class="w-subtit">2018 정채영국어마무리시리즈[문학편]_137작품을알려주마(제2판)</span>
                                    <span class="chk">
                                        <label>[판매중]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">30,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">주교재</span> 
                                    <span class="w-subtit">정채영 국어 마무리 시리즈(핵심정리편) 70테마로 끝내주마!(제2판)</span>
                                    <span class="chk">
                                        <label class="soldout">[품절]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">20,000원</span>
                                        <span class="discount">(↓10%)</span>
                                    </span>
                                </div>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">부교재</span> 
                                    <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                    <span class="chk">
                                        <label class="press">[출간예정]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">0원</span>
                                    </span>
                                </div>
                                <div class="w-sub ml10">
                                    <a href="#ch2" onclick="openLink('ch2','hover2'),openWin('InfoForm')"><strong>교재상세정보</strong></a> 
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">정채영</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [지방직/서울시] 정채영 국어 [문학집중강의]137작품을 알려주마!(4-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
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
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice p_re">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->
        </div>
        <!-- willbes-Lec -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Profdata tx-dark-black">
                <ul>
                    <li class="ProfImg"><img src="{{ img_url('sample/prof2.png') }}"></li>
                    <li class="ProfDetail">
                        <div class="Obj">
                            국어강의의 뉴 패러다임!<br/>듣기만 해도 암기되는 강의
                        </div>
                        <div class="Name">기미진 교수님</div>
                    </li>
                    <li class="Reply tx-blue">
                        <strong>수강후기</strong>
                        <dl class="roll-Reply tx-dark-black">
                            <dt>과락점수 정도 유지였는데... 70점대로 문풀만으로 그냥 올라갔어요 짱짱</dt>
                            <dt>과락점수 정도 유지였는데... 70점대로 문풀만으로 그냥 올라갔어요 짱짱</dt>
                            <dt>과락점수 정도 유지였는데... 70점대로 문풀만으로 그냥 올라갔어요 짱짱</dt>
                        </dl>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-Profdata -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">유료특강</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 기미진 국어 아침 실전 동형모의고사 특강[국가직~서울시](3-6개월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                    <dt>강의수 : <span class="tx-blue">48강 (예정)</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">100일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n2">진행중</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice p_re">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-obj tx-blue tx11">부교재</span> 
                                    <span class="w-subtit">2018 정채영 국어 마무리 시리즈(a적중문제편) 19문제만 찍어주마!(전정2판)</span>
                                    <span class="chk">
                                        <label class="press">[출간예정]</label>
                                        <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk" disabled>
                                    </span>
                                    <span class="priceWrap">
                                        <span class="price tx-blue">0원</span>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table -->

            <div class="willbes-Lec-Table">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 85px;">
                        <col style="width: 490px;">
                        <col style="width: 110px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list">문제풀이</td>
                            <td class="w-name">국어<br/><span class="tx-blue">기미진</span></td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">2018 [서울시대비] 기미진 기특한 국어 아침 실전동형모의고사 (5-6월)</div>
                                <dl class="w-info">
                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                    <dt>강의수 : <span class="tx-blue">16강 (예정)</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">40일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">2배수</span>
                                        <span class="nBox n3">예정</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="chk">
                                <input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk">
                            </td>
                            <td class="w-notice p_re">
                                <ul class="w-sp">
                                    <li><a href="#none">OT</a></li>
                                    <li><a href="#none">맛보기</a></li>
                                </ul>
                                <div class="priceWrap">
                                    <span class="price tx-blue">0원</span>
                                </div>
                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->

                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                    <colgroup>
                        <col style="width: 75px;">
                        <col style="width: 865px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td>&nbsp;</td>
                            <td>
                                <div class="w-sub">
                                    <span class="w-subtit none">※ 별도 구매 가능한 교재가 없습니다.</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecInfoTable -->
            </div>
            <!-- willbes-Lec-Table --> 
        </div>
        <!-- willbes-Lec -->

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