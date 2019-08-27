@extends('lcms.layouts.master')

@section('content')
    <h5>- 자막 등록/관리 하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="form-group">
            <div class="col-md-2 form-inline">
                <select class="form-control" id="search_is_use" name="search_is_use">
                    <option value="">사용유무</option>
                    <option value="Y">사용</option>
                    <option value="N">미사용</option>
                </select>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>제목</th>
                    <th>이미지</th>
                    <th>등록자</th>
                    <th>사용</th>
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
            /*$search_form.on('change', '#search_is_use', function() {*/
            $search_form.on('change', 'select[name="search_is_use"]', function() {
                $datatable.draw();
            });

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-10"></i> 등록', className: 'btn-sm btn-primary border-radius-reset', action: function(e, dt, node, config) {
                            location.href = '{{ site_url("/predict/subTitles/create") }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                ajax: {
                    'url' : '{{ site_url("/predict/subTitles/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'PstIdx', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.PstIdx + '"><u>' + row.Title + '</u></a>';
                        }},
                    {'data' : 'AttachFileRealName', 'render' : function(data, type, row, meta) {
                            var tmp_return;
                            (data === null) ? tmp_return = '' : tmp_return = '<img src="'+row.AttachFileFullPath+'" style="height:70px;">';
                            return tmp_return;
                        }},

                    {'data' : 'wAdminName'},
                    {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                            return (data == 'Y') ? '사용' : '<p class="red">미사용</p>';
                        }}
                ],
            });

            // 데이터 수정 폼
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url("/predict/subTitles/create") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop