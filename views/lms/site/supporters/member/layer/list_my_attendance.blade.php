<form class="form-horizontal" id="search_form_attendance" name="search_form_attendance" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    @foreach($arr_hidden_data as $key => $val)
        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
    @endforeach
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table_attendance" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>NO</th>
                <th>출석체크 등록일자</th>
                <th>출석체크 등록일시</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable_attendance;
    var $search_form_attendance = $('#search_form_attendance');
    var $list_table_attendance = $('#list_ajax_table_attendance');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable_attendance = $list_table_attendance.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-calendar mr-10"></i> 달력보기', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-calendar' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/supporters/member/ajaxMyAttendanceDataTable/') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form_attendance.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_attendance.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'AttendanceDay'},
                {'data' : 'RegDatm'}
            ]
        });

        $('.btn-calendar').on('click', function() {
            var _url = "{{ site_url("/site/supporters/member/calendarModal/") }}";
            var supporters_idx = $search_form_attendance.find('input[name="supporters_idx"]').val();
            var member_idx = $search_form_attendance.find('input[name="member_idx"]').val();

            $('.btn-calendar').setLayer({
                "url" : _url,
                "width" : "900",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'supporters_idx', 'name' : '서포터즈식별자', 'value' : supporters_idx, 'required' : true },
                    { 'id' : 'member_idx', 'name' : '회원식별자', 'value' : member_idx, 'required' : true }
                ]
            });
        });
    });
</script>