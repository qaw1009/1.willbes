@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}

                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 문제지명 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content mb-20">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">선택</th>
                        <th class="text-center">NO</th>
                        <th class="text-center">합격예측명</th>
                        <th class="text-center">과목별문제지명</th>
                        <th class="text-center">문제보기</th>
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

    <style>
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            top: 14px;
        }
    </style>
    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');

        $(document).ready(function() {

            // 검색 초기화
            $('#searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');

                var eTarget = (event.target) ? event.target : event.srcElement;
                if($(eTarget).attr('id') == 'searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]",
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 act-copy', action: copyAreaData },
                    { text: '<i class="fa fa-pencil mr-5"></i> 문제등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/predict/question/create/') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict/question/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="target" value="' + row.PpIdx + '">';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'ProdName', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit">[' + row.PpIdx + '] ' + row.PaperName + '</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            upImgUrl = '{{$upImgUrl}}' + row.PpIdx + '/';
                            return '<a href="'+ row.FilePath + row.RealQuestionFile+'" target="_blank" class="blue underline_link">'+row.QuestionFile+'</span>';
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDate', 'class': 'text-center'}
                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/predict/question/create/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

            // 복사
            function copyAreaData() {
                if( !$list_form.find('[name="target"]:checked').val() ) { alert('복사할 문제영역을 선택해 주세요.'); return false; }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/predict/question/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'idx': $list_form.find('[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/predict/question/create/') }}' + ret.ret_data.dt.idx + dtParamsToQueryString($datatable));
                    }
                }, showValidateError, false, 'POST');
            }
        });
    </script>
@stop
