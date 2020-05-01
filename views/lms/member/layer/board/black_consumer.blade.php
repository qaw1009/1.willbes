@include('lms.member.layer.board.sub_tab_partial')
<form class="form-horizontal" id="regi_form_blackconsumer" name="regi_form_blackconsumer" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="regi_memIdx" value="{{$memIdx}}" />
    <input type="hidden" name="bc_idx" value="" />
    <div class="x_panel mt-5">
        <div class="x_content">
            <div class="form-group">
                <div class="col-xs-1">
                    {!! html_site_select('', 'regi_site_code', 'regi_site_code', '', '운영 사이트', '', '', true) !!}
                </div>
                <div class="col-md-5 form-inline">
                    <button type="submit" class="btn btn-success mr-10">저장</button>
                    <button type="button" class="btn btn-default mr-10" onclick="javascript:data_clear();">취소</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-6">
                    <textarea id="regi_content" name="regi_content" class="form-control" rows="7" title="내용" placeholder=""></textarea>
                </div>
            </div>
        </div>
    </div>
</form>

<form class="form-horizontal" id="search_form_blackconsumer" name="search_form_blackconsumer" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table_blackconsumer" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th>NO</th>
                <th>운영사이트</th>
                <th>내용</th>
                <th>등록자</th>
                <th>등록일</th>
                <th>최종수정자</th>
                <th>최종수정일</th>
                <th>수정</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_blackconsumer');
    var $list_table = $('#list_ajax_table_blackconsumer');
    var $regi_form = $('#regi_form_blackconsumer');

    $(document).ready(function() {
        // 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            paging: true,
            ajax: {
                'url' : '{{ site_url('/member/manage/ajaxBlackConsumerDataTable/') }}',
                'type' : 'POST',
                'data' : function(data) {
                    return $.extend(arrToJson($search_form.serializeArray()), {});
                }
            },
            columns: [
                {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                {'data' : 'SiteName'},
                {'data' : 'Content', 'render' : function(data, type, row, meta) {
                        return '<p id="content_id_'+row.BcIdx+'">'+nl2br(data)+'</p>';
                    }},
                {'data' : 'RegAdminName'},
                {'data' : 'RegDatm'},
                {'data' : 'UpdAdminName'},
                {'data' : 'UpdDatm'},
                {'data' : 'BcIdx', 'render' : function(data, type, row, meta) {
                        var return_data = '';
                        return_data += '<a href="javascript:void(0);" class="btn-modify" ';
                        return_data += 'data-bc-idx="'+row.BcIdx+'" ';
                        return_data += 'data-site-code="'+row.SiteCode+'" ';
                        return_data += '>';
                        return_data += '<u>수정</u>';
                        return_data += '</a>';
                        return return_data;
                    }},
            ]
        });

        $regi_form.submit(function() {
            if($regi_form.find('#regi_content').val().length > 1000) {
                alert('1000자까지 입력 가능합니다.');
                return;
            }

            var _url = '{{ site_url('/member/manage/storeBlackConsumer/') }}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    data_clear();
                    $datatable.draw();
                }
            }, showValidateError, '', false, 'alert');
        });

        $list_table.on('click', '.btn-modify', function () {
            var $regi_bc_idx = $regi_form.find('input[name="bc_idx"]');
            var $regi_site_code = $regi_form.find('select[name="regi_site_code"]');
            var $regi_content = $regi_form.find('textarea[name="regi_content"]');

            $regi_bc_idx.val($(this).data('bc-idx'));
            $regi_site_code.val($(this).data('site-code')).attr("selected", "selected");
            $regi_content.val($("#content_id_"+$(this).data("bc-idx")).text());
        });

        init_datatable();
    });

    function data_clear() {
        var $regi_bc_idx = $regi_form.find('input[name="bc_idx"]');
        var $regi_site_code = $regi_form.find('select[name="regi_site_code"]');
        var $regi_content = $regi_form.find('textarea[name="regi_content"]');
        $regi_bc_idx.val(''); $regi_site_code.val(''); $regi_content.val('');
    }

    function nl2br(str){
        return str.replace(/\n/g, "<br />");
    }
</script>