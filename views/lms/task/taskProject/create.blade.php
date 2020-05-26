@extends('lcms.layouts.master')

@section('content')
    <style>
        .mw-650 {max-width:650px !important;}
    </style>
    <h5>- 업무 프로젝트를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>공지게시판 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1-1">프로젝트명 <span class="required">*</span></label>
                    <div class="form-control-static col-md-10">
                        <input type="text" name="tproject_name" value="{{ $data['TprojectName'] }}" required="required" class="form-control mw-650" maxlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">설명</label>
                    <div class="form-control-static col-md-10">
                        <textarea name="tproject_desc" class="form-control mw-650" rows="6">{!! $data['TprojectDesc'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">사용여부</label>
                    <div class="form-control-static col-md-10">
                        <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" @if($method == 'POST' || $data['IsUse'] == 'Y') checked="checked" @endif required="required"/>
                        <label for="is_use_y" class="input-label">사용</label>
                        <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N') checked="checked" @endif/>
                        <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                </div>
                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script src="/public/js/lms/board/common.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {

            $('#btn_list').click(function() {
                location.href='{{ site_url("/task/taskProject") }}/' + getQueryString();
            });

            $regi_form.submit(function() {
                var _url = '{{ site_url("/task/taskProject/store") }}' + getQueryString();
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url("/task/taskProject") }}/' + getQueryString();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });
    </script>
@stop