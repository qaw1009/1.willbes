@extends('btob.layouts.master')

@section('content')
    <h5>- 지점별 수강부여 현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_year">년월검색</label>
                    <div class="col-md-4 form-inline">
                        <select class="form-control" id="search_year" name="search_year" title="년도" style="width: 70px;">
                            <option value="">년</option>
                            @for($y = 2021; $y <= date('Y') + 1; $y++)
                                <option value="{{ $y }}">{{ $y }}</option>
                            @endfor
                        </select> 년
                        <select class="form-control ml-5" id="search_month" name="search_month" title="월" style="width: 50px;">
                            <option value="">월</option>
                            @for($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}">{{ $m }}</option>
                            @endfor
                        </select> 월
                    </div>
                    <label class="control-label col-md-1 col-md-offset-1" for="search_area_ccd">선택검색</label>
                    <div class="col-md-5 form-inline">
                        <select class="form-control" id="search_area_ccd" name="search_area_ccd" title="지역">
                            <option value="">지역</option>
                            @foreach($arr_area_ccd as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select class="form-control" id="search_branch_ccd" name="search_branch_ccd" title="지점">
                            <option value="">지점</option>
                            @foreach($arr_branch_ccd as $row)
                                <option value="{{ $row['BranchCcd'] }}" class="{{ $row['AreaCcd'] }}">{{ $row['BranchCcdName'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">지역/지점검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value" title="검색어">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <button type="submit" class="btn btn-primary btn-search" id="btn_search"><i class="fa fa-spin fa-refresh"></i>&nbsp; 검 색</button>
                <button type="button" class="btn btn-default btn-search" id="btn_reset_in_set_search_date">초기화</button>
            </div>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th colspan="6" class="bg-dark text-center">
                        <span id="wrap_year">{{ date('Y') }}</span>년
                        <span id="wrap_month">{{ date('n') }}</span>월
                    </th>
                </tr>
                <tr>
                    <th rowspan="2" class="valign-middle">No</th>
                    <th rowspan="2" class="valign-middle">[지역] 지점</th>
                    <th colspan="4" class="text-center">수강부여현황</th>
                </tr>
                <tr>
                    <th>제공건수</th>
                    <th>부여(승인완료)건수</th>
                    <th>잔여건수</th>
                    <th>이력</th>
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
            // 지점 자동 변경
            $search_form.find('select[name="search_branch_ccd"]').chained("#search_area_ccd");

            // 디폴트 년월 설정
            $search_form.find('select[name="search_year"]').val('{{ date('Y') }}');
            $search_form.find('select[name="search_month"]').val('{{ date('n') }}');

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/stats/approvalStats/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), { 'start' : data.start, 'length' : data.length });
                    }
                },
                columns: [
                    {'data' : null, 'render' : function(data, type, row, meta) {
                        // 리스트 번호
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'BranchCcd', 'render' : function(data, type, row, meta) {
                        return '[' + row.AreaCcdName + '] ' + row.BranchCcdName + (row.IsUse === 'N' ? ' <span class="red">[미사용]</span>' : '');
                    }},
                    {'data' : 'LimitCnt', 'render' : function(data, type, row, meta) {
                        return data !== null ? (row.IsLimit === 'Y' ? addComma(data) + '건' : '제한없음') : '';
                    }},
                    {'data' : 'CompleteCnt', 'render' : function(data, type, row, meta) {
                        return data !== null ? '<span class="red no-line-height">' + addComma(data) + '건</span>' : '';
                    }},
                    {'data' : 'RemainCnt', 'render' : function(data, type, row, meta) {
                        return data !== null ? addComma(data) + '건' : '';
                    }},
                    {'data' : 'BranchCcd', 'render' : function(data, type, row, meta) {
                        return '<button name="btn_view" class="btn btn-link blue no-padding" data-branch-ccd="' + data + '">[<u>보기</u>]</button>';
                    }}
                ]
            });

            // 조회 년월 표기
            $datatable.on('xhr.dt', function(e, settings, json) {
                $list_table.find('#wrap_year').html($search_form.find('select[name="search_year"]').val());
                $list_table.find('#wrap_month').html($search_form.find('select[name="search_month"]').val());
            });

            // 이력 버튼 클릭
            $list_table.on('click', 'button[name="btn_view"]', function() {
                var branch_ccd = $(this).data('branch-ccd');
                var search_year = $search_form.find('select[name="search_year"]').val();
                var search_month = $search_form.find('select[name="search_month"]').val();

                $('button[name="btn_view"]').setLayer({
                    'url' : '{{ site_url('/stats/approvalStats/show') }}',
                    'width' : 1100,
                    'add_param_type' : 'param',
                    'add_param' : [
                        { 'id' : 'branch_ccd', 'name' : '지점공통코드', 'value' : branch_ccd, 'required' : true },
                        { 'id' : 'search_year', 'name' : '조회년도', 'value' : search_year, 'required' : true },
                        { 'id' : 'search_month', 'name' : '조회월', 'value' : search_month, 'required' : true }
                    ]
                });
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/stats/approvalStats/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
