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
                        <col>
                        <col style="width: 60px;">
                        <col style="width: 130px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>상품정보<span class="row-line">|</span></th>
                            <th>수량<span class="row-line">|</span></th>
                            <th>정가(할인율)<span class="row-line">|</span></th>
                            <th>실 결제금액</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p1">강좌</span> 2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                                                                                
                                    </dt>
                                    <dt>
                                        <span class="w-day">수강기간 : <span class="tx-blue">50일</span></span>
                                        <span class="w-data">
                                            [강좌시작일 설정] 
                                            <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">
                                            <img src="{{ img_url('cart/icon_calendar.gif') }}"> ~
                                            <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                                        </span>                                       
                                    </dt> 
                                    <dt class="w-coupon">
                                        <span class="tBox NGR t1 black"><a href="#none" onclick="openWin('Coupon')">쿠폰적용</a></span>
                                        최대 5% 할인쿠폰 (<span class="tx-blue">5,000원 할인</span>) <a href="#none"><img src="{{ img_url('cart/close.png') }}"></a>
                                    </dt>                                  
                                </dl>                                
                            </td>
                            <td> </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">75,000원</dt>
                                    <dt class="origin-price tx-gray">(80,000원)</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p1">강좌</span> 2018 김용철행정법총론실전동형모의고사(3월)                                        
                                    </dt>
                                    <dt>
                                        <span class="w-day">수강기간 : <span class="tx-blue">50일</span></span>
                                        <span class="w-data">
                                            [강좌시작일 설정] 
                                            <input type="text" id="S-DATE" name="S-DATE" class="iptDate" maxlength="30">
                                            <img src="{{ img_url('cart/icon_calendar.gif') }}"> ~
                                            <input type="text" id="E-DATE" name="E-DATE" class="iptDate" maxlength="30">
                                        </span>
                                    </dt>
                                    <dt class="w-coupon">
                                        <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                    </dt>
                                </dl>
                            </td>
                            <td> </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">80,000원</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p2">패키지</span> 2017 9급공무원이론선택형종합패키지-30일완성
                                    </dt>
                                    <dt>
                                        <span class="w-day">수강기간 : <span class="tx-blue">100일</span></span>
                                        <span class="w-data">[강좌시작일 설정] <span class="tx-light-blue">결제완료 후 바로 수강 시작</span></span>
                                    </dt>
                                    <dt class="w-coupon">
                                        <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                    </dt>
                                </dl>
                            </td>
                            <td> </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">180,000원</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p3">교재</span> 2017 정채영국어서울문제를알려주마!1
                                    </dt>
                                    <dt>
                                        <span class="w-coupon">10% 할인쿠폰 (<span class="tx-blue">10% 할인</span>) <a href="#none"><img src="{{ img_url('cart/close.png') }}"></a></span>
                                    </dt>
                                    <dt class="w-coupon">
                                        <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                    </dt>
                                </dl>
                            </td>
                            <td>2</td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">7,000원</dt>
                                    <dt class="origin-price tx-gray">(8,000원)</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p3">교재</span> 2017 정채영국어서울시문제를알려주마!
                                    </dt>
                                    <dt class="w-coupon">
                                        <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                    </dt>
                                </dl>
                            </td>
                            <td>2</td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">5,000원</dt>
                                </dl>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-list tx-left pl20">
                                <dl>
                                    <dt class="tit">
                                        <span class="pBox p4">배송</span> 배송비 <span class="tx-light-blue">(교재 총 결제금액이 30,000원 이상 인 경우 배송비 무료)</span>
                                    </dt>
                                    <dt class="w-coupon">
                                        <span class="tBox NSK t1 black"><a href="#none">쿠폰적용</a></span>
                                    </dt>
                                </dl>
                            </td>
                            <td> </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt>6,000,000원</dt>
                                    <dt class="tx-light-blue">(↓77%)</dt>
                                </dl>
                            </td>
                            <td class="w-buy-price">
                                <dl>
                                    <dt class="tx-light-blue">2,500원</dt>
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
                            <div class="price tx-light-blue">140,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>쿠폰할인금액</div>
                            <div class="price tx-light-pink">180,000원</div>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                        </dt>
                        <dt>
                            <div>포인트 차감금액</div>
                            <span class="price tx-light-pink">13,000원</span>
                        </dt>
                        <dt class="price-img">
                            <span class="row-line">|</span>
                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                        </dt>
                        <dt>
                            <div>배송료</div>
                            <span class="price tx-light-blue">2,500원</span>
                        </dt>
                    </dl>
                </li>
                <li class="price-total">
                    <div>결제예상금액</div>
                    <span class="price tx-light-blue">188,600원</span>
                </li>
            </ul>
            <div class="cart-PointBox NG">
                <dl class="pointBox">
                    <dt class="p-tit"><span class="tx-blue">강좌</span> 포인트 사용</dt>
                    <dt>
                        <span class="u-point NGEB">30,000P 보유</span>
                        <span class="btnAll NSK"><a href="#none">전액사용</a></span>
                        <input type="text" id="POINT" name="POINT" class="iptPoint" maxlength="30">
                        <span class="u-point NGEB">P 차감</span> 
                    </dt>
                </dl>
            </div>
            <div class="p-info tx-gray c_both pb-zero">
                • 강좌 포인트는 <span class="tx-light-blue">6,000p</span>부터<span class="tx-light-blue">1p</span> 단위로 사용 가능합니다.
            </div>
        </div>
        <!-- willbes-Cart-Price -->

        <div class="willbes-Delivery-Info c_both">
            <div class="willbes-Lec-Tit NG tx-black">배송정보</div>
            <div class="deliveryInfoTable GM">
                <table cellspacing="0" cellpadding="0" class="classTable deliveryTable upper-gray tx-gray">
                    <colgroup>
                        <col style="width: 140px;">
                        <col style="width: 140px;">
                        <col width="*">
                    </colgroup>
                    <tbody>
                        <tr class="u-from">
                            <th class="w-list" rowspan="4">구매자<br/>정보</th>
                            <td class="tx-left pl20 tx-light-blue" colspan="2">• 구매자 정보는 회원가입 시 등록한 정보로 셋팅되며, 수정이 필요한 경우 회원 정보 페이지에서만 가능합니다.</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이름</td>
                            <td class="w-info tx-left pl20">홍길동</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호</td>
                            <td class="w-info tx-left pl20">010-1234-5678</td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이메일</td>
                            <td class="w-info tx-left pl20">willbes@willbes.com</td>
                        </tr>

                        <tr class="u-to">
                            <th class="w-list" rowspan="6">받는사람<br/>정보<br/><span class="tx-light-blue">(* 필수입력항목)</span></th>
                            <td class="tx-left pl20 u-delivery-chk" colspan="2">
                                <ul>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>구매자 정보와 동일</label></li>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>최근 배송지</label></li>
                                    <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>직접입력</label></li>
                                    <li><span class="btnAll NSK"><a href="#none" onclick="openWin('MyAddress')">나의 배송 주소록</a></span></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20"><input type="text" id="NAME" name="NAME" class="iptName" maxlength="30"></td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                <div class="inputBox Add p_re">
                                    <div class="searchadd">
                                        <input type="text" id="ADD1" name="ADD1" class="iptAdd" maxlength="30"> -
                                        <input type="text" id="ADD2" name="ADD2" class="iptAdd" maxlength="30">   
                                        <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                            <span>우편번호 찾기</span>
                                        </button>
                                        <span class="btnAdd underline"><a href="#none" onclick="alert('입력한 주소를 나의 배송 주소록에 등록하시겠습니까?')">[나의 배송 주소록에 등록하기]</a></span>
                                    </div>
                                    <div class="addbox1 p_re">
                                        <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                                    </div>
                                    <div class="addbox2 p_re">
                                        <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                            <td class="w-info tx-left pl20">
                                <select id="phone" name="phone" title="010" class="selePhone">
                                    <option selected="selected">010</option>
                                    <option value="011">011</option>
                                    <option value="016">016</option>
                                    <option value="017">017</option>
                                    <option value="018">018</option>
                                </select> -
                                <input type="text" id="USER_CELLPHONE1" name="USER_CELLPHONE1" class="iptCellhone1 phone" maxlength="30"> -
                                <input type="text" id="USER_CELLPHONE2" name="USER_CELLPHONE2" class="iptCellhone2 phone" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                            <td class="w-info tx-left pl20">
                                <select id="phone" name="phone" title="02" class="selePhone">
                                    <option selected="selected">02</option>
                                    <option value="031">031</option>
                                    <option value="032">032</option>
                                    <option value="033">033</option>
                                    <option value="041">041</option>
                                </select> -
                                <input type="text" id="USER_PHONE1" name="USER_PHONE1" class="iptPhone1 phone" maxlength="30"> -
                                <input type="text" id="USER_PHONE2" name="USER_PHONE2" class="iptPhone2 phone" maxlength="30">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-tit bg-light-white tx-left pl20">배송시 요청사항</td>
                            <td class="w-info tx-left pl20">
                                <div class="inputBox p_re">
                                    <input type="text" id="USER_MEMO" name="USER_MEMO" class="iptMemo" placeholder="배송메시지를입력해주세요. (예: 부재시경비실에맡겨주세요.)" maxlength="30"> (0 / 120byte)
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Delivery-Info -->

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
                                        <span class="t-price tx-light-blue NGEB">188,600원</span> [신용카드]
                                        <span class="w-point">적립예정포인트:<span class="tx-light-blue">343원</span></span>
                                    </dt>
                                    <dt><div class="caution-txt">회원님께서는<span class="tx-red">도서산간,제주도배송지대상자로배송료2,500원이추가</span>로적용되었습니다.</div></dt>
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
                                            <li><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"><label>무통장입금(가상계좌)</label></li>
                                        </ul>
                                    </dt>
                                    <dt><div class="caution-txt">인터넷 공인인증서가 필요합니다.</div></dt>
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

        <div id="MyAddress"class="willbes-Layer-Black">
            <div class="willbes-Layer-CartBox">
                <a class="closeBtn" href="#none" onclick="closeWin('MyAddress')">
                    <img src="{{ img_url('cart/close_cart.png') }}">
                </a>
                <div class="Layer-Tit NG bg-blue">나의 배송 주소록</div>
                <div id="AddList" class="Layer-Cont p_re">
                    <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다.</div>
                    <div class="subBtn address NSK"><a href="#none" onclick="closeWin('AddList'),openWin('AddModify')">신규주소등록 ></a></div>
                    <div class="couponWrap">
                        <table cellspacing="0" cellpadding="0" class="couponTable upper-black under-gray tx-gray">
                            <colgroup>
                                <col style="width: 50px;">
                                <col style="width: 75px;">
                                <col style="width: 70px;">
                                <col style="width: 120px;">
                                <col style="width: 275px;">
                                <col style="width: 100px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>선택<span class="row-line">|</span></th>
                                    <th>배송지<span class="row-line">|</span></th>
                                    <th>이름<span class="row-line">|</span></th>
                                    <th>연락처<span class="row-line">|</span></th>
                                    <th>주소<span class="row-line">|</span></th>
                                    <th>수정/삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                    <td>삼성화재</td>
                                    <td>홍길동</td>
                                    <td>010-1234-5678</td>
                                    <td class="address tx-left pl20">
                                        06924<br/>
                                        서울특별시 동작구 노량진로 202길<br/>
                                        4층 WCA(노량진동, 남강빌딩)
                                    </td>
                                    <td class="address w-buy">
                                        <div class="tBox NSK t1 black"><a href="">수정</a></div>
                                        <div class="tBox NSK t2 gray"><a href="">삭제</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="radio" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                    <td>친구네집</td>
                                    <td>홍길동</td>
                                    <td>010-9876-5432</td>
                                    <td class="address tx-left pl20">
                                        08812<br/>
                                        서울시 관악구 호암로 26길 13 세정빌딩 2층<br/>
                                        (관악구대학동 1514-6)
                                    </td>
                                    <td class="address w-buy">
                                        <div class="tBox NSK t1 black"><a href="">수정</a></div>
                                        <div class="tBox NSK t2 gray"><a href="">삭제</a></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="subBtn f_right mt50 NSK"><a href="#none">적용</a></div>
                </div>
                <!-- 배송 주소 리스트 -->

                <div id="AddModify" class="Layer-Cont Modify p_re" style="display: none">
                    <div class="address caution-txt">주소록은 최대 5개까지 등록 가능합니다. <span class="tx-light-blue f_right">(* 필수입력항목)</span></div>
                    <div class="couponWrap">
                        <table cellspacing="0" cellpadding="0" class="classTable deliveryTable under-gray tx-gray">
                            <colgroup>
                                <col style="width: 140px;">
                                <col width="*">
                            </colgroup>
                            <tbody>
                                <tr class="u-to">
                                    <td class="w-tit bg-light-white tx-left pl20">배송지<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20"><input type="text" id="LOCATION" name="LOCATION" class="iptLocation" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">이름<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20"><input type="text" id="NAME" name="NAME" class="iptName" maxlength="30"></td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">주소<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20">
                                        <div class="inputBox Add p_re">
                                            <div class="searchadd">
                                                <input type="text" id="ADD1" name="ADD1" class="iptAdd" maxlength="30"> -
                                                <input type="text" id="ADD2" name="ADD2" class="iptAdd" maxlength="30">   
                                                <button type="submit" onclick="" class="mem-Btn combine-Btn mb10 bg-blue bd-dark-blue" style="margin-left: 5px; margin-right: 5px;">
                                                    <span>우편번호 찾기</span>
                                                </button>
                                            </div>
                                            <div class="addbox1 p_re">
                                                <input type="text" id="USER_ADD1" name="USER_ADD1" class="iptAdd1 bg-gray" placeholder="기본주소" maxlength="30">
                                            </div>
                                            <div class="addbox2 p_re">
                                                <input type="text" id="USER_ADD2" name="USER_ADD2" class="iptAdd2" placeholder="상세주소" maxlength="30">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">휴대폰번호<span class="tx-light-blue">(*)</span></td>
                                    <td class="w-info tx-left pl20">
                                        <select id="phone" name="phone" title="010" class="selePhone">
                                            <option selected="selected">010</option>
                                            <option value="011">011</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                        </select> -
                                        <input type="text" id="USER_CELLPHONE1" name="USER_CELLPHONE1" class="iptCellhone1 phone" maxlength="30"> -
                                        <input type="text" id="USER_CELLPHONE2" name="USER_CELLPHONE2" class="iptCellhone2 phone" maxlength="30">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-tit bg-light-white tx-left pl20">전화번호</td>
                                    <td class="w-info tx-left pl20">
                                        <select id="phone" name="phone" title="02" class="selePhone">
                                            <option selected="selected">02</option>
                                            <option value="031">031</option>
                                            <option value="032">032</option>
                                            <option value="033">033</option>
                                            <option value="041">041</option>
                                        </select> -
                                        <input type="text" id="USER_PHONE1" name="USER_PHONE1" class="iptPhone1 phone" maxlength="30"> -
                                        <input type="text" id="USER_PHONE2" name="USER_PHONE2" class="iptPhone2 phone" maxlength="30">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="p-info tx-gray c_both">
                            • 정확하지 않은 정보 기재 시, 불이익을 받을 수 있으니 유의하시기 바랍니다.<br/>
                            • 집 외의 공공장소 등 직접 수령이 어려운 장소로의 배송은 분실 위험이 있으니 주의하시기 바랍니다.
                        </div>  
                        <ul class="btnWrapbt">
                            <li class="subBtn NSK"><a href="#none">저장</a></li>
                            <li class="subBtn white NSK"><a href="#none" onclick="closeWin('AddModify'),openWin('AddList')">목록</a></li>
                        </ul> 
                    </div>
                </div>
                <!-- 배송 주소 수정 -->

                
            </div>
        </div>
        <!-- willbes-Layer-CartBox : 나의 배송 주소록 -->

    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop