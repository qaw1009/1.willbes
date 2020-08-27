@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/pay') }}">결제/취소</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/deposit') }}">가상계좌입금통보</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/stats') }}" class="cs-pointer"><strong>승인완료통계</strong></a></li>
    </ul>
    <h5>- 결제 승인완료 집계 데이터를 확인하는 메뉴입니다. (PG 데이터와 비교/검증용, 결제취소/망취소 이력 제외)</h5>
    <h5>- 신용카드금액은 카카오머니, 페이코포인트를 제외한 승인금액입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
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
                    <label class="control-label col-md-1" for="search_pay_type">구분</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control mr-10" id="search_pg_mid" name="search_pg_mid">
                            <option value="">상점아이디</option>
                            <option value="willbes015">동영상(willbes015)</option>
                            <option value="willbes515">교재(willbes515)</option>
                            <option value="willbes006">인천학원(willbes006)</option>
                            <option value="INIpayTest">테스트상점아이디</option>
                        </select>
                        <select class="form-control mr-10" id="search_pay_method" name="search_pay_method">
                            <option value="">결제방법</option>
                            <option value="Card">신용카드</option>
                            <option value="DirectBank">실시간계좌이체</option>
                            <option value="VBank">가상계좌(무통장입금)</option>
                            <option value="VDeposit">가상계좌(입금통보)</option>
                        </select>
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
                    <th class="rowspan">일자</th>
                    <th class="rowspan">상점아이디</th>
                    <th>결제방법</th>
                    <th>결제건수 (무통장입금제외)</th>
                    <th>결제금액 (무통장입금제외)</th>
                    <th>신용카드금액</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr class="bg-odd">
                    <th colspan="3">전체합계</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
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
                paging : false,
                ajax: {
                    'url' : '{{ site_url('/sys/payLog/statsAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                rowsGroup: ['.rowspan'],
                rowGroup: {
                    startRender: null,
                    endRender: function(rows, group) {
                        var arr_column = ['PayCnt', 'PayPrice', 'CardPayPrice'];
                        var t_html = '', t_amt;

                        t_html += '<td>' + rows.data().pluck('RegDate')[0] + '</td>';
                        t_html += '<td>' + rows.data().pluck('PgMid')[0] + '</td>';
                        t_html += '<td>합계</td>';

                        $.each(arr_column, function(idx, item) {
                            t_amt = 0;
                            t_html += '<td>' + addComma(
                                rows.data().pluck(item).reduce(function(a, b, curr_idx) {
                                    if (rows.data().pluck('PayMethod')[curr_idx] !== 'VBank') {
                                        t_amt = t_amt + (b * 1);
                                    }

                                    return a + b * 1;
                                }, 0)
                            ) + (item !== 'CardPayPrice' ? ' (' + addComma(t_amt) + ')' : '') + '</td>';
                        });

                        return $('<tr class="bg-info bold">' + t_html + '</tr>');
                    },
                    dataSrc: function(row) {
                        return row.RegDate + '_' + row.PgMid;
                    }
                },
                columns: [
                    {'data' : 'PgMid', 'render' : function(data, type, row, meta) {
                        return row.RegDate; // 상점 아이디별로 rowspan 처리
                    }},
                    {'data' : 'PgMid'},
                    {'data' : 'PayMethod', 'render' : function(data, type, row, meta) {
                        return meta.settings.json.codes.PayMethodName[data];
                    }},
                    {'data' : 'PayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'CardPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }}
                ],
                footerCallback: function(tfoot, data, start, end, display) {
                    var api = this.api();
                    var t_amt;
                    for(var i = 3; i <= 5; i++) {
                        t_amt = 0;
                        $(api.column(i).footer()).html(
                            addComma(
                                api.column(i).data().reduce(function (a, b, curr_idx) {
                                    if (api.column(2).data()[curr_idx] !== 'VBank') {
                                        t_amt = t_amt + (b * 1);
                                    }

                                    return a + b * 1;
                                }, 0)
                            ) + (i !== 5 ? ' (' + addComma(t_amt) + ')' : '')
                        );
                    }
                }
            });
        });
    </script>
@stop
