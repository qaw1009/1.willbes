@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 노출건수를 관리할 수 있습니다.</h5>
    {!! form_errors() !!}
    @foreach($arr_data as $key => $data)
        <form class="form-horizontal" id="regi_form_type_{{$key}}" name="regi_form_type_{{$key}}" method="POST" onsubmit="return false;">
            {!! csrf_field() !!}
            <input type="hidden" name="type" value="{{ $key }}">
            <input type="hidden" name="idx" value="{{ $data['cnt_idx'] }}">

            <div class="x_panel">
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-1-1" for="">사전예약<br>서비스 이용현황</label>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label class="control-label col-md-2" for="predict_idx">합격예측기본데이터<span class="required">*</span></label>
                                <div class="col-md-7 form-inline item">
                                    <select class="form-control" name="predict_idx" required="required" title="합격예측기본데이터">
                                        <option value="">합격예측기본데이터</option>
                                        @foreach($arr_predict_data as $row)
                                            <option value="{{ $row['PredictIdx'] }}" @if($row['PredictIdx'] == $data['predict_idx']) selected="selected" @endif>{{ $row['ProdName'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2" for="">노출</label>
                                <div class="col-md-7 form-inline">
                                    <b>{{ number_format($data['real_count'] +  $data['add_count']) }} 건</b>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2" for="">실제</label>
                                <div class="col-md-7 form-inline">
                                    <b>{{ number_format($data['real_count']) }} 명</b><br>
                                    {!! $data['cnt_rule'] !!}
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2" for="">생성</label>
                                <div class="col-md-7 form-inline item">
                                    <input type="text" class="form-control" name="add_count" required="required" title="생성건수" value="{{ $data['add_count'] }}">
                                </div>
                            </div>

                            <div class="form-group text-center btn-wrap">
                                <button type="submit" class="btn btn-success mr-10">저장</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    @endforeach

    <script type="text/javascript">
        var $regi_form_type_1 = $('#regi_form_type_1');
        var $regi_form_type_2 = $('#regi_form_type_2');
        var $regi_form_type_3 = $('#regi_form_type_3');

        $(document).ready(function() {
            // ajax submit
            $regi_form_type_1.submit(function() {
                var _url = '{{ site_url("/predict/countManager/store") }}';
                if (!confirm('적용하시겠습니까?')) { return; }
                ajaxSubmit($regi_form_type_1, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // ajax submit
            $regi_form_type_2.submit(function() {
                var _url = '{{ site_url("/predict/countManager/store") }}';
                if (!confirm('적용하시겠습니까?')) { return; }
                ajaxSubmit($regi_form_type_2, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // ajax submit
            $regi_form_type_3.submit(function() {
                var _url = '{{ site_url("/predict/countManager/store") }}';
                if (!confirm('적용하시겠습니까?')) { return; }
                ajaxSubmit($regi_form_type_3, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop