<form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id='regi_prod_code' name="regi_prod_code"/>
    <input type="hidden" id='regi_mr_idx' name="regi_mr_idx"/>
    <input type="hidden" id='regi_mp_idx' name="regi_mp_idx"/>
    <input type="hidden" id='regi_mq_idx' name="regi_mq_idx"/>
    <input type="hidden" id='regi_memo' name="regi_memo"/>
</form>

<div class="wBx">
    <ul class="exam-paperList mgB3">
        @foreach($answer_note_list as $key => $row)
            <li>
                <a name="que4" class="no">Q{{ $row['QuestionNO'] }}.</a>
                <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['RealQuestionFile'] }}"></span>
                <div id='btn_area' class="btnAgR area-box">
                    @if (empty($row['MwaIdx']) === true)
                        <a href="javascript:void(0);" onclick="addNote('{{ $row['MqIdx'] }}')" class="btnM1 btnlineBlue">노트에 바로추가 +</a>
                        <a href="javascript:void(0);" onclick="openMemo('{{ $row['MqIdx'] }}')" id='btn_memo_{{ $row['MqIdx'] }}' class="btnM2 btnBlue">메모</a>
                        <a href="javascript:void(0);" onclick="addNote('{{ $row['MqIdx'] }}')" id='btn_add_memo_{{ $row['MqIdx'] }}' class="btnM3 btnBlue">메모저장후추가</a>
                    @else
                        <a href="javascript:void(0);" onclick="noteDelete({{ $row['MwaIdx'] }})" class="btnM1 btnlineBlue">문항 삭제 +</a>
                        <a href="javascript:void(0);" onclick="addNote('{{ $row['MqIdx'] }}')" class="btnM2 btnGray">수정</a>
                    @endif
                </div>
                <div class="agR">
                    <textarea id="memo_{{ $row['MqIdx'] }}" name="memo{{ $row['MqIdx'] }}" cols="10" rows="1" class="memoText" {!! (empty($row['MwaIdx']) === true ? "" : "style='display: block;'") !!}>{{ $row['Memo'] }}</textarea>
                </div>
            </li>
            @if($question_view_type == 'A')
            <!-- 해설 -->
                <li>
                    <a name="que4" class="no">A{{ $row['QuestionNO'] }}.</a>
                    <span class="que"><img src="{{ $row['QFilePath'] }}{{ $row['RealExplanFile'] }}"></span>
                </li>
            @endif
        @endforeach
    </ul>
</div>

<script>
    var $regi_form = $('#regi_form');

    // 나의오답노트 추가
    function addNote(mq_idx){
        $('#regi_prod_code').val($('#prod_code').val());
        $('#regi_mr_idx').val($('#mr_idx').val());
        $('#regi_mp_idx').val($('#mp_idx option:selected').val());
        $('#regi_mq_idx').val(mq_idx);
        $('#regi_memo').val($('#memo_'+mq_idx).val());

        var _url = '{{ front_url('/classroom/mocktest/result/addNoteAjax') }}';
        ajaxSubmit($regi_form, _url, function(ret) {
            if(ret.ret_cd) {
                notifyAlert('success', '알림', ret.ret_msg);
                areaListHtml();
            }
        }, showError, null, false, 'alert');
    }

    function openMemo(num){
        var $textarea_layer = $('#memo_'+num);
        var $btn2_layer = $('#btn_memo_'+num);
        var $btn3_layer = $('#btn_add_memo_'+num);

        $btn2_layer.hide();
        $btn3_layer.css('display','inline-block');
        $textarea_layer.css('display','inline-block');
    }
    
    function noteDelete(memo_id) {
        if (confirm("문항을 삭제하시겠습니까?")) {
            data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'memo_id' : memo_id
            };

            sendAjax('{{ site_url('/classroom/mocktest/result/deleteNoteAjax') }}', data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    areaListHtml();
                }
            }, showError, false, 'POST');
        }
    }
</script>