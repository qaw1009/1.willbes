@extends('lcms.layouts.master')

@section('content')
    <h5>- 적립/차감 사유별 포인트 현황을 확인할 수 있습니다.</h5>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
                <li role="presentation" id="tab_lecture"><a href="{{ site_url('/service/point/reasonStatus/index/lecture') }}">강좌포인트</a></li>
                <li role="presentation" id="tab_book"><a href="{{ site_url('/service/point/reasonStatus/index/book') }}">교재포인트</a></li>
            </ul>
        </div>
    </div>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">적립/차감일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="" autocomplete="off" title="검색시작일자">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="" autocomplete="off" title="검색종료일자">
                        </div>
                        <div class="btn-group mr-20" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-mon">전월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                        <div class="radio mr-20">
                            <input type="radio" id="search_date_type_day" name="search_date_type" class="flat" value="day"/> <label for="search_date_type_day" class="input-label">일</label>
                            <input type="radio" id="search_date_type_month" name="search_date_type" class="flat" value="month" checked="checked"/> <label for="search_date_type_month" class="input-label">월</label>
                            <input type="radio" id="search_date_type_year" name="search_date_type" class="flat" value="year"/> <label for="search_date_type_year" class="input-label">년</label>
                        </div>
                        <div class="inline-block">
                            * 검색기간이 31일을 초과할 경우 '월'로 365일이 초과할 경우 '년'으로 자동 변환
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
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="valign-middle">기간</th>
                    <th colspan="6">적립포인트</th>
                    <th colspan="5">사용포인트</th>
                </tr>
                <tr class="bg-odd">
                    <th>회원가입</th>
                    <th>주문/결제</th>
                    <th>환불(사용복구)</th>
                    <th>이벤트</th>
                    <th>기타</th>
                    <th class="bg-info">합계</th>
                    <th>주문/결제</th>
                    <th>환불(적립회수)</th>
                    <th>소멸</th>
                    <th>기타</th>
                    <th class="bg-info">합계</th>
                </tr>
                <tr class="bg-info">
                    <th colspan="2" class="text-center">합계</th>
                    <th id="t_join_save_point" class="sumTh"></th>
                    <th id="t_order_save_point" class="sumTh"></th>
                    <th id="t_refund_save_point" class="sumTh"></th>
                    <th id="t_event_save_point" class="sumTh"></th>
                    <th id="t_etc_save_point" class="sumTh"></th>
                    <th id="t_save_point" class="sumTh"></th>
                    <th id="t_order_use_point" class="sumTh"></th>
                    <th id="t_refund_use_point" class="sumTh"></th>
                    <th id="t_expire_use_point" class="sumTh"></th>
                    <th id="t_etc_use_point" class="sumTh"></th>
                    <th id="t_use_point" class="sumTh"></th>
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
                setDefaultDatepicker(-1, 'mon', 'search_start_date', 'search_end_date');
            }

            // 포인트 구분 탭 active 처리
            $('#tab_{{ $_point_type }}').tab('show').addClass('bold');

            // 적립/차감 사유별 현황 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/point/reasonStatus/listAjax/' . $_point_type) }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        checkSearchDateType();
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'BaseDate'},
                    {'data' : 'JoinSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'OrderSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'RefundSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'EventSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'EtcSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'SavePoint', 'render' : function(data, type, row, meta) {
                        return '<strong>' + addComma(data) + '</strong>';
                    }},
                    {'data' : 'OrderUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'RefundUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'ExpireUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'EtcUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'UsePoint', 'render' : function(data, type, row, meta) {
                        return '<strong>' + addComma(data) + '</strong>';
                    }}
                ]
            });

            // 조회된 기간의 합계금액 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#t_join_save_point').html(addComma(json.sum_data.tJoinSavePoint));
                    $('#t_order_save_point').html(addComma(json.sum_data.tOrderSavePoint));
                    $('#t_refund_save_point').html(addComma(json.sum_data.tRefundSavePoint));
                    $('#t_event_save_point').html(addComma(json.sum_data.tEventSavePoint));
                    $('#t_etc_save_point').html(addComma(json.sum_data.tEtcSavePoint));
                    $('#t_save_point').html(addComma(json.sum_data.tSavePoint));
                    $('#t_order_use_point').html(addComma(json.sum_data.tOrderUsePoint));
                    $('#t_refund_use_point').html(addComma(json.sum_data.tRefundUsePoint));
                    $('#t_expire_use_point').html(addComma(json.sum_data.tExpireUsePoint));
                    $('#t_etc_use_point').html(addComma(json.sum_data.tEtcUsePoint));
                    $('#t_use_point').html(addComma(json.sum_data.tUsePoint));
                } else {
                    $('#list_ajax_table thead tr th.sumTh').text('');
                }
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/point/reasonStatus/excel/' . $_point_type) }}', $search_form.serializeArray(), 'POST');
                }
            });

            // 날짜 차이에 따라 검색기간 구분값 자동 변경
            function checkSearchDateType() {
                var dt_type = $search_form.find('input[name="search_date_type"]:checked').val();
                var start_date = $search_form.find('input[name="search_start_date"]').val();
                var end_date = $search_form.find('input[name="search_end_date"]').val();
                var diff_date;

                if (dt_type !== 'year') {
                    diff_date = getDiffDate(start_date, end_date, 'days');

                    if (diff_date > 365) {
                        $search_form.find('input[name="search_date_type"][value="year"]').prop('checked', true).iCheck('update');
                    } else if (diff_date > 31) {
                        $search_form.find('input[name="search_date_type"][value="month"]').prop('checked', true).iCheck('update');
                    }
                }
            }
        });
    </script>
@stop
