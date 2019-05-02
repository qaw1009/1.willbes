@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">합격예측</label>
                    <div class="col-md-11">

                        <select class="form-control mr-5" id="search_PredictIdx" name="search_PredictIdx" onChange="selProd(this.value)">
                            <option value="">합격예측명</option>
                            @foreach($productList as $key => $val)
                                <option value="{{ $val['PredictIdx'] }}">{{ $val['ProdName'] }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">시험정보선택</label>
                    <div class="col-md-6">
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
                    </div>
                    <div class="col-md-5 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form class="form-horizontal" id="regi_form" name="regi_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        <div class="col-md-9">
            <input type="hidden" id="PredictIdx" name="PredictIdx" value="" />
        </div>
        <div class="col-md-3 text-right">
            - 건수가 많아서 정상동작 안할시 사용해주세요.
            <select class="form-control mr-5" id="TakeMockPart" name="TakeMockPart">
                <option value="">직렬별입력</option>
                @foreach($serialList as $key => $val)
                    <option value="{{ $val['Ccd'] }}">{{ $val['CcdName'] }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
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
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            // 검색 초기화
            $('#searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_PredictIdx)').each(function () {
                     $(this).val('');
                });

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
                serverSide: true,
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
            if(!confirm("조정점수를 반영 하시겠습니까?")) return;

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
