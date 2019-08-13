@extends('lcms.layouts.master')

@section('content')
    <h5>- 합격예측서비스 최종합격자 신청현황을 확인할 수 있습니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11 form-inline">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx">
                            @foreach($predictList as $row)
                                <option value="{{$row['PredictIdx']}}" class="{{$row['SiteCode']}}">[{{$row['PredictIdx']}}] {{$row['ProdName']}}</option>
                            @endforeach
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
                    <label class="control-label col-md-1" for="search_value">회원검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
                    </div>
                    <div class="col-md-7">
                        <p class="form-control-static">회원명, 아이디 검색 가능</p>
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
            <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
                <thead class="bg-white-gray">
                <tr>
                    <th class="text-center" width="40px">NO</th>
                    <th class="text-center">합격예측명</th>
                    <th class="text-center">이름</th>
                    <th class="text-center">아이디</th>
                    <th class="text-center">휴대폰번호</th>
                    <th class="text-center" width="100px">응시번호</th>
                    <th class="text-center" width="150px">직렬</th>
                    <th class="text-center" width="100px">지역</th>
                    <th class="text-center" width="180px">과목점수(난이도)</th>
                    <th class="text-center">체력/가산점</th>
                    <th class="text-center">환산점수</th>
                    <th class="text-center">공고유형</th>
                    <th class="text-center" style="width: 120px;">기타데이터</th>
                    <th class="text-center">등록일</th>
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
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드', className: 'btn-sm btn-success border-radius-reset btn-excel' }
                ],
                ajax: {
                    'url' : '{{ site_url('/predict/predictFinal/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                    }},
                    {'data' : 'ProdName', 'class': 'text-center'},
                    {'data' : 'MemName', 'class': 'text-center'},
                    {'data' : 'MemId', 'class': 'text-center'},
                    {'data' : 'phone', 'class': 'text-center'},
                    {'data' : 'TakeNo', 'class': 'text-center'},
                    {'data' : 'TakeMockPartName', 'class': 'text-center'},
                    {'data' : 'TakeAreaCcdName', 'class': 'text-center'},
                    {'data' : 'pointJson', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '체력점수 : ' + row.StrengthPoint + ' / 가산점 : ' + row.AddPoint + '</>';
                    }},
                    {'data' : 'FinalPoint', 'class': 'text-center'},
                    {'data' : 'AnnouncementType', 'class': 'text-center'},
                    {'data' : 'SetEtcValues', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{site_url('predict/predictFinal/listAjax/Y')}}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
