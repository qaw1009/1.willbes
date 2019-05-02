<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/predict/totalgraph/?PredictIdx='.$arr_promotion_params['PredictIdx'].'&spidx='.$arr_promotion_params['spidx'])}}"></iframe>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>

