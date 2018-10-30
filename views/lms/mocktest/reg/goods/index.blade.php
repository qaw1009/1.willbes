@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 모의고사 상품정보를 등록하고 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! html_def_site_tabs($siteCodeDef, 'tabs_site_code', 'tab', false) !!}
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">조건</label>
                    <div class="col-md-11">
                        {!! html_site_select($siteCodeDef, 'search_site_code', 'search_site_code', 'hide', '운영 사이트', '') !!}
                        <select class="form-control mr-5" id="sc_cateD1" name="sc_cateD1">
                            <option value="">카테고리</option>
                            @foreach($cateD1 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['SiteCode'] }}" @if(isset($_GET['sc_cateD1']) && $_GET['sc_cateD1'] == $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_cateD2" name="sc_cateD2">
                            <option value="">직렬</option>
                            @foreach($cateD2 as $row)
                                <option value="{{ $row['CateCode'] }}" class="{{ $row['ParentCateCode'] }}" @if(isset($_GET['sc_cateD2']) && $_GET['sc_cateD2'] == $row['CateCode']) selected @endif>{{ $row['CateName'] }}</option>
                            @endforeach
                        </select>
                        <select class="form-control mr-5" id="sc_year" name="sc_year">
                            <option value="">연도</option>
                            @for($i=(date('Y')+1); $i>=2005; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select class="form-control mr-5" id="sc_round" name="sc_round">
                            <option value="">회차</option>
                            @foreach(range(1, 20) as $i)
                                <option value="{{$i}}">{{$i}}</option>
                            @endforeach
                        </select>

                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">응시형태</option>

                        </select>
                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">접수상태</option>

                        </select>
                        <select class="form-control mr-5" id="sc_subject" name="sc_subject">
                            <option value="">응시기간</option>

                        </select>
                        <select class="form-control mr-5" id="sc_use" name="sc_use">
                            <option value="">사용여부</option>
                            <option value="Y" @if(isset($_GET['sc_use']) && $_GET['sc_use'] == 'Y') selected @endif>사용</option>
                            <option value="N" @if(isset($_GET['sc_use']) && $_GET['sc_use'] == 'N') selected @endif>미사용</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-inline">
                    <label class="col-md-1 control-label">통합검색</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" style="width:300px;" id="sc_fi" name="sc_fi" value="{{ @$_GET['sc_fi'] }}"> 명칭, 코드 검색 가능
                    </div>
                    <div class="col-md-5 text-right">
                        {{--<button type="submit" class="btn btn-primary" id="btn_search"><i class="fa fa-spin fa-refresh"></i> 검색</button>--}}
                        <button type="button" class="btn btn-default" id="searchInit">초기화</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div>접수현황 : 결제대기, 결제완료, 환불완료 인원의 총합</div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <thead class="bg-white-gray">
                    <tr>
                        <th rowspan="2" class="text-center">선택</th>
                        <th rowspan="2" class="text-center">NO</th>
                        <th rowspan="2" class="text-center">카테고리</th>
                        <th rowspan="2" class="text-center">직렬</th>
                        <th rowspan="2" class="text-center">연도</th>
                        <th rowspan="2" class="text-center">회차</th>
                        <th rowspan="2" class="text-center">모의고사명</th>
                        <th rowspan="2" class="text-center">판매가</th>
                        <th rowspan="2" class="text-center">접수기간</th>
                        <th colspan="2" class="text-center">응시형태</th>
                        <th colspan="2" class="text-center">접수현황</th>
                        <th colspan="2" class="text-center">응시현황</th>
                        <th rowspan="2" class="text-center">접수상태</th>
                        <th rowspan="2" class="text-center">응시기간</th>
                        <th rowspan="2" class="text-center">등록자</th>
                        <th rowspan="2" class="text-center">등록일</th>
                    </tr>
                    <tr>
                        <th class="text-center">Online</th>
                        <th class="text-center">Off</th>
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

        $(document).ready(function() {
            // 수정으로 이동
            $('.act-edit').on('click', function () {
                $search_form.find('[name="_csrf_token"]').remove();
                var query = '?' + $search_form.serialize();
                location.href = '{{ site_url('/mocktest/regGroup/edit/') }}' + $(this).data('idx') + query;
            });

            // 검색 초기화
            $('#searchInit').on('click', function () {
                $search_form.find('[name^=sc_]:not(#search_site_code)').each(function () {
                    $(this).val('');
                });
                $datatable.draw();
            });

            // DataTables
            $datatable = $list_table.DataTable({
                info: true,
                language: {
                    "info": "[ 총 _MAX_건 ]"
                },
                dom: "<<'pull-left mb-5'i><'pull-right mb-5'B>>tp",
                buttons: [
                    { text: '<i class="fa fa-pencil mr-5"></i> 모의고사 그룹등록', className: 'btn btn-sm btn-success', action: function(e, dt, node, config) {
                            $search_form.find('[name="_csrf_token"]').remove();
                            location.href = '{{ site_url('/mocktest/regGoods/create') }}' + '?' + $search_form.serialize();
                        }}
                ],
                processing: true,
                serverSide: true,
                ajax: {
                    'url' : '{{ site_url('/mocktest/regGoods/list') }}',
                    'type' : 'POST',
                    'data' : function(data) {
                        return $.extend(arrToJson($search_form.serializeArray()), {'start' : data.start, 'length' : data.length});
                    }
                },
                columns: [
                    {'data' : null, 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return $datatable.page.info().recordsTotal - (meta.row + meta.settings._iDisplayStart);
                        }},
                    {'data' : 'MgIdx', 'class': 'text-center'},
                    {'data' : 'GroupName', 'class': ''},
                    {'data' : 'Desc', 'class': ''},
                    {'data' : 'IsDup', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'IsUse', 'class': 'text-center', 'render' : function(data, type, row, meta) {
                            return (data === 'Y') ? '사용' : '<span class="red">미사용</span>';
                        }},
                    {'data' : 'wAdminName', 'class': 'text-center'},
                    {'data' : 'RegDatm', 'class': 'text-center'}
                ]
            });
        });
    </script>
@stop
