@extends('btob.layouts.master')

@section('content')
    <h5>- 회원 연계 속성 조건별 누적 수강 진도율을 확인할 수 있습니다. (진도율,실제수강건수 전체 지점 일괄 확인 가능)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_age">조건검색</label>
                    <div class="col-md-10 form-inline">
                        @if(empty($arr_age) === false)
                            <select class="form-control" id="search_age" name="search_age">
                                <option value="">연령대</option>
                                @foreach($arr_age as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if(empty($arr_sex) === false)
                            <select class="form-control" id="search_sex" name="search_sex">
                                <option value="">성별</option>
                                @foreach($arr_sex as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="">날짜검색</label>
                    <div class="col-md-11 form-inline">
                        <div class="input-group mb-0 mr-20">
                            <input type="text" class="form-control datepicker" id="search_start_date" name="search_start_date" value="">
                            <div class="input-group-addon no-border no-bgcolor">~</div>
                            <input type="text" class="form-control datepicker" id="search_end_date" name="search_end_date" value="">
                        </div>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="0-mon">당월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-weeks">1주일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="15-days">15일</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="1-months">1개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="3-months">3개월</button>
                            <button type="button" class="btn btn-default mb-0 btn-set-search-date" data-period="6-months">6개월</button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-1" for="search_value">지역/지점검색</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="search_value" name="search_value">
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
    <div class="well well-sm mt-20 bg-white-only">
        <ul class="mt-5 mb-5 pl-20">
            <li>진도율은검색한 기간 내 진행상태가 승인완료, 수강만료인 회원 기준으로 지점별 평균 진도율 산출</li>
            <li>실제 수강 건수는 해당 패스 상품에서 진도율이 1% 이상 진행한 강좌가 있을 경우 카운트 처리</li>
        </ul>
    </div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <div>
                <div class="pull-left pt-5">
                    <span class="blue bold">검색정보</span> -
                    <span class="bold">[연령대]</span> <span id="search_age_info" class="pr-10">전체</span>
                    <span class="bold">[성별]</span> <span id="search_sex_info" class="pr-10">전체</span>
                    <span class="bold">[기간]</span> <span id="search_date_info" class="pr-10"></span>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-sm btn-success btn-excel ml-10 mr-0"><i class="fa fa-file-excel-o mr-5"></i> 엑셀다운로드</button>
                </div>
            </div>
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>[지역] 지점</th>
                    <th>진도율</th>
                    <th>실제 수강건수</th>
                </tr>
                <tr class="bg-info">
                    <th>총 합계 (진도율은 합계에 대한 평균 진도율임)</th>
                    <th><span id="sum_avg_study_rate">0%</span></th>
                    <th><span id="sum_real_study_cnt">0건</span></th>
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
            // 날짜검색 디폴트 셋팅
            if ($search_form.find('input[name="search_start_date"]').val().length < 1 || $search_form.find('input[name="search_end_date"]').val().length < 1) {
                setDefaultDatepicker(0, 'mon', 'search_start_date', 'search_end_date');
            }

            // 페이징 번호에 맞게 일부 데이터 조회
            $datatable = $list_table.DataTable({
                serverSide: true,
                paging: false,
                dom: 'T<"clear">rtip',
                ajax: {
                    'url' : '{{ site_url('/stats/studyBranch/listAjax') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {});
                    }
                },
                columns: [
                    {'data' : 'BranchCcdName', 'render' : function(data, type, row, meta) {
                        return '[' + row.AreaCcdName + '] ' + data;
                    }},
                    {'data' : 'AvgStudyRate', 'render' : function(data, type, row, meta) {
                        return data + '%';
                    }},
                    {'data' : 'RealStudyCnt', 'render' : function(data, type, row, meta) {
                        return addComma(data) + '건';
                    }}
                ]
            });

            // 조회된 기간의 합계 표시 (datatable load event)
            $datatable.on('xhr.dt', function(e, settings, json) {
                if (json.sum_data !== null) {
                    $('#sum_avg_study_rate').html(addComma(json.sum_data.tAvgStudyRate) + '%');
                    $('#sum_real_study_cnt').html(addComma(json.sum_data.tRealStudyCnt) + '건');
                } else {
                    $('#sum_avg_study_rate').html('0%');
                    $('#sum_real_study_cnt').html('0건');
                }

                setSearchInfo();
            });

            // 검색정보 표시
            var setSearchInfo = function() {
                var age_info = $search_form.find('select[name="search_age"]').val() !== '' ? $search_form.find('select[name="search_age"] option:selected').text() : '전체';
                var sex_info = $search_form.find('select[name="search_sex"]').val() !== '' ? $search_form.find('select[name="search_sex"] option:selected').text() : '전체';
                var date_info = $search_form.find('input[name="search_start_date"]').val() + ' ~ ' + $search_form.find('input[name="search_end_date"]').val();

                $('#search_age_info').html(age_info);
                $('#search_sex_info').html(sex_info);
                $('#search_date_info').html(date_info);
            };

            // 엑셀다운로드 버튼 클릭
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('정말로 엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/stats/studyBranch/excel') }}', $search_form.serializeArray(), 'POST');
                }
            });
        });
    </script>
@stop
