<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/predict2/index/'.$arr_promotion_params['PredictIdx2'])}}"></iframe>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>