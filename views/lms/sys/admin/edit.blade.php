@extends('lcms.layouts.master')

@section('content')
    <h5>- 운영자 정보를 관리하는 메뉴입니다. (권한유형 설정만 가능하며, 운영자 정보 변경은 WBS에서만 가능합니다.)</h5>
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
            <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <input type="hidden" name="idx" value="{{ $idx }}"/>
                <div class="form-group">
                    <label class="control-label col-md-2">이름 (아이디)
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wAdminName'] }} ({{ substr($data['wAdminId'], 0, strlen($data['wAdminId'])-3) }}***)</p>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">소속 / 직급
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wAdminDeptCcdName'] }} / {{ $data['wAdminPositionCcdName'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">휴대폰번호
                    </label>
                    <div class="col-md-3">
                        <p class="form-control-static">{{ $data['wAdminPhone1'] }}-{{ $data['wAdminPhone2'] }}-{{ $data['wAdminPhone3'] }}</p>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">E-mail
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">{{ $data['wAdminMail'] }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="role_idx">메뉴권한유형 <span class="required">*</span>
                    </label>
                    <div class="col-md-3 item">
                        <select name="role_idx" id="role_idx" class="form-control" title="메뉴권한유형">
                            <option value="">권한미설정</option>
                            @foreach($roles as $key => $val)
                                <option value="{{ $key }}" @if($key == $data['RoleIdx']) selected="selected" @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-2 col-md-offset-1">사용여부
                    </label>
                    <div class="col-md-4">
                        <p class="form-control-static">@if($data['wIsUse']=='Y')사용@else<span class="red">미사용</span>@endif</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2">운영사이트/캠퍼스 권한부여 <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <table  class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>선택 [ 전체선택 <input type="checkbox" id="is_all_site" name="is_all_site" class="flat" value="Y"/> ]</th>
                                <th>운영 사이트</th>
                                <th>캠퍼스 선택</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arr_site_campus as $row)
                                @php $site_idx = $loop->index-1; @endphp
                                <tr>
                                    <td><input type="checkbox" name="site_code[{{ $site_idx }}]" class="flat site-code" value="{{ $row['SiteCode'] }}" @if($row['IsPermSite'] == 'Y')checked="checked"@endif data-site-idx="{{ $site_idx }}"/></td>
                                    <td>{{ $row['SiteName'] }}</td>
                                    <td>
                                    @if(empty($row['CampusCcds']) === false)
                                        <div class="radio">
                                            <div class="inline-block item">
                                                <input type="radio" id="all_campus_{{ $site_idx }}" name="is_all_campus[{{ $site_idx }}]" class="flat all-campus" value="Y" required="required_if:site_code[{{ $site_idx }}],{{ $row['SiteCode'] }}" title="캠퍼스 선택" data-site-idx="{{ $site_idx }}"/> <label for="all_campus_{{ $site_idx }}" class="input-label">전체</label>
                                                <input type="radio" id="selected_campus_{{ $site_idx }}" name="is_all_campus[{{ $site_idx }}]" class="flat selected-campus" value="N" data-site-idx="{{ $site_idx }}"/> <label for="selected_campus_{{ $site_idx }}" class="input-label">선택</label>
                                            </div>
                                            &nbsp; (&nbsp;
                                            <div class="inline-block item">
                                            @foreach($row['CampusCcds'] as $campus)
                                                <input type="checkbox" id="campus_ccd_{{ $row['SiteCode'] }}_{{ $campus[0] }}" name="campus_ccd[{{ $row['SiteCode'] }}][]" class="flat campus-ccd" value="{{ $campus[0] }}" @if($loop->index == 1) required="required_if:is_all_campus[{{ $site_idx }}],N" title="캠퍼스" @endif @if($campus[2] == 'Y')checked="checked"@endif data-site-idx="{{ $site_idx }}"/>
                                                <label for="campus_ccd_{{ $row['SiteCode'] }}_{{ $campus[0] }}" class="input-label">{{ $campus[1] }}</label>
                                            @endforeach
                                            </div> )
                                        </div>
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
            // 운영자정보 수정
            $regi_form.submit(function() {
                var _url = '{{ site_url('/sys/admin/store') }}';

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/sys/admin/index') }}' + getQueryString());
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 사이트 전체선택/해제
            $('#is_all_site').on('ifChanged', function() {
                if ($(this).prop('checked') === true) {
                    $('.site-code').iCheck('check');
                } else {
                    $('.site-code').iCheck('uncheck');
                }
            });

            // 사이트별 선택/해제에 따른 초기화
            $('.site-code').on('ifChanged', function() {
                var site_idx = $(this).data('site-idx');

                if ($(this).prop('checked') === true) {
                    $('#selected_campus_' + site_idx).prop('checked', true).iCheck('update');
                } else {
                    $('input[name="campus_ccd[' + $(this).val() + '][]"]').prop('checked', false).iCheck('update');
                    $('input[name="is_all_campus[' + site_idx + ']"]').prop('checked', false).iCheck('update');
                }
            });

            // 캠퍼스 전체/선택
            $('.all-campus').on('ifChecked', function() {
                var site_idx = $(this).data('site-idx');
                var site_code = $('input[name="site_code[' + site_idx + ']"]').val();
                iCheckAll('input[name="campus_ccd[' + site_code + '][]"]', '#all_campus_' + site_idx);
            });

            // 캠퍼스 선택이 하나라도 있는 경우 사이트 선택
            $('.all-campus, .selected-campus, .campus-ccd').on('ifChecked', function() {
                var site_idx = $(this).data('site-idx');
                $('input[name="site_code[' + site_idx + ']"]').prop('checked', true).iCheck('update');
            });

            // 캠퍼스별 선택/해제
            $('.campus-ccd').on('ifChanged ifCreated', function() {
                var site_idx = $(this).data('site-idx');
                var site_code = $('input[name="site_code[' + site_idx + ']"]').val();
                var input_cnt = $('input[name="campus_ccd[' + site_code + '][]"]').length;
                var checked_cnt = $('input[name="campus_ccd[' + site_code + '][]"]:checked').length;

                if (checked_cnt < 1) {
                    return;
                }

                if (input_cnt > checked_cnt) {
                    $('#all_campus_' + site_idx).prop('checked', false).iCheck('update');
                    $('#selected_campus_' + site_idx).prop('checked', true).iCheck('update');
                } else {
                    $('#all_campus_' + site_idx).prop('checked', true).iCheck('update');
                    $('#selected_campus_' + site_idx).prop('checked', false).iCheck('update');
                }
            });

            // 목록
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sys/admin/index') }}' + getQueryString());
            });
        });
    </script>
@stop
