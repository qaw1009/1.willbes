@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 성적을 통합관리하기 위해 그룹정보를 생성하는 메뉴입니다. (모의고사가 1개라도 성적 산출을 위해 모의고사 그룹등록 필요)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{$siteCodeDef}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 검색</button>
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="x_panel mt-10">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">NO</th>
                        <th class="text-center" style="width:150px">모의고사그룹코드</th>
                        <th class="text-center">모의고사그룹명</th>
                        <th class="text-center">설명</th>
                        <th class="text-center">성적오픈일</th>
                        <th class="text-center">사용여부</th>
                        <th class="text-center">등록자</th>
                        <th class="text-center" style="width:130px">등록일</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {
            // 검색 초기화
            $('#searchInit').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $datatable.draw();
            });

            // 수정으로 이동
            $list_table.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/regGroup/edit/') }}' + $(this).data('target-idx') + query;
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 모의고사 그룹등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/mocktest/regGroup/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/regGroup/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'MgIdx', 'class': 'text-center'},
                    {'data' : null, 'class': '', 'render' : function(data, type, row, meta) {
                        return '<span class="blue underline-link act-edit" data-target-idx="'+ row.MgIdx +'">' + row.GroupName + '</span>';
                    }},
                    {'data' : 'GroupDesc', 'class': ''},
                    {'data' : 'GradeOpenDatm', 'class': ''},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });
        });
    </script>
@stop
