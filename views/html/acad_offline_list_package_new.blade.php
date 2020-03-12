@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <div class="Menu NGR c_both">
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
                <ul class="btn btnthree tx-gray">
                    <li><a class="on" href="#none">종합반</a></li>
                    <li><a href="#none">단과반</a></li>
                    <li><a href="#none">선접수</a></li>
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

        <div class="willbes-Mypage-TESTZONE c_both mb25">
            <div class="willbes-Cart-Txt willbes-Mypage-Txt NGR p_re pb20">
                <p class="title"><span class="tx-red mr10">[필독!]</span><a href="#none">선접수 수강신청 안내사항 ▼</a></p>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-black pb-zero" style="display:none">
                    <tbody>
                        <tr>
                            <td>
                            <strong>1. 선접수 수강신청 대상</strong><br>
                            * GS-1순환 김기홍 행정쟁송법 실강·실영상 수강생<br>
                            * GS-1순환 김유미 인사노무관리 실강·실영상 수강생<br>
                            * GS-1순환 김유미 경영조직 실강/실영상 실강·실영상 수강생<br>
                            <br>
                            <strong>2. 수강신청 기간 : 홈페이지 및 선접수 수강신청 대상자 추후 문자공지 예정</strong><br>
                            <span class="tx-red">* 상기 기간 이후 수강신청은 방문접수로만 가능합니다.</span><br>
                            <br>
                            <strong>3. 수강신청 강의 : GS-2순환 김기홍 행정쟁송법, 김유미 인사노무관리/경영조직</strong><br>
                            <br>
                            <strong>4. 선접수 과목 등록하면서 일반접수 과목 함께 등록하는 경우</strong><br>
                            * 예시1. 김유미T 강의 선접수 대상자 but 김기홍T 강의 일반접수 대상자인 경우<br>
                            ▶ 선접수 기간에 김유미T 강의 + 김기홍T <span class="tx-shadow">실영상반</span> 접수 가능<br>
                            ▶ 선접수 기간에 김기홍T 실강 강의가 마감 안된 경우 <br>
                                일반접수 기간에 김기홍T 실영상반 → 실강반 변경 가능<br>
                            * 예시2. 김기홍T 강의 선접수 대상자 but 김유미T 강의 일반접수 대상자인 경우<br>
                            ▶선접수 기간에 <span class="tx-shadow">김기홍T 강의만 접수 가능</span> + <span class="tx-shadow">일반접수 기간</span>에 <span class="tx-shadow">김유미T 강의 접수 가능</span><br>
                            * 예시3. 김유미 or 김기홍 선접수 대상자가 선접수 기간에 그외 일반접수 과목(ex: 김정일T 행정쟁송) 같이 접수 가능<br>
                            <br>
                            <strong>5. 종합반의 경우 종합반 수강신청 기간에 실강/실영상 마감제한 없이 수강신청 가능</strong><br>
                            (종합반 수강신청 기간 종합반 카페 및 문자 공지 예정)<br>
                            * 종합반의 경우는 GS-2순환 강의 4과목을 선택하셔야 수강신청이 완료됩니다.<br>
                            <strong>6. 기타 선접수 관련 사항</strong><br>
                            * 교차 선접수 가능<br>
                            예시) 김유미T GS1 평일 인사관리 수강 → 김유미T GS2 주말 인사관리 신청 가능<br>
                            * 선접수 대상자 내에서도 실강 경쟁有 (단, 선접수 기간 동안 실영상반은 마감 없이 신청 가능) <br>
                            <br>
                            <strong>7. 수강신청 방법 : 방문신청 가능, 온라인신청 가능(모바일 신청 불가)</strong><br>
                            * 온라인 수강신청 방법 : <span class="tx-red">홈페이지 로그인(필수)</span> → 우측 상단 학원수강신청 > "선접수 수강신청" 메뉴 클릭<br>
                            * 종합반 원서에 작성된 성함/연락처와 동일한 성함/연락처 정보로 홈페이지 회원 가입 및 로그인을 하셔야 합니다.<br>
                            * 3/9(월) 11시부터 "선접수 수강신청" 메뉴가 노출됩니다.<br>
                            <br>
                            <strong>8. 수강신청 완료 여부 및 신청 과목 확인 방법</strong><br>
                            (통합 홈페이지 수강신청 내역 확인 방법_기존 방법 예시입니다.)<br>
                            홈페이지 로그인 → 내 강의실 → 학원강좌 → 수강신청강좌 에서 확인<br>
                            <span class="tx-shadow">* 별도의 수강증을 발급받지 않으셔도 학원 수강정보에서 신청이 확인되시면 수강신청이 확정된 것으로 수강증은 추후 강의실 입장 전까지
                            데스크에서 발급받으시기 바랍니다. <br>
                            * 수강증 발급 순서가 아닌 온라인or방문접수 수강신청 순으로 실강/실영상반 수강신청이 확정됩니다.</span>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
        </div>

        <div class="Content widthAuto810 p_re minh1000">
            <div class="willbes-Lec-Search p_re mb15">
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

                <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">방문결제안내 <span>▶</span></a></div>
                <div id="requestInfo" class="willbes-Layer-requestInfo">
                    <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                        <img src="{{ img_url('prof/close.png') }}">
                    </a>
                    <div class="Layer-Tit NG tx-dark-black">방문결제 <span class="tx-blue">안내</span></div>
                    <div class="Layer-Cont">
                        <div class="Layer-SubTit tx-gray">
                            <ul>
                                <li>
                                    <strong>학원방문결제 안내</strong><br>
                                    - 학원에서 직접 수강할 수 있는 강좌입니다. (온라인>내강의실에서 수강 불가)<br>  
                                    - 학원강좌는 장바구니 담기 없이 바로결제만 가능합니다.<br>
                                    - <span class="tx-red">수강신청 후 정정신청이 불가능</span>합니다. 강의 구성을 꼼꼼히 살핀 후 수강신청해 주세요.<br>
                                    - 방문결제 접수완료 시 결제가 진행되지 않은 상태입니다.<br>
                                    반드시 <span class="tx-red">학원에 방문하시어 결제를 진행</span>하셔야 정상적인 수강이 가능합니다.
                                </li>
                                <li>
                                    <strong>아이콘 안내</strong><br>
                                    - 강좌리스트에 보여지고 있는 아이콘에 대한 설명입니다. 참고하시어 수강신청해 주세요.
                                </li>
                            </ul>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                                <colgroup>
                                    <col style="width: 130px;">
                                    <col style="width: auto;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><span class="acadBox n4">접수중</span></td>
                                        <td class="tx-left">강좌가 개설되었으며 현재 수강신청을 받고 있는 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><span class="acadBox n5">접수예정</span></th>
                                        <td class="tx-left">신규강좌 개설되었으나 아직 수강신청을 받지 않는 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><span class="tx-blue">라이브</span></th>
                                        <td class="tx-left">실시간으로 송출되는 영상으로 수강할 수 있는 강좌 (영상반)</td>
                                    </tr>
                                    <tr>
                                        <th><span class="tx-blue">실강</span></th>
                                        <td class="tx-left">교수님이 수업하는 강의실에서 직접 수강할 수 있는 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                        <td class="tx-left">돋보기 아이콘 클릭 시 하단으로 해당 강좌의 상세정보 열림</td>    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- requestInfo //-->
            </div>
            <!-- willbes-Lec-Search -->

            <div class="willbes-Lec NG c_both mb60">
                <div class="willbes-Lec-Subject tx-dark-black">· 종합반</div>
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
                                        <a href="{{ site_url('/home/html/acad_offline_list_packagesub_new') }}"><강제합격반> [서울시대비] 행정법,행정학(5~6월)</a>
                                        <span class="oBox smBox ml10 NSK">신림</span><span class="oBox bfBox ml10 NSK">선접수</span>
                                    </div>
                                    <dl class="w-info acad">
                                        <dt>
                                            <a href="#none" onclick="openWin('InfoForm')">
                                                <strong>종합반 상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강형태 : <span class="tx-blue">실강</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>접수기간 : <span class="tx-blue">2018-05-20 ~ 2018-05-30</span></dt>
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
                                        <a href="#none"><강제합격반> [서울시대비] 행정법,행정학 (5~6월)</a><span class="oBox nyBox ml10 NSK">노량진</span>
                                    </div>
                                    <dl class="w-info acad">
                                        <dt>
                                            <a href="#none" onclick="openWin('InfoForm')">
                                                <strong>종합반 상세정보</strong>
                                            </a>
                                        </dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>수강형태 : <span class="tx-blue">라이브</span></dt>
                                        <dt><span class="row-line">|</span></dt>
                                        <dt>접수기간 : <span class="tx-blue">2018-05-20 ~ 2018-05-30</span></dt>
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

        <div class="Aside widthAuto290 NG ml20" id="AsideBasket">
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