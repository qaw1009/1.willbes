@extends('lcms.layouts.master_modal')

@section('layer_title')
    설문조사 항목 등록
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="SsIdx" value="{{ $ss_idx }}"/>
        <input type="hidden" name="ssq_idx" value="{{ $sq_data['SsqIdx'] or ''}}"/>
        @endsection

        @section('layer_content')
            <div class="x_title text-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            {!! form_errors() !!}

            @if(empty($sq_data['SsqIdx']) === false && $sq_data['SsqIdx'] == $series_idx)
                <input type="hidden" name="is_series" value="{{ $sq_data['IsSeries'] }}">
            @elseif(($method == 'POST' && empty($series_idx) === true) )
                <div class="form-group form-group-sm">
                    <label class="control-label col-md-1-1" for="is_series">응시직렬 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <div class="radio">
                            <input type="radio" class="flat" id="is_series_y" name="is_series" title="사용여부" required="required" value="Y"
                                   @if(empty($sq_data['IsSeries']) === false && $sq_data['IsSeries']=='Y')checked="checked"@endif/>
                            <label for="is_series_y" class="input-label">사용</label>
                            <input type="radio" class="flat" id="is_series_n" name="is_series" required="required" value="N"
                                   @if($method == 'POST' || (empty($sq_data['IsSeries']) === false && $sq_data['IsSeries']=='N'))checked="checked"@endif/>
                            <label for="is_series_n" class="input-label">미사용</label>
                        </div>
                        <span style="color: red">* 응시직렬 사용시 답변유형은 선택형(단일)로 선택해주세요.</span>
                    </div>
                </div>
            @elseif(empty($sq_data['SsqIdx']) === true || (empty($series_idx) === false && empty($sq_data['SsqIdx']) === false && $series_idx != $sq_data['SsqIdx']))
                <div class="form-group form-group-sm">
                    <label class="control-label col-md-1-1" for="is_series">그룹선택 <span class="required">*</span></label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            @if(empty($series_data) === false)
                                @foreach($series_data[1]['item'] as $key => $val)
                                    <input type="checkbox" name="sq_series[]" class="flat" id="sq_series_{{$key}}" title="응시직렬" required="required" value="{{$val}}"
                                           @if(empty($sq_data['SeriesData']) === false && in_array($val, $sq_data['SeriesData']) === true)checked="checked"@endif/>
                                    <label class="inline-block mr-5 pl-5" for="sq_series_{{$key}}">{{$val}}</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="sq_title">문항제목 <span class="required">*</span></label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="sq_title" name="sq_title" title="문항제목" required="required" value="{{ $sq_data['SqTitle'] or ''}}">
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="sq_comment">문항설명</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="sq_comment" name="sq_comment" rows="3" title="문항설명" placeholder="">{{ $sq_data['SqComment'] or ''}}</textarea>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="sq_is_use">사용여부 <span class="required">*</span></label>
                <div class="col-md-10">
                    <div class="radio">
                        <input type="radio" class="flat" id="sq_is_use_y" name="sq_is_use" title="사용여부" required="required" value="Y"
                               @if($method == 'POST' || (empty($sq_data['IsUse']) === false && $sq_data['IsUse']=='Y'))checked="checked"@endif/>
                        <label for="sq_is_use_y" class="input-label">사용</label>
                        <input type="radio" class="flat" id="sq_is_use_n" name="sq_is_use" required="required" value="N"
                               @if(empty($sq_data['IsUse']) === false && $sq_data['IsUse']=='N')checked="checked"@endif/>
                        <label for="sq_is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="order_num">정렬순서</label>
                <div class="col-md-1 item">
                    <input type="number" class="form-control" id="order_num" name="order_num" title="정렬순서" value="{{$sq_data['OrderNum'] or '0' }}">
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1" for="sq_type">답변유형 <span class="required">*</span></label>
                <div class="col-md-10 form-inline">
                    유형설명 - 선택형단일(단일선택 객관식), 선택형그룹(단일선택 그룹핑), 복수형(다중선택 객관식)<br/>
                    <select class="form-control" id="sq_type" name="sq_type" title="답변유형" required="required" onchange="sel_question_type();">
                        <option value="">-유형선택-</option>
                        @foreach($arr_type as $type => $txt)
                            <option value="{{$type}}" @if(empty($sq_data['SqType']) === false && $sq_data['SqType'] == $type) selected="selected" @endif>{{$txt}}</option>
                        @endforeach
                    </select><br/>
                    <span style="color:red;">* 선택형(그룹)과 복수형은 항목 갯수 선택시 자동으로 입력됩니다.</span><br/>자동 입력(1.매우쉬움, 2.쉬움, 3.보통, 4.어려움, 5.매우어려움)
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline hide">
                <label class="control-label col-md-1-1" for="sq_cnt">항목갯수 <span class="required">*</span></label>
                <div class="col-md-1 item">
                    <select class="form-control" id="sq_cnt" name="sq_cnt" title="항목갯수" required="required" onchange="sel_question_type();">
                        @for($i = 1; $i <= $sq_cnt; $i++)
                            <option value='{{ $i }}' @if(empty($sq_data['SqCnt']) === false && $sq_data['SqCnt'] == $i ) selected="selected" @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="col-md-1"></div>

                <div id="sq_subject_box" class="hide">
                    <label class="control-label col-md-2">응시과목 선택 갯수(복수형 전용)</label>
                    <div class="col-md-1 item">
                        <select class="form-control" id="sq_subject_cnt" name="sq_subject_cnt">
                            @for($i = 1; $i <= $sq_cnt; $i++)
                                <option value='{{ $i }}' @if(empty($sq_data['SqSubjectCnt']) === false && $sq_data['SqSubjectCnt'] == $i ) selected="selected" @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group form-group-sm form-group-inline hide" id="question_item">
                <label class="control-label col-md-1-1">답변항목 <span class="required">*</span></label>
                <div class="col-md-10 form-inline mb-10">
                    @for($i=1; $i <= $sq_cnt; $i++)
                        <div id="sq{{ $i }}" class="mb-5 hide">
                            <label class="control-label col-md-1-1" for="sq_question_title[{{$i}}]">항목 {{ $i }} <span class="required">*</span></label>

                            <select id="t{{ $i }}" class="form-control col-md-1-1 hide mr-5" name="sq_item_cnt[{{ $i }}]" title="갯수" onchange="sel_question_item('{{ $i }}',this.value);">
                                @for($j = 1; $j <= $sq_item_cnt; $j++)
                                    <option value='{{ $j }}' @if(empty($sq_data['SqJsonData'][$i]['item_cnt']) === false && $sq_data['SqJsonData'][$i]['item_cnt'] == $j ) selected="selected" @endif>{{ $j }}</option>
                                @endfor
                            </select>

                            <input type="text" class="form-control sq_question" name="sq_question_title[{{$i}}]" title="답변항목 {{ $i }}" required="required" value="@if(empty($sq_data['SqType']) === false && $sq_data['SqType'] == 'S'){{$sq_data['SqJsonData'][1]['item'][$i] or ''}}@else{{ $sq_data['SqJsonData'][$i]['title'] or ''}}@endif">
                        </div>

                        <div class="t{{ $i }} mb-10 hide">
                            @for($j=1; $j <= $sq_item_cnt; $j++)
                                <div class="mb-10 tt{{ $j }} hide">
                                    <label class="control-label col-md-offset-2 col-md-1" for="sq_question_item[{{$i}}][{{$j}}]" style="text-align: right">{{ $j }}. <span class="required">*</span></label>
                                    <input type="text" class="form-control sq_question_item" name="sq_question_item[{{$i}}][{{$j}}]" title="항목{{ $j }}" required="required" value="{{ $sq_data['SqJsonData'][$i]['item'][$j] or ''}}">
                                </div>
                            @endfor
                        </div>

                        <div id="d{{ $i }}" class="mb-10 hide">
                            <label class="control-label col-md-1-1">내용 {{ $i }}</label>
                            <textarea class="form-control sq_question" disabled="disabled" cols="70" rows="4"></textarea>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">등록자</label>
                <div class="col-md-4 form-control-static">{{ $sq_data['RegAdminName'] or '' }}</div>
                <label class="control-label col-md-1-1">등록일</label>
                <div class="col-md-4 form-control-static">{{ $sq_data['RegDatm'] or '' }}</div>
            </div>

            <div class="form-group form-group-sm">
                <label class="control-label col-md-1-1">최종 수정자</label>
                <div class="col-md-4 form-control-static">{{ $sq_data['UpdAdminName'] or '' }}</div>
                <label class="control-label col-md-1-1">최종 수정일</label>
                <div class="col-md-4 form-control-static">{{ $sq_data['UpdDatm'] or '' }}</div>
            </div>

            <script type="text/javascript">

            </script>
        @stop

        @section('add_buttons')
            <button type="submit" class="btn btn-success">저장</button>
        @endsection

        @section('layer_footer')
    </form>

    <style>
        #question_item .sq_question { width: 540px;}
        #question_item .sq_question_item { width: 500px;}
    </style>

    <script>
        var $_regi_form = $('#_regi_form');
        var sq_cnt = {{ $sq_cnt }};
        var sq_item_cnt = {{ $sq_item_cnt }};
        var method = '{{ $method }}';

        $( document ).ready( function() {
            if(method == 'PUT'){
                sel_question_type();
            }
        });

        // ajax submit
        $_regi_form.submit(function() {
            var _url = '{{ site_url("/site/survey/surveyQuestionStore") }}' + getQueryString();

            ajaxSubmit($_regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url("/site/survey/eventSurveyCreate/") }}' + ret.ret_data.ss_idx + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });

        // 답변유형,항목갯수 선택
        function sel_question_type() {
            if($(".form-group-inline").hasClass("hide") === true){
                $(".form-group-inline").removeClass("hide");
            }

            question_reset();

            var sel_cnt = $("#sq_cnt option:selected").val();
            var sel_type = $("#sq_type option:selected").val();

            if(sel_type == 'T'){ // 응시과목 선택 갯수
                $("#sq_subject_box").removeClass("hide");
            }

            if(sel_type == 'T' || sel_type == 'M'){ // 복수형, 선택형(그룹)
                add_question_t_type(sel_cnt);
            }else{// 선택형(단일), 서술형
                add_question(sel_cnt,sel_type);
            }
        }

        // 선택형(단일), 서술형
        function add_question(sel_cnt,sel_type) {
            for(var i = 1; i <= sel_cnt; i++){
                $('#sq' + i).removeClass("hide");
                if(sel_type == "D"){
                    $('#d' + i).removeClass("hide");
                }
            }
        }

        // 복수형, 선택형(그룹)
        function add_question_t_type(sel_cnt) {
            for(var i = 1; i <= sel_cnt; i++){
                $('#sq' + i).removeClass("hide");
                $('#t' + i).removeClass("hide").attr("disabled",false);
                $('.t' + i).removeClass("hide");

                var sel_item_cnt = $("#t" + i + " option:selected").val();

                for(var j=1; j<=sel_item_cnt; j++){
                    $('.t' + i).find('.tt' + j).removeClass("hide");
                }
            }
        }

        // 복수형, 선택형(그룹) 갯수 선택
        function sel_question_item(sel_point,sel_item_cnt) {
            // 디폴트 입력값
            var _obj = {1:'매우쉬움',2:'쉬움',3:'보통',4:'어려움',5:'매우어려움'};
            var _auto = true;

            for(var j=1; j<=sel_item_cnt; j++){
                $('.t' + sel_point).find('.tt' + j).removeClass("hide");

                if(_auto === true){
                    if(!$.trim($('.t' + sel_point).find('.tt' + j).find('input').val())){
                        $('.t' + sel_point).find('.tt' + j).find('input').val(_obj[j]);
                    }else{
                        _auto = false;
                    }
                }
            }

            sel_item_cnt++;

            for(var i = sel_item_cnt; i <= sq_item_cnt; i++){
                $('.t' + sel_point).find('.tt' + i).addClass("hide");

            }
        }

        // 답변항목 초기화
        function question_reset() {
            for(var i = 1; i <= sq_cnt; i++){
                $('#sq' + i).addClass("hide");
                $('#d' + i).addClass("hide");
                $('#t' + i).addClass("hide").attr("disabled",true);
                $('.t' + i).addClass("hide");
            }
            $("#sq_subject_box").addClass("hide");
        }
    </script>
@endsection