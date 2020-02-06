<div class="x_panel">
    <div class="x_title">
        <h5>댓글현황</h5>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="row">
            <form class="form-horizontal" id="search_comment_form" name="search_comment_form" method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label class="control-label col-md-2" for="search_comment_value">통합검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_comment_value" name="search_comment_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">• 이름, 아이디 검색 기능</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-10">
            <div class="col-xs-12 text-right">
                <button type="button" class="btn btn-primary btn-search-comment"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20 btn-reset-comment">검색초기화</button>
            </div>
        </div>
        <div class="row">
            <table id="list_ajax_comment_table" class="table table-striped table-bordered" data-excel-name="Another table">
                <thead>
                <tr>
                    <th>선택</th>
                    <th>No</th>
                    <th>댓글</th>
                    <th>사용여부</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>관리자</th>
                    <th>상태수정일</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    var $datatable_comment;
    var $search_comment_form = $('#search_comment_form');
    var $list_comment_table = $('#list_ajax_comment_table');

    $(document).ready(function() {
        $datatable_comment = $list_comment_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-pencil mr-10"></i> 사용', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-use-y' },
                { text: '<i class="fa fa-pencil mr-10"></i> 미사용', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-use-n' },
            ],
            ajax: {
                'url' : '{{ site_url("/common/searchBoardComment/listAjax/".$board_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_comment_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" class="flat" data-cmt-idx="' + row.BoardCmtIdx + '">';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_comment.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return "<textarea style='width:100%; height:100px; boarder:0px; margin:0px;' readonly='readonly'>"+row.Comment+"</textarea>";
                    }},
                {'data' : 'IsUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                //{'data' : 'MemName'},
                {'data' : 'RegNickName', 'render' : function(data, type, row, meta) {
                        var rtn_str = '';
                        if(data != undefined) rtn_str = data + ' (' + row.MemId + ')';
                        return rtn_str;
                    }},

                {'data' : 'RegDatm'},
                {'data' : 'UpdAdminName'},
                {'data' : 'UpdAdminDatm'}
            ]
        });

        // 검색
        $('.btn-search-comment').click(function () {
            $datatable_comment.draw();
        });

        // 검색초기화
        $('.btn-reset-comment').click(function () {
            $search_comment_form[0].reset();
            $datatable_comment.draw();
        });

        $('.btn-use-y, .btn-use-n').on('click', function() {
            var $params = {};
            var _url = '{{ site_url("/common/searchBoardComment/update/".$board_idx) }}';
            var is_use = $(this).prop('class').indexOf('btn-use-n') !== -1 ? 'N' : 'Y';

            $('input[name="is_checked"]:checked').each(function() {
                $params[$(this).data('cmt-idx')] = $(this).val();
            });

            if (Object.keys($params).length <= '0') {
                alert('사용할 게시글을 선택해주세요.');
                return false;
            }

            var data = {
                '{{ csrf_token_name() }}' : $search_comment_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'params' : JSON.stringify($params),
                'is_use' : is_use
            };

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_comment.draw();
                }
            }, showError, false, 'POST');
        });
    });
</script>