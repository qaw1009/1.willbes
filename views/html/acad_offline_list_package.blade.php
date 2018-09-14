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
        <div class="curriWrap c_both mb25">
            <ul class="curriTabs c_both">
                <li><a class="on" href="#none">전체</a></li>
                <li><a href="#none">9/7급 공무원</a></li>
                <li><a href="#none">세무/관세</a></li>
                <li><a href="#none">법원직</a></li>
                <li><a href="#none">소방/방재</a></li>
                <li><a href="#none">기술직</a></li>
                <li><a href="#none">군무원</a></li>
                <li><a href="#none">부사관/장교</a></li>
                <li><a href="#none">부평경찰</a></li>
            </ul>
            <div class="CurriBox">
                <ul class="btn tx-gray">
                    <li><a class="on" href="#none">종합반</a></li>
                    <li><a href="#none">단과반</a></li>
                </ul>
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
                            <th class="tx-gray">캠퍼스선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">노량진</a></li>
                                    <li><a href="#none">신림</a></li>
                                    <li><a href="#none">인천</a></li>
                                    <li><a href="#none">대구</a></li>
                                    <li><a href="#none">광주</a></li>
                                    <li><a href="#none">제주</a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th class="tx-gray">과정선택</th>
                            <td colspan="9">
                                <ul class="curriSelect">
                                    <li><a class="on" href="#none">전체</a></li>
                                    <li><a href="#none">이론과정</a></li>
                                    <li><a href="#none">심화과정</a></li>
                                    <li><a href="#none">문제풀이</a></li>
                                    <li><a href="#none">특강</a></li>
                                    <li><a href="#none">면접</a></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- curriWrap -->
        <div class="Content widthAuto810 p_re">
            <div class="willbes-Lec-Search mb15">
                <div class="inputBox p_re">
                    <div class="selectBox">
                        <select id="select" name="select" title="강좌명" class="">
                            <option selected="selected">강좌명</option>
                            <option value="과목명">과목명</option>
                            <option value="교수명">교수명</option>
                            <option value="과정명">과정명</option>
                        </select>
                    </div>
                    <input type="text" id="SEARCH" name="SEARCH" class="labelSearch" placeholder="강의명" maxlength="30">
                    <button type="submit" onclick="" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                <div class="InfoBtn"><a href="#none">방문결제 안내 <span>▶</span></a></div>
            </div>
            <!-- willbes-Lec-Search -->

            <div class="willbes-Lec NG c_both mb60">
                <div class="willbes-Lec-Subject tx-dark-black">· 종합반<span class="MoreBtn">종합반상세정보 <img src="{{ img_url('sub/icon_detail.gif') }}"> 클릭 시 강좌를 선택할 수 있습니다.</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Lec-Table p_re">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                        <colgroup>
                            <col style="width: 85px;">
                            <col style="width: 535px;">
                            <col style="width: 200px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list">문제<br/>풀이</td>
                                <td class="w-data tx-left">
                                    <div class="w-tit w-acad-tit">
                                        <강제합격반> [서울시대비] 행정법,행정학(5~6월)<span class="oBox smBox ml10 NSK">신림</span>
                                    </div>
                                    <dl class="w-info acad">
                                        <dt>
                                            <a href="#none" onclick="openWin('InfoForm')">
                                                <strong>종합반 상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="acadInfo NSK n1">접수중</div>
                                    <div class="priceWrap chk buybtn p_re">
                                        <span class="price tx-blue">80,000원</span>
                                        <span class="discount">(↓20%)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- willbes-Lec-Table -->

                <div class="willbes-Lec-Table p_re">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadlecTable">
                        <colgroup>
                            <col style="width: 85px;">
                            <col style="width: 535px;">
                            <col style="width: 200px;">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="w-list">문제<br/>풀이</td>
                                <td class="w-data tx-left">
                                    <div class="w-tit w-acad-tit">
                                        <강제합격반> [서울시대비] 행정법,행정학 (5~6월)<span class="oBox nyBox ml10 NSK">노량진</span>
                                    </div>
                                    <dl class="w-info acad">
                                        <dt>
                                            <a href="#none" onclick="openWin('InfoForm')">
                                                <strong>종합반 상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>개강월 : <span class="tx-blue">2018-02</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="acadInfo NSK n2">접수예정</div>
                                    <div class="priceWrap chk buybtn p_re">
                                        <span class="price tx-blue">120,000원</span>
                                        <span class="discount">(↓20%)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- willbes-Lec-Table -->
            </div>
            <!-- willbes-Lec -->

            <div class="willbes-Lec-buyBtn">
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">바로결제</span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- willbes-Lec-buyBtn -->

            <div id="Coupon"class="willbes-Layer-Black">
                <div class="willbes-Layer-CartBox">
                    <a class="closeBtn" href="#none" onclick="closeWin('Coupon')">
                        <img src="{{ img_url('cart/close_cart.png') }}">
                    </a>
                    <div class="Layer-Tit NG bg-blue">쿠폰적용</div>
                    <div class="Layer-Cont">
                        <div class="tit NG">
                            <span class="pBox p1">강좌</span> 2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                        </div>
                        <div class="willbes-Pricelist">
                            <ul class="PriceBox p_re NG">
                                <li>
                                    <div>상품금액</div>
                                    <div class="price tx-light-blue">85,000원</div>
                                </li>
                                <li class="price-img">
                                    <span class="row-line">|</span>
                                    <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                                </li>
                                <li>
                                    <div>쿠폰할인금액</div>
                                    <div class="price tx-light-pink">5,000원</div>
                                </li>
                                <li class="price-img">
                                    <span class="row-line">|</span>
                                    <img src="{{ img_url('sub/icon_equal.gif') }}">
                                </li>
                                <li>
                                    <div>할인적용금액</div>
                                    <span class="price price-total tx-light-blue">75,000원</span>
                                </li>
                            </ul>
                        </div>
                        <div class="couponWrap p_re">
                            <ul class="tabWrap">
                                <li><a href="#coupon1" class="on">적용 가능 쿠폰</a></li>
                                <li><a href="#coupon2">전체 보유 쿠폰</a></li>
                            </ul>
                            <ul class="btnWrap">
                                <li class="subBtn white NSK"><a href="#none">쿠폰 적용 안함 ></a></li>
                                <li class="subBtn NSK"><a href="#none">쿠폰 적용 ></a></li>
                            </ul>
                            <div class="tabBox couponBox">
                                <div class="coupon caution-txt">내가 보유한 쿠폰 중 해당상품에 사용 가능한 쿠폰만 확인 및 적용 가능합니다.</div>
                                <div id="coupon1" class="tabContent">
                                    <table cellspacing="0" cellpadding="0" class="couponTable under-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 50px;">
                                            <col style="width: 50px;">
                                            <col style="width: 115px;">
                                            <col style="width: 240px;">
                                            <col style="width: 75px;">
                                            <col style="width: 90px;">
                                            <col style="width: 70px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>선택<span class="row-line">|</span></th>
                                                <th>분류<span class="row-line">|</span></th>
                                                <th>쿠폰번호<span class="row-line">|</span></th>
                                                <th>쿠폰명<span class="row-line">|</span></th>
                                                <th><div class="line2">할인율<br/>(금액)</div><span class="row-line line2">|</span></th>
                                                <th>사용가능기간<span class="row-line">|</span></th>
                                                <th>남은일자</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                                <td>강좌</td>
                                                <td>12012514511245</td>
                                                <td>2017년 서울시/지방직 풀케어서비스 참여</td>
                                                <td>10%</td>
                                                <td>30일</td>
                                                <td>365일</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                                <td>교재</td>
                                                <td>2012514511245</td>
                                                <td>회원가입 축하 쿠폰</td>
                                                <td>5,000원</td>
                                                <td>40일</td>
                                                <td>3일</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                                <td>교재</td>
                                                <td>123456789</td>
                                                <td>회원가입 축하 쿠폰2</td>
                                                <td>1,000원</td>
                                                <td>365일</td>
                                                <td>300일</td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                                <td>강좌</td>
                                                <td>987654321</td>
                                                <td>회원가입 축하 쿠폰3</td>
                                                <td>100,000원</td>
                                                <td>10일</td>
                                                <td>1일</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="coupon2" class="tabContent" style="display: none;">
                                    <table cellspacing="0" cellpadding="0" class="couponTable under-gray tx-gray">
                                        <colgroup>
                                            <col style="width: 60px;">
                                            <col style="width: 130px;">
                                            <col style="width: 260px;">
                                            <col style="width: 80px;">
                                            <col style="width: 90px;">
                                            <col style="width: 70px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>분류<span class="row-line">|</span></th>
                                                <th>쿠폰번호<span class="row-line">|</span></th>
                                                <th>쿠폰명<span class="row-line">|</span></th>
                                                <th><div class="line2">할인율<br/>(금액)</div><span class="row-line line2">|</span></th>
                                                <th>사용가능기간<span class="row-line">|</span></th>
                                                <th>남은일자</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>강좌</td>
                                                <td>12012514511245</td>
                                                <td>2017년 서울시/지방직 풀케어서비스 참여</td>
                                                <td>10%</td>
                                                <td>30일</td>
                                                <td>365일</td>
                                            </tr>
                                            <tr>
                                                <td>교재</td>
                                                <td>12012514511245</td>
                                                <td>회원가입 축하 쿠폰</td>
                                                <td>5,000원</td>
                                                <td>40일</td>
                                                <td>3일</td>
                                            </tr>
                                            <tr>
                                                <td>교재2</td>
                                                <td>1234564789</td>
                                                <td>회원가입 축하 쿠폰2</td>
                                                <td>245,000원</td>
                                                <td>720일</td>
                                                <td>365일</td>
                                            </tr>
                                            <tr>
                                                <td>교재3</td>
                                                <td>987654321</td>
                                                <td>회원가입 축하 쿠폰3</td>
                                                <td>2,500원</td>
                                                <td>777일</td>
                                                <td>123일</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Layer-CartBox : Coupon -->

            <div id="InfoForm" class="willbes-Layer-Box">
                <a class="closeBtn" href="#none" onclick="closeWin('InfoForm')">
                    <img src="{{ img_url('sub/close.png') }}">
                </a>

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