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
                alert('내 강의실로 이동합니다.');
            });

            // 아니오 버튼 클릭
            $buy_layer.on('click', '.waitBox_block', function() {
                $buy_layer.find('.pocketBox').css('display', 'none').hide();
                $buy_layer.removeClass('active');
            });

            // 교재구매 버튼 클릭
            $buy_layer.on('click', '#btn_book_pay', function() {
                var $cate_code = '{{ $__cfg['CateCode'] }}';
                $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                cartNDirectPay($regi_form, $cate_code, 'Y', 'Y');
            });

            // 바로결제 버튼 클릭
            $('button[name="btn_direct_pay"]').on('click', function() {
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                var $cate_code = '{{ $__cfg['CateCode'] }}';
                var $layer_type = $regi_form.find('.chk_books:checked').length < 1 ? 'pocketBox1' : 'pocketBox2';

                // TODO : 무료강좌 지급 로직 추가 및 확인 필요

                if ($is_redirect === 'N') {
                    openWin($layer_type);
                } else {
                    // 교재상품 바로결제
                    if ($regi_form.find('.chk_books:checked').length > 0) {
                        $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                        cartNDirectPay($regi_form, $cate_code, $is_direct_pay, $is_redirect);
                    } else {
                        alert('내 강의실로 이동합니다.');
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
                var $cate_code = '{{ $__cfg['CateCode'] }}';

                // TODO : 무료강좌 지급 로직 추가 및 확인 필요

                // 교재상품 바로결제
                if ($regi_form.find('.chk_books:checked').length > 0) {
                    $regi_form.find('.chk_products').prop('checked', false);    // 무료강좌상품 체크해제
                    cartNDirectPay($regi_form, $cate_code, 'Y', 'Y');
                } else {
                    alert('내 강의실로 이동합니다.');
                }
            });
        }
    });
</script>