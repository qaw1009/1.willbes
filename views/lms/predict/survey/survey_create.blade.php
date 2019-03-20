@extends('lcms.layouts.master')
@section('content')
    <h5>- 설문 문항을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        @if($method == 'update')
            <input type="hidden" name="idx" value="{{ $idx }}" />
        @endif
        {!! csrf_field() !!}
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
                    <label class="control-label col-md-1-1">제목 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">

                        <input type="text" id="SpTitle" name="SpTitle" style="width:80%; height:30px;" onKeyup='previewMake()' @if($method == 'update') value="{{ $data2['SpTitle'] }}" @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설명
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'update')
                            <textarea id="SpComment" name="SpComment" cols="50" rows="3" class="memoText" style="width:80%;">{{ $data2['SpComment'] }}</textarea>
                        @else
                            <textarea id="SpComment" name="SpComment" cols="50" rows="3" class="memoText" style="width:80%;"></textarea>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">설문기간 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 form-inline">
                        @if($method == 'update')
                            <input type="text" class="form-control datepicker" style="width:100px;" name="StartDate" value="{{ $data2['StartDate'] }}" readonly="" required="required" title="설문오픈일">
                            ~
                            <input type="text" class="form-control datepicker" style="width:100px;" name="EndDate" value="{{ $data2['EndDate'] }}" readonly="" required="required" title="설문오픈일">
                        @else
                            <input type="text" class="form-control datepicker" style="width:100px;" name="StartDate" value="" readonly="" required="required" title="설문오픈일">
                            ~
                            <input type="text" class="form-control datepicker" style="width:100px;" name="EndDate" value="" readonly="" required="required" title="설문오픈일">
                        @endif
                    </div>
                </div>



                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">문항세트 <span class="required">*</span></label>
                    <div class="col-md-8 item" style="border:1px solid gray; height:500px; overflow-y:auto;">
                        <input type="hidden" id="cartIn" style="width:100%;"/>
                        <table border=1 cellspacing="1" cellpadding="5" class="lecTable" style="width:100%; margin-top:5px; text-align: center;">
                            <colgroup>
                                <col style="width: 10%;">
                                <col style="width: 20%;">
                                <col style="width: 70%;">
                            </colgroup>
                            <tbody>
                            <tr>
                                <th style="text-align: center;">선택</th>
                                <th style="text-align: center;">세트명</th>
                                <th style="text-align: center;">설명</th>
                            </tr>
                            @foreach($data as $key => $val)
                                @if($method == 'update')
                                    <tr>
                                        <td>
                                            <label class="label_radio" for="radio-01">
                                                <input name="SqsIdx" id="SqsIdx" value="{{ $val['SqsIdx'] }}" type="radio" style="width:16px; height:16px;" @if($val['SqsIdx'] == $data2['SqsIdx']) checked @endif />
                                            </label>
                                        </td>
                                        <td><div id='title{{ $val['SqsIdx'] }}' style="margin-top:5px;">{{ $val['SqsTitle'] }}</div></td>
                                        <td><div id='cnt{{ $val['SqsIdx'] }}' style="margin-top:5px;">{{ $val['SqsComment'] }}</div></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>
                                            <label class="label_radio" for="radio-01">
                                                <input name="SqsIdx" id="SqsIdx" value="{{ $val['SqsIdx'] }}" type="radio" style="width:16px; height:16px;" />
                                            </label>
                                        </td>
                                        <td><div id='title{{ $val['SqsIdx'] }}' style="margin-top:5px;">{{ $val['SqsTitle'] }}</div></td>
                                        <td><div id='cnt{{ $val['SqsIdx'] }}' style="margin-top:5px;">{{ $val['SqsComment'] }}</div></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_use_y">사용여부 <span class="required">*</span></label>
                    <div class="col-md-10 item">

                        @if($method == 'update')
                            <select id="SpUseYn" name="SpUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y" @if($data2['SpUseYn'] == "Y") selected="selected" @endif>사용</option>
                                <option value="N" @if($data2['SpUseYn'] == "N") selected="selected" @endif>미사용</option>
                            </select>
                        @else
                            <select id="SpUseYn" name="SpUseYn" title="Type" class="seleProcess f_left">
                                <option value="Y">사용</option>
                                <option value="N">미사용</option>
                            </select>
                        @endif
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
        var method = '{{ $method }}';

        // 목록 이동
        $('#goList').on('click', function() {
            location.replace('{{ site_url('/predict/survey/addsurvey') }}' + getQueryString());
        });

        // 등록,수정
        $regi_form.submit(function() {
            var _url = '{{ ($method == 'update') ? site_url('/predict/survey/updateSurvey') : site_url('/predict/survey/storeSurvey') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    location.replace('{{ site_url('/predict/survey/addsurvey') }}' + getQueryString());
                }
            }, showValidateError, null, false, 'alert');
        });
    </script>
@stop