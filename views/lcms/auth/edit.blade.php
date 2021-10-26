@extends('lcms.layouts.master_modal')
@section('layer_title')
    개인정보 수정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_admin_form" name="_admin_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
@endsection

@section('layer_content')
    <div class="well well-sm">
        <ul class="no-margin">
            <li>아이디, 권한유형은 수정이 불가능합니다.<br/>불가피하게 변경이 필요한 경우 웹기획팀(직통번호:7122)에 문의해 주세요.</li>
            <li>비밀번호는 변경 시에만 입력해 주세요.</li>
        </ul>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_name">이름 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="{{ $data['wAdminName'] }}">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_id">아이디 <span class="required">*</span>
        </label>
        <div class="col-md-4 form-control-static item">
            {{ $data['wAdminId'] }}
            <input type="hidden" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="{{ $data['wAdminId'] }}" data-passwd-verify="id">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_passwd">비밀번호 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="password" id="admin_passwd" name="admin_passwd" class="optional form-control" data-validate-linked="admin_re_passwd" title="비밀번호" placeholder="# 변경 시에만 입력" value="" data-passwd-verify="passwd">
        </div>
        <div class="col-md-6 pl-0 form-inline">
            {{-- 비밀번호 유효성검사 버튼 --}}
            @include('lcms.common.passwd_verify_partial', ['placement' => 'left'])
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_re_passwd">비밀번호 확인 <span class="required">*</span>
        </label>
        <div class="col-md-4 item">
            <input type="password" id="admin_re_passwd" name="admin_re_passwd" class="optional form-control" data-validate-linked="admin_passwd" title="비밀번호 확인" value="">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_phone1">휴대폰번호 <span class="required">*</span>
        </label>
        <div class="col-md-10 form-inline item multi">
            <select name="admin_phone1" id="admin_phone1" class="form-control" required="required" title="휴대폰번호1" style="width: 90px">
                @foreach($phone1_ccd as $key => $val)
                    <option value="{{ $key }}" @if($data['wAdminPhone1'] == $key) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            </select>
            - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="휴대폰번호2" value="{{ $data['wAdminPhone2'] }}" style="width: 90px">
            - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="휴대폰번호3" value="{{ $data['wAdminPhone3'] }}" style="width: 90px">
            <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="mobile" title="휴대폰번호" value="{{ $data['wAdminPhone1'] }}-{{ $data['wAdminPhone2'] }}-{{ $data['wAdminPhone3'] }}"/>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_dept_ccd">소속/직급</label>
        <div class="col-md-10 form-inline item">
            <select name="admin_dept_ccd" id="admin_dept_ccd" class="form-control" title="소속">
                <option value="">선택</option>
                @foreach($dept_ccd as $key => $val)
                    <option value="{{ $key }}" @if($data['wAdminDeptCcd'] == $key) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            </select>
            <select name="admin_position_ccd" id="admin_position_ccd" class="form-control" title="직급">
                <option value="">선택</option>
                @foreach($position_ccd as $key => $val)
                    <option value="{{ $key }}" @if($data['wAdminPositionCcd'] == $key) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">조직</label>
        <div class="col-md-10 form-inline item">
            <button type="button" id="btn_search_organization" class="btn btn-sm btn-primary">검색</button>
            <span id="selected_organization" class="pl-10">
                @if(isset($data['org_data']) === true)
                    @foreach($data['org_data'] as $row)
                        <span class="pr-10">{{ $row['OrgName'] }}
                            <a href="#none" data-org-idx="{{ $row['OrgIdx'] }}" class="selected-organization-delete"><i class="fa fa-times red"></i></a>
                            <input type="hidden" name="org_idx[]" value="{{ $row['OrgIdx'] }}"/>
                        </span>
                    @endforeach
                @endif
            </span>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_mail_id">E-mail <span class="required">*</span>
        </label>
        <div class="col-md-10 form-inline item">
            <input type="text" id="admin_mail_id" name="admin_mail_id" required="required" class="form-control" title="메일 아이디" value="{{ $data['wAdminMailId'] }}" style="width: 160px">
            @ <input type="text" id="_admin_mail_domain" name="admin_mail_domain" required="required" class="form-control" title="메일 도메인" value="{{ $data['wAdminMailDomain'] }}" style="width: 140px">
            <select name="admin_mail_domain_ccd" id="_admin_mail_domain_ccd" class="form-control" title="메일 도메인">
                @foreach($mail_domain_ccd as $key => $val)
                    <option value="{{ $key }}" @if($data['wAdminMailDomain'] == $key) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">권한유형
        </label>
        <div class="col-md-10 form-control-static">
            {{ $data['wRoleName'] }}
        </div>
    </div>
    <script type="text/javascript">
        var $admin_form = $('#_admin_form');

        $(document).ready(function() {
            // 메일 도메인 선택
            $admin_form.on('change', 'select[name=admin_mail_domain_ccd]', function() {
                setMailDomain('_admin_mail_domain_ccd', '_admin_mail_domain');
            });
            setMailDomain('_admin_mail_domain_ccd', '_admin_mail_domain', '{{ $data['wAdminMailDomain'] }}');

            // 관리자 정보 수정
            $admin_form.submit(function() {
                var _url = '{{ site_url('/lcms/auth/regist/update') }}';

                ajaxSubmit($admin_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, function() {
                    // 메일 유효성 체크
                    var admin_mail = $admin_form.find('input[name=admin_mail_id]').val() + '@' + $admin_form.find('input[name=admin_mail_domain]').val();
                    if ((new FormValidator()).checkRegex(admin_mail, 'email').valid === false) {
                        return false;
                    }
                    return true;
                }, false, 'alert');
            });

            // 조직 검색
            $admin_form.on('click', '#btn_search_organization', function() {
                $('#btn_search_organization').setLayer({
                    'modal_id' : 'modal_search_organization',
                    'url' : '{{ site_url('/lcms/common/searchOrganization/index/') }}',
                    'width' : 900
                });
            });

            // 조직 삭제 이벤트
            $admin_form.on('click', '.selected-organization-delete', function() {
                $(this).parent().remove();
            });
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" class="btn btn-success">수정</button>
@endsection

@section('layer_footer')
    </form>
@endsection