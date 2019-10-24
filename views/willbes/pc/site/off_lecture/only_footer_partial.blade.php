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
    var $is_show = location.href.indexOf('show') > -1;

    $(document).ready(function() {

        {{--목록 페이지--}}
        if ($is_show === false) {

            {{--방문결제 버튼 클릭--}}
            $regi_off_form.on('click', '.btn-off-visit-pay', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                var prod_code = $(this).data('prod-code');
                if (prod_code === '') {
                    alert('선택된 상품이 없습니다.');
                    return;
                }
                {{--상품 체크--}}
                if (checkProduct($regi_visit_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_visit_form) === false) {
                    return;
                }
                if (confirm('방문접수를 신청하시겠습니까?')) {
                    $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);
                    var url = '{{ front_url('/order/visit/direct', true) }}';
                    ajaxSubmit($regi_visit_form, url, function (ret) {
                        if (ret.ret_cd) {
                            alert(ret.ret_msg);
                            location.replace(ret.ret_data.ret_url);
                        }
                    }, showValidateError, null, false, 'alert');
                }
            });

            {{--장바구니, 바로결제 버튼 클릭--}}
            $('a[name="btn_off_cart"], a[name="btn_off_direct_pay"]').on('click', function () {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}
                $regi_off_form.find('input[name="cart_type"]').val(''); {{--초기화 필요 (뒤로가기시 캐쉬로 인한 문제 발생)--}}
                var $prod_code = $(this).data('prod-code');
                $('input:checkbox[name="prod_code[]"]').prop('checked', false);
                $('input:checkbox[name="prod_code[]"]:input[data-prod-code="'+$prod_code+'"]').prop('checked', true);
                var $is_direct_pay = $(this).data('direct-pay');
                var $is_redirect = $(this).data('is-redirect');
                {{--cartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect);--}}
                addCartNDirectPay($regi_off_form, $is_direct_pay, $is_redirect,'{{front_url('')}}');
            });

        {{--뷰 페이지--}}
        } else {
            {{--상품 선택/해제--}}
            $regi_off_form.on('change', '.chk_products, .chk_books', function() {
                setCheckLectureProduct($regi_off_form, $(this), 'price', 'prod_sale_price', 'book_sale_price', 'tot_sale_price');
            });

            {{--방문결제, 장바구니, 바로결제 버튼 클릭--}}
            $regi_off_form.on('click', 'button[name="btn_off_visit_pay"], button[name="btn_cart"], button[name="btn_direct_pay"]', function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

                {{--방문결제 버튼 클릭--}}
                if($(this).attr('name') === 'btn_off_visit_pay') {

                    var prod_code = $("input:checkbox[class='chk_products']:checked").val();
                    if(prod_code === undefined) {
                        alert('상품을 선택해 주세요.');
                        return;
                    }
                    {{--상품 체크--}}
                    if (checkProduct($regi_visit_form.find('input[name="learn_pattern"]').val(), prod_code, 'Y', $regi_visit_form) === false) {
                        return;
                    }
                    if (confirm('방문접수를 신청하시겠습니까?')) {
                        $regi_visit_form.find('input[name="prod_code[]"]').val(prod_code);

                        var url = '{{ front_url('/order/visit/direct', true) }}';
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
                        if(book_check_cnt > 0) {
                            $("input:checkbox[class='chk_products']").prop('checked', false);
                            addCartNDirectPay($regi_off_form, 'N', 'N','{{front_url('')}}');
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
    });
    /**
     * 상세 페이지 이동
     */
    function goShow(prod_code, cate_code) {
        location.href = '{{ front_url('/offLecture/show') }}/cate/' + cate_code + '/prod-code/' + prod_code;
    }
</script>