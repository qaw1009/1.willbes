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
    <div class="Content p_re">
    
        <div class="willbes-Cartlist c_both">
            <div class="stepCart NG">
                <ul class="tabs-Step">
                    <li><div><img src="{{ img_url('cart/icon_cart1.png') }}"> 장바구니</div></li>
                    <li class="on"><div><img src="{{ img_url('cart/icon_cart2_on.png') }}"> 결제하기</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart3.png') }}"> 결제완료</div></li>
                </ul>
            </div>
            <div class="willbes-Cart-Txt p_re pt15">
                <span class="MoreBtn underline NG" style="top: 30px;"><a href="#none">유의사항안내 닫기 ▲</a></span>
                <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                    <tbody>
                        <tr>
                            <td>
                                • 해당상품의강좌시작일설정은결제일로부터30일범위내로설정가능합니다.<br/>
                                • 해당상품의강좌시작일을설정하지않은경우결제일로부터7일후강좌가자동시작됩니다.<br/>
                                • 해당상품의강좌의개강일이결제일보다이후인경우개강일에자동시작됩니다.<br/>
                                • 배송상품은당일오후1시까지결제한상품에한해당일발송처리됩니다. (토,일,공휴일제외)<br/>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>
            <div class="LeclistTable">
                <div class="willbes-Lec-Tit NG tx-black">
                    주문상품정보
                    <ul>
                        <li class="subBtn NSK"><a href="#none">포인트 현황 ></a></li>
                        <li class="subBtn NSK"><a href="#none">쿠폰 현황 ></a></li>
                    </ul>
                </div>
                <table cellspacing="0" cellpadding="0" class="listTable buyTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 770px;">
                        <col style="width: 170px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></li></th>
                            <th>실 결제금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p3">모의고사</span> 2018 9급 시험대비 제4회 전국모의고사 (02/25시행) <span class="tBox NSK t1 white f_inherit mt-zero"><a href="#none" onclick="openWin('MOCKTESTPASSINFO')">응시정보</a></span>                                        
                                        <div class="w-coupon">
                                            최대 5% 할인쿠폰 (<span class="tx-blue">5,000원 할인</span>) <a href="#none"><img src="{{ img_url('cart/close.png') }}"></a>
                                            <span class="tBox NSK t1 black"><a href="#none" onclick="openWin('Coupon')">쿠폰적용</a></span>
                                        </div>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">15,000원</dt>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist -->

        <div class="willbes-Buylist-Price p_re">
            <ul class="cart-PriceBox NG">
                <li class="price-list p_re">
                    <dl class="priceBox">
                        <dt>
                            <div>상품주문금액</div>
                            <div class="price tx-light-blue">15,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink">5,000원</div>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>총결제금액</div>
                    <span class="price tx-light-blue">10,000원</span>
                </li>
            </ul>
        </div>
        <!-- willbes-Cart-Price -->

        <div class="willbes-BuyInfo c_both">
            <div class="willbes-Lec-Tit NG tx-black">결제정보</div>
            <div class="buyInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td class="w-list bg-light-white">총 결제금액</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <span class="t-price tx-light-blue NGEB">10,000원</span> [신용카드]
                                    </dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">결제수단</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>신용카드</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>실시간 계좌이체</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">카드사별 무이자할부 카드 정보는 결제창에서 확인할 수 있습니다.</div></dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list bg-light-white">에스크로<br/>사용여부</td>
                            <td class="w-buyinfo tx-left pl25">
                                <dl>
                                    <dt>
                                        <ul>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>사용</label></li>
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>미사용</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">[에스크로란?] 회원님께서 결제하신 금액을 에스크로업체에서 예치하고 있다가 상품이 회원님께 소중히 전달된 후 판매자에게 지불되는 방식</div></dt>
                                </dl>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-BuyInfo -->

        <div class="willbes-PolicyInfo p_re c_both">
            <div class="willbes-Lec-Tit NG tx-black">유의사항 및 환불정책안내</div>
            <div class="policyInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable under-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr class="chk">
                            <td class="w-list bg-light-white">유의사항 안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    유의사항1<br/>
                                    유의사항내용이출력됩니다.유의사항내용이출력됩니다. 유의사항내용이출력됩니다.<br/>
                                    유의사항내용이출력됩니다.<br/>
                                    유의사항2<br/>
                                    유의사항내용이출력됩니다.유의사항내용이출력됩니다. 유의사항내용이출력됩니다.<br/>
                                    유의사항1<br/>
                                    유의사항내용이출력됩니다.유의사항내용이출력됩니다. 유의사항내용이출력됩니다.<br/>
                                    유의사항내용이출력됩니다.<br/>
                                    유의사항2<br/>
                                    유의사항내용이출력됩니다.유의사항내용이출력됩니다. 유의사항내용이출력됩니다.
                                </div>
                                <div class="chkBox">
                                    위 유의사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree checked">
                                        <input type="checkbox" id="" name="" class="" maxlength="30">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr class="chk">
                            <td class="w-list bg-light-white">개인정보활용안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    개인정보활용1<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다. 개인정보활용내용이출력됩니다.<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다.<br/>
                                    개인정보활용2<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다. 개인정보활용내용이출력됩니다.<br/>
                                    개인정보활용1<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다. 개인정보활용내용이출력됩니다.<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다.<br/>
                                    개인정보활용2<br/>
                                    개인정보활용내용이출력됩니다.개인정보활용내용이출력됩니다. 개인정보활용내용이출력됩니다.
                                </div>
                                <div class="chkBox">
                                    위 개인정보 활용 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree checked">
                                        <input type="checkbox" id="" name="" class="" maxlength="30">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr class="chk">
                            <td class="w-list bg-light-white">환불정책안내</td>
                            <td class="w-txt tx-left">
                                <div class="txtBox">
                                    환불정책1<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다.<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다.환불정책내용이출력됩니다.<br/>
                                    환불정책2<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다. 환불정책내용이출력됩니다.<br/>
                                    환불정책1<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다.<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다.환불정책내용이출력됩니다.<br/>
                                    환불정책2<br/>
                                    환불정책내용이출력됩니다.환불정책내용이출력됩니다. 환불정책내용이출력됩니다.
                                </div>
                                <div class="chkBox">
                                    위 환불정책 안내 사항을 읽었으면 동의합니다. <span class="tx-blue">(필수)</span>
                                    <span class="chkBox-Agree">
                                        <input type="checkbox" id="" name="" class="" maxlength="30">
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="AllchkBox tx-gray">
                    위 유의사항, 개인정보활용, 환불정책안내사항을 모두 읽었으면 동의합니다. <span class="tx-blue">(전체동의)</span>
                    <span class="chkBox-Agree checked">
                        <input type="checkbox" id="" name="" class="" maxlength="30">
                    </span>
                </div>
            </div>
            <div class="willbes-Lec-buyBtn">
                <div class="btnAgree NG"><input type="checkbox" id="" name="" class="" maxlength="30"><label>앞으로 결제 시 항상 동의하기</label></div>
                <ul>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                            <span class="tx-light-blue">장바구니가기</span>
                        </button>
                    </li>
                    <li class="btnAuto180 h36">
                        <button type="submit" onclick="" class="mem-Btn bg-blue bd-dark-blue">
                            <span>결제하기</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- willbes-PolicyInfo -->

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

        <div id="MOCKTESTPASSINFO" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs">
            <a class="closeBtn" href="#none" onclick="closeWin('MOCKTESTPASSINFO')">
                <img src="{{ img_url('sub/close.png') }}">
            </a>
            <div class="Layer-Tit tx-dark-black NG">윌비스 <span class="tx-blue">전국모의고사</span></div> 
            <div class="passzoneTitInfo tx-light-blue tx-center NG mt20">2018년 9급 시험대비 제 4회 전국 모의고사 (02/25 시행)</div>
            <div class="PASSZONE-List widthAutoFull">
                <div class="PASSZONE-Lec-Section">
                    <div class="LeclistTable">
                        <table cellspacing="0" cellpadding="0" class="listTable userMemoTable mockpopupTable under-gray bdt-gray tx-gray GM">
                            <colgroup>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <col style="width: 30%;"/>
                            </colgroup>
                            <tbody>
                                <tr>
                                    <th class="w-tit">이름(아이디)</th>
                                    <td class="w-list" colspan="3">홍길동(ABC***)</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시형태</th>
                                    <td class="w-list">Off(학원)</td>
                                    <th class="w-tit">응시분야</th>
                                    <td class="w-list">9급</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시지역</th>
                                    <td class="w-list">전국</td>
                                    <th class="w-tit">응시번호</th>
                                    <td class="w-list tx-bright-gray">결제후 응시번호 확인 가능</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">시험응시일</th>
                                    <td class="w-list" colspan="3">2018-00-00 00:00 ~ 2018-00-00 00:00</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시직렬</th>
                                    <td class="w-list" colspan="3">일반행정직</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시필수과목</th>
                                    <td class="w-list" colspan="3">한국사, 영어</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">응시선택과목</th>
                                    <td class="w-list" colspan="3">[선택과목1] 행정학 &nbsp;&nbsp; [선택과목2] 수학</td>
                                </tr>
                                <tr>
                                    <th class="w-tit">가산점</th>
                                    <td class="w-list" colspan="3">해당없음</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <ul class="passzoneListInfo BG tx-gray GM mt20">
                    <li class="txt">· 나의 전국 모의고사 접수현황은 내강의실 > 모의고사관리 > 접수현황 메뉴에서 확인 가능합니다.</li>
                    <li class="txt">· 나의 전국 모의고사 성적결과는 내강의실 > 모의고사관리 > 성적결과 메뉴에서 확인 가능합니다.</li>
                    <li class="txt">· 단, 해당 모의고사 응시완료 시에만 성적결과 보기 및 문제/해설 다운로드가 가능합니다.</li>
                </ul>
                <ul class="passzoneListInfo tx-gray GM mt20 mb20">
                    <li class="tit strong">[온라인 모의고사 유의사항]</li>
                    <li class="txt">· 온라인 모의고사(응시형태가 Online인 경우)는 내강의실 > 모의고사관리 > 온라인 모의고사 응시 메뉴에서<br/>
                        &nbsp; 응시해 주시기 바랍니다.</li>
                    <li class="txt">· 시험응시 기간 동안 지정된 시간에만 응시 가능합니다.</li>
                </ul>
            </div>
        </div>
        <!-- willbes-Layer-PassBox : 윌비스 전국모의고사 : 응시정보 -->

    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop