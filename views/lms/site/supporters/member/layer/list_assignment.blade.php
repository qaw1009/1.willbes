<form class="form-horizontal" id="search_form_assignment" name="search_form_assignment" method="POST" onsubmit="return false;">
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
                <th>과제명</th>
                <th>제출기간</th>
                <th>제출명</th>
                <th>제출상태</th>
                <th>과제제출일</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_assignment');
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url('/site/supporters/member/ajaxAssignmentDataTable/') }}',
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
                            return '<a href="javascript:void(0);" class="btn-board-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        } else {
                            return '';
                        }
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.SupportersStartDate + '~' + row.SupportersEndDate;
                    }},
                {'data' : 'AssignmentTitle', 'render' : function(data, type, row, meta) {
                        if (data != '') {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BaIdx + '" data-board-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        } else {
                            return '';
                        }
                    }},
                {'data' : 'AssignmentStatusCcdName'},
                {'data' : 'AssignmentRegDatm'}
            ]
        });

        init_datatable();

        $list_table.on('click', '.btn-read', function() {
            var _url = "{{ site_url("/site/supporters/activityHistory/readAssignmentModal/") }}" + $(this).data('idx');
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

        $list_table.on('click', '.btn-board-read', function() {
            $('.btn-board-read').setLayer({
                "url" : "{{ site_url("/site/supporters/assignment/readAssignmentModal/") }}" + $(this).data('idx'),
                "width" : "1200"
            });
        });
    });
</script>