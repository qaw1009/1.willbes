// 수강생 교재 체크
function checkStudentBook($regi_form, $chk_obj) {
    var input_data = $chk_obj.data();
    var is_check = true, is_succ_ajax = false;
    var code = '610003';
    var msg = '선택하신 수강생 교재에 해당하는 강좌를 선택하지 않으셨습니다.\n해당 강좌를 선택해 주세요';

    if (input_data.hasOwnProperty('bookProvisionCcd') === true && input_data.bookProvisionCcd.toString() === code) {
        // 강좌상품이 선택되지 않은 경우
        if ($regi_form.find('input[name="prod_code[]"][data-prod-code="' + input_data.parentProdCode + '"]:checked').length < 1) {
            is_check = false;

            // 강좌상품 주문여부 확인
            var url = location.protocol + '//' + location.host + '/cart/checkStudentBook';
            var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), { 'prod_code' : input_data.prodCode, 'parent_prod_code' : input_data.parentProdCode});
            sendAjax(url, data, function(ret) {
                is_succ_ajax = true;
                if (ret.ret_cd) {
                    is_check = ret.ret_data.is_ordered;
                }
            }, showAlertError, false, 'POST');

            if (is_check === false) {
                if (is_succ_ajax === true) {
                    alert(msg);
                }
                $chk_obj.prop('checked', false).trigger('change');
            }
        }
    }

    return is_check;
}

// 바로결제 버튼 클릭시 체크사항 확인
function checkDirectPay($regi_form) {
    if ($regi_form.find('.chk_products:checked').length > 0 && $regi_form.find('.chk_books:checked').length > 0) {
        alert('바로결제 시 강좌와 교재는 동시 결제가 불가능합니다.');
        return false;
    }
    return true;
}
