// 수강생 교재 체크
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

        var url = location.protocol + '//' + location.host + '/cart/checkStudentBook';
        var data = $.extend(arrToJson($regi_form.find('input[type="hidden"]').serializeArray()), {
            'prod_code' : input_data.prodCode,
            'parent_prod_code' : input_data.parentProdCode,
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

// 바로결제 버튼 클릭시 체크사항 확인
function checkDirectPay($regi_form) {
    if ($regi_form.find('.chk_products:checked').length > 0 && $regi_form.find('.chk_books:checked').length > 0) {
        alert('바로결제 시 강좌와 교재는 동시 결제가 불가능합니다.');
        return false;
    }
    return true;
}

/**
 * 강좌, 교재 상세정보 모달 팝업
 * @param prod_code
 * @param tab_id
 * @param url
 */
function productInfoModal(prod_code, tab_id, url) {
    var data = '';
    sendAjax(url+'/info/prod-code/' + prod_code, data, function(ret) {
        $('#InfoForm').html(ret).show().css('display', 'block').trigger('create');
    }, showAlertError, false, 'GET', 'html');
    if(tab_id != '') {
        openLink(tab_id);
    }
}