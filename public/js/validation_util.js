/**
 * form submit
 * @param frmObj    jquery object
 */
function formSubmit(frmObj)
{
    var validator = new FormValidator();
    //validator.settings.classes.item = 'item';

    frmObj.submit(function(e) {
        e.preventDefault();
        // reset validate error message
        $('.form-group').removeClass('has-error');
        $('#form-errors').remove();

        var submit = true;

        // evaluate the form using generic validaing
        var validatorResult = validator.checkAll(this);
        //var validatorResult = validator.checkFirst(this);
        //console.log(validatorResult);

        if (!validatorResult.valid) {
            submit = false;
        }

        if (submit) {
            this.submit();
        }

        return false;
    });
}

/**
 * ajax form submit
 * @param frmObj
 * @param url
 * @param callback
 * @param error_callback
 * @param validate_callback
 * @param async
 * @param error_view :: layer, alert
 * @param beforeSend_action : before actoin for ajax submit
 */
function ajaxSubmit(frmObj, url, callback, error_callback, validate_callback, async, error_view, beforeSend_action)
{
    if(typeof error_view == 'undefined') error_view = 'alert';

    frmObj.ajaxSubmit({
        url : url,
        type: 'POST',
        dataType : 'json',
        //iframe : frmObj.find('input[type=file]').length > 0 || false,
        async : (async !== undefined) ? async : false,
        beforeSubmit: function (formData, form, options) {
            // validation
            var validator = new FormValidator();
            //validator.settings.classes.item = 'item';
            var validatorResult = { valid : false };

            if (error_view == 'alert') {
                validatorResult = validator.checkAll(frmObj.get(0), error_view);
            } else if (error_view == 'layer') {
                validatorResult = validator.checkAll(frmObj.get(0));
            }

            if (!validatorResult.valid) {
                return false;
            }

            // add validation
            if (typeof validate_callback === "function") {
                if (!validate_callback()) {
                    return false;
                }
            }
        },
        beforeSend: function() {
            if (typeof beforeSend_action === "function") {
                if (!beforeSend_action()) {
                    return false;
                }
            }
        },
        success: function(response, status){
            if (typeof callback === "function") {
                callback(response);
            }
        },
        error: function(xhr, status, error){
            if (typeof error_callback === "function") {
                var ret = xhr.responseText;
                if (isJson(ret) === true) {
                    // json parser
                    ret = JSON.parse(ret);
                }
                error_callback(ret, xhr.status, error_view);
            } else {
                alert('에러가 발생하였습니다.');
            }
        }
    });

    return false;
}

/**
 * validation 에러 메시지 표시
 * @param result validation result
 * @param status http code
 */
function showValidateError(result, status, error_view)
{
    if(typeof error_view == 'undefined') error_view = 'alert';

    if (status === 401) {  //권한 없음 || 미로그인
        notifyAlert('error', '알림', '권한이 없습니다.');
    } else if (status === 403) {
        notifyAlert('error', '알림', (result.ret_msg) ? result.ret_msg : '토큰 정보가 올바르지 않습니다.');
    } else if (status === 422) { // validation error (Unprocessable Entity)
        var _result_filter = {}; // 배열의 경우 메시지는 1회만 표시하기 위함 (validation에서 wildcard(*) 사용 시)
        $.each(result, function(key, value) {
            if (key.indexOf('.') < 0) { // 일반 input
                _result_filter[key] = value;
            } else { // array input
                var _key_filtered = key.substring(0, key.indexOf('.'));
                _result_filter[_key_filtered] = value;
            }
        });

        // reset validate error field
        $('.form-group').removeClass('has-error');

        if (error_view == 'alert') {
            // 첫번째 오류 메시지
            alert(_result_filter[Object.keys(_result_filter)[0]]);
            setValidateHasError(Object.keys(_result_filter)[0]);
        } else {
            // reset validate error message
            if ($('#form-errors').length > 0) {
                $('#form-errors').html('');
            } else {
                $('<div id="form-errors" class="alert alert-danger"><div>').insertBefore('form:eq(0)'); // form-errors가 없는 예외 처리
            }

            var errorsHtml = '<ul>';
            $.each( _result_filter, function(key, value) {
                //errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error. (laravel)
                errorsHtml += '<li>' + value + '</li>';
            });
            errorsHtml += '</ul>';
            $('#form-errors').html(errorsHtml); //appending to a <div id="form-error"></div> inside form

            // input 에 error 표시 (테두리)
            $.each(result, function(key, value) {
                setValidateHasError(key);
            });
        }

        $('html,body').scrollTop(0);
    } else {
        notifyAlert('error', '알림', result.ret_msg);
    }
}

/**
 * validation error 표시
 * @param key
 */
function setValidateHasError(key)
{
    var _input_name = key;
    var _input_index = 0;
    if (key.indexOf('.') > 0) { // array input
        _input_name = key.substring(0, key.indexOf('.'))+'[]';
        _input_index = parseInt(key.substring(key.indexOf('.')+1));
    }

    var _input = $('[name="'+_input_name+'"]:eq('+_input_index+')');
    if (_input.is('input[type="text"], input[type="file"], input[type="number"], select, textarea')) {
        _input.closest('.item').addClass('has-error');
    } else if (_input.is('input:radio, input:checkbox')){
        _input.closest('.item').addClass('has-error');
    }
}
