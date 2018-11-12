@extends('lcms.layouts.master')
@section('content')
    <h5>- TM을 진행한 회원들의 결제/환불 내역을 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}

                        <select class="form-control" id="PayStatusCcd" name="PayStatusCcd">
                            <option value="">결제상태</option>
                            @foreach($PayStatusCcd  as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="AssignAdminIdx" name="AssignAdminIdx" @if(sess_data('admin_auth_data')['Role']['RoleIdx'] == '1010') disabled="disabled"@endif>
                            <option value="">TM담당자</option>
                            @foreach($AssignAdmin  as $row)
                                <option value="{{ $row['wAdminIdx'] }}">{{ $row['wAdminName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value" style="width:200px">
                        <p class="form-control-static">아이디, 이름, 연락처 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="StartDate">기간검색 검색</label>
                    <div class="col-md-4 form-inline">
                        <select name="DateType" id="DateType" class="form-control input-sm" >
                            <option value="">결제완료일</option>
                            <option value="">환불완료일</option>
                            <option value="">배정일</option>
                            <option value="">최종상담일</option>
                        </select>
                        <input name="StartDate"  class="form-control datepicker" id="StartDate" style="width: 100px;"  type="text"  value="" >
                        ~ <input name="EndDate"  class="form-control datepicker" id="EndDate" style="width: 100px;"  type="text"  value="" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="33%">판매금액</th>
                    <th width="33%">결제금액(건수)</th>
                    <th width="33%">환불금액(건수)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="150">회원정보</th>
                    <th width="100">주문번호</th>
                    <th width="150">결제완료일</th>
                    <th width="">상품명</th>
                    <th width="100">결제금액</th>
                    <th width="100">환불금액</th>
                    <th width="150">결제상태</th>
                    <th width="100">TM담당자</th>
                    <th width="100">배정일</th>
                    <th width="100">최종상담일</th>
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

        $(document).ready(function() {

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                ],
                ajax: {
                    'url' : '{{ site_url('/crm/tm/TmOrder/OrderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'AssignCcd_Name'},
                    {'data' : 'MemName'},
                    {'data' : 'MemId'},
                    {'data' : 'Phone'},
                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'LastCousultDate'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="#" class="btn-modify btn_mem_info" data-idx="' + data.MemIdx + '" data-taidx="' + data.TaIdx + '"><u>등록</u></a>';
                        }}
                ]
            });

            $list_table.on('click', '.btn_mem_info', function() {
                var url = '{{ site_url('/crm/tm/consult/') }}'+$(this).data('idx')+'/'+$(this).data('taidx');
                $('.btn_mem_info').setLayer({
                    'url' : url,
                    'width' : 1100,
                    'modal_id' : 'assignMemberInfo'
                });
            });



        });
    </script>
@stop