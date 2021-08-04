@extends('lcms.layouts.master_modal')

@section('layer_title')
    퀴즈 질문 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="eq_idx" value="{{ $eq_idx }}"/>
        <input type="hidden" name="eqs_idx" value="{{ $eqs_data[0]['EqsIdx'] or ''}}"/>
        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="eqs_group_title">문제(그룹)명 <span class="required">*</span></label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="eqs_group_title" name="eqs_group_title" title="문제(그룹)명" required="required" value="{{ $eqs_data[0]['EqsGroupTitle'] or '' }}">
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="order_num">정렬순서 <span class="required">*</span></label>
                <div class="col-md-4 item">
                    <input type="number" class="form-control" id="order_num" name="order_num" title="정렬순서" value="{{$eqs_data[0]['OrderNum'] or '0' }}" style="width: 120px">
                </div>

                <label class="control-label col-md-1-1" for="eqs_is_use">사용여부 <span class="required">*</span></label>
                <div class="col-md-4 item">
                    <div class="radio">
                        <input type="radio" class="flat" id="eqs_is_use_y" name="eqs_is_use" title="사용여부" required="required" value="Y"
                               @if(empty($eqs_data[0]['IsUse']) === false && $eqs_data[0]['IsUse']=='Y')checked="checked"@endif/>
                        <label for="eqs_is_use_y" class="input-label">사용</label>
                        <input type="radio" class="flat" id="eqs_is_use_n" name="eqs_is_use" required="required" value="N"
                               @if($method == 'POST' || (empty($eqs_data[0]['IsUse']) === false && $eqs_data[0]['IsUse']=='N'))checked="checked"@endif/>
                        <label for="eqs_is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="eqs_start_day">노출기간<span class="required">*</span></label>
                <div class="col-md-10 form-inline">
                    <div class="input-group mb-0">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control datepicker" id="eqs_start_day" name="eqs_start_day" value="{{ $eqs_data[0]['EqsStartDay'] or ''}}" style="height: 32px">

                        <div class="input-group-btn">
                            <select class="form-control ml-5" id="eqs_start_hour" name="eqs_start_hour" style="width: 45px">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $eqs_data[0]['EqsStartHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                            <select class="form-control" id="eqs_start_min" name="eqs_start_min" style="width: 45px">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $eqs_data[0]['EqsStartMin']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                        </div>

                        <div class="input-group-addon no-border no-bgcolor">~</div>

                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control datepicker" id="eqs_end_day" name="eqs_end_day" value="{{ $eqs_data[0]['EqsEndDay'] or ''}}" style="height: 32px">

                        <div class="input-group-btn">
                            <select class="form-control ml-5" id="eqs_end_hour" name="eqs_end_hour" style="width: 45px">
                                @php
                                    for($i=0; $i<=23; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $eqs_data[0]['EqsEndHour']) ? "selected='selected'" : "";
                                        echo "<option value='{$str}{$i}' {$selected}>{$str}{$i}</option>";
                                    }
                                @endphp
                            </select>
                            <select class="form-control" id="eqs_end_min" name="eqs_end_min" style="width: 45px">
                                @php
                                    for($i=0; $i<=59; $i++) {
                                        $str = (strlen($i) <= 1) ? '0' : '';
                                        $selected = ($i == $eqs_data[0]['EqsEndMin']) ? "selected='selected'" : "";
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
                <div class="col-md-10 form-inline">
                    <select class="form-control" id="eqs_type" name="eqs_type" title="문제유형" required="required" style="width: 120px">
                        <option value="">-유형선택-</option>
                        @foreach($arr_sel_type as $key => $val)
                            <option value="{{$key}}" @if((empty($eqs_data[0]['EqsType']) === false && $eqs_data[0]['EqsType'] == $key) || ($method == 'POST' && $key == 'S')) selected="selected" @endif>{{ $val }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline">
                <label class="control-label col-md-1-1" for="eqs_total_cnt">문제갯수 <span class="required">*</span></label>
                <div class="col-md-1 item">
                    <select class="form-control" id="eqs_total_cnt" name="eqs_total_cnt" title="문제갯수" required="required" onchange="sel_question_cnt(this.value);" style="width: 120px">
                        @for($i = 1; $i <= $eqs_total_cnt; $i++)
                            <option value='{{ $i }}' @if(empty($eqs_data[0]['EqsqTotalCnt']) === false && $eqs_data[0]['EqsqTotalCnt'] == $i ) selected="selected" @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline" id="question_item">
                <label class="control-label col-md-1-1">답변항목 <span class="required">*</span></label>
                <div class="col-md-10 form-inline">
                    @for($i=1; $i <= $eqs_total_cnt; $i++)
                        <div id="eqs{{ $i }}" class="hide mb-20">
                            <div class="row mb-5">
                                <label class="control-label col-md-1-1" for="eqss_question_title[{{$i}}]">질문 {{ $i }} <span class="required">*</span></label>
                                <input type="text" class="form-control eqs_question" name="eqsq_question_title[{{$i}}]" title="답변항목 {{ $i }}" required="required" value="{{ $eqs_detail_data[$i][1]['EqsqTitle'] or '' }}">
                            </div>

                            <div class="row mb-5">
                                @for($j=1; $j <= $eqs_item_cnt; $j++)
                                    @if($j === 1)
                                        <label class="control-label col-md-1-1" for="eqsq_question_cnt[{{$i}}]">보기 {{ $i }} <span class="required">*</span></label>
                                        <select class="form-control col-md-1-1 mr-5" id="eqsq_question_item_{{$i}}" name="eqsq_question_cnt[{{ $i }}]" title="갯수" onchange="sel_question_item_cnt({{ $i }}, this.value);" >
                                            @for($jj = 1; $jj <= $eqs_item_cnt; $jj++)
                                                <option value='{{ $jj }}' @if(empty($eqs_detail_data[$i][$j]['EqsqdTotalcnt']) === false && $eqs_detail_data[$i][$j]['EqsqdTotalcnt'] == $jj) selected="selected" @endif>{{ $jj }}</option>
                                            @endfor
                                        </select>
                                    @else
                                        <div class="form-control col-md-2" style="width: 134px; border: none"></div>
                                    @endif
                                    <div class="mb-10 eqsq_question_{{$i}} eqsq_question_{{$i}}_{{$j}} @if($j > 1) hide @endif">
                                        <input type="text" class="form-control eqs_question_item" name="eqsq_question[{{$i}}][{{$j}}]" title="보기{{ $j }}" required="required" value="{{ $eqs_detail_data[$i][$j]['EqsqdQuestion'] or ''  }}">
                                        정답
                                        <input type="checkbox" class="flat eqs_question_answer" name="eqsq_is_answer[{{$i}}][{{$j}}]" value="{{$j}}" @if(empty($eqs_detail_data[$i][$j]) === false && $eqs_detail_data[$i][$j]['IsAnswer'] == 'Y')checked="checked"@endif>
                                        @if($j > 1)
                                            <a href="#none" class="btn-item-delete"><i class="fa fa-times fa-lg red" onclick="reset_quiz_question({{$i}}, {{$j}});"></i></a>
                                        @endif
                                    </div>
                                @endfor
                            </div>

                            <div class="row">
                                <label class="control-label col-md-1-1">해설 {{ $i }} <span class="required">*</span></label>
                                <textarea class="form-control eqs_question" cols="70" rows="4" name="eqsq_explanation[{{$i}}]" title="해설{{ $i }}" required="required">{{ $eqs_detail_data[$i][1]['EqsqExplanation'] or '' }}</textarea>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">등록자</label>
                <div class="col-md-4 form-control-static">{{ $eqs_data[0]['RegAdminName'] or '' }}</div>
                <label class="control-label col-md-1-1">등록일</label>
                <div class="col-md-4 form-control-static">{{ $eqs_data[0]['RegDatm'] or '' }}</div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">최종 수정자</label>
                <div class="col-md-4 form-control-static">{{ $eqs_data[0]['UpdAdminName'] or '' }}</div>
                <label class="control-label col-md-1-1">최종 수정일</label>
                <div class="col-md-4 form-control-static">{{ $eqs_data[0]['UpdDatm'] or '' }}</div>
            </div>

        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>

    <style>
        #question_item .eqs_question { width: 600px;}
        #question_item .eqs_question_item { width: 490px;}
    </style>

    <script>
        var $_regi_form = $('#_regi_form');
        var eqs_total_cnt = {{ $eqs_total_cnt }};
        var eqs_item_cnt = {{ $eqs_item_cnt }};
        var method = '{{ $method }}';

        $( document ).ready( function() {
            var _eqs_total_cnt = {{ empty($eqs_data[0]['EqsqTotalCnt']) === false ? $eqs_data[0]['EqsqTotalCnt'] : 1 }};

            sel_question_cnt(_eqs_total_cnt);
        });

        // ajax submit
        $_regi_form.submit(function() {
            var _url = '{{ site_url("/site/eventQuiz/quizSetStore") }}' + getQueryString();

            ajaxSubmit($_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url("/site/eventQuiz/create/") }}' + ret.ret_data.idx + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });

        // 질문 갯수 선택
        function sel_question_cnt(sel_cnt) {
            for(var i = 1; i <= eqs_total_cnt; i++){
                $('#eqs' + i).addClass("hide");
            }

            for(var j = 1; j <= sel_cnt; j++){
                $('#eqs' + j).removeClass("hide");
            }

            // 보기 갯수 자동 셋팅
            for(var k = 1; k <= sel_cnt; k++){
                var sel_item_cnt = $("#eqsq_question_item_" + k + " option:selected").val();

                for(var kk = 1; kk <= sel_item_cnt; kk++){
                    $('.eqsq_question_' + k + '_' + kk).removeClass("hide");
                }
            }

        }

        // 보기 갯수 선택
        function sel_question_item_cnt(sel_line, sel_item_cnt) {
            sel_line = parseInt(sel_line) || 1;
            sel_item_cnt = parseInt(sel_item_cnt) || 1;

            var temp_item_cnt = sel_item_cnt + 1;

            // 초기화
            $('.eqsq_question_' + sel_line).addClass("hide")

            for(var j = temp_item_cnt; j <= eqs_item_cnt; j++){
                reset_quiz_question(sel_line, temp_item_cnt);
            }

            for(var i = 1; i <= sel_item_cnt; i++){
                $('.eqsq_question_' + sel_line + '_' + i).removeClass("hide");
            }
        }

        // 퀴즈 항목 초기화
        function reset_quiz_question(item_line, item_num){
            $('.eqsq_question_' + item_line + '_' + item_num).find('.eqs_question_item').val("");
            $('.eqsq_question_' + item_line + '_' + item_num).find('.eqs_question_answer').iCheck('uncheck');
        }
    </script>
@endsection