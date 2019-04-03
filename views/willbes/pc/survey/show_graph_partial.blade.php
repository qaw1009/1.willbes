@if(empty($arr_base['spidx']) === false)
<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframeSurvey(this)" src="{{front_url('/survey/graph/'.$arr_base['spidx'])}}"></iframe>
@endif
<script>
    var spidx = '{{ $arr_base['spidx'] }}';

    function resizeIframeSurvey(iframe) {
        var agent = navigator.userAgent.toLowerCase();
        if (agent.indexOf("chrome") != -1) {
            iframe.height = (iframe.contentDocument.documentElement.scrollHeight + 15) + "px";
        } else {
            iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
        }

        // https://pass.local.willbes.net/promotion/index/cate/3019/code/1140/spidx/2 에서 스크립트가 안먹어서 넣음
        if(spidx == 2){
            iframe.height = '505px';
        }
    }

</script>


