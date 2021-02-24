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
            <div class="x_content">
                <div>
                    <div class="pull-left mt-15 mb-10">[ 총 {{ count($question_data) }}건 ]</div>
                    <div class="pull-right text-right form-inline mb-5">
                        <select class="form-control">
                            @foreach(range(1, 20) as $n)
                                <option value="{{$n}}" @if($loop->index == '20') selected @endif>{{$n}}개</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" id="temp_score" style="min-width:50px; width:50px;" placeholder="배점" title="배점 전체 적용">
                        <button type="button" class="btn btn-sm btn-primary" id="act-addRow">필드추가</button>
                        <button type="button" class="btn btn-sm btn-primary" id="act-sort">정렬변경</button>
                        {{--<button class="btn btn-sm btn-success" id="act-call">문항호출</button>--}}
                    </div>
                </div>
                <table class="table table-bordered modal-table">
                    <thead>
                    <tr>
                        <th class="text-center">문항<br>번호</th>
                        <th class="text-center" style="min-width:130px">문제영역</th>
                        <th class="text-center" style="min-width:120px">문제등록옵션</th>
                        <th class="text-center">문제등록(분할이미지)</th>
                        <th class="text-center">해설등록(분할이미지)</th>
                        <th class="text-center" style="min-width:60px; width:60px;">정답</th>
                        <th class="text-center" style="min-width:50px; width:50px;">배점</th>
                        <th class="text-center">난이도</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- [S] 필드추가을 위한 기본HTML, 로딩후 제거 --}}
                    <tr data-chapter-idx="">
                        <td class="text-center form-inline">
                            <input type="hidden" name="regKind[]" value="">
                            <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="">
                        </td>
                        <td class="text-center">
                            <select class="form-control" name="PalIdx[]">
                                <option value="">선택</option>
                                @foreach($areaList as $it)
                                    <option value="{{$it['PalIdx']}}">{{$it['AreaName']}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="text-center">
                            <select class="form-control" name="QuestionOption[]">
                                <option value="S">객관식(단일정답)</option>
                                <option value="M">객관식(복수정답)</option>
                                <option value="J">주관식</option>
                            </select>
                        </td>
                        <td>
                            <input type="file" name="QuestionFile[]" style="width:180px">
                            <input type="hidden" name="callIdx[]" value="">
                            <input type="hidden" name="callQuestionFile[]" value="">
                            <input type="hidden" name="callRealQuestionFile[]" value="">
                            <div class="file-wrap" style="cursor:pointer"></div>
                        </td>
                        <td>
                            <input type="file" name="ExplanFile[]" style="width:180px">
                            <input type="hidden" name="callExplanFile[]" value="">
                            <input type="hidden" name="callRealExplanFile[]" value="">
                            <div class="file-wrap" style="cursor:pointer"></div>
                        </td>
                        <td class="text-center right-answer">
                            <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1"> <label>1</label></div>
                            <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2"> <label>2</label></div>
                            <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3"> <label>3</label></div>
                            <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4"> <label>4</label></div>
                            <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5"> <label>5</label></div>
                            <input type="hidden" name="RightAnswer[]">
                        </td>
                        <td class="text-center"><input type="text" class="form-control scoring" name="Scoring[]" value=""></td>
                        <td class="text-center">
                            <select class="form-control" name="Difficulty[]" style="padding:0">
                                <option value="">선택</option>
                                <option value="T">상</option>
                                <option value="M">중</option>
                                <option value="B">하</option>
                            </select>
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                    </tr>
                    {{-- [E] 필드추가을 위한 기본HTML, 로딩후 제거 --}}

                    @foreach($question_data as $row)
                        <tr data-chapter-idx="{{ $row['PqIdx'] }}">
                            <td class="text-center form-inline">
                                <input type="hidden" name="regKind[]" value="">
                                <input type="text" class="form-control" style="width:45px" name="QuestionNO[]" value="{{$row['QuestionNO']}}">
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="PalIdx[]">
                                    <option value="">선택</option>
                                    @foreach($areaList as $it)
                                        <option value="{{$it['PalIdx']}}" @if($it['PalIdx'] == $row['PalIdx']) selected @endif>{{$it['AreaName']}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td class="text-center">
                                <select class="form-control" name="QuestionOption[]">
                                    <option value="S" @if($row['QuestionOption'] == 'S') selected @endif>객관식(단일정답)</option>
                                    <option value="M" @if($row['QuestionOption'] == 'M') selected @endif>객관식(복수정답)</option>
                                    <option value="J" @if($row['QuestionOption'] == 'J') selected @endif>주관식</option>
                                </select>
                            </td>
                            <td>
                                <input type="file" name="QuestionFile[]" style="width:180px" multiple>
                                <input type="hidden" name="callIdx[]" value="">
                                <input type="hidden" name="callQuestionFile[]" value="">
                                <input type="hidden" name="callRealQuestionFile[]" value="">
                                @if(!empty($row['QuestionFile']))
                                    <div class="file-wrap">
                                        <a href="{{ site_url("/predict2/base/exam/download") }}?path={{ urlencode($row['FilePath'].$row['RealQuestionFile'])}}&fname={{ urlencode($row['QuestionFile']) }}" target="_blank">
                                            <span class="blue underline-link img-tooltip" data-title="<img src='{{ $row['FilePath'].$row['RealQuestionFile'] }}'>">{{ $row['QuestionFile'] }}</span>
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <input type="file" name="ExplanFile[]" style="width:180px" multiple>
                                <input type="hidden" name="callExplanFile[]" value="">
                                <input type="hidden" name="callRealExplanFile[]" value="">
                                @if(!empty($row['ExplanFile']))
                                    <div class="file-wrap">
                                        <a href="{{ site_url("/predict2/base/exam/download") }}?path={{ urlencode($row['FilePath'].$row['RealExplanFile'])}}&fname={{ urlencode($row['ExplanFile']) }}" target="_blank">
                                            <span class="blue underline-link img-tooltip" data-title="<img src='{{ $row['FilePath'].$row['RealExplanFile'] }}'>">{{ $row['ExplanFile'] }}</span>
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center right-answer">
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="1" @if(in_array('1', explode(',', $row['RightAnswer']))) checked @endif> <label>1</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="2" @if(in_array('2', explode(',', $row['RightAnswer']))) checked @endif> <label>2</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="3" @if(in_array('3', explode(',', $row['RightAnswer']))) checked @endif> <label>3</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="4" @if(in_array('4', explode(',', $row['RightAnswer']))) checked @endif> <label>4</label></div>
                                <div><input type="checkbox" class="flat" name="RightAnswerTmp[]" value="5" @if(in_array('5', explode(',', $row['RightAnswer']))) checked @endif> <label>5</label></div>
                                <input type="hidden" name="RightAnswer[]" value="{{$row['RightAnswer']}}">
                            </td>
                            <td class="text-center"><input type="text" class="form-control" name="Scoring[]" value="{{$row['Scoring']}}"></td>
                            <td class="text-center">
                                <select class="form-control" name="Difficulty[]" style="padding:0">
                                    <option value="">선택</option>
                                    <option value="T" @if($row['Difficulty'] == 'T') selected @endif>상</option>
                                    <option value="M" @if($row['Difficulty'] == 'M') selected @endif>중</option>
                                    <option value="B" @if($row['Difficulty'] == 'B') selected @endif>하</option>
                                </select>
                            </td>
                            <td class="text-center">{{ $row['RegAdminName'] }}</td>
                            <td class="text-center">{{ $row['RegDatm'] }}</td>
                            <td class="text-center"><span class="addRow-del link-cursor"><i class="fa fa-times fa-lg red"></i></span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <script type="text/javascript">
                var $regi_question_form = $('#regi_question_form');
                var addField;
                var chapterExist = [];
                var chapterDel = [];

                $(document).ready(function() {
                    /*********************************************************************************/
                    // 문항정보필드 정답보기 갯수
                    var exNum = $regi_form.find('[name="AnswerNum"]').val();
                    $regi_question_form.find('tbody > tr').each(function () {
                        $(this).find('.right-answer > div').each(function (i,v) {
                            if(i >= parseInt(exNum)) $(this).remove();
                        });
                    });

                    // 문항정보필드 문제등록옵션 변경시 정답 초기화
                    $regi_question_form.find('[name="QuestionOption[]"]').each(function () {
                        if($(this).val() == 'J')
                            $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', true);
                    });
                    $regi_question_form.on('change', '[name="QuestionOption[]"]', function () {
                        $(this).closest('tr').find('[name="RightAnswerTmp[]"]').iCheck('uncheck');
                        $(this).closest('tr').find('[name="RightAnswer[]"]').val('');

                        if($(this).val() == 'J') { // 주관식
                            $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', true);
                        }
                        else {
                            $(this).closest('tr').find('[name="RightAnswerTmp[]"]').prop('disabled', false);
                        }
                        $(this).closest('tr').find('[name="RightAnswerTmp[]"]').iCheck('update');
                    });

                    // 문항정보필드 문제등록옵션 오류체크 (객관식(단수) 1개, 객관식(복수) 2개, 주관식 비활성)
                    $regi_question_form.on('ifChanged', '[name="RightAnswerTmp[]"]', function () {
                        var wrap = $(this).closest('.right-answer');
                        var subExOpt = $(this).closest('tr').find('[name="QuestionOption[]"]').val();

                        if(subExOpt == 'S') {
                            if(wrap.find('[name="RightAnswerTmp[]"]:checked').length > 1) {
                                $(this).iCheck('uncheck');
                                init_iCheck();

                                alert('객관식(단일) 정답은 1개만 선택가능합니다.');
                                return false;
                            }
                        }

                        // 정답 저장
                        var right = [];
                        wrap.find('[name="RightAnswerTmp[]"]:checked').each(function () {
                            right.push($(this).val());
                        });
                        wrap.find('[name="RightAnswer[]"]').val(right.join(','));
                    });

                    // 문항정보필드 처리을 위한 초기화작업
                    var cList = $regi_question_form.find('tbody');
                    addField = cList.find('tr:eq(0)').html();
                    cList.find('tr:eq(0)').remove();

                    cList.find('tr').each(function () {
                        var cIDX = $(this).data('chapter-idx');
                        if(cIDX) chapterExist.push(cIDX);
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

                    // 문항정보필드 등록,수정
                    $regi_question_form.submit(function () {
                        if( $regi_question_form.find('tbody tr').length < 1 ) { alert('필드를 먼저 추가해 주세요'); return false; }

                        var chapterTotal = [];
                        cList.find('tr').each(function () { chapterTotal.push($(this).data('chapter-idx')); });

                        $regi_question_form.find('[name="Info"]').val( JSON.stringify({'chapterTotal':chapterTotal, 'chapterExist':chapterExist, 'chapterDel':chapterDel}) );

                        var _url = '{{ site_url('/predict2/base/exam/storeQuestion') }}';
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
                    $regi_question_form.on('click', '.addRow-del', function () {
                        $('#act-sort').prop('disabled', true);
                    });
                    $('#act-addRow').on('click', function () {
                        $('#act-sort').prop('disabled', true);
                    });

                    // 정렬변경
                    $('#act-sort').on('click', function () {
                        if (!confirm('저장되지 않은 정보는 제거됩니다. 정렬을 변경하시겠습니까?')) return false;

                        var sorting = {};
                        cList.find('tr').each(function () {
                            if($(this).data('chapter-idx')) {
                                sorting[$(this).data('chapter-idx')] = $(this).find('[name="QuestionNO[]"]').val();
                            }
                        });
                        var _url = '{{ site_url("/predict2/base/exam/sort") }}';
                        var data = {
                            '{{ csrf_token_name() }}' : $regi_question_form.find('[name="{{ csrf_token_name() }}"]').val(),
                            '_method' : 'PUT',
                            'idx' : $regi_question_form.find('[name="idx"]').val(),
                            'sorting' : JSON.stringify(sorting),
                        };

                        sendAjax(_url, data, function(ret) {
                            if (ret.ret_cd) {
                                notifyAlert('success', '알림', ret.ret_msg);
                                _replaceModal('{{ $question_type }}');
                            }
                        }, showValidateError, false, 'POST');
                    });
                });

                function _replaceModal(question_type) {
                    var params = '?pp_idx=' + '{{ $pp_idx }}';
                    params += '&pa_idx=' + '{{ $pa_idx }}';
                    params += '&question_type=' + question_type;
                    params += '&total_score=' + '{{ $total_score }}';
                    var _replace_url = '{{ site_url('/predict2/base/exam/questionListModal') }}' + params;
                    replaceModal(_replace_url,'');
                }
            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>
@endsection