<div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="button" name="btn_cart" data-direct-pay="N" data-is-redirect="N" class="bg-deep-gray">
            <span>장바구니</span>
        </button>
    </div>
    <div>
        <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
    <div id="pocketBox" class="pocketBox" style="display: none;">
        해당 상품이 장바구니에 담겼습니다.<br/>
        장바구니로 이동하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
        </ul>
    </div>
</div>
<!-- willbes-Lec-buyBtn-sm -->
<script type="text/javascript">
    var $regi_form = $('#regi_form');
    var $buy_layer = $('#buy_layer');

    $(document).ready(function() {
        // 상품 선택/해제
        $regi_form.on('change', '.chk_products, .chk_books', function() {
            showBuyLayer($regi_form, $(this), 'buy_layer', 'pocketBox');
            setCheckLectureProduct($regi_form, $(this), '', '', '', '');
        });

        // 장바구니 이동 버튼 클릭
        $buy_layer.on('click', '.answerBox_block', function() {
            goCartPage('{{ $__cfg['CateCode'] }}', getCartType($regi_form));
        });

        // 계속구매 버튼 클릭
        $buy_layer.on('click', '.waitBox_block', function() {
            $buy_layer.find('.pocketBox').css('display','none').hide();
            $buy_layer.removeClass('active');
        });

        // 장바구니, 바로결제 버튼 클릭
        $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function () {
            var $is_direct_pay = $(this).data('direct-pay') || 'N';
            var $is_redirect = $(this).data('is-redirect') || 'Y';
            var $cate_code = '{{ $__cfg['CateCode'] }}';

            cartNDirectPay($regi_form, $cate_code, $is_direct_pay, $is_redirect);
        });
    });
</script>