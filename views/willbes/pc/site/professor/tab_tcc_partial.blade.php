<link rel="stylesheet" type="text/css" href="/public/js/willbes/colorbox/colorbox.css" />
<script type="text/javascript" src="/public/js/willbes/colorbox/jquery.colorbox.js"></script>
<a href="#none" class="playBtn"></a>

<iframe frameborder="0" scrolling="no" width="940px" onload="resizeIframe(this)" src="{{front_url($tab_data['frame_path'])}}?{{$tab_data['frame_params']}}"></iframe>

<script type="text/javascript">
    $(document).ready(function() {
        $(".playBtn").colorbox({iframe:true, innerWidth:800, innerHeight:600});
    });
    function resizeIframe(iframe) {
        iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
    }

    function playVideo(url) {
        $('.playBtn').prop('href', url).trigger('click');
    }
</script>