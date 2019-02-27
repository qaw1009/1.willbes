@include('lms.member.layer.crm.sub_tab_partial')

<form class="form-horizontal" id="search_form_message" name="search_form_message" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel mt-5">
        <div class="x_content">
            <div class="form-group">
                <label class="control-label col-md-1" for="search_value">제목/내용</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="search_value" name="search_value">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 text-right form-inline">
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset">검색초기화</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table_message" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th>NO</th>
                <th>사이트</th>
                <th>내용</th>
                <th>발신인</th>
                <th>발송일</th>
                <th>발송상태</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_message');
    var $list_table = $('#list_ajax_table_message');

    $(document).ready(function() {
        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            buttons: [],
            ajax: {
                'url' : '{{ site_url('/member/manage/ajaxMessageDataTable/') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'SiteName'},
                {'data' : 'Content', 'render' : function(data, type, row, meta){
                        return '<a href="javascript:void(0);" class="btn-send-detail-read mr-20" data-idx="' + row.SendIdx + '" data-member-idx="' + row.MemIdx + '"><u>' + data + '</u></a>';
                    }},
                {'data' : 'wAdminName'},
                {'data' : 'SendDatm'},
                {'data' : 'SendStatusCcdName', 'render' : function(data, type, row, meta){
                        var css_type = 'text-success';
                        if (row.SendStatusCcd == '{{$arr_send_status_ccd_vals[1]}}') {
                            css_type = 'text-primary';
                        } else if (row.SendStatusCcd == '{{$arr_send_status_ccd_vals[2]}}') {
                            css_type = 'text-danger';
                        }
                        return '<span class='+css_type+'>'+data+'</span>';
                    }},
            ],
        });

        // 발송 상세 정보
        $list_table.on('click', '.btn-send-detail-read', function() {
            $('.btn-send-detail-read').setLayer({
                "url" : "{{ site_url('crm/message/listSendDetailModal/') }}" + $(this).data('idx') + '/?member_idx=' + $(this).data('member-idx'),
                width : "1200"
            });
        });

        init_datatable();
    });
</script>