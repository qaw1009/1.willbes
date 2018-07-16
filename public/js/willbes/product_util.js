// 수강생 교재 체크
function checkStudentBook($regi_form, $chk_obj) {
    var input_data = {};
    var is_check = true;
    var code = '610003';
    var msg = '선택하신 수강생 교재에 해당하는 강좌를 선택하지 않으셨습니다.\n해당 강좌를 선택해 주세요';

    if (typeof $chk_obj !== 'undefined') {
        input_data = $chk_obj.data();

        if (input_data.hasOwnProperty('bookProvisionCcd') === true && input_data.bookProvisionCcd.toString() === code) {
            if ($regi_form.find('input[data-prod-code="' + input_data.parentProdCode + '"]:checked').length < 1) {
                alert(msg);
                $chk_obj.prop('checked', false).trigger('change');
                is_check = false;
            }
        }
    } else {
        $regi_form.find('.chk_books:checked').each(function() {
            input_data = $(this).data();

            if (input_data.bookProvisionCcd.toString() === code) {
                if ($regi_form.find('input[data-prod-code="' + input_data.parentProdCode + '"]:checked').length < 1) {
                    alert(msg);
                    $(this).prop('checked', false).trigger('change');
                    is_check = false;
                    return false;
                }
            }
        });
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
