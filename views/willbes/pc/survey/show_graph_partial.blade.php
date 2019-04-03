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

        iframe.height= newheight + "px";
        // /promotion/index/cate/3019/code/1140/spidx/2 그래프가 3번째 탭에 있어서 크롬에서 세로사이즈를 제대로 감지못하는 오류가 있어서 예외처리
        if(spidx == 2){
            iframe.height = '505px';
        }
    }

</script>


