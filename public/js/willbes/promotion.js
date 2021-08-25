function list_quiz(quiz_id) {
    var ele_id = 'quiz_layer_box';
    var data = {
        'quiz_id' : quiz_id
    };
    var _url = frontUrl('/quiz/index');

    if (quiz_id == '') {
        alert('퀴즈 아이디가 없습니다. 관리자에게 문의해주세요.');
        return false;
    }

    sendAjax(_url, data, function(ret) {
        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        $('#popup').bPopup();
    }, showAlertError, false, 'GET', 'html');
}

/**
 * @param is_login      //로그인여부
 * @param quiz_id       //퀴즈식별자
 * @param quiz_set_id   //퀴즈셋트식별자
 * @param unit_num      //퀴즈회차식별자
 * @param is_quiz_member    //퀴즈참여여부
 * @param show_type     //퀴즈등록조건
 * @param row_num       //미참여 회차 순번 (참여인경우 9999)
 * @param member_quiz_today_type    //금일기준 퀴즈참여 타입
 * @param page_num      //페이지번호
 * @returns {boolean}
 */
function show_quiz(is_login, quiz_id, quiz_set_id, unit_num, is_quiz_member, show_type, row_num, member_quiz_today_type, page_num) {
    var ele_id = 'quiz_layer_box';
    var data = {
        'quiz_id' : quiz_id,
        'quiz_set_id' : quiz_set_id,
        'unit_num' : unit_num,
        'page_num' : page_num
    };
    var _url = frontUrl('/quiz/show');

    if (is_login != true) {
        alert('로그인 후 이용해 주세요.');
        return false;
    }

    if (quiz_id == '' || quiz_set_id == '') {
        alert('퀴즈 아이디가 없습니다. 관리자에게 문의해주세요.');
        return false;
    }

    if (is_quiz_member == 'N') {
        if (member_quiz_today_type == 'N') {
            alert('금일까지 모두 퀴즈에 참여하였습니다.');
            return false;
        }
        if (show_type == 'Y') {
            if (row_num > 1) {
                alert('이전 퀴즈 먼저 참여해주세요.');
                return false;
            }
        } else {
            alert('이전 퀴즈 먼저 참여해주세요.');
            return false;
        }
    }

    sendAjax(_url, data, function(ret) {
        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        /*$('#popup').bPopup();*/
    }, showAlertError, false, 'GET', 'html');
}

function storAnswer() {
    var $quiz_regi_form = $('#quiz_regi_form');
    var _url = frontUrl('/quiz/store');
    ajaxSubmit($quiz_regi_form, _url, function(ret) {
        if(ret.ret_cd) {
            show_quiz('1'
                ,$quiz_regi_form.find("input[name='quiz_id']").val()
                ,$quiz_regi_form.find("input[name='quiz_set_id']").val()
                ,$quiz_regi_form.find("input[name='unit_num']").val()
                ,'N'
                ,'Y'
                ,'1'
                ,'Y'
                ,$quiz_regi_form.find("input[name='page_num']").val()
            )
        }
    }, showValidateError, addValidate, false, 'alert');
}

function finish_quiz(qm_idx) {
    var $quiz_regi_form = $('#quiz_regi_form');
    var _url = frontUrl('/quiz/storeFinish');
    var data = {
        '_csrf_token' : $quiz_regi_form.find('input[name="_csrf_token"]').val(),
        '_method' : 'PUT',
        'qm_idx' : qm_idx
    };

    sendAjax(_url, data, function(ret) {
        if (ret.ret_cd) {
            list_quiz($quiz_regi_form.find("input[name='quiz_id']").val());
        }
    }, function(ret, status){
        alert(ret.ret_msg);
    }, false, 'POST');
}

function addValidate() {
    var answer_num = $(":input:radio[name=answer_id]:checked").length;
    if (answer_num < 1) {
        alert('답을 선택해 주세요.');
        return false;
    }
    return true;
}