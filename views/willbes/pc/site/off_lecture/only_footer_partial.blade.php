{{--방문결제 레이어--}}
<div id="buy_off_visit_continue_layer" class="willbes-Lec-buyBtn-sm NG common_buy_layer">
    <div class="pocketBox" style="display:block">
        <a class="closeBtn" href="#none">
            <img src="{{ img_url('cart/close.png') }}">
        </a>
        해당 상품이 학원방문결제 접수에 <BR>담겼습니다.<br/>
        학원방문결제접수로 이동하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
            <li class="aBox closeBox_block"><a href="#none">닫기</a></li>
        </ul>
    </div>
</div>

{{--계속구매 레이어--}}
<div id="buy_off_continue_layer" class="willbes-Lec-buyBtn-sm NG common_buy_layer">
    <div class="pocketBox" style="display:block">
        <a class="closeBtn" href="#none">
            <img src="{{ img_url('cart/close.png') }}">
        </a>
        해당 상품이 장바구니에 담겼습니다.<br/>
        장바구니로 이동하시겠습니까?
        <ul class="NSK mt20">
            <li class="aBox answerBox_block"><a href="#none">예</a></li>
            <li class="aBox waitBox_block"><a href="#none">계속구매</a></li>
            <li class="aBox closeBox_block"><a href="#none">닫기</a></li>
        </ul>
    </div>
</div>

{{-- 방문결제 폼 --}}
<form id="regi_visit_form" name="regi_visit_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field('POST') !!}
    <input type="hidden" name="learn_pattern" value="{{empty($learn_pattern) ? 'off_lecture' : $learn_pattern }}"/>  {{-- 학습형태 --}}
    <input type="hidden" name="cart_type" value="off_lecture"/>   {{-- 장바구니 탭 아이디 --}}
    <input type="hidden" name="is_direct_pay" value="N"/>    {{-- 바로결제 여부 --}}
    <input type="hidden" name="is_visit_pay" value="Y"/>    {{-- 방문결제 여부 --}}
    <input type="hidden" name="prod_code[]" value=""/>  {{-- 상품코드 --}}
</form>
<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_off_form = $('#regi_off_form');
    var $regi_visit_form = $('#regi_visit_form');
    var $buy_off_layer_continue = $('#buy_off_layer_continue');
    var $is_off_show = location.href.indexOf('offLecture/show') > -1;

    $(document).ready(function() {

        if ($is_off_show === false) {
            {{--방문결제 버튼 클릭--}}
            $regi_off_form.on('click', '.btn-off-visit-pay', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                var prod_code=$(this).data('prod-code');
                if (prod_code === undefined) {
                    alert('상품을 선택해 주세요.');
                    return;
                }
                eachProductCart(prod_code, $(this), 'layer');
            });

            {{--장바구니, 바로결제 버튼 클릭--}}
            $('a[name="btn_off_cart"], a[name="btn_off_direct_pay"]').on('click', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                $regi_off_form.find('input[name="cart_type"]').val(''); {{--초기화 필요 (뒤로가기시 캐쉬로 인한 문제 발생)--}}
                var $prod_code = $(this).data('prod-code');
                $regi_off_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
                $regi_off_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);

                var $dt_type = $regi_off_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('class');
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                var $result = addCartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect, 'off');
                if ($is_redirect === 'N' && $result === true) {
                    showContinueLayer('off', $dt_type, $(this), 'buy_off_continue_layer');
                }
            });

        {{--뷰 페이지--}}
        } else {

            {{--상품 선택/해제--}}
            $regi_off_form.on('change', '.chk_products, .chk_books', function () {
                setCheckLectureProduct($regi_off_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            {{--방문결제, 장바구니, 바로결제 버튼 클릭--}}
            $regi_off_form.on('click', 'button[name="btn_off_visit_pay"], button[name="btn_cart"], button[name="btn_direct_pay"]', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                {{--방문결제 버튼 클릭--}}
                if ($(this).attr('name') === 'btn_off_visit_pay') {

                    var prod_code = $("input:checkbox[class='chk_products']:checked").val();
                    if (prod_code === undefined) {
                        alert('상품을 선택해 주세요.');
                        return;
                    }
                    {{--상품 체크--}}
                    if (checkProduct($regi_visit_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_visit_form,'off') === false) {
                        return;
                    }
                    if (confirm('방문접수를 신청하시겠습니까?')) {
                        $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);
                        $regi_visit_form.find('input[name="is_direct_pay"]').val('Y');
                        $regi_visit_form.find('input[name="is_visit_pay"]').val('');
                        var url = frontPassUrl('/order/visit/direct');
                        ajaxSubmit($regi_visit_form, url, function (ret) {
                            if (ret.ret_cd) {
                                alert(ret.ret_msg);
                                subCheck();
                                location.href = ret.ret_data.ret_url;
                            }
                        }, showValidateError, null, false, 'alert');
                    }

                    function subCheck() {
                        {{--선택한 교재 확인 후 장바구니로 보내기--}}
                        var book_check_cnt = $("input:checkbox[class='chk_books']:checked").length;
                        if (book_check_cnt > 0) {
                            $("input:checkbox[class='chk_products']").prop('checked', false);
                            addCartNDirectPay($regi_off_form, 'N', 'N', '{{front_url('')}}');
                        }
                        return true;
                    }

                {{--장바구니, 바로결제 버튼 클릭--}}
                } else {
                    var $is_direct_pay = $(this).data('direct-pay');
                    cartNDirectPay($regi_off_form, $is_direct_pay, 'Y');
                }
            });
        }

        {{--장바구니 이동 버튼 클릭--}}
        $('.common_buy_layer').on('click', '.answerBox_block', function() {
            goCartPage(getCartType($regi_off_form),'off');
        });

        {{--계속구매 버튼 클릭--}}
        $('.common_buy_layer').on('click', '.closeBtn, .waitBox_block, .closeBox_block', function() {
            $('.common_buy_layer').removeClass('active');
        });

        {{--방문결제 이동 버튼 클릭--}}
        $('#buy_off_visit_continue_layer').on('click', '.answerBox_block', function() {
            alert('유의사항 확인 후 방문결제 버튼을 클릭하셔야 최종 접수가 완료됩니다.');
            location.href = frontPassUrl('/offVisitLecture');
        });

        {{-- 방문결제 장바구니 담기 --}}
        function eachProductCart(val,_this, act_type) {
            var url = frontPassUrl('/cart/store');
            var data = $.extend(arrToJson($regi_visit_form.find('input[type="hidden"]').serializeArray()), {
                'prod_code[]' : val
            });
            sendAjax(url, data, function(ret) {
                if(ret.ret_cd) {
                    if(act_type==='layer') {
                        showContinueLayer('off', 'chk_products', _this, 'buy_off_visit_continue_layer');
                    } else {
                        location.href = frontPassUrl('/offVisitLecture');
                    }
                }
            }, function(ret){
                alert(ret.ret_msg);
            }, false, 'POST');
        }
    });

    {{--상세페이지 이동--}}
    function goShowOff(prod_code, cate_code) {
        location.href = frontPassUrl('/offLecture/show/cate/' + cate_code + '/prod-code/' + prod_code +'{{empty($learn_pattern) ? '' : ($learn_pattern === 'off_lecture_before' ? '/pattern/before' : '')}}');
    }
</script>