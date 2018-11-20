/**
 * 주문메모
 */
$(document).ready(function() {
    var $datatable_memo;
    var $regi_memo_form = $('#regi_memo_form');
    var $list_memo_table = $('#list_memo_table');

    // 메모 목록
    $datatable_memo = $list_memo_table.DataTable({
        serverSide: true,
        paging: false,
        ajax: {
            'url' : '/common/orderMemo/listAjax',
            'type' : 'POST',
            'data' : function(data) {
                return $.extend(arrToJson($regi_memo_form.find('input[type="hidden"]').serializeArray()), {});
            }
        },
        columns: [
            {'data' : null, 'render' : function(data, type, row, meta) {
                    // 리스트 번호
                    return $datatable_memo.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                }},
            {'data' : 'OrderMemo', 'render' : function(data, type, row, meta) {
                    return data.replace(/\n/gi, '<br/>');
                }},
            {'data' : 'RegAdminName'},
            {'data' : 'RegDatm'}
        ]
    });

    // 메모 등록
    $regi_memo_form.submit(function() {
        var _url = '/common/orderMemo/store';

        ajaxSubmit($regi_memo_form, _url, function(ret) {
            if(ret.ret_cd) {
                notifyAlert('success', '알림', ret.ret_msg);
                $regi_memo_form.find('textarea[name="order_memo"]').val('');
                $datatable_memo.draw();
            }
        }, showValidateError, null, false, 'alert');
    });
});