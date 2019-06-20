@extends('lcms.layouts.master')

@section('content')
    <h5>- 서포터즈 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($arr_base['def_site_code'], 'tabs_site_code', 'tab', false, [], false, $arr_base['arr_site_code']) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_supporters_idx">서포터즈 검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($arr_base['def_site_code'], 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                        <select class="form-control" id="search_supporters_idx" name="search_supporters_idx">
                            <option value="">서포터즈 선택</option>
                            @foreach($arr_base['arr_supporters_data'] as $row)
                                <option value="{{ $row['SupportersIdx'] }}" class="{{ $row['SiteCode'] }}">{!! $row['Title'] . " [{$row['SupportersYear']}-{$row['SupportersNumber']}]" !!}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_supporters_type" name="search_supporters_type">
                            <option value="">구분</option>
                            @foreach($arr_base['arr_supporters_type'] as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">이름, 아이디 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1 col-md-offset-1" for="search_start_date">등록일</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group mb-0">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>운영사이트</th>
                    <th>구분</th>
                    <th>연도</th>
                    <th>기수</th>
                    <th>제목</th>
                    <th>첨부</th>
                    <th>제출자</th>
                    <th>제출일</th>
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
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [],
                ajax: {
                    'url' : '{{ site_url("/site/supporters/activityHistory/listAjax?") }}',
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
                    {'data' : 'SupportersTypeName'},
                    {'data' : 'SupportersYear'},
                    {'data' : 'SupportersNumber'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-bm-idx="' + row.BmIdx + '" data-idx="' + row.Idx + '" data-board-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                            return tmp_return;
                        }},
                    {'data' : 'MemName'},
                    {'data' : 'RegDatm'}
                ],
            });

            $list_table.on('click', '.btn-read', function() {
                if ($(this).data('bm-idx') == '104') {
                    var _url = "{{ site_url("/site/supporters/activityHistory/readAssignmentModal/") }}" + $(this).data('idx');
                } else {
                    var _url = "{{ site_url("/site/supporters/activityHistory/readFreeBoardModal/") }}" + $(this).data('idx');
                }
                var board_idx = $(this).data('board-idx');

                $('.btn-read').setLayer({
                    "url" : _url,
                    "width" : "1200",
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'board_idx', 'name' : '게시판식별자', 'value' : board_idx, 'required' : true }
                    ]
                });
            });
        });
    </script>
@stop
