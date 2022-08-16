@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 기준 상품구분별 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        @foreach($arr_input as $key => $val)
            <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
        @endforeach
        <div class="x_panel">
            <div class="x_content mt-0">
                <div class="row">
                    <div class="col-md-12">
                        <h4><strong>매출정보</strong></h4>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>운영사이트</th>
                                <th>상품구분</th>
                                <th>강좌구분</th>
                                <th>결제채널</th>
                                <th>결제루트</th>
                                <th>결제현황</th>
                                <th>환불현황</th>
                                <th>매출현황</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $data['SiteName'] }}</td>
                                <td>{{ $data['ProdTypeCcdName'] }}</td>
                                <td>{{ $data['LearnPatternCcdName'] }}</td>
                                <td>{{ $data['PayChannelCcdName'] }}</td>
                                <td>{{ $data['PayRouteCcdName'] }}</td>
                                <td>{{ number_format(intval($data['tRealPayPrice'])) }}원 ({{ number_format(intval($data['tOrderProdCnt'])) }}건)</td>
                                <td class="red">{{ number_format(intval($data['tRefundPrice'])) }}원 ({{ number_format(intval($data['tRefundCnt'])) }}건)</td>
                                <td class="blue bold">{{ number_format(intval($data['tRemainPrice'])) }}원 ({{ number_format(intval($data['tRealPayCnt'])) }}건)</td>
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
                        @if(empty($arr_learn_pattern_ccd) === false)
                            <select class="form-control" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd" title="결제채널">
                                <option value="">강좌구분</option>
                                @foreach($arr_learn_pattern_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_pay_channel_ccd) === false)
                            <select class="form-control" id="search_pay_channel_ccd" name="search_pay_channel_ccd" title="결제채널">
                                <option value="">결제채널</option>
                                @foreach($arr_pay_channel_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_pay_route_ccd) === false)
                            <select class="form-control" id="search_pay_route_ccd" name="search_pay_route_ccd" title="결제루트">
                                <option value="">결제루트</option>
                                @foreach($arr_pay_route_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_pay_method_ccd) === false)
                            <select class="form-control" id="search_pay_method_ccd" name="search_pay_method_ccd" title="결제수단">
                                <option value="">결제수단</option>
                                @foreach($arr_pay_method_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_pay_status_ccd) === false)
                            <select class="form-control" id="search_pay_status_ccd" name="search_pay_status_ccd" title="결제상태">
                                <option value="">결제상태</option>
                                @foreach($arr_pay_status_ccd as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        <select class="form-control" id="search_lg_cate_code" name="search_lg_cate_code" title="대분류">
                            <option value="">대분류</option>
                            @foreach($arr_lg_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        @if(empty($arr_md_category) === false)
                            <select class="form-control" id="search_md_cate_code" name="search_md_cate_code" title="중분류">
                                <option value="">중분류</option>
                                @foreach($arr_md_category as $row)
                                    <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_value">주문검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="{{ $arr_input['start_date'] }}" title="조회시작일자" autocomplete="off">
                        </div>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="{{ $arr_input['end_date'] }}" title="조회종료일자" autocomplete="off">
                        </div>
                        <div class="btn-group ml-20" role="group">
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
                <thead>
                <tr class="bg-odd">
                    <th style="width: 60px;"><label class="mb-0">선택 <input type="checkbox" id="_is_all" name="_is_all" class="flat" value="Y"/></label></th>
                    <th>No</th>
                    <th>주문번호</th>
                    <th>회원정보</th>
                    <th>결제채널</th>
                    <th>결제루트</th>
                    <th>결제수단</th>
                    <th>상품명</th>
                    <th>결제금액</th>
                    <th>결제완료일</th>
                    <th>환불금액</th>
                    <th>환불완료일</th>
                    <th>결제상태</th>
                </tr>
                <tr>
                    <td colspan="13" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span class="blue"><span id="sum_pay_price">0</span></span>
                            - <span class="red"><span id="sum_refund_price">0</span></span>
                            = <span id="sum_total_price">0</span>
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
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // 카테고리 자동 변경
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");

            // datatable
            $datatable = $list_table.DataTable({
                serverSide: true,
                displayStart: 0,
                displayLength: 20,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-primary border-radius-reset btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/prodTypeStats/orderListAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : 'OrderIdx', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="order_idx" class="flat target-crm-member" value="' + data + '" data-mem-idx="' + row.MemIdx + '">';
                    }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>' +
                            (row.CertNo !== null ? '<br/>(수강증 : ' + row.CertNo + ')' : '');
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return (row.LearnPatternCcdName !== null ? '<span class="blue no-line-height">[' + row.LearnPatternCcdName + ']</span> ' : '')
                            + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return row.RealPayPrice !== null ? addComma(data) : '';
                    }},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.RefundPrice !== null ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm'},
                    {'data' : 'PayStatusName'}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tOrderProdCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_total_price').html(addComma(json.sum_data.tRealPayPrice - json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_total_price').html('0');
                }
            });

            // 전체선택/해제
            $list_table.on('ifChanged', '#_is_all', function() {
                iCheckAll($list_table.find('input[name="order_idx"]'), $(this));
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                var confirm_msg = '{{ config_get('privacy_excel_down_msg', '정말로 엑셀다운로드 하시겠습니까?') }}';
                if (confirm(confirm_msg)) {
                    formCreateSubmit('{{ site_url('/sales/prodTypeStats/orderListExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 목록 이동
            $('#btn_list').click(function() {
                location.replace('{{ site_url('/sales/prodTypeStats/index') }}' + getQueryString());
            });
        });
    </script>
@stop
