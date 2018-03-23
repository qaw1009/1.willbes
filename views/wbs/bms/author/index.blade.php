@extends('lcms.layouts.master')

@section('content')
    <h5>- 윌비스 온라인에서 제공하는 전체 교재의 저자정보를 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">명칭, 코드 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
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
                <tr>
                    <th>No</th>
                    <th>저자 코드</th>
                    <th>저자명</th>
                    <th>설명</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
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
            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 저자 등록', className: 'btn-sm btn-primary border-radius-reset btn-regist' }
                ],
                ajax: {
                    'url' : '{{ site_url('/bms/author/listAjax') }}',
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
                    {'data' : 'wAuthorIdx'},
                    {'data' : 'wAuthorName', 'render' : function(data, type, row, meta) {
                        return '<a href="#" class="btn-modify" data-idx="' + row.wAuthorIdx + '"><u>' + data + '</u></a>';
                    }},
                    {'data' : 'wAuthorShortDesc'},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                        return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 출판사 등록/수정 모달창 오픈
            $('.btn-regist').setLayer({
                'url' : '{{ site_url('/bms/author/create') }}',
                'width' : 900
            });

            $list_table.on('click', '.btn-modify', function() {
                $('.btn-modify').setLayer({
                    'url' : '{{ site_url('/bms/author/create/') }}' + $(this).data('idx'),
                    'width' : 900
                });
            });
        });
    </script>
@stop
