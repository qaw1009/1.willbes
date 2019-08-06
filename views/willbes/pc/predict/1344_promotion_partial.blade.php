<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/predict/totalgraph/?PredictIdx='.$arr_promotion_params['PredictIdx'].'&spidx1='.$arr_promotion_params['spidx1'].'&spidx2='.$arr_promotion_params['spidx2'])}}"></iframe>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>

