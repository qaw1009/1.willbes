<h4>● 서포터즈 열린 건의함! 제안 및 토론</h4>
<div>
    서포터즈 여러분들의 자유로운 제안, 의견 공유 공간입니다.<br>
    신광은 경찰학원 및 사이트를 위해 격려와 질책은 물론 번뜩이는 아이디어도 많이 제안해 주세요.<br>
    사이트 및 강좌 모니터링, 아이디어를 채택하여 포상 혜택 부여 및 해당 의견을 반영할 예정입니다.<br>
    <span class="tx-red">※ 정당한 사유 없이 3주 이상 제안이 1건도 없을 시 서포터즈 혜택을 제한합니다.</span>
</div>
{{--리스트--}}
<div class="mt30" id="suggest_list">
    <div class="f_right mb10">
        <div class="subBtn blue NSK f_right"><a href="#none" id="btn_suggest_create">글쓰기</a></div>
    </div>
    <div id="suggest_table"></div>
</div>

{{--글쓰기--}}
<div id="suggest_create"></div>

{{--글보기--}}
<div id="suggest_show"></div>

<script type="text/javascript">
    $(document).ready(function(){
        Main_SuggestListAjax(1);
        $('#btn_suggest_create').click(function () {
            $('#suggest_list').hide();
            $('#suggest_create').show();
            var data = {
                'supporters_idx' : '{{ $data['SupportersIdx'] }}'
            };
            sendAjax('{{ front_url('/supporters/suggest/create') }}', data, function(ret) {
                $('#suggest_create').html(ret);
            }, showAlertError, false, 'GET', 'html');
        });
    });

    function Main_SuggestListAjax(num) {
        var data = {
            'supporters_idx' : '{{ $data['SupportersIdx'] }}',
            'page' : num
        };
        sendAjax('{{ front_url('/supporters/suggest/index') }}', data, function(ret) {
            $('#suggest_table').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }
</script>