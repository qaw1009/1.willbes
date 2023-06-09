@include('lms.member.layer.board.sub_tab_partial')

<form class="form-horizontal" id="search_form_counsel" name="search_form_counsel" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel mt-5">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">제목/내용</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>
                <label class="control-label col-md-2" for="search_replay_value">답변</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="search_replay_value" name="search_replay_value">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-right form-inline">
                    <div class="checkbox">
                        <input type="checkbox" name="search_chk_delete_value" value="1" class="flat" id="delete_value"/> <label for="delete_value">삭제글 보기</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset">검색초기화</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th>NO</th>
                <th>운영사이트</th>
                <th>캠퍼스</th>
                <th>카테고리</th>
                <th>분류</th>
                <th>상담유형</th>
                <th>제목</th>
                <th>등록자</th>
                <th>등록일</th>
                <th>답변상태</th>
                <th>답변자</th>
                <th>답변일</th>
                <th>공개</th>
                <th>조회수</th>
                <th>댓글수</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_counsel');
    var $list_table = $('#list_ajax_table');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url('/member/manage/ajaxCounselDataTable/') }}',
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

        // 삭제글 보기
        $search_form.on('ifChanged', '#delete_value', function() {
            $datatable.draw();
        });

        $list_table.on('click', '.btn-counsel-read', function() {
            window.open('{{ site_url("/board/counsel/readCounselReply") }}/' + $(this).data('idx') + dtParamsToQueryString($datatable) + '&bm_idx={{$bm_idx}}', '_blank');
        });

        init_datatable();
    });
</script>