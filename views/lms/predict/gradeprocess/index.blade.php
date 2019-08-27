@extends('lcms.layouts.master')

@section('content')
    <style>
        .btn-make-step1 { margin-top: 5px; }
    </style>
    <h5>- 합격예측서비스 원점수 시험통계 처리결과를 관리합니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx" onChange="selProd(this.value)">
                            {{--<option value="">합격예측선택</option>--}}
                            @foreach($productList as $key => $val)
                                <option value="{{ $val['PredictIdx'] }}" @if($loop->first === true)checked="checked"@endif class="{{$val['SiteCode']}}">[{{ $val['PredictIdx'] }}] {{ $val['ProdName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeMockPart" name="search_TakeMockPart">
                            <option value="">직렬선택</option>
                            @foreach($serialList as $key => $val)
                                <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_TakeArea" name="search_TakeArea">
                            <option value="">지역선택</option>
                            @foreach($areaList as $key => $val)
                                @if($val['Ccd'] != '712018')
                                    <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                                @endif
                            @endforeach
                        </select>
                        <div class="inline-block ml-10">
                            <span class="required">*</span> 합격예측서비스명을 먼저 선택해 주세요.
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
        <div class="row mt-10">
            <div class="col-xs-12 text-left">
                <p>* 채첨방식을 일반채점으로 진행한 채점자중 정답을 임시저장만 한 회원이 있을 경우 해당 버튼 클릭하여 채점완료 처리를 진행합니다.</p>
                <p>* 시험통계처리 프로세스 : '원점수입력' 버튼 클릭 → '조정점수입력' 버튼 클릭 → '시험통계처리' 버튼 클릭</p>
            </div>
        </div>
    </form>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="col-md-9">
            <input type="hidden" id="PredictIdx" name="PredictIdx" value="" />
        </div>
        <div class="col-md-3 text-right form-inline pr-0">
            <span class="required">*</span> 건수가 많아서 정상동작 안할시 사용해주세요.
            <select class="form-control mr-5" id="TakeMockPart" name="TakeMockPart">
                <option value="">직렬별입력</option>
                @foreach($serialList as $key => $val)
                    <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div class="x_panel mt-10">
        <div class="x_content mb-20">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th class="text-center">응시구분</th>
                        <th class="text-center">과목</th>
                        <th class="text-center">응시인원</th>
                        <th class="text-center">평균점수</th>
                        <th class="text-center">5%평균</th>
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
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 합격예측서비스명 자동 변경
            $search_form.find('select[name="search_PredictIdx"]').chained("#search_site_code");
            selProd($search_form.find('select[name="search_PredictIdx"]').val());

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 원점수입력', className: 'btn btn-sm btn-success mr-15', action: function(e, dt, node, config) {
                        scoreMakeStep1();
                    }},
                    { text: '<i class="fa fa-pencil mr-5"></i> 조정점수입력', className: 'btn btn-sm btn-success mr-15', action: function(e, dt, node, config) {
                        scoreMakeStep2();
                    }},
                    { text: '<i class="fa fa-pencil mr-5"></i> 시험통계처리', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                        scoreMakeStep3();
                    }}
                ],
                ajax: {
                    'url' : '{{ site_url('/predict/gradeprocessing/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : 'TakeMockPart', 'class': 'text-center'},
                    {'data' : 'TakeArea', 'class': 'text-center'},
                    {'data' : 'SubjectName', 'class': 'text-center'},
                    {'data' : 'AvrPoint', 'class': 'text-center'},
                    {'data' : 'FivePerPoint', 'class': 'text-center'}
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

        // 원점수 반영
        function scoreMakeStep1(){
            if(!confirm("원점수를 반영 하시겠습니까?")) return;

            var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep1Ajax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        // 조정점수 반영
        function scoreMakeStep2(){
            if(!confirm("조정점수를 반영 하시겠습니까?")) return;

            var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep2Ajax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        // 시험통계 반영
        function scoreMakeStep3(){
            if(!confirm("시험통계처리 하시겠습니까?")) return;

            var _url = '{{ site_url('/predict/gradeprocessing/scoreMakeStep3Ajax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        function selProd(value){
            $('#PredictIdx').val(value);
        }
    </script>
@stop
