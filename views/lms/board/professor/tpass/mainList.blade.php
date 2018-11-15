@extends('lcms.layouts.master')

@section('content')
    <h5>- 특정 강좌를 구매한 회원들에게 제공하는 학습자료를 관리하는 메뉴입니다. (운영자 패키지만 사용)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs('','tabs_site_code') !!}
        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value=""/>
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
                    <th>운영사이트</th>
                    <th>교수코드</th>
                    <th>교수명</th>
                    <th>구분->과목</th>
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
                    'url' : '{{ site_url("/board/professor/{$boardName}/mainListAjax?") }}' + '{!! $boardDefaultQueryString !!}',
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
                    {'data' : 'ProfIdx'},
                    {'data' : 'ProfNickName', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-detailList" data-idx="' + row.ProfIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'CateCode', 'render' : function(data, type, row, meta){
                            var obj = data.split(',');
                            var str = '';
                            for (key in obj) {
                                str += obj[key]+"<br>";
                            }
                            return str;
                        }},
                ]
            });

            // 교수별 리스트 페이지
            $list_table.on('click', '.btn-detailList', function() {
                location.href='{{ site_url("/board/professor/{$boardName}/productList") }}/' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}' + '&prof_idx=' + $(this).data('idx');
            });
        });
    </script>
@stop