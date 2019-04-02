<iframe id='frm' frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/survey/graph/'.$arr_base['spidx'])}}"></iframe>
<script>
    var spidx = '{{ $arr_base['spidx'] }}';
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
        // https://pass.local.willbes.net/promotion/index/cate/3019/code/1140/spidx/2 에서 스크립트가 안먹어서 넣음
        if(spidx == 2){
            iframe.height = '505px';
        }
    }
</script>


