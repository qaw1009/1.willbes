<div class="row">
    <form class="form-horizontal" id="search_comment_form" name="search_comment_form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-md-2" for="search_member_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_member_value" name="search_member_value">
            </div>
            <div class="col-md-2">
                <p class="form-control-static">• 이름, 아이디, 연락처 검색 기능</p>
            </div>
            <label class="control-label col-md-1" for="search_member_start_date">신청기간검색</label>
            <div class="col-md-5">
                <div class="col-md-11 form-inline">
                    <div class="input-group mb-0 mr-20">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_member_start_date" name="search_member_start_date" value="">
                        <div class="input-group-addon no-border no-bgcolor">~</div>
                        <div class="input-group-addon no-border-right">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control datepicker" id="search_member_end_date" name="search_member_end_date" value="">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row mt-10 mb-20">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-primary btn-search-comment"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-comment">검색초기화</button>
    </div>
</div>

<div class="row mt-20">
    <form class="form-horizontal" id="regi_comment_form" name="regi_comment_form" method="POST">
    {!! csrf_field() !!}
        <input type="hidden" name="comment_el_idx" value="{{$el_idx}}">
    <div class="form-group">
        <label class="control-label col-md-2" for="search_member_value">댓글입력</label>
        <div class="col-md-10">
            <div class="form-group">
                <div class="col-md-1">관리자명</div>
                <div class="col-md-5 form-inline">
                    <input type="text" class="form-control" id="admin_name" name="admin_name" value="{{$wAdmin_info['wAdminName']}}">
                    <select class="form-control" name="comment_ui_type_ccd">
                    @foreach($data['arr_comment_ui_type_ccd'] as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-7">
                    <textarea id="event_comment" name="event_comment" class="form-control" rows="7" title="댓글" placeholder="댓글을 입력해 주세요."></textarea>
                </div>
                <div class="col-md-2">
                    <input type="button" class="btn btn-sm btn-default btn-primary border-radius-reset btn-comment-submit" value="댓글등록">
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="x_panel mt-20">
    <div class="x_content">
        <table id="list_ajax_comment_table" class="table table-striped table-bordered" data-excel-name="Another table">
            <thead>
            <tr>
                <th>선택</th>
                <th>No</th>
                <th>댓글종류</th>
                <th>이름</th>
                <th>아이디</th>
                <th>연락처</th>
                <th>이메일</th>
                <th>댓글</th>
                <th>작성일</th>
                <th>사용여부</th>
                <th>삭제여부</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_comment;
    var $search_comment_form = $('#search_comment_form');
    var $list_comment_table = $('#list_ajax_comment_table');
    var $regi_comment_form = $('#regi_comment_form');

    $(document).ready(function() {
        $datatable_comment = $list_comment_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-comment' },
                { text: '<i class="fa fa-send mr-10"></i> 쪽지발송', className: 'btn-sm btn-info border-radius-reset btn-message' },
                { text: '<i class="fa fa-send mr-10"></i> SMS발송', className: 'btn-sm btn-info border-radius-reset ml-15 btn-sms' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-list' },
                { text: '<i class="fa fa-pencil mr-10"></i> 공지등록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-evnet-notice' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listCommentAjax/'.$el_idx) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_comment_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" name="is_checked" class="flat target-crm-member" data-mem-idx="' + row.temp_MemIdx + '">';
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        /*return $datatable_comment.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);*/
                        if (row.temp_type == 'notice') {
                            return '<a href="javascript:void(0);" class="btn-notice-modify" data-board-idx="' + row.temp_idx + '"><u>공지</u></a>';
                        } else if (row.temp_type == 'comment'){
                            return $datatable_comment.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }
                    }},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        if (typeof row.temp_comment_ui_ccd_name == 'undefined') {
                            return '';
                        } else {
                            return row.temp_comment_ui_ccd_name;
                        }
                    }},
                {'data' : 'temp_Name'},
                {'data' : 'temp_MemId'},
                {'data' : 'temp_Phone'},
                {'data' : 'temp_Mail'},
                {'data' : null, 'render' : function(data, type, row, meta) {
                        if (row.temp_type == 'notice') {
                            return '<a href="javascript:void(0);" class="btn-notice-read" data-read-board-idx="' + row.temp_idx + '"><u>'+row.temp_Title+'</u></a>';
                        } else if (row.temp_type == 'comment'){
                            return "<textarea style='width:100%; height:100px; boarder:0px; margin:0px;' readonly='readonly'>"+row.temp_Title+"</textarea>";
                        }
                    }},
                {'data' : 'temp_RegDatm'},
                {'data' : 'temp_isUse', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                {'data' : 'temp_isStatus', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '<a href="#none" class="btn-delete" data-board-comment-idx="' + row.temp_idx + '"><span class="blue"><u>사용</u></span></a>' : '<span class="red">삭제</span>';
                    }}
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

        // 댓글등록
        $('.btn-comment-submit').click(function () {
            if (!confirm('댓글을 등록하시겠습니까?')) {
                return;
            }

            var _url = '{{ site_url("/site/eventLecture/storeComment/") }}';
            ajaxSubmit($regi_comment_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_comment.draw();
                }
            }, showValidateError, addValidateComment, false, 'alert');
        });

        $list_comment_table.on('click', '.btn-delete', function() {
            var _url = '{{ site_url("/site/eventLecture/deleteComment/") }}' + $(this).data('board-comment-idx');
            var data = {
                '{{ csrf_token_name() }}' : $regi_comment_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE'
            };

            if (!confirm('해당 댓글을 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_comment.draw();
                }
            }, showError, false, 'POST');
        })

        // 공지등록
        $('.btn-evnet-notice').click(function () {
            $('.btn-evnet-notice').setLayer({
                "url" : "{{ site_url('/site/eventLecture/createNoticeModal/'.$el_idx) }}",
                "width" : "1000"
            });
        });

        // 공지수정
        $list_comment_table.on('click', '.btn-notice-modify', function() {
            var board_idx = $(this).data('board-idx');
            $('.btn-notice-modify').setLayer({
                "url" : '{{ site_url('/site/eventLecture/createNoticeModal/'.$el_idx) }}'+'?board_idx='+board_idx,
                "width" : "1000"
            });
        });

        // 공지Read
        $list_comment_table.on('click', '.btn-notice-read', function() {
            var board_idx = $(this).data('read-board-idx');
            var uri_param = '?board_idx='+board_idx;

            $('.btn-notice-read').setLayer({
                "url" : '{{ site_url('/site/eventLecture/readNoticeModal/'.$el_idx) }}'+uri_param,
                "width" : "1000"
            });
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-comment').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/commentExcel/'.$el_idx) }}', $search_comment_form.serializeArray(), 'POST');
        });
    });

    function addValidateComment()
    {
        if($regi_comment_form.find('textarea[name="event_comment"]').val() == '') {
            alert('댓글을 입력해 주세요.');
            return false;
        }
        return true;
    }
</script>