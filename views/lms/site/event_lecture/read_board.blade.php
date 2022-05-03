<div class="x_content">
    <form class="form-horizontal" id="search_promotion_board_form" name="search_promotion_board_form" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label class="control-label col-md-2">조건</label>
            <div class="col-md-8 form-inline">
                <select class="form-control" id="search_board_type" name="search_board_type">
                    <option value="">구분</option>
                    <option value="1">합격수기</option>
                    <option value="2">수강후기</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-2" for="search_board_value">통합검색</label>
            <div class="col-md-2">
                <input type="text" class="form-control" id="search_board_value" name="search_board_value">
            </div>
            <div class="col-md-2">
                <p class="form-control-static">• 아이디, 이름 검색 가능</p>
            </div>
        </div>
    </form>
</div>
<div class="x_content mt-10 mb-20">
    <div class="col-xs-12 text-right">
        <button type="button" class="btn btn-primary btn-search-promotion-board"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
        <button type="button" class="btn btn-default mr-20 btn-reset-promotion-board">검색초기화</button>
    </div>
</div>

<div class="x_panel mt-20">
    <div class="x_content">
        <table id="list_ajax_promotion_board_table" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>구분</th>
                <th>아이디</th>
                <th>이름</th>
                <th>제목</th>
                <th>응시지역</th>
                <th>과목</th>
                <th>교수</th>
                <th>평점</th>
                <th>등록일</th>
                <th>첨부파일</th>
                <th>삭제</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    var $datatable_promotion_board;
    var $search_promotion_board_form = $('#search_promotion_board_form');
    var $list_promotion_board_table = $('#list_ajax_promotion_board_table');

    $(document).ready(function() {
        $datatable_promotion_board = $list_promotion_board_table.DataTable({
            serverSide: true,
            buttons: [
                { text: '<i class="fa fa-send mr-10"></i> 엑셀변환', className: 'btn-default btn-sm btn-success border-radius-reset mr-15 btn-excel-promotion-board' },
                { text: '<i class="fa fa-pencil mr-10"></i> 목록', className: 'btn-sm btn-primary border-radius-reset ml-15 btn-list' },
            ],
            ajax: {
                'url' : '{{ site_url('/site/eventLecture/listPromotionBoardAjax/'.$data['PromotionCode']) }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_promotion_board_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable_promotion_board.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'BoardTypeName'},
                {'data' : 'MemId'},
                {'data' : 'MemName'},
                {'className' : 'btn-show-content', 'orderable' : false, 'data' : 'ReTitle', 'render' : function(data, type, row, meta) {
                        return '<u class="bold" style="cursor: pointer">'+data+'</u>';
                    }},
                {'data' : 'AreaName'},
                {'data' : 'SubjectName'},
                {'data' : 'ProfName'},
                {'data' : 'Score'},
                {'data' : 'RegDatm'},
                {'data' : 'AttachData', 'render' : function(data, type, row, meta) {
                        var temp_return = '';
                        if (data == 'N' || data == null) {
                            temp_return = '';
                        } else {
                            $.each(JSON.parse(data), function(index, row) {
                                temp_return += '<p><a href="javascript:void(0);" class="file-download" data-file-path="' + encodeURIComponent(row.FilePath+row.FileName) + '" data-file-name="' + encodeURIComponent(row.FileName) + '">[' + row.RealName + ']</a></p>';
                            });
                        }
                        return temp_return;
                    }},
                {'data' : 'EpbIdx', 'render' : function(data, type, row, meta) {
                        return '<a href="javascript:void(0);" class="btn-delete" data-idx="' + row.EpbIdx + '"><u>삭제</u></a>';
                    }},
            ]
        });

        $list_promotion_board_table.on('click', '.btn-show-content', function () {
            var tr = $(this).closest('tr');
            var row = $datatable_promotion_board.row(tr);

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

        function format(d) {
            // `d` is the original data object for the row
            return '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                '<td width="10px;"><b>제목</b></td>'+
                '<td>'+ d.Title +'</td>'+
                '</tr>'+
                '<tr>'+
                '<td><b>내용</b></td>'+
                '<td>'+ nl2br(d.Content) +'</td>'+
                '</tr>'+
                '</table>';
        }

        function nl2br(str){
            return str.replace(/\n/g, "<br />");
        }

        // 검색
        $('.btn-search-promotion-board').click(function() {
            $datatable_promotion_board.draw();
        });

        // 검색초기화
        $('.btn-reset-promotion-board').click(function() {
            $search_promotion_board_form[0].reset();
            $datatable_promotion_board.draw();
        });

        // 엑셀다운로드 버튼 클릭
        $('.btn-excel-promotion-board').on('click', function(event) {
            event.preventDefault();
            formCreateSubmit('{{ site_url('/site/eventLecture/promotionBoardExcel/'.$data['PromotionCode']) }}', $search_promotion_board_form.serializeArray(), 'POST');
        });

        // 파일다운로드
        $list_promotion_board_table.on('click', '.file-download', function() {
            var _url = '{{ site_url("/site/eventLecture/download") }}/' + '?path=' + $(this).data('file-path') + '&fname=' + $(this).data('file-name');
            window.open(_url, '_blank');
        });

        $list_promotion_board_table.on('click', '.btn-delete', function () {
            var _url = '{{ site_url("/site/eventLecture/deletePromotionBoard") }}/' + $(this).data('idx');
            var data = {
                '{{ csrf_token_name() }}' : $search_promotion_board_form.find('input[name="{{ csrf_token_name() }}"]').val(),
                '_method' : 'DELETE'
            };
            if (!confirm('해당 게시물을 삭제하시겠습니까?')) {
                return;
            }
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    $datatable_promotion_board.draw(false);
                }
            }, showError, false, 'POST');
        });
    });
</script>