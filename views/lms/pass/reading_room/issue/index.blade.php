@extends('lcms.layouts.master')

@section('content')
    <h5>- 독서실 주문 내역을 확인하고, 좌석배정/변경하거나 연장하는 메뉴입니다. (좌석 신규배정 및 변경/연장배정 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_site_tabs('tabs_site_code', 'tab', false) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">조건</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control" id="" name="">
                            <option value="">결제상태</option>
                        </select>

                        <select class="form-control" id="" name="">
                            <option value="">예치금반환</option>
                        </select>

                        <select class="form-control" id="" name="">
                            <option value="">배정여부</option>
                        </select>

                        <select class="form-control" id="" name="">
                            <option value="">좌석상태</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">독서실검색</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control" id="search_campus_ccd" name="search_campus_ccd">
                            <option value="">캠퍼스</option>
                            @foreach($arr_campus as $row)
                                <option value="{{ $row['CampusCcd'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CampusName'] }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="" name="">
                            <option value="">독서실명</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-3">
                        <p class="form-control-static">회원명, 아이디, 연락처, 주문번호검색가능</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1">기간검색</label>
                    <div class="col-md-10 form-inline">
                        <select class="form-control mr-10" id="search_date_type" name="search_date_type">
                            <option value="P">결제완료일</option>
                            <option value="R">등록일</option>
                            <option value="S">대여시작일</option>
                            <option value="E">대여종료일</option>
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
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date active" data-period="0-mon">당월</button>
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
            <div class="col-xs-12 text-right">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default" id="_btn_reset">검색초기화</button>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>주문번호</th>
                    <th>회원명</th>
                    <th>연락처</th>
                    <th>결제완료일</th>
                    <th>캠퍼스</th>
                    <th>독서실명</th>
                    <th>결제금액</th>
                    <th>결제상태</th>
                    <th>좌석번호</th>
                    <th>예치금</th>
                    <th>대여시작일</th>
                    <th>대여종료일</th>
                    <th>배정여부</th>
                    <th>좌석상태</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>배정/변경</th>
                    <th>연장</th>
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
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 독서실등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/pass/readingRoom/regist/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/pass/readingRoom/issue/listAjax') }}',
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
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.Idx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'MemName'},
                    {'data' : 'MemPhone'},
                    {'data' : '결제완료일'},
                    {'data' : 'CampusName'},
                    {'data' : 'ReadingRoomName'},
                    {'data' : '결제금액'},
                    {'data' : '결제상태'},
                    {'data' : '좌석번호'},
                    {'data' : '예치금'},
                    {'data' : '대여시작일'},
                    {'data' : '대여종료일'},
                    {'data' : 'AssingIsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '배정' : '<span class="red">미배정</span>';
                        }},
                    {'data' : '좌석상태'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="create-seat-modal" data-idx="' + row.Idx + '"><u>' + row.aaa + '</u></a>';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-seat" data-idx="' + row.Idx + '"><u>' + row.bbb + '</u></a>';
                        }}
                ]
            });

            // 좌석배정
            $list_table.on('click', '.create-seat-modal', function() {
                $('.create-seat-modal').setLayer({
                    "url" : "{{ site_url('/pass/readingRoom/issue/createIssueSeatModal/') }}"+ $(this).data('seat-num'),
                    "width" : "1200",
                    "modal_id" : "modal_html"
                });
            });
        });
    </script>
@stop