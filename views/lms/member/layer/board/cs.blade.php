@include('lms.member.layer.board.sub_tab_partial')
<form class="form-horizontal" id="regi_form_cs" name="regi_form_cs" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="regi_memIdx" value="{{$memIdx}}" />
    <input type="hidden" name="cs_idx" value="" />
    <div class="x_panel mt-5">
        <div class="x_content">
            <div class="form-group">
                <div class="col-xs-12 form-inline">
                    {!! html_site_select('', 'regi_site_code', 'regi_site_code', '', '운영 사이트', '', '', true) !!}&nbsp
                    [상담구분]
                    <select class="form-control" id="regi_group_cs_ccd" name="regi_group_cs_ccd">
                        <option value="">구분</option>
                        @foreach($codes['consult_group_ccd']  as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>&nbsp
                    <select class="form-control" id="regi_cs_ccd" name="regi_cs_ccd">
                        <option value="">분류</option>
                        @foreach($codes['consult_ccd']  as $row)
                            <option value="{{$row['ccd']}}" class="{{$row['group']}}">{{$row['ccd_name']}}</option>
                        @endforeach
                    </select>&nbsp
                    <input type="radio" id="is_success_y" name="regi_is_success" class="flat" value="Y" title="조치여부" checked="checked"/> <label for="is_success_y" class="input-label">조치</label>
                    <input type="radio" id="is_success_n" name="regi_is_success" class="flat" value="N" title="조치여부"/> <label for="is_success_n" class="input-label">미조치</label>
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

<form class="form-horizontal" id="search_form_cs" name="search_form_cs" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="search_member_idx" value="{{$memIdx}}" />
    <div class="x_panel mt-5">
        <div class="x_content">
            <div class="form-group">
                <div class="col-xs-12 text-right form-inline">
                    <select class="form-control" id="search_group_cs_ccd" name="search_group_cs_ccd">
                        <option value="">구분</option>
                        @foreach($codes['consult_group_ccd']  as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>&nbsp

                    <select class="form-control" id="search_cs_ccd" name="search_cs_ccd">
                        <option value="">분류</option>
                        @foreach($codes['consult_ccd']  as $row)
                            <option value="{{$row['ccd']}}" class="{{$row['group']}}">{{$row['ccd_name']}}</option>
                        @endforeach
                    </select>&nbsp

                    <input type="text" name="search_value" id="search_value" class="form-control"  style="width: 150px;"  value="" >
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset">검색초기화</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table_cs" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th>NO</th>
                <th>운영사이트</th>
                <th>구분</th>
                <th>분류</th>
                <th>상담내용</th>
                <th>조치여부</th>
                <th>등록자</th>
                <th>등록일</th>
                <th>최종수정자</th>
                <th>최종수정일</th>
                <th>수정</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_cs');
    var $list_table = $('#list_ajax_table_cs');
    var $regi_form = $('#regi_form_cs');

    $(document).ready(function() {
        $search_form.find('select[name="search_cs_ccd"]').chained("#search_group_cs_ccd");
        $regi_form.find('select[name="regi_cs_ccd"]').chained("#regi_group_cs_ccd");

        // 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            paging: true,
            ajax: {
                'url' : '{{ site_url('/member/manage/ajaxCsDataTable/') }}',
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
                {'data' : 'CsGroupCcdName'},
                {'data' : 'CsCcdName'},
                {'data' : 'Content', 'render' : function(data, type, row, meta) {
                        return '<p id="content_id_'+row.CsIdx+'">'+nl2br(data)+'</p>';
                    }},
                {'data' : 'IsSuccessName'},
                {'data' : 'RegAdminName'},
                {'data' : 'RegDatm'},
                {'data' : 'UpdAdminName'},
                {'data' : 'UpdDatm'},
                {'data' : 'CsIdx', 'render' : function(data, type, row, meta) {
                        var return_data = '';
                        return_data += '<a href="javascript:void(0);" class="btn-modify" ';
                        return_data += 'data-cs-idx="'+row.CsIdx+'" ';
                        return_data += 'data-site-code="'+row.SiteCode+'" ';
                        return_data += 'data-group-ccd="'+row.CsGroupCcd+'" ';
                        return_data += 'data-ccd="'+row.CsCcd+'" ';
                        return_data += 'data-is-success="'+row.IsSuccess+'" ';
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

            var _url = '{{ site_url('/member/manage/storeMemberCs/') }}';

            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    notifyAlert('success', '알림', ret.ret_msg);
                    data_clear();
                    $datatable.draw();
                }
            }, showValidateError, '', false, 'alert');
        });

        $list_table.on('click', '.btn-modify', function () {
            var $regi_cs_idx = $regi_form.find('input[name="cs_idx"]');
            var $regi_site_code = $regi_form.find('select[name="regi_site_code"]');
            var $regi_group_ccd = $regi_form.find('select[name="regi_group_cs_ccd"]');
            var $regi_ccd = $regi_form.find('select[name="regi_cs_ccd"]');
            var $regi_is_success = $regi_form.find('input[name="regi_is_success"]');
            var $regi_content = $regi_form.find('textarea[name="regi_content"]');

            $regi_cs_idx.val($(this).data('cs-idx'));
            $regi_site_code.val($(this).data('site-code')).attr("selected", "selected");
            $regi_group_ccd.val($(this).data('group-ccd')).attr("selected", "selected");
            $regi_group_ccd.trigger('change');
            $regi_ccd.val($(this).data('ccd')).attr("selected", "selected");

            if ($(this).data('is-success') == 'Y') {
                $regi_is_success.filter("#is_success_y").prop("checked", true).iCheck('update');
                $regi_is_success.filter("#is_success_n").prop("checked", false).iCheck('update');
            } else {
                $regi_is_success.filter("#is_success_y").prop("checked", false).iCheck('update');
                $regi_is_success.filter("#is_success_n").prop("checked", true).iCheck('update');
            }
            $regi_content.val($("#content_id_"+$(this).data("cs-idx")).text());
        });

        init_datatable();
    });

    function data_clear() {
        var $regi_cs_idx = $regi_form.find('input[name="cs_idx"]');
        var $regi_site_code = $regi_form.find('select[name="regi_site_code"]');
        var $regi_group_ccd = $regi_form.find('select[name="regi_group_cs_ccd"]');
        var $regi_ccd = $regi_form.find('select[name="regi_cs_ccd"]');
        var $regi_is_success = $regi_form.find('input[name="regi_is_success"]');
        var $regi_content = $regi_form.find('textarea[name="regi_content"]');

        $regi_cs_idx.val(''); $regi_site_code.val(''); $regi_group_ccd.val(''); $regi_ccd.val(''); $regi_content.val('');
        $regi_is_success.filter("#is_success_y").prop("checked", true).iCheck('update');
        $regi_is_success.filter("#is_success_n").prop("checked", false).iCheck('update');
    }

    function nl2br(str){
        return str.replace(/\n/g, "<br />");
    }
</script>