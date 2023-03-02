@extends('lcms.layouts.master')

@section('content')
    <ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/pay') }}">결제/취소</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/card') }}">신용카드</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/bank') }}">계좌이체</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/method/vbank') }}">가상계좌</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/deposit') }}">가상계좌입금통보</a></li>
        <li role="presentation"><a href="{{ site_url('/sys/payLog/index/escrow') }}">에스크로</a></li>
        <li role="presentation" class="active"><a href="{{ site_url('/sys/payLog/stats') }}" class="cs-pointer"><strong>승인완료/취소통계</strong></a></li>
    </ul>
    <h5>- 승인완료/결제취소 집계 데이터를 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="">집계구분</label>
                    <div class="col-md-11">
                        <div class="radio">
                            <input type="radio" id="search_stats_type_date" name="search_stats_type" class="flat" value="date" data-start-num="3" @if($log_type == 'date') checked="checked" @endif/>
                            <label for="search_stats_type_date" class="input-label">일자별</label>
                            <input type="radio" id="search_stats_type_mid" name="search_stats_type" class="flat" value="mid" data-start-num="2" @if($log_type == 'mid') checked="checked" @endif/>
                            <label for="search_stats_type_mid" class="input-label">상점아이디별</label>
                            <input type="radio" id="search_stats_type_method" name="search_stats_type" class="flat" value="method" data-start-num="1" @if($log_type == 'method') checked="checked" @endif/>
                            <label for="search_stats_type_method" class="input-label">결제방법별</label>
                        </div>
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
                    <label class="control-label col-md-1">구분</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control selectpicker" id="search_pg_mid" name="search_pg_mid" title="상점아이디" data-size="10" data-live-search="true">
                            <option value="">상점아이디</option>
                            @foreach($codes['PgMid'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_method" name="search_pay_method" title="결제방법">
                            <option value="">결제방법</option>
                            @foreach($codes['PayDepositMethod'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
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
            <h5><span class="red">*</span> 괄호 안의 숫자는 <span class="red">`가상계좌(무통장입금)`</span>건을 제외한 숫자입니다.</h5>
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    @if($log_type == 'date')
                        <th class="rowspan">일자</th>
                    @endif
                    @if(in_array($log_type, ['date', 'mid']) === true)
                        <th class="rowspan">상점아이디</th>
                    @endif
                    <th class="rowspan">결제방법</th>
                    <th>승인완료건수</th>
                    <th>승인완료금액</th>
                    <th>결제취소건수</th>
                    <th>결제취소금액</th>
                    <th>완료+취소건수</th>
                    <th>완료-취소금액</th>
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
            var setDefaultSearchForm = function() {
                // 전달 파라미터 값 셋팅
                @foreach($arr_input as $key => $val)
                    @if($key != 'search_stats_type' && empty($val) === false)
                        $search_form.find('[name="{{ $key }}"]').val('{{ $val }}');
                    @endif
                @endforeach

                // 기간 조회 디폴트 셋팅
                if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                    setDefaultDatepicker(0, 'days', 'search_start_date', 'search_end_date');
                }
            };
            setDefaultSearchForm();

            // 집계구분 라디오 버튼 클릭
            $search_form.on('ifClicked', 'input[name="search_stats_type"]', function() {
                formCreateSubmit('{{ site_url('/sys/payLog/stats/') }}' + $(this).val(), $search_form.serializeArray(), 'POST');
            });

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging : false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/sys/payLog/statsAjax/' . $log_type) }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                rowsGroup: ['.rowspan'],
                createdRow: function(row, data, dataIndex) {
                    if (data.PayMethod === null) {
                        $(row).addClass('bg-info bold');
                    }

                    // 집계구분별 합계 텍스트 셋팅
                    if ($search_form.find('input[name="search_stats_type"][value="date"]').prop('checked') === true) {
                        if (data.RegDate === null) {
                            $('td:eq(0)', row).text('전체합계');
                        } else if (data.PgMid === null) {
                            $('td:eq(1)', row).text('일자별합계');
                        } else if (data.PayMethod === null) {
                            $('td:eq(2)', row).text('합계');
                        }
                    } else if ($search_form.find('input[name="search_stats_type"][value="mid"]').prop('checked') === true) {
                        if (data.PgMid === null) {
                            $('td:eq(0)', row).text('전체합계');
                        } else if (data.PayMethod === null) {
                            $('td:eq(1)', row).text('상점별합계');
                        }
                    } else {
                        if (data.PayMethod === null) {
                            $('td:eq(0)', row).text('전체합계');
                        }
                    }
                },
                columns: [
                    @if($log_type == 'date')
                        {'data' : 'RegDate', 'render' : function(data, type, row, meta) {
                            return row.RegDate;
                        }},
                    @endif
                    @if(in_array($log_type, ['date', 'mid']) === true)
                        {'data' : 'PgMid'},
                    @endif
                    {'data' : 'PayMethod', 'render' : function(data, type, row, meta) {
                        return data === null ? '' : meta.settings.json.codes.PayDepositMethod[data];
                    }},
                    {'data' : 'tReqPayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealReqPayCnt !== null ? ' (' + addComma(row.tRealReqPayCnt) + ')' : '');
                    }},
                    {'data' : 'tReqPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealReqPayPrice !== null ? ' (' + addComma(row.tRealReqPayPrice) + ')' : '');
                    }},
                    {'data' : 'tCancelCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealCancelCnt !== null ? ' (' + addComma(row.tRealCancelCnt) + ')' : '');
                    }},
                    {'data' : 'tCancelPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealCancelPrice !== null ? ' (' + addComma(row.tRealCancelPrice) + ')' : '');
                    }},
                    {'data' : 'tPayCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealPayCnt !== null ? ' (' + addComma(row.tRealPayCnt) + ')' : '');
                    }},
                    {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + (row.PayMethod === null && row.tRealRemainPrice !== null ? ' (' + addComma(row.tRealRemainPrice) + ')' : '');
                    }}
                ]
            });
        });
    </script>
@stop
