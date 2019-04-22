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
<script src="/public/js/willbes/product_util.js"></script>
<script type="text/javascript">
    var $regi_form = $('#regi_book_form');
    var $buy_layer = $('#buy_layer');

    $(document).ready(function() {
        // 목록 페이지
        // 상품 선택/해제
        $regi_form.on('change', '.chk_books', function() {
            showBuyLayer('book', $(this), 'buy_layer');
        });

        // 장바구니 이동 버튼 클릭
        $buy_layer.on('click', '.answerBox_block', function() {
            goCartPage('book');
        });

        // 계속구매 버튼 클릭
        $buy_layer.on('click', '.waitBox_block', function() {
            $buy_layer.find('.pocketBox').css('display','none').hide();
            $buy_layer.removeClass('active');
        });

        // 장바구니, 바로결제 버튼 클릭
        $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function() {
            var $is_direct_pay = $(this).data('direct-pay');
            var $is_redirect = $(this).data('is-redirect');

            var $result = cartNDirectPay($regi_form, $is_direct_pay, $is_redirect);

            if ($is_redirect === 'N' && $result === true) {
                openWin('pocketBox');
            }
        });

        // 교재로 진행중인 강의 버튼 클릭
        $regi_form.on('click', '.bookLecBtn > a', function() {
            var prod_code = $(this).data('prod-code');
            var cate_code = '{{ element('cate_code', $arr_input, '') }}';
            var ele_id = 'bookLec_' + prod_code;
            var lec_selector = $('#' + ele_id).find('.LeclistTable ul');

            if ($(this).hasClass('on')) {
                $(this).removeClass('on').text('교재로 진행중인 강의 ▼');
                closeWin(ele_id);
            } else {
                $(this).addClass('on').text('교재로 진행중인 강의 ▲');
                openWin(ele_id);

                // 단강좌 정보 조회 (기존 조회결과가 없을 경우만 조회)
                if (lec_selector.html() === '') {
                    var url = '{{ front_url('/book/lectureInfo/prod-code/') }}' + prod_code + '?cate_code=' + cate_code;
                    var html = '';

                    sendAjax(url, {}, function(ret) {
                        if (ret.ret_cd) {
                            if (ret.ret_data.length < 1) {
                                html += '<li>해당 교재로 진행중인 강의가 없습니다.</li>';
                            } else {
                                $.each(ret.ret_data, function (i, item) {
                                    html += '<li><a href="{{ site_url('/lecture/show') }}/cate/' + item.CateCode + '/pattern/only/prod-code/' + item.ProdCode + '" target="_blank">' + item.ProdName + '</a></li>';
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