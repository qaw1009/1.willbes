@if(empty($arr_promotion_params['SsIdx']) === false)
    <iframe id="frm" frameborder="0" scrolling="no" width="100%" onload="resizeIframeSurvey(this)" src="{{front_url('/eventSurvey/graph?ss_idx=' . $arr_promotion_params['SsIdx'] . '&is_series=' . (empty($is_series) === false ? $is_series : 'N'))}}"></iframe>
@endif
<script>
    function resizeIframeSurvey(iframe) {
        var newheight;
        if(iframe.contentDocument){
            newheight = iframe.contentDocument.documentElement.scrollHeight+30;
        } else {
            newheight=iframe.contentWindow.document.body.scrollHeight+30;
        }
        iframe.height= newheight + "px";
    }
</script>