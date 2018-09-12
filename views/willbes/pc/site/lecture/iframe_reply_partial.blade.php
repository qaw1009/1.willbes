<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{site_url("/support/studyComment/listFrame?cate=".$__cfg['CateCode']."&prof_idx=".$data['ProfIdx'])}}"></iframe>
<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }
</script>