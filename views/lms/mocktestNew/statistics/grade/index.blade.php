@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $arr_site_code) !!}
                        <select class="form-control mr-5" id="search_cateD1" name="search_cateD1">
                            <option value="">카테고리</option>
                            @foreach($arr_base['cateD1'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}">{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_cateD2" name="search_cateD2">
                            <option value="">직렬</option>
                            @foreach($arr_base['cateD2'] as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}">{{ $row['CateName'] }}</option>
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

                        <select class="form-control mr-5" id="search_TakeFormsCcd" name="search_TakeFormsCcd">
                            <option value="">응시형태</option>
                            @foreach($arr_base['applyType'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
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

    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="prod_code" name="prod_code" value="">
    </form>
    <div class="mt-20">* 응시자가 성적을 제출하면 자동으로 성적처리됩니다.(조정점수 자동산출)</div>
    <div class="mt-5">* 수동으로 '조정점수반영' 클릭 시 현재 시점으로 조정점수가 재산출됩니다.</div>
    <div class="x_panel mt-10">
        <div class="x_content">
            <table id="list_ajax_table" class="table table-bordered table-head-row2">
                <thead class="bg-white-gray">
                <tr>
                    <th rowspan="2" class="text-center">NO</th>
                    <th rowspan="2" class="text-center">카테고리</th>
                    <th rowspan="2" class="text-center">직렬</th>
                    <th rowspan="2" class="text-center">연도</th>
                    <th rowspan="2" class="text-center">회차</th>
                    <th rowspan="2" class="text-center">모의고사명</th>
                    <th colspan="2" class="text-center">응시형태</th>
                    <th colspan="2" class="text-center">응시현황</th>
                    <th rowspan="2" class="text-center">통계확인</th>
                    <th rowspan="2" class="text-center" style="width: 11%">성적오픈일<br>(성적오픈사용)</th>
                    <th rowspan="2" class="text-center">복수정답처리</th>
                    <th rowspan="2" class="text-center">답안재검</th>
                    <th rowspan="2" class="text-center">조정점수</th>
                    <th rowspan="2" class="text-center">등록일</th>
                </tr>
                <tr>
                    <th class="text-center">Online</th>
                    <th class="text-center">Off</th>
                    <th class="text-center">Online</th>
                    <th class="text-center">Off</th>
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
        var $regi_form = $('#regi_form');

        $(document).ready(function() {
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/statistics/grade/listAjax') }}',
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
                            var IsUseCate = (row.IsUseCate === 'Y') ? '' : '<span class="red">(미사용)</span>';
                            return row.CateName + IsUseCate;
                        }},
                    {'data' : 'MockPartName', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return data.join('<br>');
                        }},
                    {'data' : 'MockYear', 'class': 'text-center'},
                    {'data' : 'MockRotationNo', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-edit" data-prod-code="'+row.ProdCode+'">[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                        }},
                    {'data' : 'TakePart_on', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'TakePart_off', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'OnlineCnt', 'class': 'text-center'},
                    {'data' : 'OfflineCnt', 'class': 'text-center'},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenIsUse == 'Y' ? '<span class="blue underline-link act-view" data-prod-code="'+row.ProdCode+'">확인</span>' : '';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (row.GradeOpenDatm != null) ? row.GradeOpenDatm + ' (' + row.GradeOpenIsUse + ')' : '';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenIsUse == 'Y' ? '<span class="blue underline-link act-score" data-prod-code="'+row.ProdCode+'" data-action-type="multi">' + '복수정답처리' + '</span>' : '';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenIsUse == 'Y' ? '<span class="blue underline-link act-score" data-prod-code="'+row.ProdCode+'" data-action-type="reGrading">' + '답안재검' + '</span>' : '';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenIsUse == 'Y' ? '<span class="blue underline-link act-score" data-prod-code="'+row.ProdCode+'" data-action-type="make">' + '조정점수반영' + '</span>' : '';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'}
                ]
            });

            // 상품수정페이지
            $list_table.on('click', '.act-edit', function () {
                location.href = '{{ site_url('/mocktestNew/reg/goods/create/') }}' + $(this).data('prod-code');
            });

            // 성적확인페이지
            $list_table.on('click', '.act-view', function () {
                location.href = '{{ site_url('/mocktestNew/statistics/grade/detail/') }}' + $(this).data('prod-code') + '/' + dtParamsToQueryString($datatable);
            });

            // 성적처리
            $list_table.on('click', '.act-score', function () {
                var _msg = '';
                var _url = '';
                if ($(this).data('action-type') == 'multi') {
                    _msg = '복수정답처리를 반영 하시겠습니까?';
                    _url = '{{ site_url('/mocktestNew/statistics/grade/scoreMultiAjax') }}';
                } else if ($(this).data('action-type') == 'reGrading') {
                    _msg = '답안재검은 모든 일반문제를 새로 채점하기 때문에 \n시간이 오래걸릴 수 있습니다.\n다시 채점하시겠습니까?';
                    _url = '{{ site_url('/mocktestNew/statistics/grade/reGradingAjax') }}';
                } else if ($(this).data('action-type') == 'make') {
                    _msg = '조정점수를 반영 하시겠습니까?';
                    _url = '{{ site_url('/mocktestNew/statistics/grade/scoreMakeAjax') }}';
                }
                $("#prod_code").val($(this).data('prod-code'));

                if(!confirm(_msg)) return;
                ajaxLoadingSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                    }
                }, showValidateError, null, 'alert', $regi_form);
            });
        });
    </script>
@stop