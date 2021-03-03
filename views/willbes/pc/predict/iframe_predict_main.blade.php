<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/eventSurvey/totalgraph/?PredictIdx='.$arr_promotion_params['PredictIdx'].'&SsIdx1='.$arr_promotion_params['SsIdx1'].'&SsIdx2='.$arr_promotion_params['SsIdx2'])}}"></iframe>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>

