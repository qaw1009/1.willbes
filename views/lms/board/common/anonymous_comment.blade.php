<style>
    .ano-comment-disuse-tr {background-color: gainsboro !important;}
</style>
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
                    <label class="control-label col-md-2" for="search_comment_value" style="width: 100px;">통합검색</label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="search_comment_value" name="search_comment_value">
                    </div>
                    <div class="col-md-2" style="width: 220px;">
                        <p class="form-control-static">• 이름, 아이디, 내용 검색 기능</p>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btn-search-comment" style="height:25px;">검 색</button>
                    </div>
                </div>
            </form>
        </div>
        {{--
        <div class="row mt-10">
            <div class="col-xs-12 text-right">
                <button type="button" class="btn btn-primary btn-search-comment"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default mr-20 btn-reset-comment">검색초기화</button>
            </div>
        </div>
        --}}
        <div class="row">
            <table id="list_ajax_comment_table" class="table table-striped table-bordered" data-excel-name="Another table">
                <colgroup>
                    <col width="10%">
                    <col width="*">
                    <col width="15%">
                    <col width="15%">
                    <col width="10%">
                </colgroup>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>댓글</th>
                        <th>등록자(아이디)</th>
                        <th>작성일</th>
                        <th>삭제</th>
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
                // { text: '<i class="fa fa-pencil mr-10"></i> 사용', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-use-y' },
                // { text: '<i class="fa fa-pencil mr-10"></i> 미사용', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-use-n' },
            ],
            ajax: {
                'url' : '{{ site_url("/common/searchBoardComment/listAjax/".$board_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_comment_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            createdRow: function (row, data, index) {
                if(data.IsUse != undefined && data.IsUse == 'N') {
                    $(row).addClass('ano-comment-disuse-tr');
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_comment.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return row.Comment;
                    }},
                {'data' : 'RegNickName', 'render' : function(data, type, row, meta) {
                        var rtn_str = '';
                        if(data != undefined) rtn_str = data + ' (' + row.MemId + ')';
                        return rtn_str;
                    }},
                {'data' : 'RegDatm'},
                {'data' : 'BoardCmtIdx', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.BoardCmtIdx + '"><u><p class="red">삭제</p></u></a>';
                    }},
            ]
        });

        // 검색
        $('.btn-search-comment').click(function () {
            $datatable_comment.draw();
        });

        // 검색초기화
        {{--
        $('.btn-reset-comment').click(function () {
            $search_comment_form[0].reset();
            $datatable_comment.draw();
        });
        --}}

        $list_comment_table.on('click', '.btn-delete', function() {
            var $params = {};
            var _url = '{{ site_url("/common/searchBoardComment/delete/".$board_idx) }}';
            var is_status = 'N';

            $params[$(this).data('idx')] = 'on';

            // if (Object.keys($params).length <= '0') {
            //     alert('삭제할 게시글을 선택해주세요.');
            //     return false;
            // }

            var data = {
                '{{ csrf_token_name() }}' : $search_comment_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'PUT',
                'params' : JSON.stringify($params),
                'is_status' : is_status
            };

            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_comment.draw();
                }
            }, showError, false, 'POST');
        });

        {{--
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
        --}}
    });
</script>