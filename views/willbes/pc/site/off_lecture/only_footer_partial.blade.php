<div id="buy_off_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="button" name="btn_off_cart" data-direct-pay="N" data-is-redirect="N" class="bg-deep-gray">
            <span>장바구니</span>
        </button>
    </div>
    <div>
        <button type="submit" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
    </div>
    <div id="offPocketBox" class="pocketBox" style="display: none;">
        해당 상품이 장바구니에 담겼습니다.<br/>
        장바구니로 이동하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
        </ul>
    </div>
</div>
{{-- 방문결제 폼 --}}
<form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="off_lecture"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value="off_lecture"/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value="Y"/>    {{-- 바로결제 여부 --}}
    <input type="hidden" name="prod_code[]" value=""/>  {{-- 상품코드 --}}
</form>
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_off_form = $('#regi_off_form');
    var $regi_visit_form = $('#regi_visit_form');
    var $buy_off_layer = $('#buy_off_layer');

    $(document).ready(function() {
        // 상품 선택/해제
        $regi_off_form.on('change', '.chk_products', function() {
            showBuyLayer('off', $(this), 'buy_off_layer');
            setCheckOffLectureProduct($regi_off_form, $(this));
        });

        // 방문결제 버튼 클릭
        $regi_off_form.on('click', '.btn-off-visit-pay', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var prod_code = $(this).data('prod-code');
            if (prod_code === '') {
                alert('선택된 상품이 없습니다.');
                return;
            }

            // 상품 체크
            if (checkProduct($regi_visit_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_visit_form) === false) {
                return;
            }

            if (confirm('방문접수를 신청하시겠습니까?')) {
                $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);

                var url = '{{ front_url('/order/visit/direct', true) }}';
                ajaxSubmit($regi_visit_form, url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.replace(ret.ret_data.ret_url);
                    }
                }, showValidateError, null, false, 'alert');
            }
        });

        // 장바구니 이동 버튼 클릭
        $buy_off_layer.on('click', '.answerBox_block', function() {
            goCartPage(getCartType($regi_off_form));
        });

        // 계속구매 버튼 클릭
        $buy_off_layer.on('click', '.waitBox_block', function() {
            $buy_off_layer.find('.pocketBox').css('display','none').hide();
            $buy_off_layer.removeClass('active');
        });

        // 장바구니, 바로결제 버튼 클릭
        $('button[name="btn_off_cart"], button[name="btn_off_direct_pay"]').on('click', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            var $result = cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);

            if ($is_redirect === 'N' && $result === true) {
                openWin('offPocketBox');
            }
        });
    });
</script>