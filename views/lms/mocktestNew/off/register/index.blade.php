@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 오프라인 응시자 성적을 등록하는 메뉴입니다.</h5>
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
                            @foreach($applyType as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_AcceptStatus" name="search_AcceptStatus">
                            <option value="">접수상태</option>
                            @foreach($accept_ccd as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_use" name="search_use">
                            <option value="">사용여부</option>
                            <option value="Y">사용</option>
                            <option value="N">미사용</option>
                        </select>
                        <select class="form-control mr-5" id="grade_use" name="grade_use">
                            <option value="">등록여부</option>
                            <option value="Y">등록</option>
                            <option value="N">미등록</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 명칭, 코드 검색 가능
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
            <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2">
                <thead class="bg-white-gray">
                <tr>
                    <th rowspan="2" class="text-center valign-middle">NO</th>
                    <th rowspan="2" class="text-center valign-middle">카테고리</th>
                    <th rowspan="2" class="text-center valign-middle">직렬</th>
                    <th rowspan="2" class="text-center valign-middle">연도</th>
                    <th rowspan="2" class="text-center valign-middle">회차</th>
                    <th rowspan="2" class="text-center valign-middle">모의고사명</th>
                    <th rowspan="2" class="text-center valign-middle">응시가능시간</th>
                    <th rowspan="2" class="text-center valign-middle">시험시간</th>
                    <th colspan="2" class="text-center valign-middle">응시형태</th>
                    <th rowspan="2" class="text-center valign-middle">접수상태</th>
                    <th rowspan="2" class="text-center valign-middle">사용여부</th>
                    <th rowspan="2" class="text-center valign-middle">성적등록여부</th>
                    <th rowspan="2" class="text-center valign-middle">성적등록</th>
                    <th rowspan="2" class="text-center valign-middle">등록일</th>
                </tr>
                <tr>
                    <th class="text-center valign-middle">Online</th>
                    <th class="text-center valign-middle">Off</th>
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
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/off/register/listAjax') }}',
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
                            return '<a class="underline-link blue" href="{{ site_url('/mocktestNew/reg/goods/create/') }}'+row.ProdCode+'" target="_blank">['+row.ProdCode+'] '+row.ProdName+'</a>';
                        }},
                    {'data' : 'TakeSETime', 'class': 'text-center'},
                    {'data' : 'TakeMinute', 'class': 'text-center'},
                    {'data' : 'TakePart_on', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'TakePart_off', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                        }},
                    {'data' : 'AcceptStatusCcd_Name', 'class': 'text-center'},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'GradeCNT', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data > 0) ? '등록' : '<span class="red">미등록</span>';
                        }},
                    {'data' : 'ProdCode', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return '<span class="blue underline-link act-regist" data-prod-code="'+row.ProdCode+'"><input type="hidden" name="target" value="' + row.ProdCode + '" />확인</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'}
                ]
            });

            // 성적등록 페이지
            $list_table.on('click', '.act-regist', function () {
                location.href = '{{ site_url('/mocktestNew/off/register/createScore/') }}' + $(this).data('prod-code') + dtParamsToQueryString($datatable);
            });
        });
    </script>
@stop