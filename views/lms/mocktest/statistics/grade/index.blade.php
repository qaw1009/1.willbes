@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 기준으로 조정점수를 수동반영하고 성적 통계를 확인하는 메뉴입니다.(개인 성적표 통계 처리를 위한 단계)</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
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
                            @foreach($accept_ccd as $key=>$val)
                                @if($key != '675001' ) {{--접수예정 제외--}}
                                <option value="{{$key}}">{{$val}}</option>
                                @endif
                            @endforeach
                        </select>
                        <!--select class="form-control mr-5" id="search_TakeType" name="search_TakeType">
                            <option value="">응시기간</option>
                            <option value="A">상시</option>
                            <option value="L">기간제한</option>
                        </select//-->
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
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="MgIdx" name="MgIdx" value="">
    </form>
    <div class="mt-20">* 성적오픈일 이후 응시자가 성적을 제출하면 자동으로 성적처리됩니다.(조정점수 자동산출)</div>
    <div class="mt-20">* 수동으로 '조정점수반영' 클릭 시 현재 시점으로 조정점수가 재산출됩니다.</div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
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
                        <th rowspan="2" class="text-center">성적오픈일</th>
                        <th rowspan="2" class="text-center">복수정답처리</th>
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
            // 검색 Select 메뉴
            $search_form.find('#search_cateD1').chained('#search_site_code');
            $search_form.find('#search_cateD2').chained('#search_cateD1');

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
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/statisticsGrade/list') }}',
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
                            return '<span class="blue underline-link act-edit"><input type="hidden" name="target" value="' + row.ProdCode + '" />[' + row.ProdCode + '] ' + row.ProdName + '</span>';
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
                            return row.GradeOpenDatm != null ? '<span class="blue underline-link act-view"><input type="hidden" name="target" value="' + row.ProdCode + '" /><input type="hidden" name="mgidx" value="' + row.MgIdx + '" />확인</span>' : '';
                        }},
                    {'data' : 'GradeOpenDatm', 'class': 'text-center'},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenDatm != null ? '<span class="blue underline-link" onClick="scoreMulti('+ row.MgIdx +')">' + '복수정답처리' + '</span>' : '';
                        }},
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return row.GradeOpenDatm != null ? '<span class="blue underline-link" onClick="scoreMake('+ row.MgIdx +')">' + '조정점수반영' + '</span>' : '';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'}
                ]
            });

            // 성적페이지로 이동
            $list_form.on('click', '.act-view', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/statisticsGrade/statSubject/') }}' + $(this).closest('tr').find('[name=target]').val() + '/' + $(this).closest('tr').find('[name=mgidx]').val() + query;
            });

            // 수정으로 이동
            $list_form.on('click', '.act-edit', function () {
                var query = dtParamsToQueryString($datatable);
                location.href = '{{ site_url('/mocktest/regGoods/edit/') }}' + $(this).closest('tr').find('[name=target]').val() + query;
            });

        });

        function scoreMake(mgidx){
            if(!confirm("조정점수를 반영 하시겠습니까?")) return;

            $('#MgIdx').val(mgidx);

            var _url = '{{ site_url('/mocktest/statisticsGrade/scoreMakeAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

        function scoreMulti(mgidx){
            if(!confirm("복수정답처리를 반영 하시겠습니까?")) return;

            $('#MgIdx').val(mgidx);

            var _url = '{{ site_url('/mocktest/statisticsGrade/scoreMultiAjax') }}';
            ajaxSubmit($regi_form, _url, function(ret) {
                if(ret.ret_cd) {
                    alert(ret.ret_msg);
                }
            }, showValidateError, null, false, 'alert');
        }

    </script>
@stop
