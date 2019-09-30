@extends('lcms.layouts.master')

@section('content')
    <style>
        .mw-100 {max-width:100px !important;}
        .mw-150 {max-width:150px !important;}
        .mw-600 {max-width:600px !important;}
    </style>
    <h5>- 알림톡 템플릿을 관리하는 메뉴입니다.</h5>
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
                    <label class="control-label col-md-1-1" for="">메세지성격 <span class="required">*</span></label>
                    <div class="form-control-static col-md-4">
                        <select name="send_kind" class="form-control mw-100" required="required">
                            <option value="">메세지성격</option>
                            <option value="A" @if($data['SendKind'] == 'A') selected="selected" @endif>자동</option>
                            <option value="M" @if($data['SendKind'] == 'M') selected="selected" @endif>일반</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1-1 d-line" for="">템플릿코드 <span class="required">*</span></label>
                    <div class="form-control-static col-md-4 ml-12-dot">
                        <input type="text" name="tmpl_cd" value="{{ $data['TmplCd'] }}" required="required" class="form-control mw-150" maxlength="10">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">템플릿명 <span class="required">*</span></label>
                    <div class="form-control-static col-md-10">
                        <input type="text" name="tmpl_name" value="{{ $data['TmplName'] }}" required="required" class="form-control mw-600" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">템플릿내용 <span class="required">*</span></label>
                    <div class="form-control-static col-md-10">
                        <textarea name="msg" class="form-control mw-600" rows="14">{!! $data['Msg'] !!}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">버튼등록</label>
                    <div class="form-control-static col-md-10">
                        <button type="button" id="btn_bubble_chat_add" class="btn btn-sm btn-primary">버튼추가</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-11">
                        <table class="table table-striped table-bordered" id="table_bubble_chat">
                            <thead>
                                <tr>
                                    <th>버튼타입</th>
                                    <th>버튼명(최대 28자)</th>
                                    <th>버튼링크1</th>
                                    <th>버튼링크2</th>
                                    <th>삭제</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(empty($data['arr_chat_bubble_button']) === false)
                                @foreach($data['arr_chat_bubble_button'] as $key => $val)
                                    <tr class="tr_view_bubble">
                                        <td>
                                            <select class="form-control" name="chat_bubble_button_type[]">
                                                <option value="WL" @if($val['type'] == 'WL') selected="selected" @endif>웹링크</option>
                                                <option value="AL" @if($val['type'] == 'AL') selected="selected" @endif>앱링크</option>
                                                <option value="DS" @if($val['type'] == 'DS') selected="selected" @endif>배송조회</option>
                                                <option value="BK" @if($val['type'] == 'BK') selected="selected" @endif>봇키워드</option>
                                                <option value="MD" @if($val['type'] == 'MD') selected="selected" @endif>메시지전달</option>
                                            </select>
                                        </td>
                                        <td><input type="text" name="chat_bubble_button_name[]" value="{{ $val['name'] }}" class="form-control ml-1"></td>
                                        <td><input type="text" name="chat_bubble_button_link1[]" value="{!! $val['link1'] !!}" class="form-control ml-1 @if($val['type'] != 'WL' && $val['type'] != 'AL')  @endif"></td>
                                        <td><input type="text" name="chat_bubble_button_link2[]" value="{!! $val['link2'] !!}" class="form-control ml-1 @if($val['type'] != 'WL' && $val['type'] != 'AL')  @endif"></td>
                                        <td><a href="#none" class="btn-bubble-delete-submit"><i class="fa fa-times fa-lg red"></i></a></td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">이미지 URL</label>
                    <div class="form-control-static col-md-10">
                        <input type="text" name="image_url" value="{{ $data['ImageUrl'] }}" class="form-control mw-600" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1" for="">링크 URL</label>
                    <div class="form-control-static col-md-10">
                        <input type="text" name="image_link" value="{{ $data['ImageLink'] }}" class="form-control mw-600" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1-1">사용여부</label>
                    <div class="col-md-4">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" @if($method == 'POST' || $data['IsUse'] == 'Y') checked="checked" @endif required="required"/>
                            <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse'] == 'N') checked="checked" @endif/>
                            <label for="is_use_n" class="input-label">미사용</label>
                    </div>
                    <label class="control-label col-md-1-1 d-line">승인여부</label>
                    <div class="col-md-4 ml-12-dot">
                            <input type="radio" id="is_approval_y" name="is_approval" class="flat" value="Y" @if($data['IsApproval'] == 'Y') checked="checked" @endif required="required"/>
                            <label for="is_approval_y" class="input-label">승인</label>
                            <input type="radio" id="is_approval_n" name="is_approval" class="flat" value="N" @if($method == 'POST' || $data['IsApproval'] == 'N') checked="checked" @endif/>
                            <label for="is_approval_n" class="input-label">미승인</label>
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
                location.href='{{ site_url("/crm/kakaoTemplate") }}/' + getQueryString();
            });

            $('#btn_bubble_chat_add').click(function() {

                if($('.tr_view_bubble').length >= 5){
                    alert('버튼은 5개까지 등록 가능합니다.');
                    return;
                }

                var add_str = '';

                add_str += '<tr class="tr_view_bubble">';
                add_str += '	<td>';
                add_str += '		<select class="form-control" name="chat_bubble_button_type[]">';
                add_str += '			<option value="WL">웹링크</option>';
                add_str += '			<option value="AL">앱링크</option>';
                add_str += '			<option value="DS">배송조회</option>';
                add_str += '			<option value="BK">봇키워드</option>';
                add_str += '			<option value="MD">메시지전달</option>';
                add_str += '		</select>';
                add_str += '	</td>';
                add_str += '	<td><input type="text" name="chat_bubble_button_name[]" value="" class="form-control ml-1"></td>';
                add_str += '	<td><input type="text" name="chat_bubble_button_link1[]" value="" class="form-control ml-1"></td>';
                add_str += '	<td><input type="text" name="chat_bubble_button_link2[]" value="" class="form-control ml-1"></td>';
                add_str += '	<td><a href="#none" class="btn-bubble-delete-submit" data-lecture-idx="330" data-register-idx="307"><i class="fa fa-times fa-lg red"></i></a></td>';
                add_str += '</tr>';

                $('#table_bubble_chat > tbody:last').append(add_str);
            });

            $regi_form.on('click', '.btn-bubble-delete-submit', function() {
                var i = $('.btn-bubble-delete-submit').index(this);
                $('.tr_view_bubble').eq(i).remove();
            });

            $regi_form.on('change', 'select[name="chat_bubble_button_type[]"]', function() {
                var bubble_type = $(this).val();
                var i = $('select[name="chat_bubble_button_type[]"]').index(this);
                var $bubble_link1 = $('input[name="chat_bubble_button_link1[]"]');
                var $bubble_link2 = $('input[name="chat_bubble_button_link2[]"]');

                if(bubble_type == 'WL' || bubble_type == 'AL'){
                    $bubble_link1.eq(i).removeClass('hide');
                    $bubble_link2.eq(i).removeClass('hide');
                } else {
                    $bubble_link1.eq(i).addClass('hide');
                    $bubble_link2.eq(i).addClass('hide');
                }
            });

            $regi_form.submit(function() {
                var _url = '{{ site_url("/crm/kakaoTemplate/store") }}' + getQueryString();
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.href='{{ site_url("/crm/kakaoTemplate") }}/' + getQueryString();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });
        });
    </script>
@stop