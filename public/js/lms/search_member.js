/**
 * 회원 검색
 */
$(document).ready(function() {
    var $mem_search_form = $('.search-member-form');

    // 회원 등록구분 선택
    $mem_search_form.on('ifChanged', 'input[name="regi_type"]:checked', function() {
        var regi_type = $(this).val();

        // input 초기화
        $('.form-regi-input').removeClass('show').addClass('hide');

        // 해당 영역 노출
        $('#regi_type_' + regi_type).removeClass('hide').addClass('show');
    });

    // 회원검색 결과 개별 삭제
    $mem_search_form.on('click', '.selected-member-delete', function() {
        var that = $(this);
        that.parent().remove();
    });

    // 회원검색 버튼 클릭
    $('#btn_member_search').on('click', function() {
        var $search_mem_id = $mem_search_form.find('input[name="search_mem_id"]');
        var result_type = $(this).data('result-type') || 'multiple';

        if ($search_mem_id.val() === '') {
            alert('회원 검색어를 입력해 주십시오.');
            $search_mem_id.focus();
            return;
        }

        $('#btn_member_search').setLayer({
            'url': '/common/searchMember/index/' + result_type + '/parent_value/' + $search_mem_id.val(),
            'width': 900
        });
    });

    // 회원검색 업로드하기 버튼 클릭
    $('#btn_member_file_upload').on('click', function() {
        var files = $mem_search_form.find('input[name="search_mem_file"]')[0].files[0];
        if (typeof files === 'undefined') {
            alert('파일을 선택해 주세요.');
            return false;
        }

        var fdata = new FormData();
        fdata.append($__global.csrf_token_name, $__global.csrf_token);
        fdata.append('search_mem_file', files);

        sendAjax('/common/searchMember/inFile', fdata, function(ret) {
            if (ret.ret_cd) {
                var ret_cnt = ret.ret_data.length,
                    $selected_member_file = $('#selected_member_file'),
                    $selected_member_file2 = $mem_search_form.find('select[name="selected_member_file2"]');

                if (ret_cnt < 1) {
                    alert('검색된 회원이 없습니다.');
                    return;
                }

                // 검색결과 초기화
                $mem_search_form.find('input[name="mem_idx[]"]').remove();
                $selected_member_file2.children('option').remove();

                // 검색결과 loop
                ret.ret_data.forEach(function(item) {
                    $selected_member_file.append('<input type="hidden" name="mem_idx[]" value="' + item.MemIdx + '"/>');
                    $selected_member_file2.append('<option value="' + item.MemIdx + '">' + item.MemName + ' (' + item.MemId + ')</option>');
                });

                $('#selected_member_cnt').text(ret_cnt);
            }
        }, showError, false, 'POST', 'json', true);
    });
});
