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
                    <a href="{{ site_url('/home/html/prof') }}">교수진소개</a>
                </li>
                <li>
                    <a href="#none">PASS</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/package1') }}">패키지</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                        <li class="Tit">패키지</li>
                            <li><a href="{{ site_url('/home/html/package1') }}">추천 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/package2') }}">선택 패키지</a></li>
                            <li><a href="{{ site_url('/home/html/diypackage') }}">DIY 패키지</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ site_url('/home/html/list') }}">단강좌</a>
                </li>
                <li>
                    <a href="#none">무료강좌</a>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/mocktest1') }}">수험정보</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">수험정보</li>
                            <li><a href="{{ site_url('/home/html/mocktest1') }}">시험공고</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest2') }}">수험뉴스</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest3') }}">기출문제</a></li>
                            <li><a href="#none">공무원가이드</a></li>
                            <li><a href="#none">초보합격전략</a></li>
                            <li><a href="{{ site_url('/home/html/mocktest6_1') }}">모의고사</a></li>
                        </ul>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="{{ site_url('/home/html/event_ing') }}">이벤트</a>
                    <div class="drop-Box list-drop-Box">
                        <ul>
                            <li class="Tit">이벤트</li>
                            <li><a href="{{ site_url('/home/html/event_ing') }}">진행중인 이벤트</a></li>
                            <li><a href="{{ site_url('/home/html/event_end') }}">마감된 이벤트</a></li>
                        </ul>
                    </div>
                </li>
                <li class="Acad">
                    <a href="#none">경찰학원 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>패키지</strong></span>
        <span class="2depth"><span class="depth-Arrow">></span><strong>선택패키지</strong></span>
    </div>
    <div class="Content p_re">

        <div class="willbes-Package-Detail NG tx-black">
            <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                <colgroup>
                    <col style="width: 135px;"/>
                    <col style="width: 1px;"/>
                    <col style="width: 804px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-list tx-center">문제풀이</td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">2017 이현나 국어 문제풀이 패키지</div>
                            <dl class="w-info">
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
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- willbes-Package-Detail -->

        <div class="willbes-Lec-Package-Price p_re">
            <div class="total-PriceBox NG">
                <span class="price-tit">총 주문금액</span>
                <span class="row-line">|</span>
                <!--span>
                    <span class="price-txt">패키지</span>
                    <span class="tx-light-blue">140,000원</span>
                </span-->
                <span>
                    <span class="price-txt">패키지</span>
                    <span class="tx-dark-gray">140,000원</span>
                    <span class="tx-pink pl10">(↓10%)</span>
                    <span class="pl10"> ▶ </span>
                    <span class="tx-light-blue pl10">126,000원</span>
                </span>
                <span class="price-img">
                    <img src="{{ img_url('sub/icon_plus.gif') }}">
                </span>
                <span>
                    <span class="price-txt">교재</span>
                    <span class="tx-light-blue">48,600원</span>
                </span>
                <span class="price-total tx-light-blue">188,600원</span>
            </div>
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
        </div>
        <!-- willbes-Lec-Package-Price -->

        <a name="Info"></a>
        <div class="willbes-Class c_both">
            <div class="willbes-Lec-Tit NG tx-black">패키지정보</div>
            <div class="classInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">
                                패키지유의사항<br/>
                                <span class="tx-red">(필독)</span>
                            </td>
                            <td class="w-data tx-left pl25">
                                LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지유의사항(필독)’ 항목에입력된정보가<br/>
                                자동출력됩니다. (온라인상품기준)
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">패키지소개</td>
                            <td class="w-data tx-left pl25">
                                LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지소개’ 항목에입력된정보가<br/>
                                자동출력됩니다. (온라인상품기준)
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">패키지특징</td>
                            <td class="w-data tx-left pl25">
                                LMS > 상품관리> [온라인]상품관리> 운영자패키지메뉴의‘패키지특징’ 항목에입력된정보가<br/>
                                자동출력됩니다. (온라인상품기준)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Class -->

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">강좌구성 및 교재선택</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                <table cellspacing="0" cellpadding="0" class="lecTable">
                    <colgroup>
                        <col style="width: 760px;">
                        <col style="width: 180px;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-lectit tx-left" colspan="2">
                                <span class="w-obj NSK"><div class="pBox p2">패키지</div></span>
                                <!--span class="MoreBtn"><a href="#Info">패키지정보 보기 ▼</a></span-->
                            </td>
                        </tr>
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">2017 이현나 국어 문제풀이 패키지</div>
                            </td>
                            <td class="w-notice p_re">
                                <div class="priceWrap">
                                    <span class="price tx-blue">80,000원</span>
                                    <span class="discount">(↓20%)</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- lecTable -->
            </div>
            <!-- willbes-Buy-PackageList -->

            <div id="Sticky" class="sticky-Wrap">
                <div class="sticky-Grid sticky-menu select-menu NG">
                    <ul class="tabWrap">
                        <li><a href="#none" onclick="movePos('#Required');">필수과목 ▼</a></li>
                        <li><a href="#none" onclick="movePos('#Choose');">선택과목 ▼</a></li>
                    </ul>
                </div>
            </div>
            <!-- sticky-menu -->

            <!-- pos1 --> 
            <div id="pos1" class="pt35">
                <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                    <a id="Required" name="Required" class="sticky-top" style="top: 10px;"></a>
                    · 필수과목<span class="willbes-Lec-subTit">(과목별 1개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                </div>
            </div>
            <table cellspacing="0" cellpadding="0" class="lecWrapTable">
                <colgroup>
                    <col style="width: 75px;">
                    <col style="width: 865px;">
                </colgroup>
                <tbody>
                    <tr> 
                        <td class="w-list tx-center bg-light-gray" rowspan="2">국어</td>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">이현나</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 이현나 국어 기출문제(11-12월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20">                                       
                                                        <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                            <strong>강좌상세정보</strong>
                                                        </a>
                                                    </dt>
                                                    <dt>강의수 : <span class="tx-blue">47강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">90,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n2">진행중</span>
                                                        <span class="nBox n3">예정</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                    <tr>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-1.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">정채영</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 정채영 국어 심화이론(7-8월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">107강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">140,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                </tbody>
            </table>

            <table cellspacing="0" cellpadding="0" class="lecWrapTable">
                <colgroup>
                    <col style="width: 75px;">
                    <col style="width: 865px;">
                </colgroup>
                <tbody>
                    <tr> 
                        <td class="w-list tx-center bg-light-gray" rowspan="2">영어</td>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-2.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">한덕현</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 한덕현 제니스영어 기본문법(홀수편)(7-8월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">44강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">75,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n3">예정</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
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
                        </td>
                    </tr>
                    <tr>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-3.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">이리라</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 이리라 영어 Take-Out 기초영문법/통문장 기출독해(1-2월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">60강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">140,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n2">진행중</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- pos1 -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>

            <!-- pos2 -->
            <div id="pos2" class="pt35 mt10"> 
                <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                    <a id="Choose" name="Choose" class="sticky-top" style="top: 10px;"></a>
                    · 선택과목<span class="willbes-Lec-subTit">(선택과목 중 2개 선택)</span><span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
                </div>
            </div>
            <table cellspacing="0" cellpadding="0" class="lecWrapTable">
                <colgroup>
                    <col style="width: 75px;">
                    <col style="width: 865px;">
                </colgroup>
                <tbody>
                    <tr> 
                        <td class="w-list tx-center bg-light-gray" rowspan="2">국어</td>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">이현나</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 이현나 국어 기출문제(11-12월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">47강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">90,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n2">진행중</span>
                                                        <span class="nBox n3">예정</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                    <tr>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-1.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">정채영</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 정채영 국어 심화이론(7-8월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">107강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">140,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n1">2배수</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                </tbody>
            </table>

            <table cellspacing="0" cellpadding="0" class="lecWrapTable">
                <colgroup>
                    <col style="width: 75px;">
                    <col style="width: 865px;">
                </colgroup>
                <tbody>
                    <tr> 
                        <td class="w-list tx-center bg-light-gray" rowspan="2">영어</td>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-2.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">한덕현</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 한덕현 제니스영어 기본문법(홀수편)(7-8월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">44강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">75,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n3">예정</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
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
                        </td>
                    </tr>
                    <tr>
                        <td class="bdb-dark-gray">
                            <div class="willbes-Lec-Table">
                                <table cellspacing="0" cellpadding="0" class="lecTable">
                                    <colgroup>
                                        <col style="width: 50px;">
                                        <col style="width: 60px;">
                                        <col style="width: 575px;">
                                        <col style="width: 180px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                            <td class="w-img"><img src="{{ img_url('sample/prof3-3.jpg') }}"></td>
                                            <td class="w-data tx-left pl25">
                                                <dl class="w-info">
                                                    <dt class="w-name">이리라</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="w-tit">2017 이리라 영어 Take-Out 기초영문법/통문장 기출독해(1-2월)</dt>
                                                </dl>
                                                <dl class="w-info">
                                                    <dt class="mr20"><strong>강좌상세정보</strong></dt>
                                                    <dt>강의수 : <span class="tx-blue">60강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>정상가 : <span class="tx-blue">140,000원</span></dt>
                                                    <dt class="NSK ml15">
                                                        <span class="nBox n2">진행중</span>
                                                        <span class="nBox n4">완강</span>
                                                    </dt>
                                                </dl>
                                            </td>
                                            <td class="w-notice p_re">
                                                <div class="w-sp one">
                                                    <a href="#none">맛보기</a>
                                                </div>
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 865px;">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="w-sub">
                                                    <span class="w-obj tx-blue tx11">수강생 교재</span> 
                                                    <span class="w-subtit">햇살국어기출을보다79급진도별기출모의고사(초판)</span>
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
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecInfoTable -->
                            </div>
                            <!-- willbes-Lec-Table -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- pos2 -->

            <div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div>            

            <!--div class="TopBtn">
                <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
            </div-->
            
        </div>
        <!-- willbes-Lec -->

        <div id="InfoForm" class="willbes-Layer-Box d2">
            <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">
                2018 최진우 독한국사 이론강의 (7-8월)[이론/끝장전/주간스포트라이트] 독구다 패키지
            </div>
            <div class="lecDetailWrap">
                <div class="classInfo">
                    <dl class="w-info NG">
                        <dt>개강일 : <span class="tx-blue">2017년 07월 11일</span></dt>
                        <dt><span class="row-line">|</span></dt>
                        <dt>수강기간 : <span class="tx-blue">100일</span></dt>
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
        </div>
        <!-- willbes-Layer-Box -->

    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop