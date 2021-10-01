<h4>● 학습상담</h4>
<div class="mt30" id="qna_list">
    <div class="f_right mb10">
        <div class="subBtn blue NSK f_right"><a href="javasxript:void(0);" id="btn_qna_create">상담하기</a></div>
    </div>
    <div id="qna_table"></div>
</div>

{{--글쓰기--}}
<div id="qna_create"></div>

{{--글보기--}}
<div id="qna_show"></div>

<script type="text/javascript">
    $(document).ready(function(){
        qnaListAjax(1);
        $('#btn_qna_create').click(function () {
            $('#qna_list').hide();
            $('#qna_create').show();
            var data = {
                'supporters_idx' : '{{ $data['SupportersIdx'] }}'
            };
            sendAjax('{{ front_url('/supporters/qna/create') }}', data, function(ret) {
                $('#qna_create').html(ret);
            }, showAlertError, false, 'GET', 'html');
        });
    });

    function qnaListAjax(num) {
        var data = {
            'supporters_idx' : '{{ $data['SupportersIdx'] }}',
            'page' : num
        };
        sendAjax('{{ front_url('/supporters/qna/index') }}', data, function(ret) {
            $('#qna_table').html(ret);
        }, showAlertError, false, 'GET', 'html');
    }
</script>