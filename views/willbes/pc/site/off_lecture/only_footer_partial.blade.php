<div id="buy_off_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="submit" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
</div>
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_off_form = $('#regi_off_form');

    $(document).ready(function() {
        // 상품 선택/해제
        $regi_off_form.on('change', '.chk_products', function() {
            showBuyLayer('off', $(this), 'buy_off_layer');
        });

        // 방문접수, 바로결제 버튼 클릭
        $('button[name="btn_off_visit_pay"], button[name="btn_off_direct_pay"]').on('click', function() {

            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');

            cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
        });
    });
</script>