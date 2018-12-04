<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{site_url("/classroom/assignment?p={$lec['ProdCode']}&pf={$lec['ProfIdx']}")}}"></iframe>
<div id="NOTICEPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }

    function create_popup(notice_idx) {
        var ele_id = 'NOTICEPASS';
        var data = {'ele_id' : ele_id, 'board_idx' : notice_idx};
        sendAjax('{{ site_url('/event/popupNoticeShow/') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }

    function view_popup(notice_idx) {
        var ele_id = 'NOTICEPASS';
        var data = {'ele_id' : ele_id, 'board_idx' : notice_idx};
        sendAjax('{{ site_url('/event/popupNoticeShow/') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>