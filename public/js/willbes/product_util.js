/**
 * 장바구니 저장 및 바로결제
 * @param $regi_form
 * @param $is_direct_pay
 * @param $is_redirect
 */
function cartNDirectPay($regi_form, $is_direct_pay, $is_redirect) {
    return addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, '');
}

/**
 * 장바구니 저장 및 바로결제 ($app_url 인자 추가)
 * @param $regi_form
 * @param $is_direct_pay
 * @param $is_redirect
 * @param $app_url
 */
function addCartNDirectPay($regi_form, $is_direct_pay, $is_redirect, $app_url)
{
    // 초기값 설정
    $is_direct_pay = $is_direct_pay || 'N';
    $is_redirect = $is_redirect || 'Y';
    var $result = false;

    if ($regi_form.find('input[name="sale_status_ccd"]').length > 0 && $regi_form.find('input[name="sale_status_ccd"]').val() !== '618001') {
        alert('판매 중인 상품만 주문 가능합니다.');
        return;
    }

    if($regi_form.find('input[name="prod_code[]"]:checked').length < 1) {
        alert('상품을 선택해 주세요.');
        return;
    }

    if ($is_direct_pay === 'Y') {
        alertDirectPay($regi_form);
        /* 바로결제할 경우 강좌상품은 바로결제, 교재상품은 장바구니 저장 프로세스로 변경
        if (checkDirectPay($regi_form) === false) {
            return;
        }*/
    }

    if ($regi_form.find('input[name="learn_pattern"]').val().indexOf('off') === 0) {
        // 학원강좌일 경우 방문접수와 바로결제 동시 진행 불가
        if (checkOffLecture($regi_form, $is_direct_pay) === false) {
            return;
        }
    }

    // set hidden value
    if ($regi_form.find('input[name="cart_type"]').val().length < 1) {
        $regi_form.find('input[name="cart_type"]').val(getCartType($regi_form));
    }
    $regi_form.find('input[name="is_direct_pay"]').val($is_direct_pay);

    // url 설정
    var url = '';
    if ($app_url !== '') {
        url = $app_url + '/cart/store';
    } else {
        url = frontUrl('/cart/store');
        if ($regi_form.find('input[name="cart_type"]').val().indexOf('off') === 0) {
            url = frontPassUrl('/cart/store');
        } else if ($regi_form.find('input[name="cart_type"]').val().indexOf('on') === 0 || $regi_form.find('input[name="cart_type"]').val() === 'book') {
            url = siteUrl('/cart/store');
        }
    }

    ajaxSubmit($regi_form, url, function(ret) {
        if(ret.ret_cd) {
            $result = true;
            if ($is_redirect === 'Y') {
                location.href = ret.ret_data.ret_url;
            }
        }
    }, showValidateError, null, false, 'alert');

    return $result;
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
 * 바로결제 버튼 클릭시 경고 메시지 리턴
 * @param $regi_form
 */
function alertDirectPay($regi_form) {
    if ($regi_form.find('.chk_products:checked').length > 0 && $regi_form.find('.chk_books:checked').length > 0) {
        alert('도서구입비 소득공제 시행에 따라 강좌와 교재는 동시 결제가 불가능 합니다.\n선택한 교재는 장바구니에 자동으로 담기며, 강좌 선 결제 후 장바구니에 담긴 교재를 결제하실 수 있습니다.');
    }
}

/**
 * 학원강좌일 경우 방문 접수, 온라인 접수 전용상품 관련 확인
 * @param $regi_form
 * @param $is_direct_pay
 * @returns {boolean}
 */
function checkOffLecture($regi_form, $is_direct_pay) {
    if ($is_direct_pay === 'Y' && $regi_form.find('.chk_products[data-study-apply-ccd="654001"]:checked').length > 0) {
        alert('방문 접수 전용상품은 바로 결제 하실 수 없습니다.');
        return false;
    } else if ($is_direct_pay === 'N' && $regi_form.find('.chk_products[data-study-apply-ccd="654002"]:checked').length > 0) {
        alert('온라인 접수 전용상품은 방문 접수 하실 수 없습니다.');
        return false;
    }

    return true;
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
    } else if($regi_form.find('input[name="learn_pattern"]').val().indexOf('off') === 0) {
        cart_type = 'off_lecture';
    }
    
    return cart_type;
}

/**
 * 장바구니 페이지 이동
 * @param $tab_id
 */
function goCartPage($tab_id) {
    location.href = frontUrl('/cart/index?tab=' + $tab_id);
}

/**
 * 장바구니, 바로결제 레이어 노출
 * @param $type
 * @param $chk_obj
 * @param $target_id
 */
function showBuyLayer($type, $chk_obj, $target_id) {
    var $target_layer = $('#' + $target_id);
    var top_bn_height = $('#topBannerLayer').height();

    if($chk_obj.is(':checked')) {
        //var top = $chk_obj.offset().top;
        //var left = $chk_obj.offset().left - 52;
        var top = $chk_obj.offset().top - 180;
        if (top_bn_height !== null && typeof top_bn_height !== 'undefined') {
            // top banner height 적용
            top = top - top_bn_height;
        }

        var right = 242;
        if ($type === 'on') {
            if ($chk_obj.hasClass('chk_books') === true) {
                right += 50;
            }
        } else if ($type === 'book') {
            right = 242;
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
    return true;
}

/**
 * 수강생 교재 체크 (결제에서만 체크)
 * @param $regi_form
 * @param $chk_obj
 * @returns {boolean}
 */
function checkStudentBookNoUsed($regi_form, $chk_obj) {
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

        var url = frontUrl('/cart/checkStudentBook');
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