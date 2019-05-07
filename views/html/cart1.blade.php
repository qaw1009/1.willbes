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
                    <li class="on"><div><img src="{{ img_url('cart/icon_cart1_on.png') }}"> 장바구니</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart2.png') }}"> 결제하기</div></li>
                    <li><div><img src="{{ img_url('cart/icon_cart3.png') }}"> 결제완료</div></li>
                </ul>
            </div>
        </div>
        <div class="pocketDetailWrap pt15">
            <ul class="tabWrap tabDepth1 NG">
                <li><a id="hover1" href="#pocket1" class="on">강좌</a></li>
                <li><a id="hover2" href="#pocket2">교재</a></li>
            </ul>
            <div class="tabBox">
                <div id="pocket1" class="tabLink">

                    <div class="willbes-Cartlist c_both mt20">
                        <div class="LeclistTable">
                            <ul class="mb20">
                                <li class="subBtn NSK"><a href="#none">선택 상품 삭제 ></a></li>
                            </ul>
                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col>
                                    <col style="width: 140px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><span class="row-line">|</span></li></th>
                                        <th>상품정보<span class="row-line">|</span></li></th>
                                        <th>판매가<span class="row-line">|</span></li></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left p_re pl20">
                                            <a href="#none" onclick="openWin('List')">
                                                <span class="pBox p1">강좌</span>
                                                2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                                                <img class="dot" style="display: none; margin: -2px 0 0 5px;" src="{{ img_url('sub/icon_detail.gif') }}">
                                            </a>
                                            <div id="List" class="willbes-Layer-Box-sm">
                                                <a class="closeBtn" href="#none" onclick="closeWin('List')">
                                                    <img src="{{ img_url('gnb/close.png') }}">
                                                </a>
                                                <table cellspacing="0" cellpadding="0" class="productTable tx-gray">
                                                    <colgroup>
                                                        <col style="width: 65px;">
                                                        <col style="width: 455px;">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr>
                                                            <td>정채영<span class="row-line">|</span></td>
                                                            <td class="tx-left pl20">2017(지방직/서울시) 정채영국어실전동형문제풀이(4-5월)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>한덕현<span class="row-line">|</span></td>
                                                            <td class="tx-left pl20">2017(지방직/서울시) 한덕현영어실전동형문제풀이(4-5월)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>최진우<span class="row-line">|</span></td>
                                                            <td class="tx-left pl20">2017(지방직/서울시) 최진우한국사실전동형문제풀이(4-5월)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>김용철<span class="row-line">|</span></td>
                                                            <td class="tx-left pl20">2017(지방직/서울시) 김용철행정법실전동형문제풀이(4-5월)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>문병일<span class="row-line">|</span></td>
                                                            <td class="tx-left pl20">2017(지방직/서울시) 문병일사회실전동형문제풀이(4-5월)</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                        <td class="w-price tx-light-blue">80,000원</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p1">강좌</span>
                                            2018 김용철 행정법총론 실전 동형모의고사(3월)
                                        </td>
                                        <td class="w-price tx-light-blue">70,000원</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p2">패키지</span>
                                            2017 9급 공무원 이론 선택형 종합 패키지- 30일완성
                                        </td>
                                        <td class="w-price tx-light-blue">180,000원</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2017 정채영 국어 서울시 문제를 알려주마!1
                                        </td>
                                        <td class="w-price tx-light-blue">8,000원</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2017 정채영 국어 서울시 문제를 알려주마!2
                                        </td>
                                        <td class="w-price tx-light-blue">5,000원</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Cartlist -->

                    <div class="willbes-Cart-Price p_re">
                        <ul class="cart-PriceBox pl40 NG">
                            <li class="price-list p_re">
                                <dl class="priceBox">
                                    <dt>
                                        <div>
                                            <span class="pBox p1">강좌</span>
                                            ( <a class="num tx-light-blue underline" href="#none">2건</a> )
                                        </div>
                                        <span class="price tx-light-blue">140,000원</span>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="{{ img_url('sub/icon_plus.gif') }}">
                                    </dt>
                                    <dt>
                                        <div>
                                            <span class="pBox p2">패키지</span>
                                            ( <a class="num tx-light-blue underline" href="#none">1건</a> )
                                        </div>
                                        <span class="price tx-light-blue">180,000원</span>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="{{ img_url('sub/icon_plus.gif') }}">
                                    </dt>
                                    <dt>
                                        <div>
                                            <span class="pBox p3">교재</span>
                                            ( <a class="num tx-light-blue underline" href="#none">2건</a> )
                                        </div>
                                        <span class="price tx-light-blue">13,000원</span>
                                    </dt>
                                </dl>
                            </li>
                            <li class="price-total">
                                <div>결제예상금액</div>
                                <span class="price tx-light-blue">188,600원</span>
                            </li>
                        </ul>
                        <div class="willbes-Lec-buyBtn">
                            <ul>
                                <li class="btnAuto180 h36">
                                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">다른상품 더 보기</span>
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
                    <!-- willbes-Cart-Price -->

                    <div class="willbes-Cart-Txt">
                        <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                            <tbody>
                                <tr><td>• <span class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</span></td></tr>
                                <tr><td>• 장바구니에 담은 상품 구매시 강좌 상품 선구매후 교재구매가 가능합니다.</td></tr>
                                <tr><td>• 장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 담기 후 해당 상품의 접수기간이 지났거나, 판매상태가 '판매종료'로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- willbes-Cart-Txt -->

                </div>
                <div id="pocket2" class="tabLink">

                    <div class="willbes-Cartlist c_both mt20">
                        <div class="LeclistTable">
                            <ul class="mb20">
                                <li class="subBtn NSK"><a href="#none">선택 상품 삭제 ></a></li>
                            </ul>
                            <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray mt20">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col>
                                    <col style="width: 140px;">
                                    <col style="width: 60px;">
                                    <col style="width: 150px;">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>수량<span class="row-line">|</span></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left p_re pl20">
                                            <span class="pBox p3">교재</span>
                                            2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                                        </td>
                                        <td class="w-price tx-light-blue">80,000원</td>
                                        <td>2</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2018 김용철 행정법총론 실전 동형모의고사(3월)
                                        </td>
                                        <td class="w-price tx-light-blue">70,000원</td>
                                        <td>2</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2017 9급 공무원 이론 선택형 종합 패키지- 30일완성
                                        </td>
                                        <td class="w-price tx-light-blue">180,000원</td>
                                        <td>1</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2017 정채영 국어 서울시 문제를 알려주마!1
                                        </td>
                                        <td class="w-price tx-light-blue">8,000원</td>
                                        <td>3</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="w-chk"><input type="checkbox" id="goods_chk" name="goods_chk" class="goods_chk"></td>
                                        <td class="w-list tx-left pl20">
                                            <span class="pBox p3">교재</span>
                                            2017 정채영 국어 서울시 문제를 알려주마!2
                                        </td>
                                        <td class="w-price tx-light-blue">5,000원</td>
                                        <td>4</td>
                                        <td class="w-buy">
                                            <span class="tBox t1 black"><a href="">결제</a></span>
                                            <span class="tBox t2 white"><a href="">삭제</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- willbes-Cartlist -->

                    <div class="willbes-Cart-Price p_re">
                        <ul class="cart-PriceBox cart-PriceBox-two NG">
                            <li class="price-list p_re">
                                <dl class="priceBox">
                                    <dt>
                                        <div>
                                            <span class="pBox p3">교재</span>
                                            ( <a class="num tx-light-blue underline" href="#none">2건</a> )
                                        </div>
                                        <span class="price tx-light-blue">140,000원</span>
                                    </dt>
                                    <dt class="price-img">
                                        <span class="row-line">|</span>
                                        <img src="{{ img_url('sub/icon_plus.gif') }}">
                                    </dt>
                                    <dt>
                                        <div>
                                            <span class="pBox p4">배송</span>
                                        </div>
                                        <span class="price tx-light-blue">2,500원</span>
                                    </dt> 
                                </dl>
                            </li>
                            <li class="price-total">
                                <div>결제예상금액</div>
                                <span class="price tx-light-blue">142,500원</span>
                            </li>
                        </ul>
                        <div class="willbes-Lec-buyBtn">
                            <ul>
                                <li class="btnAuto180 h36">
                                    <button type="submit" onclick="" class="mem-Btn bg-white bd-dark-blue">
                                        <span class="tx-light-blue">다른상품 더 보기</span>
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
                    <!-- willbes-Cart-Price -->

                    <div class="willbes-Cart-Txt">
                        <table cellspacing="0" cellpadding="0" class="txtTable tx-gray">
                            <tbody>
                                <tr><td>• <span class="tx-red">정부 지침에 의해 교재는 별도 소득공제가 부과되는 관계로 강좌와 교재는 동시 결제가 불가능합니다.</span></td></tr>
                                <tr><td>• 장바구니에 담은 상품 구매시 강좌 상품 선구매후 교재구매가 가능합니다.</td></tr>
                                <tr><td>• 장바구니 상품은 14일 안에 미구매 시 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                                <tr><td>• 장바구니 담기 후 해당상품의 판매상태가 '품절','절판','출간예정'으로 변경된 경우 자동 삭제 처리됩니다.</td></tr>
                                <tr><td>• 배송상품은 당일 오후1시까지 결제한 상품에 한해 당일 발송처리됩니다.(토,일,공휴일제외)</td></tr>
                            </tbody>
                        </table> 
                    </div>
                    <!-- willbes-Cart-Txt -->

                </div>
            </div>
        </div>
    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="{{ img_url('sample/banner_180605.jpg') }}">     
    </div>
</div>
<!-- End Container -->
@stop