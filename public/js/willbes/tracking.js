$(document).ready(function() {
    // 실시간 방문자 정보 저장
    var activeVisitor = function() {
        var data = {'refer_info' : document.referrer};

        sendAjax('/access/visitor', data, function(ret) {
            if (ret.ret_cd) {
                // do nothing
            }
        }, null, true, 'GET');
    };

    activeVisitor();
});
