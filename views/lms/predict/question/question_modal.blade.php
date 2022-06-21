@extends('lcms.layouts.master_modal')

@section('layer_title')
    @if($question_type == 1)
        [문제유형1] <button type="button" class="btn btn-sm btn-dark" onclick="javascript:_replaceModal('2')">문제유형2</button>
    @else
        [문제유형2] <button type="button" class="btn btn-sm btn-dark" onclick="javascript:_replaceModal('1')">문제유형1</button>
    @endif
@stop


@section('layer_header')
    <form class="form-horizontal" id="regi_question_form" name="regi_question_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="idx" value="{{ $pp_idx }}">
    <input type="hidden" name="question_type" value="{{ $question_type }}">
    <input type="hidden" name="TotalScore" value="{{ $total_score }}">
    <input type="hidden" name="Info" value="">
@endsection

@section('layer_content')
    <div class="x_content mt-20">
        <h5 class="mb-20">
            <span class="required">*</span>
            '문항호출' 클릭시, 이전 회차의 과목별 문제정보에서 등록할 문제를 선택할 수 있습니다. (동일 과목, 교수정보 지난 과목별 문제만 호출)
        </h5>
        <div>
            <div class="pull-left mb-10">[ 총 {{ count($question_data) }}건 ]</div>
            <div class="pull-right text-right form-inline mb-5">
                <span class="mr-10">총점 : {{ $total_score }}</span>
                {{--<input type="text" class="form-control" value="총점 : {{ $total_score }}" style="min-width:50px; width:50px;" title="총점" disabled="disabled">--}}
                <select class="form-control">
                    @foreach(range(1, 20) as $n)
                        <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" id="temp_score" style="min-width:50px; width:50px;" placeholder="배점" title="배점 전체 적용">
                <button class="btn btn-sm btn-primary" id="act-addRow">필드추가</button>
                <button class="btn btn-sm btn-danger" id="btn-delete">전체삭제</button>
            </div>
        </div>
        <table class="table table-bordered modal-table">
            <thead>
            <tr>
                <th class="text-center">문항번호</th>
                <th class="text-center">정답</th>
                <th class="text-center" style="min-width:50px; width:50px;">배점</th>
                <th class="text-center">등록자</th>
                <th class="text-center">등록일</th>
                <th class="text-center">삭제</th>
            </tr>
            </thead>
            <tbody>
            {{--[S] 필드추가을 위한 기본HTML, 로딩후 제거--}}
            <tr data-chapter-idx="">
                <td class="text-center form-inline">
                    <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="">
                </td>

                <td class="text-center right-answer">
                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1"> <label style="margin-right:10px;">1</label>
                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2"> <label style="margin-right:10px;">2</label>
                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3"> <label style="margin-right:10px;">3</label>
                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4"> <label style="margin-right:10px;">4</label>
                    <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5"> <label>5</label>
                    <input type="hidden" name="RightAnswer[]">
                </td>
                <td class="text-center"><input type="text" class="form-control scoring" name="Scoring[]" value=""></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
            </tr>
            {{--[E] 필드추가을 위한 기본HTML, 로딩후 제거--}}

            @foreach($question_data as $row)
                <tr data-chapter-idx="{{ $row['PqIdx'] }}">
                    <td class="text-center form-inline">
                        <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="{{$row['QuestionNO']}}">
                    </td>

                    <td class="text-center right-answer">
                        <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1" @if(in_array('1', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">1</label>
                        <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2" @if(in_array('2', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">2</label>
                        <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3" @if(in_array('3', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">3</label>
                        <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4" @if(in_array('4', explode(',', $row['RightAnswer']))) checked @endif> <label style="margin-right:10px;">4</label>
                        <input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5" @if(in_array('5', explode(',', $row['RightAnswer']))) checked @endif> <label>5</label>
                        <input type="hidden" name="RightAnswer[]" value="{{$row['RightAnswer']}}">
                    </td>
                    <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value="{{$row['Scoring']}}"></td>
                    <td class="text-center">{{ $row['RegAdminName'] }}</td>
                    <td class="text-center">{{ $row['RegDatm'] }}</td>
                    <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>

    <script type="text/javascript">
        var $regi_question_form = $('#regi_question_form');
        var addField;
        var chapterExist = [];
        var chapterDel = [];

        $(document).ready(function() {
            // 문항정보필드 처리을 위한 초기화작업
            var cList = $regi_question_form.find('tbody');
            addField = cList.find('tr:eq(0)').html();
            cList.find('tr:eq(0)').remove();

            cList.find('tr').each(function () {
                var cIDX = $(this).data('chapter-idx');
                if(cIDX) chapterExist.push(cIDX);
            });

            $regi_question_form.on('ifChanged', '[name="RightAnswerTmp[]"]', function () {
                var wrap = $(this).closest('.right-answer');
                // 정답 저장
                var right = [];
                wrap.find('[name="RightAnswerTmp[]"]:checked').each(function () {
                    right.push($(this).val());
                });
                wrap.find('[name="RightAnswer[]"]').val(right.join(','));
            });

            var exNum = $regi_form.find('[name="AnswerNum"]').val();
            $regi_question_form.find('tbody > tr').each(function () {
                $(this).find('.right-answer > div').each(function (i,v) {
                    if(i >= parseInt(exNum)) $(this).remove();
                });
            });

            // 문항정보필드 추가
            $('#act-addRow').on('click', function () {
                var i;
                var count = $(this).closest('div').find('select').val();
                var rowLen = cList.find('tr').length;

                for (i=0; i < count; i++) {
                    cList.append('<tr data-chapter-idx="">' + addField + '</tr>');
                }

                cList.find('tr').each(function (index) {
                    if(index >= rowLen) $(this).find('[name="QuestionNO[]"]').val(++index);
                });

                $('.scoring').val($('#temp_score').val());
                init_iCheck();
                return false;
            });

            // 문항정보필드 삭제
            $regi_question_form.on('click', '.addRow-del', function () {
                if( $(this).closest('tr').data('chapter-idx') ) {
                    if (!confirm("삭제는 저장시 적용됩니다.\n삭제 대기목록에 추가하시겠습니까?")) return false;
                }
                var cIDX = $(this).closest('tr').data('chapter-idx');
                if(cIDX) chapterDel.push(cIDX);
                $(this).closest('tr').remove();
            });

            // 문항 전체 삭제
            $regi_question_form.on('click', '#btn-delete', function () {
                if( $regi_question_form.find('tbody tr').length < 1 ) { alert('삭제할 필드가 없습니다.'); return false; }
                if (!confirm("전체 삭제 하시겠습니까?")) return false;

                var _url = '{{ site_url('/predict/question/deleteQuestion') }}';
                ajaxSubmit($regi_question_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        _replaceModal('{{ $question_type }}');
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 문항정보필드 등록,수정
            $regi_question_form.submit(function () {
                if( $regi_question_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                var chapterTotal = [];
                cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                $regi_question_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                var _url = '{{ site_url('/predict/question/storeQuestion') }}';
                ajaxSubmit($regi_question_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        _replaceModal('{{ $question_type }}');
                    }
                }, showValidateError, null, false, 'alert');
            });


            // 정렬변경 허용여부(변경된 내역이 있는 경우 불허)
            $regi_question_form.on('change ifChanged', 'input:not([name="QuestionNO[]"]), select', function () {
                $('#act-sort').prop('disabled', true);
            });
            $regi_question_form.on('click', '.addRow-del, .act-call-unit', function () {
                $('#act-sort').prop('disabled', true);
            });
            $('#act-call, #act-addRow').on('click', function () {
                $('#act-sort').prop('disabled', true);
            });
        });

        function _replaceModal(question_type) {
            var params = '?pp_idx=' + '{{ $pp_idx }}';
            params += '&question_type=' + question_type;
            params += '&total_score=' + '{{ $total_score }}';
            var _replace_url = '{{ site_url('/predict/question/questionListModal') }}' + params;
            replaceModal(_replace_url,'');
        }
    </script>
@endsection