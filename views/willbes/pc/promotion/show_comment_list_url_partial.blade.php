{{-- 하단 카페 링크 사용여부 --}}
<iframe frameborder="0" scrolling="no" width="100%" onload="resizeIframe(this)" src="{{front_url('/promotion/frameCommentList/713002?bottom_cafe_type='.(empty($bottom_cafe_type) === true ? 'Y' : $bottom_cafe_type).'&'.$arr_base['frame_params']).'&give_timing='.(empty($arr_promotion_params['give_timing']) === false ? $arr_promotion_params['give_timing'] : '' )}}"></iframe>
<div id="NOTICEPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    var first_height = '';
    function resizeIframe(iframe) {
        if (first_height == '') {
            iframe.height = (iframe.contentWindow.document.body.scrollHeight + 15) + "px";
            if (iframe.contentWindow.document.body.scrollHeight <= 100) {
                iframe.height = '633px';    //강제초기화
            }
        }
        first_height = iframe.height;
    }
</script>