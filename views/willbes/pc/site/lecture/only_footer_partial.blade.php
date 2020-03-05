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

{{--직장인/재학생 반 안내 팝업--}}
<div id="OTclassInfo" class="willbes-Layer-requestInfo2">
    <a class="closeBtn" href="#none" onclick="closeWin('OTclassInfo')">
        <img src="{{ img_url('prof/close.png') }}">
    </a>
    <div class="Layer-Tit NG tx-dark-black">직장인/재학생반  <span class="tx-blue">수강 안내</span></div>
    <div class="Layer-Cont">
        <div class="Layer-SubTit tx-gray">
            <ul>
                <li>
                    <strong>예) 40일 강좌 수강시</strong><br>
                    - 수강 시간 : 평일 19~03시만 수강 / 주말, 공휴일 24시간 수강 가능<br>
                    - 수강 기간 : 원래 수강 기간 X 1.4배수(40일 X 1.4 = 56일)<br>
                    - 수강 중지 : 3회. 3회의 합은 56일까지<br>
                    - 수강 연장 : 3회. 1일 연장 수강료는 원래 수강 기간 40일 기준(강의 종료일까지만 연장 가능)<br>
                    - 수강 환불 : 환불일수는 원래 수강 기간 40일 기준(수강 중지시 환불 불가)<br>
                    <br>
                    <span class="tx-red">※ 주말반은 일반강의로 변경이 안됩니다.</span>
                </li>
            </ul>
        </div>
    </div>
</div>

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

            // 장바구니 이동 버튼 클릭
            $buy_layer.on('click', '.answerBox_block', function() {
                goCartPage(getCartType($regi_form),'on');
            });

            // 계속구매 버튼 클릭
            $buy_layer.on('click', '.waitBox_block', function() {
                $buy_layer.find('.pocketBox').css('display','none').hide();
                $buy_layer.removeClass('active');
            });

            // 장바구니, 바로결제 버튼 클릭
            $('button[name="btn_cart"], button[name="btn_direct_pay"]').on('click', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');

                {{--var $result = cartNDirectPay($regi_form, $is_direct_pay, $is_redirect);--}}
                var $result = addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, 'on');

                if ($is_redirect === 'N' && $result === true) {
                    openWin('pocketBox');
                }
            });
        } else {
            // 뷰 페이지
            // 상품 선택/해제
            $regi_form.on('change', '.chk_products, .chk_books', function() {
                setCheckLectureProduct($regi_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            // 장바구니, 바로결제 버튼 클릭
            $regi_form.on('click', 'button[name="btn_cart"], button[name="btn_direct_pay"]', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var $is_direct_pay = $(this).data('direct-pay');

                cartNDirectPay($regi_form, $is_direct_pay, 'Y');
            });
        }

        $('.lec_type_info').on('click', function(){
            var $target_layer = $('#OTclassInfo');
            var top_bn_height = $('#topBannerLayer').height();
            var top = $(this).offset().top - 190;
            if (top_bn_height !== null && typeof top_bn_height !== 'undefined') {
                top = top - top_bn_height;
            }
            var right = 180;
            $target_layer.css({
                'display': 'block',
                'top': top,
                'right': right,
                'left': 170,
                'position': 'absolute'
            }).addClass();
        });

    });

    /**
     * 상세 페이지 이동
     */
    function goShow(prod_code, cate_code, pattern) {
        location.href = '{{ site_url('/lecture/show') }}/cate/' + cate_code + '/pattern/' + pattern + '/prod-code/' + prod_code;
    }
</script>