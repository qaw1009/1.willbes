@extends('lcms.layouts.master')

@section('content')
    <h5>- 첨삭 과제를 등록하고 수강생들의 과제 제출내역 확인, 첨삭을 제공하는 메뉴입니다. (단강좌만 사용)</h5>
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
                    <th>교수코드</th>
                    <th>교수명</th>
                    <th>카테고리->과목</th>
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
                            var str = '없음';
                            if (data != null) {
                                var obj = data.split(',');
                                for (key in obj) {
                                    str += obj[key] + "<br>";
                                }
                            }
                            return str;
                        }},
                ]
            });

            // 교수별 리스트 페이지
            $list_table.on('click', '.btn-detailList', function() {
                /*location.href='{{ site_url("/board/professor/{$boardName}/productList") }}/' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}' + '&prof_idx=' + $(this).data('idx');*/
                location.href='{{ site_url("/board/professor/{$boardName}/productList") }}?' + '{!! $boardDefaultQueryString !!}' + '&prof_idx=' + $(this).data('idx');
            });
        });
    </script>
@stop