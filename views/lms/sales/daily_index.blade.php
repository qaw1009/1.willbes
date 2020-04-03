@extends('lcms.layouts.master')

@section('content')
    <h5>- 학원 전체 상품에 대한 매출명세(일계표)를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">상품기본정보</label>
                    <div class="col-md-5 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_learn_prod_type_ccd" name="search_learn_prod_type_ccd">
                            <option value="">상품구분</option>
                            @foreach($arr_learn_prod_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_lg_cate_code" name="search_lg_cate_code">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{$row['CampusCcd']}}" class="{{$row['SiteCode']}}" >{{$row['CampusName']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2 pt-5">
                        명칭, 코드 검색 가능
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off">
                        </div>
                        <select class="form-control" id="search_start_hour" name="search_start_hour">
                            @for($i = 0; $i <= 23; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off">
                        </div>
                        <select class="form-control" id="search_end_hour" name="search_end_hour">
                            @for($i = 0; $i <= 23; $i++)
                                <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $i == 23 ? 'selected="selected"' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
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
            <table id="list_ajax_table" class="table table-bordered">
                <thead class="bg-odd">
                <tr>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="valign-middle">주문번호</th>
                    <th rowspan="2" class="valign-middle">수강번호</th>
                    <th rowspan="2" class="valign-middle" style="min-width: 65px;">발생일자</th>
                    <th rowspan="2" class="valign-middle">발생시간</th>
                    <th rowspan="2" class="valign-middle">상품구분</th>
                    <th rowspan="2" class="valign-middle">대분류</th>
                    <th rowspan="2" class="valign-middle">캠퍼스</th>
                    <th rowspan="2" class="valign-middle">상품명</th>
                    <th rowspan="2" class="valign-middle">회원명</th>
                    <th rowspan="2" class="valign-middle">연락처</th>
                    <th rowspan="2" class="valign-middle">결제루트</th>
                    <th colspan="5">결제금액</th>
                </tr>
                <tr>
                    <th class="valign-middle">신용카드</th>
                    <th class="valign-middle">현금</th>
                    <th class="valign-middle">실시간<br/>계좌이체</th>
                    <th class="valign-middle">무통장입금</th>
                    <th class="valign-middle">합계</th>
                </tr>
                <tr class="bg-info">
                    <th colspan="12" class="text-center">합계</th>
                    <th id="t_card_trc_price" class="sumTh"></th>
                    <th id="t_cash_trc_price" class="sumTh"></th>
                    <th id="t_bank_trc_price" class="sumTh"></th>
                    <th id="t_vbank_trc_price" class="sumTh"></th>
                    <th id="t_trc_price" class="sumTh"></th>
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
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // 카테고리, 캠퍼스 자동 변경
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/dailySales/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.TrcStatusCode === 'R') {
                        $(row).addClass('red');
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" class="' + (row.TrcStatusCode === 'R' ? 'red' : 'blue') + '" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'CertNo'},
                    {'data' : 'TrcDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10);
                    }},
                    {'data' : 'TrcDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(11);
                    }},
                    {'data' : 'LearnProdTypeCcdName'},
                    {'data' : 'LgCateName'},
                    {'data' : 'CampusCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return data !== '' ? '<div style="max-width: 160px; word-break: break-all;">[' + row.ProdCode + '] ' + data + '</div>' : '';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')';
                    }},
                    {'data' : 'MemPhone'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'CardTrcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'CashTrcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'BankTrcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'VBankTrcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }},
                    {'data' : 'TrcPrice', 'render' : function(data, type, row, meta) {
                        return data == null ? '' : addComma(data);
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#t_card_trc_price').html(addComma(json.sum_data.tCardTrcPrice));
                    $('#t_cash_trc_price').html(addComma(json.sum_data.tCashTrcPrice));
                    $('#t_bank_trc_price').html(addComma(json.sum_data.tBankTrcPrice));
                    $('#t_vbank_trc_price').html(addComma(json.sum_data.tVBankTrcPrice));
                    $('#t_trc_price').html(addComma(json.sum_data.tTrcPrice));
                } else {
                    $('#list_ajax_table thead tr th.sumTh').text('');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sales/dailySales/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
