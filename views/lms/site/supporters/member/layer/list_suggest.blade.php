<form class="form-horizontal" id="search_form_suggest" name="search_form_suggest" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    @foreach($arr_hidden_data as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
    @endforeach
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th>NO</th>
                <th>제목</th>
                <th>첨부파일</th>
                <th>등록일</th>
                <th>공개여부</th>
                <th>조회수</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_suggest');
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url('/site/supporters/member/ajaxSuggestDataTable/') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            "createdRow" : function( row, data, index ) {
                if (data['IsBest'] == '1') {
                    $(row).addClass('blue-sky');
                }

                if (data['IsStatus'] == 'N') {
                    $(row).addClass('bg-gray-custom');
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        if (data != '') {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        } else {
                            return '';
                        }
                    }},
                {'data' : 'AttachFileName', 'render' : function(data, type, row, meta) {
                        var tmp_return;
                        (data === null) ? tmp_return = '' : tmp_return = '<p class="glyphicon glyphicon-file"></p>';
                        return tmp_return;
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'IsPublic', 'render' : function(data, type, row, meta) {
                        if (row.IsBest == 1) {
                            return '';
                        } else {
                            return (data == 'Y') ? '공개' : '<p class="red">비공개</p>';
                        }
                    }},
                {'data' : 'ReadCnt', 'render' : function(data, type, row, meta) {
                        var cnt = Number(data) + Number(row.SettingReadCnt);
                        return cnt;
                    }}
            ]
        });

        init_datatable();

        $list_table.on('click', '.btn-read', function() {
            var _url = "{{ site_url("/site/supporters/activityHistory/readSuggestModal/") }}" + $(this).data('idx');
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