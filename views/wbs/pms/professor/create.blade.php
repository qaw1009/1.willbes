@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 전체 교수에 대한 원천정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>교수 기본정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="cp_idx">적용CP <span class="required">*</span>
                    </label>
                    <div class="col-md-5 item">
                        <div class="checkbox">
                            @foreach($cps as $row)
                                <input type="checkbox" id="cp_idx_{{ $loop->index }}" name="cp_idx[]" class="flat" @if($loop->index == 1) required="required" title="적용CP" @endif value="{{ $row['wCpIdx'] }}" @if($row['wCpIdx'] == $row['wPCpIdx'])checked="checked"@endif/>
                                <label for="cp_idx_{{ $loop->index }}" class="input-label">{{ $row['wCpName'] }}</label>
                            @endforeach
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="content_ccd">대표콘텐츠유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <select name="content_ccd" id="content_ccd" required="required" class="form-control" title="대표콘텐츠유형">
                            <option value="">선택</option>
                            @foreach($content_ccd as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['wContentCcd']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_name">교수명 <span class="required">*</span>
                    </label>
                    <div class="col-md-5 form-inline">
                        <div class="item inline-block">
                            <input type="text" id="prof_name" name="prof_name" required="required" class="form-control" title="교수명" value="{{ $data['wProfName'] }}">
                        </div>
                        <p class="form-control-static ml-30 mr-10">[교수닉네임]</p>
                        <input type="text" id="prof_nickname" name="prof_nickname" class="form-control" title="교수닉네임" value="{{ $data['wProfNickName'] }}">
                    </div>
                    <label class="control-label col-md-2">교수코드
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">@if($method == 'PUT') {{ $data['wProfIdx'] }} @else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_id">교수아이디 <span class="required">*</span>
                    </label>
                    <div class="col-md-5 item form-inline">
                        @if($method == 'POST')
                            <input type="text" id="prof_id" name="prof_id" required="required" class="form-control" title="교수아이디" value="">
                            <button type="button" id="btn_duplicate_check" class="btn btn-sm btn-primary ml-5">중복확인</button>
                        @else
                            <p class="form-control-static">{{ $data['wProfId'] }}</p>
                            <input type="hidden" id="prof_id" name="prof_id" required="required" class="form-control" title="아이디" value="{{ $data['wProfId'] }}">
                        @endif
                    </div>
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_passwd">교수비밀번호
                    </label>
                    <div class="col-md-2 item">
                        <input type="password" id="prof_passwd" name="prof_passwd" class="form-control" title="교수비밀번호" value="">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># @if($method == 'PUT') 변경 시에만 입력 @else 미입력 시 `1111`로 자동 셋팅 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="sample_url">맛보기영상경로
                    </label>
                    <div class="col-md-9 item">
                        <input type="text" id="sample_url" name="sample_url" class="form-control optional" pattern="url" title="맛보기영상경로" value="{{ $data['wSampleUrl'] }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="prof_profile">교수프로필
                    </label>
                    <div class="col-md-9">
                        <textarea id="prof_profile" name="prof_profile" class="form-control" rows="7" title="교수프로필" placeholder="">{{ $data['wProfProfile'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="book_content">주요저서
                    </label>
                    <div class="col-md-9">
                        <textarea id="book_content" name="book_content" class="form-control" rows="7" title="주요저서" placeholder="">{{ $data['wBookContent'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="attach_img_1">교수대표이미지
                    </label>
                    <div class="col-md-9 form-inline">
                        @for($i = 1; $i <= $attach_img_cnt; $i++)
                            <div class="mb-5">
                               <input type="file" id="attach_img{{ $i }}" name="attach_img[]" class="form-control" title="교수대표이미지{{ $i }}"/>
                                @if(empty($data{'wAttachImgName' . $i}) === false)
                                    <p class="form-control-static ml-30 mr-10">[ <a href="{{ $data['wAttachImgPath'] . $data{'wAttachImgName' . $i} }}" rel="popup-image">{{ $data{'wAttachImgName' . $i} }}</a> ]</p>
                                    <div class="checkbox">
                                        <input type="checkbox" id="attach_img_delete_{{ $i }}" name="attach_img_delete[]" value="{{ $i }}" class="flat"/> <label for="attach_img_delete_{{ $i }}" class="input-label red">삭제</label>
                                    </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wRegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wRegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <!-- cheditor -->
    <link href="/public/vendor/cheditor/css/ui.css" rel="stylesheet">
    <script src="/public/vendor/cheditor/cheditor.js"></script>
    <script src="/public/js/editor_util.js"></script>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // editor load
            var $editor_profile = new cheditor();
            $editor_profile.config.editorHeight = '170px';
            $editor_profile.config.editorWidth = '100%';
            $editor_profile.inputForm = 'prof_profile';
            $editor_profile.run();

            var $editor_book = new cheditor();
            $editor_book.config.editorHeight = '170px';
            $editor_book.config.editorWidth = '100%';
            $editor_book.inputForm = 'book_content';
            $editor_book.run();

            // 아이디 중복 체크
            $('#btn_duplicate_check').click(function () {
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'prof_id' : $regi_form.find('input[name=prof_id]').val()
                };
                sendAjax('{{ site_url('/pms/professor/idCheck') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (confirm(ret.ret_msg)) {
                            $regi_form.find('input[name=prof_id]').prop('readonly', true);
                        } else {
                            $regi_form.find('input[name=prof_id]').val('');
                        }
                    }
                }, showError, false, 'POST');
            });

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/pms/professor/store') }}';

                // editor
                getEditorBodyContent($editor_profile);
                getEditorBodyContent($editor_book);

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/pms/professor/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                @if($method == 'POST')
                // 아이디 중복체크 완료 여부 체크
                if ($regi_form.find('input[name=prof_id]').prop('readonly') !== true) {
                    alert('교수아이디 중복확인을 체크해 주세요.');
                    return false;
                }
                @endif

                return true;
            }

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/pms/professor/index') }}' + getQueryString());
            });
        });
    </script>
@stop
