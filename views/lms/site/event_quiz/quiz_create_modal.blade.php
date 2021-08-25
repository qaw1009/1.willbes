@extends('lcms.layouts.master_modal')

@section('layer_title')
    퀴즈 질문 등록
@stop

@section('layer_header')
<style>
    #question .input-eqs-question { width: 600px;}
    #question .input-question-detail { width: 490px;}
</style>

<form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    {!! method_field($method) !!}
    <input type="hidden" name="eq_idx" value="{{ $eq_idx }}"/>
    <input type="hidden" name="eqs_idx" value="{{ $eqs_idx }}"/>
@endsection

@section('layer_content')
    <div class="x_title text-right">
        <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
    </div>
    {!! form_errors() !!}

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="eqs_group_title">문제(그룹)명 <span class="required">*</span></label>
        <div class="col-md-9 item">
            <input type="text" class="form-control" id="eqs_group_title" name="eqs_group_title" title="문제(그룹)명" required="required" value="{{ $data_quiz['EqsGroupTitle'] or '1' }}">
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="order_num">정렬순서 <span class="required">*</span></label>
        <div class="col-md-4">
            <input type="number" class="form-control" id="order_num" name="order_num" title="정렬순서" value="{{($method == 'POST') ? $order_num : $data_quiz['OrderNum']}}" style="width: 120px">
        </div>

        <label class="control-label col-md-1-1" for="eqs_is_use">사용여부 <span class="required">*</span></label>
        <div class="col-md-4 item">
            <div class="radio">
                <input type="radio" class="flat" id="eqs_is_use_y" name="eqs_is_use" title="사용여부" required="required" value="Y"
                       @if(empty($data_quiz['IsUse']) === false && $data_quiz['IsUse']=='Y')checked="checked"@endif/>
                <label for="eqs_is_use_y" class="input-label">사용</label>
                <input type="radio" class="flat" id="eqs_is_use_n" name="eqs_is_use" value="N"
                       @if($method == 'POST' || (empty($data_quiz['IsUse']) === false && $data_quiz['IsUse']=='N'))checked="checked"@endif/>
                <label for="eqs_is_use_n" class="input-label">미사용</label>
            </div>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="eqs_start_day">노출기간<span class="required">*</span></label>
        <div class="col-md-10 form-inline">
            <div class="input-group mb-0">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" id="eqs_start_day" name="eqs_start_day" value="{{ $data_quiz['EqsStartDay'] or ''}}" style="height: 32px">

                <div class="input-group-btn">
                    <select class="form-control ml-5" id="eqs_start_hour" name="eqs_start_hour" style="width: 45px">
                        @php
                            for($i=0; $i<=23; $i++) {
                                $str = (strlen($i) <= 1) ? '0' : '';
                                $selected = ($i == $data_quiz['EqsStartHour']) ? "selected='selected'" : "";
                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                            }
                        @endphp
                    </select>
                    <select class="form-control" id="eqs_start_min" name="eqs_start_min" style="width: 45px">
                        @php
                            for($i=0; $i<=59; $i++) {
                                $str = (strlen($i) <= 1) ? '0' : '';
                                $selected = ($i == $data_quiz['EqsStartMin']) ? "selected='selected'" : "";
                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                            }
                        @endphp
                    </select>
                </div>

                <div class="input-group-addon no-border no-bgcolor">~</div>

                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control datepicker" id="eqs_end_day" name="eqs_end_day" value="{{ $data_quiz['EqsEndDay'] or ''}}" style="height: 32px">

                <div class="input-group-btn">
                    <select class="form-control ml-5" id="eqs_end_hour" name="eqs_end_hour" style="width: 45px">
                        @php
                            for($i=0; $i<=23; $i++) {
                                $str = (strlen($i) <= 1) ? '0' : '';
                                $selected = ($i == $data_quiz['EqsEndHour']) ? "selected='selected'" : "";
                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                            }
                        @endphp
                    </select>
                    <select class="form-control" id="eqs_end_min" name="eqs_end_min" style="width: 45px">
                        @php
                            for($i=0; $i<=59; $i++) {
                                $str = (strlen($i) <= 1) ? '0' : '';
                                $selected = ($i == $data_quiz['EqsEndMin']) ? "selected='selected'" : "";
                                echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                            }
                        @endphp
                    </select>
                </div>

            </div>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1" for="eqs_type">문제유형 <span class="required">*</span></label>
        <div class="col-md-10 form-inline item">
            <select class="form-control" id="eqs_type" name="eqs_type" title="문제유형" required="required" style="width: 120px">
                <option value="">-유형선택-</option>
                @foreach($arr_sel_type as $key => $val)
                    <option value="{{$key}}" @if((empty($data_quiz['EqsType']) === false && $data_quiz['EqsType'] == $key) || ($method == 'POST' && $key == 'S')) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm form-group-inline">
        <label class="control-label col-md-1-1">문제갯수 <span class="required">*</span></label>
        <div class="col-md-1 item">
            <select class="form-control btn-add-question-box" id="eqs_total_cnt" name="eqs_total_cnt" title="문제갯수" required="required">
                @for($i=1; $i<=20; $i++)
                    <option value='{{ $i }}'
                            @if(empty($data_quiz['EqsqTotalCnt']) === false && $data_quiz['EqsqTotalCnt'] == $i ) selected="selected" @endif
                            @if(empty(count($data_question)) === false && $i < count($data_question)) disabled style="background: #bfbfbf" @endif>{{ $i }}</option>
                @endfor
            </select>
        </div>
    </div>

    <div class="form-group form-group-sm form-group-inline" id="question">
        <label class="control-label col-md-1-1">답변항목 <span class="required">*</span>
            <p class="btn btn-message-box bold red">[필독]</p>
        </label>
        <div class="col-md-10 form-inline">
            <div class="form-group mb-30" id="message_box" style="display: none; border-bottom: 1px solid #e6e9ed;padding-bottom: 5px;">
                <li>질문별 "보기" 문항수가 달라질 경우 "수정"을 통해서 정답을 업데이트처리 해주세요.</li>
                <li>이미 서비스 오픈된 컨텐츠의 데이터 수정은 자제해주세요.("정답"이 달라질 수 있습니다.)</li>
            </div>
            @if($method == 'POST' || empty($data_question) === true)
                <div class="mb-30" id="qt_0">
                    <div class="row mb-5">
                        <label class="control-label col-md-1-1">질문 <span class="required">*</span></label>
                        <input type="text" class="form-control input-eqs-question" name="question_title_0" title="답변항목" value="">
                    </div>

                    <div class="row mb-5">
                        <label class="control-label col-md-1-1">보기 <span class="required">*</span></label>
                        <select class="form-control col-md-1-1 mr-5 btn-add-question-detail-box" data-box-id="0" name="question_cnt_0" title="갯수">
                            @for($i = 1; $i <= 5; $i++)
                                <option value='{{ $i }}' >{{ $i }}</option>
                            @endfor
                        </select>
                        <input type="text" class="form-control input-question-detail" name="question_detail_title_0[]" title="보기" value="">
                        정답
                        <input type="checkbox" name="question_detail_is_answer_0[]" value="1">
                        <div class="mt-5 question_detail_html"></div>
                    </div>

                    <div class="row">
                        <label class="control-label col-md-1-1">해설 <span class="required">*</span></label>
                        <textarea class="form-control input-eqs-question" cols="70" rows="4" name="eqsq_explanation_0" title="해설"></textarea>
                    </div>
                </div>
            @else
                @php $box=0; @endphp
                @foreach($data_question as $row)
                    <div class="mb-30" id="qt_{{$box}}" style="border-bottom: 1px solid #e6e9ed;padding-bottom: 5px;">
                        <input type="hidden" name="sq_idx[]" value="{{ $row['EqsqIdx'] }}">
                        <div class="row mb-5 form-inline">
                            <label class="control-label col-md-1-1">질문 <span class="required">*</span></label>
                            <input type="text" class="form-control input-eqs-question" name="question_title_{{$box}}" title="답변항목" value="{{ $row['EqsqTitle'] }}">
                            <a href="javascript:void(0);" class="btn-delete-question" data-eqsq-idx="{{ $row['EqsqIdx'] }}" title="개별삭제"><i class="fa fa-times fa-lg red"></i></a>
                        </div>

                        <div class="row mb-5">
                            <label class="control-label col-md-1-1">보기 <span class="required">*</span></label>
                            <select class="form-control col-md-1-1 mr-5 btn-add-question-detail-box" name="question_cnt_{{$box}}" data-box-id="{{$box}}" title="갯수">
                                @for($i = 1; $i <= 5; $i++)
                                    <option value='{{ $i }}'
                                            @if(empty($row['EqsqdTotalcnt']) === false && $row['EqsqdTotalcnt'] == $i ) selected="selected" @endif
                                            @if(empty($row['EqsqdTotalcnt']) === false && $i < $row['EqsqdTotalcnt']) disabled style="background: #bfbfbf" @endif>{{ $i }}</option>
                                @endfor
                            </select>
                            @if(empty($data_detail[$row['EqsqIdx']]) === false)
                                @php $d_box=1; @endphp
                                @foreach($data_detail[$row['EqsqIdx']] as $d_key => $d_row)
                                    <input type="hidden" name="sqd_idx_{{$box}}[]" value="{{ $d_key }}">
                                    <div class="col-lg-offset-2 mb-5">
                                        <input type="text" class="form-control input-question-detail mr-5 @if($d_box > 1) ml-5 @endif" name="question_detail_title_{{$box}}[]" title="보기" value="{{ $d_row['EqsqdQuestion'] }}">
                                        정답
                                        <input type="checkbox" name="question_detail_is_answer_{{$box}}[]" value="{{ $d_row['DetailRowNum'] }}" @if($d_row['IsWrong'] == "Y") checked="checked" @endif>
                                        <a href="javascript:void(0);" class="btn-delete-detail" data-box-id="{{ $box }}" data-eqsq-idx="{{ $row['EqsqIdx'] }}" data-eqsqd-idx="{{ $d_key }}" title="개별보기삭제"><i class="fa fa-times fa-lg red"></i></a>
                                    </div>
                                    @php $d_box++; @endphp
                                @endforeach
                            @endif
                            <div class="mt-5 question_detail_html"></div>
                        </div>

                        <div class="row">
                            <label class="control-label col-md-1-1">해설 <span class="required">*</span></label>
                            <textarea class="form-control input-eqs-question" cols="70" rows="4" name="eqsq_explanation_{{$box}}" title="해설">{!! $row['EqsqExplanation'] !!}</textarea>
                        </div>
                    </div>
                    @php $box++; @endphp
                @endforeach
            @endif
            <div class="mb-20" id="question_html"></div>
        </div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1">등록자</label>
        <div class="col-md-4 form-control-static">{{ $data_quiz['RegAdminName'] or '' }}</div>
        <label class="control-label col-md-1-1">등록일</label>
        <div class="col-md-4 form-control-static">{{ $data_quiz['RegDatm'] or '' }}</div>
    </div>

    <div class="form-group form-group-sm">
        <label class="control-label col-md-1-1">최종 수정자</label>
        <div class="col-md-4 form-control-static">{{ $data_quiz['UpdAdminName'] or '' }}</div>
        <label class="control-label col-md-1-1">최종 수정일</label>
        <div class="col-md-4 form-control-static">{{ $data_quiz['UpdDatm'] or '' }}</div>
    </div>

    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            $(".btn-message-box").click(function () {
                $("#message_box").toggle();
            });

            //문제갯수 셋팅
            $_regi_form.on('change', '.btn-add-question-box', function() {
                var c = 0;
                var cnt = this.value;
                var count_question_data = $_regi_form.find('input[name="sq_idx[]"]').length;
                if (count_question_data <= 0) {
                    if (cnt == 1) {
                        $('.add-question-html').remove();
                    } else {
                        $('.add-question-html').remove();
                        for(var i=1; i<cnt; i++) {
                            var add_html = questionbox_html(i);
                            $('#question_html').append(add_html);
                        }
                    }
                } else {
                    c = cnt - count_question_data;
                    if (c == 0) {
                        $('.add-question-html').remove();
                    } else if (c < 0) {
                        alert('등록된 항목이 있습니다. 더이상 갯수를 줄일 수 없습니다.');
                        return false;
                    } else {
                        $('.add-question-html').remove();
                        for (var i = count_question_data; i < cnt; i++) {
                            var add_html = questionbox_html(i);
                            $('#question_html').append(add_html);
                        }
                    }
                }
            });

            //보기갯수 셋팅
            $_regi_form.on('change', '.btn-add-question-detail-box', function() {
                var c = 0;
                var cnt = this.value;
                var box_id = $(this).data('box-id');
                var count_detail_data = $_regi_form.find('input[name="sqd_idx_'+box_id+'[]"]').length;

                if (count_detail_data <= 0) {
                    if (cnt == 1) {
                        $('.add-question-detail-html-'+box_id).remove();
                    } else {
                        $('.add-question-detail-html-'+box_id).remove();
                        for(var i=1; i<cnt; i++) {
                            var add_html = questiondetailbox_html(box_id,i);
                            $("#qt_"+box_id).find('.question_detail_html').append(add_html);
                        }
                    }
                } else {
                    c = cnt - count_detail_data;
                    if (c == 0) {
                        $('.add-question-detail-html-'+box_id).remove();
                    } else if (c < 0) {
                        alert('등록된 항목이 있습니다. 더이상 갯수를 줄일 수 없습니다.');
                        return false;
                    } else {
                        $('.add-question-detail-html-'+box_id).remove();
                        for(var i=count_detail_data; i<cnt; i++) {
                            var add_html = questiondetailbox_html(box_id,i);
                            $("#qt_"+box_id).find('.question_detail_html').append(add_html);
                        }
                    }
                }
            });

            // ajax submit
            $_regi_form.submit(function() {
                var _url = '{{ site_url("/site/eventQuiz/quizSetStore") }}';

                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url("/site/eventQuiz/create/") }}' + ret.ret_data.idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            //개별항목삭제
            $_regi_form.on('click', '.btn-delete-question', function() {
                var _url = '{{ site_url("/site/eventQuiz/deleteQuestion") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'eqs_idx' : $_regi_form.find('input[name="eqs_idx"]').val(),
                    'eqsq_idx' : $(this).data('eqsq-idx')
                };
                if (!confirm('해당 항목을 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        var _replace_url = '{{ site_url('site/eventQuiz/quizSetCreateModal?') }}';
                        _replace_url += 'eq_idx='+$_regi_form.find('input[name=eq_idx]').val();
                        _replace_url += '&eqs_idx='+$_regi_form.find('input[name=eqs_idx]').val();
                        replaceModal(_replace_url,'');
                    }
                }, showError, false, 'POST');
            });

            //개별항목삭제
            $_regi_form.on('click', '.btn-delete-detail', function() {
                var q_cnt = $_regi_form.find('input[name="question_detail_title_'+$(this).data("box-id")+'[]"]').length;
                if (q_cnt <= 1) {
                    alert('보기는 최소 1개이상이여야 합니다.');
                    return false;
                }

                var _url = '{{ site_url("/site/eventQuiz/deleteDetail") }}';
                var data = {
                    '{{ csrf_token_name() }}' : $_regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'DELETE',
                    'eqsq_idx' : $(this).data('eqsq-idx'),
                    'eqsqd_idx' : $(this).data('eqsqd-idx')
                };
                if (!confirm('해당 항목을 삭제하시겠습니까?')) {
                    return;
                }
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        var _replace_url = '{{ site_url('site/eventQuiz/quizSetCreateModal?') }}';
                        _replace_url += 'eq_idx='+$_regi_form.find('input[name=eq_idx]').val();
                        _replace_url += '&eqs_idx='+$_regi_form.find('input[name=eqs_idx]').val();
                        replaceModal(_replace_url,'');
                    }
                }, showError, false, 'POST');
            });
        });

        function questionbox_html(num) {
            var add_html = '';
            add_html += '<div class="mb-30 add-question-html" id="qt_'+num+'">';
            add_html += '<div class="row mb-5">';
            add_html += '<label class="control-label col-md-1-1">질문 <span class="required">*</span></label>';
            add_html += '<input type="text" class="form-control input-eqs-question" name="question_title_'+num+'" title="답변항목" value="">';
            add_html += '</div>';
            add_html += '<div class="row mb-5">';
            add_html += '<label class="control-label col-md-1-1">보기 <span class="required">*</span></label>';
            add_html += '<select class="form-control col-md-1-1 mr-5 btn-add-question-detail-box" data-box-id="'+num+'" name="question_cnt_'+num+'" title="갯수">';
            add_html += '<option value="1">1</option>';
            add_html += '<option value="2">2</option>';
            add_html += '<option value="3">3</option>';
            add_html += '<option value="4">4</option>';
            add_html += '<option value="5">5</option>';
            add_html += '</select>';
            add_html += '<input type="text" class="form-control input-question-detail" name="question_detail_title_'+num+'[]" title="보기" value="">';
            add_html += '정답';
            add_html += '<input type="checkbox" name="question_detail_is_answer_'+num+'[]" value="1">';
            add_html += '<div class="mt-5 question_detail_html"></div>';
            add_html += '</div>';
            add_html += '<div class="row">';
            add_html += '<label class="control-label col-md-1-1">해설 <span class="required">*</span></label>';
            add_html += '<textarea class="form-control input-eqs-question" cols="70" rows="4" name="eqsq_explanation_'+num+'" title="해설"></textarea>';
            add_html += '</div>';
            add_html += '</div>';
            return add_html;
        }

        function questiondetailbox_html(box_id,num) {
            var answer_val = num + 1;
            var add_html = '';
            add_html += '<div class="col-lg-offset-2 mb-5 add-question-detail-html-'+box_id+'">';
            add_html += '<input type="text" class="form-control input-question-detail ml-5 mr-5" name="question_detail_title_'+box_id+'[]" title="보기" value="">';
            add_html += '정답';
            add_html += '<input type="checkbox" name="question_detail_is_answer_'+box_id+'[]" value="'+answer_val+'">';
            add_html += '</div>';
            return add_html;
        }
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">저장</button>
@endsection

@section('layer_footer')
    </form>
@endsection