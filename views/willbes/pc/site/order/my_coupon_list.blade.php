<div class="willbes-Layer-CartBox">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
        <img src="{{ img_url('cart/close_cart.png') }}">
    </a>
    <div class="Layer-Tit NG bg-blue">쿠폰적용</div>
    <div class="Layer-Cont">
        <div class="tit NG">
            <span class="pBox p{{ element($cart_data['CartProdType'], $arr_cart_prod_type_idx) }}">
                {{ element($cart_data['CartProdType'], $arr_cart_prod_type_name) }}
            </span>
            {{ $cart_data['ProdName'] }}
        </div>
        <div class="willbes-Pricelist">
            <ul class="PriceBox p_re NG">
                <li>
                    <div>상품금액</div>
                    <div class="price tx-light-blue">{{ number_format($cart_data['RealSalePrice']) }}원</div>
                </li>
                <li class="price-img">
                    <span class="row-line">|</span>
                    <img src="{{ img_url('sub/icon_minus_black.gif') }}">
                </li>
                <li>
                    <div>쿠폰할인금액</div>
                    <div id="_coupon_disc_price" class="price tx-light-pink">0원</div>
                </li>
                <li class="price-img">
                    <span class="row-line">|</span>
                    <img src="{{ img_url('sub/icon_equal.gif') }}">
                </li>
                <li>
                    <div>할인적용금액</div>
                    <span id="_real_pay_price" class="price price-total tx-light-blue">{{ number_format($cart_data['RealSalePrice']) }}원</span>
                </li>
            </ul>
        </div>
        <div class="couponWrap p_re">
            <ul class="tabWrap">
                <li><a href="#coupon1" class="on">적용 가능 쿠폰</a></li>
                <li><a href="#coupon2">전체 보유 쿠폰</a></li>
            </ul>
            <ul class="btnWrap">
                <li class="subBtn white NSK"><a href="#none" onclick="closeWin('{{ $ele_id }}')">쿠폰 적용 안함 ></a></li>
                <li class="subBtn NSK"><a href="#none" id="_btn_coupon_apply">쿠폰 적용 ></a></li>
            </ul>
            <div class="tabBox couponBox">
                <div id="coupon1" class="tabContent">
                    <div class="coupon caution-txt">내가 보유한 쿠폰 중 해당상품에 사용 가능한 쿠폰만 확인 및 적용 가능합니다.</div>
                    <form id="_coupon_form" name="_coupon_form" method="POST" onsubmit="return false;" novalidate>
                        <input type="hidden" name="ele_id" value="{{ $ele_id }}"/>
                        <table cellspacing="0" cellpadding="0" class="couponTable under-gray tx-gray bdt-gray">
                            <colgroup>
                                <col style="width: 50px;">
                                <col style="width: 60px;">
                                <col style="width: 130px;">
                                <col style="width: 215px;">
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
                            @foreach($results['usable'] as $idx => $row)
                                <tr>
                                    <td><input type="radio" name="_coupon_idx" value="{{ $row['CouponIdx'] }}"/></td>
                                    <td>{{ $row['ApplyTypeCcdName'] }}</td>
                                    <td>{{ $row['CouponPin'] }}</td>
                                    <td>{{ $row['CouponName'] }}</td>
                                    <td>{{ $row['DiscRate'] }}{{ $row['DiscRateUnit'] }}</td>
                                    <td>{{ $row['ValidDay'] }}일</td>
                                    <td>{{ $row['RemainDay'] }}일</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
                <div id="coupon2" class="tabContent" style="display: none;">
                    <div class="coupon caution-txt">내가 보유한 전체 쿠폰을 확인 할 수 있습니다.</div>
                    <table cellspacing="0" cellpadding="0" class="couponTable under-gray tx-gray bdt-gray">
                        <colgroup>
                            <col style="width: 60px;">
                            <col style="width: 130px;">
                            <col style="width: 190px;">
                            <col style="width: 80px;">
                            <col style="width: 90px;">
                            <col style="width: 70px;">
                            <col style="width: 70px;">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>분류<span class="row-line">|</span></th>
                            <th>쿠폰번호<span class="row-line">|</span></th>
                            <th>쿠폰명<span class="row-line">|</span></th>
                            <th><div class="line2">할인율<br/>(금액)</div><span class="row-line line2">|</span></th>
                            <th>사용가능기간<span class="row-line">|</span></th>
                            <th>유효여부<span class="row-line">|</span></th>
                            <th>남은일자</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['all'] as $idx => $row)
                            <tr>
                                <td>{{ $row['ApplyTypeCcdName'] }}</td>
                                <td>{{ $row['CouponPin'] }}</td>
                                <td>{{ $row['CouponName'] }}</td>
                                <td>{{ $row['DiscRate'] }}{{ $row['DiscRateUnit'] }}</td>
                                <td>@if($row['ValidStatus'] == '만료') ~ {{ substr($row['ExpireDatm'], 0, 10) }} @else {{ $row['ValidDay'] }}일 @endif</td>
                                <td>{{ $row['ValidStatus'] }}</td>
                                <td>{{ $row['RemainDay'] }}일</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/public/js/willbes/tabs.js"></script>
<script type="text/javascript">
    var $_coupon_form = $('#_coupon_form');
    var $parent_regi_form = $('#regi_form');

    $(document).ready(function() {

    });
</script>