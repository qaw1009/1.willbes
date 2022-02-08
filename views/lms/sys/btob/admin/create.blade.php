@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 운영자를 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <input type="hidden" name="is_approval" value="Y"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>제휴사운영자 정보</h2>
                <div class="pull-right">
                    <span class="required">*</span> 표시된 항목은 필수 입력 항목입니다.
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-2" for="btob_idx">제휴사 선택 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <select class="form-control" id="btob_idx" name="btob_idx" required="required" title="제휴사" @if($method == 'PUT') disabled="disabled" @endif>
                            <option value="">선택</option>
                            @foreach($arr_btob_idx as $key => $val)
                                <option value="{{ $key }}" @if($data['BtobIdx'] == $key) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                        @if($method == 'PUT')
                            <input type="hidden" name="o_btob_idx" value="{{ $data['BtobIdx'] }}"/>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_name">이름 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="admin_name" name="admin_name" required="required" class="form-control" title="이름" value="{{ $data['AdminName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">아이디 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 form-inline">
                        @if($method == 'POST')
                            <input type="text" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="">
                            <button type="button" id="btn_duplicate_check" class="btn btn-sm btn-primary ml-5">중복확인</button>
                        @else
                            <p class="form-control-static">{{ $data['AdminId'] }}</p>
                            <input type="hidden" id="admin_id" name="admin_id" required="required" class="form-control" title="아이디" value="{{ $data['AdminId'] }}">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_passwd">비밀번호 <span class="required">*</span>
                    </label>
                    <div class="col-md-2 item">
                        <input type="password" id="admin_passwd" name="admin_passwd" class="form-control" title="비밀번호" value="">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"># @if($method == 'PUT') 변경 시에만 입력 @else 미입력 시 `1111`로 자동 셋팅 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_phone1">연락처 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item multi form-inline">
                        <input type="number" id="admin_phone1" name="admin_phone1" required="required" class="form-control" maxlength="3" title="연락처1" value="{{ $data['AdminPhone1'] }}" style="width: 90px">
                        - <input type="number" id="admin_phone2" name="admin_phone2" required="required" class="form-control" maxlength="4" title="연락처2" value="{{ $data['AdminPhone2'] }}" style="width: 90px">
                        - <input type="number" id="admin_phone3" name="admin_phone3" required="required" class="form-control" maxlength="4" title="연락처3" value="{{ $data['AdminPhone3'] }}" style="width: 90px">
                        <input type="hidden" id="admin_phone" name="admin_phone" required="required" pattern="phone" title="연락처" value="{{ $data['AdminPhone1'] }}-{{ $data['AdminPhone2'] }}-{{ $data['AdminPhone3'] }}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="admin_dept_ccd">지점정보 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <select class="form-control" id="admin_area_ccd" name="admin_area_ccd" required="required" title="지역">
                            <option value="">지역</option>
                            @foreach($arr_area_ccd as $key => $val)
                                <option value="{{ $key }}" class="{{ str_first_pos_before($val, '::') }}">{{ str_first_pos_after($val, '::') }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="admin_branch_ccd" name="admin_branch_ccd" required="required" title="지점">
                            <option value="">지점</option>
                            @foreach($arr_branch_ccd as $row)
                                <option value="{{ $row['BranchCcd'] }}" class="{{ $row['AreaCcd'] }}">{{ $row['BranchCcdName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-4 item form-inline">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" title="사용여부" @if($method == 'POST' || $data['IsUse']=='Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_idx">권한유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-10 item form-inline">
                        <select class="form-control" id="role_idx" name="role_idx" required="required" title="권한유형">
                            <option value="">권한유형</option>
                            @foreach($arr_role as $row)
                                <option value="{{ $row['RoleIdx'] }}" class="{{ $row['BtobIdx'] }}">{{ $row['RoleName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">등록자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">등록일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['RegDatm'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">최종 수정자
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdAdminName'] }}</p>
                    </div>
                    <label class="control-label col-md-2">최종 수정일
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['UpdDatm'] }}</p>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button class="btn btn-primary btn_list" type="button">목록</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $datatable;

        $(document).ready(function() {
            // 지역, 지점, 권한유형 자동변경
            $regi_form.find('select[name="admin_area_ccd"]').chained("#btob_idx");
            $regi_form.find('select[name="admin_branch_ccd"]').chained("#admin_area_ccd");
            $regi_form.find('select[name="role_idx"]').chained("#btob_idx");

            // 수정폼 입력값 셋팅
            @if($method == 'PUT')
                $regi_form.find('select[name="admin_area_ccd"]').val('{{ $data['AdminAreaCcd'] }}');
                $regi_form.find('select[name="admin_area_ccd"]').trigger('change');
                $regi_form.find('select[name="admin_branch_ccd"]').val('{{ $data['AdminBranchCcd'] }}');
                $regi_form.find('select[name="role_idx"]').val('{{ $data['RoleIdx'] }}');
            @endif

            // 제휴사운영자 정보 저장
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/btob/btobAdmin/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/btob/btobAdmin/index') }}' + getQueryString());
                    }
                }, showValidateError, function() {
                    @if($method == 'POST')
                    // 아이디 중복체크 완료 여부 체크
                    if ($regi_form.find('input[name=admin_id]').prop('readonly') !== true) {
                        alert('아이디 중복확인을 체크해 주세요.');
                        return false;
                    }
                    @endif

                    return true;
                }, false, 'alert');
            });

            // 아이디 중복 체크
            $regi_form.on('click', '#btn_duplicate_check', function() {
                var data = {
                    '{{ csrf_token_name() }}' : $regi_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    'admin_id' : $regi_form.find('input[name=admin_id]').val()
                };
                sendAjax('{{ site_url('/sys/btob/btobAdmin/idCheck') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        if (confirm(ret.ret_msg)) {
                            $regi_form.find('input[name=admin_id]').prop('readonly', true);
                        } else {
                            $regi_form.find('input[name=admin_id]').val('');
                        }
                    }
                }, showError, false, 'POST');
            });

            // 목록 버튼 클릭
            $('.btn_list').click(function() {
                location.replace('{{ site_url('/sys/btob/btobAdmin/index') }}' + getQueryString());
            });
        });
    </script>
@stop
