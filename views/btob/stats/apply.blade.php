@extends('btob.layouts.master_modal')

@section('layer_title')
    진행상태별 회원현황
@stop

@section('layer_header')
    <form class="form-horizontal" id="_search_form" name="_search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_param as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
@endsection

@section('layer_content')
    <div class="row mt-10">
        <div class="col-md-12">
            <span class="blue bold">검색정보</span> -
            <span class="bold">[연령대]</span> <span class="pr-10">{{ $arr_search_info['age'] }}</span>
            <span class="bold">[성별]</span> <span class="pr-10">{{ $arr_search_info['sex'] }}</span>
            <span class="bold">[기간]</span> <span class="pr-10">{{ $arr_search_info['date'] }}</span>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered mt-15">
                <thead>
                    <tr class="bg-odd">
                        <th>[지역] 지점</th>
                        <th><span id="txt_approval_status_A">수강신청(인증신청)</span>건수</th>
                        <th><span id="txt_approval_status_Y">수강지급(승인완료)</span> 건수</th>
                        <th><span id="txt_approval_status_R">승인반려</span> 건수</th>
                        <th><span id="txt_approval_status_E">수강완료(승인만료)</span> 건수</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[{{ $data['AreaCcdName'] }}] {{ $data['BranchCcdName'] }}</td>
                        <td><a href="#none" class="btn-modal-apply-list" data-approval-status="A"><u>{{ number_format($data['ApprovalApplyCnt']) }}건</u></a></td>
                        <td><a href="#none" class="btn-modal-apply-list" data-approval-status="Y"><u>{{ number_format($data['ApprovalCompleteCnt']) }}건</u></a></td>
                        <td><a href="#none" class="btn-modal-apply-list" data-approval-status="R"><u>{{ number_format($data['ApprovalRejectCnt']) }}건</u></a></td>
                        <td><a href="#none" class="btn-modal-apply-list" data-approval-status="E"><u>{{ number_format($data['ApprovalExpireCnt']) }}건</u></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-10">
        <div class="col-md-12">
            <p class="pl-5 bold"><i class="fa fa-check-square-o"></i> <span id="selected_approval_status_txt" class="blue"></span> 회원 현황 (<span id="selected_approval_status_cnt">0건</span>)</p>
        </div>
        <div class="col-md-12">
            <table id="_list_ajax_table" class="table table-striped table-bordered">
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
                    <th class="valign-middle">수강기간</th>
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
        var $datatable_modal;
        var $search_form_modal = $('#_search_form');
        var $list_table_modal = $('#_list_ajax_table');

        $(document).ready(function() {
            // 선택된 진행상태명, 건수 표시
            var setApprovalStatusInfo = function() {
                var search_approval_status = $search_form_modal.find('input[name="search_approval_status"]').val();
                var approval_status_txt = $('#txt_approval_status_' + search_approval_status).html();
                var approval_status_cnt = $search_form_modal.find('.btn-modal-apply-list[data-approval-status="' + search_approval_status + '"]').html();

                $('#selected_approval_status_txt').html(approval_status_txt);
                $('#selected_approval_status_cnt').html(approval_status_cnt);
            };
            setApprovalStatusInfo();

            // 진행상태별 회원현황 목록
            $datatable_modal = $list_table_modal.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-apply-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/stats/certBranch/applyAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form_modal.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_modal.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ApplySeq'},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone + '<br/>' + row.BirthDay + '(' + row.SexKr + ')';
                    }},
                    {'data' : 'AreaCcdName'},
                    {'data' : 'BranchCcdName'},
                    {'data' : 'RegDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 16);
                    }},
                    {'data' : 'TakeKindCcdName'},
                    {'data' : 'ProdName'},
                    {'data' : 'LecStartDate', 'render' : function(data, type, row, meta) {
                        return data !== null ? data + '~' + row.LecEndDate : '';
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

            // 진행상태별 클릭
            $search_form_modal.on('click', '.btn-modal-apply-list', function() {
                $search_form_modal.find('input[name="search_approval_status"]').val($(this).data('approval-status'));
                $datatable_modal.draw();
            });

            // 진행상태별 회원현황 엑셀다운로드 버튼 클릭
            $('.btn-apply-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/stats/certBranch/applyExcel') }}', $search_form_modal.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop

@section('add_buttons')
@endsection

@section('layer_footer')
    </form>
@endsection