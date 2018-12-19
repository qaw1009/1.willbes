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
    /*var site_category_length = $("input[name='cate_code[]']").length;
    //카테고리 값이 존재할 경우 온라인으로 간주
    if (site_category_length < 1) {
        alert('카테고리 선택 필드는 필수입니다.');
        return false;
    }*/
    return true;
}