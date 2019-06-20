@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 응시자 가준으로 개별 모의고사성적을 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false, $arrtab , true, $arrsite) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="search_cateD1" name="search_cateD1">
                            <option value="">카테고리</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_cateD2" name="search_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_subject" name="search_subject">
                            <option value="">과목</option>
                            @foreach($subject as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_professor" name="search_professor">
                            <option value="">교수</option>
                            @foreach($professor as $row)
                                <option value="{{ $row['ProfIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['wProfName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_year" name="search_year">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" id="search_round" name="search_round">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-11">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
                    </div>

                </div>
                <div class="form-group form-inline">
                    <div class="col-md-1 text-right">
                        <button type="button" class="btn btn-primary mr-50 btn-excel" id="btn-excel">엑셀다운로드</button>
                    </div>
                    <div class="col-md-10 text-right">
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
                        <th class="text-center">NO</th>
                        <th class="text-center" style="min-width:40px">회원명</th>
                        <th class="text-center">연락처</th>
                        <th class="text-center">응시번호</th>
                        <th class="text-center">응시형태</th>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">모의고사명</th>
                        <th class="text-center">카테고리</th>
                        <th class="text-center">직렬</th>
                        <th class="text-center">과목</th>
                        <th class="text-center">응시지역</th>
                        <th class="text-center">총점</th>
                        <th class="text-center">등록일</th>
                        <th class="text-center">성적확인</th>
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
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/statisticsPrivate/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [

                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="">' + row.MemName + '(' + row.MemId + ')</span>';
                        }},
                    {'data' : 'Phone', 'class': 'text-center'},
                    {'data' : 'TakeNumber', 'class': 'text-center'},
                    {'data' : 'TakeFormType', 'class': 'text-center'},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit"><input type="hidden" name="target" value="' + row.ProdCode + '" />[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                        }},
                    {'data' : 'CateName', 'class': 'text-center'},
                    {'data' : 'TakeMockPartName', 'class': 'text-center'},
                    {'data' : 'SubjectName', 'class': 'text-center'},
                    {'data' : 'TakeAreaName', 'class': 'text-center'},
                    {'data' : 'AdjustSum', 'class': 'text-center'},
                    {'data' : 'ExamRegDatm', 'class': 'text-center'},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.AdjustSum > 0 ? '<span class="blue underline-link act-view"><input type="hidden" name="prod" value="' + row.ProdCode +'/'+ row.MrIdx+ '" />확인</span>':'';
                        }},
                ]
            });

            // 수정으로 이동
            $list_form.on('click', '.act-view', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/statisticsPrivate/statSubject/') }}' + $(this).closest('tr').find('[name=prod]').val() + query;
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/regGoods/edit/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

            // 엑셀다운로드
            $('.btn-excel').on('click', function(event) {
                event.preventDefault();
                if (confirm('엑셀다운로드 하시겠습니까?')) {
                    formCreateSubmit('{{ site_url('/mocktest/statisticsPrivate/list/Y') }}', $search_form.serializeArray(), 'POST');
                }
            });


        });
    </script>
@stop
