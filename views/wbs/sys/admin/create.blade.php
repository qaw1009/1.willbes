@extends('lcms.layouts.master')

@section('content')
    <h5>- WBS 운영자 정보를 관리하는 메뉴입니다.</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>운영자 정보</h2>
            <div class="pull-right">
                <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field($method) !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_name">이름 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="{{ $data['wAdminName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-2" for="admin_id">아이디 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        @if($method == 'POST')
                            <input type="text" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="">
                            <button type="button" id="btn_duplicate_check" class="btn btn-sm btn-primary ml-5">중복확인</button>
                        @else
                            <p class="form-control-static">{{ $data['wAdminId'] }}</p>
                            <input type="hidden" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="{{ $data['wAdminId'] }}">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_passwd">비밀번호
                    </label>
                    <div class="col-md-2 item">
                        <input type="password" id="admin_passwd" name="admin_passwd" class="form-control" title="비밀번호" value="" placeholder="@if($method == 'PUT')# 변경 시에만 입력@endif">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">
                            @if($method == 'POST')
                                # 미입력 시 `1111`로 자동 셋팅
                            @endif
                        </p>
                    </div>
                    @if($method == 'PUT')
                        <label class="control-label col-md-2" for="passwd_expire_date">비밀번호 만료일자
                        </label>
                        <div class="col-md-4 item form-inline">
                            <input type="text" id="passwd_expire_date" name="passwd_expire_date" class="form-control datepicker" title="비밀번호 만료일자" value="{{$data['wPasswdExpireDate']}}" disabled="disabled">
                            @if(is_w_sys_admin() === true)
                                <button type="button" id="btn_passwd_expire_date_modify" class="btn btn-success mb-0 mr-0">만료일자 수정</button>
                            @endif
                            <span class="blue pl-15">(기간설정 : {{$data['wPasswdExpirePeriod']}}일)</span>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_phone1">휴대폰번호<span class="required">*</span>
                    </label>
                    <div class="col-md-4 item multi form-inline">
                        <select name="admin_phone1" id="admin_phone1" class="form-control" required="required" title="휴대폰번호1" style="width: 90px;">
                            @foreach($phone1_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="휴대폰번호2" value="{{ $data['wAdminPhone2'] }}" style="width: 90px;">
                        - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="휴대폰번호3" value="{{ $data['wAdminPhone3'] }}" style="width: 90px;">
                        <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="mobile" title="휴대폰번호" value="{{ $data['wAdminPhone1'] }}-{{ $data['wAdminPhone2'] }}-{{ $data['wAdminPhone3'] }}"/>
                    </div>
                    <label class="control-label col-md-2" for="admin_dept_ccd">소속/직급
                    </label>
                    <div class="col-md-4 item form-inline">
                        <select name="admin_dept_ccd" id="admin_dept_ccd" class="form-control" title="소속">
                            <option value="">선택</option>
                            @foreach($dept_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select name="admin_position_ccd" id="admin_position_ccd" class="form-control" title="직급">
                            <option value="">선택</option>
                            @foreach($position_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_mail_id">E-mail <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item form-inline">
                        <input type="text" id="admin_mail_id" name="admin_mail_id" required="required" class="form-control" title="메일 아이디" value="" style="width: 160px">
                        @ <input type="text" id="admin_mail_domain" name="admin_mail_domain" required="required" class="form-control" title="메일 도메인" value="" style="width: 140px">
                        <select name="admin_mail_domain_ccd" id="admin_mail_domain_ccd" class="form-control" title="메일 도메인">
                            @foreach($mail_domain_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_desc">설명
                    </label>
                    <div class="col-md-9 item">
                        <textarea id="admin_desc" name="admin_desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['wAdminDesc'] }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['wIsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['wIsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                    <label class="control-label col-md-2" for="is_approval">승인여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_approval_y" name="is_approval" class="flat" value="Y" required="required" title="승인여부" @if($method == 'POST' || $data['wIsApproval']=='Y')checked="checked"@endif/> <label for="is_approval_y" class="input-label">승인</label>
                            <input type="radio" id="is_approval_n" name="is_approval" class="flat" value="N" @if($data['wIsApproval']=='N')checked="checked"@endif/> <label for="is_approval_n" class="input-label">미승인</label>
                            <div class="inline-block"><span id="approval_info"></span></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_idx">권한유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <select class="form-control" id="role_idx" name="role_idx" required="required" title="권한유형">
                            <option value="">권한유형</option>
                            @foreach($roles as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="prof_id">T존연동교수아이디
                    </label>
                    <div class="col-md-2 item">
                        <input type="text" id="prof_id" name="prof_id" class="form-control" title="T존연동교수아이디" value="{{ $data['wProfId'] or '' }}" readonly="readonly">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
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
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wUpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary" type="button" id="btn_list">목록</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 메일 도메인 선택
            $('select[name=admin_mail_domain_ccd]').change(function () {
                setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain');
            });

            // 수정폼 입력값 셋팅
            @if($method == 'PUT')
                $regi_form.find('select[name="admin_phone1"]').val('{{ $data['wAdminPhone1'] }}');
                $regi_form.find('select[name="admin_dept_ccd"]').val('{{ $data['wAdminDeptCcd'] }}');
                $regi_form.find('select[name="admin_position_ccd"]').val('{{ $data['wAdminPositionCcd'] }}');
                $regi_form.find('input[name="admin_mail_id"]').val('{{ $data['wAdminMailId'] }}');
                setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain', '{{ $data['wAdminMailDomain'] }}');
                @if($data['wIsApproval'] == 'Y')
                    $('#approval_info').html('( {{ $data['wApprovalDatm'] }} | {{ $data['wApprovalAdminName'] }} )');
                @endif
                $regi_form.find('select[name="role_idx"]').val('{{ $data['wRoleIdx'] }}');
            @else
                setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain', 'willbes.com');
            @endif

            // 아이디 중복 체크
            $('#btn_duplicate_check').click(function () {
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'admin_id' : $regi_form.find('input[name=admin_id]').val()
                };
                sendAjax('{{ site_url('/lcms/auth/regist/idCheck') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (confirm(ret.ret_msg)) {
                            $regi_form.find('input[name=admin_id]').prop('readonly', true);
                        } else {
                            $regi_form.find('input[name=admin_id]').val('');
                        }
                    }
                }, showError, false, 'POST');
            });

            // 만료일자 수정버튼 클릭
            $regi_form.on('click', '#btn_passwd_expire_date_modify', function() {
                var is_modify = $regi_form.find('input[name=passwd_expire_date]').prop('disabled') !== true;
                $regi_form.find('input[name=passwd_expire_date]').prop('disabled', is_modify);

                if (is_modify === false) {
                    $regi_form.find('input[name=passwd_expire_date]').focus();
                }
            });

            // 권한유형 변경 이벤트
            $regi_form.on('change', 'select[name="role_idx"]', function() {
                var role_idx = $(this).val();
                var asst_role_idx = '{{ $asst_role_idx }}';
                var $prof_id = $regi_form.find('input[name="prof_id"]');

                if (asst_role_idx === role_idx) {
                    // 조교관리자일 경우
                    $prof_id.prop('readonly', false);
                } else {
                    $prof_id.prop('readonly', true);
                }
            });
            $regi_form.find('select[name="role_idx"]').trigger('change');

            // ajax submit
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/admin/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/admin/index') }}' + getQueryString());
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                @if($method == 'POST')
                // 아이디 중복체크 완료 여부 체크
                if ($regi_form.find('input[name=admin_id]').prop('readonly') !== true) {
                    alert('아이디 중복확인을 체크해 주세요.');
                    return false;
                }
                @endif
                // 메일 유효성 체크
                var admin_mail = $regi_form.find('input[name=admin_mail_id]').val() + '@' + $regi_form.find('input[name=admin_mail_domain]').val();
                if ((new FormValidator()).checkRegex(admin_mail, 'email').valid === false) {
                    return false;
                }

                return true;
            }

            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sys/admin/index') }}' + getQueryString());
            });
        });
    </script>
@stop
