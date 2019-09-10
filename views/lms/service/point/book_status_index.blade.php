@extends('lcms.layouts.master')

@section('content')
    <h5>- 교재포인트 적립/차감 현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code') !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1">적립일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_save_start_date" name="search_save_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_save_end_date" name="search_save_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">사용기준 적립일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_use_save_start_date" name="search_use_save_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_use_save_end_date" name="search_use_save_end_date" value="" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">사용일</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_use_start_date" name="search_use_start_date" value="" autocomplete="off">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_use_end_date" name="search_use_end_date" value="" autocomplete="off">
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
                    <th rowspan="2" class="valign-middle">기간(년월)</th>
                    <th colspan="2">회원가입</th>
                    <th colspan="2">교재</th>
                    <th colspan="2">강의</th>
                </tr>
                <tr class="bg-odd">
                    <th>적립합계</th>
                    <th>사용합계</th>
                    <th>적립합계</th>
                    <th>사용합계</th>
                    <th>적립합계</th>
                    <th>사용합계</th>
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
            if ($search_form.find('input[name="search_save_start_date"]').val().length < 1 || $search_form.find('input[name="search_save_end_date"]').val().length < 1) {
                setDefaultDatepicker(-1, 'mon', 'search_save_start_date', 'search_save_end_date');

                var search_start_date = $search_form.find('input[name="search_save_start_date"]').val();
                var search_end_date = $search_form.find('input[name="search_save_end_date"]').val();

                $search_form.find('input[name="search_use_save_start_date"]').val('2019-01-01');
                $search_form.find('input[name="search_use_save_end_date"]').val(search_end_date);
                $search_form.find('input[name="search_use_start_date"]').val(search_start_date);
                $search_form.find('input[name="search_use_end_date"]').val(search_end_date);
            }

            // 교재포인트현황 목록
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/service/point/bookStatus/listAjax') }}',
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
                    {'data' : 'BaseYm'},
                    {'data' : 'JoinSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'JoinUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'BookSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'BookUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'LectureSavePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }},
                    {'data' : 'LectureUsePoint', 'render' : function(data, type, row, meta) {
                        return addComma(data);
                    }}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/service/point/bookStatus/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
