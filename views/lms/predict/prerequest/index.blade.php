@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 사전예약 신청현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx">
                            <option value="">합격예측서비스명</option>
                            @foreach($predictList as $row)
                                <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_ApplyType" name="search_ApplyType">
                            <option value="">구분</option>
                            <option value="합격예측">합격예측</option>
                            <option value="사전특강">사전특강</option>
                        </select>
                        <select class="form-control mr-5" id="search_TakeMockPart" name="search_TakeMockPart">
                            <option value="">응시직렬</option>
                            @foreach($serial as $k => $v)
                                <option value="{{$v['Ccd']}}">{{$v['CcdName']}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">응시지역</option>
                            @foreach($area as $k => $v)
                                @if($v['Ccd'] != '712018')
                                    <option value="{{$v['Ccd']}}">{{$v['CcdName']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_fi" name="search_fi" value="{{ $search_fi }}">
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
                        <th class="text-center"></th>
                        <th class="text-center">NO</th>
                        <th class="text-center">서비스명</th>
                        <th class="text-center">구분</th>
                        <th class="text-center">이름</th>
                        <th class="text-center">아이디</th>
                        <th class="text-center">휴대폰번호</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">지역</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">수강여부</th>
                        <th class="text-center">시험준비기간</th>
                        <th class="text-center">신청일</th>
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

        $(document).ready(function() {
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset mr-15 btn-excel' },
                    { text: '<i class="fa fa-mobile mr-5"></i> SMS발송', className: 'btn btn-sm btn-primary btn-sms' }
                ],
                ajax: {
                    'url' : '{{ site_url('/predict/prerequest/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<input type="checkbox" id="checkIdx" name="checkIdx[]" class="flat target-crm-member" value="" data-mem-idx="'+data.MemIdx+'" />';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return row.ProdName + '[' + row.PredictIdx + ']';
                    }},
                    {'data' : 'ApplyType', 'class': 'text-center'},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'Phone', 'class': 'text-center'},
                    {'data' : 'TakeMockPart', 'class': 'text-center'},
                    {'data' : 'TaKeArea', 'class': 'text-center'},
                    {'data' : 'TaKeNumber', 'class': 'text-center'},
                    {'data' : 'LectureType', 'class': 'text-center'},
                    {'data' : 'Period', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/predict/prerequest/list/Y') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
