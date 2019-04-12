@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 구성을 위해 과목별 문제, 정답, 해설을 등록하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        {{--<select class="form-control mr-5" id="search_cateD1" name="search_cateD1">--}}
                            {{--<option value="">카테고리</option>--}}
                            {{--@foreach($cateD1 as $row)--}}
                                {{--<option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_cateD2" name="search_cateD2">--}}
                            {{--<option value="">직렬</option>--}}
                            {{--@foreach($cateD2 as $row)--}}
                                {{--<option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_subject" name="search_subject">--}}
                            {{--<option value="">과목</option>--}}
                            {{--@foreach($subject as $row)--}}
                                {{--<option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_professor" name="search_professor">--}}
                            {{--<option value="">교수</option>--}}
                            {{--@foreach($professor as $row)--}}
                                {{--<option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_year" name="search_year">--}}
                            {{--<option value="">연도</option>--}}
                            {{--@for($i=(date('Y')+1); $i>=2005; $i--)--}}
                                {{--<option value="{{$i}}">{{$i}}</option>--}}
                            {{--@endfor--}}
                        {{--</select>--}}
                        {{--<select class="form-control mr-5" id="search_round" name="search_round">--}}
                            {{--<option value="">회차</option>--}}
                            {{--@foreach(range(1, 20) as $i)--}}
                                {{--<option value="{{$i}}">{{$i}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
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
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
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
                        <th rowspan="2" class="text-center">선택</th>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center" style="min-width:150px">카테고리</th>
                        <th rowspan="2" class="text-center">과목</th>
                        <th rowspan="2" class="text-center">교수</th>
                        <th rowspan="2" class="text-center">연도</th>
                        <th rowspan="2" class="text-center">회차</th>
                        <th rowspan="2" class="text-center">과목별문제지명</th>
                        <th rowspan="2" class="text-center">지문수</th>
                        <th rowspan="2" class="text-center">문항수</th>
                        <th colspan="2" class="text-center">응시현황</th>
                        <th rowspan="2" class="text-center">사용여부</th>
                        <th rowspan="2" class="text-center">문제보기</th>
                        <th rowspan="2" class="text-center">등록자</th>
                        <th rowspan="2" class="text-center" style="width:130px">등록일</th>
                    </tr>
                    <tr>
                        <th class="text-center">ON</th>
                        <th class="text-center">OFF</th>
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
            // 검색 Select 메뉴
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');
            $search_form.find('#search_subject').chained('#search_site_code');
            $search_form.find('#search_professor').chained('#search_site_code');

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
                            location.href = '{{ site_url('/mocktest/regExam/create') }}' + dtParamsToQueryString($datatable);
                        }}
                ],
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/predict/question/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        console.log(data);
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<input type="radio" class="flat" name="target" value="' + row.MpIdx + '">';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var IsUseCate = (row.IsUseCate === 'Y') ? '' : '<span class="red">(미사용)</span>';
                            return row.CateRouteName + IsUseCate;
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var SubjectType = (row.SubjectType === 'E') ? ' [필수]' : ' [선택]';
                            var IsUseSubject = (row.IsUseSubject === 'Y') ? '' : '<span class="red">(미사용)</span>';

                            return row.SubjectName + SubjectType + IsUseSubject;
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            var IsUseProfessor = (row.IsUseProfessor === 'Y') ? '' : '<span class="red">(미사용)</span>';
                            return row.wProfName + IsUseProfessor;
                        }},
                    {'data' : 'Year', 'class': 'text-center'},
                    {'data' : 'RotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit">[' + row.MpIdx + '] ' + row.PapaerName + '</span>';
                        }},
                    {'data' : 'AnswerNum', 'class': 'text-center'},
                    {'data' : 'ListCnt', 'class': 'text-center'},
                    {'data' : 'OnlineCnt', 'class': 'text-center'},
                    {'data' : 'OfflineCnt', 'class': 'text-center'},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            upImgUrl = '{{$upImgUrl}}' + row.MpIdx + '/';
                            return '<a href="'+ row.FilePath + row.RealQuestionFile+'" target="_blank" class="blue underline_link">'+row.QuestionFile+'</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDate', 'class': 'text-center'}
                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/regExam/edit/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

            // 복사
            function copyAreaData() {
                if( !$list_form.find('[name="target"]:checked').val() ) { alert('복사할 문제영역을 선택해 주세요.'); return false; }
                if (!confirm("복사하시겠습니까?")) return false;

                var _url = '{{ site_url('/mocktest/regExam/copyData') }}';
                var data = {
                    '{{ csrf_token_name() }}' : $list_form.find('[name="{{ csrf_token_name() }}"]').val(),
                    '_method' : 'POST',
                    'idx': $list_form.find('[name="target"]:checked').val()
                };
                sendAjax(_url, data, function(ret) {
                    if (ret.ret_cd) {
                        notifyAlert('success', '알림', ret.ret_msg);
                        location.replace('{{ site_url('/mocktest/regExam/edit/') }}' + ret.ret_data.dt.idx + dtParamsToQueryString($datatable));
                    }
                }, showValidateError, false, 'POST');
            }
        });
    </script>
@stop
