@extends('lcms.layouts.master')

@section('content')
    <h5>- 주문상품별 포인트 적립/차감 현황을 확인할 수 있습니다. (통합 이후 포인트만 조회 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_prod_code"><span class="required">*</span> 상품코드</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="search_prod_code" name="search_prod_code">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static"><span class="required">*</span> 상품코드를 입력해 주세요. (다수 상품일 경우 공백없이 쉼표(,)로 구분하여 입력)</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">적립/사용일</label>
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
                <tr class="bg-odd">
                    <th>No</th>
                    <th>상품코드</th>
                    <th>상품명</th>
                    <th>기간(년월)</th>
                    <th>적립합계</th>
                    <th>적립건수</th>
                    <th>사용합계</th>
                    <th>사용건수</th>
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

            // 전체포인트현황 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/point/prodStatus/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ProdCode'},
                    {'data' : 'ProdName'},
                    {'data' : 'RegYm'},
                    {'data' : 'SumSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'SumSaveCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'SumUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'SumUseCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/point/prodStatus/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
