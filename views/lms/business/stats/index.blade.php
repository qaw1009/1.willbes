@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 전체 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">조건검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'mr-10', '운영 사이트', '') !!}
                        <select class="form-control mr-10" id="search_prod_type_ccd" name="search_prod_type_ccd">
                            <option value="">상품구분</option>
                            @foreach($arr_prod_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_cate_code" name="search_cate_code">
                            <option value="">직종</option>
                            @foreach($arr_category as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
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
            <div class="text-right">
                <h5 class="no-margin pt-5 inline-block"><span class="required">*</span> 매출 클릭 시 검색한 기간의 매출현황을 확인 할 수 있습니다.</h5>
                <button type="button" class="btn btn-sm btn-success btn-excel ml-10 mr-0"><i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드</button>
            </div>
            <table id="list_ajax_table" class="table table-bordered">
                <thead>
                <tr class="bg-odd">
                    <th class="rowspan">사이트</th>
                    <th class="rowspan">상품구분</th>
                    <th>직종</th>
                    <th>매출</th>
                </tr>
                <tr>
                    <td colspan="4" class="bg-odd text-center">
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
                paging: false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/business/allStats/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.ProdTypeCcd === '999999') {
                        $(row).addClass('bg-info');
                        $('td:eq(3) > a', row).addClass('blue bold');
                        this.api().cell($('td:eq(0)', row)).data(data.SiteName + ' - 총 합계');
                    }

                    if (data.ProdTypeCcd !== '999999' && data.LgCateCode === '9999') {
                        $('td:eq(2)', row).text('강좌 소계');
                        $('td:eq(2), td:eq(3)', row).addClass('bg-info bold');
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : 'SiteName', 'render' : function(data, type, row, meta) {
                        return '<strong>' + data + '</strong>';
                    }},
                    {'data' : 'ProdTypeCcdName'},
                    {'data' : 'LgCateName'},
                    {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
                        return '<a class="cs-pointer btn-view" data-site-code="' + row.SiteCode + '" data-prod-type-ccd="' + row.ProdTypeCcd + '" data-lg-cate-code="' + row.LgCateCode + '"><u>' + addComma(data) + '원</u> (' + row.tOrderProdCnt + '건)</a>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_total_price').html(addComma(json.sum_data.tRemainPrice));
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_total_price').html('0');
                }
            });

            // 카테고리 자동 변경
            $search_form.find('select[name="search_cate_code"]').chained("#search_site_code");

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/business/allStats/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 매출현황 금액 클릭
            $list_table.on('click', '.btn-view', function() {
                var start_date = $search_form.find('input[name="search_start_date"]').val();
                var end_date = $search_form.find('input[name="search_end_date"]').val();
                var show_uri = '/' + $(this).data('site-code')  + '/' + $(this).data('prod-type-ccd') + '/' + $(this).data('lg-cate-code') + '/' + start_date + '/' + end_date;

                location.href = '{{ site_url('/business/allStats/show') }}' + show_uri + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop
