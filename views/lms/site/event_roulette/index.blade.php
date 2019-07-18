@extends('lcms.layouts.master')

@section('content')
    <h5>- 이벤트 룰렛 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">검색</label>
                    <div class="col-md-11 form-inline">
                        <input type="text" class="form-control" id="search_roulette_code" name="search_roulette_code" placeholder="룰렛코드">

                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">제목</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
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
                    <th>No</th>
                    <th>룰렛코드</th>
                    <th>제목</th>
                    <th>아이디 기준 참여 횟수</th>
                    <th>전체 참여 횟수</th>
                    <th>당첨카운트기준일</th>
                    <th>기간</th>
                    <th>신규회원가입대상 사용여부</th>
                    <th>룰렛확률타입</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>수정</th>
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
            /*setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');*/

            // site-code에 매핑되는 select box 자동 변경
            $search_form.find('select[name="search_campus_ccd"]').chained("#search_site_code");
            $search_form.find('select[name="search_category"]').chained("#search_site_code");

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/eventRoulette/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url('/site/eventRoulette/listAjax') }}',
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
                    {'data' : 'RouletteCode'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-member-list" data-idx="' + row.RouletteCode + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'MemberLimitCount'},
                    {'data' : 'MaxLimitCount'},
                    {'data' : 'CountType', 'render' : function(data, type, row, meta) {
                            return (data === 'D') ? '1일' : '전체';
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return row.RouletteStartDatm + ' ~ ' + row.RouletteEndDatm;
                        }},
                    {'data' : 'NewMemberJoinType', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' + ' ('+ row.NewMemberJoinStartDate + ' ~ ' + row.NewMemberJoinEndDate +')' : '미사용';
                        }},
                    {'data' : 'ProbabilityType', 'render' : function(data, type, row, meta) {
                            return (data === '1') ? '수동' : '<span class="blue">자동</span>';
                        }},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.RouletteCode + '"><u>수정</u></a>';
                        }}
                ]
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/eventRoulette/create') }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });

            $list_table.on('click', '.btn-member-list', function() {
                $('.btn-member-list').setLayer({
                    "url" : "{{ site_url('site/eventRoulette/memberListModal/') }}" + $(this).data('idx'),
                    width : "1200"
                });
            });
        });
    </script>
@stop