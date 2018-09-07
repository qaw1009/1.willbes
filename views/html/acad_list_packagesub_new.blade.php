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
                                <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                <dt><span class="row-line">|</span></dt>
                                <dt>수강형태 : <span class="tx-blue">혼합</span></dt>
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
                            <span>방문접수</span>
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
                <div class="sticky-menu select-menu NG">
                    <ul class="tabWrap">
                        <li><a onclick="fnMove('1')" href="#Required">필수과목 ▼</a></li>
                        <li><a onclick="fnMove('2')" href="#Choose">선택과목 ▼</a></li>
                    </ul>
                </div>
            </div>
            <!-- sticky-menu -->

            <!-- pos1 -->
            <div id="pos1" class="pt35">
                <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">· 필수과목</div>
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
                <div class="willbes-Lec-Subject willbes-Lec-Tit-select NG tx-black">
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

        <div id="InfoForm" class="willbes-Layer-Box d3">
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
    <div class="Quick-Bnr ml20">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop