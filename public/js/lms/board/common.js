//사이트카테고리(구분) 선택/해제, 분류박스 활성/비활성화
$(document).on("ifChanged","#site_category_all",function(){
    iCheckAll('input[name="site_category[]"]', '#site_category_all');
    if ($(this).prop('checked') === true) {
        $('#sub_category').prop('disabled', true);
    } else {
        $('#sub_category').prop('disabled', false);
    }
});

//사이트카테고리(구분) 개별선택에 따른 [전체]체크박스 초기화
$(document).on("ifChanged",".site_category",function(){
    $('#site_category_all').prop('checked', false).iCheck('update');
});


function jsonLength(value1) {
    var length = 0;
    for(var i in value1) length ++;
    return length;
}

//운영사이트값에 따른 캠퍼스, 구분 셋팅
function getSiteCategory(_siteCategory_url, _campus_url, campus_ccd) {
    var _data = {};
    var add_checkBox = '';
    sendAjax(_siteCategory_url, _data, function(ret) {
        if (ret.ret_cd) {
            if (typeof ret.ret_data.category == "undefined") {
                $('#site_category').html(add_checkBox);
            } else {
                $('#site_category_all').prop('checked', false).iCheck('update');
                if (Object.keys(ret.ret_data.category).length > 0) {
                    $.each(ret.ret_data.category, function (key, val) {
                        add_checkBox += '<input type="checkbox" id="site_category_' + key + '" name="site_category[]" value="' + key + '" class="site_category flat"/> <label class="inline-block mr-5" for="site_category_' + key + '">' + val + '</label>';
                    });
                    $('#site_category').html(add_checkBox);
                } else {
                    $('#site_category').html(add_checkBox);
                }
            }
        }

        if (_campus_url != '') {
            getAjaxcampusInfo(_campus_url, campus_ccd);
        }
    }, showError, false, 'GET');
}

//캠퍼스 목록 죄회
function getAjaxcampusInfo(_url, campus_ccd) {
    var board_campus_code_all = '605999';
    var add_selectBox_options = '<option value="'+board_campus_code_all+'">전체</option>';
    var _data = {};

    sendAjax(_url, _data, function(ret) {
        if (ret.ret_cd) {
            if (typeof ret.ret_data.campus == "undefined") {
                $('#campus_ccd').html('<option value="">사용안함</option>');
                $('#campus_ccd').prop('disabled', true);
            } else {
                if (Object.keys(ret.ret_data.campus).length > 0) {
                    $.each(ret.ret_data.campus, function (key, val) {
                        var chk = '';
                        if (key == campus_ccd) {
                            chk = 'selected="selected"';
                        } else {
                            chk = '';
                        }
                        add_selectBox_options += '<option value="' + key + '" ' + chk + '>' + val + '</option>';
                    });
                    $('#campus_ccd').html(add_selectBox_options);
                    $('#campus_ccd').prop('disabled', false);
                } else {
                    if (ret.ret_data.isCampus == 'N') {
                        $('#campus_ccd').html('<option value="">사용안함</option>');
                        $('#campus_ccd').prop('disabled', true);
                    } else {
                        $('#campus_ccd').html('<option value="">없음</option>');
                        $('#campus_ccd').prop('disabled', true);
                    }
                }
            }
        }
    }, showError, false, 'GET');
}

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
    var site_category_length = $("input[name='site_category[]']").length;
    var site_category_checked_length = $("input[name='site_category[]']:checked").length;

    //카테고리 값이 존재할 경우 온라인으로 간주
    if (site_category_length > 0) {
        if (site_category_checked_length > 0) {
            return true;
        } else {
            alert('구분(카테고리) 값은 필수 입니다.');
            return false;
        }
    } else {
        return true;
    }
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