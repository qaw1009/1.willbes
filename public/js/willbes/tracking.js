$(document).ready(function() {
    // 실시간 방문자 정보 저장
    var activeVisitor = function() {
        sendAjax('/access/visitor', {}, function(ret) {
            if (ret.ret_cd) {
                // do nothing
            }
        }, null, true, 'GET');
    };

    activeVisitor();
});
