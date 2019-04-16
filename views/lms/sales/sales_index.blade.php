@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 기준 {{ $sales_name }} 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false) !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{ $def_site_code }}"/>
        <div class="x_panel">
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
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_prod_value">상품검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_prod_value" name="search_prod_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 주문번호 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">직종구분</label>
                    <div class="col-md-11 form-inline">
                        <div id="layer_cate_code">
                            @foreach($arr_category as $idx => $row)
                                <div class="checkbox mr-10 search_chk_cate_code {{ $row['SiteCode'] }}">
                                    <input type="checkbox" id="search_chk_cate_code_{{ $loop->index }}" name="search_chk_cate_code" class="flat {{ $row['SiteCode'] }}" value="{{ $row['CateCode'] }}"/>
                                    <label for="search_chk_cate_code_{{ $loop->index }}" class="input-label">{{ $row['CateName'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">상품구분</label>
                    <div class="col-md-11 form-inline">
                        <div class="checkbox">
                            @foreach($arr_prod_type_ccd as $key => $val)
                                <input type="checkbox" id="search_chk_prod_type_ccd_{{ $loop->index }}" name="search_chk_prod_type_ccd" class="flat" value="{{ $key }}"/>
                                <label for="search_chk_prod_type_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($sales_type == 'all')
                    {{-- 전체매출현황 --}}
                    <div class="form-group">
                        <label class="control-label col-md-1">학습형태</label>
                        <div class="col-md-11 form-inline">
                            <div class="checkbox">
                                @foreach($arr_learn_pattern_ccd as $key => $val)
                                    <input type="checkbox" id="search_chk_learn_pattern_ccd_{{ $loop->index }}" name="search_chk_learn_pattern_ccd" class="flat" value="{{ $key }}"/>
                                    <label for="search_chk_learn_pattern_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1">판매형태</label>
                        <div class="col-md-11 form-inline">
                            <div class="checkbox">
                                @foreach($arr_sale_pattern_ccd as $key => $val)
                                    <input type="checkbox" id="search_chk_sale_pattern_ccd_{{ $loop->index }}" name="search_chk_sale_pattern_ccd" class="flat" value="{{ $key }}"/>
                                    <label for="search_chk_sale_pattern_ccd_{{ $loop->index }}" class="input-label">{{ $val }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
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
                <thead>
                <tr class="bg-odd">
                    <th>No</th>
                    <th class="rowspan">주문번호</th>
                    <th class="rowspan">회원정보</th>
                    <th class="rowspan">결제채널</th>
                    <th class="rowspan">결제루트</th>
                    <th class="rowspan">결제수단</th>
                    <th>직종구분</th>
                    <th>상품구분</th>
                    <th>[학습형태] 상품명</th>
                    <th>결제금액</th>
                    <th class="rowspan">결제완료일</th>
                    <th>환불금액</th>
                    <th>환불완료일</th>
                    <th>결제상태</th>
                </tr>
                <tr>
                    <td colspan="14" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span class="blue"><span id="sum_pay_price">0</span></span>
                            - <span class="red"><span id="sum_refund_price">0</span></span>
                            = <span id="sum_total_price">0</span>원
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

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/' . $sales_type . 'Sales/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        var chk_param = {}, chk_name = '', chk_value = '';
                        $search_form.find('input[type="checkbox"]:checked').each(function() {
                            chk_name = $(this).prop('name');
                            chk_value = $(this).val();

                            if (chk_param.hasOwnProperty(chk_name) === true) {
                                chk_param[chk_name] = chk_param[chk_name] + ',' + chk_value;
                            } else {
                                chk_param[chk_name] = chk_value;
                            }
                        });

                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length}, chk_param);
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/pay/order/show') }}/' +row.OrderIdx + '" class="blue" target="_blank"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + '(' + row.MemId + ')<br/>' + row.MemPhone;
                    }},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'PayMethodCcdName'},
                    {'data' : 'LgCateName'},
                    {'data' : 'ProdTypeCcdName', 'render' : function(data, type, row, meta) {
                        return data + (row.SalePatternCcdName !== '' ? '<br/>(' + row.SalePatternCcdName + ')' : '');
                    }},
                    {'data' : 'ProdName', 'render' : function(data, type, row, meta) {
                        return '<span class="blue no-line-height">[' + (row.LearnPatternCcdName !== null ? row.LearnPatternCcdName : row.ProdTypeCcdName) + ']</span> ' + data;
                    }},
                    {'data' : 'RealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'CompleteDatm'},
                    {'data' : 'RefundPrice', 'render' : function(data, type, row, meta) {
                        return row.RefundIdx !== null ? '<span class="red no-line-height">' + addComma(data) + '</span>' : '';
                    }},
                    {'data' : 'RefundDatm'},
                    {'data' : 'PayStatusCcdName'}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');
                $('#sum_pay_price').html(addComma(json.sum_data.SumPayPrice));
                $('#sum_refund_price').html(addComma(json.sum_data.SumRefundPrice));
                $('#sum_total_price').html(addComma(json.sum_data.SumPayPrice - json.sum_data.SumRefundPrice));
            });

            // 사이트 탭 클릭
            $search_form.find('#tabs_site_code > li > a').on('click', function() {
                changeCategory($(this).data('site-code'));
            });

            // 사이트코드별 카테고리 변경
            var changeCategory = function(site_code) {
                var $layer = $search_form.find('#layer_cate_code');

                if (site_code !== '') {
                    // display
                    $layer.find('.search_chk_cate_code').css('display', 'none');
                    $layer.find('.search_chk_cate_code').filter('.' + site_code).css('display', '');

                    // checkbox disabled
                    $layer.find('input[name="search_chk_cate_code"]').iCheck('disable');
                    $layer.find('input[name="search_chk_cate_code"]').filter('.' + site_code).iCheck('enable');
                }
            };

            changeCategory($search_form.find('input[name="search_site_code"]').val());

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    var params = [];
                    var chk_params = {};

                    $.each($search_form.serializeArray(), function(k, v) {
                        if (v.name.indexOf('search_chk_') !== -1) {
                            // checkbox value 설정
                            if (chk_params.hasOwnProperty(v.name) === true) {
                                chk_params[v.name] = chk_params[v.name] + ',' + v.value;
                            } else {
                                chk_params[v.name] = v.value;
                            }
                        } else {
                            params.push({ 'name' : v.name, 'value' : v.value });
                        }
                    });

                    $.each(chk_params, function(k, v) {
                        params.push({ 'name' : k, 'value' : v });
                    });

                    formCreateSubmit('{{ site_url('/sales/' . $sales_type . 'Sales/excel') }}', params, 'POST');
                }
            });
        });
    </script>
@stop
