{{-- 하단 카페 링크 사용여부 --}}
<iframe frameborder="0" scrolling="no" width="100%" onload="resizeIframe713002(this)" src="{{front_url('/promotion/frameCommentList/713002?bottom_cafe_type='.(empty($bottom_cafe_type) === true ? 'Y' : $bottom_cafe_type).'&login_url='.(empty($login_url) === false ? $login_url : '').'&is_public='.(empty($is_public) === false ? $is_public : '').'&'.$arr_base['frame_params']).'&give_timing='.(empty($arr_promotion_params['give_timing']) === false ? $arr_promotion_params['give_timing'] : '' )}}"></iframe>
<div id="NOTICEPASS" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    var first_height = '';
    function resizeIframe713002(iframe) {
        if (first_height == '') {
            @if($__cfg['SiteGroupCode'] == '1011') {{-- 임용 --}}
                iframe.height = (iframe.contentWindow.document.body.scrollHeight + 350) + "px";
                if(iframe.contentWindow.document.body.scrollHeight > 450){
                    iframe.height = "544px";    //강제초기화
                }
            @else
                iframe.height = (iframe.contentWindow.document.body.scrollHeight + 250) + "px";
            @endif

            if (iframe.contentWindow.document.body.scrollHeight <= 100) {
                iframe.height = '633px';    //강제초기화
            }
        }
        first_height = iframe.height;
    }
</script>