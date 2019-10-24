@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NSK c_both">
        <h3>
            <ul class="menu-Tit">
                <li class="Tit">경찰<span class="row-line">|</span></li>
                <li class="subTit">경찰학원</li>
            </ul>
        </h3>
    </div>
    <div class="mem-Tit mem-Acad-Tit">
        <img src="{{ img_url('login/logo.gif') }}">
        <span class="tx-blue">학원 방문결제 접수</span>
    </div>
    <div class="widthAuto">
        <div class="willbes-Package-Detail NG tx-black">
            <table cellspacing="0" cellpadding="0" class="packageDetailTable">
                <colgroup>
                    <col style="width: 135px;"/>
                    <col style="width: 1px;"/>
                    <col style="width: 984px;"/>
                </colgroup>
                <tbody>
                    <tr>
                        <td class="w-list tx-center">문제풀이</td>
                        <td class="w-line"><span class="row-line">|</span></td>
                        <td class="pl30">
                            <div class="w-tit">
                                [문풀종합] 집중형 종합반 서울시 대비 (5~6월)
                                <dl class="w-info">                                    
                                    <dt class="NSK">
                                        <span class="acadBox n1 ml15">방문+온라인</span>
                                    </dt>
                                </dl>
                            </div>
                            <dl class="w-info">
                                <dt>종합반유형 : <span class="tx-blue">선택형종합반</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>선택과목개수 : <span class="tx-blue">2개</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강형태 : <span class="tx-blue">혼합</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>접수기간 : <span class="tx-blue">2018-05-20 ~ 2018-05-30</span></dt>
                                <dt class="w-notice NSK ml15">
                                    <span class="acadInfo n2">접수중</span>
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
                <span>
                    <span class="price-txt">종합반</span>
                    <span class="tx-light-blue">180,000원</span>
                </span>
                <span class="price-total tx-light-blue">180,000원</span>
            </div>
            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">장바구니</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-Lec-Package-Price -->

        <div class="Content widthAuto810 p_re">

            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black" style="padding-top: 0; line-height: inherit">강좌구성 및 교재선택</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                        <colgroup>
                            <col style="width: 760px;">
                            <col style="width: 200px;">
                        </colgroup>
                        <tbody>
                            <tr class="w-info">
                                <td class="w-lectit tx-left" colspan="2">
                                    <dl>
                                        <dt class="NSK">
                                            <span class="acadBox n1 mr15">방문+온라인</span>
                                        </dt>
                                    </dl>
                                    <span class="MoreBtn"><a href="#Info">종합반정보 보기 ▼</a></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-data tx-left">
                                    <div class="w-tit">[지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]</div>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="priceWrap">
                                        <span class="price tx-blue">180,000원</span>
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
                    <div class="sticky-Grid sticky-menu select-menu acad-offline-menu810 NG">
                        <ul class="tabWrap">
                            <li><a href="#none" onclick="movePos('#Required');" class="on">필수과목 ▼</a></li>
                            <li><a href="#none" onclick="movePos('#Choose');">선택과목 ▼</a></li>
                        </ul>
                    </div>
                </div>
                <!-- sticky-menu -->

                <!-- pos1 -->
                <div id="pos1" class="pt35">
                    <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                        <a id="Required" name="Required" class="sticky-top" style="top: 10px;"></a>
                        · 필수과목
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
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                                <td class="w-img"><img src="{{ img_url('sample/prof3.jpg') }}"></td>
                                                <td class="w-data tx-left pl25">
                                                    <dl class="w-info">
                                                        <dt class="w-tit">이현나<span class="row-line">|</span>2017 이현나 국어 기출문제(11-12월)</dt>
                                                    </dl>
                                                    <dl class="w-info">
                                                        <dt class="mr20">                                       
                                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                                <strong>강좌상세정보</strong>
                                                            </a>
                                                        </dt>
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb-dark-gray">
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n1">접수예정</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
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
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb-dark-gray">
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
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
                        · 선택과목<span class="willbes-Lec-subTit">(전체 선택과목 중 2개를 선택해 주세요.)</span>
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
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n3">마감</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb-dark-gray">
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
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
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
                                </div>
                                <!-- willbes-Lec-Table -->
                            </td>
                        </tr>
                        <tr>
                            <td class="bdb-dark-gray">
                                <div class="willbes-Lec-Table">
                                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 60px;">
                                            <col style="width: 555px;">
                                            <col style="width: 200px;">
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
                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                                        <dt class="w-notice NSK ml15">
                                                            <span class="acadInfo n2">접수중</span>
                                                        </dt>
                                                    </dl>
                                                </td>
                                                <td class="w-schedule">
                                                    <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                    월화수목 (10회차)
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- lecTable -->
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

                <a name="Info"></a>
                <div class="willbes-Class c_both">
                    <div class="willbes-Lec-Tit NG tx-black">종합반상세정보</div>
                    <div class="classInfoTable GM">
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">종합반상세정보</td>
                                    <td class="w-data tx-left pl25">
                                        LMS > 상품관리 > [학원]상품관리 > 종합반 메뉴의 ‘강좌정보’ 항목에 입력된 정보가 자동 출력됩니다.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- willbes-Class -->

                <div class="TopBtn">
                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                </div>
                
            </div>
            <!-- willbes-Lec -->

            <div id="InfoForm" class="willbes-Layer-Box willbes-offLine-Layer-Box d3">
                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>
                <div class="Layer-Tit tx-dark-black NG">
                    2018 국가직대비 실전 동형모의고사 선택형 패키지
                </div>
                <div class="lecDetailWrap">
                    <div class="classInfo">
                        <dl class="w-info NG">
                            <dt>개강일 : <span class="tx-blue">18/5/1</span></dt>
                            <dt><span class="row-line">|</span></dt>
                            <dt>종료일 : <span class="tx-blue">18/6/30</span></dt>
                        </dl>
                    </div>
                    <div class="classInfoTable">
                        <table cellspacing="0" cellpadding="0" class="classTable under-black tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                                <tr>
                                    <td class="w-list bg-light-white">강좌정보</td>
                                    <td class="w-data tx-left pl25">
                                        LMS > 상품관리> [학원]상품관리> 단강좌 메뉴의 ‘강좌정보’ 항목에 입력된 정보가 자동 출력됩니다
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-Box -->

        </div>
        <div class="Aside widthAuto290 NG ml20">
            <div class="Tit tx-light-black">장바구니</div>
            <div class="Lec-Pocket-Grid">
                <div class="LecPocketlist">
                    <span class="oBox nyBox NSK mr10">노량진</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <!-- 쿠폰 미적용시 -->
                    <ul class="NSK">
                        <li class="aBox waitBox_block"><a href="#none" onclick="openWin('Coupon')">쿠폰적용</a></li>
                        <li class="price tx-blue f_right">80,000원</li>
                    </ul>
                    <!-- // 쿠폰 미적용시 -->
                </div>
                <div class="LecPocketlist">
                    <span class="oBox nyBox NSK mr10">노량진</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <!-- 쿠폰 적용시 -->
                    <dl class="mt25">
                        <dt class="aBox waitBox_block">쿠폰적용</dt>
                        <dt class="price tx-blue">75,000원 <span class="o-price tx-gray line-through">(80,000원)</span></dt>
                    </dl>
                    <dl class="mt5 tx-bright-gray">
                        <dt class="c-txt">쿠폰명 노출 쿠폰명 노출 쿠폰명 노출 쿠폰명 노출 쿠폰명 노출</dt>
                        <dt class="d-price">(5,000원할인)</dt>
                        <dt class="closeBtn">                        
                            <a href="#none"><img src="/public/img/willbes/cart/close.png"></a>
                        </dt>
                    </dl>
                    <!-- // 쿠폰 적용시 -->
                </div>
                <div class="LecPocketlist">
                    <span class="oBox smBox NSK mr10">신림</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <ul class="NSK">
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <li class="price tx-blue f_right">80,000원</li>
                    </ul>
                </div>
                <div class="LecPocketlist">
                    <span class="oBox nyBox NSK mr10">노량진</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <ul class="NSK">
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <li class="price tx-blue f_right">80,000원</li>
                    </ul>
                </div>
                <div class="LecPocketlist">
                    <span class="oBox nyBox NSK mr10">노량진</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <ul class="NSK">
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <li class="price tx-blue f_right">80,000원</li>
                    </ul>
                </div>
                <div class="LecPocketlist">
                    <span class="oBox smBox NSK mr10">신림</span>
                    <span class="w-tit p_re">
                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)
                        <a class="closeBtn" href="#none">
                            <img src="{{ img_url('cart/close.png') }}">
                        </a>
                    </span>
                    <ul class="NSK">
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <li class="price tx-blue f_right">80,000원</li>
                    </ul>
                </div>
            </div>
            <table cellspacing="0" cellpadding="0" class="listTable lecPocketTable tx-black p_re">
                <tbody>
                    <tr class="AllchkBox"><td><input type="checkbox" id="info_chk" name="info_chk" class="info_chk"></td></tr>
                    <tr class="replyList w-replyList">
                        <td class="w-tit">
                            유의사항을 모두 확인했고 동의합니다
                            <span class="arrow-Btn">></span>
                        </td>
                    </tr>
                    <tr class="replyTxt w-replyTxt bg-light-gray">
                        <td class="w-txt">
                            <div class="w-txt-Grid">
                                <input type="checkbox" id="info_chk" name="info_chk" class="info_chk">
                                <div class="info-txt">
                                    수강증 분실시 재발급/변경/환불되지 않으며,<br/>
                                    판매 및 양도되지 않습니다.<br/>
                                    <span class="tx-blue">(절도, 위.변조시 법적 책임이 따릅니다.)</span>
                                </div>
                            </div>
                            <div class="w-txt-Grid">
                                <input type="checkbox" id="info_chk" name="info_chk" class="info_chk">
                                <div class="info-txt">
                                    수강 총 횟수의 1/2 미경과시에만 변경 및<br/>
                                    환불이 가능합니다.
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="priceBox">
                <ul>
                    <li class="p-tit">금액</li>
                    <li class="w-price o-price tx-light-black NGEB">240,000원</li>
                </ul>
                <ul class="p_re">
                    <li class="p-tit">할인 
                        <span class="dropdown pl10">
                            <img src="{{ img_url('sub/icon_caution.gif') }}">
                            <div class="drop-Box academy-Box">
                                <dl>
                                    <dt>· 사용된 쿠폰의 총 할인금액이 노출됩니다.</dt>
                                    <dt>· 독서실연계할인은 수강료 정산시 독서실 열람증을<br/>
                                    &nbsp;&nbsp;관리자에게 제시하면 받을 수 있습니다.</dt>
                                </dl>
                            </div>
                        </span>
                    </li>
                    <li class="w-price d-price tx-light-pink NGEB">(-)5,000원</li>
                </ul>
                <ul>
                    <li class="p-tit">
                        <span class="a-txt">총</span>
                        <span class="tx-light-blue">3</span>건
                    </li>
                    <li class="w-price t-price tx-light-blue NGEB">235,000원</li>
                </ul>
            </div>

            <div class="btnAuto250 GM h36">
                <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                    <span class="">방문결제 접수</span>
                </button>
            </div>

        </div>
    </div>
</div>
<!-- End Container -->
@stop