@extends('lcms.layouts.master')

@section('content')
    <h5>- 제휴사 관리자 권한유형을 관리하는 메뉴입니다.</h5>
    {!! form_errors() !!}
    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field($method) !!}
        <input type="hidden" name="idx" value="{{ $idx }}"/>
        <div class="x_panel">
            <div class="x_title">
                <h2>권한유형 정보</h2>
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
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_name">권한유형명 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <input type="text" id="role_name" name="role_name" required="required" class="form-control" title="권한유형명" value="{{ $data['RoleName'] }}">
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">권한유형코드
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($method == 'PUT'){{ $data['RoleIdx'] }}@else # 등록 시 자동 생성 @endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="is_use">사용여부 <span class="required">*</span>
                    </label>
                    <div class="col-md-9 item">
                        <div class="radio">
                            <input type="radio" id="is_use_y" name="is_use" class="flat" value="Y" required="required" @if($method == 'POST' || $data['IsUse'] == 'Y')checked="checked"@endif/> <label for="is_use_y" class="input-label">사용</label>
                            <input type="radio" id="is_use_n" name="is_use" class="flat" value="N" @if($data['IsUse']=='N')checked="checked"@endif/> <label for="is_use_n" class="input-label">미사용</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_desc">설명
                    </label>
                    <div class="col-md-7 item">
                        <textarea id="role_desc" name="role_desc" class="form-control" rows="3" title="설명" placeholder="">{{ $data['RoleDesc'] }}</textarea>
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
        <div class="x_panel mt-30">
            <div class="x_title">
                <h2>메뉴 정보</h2>
                <div class="pull-right"></div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="list_menu_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th class="searching rowspan">GNB-2depth 메뉴</th>
                        <th class="searching rowspan">LNB-3depth 메뉴</th>
                        <th class="searching">LNB-4depth 메뉴</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menus as $row)
                        <tr>
                            <td>
                                <div class="form-group form-group-sm no-border-bottom">
                                    <input type="checkbox" name="menu_idx[]" value="{{ $row['BMenuIdx'] }}" class="flat menu-depth1" @if($row['BMenuIdx']==$row['RBMenuIdx'])checked="checked"@endif/> {{ $row['BMenuName'] }}
                                </div>
                            </td>
                            <td>
                                @if(empty($row['MMenuIdx']) === false)
                                <div class="form-group form-group-sm no-border-bottom">
                                    <input type="checkbox" name="menu_idx[]" value="{{ $row['MMenuIdx'] }}" data-group-menu-idx="{{ $row['GroupMenuIdx'] }}" data-parent-menu-idx="{{ $row['MParentMenuIdx'] }}" class="flat menu-depth2" @if($row['MMenuIdx']==$row['RMMenuIdx'])checked="checked"@endif/> {{ $row['MMenuName'] }}
                                </div>
                                @endif
                            </td>
                            <td>
                                @if(empty($row['SMenuIdx']) === false)
                                <div class="form-group form-group-sm no-border-bottom">
                                    <input type="checkbox" name="menu_idx[]" value="{{ $row['SMenuIdx'] }}" data-group-menu-idx="{{ $row['GroupMenuIdx'] }}" data-parent-menu-idx="{{ $row['SParentMenuIdx'] }}" class="flat menu-depth3" @if($row['SMenuIdx']==$row['RSMenuIdx'])checked="checked"@endif/> {{ $row['SMenuName'] }}
                                </div>
                                @endif
                            </td>
                            <td>{{ $row['LastMenuUrl'] }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="ln_solid"></div>
                <div class="text-center clear">
                    <button type="submit" class="btn btn-success mr-10" id="btn_menu_regist">저장</button>
                    <button class="btn btn-primary btn_list" type="button">목록</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        var $regi_form = $('#regi_form');
        var $datatable;
        var $list_menu_table = $('#list_menu_table');

        $(document).ready(function() {
            // 권한유형/메뉴정보 정보 저장
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/btob/btobRole/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/btob/btobRole/create/') }}' + ret.ret_data.role_idx + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 메뉴 정보 datatable setting
            $datatable = $list_menu_table.DataTable({
                ajax: false,
                paging: false,
                dom: 'T<"clear">rtip',
                rowsGroup: ['.rowspan']
            });
            
            // 메뉴 선택에 따른 체크박스 설정
            // GNB-2depth 메뉴 선택
            $regi_form.find('.menu-depth1').on('ifChanged', function() {
                // 하위 메뉴 전체 선택/해제
                $regi_form.find('[data-group-menu-idx="' + $(this).val() + '"]').prop('checked', $(this).is(':checked')).iCheck('update');

                // 같은 레벨의 동일 메뉴 선택/해제
                $regi_form.find('.menu-depth1[value="' + $(this).val() + '"]').prop('checked', $(this).is(':checked')).iCheck('update');
            });

            // LNB-3depth 메뉴 선택
            $regi_form.find('.menu-depth2').on('ifChanged', function() {
                // 같은 레벨의 동일 메뉴 선택/해제
                $regi_form.find('.menu-depth2[value="' + $(this).val() + '"]').prop('checked', $(this).is(':checked')).iCheck('update');

                // 하위 메뉴 전체 선택/해제
                $regi_form.find('[data-parent-menu-idx="' + $(this).val() + '"]').prop('checked', $(this).is(':checked')).iCheck('update');

                // 그룹 메뉴 선택/해제
                var is_checked = $regi_form.find('.menu-depth2[data-group-menu-idx="' + $(this).data('group-menu-idx') + '"]:checked').length > 0;
                $regi_form.find('.menu-depth1[value="' + $(this).data('parent-menu-idx') + '"]').prop('checked', is_checked).iCheck('update');
            });

            // LNB-4depth 메뉴 선택
            $regi_form.find('.menu-depth3').on('ifChanged', function() {
                // 상위 메뉴 선택/해제
                var is_checked = $regi_form.find('.menu-depth3[data-parent-menu-idx="' + $(this).data('parent-menu-idx') + '"]:checked').length > 0;
                $regi_form.find('.menu-depth2[value="' + $(this).data('parent-menu-idx') + '"]').prop('checked', is_checked).iCheck('update');

                // 그룹 메뉴 선택/해제
                var is_group_checked = $regi_form.find('.menu-depth2[data-group-menu-idx="' + $(this).data('group-menu-idx') + '"]:checked').length > 0;
                $regi_form.find('.menu-depth1[value="' + $(this).data('group-menu-idx') + '"]').prop('checked', is_group_checked).iCheck('update');
            });

            // 목록 버튼 클릭
            $('.btn_list').click(function() {
                location.replace('{{ site_url('/sys/btob/btobRole/index') }}' + getQueryString());
            });
        });
    </script>
@stop
