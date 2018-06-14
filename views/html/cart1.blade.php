@extends('html.layouts.master')

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
                    <li class="on"><div><img src="/public/img/front/cart/icon_cart1_on.png"> 장바구니</div></li>
                    <li><div><img src="/public/img/front/cart/icon_cart2.png"> 결제하기</div></li>
                    <li><div><img src="/public/img/front/cart/icon_cart3.png"> 결제완료</div></li>
                </ul>
            </div>
            <div class="LeclistTable">
                <ul>
                    <li class="subBtn NSK"><a href="#none">전체 상품 삭제 ></a></li>
                    <li class="subBtn NSK"><a href="#none">선택 상품 삭제 ></a></li>
                </ul>
                <table cellspacing="0" cellpadding="0" class="listTable cartTable tx-gray">
                    <colgroup>
                        <col style="width: 80px;">
                        <col style="width: 550px;">
                        <col style="width: 160px;">
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
                            <td class="w-list tx-left pl20">
                                <span class="pBox p1">강좌</span>
                                2018 정채영 국어 [현대]문학 종결자 문학집중강의(5-6월)
                            </td>
                            <td class="w-price tx-light-blue">80,000원</td>
                            <td class="w-buy">
                                <span class="tBox NSK t1 high"><a href="">결제</a></span>
                                <span class="tBox NSK t2 low"><a href="">삭제</a></span>
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
                                <span class="tBox NSK t1 high"><a href="">결제</a></span>
                                <span class="tBox NSK t2 low"><a href="">삭제</a></span>
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
                                <span class="tBox NSK t1 high"><a href="">결제</a></span>
                                <span class="tBox NSK t2 low"><a href="">삭제</a></span>
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
                                <span class="tBox NSK t1 high"><a href="">결제</a></span>
                                <span class="tBox NSK t2 low"><a href="">삭제</a></span>
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
                                <span class="tBox NSK t1 high"><a href="">결제</a></span>
                                <span class="tBox NSK t2 low"><a href="">삭제</a></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- willbes-Cartlist -->

        <div class="willbes-Cart-Price p_re">
            <ul class="cart-PriceBox NG">
                <li>
                    <div>
                        <span class="pBox p1">강좌</span>
                        ( <a class="num tx-light-blue underline" href="#none">2건</a> )
                    </div>
                    <span class="price tx-light-blue">140,000원</span>
                </li>
                <li class="price-img">
                    <span class="row-line">|</span>
                    <img src="/public/img/front/sub/icon_plus.gif">
                </li>
                <li>
                    <div>
                        <span class="pBox p2">패키지</span>
                        ( <a class="num tx-light-blue underline" href="#none">1건</a> )
                    </div>
                    <span class="price tx-light-blue">180,000원</span>
                </li>
                <li class="price-img">
                    <span class="row-line">|</span>
                    <img src="/public/img/front/sub/icon_plus.gif">
                </li>
                <li>
                    <div>
                        <span class="pBox p3">교재</span>
                        ( <a class="num tx-light-blue underline" href="#none">2건</a> )
                    </div>
                    <span class="price tx-light-blue">13,000원</span>
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
                    <tr><td>• 장바구니 상품은 30일 안에 미구매 시 자동 삭제 처리됩니다.</td></tr>
                    <tr><td>• 장바구니 강좌 삭제 시 해당 강좌의 수강생 교재가 포함된 경우 함께 삭제 처리됩니다.</td></tr>
                    <tr><td>• 배송 상품은 당일 오후 1시까지 결제한 상품에 한해 당일 발송 처리됩니다. (토,일,공휴일 제외)</td></tr>
                </tbody>
            </table>
            
        </div>
        <!-- willbes-Cart-Txt -->

        <script src="/public/js/front/sub.js"></script>
        <script src="/public/js/front/tabs.js"></script>

    </div>
    <div class="Quick-Bnr ml20 mt85">
        <img src="/public/img/front/sample/banner_180605.jpg">     
    </div>
</div>
<!-- End Container -->
@stop