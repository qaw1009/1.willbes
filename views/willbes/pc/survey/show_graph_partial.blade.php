<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/survey/graph/'.$arr_base['spidx'])}}"></iframe>
<script>
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>


