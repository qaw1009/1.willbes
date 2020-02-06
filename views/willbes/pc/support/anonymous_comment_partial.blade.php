<iframe id="iframe_anonymous" name="iframe_anonymous" frameborder="0" scrolling="no" width="940px" onload="resizeAnonymousIframe(this)" src="{{front_url('/support/anonymousComment/index?board_idx='.$board_idx)}}"></iframe>
<script type="text/javascript">
    // var ano_iframe_height = 0;
    function resizeAnonymousIframe(iframe) {
        // iframe.height = (iframe.contentWindow.document.body.scrollHeight + ano_iframe_height ) + "px";
        iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }
</script>