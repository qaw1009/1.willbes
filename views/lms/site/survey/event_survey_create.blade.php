@extends('lcms.layouts.master')
@section('content')
    <h5>- 설문을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="sp_idx" value="{{ $survey_data['SsIdx'] or '' }}" />
        <input type="hidden" id="series_idx" name="series_idx" value="{{ $survey_data['seriesIdx'] or '' }}" />

        <div class="x_panel">
            <div class="x_title">
                <h2>설문등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다. <br>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="site_code">운영사이트<span class="required">*</span></label>
                    <div class="form-inline col-md-4 item">
                        {!! html_site_select(empty($survey_data['SiteCode']) ? '' : $survey_data['SiteCode'], 'site_code', 'site_code', '', '운영 사이트', 'required', '', true) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="sp_title">제목 <span class="required">*</span></label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="sp_title" name="sp_title" maxlength="100" title="제목" required="required" value="{{ $survey_data['SurveyTitle'] or ''}}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설명</label>
                    <div class="col-md-9">
                        <textarea class="form-control" id="sp_comment" name="sp_comment" cols="50" rows="3" title="설명">{{ $survey_data['SurveyComment'] or ''}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="sp_is_duplicate">중복투표 <span class="required">*</span></label>
                    <div class="col-md-9">
                        <div class="radio">
                            <input type="radio" class="flat" id="sp_is_duplicate_n" name="sp_is_duplicate" required="required" value="N"
                                   @if($method == 'POST' || (empty($survey_data['IsDuplicate']) === false && $survey_data['IsDuplicate']=='N'))checked="checked"@endif>
                            <label for="sp_is_duplicate_n" class="input-label">불가능</label>
                            <input type="radio" class="flat" id="sp_is_duplicate_y" name="sp_is_duplicate" required="required" value="Y"
                                   @if(empty($survey_data['IsDuplicate']) === false && $survey_data['IsDuplicate']=='Y')checked="checked"@endif>
                            <label for="sp_is_duplicate_y" class="input-label">가능</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="sp_is_use">사용여부 <span class="required">*</span></label>
                    <div class="col-md-9">
                        <div class="radio">
                            <input type="radio" class="flat" id="sp_is_use_y" name="sp_is_use" title="사용여부" required="required" value="Y"
                                   @if($method == 'POST' || (empty($survey_data['SurveyIsUse']) === false && $survey_data['SurveyIsUse']=='Y'))checked="checked"@endif>
                            <label for="sp_is_use_y" class="input-label">사용</label>
                            <input type="radio" class="flat" id="sp_is_use_n" name="sp_is_use" required="required" value="N"
                                   @if(empty($survey_data['SurveyIsUse']) === false && $survey_data['SurveyIsUse']=='N')checked="checked"@endif>
                            <label for="sp_is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설문기간 <span class="required">*</span></label>
                    <div class="col-md-9 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_start_datm" name="register_start_datm" value="@if(empty($survey_data['StartDate']) === false) {{substr($survey_data['StartDate'],0,10)}} @endif">
                        </div>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control datepicker" id="register_end_datm" name="register_end_datm" value="@if(empty($survey_data['EndDate']) === false) {{substr($survey_data['EndDate'],0,10)}} @endif">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-md-1-1 ml-10">설문항목관리 <span class="required">*</span></label>
                        <div class="col-md-9 mb-5">
                            @if($method == 'PUT')
                                <span clss="clearfix" style="color: red; position: relative; top:6px">* 응시직렬은 응시직렬 항목 등록 후 저장된 응시직렬 항목에 따라 그룹선택이 노출 됩니다.</span>
                                <div class="clearfix-r">
                                    <button type="button" class="btn-sm btn-danger border-radius-reset mr-5 btn_sort_use"><i class="fa fa-copy mr-10"></i>정렬/사용 적용</button>
                                    <button type="button" class="btn-sm btn-primary border-radius-reset add_question mr-15" data-id="add_question" data-sp-idx="{{$survey_data['SsIdx']}}" data-sq-series="{{$survey_data['SqJsonData'] or ''}}" onclick="show_question_layer(this)"><i class="fa fa-pencil mr-10"></i>설문항목등록</button>
                                </div>
                            @else
                                # 설문 저장 후 <span style="color: red"> [설문항목등록] </span> 버튼이 생성됩니다.
                            @endif
                        </div>
                    </div>

                    <label class="control-label col-md-1-1"></label>
                    <div class="col-md-9 form-inline">
                        <table class="table table-striped table-bordered">
                            <colgroup>
                                <col width="4%">
                                <col width="10%">
                                <col width="18%">
                                <col width="5%">
                                <col width="48%">
                                <col width="5%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th class="text-center">정렬순서</th>
                                <th class="text-center">직렬그룹</th>
                                <th class="text-center">문항제목</th>
                                <th class="text-center">답변유형</th>
                                <th class="text-center">답변항목</th>
                                <th class="text-center">사용유무</th>
                                <th class="text-center">수정/삭제</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($question_data as $row)
                                <tr>
                                    <td class="text-center"><input type="number" name="sq_order_num" value="{{$row['OrderNum']}}" data-origin-order-num="{{$row['OrderNum']}}" data-sq-idx= "{{$row['SsqIdx']}}" maxlength="3" style="width: 100%"></td>
                                    <td>
                                        @if(empty($row['SeriesData']) === false)
                                            @foreach($row['SeriesData'] as $series)
                                                [{{$series}}]<br/>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{$row['SqTitle']}}</td>
                                    <td class="text-center">{{$row['SqTypeTxt']}}</td>
                                    <td>
                                        <p><strong>{{$row['SqComment']}}</strong></p>
                                        @foreach($row['SqJsonData'] as $key => $val)
                                            <p>
                                                @if($row['SqType'] != 'S') {{--선택형(단일)--}}
                                                    항목{{$key}}. <strong>{{$val['title']}} </strong>
                                                @endif

                                                @if(empty($val['item']) === false)
                                                    @if($row['SqType'] != 'S') => @endif
                                                    @foreach($val['item'] as $k => $v)
                                                        {{$k}}. {{$v}},
                                                    @endforeach
                                                    <br/>
                                                @endif
                                            </p>
                                        @endforeach
                                    </td>
                                    <td class="text-center"><input type="checkbox" name="sq_is_use" value="Y" class="flat" data-origin-is-use="{{$row['SqIsUse']}}" @if($row['SqIsUse'] == 'Y') checked="checked" @endif></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-success btn-modify mb-10" data-id="btn-modify" data-sp-idx="{{$row['SsIdx']}}" data-sq-idx="{{$row['SsqIdx']}}" data-sq-series="{{$survey_data['SqJsonData'] or ''}}" onclick="show_question_layer(this)">수정</button>
                                        <button type="button" class="btn btn-danger btn-delete mb-10" data-idx="{{$row['SsqIdx']}}" onclick="delete_survey_question(this)">삭제</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">등록자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $survey_data['RegAdminName'] or '' }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">등록일</label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $survey_data['RegDatm'] or '' }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자</label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $survey_data['UpdAdminName'] or '' }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일</label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $survey_data['UpdDatm'] or '' }}</p>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="goList">목록</button>
                </div>
            </div>

        </div>
    </form>

    <script>
        var $regi_form = $('#regi_form');

        // 정렬/사용유무 적용
        $('.btn_sort_use').on('click', function() {
            if (!confirm('정렬/사용 상태를 적용하시겠습니까?')) {
                return;
            }

            var $order_num = $regi_form.find('input[name="sq_order_num"]');
            var $is_use = $regi_form.find('input[name="sq_is_use"]');
            var origin_val, this_val, this_order_val, this_use_val;
            var $params = {};
            var _url = '{{ site_url("/site/survey/storeUseOrderNum") }}';

            $order_num.each(function(idx) {
                // 신규 또는 추천 값이 변하는 경우에만 파라미터 설정
                this_order_val = $(this).data('origin-order-num');
                this_use_val = $is_use.eq(idx).filter(':checked').val() || 'N';
                this_val = this_order_val + ':' + this_use_val;
                origin_val = $(this).val() + ':' + $is_use.eq(idx).data('origin-is-use');
                if (this_val != origin_val) {
                    $params[$(this).data('sq-idx')] = { 'sq_order_num' : $(this).val(), 'sq_is_use' : this_use_val };
                }
            });

            if (Object.keys($params).length < 1) {
                alert('변경된 내용이 없습니다.');
                return;
            }

            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'params' : JSON.stringify($params)
            };

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        });

        // ajax submit
        $regi_form.submit(function() {
            var _url = '{{ site_url("/site/survey/eventSurveyStore") }}' + getQueryString();

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url("/site/survey/eventSurveyCreate/") }}' + ret.ret_data.idx + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });

        // 설문항목 등록/수정 모달창 오픈
        function show_question_layer(obj){
            var obj_id = $(obj).data("id");

            $("." + obj_id).setLayer({
                'url' : '{{ site_url('/site/survey/questionCreateModal') }}',
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'sp_idx', 'name' : '설문 식별자', 'value' : $(obj).data("sp-idx"), 'required' : true },
                    { 'id' : 'sq_idx', 'name' : '설문문항 식별자', 'value' : $(obj).data("sq-idx"), 'required' : false},
                    { 'id' : 'series_idx', 'name' : '응시직렬 식별자', 'value' : $("#series_idx").val(), 'required' : false},
                    { 'id' : 'series_data', 'name' : '응시직렬', 'value' : $(obj).data("sq-series"), 'required' : false},
                ],
                'width' : 900
            });
        }

        // 설문항목 삭제
        function delete_survey_question(obj){
            var _url = '{{ site_url("/site/survey/delSurveyQuestion") }}' + getQueryString();
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE',
                'sq_idx' : $(obj).data('idx')
            };

            if (!confirm('설문항목을 삭제하시겠습니까?')) {
                return;
            }

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.reload();
                }
            }, showError, false, 'POST');
        }

        // 목록 이동
        $('#goList').click(function() {
            location.replace('{{ site_url('/site/survey/index') }}');
        });
    </script>
@stop