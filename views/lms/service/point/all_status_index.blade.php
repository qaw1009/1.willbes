@extends('lcms.layouts.master')

@section('content')
    <h5>- 전체 포인트 적립/차감 현황을 확인할 수 있습니다.</h5>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs bar_tabs mb-0" role="tablist">
                <li role="presentation" id="tab_lecture"><a href="{{ site_url('/service/point/allStatus/index/lecture') }}">강좌포인트</a></li>
                <li role="presentation" id="tab_book"><a href="{{ site_url('/service/point/allStatus/index/book') }}">교재포인트</a></li>
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
                    <label class="control-label col-md-1" for="search_member_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_member_value" name="search_member_value">
                    </div>
                    <div class="col-md-8">
                        <p class="form-control-static">이름, 아이디, 휴대폰번호 뒷4자리 검색 가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_order_no">주문번호</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_order_no" name="search_order_no">
                    </div>
                    <label class="control-label col-md-1 col-md-offset-2">조건검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_point_status_ccd" name="search_point_status_ccd">
                            <option value="">상태</option>
                            @foreach($arr_point_status_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                                <option value="U">차감</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <select class="form-control mr-10" id="search_point_type" name="search_point_type">
                            <option value="all">적립/차감일</option>
                            <option value="save">적립일</option>
                            <option value="use">차감일</option>
                        </select>
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
                    <th>운영사이트</th>
                    <th>회원명</th>
                    <th>주문번호</th>
                    <th>유효기간</th>
                    <th>상태</th>
                    <th>적립/차감액</th>
                    <th>적립/차감일</th>
                    <th>등록자</th>
                    <th>적립/차감사유</th>
                </tr>
                <tr>
                    <td colspan="10" class="text-center">
                        <h4 class="inline-block pr-20 no-margin">[유효포인트] <span class="blue">{{ number_format($valid_save_point) }}P</span></h4>
                        <h4 class="inline-block pl-20 no-margin">[당월소멸예정포인트] <span class="red">{{ number_format($expire_save_point) }}P</span></h4>
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

            // 전체포인트현황 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/point/allStatus/listAjax/' . $_point_type) }}',
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
                    {'data' : 'SiteName'},
                    {'data' : 'MemName', 'render' : function(data, type, row, meta) {
                        return data + ' (<u class="blue">' + row.MemId + '</u>)';
                    }},
                    {'data' : 'OrderNo', 'render' : function(data, type, row, meta) {
                        return data != null ? '<a href="{{ site_url('/pay/order/show/') }}' + row.OrderIdx + '" target="_blank"><u class="blue">' + data + '</u></a>' : '';
                    }},
                    {'data' : 'ExpireDatm', 'render' : function(data, type, row, meta) {
                        return data != null ? row.RegDatm.substr(0, 16) + ' ~ ' + data.substr(0, 16) : '';
                    }},
                    {'data' : 'PointStatusCcdName', 'render' : function(data, type, row, meta) {
                        return row.PointStatusCcd === 'U' ? '<div class="inline-block red">' + data + '</div>' : '<div class="inline-block blue">' + data + '</div>';
                    }},
                    {'data' : 'PointAmt', 'render' : function(data, type, row, meta) {
                        return row.PointStatusCcd === 'U' ? '<div class="inline-block red">-' + addComma(data) + '</div>' : '<div class="inline-block blue">+' + addComma(data) + '</div>';
                    }},
                    {'data' : 'RegDatm'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'ReasonCcdName'}
                ]
            });

            // 포인트 구분 탭 active 처리
            $('#tab_{{ $_point_type }}').tab('show').addClass('bold');

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/point/allStatus/excel/' . $_point_type) }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
