@extends('willbes.pc.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="subContainer widthAuto c_both">
    <!-- site nav -->
    @include('willbes.pc.layouts.partial.site_menu')
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
        <div class="pocketDetailWrap pt40">
            <ul class="tabWrap tabDepth1 NG">
                <li><a id="hover1" href="#pocket1" class="on">강좌</a></li>
                <li><a id="hover2" href="#pocket2">교재</a></li>
            </ul>
            <div class="tabBox">
                <div id="pocket1" class="tabLink">
                    <form id="lecture_form" name="lecture_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <div class="willbes-Cartlist c_both">
                            <div class="LeclistTable">
                                <ul>
                                    <li class="subBtn NSK"><a href="#none" class="btn-checked-delete" data-tab-id="lecture">선택 상품 삭제 ></a></li>
                                </ul>
                                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 80px;">
                                        <col style="width: 550px;">
                                        <col style="width: 160px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="lecture"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results['list']['on_lecture'] as $idx => $row)
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" name="cart_idx[]" value="{{ $row['CartIdx'] }}" class="chk-cart"/></td>
                                            @if($row['IsPackage'] == 'N')
                                                <td class="w-list tx-left pl20"><span class="pBox p1">강좌</span> {{ $row['ProdName'] }}</td>
                                            @else
                                                <td class="w-list tx-left p_re pl20">
                                                    <a href="#none" onclick="openWin('package_lec_list_{{ $row['CartIdx'] }}');">
                                                        <span class="pBox p2">패키지</span> {{ $row['ProdName'] }}
                                                        <img class="dot" style="display: none; margin: -2px 0 0 5px;" src="{{ img_url('sub/icon_detail.gif') }}">
                                                    </a>
                                                    <div id="package_lec_list_{{ $row['CartIdx'] }}" class="willbes-Layer-Box-sm">
                                                        <a class="closeBtn" href="#none" onclick="closeWin('package_lec_list_{{ $row['CartIdx'] }}');">
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
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            @endif
                                            <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                            <td class="w-buy">
                                                <span class="tBox NSK t1 black"><a href="#none" class="btn-only-pay" data-tab-id="lecture" data-cart-idx="{{ $row['CartIdx'] }}">결제</a></span>
                                                <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="lecture" data-cart-idx="{{ $row['CartIdx'] }}">삭제</a></span>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                                ( <a class="num tx-light-blue underline" href="#none">{{ element('on_lecture', $results['count'], 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(element('on_lecture', $results['price'], 0), 0) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p2">패키지</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ element('on_package', $results['count'], 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(element('on_package', $results['price'], 0), 0) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p4">배송</span>
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(element('on_lecture', $results['delivery_price'], 0), 0) }}원</span>
                                        </dt>
                                    </dl>
                                </li>
                                <li class="price-total">
                                    <div>결제예상금액</div>
                                    <span class="price tx-light-blue">{{ number_format(element('on_lecture', $results['price'], 0) + element('on_package', $results['price'], 0) + element('on_lecture', $results['delivery_price'], 0), 0) }}원</span>
                                </li>
                            </ul>
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_continue" data-tab-id="lecture" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">다른상품 더 보기</span>
                                        </button>
                                    </li>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_pay" data-tab-id="lecture" class="mem-Btn bg-blue bd-dark-blue">
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
                    </form>
                </div>
                <div id="pocket2" class="tabLink">
                    <form id="book_form" name="book_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        {!! method_field('POST') !!}
                        <div class="willbes-Cartlist c_both">
                            <div class="LeclistTable">
                                <ul>
                                    <li class="subBtn NSK"><a href="#none" class="btn-checked-delete" data-tab-id="book">선택 상품 삭제 ></a></li>
                                </ul>
                                <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-black upper-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 80px;">
                                        <col style="width: 550px;">
                                        <col style="width: 160px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="_is_all" class="all-check" data-tab-id="book"/><span class="row-line">|</span></th>
                                        <th>상품정보<span class="row-line">|</span></th>
                                        <th>판매가<span class="row-line">|</span></th>
                                        <th>결제/삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($results['list']['book'] as $idx => $row)
                                        <tr>
                                            <td class="w-chk"><input type="checkbox" name="cart_idx[]" value="{{ $row['CartIdx'] }}" class="chk-cart"/></td>
                                            <td class="w-list tx-left pl20"><span class="pBox p3">교재</span> {{ $row['ProdName'] }}</td>
                                            <td class="w-price tx-light-blue">{{ number_format($row['RealSalePrice'], 0) }}원</td>
                                            <td class="w-buy">
                                                <span class="tBox NSK t1 black"><a href="#none" class="btn-only-pay" data-tab-id="book" data-cart-idx="{{ $row['CartIdx'] }}">결제</a></span>
                                                <span class="tBox NSK t2 white"><a href="#none" class="btn-only-delete" data-tab-id="book" data-cart-idx="{{ $row['CartIdx'] }}">삭제</a></span>
                                            </td>
                                        </tr>
                                    @endforeach
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
                                                <span class="pBox p3">교재</span>
                                                ( <a class="num tx-light-blue underline" href="#none">{{ element('book', $results['count'], 0) }}건</a> )
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(element('book', $results['price'], 0), 0) }}원</span>
                                        </dt>
                                        <dt class="price-img">
                                            <span class="row-line">|</span>
                                            <img src="{{ img_url('sub/icon_plus.gif') }}">
                                        </dt>
                                        <dt>
                                            <div>
                                                <span class="pBox p4">배송</span>
                                            </div>
                                            <span class="price tx-light-blue">{{ number_format(element('book', $results['delivery_price'], 0), 0) }}원</span>
                                        </dt>
                                    </dl>
                                </li>
                                <li class="price-total">
                                    <div>결제예상금액</div>
                                    <span class="price tx-light-blue">{{ number_format(element('book', $results['price'], 0) + element('book', $results['delivery_price'], 0), 0) }}원</span>
                                </li>
                            </ul>
                            <div class="willbes-Lec-buyBtn">
                                <ul>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_continue" data-tab-id="book" class="mem-Btn bg-white bd-dark-blue">
                                            <span class="tx-light-blue">다른상품 더 보기</span>
                                        </button>
                                    </li>
                                    <li class="btnAuto180 h36">
                                        <button type="submit" name="btn_pay" data-tab-id="book" class="mem-Btn bg-blue bd-dark-blue">
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
                    </form>
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
