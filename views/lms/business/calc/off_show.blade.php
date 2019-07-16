@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 학원강좌 강사료 정산 정보를 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>상품정보</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-odd">
                            <tr>
                                <th rowspan="2" class="valign-middle">교수명</th>
                                <th rowspan="2" class="valign-middle" style="width: 100px;">상품구분</th>
                                <th rowspan="2" class="valign-middle" style="width: 160px;">상품명</th>
                                <th rowspan="2" class="valign-middle">캠퍼스</th>
                                <th rowspan="2" class="valign-middle" style="width: 160px;">단과반명</th>
                                <th rowspan="2" class="valign-middle" style="width: 100px;">개강일</th>
                                <th rowspan="2" class="valign-middle" style="width: 100px;">종강일</th>
                                <th rowspan="2" class="valign-middle">인원</th>
                                <th rowspan="2" class="valign-middle">매출금액(C)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">환불금액(D)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">순매출(F)<br/>(C-D)</th>
                                <th rowspan="2" class="valign-middle">결제수수료(E)<br/>*안분율 적용</th>
                                <th rowspan="2" class="valign-middle">정산금액(H)<br/>(C-D-E)*정산율</th>
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
                                <td>{{ $data['wProfName'] }}</td>
                                <td>{{ $data['LearnPatternCcdName'] or '' }} {{ empty($data['PackTypeCcdName']) === false ? '(' . $data['PackTypeCcdName'] . ')' : '' }}</td>
                                <td>{{ empty($data['ProdName']) === false ? '[' . $data['ProdCode'] . '] ' . $data['ProdName'] : '' }}</td>
                                <td>{{ $data['CampusCcdName'] or '' }}</td>
                                <td>{{ empty($data['ProdNameSub']) === false ? '[' . $data['ProdCodeSub'] . '] ' . $data['ProdNameSub'] : '' }}</td>
                                <td>{{ $data['StudyStartDate'] or '' }}</td>
                                <td>{{ $data['StudyEndDate'] or '' }}</td>
                                <td>{{ number_format($data['tRemainPayCnt'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionPayPrice'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionRefundPrice'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionRemainPrice'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionPgFeePrice'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionCalcPrice'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionIncomeTax'], 0) }}</td>
                                <td>{{ number_format($data['tDivisionResidentTax'], 0) }}</td>
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
                        <select class="form-control mr-10" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd">
                            <option value="">학습형태</option>
                            @foreach($arr_learn_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="paid">결제완료일</option>
                            <option value="refund">환불완료일</option>
                        </select>
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
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
                    <th colspan="9">강좌정보</th>
                    <th colspan="9">정산정보</th>
                </tr>
                <tr>
                    <th class="valign-middle">주문번호</th>
                    <th class="valign-middle">회원명</th>
                    <th class="valign-middle">결제루트</th>
                    <th class="valign-middle">결제수단</th>
                    <th class="bold valign-middle">결제금액(A)</th>
                    <th class="valign-middle" style="min-width: 76px;">결제일</th>
                    <th class="bold valign-middle">환불금액(D1)</th>
                    <th class="valign-middle" style="min-width: 76px;">환불완료일</th>
                    <th class="bold valign-middle">결제수수료율(E2)</th>
                    <th class="bold valign-middle">결제수수료(E1)<br/>(A-D1)*E2</th>
                    <th class="valign-middle">결제상태</th>
                    <th class="valign-middle">직종</th>
                    <th class="valign-middle">상품구분</th>
                    <th class="valign-middle">상품코드</th>
                    <th class="valign-middle">상품명</th>
                    <th class="valign-middle">과정</th>
                    <th class="valign-middle">단강좌코드</th>
                    <th class="valign-middle">단강좌명</th>
                    <th class="valign-middle">과목</th>
                    <th class="valign-middle">교수명</th>
                    <th class="bold valign-middle">안분율(B)</th>
                    <th class="bold valign-middle">안분매출(C)<br/>A*B</th>
                    <th class="bold valign-middle">안분환불(D)<br/>D1*B</th>
                    <th class="bold valign-middle">순매출(F)<br/>(C-D)</th>
                    <th class="bold valign-middle">안분수수료(E)<br/>E1*B</th>
                    <th class="bold valign-middle">정산율(G)</th>
                    <th class="bold valign-middle">정산금액(H)<br/>(C-D-E)*G</th>
                </tr>
                <tr class="bg-info">
                    <th colspan="5" class="text-center">합계</th>
                    <th id="sumA" class="sumTh"></th>
                    <th></th>
                    <th id="sumD1" class="sumTh"></th>
                    <th></th>
                    <th></th>
                    <th id="sumE1" class="sumTh"></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th id="sumC" class="sumTh"></th>
                    <th id="sumD" class="sumTh"></th>
                    <th id="sumF" class="sumTh"></th>
                    <th id="sumE" class="sumTh"></th>
                    <th></th>
                    <th id="sumH" class="sumTh"></th>
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
            $datatable = $list_table.DataTable({
                serverSide: true,
                scrollX : true,
                scrollY : 600,
                responsive : false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/business/calc/offLectureSD/orderListAjax') }}',
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
                    {'data' : 'CompleteDatm', 'render' : function(data, type, row, meta) {
                        return data.substr(0, 10);
                    }},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return data > 0 ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm', 'render' : function(data, type, row, meta) {
                        return data !== null ? data.substr(0, 10) : '';
                    }},
                    {'data' : 'PgFee'},
                    {'data' : 'PgFeePrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'PayStatusCcdName', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice > 0 ? '<span class="red no-line-height">' + data + '</span>' : data;
                    }},
                    {'data' : 'LgCateName'},
                    {'data' : 'LearnPatternCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.PackTypeCcdName !== null ? '<br/>(' + row.PackTypeCcdName + ')' : '');
                    }},
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName'},
                    {'data' : 'CourseName'},
                    {'data' : 'ProdCodeSub'},
                    {'data' : 'ProdNameSub'},
                    {'data' : 'SubjectName'},
                    {'data' : 'wProfName'},
                    {'data' : 'ProdDivisionRate'},
                    {'data' : 'DivisionPayPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'DivisionRefundPrice', 'render' : function(data, type, row, meta) {
                        return '<span class="red no-line-height">' + (data > 0 ? decimalFormat(data, 8) : 0) + '</span>';
                    }},
                    {'data' : 'DivisionRemainPrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
                    {'data' : 'DivisionPgFeePrice', 'render' : function(data, type, row, meta) {
                        return decimalFormat(data, 8);
                    }},
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
                    $('#sumD1').html(addComma(json.sum_data.tRefundPrice));
                    $('#sumE1').html(addComma(json.sum_data.tPgFeePrice));
                    $('#sumC').html(addComma(json.sum_data.tDivisionPayPrice));
                    $('#sumD').html(json.sum_data.tDivisionRefundPrice > 0 ? addComma(json.sum_data.tDivisionRefundPrice) : 0);
                    $('#sumE').html(addComma(json.sum_data.tDivisionPgFeePrice));
                    $('#sumF').html(addComma(json.sum_data.tDivisionRemainPrice));
                    $('#sumH').html(addComma(json.sum_data.tDivisionCalcPrice));
                } else {
                    $('.sumTh').html('');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/calc/offLectureSD/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/business/calc/offLectureSD/index') }}' + getQueryString());
            });
        });
    </script>
@stop
