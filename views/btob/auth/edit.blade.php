@extends('btob.layouts.master_modal')
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
            <li>아이디, 지점정보, 권한유형은 수정 불가능합나다.</li>
            <li>비밀번호는 변경 시에만 입력해 주세요.</li>
        </ul>
    </div>
    {!! form_errors() !!}
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="admin_name">이름 <span class="required">*</span>
        </label>
        <div class="col-md-3 item">
            <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="{{ $data['AdminName'] }}">
        </div>
        <label class="control-label col-md-2 col-md-offset-1" for="admin_id">아이디 <span class="required">*</span>
        </label>
        <div class="col-md-4 item form-inline form-control-static">
            {{ $data['AdminId'] }}
            <input type="hidden" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="{{ $data['AdminId'] }}">
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
        <label class="control-label col-md-2" for="admin_phone1">연락처 <span class="required">*</span>
        </label>
        <div class="col-md-9 item multi form-inline">
            <select name="admin_phone1" id="admin_phone1" class="form-control" required="required" title="연락처1">
                <option value="">지역번호</option>
                @foreach($arr_tel1_ccd as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                @endforeach
            </select>
            - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="연락처2" value="{{ $data['AdminPhone2'] }}" style="width: 90px">
            - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="연락처3" value="{{ $data['AdminPhone3'] }}" style="width: 90px">
            <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="tel" title="연락처" value="{{ $data['AdminPhone1'] }}-{{ $data['AdminPhone2'] }}-{{ $data['AdminPhone3'] }}"/>
        </div>
    </div>
    <div class="form-group form-group-sm">
        <label class="control-label col-md-2" for="">지점정보
        </label>
        <div class="col-md-4 form-control-static">
            {{ element($data['AdminAreaCcd'], $arr_area_ccd) }} | {{ element($data['AdminBranchCcd'], $arr_branch_ccd) }}
        </div>
        <label class="control-label col-md-2">권한유형
        </label>
        <div class="col-md-4 item form-control-static">
            {{ $__auth['Role']['RoleName'] }}
        </div>
    </div>
    <script type="text/javascript">
        var $regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 수정폼 입력값 셋팅
            $regi_form.find('select[name="admin_phone1"]').val('{{ $data['AdminPhone1'] }}');

            // 관리자 정보 수정
            $regi_form.submit(function() {
                var _url = '{{ site_url('/auth/regist/update') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                    }
                }, showValidateError, null, false, 'alert');
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