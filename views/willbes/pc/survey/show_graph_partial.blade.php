@if(empty($arr_base['spidx']) === false)
<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframeSurvey(this)" src="{{front_url('/survey/graph/'.$arr_base['spidx'])}}"></iframe>
@endif
<script>
    var spidx = '{{ $arr_base['spidx'] }}';

    function resizeIframeSurvey(iframe) {
        var newheight;

        if(iframe.contentDocument){
            newheight = iframe.contentDocument.documentElement.scrollHeight+30;
        } else {
            newheight=iframe.contentWindow.document.body.scrollHeight+30;
        }
    }
</script>