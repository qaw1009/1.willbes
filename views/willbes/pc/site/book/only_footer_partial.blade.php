<div id="buy_continue_layer" class="willbes-Lec-buyBtn-sm NG common_buy_layer">
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

<!-- willbes-Lec-buyBtn-sm -->
<script src="/public/js/willbes/product_util.js?ver={{time()}}"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');
    var $buy_continue_layer = $('#buy_continue_layer');

    $(document).ready(function() {
        {{--장바구니, 바로결제 버튼 클릭--}}
        $('a[name="btn_book_cart"], a[name="btn_book_direct_pay"]').on('click', function () {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
            var $prod_code = $(this).data('prod-code');
            $regi_form.find('input:checkbox[name="prod_code[]"]').prop('checked', false);
            $regi_form.find('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');
            var $dt_type = $(this).data('layer-dt-type') || '';   // 장바구니 레이어 상세구분 값
            var $result = cartNDirectPay($regi_form, $is_direct_pay, $is_redirect);
            if ($is_redirect === 'N' && $result === true) {
                showContinueLayer('book', $dt_type, $(this), 'buy_continue_layer');
            }
        });

        {{--장바구니 이동 버튼 클릭--}}
        $('.common_buy_layer').on('click', '.answerBox_block', function() {
            goCartPage(getCartType($regi_form));
        });

        {{--계속구매 버튼 클릭--}}
        $('.common_buy_layer').on('click', '.closeBtn, .waitBox_block, .closeBox_block', function() {
            $('.common_buy_layer').removeClass('active');
        });

        // 교재로 진행중인 강의 버튼 클릭
        $regi_form.on('click', '.bookLecBtn > a', function() {
            var prod_code = $(this).data('prod-code');
            var cate_code = '{{ element('cate_code', $arr_input, element('CateCode', $__cfg, '')) }}';
            var ele_id = 'bookLec_' + prod_code;
            var lec_selector = $('#' + ele_id).find('.LeclistTable ul');

            if ($(this).hasClass('on')) {
                $(this).removeClass('on').text('교재로 진행중인 강의 ▼');
                closeWin(ele_id);
            } else {
                $(this).addClass('on').text('교재로 진행중인 강의 ▲');
                openWin(ele_id);

                // 단강좌/무료강좌 정보 조회 (기존 조회결과가 없을 경우만 조회)
                if (lec_selector.html() === '') {
                    var url = '{{ front_url('/book/lectureInfo/prod-code/') }}' + prod_code + '?cate_code=' + cate_code;
                    var html = '';

                    sendAjax(url, {}, function(ret) {
                        if (ret.ret_cd) {
                            if (ret.ret_data.length < 1) {
                                html += '<li>해당 교재로 진행중인 강의가 없습니다.</li>';
                            } else {
                                $.each(ret.ret_data, function (i, item) {
                                    html += '<li><a href="{{ site_url('/lecture/show') }}/cate/' + item.CateCode + '/pattern/' + item.Pattern + '/prod-code/' + item.ProdCode + '" target="_blank">' + item.ProdName + '</a></li>';
                                });
                            }

                            // 조회결과 셋팅
                            lec_selector.html(html);
                        }
                    }, showAlertError, true, 'GET');
                }
            }
        });

        // 교재로 진행중인 강의 레이어 닫기
        $regi_form.on('click', '.bookLecBtn .closeBtn', function() {
            var prod_code = $(this).data('prod-code');

            $(this).parents('.bookLecBtn').children('a').removeClass('on').text('교재로 진행중인 강의 ▼');
            closeWin('bookLec_' + prod_code);
        });
    });
</script>