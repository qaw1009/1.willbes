<div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="button" name="btn_only_cart" data-direct-pay="N" class="bg-deep-gray">
            <span>장바구니</span>
        </button>
    </div>
    <div>
        <button type="button" name="btn_only_direct_pay" data-direct-pay="Y" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
    <div id="pocketBox1" class="pocketBox" style="display: none;">
        해당 상품이 신청되었습니다.<br/>
        내 강의실로 이동 하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">아니오</a></li>
        </ul>
    </div>
    <div id="pocketBox2" class="pocketBox" style="display: none;">
        해당 상품이 신청되었습니다.<br/>
        강좌는 내 강의실에서 수강 가능합니다.
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">내강의실</a></li>
            <li class="aBox waitBox_block"><a href="#none">교재구매</a></li>
        </ul>
    </div>
    <div id="pocketBox3" class="pocketBox" style="display: none;">
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
        // 강좌상품 선택/해제
        $regi_form.on('change', '.chk_products', function() {
            // 장바구니 버튼 비활성화
            $buy_layer.find('button[name="btn_only_cart"]').css('display', 'none').hide();

            showBuyLayer($regi_form, $(this), 'buy_layer', 'pocketBox1');
            setCheckProduct($regi_form, $(this), '', '', '', '');
        });

        // 교재상품 선택/해제
        $regi_form.on('change', '.chk_books', function() {
            // 장바구니 버튼 활성화
            $buy_layer.find('button[name="btn_only_cart"]').css('display', '').show();

            showBuyLayer($regi_form, $(this), 'buy_layer');
            setCheckProduct($regi_form, $(this), '', '', '', '');
        });

        // 장바구니 이동 버튼 클릭
        $buy_layer.on('click', '.answerBox_block', function() {
            goCartPage('{{ $__cfg['CateCode'] }}', $regi_form.find('input[name="cart_type"]').val());
        });

        // 계속구매 버튼 클릭
        $buy_layer.on('click', '.waitBox_block', function() {
            $buy_layer.find('.pocketBox').css('display','none').hide();
            $buy_layer.removeClass('active');
        });

        // 레이어 장바구니, 바로결제 버튼 클릭
        $buy_layer.on('click', 'button[name="btn_only_cart"], button[name="btn_only_direct_pay"]', function () {
            var $is_direct_pay = $(this).data('direct-pay') || 'N';
            var $only_prod_code = $regi_form.find('input[name="only_prod_code"]').val();

            if ($only_prod_code.length < 1) {
                alert('강좌를 선택해 주세요.');
                return;
            }

            // set hidden value
            $regi_form.find('input[name="is_direct_pay"]').val($is_direct_pay);

            var url = '{{ site_url('/cart/store/cate/' . $__cfg['CateCode']) }}';
            var data = arrToJson($regi_form.find('input[type="hidden"]').serializeArray());
            sendAjax(url, data, function(ret) {
                if (ret.ret_cd) {
                    if (ret.ret_data.hasOwnProperty('ret_url') === true) {
                        location.href = ret.ret_data.ret_url;
                    } else {
                        openWin('pocketBox');
                    }
                }
            }, showAlertError, false, 'POST');
        });

        // 장바구니, 바로결제 버튼 클릭
        $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
            var $is_direct_pay = $(this).data('direct-pay') || 'N';
            var $cate_code = '{{ $__cfg['CateCode'] }}';

            cartNDirectPay($regi_form, $is_direct_pay, $cate_code);
        });
    });
</script>