@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/index/pay') }}" class="cs-pointer"><strong>결제/취소</strong></a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/deposit') }}">가상계좌입금통보</a></li>
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
                            <option value="ApprovalNo">승인번호</option>
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
                        <select class="form-control mr-10" id="search_pay_type" name="search_pay_type">
                            <option value="">연동구분</option>
                            <option value="PA">결제요청</option>
                            <option value="CA">결제취소</option>
                            <option value="NC">망취소</option>
                            <option value="RP">부분환불</option>
                        </select>
                        <select class="form-control mr-10" id="search_pay_method" name="search_pay_method">
                            <option value="">결제방법</option>
                            <option value="Card">신용카드</option>
                            <option value="DirectBank">실시간계좌이체</option>
                            <option value="VBank">가상계좌(무통장입금)</option>
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
                    <th class="valign-middle">No</th>
                    <th class="valign-middle">주문번호</th>
                    <th class="valign-middle">결제구분</th>
                    <th class="valign-middle">상점아이디</th>
                    <th class="valign-middle">Tid<br/>(부분환불Tid)</th>
                    <th class="valign-middle">결제수단</th>
                    <th class="valign-middle">결제상세코드</th>
                    <th class="valign-middle">결제(취소)금액<br/>(부분환불남은금액)</th>
                    <th class="valign-middle">승인번호</th>
                    <th class="valign-middle">승인일시</th>
                    <th class="valign-middle">결과코드</th>
                    <th class="valign-middle">결과메시지</th>
                    <th class="valign-middle">요청사유</th>
                    <th class="valign-middle">등록일시</th>
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
                    if (data.ResultCode !== '0000' && data.ResultCode !== '00') {
                        $(row).addClass("danger");
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo'},
                    {'data' : 'PayType', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.PayType[data];
                    }},
                    {'data' : 'PgMid'},
                    {'data' : 'PgTid', 'render' : function(data, type, row, meta) {
                        return data + (row.ResultPgTid !== null ? '<br/>' + row.ResultPgTid : '');
                    }},
                    {'data' : 'PayMethod'},
                    {'data' : 'PayDetailCode'},
                    {'data' : 'ReqPayPrice', 'render' : function(data, type, row, meta) {
                        return (data != null ? addComma(data) : '') + (row.ResultPayPrice !== null ? '<br/>' + addComma(row.ResultPayPrice) : '');
                    }},
                    {'data' : 'ApprovalNo'},
                    {'data' : 'ApprovalDatm'},
                    {'data' : 'ResultCode'},
                    {'data' : 'ResultMsg'},
                    {'data' : 'ReqReason'},
                    {'data' : 'RegDatm'}
                ]
            });
        });
    </script>
@stop
