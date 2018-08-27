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

            <div class="willbes-Lec NG c_both mb25">
                <div class="willbes-Lec-Subject tx-dark-black">· 종합반<span class="MoreBtn"><a href="#none">강좌정보 <span>전체보기 ▼</span></a></span></div>
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
                                        <a href="#none"><강제합격반> [서울시대비] 행정법,행정학(5~6월)</a><span class="oBox smBox ml10 NSK">신림</span>
                                    </div>
                                    <dl class="w-info">
                                        <dt class="mr20">
                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                <strong>상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt>
                                            <span class="tx-blue">2018/05/10(목)</span> ~ 2018/06/30 (토)
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="acadInfo NSK n1">접수중</div>
                                    <div class="priceWrap chk buybtn p_re">
                                        <span class="price tx-blue">
                                            <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                            80,000원</span>
                                        <span class="discount">(↓20%)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecTable -->

                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoPackageTable tx-dark-gray">
                        <colgroup>
                            <col style="width: 75px;">
                            <col style="width: 695px;"> 
                            <col style="width: 90px;">
                        </colgroup>
                        <thead>
                            <tr>
                                <th colspan="4"><div class="w-tit w-Infotit tx-black tx-left mb15 bd-none">▷ 필수과목 <span class="w-InfoSubtit">(과목별 1개만 선택해 주세요)</span></div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="Top">
                                <td class="w-sbj">과목</td>
                                <td class="w-list">교수/강좌명</td>
                                <td class="w-info">강좌정보</td>
                            </tr>
                            <tr>
                                <td class="w-sbj" rowspan="2">국어</td>
                                <td class="w-list tx-left">
                                    <ul>
                                        <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                        <li class="w-name tx-blue">김세령</li>
                                        <li class="w-tit">
                                            [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                            <dl class="w-info">
                                                <dt class="tx-blue">5/1~6/30</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">16회차</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">월~금 14:00~18:00</dt>
                                            </dl>
                                        </li>
                                    </ul>
                                </td>
                                <td class="w-info">
                                    <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-list tx-left">
                                    <ul>
                                        <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                        <li class="w-name tx-blue">김세령</li>
                                        <li class="w-tit">
                                            [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                            <dl class="w-info">
                                                <dt class="tx-blue">5/1~6/30</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">16회차</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">월~금 14:00~18:00</dt>
                                            </dl>
                                        </li>
                                    </ul>
                                </td>
                                <td class="w-info">
                                    <a href="#none">
                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-sbj">영어</td>
                                <td class="w-list tx-left">
                                    <ul>
                                        <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                        <li class="w-name tx-blue">김세령</li>
                                        <li class="w-tit">
                                            [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                            <dl class="w-info">
                                                <dt class="tx-blue">5/1~6/30</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">16회차</dt>
                                                <dt><span class="row-line">|</span></dt>
                                                <dt class="tx-gray">월~금 14:00~18:00</dt>
                                            </dl>
                                        </li>
                                    </ul>
                                </td>
                                <td class="w-info">
                                    <a href="#none">
                                        <img src="{{ img_url('sub/icon_detail.gif') }}">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecInfoTable : 필수과목 -->

                    <div class="lecInfoTable Lec-buyBtn-Wrap p_re">
                        <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoPackageTable tx-dark-gray">
                            <colgroup>
                                <col style="width: 75px;">
                                <col style="width: 695px;">
                                <col style="width: 90px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th colspan="4"><div class="w-tit w-Infotit tx-black tx-left mb15 bd-none">▷ 선택과목 <span class="w-InfoSubtit">(전체 선태과목 중 2개를 선택해 주세요)</span></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="Top">
                                    <td class="w-sbj">과목</td>
                                    <td class="w-list">교수/강좌명</td>
                                    <td class="w-info">강좌정보</td>
                                </tr>
                                <tr>
                                    <td class="w-sbj" rowspan="2">국어</td>
                                    <td class="w-list tx-left">
                                        <ul>
                                            <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                            <li class="w-name tx-blue">김세령</li>
                                            <li class="w-tit">
                                                [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                <dl class="w-info">
                                                    <dt class="tx-blue">5/1~6/30</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">16회차</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">월~금 14:00~18:00</dt>
                                                </dl>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="w-info">
                                        <a href="#none">
                                            <img src="{{ img_url('sub/icon_detail.gif') }}">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-list tx-left">
                                        <ul>
                                            <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                            <li class="w-name tx-blue">김세령</li>
                                            <li class="w-tit">
                                                [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                <dl class="w-info">
                                                    <dt class="tx-blue">5/1~6/30</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">16회차</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">월~금 14:00~18:00</dt>
                                                </dl>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="w-info">
                                        <a href="#none">
                                            <img src="{{ img_url('sub/icon_detail.gif') }}">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-sbj">영어</td>
                                    <td class="w-list tx-left">
                                        <ul>
                                            <li class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></li>
                                            <li class="w-name tx-blue">김세령</li>
                                            <li class="w-tit">
                                                [문풀종합][서울시] 정채영 국어 필살기 모의고사IV [5~6월]
                                                <dl class="w-info">
                                                    <dt class="tx-blue">5/1~6/30</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">16회차</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt class="tx-gray">월~금 14:00~18:00</dt>
                                                </dl>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="w-info">
                                        <a href="#none">
                                            <img src="{{ img_url('sub/icon_detail.gif') }}">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- lecInfoTable : 선택과목 -->
                        <div class="willbes-Lec-buyBtn GM">
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

                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="w-tit w-Infotit tx-black">▷ 강좌정보</div>
                                    <div class="w-txt">
                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                        <span class="tx-blue">· 강의교재 :</span> 2018 정채영 국어 필살기 모의고사 특수 제작 프린트 (자체제공)<br/>
                                        <span class="tx-blue">· 강의특징 :</span>실전보다 빠르게 문제를 풀어내는 속도와 정확한 해설과 명쾌한 적중으로 국어 고득점이 자연스럽게 이루어지는 실전모의고사<br/>
                                        <span class="tx-blue">· 강의대상 :</span> 2018 공무원 시험 필기 합격을 위한 준비하는 수험생<br/>
                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                    </div>            

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecInfoTable -->

                </div>
                <!-- willbes-Lec-Table -->

                <div class="willbes-Lec-Table p_re pb_active">
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
                                        <a href="#none"><강제합격반> [서울시대비] 행정법,행정학 (5~6월)[서울시대비] 행정법,행정학 (5~6월) 행정법,행정학 (5~6월)</a><span class="oBox nyBox ml10 NSK">노량진</span>
                                    </div>
                                    <dl class="w-info">
                                        <dt class="mr20">
                                            <a href="#ch1" onclick="openLink('ch1','hover1'); openWin('InfoForm')">
                                                <strong>상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt>
                                            <span class="tx-blue">2018/05/10(목)</span> ~ 2018/06/30 (토)
                                        </dt>
                                    </dl>
                                </td>
                                <td class="w-notice p_re">
                                    <div class="acadInfo NSK n2">접수예정</div>
                                    <div class="priceWrap chk buybtn p_re">
                                        <span class="price tx-blue">
                                            <span class="chkBox"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></span>
                                            120,000원</span>
                                        <span class="discount">(↓20%)</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecTable -->

                    <table cellspacing="0" cellpadding="0" class="lecInfoTable acadlecInfoTable">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="w-tit tx-black">▷ 강좌정보</div>
                                    <div class="w-txt">
                                        <strong>[서울시] 정채영 국어 필살기 모의고사IV [5~6월]</strong><br/>
                                        <span class="tx-blue">· 강의일정 :</span> 5.21(월)~6.11(월) 매주월요일08:40~13:00 총4회<br/>
                                        * 강의일정은 학원 사정으로 인하여 추후 변동될 수 있습니다.<br/>
                                    </div>            

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- lecInfoTable -->

                    <div class="lecInfoTable willbes-Lec-buyBtn GM">
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
                        <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
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
                    <ul class="NSK">
                        <!-- 쿠폰적용 후 display:none -->
                        <li class="aBox waitBox_block"><a href="#none" onclick="openWin('Coupon')">쿠폰적용</a></li>
                        <!-- 쿠폰적용 적용후 활성화
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
                        -->
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
                        <!-- 쿠폰적용 후 display:none
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        -->
                        <!-- 쿠폰적용 적용후 활성화 -->
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
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
                        <!-- 쿠폰적용 후 display:none -->
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <!-- 쿠폰적용 적용후 활성화
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
                        -->
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
                        <!-- 쿠폰적용 후 display:none -->
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <!-- 쿠폰적용 적용후 활성화
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
                        -->
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
                        <!-- 쿠폰적용 후 display:none
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        -->
                        <!-- 쿠폰적용 적용후 활성화 -->
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
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
                        <!-- 쿠폰적용 후 display:none -->
                        <li class="aBox waitBox_block"><a href="#none">쿠폰적용</a></li>
                        <!-- 쿠폰적용 적용후 활성화
                        <li class="aBox answerBox_block"><a href="#none">변경</a></li>
                        <li class="aBox cancelBox_block"><a href="#none">취소</a></li>
                        -->
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

<div class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="submit" onclick="openWin('pocketBox')" class="bg-deep-gray">
            <span>방문접수</span>
        </button>
    </div>
    <div>
        <button type="submit" onclick="" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
</div>

<!-- End Container -->
@stop