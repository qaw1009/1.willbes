@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 응시자 가준으로 개별 모의고사성적을 확인하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}
        {!! html_def_site_tabs($def_site_code, 'tabs_site_code', 'tab', false, [], false, $arr_site_code) !!}
        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($def_site_code, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '', '', false, $arr_site_code) !!}
                        <select class="form-control mr-5" id="search_TakeFormsCcd" name="search_TakeFormsCcd">
                            <option value="">응시형태</option>
                            @foreach($arr_base['applyType'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
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

                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">과목</option>
                            @foreach($arr_base['subject'] as $row)
                                <option value="{{ $row['SubjectIdx'] }}" class="{{ $row['SiteCode'] }}">{{ $row['SubjectName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="search_takeArea" name="search_takeArea">
                            <option value="">응시지역</option>
                            @foreach($arr_base['applyArea'] as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                            @endforeach
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

    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content mb-20">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_ajax_table" class="table table-bordered table-striped table-head-row2 form-table">
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

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

            // DataTables
            $datatable = $list_table.DataTable({
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktestNew/statistics/memberPrivate/listAjax') }}',
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
        });
    </script>
@stop