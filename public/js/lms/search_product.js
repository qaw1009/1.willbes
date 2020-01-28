/**
 * 상품 검색
 */
function prodListChange(prod_type, learn_pattern_ccd) {
    var $search_form = $('#_search_form');
    var param = '?site_code='+$search_form.find('#site_code').val()+'&prod_type='+prod_type+'&LearnPatternCcd='+learn_pattern_ccd
        +'&return_type='+$search_form.find('#return_type').val()+'&target_id='+$search_form.find('#target_id').val()+'&target_field='+$search_form.find('#target_field').val()
        +'&prod_tabs='+$search_form.find('#prod_tabs').val()+'&hide_tabs='+$search_form.find('#hide_tabs').val()+'&is_event='+$search_form.find('#is_event').val()
        +'&is_single='+$search_form.find('#is_single').val();
    var url = '';

    if (prod_type === 'book') {
        url = '/common/searchBook/';
    } else if (prod_type === 'reading_room') {
        url = '/common/searchReadingRoom/';
    } else if (prod_type === 'locker') {
        url = '/common/searchLockerRoom/';
    } else if (prod_type === 'mock_exam') {
        url = '/common/searchMockTest/';
    } else {
        url = '/common/searchLectureAll/';
    }

    sendAjax(url + param,
        '',
        function(d){
            $("#pop_modal").find(".modal-content").html(d).end()
        },
        function(req, status, err){
            showError(req, status);
        }, false, 'GET', 'html'
    );
}
