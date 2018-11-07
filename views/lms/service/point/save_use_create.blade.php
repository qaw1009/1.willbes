@extends('lcms.layouts.master_modal')

@section('layer_title')
    {{ $is_direct === true ? '적립/차감바로등록' : '적립/차감일괄등록' }}
@stop

@section('layer_header')
    <form class="form-horizontal" id="_regi_form" name="_regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
@endsection

@section('layer_content')
    <div class="row">
    @if($is_direct === true)
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 회원정보</p>
        </div>
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>회원번호</th>
                    <th>회원가입일</th>
                    <th>회원명 (성별)</th>
                    <th>아이디</th>
                    <th>휴대폰번호 (수신여부)</th>
                    <th>E-mail주소 (수신여부)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $mem_data['MemIdx'] }} ({{ $mem_data['SiteName'] }})</td>
                    <td>{{ $mem_data['JoinDate'] }}</td>
                    <td><u>{{ $mem_data['MemName'] }} ({{ $mem_data['Sex'] == 'M' ? '남' : '여' }})</u></td>
                    <td>{{ $mem_data['MemId'] }}</td>
                    <td>{{ $mem_data['Phone'] }} ({{ $mem_data['SmsRcvStatus'] }})</td>
                    <td>{{ $mem_data['Mail'] }} ({{ $mem_data['MailRcvStatus'] }})</td>
                </tr>
                </tbody>
            </table>
            <input type="hidden" name="mem_idx[]" value="{{ $mem_idx }}"/>
        </div>
    @endif
        <div class="col-md-12">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 적립/차감등록</p>
        </div>
        <div class="col-md-12">
            <div class="form-group form-group-sm bdt-line">
                <label class="control-label col-md-2">적립/차감대상 <span class="required">*</span>
                </label>
                <div class="col-md-9 form-inline">
                    <div class="inline-block item">
                        {!! html_site_select('', 'site_code', 'site_code', '', '운영 사이트', 'required') !!}
                    </div>
                    <div class="inline-block ml-30 item">
                        <input type="radio" id="point_type_1" name="point_type" class="flat" value="lecture" title="포인트구분" checked="checked" required="required"/> <label for="point_type_1" class="input-label">강좌</label>
                        <input type="radio" id="point_type_2" name="point_type" class="flat" value="book"/> <label for="point_type_2" class="input-label">교재</label>
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">적립/차감선택 <span class="required">*</span>
                </label>
                <div class="col-md-9 item">
                    <input type="radio" id="save_use_1" name="save_use" class="flat" value="save" title="적립/차감선택" required="required"/> <label for="save_use_1" class="input-label">적립</label>
                    <input type="radio" id="save_use_2" name="save_use" class="flat" value="use"/> <label for="save_use_2" class="input-label">차감</label>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">적립/차감사유 <span class="required">*</span>
                </label>
                <div class="col-md-9">
                    <div class="inline-block item">
                        <select class="form-control" id="reason_ccd" name="reason_ccd" required="required" title="적립/차감사유">
                            <option value="">선택</option>
                            @foreach($arr_reason_ccd as $group_key => $ccds)
                                @foreach($ccds as $key => $val)
                                    <option value="{{ $key }}" class="{{ array_search($group_key, $arr_reason_group_ccd) }} hide">{{ $val }}</option>
                                @endforeach
                            @endforeach
                        </select>
                    </div>
                    <div class="item">
                        <input type="text" id="etc_reason" name="etc_reason" class="form-control mt-5" title="기타사유" value="" disabled="disabled">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">유효기간
                </label>
                <div class="col-md-9 form-inline">
                    <div class="input-group mb-0 item">
                        <input type="text" class="form-control datepicker" id="valid_start_date" name="valid_start_date" required="required_if:save_use,save" title="유효시작일자" readonly="readonly" value="{{ date('Y-m-d') }}">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <input type="text" class="form-control datepicker" id="valid_end_date" name="valid_end_date" required="required_if:save_use,save" title="유효종료일자" readonly="readonly" value="{{ date('Y-m-t') }}">
                    </div>
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">적립/차감포인트 <span class="required">*</span>
                </label>
                <div class="col-md-3 item">
                    <input type="number" id="point_amt" name="point_amt" class="form-control" title="적립/차감포인트" required="required" data-validate-minmax="1" value="">
                </div>
            </div>
            <div class="form-group form-group-sm">
                <label class="control-label col-md-2">등록자
                </label>
                <div class="col-md-3 item">
                    <p class="form-control-static pl-0">{{ sess_data('admin_name') }}</p>
                </div>
            </div>
        </div>
    @if($is_direct === false)
        <div class="col-md-12 mt-30">
            <p class="pl-5"><i class="fa fa-check-square-o"></i> 회원등록</p>
        </div>
        <div class="col-md-12">
            <div class="form-group form-group-sm bdt-line">
                <label class="control-label col-md-2" for="search_mem_type_1">등록구분 <span class="required">*</span>
                </label>
                <div class="col-md-3 item">
                    <div class="radio">
                        <input type="radio" id="search_mem_type_1" name="search_mem_type" class="flat" value="S" title="등록구분" required="required" checked="checked"/> <label for="search_mem_type_1" class="input-label">개별등록</label>
                        <input type="radio" id="search_mem_type_2" name="search_mem_type" class="flat" value="F"/> <label for="search_mem_type_2" class="input-label">일괄등록</label>
                    </div>
                </div>
                <div class="col-md-7">
                    <p class="form-control-static red bold"># 포인트 차감은 회원 1명씩만 처리가 가능합니다.</p>
                </div>
            </div>
            <div id="search_mem_type_S" class="form-group form-group-sm form-regi-input">
                <label class="control-label col-md-2" for="search_mem_id">개별등록
                </label>
                <div class="col-md-10 form-inline">
                    <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="" style="width: 180px;">
                    <button type="button" name="btn_member_search" data-result-type="multiple" class="btn btn-primary btn-sm mb-0">회원검색</button>
                    <span id="selected_member" class="pl-10"></span>
                </div>
            </div>
            <div id="search_mem_type_F" class="form-group form-regi-input hide">
                <label class="control-label col-md-2" for="search_mem_file">일괄등록
                </label>
                <div class="col-md-10 form-inline">
                    <input type="file" id="search_mem_file" name="search_mem_file" class="form-control input-sm" title="회원검색파일" value="">
                    <button type="button" name="btn_member_file_upload" class="btn btn-primary btn-sm mb-0">업로드하기</button>
                    <span id="selected_member_file" class="hide"></span>
                </div>
                <div class="col-md-10 col-md-offset-2 mt-5">
                    <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
                </div>
                <div class="col-md-3 col-md-offset-2 mt-5">
                    <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4">
                    </select>
                </div>
                <div class="col-md-3">
                    <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
                </div>
            </div>
        </div>
    @endif
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $_regi_form = $('#_regi_form');

        $(document).ready(function() {
            // 적립/차감 선택
            $_regi_form.on('ifChanged', 'input[name="save_use"]:checked', function() {
                var save_use = $(this).val();

                if (save_use === 'save') {
                    $_regi_form.find('button[name="btn_member_search"]').data('result-type', 'multiple');
                    $_regi_form.find('#search_mem_type_2').iCheck('enable');
                    $_regi_form.find('.SaveReason').removeClass('hide');
                    $_regi_form.find('.UseReason').addClass('hide');
                    $_regi_form.find('input[name="valid_start_date"]').prop('disabled', false);
                    $_regi_form.find('input[name="valid_end_date"]').prop('disabled', false);
                } else {
                    $_regi_form.find('button[name="btn_member_search"]').data('result-type', 'single');
                    $_regi_form.find('#search_mem_type_2').iCheck('disable');
                    $_regi_form.find('#search_mem_type_1').iCheck('check');
                    $_regi_form.find('.SaveReason').addClass('hide');
                    $_regi_form.find('.UseReason').removeClass('hide');
                    $_regi_form.find('input[name="valid_start_date"]').prop('disabled', true);
                    $_regi_form.find('input[name="valid_end_date"]').prop('disabled', true);
                    $_regi_form.find('#selected_member').html('');  // 차감일 경우 기존 등록한 회원 초기화
                }

                $_regi_form.find('select[name="reason_ccd"]').val('');  // 이미 선택된 적립/차감사유 초기화
            });

            // 적립/차감 기타 사유 선택
            $_regi_form.on('change', 'select[name="reason_ccd"]', function() {
                var reason_ccd = $(this).val();

                if (reason_ccd.indexOf('999') > -1) {
                    $_regi_form.find('input[name="etc_reason"]').prop('disabled', false);
                    $_regi_form.find('input[name="etc_reason"]').focus();
                } else {
                    $_regi_form.find('input[name="etc_reason"]').prop('disabled', true);
                }
            });

            // 적립/차감 등록
            $_regi_form.submit(function() {
                var _url = '{{ site_url('/service/point/saveUse/store') }}';
                ajaxSubmit($_regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $("#pop_modal").modal('toggle');
                        $datatable.draw();
                    }
                }, showValidateError, addValidate, false, 'alert');
            });

            function addValidate() {
                if ($_regi_form.find('input[name="mem_idx[]"]').length < 1) {
                    alert('적립/차감할 회원을 선택해 주세요.');
                    return false;
                }

                if ($_regi_form.find('select[name="reason_ccd"]').val().indexOf('999') > -1 && $_regi_form.find('input[name="etc_reason"]').val().trim().length < 1) {
                    alert('적립/차감 기타사유를 입력해 주세요.');
                    $_regi_form.find('input[name="etc_reason"]').focus();
                    return false;
                }

                if (!confirm('해당 포인트 정보를 등록하시겠습니까?')) {
                    return false;
                }

                return true;
            }
        });
    </script>
@stop

@section('add_buttons')
    <button type="submit" name="_btn_regist" class="btn btn-success">등록</button>
@endsection

@section('layer_footer')
    </form>
@endsection