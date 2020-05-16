@extends('lcms.layouts.master')

@section('content')
    <h5>- 답안입력현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false) !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx2" name="search_PredictIdx2">
                            @foreach($arr_base['predict2_list'] as $row)
                                <option value="{{$row['PredictIdx2']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx2']}}] {{$row['Predict2Name']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeMockPart" name="search_TakeMockPart">
                            <option value="">응시직렬</option>
                            @foreach($arr_base['take_mock_part'] as $k => $v)
                                <option value="{{$v['CateCode']}}" class="{{$v['SiteCode']}}">{{$v['CateName']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_fi" name="search_fi">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static">회원명, 아이디, 응시번호 검색 가능</p>
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
                        <th class="text-center">NO</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">아이디</th>
                        <th class="text-center">휴대폰번호</th>
                        <th class="text-center">이메일</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">응시횟수</th>
                        <th class="text-center">과목별 체감난이도</th>
                        <th class="text-center">커트라인 평균점수</th>
                        <th class="text-center">등록일</th>
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

        $search_form.find('select[name="search_PredictIdx2"]').chained("#search_site_code");
        $search_form.find('select[name="search_TakeMockPart"]').chained("#search_site_code");
        $search_form.find('select[name="search_paper"]').chained("#search_PredictIdx2");

        $(document).ready(function() {
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    /*{ text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn btn-sm btn-primary btn-sms' }*/
                ],
                ajax: {
                    'url' : '{{ site_url('/predict2/issue/register/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'Phone', 'class': 'text-center'},
                    {'data' : 'Mail', 'class': 'text-center'},
                    {'data' : 'TakeMockPart', 'class': 'text-center'},
                    {'data' : 'TaKeNumber', 'class': 'text-center'},
                    {'data' : 'TakeCount', 'class': 'text-center'},
                    {'data' : 'TakeLevel', 'class': 'text-center'},
                    {'data' : 'CutPoint', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });

            // 엑셀다운로드
            $('.btn-excel-research1').on('click', function(event) {
                if ($search_form.find('select[name="search_paper"]').val() == '') {
                    alert('과목선택 후 변환 가능합니다.');
                    return false;
                }
                var search_paper_name = $("#search_paper option:checked").text();
                $search_form.find('input[name="search_paper_name"]').val(search_paper_name);
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/predict2/issue/answerPaper/answerPaperExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });
            $('.btn-excel-research2').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/predict2/issue/answerPaper/answerOriginExcel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop