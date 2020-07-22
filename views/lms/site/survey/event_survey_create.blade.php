@extends('lcms.layouts.master')
@section('content')
    <h5>- 설문을 등록하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="sp_idx" value="{{ $data_survey['SpIdx'] or '' }}" />

        <div class="x_panel">
            <div class="x_title">
                <h2>설문등록</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다. <br>
                </div>
                <div class="clearfix"></div>
            </div>

            <div id="x_content">
                @include('lms.site.survey.create_survey_partial');
            </div>

        </div>
    </form>

    <script>
        var $regi_form = $('#regi_form');

        // 설문정보 불러오기
        $regi_form.on('click', '.view_survey_info', function() {
            var _url = '{{ site_url("/site/survey/creatSurveyPartial") }}' + getQueryString();
            var sp_idx = $("#survey_info option:selected").val();
            var data = {
                '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'GET',
                'sp_idx' : sp_idx
            };

            sendAjax(_url, data, function(html) {
                $('#x_content').html(html);
            }, showAlertError, false, 'GET', 'html');
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
                    { 'id' : 'sq_data', 'name' : '설문항목 배열', 'value' : $(obj).data("sq-data"), 'required' : true},
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