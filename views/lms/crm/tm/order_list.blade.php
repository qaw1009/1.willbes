@extends('lcms.layouts.master')
@section('content')
    <h5>- TM을 진행한 회원들의 결제 내역을 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="row mt-20">
            <div class="col-md-2">
                <p>• TM 결제내역</p>
            </div>
            <div class="col-md-10 form-inline text-right">
                <button type="button" class="btn btn-default" id="btn_info" onclick="openWin('in_pop_modal')">TM 운영정책</button>
            </div>
        </div>
        @include('lms.crm.tm.tm_policy_partial')
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-10 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', '', '운영 사이트', '') !!}
                        <select class="form-control" id="AssignAdminIdx" name="AssignAdminIdx" @if(sess_data('admin_auth_data')['Role']['RoleIdx'] == '1010') disabled="disabled"@endif>
                            <option value="">TM담당자</option>
                            @foreach($AssignAdmin  as $row)
                                <option value="{{ $row['wAdminIdx'] }}">{{ $row['wAdminName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="search_learnpattern" name="search_learnpattern">
                            <option value="">학습형태</option>
                            @foreach($learnpattern_ccd  as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-4 form-inline">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value" style="width:200px">
                        <p class="form-control-static ml-20"># 아이디, 이름, 연락처 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-4 form-inline">
                        <select name="DateType" id="DateType" class="form-control" >
                            <option value="o.CompleteDatm">결제완료일</option>
                            <option value="tc1.AssignDatm">배정일</option>
                        </select>
                        <input name="StartDate"  class="form-control datepicker" id="StartDate" style="width: 100px;"  type="text"  value="{{date("Y-m-d", strtotime("-7 days"))}}" >
                        ~ <input name="EndDate"  class="form-control datepicker" id="EndDate" style="width: 100px;"  type="text"  value="{{date("Y-m-d", time())}}" >
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10 ">
        <div class="x_content col-md-4 ">

            <table class="table table-striped table-bordered" >
                <thead>
                <tr>
                    <th width="50%">결제금액</th>
                    <th width="50%">결제건수</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <span id="sum_price">0 원</span>
                    </td>
                    <td>
                        <span id="sum_count">0</span>
                    </td>

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
                    <th width="30">NO</th>
                    <th width="110">회원정보</th>
                    <th width="120">주문번호</th>
                    <th width="110">사이트</th>
                    <th width="110">결제완료일</th>
                    <th width="80">학습형태</th>
                    <th width="">상품명</th>
                    <th width="60">상품금액</th>
                    <th width="60">결제금액</th>
                    <th width="60">결제상태</th>
                    <th width="80">TM담당자</th>
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
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/crm/tm/TmOrder/orderListAjax') }}',
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
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return data.MemName + ' ('+data.MemId+')<BR>'+ data.Phone +'';
                        }},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return data.OrderNo;
                        }},
                    {'data' : 'SiteName'},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'LearnPatternCcd_Name'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return data.ProdName;
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(data.RealSalePrice)+'';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return addComma(data.RealPayPrice)+'';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return (data.PayStatusCcd != '676001') ? '<font color="red">'+data.PayStatusCcd_Name+'</font>' : data.PayStatusCcd_Name;
                        }},
                    {'data' : 'ConsultAdmin_Name'},
                    {'data' : 'AssignDatm'},
                    {'data' : 'ConsultDatm'}
                ]
            });

            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#sum_price').html('<b>'+addComma(json.sum_price) + ' 원</b>');
                $('#sum_count').html('<b>'+addComma(json.sum_count) + ' 건</b>');
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/crm/tm/TmOrder/orderListExcel/') }}', $search_form.serializeArray(), 'POST');
                }
            });

        });
    </script>
@stop