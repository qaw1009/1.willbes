@extends('lcms.layouts.master')
@section('content')
    <h5>- 서포터즈 회원 등록/관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($arr_base['def_site_code'], 'tabs_site_code', 'tab', false, [], false, $arr_base['arr_site_code']) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_supporters_idx">서포터즈 검색</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($arr_base['def_site_code'], 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', true) !!}
                        <select class="form-control" id="search_supporters_idx" name="search_supporters_idx">
                            <option value="">서포터즈 선택</option>
                            @foreach($arr_base['arr_supporters_data'] as $row)
                                <option value="{{ $row['SupportersIdx'] }}" class="{{ $row['SiteCode'] }}">{!! $row['Title'] . " [{$row['SupportersYear']}-{$row['SupportersNumber']}]" !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">코드, 서포터즈명 검색 가능</p>
                    </div>
                    <label class="control-label col-md-1 col-md-offset-1" for="search_start_date">등록일</label>
                    <div class="col-md-4 form-inline">
                        <div class="input-group mb-0">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <div class="input-group-addon no-border-right">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
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
                    <th>선택</th>
                    <th>NO</th>
                    <th>이름</th>
                    <th>아이디</th>
                    <th>연도</th>
                    <th>기수</th>
                    <th>서포터즈명</th>
                    <th>활동상태</th>
                    <th>과제수행</th>
                    <th>제안/토론</th>
                    <th>학교</th>
                    <th>전공</th>
                    <th>학년</th>
                    <th>재학여부</th>
                    <th>응시직렬</th>
                    <th>등록자</th>
                    <th>등록일</th>
                    <th>수정일</th>
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
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $search_form.find('select[name="search_supporters_idx"]').chained("#search_site_code");

            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-comment-o mr-5"></i> 쪽지발송', className: 'btn-sm btn-success border-radius-reset mr-15 btn-message' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn-sm btn-success border-radius-reset mr-15 btn-sms' },

                    { text: '<i class="fa fa-pencil mr-5"></i> 개별등록', className: 'btn-sm btn-primary border-radius-reset mr-15', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/site/supporters/member/create') }}' + dtParamsToQueryString($datatable);
                        }},
                    { text: '<i class="fa fa-pencil mr-5"></i> 일괄등록', className: 'btn-sm btn-primary border-radius-reset mr-15 btn-group-create' }
                ],
                ajax: {
                    'url' : '{{ site_url("/site/supporters/member/listAjax?") }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta){
                            return '<input type="checkbox" name="srm_idx" class="flat target-crm-member" value="'+row.SrmIdx+'" data-srm-idx="' + row.SrmIdx + '">'
                        }},
                    {'data' : null, 'render' : function(data, type, row, meta) {
                            // 리스트 번호
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'MemName'},
                    {'data' : 'MemId'},
                    {'data' : 'SupportersYear'},
                    {'data' : 'SupportersNumber'},
                    {'data' : 'Title', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-read" data-srm-idx="' + row.SrmIdx + '"><u>' + data + '</u></a>';
                        }},
                    {'data' : 'SupportersStatusCcd', 'render' : function(data, type, row, meta) {
                            return data;
                        }},
                    {'data' : 'reply'},
                    {'data' : 'board'},

                    {'data' : 'UniversityName'},
                    {'data' : 'Department'},
                    {'data' : 'SchoolYearCcdName'},
                    {'data' : 'IsSchoolCcdName'},
                    {'data' : 'SerialCcdName'},
                    {'data' : 'RegAdminName'},
                    {'data' : 'RegDatm'},
                    {'data' : 'UpdDatm'},
                    {'data' : '', 'render' : function(data, type, row, meta) {
                            return '<a href="javascript:void(0);" class="btn-modify" data-srm-idx="' + row.SrmIdx + '"><u>수정</u></a>';
                        }},
                ],
            });

            $('.btn-group-create').click(function (){
                $('.btn-group-create').setLayer({
                    "url" : '{{ site_url("/site/supporters/member/createGroupModal") }}/',
                    "width" : "1000",
                    'modal_id' : 'pop_modal'
                });
            });

            //데이터 수정 페이지
            $list_table.on('click', '.btn-modify', function() {
                location.href='{{ site_url('/site/supporters/member/create') }}/' + $(this).data('srm-idx') + dtParamsToQueryString($datatable);
            });

            //데이터 Read 페이지
            $list_table.on('click', '.btn-read', function() {
                location.href='{{ site_url("/site/supporters/member/read") }}/' + $(this).data('srm-idx') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop