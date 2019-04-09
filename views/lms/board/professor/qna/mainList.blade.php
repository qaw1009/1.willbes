@extends('lcms.layouts.master')

@section('content')
    <h5>- 교수 학습 Q&A 게시판을 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_site_tabs('tabs_site_code') !!}
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
                    <th class="valign-middle">NO</th>
                    <th class="valign-middle">운영사이트</th>
                    <th class="valign-middle">교수코드</th>
                    <th class="valign-middle">교수명</th>
                    <th class="valign-middle">카테고리->과목</th>
                    <th class="valign-middle">미답변개수</th>
                    <th class="valign-middle" width="10%">공개사용여부<br/>(학습Q&A)</th>
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
                            if (row.SiteCode == {{config_item('app_intg_site_code')}}) {
                                return '통합';
                            } else {
                                var str = '없음';
                                if (data != null) {
                                    str = '';
                                    var obj = data.split(',');
                                    for (key in obj) {
                                        str += obj[key] + "<br>";
                                    }
                                }
                                return str;
                            }
                        }},
                    {'data' : 'BoardProfCount'},
                    {'data' : 'IsBoardPublic', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                ]
            });

            // 교수별 리스트 페이지
            $list_table.on('click', '.btn-detailList', function() {
                /*location.href='{{ site_url("/board/professor/{$boardName}/detailList") }}/' + dtParamsToQueryString($datatable) + '{!! $boardDefaultQueryString !!}' + '&prof_idx=' + $(this).data('idx');*/
                location.href='{{ site_url("/board/professor/{$boardName}/detailList") }}?' + '{!! $boardDefaultQueryString !!}' + '&prof_idx=' + $(this).data('idx');
            });
        });
    </script>
@stop