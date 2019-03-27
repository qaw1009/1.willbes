@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/pay') }}">결제/취소</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/index/deposit') }}" class="cs-pointer"><strong>가상계좌입금통보</strong></a></li>
    </ul>
    <h5>- 결제 관련 로그를 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">주문검색</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control mr-10" id="search_keyword" name="search_keyword">
                            <option value="OrderNo">주문번호</option>
                            <option value="PgMid">상점아이디</option>
                            <option value="PgTid">Tid</option>
                            <option value="VBankAccountNo">가상계좌번호</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width: 260px;">
                    </div>
                    <div class="col-md-2">
                        <div class="checkbox">
                            <input type="checkbox" id="search_chk_is_error" name="search_chk_is_error" class="flat" value="Y"/>
                            <label for="search_chk_is_error" class="input-label"><span class="red pull-none ml-0">연동오류만 보기</span></label>
                        </div>
                    </div>
                    <label class="control-label col-md-1" for="search_pay_type">구분</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_pg_mid" name="search_pg_mid">
                            <option value="">상점아이디</option>
                            <option value="willbes015">동영상(willbes015)</option>
                            <option value="willbes515">교재(willbes515)</option>
                            <option value="INIpayTest">테스트상점아이디</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_start_date">등록날짜</label>
                    <div class="col-md-5 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>주문번호</th>
                    <th>전문번호</th>
                    <th>상점아이디</th>
                    <th>Tid</th>
                    <th>입금금액</th>
                    <th>입금은행코드</th>
                    <th>입금계좌번호</th>
                    <th>입금은행명</th>
                    <th>입금자명</th>
                    <th>입금일시</th>
                    <th>에러메시지</th>
                    <th>등록일시</th>
                    <th>등록아이피</th>
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
            // 기간 조회 디폴트 셋팅
            setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/sys/payLog/listAjax/' . $log_type) }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ErrorMsg !== null) {
                        $(row).addClass("danger");
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo'},
                    {'data' : 'MsgSeq'},
                    {'data' : 'PgMid'},
                    {'data' : 'PgTid'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'VBankCode'},
                    {'data' : 'VBankAccountNo'},
                    {'data' : 'DepositBankName'},
                    {'data' : 'DepositName'},
                    {'data' : 'DepositDatm'},
                    {'data' : 'ErrorMsg'},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegIp'}
                ]
            });
        });
    </script>
@stop
