<div id="buy_off_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="submit" name="btn_off_direct_pay" data-direct-pay="Y" data-is-redirect="Y" class="bg-dark-blue">
            <span>바로결제</span>
        </button>
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

    $(document).ready(function() {
        // 상품 선택/해제
        $regi_off_form.on('change', '.chk_products', function() {
            showBuyLayer('off', $(this), 'buy_off_layer');
        });

        // 방문결제 버튼 클릭
        $regi_off_form.on('click', '.btn-off-visit-pay', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var prod_code = $(this).data('prod-code');
            if (prod_code === '') {
                alert('선택된 상품이 없습니다.');
                return;
            }
            $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);

            if (confirm('방문접수를 신청하시겠습니까?')) {
                var url = '{{ front_url('/order/visit/direct', true) }}';
                ajaxSubmit($regi_visit_form, url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                        location.replace(ret.ret_data.ret_url);
                    }
                }, showValidateError, null, false, 'alert');
            }
        });

        // 바로결제 버튼 클릭
        $('button[name="btn_off_direct_pay"]').on('click', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');

            cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);
        });
    });
</script>