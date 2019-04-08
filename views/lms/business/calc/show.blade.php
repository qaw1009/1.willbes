@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 {{ $calc_name }} 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <input type="hidden" name="prod_type" value="{{ $arr_input['prod_type'] }}"/>
        <input type="hidden" name="search_site_code" value="{{ $arr_input['search_site_code'] }}"/>
        <input type="hidden" name="search_prof_idx" value="{{ $arr_input['search_prof_idx'] }}"/>
        <input type="hidden" name="prof_idx" value="{{ $arr_input['prof_idx'] }}"/>
        <input type="hidden" name="subject_idx" value="{{ $arr_input['subject_idx'] }}"/>
        <input type="hidden" name="study_period" value="{{ $arr_input['study_period'] }}"/>
        <div class="x_panel">
            <div class="x_content mt-0">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>{{ $prod_name }}</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-odd">
                            <tr>
                                <th rowspan="2" class="valign-middle">교수명</th>
                            @if($arr_input['prod_type'] == 'PP')
                                {{-- 기간제패키지 --}}
                                <th rowspan="2" class="valign-middle">매출금액(C)<br/>*기여도 적용</th>
                                <th rowspan="2" class="valign-middle">결제수수료(D)<br/>*기여도 적용</th>
                                <th rowspan="2" class="valign-middle">환불금액(E)<br/>*기여도 적용</th>
                                <th rowspan="2" class="valign-middle">수강개월수(F1)</th>
                                <th rowspan="2" class="valign-middle">월안분금액(F)<br/>(C-D-E)/F1</th>
                                <th rowspan="2" class="valign-middle">당월정산금액(H)<br/>F*정산율</th>
                            @else
                                <th rowspan="2" class="valign-middle">매출금액(C)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">결제수수료(D)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">환불금액(E)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">정산금액(H)<br/>(C-D-E)*정산율</th>
                            @endif
                                <th colspan="2">세액공제</th>
                                <th rowspan="2" class="valign-middle blue">지급액<br/>H-(I+J)</th>
                            </tr>
                            <tr>
                                <th>소득세(I)<br/>H*0.03</th>
                                <th class="bdr-line">주민세(J)<br/>I*0.1</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>@if(empty($arr_input['prof_idx']) === false){{ $data['wProfName'] }}({{ $data['SubjectName'] }})@else 합계 @endif</td>
                                <td>{{ decimal_format($data['tDivisionPayPrice'], 8) }}</td>
                                <td>{{ decimal_format($data['tDivisionPgFeePrice'], 8) }}</td>
                                <td>{{ decimal_format($data['tDivisionRefundPrice'], 8) }}</td>
                            @if($arr_input['prod_type'] == 'PP')
                                {{-- 기간제패키지 --}}
                                <td>{{ $data['StudyPeriodMonth'] }}개월</td>
                                <td>{{ decimal_format($data['tDivisionMonthPrice'], 8) }}</td>
                            @endif
                                <td>{{ decimal_format($data['tDivisionCalcPrice'], 8) }}</td>
                                <td>{{ decimal_format($data['tDivisionIncomeTax'], 8) }}</td>
                                <td>{{ decimal_format($data['tDivisionResidentTax'], 8) }}</td>
                                <td class="bold blue">{{ number_format($data['tFinalCalcPrice']) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-right">
                <button class="btn btn-primary mr-0" type="button" id="btn_list">전체목록</button>
            </div>
        </div>
        <div class="x_panel mt-10">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">결제조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_pay_channel_ccd" name="search_pay_channel_ccd">
                            <option value="">결제채널</option>
                            @foreach($arr_pay_channel_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_method_ccd" name="search_pay_method_ccd">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_status_ccd" name="search_pay_status_ccd">
                            <option value="">결제상태</option>
                            @foreach($arr_pay_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">상품조건</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_cate_code" name="search_cate_code">
                            <option value="">직종선택</option>
                            @foreach($arr_category as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    @if($arr_input['prod_type'] == 'LE')
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">학습형태</option>
                            @foreach($arr_learn_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_sale_pattern_ccd" name="search_sale_pattern_ccd">
                            <option value="">판매형태</option>
                            @foreach($arr_sale_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일(환불일)</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] }}">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] }}">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-mon">전월</button>
                        </div>
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
                    <th colspan="11">주문정보</th>
                    <th colspan="{{ $arr_input['prod_type'] == 'PP' ? '7' : '9' }}">강좌정보</th>
                    <th colspan="{{ $arr_input['prod_type'] == 'PP' ? '10' : '9' }}">정산정보</th>
                </tr>
                <tr>
                    <th class="valign-middle">주문번호</th>
                    <th class="valign-middle">회원명</th>
                    <th class="valign-middle">결제루트</th>
                    <th class="valign-middle">결제수단</th>
                    <th class="bold valign-middle">결제금액(A)</th>
                    <th class="bold valign-middle">결제수수료율(D2)</th>
                    <th class="bold valign-middle">결제수수료(D1)<br/>A*D2</th>
                    <th class="valign-middle" style="min-width: 76px;">결제일</th>
                    <th class="bold valign-middle">환불금액(E1)</th>
                    <th class="valign-middle" style="min-width: 76px;">환불완료일</th>
                    <th class="valign-middle">결제상태</th>
                    <th class="valign-middle">직종</th>
                    <th class="valign-middle">상품구분</th>
                    <th class="valign-middle">상품코드</th>
                    <th class="valign-middle">상품명</th>
                @if($arr_input['prod_type'] == 'PP')
                    {{-- 기간제패키지 --}}
                    <th class="valign-middle">수강개월수(F1)</th>
                    <th class="valign-middle">과목</th>
                    <th class="valign-middle">교수명</th>
                    <th class="bold valign-middle">기여도(B)</th>
                    <th class="bold valign-middle">기여도매출(C)<br/>A*B</th>
                    <th class="bold valign-middle">기여도수수료(D)<br/>D1*B</th>
                    <th class="bold valign-middle">기여도환불(E)<br/>E1*B</th>
                    <th class="bold valign-middle" style="min-width: 76px;">월안분(F)<br/>(C-D-E)/F1</th>
                    <th class="bold valign-middle">정산율(G)</th>
                    <th class="bold valign-middle">정산금액(H)<br/>F*G</th>
                @else
                    <th class="valign-middle">과정</th>
                    <th class="valign-middle">단강좌코드</th>
                    <th class="valign-middle">단강좌명</th>
                    <th class="valign-middle">과목</th>
                    <th class="valign-middle">교수명</th>
                    <th class="bold valign-middle">안분율(B)</th>
                    <th class="bold valign-middle">안분매출(C)<br/>A*B</th>
                    <th class="bold valign-middle">안분수수료(D)<br/>D1*B</th>
                    <th class="bold valign-middle">안분환불(E)<br/>E1*B</th>
                    <th class="bold valign-middle">정산율(G)</th>
                    <th class="bold valign-middle">정산금액(H)<br/>(C-D-E)*G</th>
                @endif
                </tr>
                <tr class="bg-info">
                    <th colspan="5" class="text-center">합계</th>
                    <th id="sumA" class="sumTh"></th>
                    <th></th>
                    <th id="sumD1" class="sumTh"></th>
                    <th></th>
                    <th id="sumE1" class="sumTh"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                @if($arr_input['prod_type'] == 'PP')
                    {{-- 기간제패키지 --}}
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="sumC" class="sumTh"></th>
                    <th id="sumD" class="sumTh"></th>
                    <th id="sumE" class="sumTh"></th>
                    <th id="sumF" class="sumTh"></th>
                    <th></th>
                    <th id="sumH" class="sumTh"></th>
                @else
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="sumC" class="sumTh"></th>
                    <th id="sumD" class="sumTh"></th>
                    <th id="sumE" class="sumTh"></th>
                    <th></th>
                    <th id="sumH" class="sumTh"></th>
                @endif
                </tr>
                </thead>
                <tbody class="bdt-line">
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

            $datatable = $list_table.DataTable({
                serverSide: true,
                scrollX : true,
                scrollY : 600,
                responsive : false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/calc/' . $calc_type . '/orderListAjax') }}',
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
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')';
                    }},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PgFee'},
                    {'data' : 'PgFeePrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return data > 0 ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data.substr(0, 10) : '';
                    }},
                    {'data' : 'PayStatusName', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice > 0 ? '<span class="red no-line-height">' + data + '</span>' : data;
                    }},
                    {'data' : 'LgCateName'},
                    {'data' : 'LearnPatternCcdName', 'render' : function(data, type, row, meta) {
                        return (row.SalePatternCcd.slice(-1) !== '1' ? row.SalePatternCcdName : data) + (row.PackTypeCcdName !== null ? '<br/>(' + row.PackTypeCcdName + ')' : '');
                    }},
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName'},
                @if($arr_input['prod_type'] == 'PP')
                    {{-- 기간제패키지 --}}
                    {'data' : 'StudyPeriodMonth'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'ProdContribPerc'},
                @else
                    {'data' : 'CourseName'},
                    {'data' : 'ProdCodeSub'},
                    {'data' : 'ProdNameSub'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'ProdDivisionRate'},
                @endif
                    {'data' : 'DivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'DivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'DivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return '<span class="red no-line-height">' + (data > 0 ? decimalFormat(data, 8) : 0) + '</span>';
                    }},
                @if($arr_input['prod_type'] == 'PP')
                    {{-- 기간제패키지 --}}
                    {'data' : 'DivisionMonthPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                @endif
                    {'data' : 'ProdCalcPerc'},
                    {'data' : 'DivisionCalcPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#sumA').html(addComma(json.sum_data.tRealPayPrice));
                    $('#sumD1').html(decimalFormat(json.sum_data.tPgFeePrice, 8));
                    $('#sumE1').html(addComma(json.sum_data.tRefundPrice));
                    $('#sumC').html(decimalFormat(json.sum_data.tDivisionPayPrice, 8));
                    $('#sumD').html(decimalFormat(json.sum_data.tDivisionPgFeePrice, 8));
                    $('#sumE').html(json.sum_data.tDivisionRefundPrice > 0 ? decimalFormat(json.sum_data.tDivisionRefundPrice, 8) : 0);
                    $('#sumH').html(decimalFormat(json.sum_data.tDivisionCalcPrice, 8));

                    @if($arr_input['prod_type'] == 'PP')
                        {{-- 기간제패키지 --}}
                        $('#sumF').html(decimalFormat(json.sum_data.tDivisionMonthPrice, 8));
                    @endif
                } else {
                    $('.sumTh').html('');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/' . $calc_type . '/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/business/calc/' . $calc_type . '/index') }}' + getQueryString());
            });
        });
    </script>
@stop
