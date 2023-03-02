@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/pay') }}">결제/취소</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/card') }}">신용카드</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/bank') }}">계좌이체</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/vbank') }}">가상계좌</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/deposit') }}">가상계좌입금통보</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/index/escrow') }}" class="cs-pointer"><strong>에스크로</strong></a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/stats') }}">승인완료/취소통계</a></li>
    </ul>
    <h5>- 에스크로 연동 로그를 확인하는 메뉴입니다.</h5>
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
                            <option value="EscrowParam2">송장번호</option>
                            <option value="ResultMsg">결과메시지</option>
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
                        <select class="form-control" id="search_pg_mid" name="search_pg_mid" title="상점아이디">
                            <option value="">상점아이디</option>
                            @foreach($codes['PgBookMid'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_is_result" name="search_is_result" title="성공여부">
                            <option value="">성공여부</option>
                            <option value="Y">연동성공</option>
                            <option value="N">연동실패</option>
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
                    <th class="valign-middle">상점아이디</th>
                    <th class="valign-middle">택배사</th>
                    <th class="valign-middle">송장번호</th>
                    <th class="valign-middle">발송일시</th>
                    <th class="valign-middle">결과코드</th>
                    <th class="valign-middle">결과메시지</th>
                    <th class="valign-middle">등록일시</th>
                    <th class="valign-middle">재전송</th>
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
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
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
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return row.OrderIdx === null ? data : '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" target="_blank"><u class="blue">' + data + '</u></a>';
                    }},
                    {'data' : 'PgDriver'},
                    {'data' : 'PgMid'},
                    {'data' : 'EscrowParam1Name'},
                    {'data' : 'EscrowParam2'},
                    {'data' : 'EscrowDatm'},
                    {'data' : 'ResultCode'},
                    {'data' : 'ResultMsg', 'render' : function(data, type, row, meta) {
                        return data === null ? '' : '<div style="max-width: 580px; word-break: break-all;">' + data + '</div>';
                    }},
                    {'data' : 'RegDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        if (row.IsSuccess === 'N' && row.IsResend !== 'Y') {
                            return '<button name="btn_resend" class="btn btn-xs btn-danger" data-idx="' + row.EscrowIdx + '">재전송</button>';
                        } else {
                            return '';
                        }
                    }}
                ]
            });

            // 재전송 버튼 클릭
            $list_table.on('click', 'button[name="btn_resend"]', function() {
                if (!confirm('정말로 재전송 하시겠습니까?')) {
                    return;
                }

                var data = {
                    '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'idx' : $(this).data('idx')
                };
                sendAjax('{{ site_url('/sys/payLog/escrowResend') }}', data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        $datatable.draw();
                    }
                }, showError, false, 'POST');
            });
        });
    </script>
@stop
