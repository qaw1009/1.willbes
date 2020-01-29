/**
 * 수강증 출력 로그 리턴
 */
function getPrintCertLog(type, order_idx, order_prod_idx, prod_code_sub) {
    var html = '';
    var data = {
        'act_type' : type,
        'order_idx' : order_idx,
        'order_prod_idx' : order_prod_idx,
        'prod_code_sub' : prod_code_sub
    };
    var url = '/common/printCert/showPrintCertLog';

    sendAjax(url, data, function(ret) {
        if (ret !== null && Object.keys(ret).length > 0) {
            $.each(ret, function (k, v) {
                html += v.RegDatm + ' | ' + v.RegAdminName + '<br/>';
            });
        }
    }, showValidateError, false, 'GET');

    return html;
}
