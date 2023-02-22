@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/pay') }}">결제/취소</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/card') }}">신용카드</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/bank') }}">계좌이체</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/method/vbank') }}" class="cs-pointer"><strong>가상계좌</strong></a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/deposit') }}">가상계좌입금통보</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/escrow') }}">에스크로</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/stats') }}">승인완료통계</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/cancelStats') }}">결제취소통계</a></li>
    </ul>
    <h5>- 가상계좌 입금대기/완료/취소/부분환불 연동 로그를 확인하는 메뉴입니다. (연동실패건 제외)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">주문검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_keyword" name="search_keyword" title="주문검색키워드">
                            <option value="OrderNo">주문번호</option>
                            <option value="PgMid">상점아이디</option>
                            <option value="PgTid">TID</option>
                            <option value="PayDetailCode">결제상세코드</option>
                        </select>
                        <input type="text" class="form-control" id="search_value" name="search_value" style="width: 260px;" title="주문검색어">
                    </div>
                    <label class="control-label col-md-1">구분</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_pg_driver" name="search_pg_driver" title="PG구분">
                            <option value="">PG구분</option>
                            @foreach($codes['PgDriver'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control selectpicker" id="search_pg_mid" name="search_pg_mid" title="상점아이디" data-size="10" data-live-search="true">
                            <option value="">상점아이디</option>
                            @foreach($codes['PgMid'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_type" name="search_pay_type" title="연동구분">
                            <option value="">연동구분</option>
                            @foreach($codes['PayType2'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
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
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off" title="조회시작일">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off" title="조회종료일">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
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
                    <th class="valign-middle">PG구분</th>
                    <th class="valign-middle">결제구분</th>
                    <th class="valign-middle">상점아이디</th>
                    <th class="valign-middle">TID</th>
                    <th class="valign-middle">결제상세코드</th>
                    <th class="valign-middle">신청금액</th>
                    <th class="valign-middle">신청일시</th>
                    <th class="valign-middle">입금액</th>
                    <th class="valign-middle">입금일시</th>
                    <th class="valign-middle">취소금액</th>
                    <th class="valign-middle">취소일시</th>
                </tr>
                <tr>
                    <td colspan="13" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span id="sum_req_price"></span>
                            <span class="blue"><span id="sum_deposit_price">0</span></span>
                            - <span class="red"><span id="sum_cancel_price">0</span></span>
                            = <span id="sum_pay_price">0</span>
                        </h4>
                    </td>
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
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sys/payLog/methodAjax/' . $log_type) }}',
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
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return row.OrderIdx === null ? data : '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" target="_blank"><u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'PgDriver'},
                    {'data' : 'PayType', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.PayType2[data];
                    }},
                    {'data' : 'PgMid'},
                    {'data' : 'PgTid', 'render' : function(data, type, row, meta) {
                        return data === null ? '' : data;
                    }},
                    {'data' : 'PayDetailCode'},
                    {'data' : 'ReqPayPrice', 'render' : function(data, type, row, meta) {
                        return data === null ? '' : addComma(data);
                    }},
                    {'data' : 'VBankDatm'},
                    {'data' : 'DepositPrice', 'render' : function(data, type, row, meta) {
                        return data === null || data === '0' ? '' : '<span class="blue no-line-height">' + addComma(data) + '</span>';
                    }},
                    {'data' : 'DepositDatm'},
                    {'data' : 'CancelPrice', 'render' : function(data, type, row, meta) {
                        return data === null || data === '0' ? '' : '<span class="red no-line-height">' + addComma(data) + '</span>';
                    }},
                    {'data' : 'CancelDatm'}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_req_price').html(addComma(json.sum_data.tReqPayPrice) + ' (' + addComma(json.sum_data.tReqPayCnt) + '건) => ');
                    $('#sum_deposit_price').html(addComma(json.sum_data.tDepositPrice) + ' (' + addComma(json.sum_data.tDepositCnt) + '건)');
                    $('#sum_cancel_price').html(addComma(Math.abs(json.sum_data.tCancelPrice)) + ' (' + addComma(json.sum_data.tCancelCnt) + '건)');
                    $('#sum_pay_price').html(addComma(json.sum_data.tDepositPrice - Math.abs(json.sum_data.tCancelPrice)) + ' (' + addComma(json.sum_data.tDepositCnt - json.sum_data.tCancelCnt) + '건)');
                } else {
                    $('#sum_req_price').html('');
                    $('#sum_deposit_price').html('0');
                    $('#sum_cancel_price').html('0');
                    $('#sum_pay_price').html('0');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sys/payLog/methodExcel/' . $log_type) }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
