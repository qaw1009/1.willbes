<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{front_url($tab_data['frame_path'])}}?{{$tab_data['frame_params']}}"></iframe>
<script type="text/javascript">
    function resizeIframe(iframe) {
        var height = iframe.contentWindow.document.body.scrollHeight + 67;
        iframe.height = height + "px";
        /*iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";*/
    }
</script>