@include('lms.member.layer.board.sub_tab_partial')

<form class="form-horizontal" id="search_form_tm" name="search_form_tm" method="POST" onsubmit="return false;">
    {!! csrf_field() !!}
    <input type="hidden" name="MemIdx" value="{{$memIdx}}" />
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
                        @foreach($codes['consult_ccd']  as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>&nbsp

                    <input type="text" name="_consult_search_value" id="_consult_search_value" class="form-control"  style="width: 150px;"  value="" >
                    <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                    <button type="button" class="btn btn-default ml-30 mr-30" id="_btn_reset">검색초기화</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="x_panel mt-10">
    <div class="x_content">
        <table id="list_ajax_table_tm" class="table table-striped table-bordered">
            <thead>
            <tr class="bg-odd">
                <th width="3%">NO</th>
                <th width="10%">배정구분</th>
                <th width="12%">배정일</th>
                <th width="12%">상담대상유형</th>
                <th width="12%">TM분류</th>
                <th>상담내용</th>
                <th width="8%">등록자</th>
                <th width="12%">등록일</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var $datatable;
    var $search_form = $('#search_form_tm');
    var $list_table = $('#list_ajax_table_tm');

    $(document).ready(function() {
        $search_form.find('select[name="search_cs_ccd"]').chained("#search_group_cs_ccd");

        // 전체포인트현황 목록
        $datatable = $list_table.DataTable({
            serverSide: true,
            paging: false,
            ajax: {
                'url' : '{{ site_url('/crm/tm/TmAssign/consultListAjax') }}',
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
                {'data' : 'AssignCcd_Name'},
                {'data' : 'RegDatm'},
                {'data' : 'ConsultCcd_Name'},
                {'data' : 'TmClassCcd_Name'},
                {'data' : 'TmContent'},
                {'data' : 'RegAdminName'},
                {'data' : 'writeDate'}
            ]
        });

        init_datatable();
    });
</script>