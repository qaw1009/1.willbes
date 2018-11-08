@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 모의고사 결제현황 및 응시여부를 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}
        <input type="hidden" id="search_site_code" name="search_site_code" value="{{$siteCodeDef}}">

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
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
                        <select class="form-control mr-5" id="search_TakeFormsCcds" name="search_TakeFormsCcds">
                            <option value="">응시지역</option>
                            @foreach($applyArea as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="" value="" class="form-control datepicker" style="width: 100px;" placeholder="기간시작일" readonly>
                        <span class="pl-5 pr-5">~</span>
                        <input type="text" name="" value="" class="form-control datepicker"  style="width: 100px;" placeholder="기간종료일" readonly>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">모의고사검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="search_fi" name="search_fi" value=""> 모의고사명, 코드 검색 가능
                    </div>
                </div>
                <div class="pt-10">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary mr-50" id="act-excelDown">엑셀다운로드</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button type="submit" class="btn btn-primary" id="btn_search">검색</button>
                        <button type="button" class="btn btn-default" id="act-searchInit">초기화</button>
                    </div>
                </div>
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
                        <th rowspan="2" class="text-center">NO</th>
                        <th colspan="3" class="text-center">상품정보</th>
                        <th rowspan="2" class="text-center">응시형태</th>
                        <th rowspan="2" class="text-center">Off마감인원</th>
                        <th rowspan="2" class="text-center">응시지역</th>
                        <th colspan="3" class="text-center">접수현황</th>
                        <th rowspan="2" class="text-center blue">응시인원</th>
                    </tr>
                    <tr>
                        <th class="text-center">연도</th>
                        <th class="text-center">회차</th>
                        <th class="text-center">모의고사명</th>
                        <th class="text-center">결제대기</th>
                        <th class="text-center blue">결제완료</th>
                        <th class="text-center">환불완료</th>
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
            // 검색 초기화
            $('#act-searchInit, #tabs_site_code > li').on('click', function () {
                $search_form.find('[name^=search_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $search_form.find('#search_cateD1').trigger('change');
                if($(event.target).attr('id') == 'act-searchInit') $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/applyExam/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return '<input type="radio" class="flat" name="target" value="' + row.ProdCode + '">';
                    }},
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
                        return '<span class="blue underline-link act-edit">[' + row.ProdCode + '] ' + row.ProdName + '</span>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return row.RealSalePrice + '원<br><span style="text-decoration:line-through">' + row.SalePrice + '원</span>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return row.SaleStartDatm.substr(0,10) + ' ~ ' + row.SaleEndDatm.substr(0,10);
                    }},
                    {'data' : 'TakePart_on', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                    }},
                    {'data' : 'TakePart_off', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? 'Y' : '<span class="red">N</span>';
                    }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) { return 0; }},
                    {'data' : 'IsRegister', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '접수중' : '접수마감';
                    }},
                    {'data' : 'TakeType', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'A') ? '상시' : '기간제한';
                    }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                        return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                    }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });

            // 엑셀다운로드

            // 이동
        });
    </script>
@stop
