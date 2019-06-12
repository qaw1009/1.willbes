@extends('lcms.layouts.master')
@section('content')
    <h5>- 배정된 회원을 확인하고, 상담 내용을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="row mt-20">
            <div class="col-md-2">
                <p>• TM 회원관리</p>
            </div>
            <div class="col-md-10 form-inline text-right">
                <button type="button" class="btn btn-default" id="btn_info" onclick="openWin('in_pop_modal')">TM 운영정책</button>
            </div>
        </div>
        @include('lms.crm.tm.tm_policy_partial')

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">조건검색</label>
                    <div class="col-md-4 form-inline">
                        {!! html_site_select('', 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}

                        <select class="form-control" id="AssignCcd" name="AssignCcd">
                            <option value="">배정구분</option>
                            @foreach($AssignCcd  as $key=>$val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>

                        <select class="form-control" id="AssignAdminIdx" name="AssignAdminIdx" @if(sess_data('admin_auth_data')['Role']['RoleIdx'] == '1010') disabled="disabled"@endif>
                            <option value="">TM담당자</option>
                            @foreach($AssignAdmin  as $row)
                                <option value="{{ $row['wAdminIdx'] }}">{{ $row['wAdminName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="control-label col-md-1" for="StartDate">배정일 검색</label>
                    <div class="col-md-4 form-inline">
                        <input name="StartDate"  class="form-control datepicker" id="StartDate" style="width: 100px;"  type="text"  value="" >
                        ~ <input name="EndDate"  class="form-control datepicker" id="EndDate" style="width: 100px;"  type="text"  value="" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_is_use">회원검색</label>
                    <div class="col-md-7 form-inline">
                        <input type="text" class="form-control input-sm" id="search_value" name="search_value" style="width:200px">
                        <p class="form-control-static ml-20"># 아이디, 이름, 연락처 검색 가능</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="50">NO</th>
                    <th width="120">배정시 준비과정</th>
                    <th width="150">배정조건</th>
                    <th width="100">회원명</th>
                    <th width="150">아이디</th>
                    <th width="">핸드폰번호</th>
                    <th width="150">TM담당자</th>
                    <th width="150">배정일</th>
                    <th width="150">최종상담일</th>
                    <th width="100">등록</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                ],
                ajax: {
                    'url' : '{{ site_url('/crm/tm/TmAssign/assignMemberListAjax') }}',
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
                    {'data' : 'InterestCcd_Name'},
                    {'data' : 'AssignCcd_Name'},
                    {'data' : 'MemName'},
                    {'data' : 'MemId'},
                    {'data' : 'Phone'},
                    {'data' : 'wAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'LastCousultDate'},
                    {'data' : null, 'render' : function(data,type,row,meta) {
                            return '<a href="#" class="btn-modify btn_mem_info" data-idx="' + data.MemIdx + '" data-taidx="' + data.TaIdx + '"><u>등록</u></a>';
                        }}
                ]
            });

            $list_table.on('click', '.btn_mem_info', function() {
                var url = '{{ site_url('/crm/tm/TmAssign/consult/') }}'+$(this).data('idx')+'/'+$(this).data('taidx');
                $('.btn_mem_info').setLayer({
                    'url' : url,
                    'width' : 1100,
                    'modal_id' : 'assignMemberInfo'
                });
            });

        });
    </script>
@stop