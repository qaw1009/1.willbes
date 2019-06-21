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
                <th>첨부</th>
                <th>제출기간</th>
                <th>제출상태</th>
                <th>과제제출일</th>
                <th>제출자</th>
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
                        if (row.IsBest == '1') {
                            return '<b>공지</b>';
                        } else {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }
                    }},
                {'data' : 'SiteName'},
                {'data' : 'CampusName'},
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
                {'data' : 'MdCateName'},
                {'data' : 'TypeCcdName'},
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-counsel-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'RegType', 'render' : function(data, type, row, meta) {
                        if (data == 1) {
                            return row.wAdminName;
                        } else {
                            if (row.RegMemName == null) {
                                return '';
                            } else {
                                return row.RegMemName+'('+row.RegMemIdx+')';
                            }

                        }
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'ReplyStatusCcdName', 'render' : function(data, type, row, meta) {
                        return (data == '미답변') ? '<p class="red">'+data+'</p>' : data;
                    }},
                {'data' : 'ReplyRegAdminName'},
                {'data' : 'ReplyRegDatm'},
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
                    }},
                {'data' : 'CommentCnt'},
            ]
        });

        init_datatable();
    });
</script>