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
            <ul class="menu-List">
                <li>
                    <a href="#none">교수진소개</a>
                </li>
                <li>
                    <a href="#none">종합반</a>
                </li>
                <li>
                    <a href="#none">단과</a>
                </li>
                <li>
                    <a href="#none">수험정보</a>
                </li>
                <li>
                    <a href="#none">학원소개</a>
                </li>
                <li class="Acad">
                    <a href="#none">신광은경찰 온라인 <span class="arrow-Btn">></span></a>
                </li>
            </ul>
        </h3>
    </div>
    <div class="Depth">
        <img src="{{ img_url('sub/icon_home.gif') }}"> 
        <span class="1depth"><span class="depth-Arrow">></span><strong>종합반</strong></span>
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
                            <div class="w-tit">
                                [지방-아특] 기미진 기특한 국어 전범위 문풀 [4~5월]
                                <dl class="w-info">                                    
                                    <dt class="NSK">
                                        <span class="acadBox n1 ml15">방문+온라인</span>
                                    </dt>
                                </dl>
                            </div>
                            <dl class="w-info">
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
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>방문결제</span>
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

        <div class="willbes-Lec NG c_both">
            <div class="willbes-Lec-Subject tx-dark-black">강좌구성 및 교재선택</div>
            <!-- willbes-Lec-Subject -->

            <div class="willbes-Lec-Line">-</div>
            <!-- willbes-Lec-Line -->

            <div class="willbes-Buy-List willbes-Buy-PackageList bd-none">
                <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                    <colgroup>
                        <col style="width: 740px;">
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
                                <div class="priceWrap priceWrap2">
                                    <span class="price">80,000원</span>
                                    <span class="discount">(10%↓)</span> ▶
                                    <span class="dcprice">64,000원</span>
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
                    <span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
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

                                                <div id="InfoForm" class="willbes-Layer-Box">
                                                    <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                                                        <img src="{{ img_url('sub/close.png') }}">
                                                    </a>
                                                    <div class="Layer-Tit tx-dark-black NG">
                                                        2018 기미진 국어 아침 실전 동형모의고사 특강[국가직 ~서울시] (3-6월)
                                                    </div>
                                                    <div class="lecDetailWrap">
                                                        <ul class="tabWrap tabDepth1 NG">
                                                            <li><a id="hover1" href="#ch1" class="on">강좌상세정보</a></li>
                                                            <li><a id="hover2" href="#ch2">교재상세정보 (총 2권)</a></li>
                                                        </ul>
                                                        <div class="tabBox">
                                                            <div id="ch1" class="tabLink">
                                                                <div class="classInfo">
                                                                    <dl class="w-info NG">
                                                                        <dt>개강월 : <span class="tx-blue">2022-01</span></dt>
                                                                        <dt><span class="row-line">|</span></dt>
                                                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
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
                                                                                    수강대상
                                                                                </td>
                                                                                <td class="w-data tx-left pl25">
                                                                                    1. 전직렬 기출문제를 통해 출제 포인트와 최신 경향을 파악하고 싶은 수험생  
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="w-list bg-light-white">
                                                                                    강좌소개<br/>
                                                                                    (강좌구성)
                                                                                </td>
                                                                                <td class="w-data tx-left pl25">
                                                                                    1. 전직렬 기출문제를 풀면서 기출지문의 핵심 포인트를 학습할 수 있는 강좌입니다.<br/>
                                                                                    2. 경찰 간부, 승진문제까지 수록하여 간부시험이나 승진시험까지도 준비할 수 있는 강좌입니다.<br/>
                                                                                    3. 간략한 이론 설명과 기출 지문 분석을 통해 애매하거나 헷갈린 부분까지 완벽하게 정리할 수 있는 강좌입니다. <br/>
                                                                                    4. 강의일정 : 12/2(월)~12/12(토), 총 12회 강의<br/>
                                                                                    5. 강의시간 :  월~토 [09:00~13:00] <br/>
                                                                                    6. 교재 : 형사소송법 신의 한 수 기출총정리 스텝2(전면개정판)<br/>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="w-list bg-light-white">강좌효과</td>
                                                                                <td class="w-data tx-left pl25">
                                                                                    1. 단순히 기출 원문을 나열한 것이 아닌 신광은 교수님만의 노하우를 바탕으로 모든 지문을 새롭게 다시 구성한 신의 한 수 기출총정리로 학습하는 강의로서, 한 문제를 풀어도 관련 내용이 자연스레 연상되는 학습효과를 볼 수 있습니다.<br/>
                                                                                    2. 최근 시험 경향과 크게 맞지 않는 지문이나 중복되는 지문을 제외함으로써 기출지문을 효율적으로, 하지만 빠짐없이 학습할 수 있습니다.<br/>
                                                                                    3. 문제를 풀기 전 해당 내용과 관련한 이론 설명을 통해 한 번의 강의로 2회독하는 효과를 볼 수 있습니다.<br/>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div id="ch2" class="tabLink book2">
                                                                <div class="bookWrap">
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
                                                                                    <li><a href="#info1" class="on">교재소개</a></li>
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
                                                                                        <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
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
                                                                    <div class="bookInfo">
                                                                        <div class="bookImg">
                                                                            <img src="{{ img_url('sample/book.jpg') }}">
                                                                        </div>
                                                                        <div class="bookDetail">
                                                                            <div class="book-Tit tx-dark-black NG">2018 기특한국어기출문제집2 (전5권)</div>
                                                                            <div class="book-Author tx-gray">
                                                                                <ul>
                                                                                    <li>분야 : 7급공무원 <span class="row-line">|</span></li>
                                                                                    <li>저자 : 저자명 <span class="row-line">|</span></li>
                                                                                    <li>출판사 : 출판사명 <span class="row-line">|</span></li>
                                                                                    <li>판형/쪽수 : 190*260 / 348</li>
                                                                                </ul>
                                                                                <ul>
                                                                                    <li>출판일 : 2018-12-25 <span class="row-line">|</span></li>
                                                                                    <li>교재비 : <strong class="tx-light-blue">40,000원</strong> (↓15%) <strong class="tx-black">[판매중]</strong></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="bookBoxWrap">
                                                                                <ul class="tabWrap tabDepth2">
                                                                                    <li><a href="#info3" class="on">교재소개</a></li>
                                                                                    <li><a href="#info4">교재목차</a></li>
                                                                                </ul>
                                                                                <div class="tabBox">
                                                                                    <div id="info3" class="tabContent">
                                                                                        <div class="book-TxtBox tx-gray">
                                                                                            2018년재신정판을내면서..<br/>
                                                                                            첫째, 2017년에출제된모든기출문제를반영하여수록하였습니다.<br/>
                                                                                            둘째, 매지문마다해설을충실히달았습니다..<br/>
                                                                                            셋째, 책분량이너무많아져최근5년간기출문제(2013-2017년)는빠짐없이수록하되, 오래된문제라도<br/>
                                                                                            기본적이고중요한내용을담고있는부분은유지하되중복된부분은덜어냈습니다.
                                                                                        </div>
                                                                                        <div class="caution-txt tx-red">수강생 교재는 해당 온라인 강좌 수강생에 한해 구매 가능합니다. (교재만 별도 구매 불가능)</div>
                                                                                    </div>
                                                                                    <div id="info4" class="tabContent">
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
                                                </div>
                                                <!-- willbes-Layer-Box -->
                                            </td>
                                            <td class="w-notice w-schedule">
                                                <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                월화수목 (10회차)
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 30px;">
                                        <col>
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
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
                                                <div class="w-sub tx-red">※ 정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</div>
                                                <div class="w-sub">
                                                    <a href="#ch2" onclick="openLink('ch2','hover2'); openWin('InfoForm')">
                                                        <strong class="open-info-modal">교재상세정보</strong>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                            <td class="w-notice w-schedule">
                                                <span class="tx-blue">2018-05-20 ~ 2018-06-25</span><br/>
                                                월화수목 (10회차)
                                                <div class="MoreBtn"><a href="#none">교재정보 보기 ▼</a></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- lecTable -->

                                <table cellspacing="0" cellpadding="0" class="lecInfoTable">
                                    <colgroup>
                                        <col style="width: 30px;">
                                        <col style="width: 846px">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>
                                                <div class="w-sub">                                                    
                                                    ※ 별도 구매 가능한 교재가 없습니다.                                                    
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
                                            <td class="w-notice w-schedule">
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
                                            <td class="w-notice w-schedule">
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
            <div id="pos2" class="pt35 mt20"> 
                <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black p_re">
                    <a id="Choose" name="Choose" class="sticky-top" style="top: 10px;"></a>
                    · 선택과목<span class="willbes-Lec-subTit">(전체 선택과목 중 2개를 선택해 주세요.)</span>
                    <span class="MoreBtn"><a href="#none">교재정보 전체보기 ▼</a></span>
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
                                            <td class="w-notice w-schedule">
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
                                            <td class="w-notice w-schedule">
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
                                            <td class="w-notice w-schedule">
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
                                            <td class="w-notice w-schedule">
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



    </div>
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop