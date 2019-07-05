@extends('btob.layouts.master')

@section('content')
    <h5>- 회원 인증/수강관리를 진행하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_dept_ccd">조건검색</label>
                    <div class="col-md-10 form-inline">
                        @if(empty($arr_area_ccd) === false)
                            <select class="form-control" id="search_area_ccd" name="search_area_ccd">
                                <option value="">지역</option>
                                @foreach($arr_area_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_branch_ccd) === false)
                            <select class="form-control" id="search_branch_ccd" name="search_branch_ccd">
                                <option value="">지점</option>
                                @foreach($arr_branch_ccd as $row)
                                    <option value="{{ $row['BranchCcd'] }}" class="{{ $row['AreaCcd'] }}">{{ $row['BranchCcdName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                        <select class="form-control" id="search_take_kind_ccd" name="search_take_kind_ccd">
                            <option value="">수험직렬</option>
                            @foreach($arr_take_kind_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_approval_status" name="search_approval_status">
                            <option value="">진행상태</option>
                            @foreach($arr_approval_status as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1 col-md-offset-1" for="">날짜검색</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            @foreach($arr_search_date_type as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="valign-middle">No</th>
                    <th class="valign-middle">인증회차</th>
                    <th class="valign-middle">회원정보</th>
                    <th class="valign-middle">지역</th>
                    <th class="valign-middle">지점</th>
                    <th class="valign-middle">신청일</th>
                    <th class="valign-middle">수험직렬</th>
                    <th class="valign-middle">상품명</th>
                    <th class="valign-middle">승인관리</th>
                    <th class="valign-middle">진행상태</th>
                    <th>승인완료<br/>(반려)자</th>
                    <th>승인완료<br/>(반려)일</th>
                    <th>승인취소<br/>(만료)자</th>
                    <th>승인취소<br/>(만료)일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');
        var $json_approval_status = {!! json_encode($arr_approval_status) !!};  // 진행상태 코드

        $(document).ready(function() {
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/cert/apply/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ApplySeq'},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'AreaCcdName'},
                    {'data' : 'BranchCcdName'},
                    {'data' : 'RegDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 16);
                    }},
                    {'data' : 'TakeKindCcdName'},
                    {'data' : 'ProdName'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<a href="#none" class="btn-approval" data-idx="' + row.ApplyIdx + '"><u class="blue">[확인]</u></a>';
                    }},
                    {'data' : 'ApprovalStatus', 'render' : function(data, type, row, meta) {
                        return data === 'N' ? '<div class="red inline-block">' + $json_approval_status[data] + '</div>' : $json_approval_status[data];
                    }},
                    {'data' : 'ApprovalRejectAdminName', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : row.ApprovalAdminName;
                    }},
                    {'data' : 'ApprovalRejectDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : (row.ApprovalDatm !== null ? row.ApprovalDatm.substr(0, 16) : '');
                    }},
                    {'data' : 'ApprovalCancelAdminName', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : '';
                    }},
                    {'data' : 'ApprovalCancelDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data : (row.ApprovalExpireDatm !== null ? row.ApprovalExpireDatm.substr(0, 16) : '');
                    }}
                ]
            });

            // 지점 자동 변경
            $search_form.find('select[name="search_branch_ccd"]').chained("#search_area_ccd");

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/cert/apply/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-approval', function() {
                $('.btn-approval').setLayer({
                    'url' : '{{ site_url('/cert/apply/create') }}/' + $(this).data('idx'),
                    'width' : 900
                });
            });
        });
    </script>
@stop
