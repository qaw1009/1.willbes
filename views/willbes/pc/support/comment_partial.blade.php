<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{front_url('/support/comment/index?board_idx='.$board_idx)}}"></iframe>
<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }
</script>