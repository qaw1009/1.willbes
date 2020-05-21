@extends('lcms.layouts.master_modal')
@section('layer_title')
    개인정보 수정
@stop

@section('layer_header')
    <form class="form-horizontal form-label-left" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}
@endsection

@section('layer_content')
    <div class="well well-sm">
        <ul class="no-margin">
            <li>아이디,권한유형은 수정 불가능합나다. 불가피하게 변경이 필요한 경우 웹기획팀(직통번호:7122)에 문의해 주세요.</li>
            <li>비밀번호는 변경 시에만 입력해 주세요.</li>
        </ul>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_name">이름 <span class="required">*</span>
        </label>
        <div class="col-md-3 item">
            <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="{{ $data['wAdminName'] }}">
        </div>
        <label class="control-label col-md-2 col-md-offset-1" for="admin_id">아이디 <span class="required">*</span>
        </label>
        <div class="col-md-4 item form-inline form-control-static">
            {{ $data['wAdminId'] }}
            <input type="hidden" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="{{ $data['wAdminId'] }}">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_passwd">비밀번호 <span class="required">*</span>
        </label>
        <div class="col-md-3 item">
            <input type="password" id="admin_passwd" name="admin_passwd" class="optional form-control" data-validate-linked="admin_re_passwd" title="비밀번호" placeholder="# 변경 시에만 입력" value="">
        </div>
        <label class="control-label col-md-2 col-md-offset-1" for="admin_re_passwd">비밀번호 재확인 <span class="required">*</span>
        </label>
        <div class="col-md-3 item">
            <input type="password" id="admin_re_passwd" name="admin_re_passwd" class="optional form-control" data-validate-linked="admin_passwd" title="비밀번호 재확인" value="">
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_phone1">휴대폰번호 <span class="required">*</span>
        </label>
        <div class="col-md-4 item multi form-inline">
            <select name="admin_phone1" id="admin_phone1" class="form-control" required="required" title="휴대폰번호1">
                @foreach($phone1_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
            - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="휴대폰번호2" value="{{ $data['wAdminPhone2'] }}" style="width: 90px">
            - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="휴대폰번호3" value="{{ $data['wAdminPhone3'] }}" style="width: 90px">
            <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="mobile" title="휴대폰번호" value="{{ $data['wAdminPhone1'] }}-{{ $data['wAdminPhone2'] }}-{{ $data['wAdminPhone3'] }}"/>
        </div>
        <label class="control-label col-md-2" for="admin_dept_ccd">소속/직급</label>
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
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">조직</label>
        <div class="col-md-9 item form-control-static">
            <span id="selected_organization" class="pl-10">
                @if(isset($data['org_data']) === true)
                    @foreach($data['org_data'] as $key => $val)
                        <span class="pr-10">{{ $val['wOrgName'] }}
                            <a href="#none" data-cate-code="{{ $val['wOrgCode'] }}" class="selected-organization-delete"><i class="fa fa-times red"></i></a>
                            <input type="hidden" name="org_code[]" value="{{ $val['wOrgCode'] }}"/>
                        </span>
                    @endforeach
                @endif
            </span>
            <button type="button" id="btn_search_organization" class="btn btn-sm btn-primary">검색</button>
        </div>
    </div>
    <div class="form-group form-group-sm">
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
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2">권한유형</span>
        </label>
        <div class="col-md-9 item form-control-static">
            {{ $data['wRoleName'] }}
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 메일 도메인 선택
            $('select[name=admin_mail_domain_ccd]').change(function () {
                setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain');
            });

            // 수정폼 입력값 셋팅
            $regi_form.find('select[name="admin_phone1"]').val('{{ $data['wAdminPhone1'] }}');
            $regi_form.find('select[name="admin_dept_ccd"]').val('{{ $data['wAdminDeptCcd'] }}');
            $regi_form.find('select[name="admin_position_ccd"]').val('{{ $data['wAdminPositionCcd'] }}');
            $regi_form.find('input[name="admin_mail_id"]').val('{{ $data['wAdminMailId'] }}');
            setMailDomain('admin_mail_domain_ccd', 'admin_mail_domain', '{{ $data['wAdminMailDomain'] }}');

            // 관리자 정보 수정
            $regi_form.submit(function() {
                var _url = '{{ site_url('/lcms/auth/regist/update') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                // 메일 유효성 체크
                var admin_mail = $regi_form.find('input[name=admin_mail_id]').val() + '@' + $regi_form.find('input[name=admin_mail_domain]').val();
                if ((new FormValidator()).checkRegex(admin_mail, 'email').valid === false) {
                    return false;
                }
                return true;
            }

            // 조직 검색
            $('#btn_search_organization').on('click', function() {
                $('#btn_search_organization').setLayer({
                    'modal_id' : 'modal_search_organization',
                    'url' : '{{ site_url('/lcms/common/searchOrganization/index/') }}',
                    'width' : 900
                });
            });

            // 조직 삭제 이벤트
            $regi_form.on('click', '.selected-organization-delete', function() {
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