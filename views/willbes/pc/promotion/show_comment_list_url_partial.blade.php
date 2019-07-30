{{-- 하단 카페 링크 사용여부 --}}
<iframe frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/promotion/frameCommentList/713002?bottom_cafe_type='.(empty($bottom_cafe_type) === true ? 'Y' : $bottom_cafe_type).'&'.$arr_base['frame_params'])}}"></iframe>
<div id="NOTICEPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    function resizeIframe(iframe) {
        iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
    }
</script>