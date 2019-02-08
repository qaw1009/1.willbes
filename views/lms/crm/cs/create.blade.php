@extends('lcms.layouts.master')

@section('content')
    <h5>- 고객 기술 응대 자료를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
        {{--<form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" action="{{ site_url("/board/{$boardName}/store") }}?bm_idx=45" novalidate>--}}
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $ctm_idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>공지게시판 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group bdt-line">
                    <label class="control-label col-md-1-1" for="is_best">공지</label>
                    <div class="col-md-4 form-inline">
                        <div class="checkbox">
                            <input type="checkbox" id="is_best" name="is_best" value="1" class="flat" @if($data['IsBest']=='1')checked="checked"@endif/> <label class="inline-block mr-5 red" for="is_best">공지</label>
                        </div>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="is_use_y">사용여부<span class="required">*</span></label>
                    <div class="col-md-4 item form-inline ml-12-dot">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-1-1 d-line">최종 수정일
                    </label>
                    <div class="col-md-4 ml-12-dot">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="is_best">응대유형<span class="required">*</span></label></label>
                    <div class="col-md-4 form-inline item">
                        <select class="form-control" id="issue_division_ccd" name="issue_division_ccd" required="required" title="응대유형">
                            <option value="">유형선택</option>
                            @foreach($arr_base['issue_division_ccd'] as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['IssueDivisionCcd'])selected="selected"@endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="title">제목<span class="required">*</span></label>
                    <div class="col-md-10 item">
                        <input type="text" id="title" name="title" required="required" class="form-control" maxlength="46" title="제목" value="{{ $data['Title'] }}" placeholder="제목 입니다.">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1-1" for="board_content">내용<span class="required">*</span></label>
                    <div class="col-md-10">
                        <textarea id="board_content" name="board_content" class="form-control" rows="7" title="내용" placeholder="">{!! $data['Content'] !!}</textarea>
                    </div>
                </div>

                <div class="form-group text-center btn-wrap mt-50">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            //editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '400px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'board_content';
            $editor_profile.run();

            //목록
            $('#btn_list').click(function() {
                location.href='{{ site_url("/crm/manageCs/") }}' + getQueryString();
            });

            // ajax submit
            $regi_form.submit(function() {
                getEditorBodyContent($editor_profile);
                var _url = '{{ site_url("/crm/manageCs/store") }}' + getQueryString();

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url("/crm/manageCs/") }}' + getQueryString();
                    }
                }, showValidateError, null, false, 'alert');
            });
        });
    </script>
@stop