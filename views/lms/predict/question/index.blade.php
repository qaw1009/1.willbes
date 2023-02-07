@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 과목별 시험지 및 정답 정보를 관리합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <select id="temp_subject_code" style="display: none;"></select>

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx">
                            @foreach($predictList as $row)
                                <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="search_take_mock_part" title="직렬">
                            <option value="">직렬선택</option>
                            @foreach($arr_take_mock_part_list as $row)
                                <option class="{{$row['PredictIdx']}}" value="{{$row['TakeMockPart']}}">{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="search_subject_code" title="과목">
                            <option value="">과목선택</option>
                            @foreach($arr_subject_list as $key => $row)
                                <option class="{{$row['PredictIdx'].'_'.$row['TakeMockPart']}}" data-subject-type="{{$row['Type']}}" value="{{$row['SubjectCode']}}">{{$row['CcdName']}}</option>
                            @endforeach
                        </select>
                        <select name="search_use" id="search_use" class="form-control mr-5">
                            <option value="" >사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_fi" name="search_fi" value="">
                    </div>
                    <div class="col-md-2">
                        <p class="form-control-static">문제지명 검색 가능</p>
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
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">선택</th>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">합격예측명</th>
                        <th rowspan="2" class="text-center">직렬</th>
                        <th rowspan="2" class="text-center">과목</th>
                        <th rowspan="2" class="text-center">과목별문제지명</th>
                        <th rowspan="2" class="text-center">문제보기</th>
                        <th colspan="4" class="text-center">문항수</th>
                        <th rowspan="2" class="text-center">사용여부</th>
                        <th rowspan="2" class="text-center">등록자</th>
                        <th rowspan="2" class="text-center" style="width:130px">등록일</th>
                    </tr>
                    <tr class="add-th">
                        <th class="text-center bdr-line">1형</th>
                        <th class="text-center bdr-line">2형</th>
                        <th class="text-center bdr-line">3형</th>
                        <th class="text-center bdr-line">4형</th>
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
        var $list_form = $('#list_form');
        var $list_table = $('#list_table');
        var default_file_path = '{{$default_file_path}}';

        $(document).ready(function() {
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");
            // 직렬
            $search_form.find('select[name="search_take_mock_part"]').chained("#search_PredictIdx");
            // 과목
            $search_form.find('select[name="search_subject_code"]').chained("#temp_subject_code");
            $search_form.find('select[name="search_take_mock_part"]').on('change', function () {
                var p_idx = $search_form.find('select[name="search_PredictIdx"]').val();
                $("#temp_subject_code option").remove();
                $("#temp_subject_code").append('<option value="'+p_idx+'_'+this.value+'">과목코드</option>');
                $("#temp_subject_code option").trigger('change');
            });

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-copy mr-5"></i> 복사', className: 'btn btn-sm btn-primary mr-15 act-copy', action: copyAreaData },
                    { text: '<i class="fa fa-pencil mr-5"></i> 문제등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            location.href = '{{ site_url('/predict/question/create/') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
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
                    {'data' : 'TakeMockPartName', 'class': 'text-center'},
                    {'data' : 'SubjectName', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<span class="blue underline-link act-edit">[' + row.PpIdx + '] ' + row.PaperName + '</span>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<a href="'+ default_file_path + row.PpIdx + '/' + row.RealQuestionFile+'" target="_blank" class="blue underline_link">'+row.QuestionFile+'</span>';
                    }},
                    {'data' : 'QuestionCnt1', 'class': 'text-center'},
                    {'data' : 'QuestionCnt2', 'class': 'text-center'},
                    {'data' : 'QuestionCnt3', 'class': 'text-center'},
                    {'data' : 'QuestionCnt4', 'class': 'text-center'},
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
