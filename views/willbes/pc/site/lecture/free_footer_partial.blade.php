<div id="buy_layer" class="willbes-Lec-buyBtn-sm NG">
    <div>
        <button type="button" name="btn_direct_pay" data-direct-pay="Y" data-is-redirect="N" class="bg-dark-blue">
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
            <li class="aBox waitBox_block"><a href="#none" id="btn_book_pay">교재구매</a></li>
        </ul>
    </div>
</div>
<!-- willbes-Lec-buyBtn-sm -->
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_form');
    var $buy_layer = $('#buy_layer');
    var $is_show = location.href.indexOf('show') > -1;
    var $is_professor =  location.href.indexOf('professor') > -1;

    $(document).ready(function() {
        if ($is_show === false || $is_professor === true) {
            // 목록 페이지
            // 상품 선택/해제
            $regi_form.on('change', '.chk_products, .chk_books', function() {
                showBuyLayer('on', $(this), 'buy_layer');
                setCheckLectureProduct($regi_form, $(this), '', '', '', '');
            });

            // 내강의실 이동 버튼 클릭
            $buy_layer.on('click', '.answerBox_block', function() {
                goClassRoom();
            });

            // 아니오 버튼 클릭
            $buy_layer.on('click', '.waitBox_block', function() {
                $buy_layer.find('.pocketBox').css('display', 'none').hide();
                $buy_layer.removeClass('active');
            });

            // 교재구매 버튼 클릭
            $buy_layer.on('click', '#btn_book_pay', function() {
                $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                cartNDirectPay($regi_form, 'Y', 'Y');
            });

            // 바로결제 버튼 클릭
            $('button[name="btn_direct_pay"]').on('click', function() {
                var $is_redirect = $(this).data('is-redirect');
                var $layer_type = $regi_form.find('.chk_books:checked').length < 1 ? 'pocketBox1' : 'pocketBox2';

                // 무료강좌 지급
                if (applyFreeLecture($regi_form) === true) {
                    if ($is_redirect === 'N') {
                        openWin($layer_type);
                    } else {
                        // 교재상품 바로결제
                        if ($regi_form.find('.chk_books:checked').length > 0) {
                            $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                            cartNDirectPay($regi_form, 'Y', 'Y');
                        } else {
                            goClassRoom();
                        }
                    }
                }
            });
        } else {
            // 뷰 페이지
            // 상품 선택/해제
            $regi_form.on('change', '.chk_products, .chk_books', function() {
                setCheckLectureProduct($regi_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            // 바로결제 버튼 클릭
            $('button[name="btn_direct_pay"]').on('click', function() {
                // 무료강좌 지급
                if (applyFreeLecture($regi_form) === true) {
                    // 교재상품 바로결제
                    if ($regi_form.find('.chk_books:checked').length > 0) {
                        $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                        cartNDirectPay($regi_form, 'Y', 'Y');
                    } else {
                        goClassRoom();
                    }
                }
            });
        }

        /**
         * 내 강의실 페이지 이동
         */
        function goClassRoom() {
            location.href = '{{ app_url('/classroom/on/list/ongoing', 'www') }}';
        }

        /**
         * 무료강좌 신청
         */
        function applyFreeLecture($regi_form) {
            var $result = false;
            var $confirm_msg = $regi_form.find('.chk_books:checked').length < 1 ? '해당 강좌를 신청하시겠습니까?' : '해당 강좌 및 교재를 신청하시겠습니까?';

            if($regi_form.find('.chk_products:checked').length < 1) {
                alert('강좌를 선택해 주세요.');
                return false;
            }

            if (confirm($confirm_msg)) {
                var $input_prod_code = {};
                $regi_form.find('.chk_products:checked').each(function (idx) {
                    $input_prod_code[idx] = $(this).val();
                });

                var url = '{{ site_url('/order/free') }}';
                var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                    'prod_code': JSON.stringify($input_prod_code)
                });
                sendAjax(url, data, function (ret) {
                    if (ret.ret_cd) {
                        $result = true;
                    }
                }, showAlertError, false, 'POST');
            }

            return $result;
        }
    });

    /**
     * 상세 페이지 이동
     */
    function goShow(prod_code, cate_code, pattern) {
        var $free_lec_passwd = $regi_form.find('input[id="free_lec_passwd_' + prod_code + '"]');
        if ($free_lec_passwd.length > 0) {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            if ($free_lec_passwd.val() === '') {
                alert('보강동영상 비밀번호를 입력해 주세요.');
                $free_lec_passwd.focus();
                return;
            }

            var url = frontUrl('/lecture/checkFreeLecPasswd/prod-code/' + prod_code);
            var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
                'free_lec_passwd': $free_lec_passwd.val()
            });
            sendAjax(url, data, function (ret) {
                if (ret.ret_cd) {
                    location.href = '{{ site_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
                }
            }, showAlertError, false, 'POST');
        } else {
            location.href = '{{ site_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
        }
    }
</script>