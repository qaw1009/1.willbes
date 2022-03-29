@extends('lcms.layouts.master')

@section('content')
    <h5>- 사이트 기준 상품구분별 매출현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">상품기본정보</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_prod_type_ccd" name="search_prod_type_ccd" title="상품구분">
                            <option value="">상품구분</option>
                            @foreach($arr_prod_type_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_learn_pattern_ccd" name="search_learn_pattern_ccd" title="상품상세구분">
                            <option value="">강좌구분</option>
                            @foreach($arr_learn_pattern_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_channel_ccd" name="search_pay_channel_ccd" title="결제채널">
                            <option value="">결제채널</option>
                            @foreach($arr_pay_channel_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-10" id="search_pay_route_ccd" name="search_pay_route_ccd" title="결제루트">
                            <option value="">결제루트</option>
                            @foreach($arr_pay_route_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_pay_method_ccd" name="search_pay_method_ccd" title="결제수단">
                            <option value="">결제수단</option>
                            @foreach($arr_pay_method_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
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
                    <label class="control-label col-md-1">결제일/환불일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off" title="조회시작일자">
                        </div>
                        <span class="pl-5 pr-5">~</span>
                        <div class="input-group mb-0">
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off" title="조회종료일자">
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
                    <th>No</th>
                    <th class="rowspan">상품구분</th>
                    <th class="rowspan">강좌구분</th>
                    <th class="rowspan">결제채널</th>
                    <th>결제루트</th>
                    <th>결제현황</th>
                    <th>환불현황</th>
                    <th>매출현황</th>
                </tr>
                <tr>
                    <td colspan="20" class="bg-odd text-center">
                        <h4 class="inline-block no-margin">
                            <span id="search_period" class="pr-5"></span>
                            <span class="blue"><span id="sum_pay_price">0</span></span>
                            - <span class="red"><span id="sum_refund_price">0</span></span>
                            = <span id="sum_remain_price">0</span>
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
            $search_form.find('select[name="search_lg_cate_code"]').chained("#search_site_code");
            $search_form.find('select[name="search_md_cate_code"]').chained("#search_lg_cate_code");

            // datatable
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/sales/prodTypeStats/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                createdRow: function(row, data, dataIndex) {
                    if (data.LearnPatternCcdName === '합계') {
                        $('td:gt(1)', row).addClass('bg-info bold');
                    }
                },
                rowsGroup: ['.rowspan'],
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ProdTypeCcdName'},
                    {'data' : 'LearnPatternCcdName'},
                    {'data' : 'PayChannelCcdName'},
                    {'data' : 'PayRouteCcdName'},
                    {'data' : 'tRealPayPrice', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '원 (' + addComma(row.tOrderProdCnt) + '건)';
                    }},
                    {'data' : 'tRefundPrice', 'render' : function(data, type, row, meta) {
                        return '<span class="red no-line-height">' + addComma(data) + '원 (' + addComma(row.tRefundCnt) + '건)</span>';
                    }},
                    {'data' : 'tRemainPrice', 'render' : function(data, type, row, meta) {
                        return '<a href="{{ site_url('/sales/prodTypeStats/show') }}/' + row.ProdTypeCcd + '" data-row="' + row.LearnPatternCcd + ':' + row.PayChannelCcd + ':' + row.PayRouteCcd + '" class="blue btn-view"><u>' + addComma(data) + '원 (' + addComma(row.tRealPayCnt) + '건)</u></a>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                $('#search_period').html('[' + $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val() + ']');

                if (json.sum_data !== null) {
                    $('#sum_pay_price').html(addComma(json.sum_data.tRealPayPrice) + ' (' + addComma(json.sum_data.tOrderProdCnt) + '건)');
                    $('#sum_refund_price').html(addComma(json.sum_data.tRefundPrice) + ' (' + addComma(json.sum_data.tRefundCnt) + '건)');
                    $('#sum_remain_price').html(addComma(json.sum_data.tRemainPrice) + ' (' + addComma(json.sum_data.tRealPayCnt) + '건)');
                } else {
                    $('#sum_pay_price').html('0');
                    $('#sum_refund_price').html('0');
                    $('#sum_remain_price').html('0');
                }
            });

            // 매출현황 클릭
            $datatable.on('click', '.btn-view', function(e) {
                e.preventDefault();
                var rows = $(this).data('row').split(':');
                location.href = $(this).prop('href')
                    + '?site_code=' + $search_form.find('select[name="search_site_code"]').val()
                    + '&start_date=' + $search_form.find('input[name="search_start_date"]').val()
                    + '&end_date=' + $search_form.find('input[name="search_end_date"]').val()
                    + '&learn_pattern_ccd=' + rows[0]
                    + '&pay_channel_ccd=' + rows[1]
                    + '&pay_route_ccd=' + rows[2]
                    + '&' + dtParamsToQueryString($datatable).substr(1);
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(e) {
                e.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/sales/prodTypeStats/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
