@extends('lcms.layouts.master')

@section('content')
    @include('lms.board.boardnav')
    <h5>- 교수 공지사항 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건</label>
                    <div class="col-md-3 form-inline">
                        <select class="form-control" id="search_is_use" name="search_is_use">
                            <option value="">과목명</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                    <label class="control-label col-md-1" for="search_start_date">교수명 검색</label>
                    <div class="col-md-5 form-inline">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-xs-12 text-right form-inline">
                    <button type="submit" class="btn btn-primary btn-search ml-10" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button class="btn btn-default ml-30 mr-30" type="button">검색초기화</button>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>사이트</th>
                    <th>구분</th>
                    <th>과목</th>
                    <th>교수명</th>
                    <th>등록개수</th>
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
                ajax: {
                    'url' : '{{ site_url("/board/{$boardName}/mainListAjax") }}',
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
                    {'data' : 'wContentCcdName'},
                    {'data' : 'wProfIdx'},
                    {'data' : 'wProfId'},
                    {'data' : 'wProfName', 'render' : function(data, type, row, meta) {
                            return '<a href="#" class="btn-detailList" data-idx="' + row.wProfIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'wIsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wRegAdminName'},
                    {'data' : 'wRegDatm'}
                ]
            });

            // 교수별 리스트 페이지
            $list_table.on('click', '.btn-detailList', function() {
                location.replace('{{ site_url("/board/{$boardName}/detailList") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable));
            });
        });
    </script>
@stop