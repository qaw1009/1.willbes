//입력값에 따른 조회수 값 리턴
function SumReadCount() {
    var total_count;
    var real_read_count = Number($('#read_count').val());
    var read_count = Number($('#setting_readCnt').val());

    if (real_read_count == '0'){ real_read_count = 0; }
    total_count = real_read_count + read_count;
    return total_count;
}

// form submit 공통 validate 체크
function addValidate() {
    var site_category_length = $("input[name='cate_code[]']").length;

    //카테고리 값이 존재할 경우 온라인으로 간주
    if (site_category_length < 1) {
        alert('카테고리 선택 필드는 필수입니다.');
        return false;
    }

    return true;
}

/**
 * FAQ 구분별 분류값 조회
 * @param _url
 * @param faq_ccd
 */
function getFaqGroup(_url, faq_ccd) {
    var _data = {};
    var add_selectBox_options = '';

    sendAjax(_url, _data, function(ret) {
        if (ret.ret_cd) {
            if (Object.keys(ret.ret_data).length > 0) {
                $.each(ret.ret_data, function(key, val) {
                    var chk = '';
                    if(key == faq_ccd){
                        chk = 'selected="selected"';
                    } else {
                        chk = '';
                    }
                    add_selectBox_options += '<option value="'+key+'" '+chk+'>'+val+'</option>';
                });
                $('#faq_ccd').html(add_selectBox_options);
                $('#faq_ccd').prop('disabled',false);
            }
        }
    }, showError, false, 'GET');
}

/**
 * 과목 조회
 * @param _url
 * @param subject_idx
 */
function getSubject(_url, subject_idx) {
    var _data = {};
    var add_selectBox_options = '';

    sendAjax(_url, _data, function(ret) {
        if (ret.ret_cd) {
            if (Object.keys(ret.ret_data).length > 0) {
                $.each(ret.ret_data, function(key, val) {
                    var chk = '';
                    if(key == subject_idx){
                        chk = 'selected="selected"';
                    } else {
                        chk = '';
                    }
                    add_selectBox_options += '<option value="'+key+'" '+chk+'>'+val+'</option>';
                });
                $('#subject_idx').html(add_selectBox_options);
                $('#subject_idx').prop('disabled',false);
            } else {
                add_selectBox_options = '<option value="">과목</option>';
                $('#subject_idx').html(add_selectBox_options);
                $('#subject_idx').prop('disabled',true);
            }
        }
    }, showError, false, 'GET');
}