<iframe frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/event/frameCommentList?'.$frame_params)}}"></iframe>
<div id="NOTICEPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";

    }

    function popup_notice_view(notice_idx) {
        var ele_id = 'NOTICEPASS';
        var data = {'ele_id' : ele_id, 'board_idx' : notice_idx};
        sendAjax('{{ front_url('/event/popupNoticeShow/') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }
</script>