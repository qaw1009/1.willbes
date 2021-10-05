<form class="form-horizontal" id="search_form_qna" name="search_form_qna" method="POST" onsubmit="return false;">
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
                <th>상담유형</th>
                <th>과목</th>
                <th>제목</th>
                <th>등록일</th>
                <th>답변상태</th>
                <th>답변자</th>
                <th>답변일</th>
                <th>공개여부</th>
                <th>조회수</th>
                <th>수정</th>
                <th>삭제(관리자)</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_qna');
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url('/site/supporters/member/ajaxQnaDataTable/') }}',
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
                {'data' : 'TypeCcdName'},
                {'data' : 'SubjectName'},
                {'data' : 'Title', 'render' : function(data, type, row, meta) {
                        if (data != '') {
                            return '<a href="javascript:void(0);" class="btn-read" data-idx="' + row.BoardIdx + '"><u>' + data + '</u></a>';
                        } else {
                            return '';
                        }
                    }},
                {'data' : 'RegDatm'},

                {'data' : 'ReplyStatusCcdName'},
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
                {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                        if (row.RegType == 1) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                        } else {
                            if (row.ReplyStatusCcd == '{{$arr_reply_code['finish']}}') {
                                return '<a href="javascript:void(0);" class="btn-reply-modify" data-idx="' + row.BoardIdx + '"><u>수정</u></a>';
                            } else {
                                return '<a href="javascript:void(0);" class="btn-reply-modify" data-idx="' + row.BoardIdx + '"><u>답변</u></a>';
                            }
                        }
                    }},
                {'data' : 'BoardIdx', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.BoardIdx + '"><u><p class="red">삭제</p></u></a>';
                    }},
            ]
        });

        init_datatable();
        $list_table.on('click', '.btn-read', function() {
            var _url = "{{ site_url("/site/supporters/member/readQnaReplyModal/") }}" + $(this).data('idx');
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

        $list_table.on('click', '.btn-reply-modify', function() {
            var _url = "{{ site_url("/site/supporters/member/createQnaReplyModal/") }}" + $(this).data('idx');
            var board_idx = $(this).data('board-idx');

            $('.btn-reply-modify').setLayer({
                "url" : _url,
                "width" : "1200",
                'add_param_type' : 'param',
                'add_param' : [
                    { 'id' : 'board_idx', 'name' : '게시판식별자', 'value' : board_idx, 'required' : true }
                ]
            });
        });

        $list_table.on('click', '.btn-delete', function() {
            var _url = '{{ site_url("/site/supporters/member/deleteBoard") }}/' + $(this).data('idx') + getQueryString();
            var data = {
                '{{ csrf_token_name() }}' : $search_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE'
            };

            if (!confirm('해당 게시물을 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable.draw(false);
                }
            }, showError, false, 'POST');
        });
    });
</script>