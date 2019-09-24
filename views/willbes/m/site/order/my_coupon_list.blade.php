<div class="willbes-Layer-PassBox willbes-Layer-PassBox600 h510 fix">
    <a class="closeBtn" href="#none" onclick="closeWin('{{ $ele_id }}')">
        <img src="{{ img_url('m/calendar/close.png') }}">
    </a>
    <h4>
        쿠폰적용
    </h4>
    <div class="couponListBox">
        <ul class="payLecList">
            <li><span>{{ $cart_data['CartProdTypeName'] }}</span></li>
            <li>{{ $cart_data['ProdName'] }}</li>
        </ul>

        <div class="priceBox">
            <ul>
                <li>
                    <strong>상품금액</strong>
                    <span>{{ number_format($cart_data['RealPayPrice']) }}원</span>
                </li>
                <li>
                    <strong>쿠폰할인금액</strong>
                    <span class="tx-red">-<span id="_coupon_disc_price">0</span>원</span>
                </li>
                <li class="NGEB">
                    <strong>할인적용금액</strong>
                    <span class="tx-blue"><span id="_real_pay_price">{{ number_format($cart_data['RealPayPrice']) }}</span>원</span>
                </li>
            </ul>
        </div>

        <ul class="tabWrap two couponTab">
            <li><a href="#coupon1" class="on">적용 가능 쿠폰</a></li>
            <li><a href="#coupon2">전체 보유 쿠폰</a></li>
        </ul>

        <div class="couponList" id="coupon1">
            <form id="_coupon_form" name="_coupon_form" method="POST" onsubmit="return false;" novalidate>
                <input type="hidden" name="ele_id" value="{{ $ele_id }}"/>
                <p>내가 보유한 쿠폰 중 해당상품에 사용 가능한 쿠폰만 확인 및 적용 가능합니다.</p>
                @if(empty($results['usable']) === true)
                    <div class="couponNo">
                        <img src="{{ img_url('m/mypage/icon_warning.png') }}"><br>
                        적용 가능한 쿠폰이 없습니다.
                    </div>
                @else
                    @foreach($results['usable'] as $idx => $row)
                        <ul>
                            <li>
                                <input type="radio" id="_coupon_detail_idx_{{ $row['CdIdx'] }}" name="_coupon_detail_idx" value="{{ $row['CdIdx'] }}" data-coupon-name="{{ $row['CouponName'] }}" data-disc-rate="{{ $row['DiscRate'] }}" data-disc-type="{{ $row['DiscType'] }}" @if(in_array($row['CdIdx'], $arr_coupon_detail_idx) === true) disabled="disabled" @endif/>
                                <label for="_coupon_detail_idx_{{ $row['CdIdx'] }}">{{ $row['CouponName'] }}</label>
                            </li>
                            <li>
                                <strong>할인율(금액)</strong>
                                {{ number_format($row['DiscRate']) }}{{ $row['DiscRateUnit'] }}
                            </li>
                            <li>
                                <strong>사용기간</strong>
                                {{ substr($row['IssueDatm'], 0, 16) }} ~ {{ substr($row['ExpireDatm'], 0, 16) }}
                            </li>
                            <li>
                                <strong>분류</strong>
                                {{ $row['ApplyTypeCcdName'] }}
                            </li>
                        </ul>
                    @endforeach
                @endif
            </form>
        </div>

        <div class="couponList" id="coupon2">
            <p>내가 보유한 전체 쿠폰을 확인 할 수 있습니다.</p>
            @if(empty($results['all']) === true)
                <div class="couponNo">
                    <img src="{{ img_url('m/mypage/icon_warning.png') }}"><br>
                    보유한 쿠폰이 없습니다.
                </div>
            @else
                @foreach($results['all'] as $idx => $row)
                    <ul>
                        <li>{{ $row['CouponName'] }}</li>
                        <li>
                            <strong>할인율(금액)</strong>
                            {{ number_format($row['DiscRate']) }}{{ $row['DiscRateUnit'] }}
                        </li>
                        <li>
                            <strong>사용기간</strong>
                            {{ substr($row['IssueDatm'], 0, 16) }} ~ {{ substr($row['ExpireDatm'], 0, 16) }} ({{ $row['ValidStatusName'] }})
                        </li>
                        <li>
                            <strong>분류</strong>
                            {{ $row['ApplyTypeCcdName'] }}
                        </li>
                    </ul>
                @endforeach
            @endif
        </div>

        <div class="couponInfo">
            <p>쿠폰 이용 안내</p>
            <ul>
                <li>쿠폰은 유효기간 내에만 사용이 가능하며, 유효기간이 지난 쿠폰은 소멸됩니다.</li>
                <li>쿠폰으로 구매한 상품 취소 시, 사용된 쿠폰은 복원되지 않고 소멸됩니다.</li>
            </ul>
        </div>
    </div>
    <div class="couponBtns">
        <ul>
            <li><a href="#none" id="_btn_coupon_cancel" class="btn_black_line">쿠폰 적용 안함</a></li>
            <li><a href="#none" id="_btn_coupon_apply" class="btn-purple">쿠폰 적용</a></li>
        </ul>
    </div>
</div>
<div class="dim" onclick="closeWin('{{ $ele_id }}')"></div>
<script src="/public/js/willbes/tabs.js"></script>
<script type="text/javascript">
    var $_coupon_form = $('#_coupon_form');
    var $parent_regi_form = $('#regi_form');
    var cart_idx = '{{ $cart_data['CartIdx'] }}';
    var real_sale_price = '{{ $cart_data['RealSalePrice'] }}';
    var real_pay_price = '{{ $cart_data['RealPayPrice'] }}';
    var coupon_disc_price = 0;

    $(document).ready(function() {
        // 적용가능쿠폰 체크박스 선택
        $_coupon_form.on('click', 'input[name="_coupon_detail_idx"]', function() {
            var input_data = $(this).data();

            // 할인금액 계산
            coupon_disc_price = (input_data.discType === 'R') ? real_sale_price * (input_data.discRate / 100) : input_data.discRate;
            $('#_coupon_disc_price').html(addComma(coupon_disc_price));
            // 할인적용금액
            $('#_real_pay_price').html(addComma(real_pay_price - coupon_disc_price));
        });

        // 쿠폰 적용 버튼 클릭
        $('#_btn_coupon_apply').on('click', function() {
            var $cart_row = $parent_regi_form.find('#cart_row_' + cart_idx);
            var $selected_coupon = $_coupon_form.find('input[name="_coupon_detail_idx"]:checked');

            if ($selected_coupon.length < 1) {
                alert('적용하실 쿠폰을 선택해 주세요.');
                return;
            }

            if (confirm('해당 쿠폰을 적용하시겠습니까?')) {
                // 주문 폼에 선택된 쿠폰정보 셋팅
                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').data('coupon-disc-price', coupon_disc_price);
                $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').val($selected_coupon.val()).trigger('change');
                $cart_row.find('.wrap-coupon').removeClass('d_none');
                $cart_row.find('.wrap-real-sale-price').removeClass('d_none');
                $cart_row.find('.coupon-name').html($selected_coupon.data('coupon-name'));
                $cart_row.find('.coupon-disc-price').html(addComma(coupon_disc_price));
                $cart_row.find('.real-pay-price').html(addComma(real_pay_price - coupon_disc_price));

                alert('적용 되었습니다.');
                closeWin('{{ $ele_id }}');
            }
        });

        // 쿠폰 적용 안함 버튼 클릭
        $('#_btn_coupon_cancel').on('click', function() {
            var $cart_row = $parent_regi_form.find('#cart_row_' + cart_idx);
            var $coupon_detail_idx = $cart_row.find('input[name="coupon_detail_idx[' + cart_idx + ']"]').val();

            if ($coupon_detail_idx !== '') {
                // 주문 폼 쿠폰적용 삭제버튼 클릭
                $cart_row.find('.btn-coupon-apply-delete').click();
                closeWin('{{ $ele_id }}');
            } else {
                alert('적용된 쿠폰이 없습니다.');
            }
        });
    });
</script>