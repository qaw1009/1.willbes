/**
 * 상품 검색
 */
function prodListChange(prod_type, learnpattern) {
    var url = '';
    var param = '?site_code='+$("#site_code").val()+'&prod_type='+prod_type+'&LearnPatternCcd='+learnpattern
        +'&return_type='+$("#return_type").val()+'&target_id='+$("#target_id").val()+'&target_field='+$("#target_field").val()
        +'&prod_tabs='+$("#prod_tabs").val();

    if (prod_type === 'book') {
        url = '/common/searchBook/';
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
