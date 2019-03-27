@extends('lcms.layouts.master')

@section('content')
    <h5>- 결제 시 할인 적용될 쿠폰을 발행하는 메뉴입니다. (쿠폰발급 페이지에서 사용내역 확인 가능)</h5>
    <div class="x_panel">
        <div class="x_title">
            <h2>쿠폰 발급</h2>
            <div class="pull-right">
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            {!! form_errors() !!}
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰정보</strong></h4>
                </div>
                <div class="col-md-12">
                    <table id="list_coupon_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>운영사이트</th>
                            <th>카테고리</th>
                            <th>쿠폰명</th>
                            <th>배포루트</th>
                            <th>쿠폰유형</th>
                            <th>핀번호유형<br/>(발급개수)</th>
                            <th>적용구분</th>
                            <th>적용상세구분</th>
                            <th>적용범위</th>
                            <th>사용기간<br/>(유효기간)</th>
                            <th>유효여부</th>
                            <th>할인율<br/>(할인금액)</th>
                            <th>사용 / 발급</th>
                            <th>발급여부</th>
                            <th>등록자</th>
                            <th>등록일</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $data['SiteName'] }}</td>
                            <td>{{ $data['CateName'] }}</td>
                            <td><u class="blue">{{ $data['CouponName'] }}</u> [{{ $data['CouponIdx'] }}]</td>
                            <td>{{ $data['DeployName'] }}</td>
                            <td>{{ $data['CouponTypeName'] }}</td>
                            <td>{{ $data['PinName'] }}@if($data['PinType'] == 'R')<br/>({{ $data['PinIssueCnt'] }}개)@endif</td>
                            <td>{{ $data['ApplyTypeName'] }}</td>
                            <td>{{ $data['LecTypeNames'] }}</td>
                            <td>{{ $data['ApplyRangeName'] }}</td>
                            <td>{{ $data['ValidDay'] }}일<br/>({{ $data['IssueStartDate'] }}~{{ $data['IssueEndDate'] }})</td>
                            <td>@if($data['IssueValid'] != '유효')<a class="red">{{ $data['IssueValid'] }}</a>@else{{ $data['IssueValid'] }}@endif</td>
                            <td>{{ $data['DiscRate'] }}@if($data['DiscType'] == 'R')%@else원@endif</td>
                            <td><a class="red">{{ $data['UseCnt'] }}</a> / {{ $data['IssueCnt'] }}</td>
                            <td>@if($data['IsIssue'] == 'Y')발급@else<a class="red">미발급</a>@endif</td>
                            <td>{{ $data['RegAdminName'] }}</td>
                            <td>{{ $data['RegDatm'] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰발급</strong></h4>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" id="regi_form" name="regi_form" method="POST" enctype="multipart/form-data" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" name="coupon_idx" value="{{ $coupon_idx }}" required="required" title="쿠폰 식별자"/>
                        <div class="bdt-line"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_mem_type_1">등록구분 <span class="required">*</span>
                            </label>
                            <div class="col-md-10 item">
                                <div class="radio">
                                    <input type="radio" id="search_mem_type_1" name="search_mem_type" class="flat" value="S" title="등록구분" required="required" checked="checked"/> <label for="search_mem_type_1" class="input-label">개별등록</label>
                                    <input type="radio" id="search_mem_type_2" name="search_mem_type" class="flat" value="F"/> <label for="search_mem_type_2" class="input-label">일괄등록</label>
                                </div>
                            </div>
                        </div>
                        <div id="search_mem_type_S" class="form-group form-regi-input">
                            <label class="control-label col-md-1" for="search_mem_id">개별등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="text" id="search_mem_id" name="search_mem_id" class="form-control" title="회원검색어" value="" style="width: 180px;">
                                <button type="button" name="btn_member_search" data-result-type="multiple" class="btn btn-primary mb-0">회원검색</button>
                                <span id="selected_member" class="pl-10"></span>
                            </div>
                        </div>
                        <div id="search_mem_type_F" class="form-group form-regi-input hide">
                            <label class="control-label col-md-1" for="search_mem_file">일괄등록
                            </label>
                            <div class="col-md-10 form-inline">
                                <input type="file" id="search_mem_file" name="search_mem_file" class="form-control" title="회원검색파일" value="">
                                <button type="button" name="btn_member_file_upload" class="btn btn-primary mb-0">업로드하기</button>
                                <span id="selected_member_file" class="hide"></span>
                            </div>
                            <div class="col-md-10 col-md-offset-1 mt-5">
                                <p class="form-control-static"># 첨부파일은 한줄에 한 개의 아이디로 구성된 TXT 파일로 생성</p>
                            </div>
                            <div class="col-md-2 col-md-offset-1 mt-5">
                                <select class="form-control" id="selected_member_file2" name="selected_member_file2" size="4">
                                </select>
                            </div>
                            <div class="col-md-2">
                                <p class="form-control-static">&lt;총 <span id="selected_member_cnt">0</span>명&gt;</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mr-10">쿠폰발급</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>쿠폰발급내역/사용내역</strong></h4>
                </div>
                <div class="col-md-12">
                    <form class="form-horizontal form-label-left" id="search_form" name="search_form" method="POST" onsubmit="return false;" novalidate>
                        {!! csrf_field() !!}
                        <input type="hidden" name="search_coupon_idx" value="{{ $coupon_idx }}"/>
                        <div class="bdt-line"></div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_member_value">회원검색
                            </label>
                            <div class="col-md-3">
                                <input type="text" id="search_member_value" name="search_member_value" class="form-control" value="">
                            </div>
                            <div class="col-md-7">
                                <p class="form-control-static"># 이름, 아이디, 휴대폰번호 검색 가능</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-1" for="search_issue_type">쿠폰조건검색
                            </label>
                            <div class="col-md-10 form-inline">
                                <select class="form-control mr-10" id="search_issue_type" name="search_issue_type">
                                    <option value="">발급구분</option>
                                    @foreach($arr_issue_type_ccd as $key => $val)
                                        <option value="{{ $key }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                                <select class="form-control mr-10" id="search_is_use" name="search_is_use">
                                    <option value="">쿠폰사용여부</option>
                                    <option value="Y">사용</option>
                                    <option value="N">미사용</option>
                                </select>
                                <select class="form-control mr-10" id="search_valid_status" name="search_valid_status">
                                    <option value="">쿠폰유효여부</option>
                                    <option value="Y">유효</option>
                                    <option value="N">만료</option>
                                    <option value="C">취소</option>
                                </select>
                                <div class="checkbox ml-10">
                                    <input type="checkbox" id="search_is_retire" name="search_is_retire" class="flat" value="Y"/> <label for="search_is_retire" class="input-label">발급회수쿠폰</label>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="list_ajax_table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></th>
                            <th>No</th>
                            <th>쿠폰핀번호</th>
                            <th>회원명 (아이디)</th>
                            <th>휴대폰번호</th>
                            <th>발급구분</th>
                            <th>발급일 (발급자)</th>
                            <th>유효여부 (만료일)</th>
                            <th>사용여부 (사용일)</th>
                            <th>사용상품 (주문번호)</th>
                            <th>발급회수일 (회수자)</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="ln_solid"></div>
            <div class="text-center">
                <button class="btn btn-primary" type="button" id="btn_list">목록</button>
            </div>
        </div>
    </div>
    <script src="/public/js/lms/search_member.js"></script>
    <script type="text/javascript">
        var $datatable;
        var $regi_form = $('#regi_form');
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            // 쿠폰발급
            $regi_form.submit(function() {
                if($regi_form.find('input[name="mem_idx[]"]').length < 1) {
                    alert('회원 선택은 필수입니다.');
                    return false;
                }

                if (!confirm('해당 회원에게 쿠폰을 발급하시겠습니까?')) {
                    return;
                }

                var _url = '{{ site_url('/service/coupon/issue/store') }}';
                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.reload();
                    }
                }, showValidateError, null, false, 'alert');
            });

            // 쿠폰발급 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-undo mr-5"></i> 쿠폰발급회수', className: 'btn-sm btn-success border-radius-reset mr-15 btn-retire' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/coupon/issue/listAjax/' . ($data['PinType'] != 'N' ? 'pins' : '')) }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'CdIdx', 'render' : function(data, type, row, meta) {
                        var is_retireable = row.IsUse === 'Y' || row.RetireDatm != null ? 'N' : 'Y';

                        return (data !== null) ? '<input type="checkbox" name="cd_idx" class="flat target-crm-member" value="' + data + '" data-idx="' + row.CouponIdx + '" data-is-retireable="' + is_retireable + '" data-mem-idx="' + row.MemIdx + '">' +
                            (is_retireable === 'N' ? '<br/><span class="pt-5">회수불가</span>' : '') : '';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'CouponPin'},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? data + ' (<u class="blue">' + row.MemId + '</u>)' : '';
                    }},
                    {'data' : 'Phone', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? data + ' (' + row.SmsRcvStatus + ')' : '';
                    }},
                    {'data' : 'IssueTypeName'},
                    {'data' : 'IssueDatm', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? data.substr(0, 10) + '<br/>(' + row.IssueUserName + ')' : '';
                    }},
                    {'data' : 'ValidStatus', 'render' : function(data, type, row, meta) {
                        return ((data !== 'Y') ? '<span class="red">' + row.ValidStatusName + '</span>' : row.ValidStatusName) + '<br/>(' + row.ExpireDatm.substr(0, 10) + ')';
                    }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? ((data === 'Y') ? '사용 (' + row.UseDatm.substr(0, 16) + ')' : '<span class="red">미사용</span>') : '';
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? ((row.IsUse === 'Y') ? data + '<br/>(<u class="blue">' + row.OrderNo + '</u>)' : '') : '';
                    }},
                    {'data' : 'RetireDatm', 'render' : function(data, type, row, meta) {
                        return (data !== null) ? data.substr(0, 16) + '<br/>(' + row.RetireUserName + ')' : '';
                    }}
                ]
            });

            // 전체선택/해제
            $list_table.on('ifChanged', '#_is_all', function() {
                iCheckAll($list_table.find('input[name="cd_idx"]'), $(this));
            });

            // 쿠폰발급회수 버튼 클릭
            $('.btn-retire').on('click', function() {
                var $checked_cd_idx = $list_table.find('input[name="cd_idx"]:checked');
                var $params = {};
                $checked_cd_idx.each(function() {
                    if ($(this).data('is-retireable') === 'Y') {
                        $params[$(this).data('idx') + '::' + $(this).val()] = $(this).val();
                    }
                });

                if (Object.keys($params).length < 1) {
                    alert('선택된 쿠폰이 없습니다.');
                    return;
                }

                if (!confirm('해당 쿠폰을 회수하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'PUT',
                    'params' : JSON.stringify($params)
                };
                sendAjax('{{ site_url('/service/coupon/issue/retire') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/service/coupon/regist/index') }}' + getQueryString());
            });
        });
    </script>
@stop
