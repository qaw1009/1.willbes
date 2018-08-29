/**
 * 장바구니 저장 및 바로결제
 * @param $regi_form
  * @param $is_direct_pay
 * @param $is_redirect
 */
function cartNDirectPay($regi_form, $is_direct_pay, $is_redirect) {
    // 초기값 설정
    $is_direct_pay = $is_direct_pay || 'N';
    $is_redirect = $is_redirect || 'Y';
    
    if ($regi_form.find('input[name="sale_status_ccd"]').length > 0 && $regi_form.find('input[name="sale_status_ccd"]').val() !== '618001') {
        alert('판매 중인 상품만 주문 가능합니다.');
        return;
    }

    if($regi_form.find('input[name="prod_code[]"]:checked').length < 1) {
        alert('강좌를 선택해 주세요.');
        return;
    }

    if ($is_direct_pay === 'Y') {
        if (checkDirectPay($regi_form) === false) {
            return;
        }
    }

    // set hidden value
    if ($regi_form.find('input[name="cart_type"]').val().length < 1) {
        $regi_form.find('input[name="cart_type"]').val(getCartType($regi_form));
    }
    $regi_form.find('input[name="is_direct_pay"]').val($is_direct_pay);

    var url = location.protocol + '//' + location.host + '/cart/store';
    ajaxSubmit($regi_form, url, function(ret) {
        if(ret.ret_cd) {
            if ($is_redirect === 'Y') {
                location.href = ret.ret_data.ret_url;
            }
        }
    }, showValidateError, null, false, 'alert');
}

/**
 * 장바구니 타입 리턴
 * @param $regi_form
 * @returns {string}
 */
function getCartType($regi_form) {
    var cart_type = 'on_lecture';
    
    if ($regi_form.find('.chk_products:checked').length < 1 && $regi_form.find('.chk_books:checked').length > 0) {
        cart_type = 'book';
    } else if($regi_form.find('input[name="learn_pattern"]').val().indexOf('off') !== -1) {
        cart_type = 'off_lecture';
    }
    
    return cart_type;
}

/**
 * 장바구니, 바로결제 레이어 노출
 * @param $type
 * @param $chk_obj
 * @param $target_id
 */
function showBuyLayer($type, $chk_obj, $target_id) {
    var $target_layer = $('#' + $target_id);

    if($chk_obj.is(':checked')) {
        //var top = $chk_obj.offset().top;
        //var left = $chk_obj.offset().left - 52;
        var top = $chk_obj.offset().top - 180;
        var right = 242;
        if ($type === 'on') {
            if ($chk_obj.hasClass('chk_books') === true) {
                right += 50;
            }
        } else {
            right = 163;
        }

        $target_layer.css({
            'top': top,
            'right': right,
            'position': 'absolute'
        }).addClass('active');
    } else {
        $target_layer.find('.pocketBox').css('display','none').hide();
        $target_layer.removeClass('active');
    }
}

/**
 * 단강좌, 무료강좌 상품 선택/해제
 * @param $regi_form
 * @param $chk_obj
 * @param $chk_type
 * @param $target_prod_id
 * @param $target_book_id
 * @param $target_total_id
 */
function setCheckLectureProduct($regi_form, $chk_obj, $chk_type, $target_prod_id, $target_book_id, $target_total_id) {
    if ($chk_obj.is(':checked') === true) {
        if ($chk_obj.hasClass('chk_books') === true) {
            // 수강생 교재 체크
            if (checkStudentBook($regi_form, $chk_obj) === false) {
                return;
            }
        }
    } else {
        if ($chk_obj.hasClass('chk_products') === true) {
            // 강좌상품일 경우 연계도서상품 체크 해제
            $regi_form.find('input[name="prod_code[]"][data-parent-prod-code="' + $chk_obj.data('prod-code') + '"]').prop('checked', false);
        }
    }

    if ($chk_type === 'price') {
        var prod_sale_price = 0, book_sale_price = 0;

        // 강좌 금액 계산
        $regi_form.find('.chk_products').each(function() {
            if ($(this).is(':checked')) {
                prod_sale_price += $(this).data('sale-price');
            }
        });

        // 도서 금액 계산
        $regi_form.find('.chk_books').each(function() {
            if ($(this).is(':checked')) {
                book_sale_price += $(this).data('sale-price');
            }
        });

        $regi_form.find('#' + $target_prod_id).text(addComma(prod_sale_price));
        $regi_form.find('#' + $target_book_id).text(addComma(book_sale_price));
        $regi_form.find('#' + $target_total_id).text(addComma(prod_sale_price + book_sale_price));
    }
}

/**
 * 수강생 교재 체크
 * @param $regi_form
 * @param $chk_obj
 * @returns {boolean}
 */
function checkStudentBook($regi_form, $chk_obj) {
    var input_data = $chk_obj.data();
    var is_check = false;
    var code = '610003';

    if (input_data.hasOwnProperty('bookProvisionCcd') === true && input_data.bookProvisionCcd.toString() === code) {
        // 선택된 강좌상품코드
        var $input_prod_code = {};
        $regi_form.find('.chk_products:checked').each(function(idx) {
            $input_prod_code[idx] = $(this).data('prod-code');
        });

        // 운영자 선택형 패키지
        if($regi_form.find('input[name="prod_code_sub[]"]:checked').length > 0) {
            var input_cnt = Object.keys($input_prod_code).length;

            $regi_form.find('input[name="prod_code_sub[]"]:checked').each(function(idx) {
                $input_prod_code[input_cnt + idx] = $(this).val();
            });
        }

        var url = location.protocol + '//' + location.host + '/cart/checkStudentBook';
        var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
            'prod_code' : input_data.prodCode,
            'parent_prod_code' : input_data.parentProdCode,
            'group_prod_code' : input_data.groupProdCode,
            'input_prod_code' : JSON.stringify($input_prod_code)
        });
        sendAjax(url, data, function(ret) {
            if (ret.ret_cd) {
                if (ret.ret_data.is_check !== true) {
                    alert(ret.ret_data.is_check);
                } else {
                    is_check = true;
                }
            }
        }, showAlertError, false, 'POST');

        if (is_check === false) {
            $chk_obj.prop('checked', false).trigger('change');
        }
    } else {
        is_check = true;
    }

    return is_check;
}

/**
 * 바로결제 버튼 클릭시 체크사항 확인
 * @param $regi_form
 * @returns {boolean}
 */
function checkDirectPay($regi_form) {
    if ($regi_form.find('.chk_products:checked').length > 0 && $regi_form.find('.chk_books:checked').length > 0) {
        alert('바로결제 시 강좌와 교재는 동시 결제가 불가능합니다.');
        return false;
    }
    return true;
}

/**
 * 장바구니 페이지 이동
  * @param $tab_id
 */
function goCartPage($tab_id) {
    location.href = location.protocol + '//' + location.host + '/cart/index?tab=' + $tab_id;
}

/**
 * 강좌, 교재 상세정보 모달 팝업
 * @param prod_code
 * @param tab_id
 * @param url
 * @param add_url
 * @param ele_id
 */
function productInfoModal(prod_code, tab_id, url, add_url, ele_id) {
    add_url = add_url || '';
    url = url + '/info/' + add_url + 'prod-code/' + prod_code;
    ele_id = ele_id || 'InfoForm';
    var data = { 'ele_id' : ele_id };

    sendAjax(url, data, function(ret) {
        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
    }, showAlertError, false, 'GET', 'html');

    if(tab_id !== '') {
        openLink(tab_id);
    }
}